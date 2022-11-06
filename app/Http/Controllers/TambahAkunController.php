<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class TambahAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return view('admin.tambah-akun.create', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'id_roles' => 'required'
            ],
            [
                'required' => ':Attribute harus terisi'
            ],
            [
                'name' => 'Nama Lengkap',
                'email' => 'Email',
                'password' => 'Password',
                'id_roles' => 'Level Akun'
            ]
        );
        try {
            $tambahData = new User;
            $tambahData->name = $request->get('name');
            $tambahData->email = $request->get('email');
            $tambahData->password = Hash::make($request->get('password'));
            $tambahData->id_roles = $request->get('id_roles');
            $tambahData->save();
            return redirect()->back()->withStatus('Berhasil Menambahkan Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terjadi Kesalahan');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
