<?php

namespace App\Http\Controllers;

use App\Models\InformasiPengaduan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DirekapController extends Controller
{
    public function index(){
        return view('direkap');
    }

    public function ajaxTable(){
        $informasi_pelaporan =  InformasiPengaduan::with('tipe')
            ->with('kategori')
            ->with('prioritas')
            ->with('petugas')
            ->with('jenis')
            ->with('urgensi')
            ->with('userkl')
            ->with('dampak')
            ->Where('status','difasilitasi')->get();
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
            'petugas' => 'required:informasi_pelaporan',
            'keterangan' => 'required:informasi_pelaporan',
            'solusi' => 'required:informasi_pelaporan',
            'konfirmasi' => 'required:informasi_pelaporan',
        ], $pesan);
    }

    public function input(Request $request)
    {
        $date = date('Y-m_d');
        $status = 'difasilitasi';
        $tiket = date('Y') . sprintf("%03s", $no);
        $validasi = $this->validasiData($request->all());
        if ($validasi->passes()) {
            $informasi_pelaporan = new InformasiPengaduan;
            $informasi_pelaporan->no_tiket = $request->$tiket;
            $informasi_pelaporan->nama_pengguna = $request->nama_pengguna;
            $informasi_pelaporan->kontak_pengguna = $request->kontak_pengguna;
            $informasi_pelaporan->media_pelaporan = $request->media_pelaporan;
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
            $informasi_pelaporan->petugas_id = $request->petugas;
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
        $informasi_pelaporan = InformasiPengaduan::where('id_pengaduan', $id)->first();
        if($informasi_pelaporan->delete()){
            return json_encode(array("success"=>"Berhasil Menghapus Data Pengaduan :)"));
        }else{
            return json_encode(array("error"=>"Gagal Menghapus Data Pengaduan :("));
        }
    }

    public function laporan($id){
        $status = "difasilitasi";
        $informasi_pelaporan = InformasiPengaduan::where('status',$status)
            ->where ('id_pengaduan',$id)
            ->join ('tipes','informasi_pengaduans.tipe_id','=','tipes.id_tipe')
            ->join ('dampaks','informasi_pengaduans.dampak_id','=','dampaks.id_dampak')
            ->join ('jenis','informasi_pengaduans.jenis_id','=','jenis.id_jenis')
            ->join ('kategoris','informasi_pengaduans.kategori_id','=','kategoris.id_kategori')
            ->join ('petugas','informasi_pengaduans.petugas_id','=','petugas.id_petugas')
            ->join ('prioritas','informasi_pengaduans.prioritas_id','=','prioritas.id_prioritas')
            ->join ('urgensis','informasi_pengaduans.urgensi_id','=','urgensis.id_urgensi')
            ->join ('userkls','informasi_pengaduans.user_id','=','userkls.id_user')
            ->get();
        return view('hasilprint', compact('informasi_pelaporan'));
    }

    public function semua(Request $request)
    {
        $mulai = $request->start;
        $akhir = $request->end;
        $status = "difasilitasi";
        if($request->filled('start') && $request->filled('end')){
            $informasi_pelaporan = InformasiPengaduan::where('status',$status)
                ->join ('tipes','informasi_pengaduans.tipe_id','=','tipes.id_tipe')
                ->join ('dampaks','informasi_pengaduans.dampak_id','=','dampaks.id_dampak')
                ->join ('jenis','informasi_pengaduans.jenis_id','=','jenis.id_jenis')
                ->join ('kategoris','informasi_pengaduans.kategori_id','=','kategoris.id_kategori')
                ->join ('petugas','informasi_pengaduans.petugas_id','=','petugas.id_petugas')
                ->join ('prioritas','informasi_pengaduans.prioritas_id','=','prioritas.id_prioritas')
                ->join ('urgensis','informasi_pengaduans.urgensi_id','=','urgensis.id_urgensi')
                ->join ('userkls','informasi_pengaduans.user_id','=','userkls.id_user')
                ->whereBetween('tgl_selesai', [$mulai, $akhir])
                ->get();
        }else{
            $informasi_pelaporan = InformasiPengaduan::where('status',$status)
                ->join ('tipes','informasi_pengaduans.tipe_id','=','tipes.id_tipe')
                ->join ('dampaks','informasi_pengaduans.dampak_id','=','dampaks.id_dampak')
                ->join ('jenis','informasi_pengaduans.jenis_id','=','jenis.id_jenis')
                ->join ('kategoris','informasi_pengaduans.kategori_id','=','kategoris.id_kategori')
                ->join ('petugas','informasi_pengaduans.petugas_id','=','petugas.id_petugas')
                ->join ('prioritas','informasi_pengaduans.prioritas_id','=','prioritas.id_prioritas')
                ->join ('urgensis','informasi_pengaduans.urgensi_id','=','urgensis.id_urgensi')
                ->join ('userkls','informasi_pengaduans.user_id','=','userkls.id_user')
                ->get();
        }
        return view('hasilprint', compact('informasi_pelaporan'));
    }


}
