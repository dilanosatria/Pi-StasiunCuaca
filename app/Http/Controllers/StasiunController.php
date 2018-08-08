<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stasiun;
use App\file;
use App\sortingkota;

class StasiunController extends Controller
{
    public function indexstasiunaktif()
    {
        $statusaktif = 'Aktif';
        $stasiun = stasiun::where('status','LIKE',"{$statusaktif}")->orderBy('updated_at','desc')->paginate(5);

        $carifilepeta = 'Peta';
        $carifilegauge = 'Gauge';
        $filepeta = file::where('jenis_file','LIKE','Peta')->where('jenis_file','LIKE',"%{$carifilepeta}%")->orderBy('created_at', 'DESC')->paginate(30);
        $filegauge = file::where('jenis_file','LIKE',"%{$carifilegauge}%")->orderBy('created_at', 'DESC')->paginate(30);
    
        $carigaugetemp = 'gaugetemp';
            $gaugetemp = file::where('jenis_file','LIKE','Gauge')->where('nama_file','LIKE',"%{$carigaugetemp}%")->get();
        $carigaugehum = 'gaugehum';
            $gaugehum = file::where('jenis_file','LIKE','Gauge')->where('nama_file','LIKE',"%{$carigaugehum}%")->get();
        $carigaugepress = 'gaugepress';
            $gaugepress = file::where('jenis_file','LIKE','Gauge')->where('nama_file','LIKE',"%{$carigaugepress}%")->get();
        $carigaugelight = 'gaugelight';
            $gaugelight = file::where('jenis_file','LIKE','Gauge')->where('nama_file','LIKE',"%{$carigaugelight}%")->get();
        $carigaugerain = 'gaugerain';
            $gaugerain = file::where('jenis_file','LIKE','Gauge')->where('nama_file','LIKE',"%{$carigaugerain}%")->get();
        $carigaugedew = 'gaugedew';
            $gaugedew = file::where('jenis_file','LIKE','Gauge')->where('nama_file','LIKE',"%{$carigaugedew}%")->get();

        $sortingkota = sortingkota::all();
        $filegambar= file::where('jenis_file','LIKE','Gambar')->orderBy('nama_file','desc')->get();

        return view('admin/stasiun', compact('stasiun','filepeta','filegauge','filegambar','gaugetemp','gaugehum','gaugepress','gaugelight','gaugerain','gaugedew','sortingkota'));
    }

    public function indexstasiunnonaktif()
    {
        $statusnonaktif = 'Tidak Aktif';
        $stasiunnonaktif = stasiun::where('status','LIKE',"{$statusnonaktif}")->orderBy('updated_at','desc')->paginate(5);
        $filepeta = file::all();
        $filegauge = file::all();
        return view('admin/stasiunnonaktif', compact('stasiunnonaktif','filepeta','filegauge'));
    }

    public function indexsorting()
    {
        $sortingkota = sortingkota::all();

        return view('admin/sortingkota', compact('sortingkota'));
    }

    public function bacadataiot()
    {
        $bacadatathingspeak = stasiun::all();
        return view('admin/bacathingspeak', compact('bacadatathingspeak'));
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
        //komentar::create(Request::all());
       // return redirect()->back();
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
    public function update(Request $request)
    {
        $stasiun = stasiun::findOrFail($request->id);
        $stasiun->update($request->all());
        alert()->success('Sukses!', 'Stasiun Cuaca Berhasil Diubah!');
        return redirect('/admin/stasiun');
    }
    public function updateaktif(Request $request)
    {
        $stasiun = stasiun::findOrFail($request->id);
        $stasiun->update($request->all());
        alert()->success('Sukses!', 'Stasiun Cuaca Berhasil Diaktifkan!');
        return redirect('/admin/stasiun');
    }
    public function updatenonaktif(Request $request)
    {
        $stasiun = stasiun::findOrFail($request->id);
        $stasiun->update($request->all());
        alert()->success('Sukses!', 'Stasiun Berhasil Disembunyikan!');
        return redirect('/admin/stasiunnonaktif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        stasiun::destroy($id);
        alert()->success('Sukses!', 'Stasiun Cuaca Berhasil Dihapus!');
        return redirect('/admin/stasiun');
    }

    public function destroystasiunnonaktif($id)
    {
        stasiun::destroy($id);
        alert()->success('Sukses!', 'Stasiun Cuaca Berhasil Dihapus!');
        return redirect('/admin/stasiunnonaktif');
    }

    public function save_data(Request $request)
    {
        stasiun::create($request->all());
        alert()->success('Sukses!', 'Stasiun Cuaca Berhasil Ditambahkan!');
        return redirect('/admin/stasiun');
    }

    public function updatesorting(Request $request)
    {
        $sortingkota = sortingkota::findOrFail($request->id);
        $sortingkota->update($request->all());
        alert()->success('Sukses!', 'Listing Kota Berhasil Diubah!');
        return redirect('/admin/sortingkota');
    }
    public function destroysorting($id)
    {
        sortingkota::destroy($id);
        alert()->success('Sukses!', 'Listing Kota Berhasil Dihapus!');
        return redirect('/admin/sortingkota');
    }

    public function save_datasorting(Request $request)
    {
        sortingkota::create($request->all());
        alert()->success('Sukses!', 'Listing Kota Berhasil Ditambahkan!');
        return redirect('/admin/sortingkota');
    }
}
