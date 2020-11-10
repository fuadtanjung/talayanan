<?php

namespace App\Http\Controllers;

use App\Models\InformasiPengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengaduanController extends Controller
{
    public function index(){
        return view('user.index');
    }

    protected function  validasiData($data)
    {
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_pengguna' => 'required:informasi_pelaporan',
            'kontak_pengguna' => 'required:informasi_pelaporan',
            'deskripsi' => 'required:informasi_pelaporan',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        $media = 'aplikasi';
        $status = 'diajukan';
        $no = InformasiPengaduan::max('id_pengaduan');
        $tiket = date('Y') .'-'. sprintf("%03s", $no);
        if ($validasi->passes()) {
            $informasi_pelaporan = new InformasiPengaduan;
            $informasi_pelaporan->users_id = $request->id_pengaduan;
            $informasi_pelaporan->no_tiket = $tiket;
            $informasi_pelaporan->nama_pengguna = $request->nama_pengguna;
            $informasi_pelaporan->kontak_pengguna = $request->kontak_pengguna;
            $informasi_pelaporan->deskripsi = $request->deskripsi;
            $informasi_pelaporan->status = $status;
            $informasi_pelaporan->media_pelaporan = $media;
            $informasi_pelaporan->waktu_pelaporan = date('Y-m-d');
            if($informasi_pelaporan->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Pengaduan"));
            }
            else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Pengaduan"));
            }
        }else{
            $msg = $validasi->getMessageBag()->messages();
            $err = array();
            foreach ($msg as $key=>$item) {
                $err[] = $item[0];
            }
            return json_encode(array("error"=>$err));
        }
    }

    public function ajaxTable(){
        $pengaduan =  InformasiPengaduan::where('status','=','diajukan')->orWhere('status','=','ditangani')
        ->where('users_id',auth()->user()->id)
            ->get();
        try {
            return Datatables::of($pengaduan)
                ->addColumn('action', function ($pengaduan) {
                    return "
                        <a href=\"#\" class=\"btn btn-sm btn-outline-success rounded-round\" id=\"edit\"><i class=\"icon-pencil\"></i> Edit </a>
                        <a href=\"#\" class=\"btn btn-sm btn-outline-danger rounded-round\" id=\"delete\"><i class=\"icon-trash\"></i> Hapus </a>
                    ";
                })
                ->make(true);
        } catch (\Exception $e) {
        }
    }

    public function delete($id){
        $report = InformasiPengaduan::where('id_pengaduan', $id)->where('status','=','diajukan')->first();
        if($report->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Pengaduab"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Pengaduan"));
        }
    }


    public function history(){
        return view('user.history');
    }

    public function datahistory(){
        $pengaduan =  InformasiPengaduan::where('status','=','difasilitasi')->where('users_id',auth()->user()->id)->get();
            return Datatables::of($pengaduan)->toJson();
    }

}
