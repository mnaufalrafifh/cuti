@extends('layouts.template_back-end')
@section('content')
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
          <h3 class="page-header">Data Cuti</h3>
      </div>
    </div>
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
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Unit Kerja</th>
                            <th>Jenis Cuti</th>
                            <th>Mulai Cuti</th>
                            <th>Akhir Cuti</th>
                            <th>No. Telepon</th>
                            <th>Status</th>
                            @if (Auth::user()->id_roles != 3 )
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data2 as $item)
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->nip}}</td>
                            <td>{{$item->nama_lengkap}}</td>
                            <td>{{$item->unit_kerja}}</td>
                            <td>{{$item->nama_cuti}}</td>
                            <td>{{date("d F Y",strtotime($item->mulai_cuti))}}</td>
                            <td>{{date("d F Y",strtotime($item->akhir_cuti))}}</td>
                            <td>{{$item->no_telp}}</td>
                            <td>

                                @if (Auth::user()->id_roles != 3 )
                                    {{-- bukan pegawai --}}
                                    <a href="{{route('status.cuti',$item->id)}}">
                                        @if ($item->status == 'Ditangguhkan')
                                            <span class="badge bg-warning mt-4 d-flex justify-content-center">
                                                {{ucwords($item->status)}}
                                            </span>
                                        @elseif ($item->status == 'Disetujui')
                                            <span class="badge bg-success mt-4 d-flex justify-content-center">
                                                {{ucwords($item->status)}}
                                            </span>
                                        @elseif ($item->status == 'Perubahan')
                                            <span class="badge bg-warning mt-4 d-flex justify-content-center">
                                                {{ucwords($item->status)}}
                                            </span>
                                        @else
                                        <span class="badge bg-danger mt-4 d-flex justify-content-center">
                                            {{ucwords($item->status)}}
                                        </span>
                                        @endif
                                    </a>
                                @else
                                    {{-- pegawai --}}
                                    @if ($item->status == 'Ditangguhkan')
                                        <span class="badge bg-warning mt-4 d-flex justify-content-center">
                                            {{ucwords($item->status)}}
                                        </span>
                                    @elseif ($item->status == 'Perubahan')
                                        <span class="badge bg-warning mt-4 d-flex justify-content-center">
                                            {{ucwords($item->status)}}
                                        </span>
                                    @elseif ($item->status == 'Disetujui')
                                        <a href="{{route('download.cuti',$item->id)}}">
                                            <span class="badge bg-success mt-4 d-flex justify-content-center">
                                                Permohonan Disetujui silahkan download.
                                            </span>
                                        </a>
                                    @else
                                        <span class="badge bg-danger" onclick="return confirm('Silahkan upload pengajuan ulang')">
                                            {{ucwords($item->status)}}
                                        </span>
                                    @endif

                                @endif

                            </td>
                            @if (Auth::user()->id_roles != 3 )
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('data-cuti.edit', $item->id)}}" class="btn btn-warning btn-sm btn-color btn-bg-color"  style="color: white">
                                        <i class="bi bi-pencil-square"></i><small>Edit</small>
                                    </a>
                                <div class="btn-group"></div>
                                    <form action="{{ route('data-cuti.destroy', $item->id)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm btn-color btn-bg-color" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">
                                    <i class="bi bi-trash"></i> Delete</button>
                                    </form>
                                <div class="btn-group"></div>
                                    <a href="{{ route('download.cuti', $item->id)}}" class="btn btn-primary btn-sm btn-color btn-bg-color"  style="color: white">
                                        <i class="bi bi-download"></i><small>Download</small>
                                    </a>
                            </div>

                            </td>
                            @else

                            @endif
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
