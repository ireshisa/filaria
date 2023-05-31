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
            <li><a href="{{url('/ento1_data') }}">Entomological data</a></li>
            <li class="active">Indoor Hand Collection  FORM</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{ url('/newento1_update') }}">

                {{ csrf_field() }}

                <input type="hidden" name="ento_01_id" value="{{ $ento1_list->ento_01_id }}" class="form-control">








                <div class="col-md-12">
                    @if (session()->has('message'))
                    @if (session()->get('message') == true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        Successfully save your data.
                    </div>
                    @endif
                    @if (session()->get('message') == false)
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                        Failed save your data.
                    </div>
                    @endif
                    @endif

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title">Quick Example</h3> -->
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body" style="overflow: hidden;">
                            <div class="col-md-6">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Form ID</label>
                                    <input type="text" name="formid" class="form-control" readonly value="{{ $ento1_list->formid }}">
                                </div>





                                <div class="form-group">
                                    <label for="exampleInputEmail1">District</label>

                                    <input type="text" name="district" class="form-control" readonly value="{{ $ento1_list->district }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">MOH area</label>
                                    <input type="text" name="moh_area" class="form-control" readonly value="{{ $ento1_list->moh_area }}">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">PHM area</label>
                                    <input type="text" name="phi_and_phm" class="form-control" value="{{ $ento1_list->phi_and_phm }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">GN division</label>
                                    <input type="text" name="gn_divison" class="form-control" value="{{ $ento1_list->gn_divison }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Locality</label>
                                    <input type="text" name="locality" class="form-control" value="{{ $ento1_list->locality }}"> <!-- new row -->
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition" class="form-control">
                                        <option value=" ">Select Weather Condition</option>
                                        <option {{ $ento1_list->weather_condition == 'Cloudy' ? 'selected' : '' }} value="Cloudy ">Cloudy </option>
                                        <option {{ $ento1_list->weather_condition == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento1_list->weather_condition == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento1_list->weather_condition == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento1_list->weather_condition == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento1_list->weather_condition == 'Windy(heavy)' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento1_list->weather_condition == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento1_list->weather_condition == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento1_list->weather_condition == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of Collection</label>
                                    <input data-date-format="yyyy-mm-d" type="Date" value="{{ $ento1_list->date }}" name="date" class="form-control pull-right datepicker_v">
                                </div>
                                <!-- <div class="form-group">
                                      <label for="exampleInputPassword1">Address  </label>
                                      <input  type="text" placeholder="Address..." name="address " class="form-control"  value="{{ $ento1_list->address }}">
                                  </div> -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> <br>Started at   </label>
                                    <input type="time" name="start_at" class="form-control" value="{{ $ento1_list->start_at }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Finished at</label>
                                    <input type="time" name="finished_at" class="form-control" value="{{ $ento1_list->finished_at }}">
                                </div>



                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Number of premises examined </label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" min="0"  name="no_of_premises" class="form-control">
                                </div> --}}

                                {{-- <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Total time spent</label>
                                    <input type="number" name="total_time_spend" class="form-control">
                                </div> --> --}}



                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">No of premises positive for Cx. quin</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" min="0"  name="no_of_premises_positive" class="form-control">
                                </div> --}}

                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">No of premises positive for Mansonia
                                        species</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" min="0"  name="mansonia_species_of_positive" class="form-control">
                                </div> --}}

                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Total culex sp collected</label> <input type="number" min="0" pattern="^\d*(\.\d{0,2})?$"  name="total_mosquitos_collected" class="form-control" required>
                                </div> --}}


                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Total Mansonia species collected </label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  min="0" name="mansonia_spcies_of_mosquitos_collected" class="form-control" required>
                                </div> --}}

                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Anopheles species</label>
                                    <input type="number" pattern=" ^\d*(\.\d{0,2})?$"  min="0" name="anopheles_species" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Aedes sp</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" min="0"  name="aedes_sp" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Armigerus sp</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  min="0" name="armigerus_sp" class="form-control" required>
                                </div> --}}

                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Total culex sp  Collected</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" min="0" placeholder="Total culex sp positive (+) Collected.." name="culex_sp" class="form-control" required>
                                </div> --}}

                                {{-- <!-- no filed for new forms -->
                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Tubes submitted</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" name="tubes_submitted" class="form-control" required>
                                </div> --> --}}

                            </div>
                        </div>
                    </div>
                </div>











                <div clss="row " style="background-color: #fff; padding:5px;">
                    <div class="col-12">
                        <center>
                            <a class="btn btn-primary   add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Row</a>
                        </center>
                    </div>
                </div>
                @foreach ($ento1_list->ento_01_dataes as $data2)

                <input type="hidden" name="id2[]" value="{{ $data2->id }}">
                @endforeach

                <div clss="row " style="background-color: #fff; padding:5px;
                    overflow-x:auto;
                    overflow-y:none;
                    max-height:80vh">

                    <table class="table table-bordered" id="tbl_posts">
                        <thead class="ther">
                            <tr>
                                <th rowspan="2">#Row NO</th>
                                <th rowspan="2">#Ser NO</th>
                                <th rowspan="2">Longitude</th>
                                <th rowspan="2">Latitude</th>
                                <th rowspan="2">Name & Address</th>
                                <!-- <th rowspan="2">Time Spent (mins)</th> -->
                                <th colspan="2">No of Pre:+ve</th>
                                <th colspan="2">Total No Of Mos</th>
                                <th colspan="7">Resting places<br> (No .of females)</th>
                                <th colspan="4">Abdominal condition</th>
                                <th rowspan="2">Males</th>
                                <th rowspan="2">No. of dissected</th>
                                <th rowspan="2">No of infected</th>
                                <th rowspan="2">No of infective</th>
                                <th rowspan="2">Action</th>
                            </tr>

                            <tr>
                                <th>Cx</th>
                                <th>Mn</th>
                                <th>Cx</th>
                                <th>Mn</th>
                                <th rowspan="2">Mos.<br> Species</th>

                                <th>FF</th>
                                <th>CH</th>
                                <th>BN</th>
                                <th>W</th>
                                <th>EA</th>
                                <th>O</th>

                                <th>UF</th>
                                <th>F</th>
                                <th>SG</th>
                                <th>G</th>
                            <tr>
                            </tr>
                        </thead>


                        <tbody id="tbl_posts_body">
                            <?php $i = 0; ?>
                            @foreach ($ento1_list->ento_01_dataes as $data)
                            <?php $i++; ?>
                            <input type="hidden" name="id" value="{{ $data->id }}  class=" form-control">
                            <tr id="rec-1">


                                <td id="sample_rowonre" rowspan="2">
                                    <span class="sn">{{$i}}</span>.
                                </td>

                                <td rowspan="2">
                                    <input type="text" name="ser_no[]" value="{{ $data->ser_no }}" class="form-control">
                                </td>

                                <td rowspan="2">
                                    <input type="text" name="gps_long[]" value="{{ $data->gps_long }}" class="form-control">
                                </td>

                                <td rowspan="2">
                                    <input type="text" name="gps_lat[]" value="{{ $data->gps_lat }}" class="form-control">
                                </td>

                                <td rowspan="2">
                                    <input type="text" name="house_no[]" min="0" value="{{ $data->house_no }}" class="form-control">
                                </td>

                                <!-- <td rowspan="2">
                                    <input type="number" name="timeSpand[]" min="0" value="{{ $data->timeSpand }}" onchange="totalTime()" onkeyup="totalTime()" class="form-control">
                                </td> -->

                                <td rowspan="2"><input style="width: 50px;" min="0" value="{{ $data->no_of_pre_postive_cx }}" type="number" name="no_of_pre_postive_cx[]" class="form-control" onchange="Totalpositive()"></td>
                                <td rowspan="2"><input style="width: 50px;" min="0" value="{{ $data->no_of_pre_postive_man }}" type="number" name="no_of_pre_postive_man[]" onchange="Totalpositivem()" class="form-control"></td>
                                <td rowspan="2"><input style="width: 50px;" min="0" value="{{ $data->no_of_culex }}" type="number" name="no_of_culex[]" class="form-control" onchange="Totalmoocu()"></td>
                                <td rowspan="2"><input style="width: 50px;" min="0" value="{{ $data->no_of_mosq }}" type="number" name="no_of_mosq[]" class="form-control" onchange="Totalmosman()"></td>



                                <th>
                                    Cx
                                </th>

                                <td>
                                    <input style="width: 40px;" min="0" type="number" value="{{ $data->resting_place_1 }}" name="resting_place_1[]" class="form-control" onchange="Totalres1cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->resting_place_2 }}" name="resting_place_2[]" class="form-control" onchange="Totalres2cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->resting_place_3 }}" name="resting_place_3[]" class="form-control" onchange="Totalres3cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->resting_place_4 }}" name="resting_place_4[]" class="form-control" onchange="Totalres4cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->resting_place_5 }}" name="resting_place_5[]" class="form-control" onchange="Totalres5cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->resting_place_6 }}" name="resting_place_6[]" class="form-control" onchange="Totalres6cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->abdo_uf }}" name="abdo_uf[]" class="form-control" onchange="Totalufcu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->abdo_f }}" name="abdo_f[]" class="form-control" onchange="Totalfcu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->abdo_sg }}" name="abdo_sg[]" class="form-control" onchange="Totalsgcu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->abdo_g }}" name="abdo_g[]" class="form-control" onchange="Totalgcu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->males }}" name="males[]" class="form-control" onchange="Totalmalescu()">
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


                                <td><input type="number" name="no_of_dissected[]" min="0" value="{{ $cno_dissected_mosquitos != null ? $cno_dissected_mosquitos : '0' }}" class="form-control"></td>
                                <td><input type="number" name="no_of_infrcted[]" min="0" value="{{ $cpositive_mosq != null ? $cpositive_mosq : '0' }}" class="form-control"></td>
                                <td><input type="number" name="no_of_infective[]" min="0" value="{{ $cmq_postive_for_l3 != null ? $cmq_postive_for_l3 : '0' }}" class="form-control"></td>


                                <td rowspan="2">
                                    <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_ento1_data_new') }}/{{$data->id }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> <i class="glyphicon glyphicon-trash"></i></a>
                                </td>

                            </tr>


                            <tr id="rec-1">
                                <th>Mn</th>
                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->resting_place_1_mansonia }}" name="resting_place_1_mansonia[]" class="form-control" onchange="Totalres1mn()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->resting_place_2_mansonia }}" name="resting_place_2_mansonia[]" class="form-control" onchange="Totalres2Ma()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->resting_place_3_mansonia }}" name="resting_place_3_mansonia[]" class="form-control" onchange="Totalres3Ma()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->resting_place_4_mansonia }}" name="resting_place_4_mansonia[]" class="form-control" onchange="Totalres4Ma()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->resting_place_5_mansonia }}" name="resting_place_5_mansonia[]" class="form-control" onchange="Totalres5Ma()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->resting_place_6_mansonia }}" name="resting_place_6_mansonia[]" class="form-control" onchange="Totalres6Ma()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->abdo_uf_ma }}" name="abdo_uf_ma[]" class="form-control" onchange="Totalufmn()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->abdo_f_ma }}" name="abdo_f_ma[]" class="form-control" onchange="Totalfmn()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->abdo_sg_ma }}" name="abdo_sg_ma[]" class="form-control" onchange="Totalsgmn()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->abdo_g_ma }}" name="abdo_g_ma[]" class="form-control" onchange="Totalgmn()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" min="0" value="{{ $data->males_ma }}" name="males_ma[]" class="form-control" onchange="Totalmalesmn()">
                                </td>



                                <!-- new Failed need to add db -->

                                <td><input type="number" min="0" value="{{ $mno_dissected_mosquitos != null ? $mno_dissected_mosquitos : '0' }}" name="no_of_dissected_ma[]" class="form-control"></td>
                                <td><input type="number" min="0" value="{{ $mpositive_mosq != null ? $mpositive_mosq : '0' }}" name="no_of_infrcted_ma[]" class="form-control"></td>
                                <td><input type="number" min="0" value="{{ $mmq_postive_for_l3 != null ? $mmq_postive_for_l3 : '0' }}" name="no_of_infective_ma[]" class="form-control"></td>




                                <?php
                                $cno_dissected_mosquitos = "";
                                $cpositive_mosq = "";
                                $cmq_postive_for_l3 = "";
                                $mno_dissected_mosquitos = "";
                                $mpositive_mosq = "";
                                $mmq_postive_for_l3 = "";
                                ?>
                            </tr>
                            @endforeach






                        <tfoot>
                            <tr>
                                <td class="totalth" colspan="5" rowspan="2" style="text-align: center; vertical-align: middle;"> Total</td>
                                <td class="totalth" rowspan="2"><input style="width: 40px;" type="number" disabled name="NoofPreTotal" class="form-control"></td>
                                <td class="totalth" rowspan="2"><input style="width: 40px;" type="number" disabled name="NoofPreTotalMn" class="form-control"></td>
                                <td class="totalth" rowspan="2"><input style="width: 40px;" type="number" disabled name="TotalMosCu" class="form-control"></td>
                                <td class="totalth" rowspan="2"><input style="width: 40px;" type="number" disabled name="TotalMosMa" class="form-control"></td>
                                <td class="totalth">Cx</td>
                                <td class="totalth"><input style="width: 40px;" type="text" disabled name="1TotalCx" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" type="text" disabled name="2TotalCx" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" type="text" disabled name="3TotalCx" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" type="text" disabled name="4TotalCx" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" type="text" disabled name="5TotalCx" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" type="text" disabled name="6TotalCx" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" type="text" disabled name="UfTotalCx" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" type="text" disabled name="fTotalCx" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" type="text" disabled name="SgTotalCx" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" type="text" disabled name="GtoTalCx" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" type="text" disabled name="MalestoTalCx" class="form-control"></td>
                                <td class="totalth"><input type="text" disabled name="Cx_Total_No_oF_dissectec" class="form-control"></td>
                                <td class="totalth"><input type="text" disabled name="Cx_Total_No_oF_infected" class="form-control"></td>
                                <td class="totalth"><input type="text" disabled name="Cx_Total_No_oF_infective" class="form-control"></td>



                            </tr>


                            <tr>
                                <td class="totalth">Mn</td>
                                <td class="totalth"><input style="width: 40px;" disabled type="text" value="0" name="1TotalMn" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" disabled type="text" value="0" name="2TotalMn" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" disabled type="text" value="0" name="3TotalMn" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" disabled type="text" value="0" name="4TotalMn" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" disabled type="text" value="0" name="5TotalMn" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" disabled type="text" value="0" name="6TotalMn" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" disabled type="text" value="0" name="UfTotalMn" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" disabled type="text" value="0" name="fTotalMn" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" disabled type="text" value="0" name="SgTotalMn" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" disabled type="text" value="0" name="GtoTalMn" class="form-control"></td>
                                <td class="totalth"><input style="width: 40px;" disabled type="text" value="0" name="MalestoTalMn" class="form-control"></td>
                                <td class="totalth"><input type="text" disabled name="Man_Total_No_oF_dissectec" class="form-control"></td>
                                <td class="totalth"><input type="text" disabled name="Man_Total_No_oF_infected" class="form-control"></td>
                                <td class="totalth"><input type="text" disabled name="Man_Total_No_oF_infective" class="form-control"></td>
                            </tr>
                        </tfoot>












                        </tbody>
                    </table>

                </div>



                <style>
                    .totalth {
                        white-space: nowrap;
                        vertical-align: middle;
                        background-color: #d58312;
                        border-color: #ffffff;
                        color: #fff;
                        border: 1px solid #ad701c !important;
                    }



                    th {
                        white-space: nowrap;
                        vertical-align: middle;
                        background-color: #3c8dbc;
                        border-color: #367fa9;
                        color: #fff;
                        border: 1px solid #00a8c1 !important;
                    }

                    td {
                        border: 1px solid #00a8c1 !important;
                    }

                    .table-bordered>thead>tr>th {
                        border: 1px solid #00a8c1 !important;
                    }

                    .form-control {
                        padding: 2px !important;
                    }

                    .ther {
                        position: sticky !important;
                        top: 0;
                    }

                    th,
                    td {
                        text-align: center !important;
                        vertical-align: middle !important;
                    }
                </style>

                <br>
                <div class="box box-primary">
                    <div class="box-body" style="overflow: hidden;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Total no of Anopheles Mos:</label>
                                <input type="text" name="anopheles_species" class="form-control" value="{{ $ento1_list->anopheles_species }}"> <!-- manual-->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Total no of Aedes Mos:</label>
                                <input type="text" name="aedes_sp" class="form-control" value="{{ $ento1_list->aedes_sp }}"> <!-- manual-->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Total no of Armigeres Mos:</label>
                                <input type="text" name="armigerus_sp" class="form-control" value="{{ $ento1_list->armigerus_sp }}"> <!-- manual -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">No of collectors</label>
                                <input type="text" name="no_of_collectors" onkeyup="CuDensity(),maDensity()" onchange="CuDensity(),maDensity()" class="form-control" value="{{ $ento1_list->no_of_collectors }}"> <!-- manual -->
                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputPassword1">No of man hours</label>
                                <input type="text" min="0" name="total_time_spend" class="form-control" onkeyup="CuDensity(),maDensity()" onchange="CuDensity(),maDensity()" value="{{ $ento1_list->total_time_spend }}"> <!-- manual -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mos. Density: Cx</label>
                                <input type="text" min="0" name="MosDensityCx" class="form-control" value="{{ $ento1_list->MosDensityCx }}"> <!-- auto-generated newly created-->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mos. Density: MN</label>
                                <input type="text" min="0" name="MosDensityMan" class="form-control" value="{{ $ento1_list->MosDensityMan }}"> <!-- auto-generated newly created-->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Name of HEO</label>
                                <input type="text" min="0" name="name_of_heo" class="form-control" value="{{ $ento1_list->name_of_heo }}">
                            </div>

                        </div>
                    </div>


                    <div class="box-footer">
                        <center>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </center>

                    </div>
                </div>








            </form>
        </div>
    </section>

    <div style="display:none;">
        <table id="sample_table">
            <tbody>
                <tr id="">
                    <td id="sample_rowonre" rowspan="2"><span class="sn">1</span>.</td>
                    <td rowspan="2"><input type="text" name="ser_no[]" class="form-control"></td>
                    <td rowspan="2"><input type="text" name="gps_long[]" class="form-control">
                    </td>
                    <td rowspan="2"><input type="text" name="gps_lat[]" class="form-control"></td>
                    <td rowspan="2"><input min="0" type="text" name="house_no[]" class="form-control">
                    </td>
                    <!-- <td rowspan="2"><input min="0" type="number" name="timeSpand[]" onchange="totalTime()" value="0" onkeyup="totalTime()" class="form-control">
                    </td> -->

                    <td rowspan="2"><input min="0" style="width: 50px;" type="number" value="0" name="no_of_pre_postive_cx[]" class="form-control" onchange="Totalpositive()"></td>
                    <td rowspan="2"><input min="0" style="width: 50px;" type="number" value="0" name="no_of_pre_postive_man[]" class="form-control" onchange="Totalpositivem()"></td>
                    <td rowspan="2"><input min="0" style="width: 50px;" type="number" value="0" name="no_of_culex[]" class="form-control" onchange="Totalmoocu()"></td>
                    <td rowspan="2"><input min="0" style="width: 50px;" type="number" value="0" name="no_of_mosq[]" class="form-control" onchange="Totalmosman()"></td>


                    <th>Cx</th>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_1[]" class="form-control" onchange="Totalres1cu()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_2[]" class="form-control" onchange="Totalres2cu()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_3[]" class="form-control" onchange="Totalres3cu()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_4[]" class="form-control" onchange="Totalres4cu()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_5[]" class="form-control" onchange="Totalres5cu()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_6[]" class="form-control" onchange="Totalres6cu()"></td>

                    <td>
                        <input style="width: 40px;" type="number" min="0" value="0" name="abdo_uf[]" class="form-control" onchange="Totalufcu()">
                    </td>
                    <td>
                        <input style="width: 40px;" type="number" min="0" value="0" name="abdo_f[]" class="form-control" onchange="Totalfcu()">
                    </td>
                    <td>
                        <input style="width: 40px;" type="number" value="0" min="0" name="abdo_sg[]" class="form-control" onchange="Totalsgcu()">
                    </td>
                    <td>
                        <input style="width: 40px;" type="number" value="0" min="0" name="abdo_g[]" class="form-control" onchange="Totalgcu()">
                    </td>

                    <td>
                        <input style="width: 40px;" type="number" value="0" min="0" name="males[]" class="form-control" onchange="Totalmalescu()">
                    </td>
                    <!-- new Failed need to add db -->

                    <td><input type="number" value="0" min="0" name="no_of_dissected[]" class="form-control"></td>
                    <td><input type="number" value="0" min="0" name="no_of_infrcted[]" class="form-control">
                    </td>
                    <td><input type="number" value="0" min="0" name="no_of_infective[]" class="form-control"></td>
                    -->

                    <td rowspan="2"><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>

                </tr>







                <tr name="secondrow" id="">


                    <th>Mn</th>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_1_mansonia[]" class="form-control" onchange="Totalres1mn()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_2_mansonia[]" class="form-control" onchange="Totalres2Ma()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_3_mansonia[]" class="form-control" onchange="Totalres3Ma()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_4_mansonia[]" class="form-control" onchange="Totalres4Ma()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_5_mansonia[]" class="form-control" onchange="Totalres5Ma()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="resting_place_6_mansonia[]" class="form-control" onchange="Totalres6Ma()"></td>

                    <td><input style="width: 40px;" type="number" min="0" value="0" name="abdo_uf_ma[]" class="form-control" onchange="Totalufmn()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="abdo_f_ma[]" class="form-control" onchange="Totalfmn()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="abdo_sg_ma[]" class="form-control" onchange="Totalsgmn()"></td>
                    <td><input style="width: 40px;" type="number" min="0" value="0" name="abdo_g_ma[]" class="form-control" onchange="Totalgmn()"></td>

                    <td><input style="width: 40px;" type="number" min="0" value="0" name="males_ma[]" class="form-control" onchange="Totalmalesmn()"></td>
                    class="form-control"></td>
                    <!-- new Failed need to add db -->

                    <td><input type="number" value="0" min="0" name="no_of_dissected_ma[]" class="form-control"></td>
                    <td><input type="number" value="0" ssssssmin="0" name="no_of_infrcted_ma[]" class="form-control"></td>
                    <td><input type="number" value="0" min="0" name="no_of_infective_ma[]" class="form-control">
                    </td>



                </tr>

            </tbody>


        </table>
    </div>

</div>



<script type="text/javascript">
    $(document).ready(function() {

        var index2 = 1;

        jQuery(document).delegate('a.add-record', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#sample_table tr'),
                size = jQuery('#tbl_posts >tbody >tr').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'rec-' + size);

            //  var third  =element.('tr[name ="secondrow"]');
            //  third.attr('id', 'rec2-'+size);


            element.find('.delete-record').attr('data-id', size);
            element.appendTo('#tbl_posts_body');
            index2 = index2 + 1;
            element.find('.sn').html(index2);
        });
        jQuery(document).delegate('a.delete-record', 'click', function(e) {
            e.preventDefault();
            var didConfirm = confirm("Are you sure You want to delete");
            if (didConfirm == true) {
                var id = jQuery(this).attr('data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#rec-' + id).remove();

                jQuery('#rec-' + id).remove();

                //       regnerate index number on table
                $('#tbl_posts_body #sample_rowonre').each(function(index = 0) {

                    $(this).find('span.sn').html(index + 1);
                });

                return true;
            } else {
                return false;
            }
        });


    });







    function Totalpositive() {
        var inps = document.querySelectorAll('input[name="no_of_pre_postive_cx[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on " + totals);
        document.getElementsByName("NoofPreTotal")[0].value = totals;
    }




    function Totalpositivem() {
        var inps = document.querySelectorAll('input[name="no_of_pre_postive_man[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("NoofPreTotalMn")[0].value = totals;
    }




    function Totalmoocu() {
        var inps = document.querySelectorAll('input[name="no_of_culex[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("TotalMosCu")[0].value = totals;
    }


    function Totalmosman() {
        var inps = document.querySelectorAll('input[name="no_of_mosq[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("TotalMosMa")[0].value = totals;
    }



    function Totalres1cu() {
        var inps = document.querySelectorAll('input[name="resting_place_1[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("1TotalCx")[0].value = totals;

    }





    function Totalres1mn() {
        var inps = document.querySelectorAll('input[name="resting_place_1_mansonia[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("1TotalMn")[0].value = totals;

    }




    function Totalres2cu() {
        var inps = document.querySelectorAll('input[name="resting_place_2[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("2TotalCx")[0].value = totals;

    }


    function Totalres2Ma() {
        var inps = document.querySelectorAll('input[name="resting_place_2_mansonia[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("2TotalMn")[0].value = totals;

    }





    function Totalres3cu() {
        var inps = document.querySelectorAll('input[name="resting_place_3[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("3TotalCx")[0].value = totals;

    }



    function Totalres3Ma() {
        var inps = document.querySelectorAll('input[name="resting_place_3_mansonia[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("3TotalMn")[0].value = totals;

    }


    function Totalres4cu() {
        var inps = document.querySelectorAll('input[name="resting_place_4[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("4TotalCx")[0].value = totals;

    }



    function Totalres4Ma() {
        var inps = document.querySelectorAll('input[name="resting_place_4_mansonia[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("4TotalMn")[0].value = totals;

    }





    function Totalres5cu() {
        var inps = document.querySelectorAll('input[name="resting_place_5[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("5TotalCx")[0].value = totals;

    }



    function Totalres5Ma() {
        var inps = document.querySelectorAll('input[name="resting_place_5_mansonia[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("5TotalMn")[0].value = totals;

    }






    function Totalres6cu() {
        var inps = document.querySelectorAll('input[name="resting_place_6[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("6TotalCx")[0].value = totals;

    }



    function Totalres6Ma() {
        var inps = document.querySelectorAll('input[name="resting_place_6_mansonia[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("6TotalMn")[0].value = totals;

    }



    function Totalufcu() {
        var inps = document.querySelectorAll('input[name="abdo_uf[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("UfTotalCx")[0].value = totals;

    }



    function Totalufmn() {
        var inps = document.querySelectorAll('input[name="abdo_uf_ma[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("UfTotalMn")[0].value = totals;

    }








    function Totalfcu() {
        var inps = document.querySelectorAll('input[name="abdo_f[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("fTotalCx")[0].value = totals;

    }



    function Totalfmn() {
        var inps = document.querySelectorAll('input[name="abdo_f_ma[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("fTotalMn")[0].value = totals;

    }










    function Totalsgcu() {
        var inps = document.querySelectorAll('input[name="abdo_sg[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("SgTotalCx")[0].value = totals;

    }



    function Totalsgmn() {
        var inps = document.querySelectorAll('input[name="abdo_sg_ma[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("SgTotalMn")[0].value = totals;

    }








    function Totalgcu() {
        var inps = document.querySelectorAll('input[name="abdo_g[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("GtoTalCx")[0].value = totals;

    }



    function Totalgmn() {
        var inps = document.querySelectorAll('input[name="abdo_g_ma[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("GtoTalMn")[0].value = totals;

    }





    function Totalmalescu() {
        var inps = document.querySelectorAll('input[name="males[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("MalestoTalCx")[0].value = totals;

    }



    function Totalmalesmn() {
        var inps = document.querySelectorAll('input[name="males_ma[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }
        console.log("Total amount on" + totals);
        document.getElementsByName("MalestoTalMn")[0].value = totals;

    }








    /// Add “total” values of “No of dissected” , “ No of infected” and “ No of infective” column






    function Totalno_of_dissected() {
        var inps = document.querySelectorAll('input[name="no_of_dissected[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }

        document.getElementsByName("Cx_Total_No_oF_dissectec")[0].value = totals;

    }



    function Totalno_of_infrcted() {
        var inps = document.querySelectorAll('input[name="no_of_infrcted[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }

        document.getElementsByName("Cx_Total_No_oF_infected")[0].value = totals;

    }

    function Totalno_of_infective() {
        var inps = document.querySelectorAll('input[name="no_of_infective[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }

        document.getElementsByName("Cx_Total_No_oF_infective")[0].value = totals;

    }





















    
    function Totalno_of_dissected_ma() {
        var inps = document.querySelectorAll('input[name="no_of_dissected_ma[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }

        document.getElementsByName("Man_Total_No_oF_dissectec")[0].value = totals;

    }



    function Totalno_of_infrcted_ma() {
        var inps = document.querySelectorAll('input[name="no_of_infrcted_ma[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }

        document.getElementsByName("Man_Total_No_oF_infected")[0].value = totals;

    }





    function Totalno_of_infective_ma() {
        var inps = document.querySelectorAll('input[name="no_of_infective_ma[]"]');
        var totals = 0;

        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
        }

        document.getElementsByName("Man_Total_No_oF_infective")[0].value = totals;

    }











    // function totalTime() {
    //     var inps = document.querySelectorAll('input[name="timeSpand[]"]');
    //     var totals = 0;

    //     for (var i = 0; i < inps.length; i++) {
    //         totals = totals + parseInt(inps[i].value);
    //     }
    //     totals = totals / 60;
    //     totals = totals.toFixed(2);
    //     console.log("Total amount on" + totals);
    //     document.getElementsByName("total_time_spend")[0].value = totals;

    // }




    //     $mosquitodensity =  ($total_mosquitos_collected/$total_time_spend)/$no_of_collectors   ;
    // $mosquitodensity = round($mosquitodensity, 2);

    function CuDensity() {
        var TotalMosCu = document.getElementsByName("TotalMosCu")[0].value;
        var total_time_spend = document.getElementsByName("total_time_spend")[0].value;
        var no_of_collectors = document.getElementsByName("no_of_collectors")[0].value;

        var density = (TotalMosCu / total_time_spend) / no_of_collectors;

        density = density.toFixed(2);
        document.getElementsByName("MosDensityCx")[0].value = density;

    }


    function maDensity() {
        var TotalMosCu = document.getElementsByName("TotalMosMa")[0].value;
        var total_time_spend = document.getElementsByName("total_time_spend")[0].value;
        var no_of_collectors = document.getElementsByName("no_of_collectors")[0].value;

        var density = (TotalMosCu / total_time_spend) / no_of_collectors;

        density = density.toFixed(2);
        document.getElementsByName("MosDensityMan")[0].value = density;

    }

    Totalpositive();
    Totalpositivem();
    Totalmoocu();
    Totalmosman();
    Totalres1cu();
    Totalres1mn();
    Totalres2cu();
    Totalres2Ma();
    Totalres3cu();
    Totalres3Ma();
    Totalres4cu();
    Totalres4Ma();
    Totalres5cu();
    Totalres5Ma();
    Totalres6cu();
    Totalres6Ma();
    Totalufcu();
    Totalufmn();
    Totalfcu();
    Totalfmn();
    Totalsgcu();
    Totalsgmn();
    Totalgcu();
    Totalgmn();
    Totalmalescu();
    Totalmalesmn();




    Totalno_of_infective_ma()
    Totalno_of_dissected_ma();
    Totalno_of_infrcted_ma()
    Totalno_of_dissected();
    Totalno_of_infrcted();
  

    Totalno_of_infective();
  


    CuDensity();
    maDensity();
   

    
</script>