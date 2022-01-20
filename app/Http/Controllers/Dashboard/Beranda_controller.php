<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Biodata;
use App\User;

class Beranda_controller extends Controller
{
    public function index(){
    	$title = 'Halaman Dashboard';

    	$user_id = \Auth::user()->id;

    	$cek = Biodata::where('users',$user_id)->count();
    	if($cek < 1){
    		$pesan = 'Harap Melengkapi Biodata Terlebih Dahulu';
    	}else{
    		$pesan = 'Biodata Anda Sudah Dilengkapi.. Terima Kasih';
    	}

        $cek_verifikasi = User::find($user_id);

        if($cek_verifikasi->is_verifikasi == 1){
            $status = 'Diterima';
        }else if($cek_verifikasi->is_verifikasi == 2){
            $status = 'Cadangan';
        }elseif ($cek_verifikasi->is_verifikasi == 3) {
            $status = 'Belum Diterima';
        }else {
            $status = 'Mohon menunggu';
        }

        $cek_lulus = User::find($user_id);
        if($cek_lulus->is_lulus == 1){
            $pesan_lulus = 'Selamat Anda Sudah lulus';
        }else{
            $pesan_lulus = 'Mohon Maaf status anda masih dalam peninjauan';
        }

        $siswa = User::where('role',NULL)->count();
        $menunggu = User::where('role',NULL)->where('is_verifikasi',NULL)->count();
        $diterima = User::where('role',NULL)->where('is_verifikasi','1')->count();
        $cadangan = User::where('role',NULL)->where('is_verifikasi','2')->count();
        $ditolak = User::where('role',NULL)->where('is_verifikasi','3')->count();

    	return view('dashboard.beranda.index',compact('title','pesan','cek','status','pesan_lulus','siswa','menunggu','diterima','cadangan','ditolak'));
    }
}
