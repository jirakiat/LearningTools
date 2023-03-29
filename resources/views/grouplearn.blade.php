@extends('main')
@section('content')
    <div id="content" class="content">
        <div class="panel panel-inverse" data-sortable-id="form-plugins-16">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title"></h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body panel-form">
                <form class="form-horizontal form-bordered" action="{{url('/backend/creategroup')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" style="font-size: 14px">ชื่อกลุ่มเรียน</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input id="clipboard-default" type="text" class="form-control" name="namegrouplearn"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" style="font-size: 14px">รายละเอียดกลุ่มเรียน</label>
                        <div class="col-lg-8">
                            <textarea class="form-control m-b-10" id="clipboard-textarea" name="descriptiongrouplearn" rows="7" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label"></label>
                        <div class="col-lg-8">
                            <button class="btn btn-outline-success w-100 btn-lg" type="submit"><i class="fas fa-lg fa-plus"></i> สร้างกลุ่มเรียน</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end panel-body -->
        </div>
    </div>

@endsection
@section('script')
@endsection
