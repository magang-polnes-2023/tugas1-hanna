<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\universitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)){
            $mahasiswa = mahasiswa::where('nim','like',"%$katakunci%")
                ->orWhere('nama','like',"%$katakunci%")
                ->paginate(5);
        }else{
             $mahasiswa = mahasiswa::with('universitas')->latest()->paginate(5);
        }
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $univ = universitas::all();
        return view('mahasiswa.create', compact('univ'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'universitas_id'=>'required',
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
        'universitas_id'=>$request->universitas_id,
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
        $univ = universitas::all();
        return view('mahasiswa.show', compact('mahasiswa', 'univ'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        $univ = universitas::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'univ'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'universitas_id'=>'required',
            'nama'=>'required',
            'nim'=>'required',
            'no_telp'=>'required',
            'umur'=>'required',
            'alamat'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'gambar'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $mahasiswa = mahasiswa::findOrFail($id);

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');
            $gambar->storeAs('public/posts', $gambar->hashName());

            Storage::delete('public/posts'.$mahasiswa->gambar);

            $mahasiswa->update([
                'universitas_id'=>$request->universitas_id,
                'nama'=>$request->nama,
                'nim'=>$request->nim,
                'no_telp'=>$request->no_telp,
                'umur'=>$request->umur,
                'alamat'=>$request->alamat,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'gambar'=>$gambar->hashName()
            ]);
        
        } else {
            $mahasiswa->update([
                'universitas_id'=>$request->universitas_id,
                'nama'=>$request->nama,
                'nim'=>$request->nim,
                'no_telp'=>$request->no_telp,
                'umur'=>$request->umur,
                'alamat'=>$request->alamat,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
            ]);
        }

        return redirect()->route('mahasiswa.index')->with(['success' =>'Data Berhasil di Update!']);
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