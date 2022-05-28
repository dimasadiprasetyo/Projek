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
        $validation = $request->validate([
            'name'=> 'required',
            'level'=>'required',
            'email'=>'required',
            'password'=>'required',
        ],
        [
                'name.required'=>'Lengkapi Data!',
                'level.required'=>'Lengkapi Data!',
                'email.required'=>'Lengkapi Data!',
                'password.required'=>'Lengkapi Data!',
        ]);
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

    public function edit(User $user){
        return view('admin.pengguna.edit', compact('user'));
    }

    public function update(UpdatePasswordRequest $request, User $user){
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);


     return redirect()->route('pengguna.edit')->withToastSuccess("User Berhasil Ditambahkan");
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('pengguna.index'))->with('success','Hapus Sukses');
    }
}
