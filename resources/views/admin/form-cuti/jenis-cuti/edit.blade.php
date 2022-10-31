@extends('layouts.template_back-end')
@section('content')
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header">Tambah Jenis Cuti</h3>
      </div>
      @if (session('error'))
      <div class="alert alert-success" role="alert">
          {{session('error')}}
      </div>
      @endif
    </div>
    <!-- Form validations -->
    <div class="row mt-4">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
          </header>
          <div class="card">
            <div class="card-body">
          <div class="panel-body">
            {{-- <h5 class="card-title"></h5> --}}
            <div class="form">
              <form class="form-validate form-horizontal" method="POST" action="{{ route('jenis-cuti.update', $data->id) }}" autocomplete="off">
                @method('PUT')
                @csrf
                <div class="form-group ">
                  <label for="nama" class="control-label col-lg-2 mt-3"><strong>Jenis Cuti</strong> <span class="required"></span></label>
                  <div class="col">
                    <input class="form-control mt-1" id="nama" name="nama_cuti" minlength="5" value="{{ old('nama_cuti', $data->nama_cuti) }}" type="text" @error('nama_cuti') is-invalid @enderror />
                  </div>
                  @error('nama_cuti')
                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                    <br>
                  @enderror
                  <label for="lama" class="control-label col-lg-2 mt-2"><strong>Lama Cuti (Hari)</strong> <span class="required"></span></label>
                  <div class="col">
                    <input class="form-control mt-1" id="lama" name="lama_cuti" minlength="5" value="{{ old('lama_cuti', $data->lama_cuti) }}" type="number" @error('lama_cuti') is-invalid @enderror />
                  </div>
                  @error('lama_cuti')
                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                  @enderror
                    <div class="col">
                      <td><a class="btn btn-danger mt-2" href="/jenis-cuti">Kembali</a></td>
                      <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    </div>
                </div>
              </div>
            </div>
              </div>
@endsection