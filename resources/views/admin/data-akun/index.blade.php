@extends('layouts.template_back-end')
@section('content')
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header">Data Akun</h3>
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

          <div class="card mt-4">
              <div class="card-body">
                <div class="table-responsive my-5">
                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level Akun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->nama_role}}</td>
                            <td>
                                <div class="d-flex flex-row">
                                    <div class="p-2">
                                      <a href="{{ route('data-akun.edit', $item->id)}}" class="btn btn-warning"  style="color: white">
                                        <i class="bi bi-pencil-square"></i><span> Edit</span>
                                      </a>
                                    </div>
                                    <div class="p-2">
                                      <form action="{{ route('data-akun.destroy', $item->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">
                                          <i class="bi bi-trash"></i> Delete</button>
                                      </form>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>
    </div>
  </section>
@endsection
