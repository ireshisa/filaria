<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Human landing Night Collection<br>
          
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Entomological data</a></li>
            <li class="active">Human landing Night Collection</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form method="post" action="{{ url('/ento4_newsave') }}">
                {{ csrf_field() }}
                <div class="col-md-12">
                    @if (session()->has('message'))


                    @if (session()->has('id'))
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <Center><h3><i class="icon fa fa-check"></i> Your form ID is :- {{ session()->get('id') }}  </h3></Center>
                  </div>
                    @endif





                    @if (session()->get('message') == true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        Successfully save your data.
                    </div>
                    @endif
                    @if (session()->get('message') == false)
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
                        <div class="box-body" style="overflow: hidden !important;">
                            <div class="col-md-6">
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Form ID</label>
                                    <input type="text" name="formid" class="form-control" required>
                                </div> -->

                                <div class="form-group">
                                    <label for="exampleInputEmail1">District</label>
                                    <!-- <input type="text" name="district" class="form-control"> -->

                                    <select name="district" class="form-control"  onchange="getMoh(this.value)"  required="">
                                        <option value="">Select</option>
                                        @if ((Auth::user()->role !== 'ADMIN') & (Auth::user()->role !== 'AFC'))
                                        <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
                                        @else
                                        @foreach ($district_list as $dis)
                                        <option value="{{ $dis->district }}">{{ $dis->district }}</option>
                                        @endforeach
                                        @endif
                                    </select>


                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">MOH area</label>
                                    <input list="moh_list" name="moh" required class="form-control" autocomplete="off">
                                    <datalist id="moh_list">

                                    </datalist>
                                </div>

                        

                                <div class="form-group">
                                    <label for="exampleInputPassword1">PHM area </label>
                                    <input type="text" name="phi" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">GN division</label>
                                    <input type="text" name="gn_division" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Locality/ Address </label>
                                    <input type="text" name="locality" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1"> longitude</label>
                                    <input type="text" name="gps_long" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> latitude</label>
                                    <input type="text" name="gps_lat" class="form-control">
                                </div>

                              


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date </label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="date_of_collection" class="datepicker_v form-control pull-right">
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
                            <tr id="rec-1">
                                <td id="sample_rowonre"><span class="sn">1</span>.</td>
                                <td>
                                    <select name="mosq_spec_stat[]" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Aedes (aedimorphus) jamesi">Aedes (aedimorphus) jamesi </option>
                                        <option value="Aedes (aedimorphus) pallidostriatus  pallidostriatus">Aedes
                                            (aedimorphus) pallidostriatus pallidostriatus </option>
                                        <option value="Aedes (aedimorphus) pipersalatus">Aedes (aedimorphus)
                                            pipersalatus </option>
                                        <option value="Aedes (aedimorphus) vexans">Aedes (aedimorphus) vexans </option>
                                        <option value="Aedes (aedimorphus) vittatus">Aedes (aedimorphus) vittatus
                                        </option>
                                        <option value="Aedes (mucidus) scatophagoides">Aedes (mucidus) scatophagoides
                                        </option>
                                        <option value="Aedes (stegomyia) aegypti">Aedes (stegomyia) aegypti </option>
                                        <option value="Aedes (stegomyia) albopictus">Aedes (stegomyia) albopictus
                                        </option>
                                        <option value="Anopheles (anopheles) barbirostris">Anopheles (anopheles)
                                            barbirostris </option>
                                        <option value="Anopheles (anopheles) nigerrimus">Anopheles (anopheles)
                                            nigerrimus </option>
                                        <option value="Anopheles (anopheles) peditaeniatus">Anopheles (anopheles)
                                            peditaeniatus </option>
                                        <option value="Anopheles (cellia) aconitus">Anopheles (cellia) aconitus
                                        </option>
                                        <option value="Anopheles (cellia) annularis">Anopheles (cellia) annularis
                                        </option>
                                        <option value="Anopheles (cellia) culicifacies">Anopheles (cellia) culicifacies
                                        </option>
                                        <option value="Anopheles (cellia) elegans">Anopheles (cellia) elegans </option>
                                        <option value="Anopheles (cellia) jamesii">Anopheles (cellia) jamesii </option>
                                        <option value="Anopheles (cellia) karwari">Anopheles (cellia) karwari </option>
                                        <option value="Anopheles (cellia) maculatus">Anopheles (cellia) maculatus
                                        </option>
                                        <option value="Anopheles (cellia) pallidus">Anopheles (cellia) pallidus
                                        </option>
                                        <option value="Anopheles (cellia) stephensi">Anopheles (cellia) stephensi
                                        </option>
                                        <option value="Anopheles (cellia) subpictus">Anopheles (cellia) subpictus
                                        </option>
                                        <option value="Anopheles (cellia) tessellatus">Anopheles (cellia) tessellatus
                                        </option>
                                        <option value="Anopheles (cellia) vagus">Anopheles (cellia) vagus </option>
                                        <option value="Anopheles (cellia) varuna">Anopheles (cellia) varuna </option>
                                        <option value="Armigeres (armigeres) subalbatus">Armigeres (armigeres)
                                            subalbatus </option>
                                        <option value="Coquillettidia (coquillettidia) crassipes">Coquillettidia
                                            (coquillettidia) crassipes </option>
                                        <option value="Culex (culex) bitaeniorhynchus ">Culex (culex) bitaeniorhynchus
                                        </option>
                                        <option value="Culex (culex) fuscocephala">Culex (culex) fuscocephala </option>
                                        <option value="Culex (culex) gelidus">Culex (culex) gelidus </option>
                                        <option value="Culex (culex) hutchinsoni">Culex (culex) hutchinsoni </option>
                                        <option value="Culex (culex) infula">Culex (culex) infula </option>
                                        <option value="Culex (culex) jacksoni">Culex (culex) jacksoni </option>
                                        <option value="Culex (culex) mimulus">Culex (culex) mimulus </option>
                                        <option value="Culex (culex) pseudovishnui">Culex (culex) pseudovishnui
                                        </option>
                                        <option value="Culex (culex) quinquefasciatus">Culex (culex) quinquefasciatus
                                        </option>
                                        <option value="Culex (culex) sinensis">Culex (culex) sinensis </option>
                                        <option value="Culex (culex) sitiens">Culex (culex) sitiens </option>
                                        <option value="Culex (culex) tritaeniorhynchus">Culex (culex) tritaeniorhynchus
                                        </option>
                                        <option value="Culex (culex) vishnui">Culex (culex) vishnui </option>
                                        <option value="Culex (culex) whitmorei">Culex (culex) whitmorei </option>
                                        <option value="Culex (culiciomyia) nigropunctatus">Culex (culiciomyia)
                                            nigropunctatus </option>
                                        <option value="Culex (culiciomyia) pallidothorax">Culex (culiciomyia)
                                            pallidothorax </option>
                                        <option value="Culex (eumelnomyia) brevipalpis">Culex (eumelnomyia) brevipalpis
                                        </option>
                                        <option value="Culex (lophoceraomyia) bicornutus">Culex (lophoceraomyia)
                                            bicornutus </option>
                                        <option value="Culex (lophoceraomyia) infantulus">Culex (lophoceraomyia)
                                            infantulus </option>
                                        <option value="Culex (lophoceraomyia) minutissimus ">Culex (lophoceraomyia)
                                            minutissimus </option>
                                        <option value="Lutzia (lutzia) fuscanus">Lutzia (lutzia) fuscanus </option>
                                        <option value="Lutzia (lutzia) halifaxii">Lutzia (lutzia) halifaxii </option>
                                        <option value="Mansonia (mansonioides) annulifera">Mansonia (mansonioides)
                                            annulifera </option>
                                        <option value="Mansonia (mansonioides) indiana">Mansonia (mansonioides) indiana
                                        </option>
                                        <option value="Mansonia (mansonioides) uniformis">Mansonia (mansonioides)
                                            uniformis </option>
                                        <option value="Mosquito Species">Mosquito Species </option>
                                        <option value="Other">Other </option>
                                    </select>
                                </td>
                                <td><input type="Number" min="0" class="form-control" name="number[]" required="" style="width: 50px;" value="0" onchange="Totalnumber()" onkeyup="Totalnumber()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number7_8[]" required="" style="width: 50px;" value="0" onchange="Totalnumber78()" onkeyup="Totalnumber78()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number8_9[]" required="" style="width: 50px;" value="0" onchange="Totalnumber89()" onkeyup="Totalnumber89()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number9_10[]" required="" style="width: 50px;" value="0" onchange="Totalnumber910()" onkeyup="Totalnumber910()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number10_11[]" required="" style="width: 50px;" value="0" onchange="Totalnumber1011()" onkeyup="Totalnumber1011()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number11_12[]" required="" style="width: 50px;" value="0" onchange="Totalnumber1112()" onkeyup="Totalnumber1112()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number12_1[]" required="" style="width: 50px;" value="0" onchange="Totalnumber121()" onkeyup="Totalnumber121()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number1_2[]" required="" style="width: 50px;" value="0" onchange="Totalnumber12()" onkeyup="Totalnumber12()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number2_3[]" required="" style="width: 50px;" value="0" onchange="Totalnumber23()" onkeyup="Totalnumber23()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number3_4[]" required="" style="width: 50px;" value="0" onchange="Totalnumber34()" onkeyup="Totalnumber34()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number4_5[]" required="" style="width: 50px;" value="0" onchange="Totalnumber45()" onkeyup="Totalnumber45()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number5_6[]" required="" style="width: 50px;" value="0" onchange="Totalnumber56()" onkeyup="Totalnumber56()"></td>

                                <td><input type="Number" min="0" class="form-control" name="total[]" required="" style="width: 50px;" value="0"></td>

                                <td>
                                    <a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>

                            </tr>



                        </tbody>


                        <tfoot>
                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> Total</td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber78_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber89_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber910_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber1011_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber1112_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber121_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber12_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber23_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber34_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber45_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber56_t" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totaloftotal" disabled value="0" class="form-control" style="width: 50px;"></td>

                            </tr>


                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> No of baits</td>
                                <td><input type="number" min="0" step="1" name="noofbaits" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs7_8" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs8_9" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs9_10" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs10_11" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs11_12" value="0" class="form-control" style="width: 50px;"></td>

                                <td><input type="number" min="0" step="1" name="noofbairs12_1" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs1_2" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs2_3" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs3_4" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs4_5" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs5_6" value="0" class="form-control" style="width: 50px;"></td>
                            </tr>

                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Temp (0c)</td>
                                <td><input type="number" min="0" step="0.01" name="temp6_7" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp7_8" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp8_9" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp9_10" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp10_11" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp11_12" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp12_1" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp1_2" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp2_3" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp3_4" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp4_5" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp5_6" value="0" class="form-control" style="width: 50px;"></td>

                            <tr>

                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Rh(%)</td>
                                <td><input type="number" min="0" step="0.01" name="RH6_7" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH7_8" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH8_9" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH9_10" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH10_11" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH11_12" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH12_1" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH1_2" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH2_3" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH3_4" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH4_5" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH5_6" value="0" class="form-control" style="width: 50px;"></td>

                            </tr>


                            <tr>

                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Weather Condition</td>
                                <td>
                                    <select id="weather" name="weather_condition_6_7" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_7_8" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_8_9" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_9_10" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>



                                <td>
                                    <select id="weather" name="weather_condition_10_11" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_11_12" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>



                                <td>
                                    <select id="weather" name="weather_condition_12_1" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_1_2" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_2_3" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_3_4" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_4_5" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_5_6" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>






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
                            <tr id="rec-1">
                                <td id="sample_rowonre_out"><span class="sn">1</span>.</td>
                                <td>
                                    <select name="mosq_spec_stat_out[]" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Aedes (aedimorphus) jamesi">Aedes (aedimorphus) jamesi </option>
                                        <option value="Aedes (aedimorphus) pallidostriatus  pallidostriatus">Aedes
                                            (aedimorphus) pallidostriatus pallidostriatus </option>
                                        <option value="Aedes (aedimorphus) pipersalatus">Aedes (aedimorphus)
                                            pipersalatus </option>
                                        <option value="Aedes (aedimorphus) vexans">Aedes (aedimorphus) vexans </option>
                                        <option value="Aedes (aedimorphus) vittatus">Aedes (aedimorphus) vittatus
                                        </option>
                                        <option value="Aedes (mucidus) scatophagoides">Aedes (mucidus) scatophagoides
                                        </option>
                                        <option value="Aedes (stegomyia) aegypti">Aedes (stegomyia) aegypti </option>
                                        <option value="Aedes (stegomyia) albopictus">Aedes (stegomyia) albopictus
                                        </option>
                                        <option value="Anopheles (anopheles) barbirostris">Anopheles (anopheles)
                                            barbirostris </option>
                                        <option value="Anopheles (anopheles) nigerrimus">Anopheles (anopheles)
                                            nigerrimus </option>
                                        <option value="Anopheles (anopheles) peditaeniatus">Anopheles (anopheles)
                                            peditaeniatus </option>
                                        <option value="Anopheles (cellia) aconitus">Anopheles (cellia) aconitus
                                        </option>
                                        <option value="Anopheles (cellia) annularis">Anopheles (cellia) annularis
                                        </option>
                                        <option value="Anopheles (cellia) culicifacies">Anopheles (cellia) culicifacies
                                        </option>
                                        <option value="Anopheles (cellia) elegans">Anopheles (cellia) elegans </option>
                                        <option value="Anopheles (cellia) jamesii">Anopheles (cellia) jamesii </option>
                                        <option value="Anopheles (cellia) karwari">Anopheles (cellia) karwari </option>
                                        <option value="Anopheles (cellia) maculatus">Anopheles (cellia) maculatus
                                        </option>
                                        <option value="Anopheles (cellia) pallidus">Anopheles (cellia) pallidus
                                        </option>
                                        <option value="Anopheles (cellia) stephensi">Anopheles (cellia) stephensi
                                        </option>
                                        <option value="Anopheles (cellia) subpictus">Anopheles (cellia) subpictus
                                        </option>
                                        <option value="Anopheles (cellia) tessellatus">Anopheles (cellia) tessellatus
                                        </option>
                                        <option value="Anopheles (cellia) vagus">Anopheles (cellia) vagus </option>
                                        <option value="Anopheles (cellia) varuna">Anopheles (cellia) varuna </option>
                                        <option value="Armigeres (armigeres) subalbatus">Armigeres (armigeres)
                                            subalbatus </option>
                                        <option value="Coquillettidia (coquillettidia) crassipes">Coquillettidia
                                            (coquillettidia) crassipes </option>
                                        <option value="Culex (culex) bitaeniorhynchus ">Culex (culex) bitaeniorhynchus
                                        </option>
                                        <option value="Culex (culex) fuscocephala">Culex (culex) fuscocephala </option>
                                        <option value="Culex (culex) gelidus">Culex (culex) gelidus </option>
                                        <option value="Culex (culex) hutchinsoni">Culex (culex) hutchinsoni </option>
                                        <option value="Culex (culex) infula">Culex (culex) infula </option>
                                        <option value="Culex (culex) jacksoni">Culex (culex) jacksoni </option>
                                        <option value="Culex (culex) mimulus">Culex (culex) mimulus </option>
                                        <option value="Culex (culex) pseudovishnui">Culex (culex) pseudovishnui
                                        </option>
                                        <option value="Culex (culex) quinquefasciatus">Culex (culex) quinquefasciatus
                                        </option>
                                        <option value="Culex (culex) sinensis">Culex (culex) sinensis </option>
                                        <option value="Culex (culex) sitiens">Culex (culex) sitiens </option>
                                        <option value="Culex (culex) tritaeniorhynchus">Culex (culex) tritaeniorhynchus
                                        </option>
                                        <option value="Culex (culex) vishnui">Culex (culex) vishnui </option>
                                        <option value="Culex (culex) whitmorei">Culex (culex) whitmorei </option>
                                        <option value="Culex (culiciomyia) nigropunctatus">Culex (culiciomyia)
                                            nigropunctatus </option>
                                        <option value="Culex (culiciomyia) pallidothorax">Culex (culiciomyia)
                                            pallidothorax </option>
                                        <option value="Culex (eumelnomyia) brevipalpis">Culex (eumelnomyia) brevipalpis
                                        </option>
                                        <option value="Culex (lophoceraomyia) bicornutus">Culex (lophoceraomyia)
                                            bicornutus </option>
                                        <option value="Culex (lophoceraomyia) infantulus">Culex (lophoceraomyia)
                                            infantulus </option>
                                        <option value="Culex (lophoceraomyia) minutissimus ">Culex (lophoceraomyia)
                                            minutissimus </option>
                                        <option value="Lutzia (lutzia) fuscanus">Lutzia (lutzia) fuscanus </option>
                                        <option value="Lutzia (lutzia) halifaxii">Lutzia (lutzia) halifaxii </option>
                                        <option value="Mansonia (mansonioides) annulifera">Mansonia (mansonioides)
                                            annulifera </option>
                                        <option value="Mansonia (mansonioides) indiana">Mansonia (mansonioides) indiana
                                        </option>
                                        <option value="Mansonia (mansonioides) uniformis">Mansonia (mansonioides)
                                            uniformis </option>
                                        <option value="Mosquito Species">Mosquito Species </option>
                                        <option value="Other">Other </option>
                                    </select>
                                </td>
                                <td><input type="Number" min="0" class="form-control" name="number_out[]" required style="width: 50px;" value="0" onchange="Totalnumber_out()" onkeyup="Totalnumber_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number7_8_out[]" required style="width: 50px;" value="0" onchange="Totalnumber78_out()" onkeyup="Totalnumber78_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number8_9_out[]" required style="width: 50px;" value="0" onchange="Totalnumber89_out()" onkeyup="Totalnumber89_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number9_10_out[]" required style="width: 50px;" value="0" onchange="Totalnumber910_out()" onkeyup="Totalnumber910_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number10_11_out[]" required style="width: 50px;" value="0" onchange="Totalnumber1011_out()" onkeyup="Totalnumber1011_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number11_12_out[]" required style="width: 50px;" value="0" onchange="Totalnumber1112_out()" onkeyup="Totalnumber1112_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number12_1_out[]" required style="width: 50px;" value="0" onchange="Totalnumber121_out()" onkeyup="Totalnumber121_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number1_2_out[]" required style="width: 50px;" value="0" onchange="Totalnumber12_out()" onkeyup="Totalnumber12_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number2_3_out[]" required style="width: 50px;" value="0" onchange="Totalnumber23_out()" onkeyup="Totalnumber23_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number3_4_out[]" required style="width: 50px;" value="0" onchange="Totalnumber34_out()" onkeyup="Totalnumber34_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number4_5_out[]" required style="width: 50px;" value="0" onchange="Totalnumber45_out()" onkeyup="Totalnumber45_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="number5_6_out[]" required style="width: 50px;" value="0" onchange="Totalnumber56_out()" onkeyup="Totalnumber56_out()"></td>
                                <td><input type="Number" min="0" class="form-control" name="total_out[]" required style="width: 50px;" value="0"></td>

                                <td>
                                    <a class="btn btn-xs delete-record_out" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>

                            </tr>



                        </tbody>


                        <tfoot>
                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> Total</td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber78_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber89_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber910_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber1011_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber1112_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber121_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber12_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber23_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber34_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber45_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totalnumber56_t_out" disabled value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="Totaloftotal_out" disabled value="0" class="form-control" style="width: 50px;"></td>

                            </tr>


                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> No of baits</td>
                                <td><input type="number" min="0" step="1" name="noofbaits_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs7_8_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs8_9_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs9_10_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs10_11_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs11_12_out" value="0" class="form-control" style="width: 50px;"></td>

                                <td><input type="number" min="0" step="1" name="noofbairs12_1_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs1_2_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs2_3_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs3_4_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs4_5_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="1" name="noofbairs5_6_out" value="0" class="form-control" style="width: 50px;"></td>
                            </tr>

                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Temp (0c)</td>
                                <td><input type="number" min="0" step="0.01" name="temp6_7_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp7_8_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp8_9_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp9_10_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp10_11_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp11_12_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp12_1_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp1_2_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp2_3_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp3_4_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp4_5_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="temp5_6_out" value="0" class="form-control" style="width: 50px;"></td>

                            <tr>

                            <tr>
                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Rh(%)</td>
                                <td><input type="number" min="0" step="0.01" name="RH6_7_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH7_8_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH8_9_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH9_10_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH10_11_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH11_12_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH12_1_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH1_2_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH2_3_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH3_4_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH4_5_out" value="0" class="form-control" style="width: 50px;"></td>
                                <td><input type="number" min="0" step="0.01" name="RH5_6_out" value="0" class="form-control" style="width: 50px;"></td>

                            </tr>


                            <tr>

                                <td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Weather Condition</td>
                                <td>
                                    <select id="weather" name="weather_condition_6_7_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_7_8_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_8_9_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_9_10_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>



                                <td>
                                    <select id="weather" name="weather_condition_10_11_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_11_12_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>



                                <td>
                                    <select id="weather" name="weather_condition_12_1_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_1_2_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_2_3_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>


                                <td>
                                    <select id="weather" name="weather_condition_3_4_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_4_5_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </td>

                                <td>
                                    <select id="weather" name="weather_condition_5_6_out" class="form-control">
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
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
                        <option value="Aedes (aedimorphus) pallidostriatus  pallidostriatus">Aedes (aedimorphus)
                            pallidostriatus pallidostriatus </option>
                        <option value="Aedes (aedimorphus) pipersalatus">Aedes (aedimorphus) pipersalatus </option>
                        <option value="Aedes (aedimorphus) vexans">Aedes (aedimorphus) vexans </option>
                        <option value="Aedes (aedimorphus) vittatus">Aedes (aedimorphus) vittatus </option>
                        <option value="Aedes (mucidus) scatophagoides">Aedes (mucidus) scatophagoides </option>
                        <option value="Aedes (stegomyia) aegypti">Aedes (stegomyia) aegypti </option>
                        <option value="Aedes (stegomyia) albopictus">Aedes (stegomyia) albopictus </option>
                        <option value="Anopheles (anopheles) barbirostris">Anopheles (anopheles) barbirostris </option>
                        <option value="Anopheles (anopheles) nigerrimus">Anopheles (anopheles) nigerrimus </option>
                        <option value="Anopheles (anopheles) peditaeniatus">Anopheles (anopheles) peditaeniatus
                        </option>
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
                        <option value="Coquillettidia (coquillettidia) crassipes">Coquillettidia (coquillettidia)
                            crassipes </option>
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
                        <option value="Culex (lophoceraomyia) minutissimus ">Culex (lophoceraomyia) minutissimus
                        </option>
                        <option value="Lutzia (lutzia) fuscanus">Lutzia (lutzia) fuscanus </option>
                        <option value="Lutzia (lutzia) halifaxii">Lutzia (lutzia) halifaxii </option>
                        <option value="Mansonia (mansonioides) annulifera">Mansonia (mansonioides) annulifera </option>
                        <option value="Mansonia (mansonioides) indiana">Mansonia (mansonioides) indiana </option>
                        <option value="Mansonia (mansonioides) uniformis">Mansonia (mansonioides) uniformis </option>
                        <option value="Mosquito Species">Mosquito Species </option>
                        <option value="Other">Other </option>
                    </select>
                </td>
                <td><input type="Number" class="form-control" name="number[]"  required="" style="width: 50px;" value="0" onchange="Totalnumber()" onkeyup="Totalnumber()"></td>
                <td><input type="Number" class="form-control" name="number7_8[]"  required="" style="width: 50px;" value="0" onchange="Totalnumber78()" onkeyup="Totalnumber78()">
                </td>
                <td><input type="Number" class="form-control" name="number8_9[]"  required="" style="width: 50px;" value="0" onchange="Totalnumber89()" onkeyup="Totalnumber89()">
                </td>
                <td><input type="Number" class="form-control" name="number9_10[]"  required="" style="width: 50px;" value="0" onchange="Totalnumber910()" onkeyup="Totalnumber910()">
                </td>
                <td><input type="Number" class="form-control" name="number10_11[]"  required="" style="width: 50px;" value="0" onchange="Totalnumber1011()" onkeyup="Totalnumber1011()"></td>
                <td><input type="Number" class="form-control" name="number11_12[]" required="" style="width: 50px;" value="0" onchange="Totalnumber1112()" onkeyup="Totalnumber1112()"></td>
                <td><input type="Number" class="form-control" name="number12_1[]"  required="" style="width: 50px;" value="0" onchange="Totalnumber121()" onkeyup="Totalnumber121()">
                </td>
                <td><input type="Number" class="form-control" name="number1_2[]"  required="" style="width: 50px;" value="0" onchange="Totalnumber12()" onkeyup="Totalnumber12()">
                </td>
                <td><input type="Number" class="form-control" name="number2_3[]"  required="" style="width: 50px;" value="0" onchange="Totalnumber23()" onkeyup="Totalnumber23()">
                </td>
                <td><input type="Number" class="form-control" name="number3_4[]"  required="" style="width: 50px;" value="0" onchange="Totalnumber34()" onkeyup="Totalnumber34()">
                </td>
                <td><input type="Number" class="form-control" name="number4_5[]"  required="" style="width: 50px;" value="0" onchange="Totalnumber45()" onkeyup="Totalnumber45()">
                </td>
                <td><input type="Number" class="form-control" name="number5_6[]"  required="" style="width: 50px;" value="0" onchange="Totalnumber56()" onkeyup="Totalnumber56()">
                </td>

                <td><input type="Number" class="form-control" name="total[]" value="0" required="" style="width: 50px;" value="0"></td>

                <td>
                    <a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>


        </tbody>
    </table>
</div>







<div style="display:none;">
    <table id="sample_table_out">
        <tbody>
            <tr id="">
                <td id="sample_rowonre_out"><span class="sn_out">1</span>.</td>
                <td>
                    <select name="mosq_spec_stat_out[]" class="form-control">
                        <option value="">Select</option>
                        <option value="Aedes (aedimorphus) jamesi">Aedes (aedimorphus) jamesi </option>
                        <option value="Aedes (aedimorphus) pallidostriatus  pallidostriatus">Aedes (aedimorphus)
                            pallidostriatus pallidostriatus </option>
                        <option value="Aedes (aedimorphus) pipersalatus">Aedes (aedimorphus) pipersalatus </option>
                        <option value="Aedes (aedimorphus) vexans">Aedes (aedimorphus) vexans </option>
                        <option value="Aedes (aedimorphus) vittatus">Aedes (aedimorphus) vittatus </option>
                        <option value="Aedes (mucidus) scatophagoides">Aedes (mucidus) scatophagoides </option>
                        <option value="Aedes (stegomyia) aegypti">Aedes (stegomyia) aegypti </option>
                        <option value="Aedes (stegomyia) albopictus">Aedes (stegomyia) albopictus </option>
                        <option value="Anopheles (anopheles) barbirostris">Anopheles (anopheles) barbirostris </option>
                        <option value="Anopheles (anopheles) nigerrimus">Anopheles (anopheles) nigerrimus </option>
                        <option value="Anopheles (anopheles) peditaeniatus">Anopheles (anopheles) peditaeniatus
                        </option>
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
                        <option value="Coquillettidia (coquillettidia) crassipes">Coquillettidia (coquillettidia)
                            crassipes </option>
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
                        <option value="Culex (lophoceraomyia) minutissimus ">Culex (lophoceraomyia) minutissimus
                        </option>
                        <option value="Lutzia (lutzia) fuscanus">Lutzia (lutzia) fuscanus </option>
                        <option value="Lutzia (lutzia) halifaxii">Lutzia (lutzia) halifaxii </option>
                        <option value="Mansonia (mansonioides) annulifera">Mansonia (mansonioides) annulifera </option>
                        <option value="Mansonia (mansonioides) indiana">Mansonia (mansonioides) indiana </option>
                        <option value="Mansonia (mansonioides) uniformis">Mansonia (mansonioides) uniformis </option>
                        <option value="Mosquito Species">Mosquito Species </option>
                        <option value="Other">Other </option>
                    </select>
                </td>
                <td><input type="Number" class="form-control" name="number_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber_out()" onkeyup="Totalnumber_out()"></td>
                <td><input type="Number" class="form-control" name="number7_8_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber78_out()" onkeyup="Totalnumber78_out()">
                </td>
                <td><input type="Number" class="form-control" name="number8_9_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber89_out()" onkeyup="Totalnumber89_out()">
                </td>
                <td><input type="Number" class="form-control" name="number9_10_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber910_out()" onkeyup="Totalnumber910_out()">
                </td>
                <td><input type="Number" class="form-control" name="number10_11_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber1011_out()" onkeyup="Totalnumber1011_out()"></td>
                <td><input type="Number" class="form-control" name="number11_12_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber1112_out()" onkeyup="Totalnumber1112_out()"></td>
                <td><input type="Number" class="form-control" name="number12_1_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber121_out()" onkeyup="Totalnumber121_out()">
                </td>
                <td><input type="Number" class="form-control" name="number1_2_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber12_out()" onkeyup="Totalnumber12_out()">
                </td>
                <td><input type="Number" class="form-control" name="number2_3_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber23_out()" onkeyup="Totalnumber23_out()">
                </td>
                <td><input type="Number" class="form-control" name="number3_4_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber34_out()" onkeyup="Totalnumber34_out()">
                </td>
                <td><input type="Number" class="form-control" name="number4_5_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber45_out()" onkeyup="Totalnumber45_out()">
                </td>
                <td><input type="Number" class="form-control" name="number5_6_out[]" required="" style="width: 50px;" value="0" onchange="Totalnumber56_out()" onkeyup="Totalnumber56_out()">
                </td>
                <td><input type="Number" class="form-control" name="total_out[]" value="0" required="" style="width: 50px;" value="0"></td>

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
        var index2 = 1;
        jQuery(document).delegate('a.add-record', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#sample_table tr'),
                size = jQuery('#tbl_posts >tbody >tr').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'rec-' + size);

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

        var index3 = 1;
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
</script>