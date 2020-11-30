<?php

namespace App\Http\Controllers;

use App\Models\InformasiPengaduan;
use App\Models\Urgensi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UrgensiController extends Controller
{
    public function index(){
        return view('admin.klasifikasi.urgensi');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_urgensi' => 'required:Urgensi ',
            'singkatan' => 'required:Urgensi',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $urgensi = new Urgensi;
            $urgensi->nama_urgensi = $request->nama_urgensi;
            $urgensi->id_urgensi = $request->singkatan;

            if($urgensi->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Urgensi"));
            }
            else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Urgensi"));
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
        $urgensi =  Urgensi::all();
        try {
            return Datatables::of($urgensi)
                ->addColumn('action', function ($userss) {
                    return "
                      <a href=\"#\" class=\"btn btn-sm btn-outline-success rounded-round\" id=\"edit\"><i class=\"icon-pencil\"></i> Edit </a>
                        <a href=\"#\" class=\"btn btn-sm btn-outline-danger rounded-round\" id=\"delete\"><i class=\"icon-trash\"></i> Hapus </a>
                    ";
                })
                ->make(true);
        } catch (\Exception $e) {
        }
    }
    public function edit($id, Request $request){
        $validasi = $this->validasiData($request->all());
        if($validasi->passes()) {
            $urgensi = Urgensi::where('id_urgensi', $id)->first();
            $urgensi->nama_urgensi = $request->nama_urgensi;
            $urgensi->id_urgensi = $request->singkatan;

            if ($urgensi->update()) {
                return json_encode(array("success" => "Berhasil Merubah Data Urgensi :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data Urgensi :("));
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

    public function delete($id){
        if (InformasiPengaduan::where('urgensi_id',$id)->count() == 0) {
            $urgensi = Urgensi::where('id_urgensi', $id)->first();
            if($urgensi->delete()){
                return json_encode(array("success"=>"Berhasil Menghapus Data Urgensi :)"));
            }else{
                return json_encode(array("error"=>"Gagal Menghapus Data Urgensi :("));
            }

        }
        else{
            return json_encode(array("error"=>"Gagal Data Sedang Di Pakai"));
        }
    }
}
