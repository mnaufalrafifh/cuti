<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome  -->
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font-family: 'Tinos', serif;
            font: 12pt;
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        p, table, ol{
            font-size: 13.5pt;
        }
        @page {
            size: A4;
            margin-top: 0;
            margin-left: 75px;
            margin-bottom: 0;
            margin-right: 75px;
        }
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;   /* Chrome, Safari, Edge */
                color-adjust: exact !important;                 /*Firefox*/     /*Firefox*/
            }
            html, body {
                width: 210mm;
                height: 297mm;
            }
            .no-print, .no-print *
            {
                display: none !important;
            }
            .catatan-cuti, .keputusan-pejabat { page-break-before: always; }
        /* ... the rest of the rules ... */
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-start p-5 no-print">
        <button onclick="history.back()" class="btn btn-primary btn-icon-text no-print"><i class="ti-angle-left btn-icon-prepend"></i> Kembali</button>
    </div>
    <div class="p-4 my-5">
        <div class="container-fluid my-5" >
            <div class="d-flex justify-content-end">
                <div>
                    <div class="d-flex flex-column text-uppercase">
                        <p class="m-0" style="font-size: 14px !important">LAMPIRAN :</p>
                        <p class="m-0" style="font-size: 14px !important">PERATURAN BADAN KEPEGAWAIAN NEGARA RI NOMOR 2 TAHUN 2017</p>
                        <p class="m-0" style="font-size: 14px !important">TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="pt-4 d-flex flex-column ">
                            <p class="m-0 text-uppercase " style="font-size: 14px !important">Bondowoso, {{ \Carbon\Carbon::parse(now())->translatedFormat("d F Y") }}</p>
                            <center class="text-uppercase" style="font-size: 14px !important">Kepada</center>
                            <p class="m-0" style="font-size: 14px !important">Yth:</p><br>
                            <p class="m-0 px-4" style="font-size: 14px !important">di</p><br>
                            <p class="m-0" style="font-size: 14px !important"></p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="my-5">
                <div>
                    <h5 class="fw-bold text-center text-uppercase">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h5>
                </div>
                <div>
                    <div>
                        <h5 class="fw-bold text-uppercase">I. DATA PEGAWAI</h5>
                        <table class="table table-bordered table-responsive-sm w-100">
                            <thead>
                                <tr>
                                    <td width="6%">Nama</td>
                                    <td width="10%" class="">{{$data->nama_lengkap}}</td>
                                    <td width="10%">NIP</td>
                                    <td width="10%" class="">{{$data->nip}}</td>
                                </tr>
                                <tr>
                                    <td width="6%" valign=middle>Jabatan</td>
                                    <td width="20%" class=""><p style="font-size: 16px">{{$data->jabatan}}</p></td>
                                    <td width="10%">Masa Kerja</td>
                                    <td width="10%" class="">{{$data->masa_kerja}} Bulan</td>
                                </tr>
                                <tr>
                                    <td width="10%">Unit Kerja</td>
                                    <td colspan="10">{{$data->unit_kerja}}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="my-5">
                        <h5 class="fw-bold text-uppercase">II. JENIS CUTI YANG DI AMBIL **</h5>
                        <table class="table table-bordered table-responsive-sm w-100">
                            <thead>
                                <tr>
                                    <td width="20%">1. Cuti Tahunan</td>
                                    <td width="10%" class="fw-bold"> {!! $data->nama_cuti == 'Cuti Tahunan' ? "&#10004;" : '' !!}</td>
                                    <td width="20%">2. Cuti Besar</td>
                                    <td width="10%" class="fw-bold">{!! $data->nama_cuti == 'Cuti Besar' ? "&#10004;" : '' !!}</td>
                                </tr>
                                <tr>
                                    <td width="20%">3. Cuti Sakit </td>
                                    <td width="10%" class="fw-bold">{!! $data->nama_cuti == 'Cuti Sakit' ? "&#10004;" : '' !!}</td>
                                    <td width="20%">4. Cuti Melahirkan</td>
                                    <td width="10%" class="fw-bold">{!! $data->nama_cuti == 'Cuti Melahirkan' ? "&#10004;" : '' !!}</td>
                                </tr>
                                <tr>
                                    <td width="20%">5. Cuti Karena Alasan Penting</td>
                                    <td >{!! $data->nama_cuti == 'Cuti Karena Alasan Penting' ? "&#10004;" : '' !!}</td>
                                    <td width="20%">6. Cuti di Luar Tanggungan Negara</td>
                                    <td >{!! $data->nama_cuti == 'Cuti Di Luar Tanggungan Negara' ? "&#10004;" : '' !!}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="my-5">
                        <h5 class="fw-bold text-uppercase">III. ALASAN CUTI</h5>
                        <table class="table table-bordered table-responsive-sm w-100">
                            <thead>
                                <tr>
                                    <td width="20%">{{$data->alasan_cuti}}</td>

                                </tr>

                            </thead>
                        </table>
                    </div>

                    <div class="my-5">
                        <h5 class="fw-bold text-uppercase">IV. LAMANYA CUTI</h5>
                        <table class="table table-bordered table-responsive-sm w-100">
                            <thead>
                                <tr>
                                    <td width="2%">Selama</td>
                                    <td width="9%"> &nbsp; &nbsp; (hari/bulan/tahun)* </td>
                                    <td width="15%">mulai tanggal</td>
                                    <td width="15%" class="fw-bold"> {{ \Carbon\Carbon::parse($data->mulai_cuti)->translatedFormat("d F Y") }}</td>
                                    <td width="2%" >s/d</td>
                                    <td width="15%" class="fw-bold">{{ \Carbon\Carbon::parse($data->akhir_cuti)->translatedFormat("d F Y") }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="my-5 catatan-cuti">
                        <h5 class="fw-bold text-uppercase">V. CATATAN CUTI***</h5>
                        <table class="table table-bordered table-responsive-sm w-100">
                            <thead>
                                <tr>
                                    <td width="10%" colspan="3">1. CUTI TAHUNAN</td>
                                    <td width="10%">2. CUTI BESAR</td>
                                    <td width="10%" class="fw-bold"></td>
                                </tr>
                                <tr>
                                    <td width="10%">Tahun</td>
                                    <td width="10%">Sisa</td>
                                    <td width="10%">Keterangan</td>
                                    <td width="10%">3. CUTI SAKIT</td>
                                    <td width="10%" class="fw-bold"></td>
                                </tr>
                                <tr>
                                    <td width="10%">N-2</td>
                                    <td width="10%"></td>
                                    <td width="10%"></td>
                                    <td width="10%">4. CUTI MELAHIRKAN</td>
                                    <td width="10%" class="fw-bold"></td>
                                </tr>
                                <tr>
                                    <td width="10%">N-1</td>
                                    <td width="10%"></td>
                                    <td width="10%"></td>
                                    <td width="10%">5. CUTI KARENA ALASAN PENTING</td>
                                    <td width="10%" class="fw-bold"></td>
                                </tr>
                                <tr>
                                    <td width="10%">N</td>
                                    <td width="10%"></td>
                                    <td width="10%"></td>
                                    <td width="15%">6. CUTI DI LUAR TANGGUNGAN NEGARA</td>
                                    <td width="10%" class="fw-bold"></td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="my-5">
                        <h5 class="fw-bold text-uppercase">VI. ALAMAT SELAMA MENJALANKAN CUTI</h5>
                        <table class="table table-bordered table-responsive-sm w-100">
                            <thead>
                                <tr>
                                    <td width="70%">{{$data->alamat_cuti}}</td>
                                    <td width="5%">TELP</td>
                                    <td width="70%">{{$data->no_telp}}</td>
                                </tr>
                                <tr>
                                    <td style="border-right: none !important;" ></td>
                                    <td style="border: none;"></td>
                                    <td  style="border-left: none;">
                                        <p class="text-center">Hormat saya,</p>
                                        <div class="p-5"></div>
                                        <div class="d-flex justify-content-center">
                                            <div class="d-flex flex-column">
                                                <center><p class="m-0 p-0" style="font-size: 14px">({{$data->nama_lengkap}})</p></center>
                                                <p class="m-0 p-0" style="font-size: 14px">NIP. {{$data->nip}}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="my-5">
                        <h5 class="fw-bold text-uppercase">VII. PERTIMBANGAN ATASAN LANGSUNG**</h5>
                        <table class="table table-bordered table-responsive-sm w-100">
                            <thead>
                                <tr>
                                    <td width="10%">DISETUJUI</td>
                                    <td width="10%">PERUBAHAN****</td>
                                    <td width="10%">DITANGGUHKAN****</td>
                                    <td width="10%">TIDAK DISETUJUI****</td>
                                </tr>
                                <tr>
                                    <td width="10%">{!! $data->status == 'disetujui' ?  '&#10004;' : ''!!}</td>
                                    <td width="10%">{!! $data->status == 'Perubahan' ?  '&#10004;' : ''!!}</td>
                                    <td width="10%">{!! $data->status == 'Ditangguhkan' ?  '&#10004;' : ''!!}</td>
                                    <td width="10%">{!! $data->status == 'ditolak' ?  '&#10004;' : ''!!}</td>
                                </tr>
                            </thead>
                        </table>
                        <div class="d-flex justify-content-end w-100">
                            <div class="">
                                <p></p>
                                <div class="py-4"></div>
                                <center><p class="m-0">(&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;)</p><center>
                                <p class="d-flex justify-content-start">NIP : </p>
                            </div>
                        </div>
                    </div>

                    <div class="my-5 keputusan-pejabat">
                        <h5 class="fw-bold text-uppercase">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI** </h5>
                        <table class="table table-bordered table-responsive-sm w-100">
                            <thead>
                                <tr>
                                    <td width="10%">DISETUJUI</td>
                                    <td width="10%">PERUBAHAN****</td>
                                    <td width="10%">DITANGGUHKAN****</td>
                                    <td width="10%">TIDAK DISETUJUI****</td>
                                </tr>
                                <tr>
                                    <td width="10%">{!! $data->status == 'disetujui' ?  '&#10004;' : ''!!}</td>
                                    <td width="10%">{!! $data->status == 'Perubahan' ?  '&#10004;' : ''!!}</td>
                                    <td width="10%">{!! $data->status == 'Ditangguhkan' ?  '&#10004;' : ''!!}</td>
                                    <td width="10%">{!! $data->status == 'ditolak' ?  '&#10004;' : ''!!}</td>
                                </tr>
                            </thead>
                        </table>
                        <div class="d-flex justify-content-end w-100">
                            <div class="">
                                <p></p>
                                <div class="py-4"></div>
                                <center><p class="m-0">(&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;)</p><center>
                                <p class="d-flex justify-content-start">NIP : </p>
                            </div>
                        </div>
                    </div>
                    <div class="my-5">
                        <p>Catatan :</p>
                        <div class="d-flex flex-column">
                            <div class="">
                                <div class="d-flex flex-row">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="10%">
                                                <p class="m-0"> *  </p>
                                            </td>
                                            <td>
                                                <p class="">Coret yang tidak perlu</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="d-flex flex-row">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="10%">
                                                <p class="m-0"> ** </p>
                                            </td>
                                            <td>
                                                <p class="">Pilih salah satu dengan memberi tanda centang (v)</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="d-flex flex-row">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="10%">
                                                <p class="m-0"> *** </p>
                                            </td>
                                            <td>
                                                <p class="">diisi oleh pejabat yang menangani bidang kepegawaian sebelum PNS mengajukan cuti </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="d-flex flex-row">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="10%">
                                                <p class="m-0"> N </p>
                                            </td>
                                            <td>
                                                <p class="">= Cuti tahun berjalan</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="d-flex flex-row">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="10%">
                                                <p class="m-0"> N-1 </p>
                                            </td>
                                            <td>
                                                <p class="">= Sisa cuti 1 tahun sebelumnya</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="d-flex flex-row">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="10%">
                                                <p class="m-0"> N- 2 </p>
                                            </td>
                                            <td>
                                                <p class="">= Sisa cuti 2 tahun sebelumnya</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
     print();
</script>
</html>
