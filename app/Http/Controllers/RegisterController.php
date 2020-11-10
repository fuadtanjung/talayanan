<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    protected function  validasiData($data){
        $pesan = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'exists' => ':attribute tidak ditemukan'
        ];
        return validator($data, [
            'nip' => 'required|unique:users',
            'nama' => 'required',
            'kontak' => 'required',
            'username' => 'required',
            'password' => 'required',
        ], $pesan);
    }


    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        $role = 2;
        if($validasi->passes()){
            $user = new User();
            $user->name = $request->nama;
            $user->nip = $request->nip;
            $user->kontak = $request->kontak;
            $user->username= $request->username;
            $user->role_id = $role;
            $user->password = bcrypt($request->password);
            $user->remember_token = Str::random(30);

            $user->save();

            if($user->save()){
                return json_encode(array("success"=>"Berhasil Menambahkan Data Pengguna"));
            }else{
                return json_encode(array("error"=>"Gagal Menambahkan Data Pengguna"));
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
