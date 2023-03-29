@extends('master')
@section('content')

    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="assets/template_html/assets/img/login-bg/login-bg-19.jpg">
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>ระบบช่วยการเรียนการสอน</b></h4>
                    <p>
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span>
                            <img class="logoshow" src="assets/template_html/assets/img/logo/logo.png">
                        </span> <b>เข้าสู่ระบบ</b>
                        <small></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in-alt"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form class="form-horizontal form-bordered"
                          action="{{url('/backend/login')}}" method="post">
                        @csrf
                        <div class="form-group m-b-15" >
                            <input type="text" class="form-control" name="email" placeholder="อีเมล"
                                   required/>
                        </div>
                        <div class="form-group m-b-15" >
                            <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน"
                                   required/>
                        </div>
                        <div class="checkbox checkbox-css m-b-30">
                            <input type="checkbox" id="remember_me_checkbox" value=""/>
                            <label for="remember_me_checkbox">
                                Remember Me
                            </label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">เข้าสู่ระบบ</button>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            หากท่านยังไม่มีบัญชี <a href="#modal-dialog" data-toggle="modal">กดที่ลิ้งนี้</a>
                            เพื่อสมัครสมาชิก
                        </div>
                        @if (session('error'))
                            <div style="text-align: left; font-size: 12px; color: #ff0000;text-align: center;"
                                 class="alert alert-danger fade show">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <i class="fas fa-lg fa-fw mr-10 fa-times-circle"></i>{{ session('error') }}
                            </div>
                        @endif
                        <hr/>
                        <p class="text-center text-grey-darker mb-0">
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <div class="modal fade" id="modal-dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title cent">สมัครสมาชิก</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-bordered"
                              action="{{url('/backend/register')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="register-content">
                                <label class="control-label">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                                <div class="row row-space-10">
                                    <div class="col-md-6 m-b-15">
                                        <input type="text" class="form-control" name="firstname" placeholder="ชื่อ"
                                               required/>
                                    </div>
                                    <div class="col-md-6 m-b-15">
                                        <input type="text" class="form-control" name="lastname" placeholder="นามสกุล"
                                               required/>
                                    </div>
                                </div>
                                <label class="control-label">อีเมล <span class="text-danger">*</span></label>
                                <div class="row m-b-15">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="email" placeholder="อีเมล"
                                               required/>
                                    </div>
                                </div>
                                <label class="control-label">รหัสผ่าน <span class="text-danger">*</span></label>
                                <div class="row m-b-15">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน"
                                               required/>
                                    </div>
                                </div>
                                <label class="control-label">สถานนะ <span class="text-danger">*</span></label>
                                <div class="row m-b-15">
                                    <div class="col-md-12">
                                        <select class="form-control mb-3" name="status">
                                            <option value="" selected="">เลือกสถานะ</option>
                                            <option value="1">อาจารย์</option>
                                            <option value="2">นักเรียน</option>
                                        </select>
                                    </div>
                                </div>
                                <label class="control-label">รูปโปรไฟล์ <span class="text-danger">*</span></label>
                                <div class="form-group">
                                <div class="row m-b-15">
                                    <div class="col-md-12">
                                        {{ csrf_field() }}
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                </div>
                                    <div class="col-md-12">
                                    <img id="show_image" width="150px" class="img">
                                    </div>
                                    <br>
                                </div>
                                <div class="register-buttons">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">สมัครสมาชิก</button>
                                </div>
                                <hr/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
           data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
@endsection

