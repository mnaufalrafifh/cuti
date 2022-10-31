@extends('layouts.template_back-end')
@section('content')
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3>Edit Profil</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body ">
                        @if (session('status'))
                            <div class="alert alert-primary d-flex align-items-center my-4" role="alert">
                                <div class="fw-bold">
                                    {{session('status')}}
                                </div>
                            </div>
                        @endif
                        <form action="{{route('profile.update',Auth::user()->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row my-4">
                                <div class="col-md-6 mb-3">
                                    <small for="exampleFormControlInput1" class="form-label">NIK</small>
                                    <input type="text" class="form-control" value="{{!empty($data->nik) ? old('nik',$data->nik) : ''}}" name="nik" id="exampleFormControlInput1" placeholder="Masukkan NIK">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small for="exampleFormControlInput1" class="form-label">Nama Lengkap</small>
                                    <input type="text" class="form-control" value="{{ !empty($data->nama_lengkap) ? old('nama',$data->nama_lengkap) : ''}}" name="nama" id="exampleFormControlInput1" placeholder="Isi disini...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small for="exampleFormControlInput1" class="form-label">Jenis Kelamin</small>
                                    <select name="gender" id="" class="form-control">
                                        <option value="L" {{!empty($data->jenis_kelamin) ? old('gender',$data->jenis_kelamin == 'L' ? 'selected' : '' ) : ''}}>Laki-laki</option>
                                        <option value="P" {{ !empty($data->jenis_kelamin) ?  old('gender',$data->jenis_kelamin == 'P' ? 'selected' : '' ) : ''}}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small for="exampleFormControlInput1" class="form-label">No Telp</small>
                                    <input type="text" class="form-control" value="{{!empty($data->nik) ? old('no_telp',$data->no_telp) : ''}}" name="no_telp" id="exampleFormControlInput1" placeholder="Isi disini...">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <small class="form-label">Alamat</small>
                                    <textarea name="alamat" id="" cols="30" rows="4" class="form-control">{{ !empty($data->alamat) ? old('alamat',$data->alamat) : ''}}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <small class="form-label">Jabatan</small>
                                    <textarea name="jabatan" id="" cols="30" rows="4" class="form-control">{{ !empty($data->nik) ? old('jabatan',$data->jabatan) : ''}}</textarea>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
