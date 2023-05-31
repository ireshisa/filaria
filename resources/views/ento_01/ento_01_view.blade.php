<!-- Content Wrapper. Contains page content -->
<?php
$cno_dissected_mosquitos = "";
$cpositive_mosq = "";
$cmq_postive_for_l3 = "";
$no_dissected_mosquitos = "";
$positive_mosq = "";
$mq_postive_for_l3 = "";


$cno_dissected_mosquitos = "";
$cpositive_mosq = "";
$cmq_postive_for_l3 = "";
$mno_dissected_mosquitos = "";
$mpositive_mosq = "";
$mmq_postive_for_l3 = "";



?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Indoor Hand Collection  FORM
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Entomological data</a></li>
            <li class="active">Indoor Hand Collection  FORM</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        @if(session()->has('message')) @if(session()->get('message')==true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Delete Your Record.
                        </div>
                        @endif @if(session()->get('message')==false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Delete Your Record.
                        </div>
                        @endif @endif @if(session()->has('update')) @if(session()->get('update')==true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Update Your Record.
                        </div>
                        @endif @if(session()->get('update')==false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Update Your Record.
                        </div>
                        @endif @endif






                        <form method="post" action="{{url('/ento1_view') }}">
                            {{csrf_field() }}
                            <div class="col-md-12">



                                <!-- general form elements -->
                                <div class="box box-primary mr-auto ml-auto">
                                    <div class="box-header with-border">
                                        <!-- <h3 class="box-title">Quick Example</h3> -->
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <div class="box-body mr-auto ml-auto" style="overflow: hidden !important;">
                                        <div class="col-md-8 mr-auto ml-auto" style="float: none !important; margin-left: auto !important; margin-right: auto !important;">

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">From   </label>
                                                <input data-date-format="yyyy-mm-d" required type="date" name="from" class="datepicker_v form-control pull-right" value="{{$from }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">To   </label>
                                                <input data-date-format="yyyy-mm-d" required type="date" name="to" class="datepicker_v form-control pull-right" value="{{$to }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <center> <a href="{{url('/ento1_view') }}"><button type="button" class="btn btn-primary">Clear</button></a> <button type="submit" class="btn btn-primary">Filter</button></center>


                                    <br>
                                </div>
                                <!-- /.box -->
                            </div>
                        </form>
                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>






                                <tr>

                                    <th>Action</th>
                                    <th>ID</th>
                                    <th>Date of Collection </th>
                                    <th>District</th>
                                    <th>MOH Area</th>
                                    <th>PHM Area</th>
                                    <th>GN Division</th>
                                    <th>Weather </th>
                                    <th>Started at  </th>
                                    <th>Finished at</th>
                                    <th>Total time spent</th>
                                    <th>Premises examined</th>
                                    <th>PPF Cx</th>
                                    <th>PPFMn</th>
                                    <th>TCxM collected</th>
                                    <th>TMnM collected</th>
                                    <th>Anopheles sp</th>
                                    <th>Aedes sp</th>
                                    <th>Armigerus sp</th>
                                    <!-- <th>Tubes submitted</th> -->
                                    <th>Nu.OF collectors</th>
                                    <th>Name of HEO</th>
                                    <th>Submitted Date</th>


                                    <th>Ser NO</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th>Name & Address</th>
                                    <th>No of Pre:+ve :-Cx </th>
                                    <th>No of Pre:+ve :-Mn </th>

                                    <th>Total No Of Mos:-Cx </th>
                                    <th>Total No Of Mos:-Mn </th>



                                    <th>Mos.Species</th>
                                    <th>Resting places:-FF</th>
                                    <th>Resting places:-CH</th>
                                    <th>Resting places:-BN</th>
                                    <th>Resting places:-W</th>
                                    <th>Resting places:-EA</th>
                                    <th>Resting places:-O</th>

                                    <th>Abdominal condition:-UF </th>
                                    <th>Abdominal condition:-F </th>
                                    <th>Abdominal condition:-SG </th>
                                    <th>Abdominal condition:-G </th>

                                    <th>Males</th>
                                    <th>No. of dissected</th>
                                    <th>No of infected</th>
                                    <th>No of infective</th>





                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ento1_list as $ento1)


                                <?php
                                $data2 = \App\Ento_01::with('ento_01_dataes')->where("ento_01_id", $ento1->ento_01_id)->first();
                                $data3 = \App\Ento_01_data::with('Ento_5_news')->where("ento_01_id", $ento1->ento_01_id)->first();


                                ?>




                                <?php $i = 0; ?>
                                @foreach ($data2->ento_01_dataes as $data)
                                <?php $i++; ?>


                                <tr>
                                    <td>
                                        <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $ento1->ento_01_id }}" data-target="#editModal2{{$ento1->ento_01_id}}"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        <strong>Edit</strong> </button> -->
                                        <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $ento1->ento_01_id }}" data-target="#editModal{{$ento1->ento_01_id}}"><i class="fa fa-eye" aria-hidden="true"></i>
                                        <strong>View</strong> </button> -->


                                        <a href="{{url('/view_ento1') }}/{{ $ento1->ento_01_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i> View</a>



                                        <a href="{{url('/view_ento1_print') }}/{{ $ento1->ento_01_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i> Print</a>

                                        <a href="{{url('/view_ento1_excel') }}/{{ $ento1->ento_01_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i> Excel</a>




                                        <!-- <a href="{{url('/view_ento1_data') }}/{{ $ento1->ento_01_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i> EN01 DATA</a> -->
                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_ento1') }}/{{ $ento1->ento_01_id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                    <td>{{$ento1->formid }}</td>
                                    <td>{{$ento1->date }}</td>
                                    <td>{{$ento1->district }}</td>
                                    <td>{{$ento1->moh_area }}</td>
                                    <td>{{$ento1->phi_and_phm }}</td>
                                    <td>{{$ento1->gn_divison }}</td>
                                    <td>{{$ento1->weather_condition}}</td>
                                    <td>{{$ento1->start_at}}</td>
                                    <td>{{$ento1->finished_at}}</td>
                                    <td>{{$ento1->total_time_spend}}</td>

                                    <td>{{$ento1->no_of_premises}}</td>
                                    <th>{{$ento1->no_of_premises_positive}}</th>
                                    <th>{{$ento1->mansonia_species_of_positive}} </th>



                                    <td>{{$ento1->total_mosquitos_collected}}</td>
                                    <td>{{$ento1->mansonia_spcies_of_mosquitos_collected}}</td>
                                    <td>{{$ento1->anopheles_species}}</td>
                                    <td>{{$ento1->aedes_sp}}</td>
                                    <td>{{$ento1->armigerus_sp}}</td>
                                    <!-- <td>{{$ento1->tubes_submitted}}</td> -->
                                    <td>{{$ento1->no_of_collectors}}</td>
                                    <td>{{$ento1->name_of_heo}}</td>

                                    <td>{{$ento1->created_at}}</td>











                                    <td>
                                        {{ $data->ser_no }}

                                    <td>
                                        {{ $data->gps_long }}
                                    </td>

                                    <td>
                                        {{ $data->gps_lat }}
                                    </td>

                                    <td>
                                        {{ $data->house_no }}
                                    </td>

                                    <!-- <td rowspan="2">
                                    <input type="number" name="timeSpand[]" min="0" value="{{ $data->timeSpand }}" onchange="totalTime()" onkeyup="totalTime()" class="form-control">
                                </td> -->

                                    <td>{{ $data->no_of_pre_postive_cx }}</td>
                                    <td>{{ $data->no_of_pre_postive_man }}</td>
                                    <td>{{ $data->no_of_culex }}</td>
                                    <td>{{ $data->no_of_mosq }}</td>



                                    <th>
                                        Cx <br>
                                        <hr>
                                        <span style="">Mn</span>
                                    </th>

                                    <td>
                                        {{ $data->resting_place_1 }}
                                        <hr> <br>

                                        {{ $data->resting_place_1_mansonia }}
                                    </td>

                                    <td>
                                        {{ $data->resting_place_2 }}
                                        <hr> <br>

                                        {{ $data->resting_place_2_mansonia }}
                                    </td>

                                    <td>
                                        {{ $data->resting_place_3 }}
                                        <hr> <br>

                                        {{ $data->resting_place_3_mansonia }}
                                    </td>

                                    <td>
                                        {{ $data->resting_place_4 }}
                                        <hr> <br>

                                        {{ $data->resting_place_4_mansonia }}
                                    </td>

                                    <td>
                                        {{ $data->resting_place_5 }}
                                        <hr> <br>

                                        {{ $data->resting_place_5_mansonia }}
                                    </td>

                                    <td>
                                        {{ $data->resting_place_6 }}
                                        <hr> <br>

                                        {{ $data->resting_place_6_mansonia }}
                                    </td>

                                    <td>
                                        {{ $data->abdo_uf }}
                                        <hr> <br>

                                        {{ $data->abdo_uf_ma }}
                                    </td>

                                    <td>
                                        {{ $data->abdo_f }}
                                        <hr> <br>

                                        {{ $data->abdo_f_ma }}
                                    </td>

                                    <td>
                                        {{ $data->abdo_sg }}
                                        <hr> <br>

                                        {{ $data->abdo_sg_ma }}
                                    </td>

                                    <td>
                                        {{ $data->abdo_g }}
                                        <hr> <br>

                                        {{ $data->abdo_g_ma }}
                                    </td>

                                    <td>
                                        {{ $data->males }}
                                        <hr> <br>

                                        {{ $data->males_ma }}
                                    </td>


                                    @foreach ($data->Ento_5_news as $data2)
                                    <?php


                                    if ($data2->species2 == 'CX') {
                                        $cno_dissected_mosquitos = $data2->no_dissected_mosquitos;
                                    } else {
                                        $mno_dissected_mosquitos = $data2->no_dissected_mosquitos;
                                    }


                                    if ($data2->type_of_parasite == 'Brugia malayi' || $data2->type_of_parasite == 'Wuchereria bancrofit') {
                                        if ($data2->species2 == 'CX') {
                                            $cno_dissected_mosquitos = $data2->no_dissected_mosquitos;
                                            $cpositive_mosq = $data2->positive_mosq;
                                            $cmq_postive_for_l3 = $data2->mq_postive_for_l3;
                                        } else {
                                            $mno_dissected_mosquitos = $data2->no_dissected_mosquitos;
                                            $mpositive_mosq = $data2->positive_mosq;
                                            $mmq_postive_for_l3 = $data2->mq_postive_for_l3;
                                        }
                                    }

                                    ?>
                                    @endforeach


                                    <td>{{ $cno_dissected_mosquitos != null ? $cno_dissected_mosquitos : '0' }}
                                        <hr> <br>

                                        {{ $mno_dissected_mosquitos != null ? $mno_dissected_mosquitos : '0' }}
                                    </td>
                                    <td>{{ $cpositive_mosq != null ? $cpositive_mosq : '0' }}
                                        <hr> <br>
                                        {{ $mpositive_mosq != null ? $mpositive_mosq : '0' }}
                                    </td>
                                    <td>{{ $cmq_postive_for_l3 != null ? $cmq_postive_for_l3 : '0' }}
                                        <hr> <br>
                                        {{ $mmq_postive_for_l3 != null ? $mmq_postive_for_l3 : '0' }}
                                    </td>

                                </tr>








                                @endforeach
                                @endforeach
                            </tbody>
                            <tfoot>
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>ID</th>
                                        <th>Date of Collection </th>
                                        <th>District</th>
                                        <th>MOH Area</th>
                                        <th>PHM Area</th>
                                        <th>GN Division</th>
                                        <th>Weather </th>
                                        <th>Started at  </th>
                                        <th>Finished at</th>
                                        <th>Total time spent</th>
                                        <th>Premises examined</th>
                                        <th>PPF Cx</th>
                                        <th>PPFMn</th>
                                        <th>TCxM collected</th>
                                        <th>TMnM collected</th>
                                        <th>Anopheles sp</th>
                                        <th>Aedes sp</th>
                                        <th>Armigerus sp</th>
                                        <!-- <th>Tubes submitted</th> -->
                                        <th>Nu.OF collectors</th>
                                        <th>Name of HEO</th>
                                        <th>Submitted Date</th>


                                        <th>Ser NO</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>Name & Address</th>
                                        <th>No of Pre:+ve :-Cx </th>
                                        <th>No of Pre:+ve :-Mn </th>



                                        <th>Total No Of Mos:-Cx </th>
                                        <th>Total No Of Mos:-Mn </th>

                                        <th>Mos.Species</th>
                                        <th>Resting places:-FF</th>
                                        <th>Resting places:-CH</th>
                                        <th>Resting places:-BN</th>
                                        <th>Resting places:-W</th>
                                        <th>Resting places:-EA</th>
                                        <th>Resting places:-O</th>

                                        <th>Abdominal condition:-UF </th>
                                        <th>Abdominal condition:-F </th>
                                        <th>Abdominal condition:-SG </th>
                                        <th>Abdominal condition:-G </th>

                                        <th>Males</th>
                                        <th>No. of dissected</th>
                                        <th>No of infected</th>
                                        <th>No of infective</th>


                                    </tr>



                                </thead>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->