@extends('main')
@section('content')
    <div id="content" class="content">
        <h1 class="page-header">เข้าร่วมชั้นเรียน <small></small></h1>

            <form class="form-horizontal form-bordered"
                  action="{{url('/joingroup')}}" method="post">
                @csrf
            <div class="col-lg-12 input-group input-group-lg mb-3">
                <input type="text" name="group_id" class="form-control input-white" placeholder="รหัสเข้าร่วมชั้นเรียน">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> เข้าร่วม</button>
            </div>
                @if (session('error'))
                    <div style="text-align: left; font-size: 18px; color: #ff0000;text-align: center;"
                         class="alert alert-danger fade show">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       {{ session('error') }}
                    </div>
                @endif
            </form>

        <h1 class="page-header">ชั้นเรียนที่เข้าร่วม <small></small></h1>
        <div class="row">
            <!-- begin col-3 -->
            @foreach($groupstudents as $groupstudent)
            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-blue">
                    <div class="stats-icon"><i class="fa fa-notes-medical"></i></div>
                    <div class="stats-info">
                        <h4>{{$groupstudent->firstname}} {{$groupstudent->lastname}}</h4>
                        <p>{{$groupstudent->group_learn_name}}</p>
                    </div>
                    <div class="stats-link">
                        <a href="detail/work/{{$groupstudent->group_learn_id}}">รายละเอียด<i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
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