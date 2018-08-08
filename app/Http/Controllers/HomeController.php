<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\komentar;
use App\User;
use App\pesan;
use App\berita;
use App\stasiun;
use App\file;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admincount = user::count();
        $beritacount = berita::count();
        $pesancount = pesan::count();
        $komentarcount = komentar::count();
        $stasiuncount = stasiun::count();

        $carifilepeta = 'Peta';
        $carifilegauge = 'Gauge';
        $carifilegambar = 'Gambar';
        $filepetacount = file::where('jenis_file','LIKE',"%{$carifilepeta}%")->count();
        $filegaugecount = file::where('jenis_file','LIKE',"%{$carifilegauge}%")->count();
        $filegambarcount = file::where('jenis_file','LIKE',"%{$carifilegambar}%")->count();

        return view('admin/dashboard', compact('admincount','beritacount','pesancount','komentarcount','stasiuncount','filepetacount','filegaugecount','filegambarcount'));
    }
}
