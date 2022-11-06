<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisCutiModel;

class JenisCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JenisCutiModel::all();

        return view('admin.form-cuti.jenis-cuti.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form-cuti.jenis-cuti.create');
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
                'nama_cuti' => 'required',
                'lama_cuti' => 'required'
            ],
            [
                'required' => ':Attribute harus terisi',
                'required' => ':Attribute harus terisi'
            ],
            [
                'nama_cuti' => 'Jenis Cuti',
                'lama_cuti' => 'Lama Cuti'
            ]
        );
        try{
            $tambahData = new JenisCutiModel;
            $tambahData->nama_cuti = $request->get('nama_cuti');
            $tambahData->lama_cuti = $request->get('lama_cuti');
            $tambahData->save();
            return redirect()->route('jenis-cuti.index')->withStatus('Berhasil Menambahkan Data');
        }catch (Exception $e) {
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
        $data = JenisCutiModel::find($id);
        return view('admin.form-cuti.jenis-cuti.edit', compact('data'));
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
                'nama_cuti' => 'required',
                'lama_cuti' => 'required'
            ],
            [
                'required' => ':Attribute harus terisi'
            ],
            [
                'nama_cuti' => 'Jenis Cuti',
                'lama_cuti' => 'Lama Cuti'
            ]
        );
        try {
            $updateData = JenisCutiModel::find($id);
            $updateData->nama_cuti = $request->get('nama_cuti');
            $updateData->lama_cuti = $request->get('lama_cuti');
            $updateData->update();
            return redirect()->route('jenis-cuti.index')->withStatus('Berhasil Merubah Data');
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
        $deleteData = JenisCutiModel::find($id);
        $deleteData->delete();
        return redirect()->route('jenis-cuti.index')->withStatus('Berhasil Menghapus Data');
    }
}
