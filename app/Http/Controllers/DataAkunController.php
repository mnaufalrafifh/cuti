<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class DataAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')
        ->join('roles', 'users.id_roles', '=', 'roles.id')
        ->select('users.*', 'roles.nama_role')
        ->orderBy('users.id', 'asc')
        ->get();
        return view('admin.data-akun.index', compact('data'));
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
        //
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
        // $data = DB::table('users')
        // ->join('roles', 'users.id_roles', '=', 'roles.id')
        // ->select('users.*', 'roles.nama_role')
        // ->get()
        // ->first();

        $data = User::select('users.*', 'roles.id as id_roles', 'roles.nama_role')
        ->join('roles', 'users.id_roles', 'roles.id')
        ->where('users.id', $id)
        ->first();
        $role = Role::all();

        return view('admin.data-akun.edit', compact('data', 'role'));
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
        $request->validate(
        [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'id_roles' => 'required',
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
            $updateData = User::find($id);
            $updateData->name = $request->get('name');
            $updateData->email = $request->get('email');
            $updateData->password = Hash::make($request->get('password'));
            $updateData->id_roles = $request->get('id_roles');
            $updateData->update();
            return redirect()->route('data-akun.index')->withStatus('Berhasil Merubah Data');
        } catch (Exception $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $deleteData = User::find($id);
       $deleteData->delete();

       return redirect()->route('data-akun.index')->withStatus('Berhasil Menghapus Data');
    }
}
