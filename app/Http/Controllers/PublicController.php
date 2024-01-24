<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Tanggapan;
use App\User;
use App\Chat;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    // Controller Masyarakat
    public function index(){
        $all_dat = Pengaduan::where('nik', Auth::user()->nik)->get();
        $aduan_pros = Pengaduan::where('nik', Auth::user()->nik)->where('status', 'Proses')->orderBy('updated_at')->count();
        $pengaduan_baru = Pengaduan::where('nik', Auth::user()->nik)->where('status', '0')->orderBy('created_at', 'DESC')->limit(4)->get();
        $aduan_selesai = Pengaduan::where('nik', Auth::user()->nik)->where('status', 'Selesai')->orderBy('updated_at', 'DESC')->limit(4)->get();
        $notif = Pengaduan::where('nik', Auth::user()->nik)->where('status', '!=', '0')->orderBy('updated_at', 'DESC')->limit(4)->get();
        return view('masyarakat.index', compact('all_dat' ,'pengaduan_baru', 'aduan_pros', 'aduan_selesai', 'notif'));
    }

    public function profil(){
        $user = User::where('nik', Auth::user()->nik)->get();
        $all_dat = Pengaduan::where('nik', Auth::user()->nik)->get();
        $notif = Pengaduan::where('nik', Auth::user()->nik)->where('status', '!=', '0')->orderBy('updated_at', 'DESC')->limit(4)->get();
        return view('masyarakat.profil.index', compact('user', 'notif', 'all_dat'));
    }

    public function edit_profil(Request $request, User $user){
        $request->validate([
            'nik' => 'required|max: 16',
            'name' => 'required',
            'email' => 'required|email',
            'telp' => 'required|max: 13',
            'foto' => 'image|mimes: jpg,png,jpeg'
        ]);
        if($request->nik != $user->nik){
            Pengaduan::where('nik', $user->nik)->update(['nik' => $request->nik]);
        }
        $data = $request->all();
        if($request->foto == null){
            $data['foto'] = $user->foto;
            User::find($user->id)->update($data);
        }else{
            if($user->foto == 'asset/data_profil/default.png'){
                $data['foto'] = $request->file('foto')->store('asset/data_profil', 'public');
                User::find($user->id)->update($data);
            }else{
                unlink(storage_path('app/public/'.$user->foto));
                $data['foto'] = $request->file('foto')->store('asset/data_profil', 'public');
                User::find($user->id)->update($data);
            }
        }
        return redirect('/masyarakat/profil/')->with('pesan', 'Data profil berhasil di ubah');
    }
}
