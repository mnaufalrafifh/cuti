@extends('layouts.template_back-end')
@section('content')
@push('js')
<script>
  function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header">Edit Akun</h3>
      </div>
      @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{session('status')}}
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
             <h5 class="card-title"></h5>
             <form class="form-validate form-horizontal" method="POST" action="{{ route('data-akun.update', $data->id) }}" enctype="multipart/form-data" autocomplete="off">
            @method('PUT')
            @csrf
             <div class="row">
                 <div class="form-group">
                     <label for="name" class="control-label col-lg-4"><strong>Nama Lengkap</strong> <span class="required"></span></label>
                     <div class="col">
                         <input type="text" name="name" id="name" value="{{ old('name', $data->name) }}" class="form-control mt-1" @error('name') is-invalid @enderror autocomplete="off">
                        </div>
              @error('name')
              <small class="text-danger ml-4" for="">{{ $message }}</small>
              <br>
              @enderror
            </div>
            {{-- <div class="form-group mt-3">
                <label for="jenis" id class="control-label col-lg-4 mt-1"><strong>Jenis Kelamin</strong> <span class="required"></span></label>
                <select name="jenis_kelamin" class="form-control" @error('jenis_kelamin') is-invalid @enderror id="jenis">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <small class="text-danger ml-4" for="">{{ $message }}</small>
                <br>
                @enderror
            </div> --}}
            <div class="form-group mt-3">
                <label for="email" class="control-label col-lg-2"><strong>Email</strong> <span class="required"></span></label>
            <div class="col">
                <input type="email" name="email" id="email" value="{{ old('name', $data->email) }}" class="form-control mt-1" @error('email') is-invalid @enderror autocomplete="off">
            </div>
            @error('email')
             <small class="text-danger ml-4" for="">{{ $message }}</small>
             <br>
            @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password" class="control-label col-lg-4"><strong>Password</strong> <span class="required"></span></label>
                <div class="col">
                    <input type="password" name="password" id="myInput" placeholder="Masukkan Password Baru" class="form-control mt-1" @error('password') is-invalid @enderror autocomplete="off">
                </div>
                @error('password')
                <small class="text-danger ml-4" for="">{{ $message }}</small>
                <br>
                @enderror
            </div>
            <i class="ri ri-eye-line d-flex justify-content-end" onclick="myFunction()"></i>
            <div class="form-group mt-3">
                <label for="id_roles" id class="control-label col-lg-4 mt-1"><strong>Level Akun</strong> <span class="required"></span></label>
                <select name="id_roles" class="form-control" @error('id_roles') is-invalid @enderror id="id_roles">
                    <option value="">Pilih Level Akun</option>
                    @foreach($role as $item)
                    <option value="{{ $item->id}}" {{ $item->id == $data->id_roles ? 'selected' : ''}}>{{ $item->nama_role}}</option>
                    @endforeach
                </select>
                @error('id_roles')
                <small class="text-danger ml-4" for="">{{ $message }}</small>
                <br>
                @enderror
            </div>

        </div>
    </div>
</div>
  <div class="col">
    <td><a class="btn btn-danger mt-2" href="/data-akun">Kembali</a></td>
    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
  </div>
</form>
@endsection
