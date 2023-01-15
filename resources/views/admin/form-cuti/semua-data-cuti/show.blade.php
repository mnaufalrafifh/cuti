@extends('layouts.template_back-end')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <style>
        .select2-container {
            width: 100% !important;

        }

        .select2-container--default .select2-selection--single {
            border-radius: 0.35rem;
            border: 1px solid #d1d3e2;
            height: calc(1.95rem + 5px);
            background: #fff;
        }

        .select2-container--default .select2-selection--single:hover,
        .select2-container--default .select2-selection--single:focus,
        .select2-container--default .select2-selection--single.active {
            box-shadow: none;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 32px;

        }

        .select2-container--default .select2-selection--multiple {
            border-color: #eaeaea;
            border-radius: 0;
        }

        .select2-dropdown {
            border-radius: 0;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #3838eb;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #eaeaea;
            background: #fff;

        }
    </style>
@endpush
@push('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $('#nip').select2();
    $('#nip').on('change', function() {
        var nip = $(this).val();
        $.ajax({
            url: `/pengajuan-cuti/autocomplete?nip=${nip}`,
            type: "GET",
            dataType: 'JSON',
            success:function (res) {
                res.forEach(element => {
                    console.log(element);
                    $("input[name='nama_lengkap']").val(element.nama_lengkap);
                    if (element.jenis_kelamin == "L") {
                        $('#jenis option[value="L"]').prop('selected', true);
                        $('#jenis option[value="P"]').prop('selected', false);
                    } else if(element.jenis_kelamin == "P") {
                        $('#jenis option[value="L"]').prop('selected', false);
                        $('#jenis option[value="P"]').prop('selected', true);

                    }
                    $("input[name='jabatan']").val(element.jabatan);
                    $("input[name='unit_kerja']").val(element.satuan_kerja);
                    $("input[name='masa_kerja']").val(element.masa_kerja);
                })

            }
        })
    })
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

      <div class="d-flex justify-content-end">
        {{-- <a class="btn btn-danger mx-2" href="{{route('data-cuti.index')}}">Kembali</a> --}}
        <a class="btn btn-primary mx-2" href="{{route('download.cuti.pengajuan',$data->id)}}">Download Pengajuan Cuti</a>
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
              <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="{{ route('updates.cuti', $data->id)}}"  enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="form-group">
                <div class="col">
                 <div class="card">
                   <div class="card-body">
                    <h5 class="card-title">Data Pegawai</h5>

                    <div class="row">
                    <div class="form-group col-md-6">
                        <input type="hidden" name="id_pegawai" value="{{$data->id_pegawai}}">
                        <label for="nip" class="control-label col-lg-2"><strong>NIP</strong> <span class="required"></span></label>
                    <div class="col">
                        <select name="nip" id="nip"  class="form-control">
                            <option value="0">Cari NIP anda...</option>
                            @foreach ($data_pegawai as $item)
                            <option value="{{ $item['nip'] }}"  {{ $item['nip'] == $data->nip ? 'selected' : '' }}>{{ $item['nip'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('nip')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama" class="control-label col-lg-2"><strong>Nama</strong> <span class="required"></span></label>
                    <div class="col">
                        <input class="form-control mt-1" id="nama" value="{{$data->nama_lengkap}}" readonly name="nama_lengkap" minlength="5" placeholder="Masukkan Nama Lengkap" type="text" @error('nama_lengkap') is-invalid @enderror/>
                    </div>
                    @error('nama_lengkap')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mt-3">
                      <label for="jenis" id class="control-label col-lg-4 mt-1"><strong>Jenis Kelamin</strong> <span class="required"></span></label>
                    <select name="jenis_kelamin" class="form-control" @error('jenis_kelamin') disabled is-invalid @enderror id="jenis">
                      <option value="0">Pilih Jenis Kelamin</option>
                      <option value="L" {{$data->jenis_kelamin == 'L' ? 'selected' : ''}}>Laki-Laki</option>
                      <option value="P" {{$data->jenis_kelamin == 'P' ? 'selected' : ''}}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                        <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mt-3">
                       <label for="jabatan" class="control-label col-lg-2"><strong>Jabatan</strong> <span class="required"></span></label>
                    <div class="col">
                       <input class="form-control mt-1" id="jabatan" readonly value="{{$data->jabatan}}" name="jabatan" minlength="5" placeholder="Masukkan Jabatan" type="text" @error('jabatan') is-invalid @enderror/>
                    </div>
                    @error('jabatan')
                      <small class="text-danger ml-4" readonly for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mt-3">
                       <label for="unit" class="control-label col-lg-4"><strong>Unit Kerja</strong> <span class="required"></span></label>
                    <div class="col">
                        <input class="form-control mt-1" id="unit" readonly value="{{$data->unit_kerja}}" name="unit_kerja" minlength="5" placeholder="Masukkan Unit Kerja" type="text" @error('unit_kerja') is-invalid @enderror/>
                    </div>
                    @error('unit_kerja')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-3 mt-3">
                      <label for="masa" class="control-label col-lg-5"><strong>Masa Kerja</strong> <span class="required"></span></label>
                    <div class="col">
                       <input class="form-control mt-1" id="masa" readonly name="masa_kerja" value="{{$data->masa_kerja}}" minlength="5" placeholder="Masukkan Masa Kerja" type="number" @error('masa_kerja') is-invalid @enderror/>
                    </div>
                    @error('masa_kerja')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-3 mt-5">
                        <label for="cname" class="control-label col-lg-6"><strong>Bulan</strong> <span class="required"></span></label>
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
                          <option value="{{ $item->id}}" {{ $item->id == $data->id_jenisCuti ? 'selected' : ''}}>{{ $item->nama_cuti}}</option>
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
                       <textarea name="alasan_cuti" id="alasan" cols="30" rows="3" class="form-control mt-1" @error('alasan_cuti') is-invalid @enderror>{{$data->alasan_cuti}}</textarea>
                   </div>
                   @error('alasan_cuti')
                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                    <br>
                   @enderror
                   </div>
                   <div class="form-group col-md-3 mt-3">
                      <label for="pick_date" class="control-label col-lg-6"><strong>Mulai Cuti</strong> <span class="required"></span></label>
                   <div class="col">
                      <input class="form-control mt-1 @error('mulai_cuti') is-invalid @enderror" id="pick_date" name="mulai_cuti" value="{{$data->mulai_cuti}}" type="date"  onchange="cal()"/>
                   </div>
                   @error('mulai_cuti')
                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                    <br>
                   @enderror
                   </div>
                   <div class="form-group col-md-3 mt-3">
                      <label for="drop_date" class="control-label col-lg-6"><strong>Berakhir Cuti</strong> <span class="required"></span></label>
                   <div class="col">
                       <input class="form-control mt-1 @error('akhir_cuti') is-invalid @enderror" id="drop_date" name="akhir_cuti" value="{{$data->akhir_cuti}}" type="date"  onchange="cal()"/>
                   </div>
                   @error('akhir_cuti')
                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                    <br>
                   @enderror
                   </div>
                   <div class="form-group col-md-3 mt-3">
                     <label for="numdays2" class="control-label col-lg-6"><strong>Lama Cuti</strong> <span class="required"></span></label>
                   <div class="col">
                      <input class="form-control mt-1" id="numdays2" name="lama_cuti" value="{{$data->lama_cuti}}" minlength="5" type="text" disabled />
                   </div>
                   </div>
                   <div class="form-group col-md-3 mt-5">
                      <label for="cname" class="control-label col-lg-6"><strong>Hari</strong> <span class="required"></span></label>
                   </div>
                   <div class="form-group col-md-6 mt-3">
                    <label for="alamat" class="control-label col-lg-4"><strong>Alamat Cuti</strong> <span class="required"></span></label>
                    <div class="col">
                        <textarea name="alamat_cuti" id="alamat" cols="30" rows="3" class="form-control mt-1 @error('alamat_cuti') is-invalid @enderror" >{{$data->alamat_cuti}}</textarea>
                    </div>
                    @error('alamat_cuti')
                      <small class="text-danger ml-4" for="">{{ $message }}</small>
                      <br>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mt-3">
                      <label for="no" class="control-label col-lg-8"><strong>No. Telepon Yang Bisa Dihubungi</strong> <span class="required"></span></label>
                    <div class="col">
                      <input class="form-control mt-1" id="no" name="no_telp" value="{{$data->no_telp}}" minlength="5" placeholder="Masukkan No. Telepon" type="number" @error('no_telp') is-invalid @enderror/>
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
                            <h5 class="card-title">File Persyaratan</h5>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-center">
                                    <iframe src="{{asset('image/file_persyaratan/'.$data->upload_file)}}" style="width:600px; height:500px;" frameborder="0"></iframe>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Surat Dokter</h5>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-center">
                                    <iframe src="{{asset('image/ttd/'.$data->upload_suratdokter)}}" style="width:600px; height:500px;" frameborder="0"></iframe>
                                </div>

                            </div>
                        </div>
                    </div> --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Status Penerimaan</h5>
                            <div class="row">
                                <div class="form-group col-md-6 d-flex justify-content-center">
                                    <select name="status" id="" class="form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="disetujui">Disetujui</option>
                                        <option value="ditolak">Ditolak</option>
                                        <option value="perubahan">Perubahan</option>
                                    </select>
                                </div>

                        </div>
                    </div>

                </div>
                <div class="d-flex justify-content-end">
                  {{-- <td><a class="btn btn-danger mt-2" href="/">Kembali</a></td> --}}
                  <a class="btn btn-danger mx-2" href="{{route('data-cuti.index')}}">Kembali</a>
                  <button class="btn btn-primary">Simpan</button>
                </div>

              </div>
@endsection
