@extends('main')
@section('content')
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <h1 class="page-header">กลุ่มวิชาที่เปิดสอน <small></small></h1>
        <div class="row">
            <div class="col-xl-12">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <!-- begin panel-heading -->
                    <div class="panel-heading" style="background: black">
                        <h4 class="panel-title"></h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <!-- end panel-heading -->
                    <!-- begin panel-body -->

                    <div class="panel-body">
                        <table id="data-table-responsive-grouplearn" width="100%"
                               class="table table-bordered table-td-valign-middle">
                            <thead>
                            <tr style="font-size: 18px;">
                                <th class="text-nowrap">ลำดับ</th>
                                <th class="text-nowrap">วิชา</th>
                                <th class="text-nowrap">คำอธิบายรายวิชา</th>
                                <th class="text-nowrap">รหัสเข้าชั้นเรียน</th>
                                <th class="text-nowrap">จัดการ</th>
                            </tr>
                            </thead>
                            <?php  $x = 1; ?>
                            @foreach($showgrops as $showgrop)
                                <tr class="odd gradeX" style="font-size: 16px;">
                                    <td style="width: 2%">{{$x}}</td>
                                    <td style="width: 10%">{{$showgrop->group_learn_name}}</td>
                                    <td style="width: 35%">{{$showgrop->group_learn_description}}</td>
                                    <td style="width: 5%;text-align: center">{{$showgrop->group_learn_code}}</td>
                                    <td style="width: 15%;text-align: center">
                                        <a title="แก้ไข" href="#modal-dialog{{$showgrop->group_learn_id}}"
                                           data-toggle="modal"
                                           class="btn btn-primary btn-icon btn-circle btn-lg">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a title="ดูงานในชั้นเรียน" href="/group/work/{{$showgrop->group_learn_id}}"
                                           class="btn btn-warning btn-icon btn-circle btn-lg">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a title="เพิ่มงานให้ชั้นเรียน"
                                           href="/learningpost/{{$showgrop->group_learn_id}}"
                                           class="btn btn-danger btn-icon btn-circle btn-lg">
                                            <i class="fa fa-sticky-note"></i>
                                        </a>
                                        <a title="ดูสมาชิกในห้องเรียน"
                                           href="/studentingroup/{{$showgrop->group_learn_id}}"
                                           class="btn btn-pink btn-icon btn-circle btn-lg">
                                            <i class="fa fa-users"></i>
                                        </a>
                                    </td>
                                    <div class="modal fade" id="modal-dialog{{$showgrop->group_learn_id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fa fa-edit"
                                                                               style="color: dodgerblue;">แก้ไขวิชา {{$showgrop->group_learn_name}}</i>
                                                    </h4>
                                                </div>
                                                <form class="form-horizontal form-bordered"
                                                      action="{{url('/group/update')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                   style="font-size: 18px;">ชื่อวิชา
                                                                : </label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group date">
                                                                    <input type="text" class="form-control"
                                                                           name="names"
                                                                           value="{{$showgrop->group_learn_name}}"
                                                                           required/>
                                                                    <input type="text" class="form-control"
                                                                           hidden="hidden" name="id"
                                                                           value="{{$showgrop->group_learn_id}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                   style="font-size: 18px;">คำอธิบายรายวิชา
                                                                : </label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group date">
                                                        <textarea class="form-control" name="description"
                                                                  rows="8">{{$showgrop->group_learn_description}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary">แก้ไข</button>
                                                        <a href="javascript:;" class="btn btn-danger"
                                                           data-dismiss="modal">ยกเลิก</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <?php $x = $x + 1;?>
                            @endforeach
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('#data-table-responsive-grouplearn').DataTable({
            responsive: true,
            "order": [[0, "asc"],],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "lengthMenu": "แสดง _MENU_ รายการ",
                "zeroRecords": "ไม่มีข้อมูล",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "ไม่มีข้อมูล",
            }
        });

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
