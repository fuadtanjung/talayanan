<?php

namespace App\Http\Controllers;

use App\Models\InformasiPengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DiprosesController extends Controller
{
    public function index(){
        return view('admin.diproses');
    }

    public function ajaxTable(){
        $informasi_pelaporan =  InformasiPengaduan::join('users','informasi_pengaduans.user_id','=','users.id')
            ->join('roles','users.role_id','=','roles.id')
            ->join('media','informasi_pengaduans.media_id','=','media.id_media')
            ->Where('status','=','diproses')
            ->get();
        try {
            return Datatables::of($informasi_pelaporan)
                ->addColumn('action', function ($informasi) {
                    return "
                        <a href=\"#\" class=\"btn btn-sm btn-outline-success rounded-round\" title=\"Update Data\" data-popup=\"tooltip\" id=\"edit\"><i class=\"fa fa-edit\"></i></a>
                        <a href=\"#\" class=\"btn btn-sm btn-outline-danger rounded-round\" title=\"Hapus Data\" data-popup=\"tooltip\" id=\"delete\"><i class=\"fa fa-trash\"></i> </a>
                    ";
                })
                ->make(true);
        } catch (\Exception $e) {

        }
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nama_pengguna' => 'required',
            'kontak_pengguna' => 'required',
            'deskripsi' => 'required',
            'tipe' => 'required',
            'kategori' => 'required',
            'jenis' => 'required',
            'urgensi' => 'required',
            'dampak' => 'required',
            'prioritas' => 'required',
            'keterangan' => 'required',
            'solusi' => 'required',
            'konfirmasi' => 'required',
        ], $pesan);
    }


    public function edit($id, Request $request)
    {
        $validasi = $this->validasiData($request->all());
        $status = 'difasilitasi';
        if ($validasi->passes()) {
            $informasi_pelaporan = InformasiPengaduan::where('no_tiket', $id)->first();
            $informasi_pelaporan->kategori_id = $request->kategori;
            $informasi_pelaporan->tipe_id = $request->tipe;
            $informasi_pelaporan->urgensi_id = $request->urgensi;
            $informasi_pelaporan->prioritas_id = $request->prioritas;
            $informasi_pelaporan->jenis_id = $request->jenis;
            $informasi_pelaporan->dampak_id = $request->dampak;
            $informasi_pelaporan->konfirmasi_id = $request->konfirmasi;
            $informasi_pelaporan->keterangan = $request->keterangan;
            $informasi_pelaporan->solusi = $request->solusi;
            $informasi_pelaporan->status = $status;
            $informasi_pelaporan->status_pengguna = $request->konfirmasi;
            $informasi_pelaporan->tgl_pemuktahiran = date('Y-m-d');
            $informasi_pelaporan->tgl_selesai = date('Y-m-d');
            $informasi_pelaporan->update();

            $no_tiket = $request->no_tiket;
            $konfirmasi = $request->konfirmasi;
            if ($informasi_pelaporan){
                $data =  InformasiPengaduan::where('no_tiket',$no_tiket)
                    ->where('id_konfirmasi',$konfirmasi)
                    ->join('status_konfirmasis','informasi_pengaduans.konfirmasi_id','status_konfirmasis.id_konfirmasi')
                    ->select('status_konfirmasis.nama_konfirmasi')
                    ->first();

               $my_apikey = 'LBGMSEQL392UXY7C0Y36';
               $nohape = $request->kontak_pengguna;
               if($nohape['0']=='0') {
                   $nohape['0']='2';
                   $nohape = '6'.$nohape;
               }
               $message = "Pengaduan Anda Dengan No. Tiket : $request->no_tiket Telah $data->nama_konfirmasi";
               $api_url = "http://panel.rapiwha.com/send_message.php";
               $api_url .= "?apikey=". urlencode ($my_apikey);
               $api_url .= "&number=". urlencode ($nohape);
               $api_url .= "&text=". urlencode ($message);

               $my_result_object = json_decode(file_get_contents($api_url, false));

               $result = [$my_result_object->success , $my_result_object->description , $my_result_object->description];
               json_encode($result);

                return json_encode(array("success" => "Berhasil Merubah Data Pengaduan :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data Pengaduan :("));
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
        $informasi_pelaporan = InformasiPengaduan::where('no_tiket', $id)->first();
        if($informasi_pelaporan->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Pengaduan :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Pengaduan :("));
        }
    }
}
