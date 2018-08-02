<!DOCTYPE html>

<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title> {{$color->name}}
            @yield('title') </title> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="{{asset('style/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('style//assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('style//assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('style/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{asset('style//assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />


        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->

        <link href="{{asset('style//assets/global/css/components-rtl.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('style//assets/global/css/plugins-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('style/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('style/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" rel="stylesheet" type="text/css">


        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('style//assets/layouts/layout/css/layout-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('style//assets/layouts/layout/css/themes/'.$color->color)}}" rel="stylesheet" type="text/css" id="style_color">
        <link href="{{asset('style//assets/layouts/layout/css/custom.css')}}" rel="stylesheet" type="text/css" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="{{asset('style/assets/global/plugins/bootstrap-select/bootstrap-select-rtl.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('style/assets/global/plugins/select2/select2-rtl.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('style/assets/global/plugins/select2/select2-metronic-rtl.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('style/assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css')}}"/>
        <link rel="shortcut icon" href="{{ asset('img/ss')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen-sprite.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.min.css">
        <link rel="shortcut icon" href="http://zaawel.com/icon.ico" />
        <style>

            .chosen-container {
                width: 100% !Important;
                height: 30px;
            }
            .page-content {
                background: #eef1f5;
            }
            .padding-top{
                padding-top: 6px;
            }
        </style>

    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white ">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{url('/admin-cpx')}}" style="
                       margin-top: 10px;font-size: 20px
                       ">
                                             <!--  <img src="{{ asset('style/assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
                        -->

                        <span class="username username-hide-on-mobile hname" style="color:#fff;">لوحة </span>
                        <span class="username username-hide-on-mobile hname" style="color:#428bca;"> التحكم</span>

                    </a>

                </div>

                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="{{ asset('style//assets/layouts/layout/img/avatar3_small.jpg')}}" />
                                <span class="username username-hide-on-mobile">{{ Auth::user()->name }}   </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{route('admin.changePassword') }}">
                                        <i class="fa fa-lock"></i> تغير كلمة المرور </a>
                                </li>


                                <li>
                                    <a href="{{ route('admin.logout') }}">
                                        <i class="fa fa-sign-out"></i>
                                        خروج
                                    </a>


                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->

            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- END SIDEBAR MENU -->
                <div class="page-sidebar-wrapper">

                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper" style="
                            text-align: center; margin: 37px auto;
                            margin-top: 87px;
                            margin-bottom: 70px;
                            font-size: 41px;
                            color: #fff;
                            ">
                            {{$color->name}}
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->


                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        </li>

                        <li class="nav-item start @if(Request::segment(2)=='') 
                            active 
                            @endif ">
                            <a href="{{route('admin.dashboard')}}" class="nav-link ">
                                <i class="fa fa-home"></i>
                                <span class="title">الرئيسية</span>
                            </a>

                        </li>
                        <li class="heading">

                            <h3 class="uppercase"> إعدادات الموقع
                            </h3>
                        </li>

                        <li class="nav-item  @if(Request::segment(2)=='setting' )
                            active 
                            @endif  ">
                            <a href="{{ Route('admin.setting')}}" class="nav-link ">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                                <span class="title">  إعدادات الموقع
                                </span>
                            </a>

                        </li>

                        <li class="heading">

                            <h3 class="uppercase"> إدارة المستخدمين
                            </h3>
                        </li>

                        <li class="nav-item  @if(Request::segment(2)=='admins' )
                            active 
                            @endif  ">
                            <a href="{{ Route('admins.admins')}}" class="nav-link ">
                                <i class="fa fa-user-secret" aria-hidden="true"></i>
                                <span class="title"> مدراء الموقع
                                </span>
                            </a>

                        </li>



                        <li class="heading">

                            <h3 class="uppercase">إدارة الطلبات
                            </h3>
                        </li>
                        <li class="nav-item  @if(Request::segment(2)=='orders'  )
                            active
                            @endif  ">
                            <a href="{{ Route('admin.orders')}}" class="nav-link ">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                <span class="title">  الطلبات
                                </span>
                            </a>

                        </li>
                            <li class="heading">

                            <h3 class="uppercase">إدارة   عمليات تأكيد الدفع
                            </h3>
                        </li>
                        <li class="nav-item  @if(Request::segment(2)=='payments'  )
                            active
                            @endif  ">
                            <a href="{{ Route('admin.payments')}}" class="nav-link ">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <span class="title">  عمليات تأكيد الدفع
                                </span>
                            </a>

                        </li>
                        
                        <li class="heading">

                            <h3 class="uppercase"> إدارة حالات الطلب
                            </h3>
                        </li>
                        <li class="nav-item  @if(Request::segment(2)=='states'  )
                            active
                            @endif  ">
                            <a href="{{ Route('states.index')}}" class="nav-link ">
                                <i class="fa fa-adn" aria-hidden="true"></i>
                                <span class="title">حالات الطلب</span>
                            </a>

                        </li>
                        <li class="heading">

                            <h3 class="uppercase"> إدارة  البنوك
                            </h3>
                        </li>
                        <li class="nav-item  @if(Request::segment(2)=='banks'  )
                            active
                            @endif  ">
                            <a href="{{ Route('banks.index')}}" class="nav-link ">
                                <i class="fa fa-bank" aria-hidden="true"></i>
                                <span class="title"> البنوك</span>
                            </a>

                        </li>

                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->

                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        @yield('breadcrumb')
                        <!--    <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Dashboard</span>
                                </li>
                            </ul>-->

                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    @yield('content')


                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->

                </div>
            </div>
            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->





            <!-- END CONTENT BODY -->

        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->

        <!-- END QUICK SIDEBAR -->

        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer" style="    height: 5px;">
            <div class="page-footer-inner">   {{$color->name }} {{date("Y")}}  &copy;

            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>

        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->


        <script src="<?= url('style/assets_cpanel/plugins/jquery-1.10.2.min.js') ?>" type="text/javascript"></script>
        <script src="<?= url('style/assets_cpanel/plugins/jquery-migrate-1.2.1.min.js') ?>" type="text/javascript"></script>
        <script src="<?= url('style/assets_cpanel/plugins/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <script src="<?= url('style/assets_cpanel/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') ?>" type="text/javascript"></script>
        <script src="<?= url('style/assets_cpanel/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
        <script src="<?= url('style/assets_cpanel/plugins/jquery.blockui.min.js') ?>" type="text/javascript"></script>
        <script src="<?= url('style/assets_cpanel/plugins/jquery.cokie.min.js') ?>" type="text/javascript"></script>
        <script src="<?= url('style/assets_cpanel/plugins/uniform/jquery.uniform.min.js') ?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <script src="{{asset('style/assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="<?= url('style/assets_cpanel/plugins/gritter/js/jquery.gritter.js') ?>"></script>
        <script type="text/javascript" src="<?= url('style/assets_cpanel/plugins/jquery.pulsate.min.js') ?>"></script>
        <script type="text/javascript" src="<?= url('style/assets_cpanel/plugins/jquery-bootpag/jquery.bootpag.min.js') ?>"></script>
        <script type="text/javascript" src="<?= url('style/assets_cpanel/plugins/holder.js') ?>"></script>
        <script type="text/javascript" src="<?= url('style/assets_cpanel/plugins/bootstrap-fileinput/bootstrap-fileinput.js') ?>"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <script src="{{asset('style/assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('style/assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?= url('style/assets_cpanel/scripts/core/app.js') ?>"></script>
        <script src="<?= url('style/assets_cpanel/scripts/custom/ui-general.js') ?>"></script>
        <script src="{{asset('style/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{asset('style/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('style/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="{{asset('style/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('style/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
jQuery(document).ready(function () {
    // initiate layout and plugins
    App.init();
    UIGeneral.init();
    $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = $('#datepicker').val();
                var max = $('#dt').val();
                var age = parseFloat(data[3]) || 0; // use data for the age column

                if ((isNaN(min) && isNaN(max)) ||
                        (isNaN(min) && age <= max) ||
                        (min <= date && isNaN(max)) ||
                        (min <= date && age <= max))
                {
                    return true;
                }
                return false;
            }
    );
    $('#datepicker, #dt').keyup(function () {
        table.draw();
    });
    var table = $('#example').dataTable({
        "language": {
            "search": "بحث",
            "lengthMenu": "عرض _MENU_ صفوف",
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "الكل"]],
        order: [[0, 'desc']]
    });


    $(function () {
        $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
        $(".dt").datepicker({dateFormat: 'yy-mm-dd'});

    });
    $(function () {
        $("#datepicker").datepicker($.datepicker.regional[ "ar" ]);
    });
});

        </script>
        <script>
            jQuery(document).ready(function ($) {
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });
            });
            $('body').on('focus', ".dt", function () {
                $(this).datepicker();
            });
            $('[data-toggle="collapse"]').click('shown.bs.collapse', function () {
                var googleIframe = $('#map');
                googleIframe.addClass('map-refreshed');
            });
        </script>


        <script src="{{asset('style/assets/global/scripts/jquery.validate.min.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
        @yield('js')
    </body>

</html>