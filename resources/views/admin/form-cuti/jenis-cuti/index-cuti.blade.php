@extends('layouts.template_back-end')
@section('content')
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
    <h3 class="page-header">Jenis Cuti</h3>
    <a href="/create" class="btn btn-primary">Tambah Jenis Cuti</a>
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
                    <div class="card mt-4">
                        <div class="card-body">
                          <h5 class="card-title">Default Table</h5>
                    
                          <!-- Default Table -->
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Cuti</th>
                                <th scope="col">Lama Cuti</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Brandon Jacob</td>
                                <td>Designer</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Bridie Kessler</td>
                                <td>Developer</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Ashleigh Langosh</td>
                                <td>Finance</td>
                              </tr>
                              <tr>
                                <th scope="row">4</th>
                                <td>Angus Grady</td>
                                <td>HR</td>
                              </tr>
                              <tr>
                                <th scope="row">5</th>
                                <td>Raheem Lehner</td>
                                <td>Dynamic Division Officer</td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- End Default Table Example -->
                        </div>
                      </div>
                </div>
@endsection