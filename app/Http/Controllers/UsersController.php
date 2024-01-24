<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pengaduan;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        if($user == 'petugas'){
            $data_petugas = User::where('level', '!=', 'Masyarakat')->get();
            return view('admin.petugas.index', compact('data_petugas'));
        }elseif($user == 'masyarakat'){
            $data_masyarakat = User::where('level', 'Masyarakat')->get();
            return view('admin.masyarakat.index', compact('data_masyarakat'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($level, User $user)
    {
        if($level == 'masyarakat'){
            return view('admin.masyarakat.edit', compact('user'));
        }elseif($level == 'petugas'){
            return view('admin.petugas.edit', compact('user'));
        }else{
            return false;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nik' => 'required|numeric|min: 16',
            'name' => 'required|string|max: 255',
            'email' => 'required|email|string|max: 255',
            'telp' => 'required|numeric|min: 13',
            'level' => 'required'
        ]);
        if($request->nik != $user->nik){
            Pengaduan::where('nik', $user->nik)->update(['nik' => $request->nik]);
        }
        if($user->level == 'Admin'){
            $level = 'petugas';
        }else{
            $level = 'masyarakat';
        }
        User::find($user->id)->update($request->all());
        return redirect('/admin/'.$level.'/user')->with('pesan', 'Data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Pengaduan::where('nik', $user->nik)->delete();
        User::destroy($user->id);
        if($user->level == 'Admin'){
            $level = 'petugas';
        }else{
            $level = 'masyarakat';
        }
        return redirect('/admin/'.$level.'/user')->with('pesan', 'Data berhasil di hapus');
    }
}
