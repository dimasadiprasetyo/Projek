<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PenggunaController extends Controller
{
    public function index(){
        $pengguna = User::all();
        return view('admin.Pengguna.index', compact('pengguna'));
    }

    public function create(){
        return view('admin.Pengguna.tambah');
    }

    public function store(Request $request){
        User::create([
            'name'=>$request->name,
            'level'=>$request->level,
            'email'=>$request->email,
            'email_verified_at'=>$request->email_verified_at,
            'password'=> (new BcryptHasher)->make($request->password),
            'remember_token' =>  Str::random(60),
        ]);
        return redirect(route('pengguna.index'))->withToastSuccess("User Berhasil Ditambahkan");
    }

    public function edit(){
        return view('admin.pengguna.edit');
    }

    public function update(UpdatePasswordRequest $request){
    $request->user()->update([
        'password' => Hash::make($request->get('password'))
    ]);

    return redirect()->route('pengguna.edit')->withToastSuccess("User Berhasil Ditambahkan");
    }

    public function destroy(User $user){
        $user->delete();
        return redirect(route('pengguna.index'))->with('success','Hapus Sukses');
    }
}
