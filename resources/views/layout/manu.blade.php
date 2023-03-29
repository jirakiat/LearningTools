<div id="page-loader" class="fade show">
    <span class="spinner"></span>
</div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar-default">
        <!-- begin navbar-header -->
        <div class="navbar-header">
            <a href="#" class="navbar-brand"><img class="navbar-logo"
                                                           src=" {{asset('assets/template_html/assets/img/logo/logo.png')}}"><b

                    class="mr-1">ระบบช่วยการเรียนการสอน</b></a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- end navbar-header --><!-- begin header-nav -->
        <ul class="navbar-nav navbar-right">
            <li class="navbar-form">
            </li>
            <li class="dropdown navbar-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php $image=session('image')?>
                    <img src="{{asset("/storage/$image")}}">
                    <span class="d-none d-md-inline">{{ session('firstname')}} {{ session('lastname')}}</span> <b
                        class="caret"></b>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="{{url('signout')}}" class="dropdown-item">Log Out</a>
                </div>
            </li>
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                <li class="nav-profile">
                    <a href="javascript:;" data-toggle="nav-profile">
                        <div class="cover with-shadow"></div>
                        <div class="info">
                            <b class="caret pull-right"></b>{{ session('firstname')}} {{ session('lastname')}}
                            <small>@if(session('status')==1)อาจารย์
                                @elseif(session('status')==2)นักเรียน</small>
                            @endif
                        </div>
                    </a>
                </li>
                <li>
                    <ul class="nav nav-profile">
                        <li><a href="{{url('signout')}}"><i class="fa fa-sign-out-alt"></i> ออกจากระบบ</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end sidebar user -->
            <!-- begin sidebar nav -->
            <ul class="nav">
                @if(session('status')==1)
                <li class="has-sub active">
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <span style="font-size: 12px;">สำหรับอาจารย์</span>
                    </a>
                    <ul class="sub-menu">
                        <li class=""><a href="{{url('/dashborad')}}" style="font-size: 12px;">จัดการรายวิชา</a></li>
                        <li class=""><a href="{{url('/grouplearn')}}" style="font-size: 12px;">สร้างกลุ่มเรียน</a></li>
                    </ul>
                </li>
                    @elseif(session('status')==2)
                        <li class="has-sub active">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <span style="font-size: 12px;">นักเรียน</span>
                            </a>
                            <ul class="sub-menu">
                                <li class=""><a href="{{url('/studentinfo')}}" style="font-size: 12px;">หน้าแรก</a></li>
                            </ul>
                        </li>
                @endif
            </ul>
            </li>
        </div>
            <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
