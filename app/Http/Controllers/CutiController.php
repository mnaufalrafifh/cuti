<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CutiModel;
use App\Models\JenisCutiModel;
use App\Models\PegawaiModel;
use Exception;
use Illuminate\Support\Facades\Auth;

class CutiController extends DataCutiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CutiModel::join('jenis_cutis', 'cutis.id_jenisCuti', 'jenis_cutis.id')
        ->get();
        $jenis = JenisCutiModel::all();

        return view('admin.form-cuti.pengajuan-cuti.create', compact('data','jenis'));
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
                'nip' => 'required',
                'nama_lengkap' => 'required',
                'jenis_kelamin' => 'required',
                'jabatan' => 'required',
                'unit_kerja' => 'required',
                'masa_kerja' => 'required',
                'id_jenisCuti' => 'required',
                'alasan_cuti' => 'required',
                'jamKerja' => 'required',
                'mulai_cuti' => 'required',
                'akhir_cuti' => 'required',
                'alamat_cuti' => 'required',
                'no_telp' => 'required',
                'upload_file' => 'required|mimes:pdf'
            ],
            [
                'required' => ':Attribute harus terisi',
                'mimes' => ':Attribute harus berupa pdf'
            ],
            [
                'nip' => 'NIP',
                'nama_lengkap' => 'Nama Lengkap',
                'jenis_kelamin' => 'Jenis Kelamin',
                'jabatan' => 'Jabatan',
                'unit_kerja' => 'Unit Kerja',
                'masa_kerja' => 'Masa Kerja',
                'id_jenisCuti' => 'Jenis Cuti',
                'alasan_cuti' => 'Alasan Cuti',
                'jamKerja' => 'Jam Kerja',
                'mulai_cuti' => 'Mulai Cuti',
                'akhir_cuti' => 'Akhir Cuti',
                'alamat_cuti' => 'Alamat Cuti',
                'no_telp' => 'No Telepon',
                'upload_file' => 'File Persyaratan'
            ]
        );
        $file = $request->file('upload_file');
        $date = date("d-m-Y His");
        $final_file_name = $date . '.' . $file->getClientOriginalExtension();

        try {
            $tambahDataP = new PegawaiModel;
            $tambahDataP->nip = $request->get('nip');
            $tambahDataP->nama_lengkap = $request->get('nama_lengkap');
            $tambahDataP->jenis_kelamin = $request->get('jenis_kelamin');
            $tambahDataP->jabatan = $request->get('jabatan');
            $tambahDataP->unit_kerja = $request->get('unit_kerja');
            $tambahDataP->masa_kerja = $request->get('masa_kerja');
            $tambahDataP->id_pegawai = Auth::user()->id;
            $tambahDataP->save();

            // if ($request->get('jamKerja') == '5') {
            //     $lima = $this->cekLimaHari($request->get('mulai_cuti'), $request->get('akhir_cuti'));
            // } else {
            //     $enam = $this->cekHariLibur($request->get('mulai_cuti'), $request->get('akhir_cuti'));
            // }

            $tambahDataC = new CutiModel;
            $tambahDataC->id_jenisCuti = $request->get('id_jenisCuti');
            $tambahDataC->alasan_cuti = $request->get('alasan_cuti');
            $tambahDataC->mulai_cuti = $request->get('mulai_cuti');
            $tambahDataC->akhir_cuti = $request->get('akhir_cuti');
            $tambahDataC->lama_cuti = $request->get('jamKerja') == '5' ? $this->cekLimaHari($request->get('mulai_cuti'), $request->get('akhir_cuti')) : $this->cekHariLibur($request->get('mulai_cuti'), $request->get('akhir_cuti'));
            $tambahDataC->lama_kerja = $request->get('jamKerja');
            $tambahDataC->id_pegawai = $tambahDataP->id;
            $tambahDataC->alamat_cuti = $request->get('alamat_cuti');
            $tambahDataC->no_telp = $request->get('no_telp');
            $path = public_path('image\file_persyaratan');
            if ($file->move($path, $final_file_name)) {
                $tambahDataC->upload_file = $final_file_name;
            }
            $tambahDataC->save();
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
