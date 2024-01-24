<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use Illuminate\Support\Facades\Auth;
use App\Tanggapan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_dat = Pengaduan::where('nik', Auth::user()->nik)->get();
        $pengaduan = Pengaduan::where('nik', Auth::user()->nik)->get();
        $notif = Pengaduan::where('nik', Auth::user()->nik)->where('status', '!=', '0')->orderBy('updated_at', 'DESC')->limit(4)->get();
        return view('masyarakat.pengaduan.index', compact('all_dat' ,'pengaduan','notif'));
    }

    public function data_ped(){
        $data = Pengaduan::where('nik', Auth::user()->nik)->get();
        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_dat = Pengaduan::where('nik', Auth::user()->nik)->get();
        $pengaduan = Pengaduan::where('nik', Auth::user()->nik)->get();
        $notif = Pengaduan::where('nik', Auth::user()->nik)->where('status', '!=', '0')->orderBy('updated_at', 'DESC')->limit(4)->get();
        return view('masyarakat.aduan.create', compact('all_dat', 'pengaduan', 'notif'));
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
            'judul_laporan' => 'required|max: 255',
            'isi_laporan' => 'required',
            'foto' => 'required|image|mimes: jpg,jpeg,png|max: 2048',
        ]);
        $data = $request->all();
        $data['tgl_pengaduan'] = date('Y-m-d');
        $data['nik'] = Auth::user()->nik;
        $data['status'] = '0';
        $data['read_by_admin'] = '0';
        $data['foto'] = $request->file('foto')->store('asset/data_aduan', 'public');
        Pengaduan::create($data);
        return redirect('/masyarakat/pengaduan')->with('pesan', 'Aduan berhasil di kirim!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        if(Auth::user()->nik != $pengaduan->nik){
            return redirect('/masyarakat/pengaduan');
        }
        Tanggapan::where('id_pengaduan', $pengaduan->id)->update([
            'read_by_user' => '1'
        ]);
        $tanggapan = Tanggapan::where('id_pengaduan', $pengaduan->id)->get();
        $all_dat = Pengaduan::where('nik', Auth::user()->nik)->get();
        $notif = Pengaduan::where('nik', Auth::user()->nik)->where('status', '!=', '0')->orderBy('updated_at', 'DESC')->limit(4)->get();
        return view('masyarakat.pengaduan.detail', compact('all_dat' ,'pengaduan', 'notif', 'tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        if(Auth::user()->nik != $pengaduan->nik){
            return redirect('/masyarakat/pengaduan');
        }
        $all_dat = Pengaduan::where('nik', Auth::user()->nik)->get();
        $notif = Pengaduan::where('nik', Auth::user()->nik)->where('status', '!=', '0')->orderBy('updated_at', 'DESC')->limit(4)->get();
        if($pengaduan->status != '0'){
            return redirect('/masyarakat/pengaduan');
        }
        return view('masyarakat.pengaduan.edit', compact('all_dat' ,'pengaduan', 'notif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'judul_laporan' => 'required|max: 255',
            'isi_laporan' => 'required',
            'foto' => 'image|mimes: jpg,jpeg,png|max: 2048',
        ]);
        $data = $request->all();
        $data['tgl_pengaduan'] = date('Y-m-d');
        $data['nik'] = Auth::user()->nik;
        $data['status'] = '0';
        $data['read_by_admin'] = '0';
        if($request->foto == null){
            $data['foto'] = $pengaduan->foto;
            Pengaduan::find($pengaduan->id)->update($data);
        }else{
            unlink(storage_path('app/public/'.$pengaduan->foto));
            $data['foto'] = $request->file('foto')->store('asset/data_aduan', 'public');
            Pengaduan::find($pengaduan->id)->update($data);
        }
        return redirect('/masyarakat/pengaduan')->with('pesan', 'Aduan berhasil di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        unlink(storage_path('app/public/'.$pengaduan->foto));
        Pengaduan::destroy($pengaduan->id);
        return redirect('/masyarakat/pengaduan')->with('pesan', 'Aduan berhasil di hapus!');
    }
}
