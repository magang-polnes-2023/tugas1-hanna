<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storange;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = mahasiswa::latest()->paginate(5);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'nama'=>'required',
        'nim'=>'required',
        'no_telp'=>'required',
        'umur'=>'required',
        'alamat'=>'required',
        'tanggal_lahir'=>'required',
        'jenis_kelamin'=>'required',
        'gambar'=>'required|image|mimes:jpeg,jpg,png|max:2048'
      ]);

      //upload image
      $gambar = $request->file('gambar');
      $gambar->storeAs('public/posts', $gambar->hashName());
    
      mahasiswa::create([
        'nama'=>$request->nama,
        'nim'=>$request->nim,
        'no_telp'=>$request->no_telp,
        'umur'=>$request->umur,
        'alamat'=>$request->alamat,
        'tanggal_lahir'=>$request->tanggal_lahir,
        'jenis_kelamin'=>$request->jenis_kelamin,
        'gambar'=>$gambar->hashName()

      ]);

      return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);

        //hapus gambar
        Storage::delete('public/posts'. $mahasiswa->foto);

        //hapus post
        $mahasiswa->delete();

        //redirect to index
        return redirect()->route('mahasiswa.index')-> with(['success' => 'Data Berhasil di Hapus!']);
    }
}