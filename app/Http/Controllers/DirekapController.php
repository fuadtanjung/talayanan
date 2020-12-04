<?php

namespace App\Http\Controllers;

use App\Models\InformasiPengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DirekapController extends Controller
{
    public function index(){
        $names = User::where('role_id','=','adm')->pluck('name');
        $initials = [];
        foreach($names as $name) {
            $nameParts = explode(' ', trim($name));
            $firstName = array_shift($nameParts);
            $lastName = array_pop($nameParts);
            $initials[$name] = (
                mb_substr($firstName,0,1) .
                mb_substr($lastName,0,1)
            );
        }
        return view('admin.direkap',(['initials'=>$initials]));
    }

    public function ajaxTable(){
        $informasi_pelaporan =  InformasiPengaduan:: join ('tipes','informasi_pengaduans.tipe_id','=','tipes.id_tipe')
            ->join ('dampaks','informasi_pengaduans.dampak_id','=','dampaks.id_dampak')
            ->join ('jenis','informasi_pengaduans.jenis_id','=','jenis.id_jenis')
            ->join ('kategoris','informasi_pengaduans.kategori_id','=','kategoris.id_kategori')
            ->join ('prioritas','informasi_pengaduans.prioritas_id','=','prioritas.id_prioritas')
            ->join ('urgensis','informasi_pengaduans.urgensi_id','=','urgensis.id_urgensi')
            ->join ('users','informasi_pengaduans.user_id','=','users.id')
            ->join ('roles','users.role_id','=','roles.id')
            ->join ('media','informasi_pengaduans.media_id','=','media.id_media')
            ->join ('status_konfirmasis','informasi_pengaduans.konfirmasi_id','=','status_konfirmasis.id_konfirmasi')
            ->where('status','=','difasilitasi')
            ->get();
        try {
            return Datatables::of($informasi_pelaporan)
                ->addColumn('action', function ($informasi) {
                    return "
                        <a href=\"#\" class=\"btn btn-sm btn-outline-success rounded-round\" title=\"Lihat Data\" data-popup=\"tooltip\" id=\"edit\"><i class=\"fa fa-eye\"></i></a>
                        <a href=\"#\" class=\"btn btn-sm btn-outline-primary rounded-round\" title=\"Print Data\" data-popup=\"tooltip\" id=\"print\"><i class=\"fa fa-print\"></i></a>
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
            'nama_pengguna' => 'required:informasi_pelaporan',
            'kontak_pengguna' => 'required:informasi_pelaporan',
            'deskripsi' => 'required:informasi_pelaporan',
            'waktu_pelaporan' => 'required:informasi_pelaporan',
            'media_pelaporan' => 'required:informasi_pelaporan',
            'tipe' => 'required:informasi_pelaporan',
            'kategori' => 'required:informasi_pelaporan',
            'user' => 'required:informasi_pelaporan',
            'jenis' => 'required:informasi_pelaporan',
            'urgensi' => 'required:informasi_pelaporan',
            'dampak' => 'required:informasi_pelaporan',
            'prioritas' => 'required:informasi_pelaporan',
            'keterangan' => 'required:informasi_pelaporan',
            'solusi' => 'required:informasi_pelaporan',
            'konfirmasi' => 'required:informasi_pelaporan',
        ], $pesan);
    }

    public function input(Request $request)
    {
        $date = date('Y-m_d');
        $status = 'difasilitasi';
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $informasi_pelaporan = new InformasiPengaduan;
            $informasi_pelaporan->nama_pengguna = $request->nama_pengguna;
            $informasi_pelaporan->kontak_pengguna = $request->kontak_pengguna;
            $informasi_pelaporan->media_id = $request->media_pelaporan;
            $informasi_pelaporan->deskripsi = $request->deskripsi;
            $informasi_pelaporan->waktu_pelaporan= $request->waktu_pelaporan;
            $informasi_pelaporan->kontak_pengguna = $request->kontak_pengguna;
            $informasi_pelaporan->kategori_id = $request->kategori;
            $informasi_pelaporan->tipe_id = $request->tipe;
            $informasi_pelaporan->user_id = $request->user;
            $informasi_pelaporan->urgensi_id = $request->urgensi;
            $informasi_pelaporan->prioritas_id = $request->prioritas;
            $informasi_pelaporan->jenis_id = $request->jenis;
            $informasi_pelaporan->dampak_id = $request->dampak;
            $informasi_pelaporan->keterangan = $request->keterangan;
            $informasi_pelaporan->solusi = $request->solusi;
            $informasi_pelaporan->status = $status;
            $informasi_pelaporan->status_pengguna = $request->konfirmasi;
            $informasi_pelaporan->tgl_pemuktahiran = $date;
            $informasi_pelaporan->tgl_selesai = $date;

            $informasi_pelaporan->save();



            if ($informasi_pelaporan->update()) {
                return json_encode(array("success" => "Berhasil Merubah Data Informasi :)"));
            } else {
                return json_encode(array("error" => "Gagal Merubah Data Informasi :("));
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

    public function laporan($id){
        $status = "difasilitasi";
        $informasi_pelaporan = InformasiPengaduan::join ('users','informasi_pengaduans.user_id','=','users.id')
            ->join ('media','informasi_pengaduans.media_id','=','media.id_media')
            ->join ('status_konfirmasis','informasi_pengaduans.konfirmasi_id','=','status_konfirmasis.id_konfirmasi')
            ->where('status',$status)->where ('no_tiket',$id)
            ->get();
        $names = User::where('role_id','=','adm')->pluck('name');
        $initials = [];
        foreach($names as $name) {
            $nameParts = explode(' ', trim($name));
            $firstName = array_shift($nameParts);
            $lastName = array_pop($nameParts);
            $initials[$name] = (
                mb_substr($firstName,0,1) .
                mb_substr($lastName,0,1)
            );
        }
        return view('admin.hasilprint',(['informasi_pelaporan'=>$informasi_pelaporan,'initials'=>$initials]));
    }

    public function semua(Request $request)
    {
        $mulai = $request->start;
        $akhir = $request->end;
        $status = "difasilitasi";
        if($request->filled('start') && $request->filled('end')){
            $informasi_pelaporan = InformasiPengaduan::join ('users','informasi_pengaduans.user_id','=','users.id')
                ->join ('media','informasi_pengaduans.media_id','=','media.id_media')
                ->join ('status_konfirmasis','informasi_pengaduans.konfirmasi_id','=','status_konfirmasis.id_konfirmasi')
                ->where('status',$status)
                ->whereBetween('tgl_selesai', [$mulai, $akhir])
                ->get();
            $names = User::where('role_id','=','adm')->pluck('name');
            $initials = [];
            foreach($names as $name) {
                $nameParts = explode(' ', trim($name));
                $firstName = array_shift($nameParts);
                $lastName = array_pop($nameParts);
                $initials[$name] = (
                    mb_substr($firstName,0,1) .
                    mb_substr($lastName,0,1)
                );
            }
        }else{
            $informasi_pelaporan = InformasiPengaduan::join ('users','informasi_pengaduans.user_id','=','users.id')
                ->join ('media','informasi_pengaduans.media_id','=','media.id_media')
                ->join ('status_konfirmasis','informasi_pengaduans.konfirmasi_id','=','status_konfirmasis.id_konfirmasi')
                ->get();
            $names = User::where('role_id','=','adm')->pluck('name');
            $initials = [];
            foreach($names as $name) {
                $nameParts = explode(' ', trim($name));
                $firstName = array_shift($nameParts);
                $lastName = array_pop($nameParts);
                $initials[$name] = (
                    mb_substr($firstName,0,1) .
                    mb_substr($lastName,0,1)
                );
            }
        }
        return view('admin.hasilprint',(['informasi_pelaporan'=>$informasi_pelaporan,'initials'=>$initials]));
    }
}
