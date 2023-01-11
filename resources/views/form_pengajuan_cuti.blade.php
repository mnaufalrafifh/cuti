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
            <div class="col-md-8 mx-auto">
                <div class="row">
                    <div class="d-flex justify-content-end">
                    <div class="my-2">
                        <h2 class="p-0 m-0" style="font-size: 12px">LAMPIRAN</h2>
                        <p class="p-0 m-0" style="font-size: 12px">PERATURAN BADAN KEPEGAWAIAN NEGARA RI NOMOR 2 TAHUN 2017</p>
                        <p class="p-0 m-0" style="font-size: 12px">TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL</p>
                        <p class="text-center p-0 m-0" style="font-size: 14px">Bondowoso, ........</p>
                        <p class="text-center p-0 m-0" style="font-size: 14px">Kepada</p>
                        <p class="text-center p-0 m-0" style="font-size: 14px">Yth. ..............</p>
                        <p class="text-center p-0 m-0" style="font-size: 14px">di</p>
                        <p class="text-center p-0 m-0" style="font-size: 14px">........................</p>
                    </div>
                    </div>
                </div>
                <div class="content">
                    <p class="fw-bold text-center pt-4 mt-2">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</p>
                    <div class="table-responsive">
                        <table border="1" class=""">
                            <tbody>
                                <tr>
                                    <td width="20%">Nama</td>
                                    <td width="1%">:</td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-uppercase py-1">nip</td>
                                    <td width="1%">:</td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="py-1">Pangkat / Golongan Ruang</td>
                                    <td width="1%">:</td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <td width="20%" class="py-1">Jabatan</td>
                                    <td width="1%">:</td>
                                    <td ></td>
                                </tr>
                                <tr>
                                    <td width="20%" class="py-1">Satuan Organisasi</td>
                                    <td width="1%">:</td>
                                    <td ></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>Selama hari kerja terhitung sejak tanggal sampai dengan , dengan ketentuan sebagai berikut :</p>
                    <ol class="px-3">
                        <li class="pb-2">Sebelum menjalankan cuti wajib menyerahkan pekerjaannya kepada atasan langsungnya;</li>
                        <li class="pb-2">Setelah selesai menjalankan cuti wajib melaporkan diri kepada atasan langsungnya dan bekerja kembali sebagaimana biasa;</li>
                        </li class="pb-2">
                    </ol>
                    <p>Demikian Surat Izin Cuti Melahirkan ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
                </div>
                <div class="content-ttd my-4">
                    <div class="d-flex justify-content-end">
                        <div class="">
                            <p class="text-center p-0">Bondowoso, {{date("d F Y")}}</p>
                            <div class="kolom-ttd">
                                <h4 class="fw-bold text-center p-0" style="font-size: 14px;">KEPALA &nbsp;</h4>
                                <h4 class="fw-bold text-center" style="font-size: 14px;">KABUPATEN BONDOWOSO,</h4>
                                <div class="py-4"></div>
                                <h4 class="fw-bold text-center " style="font-size: 14px;">
                                    <u>(&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; )</u>
                                </h4>
                                {{-- <h4 class="fw-bold text-center" style="font-size: 14px;">Pembina Utama Madya</h4> --}}
                                <h4 class="fw-bold px-4" style="font-size: 14px;">NIP.  </h4>
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
                                <li>Kepala</li>
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
