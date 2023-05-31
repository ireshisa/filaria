<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Indoor Hand Collection FORM<br>
  
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Entomological data</a></li>
            <li class="active">Indoor Hand Collection  FORM</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{ url('/ento1_newForm_save') }}">

                {{ csrf_field() }}
                <div class="col-md-12">
                    @if (session()->has('message'))


                    @if (session()->has('id'))
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <Center>
                            <h3><i class="icon fa fa-check"></i> Your form ID is :- {{ session()->get('id') }} </h3>
                        </Center>
                    </div>
                    @endif











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


                    <div class="box box-primary">
                        <div class="box-header with-border">

                        </div>

                        <div class="box-body" style="overflow: hidden;">
                            <div class="col-md-6">
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Form ID</label>
                                    <input type="text" name="formid" class="form-control">
                                </div> -->



                                <div class="form-group">
                                    <label for="exampleInputEmail1">District</label>
                                    <!-- <input type="text" name="district" class="form-control"> -->
                                    <select name="district" class="form-control" onchange="getMoh(this.value)" required="">
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
                                    <input list="moh_list" name="moh_area" required class="form-control" autocomplete="off">
                                    <datalist id="moh_list">

                                    </datalist>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">PHM area</label>
                                    <input type="text" name="phi_and_phm" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">GN division</label>
                                    <input type="text" name="gn_divison" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Locality</label>
                                    <input type="text" name="locality" class="form-control"> <!-- new row -->
                                </div>
                            </div>


                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition" class="form-control">
                                        <option value=" ">Select Weather Condition</option>
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
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of Collection</label>
                                    <input data-date-format="yyyy-mm-d" type="Date" name="date" class="form-control pull-right datepicker_v">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1"> <br>Started at   </label>
                                    <input type="time" name="start_at" class="form-control  ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Finished at</label>
                                    <input type="time" name="finished_at" class="form-control">
                                </div>


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

                                <!-- removetotal122 -->
                                <!-- <th rowspan="2">Time Spent (mins)</th> -->
                                <th colspan="2">No of Pre:+ve</th>
                                <th colspan="2">Total No Of Mos</th>
                                <th colspan="7">Resting places<br> (No .of females)</th>
                                <th colspan="4">Abdominal condition</th>
                                <th rowspan="2">Males</th>
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
                            <tr id="rec-1">
                                <td id="sample_rowonre" rowspan="2"><span class="sn">1</span>.</td>
                                <td rowspan="2"><input type="text" name="ser_no[]" class="form-control"></td>
                                <td rowspan="2"><input type="text" name="gps_long[]" class="form-control">
                                </td>
                                <td rowspan="2"><input type="text" name="gps_lat[]" class="form-control"></td>
                                <td rowspan="2"><input type="text" min="0" name="house_no[]" class="form-control">
                                </td>

                                <!-- // removetotal122 -->
                                <!-- <td rowspan="2"><input type="number" min="0" name="timeSpand[]" class="form-control" onchange="totalTime()" onkeyup="totalTime()">
                                </td> -->

                                <td rowspan="2"><input style="width: 50px;" type="number" min="0" value="0" name="no_of_pre_postive_cx[]" class="form-control" onchange="Totalpositive()" onkeyup="Totalpositive()"></td>
                                <td rowspan="2"><input style="width: 50px;" type="number" min="0" value="0" name="no_of_pre_postive_man[]" onchange="Totalpositivem()" onkeyup="Totalpositivem()" class="form-control"></td>
                                <td rowspan="2"><input style="width: 50px;" type="number" min="0" value="0" name="no_of_culex[]" class="form-control" onchange="Totalmoocu()" onkeyup="Totalmoocu()"></td>
                                <td rowspan="2"><input style="width: 50px;" type="number" min="0" value="0" name="no_of_mosq[]" class="form-control" onchange="Totalmosman()" onkeyup="Totalmosman()"></td>



                                <th>
                                    Cx
                                </th>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_1[]" class="form-control" onchange="Totalres1cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_2[]" class="form-control" onchange="Totalres2cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_3[]" class="form-control" onchange="Totalres3cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_4[]" class="form-control" onchange="Totalres4cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_5[]" class="form-control" onchange="Totalres5cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_6[]" class="form-control" onchange="Totalres6cu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="abdo_uf[]" class="form-control" onchange="Totalufcu()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="abdo_f[]" class="form-control" onchange="Totalfcu()">
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
                                <td rowspan="2">
                                    <a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>

                            </tr>


                            <tr id="rec-1">
                                <th>Mn</th>
                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_1_mansonia[]" class="form-control" onchange="Totalres1mn()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_2_mansonia[]" class="form-control" onchange="Totalres2Ma()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_3_mansonia[]" class="form-control" onchange="Totalres3Ma()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_4_mansonia[]" class="form-control" onchange="Totalres4Ma()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_5_mansonia[]" class="form-control" onchange="Totalres5Ma()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="resting_place_6_mansonia[]" class="form-control" onchange="Totalres6Ma()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="abdo_uf_ma[]" class="form-control" onchange="Totalufmn()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="abdo_f_ma[]" class="form-control" onchange="Totalfmn()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="abdo_sg_ma[]" class="form-control" onchange="Totalsgmn()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="abdo_g_ma[]" class="form-control" onchange="Totalgmn()">
                                </td>

                                <td>
                                    <input style="width: 40px;" type="number" value="0" min="0" name="males_ma[]" class="form-control" onchange="Totalmalesmn()">
                                </td>


                            </tr>


                        </tbody>


                        <tfoot>
                            <tr>
                                <td class="totalth" colspan="5" rowspan="2" style="text-align: center; vertical-align: middle;"> Total</td>
                                <td class="totalth" rowspan="2"><input style="width: 40px;" disabled type="number" name="NoofPreTotal" class="form-control"></td>
                                <td class="totalth" rowspan="2"><input style="width: 40px;" disabled type="number" name="NoofPreTotalMn" class="form-control"></td>
                                <td class="totalth" rowspan="2"><input style="width: 40px;" disabled type="number" name="TotalMosCu" class="form-control"></td>
                                <td class="totalth" rowspan="2"><input style="width: 40px;" disabled type="number" name="TotalMosMa" class="form-control"></td>
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
                            </tr>
                        </tfoot>
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
                                <input type="number" min="0" name="anopheles_species" class="form-control"> <!-- manual-->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Total no of Aedes Mos:</label>
                                <input type="number" min="0" name="aedes_sp" class="form-control"> <!-- manual-->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Total no of Armigeres Mos:</label>
                                <input type="number" min="0" name="armigerus_sp" class="form-control"> <!-- manual -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">No of collectors</label>
                                <input type="number" min="0" name="no_of_collectors" class="form-control" onkeyup="CuDensity(),maDensity()" onchange="CuDensity(),maDensity()"> <!-- manual -->
                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputPassword1">No of man hours</label>
                                <input type="number" min="0" step='0.01' value='0.00' name="total_time_spend" onkeyup="CuDensity(),maDensity()" class="form-control"> <!-- manual -->
                            </div>


                            <!-- auto-generated newly created-->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mos. Density: Cx</label>
                                <input type="number" min="0" step='0.01' value='0.00' name="MosDensityCx" class="form-control">
                            </div>

                            <!-- auto-generated newly created-->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mos. Density: MN</label>
                                <input type="number" min="0" step='0.01' value='0.00' name="MosDensityMan" class="form-control">
                                <!-- auto-generated newly created-->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Name of HEO</label>
                                <input type="text" name="name_of_heo" class="form-control">
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
</div>







<div style="display:none;">
    <table id="sample_table">
        <tbody>
            <tr id="">
                <td id="sample_rowonre" rowspan="2"><span class="sn">1</span>.</td>
                <td rowspan="2"><input type="text" name="ser_no[]" class="form-control"></td>
                <td rowspan="2"><input type="text" name="gps_long[]" class="form-control">
                </td>
                <td rowspan="2"><input type="text" name="gps_lat[]" class="form-control"></td>
                <td rowspan="2"><input type="text" min="0" name="house_no[]" class="form-control">
                </td>


                <!-- removetotal122 -->
                <!-- <td rowspan="2"><input type="number" min="0" name="timeSpand[]" value="0" onchange="totalTime()" class="form-control">
                </td> -->

                <td rowspan="2"><input style="width: 50px;" type="number" min="0" value="0" name="no_of_pre_postive_cx[]" class="form-control" onchange="Totalpositive()"></td>
                <td rowspan="2"><input style="width: 50px;" type="number" min="0" value="0" name="no_of_pre_postive_man[]" class="form-control" onchange="Totalpositivem()"></td>
                <td rowspan="2"><input style="width: 50px;" type="number" min="0" value="0" name="no_of_culex[]" class="form-control" onchange="Totalmoocu()"></td>
                <td rowspan="2"><input style="width: 50px;" type="number" min="0" value="0" name="no_of_mosq[]" class="form-control" onchange="Totalmosman()"></td>


                <th>Cx</th>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_1[]" class="form-control" onchange="Totalres1cu()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_2[]" class="form-control" onchange="Totalres2cu()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_3[]" class="form-control" onchange="Totalres3cu()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_4[]" class="form-control" onchange="Totalres4cu()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_5[]" class="form-control" onchange="Totalres5cu()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_6[]" class="form-control" onchange="Totalres6cu()"></td>

                <td>
                    <input style="width: 40px;" type="number" value="0" min="0" name="abdo_uf[]" class="form-control" onchange="Totalufcu()">
                </td>
                <td>
                    <input style="width: 40px;" type="number" value="0" min="0" name="abdo_f[]" class="form-control" onchange="Totalfcu()">
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

                <td rowspan="2">
                    <a class="btn btn-xs delete-record" data-id="1">
                        <i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>


            <tr name="secondrow" id="">
                <th>Mn</th>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_1_mansonia[]" class="form-control" onchange="Totalres1mn()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_2_mansonia[]" class="form-control" onchange="Totalres2Ma()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_3_mansonia[]" class="form-control" onchange="Totalres3Ma()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_4_mansonia[]" class="form-control" onchange="Totalres4Ma()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_5_mansonia[]" class="form-control" onchange="Totalres5Ma()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="resting_place_6_mansonia[]" class="form-control" onchange="Totalres6Ma()"></td>

                <td><input style="width: 40px;" type="number" value="0" min="0" name="abdo_uf_ma[]" class="form-control" onchange="Totalufmn()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="abdo_f_ma[]" class="form-control" onchange="Totalfmn()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="abdo_sg_ma[]" class="form-control" onchange="Totalsgmn()"></td>
                <td><input style="width: 40px;" type="number" value="0" min="0" name="abdo_g_ma[]" class="form-control" onchange="Totalgmn()"></td>

                <td><input style="width: 40px;" type="number" value="0" min="0" name="males_ma[]" class="form-control" onchange="Totalmalesmn()"></td>
                <!-- new Failed need to add db -->

            </tr>
        </tbody>
    </table>
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


    // removed after descutin only total nedd no need haome by home time case  removetotal122

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




Totalres1cu();
Totalres2cu();
Totalres3cu();
Totalres4cu();
Totalres5cu();
Totalres6cu();


Totalufcu();
Totalfcu();
Totalsgcu();
Totalgcu();
Totalmalescu();

Totalpositive();
Totalpositivem();
Totalmoocu();
Totalmosman();
</script>