
<div class="content-wrapper">
    <style>
        h4 {
            margin-left: -15px;
            font-weight: 600;
            number-decoration: underline;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        
        MORBIDITY DATA FORM 1(C1 FORM)<br>
            <small>( Fill  all fields) </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">C</a></li>
            <li class="active">MORBIDITY  FORM 1  (C FORM)</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/c1_save') }}">

                {{csrf_field() }}
                <div class="col-md-12">
                    @if(session()->has('message')) @if(session()->get('message')==true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                        <h3><i class="icon fa fa-check"></i> Success!</h3>
                        Successfully save your data.
                    </div>
                    @endif @if(session()->get('message')==false)
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                        <h3><i class="icon fa fa-warning"></i> Failed!</h3>
                        Failed save your data.
                    </div>
                    @endif @endif

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title">Quick Example</h3> -->
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body"></div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputEmail1">District</label>
                                 <select name="district" class="form-control" onchange="getMoh(this.value)">
                                        <option value="">Select</option>
                                        @if(Auth::user()->role !== "ADMIN" & Auth::user()->role !== "AFC")
                                            <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
                                        @else
                                            @foreach ($district_list as $dis)
                                                <option value="{{ $dis->district }}">{{ $dis->district }}</option>
                                            @endforeach
                                        @endif
                                    </select> 
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="text" name="year" class="form-control"> {{-- <select required name="year" class="form-control">
                                        <option value="">Select Year</option>
                                        @for($i = 2016; $i < 2022; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select> --}}
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Month </label>
                                <select name="month" class="form-control">
                                        <option value="">Select Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                            </div>


                          <div class="form-group">
                                <label for="exampleInputPassword1">Date</label>
                                <input type="number" name="date" class="form-control">
                            </div>

                            
                            <!-- <div class="form-group">
                                <label for="exampleInputPassword1">Nunber of clinic sessions</label>
                                <input type="number" name="site" class="form-control">
                            </div> -->

                     
                            <div class="col-md-12">
                                <br>
                                <br>
                                <br>
                                <hr>
                                <div class="row" style="margin: auto auto !important;">
                                    <center>
                                        <h4> FIRST VISIT MALE</h4>
                                    </center>

                                    <div class="col-lg-12 " style="padding: 5px 3px !important; ">

                                        <div class="col-lg-2" style="padding: 5px 3px !important; ">
                                            Age/Stage
                                        </div>

                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">I</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">II</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">III</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">IV</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">V</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">VI</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">VII</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">Total</div>

                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">0 - 10</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="male_0_10_1" value="0" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class=" col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_0_10_2" value="0" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_0_10_3" value="0" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_0_10_4" value="0" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_0_10_5" value="0" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_0_10_6" value="0" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                     <div class="input-group ">
                                            <input type="number" class="form-control " name="male_0_10_7" value="0" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_0_10_total" value="0"  onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->




                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">11-20</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_11_20_1" value="0"  onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_11_20_2" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_11_20_3" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_11_20_4" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_11_20_5" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_11_20_6" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_11_20_7" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_11_20_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->





                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">21-30</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_21_30_1" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_21_30_2" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_21_30_3" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_21_30_4" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_21_30_5" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_21_30_6" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_21_30_7" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_21_30_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->










                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">31-40</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_31_40_1" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_31_40_2" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_31_40_3" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_31_40_4" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_31_40_5" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_31_40_6" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_31_40_7" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_31_40_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->








                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">41-50</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_41_50_1" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_41_50_2" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_41_50_3" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_41_50_4" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_41_50_5" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_41_50_6" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_41_50_7" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_41_50_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->







                                <div class="row " style="margin: auto auto !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">51-60</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_51_60_1" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_51_60_2" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_51_60_3" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_51_60_4" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_51_60_5" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_51_60_6" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_51_60_7" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_51_60_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->



                                <div class="row " style="margin: auto auto !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">61-70</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_61_70_1" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_61_70_2" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_61_70_3" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_61_70_4" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_61_70_5" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_61_70_6" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_61_70_7" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_61_70_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->





                                <div class="row " style="margin: auto auto !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">71-80</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_71_80_1" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_71_80_2" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_71_80_3" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_71_80_4" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_71_80_5" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_71_80_6" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_71_80_7" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_71_80_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->








                                <div class="row " style="margin: auto auto !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">81 and above</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_81_1" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_81_2" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_81_3" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_81_4" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_81_5" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_81_6" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_81_7" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_81_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->








                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">Total</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_total_1" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_total_2" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_total_3" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_total_4" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_total_5" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_total_6" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_total_7" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                     <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="male_total_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->



                                </div>
                                <!-- /.row -->






                                <!--   /////////////////////////////////////////////////////////////////----------------------------------------------------------------------------     -->










                                <hr>






                                <div class="row " style="margin: auto auto !important; ">
                                    <center>
                                        <h4> SUBSEQUENT VISIT MALE</h4>
                                    </center>




                                    <div class="col-lg-12 " style="padding: 5px 3px !important; ">
                                        <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                            Age/Stage
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        I
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        II
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        III
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        IV
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        V
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        VI
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        VII
                                        </div>

                                   <div class="col-lg-1" style="padding: 5px 3px !important; ">Total</div>
                                    </div>
                                    <!-- /.col-lg-6 -->










                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 " style="padding: 5px 0 0 0 !important; ">0 - 10</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_0_10_1" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_0_10_2" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_0_10_3" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_0_10_4" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_0_10_5" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_0_10_6" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_0_10_7" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_0_10_total" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->




                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">11-20</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_11_20_1" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_11_20_2" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_11_20_3" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_11_20_4" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_11_20_5" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_11_20_6" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_11_20_7" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_11_20_total" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->







                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">21-30</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_21_30_1" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_21_30_2" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_21_30_3" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_21_30_4" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_21_30_5" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_21_30_6" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_21_30_7" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_21_30_total" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->



                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">31-40</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_31_40_1" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_31_40_2" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_31_40_3" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_31_40_4" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_31_40_5" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_31_40_6" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_31_40_7" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_31_40_total" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->



                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">41-50</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_41_50_1" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_41_50_2" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_41_50_3" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_41_50_4" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_41_50_5" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_41_50_6" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_41_50_7" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_41_50_total" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->








                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">51-60</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_51_60_1" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_51_60_2" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_51_60_3" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_51_60_4" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_51_60_5" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_51_60_6" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_51_60_7" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_51_60_total" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->












                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">61-70</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_61_70_1" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_61_70_2" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_61_70_3" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_61_70_4" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_61_70_5" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_61_70_6" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_61_70_7" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_61_70_total" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->














                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">71-80</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_71_80_1" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_71_80_2" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_71_80_3" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_71_80_4" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_71_80_5" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_71_80_6" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_71_80_7" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_71_80_total" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->













                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">81 and above</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_80_1" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_80_2" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_80_3" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_80_4" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_80_5" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_80_6" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_80_7" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_80_total" onchange="total_02()" value="0">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->









                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">Total</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_total_1" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_total_2" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_total_3" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_total_4" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_total_5" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_total_6" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_total_7" value="0" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="female_total_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>



                                </div>
                                <!-- /.row -->

                                <!--       /////////////////////////////////////////////////////////////////----------------------------------------------------------------------------       -->
                            </div>















                        </div>
                        <div class="col-md-6 ">


                            <div class="form-group ">
                                <label for="exampleInputPassword1 ">Total number of lymphoedema patients registered
                                        at the clinic </label>
                                <input type="number" name="total_num_lymphed" class="form-control ">
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputPassword1 ">Total number of hydrocele patients registered at
                                        the clinic</label>
                                <input type="number" name="total_num_hydro" class="form-control" value="0">
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputPassword1 ">Follow up of MF positive patients (local)</label>
                                <input type="number" name="mf_pos_patient" class="form-control ">
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputPassword1 ">No of patients referred from other institutions</label>
                                <input type="number" name="opd_patient" class="form-control ">
                            </div>
                            <br>
                            <br>
                            <br>




                            <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                            <hr>
                            <div class="row " style="margin: auto auto !important; ">
                                <center>
                                    <h4> FIRST VISIT FEMALE</h4>
                                </center>


                                <div class="col-lg-12 " style="padding: 5px 3px !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        Age/Stage
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    I
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    II
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    III
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    IV
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    V
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    VI
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    VII
                                    </div>

                                  <div class="col-lg-1" style="padding: 5px 3px !important; ">Total</div>
                                </div>
                                <!-- /.col-lg-6 -->










                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 " style="padding: 5px 0 0 0 !important; ">0 - 10</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_0_10_1" value="0"  onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_0_10_2" value="0"  onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_0_10_3" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_0_10_4" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_0_10_5" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_0_10_6" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_0_10_7" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_0_10_total" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->


                            <div class="row " style="margin: auto auto !important; ">
                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">11-20</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_11_20_1" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_11_20_2" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_11_20_3" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_11_20_4" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_11_20_5" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_11_20_6" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_11_20_7" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_11_20_total" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->









                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">21-30</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_21_30_1" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_21_30_2" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_21_30_3" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_21_30_4" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_21_30_5" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_21_30_6" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_21_30_7" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_21_30_total" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->


                            <div class="row " style="margin: auto auto !important; ">
                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">31-40</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_31_40_1" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_31_40_2" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_31_40_3" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_31_40_4" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_31_40_5" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_31_40_6" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_31_40_7" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_31_40_total" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->







                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">41-50</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_41_50_1" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_41_50_2" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_41_50_3" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_41_50_4" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_41_50_5" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_41_50_6" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_41_50_7" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_41_50_total" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->







                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">51-60</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_51_60_1" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_51_60_2" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_51_60_3" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_51_60_4" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_51_60_5" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_51_60_6" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_51_60_7" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_51_60_total" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->






                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">61-70</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_61_70_1" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_61_70_2" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_61_70_3" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_61_70_4" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_61_70_5" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_61_70_6" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_61_70_7" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_61_70_total" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->








                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">71-80</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_71_80_1" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_71_80_2" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_71_80_3" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_71_80_4" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_71_80_5" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_71_80_6" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_71_80_7" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_71_80_total" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->







                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">81 and above</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_80_1" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_80_2" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_80_3" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_80_4" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_80_5" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_80_6" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_80_7" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_80_total" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->






                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">Total</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_total_1" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_total_2" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_total_3" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_total_4" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_total_5" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_total_6" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="female_total_7" value="0" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>



                                
                                 <div class="col-lg-2" style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_male_total_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->

                            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->












                            <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                            <hr>
                            <div class="row " style="margin: auto auto !important; ">
                                <center>
                                    <h4> SUBSEQUENT VISITS FEMALE</h4>
                                </center>


                                <div class="col-lg-12 " style="padding: 5px 3px !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        Age/Stage
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    I
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    II
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    III
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    IV
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    V
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    VI
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    VII
                                    </div>

                                    <div class="col-lg-1" style="padding: 5px 3px !important; ">Total</div>
                                    
                                </div>
                                <!-- /.col-lg-6 -->











                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 " style="padding: 5px 0 0 0 !important; ">0 - 10</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_0_10_1" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_0_10_2" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_0_10_3" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_0_10_4" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_0_10_5" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_0_10_6" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_0_10_7" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_0_10_total" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->





                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">11-20</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_11_20_1" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_11_20_2" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_11_20_3" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_11_20_4" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_11_20_5" value="0" onchange="total_04()">
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_11_20_6" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_11_20_7" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_11_20_total" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->














                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">21-30</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_21_30_1" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_21_30_2" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_21_30_3" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_21_30_4" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_21_30_5" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_21_30_6" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_21_30_7" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_21_30_total" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->


                            <div class="row " style="margin: auto auto !important; ">
                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">31-40</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_31_40_1"  onchange="total_04()" value="0">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_31_40_2"  onchange="total_04()" value="0">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_31_40_3"  onchange="total_04()" value="0">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_31_40_4"  onchange="total_04()" value="0">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_31_40_5"  onchange="total_04()" value="0">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_31_40_6"  onchange="total_04()" value="0">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_31_40_7"  onchange="total_04()" value="0">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_31_40_total"  onchange="total_04()" value="0">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->

                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">41-50</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_41_50_1" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_41_50_2" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_41_50_3" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_41_50_4" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_41_50_5" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_41_50_6" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_41_50_7" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_41_50_total" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->











                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">51-60</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_51_60_1" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_51_60_2" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_51_60_3" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_51_60_4" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_51_60_5" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_51_60_6" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_51_60_7" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_51_60_total" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->

















                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">61-70</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_61_70_1" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_61_70_2" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_61_70_3" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_61_70_4" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_61_70_5" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_61_70_6" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_61_70_7" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_61_70_total" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->








                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">71-80</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_71_80_1" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_71_80_2" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_71_80_3" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_71_80_4" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_71_80_5" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_71_80_6" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_71_80_7" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_71_80_total" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->










                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">81 and above</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_81_1" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_81_2" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_81_3" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_81_4" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_81_5" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_81_6" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_81_7" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_81_total" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->








                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">Total</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_total_1" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_total_2" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_total_3" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_total_4" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_total_5" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_total_6" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="number" class="form-control " name="subsequent_female_total_7" value="0" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>





                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="number" class="form-control " name="subsequent_female_total_total" value="0" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>


                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->

                            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->









                            <style>
                                .form-control {
                                    padding: 0 0 !important;
                                    color: red;
                                }
                            </style>





                            <!-- male_0_10_total -->






                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>
                <center>
                    <div class="box-footer mr-auto ml-auto ">
                        <button type="submit " class="btn btn-primary ">Submit</button>
                    </div>

                </center>

                <!-- /.box -->
        </div>


        </form>
</div>

</section>

</div>

<script>

   
    
    function total_01() {
 
        var x1=document.getElementsByName("male_0_10_1")[0].value; 
        var x2=document.getElementsByName("male_0_10_2")[0].value; 
        var x3=document.getElementsByName("male_0_10_3")[0].value; 
        var x4=document.getElementsByName("male_0_10_4")[0].value;        
        var x5=document.getElementsByName("male_0_10_5")[0].value; 
        var x6=document.getElementsByName("male_0_10_6")[0].value; 
        var x7=document.getElementsByName("male_0_10_7")[0].value; 
        var x8=Number(x1)+Number(x2)+Number(x3)+Number(x4)+Number(x5)+Number(x6)+Number(x7);
        document.getElementsByName("male_0_10_total")[0].value=x8;
          
        var Q1=document.getElementsByName("male_11_20_1")[0].value; 
        var Q2=document.getElementsByName("male_11_20_2")[0].value; 
        var Q3=document.getElementsByName("male_11_20_3")[0].value; 
        var Q4=document.getElementsByName("male_11_20_4")[0].value;        
        var Q5=document.getElementsByName("male_11_20_5")[0].value; 
        var Q6=document.getElementsByName("male_11_20_6")[0].value; 
        var Q7=document.getElementsByName("male_11_20_7")[0].value; 
        var Q8=Number(Q1)+Number(Q2)+Number(Q3)+Number(Q4)+Number(Q5)+Number(Q6)+Number(Q7);
        document.getElementsByName("male_11_20_total")[0].value=Q8;

        var E1=document.getElementsByName("male_21_30_1")[0].value; 
        var E2=document.getElementsByName("male_21_30_2")[0].value; 
        var E3=document.getElementsByName("male_21_30_3")[0].value; 
        var E4=document.getElementsByName("male_21_30_4")[0].value;        
        var E5=document.getElementsByName("male_21_30_5")[0].value; 
        var E6=document.getElementsByName("male_21_30_6")[0].value; 
        var E7=document.getElementsByName("male_21_30_7")[0].value; 
        var E8=Number(E1)+Number(E2)+Number(E3)+Number(E4)+Number(E5)+Number(E6)+Number(E7);
        document.getElementsByName("male_21_30_total")[0].value=E8;

        var O1=document.getElementsByName("male_31_40_1")[0].value; 
        var O2=document.getElementsByName("male_31_40_2")[0].value; 
        var O3=document.getElementsByName("male_31_40_3")[0].value; 
        var O4=document.getElementsByName("male_31_40_4")[0].value;        
        var O5=document.getElementsByName("male_31_40_5")[0].value; 
        var O6=document.getElementsByName("male_31_40_6")[0].value; 
        var O7=document.getElementsByName("male_31_40_7")[0].value; 
        var O8=Number(O1)+Number(O2)+Number(O3)+Number(O4)+Number(O5)+Number(O6)+Number(O7);
        document.getElementsByName("male_31_40_total")[0].value=O8;

        var R1=document.getElementsByName("male_41_50_1")[0].value; 
        var R2=document.getElementsByName("male_41_50_2")[0].value; 
        var R3=document.getElementsByName("male_41_50_3")[0].value; 
        var R4=document.getElementsByName("male_41_50_4")[0].value;        
        var R5=document.getElementsByName("male_41_50_5")[0].value; 
        var R6=document.getElementsByName("male_41_50_6")[0].value; 
        var R7=document.getElementsByName("male_41_50_7")[0].value; 
        var R8=Number(R1)+Number(R2)+Number(R3)+Number(R4)+Number(R5)+Number(R6)+Number(R7);
        document.getElementsByName("male_41_50_total")[0].value=R8;

        var T1=document.getElementsByName("male_51_60_1")[0].value; 
        var T2=document.getElementsByName("male_51_60_2")[0].value; 
        var T3=document.getElementsByName("male_51_60_3")[0].value; 
        var T4=document.getElementsByName("male_51_60_4")[0].value;        
        var T5=document.getElementsByName("male_51_60_5")[0].value; 
        var T6=document.getElementsByName("male_51_60_6")[0].value; 
        var T7=document.getElementsByName("male_51_60_7")[0].value; 
        var T8=Number(T1)+Number(T2)+Number(T3)+Number(T4)+Number(T5)+Number(T6)+Number(T7);
        document.getElementsByName("male_51_60_total")[0].value=T8;

        var Y1=document.getElementsByName("male_61_70_1")[0].value; 
        var Y2=document.getElementsByName("male_61_70_2")[0].value; 
        var Y3=document.getElementsByName("male_61_70_3")[0].value; 
        var Y4=document.getElementsByName("male_61_70_4")[0].value;        
        var Y5=document.getElementsByName("male_61_70_5")[0].value; 
        var Y6=document.getElementsByName("male_61_70_6")[0].value; 
        var Y7=document.getElementsByName("male_61_70_7")[0].value; 
        var Y8=Number(Y1)+Number(Y2)+Number(Y3)+Number(Y4)+Number(Y5)+Number(Y6)+Number(Y7);
        document.getElementsByName("male_61_70_total")[0].value=Y8;

        var U1=document.getElementsByName("male_71_80_1")[0].value; 
        var U2=document.getElementsByName("male_71_80_2")[0].value; 
        var U3=document.getElementsByName("male_71_80_3")[0].value; 
        var U4=document.getElementsByName("male_71_80_4")[0].value;        
        var U5=document.getElementsByName("male_71_80_5")[0].value; 
        var U6=document.getElementsByName("male_71_80_6")[0].value; 
        var U7=document.getElementsByName("male_71_80_7")[0].value; 
        var U8=Number(U1)+Number(U2)+Number(U3)+Number(U4)+Number(U5)+Number(U6)+Number(U7);
        document.getElementsByName("male_71_80_total")[0].value=U8;

        var P1=document.getElementsByName("male_81_1")[0].value; 
        var P2=document.getElementsByName("male_81_2")[0].value; 
        var P3=document.getElementsByName("male_81_3")[0].value; 
        var P4=document.getElementsByName("male_81_4")[0].value;        
        var P5=document.getElementsByName("male_81_5")[0].value; 
        var P6=document.getElementsByName("male_81_6")[0].value; 
        var P7=document.getElementsByName("male_81_7")[0].value; 
        var P8=Number(P1)+Number(P2)+Number(P3)+Number(P4)+Number(P5)+Number(P6)+Number(P7);
        document.getElementsByName("male_81_total")[0].value=P8;



var x1=document.getElementsByName("male_0_10_1")[0].value;
var Q1=document.getElementsByName("male_11_20_1")[0].value;
var E1=document.getElementsByName("male_21_30_1")[0].value;
var O1=document.getElementsByName("male_31_40_1")[0].value;
var R1=document.getElementsByName("male_41_50_1")[0].value;
var T1=document.getElementsByName("male_51_60_1")[0].value;
var Y1=document.getElementsByName("male_61_70_1")[0].value; 
var U1=document.getElementsByName("male_71_80_1")[0].value;
var P1=document.getElementsByName("male_81_1")[0].value;

var PP8=Number(x1)+Number(Q1)+Number(E1)+Number(O1)+Number(R1)+Number(T1)+Number(Y1)+Number(U1)+Number(P1);
document.getElementsByName("male_total_1")[0].value=PP8;


/////////////////////////////////////////////////////////////////////////////////////////////////////

var x2=document.getElementsByName("male_0_10_2")[0].value; 
var Q2=document.getElementsByName("male_11_20_2")[0].value; 
var E2=document.getElementsByName("male_21_30_2")[0].value; 
var O2=document.getElementsByName("male_31_40_2")[0].value; 
var R2=document.getElementsByName("male_41_50_2")[0].value; 
var T2=document.getElementsByName("male_51_60_2")[0].value; 
var Y2=document.getElementsByName("male_61_70_2")[0].value; 
var U2=document.getElementsByName("male_71_80_2")[0].value; 
var P2=document.getElementsByName("male_81_2")[0].value; 

var PP28=Number(x2)+Number(Q2)+Number(E2)+Number(O2)+Number(R2)+Number(T2)+Number(Y2)+Number(U2)+Number(P2);
document.getElementsByName("male_total_2")[0].value=PP28;

/////////////////////////////////////////////////////////////////////////////////////////////////////

var x3=document.getElementsByName("male_0_10_3")[0].value; 
var Q3=document.getElementsByName("male_11_20_3")[0].value; 
var E3=document.getElementsByName("male_21_30_3")[0].value; 
var O3=document.getElementsByName("male_31_40_3")[0].value; 
var R3=document.getElementsByName("male_41_50_3")[0].value; 
var T3=document.getElementsByName("male_51_60_3")[0].value; 
var Y3=document.getElementsByName("male_61_70_3")[0].value; 
var U3=document.getElementsByName("male_71_80_3")[0].value; 
var P3=document.getElementsByName("male_81_3")[0].value; 

var PP38=Number(x3)+Number(Q3)+Number(E3)+Number(O3)+Number(R3)+Number(T3)+Number(Y3)+Number(U3)+Number(P3);
document.getElementsByName("male_total_3")[0].value=PP38;


/////////////////////////////////////////////////////////////////////////////////////////////////////

var x4=document.getElementsByName("male_0_10_4")[0].value; 
var Q4=document.getElementsByName("male_11_20_4")[0].value; 
var E4=document.getElementsByName("male_21_30_4")[0].value; 
var O4=document.getElementsByName("male_31_40_4")[0].value; 
var R4=document.getElementsByName("male_41_50_4")[0].value; 
var T4=document.getElementsByName("male_51_60_4")[0].value; 
var Y4=document.getElementsByName("male_61_70_4")[0].value; 
var U4=document.getElementsByName("male_71_80_4")[0].value; 
var P4=document.getElementsByName("male_81_4")[0].value; 

var PP48=Number(x4)+Number(Q4)+Number(E4)+Number(O4)+Number(R4)+Number(T4)+Number(Y4)+Number(U4)+Number(P4);
document.getElementsByName("male_total_4")[0].value=PP48;



/////////////////////////////////////////////////////////////////////////////////////////////////////

var x5=document.getElementsByName("male_0_10_5")[0].value; 
var Q5=document.getElementsByName("male_11_20_5")[0].value; 
var E5=document.getElementsByName("male_21_30_5")[0].value; 
var O5=document.getElementsByName("male_31_40_5")[0].value; 
var R5=document.getElementsByName("male_41_50_5")[0].value; 
var T5=document.getElementsByName("male_51_60_5")[0].value; 
var Y5=document.getElementsByName("male_61_70_5")[0].value; 
var U5=document.getElementsByName("male_71_80_5")[0].value; 
var P5=document.getElementsByName("male_81_5")[0].value; 

var PP58=Number(x5)+Number(Q5)+Number(E5)+Number(O5)+Number(R5)+Number(T5)+Number(Y5)+Number(U5)+Number(P5);
document.getElementsByName("male_total_5")[0].value=PP58;

/////////////////////////////////////////////////////////////////////////////////////////////////////
var x6=document.getElementsByName("male_0_10_6")[0].value; 
var Q6=document.getElementsByName("male_11_20_6")[0].value; 
var E6=document.getElementsByName("male_21_30_6")[0].value; 
var O6=document.getElementsByName("male_31_40_6")[0].value; 
var R6=document.getElementsByName("male_41_50_6")[0].value; 
var T6=document.getElementsByName("male_51_60_6")[0].value; 
var Y6=document.getElementsByName("male_61_70_6")[0].value; 
var U6=document.getElementsByName("male_71_80_6")[0].value; 
var P6=document.getElementsByName("male_81_6")[0].value; 

var PP68=Number(x6)+Number(Q6)+Number(E6)+Number(O6)+Number(R6)+Number(T6)+Number(Y6)+Number(U6)+Number(P6);
document.getElementsByName("male_total_6")[0].value=PP68;


/////////////////////////////////////////////////////////////////////////////////////////////////////
var x7=document.getElementsByName("male_0_10_7")[0].value; 
var Q7=document.getElementsByName("male_11_20_7")[0].value; 
var E7=document.getElementsByName("male_21_30_7")[0].value; 
var O7=document.getElementsByName("male_31_40_7")[0].value; 
var R7=document.getElementsByName("male_41_50_7")[0].value; 
var T7=document.getElementsByName("male_51_60_7")[0].value; 
var Y7=document.getElementsByName("male_61_70_7")[0].value; 
var U7=document.getElementsByName("male_71_80_7")[0].value; 
var P7=document.getElementsByName("male_81_7")[0].value; 
var PP69=Number(x7)+Number(Q7)+Number(E7)+Number(O7)+Number(R7)+Number(T7)+Number(Y7)+Number(U7)+Number(P7);
document.getElementsByName("male_total_7")[0].value=PP69;



//get total of total in 
var P1total=document.getElementsByName("male_total_1")[0].value; 
var P2total=document.getElementsByName("male_total_2")[0].value; 
var P3total=document.getElementsByName("male_total_3")[0].value; 
var P4total=document.getElementsByName("male_total_4")[0].value; 
var P5total=document.getElementsByName("male_total_5")[0].value; 
var P6total=document.getElementsByName("male_total_6")[0].value; 
var P7total=document.getElementsByName("male_total_7")[0].value; 

var PP69total=Number(P1total)+Number(P2total)+Number(P3total)+Number(P4total)+Number(P5total)+Number(P6total)+Number(P7total);
document.getElementsByName("male_total_total")[0].value=PP69total;









}




    function total_02() {
    
  
            var M1=document.getElementsByName("subsequent_male_0_10_1")[0].value; 
            var M2=document.getElementsByName("subsequent_male_0_10_2")[0].value; 
            var M3=document.getElementsByName("subsequent_male_0_10_3")[0].value;
            var M4=document.getElementsByName("subsequent_male_0_10_4")[0].value; 
            var M5=document.getElementsByName("subsequent_male_0_10_5")[0].value; 
            var M6=document.getElementsByName("subsequent_male_0_10_6")[0].value;
            var M7=document.getElementsByName("subsequent_male_0_10_7")[0].value;
      

         var PSB1=Number(M1)+Number(M2)+Number(M3)+Number(M4)+Number(M5)+Number(M6)+Number(M7);
         document.getElementsByName("subsequent_male_0_10_total")[0].value=PSB1;


            var B1=document.getElementsByName("subsequent_male_11_20_1")[0].value; 
            var B2=document.getElementsByName("subsequent_male_11_20_2")[0].value; 
            var B3=document.getElementsByName("subsequent_male_11_20_3")[0].value;
            var B4=document.getElementsByName("subsequent_male_11_20_4")[0].value; 
            var B5=document.getElementsByName("subsequent_male_11_20_5")[0].value; 
            var B6=document.getElementsByName("subsequent_male_11_20_6")[0].value;
            var B7=document.getElementsByName("subsequent_male_11_20_7")[0].value;
         

        var PSB2=Number(B1)+Number(B2)+Number(B3)+Number(B4)+Number(B5)+Number(B6)+Number(B7);
         document.getElementsByName("subsequent_male_11_20_total")[0].value=PSB2;



            var N1=document.getElementsByName("subsequent_male_21_30_1")[0].value; 
            var N2=document.getElementsByName("subsequent_male_21_30_2")[0].value; 
            var N3=document.getElementsByName("subsequent_male_21_30_3")[0].value;
            var N4=document.getElementsByName("subsequent_male_21_30_4")[0].value; 
            var N5=document.getElementsByName("subsequent_male_21_30_5")[0].value; 
            var N6=document.getElementsByName("subsequent_male_21_30_6")[0].value;
            var N7=document.getElementsByName("subsequent_male_21_30_7")[0].value;



        var PSB3=Number(N1)+Number(N2)+Number(N3)+Number(N4)+Number(N5)+Number(N6)+Number(N7);
         document.getElementsByName("subsequent_male_21_30_total")[0].value=PSB3;



            var V1=document.getElementsByName("subsequent_male_31_40_1")[0].value; 
            var V2=document.getElementsByName("subsequent_male_31_40_2")[0].value; 
            var V3=document.getElementsByName("subsequent_male_31_40_3")[0].value;
            var V4=document.getElementsByName("subsequent_male_31_40_4")[0].value; 
            var V5=document.getElementsByName("subsequent_male_31_40_5")[0].value; 
            var V6=document.getElementsByName("subsequent_male_31_40_6")[0].value;
            var V7=document.getElementsByName("subsequent_male_31_40_7")[0].value;

          var PSB4=Number(V1)+Number(V2)+Number(V3)+Number(V4)+Number(V5)+Number(V6)+Number(V7);
          document.getElementsByName("subsequent_male_31_40_total")[0].value=PSB4;




            var C1=document.getElementsByName("subsequent_male_41_50_1")[0].value; 
            var C2=document.getElementsByName("subsequent_male_41_50_2")[0].value; 
            var C3=document.getElementsByName("subsequent_male_41_50_3")[0].value;
            var C4=document.getElementsByName("subsequent_male_41_50_4")[0].value; 
            var C5=document.getElementsByName("subsequent_male_41_50_5")[0].value; 
            var C6=document.getElementsByName("subsequent_male_41_50_6")[0].value;
            var C7=document.getElementsByName("subsequent_male_41_50_7")[0].value;
   
          var PSB5=Number(C1)+Number(C2)+Number(C3)+Number(C4)+Number(C5)+Number(C6)+Number(C7);
          document.getElementsByName("subsequent_male_41_50_total")[0].value=PSB5;



            var X1=document.getElementsByName("subsequent_male_51_60_1")[0].value; 
            var X2=document.getElementsByName("subsequent_male_51_60_2")[0].value; 
            var X3=document.getElementsByName("subsequent_male_51_60_3")[0].value;
            var X4=document.getElementsByName("subsequent_male_51_60_4")[0].value; 
            var X5=document.getElementsByName("subsequent_male_51_60_5")[0].value; 
            var X6=document.getElementsByName("subsequent_male_51_60_6")[0].value;
            var X7=document.getElementsByName("subsequent_male_51_60_7")[0].value;

          var PSB6=Number(X1)+Number(X2)+Number(X3)+Number(X4)+Number(X5)+Number(X6)+Number(X7);
          document.getElementsByName("subsequent_male_51_60_total")[0].value=PSB6;
 

            var Z1=document.getElementsByName("subsequent_male_61_70_1")[0].value; 
            var Z2=document.getElementsByName("subsequent_male_61_70_2")[0].value; 
            var Z3=document.getElementsByName("subsequent_male_61_70_3")[0].value;
            var Z4=document.getElementsByName("subsequent_male_61_70_4")[0].value; 
            var Z5=document.getElementsByName("subsequent_male_61_70_5")[0].value; 
            var Z6=document.getElementsByName("subsequent_male_61_70_6")[0].value;
            var Z7=document.getElementsByName("subsequent_male_61_70_7")[0].value;

            var PSB7=Number(Z1)+Number(Z2)+Number(Z3)+Number(Z4)+Number(Z5)+Number(Z6)+Number(Z7);
            document.getElementsByName("subsequent_male_61_70_total")[0].value=PSB7;
       

            var A1=document.getElementsByName("subsequent_male_71_80_1")[0].value; 
            var A2=document.getElementsByName("subsequent_male_71_80_2")[0].value; 
            var A3=document.getElementsByName("subsequent_male_71_80_3")[0].value;
            var A4=document.getElementsByName("subsequent_male_71_80_4")[0].value; 
            var A5=document.getElementsByName("subsequent_male_71_80_5")[0].value; 
            var A6=document.getElementsByName("subsequent_male_71_80_6")[0].value;
            var A7=document.getElementsByName("subsequent_male_71_80_7")[0].value;

            var PSB8=Number(A1)+Number(A2)+Number(A3)+Number(A4)+Number(A5)+Number(A6)+Number(A7);
            document.getElementsByName("subsequent_male_71_80_total")[0].value=PSB8;



            var S1=document.getElementsByName("subsequent_male_80_1")[0].value; 
            var S2=document.getElementsByName("subsequent_male_80_2")[0].value; 
            var S3=document.getElementsByName("subsequent_male_80_3")[0].value;
            var S4=document.getElementsByName("subsequent_male_80_4")[0].value; 
            var S5=document.getElementsByName("subsequent_male_80_5")[0].value; 
            var S6=document.getElementsByName("subsequent_male_80_6")[0].value;
            var S7=document.getElementsByName("subsequent_male_80_7")[0].value;
     
            var PSB9=Number(S1)+Number(S2)+Number(S3)+Number(S4)+Number(S5)+Number(S6)+Number(S7);
            document.getElementsByName("subsequent_male_80_total")[0].value=PSB9;



            var D1=document.getElementsByName("subsequent_male_total_1")[0].value; 
            var D2=document.getElementsByName("subsequent_male_total_2")[0].value; 
            var D3=document.getElementsByName("subsequent_male_total_3")[0].value;
            var D4=document.getElementsByName("subsequent_male_total_4")[0].value; 
            var D5=document.getElementsByName("subsequent_male_total_5")[0].value; 
            var D6=document.getElementsByName("subsequent_male_total_6")[0].value;
            var D7=document.getElementsByName("subsequent_male_total_7")[0].value;



           var PSB10=Number(M1)+Number(B1)+Number(N1)+Number(V1)+Number(C1)+Number(X1)+Number(Z1)+Number(A1)+Number(S1);
           document.getElementsByName("subsequent_male_total_1")[0].value=PSB10;


           var PSB11=Number(M2)+Number(B2)+Number(N2)+Number(V2)+Number(C2)+Number(X2)+Number(Z2)+Number(A2)+Number(S2);
           document.getElementsByName("subsequent_male_total_2")[0].value=PSB11;


           var PSB12=Number(M3)+Number(B3)+Number(N3)+Number(V3)+Number(C3)+Number(X3)+Number(Z3)+Number(A3)+Number(S3);
           document.getElementsByName("subsequent_male_total_3")[0].value=PSB12;

           var PSB13=Number(M4)+Number(B4)+Number(N4)+Number(V4)+Number(C4)+Number(X4)+Number(Z4)+Number(A4)+Number(S4);
           document.getElementsByName("subsequent_male_total_4")[0].value=PSB13;

           var PSB14=Number(M5)+Number(B5)+Number(N5)+Number(V5)+Number(C5)+Number(X5)+Number(Z5)+Number(A5)+Number(S5);
           document.getElementsByName("subsequent_male_total_5")[0].value=PSB14;

           var PSB15=Number(M6)+Number(B6)+Number(N6)+Number(V6)+Number(C6)+Number(X6)+Number(Z6)+Number(A6)+Number(S6);
           document.getElementsByName("subsequent_male_total_6")[0].value=PSB15;
   
           var PSB16=Number(M7)+Number(B7)+Number(N7)+Number(V7)+Number(C7)+Number(X7)+Number(Z7)+Number(A7)+Number(S7);
           document.getElementsByName("subsequent_male_total_7")[0].value=PSB16;







       var D1total=document.getElementsByName("subsequent_male_total_1")[0].value;
       var D2total=document.getElementsByName("subsequent_male_total_2")[0].value;
       var D3total=document.getElementsByName("subsequent_male_total_3")[0].value;
       var D4total=document.getElementsByName("subsequent_male_total_4")[0].value;
       var D5total=document.getElementsByName("subsequent_male_total_5")[0].value;
       var D6total=document.getElementsByName("subsequent_male_total_6")[0].value;
       var D7total=document.getElementsByName("subsequent_male_total_7")[0].value;

       var D7total_total=Number(D1total)+Number(D2total)+Number(D3total)+Number(D4total)+Number(D5total)+Number(D6total)+Number(D7total);
       document.getElementsByName("female_total_total")[0].value=D7total_total;
       
       
    }


    





    
    
    function total_03() {

        var qw1=document.getElementsByName("female_0_10_1")[0].value; 
        var qw2=document.getElementsByName("female_0_10_2")[0].value; 
        var qw3=document.getElementsByName("female_0_10_3")[0].value; 
        var qw4=document.getElementsByName("female_0_10_4")[0].value; 
        var qw5=document.getElementsByName("female_0_10_5")[0].value; 
        var qw6=document.getElementsByName("female_0_10_6")[0].value; 
        var qw7=document.getElementsByName("female_0_10_7")[0].value; 

         var qw8=Number(qw1)+Number(qw2)+Number(qw3)+Number(qw4)+Number(qw5)+Number(qw6)+Number(qw7);
         document.getElementsByName("female_0_10_total")[0].value=qw8;




        var qe1=document.getElementsByName("female_11_20_1")[0].value; 
        var qe2=document.getElementsByName("female_11_20_2")[0].value; 
        var qe3=document.getElementsByName("female_11_20_3")[0].value; 
        var qe4=document.getElementsByName("female_11_20_4")[0].value; 
        var qe5=document.getElementsByName("female_11_20_5")[0].value; 
        var qe6=document.getElementsByName("female_11_20_6")[0].value; 
        var qe7=document.getElementsByName("female_11_20_7")[0].value; 

         var qe8=Number(qe1)+Number(qe2)+Number(qe3)+Number(qe4)+Number(qe5)+Number(qe6)+Number(qe7);
         document.getElementsByName("female_11_20_total")[0].value=qe8;


        var qr1=document.getElementsByName("female_21_30_1")[0].value; 
        var qr2=document.getElementsByName("female_21_30_2")[0].value; 
        var qr3=document.getElementsByName("female_21_30_3")[0].value; 
        var qr4=document.getElementsByName("female_21_30_4")[0].value; 
        var qr5=document.getElementsByName("female_21_30_5")[0].value; 
        var qr6=document.getElementsByName("female_21_30_6")[0].value; 
        var qr7=document.getElementsByName("female_21_30_7")[0].value; 

         var qr8=Number(qr1)+Number(qr2)+Number(qr3)+Number(qr4)+Number(qr5)+Number(qr6)+Number(qr7);
         document.getElementsByName("female_21_30_total")[0].value=qr8;



        var qt1=document.getElementsByName("female_31_40_1")[0].value; 
        var qt2=document.getElementsByName("female_31_40_2")[0].value; 
        var qt3=document.getElementsByName("female_31_40_3")[0].value; 
        var qt4=document.getElementsByName("female_31_40_4")[0].value; 
        var qt5=document.getElementsByName("female_31_40_5")[0].value; 
        var qt6=document.getElementsByName("female_31_40_6")[0].value; 
        var qt7=document.getElementsByName("female_31_40_7")[0].value; 

         var qt8=Number(qt1)+Number(qt2)+Number(qt3)+Number(qt4)+Number(qt5)+Number(qt6)+Number(qt7);
         document.getElementsByName("female_31_40_total")[0].value=qt8;


        var qy1=document.getElementsByName("female_41_50_1")[0].value; 
        var qy2=document.getElementsByName("female_41_50_2")[0].value; 
        var qy3=document.getElementsByName("female_41_50_3")[0].value; 
        var qy4=document.getElementsByName("female_41_50_4")[0].value; 
        var qy5=document.getElementsByName("female_41_50_5")[0].value; 
        var qy6=document.getElementsByName("female_41_50_6")[0].value; 
        var qy7=document.getElementsByName("female_41_50_7")[0].value; 

         var qy8=Number(qy1)+Number(qy2)+Number(qy3)+Number(qy4)+Number(qy5)+Number(qy6)+Number(qy7);
         document.getElementsByName("female_41_50_total")[0].value=qy8;






        var qu1=document.getElementsByName("female_51_60_1")[0].value; 
        var qu2=document.getElementsByName("female_51_60_2")[0].value; 
        var qu3=document.getElementsByName("female_51_60_3")[0].value; 
        var qu4=document.getElementsByName("female_51_60_4")[0].value; 
        var qu5=document.getElementsByName("female_51_60_5")[0].value; 
        var qu6=document.getElementsByName("female_51_60_6")[0].value; 
        var qu7=document.getElementsByName("female_51_60_7")[0].value; 

         var qu8=Number(qu1)+Number(qu2)+Number(qu3)+Number(qu4)+Number(qu5)+Number(qu6)+Number(qu7);
         document.getElementsByName("female_51_60_total")[0].value=qu8;



        var qi1=document.getElementsByName("female_61_70_1")[0].value; 
        var qi2=document.getElementsByName("female_61_70_2")[0].value; 
        var qi3=document.getElementsByName("female_61_70_3")[0].value; 
        var qi4=document.getElementsByName("female_61_70_4")[0].value; 
        var qi5=document.getElementsByName("female_61_70_5")[0].value; 
        var qi6=document.getElementsByName("female_61_70_6")[0].value; 
        var qi7=document.getElementsByName("female_61_70_7")[0].value; 

         var qi8=Number(qi1)+Number(qi2)+Number(qi3)+Number(qi4)+Number(qi5)+Number(qi6)+Number(qi7);
         document.getElementsByName("female_61_70_total")[0].value=qi8;





        var qo1=document.getElementsByName("female_71_80_1")[0].value; 
        var qo2=document.getElementsByName("female_71_80_2")[0].value; 
        var qo3=document.getElementsByName("female_71_80_3")[0].value; 
        var qo4=document.getElementsByName("female_71_80_4")[0].value; 
        var qo5=document.getElementsByName("female_71_80_5")[0].value; 
        var qo6=document.getElementsByName("female_71_80_6")[0].value; 
        var qo7=document.getElementsByName("female_71_80_7")[0].value; 

         var qo8=Number(qo1)+Number(qo2)+Number(qo3)+Number(qo4)+Number(qo5)+Number(qo6)+Number(qo7);
         document.getElementsByName("female_71_80_total")[0].value=qo8;

        var qp1=document.getElementsByName("female_80_1")[0].value; 
        var qp2=document.getElementsByName("female_80_2")[0].value; 
        var qp3=document.getElementsByName("female_80_3")[0].value; 
        var qp4=document.getElementsByName("female_80_4")[0].value; 
        var qp5=document.getElementsByName("female_80_5")[0].value; 
        var qp6=document.getElementsByName("female_80_6")[0].value; 
        var qp7=document.getElementsByName("female_80_7")[0].value; 

         var qp8=Number(qp1)+Number(qp2)+Number(qp3)+Number(qp4)+Number(qp5)+Number(qp6)+Number(qp7);
         document.getElementsByName("female_80_total")[0].value=qp8;




         var qpt1=Number(qw1)+Number(qe1)+Number(qr1)+Number(qt1)+Number(qy1)+Number(qu1)+Number(qi1)+Number(qo1)+Number(qp1);
         document.getElementsByName("female_total_1")[0].value=qpt1;

         var qpt2=Number(qw2)+Number(qe2)+Number(qr2)+Number(qt2)+Number(qy2)+Number(qu2)+Number(qi2)+Number(qo2)+Number(qp2);
         document.getElementsByName("female_total_2")[0].value=qpt2;

         var qpt3=Number(qw3)+Number(qe3)+Number(qr3)+Number(qt3)+Number(qy3)+Number(qu3)+Number(qi3)+Number(qo3)+Number(qp3);
         document.getElementsByName("female_total_3")[0].value=qpt3;

         var qpt4=Number(qw4)+Number(qe4)+Number(qr4)+Number(qt4)+Number(qy4)+Number(qu4)+Number(qi4)+Number(qo4)+Number(qp4);
         document.getElementsByName("female_total_4")[0].value=qpt4;

         var qpt5=Number(qw5)+Number(qe5)+Number(qr5)+Number(qt5)+Number(qy5)+Number(qu5)+Number(qi5)+Number(qo5)+Number(qp5);
         document.getElementsByName("female_total_5")[0].value=qpt5;

         var qpt6=Number(qw6)+Number(qe6)+Number(qr6)+Number(qt6)+Number(qy6)+Number(qu6)+Number(qi6)+Number(qo6)+Number(qp6);
         document.getElementsByName("female_total_6")[0].value=qpt6;

         var qpt7=Number(qw7)+Number(qe7)+Number(qr7)+Number(qt7)+Number(qy7)+Number(qu7)+Number(qi7)+Number(qo7)+Number(qp7);
         document.getElementsByName("female_total_7")[0].value=qpt7;











        var qp1_total=document.getElementsByName("female_total_1")[0].value;
        var qp2_total=document.getElementsByName("female_total_2")[0].value;       
        var qp3_total=document.getElementsByName("female_total_3")[0].value;       
        var qp4_total=document.getElementsByName("female_total_4")[0].value;       
        var qp5_total=document.getElementsByName("female_total_5")[0].value;
        var qp6_total=document.getElementsByName("female_total_6")[0].value;
        var qp7_total=document.getElementsByName("female_total_7")[0].value;       


var qu_total=Number(qp1_total)+Number(qp2_total)+Number(qp3_total)+Number(qp4_total)+Number(qp5_total)+Number(qp6_total)+Number(qp7_total);
document.getElementsByName("subsequent_male_total_total")[0].value=qu_total;

// female_total_1
// female_total_2
// female_total_3
// female_total_4
// female_total_5
// female_total_6
// female_total_7

    
    }
    
    
    
    

    function total_04() {


var q1=document.getElementsByName("subsequent_female_0_10_1")[0].value;
var q2=document.getElementsByName("subsequent_female_0_10_2")[0].value;
var q3=document.getElementsByName("subsequent_female_0_10_3")[0].value;
var q4=document.getElementsByName("subsequent_female_0_10_4")[0].value;
var q5=document.getElementsByName("subsequent_female_0_10_5")[0].value;
var q6=document.getElementsByName("subsequent_female_0_10_6")[0].value;
var q7=document.getElementsByName("subsequent_female_0_10_7")[0].value;

var q8=Number(q1)+Number(q2)+Number(q3)+Number(q4)+Number(q5)+Number(q6)+Number(q7);
document.getElementsByName("subsequent_female_0_10_total")[0].value=q8;


var w1=document.getElementsByName("subsequent_female_11_20_1")[0].value;
var w2=document.getElementsByName("subsequent_female_11_20_2")[0].value;
var w3=document.getElementsByName("subsequent_female_11_20_3")[0].value;
var w4=document.getElementsByName("subsequent_female_11_20_4")[0].value;
var w5=document.getElementsByName("subsequent_female_11_20_5")[0].value;
var w6=document.getElementsByName("subsequent_female_11_20_6")[0].value;
var w7=document.getElementsByName("subsequent_female_11_20_7")[0].value;

var w9=Number(w1)+Number(w2)+Number(w3)+Number(w4)+Number(w5)+Number(w6)+Number(w7);
document.getElementsByName("subsequent_female_11_20_total")[0].value=w9;





var E1=document.getElementsByName("subsequent_female_21_30_1")[0].value;
var E2=document.getElementsByName("subsequent_female_21_30_2")[0].value;
var E3=document.getElementsByName("subsequent_female_21_30_3")[0].value;
var E4=document.getElementsByName("subsequent_female_21_30_4")[0].value;
var E5=document.getElementsByName("subsequent_female_21_30_5")[0].value;
var E6=document.getElementsByName("subsequent_female_21_30_6")[0].value;
var E7=document.getElementsByName("subsequent_female_21_30_7")[0].value;

var E10=Number(E1)+Number(E2)+Number(E3)+Number(E4)+Number(E5)+Number(E6)+Number(E7);
document.getElementsByName("subsequent_female_21_30_total")[0].value=E10;



var R1=document.getElementsByName("subsequent_female_31_40_1")[0].value;
var R2=document.getElementsByName("subsequent_female_31_40_2")[0].value;
var R3=document.getElementsByName("subsequent_female_31_40_3")[0].value;
var R4=document.getElementsByName("subsequent_female_31_40_4")[0].value;
var R5=document.getElementsByName("subsequent_female_31_40_5")[0].value;
var R6=document.getElementsByName("subsequent_female_31_40_6")[0].value;
var R7=document.getElementsByName("subsequent_female_31_40_7")[0].value;

var R10=Number(R1)+Number(R2)+Number(R3)+Number(R4)+Number(R5)+Number(R6)+Number(R7);
document.getElementsByName("subsequent_female_31_40_total")[0].value=R10;




var T1=document.getElementsByName("subsequent_female_41_50_1")[0].value;
var T2=document.getElementsByName("subsequent_female_41_50_2")[0].value;
var T3=document.getElementsByName("subsequent_female_41_50_3")[0].value;
var T4=document.getElementsByName("subsequent_female_41_50_4")[0].value;
var T5=document.getElementsByName("subsequent_female_41_50_5")[0].value;
var T6=document.getElementsByName("subsequent_female_41_50_6")[0].value;
var T7=document.getElementsByName("subsequent_female_41_50_7")[0].value;

var T10=Number(T1)+Number(T2)+Number(T3)+Number(T4)+Number(T5)+Number(T6)+Number(T7);
document.getElementsByName("subsequent_female_41_50_total")[0].value=T10;



var Y1=document.getElementsByName("subsequent_female_51_60_1")[0].value;
var Y2=document.getElementsByName("subsequent_female_51_60_2")[0].value;
var Y3=document.getElementsByName("subsequent_female_51_60_3")[0].value;
var Y4=document.getElementsByName("subsequent_female_51_60_4")[0].value;
var Y5=document.getElementsByName("subsequent_female_51_60_5")[0].value;
var Y6=document.getElementsByName("subsequent_female_51_60_6")[0].value;
var Y7=document.getElementsByName("subsequent_female_51_60_7")[0].value;

var Y10=Number(Y1)+Number(Y2)+Number(Y3)+Number(Y4)+Number(Y5)+Number(Y6)+Number(Y7);
document.getElementsByName("subsequent_female_51_60_total")[0].value=Y10;



var U1=document.getElementsByName("subsequent_female_61_70_1")[0].value;
var U2=document.getElementsByName("subsequent_female_61_70_2")[0].value;
var U3=document.getElementsByName("subsequent_female_61_70_3")[0].value;
var U4=document.getElementsByName("subsequent_female_61_70_4")[0].value;
var U5=document.getElementsByName("subsequent_female_61_70_5")[0].value;
var U6=document.getElementsByName("subsequent_female_61_70_6")[0].value;
var U7=document.getElementsByName("subsequent_female_61_70_7")[0].value;

var U10=Number(U1)+Number(U2)+Number(U3)+Number(U4)+Number(U5)+Number(U6)+Number(U7);
document.getElementsByName("subsequent_female_61_70_total")[0].value=U10;






var O1=document.getElementsByName("subsequent_female_71_80_1")[0].value;
var O2=document.getElementsByName("subsequent_female_71_80_2")[0].value;
var O3=document.getElementsByName("subsequent_female_71_80_3")[0].value;
var O4=document.getElementsByName("subsequent_female_71_80_4")[0].value;
var O5=document.getElementsByName("subsequent_female_71_80_5")[0].value;
var O6=document.getElementsByName("subsequent_female_71_80_6")[0].value;
var O7=document.getElementsByName("subsequent_female_71_80_7")[0].value;

var O10=Number(O1)+Number(O2)+Number(O3)+Number(O4)+Number(O5)+Number(O6)+Number(O7);
document.getElementsByName("subsequent_female_71_80_total")[0].value=O10;





var P1=document.getElementsByName("subsequent_female_81_1")[0].value;
var P2=document.getElementsByName("subsequent_female_81_2")[0].value;
var P3=document.getElementsByName("subsequent_female_81_3")[0].value;
var P4=document.getElementsByName("subsequent_female_81_4")[0].value;
var P5=document.getElementsByName("subsequent_female_81_5")[0].value;
var P6=document.getElementsByName("subsequent_female_81_6")[0].value;
var P7=document.getElementsByName("subsequent_female_81_7")[0].value;

var P10=Number(P1)+Number(P2)+Number(P3)+Number(P4)+Number(P5)+Number(P6)+Number(P7);
document.getElementsByName("subsequent_female_81_total")[0].value=P10;

var q11=Number(q1)+Number(w1)+Number(E1)+Number(R1)+Number(T1)+Number(Y1)+Number(U1)+Number(O1)+Number(P1);
document.getElementsByName("subsequent_female_total_1")[0].value=q11;

var P22=Number(q2)+Number(w2)+Number(E2)+Number(R2)+Number(T2)+Number(Y2)+Number(U2)+Number(O2)+Number(P2);
document.getElementsByName("subsequent_female_total_2")[0].value=P22;

var P23=Number(q3)+Number(w3)+Number(E3)+Number(R3)+Number(T3)+Number(Y3)+Number(U3)+Number(O3)+Number(P3);
document.getElementsByName("subsequent_female_total_3")[0].value=P23;

var P24=Number(q4)+Number(w4)+Number(E4)+Number(R4)+Number(T4)+Number(Y4)+Number(U4)+Number(O4)+Number(P4);
document.getElementsByName("subsequent_female_total_4")[0].value=P24;

var P25=Number(q5)+Number(w5)+Number(E5)+Number(R5)+Number(T5)+Number(Y5)+Number(U5)+Number(O5)+Number(P5);
document.getElementsByName("subsequent_female_total_5")[0].value=P25;

var P26=Number(q6)+Number(w6)+Number(E6)+Number(R6)+Number(T6)+Number(Y6)+Number(U6)+Number(O6)+Number(P6);
document.getElementsByName("subsequent_female_total_6")[0].value=P26;


var P27=Number(q7)+Number(w7)+Number(E7)+Number(R7)+Number(T7)+Number(Y7)+Number(U7)+Number(O7)+Number(P7);
document.getElementsByName("subsequent_female_total_7")[0].value=P27;






var P1_total=document.getElementsByName("subsequent_female_total_1")[0].value;
var P2_total=document.getElementsByName("subsequent_female_total_2")[0].value;
var P3_total=document.getElementsByName("subsequent_female_total_3")[0].value;
var P4_total=document.getElementsByName("subsequent_female_total_4")[0].value;
var P5_total=document.getElementsByName("subsequent_female_total_5")[0].value;
var P6_total=document.getElementsByName("subsequent_female_total_6")[0].value;
var P7_total=document.getElementsByName("subsequent_female_total_7")[0].value;


var P7_total_total=Number(P1_total)+Number(P2_total)+Number(P3_total)+Number(P4_total)+Number(P5_total)+Number(P6_total)+Number(P7_total);
document.getElementsByName("subsequent_female_total_total")[0].value=P7_total_total;

}
    
    
    
</script>