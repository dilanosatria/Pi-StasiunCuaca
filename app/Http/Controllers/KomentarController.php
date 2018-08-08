<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\komentar;

use Validator;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komentar = komentar::orderBy('created_at','desc')->paginate(10);
        return view('admin/komentar', compact('komentar'));
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
            'komentar' => 'required|string|max:2000',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            alert()->error('Kesalahan!', 'Pastikan Anda Bukan Robot... Bidip Bidip.');
            return redirect('/#komentar')
                        ->withErrors($validator)
                        ->withInput();
        }

        // komentar::create($request->all());
        date_default_timezone_set('Asia/Jakarta');
        $komentar = new komentar();
            $komentar->id = "K".date('y').date('m').date('d').date('H').date('i').rand(00,99);
            $komentar->nama = $request->nama;
            $komentar->email = $request->email;
            $komentar->komentar= $request->komentar;
            $komentar->save();
        alert()->success('Sukses!', 'Komentar Anda Berhasil Ditambahkan! Terima Kasih.');
        return redirect('/#komentar');
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
        $komentar = komentar::findOrFail($request->id);
        $komentar->update($request->all());
        alert()->success('Sukses!', 'Komentar Berhasil Disensor!.');
        return redirect('/admin/komentar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        komentar::destroy($id);
        alert()->success('Sukses!', 'Komentar Berhasil Dihapus!');
        return redirect('/admin/komentar');
    }
}
