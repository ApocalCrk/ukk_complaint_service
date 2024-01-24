<?php

namespace App\Http\Controllers;

use App\Tanggapan;
use App\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapan = Tanggapan::all();
        return view('admin.tanggapan.index', compact('tanggapan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // tidak digunakan
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggapan' => 'required'
        ]);
        $data = $request->all();
        $data['tgl_tanggapan'] = date('Y-m-d');
        $data['id_petugas'] = Auth::user()->nik;
        $data['read_by_user'] = '0';
        Tanggapan::create($data);
        Pengaduan::find($request->id_pengaduan)->update([
            "status" => "Proses"
        ]);
        return redirect('/admin/pengaduan/detail/'.$request->id_pengaduan)->with('pesan', 'Tanggapan berhasil di kirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show(Tanggapan $tanggapan)
    {
        return view('admin.tanggapan.detail', compact('tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanggapan $tanggapan)
    {
        return view('admin.tanggapan.edit', compact('tanggapan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanggapan $tanggapan)
    {
        $request->validate([
            'tanggapan' => 'required',
            'status' => 'required'
        ]);
        Tanggapan::find($tanggapan->id)->update($request->all());
        Pengaduan::find($tanggapan->id_pengaduan)->update([
            "status" => $request->status
        ]);
        return redirect('/admin/tanggapan')->with('pesan', 'Tanggapan berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanggapan $tanggapan)
    {
        Pengaduan::find($tanggapan->id_pengaduan)->update(['status' => '0']);
        Tanggapan::destroy($tanggapan->id);
        return redirect('/admin/tanggapan')->with('pesan', 'Tanggapan berhasil di hapus');
    }
}
