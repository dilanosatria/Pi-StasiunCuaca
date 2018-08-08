<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\pesan;

use Validator;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesan = pesan::orderBy('created_at','desc')->paginate(10);
        return view('admin/pesan', compact('pesan'));
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:30',
            'email' => 'required|string|email|max:30',
            'pesan' => 'required|string|max:2000',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            alert()->error('Kesalahan!', 'Pastikan Anda Bukan Robot... Bidip Bidip.');
            return redirect('/#komentar')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        // pesan::create(Request::all());
        date_default_timezone_set('Asia/Jakarta');
        $pesan = new pesan();
            $pesan->id = "P".date('y').date('m').date('d').date('H').date('i').rand(00,99);
            $pesan->nama = $request->nama;
            $pesan->email = $request->email;
            $pesan->pesan = $request->pesan;
            $pesan->save();
        alert()->success('Sukses!', 'Pesan Anda Berhasil Dikirimkan! Terima Kasih Telah Menghubungi Kami.');
        return redirect('/#komentar');
    }

    public function storeiot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:30',
            'email' => 'required|string|email|max:30',
            'pesan' => 'required|string|max:2000',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            alert()->error('Kesalahan!', 'Pastikan Anda Bukan Robot... Bidip Bidip.');
            return redirect('/#komentar')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        // pesan::create(Request::all());
        date_default_timezone_set('Asia/Jakarta');
        $pesan = new pesan();
            $pesan->id = "P".date('y').date('m').date('d').date('H').date('i').rand(00,99);
            $pesan->nama = $request->nama;
            $pesan->email = $request->email;
            $pesan->pesan = $request->pesan;
            $pesan->save();
        alert()->success('Sukses!', 'Pesan Anda Berhasil Dikirimkan! Terima Kasih Telah Menghubungi Kami.');
        return redirect()->back();
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
        pesan::destroy($id);
        alert()->success('Sukses!', 'Pesan Berhasil Dihapus!.');
        return redirect('/admin/pesan');
    }
    public function destroyconfirmation(Request $request)
    {
        pesan::find($request->id)->delete();
        alert()->success('Sukses!', 'Pesan Berhasil Dihapus!.');
        return redirect('/admin/pesan');
    }
}
