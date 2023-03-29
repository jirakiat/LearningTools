@extends('main')
@section('content')
    <div id="content" class="content  content-full-width">
        {{--<div class="profile">
            <div class="profile-header">
                <img style="width: 100%;height: 200px;" src="{{asset('assets/template_html/assets/img/logo/gallery-65.jpg')}}">
            </div>
        </div>--}}
        <ul class="timeline">
            <a href="{{url('/studentinfo')}}" class="btn btn-default m-3">กลับ</a>
            @foreach($groupwork as $groupworks)
                <li>
                    <div class="timeline-time">
                        <span class="time">{{$groupworks->thaidatestart}}</span>
                    </div>
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <div class="timeline-body">
                        <?php
                        if ($groupworks->group_works_type == 1) {
                            $text = 'แบบฝึกหัด';
                        } elseif ($groupworks->group_works_type == 2) {
                            $text = 'ข้อสอบ';
                        }
                        ?>
                        <div class="timeline-header">
                            <span class="userimage"><img src="{{asset("/storage/$groupworks->image")}}" alt=""/></span>
                            <span class="username"><a
                                        href="javascript:;">{{$groupworks->firstname}} {{$groupworks->lastname}}</a> <small></small></span>
                            <span style="font-size: 16px;" class='badge bade-danger bg-primary w-20'>{{$text}}</span>
                            @foreach($grouppostwork as $grouppostworks)
                                <?php
                                        if($grouppostworks->verifytime>$groupworks->group_works_end){
                                            $late = 'ส่งงานล่าช้า';
                                            $color='red';
                                        }else{
                                            $late = '';
                                           $color='green';
                                           }
                                ?>
                            @if($grouppostworks->group_works_id==$groupworks->group_works_id)
                                <span class="views" style="color:{{$color}}"><i class="far fa-lg fa-check-circle">ส่งงานแล้ว {{$late}}  <br> <br>(เวลา{{$grouppostworks->verifytimethai}})</i></span>
                            @endif
                            @endforeach
                        </div>
                        <div class="timeline-content">
                            <b style="font-size: 18px;">{{$groupworks->group_works_name}}</b> <br>
                            <span style="font-size: 16px;">{{$groupworks->group_works_description}}</span>
                            <span style="font-size: 12px;color: green;"><br>(เวลางาน {{$groupworks->thaidatestart}}ถึง{{$groupworks->thaidateend}})</span>
                            <div class="boxed-layout pull-right">
                                <a class="btn btn-danger w-100"
                                   href="{{asset("/storage/$groupworks->group_works_file")}}">
                                    <i class="far fa-lg fa-file-pdf" style="width: 100%;">

                                    </i>
                                </a>
                            </div>
                            @foreach($grouppostwork as $grouppostworks)
                            @if($grouppostworks->group_works_id==$groupworks->group_works_id)
                            @if(isset($grouppostworks->studentpostworks_file))
                                <div class="boxed-layout pull-right">
                                    <a class="btn btn-success w-100"
                                       href="{{asset("/storage/$grouppostworks->studentpostworks_file")}}">
                                        <i class="far fa-lg fa-file-pdf" style="width: 100%;">

                                        </i>
                                    </a>
                                </div>
                            @endif
                            @endif
                            @endforeach
                        </div>
                        <div class="timeline-likes">

                        </div>
                        <div class="timeline-comment-box">
                            <?php $image = session('image')?>
                            <div class="user w-auto"><img src="{{asset("/storage/$image")}}"/></div>
                            <div class="input">
                                <form class="form-horizontal form-bordered"
                                      enctype="multipart/form-data"
                                      action="{{url('/student/postwork')}}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        {{ csrf_field() }}
                                        <input type="file" id="file" class="form-control rounded-corner" name="image"
                                               placeholder="แนบไฟล์"/>
                                        <input type="hidden" value="{{$groupworks->group_works_id}}" name="work_id">
                                        <input type="hidden" value="{{$groupworks->group_learn_id}}" name="group_id">
                                        <span class="input-group-btn p-l-10">
										<button class="btn btn-primary f-s-12 rounded-corner"
                                                type="submit">ส่งงาน</button>
										</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end timeline-body -->
                </li>
            @endforeach
            <li>
                <div class="timeline-body">
                    Loading...
                </div>
            </li>
        </ul>
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