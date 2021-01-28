<?php

namespace App\Http\Controllers;

use App\Models\InformasiPengaduan;
use App\Models\User;
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
            'pengaduan' => 'required:informasi_pelaporan',
        ], $pesan);
    }

    public function ajaxTable(){
        $pengaduan =  InformasiPengaduan::where('user_id',auth()->user()->id)
            ->where('status','=','diajukan')
            ->get();
        try {
            return Datatables::of($pengaduan)
                ->addColumn('action', function ($pengaduan) {
                    return "
                        <a href=\"#\" class=\"btn btn-sm btn-outline-success rounded-round\" id=\"edit\"><i class=\"icon-pencil5\"></i> Edit </a>
                        <a href=\"#\" class=\"btn btn-sm btn-outline-danger rounded-round\" id=\"delete\"><i class=\"icon-trash\"></i> Hapus </a>
                    ";
                })
                ->make(true);
        } catch (\Exception $e) {
        }
    }

    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        $media = 1;
        $status = 'diajukan';
        if ($validasi->passes()) {
            $informasi_pelaporan = new InformasiPengaduan;
            $informasi_pelaporan->user_id = $request->user_id;
            $informasi_pelaporan->deskripsi = $request->pengaduan;
            $informasi_pelaporan->status = $status;
            $informasi_pelaporan->media_id = $media;
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

    public function edit($id, Request $request)
    {
        $validasi = $this->validasiData($request->all());
        $media = 1;
        $status = 'diajukan';
        if ($validasi->passes()) {
            $informasi_pelaporan = InformasiPengaduan::where('no_tiket', $id)->first();
            $informasi_pelaporan->user_id = $request->user_id;
            $informasi_pelaporan->deskripsi = $request->pengaduan;
            $informasi_pelaporan->status = $status;
            $informasi_pelaporan->media_id = $media;
            $informasi_pelaporan->waktu_pelaporan = date('Y-m-d');
            if ($informasi_pelaporan->update()) {
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
        $report = InformasiPengaduan::where('no_tiket', $id)->first();
        if($report->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Pengaduan"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Pengaduan"));
        }
    }


    public function process(){
        return view('user.process');
    }

    public function dataprocess(){
        $pengaduan =  InformasiPengaduan::join('users','informasi_pengaduans.user_id','=','users.id')
            ->join('media','informasi_pengaduans.media_id','=','media.id_media')
            ->where('status','=','diproses')
            ->where('user_id',auth()->user()->id)
            ->get();
        try {
            return Datatables::of($pengaduan)
                ->addColumn('action', function ($pengaduan) {
                    return "
                        <a href=\"#\" class=\"btn btn-sm btn-outline-success rounded-round\" id=\"edit\"><i class=\"icon-eye\"></i> Detail </a>
                    ";
                })
                ->make(true);
        } catch (\Exception $e) {
        }
    }


    public function history(){
        return view('user.history');
    }

    public function datahistory(){
        $pengaduan =  InformasiPengaduan::where('status','=','difasilitasi')
            ->where('user_id',auth()->user()->id)
            ->get();
        try {
            return Datatables::of($pengaduan)->make(true);
        } catch (\Exception $e) {
        }
    }



    public function profile(){
        return view('user.profile');
    }

    protected function  validasiEdit($data)
    {
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan',
            'min' => ':attribute minimal 10 nomor',
            'max' => ':attribute maximal 12 nomor',
            'email' => ':attribute yang sesuai'
        ];
        return validator($data, [
            'nama' => 'required',
            'kontak' =>  'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:12',
            'email' => 'required|email:rfc',
            'user' => 'required',
        ], $pesan);
    }

    public function editprofile(){
        $validasi = $this->validasiEdit(request()->all());
        if ($validasi->passes()) {
           $edit = User::where('id', auth()->user()->id)
               ->update([
                   'name' => request()->nama,
                   'kontak' => request()->kontak,
                   'email' => request()->email,
                   'role_id' => request()->user,
               ]);
            if($edit){
                return json_encode(array("success"=>"Berhasil Mengubah Data Profile"));
            }else{
                return json_encode(array("error"=>"Gagal Mengubah Data Profile"));
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

    protected function  validasiPassword($data)
    {
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
        ];
        return validator($data, [
            'password' => 'required'
        ], $pesan);
    }

    public function editpassword(){
        $validasi = $this->validasiPassword(request()->all());
        if ($validasi->passes()) {
           $edit = User::where('id', auth()->user()->id)
               ->update([
                   'password' => bcrypt(request()->password),
               ]);
            if($edit){
                return json_encode(array("success"=>"Berhasil Mengubah Password"));
            }else{
                return json_encode(array("error"=>"Gagal Mengubah Password"));
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
}
