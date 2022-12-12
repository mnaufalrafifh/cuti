<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CutiModel;
use App\Models\JenisCutiModel;
use App\Models\PegawaiModel;
use PDF;

class DataCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data2 = CutiModel::select('cutis.*','jenis_cutis.id as id_jenis','jenis_cutis.nama_cuti','jenis_cutis.lama_cuti','pegawais.id as id_pegawai',
        'pegawais.nip','pegawais.nama_lengkap','pegawais.jenis_kelamin','pegawais.jabatan',
        'pegawais.unit_kerja','pegawais.masa_kerja')
        ->join('jenis_cutis', 'cutis.id_jenisCuti', 'jenis_cutis.id')
        ->join('pegawais', 'cutis.id_pegawai', 'pegawais.id')
        ->orderBy('cutis.id', 'asc')
        ->get();
        return view('admin.form-cuti.semua-data-cuti.index', compact('data2'));
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
        $data = CutiModel::select('cutis.*','jenis_cutis.id as id_jenis','jenis_cutis.nama_cuti','jenis_cutis.lama_cuti','pegawais.id as id_pegawai',
        'pegawais.nip','pegawais.nama_lengkap','pegawais.jenis_kelamin','pegawais.jabatan',
        'pegawais.unit_kerja','pegawais.masa_kerja')
        ->join('jenis_cutis', 'cutis.id_jenisCuti', 'jenis_cutis.id')
        ->join('pegawais', 'cutis.id_pegawai', 'pegawais.id')
        ->where('cutis.id', $id)
        ->first();

        $jenis = JenisCutiModel::latest()->get();
        return view('admin.form-cuti.semua-data-cuti.edit', compact('data','jenis'));
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
                'nip' => 'required',
                'nama_lengkap' => 'required',
                'jenis_kelamin' => 'required',
                'jabatan' => 'required',
                'unit_kerja' => 'required',
                'masa_kerja' => 'required',
                'id_jenisCuti' => 'required',
                'alasan_cuti' => 'required',
                'mulai_cuti' => 'required',
                'akhir_cuti' => 'required',
                'alamat_cuti' => 'required',
                'no_telp' => 'required',
                'upload_file' => 'mimes:png,jpg,jpeg'
            ],
            [
                'required' => ':Attribute harus terisi',
                'mimes' => ':Attribute harus berupa jpg,jpeg, atau png'
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
                'mulai_cuti' => 'Mulai Cuti',
                'akhir_cuti' => 'Akhir Cuti',
                'alamat_cuti' => 'Alamat Cuti',
                'no_telp' => 'No Telepon',
                'upload_file' => 'File Persyaratan'
            ]
        );


        try {
            $updateDataP = PegawaiModel::where('id', $request->get('id_pegawai'))->update([
               'nip' => $request->get('nip'),
               'nama_lengkap' => $request->get('nama_lengkap'),
               'jenis_kelamin' => $request->get('jenis_kelamin'),
               'jabatan' => $request->get('jabatan'),
               'unit_kerja' => $request->get('unit_kerja'),
               'masa_kerja'=> $request->get('masa_kerja'),

            ]);

            $updateDataC = CutiModel::find($id);
            $updateDataC->id_jenisCuti = $request->get('id_jenisCuti');
            $updateDataC->alasan_cuti = $request->get('alasan_cuti');
            $updateDataC->mulai_cuti = $request->get('mulai_cuti');
            $updateDataC->akhir_cuti = $request->get('akhir_cuti');
            $updateDataC->lama_cuti = $request->get('lama_cuti');
            $updateDataC->alamat_cuti = $request->get('alamat_cuti');
            $updateDataC->no_telp = $request->get('no_telp');
            if ($request->hasFile('upload_file')) {
                $last_path = public_path('').'/image/file_persyaratan/'.$updateDataC->upload_file;
                unlink($last_path);
                $file = $request->file('upload_file');
                $date = date("d-m-Y His");
                $final_file_name = $date . '.' . $file->getClientOriginalExtension();
                $path = public_path('image\file_persyaratan');
                if ($file->move($path, $final_file_name)) {
                    $updateDataC->upload_file = $final_file_name;
                }

            }
            $updateDataC->update();
            return redirect()->route('data-cuti.index')->withStatus('Berhasil Merubah Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terjadi Kesalahan');
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
        $deleteData = CutiModel::find($id);
        PegawaiModel::where('id',$deleteData->id_pegawai)->delete();
        $deleteData->delete();
        return redirect()->route('data-cuti.index')->withStatus('Berhasil Menghapus Data');
    }

    public function status($id)
    {
        $data = CutiModel::select('cutis.*','jenis_cutis.id as id_jenis','jenis_cutis.nama_cuti','jenis_cutis.lama_cuti','pegawais.id as id_pegawai',
        'pegawais.nip','pegawais.nama_lengkap','pegawais.jenis_kelamin','pegawais.jabatan',
        'pegawais.unit_kerja','pegawais.masa_kerja')
        ->join('jenis_cutis', 'cutis.id_jenisCuti', 'jenis_cutis.id')
        ->join('pegawais', 'cutis.id_pegawai', 'pegawais.id')
        ->where('cutis.id', $id)
        ->first();

        $jenis = JenisCutiModel::latest()->get();
        return view('admin.form-cuti.semua-data-cuti.show', compact('data','jenis'));

    }
    public function UpdateStatus(Request $request, $id)
    {
        $updateDataC = CutiModel::find($id);
        $updateDataC->status = $request->get('status');
        $updateDataC->update();
        return redirect()->route('data-cuti.index')->withStatus('Berhasil mengganti status');
    }

    public function download($id)
    {

        $dataCuti =  CutiModel::select('cutis.*','jenis_cutis.id as id_jenis','jenis_cutis.nama_cuti','jenis_cutis.lama_cuti','pegawais.id as id_pegawai',
                                        'pegawais.nip','pegawais.nama_lengkap','pegawais.jenis_kelamin','pegawais.jabatan',
                                        'pegawais.unit_kerja','pegawais.masa_kerja')
                                ->join('jenis_cutis', 'cutis.id_jenisCuti', 'jenis_cutis.id')
                                ->join('pegawais', 'cutis.id_pegawai', 'pegawais.id')
                                ->where('cutis.id', $id)
                                ->first();
        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database
        return view('cuti_besar',['data' => $dataCuti]);
        // $pdf = PDF::loadview('cuti_besar',['data'=> $dataCuti]);
        // $pdf->setPaper('A3','landscape');
        // $data = PDF::loadview('cuti_besar', ['data' => $dataCuti])->setOptions(['defaultFont' => 'sans-serif']);
        //mendownload laporan.pdf
        // return $pdf->stream();
    	// return $data->download('laporan.pdf');
    }
}
