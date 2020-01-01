<?php
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
$user = Auth::id();
$worker = User::withRole('Worker')->where('id', $user)->pluck('name', 'id')->first();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('storage/app/public/logo-mini.png') }}" type="image/x-icon">
    <!-- Bootstrap WYSIHTML5 -->
    <link rel="stylesheet" href="{{ url('/public/css/admin/bootstrap3-wysihtml5.min.css') }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">
    <!-- Bootstrap Toggle Switch -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- Custom Admin CSS -->
    <link href="{{ url('public/css/admin/custom.css') }}" rel="stylesheet">
    {{--@yield('css')--}}
    @stack('css')
</head>

<body class="skin-blue sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ url('/admin/home') }}" class="logo">
                <span class="logo-mini">
                    <img src="{{ route('api.resize', ['img' => 'public/logo-mini.png', 'w=25', 'h=25']) }}">
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    <img src="{{ route('api.resize', ['img' => 'public/logo-mini.png', 'w=40', 'h=40']) }}"> {{ config('app.name') }}
                </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle alert-msg" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell-o"></i>
                                {{--Span--}}
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <span></span> unread notifications</li>
                                <li>
                                    <ul class="menu">

                                    </ul>
                                </li>
                                {{--<li class="footer"><a href="#">View all</a></li>--}}
                            </ul>
                        </li>

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ Auth::user()->details->image_url }}" class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ Auth::user()->details->image_url }}" class="user-image"
                                         alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('admin.users.profile') }}"
                                           class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <?php if(!empty($worker)){
                                        $userData = DB::table('attendance')
                                                ->join('users', 'attendance.user_id', '=', 'users.id')
                                                ->select('attendance.*', 'users.*')
                                                ->where(['attendance.job_date' => date('Y-m-d'), 'attendance.time_out' => NULL])
                                                ->get();

                                        if($userData->count() == 0){
                                            // Time Out
                                            $time = 0;
                                        }else{
                                            // Time In
                                            $time = 1;
                                        } ?>
                                         <?php if($time == 0){ ?>
                                            <a href="javascript:void(0)" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal">Clock In</a>
                                        <?php }else{ ?>
                                            <a href="javascript:void(0)" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal">Clock Out</a>
                                            <?php } } ?>
                                        <a href="{!! url('/admin/logout') !!}" class="btn btn-default btn-flat"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>

                                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header clearfix" style="min-height:40px">
                <h1 class="pull-left">@yield('title')</h1>
                @php
                    try {
                        echo Breadcrumbs::render(Route::currentRouteName());
                    } catch (Exception $exception) {
                        echo '<div class="breadcrumb">';
                        echo $exception->getMessage();
                        echo '</div>';
                    }
                @endphp
                {{--{{ Breadcrumbs::render(Route::currentRouteName()) }}--}}
            </section>
            @yield('content')
        </div>
        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © {{ date('Y')  }} <a href="#">{{ config('app.name')  }}</a>.</strong> All rights
            reserved.
        </footer>
    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/admin/') !!}">
                    {{ config('app.name')  }}
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/admin/home') !!}">Home</a></li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/admin/login') !!}">Login</a></li>
                    <li><a href="{!! url('/admin/register') !!}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                            <!-- Trigger the modal with a button -->
                </div>
            </div>
        </div>
    </div>
@endif

<!-- jQuery 3.1.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--  Bootstrap Toogle switch-->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- SweetAlert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ url('/public/js/admin/bootstrap3-wysihtml5.all.min.js') }}"></script>

{{--    @yield('scripts')--}}
@stack('scripts')
<script src="{{ url('public/js/admin/custom.js') }}"></script>
    <?php if(!empty($worker)){
    $userData = DB::table('attendance')
            ->join('users', 'attendance.user_id', '=', 'users.id')
            ->select('attendance.*', 'users.*')
            ->where(['attendance.job_date' => date('Y-m-d'), 'attendance.time_out' => NULL])
            ->get();


    if($userData->count() == 0){
        // Time Out
        $time = 0;
    }else{
        // Time In
        $time = 1;
    }
    ?>
    <script>
        $(document).ready(function(){
            <?php if($time == 0){ ?>
            $('#myModal').modal('toggle');
            <?php } ?>
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Clock In / Clock Out</h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                    {!! Form::open(['route' => 'admin.clock']) !!}
                        <input type="hidden" name="csrf-token" value="{{csrf_token()}}">
                        <?php if($time == 0){ ?>
                        <input type="submit" value="Clock In?" class="btn btn-success" name="submit">
                        <?php }else{ ?>
                        <input id="clock_out" type="submit" name="clock_out" value="Clock Out?" class="btn btn-danger">
                        <?php } ?>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <?php } ?>

    <script>
        $(document).ready(function () {
           $('#clock_in').click(function(){
               var filter = {
                   ser_id: '',
                   model: '',
                   year: '',
                   mileage: ''
                   };
               var token = $('input[name="csrf-token"]').attr('value');
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': token
                   }
               });
               $.ajax({
                   type: 'POST',
                   url: 'home/ajax',
                   dataType: 'JSON',
                   beforeSend: function () {
                       // console.log(filter);
                   },
                   success: function (data) {
                       var arr = [];
                       var html = '';
                   }
               });

           });
        });
    </script>


    <script>

        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).ready(function () {
            refreshData();
            var old_count;

            $.ajax({
                type : "POST",
                url : "home/alert",
                success : function(data){
                    old_count = data;
                }
            });

            setInterval(function () {
                refreshData();
                var msg;
                $.ajax({
                    type: "POST",
                    url: "home/alert",
                    success: function (data) {
                        if (data > old_count) {
                            msg = '<i class="fa fa-bell-o"></i><span class="label label-success">'+data+'</span>';
                            $(".alert-msg").html(msg);
                            old_count = data;
                        }
                    }
                });
            }, 5000);

            function refreshData() {
                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: 'home/notification',
                    dataType: 'JSON',
                    data: {
                        _token: token
                    },
                    success: function (data) {
                        var arr = [];
                        var html;
                        var count = 0;
                        var path = window.location.protocol + "//" + window.location.host + "/"+'sells/showResult/';
                        $.each(data, function (index, item) {
                            if (item.status == 0) {
                                count++;
                                html = '<li><a class="unread" data-id="' + item.id + '" href="' + item.url + '"><i class="fa fa-ticket text-aqua"></i> ' + item.message + '</a></li>';
                            } else {
                                html = '<li><a class="" href="' + item.url + '"><i class="fa fa-ticket text-aqua"></i> ' + item.message + '</a></li>';
                            }
                            arr.push(html);
                        });

                        $(".notifications-menu .dropdown-menu li.header span").html(count);
                        var msg = '<i class="fa fa-bell-o"></i><span class="label label-success">'+count+'</span>';
                        $(".alert-msg").html(msg);
                        $(".notifications-menu .dropdown-menu li").find('ul.menu').html(arr);
                    }
                    ,
                    error: function () {}
                });
            }

            $('body').on('click', 'li a.unread', function () {
                var id = $(this).data("id");
                $.ajax({
                    url: "home/unread/" + id,
                    method: 'GET'
                }).done(function (response) {

                });
            });

        });
    </script>
    <script>
        $("body").on("click", "#get_comment_id", function () {
            var i = $(this).data("value");
//            alert(i);
            $("#comment_id").val(i);

        });
    </script>
</body>
</html>