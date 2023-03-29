@extends('main')
@section('content')
    <div id="content" class="content">
        <a href="{{url('/dashborad')}}" class="btn btn-default m-3">กลับ</a>
        <div class="panel panel-inverse" data-sortable-id="form-plugins-16">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title"style="font-size: 18px;">เพิ่มงานกับชั้นเรียน {{$grouplearn->group_learn_name}}</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body panel-form">
                <form class="form-horizontal form-bordered"
                      enctype="multipart/form-data"
                      action="{{url('/group/postwork')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label"
                               style="font-size: 18px;">ชื่องาน
                            : </label>
                        <div class="col-lg-8">
                            <div class="input-group date">
                                <input type="text" class="form-control"
                                       name="names" required/>
                                <input type="text" class="form-control"
                                       hidden="hidden" name="id"
                                       value="{{$grouplearn->group_learn_id}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label"
                               style="font-size: 18px;">รายละเอียด
                            : </label>
                        <div class="col-lg-8">
                            <div class="input-group date">
                                                        <textarea class="form-control" name="description"
                                                                  rows="8" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label"
                               style="font-size: 18px;">ประเภทงาน
                            : </label>
                        <div class="col-lg-8">
                            <select class="form-control mb-3" name="type"
                                    required>
                                <option value="" selected>เลือกประเภท</option>
                                <option value="1">แบบฝึกหัด</option>
                                <option value="2">ข้อสอบ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label"
                               style="font-size: 18px;">ไฟล์ : </label>
                        <div class="col-lg-8">
                            {{ csrf_field() }}
                            <input type="file" class="form-control" name="image"
                                   id="image">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label"
                               style="font-size: 18px;">วัน: </label>
                        <div class="col-lg-8">
                            <div id="demo-calendar"></div>
                            <label>
                                <input id="start" type="hidden"
                                       placeholder="Please select..."
                                       name="startdate"/>
                            </label>
                            <label>
                                <input id="end" type="hidden"
                                       placeholder="Please select..."
                                       name="enddate"/>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label"></label>
                        <div class="col-lg-8">
                            <button class="btn btn-outline-success w-100 btn-lg" type="submit"><i class="fas fa-lg fa-plus"></i> เพิ่มงาน</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end panel-body -->
        </div>
    </div>

@endsection
@section('script')
    <script>
        mobiscroll.setOptions({
            locale: mobiscroll.localeEn,
            theme: 'ios',
            themeVariant: 'light',
        });
        $(function () {
            $('#demo-calendar').mobiscroll().datepicker({
                controls: ['calendar', 'time'],
                select: 'range',
                startInput: '#start',
                endInput: '#end',
                // min: 'now',   ปิดวันก่อนหน้า
                touchUi: true,
                display: 'inline',
            });
        });
    </script>
@endsection
