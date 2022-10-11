@extends('layouts.template_back-end')
@section('content')
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header">Tambah Jenis Cuti</h3>
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
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Jenis Cuti <span class="required"></span></label>
                  <div class="col">
                    <input class="form-control mt-1" id="cname" name="" minlength="5" placeholder="Masukkan Jenis Cuti" type="text" required />
                  </div>
                  <label for="cname" class="control-label col-lg-2 mt-2">Lama Cuti (Hari) <span class="required"></span></label>
                  <div class="col">
                    <input class="form-control mt-1" id="cname" name="" minlength="5" placeholder="Masukkan Lama Cuti" type="number" required />
                  </div>
                    <div class="col">
                      <td><a class="btn btn-danger mt-2" href="">Kembali</a></td>
                      <td><a class="btn btn-primary mt-2" href="">Submit</a></td>
                    </div>
                </div>

              </div>
@endsection