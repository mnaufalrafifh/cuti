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
        /* ... the rest of the rules ... */
        }
    </style>
</head>
<body>
    <div class="p-4 my-5">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="d-flex justify-content-center">
                    <div class="align-items-end p-0">
                        <img src="{{ asset('back-end/assets/img/logosurat.jpg') }}" class="img-fluid me-auto" width="120" alt="">
                    </div>
                    <div class="align-self-center p-0 ">
                        <div class="row">
                            <div class="col-md-12 me-auto ">
                                <h1 class="text-center p-0 m-0" style="font-size: 16px; letter-spacing: 0.4ch">PEMERINTAH KABUPATEN BONDOWOSO <br>
                                </h1>
                                <h1 class="text-center fw-bold p-0 m-0" style="font-size: 20px; letter-spacing: 0.4ch">
                                    BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA
                                </h1>
                                <h5 class="text-center p-0 m-0" style="font-size: 16px">Jl. KH. Ashari 123 <i></i>( 0332 )  429584</h5>
                                <div>
                                    <p class="text-center p-0 m-0" style="font-size: 14px">e-mail: <u>admin@bkpsdm.bondowosokab.go.id</u>, Website: http://www.bkpsdm.bondowosokab.go.id</p>
                                </div>
                                <h1 class="text-center fw-bold mt-2" style="font-size: 20px">B O N D O W O S O</h1>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>

            </div>
            <img src="{{ asset('') }}back-end/assets/img/garis.svg" class="my-3" alt="">
            <div class="col-md-8 mx-auto">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-8 mx-auto my-2">
                        <h2 class="fw-bold text-center p-0" style="font-size: 24px"><u>SURAT IZIN {{ strtoupper($data -> nama_cuti) }}</u></h2>
                        <p class="text-center">Nomor : 853/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/430.10.1/2022</p>
                    </div>
                </div>
                <div class="content">
                    <p>Diberikan {{ ($data -> nama_cuti) }} untuk tahun {{ date("Y",strtotime($data->mulai_cuti)) }} kepada Pegawai Negeri Sipil :</p>
                    <div class="table-responsive">
                        <table class="">
                            <tbody>
                                <tr>
                                    <td width="20%">Nama</td>
                                    <td width="1%">:</td>
                                    <td >{{ ($data -> nama_lengkap) }}</td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-uppercase py-1">nip</td>
                                    <td width="1%">:</td>
                                    <td >{{ ($data -> nip) }}</td>
                                </tr>
                                <tr>
                                    <td width="30%" class="py-1">Pangkat / Golongan Ruang</td>
                                    <td width="1%">:</td>
                                    <td >{{ ($data -> nama) }}</td>
                                </tr>
                                <tr>
                                    <td width="20%" class="py-1">Jabatan</td>
                                    <td width="1%">:</td>
                                    <td >{{ ($data -> jabatan) }}</td>
                                </tr>
                                <tr>
                                    <td width="20%" class="py-1">Satuan Organisasi</td>
                                    <td width="1%">:</td>
                                    <td >{{ ($data -> unit_kerja) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>Selama {{ $answer_in_days }} ({{ $terbilang }}) hari kerja terhitung sejak tanggal {{ date("d F Y",strtotime($data->mulai_cuti)) }} sampai dengan {{ date("d F Y",strtotime($data->akhir_cuti)) }}, dengan ketentuan sebagai berikut :</p>
                    <ol class="px-3">
                        <li class="pb-2">Sebelum menjalankan cuti wajib menyerahkan pekerjaannya kepada atasan langsungnya;</li>
                        <li class="pb-2">Setelah selesai menjalankan cuti wajib melaporkan diri kepada atasan langsungnya dan bekerja kembali sebagaimana biasa.</li>
                        </li class="pb-2">
                    </ol>
                    <p>Demikian Surat Izin Cuti Sakit ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
                </div>
                <div class="content-ttd my-4">
                    <div class="d-flex justify-content-end">
                        <div class="">
                            <p class="text-center p-0">Bondowoso, {{date("d F Y")}}</p>
                            <div class="kolom-ttd">
                                <h4 class="fw-bold text-center p-0" style="font-size: 14px;">KEPALA BADAN KEPEGAWAIAN DAN</h4>
                                <h4 class="fw-bold text-center p-0" style="font-size: 14px;"> PENGEMBANGAN SUMBER DAYA MANUSIA</h4>
                                <h4 class="fw-bold text-center" style="font-size: 14px;">KABUPATEN BONDOWOSO,</h4>
                                <div class="py-4"></div>
                                <h4 class="fw-bold text-center " style="font-size: 14px;">
                                    <u>MUHAMMAD ASNAWI SABIL, S.Ag., M.Si.</u>
                                </h4>
                                <h4 class="fw-bold text-center" style="font-size: 14px;">Pembina Utama Madya</h4>
                                <h4 class="fw-bold text-center" style="font-size: 14px;">NIP.  197802122006041022</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-tembusan">
                    <h5 style="font-size: 14pt">Tembusan :</h5>
                    <div class="row">
                        <div class="col-md-1">
                            <p>Yth. Sdr.</p>
                        </div>
                        <div class="col-md-9">
                            <ol>
                                <li>Inspektur Kabupaten Bondowoso di Bondowoso;</li>
                                <li>Kepala {{ $data-> unit_kerja }} di Bondowoso.</li>
                            </ol>
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
