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
                        <h4 class="panel-title">นักเรียน</h4>
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
                                <th class="text-nowrap">นักเรียน</th>
                                <th class="text-nowrap">ภาพ</th>
                            </tr>
                            </thead>
                            <?php  $x = 1; ?>
                            @foreach($students as $student)
                                <tr class="odd gradeX" style="font-size: 16px;">
                                    <td style="width: 2%">{{$x}}</td>
                                    <td style="width: 93%">{{$student->firstname}} {{$student->lastname}}</td>
                                    <td style="width: 5%"><img class="width-80 h-auto" src="{{asset("/storage/$student->image")}}" alt="" /></td>
                                </tr>
                            @endforeach
                            <?php $x = $x + 1;?>
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