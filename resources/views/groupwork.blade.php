@extends('main')
@section('content')
    <div id="content" class="content">
        <div class="row">
            <div class="col-xl-12">
                <a href="{{url('/dashborad')}}" class="btn btn-default">กลับ</a>
                <br>
                <br>
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <!-- begin panel-heading -->
                    <div class="panel-heading" style="background: black;">
                        <h4 class="panel-title">แบบฝึกหัด</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <!-- end panel-heading -->
                    <!-- begin panel-body -->

                    <div class="panel-body">
                        <table id="data-table-responsive-groupwork" width="100%"
                               class="table table-bordered table-td-valign-middle">
                            <thead>
                            <tr style="font-size: 18px;">
                                <th class="text-nowrap">ลำดับ</th>
                                <th class="text-nowrap">กิจกรรม</th>
                                <th class="text-nowrap">รายละเอียด</th>
                                <th class="text-nowrap">วันเวลา</th>
                                <th class="text-nowrap">ไฟล์</th>
                                <th class="text-nowrap">จัดการ</th>
                            </tr>
                            </thead>
                            <?php  $x = 1; ?>
                            @foreach($groupwork as $groupworks)
                            <tr class="odd gradeX" style="font-size: 16px;">
                            <td style="width: 2%">{{$x}}</td>
                            <td style="width: 10%">{{$groupworks->group_works_name}}</td>
                            <td style="width: 35%">{{$groupworks->group_works_description}}</td>
                            <td style="width: 37%">{{$groupworks->group_works_start}} ถึง {{$groupworks->group_works_end}}</td>
                            <td style="width: 5%;text-align: center">
                                <a title="ไฟล์ href="{{asset("/storage/$groupworks->group_works_file")}}">
                                    <i class="far fa-lg fa-file-pdf" style="color: red;">
                                    </i>
                                    </a>
                            </td>
                            <td style="width: 10%;text-align: center">
                                <a href="#modal-dialog{{$groupworks->group_works_id}}" data-toggle="modal"
                                   class="btn btn-primary btn-icon btn-circle btn-lg">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="ดูนักเรียนที่ส่งการบ้าน"
                                   href="/workinfo/{{$groupworks->group_works_id}}"
                                   class="btn btn-warning btn-icon btn-circle btn-lg">
                                    <i class="fa fa-search"></i>
                                </a>
                            </td>
                                <div class="modal fade" id="modal-dialog{{$groupworks->group_works_id}}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><i class="fa fa-edit"
                                                                           style="color: dodgerblue;">แก้ไขงาน {{$groupworks->group_works_name}}</i>
                                                </h4>
                                            </div>
                                            <form class="form-horizontal form-bordered"
                                                  action="{{url('/groupwork/update')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" style="font-size: 18px;">ชื่อวิชา
                                                            : </label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group date">
                                                                <input type="text" class="form-control" name="names"
                                                                       value="{{$groupworks->group_works_name}}"
                                                                       required/>
                                                                <input type="text" class="form-control"
                                                                       hidden="hidden" name="id"
                                                                       value="{{$groupworks->group_works_id}}"/>
                                                                <input type="hidden" class="form-control"
                                                                       name="group_id"
                                                                       value="{{$groupworks->group_learn_id }}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" style="font-size: 18px;">รายละเอียด
                                                            : </label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group date">
                                                        <textarea class="form-control" name="description"
                                                                  rows="8">{{$groupworks->group_works_description}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary">แก้ไข</button>
                                                    <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
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
            <div class="col-xl-12">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <!-- begin panel-heading -->
                    <div class="panel-heading" style="background: black;">
                        <h4 class="panel-title">ข้อสอบ</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <!-- end panel-heading -->
                    <!-- begin panel-body -->

                    <div class="panel-body">
                        <table id="data-table-responsive-groupworktwo" width="100%"
                               class="table table-bordered table-td-valign-middle">
                            <thead>
                            <tr style="font-size: 18px;">
                                <th class="text-nowrap">ลำดับ</th>
                                <th class="text-nowrap">กิจกรรม</th>
                                <th class="text-nowrap">รายละเอียด</th>
                                <th class="text-nowrap">วันเวลา</th>
                                <th class="text-nowrap">ไฟล์</th>
                                <th class="text-nowrap">จัดการ</th>
                            </tr>
                            </thead>
                            <?php  $x = 1; ?>
                            @foreach($groupworktwo as $groupworktwos)
                                <tr class="odd gradeX" style="font-size: 16px;">
                                    <td style="width: 2%">{{$x}}</td>
                                    <td style="width: 10%">{{$groupworktwos->group_works_name}}</td>
                                    <td style="width: 35%">{{$groupworktwos->group_works_description}}</td>
                                    <td style="width: 37%">{{$groupworktwos->group_works_start}} ถึง {{$groupworktwos->group_works_end}}</td>
                                    <td style="width: 5%;text-align: center">
                                        <a href="{{asset("/storage/$groupworktwos->group_works_file")}}">
                                            <i class="far fa-lg fa-file-pdf" style="color: red;">

                                            </i>
                                        </a>
                                    </td>
                                    <td style="width: 10%;text-align: center">
                                        <a href="#modal-dialog{{$groupworktwos->group_works_id}}" data-toggle="modal"
                                           class="btn btn-primary btn-icon btn-circle btn-lg">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a title="ดูนักเรียนที่ส่งการบ้าน"
                                           href="/workinfo/{{$groupworktwos->group_works_id}}"
                                           class="btn btn-warning btn-icon btn-circle btn-lg">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </td>
                                    <div class="modal fade" id="modal-dialog{{$groupworktwos->group_works_id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fa fa-edit"
                                                                               style="color: dodgerblue;">แก้ไขงาน {{$groupworktwos->group_works_name}}</i>
                                                    </h4>
                                                </div>
                                                <form class="form-horizontal form-bordered"
                                                      action="{{url('/groupwork/update')}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label" style="font-size: 18px;">ชื่อวิชา
                                                                : </label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group date">
                                                                    <input type="text" class="form-control" name="names"
                                                                           value="{{$groupworktwos->group_works_name}}"
                                                                           required/>
                                                                    <input type="text" class="form-control"
                                                                           hidden="hidden" name="id"
                                                                           value="{{$groupworktwos->group_works_id}}"/>
                                                                    <input type="text" class="form-control"
                                                                           hidden="hidden" name="group_id"
                                                                           value="{{$groupworktwos->group_learn_id }}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label" style="font-size: 18px;">รายละเอียด
                                                                : </label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group date">
                                                        <textarea class="form-control" name="description"
                                                                  rows="8">{{$groupworktwos->group_works_description}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary">แก้ไข</button>
                                                        <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
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
                $('#data-table-responsive-groupwork').DataTable({
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
                $('#data-table-responsive-groupworktwo').DataTable({
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
            </script>
@endsection