<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\file;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stasiunindex()
    {
        $carifilepeta = 'Peta';
        $carifilegauge = 'Gauge';
        $filepeta = file::where('jenis_file','LIKE',"%{$carifilepeta}%")->orderBy('created_at', 'DESC')->paginate(30);
        $filegauge = file::where('jenis_file','LIKE',"%{$carifilegauge}%")->orderBy('created_at', 'DESC')->paginate(30);
        return view('admin/filemanager_stasiun', compact('filepeta','filegauge'));
    }
    public function webindex()
    {
        $carifilegambar = 'Gambar';
        $filegambar = file::where('jenis_file','LIKE',"%{$carifilegambar}%")->orderBy('created_at', 'DESC')->paginate(30);
        return view('admin/filemanager_web', compact('filegambar'));
    }

    public function form()
    {
        return view('file.form');
    }

    public function uploadpeta(Request $request)
    {
        $this->validate($request, [
            'nama_file' => 'nullable|max:100',
            'direktori_file' => 'required|file|mimes:html|max:2000', // max 2MB
        ]);

        $uploadedFile = $request->file('direktori_file');        

        $path = $uploadedFile->store('files/maps');

        $file = file::create([
            'nama_file' => $request->nama_file ?? $uploadedFile->getClientOriginalName(),
            'direktori_file' => $path,
            'jenis_file' => "Peta"
        ]);

        alert()->success('Sukses!', 'File  Peta Behasil Diunggah!.');
        return redirect()
        ->back()
        ->withSuccess(sprintf('File %s Peta Behasil Diunggah!.', $file->nama_file));
    }

    public function uploadgauge(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_file' => 'nullable|max:100',
            'direktori_file' => 'required|file|mimes:html|max:2000', // max 2MB
        ]);

        $uploadedFile = $request->file('direktori_file');        

        $path = $uploadedFile->store('files/gauges');

        $file = file::create([
            'nama_file' => $request->nama_file ?? $uploadedFile->getClientOriginalName(),
            'direktori_file' => $path,
            'jenis_file' => "Gauge"
        ]);

        alert()->success('Sukses!', 'File Gauges Behasil Diunggah!.');
        return redirect()
        ->back()
        ->withSuccess(sprintf('File %s Gauges Behasil Diunggah!.', $file->nama_file));
    }

    public function uploadgambar(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_file' => 'nullable|max:100',
            'direktori_file' => 'required|file|image|mimes:jpeg,jpg,png,gif|max:2000', // max 2MB
        ]);

        $uploadedFile = $request->file('direktori_file');        

        $path = $uploadedFile->store('files/images');

        $file = file::create([
            'nama_file' => $request->nama_file ?? $uploadedFile->getClientOriginalName(),
            'direktori_file' => $path,
            'jenis_file' => "Gambar"
        ]);

        alert()->success('Sukses!', 'Gambar Behasil Diunggah!.');
        return redirect()
        ->back()
        ->withSuccess(sprintf('%s Gambar Behasil Diunggah!.', $file->nama_file));
    }

    public function destroy($id)
    {
        $direktori_file = file::where('id', $id)->first()->direktori_file;
        
        if(file_exists('storage/'.$direktori_file)){
            unlink('storage/'.$direktori_file);
            file::destroy($id);
            alert()->success('Sukses!', 'Berkas Berhasil Dihapus!');
            return redirect()->back();
        }else{
            file::destroy($id);
            alert()->error('Kesalahan!', 'Berkas Tidak Ditemukan! Record Database Tetap Dihapus.');
            return redirect()->back();
        }
    }
}
