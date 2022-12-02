<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Postingan::all();

        return view('postingan.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('postingan.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Postingan::create($data);

        return redirect('postingan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function show(Postingan $postingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $postingan = Postingan::find($id);
        return view('postingan.edit', compact('postingan','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $postingan= Postingan::find($id);

        try{
            $data['foto'] = Storage::put('img', $request->file('foto'));
            $postingan-> update($data);
        }catch (\Throwable $th){
            $data ['foto']= $postingan->foto;

            $postingan->update($data);
        }

        return redirect('postingan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postingan $postingan)
    {
        $postingan->delete();
        return redirect('postingan');
    }

    public function beranda()
    {
        $data = Postingan::all();
        return view('beranda', compact('data'));
    }
    public function detailberanda()
    {
        $data = Postingan::all();
        foreach ($data as $k){
            $produk = Produk::all()->where('kategoris_id','=',$k->kategori_id);
        }
        // dd($produk);
        return view('detailberanda', compact('data', 'produk'));

    }
}
