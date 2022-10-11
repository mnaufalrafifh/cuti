@extends('layouts.template_back-end')
@section('content')
<!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-lg-12 ">
                  <section class="panel">
                    <header class="panel-heading">
                      Advanced Form validations
                    </header>
                    <div class="panel-body">
                      <div class="form ml-4">
                        <form class="form-validate form-horizontal " id="register_form" method="get" action="">
                          <div class="form-group ">
                            <label for="fullname" class="control-label col-lg-2">Full name <span class="required">*</span></label>
                            <div class="col-lg-10">
                              <input class=" form-control" id="fullname" name="fullname" type="text" />
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="address" class="control-label col-lg-2">Address <span class="required">*</span></label>
                            <div class="col-lg-10">
                              <input class=" form-control" id="address" name="address" type="text" />
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="username" class="control-label col-lg-2">Username <span class="required">*</span></label>
                            <div class="col-lg-10">
                              <input class="form-control " id="username" name="username" type="text" />
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                            <div class="col-lg-10">
                              <input class="form-control " id="password" name="password" type="password" />
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                            <div class="col-lg-10">
                              <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                            </div>
                          </div>
        </div>
@endsection