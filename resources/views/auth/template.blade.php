<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Halaman Admin</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="{{asset('img/logo.png')}}" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('/admin/css/theme-default.css')}}"/><!-- 
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('/admin/chart/Chart.js')}}"/> -->
        <!-- <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('/css/app.css')}}"/> -->
        <script type="text/javascript" src="{{ asset('/ckeditor/ckeditor.js')}}"></script>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{url('/home/')}}">
                        Ruang Baca </a>
                        <a href="#" class="x-navigation-control"></a>
                    </li> 
                     <li class="xn-title">Home</li>
                    <li><a href="{{url('/home/')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a></li>   
                     <li class="xn-title">Pencarian</li>
                    <li><a href="{{url('/home/pencarian/buku/tamu')}}"><span class="fa  fa-book"></span> <span class="xn-text">Buku Tamu</span></a></li>
                     <li class="xn-title">Anggota</li>
                    <li><a href="{{url('/home/cek/anggota')}}"><span class="fa  fa-users"></span> <span class="xn-text">Cek Anggota</span></a></li>                                                                     
                     <li class="xn-title">Setting</li>
                     
                    <li><a href="{{url('/home/edit/user/root')}}"><span class="fa  fa-users"></span> <span class="xn-text">AkunKu</span></a></li>
                     <li class="xn-title">Laporan</li> 
                    
                    <li><a href="{{url('/home/laporan/harian')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Harian</span></a></li>
                    <li><a href="{{url('/home/laporan/bulanan')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Bulanan</span></a></li> 
                   <!--  <li><a href="{{url('/home/laporan/tahunan')}}"><span class="fa fa-arrow-right"></span> <span class="xn-text">Bulanan</span></a></li>    -->             
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content" >
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li>
                    <!-- END TOGGLE NAVIGATION -->                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <!-- <ul class="breadcrumb">
                    <li><a href="#">Link</a></li>                    
                    <li class="active">Active</li>
                </ul> -->
                <!-- END BREADCRUMB -->                
               
               <!--  <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Page Title</h2>
                </div>                   
                 -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap" >
                
                    <!-- <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel Title</h3>
                                </div>
                                <div class="panel-body">
                                    Panel body
                                </div>
                            </div>

                        </div>
                    </div> -->
                    <div class="container" >
                    	 <br>
						@include('pesan')
						@yield('mainhome')
					</div>
                
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>      
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->


                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
        <!-- <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>         -->
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->

        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{ asset('/admin/js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{ asset('/admin/js/actions.js')}}"></script>       


        <!-- END TEMPLATE -->
         <!-- START SCRIPTS -->
     

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="{{ asset('/admin/js/plugins/icheck/icheck.min.js')}}"></script>        
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
        
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/morris/raphael-min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/morris/morris.min.js')}}"></script>       
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/rickshaw/rickshaw.min.js')}}"></script>
        <script type='text/javascript' src="{{ asset('/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script type='text/javascript' src="{{ asset('/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>                
        <script type='text/javascript' src="{{ asset('/admin/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>                
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/owl/owl.carousel.min.js')}}"></script>

        <script type="text/javascript" src="{{ asset('/admin/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>                     
        
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{ asset('/admin/js/settings.js')}}"></script>
        
        
        <script type="text/javascript" src="{{ asset('/admin/js/demo_charts_rickshaw.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/demo_dashboard.js')}}"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    <!-- END SCRIPTS -->         
    </body>
</html>


