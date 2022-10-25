@extends('layouts.template_back-end')
@section('content')
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header">Create Pengajuan Cuti</h3>
      </div>
    </div>
    <!-- Form validations -->
    <div class="row mt-4">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
          </header>
          <div class="panel-body">
            <div class="form">
              <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
                <div class="form-group">

                <div class="col">
                 <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Data Pegawai</h5>

                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="cname" class="control-label col-lg-2"><strong>NIP</strong> <span class="required"></span></label>
                    <div class="col">
                        <input class="form-control mt-1" id="cname" name="" minlength="5" placeholder="Masukkan NIP" type="number" required />
                    </div>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="cname" class="control-label col-lg-2"><strong>Nama</strong> <span class="required"></span></label>
                    <div class="col">
                        <input class="form-control mt-1" id="cname" name="" minlength="5" placeholder="Masukkan Nama Lengkap" type="text" required />
                    </div>
                    </div>
                    </div> 
                    </div>

                 </div>
                </div>

                    <div class="col">
                      <td><a class="btn btn-danger mt-2" href="/index">Kembali</a></td>
                      <td><a class="btn btn-primary mt-2" href="">Submit</a></td>
                    </div>
                </div>

              </div>
@endsection