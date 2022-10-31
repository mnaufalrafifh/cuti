@extends('layouts.template_back-end')
@section('content')
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
    <h3 class="page-header">Jenis Cuti</h3>
    <a href="{{ route('jenis-cuti.create')}}" class="btn btn-primary">Tambah Jenis Cuti</a>
      </div>
    </div>
    @if (session('status'))
    <br>
    <div class="alert alert-success" role="alert">
        {{session('status')}}
    </div>
    @endif
    <!-- Form validations -->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
          </header>
          <div class="panel-body">
            <div class="form">
              <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="">
                <div class="form-group ">
                    <div class="card mt-4">
                        <div class="card-body">
                          <h2 class="card-title"></h2>
                    
                          <!-- Default Table -->
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col" style="width:50px">No</th>
                                <th scope="col" style="width:500px">Jenis Cuti</th>
                                <th scope="col" style="width:180px">Lama Cuti</th>
                                <th scope="col" >Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($data as $item)
                              <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nama_cuti }}</td>
                                <td>{{ $item->lama_cuti }} Hari</td>
                                <td>
                                  <div class="d-flex flex-row">
                                    <div class="p-2">
                                      <a href="{{ route('jenis-cuti.edit', $item->id)}}" class="btn btn-warning"  style="color: white">
                                        <i class="bi bi-grid"></i><span>Edit</span>
                                      </a>
                                    </div>
                                    <div class="p-2">
                                      <form action="{{ route('jenis-cuti.destroy', $item->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">
                                          <i class="bi bi-grid"></i>Delete</button>
                                      </form>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <!-- End Default Table Example -->
                        </div>
                      </div>
                </div>
@endsection