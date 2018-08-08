<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use App\komentar;
use App\User;
use App\pesan;
use App\berita;
use App\stasiun;
use App\file;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
