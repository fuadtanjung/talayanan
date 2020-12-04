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
            'nama' => 'required',
            'kontak' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ], $pesan);
    }


    public function input(Request $request){
        $validasi = $this->validasiData($request->all());
        if($validasi->passes()){
            $user = new User();
            $user->name = $request->nama;
            $user->kontak = $request->kontak;
            $user->email= $request->email;
            $user->role_id = $request->role;
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
