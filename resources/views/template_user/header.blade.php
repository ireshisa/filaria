<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Filaria | @isset($title){{$title}}@endisset</title>


    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/dist/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('/bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/datatables.min.css"/>--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- <link rel="stylesheet" href="{{ asset('/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"> --}}
    <script>
        function result_bloodChange(val) {
            if (val == "Positive") {
                document.getElementById("checkData").style.display = 'block';
            } else {
                document.getElimentById("checkData").style.display = "none";
            }
        }

        function getMoh(val) {
            $.ajax({
                type: "GET",
                url: "getMohByDistrict/" + val,
                data: null,
                success: function(data) {
                    $("#moh_list").html(data);
                }
            });
        }


        function formIdChange(val) {

            var main_form_type = document.getElementById("main_form_type").value;
            if (main_form_type == "ento_01") {
                $.ajax({
                    type: "GET",
                    url: "getEnto1FromData/" + val,
                    data: null,
                    success: function(data) {
                        var splitAr = data.split(":")
                        document.getElementById("furniture_and_fittings").value = splitAr[0];
                        document.getElementById("clothes_and_hang").value = splitAr[1];
                        document.getElementById("bed_nets").value = splitAr[2];
                        document.getElementById("walls").value = splitAr[3];
                        document.getElementById("electronic").value = splitAr[4];
                        document.getElementById("others").value = splitAr[5];
                        // total_mosquitos_collecte
                        document.getElementById("total_cx_quin_mosq").value = splitAr[6];
                        document.getElementById("man_hrs_spent").value = ((splitAr[7] / 60) * splitAr[8]).toFixed(1);
                        document.getElementById("catch_per_mh").value = (splitAr[6] / ((splitAr[7] / 60) * splitAr[8])).toFixed(1);
                        document.getElementById("total_mansonia_sp").value = splitAr[9];
                        // 2/11/2021 newly add
                        document.getElementById("furniture_and_fittings_mansonia").value = splitAr[10];
                        document.getElementById("clothes_and_hang_mansonia").value = splitAr[11];
                        document.getElementById("bed_nets_mansonia").value = splitAr[12];
                        document.getElementById("walls_mansonia").value = splitAr[13];
                        document.getElementById("electronic_mansonia").value = splitAr[14];
                        document.getElementById("others_mansonia").value = splitAr[15];
                    }
                });
            }

            if (main_form_type == "ento_02") {
                $.ajax({
                    type: "GET",
                    url: "getEnto2FromData/" + val,
                    data: null,
                    success: function(data) {
                        var splitAr = data.split(":")
                        document.getElementById("furniture_and_fittings").value = 0
                        document.getElementById("clothes_and_hang").value = 0;
                        document.getElementById("bed_nets").value = 0;
                        document.getElementById("walls").value = 0;
                        document.getElementById("electronic").value = 0;
                        document.getElementById("others").value = 0;
                        // total_mosquitos_collecte
                        document.getElementById("total_cx_quin_mosq").value = splitAr[6];
                        document.getElementById("man_hrs_spent").value = 0;
                        document.getElementById("catch_per_mh").value = 0;
                        document.getElementById("total_mansonia_sp").value = splitAr[9];

                    }
                });
            }


            if (main_form_type == "ento_03") {
                $.ajax({
                    type: "GET",
                    url: "getEnto3FromData/" + val,
                    data: null,
                    success: function(data) {
                        var splitAr = data.split(":")
                        document.getElementById("furniture_and_fittings").value = splitAr[0];
                        document.getElementById("clothes_and_hang").value = splitAr[1];
                        document.getElementById("bed_nets").value = splitAr[2];
                        document.getElementById("walls").value = splitAr[3];
                        document.getElementById("electronic").value = splitAr[4];
                        document.getElementById("others").value = splitAr[5];
                        // total_mosquitos_collecte
                        document.getElementById("total_cx_quin_mosq").value = splitAr[6];
                        document.getElementById("man_hrs_spent").value = ((splitAr[7] / 60) * splitAr[8]).toFixed(1);
                        document.getElementById("catch_per_mh").value = (splitAr[6] / ((splitAr[7] / 60) * splitAr[8])).toFixed(1);
                        document.getElementById("total_mansonia_sp").value = splitAr[9];

                    }
                });
            }


            if (main_form_type == "ento_04") {
                $.ajax({
                    type: "GET",
                    url: "getEnto4FromData/" + val,
                    data: null,
                    success: function(data) {
                        var splitAr = data.split(":")
                        document.getElementById("furniture_and_fittings").value = splitAr[0];
                        document.getElementById("clothes_and_hang").value = splitAr[1];
                        document.getElementById("bed_nets").value = splitAr[2];
                        document.getElementById("walls").value = splitAr[3];
                        document.getElementById("electronic").value = splitAr[4];
                        document.getElementById("others").value = splitAr[5];
                        // total_mosquitos_collecte
                        document.getElementById("total_cx_quin_mosq").value = splitAr[6];
                        document.getElementById("man_hrs_spent").value = ((splitAr[7] / 60) * splitAr[8]).toFixed(1);
                        document.getElementById("catch_per_mh").value = (splitAr[6] / ((splitAr[7] / 60) * splitAr[8])).toFixed(1);
                        document.getElementById("total_mansonia_sp").value = splitAr[9];
                    }
                });
            }

        }

        function getEntoFrom(val) {
            $.ajax({
                type: "GET",
                url: "getEntoFrom/" + val,
                data: null,
                success: function(data) {
                    $("#id_list").html(data);
                }
            });

            // var main_form_type = document.getElementById("main_form_type").value;
            // document.getElementById("furniture_and_fittings").value = 0;
            // document.getElementById("clothes_and_hang").value = 0;
            // document.getElementById("others").value = 0;







            // var x = document.getElementById("display_none");
            // var x2 = document.getElementById("display_none2");

            // var x33 = document.getElementById("resting_sites");
            // var x44 = document.getElementById("no_of_cpq");

            // var xx55 = document.getElementById("total_mansonia_sp_div");
            // var xxt55 = document.getElementById("total_cx_sp_div");




            // if (main_form_type == "ento_01") {
            //     x2.style.display = "block";
            //     xx55.style.display = "block";

            //     // x33.style.display = "none";
            //     x44.style.display = "none";


            // } else {

            //     x2.style.display = "none";
            //     x44.style.display = "none";
            //     // x33.style.display = "none";
            // }


            // if (main_form_type == "ento_01") {
            //     x.style.display = "block";
            // } else {
            //     x.style.display = "none";
            // }

            // if (main_form_type == "ento_04") {


            // }


            // if (main_form_type == "ento_02") {
            //     x.style.display = "none";
            // }

        }

        function getPhi(val) {
            $.ajax({
                type: "GET",
                url: "getPhi/" + val,
                data: null,
                success: function(data) {
                    $("#phi_list").html(data);
                }
            });
        }



        // get addres for ento 5

        function getaddress(val) {
            $.ajax({
                type: "GET",
                url: "getaddress/" + val,
                data: null,
                success: function(data) {
                    $("#ad_list").html(data);
                }
            });
        }






        function geth867From(val) {
            $.ajax({
                type: "GET",
                url: "getgroupnu/" + val,
                data: null,
                success: function(data) {
                    $("#group_id").html(data);
                }
            });
        }




        // new enot 5 form get total 
        // function formIdChangeNew(val) {
        //     var main_form_type = document.getElementById("main_form_type").value;
        //     var type = ""
        //     if (main_form_type == "ento_01") {
        //         type = 1;
        //     }
        //     if (main_form_type == "ento_02") {
        //         type = 2;
        //     }
        //     if (main_form_type == "ento_03") {
        //         type = 3;
        //     }
        //     if (main_form_type == "ento_04") {
        //         type = 4;
        //     }
        //     $.ajax({
        //         type: "GET",
        //         url: "getEntoAllFromData/"+type+"/"+val,
        //         data: null,
        //         success: function(data) {
        //             var splitAr = data.split(":")
        //             document.getElementById("total_cx_quin_mosq_value").value = splitAr[0];
        //             document.getElementById("total_mansonia_sp_value").value = splitAr[1];
        //         }
        //     });
        // }


        function newgetaddress(val) {

            var main_form_type = document.getElementById("main_form_type").value;
            var type = "";


            if (main_form_type == "ento_01") {
                type = 1;
            }
            if (main_form_type == "ento_02") {
                type = 2;
            }
            if (main_form_type == "ento_03") {
                type = 3;
            }
            if (main_form_type == "ento_04") {
                type = 4;
            }

            if (main_form_type == "ento_03" || main_form_type == "ento_04") {

                   
                $.ajax({
                    type: "GET",
                    url: "{{url('/newgetaddress2') }}/" + type + "/" + val,
                    data: null,
                    success: function(data) {
                     
                        $("#mosqspecies").html(data);
                    }
                });


                $.ajax({
                    type: "GET",
                    url: "{{url('/newgetaddress') }}/" + type + "/" + val,
                    data: null,
                    success: function(data) {
                  
                        $("#ad_list").html(data);
                       
                    }
                });


            } else {
                $.ajax({
                    type: "GET",
                    url: "{{url('/newgetaddress') }}/" + type + "/" + val,
                    data: null,
                    success: function(data) {
                        $("#ad_list").html(data);
                        $("#mosqspecies").html("<option value='CX'> Cx quin </option><option value='Mansonia'> Mansonia </option>");
                    }
                });
            }

            // file the data 
            $.ajax({
                type: "GET",
                url: "{{url('/ento5fill') }}/" + type + "/" + val,
                data: null,
                success: function(data) {
                    var splitAr = data.split(":")

                    document.getElementById("received_by_postion").value = splitAr[0];
                    document.getElementById("received_by").value = splitAr[1];
                    document.getElementById("dissected_by_by_postion").value = splitAr[2];
                    document.getElementById("dissected_by").value = splitAr[3];
                    document.getElementById("examined_by_by_postion").value = splitAr[4];
                    document.getElementById("examined").value = splitAr[5];
                    document.getElementById("dissected_by_date").value = splitAr[6];
                    document.getElementById("examined_date").value = splitAr[7];
                    document.getElementById("received_by_date").value = splitAr[8];
                }
            });

        }










        // get addres for ento 5
    </script>
    <style>
        .datepicker {
            z-index: 9999 !important;
        }

        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .content-header>h1>small {
            text-transform: lowercase !important;
            font-size: 17px !important;
            letter-spacing: 2px !important;
            font-weight: 600 !important;
        }

        .sub_header {
            background: #e6e0e0;
            padding: 10px;
            text-align: center;
            font-weight: bold;
        }

        .modal-dialog {
            width: 70%;
        }

        .modal-header {
            height: 60px;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{url('/dashboard') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>F</b>L</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Filaria</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{url('/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }} ({{ Auth::user()->role }} )</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{url('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                                    <p>
                                        {{ Auth::user()->name }}
                                        <!-- <small>Member since Nov. 2012</small> -->
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                            </li> -->
                                <!-- Menu Footer-->
                                <li class="user-footer" style="background:#95c1da">
                                    <!-- <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div> -->
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" class="btn btn-danger btn-flat" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{url('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p> {{ Auth::user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">NAVIGATION</li>
                    <li class="active">
                        <a href="{{url('/dashboard') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <!-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i> <span>En Topological data</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-files-o"></i> <span>ENTO 1</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('/ento1') }}"><i class="fa fa-circle-o"></i>ENTO 1 FORM</a></li>
                                    <li><a href="{{url('/ento1_data') }}"><i class="fa fa-circle-o"></i>ENTO 1 DATA</a>
                                    </li>
                                    <li><a href="{{url('/ento1_view') }}"><i class="fa fa-circle-o"></i>ENTO 1 VIEW</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                    <li class="treeview ">
                        <a href="#">
                            <i class="fa fa-files-o"></i> <span>Entomological data</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            {{-- @if(Auth::user()->role==="HEO" || Auth::user()->role==="PHLT" ||  Auth::user()->role==="RMO" ||  Auth::user()->role==="AFC" || Auth::user()->role==="ADMIN"     ) --}}
                            @if(Auth::user()->role!=="PHLT")
                            <li><a href="{{url('/ento1newForm') }}"><i class="fa fa-circle-o"></i>Indoor Hand Collection FORM</a></li>
                            <!-- <li><a href="{{url('/ento1_data') }}"><i class="fa fa-circle-o"></i>ENTO 1 DATA</a></li> -->

                            <li><a href="{{url('/ento1_view') }}"><i class="fa fa-circle-o"></i> Indoor Hand collection VIEW</a></li>

                            @endif
                            <br>
                            @if(Auth::user()->role!=="PHLT")
                            <li><a href="{{url('/ento2newForm') }}"><i class="fa fa-circle-o"></i>Gravid Trap Collection FORM</a></li>
                            <!-- <li><a href="{{url('/ento2_data') }}"><i class="fa fa-circle-o"></i>ENTO 2 DATA</a></li> -->
                            @endif

                            <li><a href="{{url('/ento2_view') }}"><i class="fa fa-circle-o"></i>Gravid Trap Collection VIEW</a></li>

                            @if(Auth::user()->role!=="PHLT")
                            <br>
                            <li><a href="{{url('/ento3New') }}"><i class="fa fa-circle-o"></i>Cattle Baited Net Trap FORM</a></li>
                            <!-- <li><a href="{{url('/ento3_data') }}"><i class="fa fa-circle-o"></i>ENTO 3 DATA FORM</a>
                            </li> -->
                            <li><a href="{{url('/ento3_view') }}"><i class="fa fa-circle-o"></i>Cattle Baited Net Trap VIEW</a></li>
                            @endif
                            <br>

                            @if(Auth::user()->role!=="PHLT")
                            <li><a href="{{url('/ento4new') }}"><i class="fa fa-circle-o"></i>Human landing Night FORM</a></li>
                            <!-- <li><a href="{{url('/ento4indoor') }}"><i class="fa fa-circle-o"></i>ENTO 4 INDOOR</a></li>
                            <li><a href="{{url('/ento4outdoor') }}"><i class="fa fa-circle-o"></i>ENTO 4 OUTDOOR</a> -->
                    </li>
                    <li><a href="{{url('/ento4_view') }}"><i class="fa fa-circle-o"></i>Human landing Night VIEW</a></li>
                    @endif

                    <br>
                    @if(Auth::user()->role!=="PHLT")

                    <li>
                        <a href="{{url('/ento5new') }}"><i class="fa fa-circle-o"></i>Mosquito Dissection FORM</a>
                    </li>

                    @endif

                    <li>
                        <a href="{{url('/ento5_view') }}"><i class="fa fa-circle-o"></i>Mosquito Dissection VIEW</a>
                    </li>

                </ul>
                </li>
                <!-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i> <span>ENTO 2</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('/ento2') }}"><i class="fa fa-circle-o"></i>ENTO 2 FORM</a></li>
                            <li><a href="{{url('/ento2_data') }}"><i class="fa fa-circle-o"></i>ENTO 2 DATA</a></li>
                            <li><a href="{{url('/ento2_view') }}"><i class="fa fa-circle-o"></i>ENTO 2 VIEW</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i> <span>ENTO 3</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('/ento3') }}"><i class="fa fa-circle-o"></i>ENTO 3 FORM</a></li>
                            <li><a href="{{url('/ento3_data') }}"><i class="fa fa-circle-o"></i>ENTO 3 DATA FORM</a>
                            </li>
                            <li><a href="{{url('/ento3_view') }}"><i class="fa fa-circle-o"></i>ENTO 3 VIEW</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i> <span>ENTO 4</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('/ento4') }}"><i class="fa fa-circle-o"></i>ENTO 4 FORM</a></li>
                            <li><a href="{{url('/ento4indoor') }}"><i class="fa fa-circle-o"></i>ENTO 4 INDOOR</a></li>
                            <li><a href="{{url('/ento4outdoor') }}"><i class="fa fa-circle-o"></i>ENTO 4 OUTDOOR</a>
                            </li>
                            <li><a href="{{url('/ento4_view') }}"><i class="fa fa-circle-o"></i>ENTO 4 VIEW</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i> <span>ENTO 5</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('/ento5') }}"><i class="fa fa-circle-o"></i>ENTO 5 FORM</a></li>
                            <li><a href="{{url('/ento5mosq') }}"><i class="fa fa-circle-o"></i>ENTO 5 MOSQ</a></li>
                            <li><a href="{{url('/ento5species') }}"><i class="fa fa-circle-o"></i>ENTO 5 SPECIES</a>
                            </li>
                            <li><a href="{{url('/ento5_view') }}"><i class="fa fa-circle-o"></i>ENTO 5 VIEW</a></li>
                        </ul>
                    </li> -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i> <span>Patient data</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(Auth::user()->role!=="PHLT")
                        <li>
                            <a href="{{url('/case_investigation_form') }}"><i class="fa fa-circle-o"></i>
                                CASE INVESTIGATION FORM</a>
                        </li>

                        <li>
                            <a href="{{url('/case_lx_follow_up') }}"><i class="fa fa-circle-o"></i>
                                MF POSITIVE PATIENT <br>
                                <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                FOLLOW-UP FORM
                            </a>
                        </li>
                        @endif
                        <li><a href="{{url('/caselx_view') }}"><i class="fa fa-circle-o"></i>
                                CASE INVESTIGATION AND
                                <br><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                MF POSITIVE PATIENT
                                <br><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                FOLLOW UP VIEW
                            </a></li>



                        @if(Auth::user()->role!=="PHLT")
                        <br> <br>
                        <li>
                            <a href="{{url('/migrant_form') }}"><i class="fa fa-circle-o"></i>
                                REPORTING FORM FOR
                                <br><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                MIGRANTS
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/migrant_follow_up') }}">
                                <i class="fa fa-circle-o"></i>
                                FOLLOW-UP FORM FOR
                                <br><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                MIGRANTS
                            </a>
                        </li>
                        @endif



                        <li><a href="{{url('/migrant_view') }}"><i class="fa fa-circle-o"></i>
                                REPORTING & FOLLOW-UP
                                <br><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                FORM FOR MIGRANTS VIEW
                            </a></li>

                        @if(Auth::user()->role!=="PHLT")
                        <br>
                        <br>
                        <li><a href="{{url('/c1_form') }}"><i class="fa fa-circle-o"></i>MORBIDITY DATA FORM 1 <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(C1 FORM)</a></li>
                        <li><a href="{{url('/c1_data') }}"><i class="fa fa-circle-o"></i>MORBIDITY DATA FORM 2 <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(C2 FORM)</a></li>
                        <li><a href="{{url('/c1_view') }}"><i class="fa fa-circle-o"></i>MORBIDITY DATA FORM 1 VIEW</a></li>
                        <li><a href="{{url('/view_c1_data') }}"><i class="fa fa-circle-o"></i>MORBIDITY DATA FORM 2 VIEW</a></li>

                        @endif


                    </ul>
                </li>z
                <!-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i> <span>MIGRANT</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('/migrant_form') }}"><i class="fa fa-circle-o"></i>MIGRANT</a></li>
                            <li><a href="{{url('/migrant_follow_up') }}"><i class="fa fa-circle-o"></i>MIGRANT FOLLOW
                                    UP</a></li>
                            <li><a href="{{url('/migrant_view') }}"><i class="fa fa-circle-o"></i>MIGRANT VIEW</a></li>
                        </ul>
                 </li> -->
                @if(Auth::user()->role!=="HEO")
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i> <span>Parasitological Data</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/h867_form') }}"><i class="fa fa-circle-o"></i>H 867</a></li>
                        <li><a href="{{url('/h867_data') }}"><i class="fa fa-circle-o"></i>H 867 DATA</a></li>
                        <li><a href="{{url('/h867_view') }}"><i class="fa fa-circle-o"></i>H 867 VIEW</a></li>
                    </ul>
                </li>
                @endif

                <!-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i> <span>C1</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('/c1_form') }}"><i class="fa fa-circle-o"></i>C1</a></li>
                            <li><a href="{{url('/c1_data') }}"><i class="fa fa-circle-o"></i>C1 DATA</a></li>
                            <li><a href="{{url('/c1_view') }}"><i class="fa fa-circle-o"></i>C1 VIEW</a></li>
                        </ul>
                    </li> -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i> <span>Output Forms</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(Auth::user()->role!=="HEO")
                        <li><a href="{{url('/f1_report') }}"><i class="fa fa-circle-o"></i>A 1</a></li>
                        <li><a href="{{url('/a2_report') }}"><i class="fa fa-circle-o"></i>A 2</a></li>
                        <li><a href="{{url('/a3_report') }}"><i class="fa fa-circle-o"></i>A 3</a></li>
                        @endif
                        <li><a href="{{url('/b1_report') }}"><i class="fa fa-circle-o"></i>B 1</a></li>
                        <li><a href="{{url('/b2_report') }}"><i class="fa fa-circle-o"></i>B 2</a></li>

                        <!-- <li><a href="{{url('/c2_report') }}"><i class="fa fa-circle-o"></i>MORBIDITY DATA <br>
                                <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> OUTPUT FORM 1 (C2 FORM)</a>
                        </li> -->

                        <!-- <li><a href="{{url('/c1_report') }}"><i class="fa fa-circle-o"></i>MORBIDITY DATA <br>
                                <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> OUTPUT FORM 2 (C1 FORM)</a>
                        </li> -->

                        <li><a href="{{url('/h867_report') }}"><i class="fa fa-circle-o"></i>H867</a></li>

                        <!-- <li><a href="{{url('/genderstageofdisease') }}"><i class="fa fa-circle-o"></i>Lymphoedema patients</a></li> -->
                        <!-- <li><a href="{{url('/newmorbidity') }}"><i class="fa fa-circle-o"></i>Regional MORBIDITY DATA <br></a></li> -->


                        @if(Auth::user()->role == "AFC" || Auth::user()->role == "ADMIN"|| Auth::user()->role == "RMO"  )
                        <li><a href="{{url('/newmorbidity_regional') }}"><i class="fa fa-circle-o"></i>District Morbidity Data <br></a></li>
                        <li><a href="{{url('/genderstageofdisease') }}"><i class="fa fa-circle-o"></i>District New:Age,Gender,Stage<br></a></li>
                        <li><a href="{{url('/genderstageofdisease_sub') }}"><i class="fa fa-circle-o"></i>District Subsequent:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Age,Gender,Stage </a></li>
              
                        @endif





                        <br>



                        @if(Auth::user()->role == "AFC" || Auth::user()->role == "ADMIN" )


                        <li><a href="{{url('/newmorbidityNational') }}"><i class="fa fa-circle-o"></i>National Morbidity Data <br></a></li>
                        <li><a href="{{url('/national_new_lympoedema') }}"><i class="fa fa-circle-o"></i>National New:Age,Gender <br></a></li>
                        <li><a href="{{url('/national_new_lympoedema_stage') }}"><i class="fa fa-circle-o"></i>National New:Stage <br></a></li>
                       </br>
                        <li><a href="{{url('/national_new_lympoedema_subsquen') }}"><i class="fa fa-circle-o"></i>National Subsequent:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  Age,Gender <br></a></li>
                        <li><a href="{{url('/national_subsquen_lympoedema_stage') }}"><i class="fa fa-circle-o"></i>National Subsequent:Stage <br></a></li>

                        @endif

                    </ul>
                </li>











                @if(Auth::user()->role=="ADMIN")
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i> <span>User Account</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/userRegister') }}"><i class="fa fa-circle-o"></i>Register</a></li>
                        <li><a href="{{ url('/manage_users') }}"><i class="fa fa-circle-o"></i>Manage User</a></li>
                    </ul>
                </li>
                @endif



                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i> <span>Morbidity Data </span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/initial_registration') }}"><i class="fa fa-circle-o"></i>New Patient Registration Form</a></li>
                        <li><a href="{{url('/initial_registration_view') }}"><i class="fa fa-circle-o"></i>View-New Patient Registration</a></li>
                        <br>
                        <li><a href="{{url('/initial_registration_mo') }}"><i class="fa fa-circle-o"></i>Clinical Assessment Form </a></li>
                        <li><a href="{{url('/initial_registration_mo_view') }}"><i class="fa fa-circle-o"></i> View-Clinical Assessment </a></li>
                        <br>
                        <li><a href="{{url('/treatment') }}"><i class="fa fa-circle-o"></i> Clinical Management Form</a></li>
                        <li><a href="{{url('/treatment_view') }}"><i class="fa fa-circle-o"></i>View-Clinical Management  </a></li>


                        <br>
                        <li><a href="{{url('/subsequent') }}"><i class="fa fa-circle-o"></i> Subsequent Visit Form</a></li>
                        <li><a href="{{url('/subsequent_view') }}"><i class="fa fa-circle-o"></i> View-Subsequent Visit </a></li>






                        <br>
                        <!-- <li><a href="{{url('/change_appoinmentt') }}"><i class="fa fa-circle-o"></i> Change Appointments </a></li> -->

                    </ul>
                </li>










                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>