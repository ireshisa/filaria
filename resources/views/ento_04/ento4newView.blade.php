<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Human landing Night Collection 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Entomological data</a></li>
            <li class="active">Human landing Night Collection  </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/ento4_data_newupdate') }}">

                {{csrf_field() }}

                <input type="hidden" name="ento_04_id" value="{{ $ento4_list->ento_04_id  }}" class="form-control">
                <input type="hidden" name="ento_04_indoors_id" value="{{ $ento4_list->ento_04_indoors->id }}" class="form-control">
                <input type="hidden" name="ento_04_outdoors_id" value="{{ $ento4_list->ento_04_outdoors->id }}" class="form-control">

                @foreach ($ento4_list->ento_04_mosq_news as $data)
                <?php
                if ($data->formtype == 'indoor') { ?>
                    <input type="hidden" name="ento_04_mosq_new_id[]" value="{{ $data->id }}" class="form-control">
                <?php }; ?>
                @endforeach


                @foreach ($ento4_list->ento_04_mosq_news as $data)
                <?php
                if ($data->formtype == 'outdoor') { ?>
                    <input type="hidden" name="ento_04_mosq_new_id_out[]" value="{{ $data->id }}" class="form-control">
                <?php }; ?>
                @endforeach




                <div class="col-md-12">
                    @if(session()->has('message'))
                    @if(session()->get('message')==true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        Successfully save your data.
                    </div>
                    @endif
                    @if(session()->get('message')==false)
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
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
                        <div class="box-body">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Form ID</label>
                                    <input type="text" name="formid" class="form-control" value="{{ $ento4_list->formid }}" readonly required>
                                </div>






                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Form Type</label>
                                    <select name="formtype" class="form-control" required="">
                                        <option value="">Select</option>
                                        <option {{ $ento4_list->formtype == 'indoor' ? 'selected' : '' }} value="indoor">Indoor</option>
                                        <option {{ $ento4_list->formtype == 'outdoor' ? 'selected' : '' }} value="outdoor">Outdoor</option>
                                    </select>
                                </div> -->




                                <div class="form-group">
                                    <label for="exampleInputEmail1">District</label>
                                    <input type="text" name="district" value="{{ $ento4_list->district }}" readonly class="form-control">

                                    {{-- <select name="district" class="form-control" onchange="getMoh(this.value)" required="">
                                        <option value="">Select</option>
                                        @if(Auth::user()->role!=="ADMIN" & Auth::user()->role !== "AFC")
                                        <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
                                    @else
                                    @foreach ($district_list as $dis)
                                    <option value="{{ $dis->district }}">{{ $dis->district }}</option>
                                    @endforeach
                                    @endif
                                    </select> --}}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">MOH area</label>
                                    {{-- <select name="moh" class="form-control" id="moh_list" onchange="getPhi(this.value)">
                                        <option value="">Select</option>
                                    </select> --}}
                                    <input type="text" name="moh" value="{{ $ento4_list->moh }}" readonly class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">PHM area </label>
                                    <input type="text" name="phi" value="{{ $ento4_list->phi }}" class="form-control">
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">GN division</label>
                                    <input type="text" name="gn_division" value="{{ $ento4_list->gn_division }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Locality/ Address </label>
                                    <input type="text" name="locality" value="{{ $ento4_list->locality }}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">GPS longitude</label>
                                    <input type="text" name="gps_long" value="{{ $ento4_list->gps_long }}" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">GPS latitude</label>
                                    <input type="text" name="gps_lat" value="{{ $ento4_list->gps_lat }}" class="form-control">
                                </div>

                             

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date </label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="date_of_collection" value="{{ $ento4_list->date_of_collection }}" class="datepicker_v form-control pull-right">
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->

                    </div>

                    <!-- /.box -->
                </div>



                <div clss="row " style="background-color: #fff; padding:5px;">
                    <div class="col-12">
                        <center>
                            <a class="btn btn-primary   add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Row</a>
                        </center>
                    </div>
                </div>




                <div clss="row " style="background-color: #fff; padding:5px;
                    overflow-x:auto;
                    overflow-y:none;
                    max-height:80vh">

                    <table class="table table-bordered" id="tbl_posts">
                        <thead class="ther">
                            <tr>
                                <th rowspan="2">#Row NO</th>
                                <th rowspan="2">Mosquito species</th>
                                <th colspan="12">Indoor</th>
                                <th rowspan="2">Total</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>6-7pm</th>
                                <th>7-8pm</th>
                                <th>8-9pm</th>
                                <th>9-10pm</th>
                                <th>10-11pm</th>
                                <th>11-12pm</th>
                                <th>12-1am</th>
                                <th>1-2am</th>
                                <th>2-3am</th>
                                <th>3-4am</th>
                                <th>4-5am</th>
                                <th>5-6am</th>
                            </tr>
                        </thead>

                        <tbody id="tbl_posts_body">

                            <?php $i = 0; ?>
                            @foreach ($ento4_list->ento_04_mosq_news as $data)
                            <?php
                            if ($data->formtype == 'indoor') {
                                $i++; ?>
                                <input type="hidden" name="id" value="{{ $data->id }}" class="form-control">

                                <tr id="rec-1">
                                    <td id="sample_rowonre"><span class="sn">{{$i}}</span>.</td>
                                    <td>
                                        <select name="mosq_spec_stat[]" class="form-control">
                                            <option value="{{ $data->mosq_spec_stat}}" {{ $data->mosq_spec_stat != null ? 'selected' : '' }}>
                                                {{ $data->mosq_spec_stat != null ? $data->mosq_spec_stat : 'Select mosquito species' }}
                                            </option>
                                            <option value="Aedes (aedimorphus) jamesi">Aedes (aedimorphus) jamesi </option>
                                            <option value="Aedes (aedimorphus) pallidostriatus  pallidostriatus">Aedes (aedimorphus) pallidostriatus pallidostriatus </option>
                                            <option value="Aedes (aedimorphus) pipersalatus">Aedes (aedimorphus) pipersalatus </option>
                                            <option value="Aedes (aedimorphus) vexans">Aedes (aedimorphus) vexans </option>
                                            <option value="Aedes (aedimorphus) vittatus">Aedes (aedimorphus) vittatus </option>
                                            <option value="Aedes (mucidus) scatophagoides">Aedes (mucidus) scatophagoides </option>
                                            <option value="Aedes (stegomyia) aegypti">Aedes (stegomyia) aegypti </option>
                                            <option value="Aedes (stegomyia) albopictus">Aedes (stegomyia) albopictus </option>
                                            <option value="Anopheles (anopheles) barbirostris">Anopheles (anopheles) barbirostris </option>
                                            <option value="Anopheles (anopheles) nigerrimus">Anopheles (anopheles) nigerrimus </option>
                                            <option value="Anopheles (anopheles) peditaeniatus">Anopheles (anopheles) peditaeniatus </option>
                                            <option value="Anopheles (cellia) aconitus">Anopheles (cellia) aconitus </option>
                                            <option value="Anopheles (cellia) annularis">Anopheles (cellia) annularis </option>
                                            <option value="Anopheles (cellia) culicifacies">Anopheles (cellia) culicifacies </option>
                                            <option value="Anopheles (cellia) elegans">Anopheles (cellia) elegans </option>
                                            <option value="Anopheles (cellia) jamesii">Anopheles (cellia) jamesii </option>
                                            <option value="Anopheles (cellia) karwari">Anopheles (cellia) karwari </option>
                                            <option value="Anopheles (cellia) maculatus">Anopheles (cellia) maculatus </option>
                                            <option value="Anopheles (cellia) pallidus">Anopheles (cellia) pallidus </option>
                                            <option value="Anopheles (cellia) stephensi">Anopheles (cellia) stephensi </option>
                                            <option value="Anopheles (cellia) subpictus">Anopheles (cellia) subpictus </option>
                                            <option value="Anopheles (cellia) tessellatus">Anopheles (cellia) tessellatus </option>
                                            <option value="Anopheles (cellia) vagus">Anopheles (cellia) vagus </option>
                                            <option value="Anopheles (cellia) varuna">Anopheles (cellia) varuna </option>
                                            <option value="Armigeres (armigeres) subalbatus">Armigeres (armigeres) subalbatus </option>
                                            <option value="Coquillettidia (coquillettidia) crassipes">Coquillettidia (coquillettidia) crassipes </option>
                                            <option value="Culex (culex) bitaeniorhynchus ">Culex (culex) bitaeniorhynchus </option>
                                            <option value="Culex (culex) fuscocephala">Culex (culex) fuscocephala </option>
                                            <option value="Culex (culex) gelidus">Culex (culex) gelidus </option>
                                            <option value="Culex (culex) hutchinsoni">Culex (culex) hutchinsoni </option>
                                            <option value="Culex (culex) infula">Culex (culex) infula </option>
                                            <option value="Culex (culex) jacksoni">Culex (culex) jacksoni </option>
                                            <option value="Culex (culex) mimulus">Culex (culex) mimulus </option>
                                            <option value="Culex (culex) pseudovishnui">Culex (culex) pseudovishnui </option>
                                            <option value="Culex (culex) quinquefasciatus">Culex (culex) quinquefasciatus </option>
                                            <option value="Culex (culex) sinensis">Culex (culex) sinensis </option>
                                            <option value="Culex (culex) sitiens">Culex (culex) sitiens </option>
                                            <option value="Culex (culex) tritaeniorhynchus">Culex (culex) tritaeniorhynchus </option>
                                            <option value="Culex (culex) vishnui">Culex (culex) vishnui </option>
                                            <option value="Culex (culex) whitmorei">Culex (culex) whitmorei </option>
                                            <option value="Culex (culiciomyia) nigropunctatus">Culex (culiciomyia) nigropunctatus </option>
                                            <option value="Culex (culiciomyia) pallidothorax">Culex (culiciomyia) pallidothorax </option>
                                            <option value="Culex (eumelnomyia) brevipalpis">Culex (eumelnomyia) brevipalpis </option>
                                            <option value="Culex (lophoceraomyia) bicornutus">Culex (lophoceraomyia) bicornutus </option>
                                            <option value="Culex (lophoceraomyia) infantulus">Culex (lophoceraomyia) infantulus </option>
                                            <option value="Culex (lophoceraomyia) minutissimus ">Culex (lophoceraomyia) minutissimus </option>
                                            <option value="Lutzia (lutzia) fuscanus">Lutzia (lutzia) fuscanus </option>
                                            <option value="Lutzia (lutzia) halifaxii">Lutzia (lutzia) halifaxii </option>
                                            <option value="Mansonia (mansonioides) annulifera">Mansonia (mansonioides) annulifera </option>
                                            <option value="Mansonia (mansonioides) indiana">Mansonia (mansonioides) indiana </option>
                                            <option value="Mansonia (mansonioides) uniformis">Mansonia (mansonioides) uniformis </option>
                                            <option value="Mosquito Species">Mosquito Species </option>
                                            <option value="Other">Other </option>
                                        </select>
                                    </td>
                                    <td><input type="Number" min="0" class="form-control" name="number[]" required="" style="width: 50px;" value="{{ $data->number != null ? $data->number : '0' }}" onchange="Totalnumber()" onkeyup="Totalnumber()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number7_8[]" required="" style="width: 50px;" value="{{ $data->number7_8 != null ? $data->number7_8 : '0' }}" onchange="Totalnumber78()" onkeyup="Totalnumber78()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number8_9[]" required="" style="width: 50px;" value="{{ $data->number8_9 != null ? $data->number8_9 : '0' }}" onchange="Totalnumber89()" onkeyup="Totalnumber89()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number9_10[]" required="" style="width: 50px;" value="{{ $data->number9_10 != null ? $data->number9_10 : '0' }}" onchange="Totalnumber910()" onkeyup="Totalnumber910()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number10_11[]" required="" style="width: 50px;" value="{{ $data->number10_11 != null ? $data->number10_11 : '0' }}" onchange="Totalnumber1011()" onkeyup="Totalnumber1011()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number11_12[]" required="" style="width: 50px;" value="{{ $data->number11_12 != null ? $data->number11_12 : '0' }}" onchange="Totalnumber1112()" onkeyup="Totalnumber1112()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number12_1[]" required="" style="width: 50px;" value="{{ $data->number12_1 != null ? $data->number12_1 : '0' }}" onchange="Totalnumber121()" onkeyup="Totalnumber121()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number1_2[]" required="" style="width: 50px;" value="{{ $data->number1_2 != null ? $data->number1_2 : '0' }}" onchange="Totalnumber12()" onkeyup="Totalnumber12()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number2_3[]" required="" style="width: 50px;" value="{{ $data->number2_3 != null ? $data->number2_3 : '0' }}" onchange="Totalnumber23()" onkeyup="Totalnumber23()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number3_4[]" required="" style="width: 50px;" value="{{ $data->number3_4 != null ? $data->number3_4 : '0' }}" onchange="Totalnumber34()" onkeyup="Totalnumber34()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number4_5[]" required="" style="width: 50px;" value="{{ $data->number4_5 != null ? $data->number4_5 : '0' }}" onchange="Totalnumber45()" onkeyup="Totalnumber45()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number5_6[]" required="" style="width: 50px;" value="{{ $data->number5_6 != null ? $data->number5_6 : '0' }}" onchange="Totalnumber56()" onkeyup="Totalnumber56()"></td>

                                    <td><input type="Number" min="0" class="form-control" name="total[]" value="0" required="" style="width: 50px;" value="0"></td>

                                    <td>

                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_ento4_mosqdata') }}/{{$data->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> <i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                <?php }; ?>
                                @endforeach
                                </tr>


                        </tbody>


                        <tfoot>
                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> Total</td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber78_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber89_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber910_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber1011_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber1112_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber121_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber12_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber23_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber34_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber45_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totalnumber56_t" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled step="0.01" name="Totaloftotal" value="0" class="form-control" style="width: 50px;"></td>
                            </tr>


                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> No of baits</td>
                                <td><input type="number" min="0" name="noofbaits" value="{{ $ento4_list->ento_04_indoors->noofbaits != null ? $ento4_list->ento_04_indoors->noofbaits : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs7_8" value="{{ $ento4_list->ento_04_indoors->noofbairs7_8 != null ? $ento4_list->ento_04_indoors->noofbairs7_8 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs8_9" value="{{ $ento4_list->ento_04_indoors->noofbairs8_9 != null ? $ento4_list->ento_04_indoors->noofbairs8_9 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs9_10" value="{{ $ento4_list->ento_04_indoors->noofbairs9_10 != null ? $ento4_list->ento_04_indoors->noofbairs9_10 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs10_11" value="{{ $ento4_list->ento_04_indoors->noofbairs10_11 != null ? $ento4_list->ento_04_indoors->noofbairs10_11 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs11_12" value="{{ $ento4_list->ento_04_indoors->noofbairs11_12 != null ? $ento4_list->ento_04_indoors->noofbairs11_12 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs12_1" value="{{ $ento4_list->ento_04_indoors->noofbairs12_1 != null ? $ento4_list->ento_04_indoors->noofbairs12_1 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs1_2" value="{{ $ento4_list->ento_04_indoors->noofbairs1_2 != null ? $ento4_list->ento_04_indoors->noofbairs1_2 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs2_3" value="{{ $ento4_list->ento_04_indoors->noofbairs2_3 != null ? $ento4_list->ento_04_indoors->noofbairs2_3 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs3_4" value="{{ $ento4_list->ento_04_indoors->noofbairs3_4 != null ? $ento4_list->ento_04_indoors->noofbairs3_4 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs4_5" value="{{ $ento4_list->ento_04_indoors->noofbairs4_5 != null ? $ento4_list->ento_04_indoors->noofbairs4_5 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs5_6" value="{{ $ento4_list->ento_04_indoors->noofbairs5_6 != null ? $ento4_list->ento_04_indoors->noofbairs5_6 : '0' }}" class="form-control" style="width: 50px;"></td>
                            </tr>

                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Temp (0c)</td>
                                <td><input type="number" min="0" step="0.01" name="temp6_7" value="{{ $ento4_list->ento_04_indoors->temp6_7 != null ? $ento4_list->ento_04_indoors->temp6_7 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp7_8" value="{{ $ento4_list->ento_04_indoors->temp7_8 != null ? $ento4_list->ento_04_indoors->temp7_8 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp8_9" value="{{ $ento4_list->ento_04_indoors->temp8_9 != null ? $ento4_list->ento_04_indoors->temp8_9 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp9_10" value="{{ $ento4_list->ento_04_indoors->temp9_10 != null ? $ento4_list->ento_04_indoors->temp9_10 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp10_11" value="{{ $ento4_list->ento_04_indoors->temp10_11 != null ? $ento4_list->ento_04_indoors->temp10_11 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp11_12" value="{{ $ento4_list->ento_04_indoors->temp11_12 != null ? $ento4_list->ento_04_indoors->temp11_12 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp12_1" value="{{ $ento4_list->ento_04_indoors->temp12_1 != null ? $ento4_list->ento_04_indoors->temp12_1 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp1_2" value="{{ $ento4_list->ento_04_indoors->temp1_2 != null ? $ento4_list->ento_04_indoors->temp1_2 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp2_3" value="{{ $ento4_list->ento_04_indoors->temp2_3 != null ? $ento4_list->ento_04_indoors->temp2_3 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp3_4" value="{{ $ento4_list->ento_04_indoors->temp3_4 != null ? $ento4_list->ento_04_indoors->temp3_4 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp4_5" value="{{ $ento4_list->ento_04_indoors->temp4_5 != null ? $ento4_list->ento_04_indoors->temp4_5 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp5_6" value="{{ $ento4_list->ento_04_indoors->temp5_6 != null ? $ento4_list->ento_04_indoors->temp5_6 : '0' }}" class="form-control" style="width: 50px;"></td>
                            <tr>

                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Rh(%)</td>
                                <td><input type="number" min="0" step="0.01" name="RH6_7" value="{{ $ento4_list->ento_04_indoors->RH6_7 != null ? $ento4_list->ento_04_indoors->RH6_7 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH7_8" value="{{ $ento4_list->ento_04_indoors->RH7_8 != null ? $ento4_list->ento_04_indoors->RH7_8 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH8_9" value="{{ $ento4_list->ento_04_indoors->RH8_9 != null ? $ento4_list->ento_04_indoors->RH8_9 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH9_10" value="{{ $ento4_list->ento_04_indoors->RH9_10 != null ? $ento4_list->ento_04_indoors->RH9_10 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH10_11" value="{{ $ento4_list->ento_04_indoors->RH10_11 != null ? $ento4_list->ento_04_indoors->RH10_11 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH11_12" value="{{ $ento4_list->ento_04_indoors->RH11_12 != null ? $ento4_list->ento_04_indoors->RH11_12 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH12_1" value="{{ $ento4_list->ento_04_indoors->RH12_1 != null ? $ento4_list->ento_04_indoors->RH12_1 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH1_2" value="{{ $ento4_list->ento_04_indoors->RH1_2 != null ? $ento4_list->ento_04_indoors->RH1_2 : '0' }}" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH2_3" value="{{ $ento4_list->ento_04_indoors->RH2_3 != null ? $ento4_list->ento_04_indoors->RH2_3 : '0' }}" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH3_4" value="{{ $ento4_list->ento_04_indoors->RH3_4 != null ? $ento4_list->ento_04_indoors->RH3_4 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH4_5" value="{{ $ento4_list->ento_04_indoors->RH4_5 != null ? $ento4_list->ento_04_indoors->RH4_5 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH5_6" value="{{ $ento4_list->ento_04_indoors->RH5_6 != null ? $ento4_list->ento_04_indoors->RH5_6 : '0' }}" class="form-control" style="width: 50px;"></td>
                            </tr>


                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Weather Condition</td>
                                <td>
                                    <select id="weather" name="weather_condition_6_7" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_6_7 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_6_7 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_6_7 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_6_7 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_6_7 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_6_7 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_6_7 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_6_7 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_6_7 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_7_8" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_7_8 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_7_8 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_7_8 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_7_8 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_7_8 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_7_8 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_7_8 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_7_8 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_7_8 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_8_9" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_8_9 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_8_9 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_8_9 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_8_9 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_8_9 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_8_9 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_8_9 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_8_9 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_8_9 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_9_10" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_9_10 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_9_10 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_9_10 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_9_10 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_9_10 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_9_10 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_9_10 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_9_10 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_9_10 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>



                                <td>
                                    <select id="weather" name="weather_condition_10_11" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_10_11 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_10_11 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_10_11 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_10_11 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_10_11 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_10_11 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_10_11 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_10_11 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_10_11 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_11_12" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_11_12 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_11_12 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_11_12 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_11_12 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_11_12 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_11_12 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_11_12 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_11_12 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_11_12 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_12_1" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_12_1 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_12_1 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_12_1 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_12_1 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_12_1 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_12_1 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_12_1 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_12_1 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_12_1 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_1_2" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_1_2 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_1_2 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_1_2 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_1_2 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_1_2 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_1_2 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_1_2 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_1_2 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_1_2 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_2_3" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_2_3 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_2_3 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_2_3 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_2_3 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_2_3 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_2_3 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_2_3 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_2_3 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_2_3 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_3_4" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_3_4 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_3_4 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_3_4 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_3_4 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_3_4 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_3_4 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_3_4 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_3_4 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_3_4 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_4_5" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_4_5 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>

                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_4_5 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_4_5 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_4_5 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_4_5 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_4_5 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_4_5 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_4_5 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_4_5 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_5_6" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_5_6 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_5_6 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_5_6 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_5_6 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_5_6 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_5_6 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_5_6 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_5_6 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_indoors->weather_condition_5_6 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>




                <!-- outdore -->


                <!-- //outDoor -->
                <div clss="row " style="background-color: #fff; padding:5px;">
                    <div class="col-12">
                        <center>
                            <a class="btn btn-primary add-record-out" data-added="0"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Row</a>
                        </center>
                    </div>
                </div>



                <div clss="row " style="background-color: #fff; padding:5px;
                    overflow-x:auto;
                    overflow-y:none;
                    max-height:80vh">

                    <table class="table table-bordered" id="tbl_posts_out">
                        <thead class="ther">
                            <tr>
                                <th rowspan="2">#Row NO</th>
                                <th rowspan="2">Mosquito species</th>
                                <th colspan="12">Outdoor</th>
                                <th rowspan="2">Total</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>6-7pm</th>
                                <th>7-8pm</th>
                                <th>8-9pm</th>
                                <th>9-10pm</th>
                                <th>10-11pm</th>
                                <th>11-12pm</th>
                                <th>12-1am</th>
                                <th>1-2am</th>
                                <th>2-3am</th>
                                <th>3-4am</th>
                                <th>4-5am</th>
                                <th>5-6am</th>
                            </tr>
                        </thead>

                        <tbody id="tbl_posts_body_out">

                            <?php $ie = 0; ?>
                            @foreach ($ento4_list->ento_04_mosq_news as $data)
                            <?php
                            if ($data->formtype == 'outdoor') {
                                $ie++; ?>
                                <input type="hidden" name="id" value="{{ $data->id }}" class="form-control">

                                <tr id="rec-1">
                                    <td id="sample_rowonre"><span class="sn">{{$ie}}</span>.</td>
                                    <td>
                                        <select name="mosq_spec_stat_out[]" class="form-control">
                                            <option value="{{ $data->mosq_spec_stat}}" {{ $data->mosq_spec_stat != null ? 'selected' : '' }}>
                                                {{ $data->mosq_spec_stat != null ? $data->mosq_spec_stat : 'Select mosquito species' }}
                                            </option>
                                            <option value="Aedes (aedimorphus) jamesi">Aedes (aedimorphus) jamesi </option>
                                            <option value="Aedes (aedimorphus) pallidostriatus  pallidostriatus">Aedes (aedimorphus) pallidostriatus pallidostriatus </option>
                                            <option value="Aedes (aedimorphus) pipersalatus">Aedes (aedimorphus) pipersalatus </option>
                                            <option value="Aedes (aedimorphus) vexans">Aedes (aedimorphus) vexans </option>
                                            <option value="Aedes (aedimorphus) vittatus">Aedes (aedimorphus) vittatus </option>
                                            <option value="Aedes (mucidus) scatophagoides">Aedes (mucidus) scatophagoides </option>
                                            <option value="Aedes (stegomyia) aegypti">Aedes (stegomyia) aegypti </option>
                                            <option value="Aedes (stegomyia) albopictus">Aedes (stegomyia) albopictus </option>
                                            <option value="Anopheles (anopheles) barbirostris">Anopheles (anopheles) barbirostris </option>
                                            <option value="Anopheles (anopheles) nigerrimus">Anopheles (anopheles) nigerrimus </option>
                                            <option value="Anopheles (anopheles) peditaeniatus">Anopheles (anopheles) peditaeniatus </option>
                                            <option value="Anopheles (cellia) aconitus">Anopheles (cellia) aconitus </option>
                                            <option value="Anopheles (cellia) annularis">Anopheles (cellia) annularis </option>
                                            <option value="Anopheles (cellia) culicifacies">Anopheles (cellia) culicifacies </option>
                                            <option value="Anopheles (cellia) elegans">Anopheles (cellia) elegans </option>
                                            <option value="Anopheles (cellia) jamesii">Anopheles (cellia) jamesii </option>
                                            <option value="Anopheles (cellia) karwari">Anopheles (cellia) karwari </option>
                                            <option value="Anopheles (cellia) maculatus">Anopheles (cellia) maculatus </option>
                                            <option value="Anopheles (cellia) pallidus">Anopheles (cellia) pallidus </option>
                                            <option value="Anopheles (cellia) stephensi">Anopheles (cellia) stephensi </option>
                                            <option value="Anopheles (cellia) subpictus">Anopheles (cellia) subpictus </option>
                                            <option value="Anopheles (cellia) tessellatus">Anopheles (cellia) tessellatus </option>
                                            <option value="Anopheles (cellia) vagus">Anopheles (cellia) vagus </option>
                                            <option value="Anopheles (cellia) varuna">Anopheles (cellia) varuna </option>
                                            <option value="Armigeres (armigeres) subalbatus">Armigeres (armigeres) subalbatus </option>
                                            <option value="Coquillettidia (coquillettidia) crassipes">Coquillettidia (coquillettidia) crassipes </option>
                                            <option value="Culex (culex) bitaeniorhynchus ">Culex (culex) bitaeniorhynchus </option>
                                            <option value="Culex (culex) fuscocephala">Culex (culex) fuscocephala </option>
                                            <option value="Culex (culex) gelidus">Culex (culex) gelidus </option>
                                            <option value="Culex (culex) hutchinsoni">Culex (culex) hutchinsoni </option>
                                            <option value="Culex (culex) infula">Culex (culex) infula </option>
                                            <option value="Culex (culex) jacksoni">Culex (culex) jacksoni </option>
                                            <option value="Culex (culex) mimulus">Culex (culex) mimulus </option>
                                            <option value="Culex (culex) pseudovishnui">Culex (culex) pseudovishnui </option>
                                            <option value="Culex (culex) quinquefasciatus">Culex (culex) quinquefasciatus </option>
                                            <option value="Culex (culex) sinensis">Culex (culex) sinensis </option>
                                            <option value="Culex (culex) sitiens">Culex (culex) sitiens </option>
                                            <option value="Culex (culex) tritaeniorhynchus">Culex (culex) tritaeniorhynchus </option>
                                            <option value="Culex (culex) vishnui">Culex (culex) vishnui </option>
                                            <option value="Culex (culex) whitmorei">Culex (culex) whitmorei </option>
                                            <option value="Culex (culiciomyia) nigropunctatus">Culex (culiciomyia) nigropunctatus </option>
                                            <option value="Culex (culiciomyia) pallidothorax">Culex (culiciomyia) pallidothorax </option>
                                            <option value="Culex (eumelnomyia) brevipalpis">Culex (eumelnomyia) brevipalpis </option>
                                            <option value="Culex (lophoceraomyia) bicornutus">Culex (lophoceraomyia) bicornutus </option>
                                            <option value="Culex (lophoceraomyia) infantulus">Culex (lophoceraomyia) infantulus </option>
                                            <option value="Culex (lophoceraomyia) minutissimus ">Culex (lophoceraomyia) minutissimus </option>
                                            <option value="Lutzia (lutzia) fuscanus">Lutzia (lutzia) fuscanus </option>
                                            <option value="Lutzia (lutzia) halifaxii">Lutzia (lutzia) halifaxii </option>
                                            <option value="Mansonia (mansonioides) annulifera">Mansonia (mansonioides) annulifera </option>
                                            <option value="Mansonia (mansonioides) indiana">Mansonia (mansonioides) indiana </option>
                                            <option value="Mansonia (mansonioides) uniformis">Mansonia (mansonioides) uniformis </option>
                                            <option value="Mosquito Species">Mosquito Species </option>
                                            <option value="Other">Other </option>
                                        </select>
                                    </td>
                                    <td><input type="Number" min="0" class="form-control" name="number_out[]" required="" style="width: 50px;" value="{{ $data->number != null ? $data->number : '0' }}" onchange="Totalnumber_out()" onkeyup="Totalnumber_out()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number7_8_out[]" required="" style="width: 50px;" value="{{ $data->number7_8 != null ? $data->number7_8 : '0' }}" onchange="Totalnumber78_out()" onkeyup="Totalnumber78_out()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number8_9_out[]" required="" style="width: 50px;" value="{{ $data->number8_9 != null ? $data->number8_9 : '0' }}" onchange="Totalnumber89_out()" onkeyup="Totalnumber89_out()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number9_10_out[]" required="" style="width: 50px;" value="{{ $data->number9_10 != null ? $data->number9_10 : '0' }}" onchange="Totalnumber910_out()" onkeyup="Totalnumber910_out()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number10_11_out[]" required="" style="width: 50px;" value="{{ $data->number10_11 != null ? $data->number10_11 : '0' }}" onchange="Totalnumber1011_out()" onkeyup="Totalnumber1011_out()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number11_12_out[]" required="" style="width: 50px;" value="{{ $data->number11_12 != null ? $data->number11_12 : '0' }}" onchange="Totalnumber1112_out()" onkeyup="Totalnumber1112_out()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number12_1_out[]" required="" style="width: 50px;" value="{{ $data->number12_1 != null ? $data->number12_1 : '0' }}" onchange="Totalnumber121_out()" onkeyup="Totalnumber121()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number1_2_out[]" required="" style="width: 50px;" value="{{ $data->number1_2 != null ? $data->number1_2 : '0' }}" onchange="Totalnumber12_out()" onkeyup="Totalnumber12_out()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number2_3_out[]" required="" style="width: 50px;" value="{{ $data->number2_3 != null ? $data->number2_3 : '0' }}" onchange="Totalnumber23_out()" onkeyup="Totalnumber23_out()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number3_4_out[]" required="" style="width: 50px;" value="{{ $data->number3_4 != null ? $data->number3_4 : '0' }}" onchange="Totalnumber34_out()" onkeyup="Totalnumber34_out()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number4_5_out[]" required="" style="width: 50px;" value="{{ $data->number4_5 != null ? $data->number4_5 : '0' }}" onchange="Totalnumber45_out()" onkeyup="Totalnumber45_out()"></td>
                                    <td><input type="Number" min="0" class="form-control" name="number5_6_out[]" required="" style="width: 50px;" value="{{ $data->number5_6 != null ? $data->number5_6 : '0' }}" onchange="Totalnumber56_out()" onkeyup="Totalnumber56_out()"></td>

                                    <td><input type="text" min="0" class="form-control" name="total_out[]" required="" style="width: 50px;" value="0"></td>

                                    <td>

                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_ento4_mosqdata') }}/{{$data->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> <i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                <?php }; ?>
                                @endforeach
                                </tr>


                        </tbody>


                        <tfoot>
                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> Total</td>
                                <td><input type="number" min="0" disabled name="Totalnumber_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled name="Totalnumber78_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled name="Totalnumber89_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled name="Totalnumber910_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled name="Totalnumber1011_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled name="Totalnumber1112_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled name="Totalnumber121_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled name="Totalnumber12_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled name="Totalnumber23_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled name="Totalnumber34_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled name="Totalnumber45_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" disabled name="Totalnumber56_t_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="Number" min="0" class="form-control" name="Totaloftotal_out" required style="width: 50px;" value="0"></td>
                            </tr>


                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> No of baits</td>
                                <td><input type="number" min="0" name="noofbaits_out" value="{{ $ento4_list->ento_04_outdoors->noofbaits != null ? $ento4_list->ento_04_outdoors->noofbaits : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs7_8_out" value="{{ $ento4_list->ento_04_outdoors->noofbairs7_8 != null ? $ento4_list->ento_04_outdoors->noofbairs7_8 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs8_9_out" value="{{ $ento4_list->ento_04_outdoors->noofbairs8_9 != null ? $ento4_list->ento_04_outdoors->noofbairs8_9 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs9_10_out" value="{{ $ento4_list->ento_04_outdoors->noofbairs9_10 != null ? $ento4_list->ento_04_outdoors->noofbairs9_10 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs10_11_out" value="{{ $ento4_list->ento_04_outdoors->noofbairs10_11 != null ? $ento4_list->ento_04_outdoors->noofbairs10_11 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs11_12_out" value="{{ $ento4_list->ento_04_outdoors->noofbairs11_12 != null ? $ento4_list->ento_04_outdoors->noofbairs11_12 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs12_1_out" value="{{ $ento4_list->ento_04_outdoors->noofbairs12_1 != null ? $ento4_list->ento_04_outdoors->noofbairs12_1 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs1_2_out" value="{{ $ento4_list->ento_04_outdoors->noofbairs1_2 != null ? $ento4_list->ento_04_outdoors->noofbairs1_2 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs2_3_out" value="{{ $ento4_list->ento_04_outdoors->noofbairs2_3 != null ? $ento4_list->ento_04_outdoors->noofbairs2_3 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs3_4_out" value="{{ $ento4_list->ento_04_outdoors->noofbairs3_4 != null ? $ento4_list->ento_04_outdoors->noofbairs3_4 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs4_5_out" value="{{ $ento4_list->ento_04_outdoors->noofbairs4_5 != null ? $ento4_list->ento_04_outdoors->noofbairs4_5 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" name="noofbairs5_6_out" value="{{ $ento4_list->ento_04_outdoors->noofbairs5_6 != null ? $ento4_list->ento_04_outdoors->noofbairs5_6 : '0' }}" class="form-control" style="width: 50px;"></td>
                            </tr>

                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Temp (0c)</td>
                                <td><input type="number" min="0" step="0.01" name="temp6_7_out" value="{{ $ento4_list->ento_04_outdoors->temp6_7 != null ? $ento4_list->ento_04_outdoors->temp6_7 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp7_8_out" value="{{ $ento4_list->ento_04_outdoors->temp7_8 != null ? $ento4_list->ento_04_outdoors->temp7_8 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp8_9_out" value="{{ $ento4_list->ento_04_outdoors->temp8_9 != null ? $ento4_list->ento_04_outdoors->temp8_9 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp9_10_out" value="{{ $ento4_list->ento_04_outdoors->temp9_10 != null ? $ento4_list->ento_04_outdoors->temp9_10 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp10_11_out" value="{{ $ento4_list->ento_04_outdoors->temp10_11 != null ? $ento4_list->ento_04_outdoors->temp10_11 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp11_12_out" value="{{ $ento4_list->ento_04_outdoors->temp11_12 != null ? $ento4_list->ento_04_outdoors->temp11_12 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp12_1_out" value="{{ $ento4_list->ento_04_outdoors->temp12_1 != null ? $ento4_list->ento_04_outdoors->temp12_1 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp1_2_out" value="{{ $ento4_list->ento_04_outdoors->temp1_2 != null ? $ento4_list->ento_04_outdoors->temp1_2 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp2_3_out" value="{{ $ento4_list->ento_04_outdoors->temp2_3 != null ? $ento4_list->ento_04_outdoors->temp2_3 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp3_4_out" value="{{ $ento4_list->ento_04_outdoors->temp3_4 != null ? $ento4_list->ento_04_outdoors->temp3_4 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp4_5_out" value="{{ $ento4_list->ento_04_outdoors->temp4_5 != null ? $ento4_list->ento_04_outdoors->temp4_5 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp5_6_out" value="{{ $ento4_list->ento_04_outdoors->temp5_6 != null ? $ento4_list->ento_04_outdoors->temp5_6 : '0' }}" class="form-control" style="width: 50px;"></td>
                            <tr>

                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Rh(%)</td>
                                <td><input type="number" min="0" step="0.01" name="RH6_7_out" value="{{ $ento4_list->ento_04_outdoors->RH6_7 != null ? $ento4_list->ento_04_outdoors->RH6_7 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH7_8_out" value="{{ $ento4_list->ento_04_outdoors->RH7_8 != null ? $ento4_list->ento_04_outdoors->RH7_8 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH8_9_out" value="{{ $ento4_list->ento_04_outdoors->RH8_9 != null ? $ento4_list->ento_04_outdoors->RH8_9 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH9_10_out" value="{{ $ento4_list->ento_04_outdoors->RH9_10 != null ? $ento4_list->ento_04_outdoors->RH9_10 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH10_11_out" value="{{ $ento4_list->ento_04_outdoors->RH10_11 != null ? $ento4_list->ento_04_outdoors->RH10_11 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH11_12_out" value="{{ $ento4_list->ento_04_outdoors->RH11_12 != null ? $ento4_list->ento_04_outdoors->RH11_12 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH12_1_out" value="{{ $ento4_list->ento_04_outdoors->RH12_1 != null ? $ento4_list->ento_04_outdoors->RH12_1 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH1_2_out" value="{{ $ento4_list->ento_04_outdoors->RH1_2 != null ? $ento4_list->ento_04_outdoors->RH1_2 : '0' }}" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH2_3_out" value="{{ $ento4_list->ento_04_outdoors->RH2_3 != null ? $ento4_list->ento_04_outdoors->RH2_3 : '0' }}" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH3_4_out" value="{{ $ento4_list->ento_04_outdoors->RH3_4 != null ? $ento4_list->ento_04_outdoors->RH3_4 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH4_5_out" value="{{ $ento4_list->ento_04_outdoors->RH4_5 != null ? $ento4_list->ento_04_outdoors->RH4_5 : '0' }}" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH5_6_out" value="{{ $ento4_list->ento_04_outdoors->RH5_6 != null ? $ento4_list->ento_04_outdoors->RH5_6 : '0' }}" class="form-control" style="width: 50px;"></td>
                            </tr>


                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Weather Condition</td>
                                <td>
                                    <select id="weather" name="weather_condition_6_7_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_6_7 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_6_7 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_6_7 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_6_7 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_6_7 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_6_7 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_6_7 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_6_7 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_6_7 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_7_8_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_7_8 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_7_8 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_7_8 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_7_8 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_7_8 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_7_8 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_7_8 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_7_8 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_7_8 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_8_9_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_8_9 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_8_9 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_8_9 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_8_9 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_8_9 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_8_9 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_8_9 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_8_9 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_8_9 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_9_10_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_9_10 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_9_10 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_9_10 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_9_10 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_9_10 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_9_10 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_9_10 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_9_10 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_9_10 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>



                                <td>
                                    <select id="weather" name="weather_condition_10_11_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_10_11 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_10_11 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_10_11 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_10_11 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_10_11 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_10_11 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_10_11 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_10_11 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_10_11 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_11_12_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_11_12 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_11_12 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_11_12 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_11_12 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_11_12 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_11_12 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_11_12 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_11_12 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_11_12 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_12_1_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_12_1 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_12_1 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_12_1 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_12_1 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_12_1 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_12_1 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_12_1 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_12_1 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_12_1 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_1_2_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_1_2 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_1_2 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_1_2 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_1_2 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_1_2 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_1_2 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_1_2 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_1_2 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_1_2 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_2_3_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_2_3 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_2_3 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_2_3 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_2_3 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_2_3 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_2_3 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_2_3 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_2_3 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_2_3 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_3_4_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_3_4 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_3_4 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_3_4 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_3_4 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_3_4 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_3_4 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_3_4 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_3_4 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_3_4 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_4_5_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_4_5 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_4_5 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_4_5 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_4_5 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_4_5 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_4_5 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_4_5 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_4_5 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_4_5 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_5_6_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_5_6 == 'Cloudy' ? 'selected' : '' }} value="Cloudy">Cloudy</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_5_6 == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_5_6 == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_5_6 == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_5_6 == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_5_6 == 'Windy(heavy)(' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_5_6 == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_5_6 == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
                                        <option {{ $ento4_list->ento_04_outdoors->weather_condition_5_6 == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                                    </select>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>















                <div class="box-footer">
                    <center>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </center>
                </div>

            </form>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->





<div style="display:none;">
    <table id="sample_table">
        <tbody>
            <tr id="">
                <td id="sample_rowonre"><span class="sn">1</span>.</td>
                <td>
                    <select name="mosq_spec_stat[]" class="form-control">
                        <option value="">Select</option>
                        <option value="Aedes (aedimorphus) jamesi">Aedes (aedimorphus) jamesi </option>
                        <option value="Aedes (aedimorphus) pallidostriatus  pallidostriatus">Aedes (aedimorphus) pallidostriatus pallidostriatus </option>
                        <option value="Aedes (aedimorphus) pipersalatus">Aedes (aedimorphus) pipersalatus </option>
                        <option value="Aedes (aedimorphus) vexans">Aedes (aedimorphus) vexans </option>
                        <option value="Aedes (aedimorphus) vittatus">Aedes (aedimorphus) vittatus </option>
                        <option value="Aedes (mucidus) scatophagoides">Aedes (mucidus) scatophagoides </option>
                        <option value="Aedes (stegomyia) aegypti">Aedes (stegomyia) aegypti </option>
                        <option value="Aedes (stegomyia) albopictus">Aedes (stegomyia) albopictus </option>
                        <option value="Anopheles (anopheles) barbirostris">Anopheles (anopheles) barbirostris </option>
                        <option value="Anopheles (anopheles) nigerrimus">Anopheles (anopheles) nigerrimus </option>
                        <option value="Anopheles (anopheles) peditaeniatus">Anopheles (anopheles) peditaeniatus </option>
                        <option value="Anopheles (cellia) aconitus">Anopheles (cellia) aconitus </option>
                        <option value="Anopheles (cellia) annularis">Anopheles (cellia) annularis </option>
                        <option value="Anopheles (cellia) culicifacies">Anopheles (cellia) culicifacies </option>
                        <option value="Anopheles (cellia) elegans">Anopheles (cellia) elegans </option>
                        <option value="Anopheles (cellia) jamesii">Anopheles (cellia) jamesii </option>
                        <option value="Anopheles (cellia) karwari">Anopheles (cellia) karwari </option>
                        <option value="Anopheles (cellia) maculatus">Anopheles (cellia) maculatus </option>
                        <option value="Anopheles (cellia) pallidus">Anopheles (cellia) pallidus </option>
                        <option value="Anopheles (cellia) stephensi">Anopheles (cellia) stephensi </option>
                        <option value="Anopheles (cellia) subpictus">Anopheles (cellia) subpictus </option>
                        <option value="Anopheles (cellia) tessellatus">Anopheles (cellia) tessellatus </option>
                        <option value="Anopheles (cellia) vagus">Anopheles (cellia) vagus </option>
                        <option value="Anopheles (cellia) varuna">Anopheles (cellia) varuna </option>
                        <option value="Armigeres (armigeres) subalbatus">Armigeres (armigeres) subalbatus </option>
                        <option value="Coquillettidia (coquillettidia) crassipes">Coquillettidia (coquillettidia) crassipes </option>
                        <option value="Culex (culex) bitaeniorhynchus ">Culex (culex) bitaeniorhynchus </option>
                        <option value="Culex (culex) fuscocephala">Culex (culex) fuscocephala </option>
                        <option value="Culex (culex) gelidus">Culex (culex) gelidus </option>
                        <option value="Culex (culex) hutchinsoni">Culex (culex) hutchinsoni </option>
                        <option value="Culex (culex) infula">Culex (culex) infula </option>
                        <option value="Culex (culex) jacksoni">Culex (culex) jacksoni </option>
                        <option value="Culex (culex) mimulus">Culex (culex) mimulus </option>
                        <option value="Culex (culex) pseudovishnui">Culex (culex) pseudovishnui </option>
                        <option value="Culex (culex) quinquefasciatus">Culex (culex) quinquefasciatus </option>
                        <option value="Culex (culex) sinensis">Culex (culex) sinensis </option>
                        <option value="Culex (culex) sitiens">Culex (culex) sitiens </option>
                        <option value="Culex (culex) tritaeniorhynchus">Culex (culex) tritaeniorhynchus </option>
                        <option value="Culex (culex) vishnui">Culex (culex) vishnui </option>
                        <option value="Culex (culex) whitmorei">Culex (culex) whitmorei </option>
                        <option value="Culex (culiciomyia) nigropunctatus">Culex (culiciomyia) nigropunctatus </option>
                        <option value="Culex (culiciomyia) pallidothorax">Culex (culiciomyia) pallidothorax </option>
                        <option value="Culex (eumelnomyia) brevipalpis">Culex (eumelnomyia) brevipalpis </option>
                        <option value="Culex (lophoceraomyia) bicornutus">Culex (lophoceraomyia) bicornutus </option>
                        <option value="Culex (lophoceraomyia) infantulus">Culex (lophoceraomyia) infantulus </option>
                        <option value="Culex (lophoceraomyia) minutissimus ">Culex (lophoceraomyia) minutissimus </option>
                        <option value="Lutzia (lutzia) fuscanus">Lutzia (lutzia) fuscanus </option>
                        <option value="Lutzia (lutzia) halifaxii">Lutzia (lutzia) halifaxii </option>
                        <option value="Mansonia (mansonioides) annulifera">Mansonia (mansonioides) annulifera </option>
                        <option value="Mansonia (mansonioides) indiana">Mansonia (mansonioides) indiana </option>
                        <option value="Mansonia (mansonioides) uniformis">Mansonia (mansonioides) uniformis </option>
                        <option value="Mosquito Species">Mosquito Species </option>
                        <option value="Other">Other </option>
                    </select>
                </td>
                <td><input type="Number" min="0"  class="form-control" name="number[]" required="" style="width: 50px;" value="0" onchange="Totalnumber()" onkeyup="Totalnumber()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number7_8[]" required="" style="width: 50px;" value="0" onchange="Totalnumber78()" onkeyup="Totalnumber78()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number8_9[]" required="" style="width: 50px;" value="0" onchange="Totalnumber89()" onkeyup="Totalnumber89()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number9_10[]" required="" style="width: 50px;" value="0" onchange="Totalnumber910()" onkeyup="Totalnumber910()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number10_11[]" required="" style="width: 50px;" value="0" onchange="Totalnumber1011()" onkeyup="Totalnumber1011()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number11_12[]" required="" style="width: 50px;" value="0" onchange="Totalnumber1112()" onkeyup="Totalnumber1112()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number12_1[]" required="" style="width: 50px;" value="0" onchange="Totalnumber121()" onkeyup="Totalnumber121()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number1_2[]" required="" style="width: 50px;" value="0" onchange="Totalnumber12()" onkeyup="Totalnumber12()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number2_3[]" required="" style="width: 50px;" value="0" onchange="Totalnumber23()" onkeyup="Totalnumber23()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number3_4[]" required="" style="width: 50px;" value="0" onchange="Totalnumber34()" onkeyup="Totalnumber34()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number4_5[]" required="" style="width: 50px;" value="0" onchange="Totalnumber45()" onkeyup="Totalnumber45()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number5_6[]" required="" style="width: 50px;" value="0" onchange="Totalnumber56()" onkeyup="Totalnumber56()"></td>

                <td><input type="Number" class="form-control" name="total[]" min="0" value="0" required="" style="width: 50px;" value="0"></td>

                <td>
                    <a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>




        </tbody>
    </table>
</div>




<!-- outdoor -->


<div style="display:none;">
    <table id="sample_table_out">
        <tbody>
            <tr id="">
                <td id="sample_rowonre_out"><span class="sn_out">1</span>.</td>
                <td>
                    <select name="mosq_spec_stat_out[]" class="form-control">
                        <option value="">Select</option>
                        <option value="Aedes (aedimorphus) jamesi">Aedes (aedimorphus) jamesi </option>
                        <option value="Aedes (aedimorphus) pallidostriatus  pallidostriatus">Aedes (aedimorphus) pallidostriatus pallidostriatus </option>
                        <option value="Aedes (aedimorphus) pipersalatus">Aedes (aedimorphus) pipersalatus </option>
                        <option value="Aedes (aedimorphus) vexans">Aedes (aedimorphus) vexans </option>
                        <option value="Aedes (aedimorphus) vittatus">Aedes (aedimorphus) vittatus </option>
                        <option value="Aedes (mucidus) scatophagoides">Aedes (mucidus) scatophagoides </option>
                        <option value="Aedes (stegomyia) aegypti">Aedes (stegomyia) aegypti </option>
                        <option value="Aedes (stegomyia) albopictus">Aedes (stegomyia) albopictus </option>
                        <option value="Anopheles (anopheles) barbirostris">Anopheles (anopheles) barbirostris </option>
                        <option value="Anopheles (anopheles) nigerrimus">Anopheles (anopheles) nigerrimus </option>
                        <option value="Anopheles (anopheles) peditaeniatus">Anopheles (anopheles) peditaeniatus </option>
                        <option value="Anopheles (cellia) aconitus">Anopheles (cellia) aconitus </option>
                        <option value="Anopheles (cellia) annularis">Anopheles (cellia) annularis </option>
                        <option value="Anopheles (cellia) culicifacies">Anopheles (cellia) culicifacies </option>
                        <option value="Anopheles (cellia) elegans">Anopheles (cellia) elegans </option>
                        <option value="Anopheles (cellia) jamesii">Anopheles (cellia) jamesii </option>
                        <option value="Anopheles (cellia) karwari">Anopheles (cellia) karwari </option>
                        <option value="Anopheles (cellia) maculatus">Anopheles (cellia) maculatus </option>
                        <option value="Anopheles (cellia) pallidus">Anopheles (cellia) pallidus </option>
                        <option value="Anopheles (cellia) stephensi">Anopheles (cellia) stephensi </option>
                        <option value="Anopheles (cellia) subpictus">Anopheles (cellia) subpictus </option>
                        <option value="Anopheles (cellia) tessellatus">Anopheles (cellia) tessellatus </option>
                        <option value="Anopheles (cellia) vagus">Anopheles (cellia) vagus </option>
                        <option value="Anopheles (cellia) varuna">Anopheles (cellia) varuna </option>
                        <option value="Armigeres (armigeres) subalbatus">Armigeres (armigeres) subalbatus </option>
                        <option value="Coquillettidia (coquillettidia) crassipes">Coquillettidia (coquillettidia) crassipes </option>
                        <option value="Culex (culex) bitaeniorhynchus ">Culex (culex) bitaeniorhynchus </option>
                        <option value="Culex (culex) fuscocephala">Culex (culex) fuscocephala </option>
                        <option value="Culex (culex) gelidus">Culex (culex) gelidus </option>
                        <option value="Culex (culex) hutchinsoni">Culex (culex) hutchinsoni </option>
                        <option value="Culex (culex) infula">Culex (culex) infula </option>
                        <option value="Culex (culex) jacksoni">Culex (culex) jacksoni </option>
                        <option value="Culex (culex) mimulus">Culex (culex) mimulus </option>
                        <option value="Culex (culex) pseudovishnui">Culex (culex) pseudovishnui </option>
                        <option value="Culex (culex) quinquefasciatus">Culex (culex) quinquefasciatus </option>
                        <option value="Culex (culex) sinensis">Culex (culex) sinensis </option>
                        <option value="Culex (culex) sitiens">Culex (culex) sitiens </option>
                        <option value="Culex (culex) tritaeniorhynchus">Culex (culex) tritaeniorhynchus </option>
                        <option value="Culex (culex) vishnui">Culex (culex) vishnui </option>
                        <option value="Culex (culex) whitmorei">Culex (culex) whitmorei </option>
                        <option value="Culex (culiciomyia) nigropunctatus">Culex (culiciomyia) nigropunctatus </option>
                        <option value="Culex (culiciomyia) pallidothorax">Culex (culiciomyia) pallidothorax </option>
                        <option value="Culex (eumelnomyia) brevipalpis">Culex (eumelnomyia) brevipalpis </option>
                        <option value="Culex (lophoceraomyia) bicornutus">Culex (lophoceraomyia) bicornutus </option>
                        <option value="Culex (lophoceraomyia) infantulus">Culex (lophoceraomyia) infantulus </option>
                        <option value="Culex (lophoceraomyia) minutissimus ">Culex (lophoceraomyia) minutissimus </option>
                        <option value="Lutzia (lutzia) fuscanus">Lutzia (lutzia) fuscanus </option>
                        <option value="Lutzia (lutzia) halifaxii">Lutzia (lutzia) halifaxii </option>
                        <option value="Mansonia (mansonioides) annulifera">Mansonia (mansonioides) annulifera </option>
                        <option value="Mansonia (mansonioides) indiana">Mansonia (mansonioides) indiana </option>
                        <option value="Mansonia (mansonioides) uniformis">Mansonia (mansonioides) uniformis </option>
                        <option value="Mosquito Species">Mosquito Species </option>
                        <option value="Other">Other </option>
                    </select>
                </td>
                <td><input type="Number" min="0"  class="form-control" name="number_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber_out()" onkeyup="Totalnumber_out()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number7_8_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber78_out()" onkeyup="Totalnumber78_out()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number8_9_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber89_out()" onkeyup="Totalnumber89_out()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number9_10_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber910_out()" onkeyup="Totalnumber910_out()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number10_11_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber1011_out()" onkeyup="Totalnumber1011_out()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number11_12_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber1112_out()" onkeyup="Totalnumber1112_out()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number12_1_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber121_out()" onkeyup="Totalnumber121_out()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number1_2_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber12_out()" onkeyup="Totalnumber12_out()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number2_3_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber23_out()" onkeyup="Totalnumber23_out()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number3_4_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber34_out()" onkeyup="Totalnumber34_out()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number4_5_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber45_out()" onkeyup="Totalnumber45_out()"></td>
                <td><input type="Number" min="0"  class="form-control" name="number5_6_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber56_out()" onkeyup="Totalnumber56_out()"></td>

                <td><input type="Number" class="form-control" name="total_out[]" min="0" required style="width: 50px;" value="0"></td>

                <td>
                    <a class="btn btn-xs delete-record_out" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>




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



<script type="text/javascript">
    $(document).ready(function() {

        var index2 = <?php echo $i ?>;

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

            $('#tbl_posts_body #sample_rowonre').each(function(index = 0) {

                $(this).find('span.sn').html(index + 1);
            });

        });
        jQuery(document).delegate('a.delete-record', 'click', function(e) {
            e.preventDefault();
            var didConfirm = confirm("Are you sure You want to delete");
            if (didConfirm == true) {
                var id = jQuery(this).attr('data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#rec-' + id).remove();

                jQuery('#rec-' + id).remove();
                index2 = index2 - 1;
                //       regnerate index number on table
                $('#tbl_posts_body #sample_rowonre').each(function(index = 0) {

                    $(this).find('span.sn').html(index + 1);
                });

                return true;
            } else {
                return false;
            }
        });




        var index3 = <?php echo $ie ?>;
        jQuery(document).delegate('a.add-record-out', 'click', function(e) {

            e.preventDefault();
            var content = jQuery('#sample_table_out tr'),
                size = jQuery('#tbl_posts_out >tbody >tr').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'rec2-' + size);

            element.find('.delete-record_out').attr('data-id', size);
            element.appendTo('#tbl_posts_body_out');
            index3 = index3 + 1;
            element.find('.sn_out').html(index3);
        });
        jQuery(document).delegate('a.delete-record_out', 'click', function(e) {
            e.preventDefault();
            var didConfirm = confirm("Are you sure You want to delete");
            if (didConfirm == true) {
                var id = jQuery(this).attr('data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#rec2-' + id).remove();

                jQuery('#rec2-' + id).remove();
                index3 = index3 - 1;
                //       regnerate index number on table
                $('#tbl_posts_body_out #sample_rowonre_out').each(function(index = 0) {

                    $(this).find('span.sn').html(index + 1);
                });

                return true;
            } else {
                return false;
            }
        });




















        mosquitoCalculation('total_cx_quin_mosq', 'total_traps', 'mosquito_density_per_trap');

    });





    function Totalnumber() {
        var inps = document.querySelectorAll('input[name="number[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }

        document.getElementsByName("Totalnumber_t")[0].value = totals;
    }


    function Totalnumber78() {
        var inps = document.querySelectorAll('input[name="number7_8[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }
        document.getElementsByName("Totalnumber78_t")[0].value = totals;
    }


    function Totalnumber89() {
        var inps = document.querySelectorAll('input[name="number8_9[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }

        document.getElementsByName("Totalnumber89_t")[0].value = totals;
    }


    function Totalnumber910() {
        var inps = document.querySelectorAll('input[name="number9_10[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }
        document.getElementsByName("Totalnumber910_t")[0].value = totals;
    }


    function Totalnumber1011() {
        var inps = document.querySelectorAll('input[name="number10_11[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }
        document.getElementsByName("Totalnumber1011_t")[0].value = totals;
    }


    function Totalnumber1112() {
        var inps = document.querySelectorAll('input[name="number11_12[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }
        document.getElementsByName("Totalnumber1112_t")[0].value = totals;
    }




    function Totalnumber121() {
        var inps = document.querySelectorAll('input[name="number12_1[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }
        document.getElementsByName("Totalnumber121_t")[0].value = totals;
    }



    function Totalnumber12() {
        var inps = document.querySelectorAll('input[name="number1_2[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }
        document.getElementsByName("Totalnumber12_t")[0].value = totals;
    }


    function Totalnumber23() {
        var inps = document.querySelectorAll('input[name="number2_3[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }
        document.getElementsByName("Totalnumber23_t")[0].value = totals;
    }

    function Totalnumber34() {
        var inps = document.querySelectorAll('input[name="number3_4[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }
        document.getElementsByName("Totalnumber34_t")[0].value = totals;
    }

    function Totalnumber45() {
        var inps = document.querySelectorAll('input[name="number4_5[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }
        document.getElementsByName("Totalnumber45_t")[0].value = totals;
    }

    function Totalnumber56() {
        var inps = document.querySelectorAll('input[name="number5_6[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12(i);
        }
        document.getElementsByName("Totalnumber56_t")[0].value = totals;



    }


    function get_total_calculate12(i) {
        var total = 0;
        console.log(i);

        var number = document.querySelectorAll('input[name="number[]"]');
        var total = total + parseInt(number[i].value);

        var number7_8 = document.querySelectorAll('input[name="number7_8[]"]');
        var total = total + parseInt(number7_8[i].value);

        var number8_9 = document.querySelectorAll('input[name="number8_9[]"]');
        var total = total + parseInt(number8_9[i].value);

        var number9_10 = document.querySelectorAll('input[name="number9_10[]"]');
        var total = total + parseInt(number9_10[i].value);

        var number10_11 = document.querySelectorAll('input[name="number10_11[]"]');
        var total = total + parseInt(number10_11[i].value);

        var number11_12 = document.querySelectorAll('input[name="number11_12[]"]');
        var total = total + parseInt(number11_12[i].value);

        var number12_1 = document.querySelectorAll('input[name="number12_1[]"]');
        var total = total + parseInt(number12_1[i].value);

        var number1_2 = document.querySelectorAll('input[name="number1_2[]"]');
        var total = total + parseInt(number1_2[i].value);

        var number2_3 = document.querySelectorAll('input[name="number2_3[]"]');
        var total = total + parseInt(number2_3[i].value);

        var number3_4 = document.querySelectorAll('input[name="number3_4[]"]');
        var total = total + parseInt(number3_4[i].value);

        var number4_5 = document.querySelectorAll('input[name="number4_5[]"]');
        var total = total + parseInt(number4_5[i].value);

        var number5_6 = document.querySelectorAll('input[name="number5_6[]"]');
        var total = total + parseInt(number5_6[i].value);


        document.getElementsByName("total[]")[i].value = total;

        TotalTotal()

    }




    function TotalTotal() {
        var inps = document.querySelectorAll('input[name="total[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);

        }
        document.getElementsByName("Totaloftotal")[0].value = totals;
    }






    //123egweyfdc whuef whbfewf

    function Totalnumber_out() {
        var inps = document.querySelectorAll('input[name="number_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber_t_out")[0].value = totals;
    }


    function Totalnumber78_out() {
        var inps = document.querySelectorAll('input[name="number7_8_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber78_t_out")[0].value = totals;
    }


    function Totalnumber89_out() {
        var inps = document.querySelectorAll('input[name="number8_9_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber89_t_out")[0].value = totals;
    }


    function Totalnumber910_out() {
        var inps = document.querySelectorAll('input[name="number9_10_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber910_t_out")[0].value = totals;
    }


    function Totalnumber1011_out() {
        var inps = document.querySelectorAll('input[name="number10_11_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber1011_t_out")[0].value = totals;
    }


    function Totalnumber1112_out() {
        var inps = document.querySelectorAll('input[name="number11_12_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber1112_t_out")[0].value = totals;
    }




    function Totalnumber121_out() {
        var inps = document.querySelectorAll('input[name="number12_1_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber121_t_out")[0].value = totals;
    }



    function Totalnumber12_out() {
        var inps = document.querySelectorAll('input[name="number1_2_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber12_t_out")[0].value = totals;
    }


    function Totalnumber23_out() {
        var inps = document.querySelectorAll('input[name="number2_3_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber23_t_out")[0].value = totals;
    }

    function Totalnumber34_out() {
        var inps = document.querySelectorAll('input[name="number3_4_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber34_t_out")[0].value = totals;
    }

    function Totalnumber45_out() {
        var inps = document.querySelectorAll('input[name="number4_5_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber45_t_out")[0].value = totals;
    }

    function Totalnumber56_out() {
        var inps = document.querySelectorAll('input[name="number5_6_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);
            get_total_calculate12_out(i);
        }
        document.getElementsByName("Totalnumber56_t_out")[0].value = totals;

    }




    function get_total_calculate12_out(i) {
        var total = 0;


        var number = document.querySelectorAll('input[name="number_out[]"]');
        var total = total + parseInt(number[i].value);

        var number7_8 = document.querySelectorAll('input[name="number7_8_out[]"]');
        var total = total + parseInt(number7_8[i].value);

        var number8_9 = document.querySelectorAll('input[name="number8_9_out[]"]');
        var total = total + parseInt(number8_9[i].value);

        var number9_10 = document.querySelectorAll('input[name="number9_10_out[]"]');
        var total = total + parseInt(number9_10[i].value);

        var number10_11 = document.querySelectorAll('input[name="number10_11_out[]"]');
        var total = total + parseInt(number10_11[i].value);

        var number11_12 = document.querySelectorAll('input[name="number11_12_out[]"]');
        var total = total + parseInt(number11_12[i].value);

        var number12_1 = document.querySelectorAll('input[name="number12_1_out[]"]');
        var total = total + parseInt(number12_1[i].value);

        var number1_2 = document.querySelectorAll('input[name="number1_2_out[]"]');
        var total = total + parseInt(number1_2[i].value);

        var number2_3 = document.querySelectorAll('input[name="number2_3_out[]"]');
        var total = total + parseInt(number2_3[i].value);

        var number3_4 = document.querySelectorAll('input[name="number3_4_out[]"]');
        var total = total + parseInt(number3_4[i].value);

        var number4_5 = document.querySelectorAll('input[name="number4_5_out[]"]');
        var total = total + parseInt(number4_5[i].value);

        var number5_6 = document.querySelectorAll('input[name="number5_6_out[]"]');
        var total = total + parseInt(number5_6[i].value);


        console.log(i);

        document.getElementsByName("total_out[]")[i].value = total;

        TotalTotal_out();

    }


    function TotalTotal_out() {
        var inps = document.querySelectorAll('input[name="total_out[]"]');
        var totals = 0;
        for (var i = 0; i < inps.length; i++) {
            totals = totals + parseInt(inps[i].value);

        }
        document.getElementsByName("Totaloftotal_out")[0].value = totals;
    }















    Totalnumber();
    Totalnumber78();
    Totalnumber89();
    Totalnumber910();
    Totalnumber1011();
    Totalnumber1112();
    Totalnumber121();
    Totalnumber12();
    Totalnumber23();
    Totalnumber56()
    Totalnumber34();
    Totalnumber45();



    Totalnumber_out();
    Totalnumber78_out();
    Totalnumber89_out();
    Totalnumber910_out();
    Totalnumber1011_out();
    Totalnumber1112_out();
    Totalnumber121_out();
    Totalnumber12_out();
    Totalnumber23_out();
    // Totalnumber5_out6()
    Totalnumber56_out()
    Totalnumber34_out();
    Totalnumber45_out();
    get_total_calculate12_out();
    get_total_calculate12();
</script>