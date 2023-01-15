<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CutiModel;
use App\Models\JenisCutiModel;
use App\Models\PegawaiModel;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
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
        ->orderBy('cutis.id', 'asc');
        if (Auth::user()->id_roles != 1 && Auth::user()->id_roles != 2) {
            $data2 = $data2->where('pegawais.id_pegawai',Auth::user()->id)->get();
            return view('admin.form-cuti.semua-data-cuti.index', compact('data2'));
        }else{
            $data2 = $data2->get();
            return view('admin.form-cuti.semua-data-cuti.index', compact('data2'));
        }
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

        $client = new Client;
        $res = $client->request('GET', env('SIMPEG_URL') . 'api/pegawai_simpeg/', [
            'query' => [
                'api_key' => env('BILLING_API_KEY'),
            ]
        ]);

        $body = (string) $res->getBody();
        $body = json_decode($body, true);
        $data_pegawai =  collect($body)->all();

        $jenis = JenisCutiModel::latest()->get();
        return view('admin.form-cuti.semua-data-cuti.edit', compact('data','jenis', 'data_pegawai'));
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
                'upload_file' => 'mimes:pdf'
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
        } catch (QueryException $e) {
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
        $client = new Client;
        $res = $client->request('GET', env('SIMPEG_URL') . 'api/pegawai_simpeg/', [
            'query' => [
                'api_key' => env('BILLING_API_KEY'),
            ]
        ]);

        $body = (string) $res->getBody();
        $body = json_decode($body, true);
        $data_pegawai =  collect($body)->all();
        $jenis = JenisCutiModel::latest()->get();
        return view('admin.form-cuti.semua-data-cuti.show', compact('data','jenis','data_pegawai'));
    }

    public function downloadPC($id)
    {
        $data = CutiModel::select('cutis.*','jenis_cutis.id as id_jenis','jenis_cutis.nama_cuti','jenis_cutis.lama_cuti','pegawais.id as id_pegawai',
        'pegawais.nip','pegawais.nama_lengkap','pegawais.jenis_kelamin','pegawais.jabatan',
        'pegawais.unit_kerja','pegawais.masa_kerja')
        ->join('jenis_cutis', 'cutis.id_jenisCuti', 'jenis_cutis.id')
        ->join('pegawais', 'cutis.id_pegawai', 'pegawais.id')
        ->where('cutis.id', $id)
        ->first();
        $client = new Client;
        $res = $client->request('GET', env('SIMPEG_URL') . 'api/pegawai_simpeg/', [
            'query' => [
                'api_key' => env('BILLING_API_KEY'),
            ]
        ]);

        $body = (string) $res->getBody();
        $body = json_decode($body, true);
        $data_pegawai =  collect($body)->all();
        $jenis = JenisCutiModel::latest()->get();

        return view('admin.form-cuti.semua-data-cuti.pdf', compact('data','jenis','data_pegawai'));
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

        $data =  CutiModel::select('cutis.*','jenis_cutis.id as id_jenis','jenis_cutis.nama_cuti','jenis_cutis.lama_cuti','pegawais.id as id_pegawai',
                                        'pegawais.nip','pegawais.nama_lengkap','pegawais.jenis_kelamin','pegawais.jabatan',
                                        'pegawais.unit_kerja','pegawais.masa_kerja')
                                ->join('jenis_cutis', 'cutis.id_jenisCuti', 'jenis_cutis.id')
                                ->join('pegawais', 'cutis.id_pegawai', 'pegawais.id')
                                ->where('cutis.id', $id)
                                ->first();
        $client = new Client;
        $res = $client->request('GET', env('SIMPEG_URL') . 'api/pegawai_simpeg/'.$data->nip, [
            'query' => [
                'api_key' => env('BILLING_API_KEY'),
            ]
        ]);

        $body = (string) $res->getBody();
        $body = json_decode($body, true);
        $data_pegawai =  collect($body)->all();
        // $to_date = Carbon::createFromFormat('Y-m-d', $data->akhir_cuti);
        // $from_date = Carbon::createFromFormat('Y-m-d', $data->mulai_cuti);
        // $answer_in_days = $to_date->diffInDays($from_date);
        // $answer_in_days += 1;
        $answer_in_days = $data->lama_kerja == '5' ? $this->cekLimaHari($data->mulai_cuti, $data->akhir_cuti) : $this->cekHariLibur($data->mulai_cuti, $data->akhir_cuti);
        $terbilang = ucwords($this->terbilang((int) $answer_in_days));
        if ($data->nama_cuti == 'Cuti Tahunan') {
            return view('cuti_tahunan', compact('data', 'answer_in_days', 'terbilang','data_pegawai'));
        }elseif ($data->nama_cuti == 'Cuti Besar') {
            return view('cuti_besar', compact('data', 'answer_in_days','terbilang','data_pegawai'));
        }elseif ($data->nama_cuti == 'Cuti Sakit') {
            return view('cuti_sakit', compact('data', 'answer_in_days','terbilang','data_pegawai'));

        }elseif ($data->nama_cuti == 'Cuti Melahirkan') {
            return view('cuti_melahirkan', compact('data', 'answer_in_days','terbilang','data_pegawai'));

        }elseif ($data->nama_cuti == 'Cuti Karena Alasan Penting') {
            return view('cuti_alasan_penting', compact('data', 'answer_in_days','terbilang','data_pegawai'));
        }elseif ($data->nama_cuti == 'Cuti Di Luar Tanggungan Negara') {

        }

    }
    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = $this->penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
        }
        return $temp;
    }

    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }

    public function cekHariLibur($startparam, $endparam)
    {
        $start = new DateTime($startparam);
        $end = new DateTime($endparam);
        // otherwise the  end date is excluded (bug?)
        $end->modify('+1 day');

        $interval = $end->diff($start);

        // total days
        $days = $interval->days;

        // create an iterateable period of date (P1D equates to 1 day)
        $period = new DatePeriod($start, new DateInterval('P1D'), $end);

        // best stored as array, so you can add more than one
        // $holidays = array('2012-09-07');

        foreach($period as $dt) {
            $curr = $dt->format('D');
            // substract if Saturday or Sunday
            if ( $curr == 'Sun' || $curr == 'Sat') {
                $days--;
            }

            // (optional) for the updated question
            // elseif (in_array($dt->format('Y-m-d'), $holidays)) {
            //     $days--;
            // }
        }
        return $days;
    }

    public function cekLimaHari($startparam, $endparam)
    {
        $start = strtotime($startparam);
        $end = strtotime($endparam);
        $count = 0;
        while(date('Y-m-d', $start) < date('Y-m-d', $end)){
          $count += date('N', $start) < 6 ? 1 : 0;
          $start = strtotime("+1 day", $start);
        }
        return $count;
    }

    public function tanggal_indo($tanggal)
    {
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }

}
