<?php

namespace App\Http\Controllers;

use App\Models\Dampak;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Petugas;
use App\Models\Prioritas;
use App\Models\Tipe;
use App\Models\Urgensi;
use App\Models\Userkl;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function listKategori(){
        $kategori = Kategori::all();
        return json_encode($kategori);
    }
    public function listTipe(){
        $tipe = Tipe::all();
        return json_encode($tipe);
    }
    public function listUser(){
        $User = Userkl::all();
        return json_encode($User);
    }
    public function listUrgensi(){
        $urgensi = Urgensi::all();
        return json_encode($urgensi);
    }
    public function listPrioritas(){
        $prioritas = Prioritas::all();
        return json_encode($prioritas);
    }
    public function listJenis(){
        $jenis = Jenis::all();
        return json_encode($jenis);
    }
    public function listDampak(){
        $dampak = Dampak::all();
        return json_encode($dampak);
    }
    public function listPetugas(){
        $petugas = Petugas::all();
        return json_encode($petugas);
    }
}
