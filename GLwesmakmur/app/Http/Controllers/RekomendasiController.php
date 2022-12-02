<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rekomendasi');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pasien(Request $request)
    {
        $keluhan = $request->keluhan;//mengambil nilai inputan
        $tahunlahir = $request->tahunlahir;//mengambil tahun lahir

        $rekom = new caraminum($keluhan,$tahunlahir);
        $umur = $rekom->hitungumur();
        $jamu = $rekom->produkJamu();
        $saran= $rekom->saran();


        $data = [
            'keluhan'=>$keluhan,
            'umur'=>$umur,
            'jamu'=>$jamu,
            'saran'=>$saran,

        ];

        return view('rekomendasi', compact('data'));
    }

}

class Jamu
{
    public function __construct($keluhan,$tahun)
    {
        $this->keluhan = $keluhan;
        $this->tahunlahir = $tahun;
    }

    public function hitungumur(){
        $umur = date('Y')-$this->tahunlahir;
        return $umur;
    }

    public function produkJamu()
    {
        if($this->keluhan =='keseleo' || $this->keluhan == 'kurang nafsu makan' ){
        $jamu = 'Beras Kencur';
        return $jamu;
    }else if($this->keluhan=='pegal-pegal'){
        $jamu = 'Kunyit Asam';
        return $jamu;
    }else if($this->keluhan=='darah tinggi' || $this->keluhan == 'gula darah'){
        $jamu = 'Brotowali';
        return $jamu;
    }else if($this->keluhan=='keram perut' || $this->keluhan == 'masuk angin'){
        $jamu = 'Temulawak';
        return $jamu;
    }else{
        $jamu = 'Tidak ditemukan jamu';
        return $jamu;

         }
    }


}

class caraminum extends Jamu
{
    public function saran(){// method saran
        if($this->hitungumur()<=10){
            $konsumsi = 'Dikonsumsi 1x';
        }else{
            $konsumsi = 'Dikonsumsi 2x';
        }

        if($this->produkJamu() == 'Beras Kencur' && $this->keluhan == 'keseleo'){
            $pemakaian = 'Dioleskan';
        }else{
            $pemakaian = 'Dikonsumsi';
        }

        return 'Pengkonsumsian : '. $konsumsi . ' & '. 'Penggunaan : '. $pemakaian;//mengembalikan konsumsi dan penggunaan

    }
}
