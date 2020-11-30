<?php

namespace App\Http\Controllers;

use App\Models\InformasiPengaduan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total = InformasiPengaduan::where('user_id',auth()->user()->id)->get();
        $diajukan = InformasiPengaduan::where('user_id',auth()->user()->id)
            ->where('status','=','diajukan')
            ->get();
        $diproses = InformasiPengaduan::where('user_id',auth()->user()->id)
            ->where('status','=','diproses')
            ->get();
        $difasilitasi = InformasiPengaduan::where('user_id',auth()->user()->id)
            ->where('status','=','difasilitasi')
            ->get();

        $admtotal = InformasiPengaduan::get();
        $admdiajukan = InformasiPengaduan::where('status','=','diajukan')
            ->get();
        $admdiproses = InformasiPengaduan::where('status','=','diproses')
            ->get();
        $admdifasilitasi = InformasiPengaduan::where('status','=','difasilitasi')
            ->get();


        return view('home',
            compact('total','diajukan','diproses','difasilitasi'
            ,'admtotal','admdiajukan','admdiproses','admdifasilitasi'
            ));
    }
}
