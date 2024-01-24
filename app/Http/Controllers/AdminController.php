<?php

namespace App\Http\Controllers;

use App\Mail\VerifiedT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;

class AdminController extends Controller
{
    // Controller Admin
    public function index(){
        $pengaduan = Pengaduan::count();
        $tanggapan = Tanggapan::count();
        $pengguna = User::where('level', '!=', 'Masyarakat')->count();
        $masyarakat = User::where('level', 'Masyarakat')->count();
        return view('admin.index', compact('pengaduan', 'tanggapan', 'pengguna', 'masyarakat'));
    }

    public function pengaduan(){
        $aduan = Pengaduan::all();
        return view('admin.aduan.index', compact('aduan'));
    }

    public function detail_aduan(Pengaduan $aduan){
        Pengaduan::find($aduan->id)->update([
            'read_by_admin' => '1'
        ]);
        return view('admin.aduan.detail', compact('aduan'));
    }

    public function aduan_count(){
        $tp = Pengaduan::where('status', '0')->where('read_by_admin', '0')->orderBy('created_at', 'DESC')->count();
        return $tp;
    }

    public function data_aduan_alert(){
        $get_ped = Pengaduan::where('status', '0')->orderBy('created_at', 'DESC')->get();
        return view('admin.ajax_ped', compact('get_ped'));
    }

    public function profil(){
        $user = User::where('nik', Auth::user()->nik)->get();
        return view('admin.profil.index', compact('user'));
    }

    public function edit_profil(Request $request, User $user){
        $request->validate([
            'nik' => 'required|max: 16',
            'name' => 'required',
            'email' => 'required|email',
            'telp' => 'required|max: 13',
            'foto' => 'image|mimes: jpg,png,jpeg'
        ]);
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
        return redirect('/admin/profil/')->with('pesan', 'Data profil berhasil di ubah');
    }

    public function cetak_aduan(Pengaduan $aduan){
        $pdf = PDF::loadView('admin.aduan.laporan', compact('aduan'))->setPaper('A4', 'lanscape');
        return $pdf->stream('Laporan Aduan'.$aduan->nik.'.pdf');
    }

    public function cetak_tanggapan(Tanggapan $tanggapan){
        $pdf = PDF::loadView('admin.tanggapan.laporan', compact('tanggapan'))->setPaper('A4', 'lanscape');
        return $pdf->stream('Laporan Tanggapan'.$tanggapan->pengaduan->nik.'.pdf');
    }

    public function cetak_msy(){
        $masyarakat = User::where('level', 'Masyarakat')->get();
        $pdf = PDF::loadView('admin.masyarakat.laporan', compact('masyarakat'))->setPaper('A4', 'Portrait');
        return $pdf->stream('Data Masyarakat.pdf');
    }

    public function cetak_pgs(){
        $petugas = User::where('level', '!=', 'Masyarakat')->get();
        $pdf = PDF::loadView('admin.petugas.laporan', compact('petugas'))->setPaper('A4', 'Portrait');
        Mail::to('gaguna3026@gmail.com')->send(new VerifiedT('ferdy'));
        return $pdf->stream('Data Petugas.pdf');
    }
}
