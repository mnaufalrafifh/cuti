@extends('layouts.template_back-end')
@section('content')
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3>Ganti Password</h3>
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
                        <form action="{{route('ganti-password.update',Auth::user()->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="col my-4">
                                <div class="col mb-3">
                                    <small for="old-password" class="form-label">Password Lama</small>
                                    <input type="password" class="form-control" name="old_password" id="old-password" placeholder="Password Lama">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col mb-3">
                                    <small for="new-password" class="form-label">Password Baru</small>
                                    <input type="password" class="form-control" name="new_password" id="new-password" placeholder="Password Baru">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col mb-3">
                                    <small for="confirm-new-password" class="form-label">Re-Enter Password</small>
                                    <input type="password" class="form-control" name="confirm_new_password" id="confirm-new-password" placeholder="Re-Enter Password Baru">
                                    @error('confirm_new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
