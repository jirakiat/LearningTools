@extends('main')
@section('content')
    <div id="content" class="content">
        <div class="row">
            <div class="col-xl-12">
                <?php $url=$groupwork->group_learn_id; ?>
                <a href="{{url("group/work/$url")}}" class="btn btn-default">กลับ</a>
                <br>
                <br>
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <!-- begin panel-heading -->
                    <div class="panel-heading" style="background: black;">
                        <h4 class="panel-title"></h4>
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
                                <th class="text-nowrap">นักเรียน</th>
                                <th class="text-nowrap">รายละเอียด</th>
                                <th class="text-nowrap">นักเรียนส่งงาน</th>
                            </tr>
                            </thead>
                                <tr class="odd gradeX" style="font-size: 16px;">
                                    <td style="width: 40%">{{$groupwork->group_works_name}}</td>
                                    <td style="width: 40%">{{$groupwork->group_works_description}}</td>

                                        <td style="width: 20%">
                                            @foreach($student as $students)
                                            {{ $students->firstname}} {{$students->lastname}}
                                        @foreach($grouppostwork as $grouppostworks)
                                                    <?php
                                                    if($grouppostworks->verifytime>$groupwork->group_works_end){
                                                        $late = 'ส่งงานล่าช้า';
                                                        $color='red';
                                                    }else{
                                                        $late = 'ส่งงานแล้ว';
                                                        $color='green';
                                                    }
                                                    ?>
                                            @if($grouppostworks->students_id==$students->students_id)
                                            @if($grouppostworks->group_works_id==$groupwork->group_works_id)
                                                <span style="font-size: 16px;color: {{$color}}">{{$late}}</span>
                                                                <a
                                                                   href="{{asset("/storage/$grouppostworks->studentpostworks_file")}}">
                                                                    <i class="far fa-lg fa-file-pdf" style="color: red;">

                                                                    </i>
                                                                </a>
                                                        @endif
                                            @endif
                                        @endforeach
                                                <br>
                                            @endforeach
                                        </td>
                                </tr>
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