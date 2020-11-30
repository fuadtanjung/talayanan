<?php

namespace App\Http\Controllers;

use App\Models\InformasiPengaduan;
use App\Models\Media;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MediaController extends Controller
{
    public function index(){
        return view('admin.penanganan.media');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_media' => 'required',
        ], $pesan);
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $media = new Media();
            $media->nama_media = $request->nama_media;

            if($media->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Media"));
            }
            else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Media"));
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
        $media =  Media::all();
        try {
            return Datatables::of($media)
                ->addColumn('action', function ($media) {
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
            $media = Media::where('id_media', $id)->first();
            $media->nama_media = $request->nama_media;

            if ($media->update()) {
                return json_encode(array("success" => "Berhasil Merubah Data Media :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data Media :("));
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
        if (InformasiPengaduan::where('media_id',$id)->count() == 0) {
            $media = Media::where('id_media', $id)->first();
            if ($media->delete()) {
                return json_encode(array("success" => "Berhasil Menghapus Data media :)"));
            } else {
                return json_encode(array("error" => "Gagal Menghapus Data media :("));
            }
        }
        else{
            return json_encode(array("error"=>"Gagal Data Sedang Di Pakai"));
        }
    }


}
