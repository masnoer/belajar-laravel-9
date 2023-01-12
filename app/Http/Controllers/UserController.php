<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\Models\User::all();
        return view("users.index",["user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi form inputan
        $request->validate([
            "nama"  =>"required|min:5",
            "username"  => "required|unique:users",
            "email"     => "required|email",
            "password"  => "required|min:8|alpha-num",
            "level"     => "required"
        ]);
        

        $user = new \App\Models\User;
        $user->name = $request->get("nama");
        $user->username = $request->get("username");
        $user->email = $request->get("email");
        $user->password = \Hash::make($request->get("password"));
        $user->level = json_encode($request->get("level"));

        // simpan kedalam tabel users
        $save = $user->save();
        if ($save) {
            Alert::success('Informasi', 'user berhasil ditambahkan');
        }else{
            Alert::danger('Informasi', 'user gagal ditambahkan');
        }
        return redirect('users');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\Models\User::FindOrFail($id);
        return view('users.edit', ['user'   => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $user = \App\Models\User::FindOrFail($id);
        $user->name = $request->get("nama");
        $user->username = $request->get("username");
        $user->email = $request->get("email");
        $user->password = \Hash::make($request->get("password"));
        $user->level = json_encode($request->get("level"));

        // simpan kedalam tabel users
        $update = $user->save();
        if ($update) {
            Alert::toast('user berhasil diubah', 'success');
        }else{
            Alert::toast('user gagal diubah', 'danger');
        }
        return redirect('users');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\Models\User::FindOrFail($id);
        // hapus user didalam tabel users
        $delete = $user->delete();
        if ($delete) {
            Alert::toast('user berhasil dihapus', 'success');
        }else{
            Alert::toast('user gagal dihapus', 'danger');

        }
        return redirect('users');
    }
}
