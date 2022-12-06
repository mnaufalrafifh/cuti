@extends('layouts.template_back-end')
@push('js')
<script type="text/javascript">
    function GetDays(){
            var dropdt = new Date(document.getElementById("drop_date").value);
            var pickdt = new Date(document.getElementById("pick_date").value);
            return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
    }

    function cal(){
    if(document.getElementById("drop_date")){
        document.getElementById("numdays2").value=GetDays();
    }
}
</script>
@endpush
@section('content')
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header">Create Pengajuan Cuti</h3>
      </div>
      @if (session('status'))
      <br>
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
          <div class="panel-body">
            <div class="form">
              <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="{{ route('pengajuan-cuti.store')}}"  enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="form-group">
                <div class="col">
                 <div class="card">
                   <div class="card-body">
                    <h5 class="card-title">Data Pegawai</h5>

                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nip" class="control-label col-lg-2"><strong>NIP</strong> <span class="required"></span></label>
                    <div class="col">
                        <input class="form-control mt-1" id="nip" name="nip" minlength="5" placeholder="Masukkan NIP" type="number" @error('nip') is-invalid @enderror/>
                    </div>
                    @error('nip')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama" class="control-label col-lg-2"><strong>Nama</strong> <span class="required"></span></label>
                    <div class="col">
                        <input class="form-control mt-1" id="nama" name="nama_lengkap" minlength="5" placeholder="Masukkan Nama Lengkap" type="text" @error('nama_lengkap') is-invalid @enderror/>
                    </div>
                    @error('nama_lengkap')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mt-3">
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
                    </div>
                    <div class="form-group col-md-6 mt-3">
                       <label for="jabatan" class="control-label col-lg-2"><strong>Jabatan</strong> <span class="required"></span></label>
                    <div class="col">
                       <input class="form-control mt-1" id="jabatan" name="jabatan" minlength="5" placeholder="Masukkan Jabatan" type="text" @error('jabatan') is-invalid @enderror/>
                    </div>
                    @error('jabatan')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mt-3">
                       <label for="unit" class="control-label col-lg-4"><strong>Unit Kerja</strong> <span class="required"></span></label>
                    <div class="col">
                        <input class="form-control mt-1" id="unit" name="unit_kerja" minlength="5" placeholder="Masukkan Unit Kerja" type="text" @error('unit_kerja') is-invalid @enderror/>
                    </div>
                    @error('unit_kerja')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-3 mt-3">
                      <label for="masa" class="control-label col-lg-5"><strong>Masa Kerja</strong> <span class="required"></span></label>
                    <div class="col">
                       <input class="form-control mt-1" id="masa" name="masa_kerja" minlength="5" placeholder="Masukkan Masa Kerja" type="number" @error('masa_kerja') is-invalid @enderror/>
                    </div>
                    @error('masa_kerja')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-3 mt-5">
                        <label for="cname" class="control-label col-lg-6"><strong>Tahun</strong> <span class="required"></span></label>
                    </div>

                    </div>
                   </div>
                 </div>

                 <div class="card">
                  <div class="card-body">
                   <h5 class="card-title">Data Cuti</h5>

                   <div class="row">
                   <div class="form-group col-md-6">
                       <label for="jenisCuti" class="control-label col-lg-2"><strong>Jenis Cuti</strong> <span class="required"></span></label>
                   <div class="col">
                       <select name="id_jenisCuti" id="jenisCuti" class="form-control mt-1" @error('id_jenisCuti') is-invalid @enderror>
                          <option value="">Pilih Jenis Cuti</option>
                          @foreach($jenis as $item)
                          <option value="{{ $item->id}}">{{ $item->nama_cuti}}</option>
                          @endforeach
                       </select>
                   </div>
                   @error('id_jenisCuti')
                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                    <br>
                   @enderror
                   </div>
                   <div class="form-group col-md-6">
                   <label for="alasan" class="control-label col-lg-4"><strong>Alasan Cuti</strong> <span class="required"></span></label>
                   <div class="col">
                       <textarea name="alasan_cuti" id="alasan" cols="30" rows="3" class="form-control mt-1" @error('alasan_cuti') is-invalid @enderror></textarea>
                   </div>
                   @error('alasan_cuti')
                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                    <br>
                   @enderror
                   </div>
                    <div class="form-group col-md-12">
                    <label for="jamKerja" class="control-label col-lg-2"><strong>Jam Kerja</strong> <span class="required"></span></label>
                        <div class="col">
                            <select name="id_jenisCuti" id="jenisCuti" class="form-control mt-1" required>
                                <option value="">Pilih Jam Kerja</option>
                                <option value="5">5 Hari</option>
                                <option value="6">6 Hari</option>
                            </select>
                        </div>
                    </div>
                   <div class="form-group col-md-3 mt-3">
                      <label for="pick_date" class="control-label col-lg-6"><strong>Mulai Cuti</strong> <span class="required"></span></label>
                   <div class="col">
                      <input class="form-control mt-1" id="pick_date" name="mulai_cuti" type="date" @error('mulai_cuti') is-invalid @enderror onchange="cal()"/>
                   </div>
                   @error('mulai_cuti')
                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                    <br>
                   @enderror
                   </div>
                   <div class="form-group col-md-3 mt-3">
                      <label for="drop_date" class="control-label col-lg-6"><strong>Berakhir Cuti</strong> <span class="required"></span></label>
                   <div class="col">
                       <input class="form-control mt-1" id="drop_date" name="akhir_cuti" type="date" @error('akhir_cuti') is-invalid @enderror onchange="cal()"/>
                   </div>
                   @error('akhir_cuti')
                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                    <br>
                   @enderror
                   </div>
                   <div class="form-group col-md-3 mt-3">
                     <label for="numdays2" class="control-label col-lg-6"><strong>Lama Cuti</strong> <span class="required"></span></label>
                   <div class="col">
                      <input class="form-control mt-1" id="numdays2" name="lama_cuti" minlength="5" type="text" disabled />
                   </div>
                   </div>
                   <div class="form-group col-md-3 mt-5">
                      <label for="cname" class="control-label col-lg-6"><strong>Hari</strong> <span class="required"></span></label>
                   </div>
                   <div class="form-group col-md-6 mt-3">
                    <label for="alamat" class="control-label col-lg-4"><strong>Alamat Cuti</strong> <span class="required"></span></label>
                    <div class="col">
                        <textarea name="alamat_cuti" id="alamat" cols="30" rows="3" class="form-control mt-1" @error('alamat_cuti') is-invalid @enderror></textarea>
                    </div>
                    @error('alamat_cuti')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mt-3">
                      <label for="no" class="control-label col-lg-8"><strong>No. Telepon Yang Bisa Dihubungi</strong> <span class="required"></span></label>
                    <div class="col">
                      <input class="form-control mt-1" id="no" name="no_telp" minlength="5" placeholder="Masukkan No. Telepon" type="number" @error('no_telp') is-invalid @enderror/>
                    </div>
                    @error('no_telp')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                  </div>

                   </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-body">
                   <h5 class="card-title">Jenis Cuti</h5>

                   <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis Cuti</th>
                        <th scope="col">Lama Cuti</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($jenis as $item)
                      <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $item->nama_cuti}}</td>
                        <td>{{ $item->lama_cuti}} Hari</td>
                      </tr>
                    </tbody>
                      @endforeach
                  </table>
                </div>
                </div>

                <div class="card">
                  <div class="card-body">
                   <h5 class="card-title">File Persyaratan</h5>

                   <div class="row">
                   <div class="form-group col-md-6 d-flex justify-content-center">
                       <input type="file" name="upload_file" class="form-control mx-auto" @error('upload_file') is-invalid @enderror id="">
                   </div>
                   @error('upload_file')
                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                    <br>
                   @enderror
                  </div>
                </div>
                </div>

                    <div class="col justify-content-end">
                      {{-- <td><a class="btn btn-danger mt-2" href="/">Kembali</a></td> --}}
                      <button class="btn btn-primary">Submit</button>
                    </div>
                </div>

              </div>
@endsection
