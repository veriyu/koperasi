<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="utf-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon"> 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title> @yield('title') </title>


    <!-- Gentelella -->
    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors_gentelella\bootstrap\dist\css\bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors_gentelella/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors_gentelella/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets/vendors_gentelella/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets/vendors_gentelella/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->

    <link href="{{ asset('assets/vendors_gentelella/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- Gentelella -->


    {{-- jquery --}}
    {{-- <script src="../public/js/jquery-1.7.2.min.js"></script> --}}
    {{-- <script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script> --}}
    {{-- /jquery-1.7.2.min --}}

    {{-- select2 --}}
    {{-- <script src="../public/select2/js/select2.min.js"></script> --}}
    <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
    {{-- <link href="../public/select2/css/select2.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet">
    {{-- select2 --}}

    {{-- sweet alert --}}
    {{-- <script src="../public/sweetalert/js/sweetalert.min.js"></script> --}}
    <script src="{{ asset('assets/sweetalert/js/sweetalert.min.js') }}"></script>
    {{-- <link href="../public/sweetalert/css/sweetalert.css" rel="stylesheet"> --}}
    <link href="{{ asset('assets/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
    {{-- sweet alert --}}


    <!-- Scripts -->

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="nav-md">

    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ URL::to('home') }}" class="site_title"><i class="fa fa-plus-square"></i> <span>Talenta Sejahtera</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{{ asset('assets/image/user.png') }}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Selamat Datang</span>
                            <h2>{{ Session::get('user_name') }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                @if(Session::get('user_group') == 'admin' || Session::get('user_group') == 'super admin')
                                <li><a href="{{URL::to('/home')}}"><i class="fa fa-home"></i> Beranda </a>
                                {{-- <li>{{  Session::get('user_group')  }}</li> --}}
                                    {{-- <ul class="nav child_menu">
                                        <li><a href="index.html">Dashboard</a></li>
                                        <li><a href="index2.html">Dashboard2</a></li>
                                        <li><a href="index3.html">Dashboard3</a></li>
                                    </ul> --}}
                                </li>
                                @endif
                                

                                {{-- MODULE USER --}}
                                @if(Session::get('user_group') == 'super admin')
                                <li>
                                    <a href="{{ URL::to('user') }}"><i class="fa fa-clone"></i>User </a>
                                </li>
                                @endif
                                {{-- /MODULE USER --}}

                                {{-- MODULE ANGGOTA --}}
                                <li>
                                    <a href="{{ URL::to('anggota') }}"><i class="fa fa-clone"></i>Anggota </a>
                                </li>
                                {{-- /MODULE ANGGOTA --}}

                                {{-- MODULE SETORAN --}}
                                <li>
                                    <a href="{{ URL::to('setoran') }}"><i class="fa fa-clone"></i>Setoran </span></a>
                                </li>
                                {{-- /MODULE SETORAN --}}

                                {{-- MODULE SETORAN --}}
                                <li>
                                    <a href="{{ URL::to('pengeluaran') }}"><i class="fa fa-clone"></i>Pengeluaran </span></a>
                                </li>
                                {{-- /MODULE SETORAN --}}

                                {{-- MODULE LAPORAN --}}
                                <li><a><i class="fa fa-clone"></i>Laporan <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ URL::to('jurnal') }}">Jurnal</a></li>
                                        {{-- <li><a href="{{ URL::to('pasien') }}">Pasien</a></li> --}}
                                        {{-- <li><a href="{{ URL::to('obat') }}">Data Obat</a></li> --}}
                                        {{-- <li><a> <span class="fa fa-chevron-down"></span>Laporan</a> --}}
                                            {{-- <ul class="nav child_menu"> --}}
                                                {{-- <li class="sub_menu"> --}}
                                                    {{-- <a href="{{ URL::to('laporan_poliklinik_kegiatan') }}">Laporan Kegiatan</a> --}}
                                                {{-- </li> --}}
                                            {{-- </ul> --}}
                                        {{-- </li> --}}
                                    </ul>
                                </li>
                                {{-- MODULE LAPORAN --}}
                            </ul>
                        </div>
                        
                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="row" >
                          <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                          </a>
                          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                          </a>
                          <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                          </a>
                          <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                          </a> -->

                        </div>
                        <!-- /menu footer buttons -->
                       
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('assets/image/user.png') }}" alt="">{{ Session::get('user_name') }}
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;"> Profile</a></li>
                                        <li><a href="javascript:;">Help</a></li>
                                        <li><a href="{{ URL::to('logout') }}""><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>

                                
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    @yield('content')
                </div>
                <!-- /page content -->


            </div>
        </div>
    
    <!-- jQuery -->
    {{-- <script src="{{ asset('assets/vendors_gentelella/jquery/dist/jquery.min.js') }} "></script> --}}
    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendors_gentelella/bootstrap/dist/js/bootstrap.min.js') }} "></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/vendors_gentelella/fastclick/lib/fastclick.js') }} "></script>
    <!-- NProgress -->
    <script src="{{ asset('assets/vendors_gentelella/nprogress/nprogress.js') }} "></script>
    <!-- Chart.js -->
    <script src="{{ asset('assets/vendors_gentelella/Chart.js/dist/Chart.min.js') }} "></script>
    <!-- gauge.js -->
    <script src="{{ asset('assets/vendors_gentelella/gauge.js/dist/gauge.min.js') }} "></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('assets/vendors_gentelella/bootstrap-progressbar/bootstrap-progressbar.min.js') }} "></script>
    <!-- iCheck -->
    <script src="{{ asset('assets/vendors_gentelella/iCheck/icheck.min.js') }} "></script>
    <!-- Skycons -->
    <script src="{{ asset('assets/vendors_gentelella/skycons/skycons.js') }} "></script>
    <!-- Flot -->
    <script src="{{ asset('assets/vendors_gentelella/Flot/jquery.flot.js') }} "></script>
    <script src="{{ asset('assets/vendors_gentelella/Flot/jquery.flot.pie.js') }} "></script>
    <script src="{{ asset('assets/vendors_gentelella/Flot/jquery.flot.time.js') }} "></script>
    <script src="{{ asset('assets/vendors_gentelella/Flot/jquery.flot.stack.js') }} "></script>
    <script src="{{ asset('assets/vendors_gentelella/Flot/jquery.flot.resize.js') }} "></script>
    <!-- Flot plugins -->
    <script src="{{ asset('assets/vendors_gentelella/flot.orderbars/js/jquery.flot.orderBars.js') }} "></script>
    <script src="{{ asset('assets/vendors_gentelella/flot-spline/js/jquery.flot.spline.min.js') }} "></script>
    <script src="{{ asset('assets/vendors_gentelella/flot.curvedlines/curvedLines.js') }} "></script>
    <!-- DateJS -->
    <script src="{{ asset('assets/vendors_gentelella/DateJS/build/date.js') }} "></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/vendors_gentelella/jqvmap/dist/jquery.vmap.js') }} "></script>
    <script src="{{ asset('assets/vendors_gentelella/jqvmap/dist/maps/jquery.vmap.world.js') }} "></script>
    <script src="{{ asset('assets/vendors_gentelella/jqvmap/examples/js/jquery.vmap.sampledata.js') }} "></script>
    
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('assets/js_gentelella/moment/moment.min.js') }}"></script>    
    <script src="{{ asset('assets/js_gentelella/datepicker/daterangepicker.js') }}"></script>

    {{-- datatables --}}
    {{-- <script src="datatables/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{ asset('assets/vendors_gentelella/datatables.net/js/jquery.dataTables.min.js') }}"></script>

    {{-- jquery UI --}}
    <script src="{{ asset('assets/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <link href="{{ asset('assets/jquery-ui-1.12.1.custom/jquery-ui.min.css') }}" rel="stylesheet">

    <!-- Pusher Scripts -->
    {{-- <script src="{{ asset('assets/pusherjs/pusher.min.js') }} "></script> --}}
    <script src="//js.pusher.com/3.2/pusher.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/build/js/custom.min.js') }}"></script>
</body>
<!-- footer content -->
<footer>
    <div class="pull-right">
        by <a href="http://www.dragokreatif.com">DragoKreatifIndo</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</html>
