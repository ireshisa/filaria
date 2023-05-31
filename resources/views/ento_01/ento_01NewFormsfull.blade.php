<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ENTO 1 FORM<br>
            <small>Indoor Hand Collection </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ENTO 1</a></li>
            <li class="active">Indoor Hand Collection </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/ento1_newForm_save') }}">

                {{csrf_field() }}
                <div class="col-md-12">
                    @if(session()->has('message'))
                    @if(session()->get('message')==true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        Successfully save your data.
                    </div>
                    @endif
                    @if(session()->get('message')==false)
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
                                    <label for="exampleInputEmail1">District</label>
                                    {{-- <select name="district" class="form-control" onchange="getMoh(this.value)" required="">
                                        <option value="">Select</option>
                                        @if(Auth::user()->role!=="ADMIN" & Auth::user()->role !== "AFC")
                                        <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}
                                    </option>
                                    @else
                                    @foreach ($district_list as $dis)
                                    <option value="{{ $dis->district }}">{{ $dis->district }}</option>
                                    @endforeach
                                    @endif
                                    </select> --}}

                                    <input type="text" name="district" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">MOH area</label>

                                    <input type="text" name="moh_area" class="form-control">
                                    {{--  <!--<select name="moh_area" class="form-control" id="moh_list" onchange="getPhi(this.value)">-->
                                    <!--    <option value="">Select</option>-->
                                    <!--</select>-->  --}}
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
                                    <label for="exampleInputPassword1">Date </label>
                                    <input data-date-format="yyyy-mm-d" type="Date" name="date" class="form-control pull-right datepicker_v">
                                </div>
                                <!-- <div class="form-group">
                                      <label for="exampleInputPassword1">Address  </label>
                                      <input  type="text" placeholder="Address..." name="address "
                                          class="form-control">
                                  </div> -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> <br>Started at   </label>
                                    <input type="time" name="start_at" class="form-control  ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Finished at</label>
                                    <input type="time" name="finished_at" class="form-control">
                                </div>



                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Number of premises examined </label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="no_of_premises" class="form-control">
                                </div> --}}

                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Total time spent</label>
                                    <input type="number" name="total_time_spend" class="form-control">
                                </div> -->



                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">No of premises positive for Cx. quin</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="no_of_premises_positive" class="form-control">
                                </div>  --}}

                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">No of premises positive for Mansonia
                                        species</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="mansonia_species_of_positive" class="form-control">
                                </div>

                                 --}}

                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Total culex sp collected</label> <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="total_mosquitos_collected" class="form-control" required>
                                </div>
                                 --}}


                                {{--
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Total Mansonia species collected </label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="mansonia_spcies_of_mosquitos_collected" class="form-control" required>
                                </div> --}}

                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Anopheles species</label>
                                    <input type="number" pattern=" ^\d*(\.\d{0,2})?$"  name="anopheles_species" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Aedes sp</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="aedes_sp" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Armigerus sp</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="armigerus_sp" class="form-control" required>
                                </div> --}}

                                {{--  <div class="form-group">
                                    <label for="exampleInputPassword1">Total culex sp  Collected</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" placeholder="Total culex sp positive (+) Collected.." name="culex_sp" class="form-control" required>
                                </div>   --}}

                              {{--<!-- no filed for new forms -->
                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Tubes submitted</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" name="tubes_submitted" class="form-control" required>
                                </div> -->  --}}

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
                                <th rowspan="2">longitude</th>
                                <th rowspan="2">Latitude</th>
                                <th rowspan="2">Name & Address</th>
                                <th rowspan="2">Time Spent (M)</th>
                                <th colspan="2">No of Pre:+ve</th>
                                <th colspan="2">Total No Of Mos</th>
                                <th colspan="7">Resting places<br> (No .of females)</th>
                                <th colspan="4">Total Females</th>
                                <th rowspan="2">Males</th>
                                <th rowspan="2">No. of dissected</th>
                                <th rowspan="2">No. of infrcted</th>
                                <th rowspan="2">No of infective</th>
                                <th rowspan="2">Action</th>
                            </tr>

                            <tr>
                                <th>Cx</th>
                                <th>M</th>
                                <th>Cx</th>
                                <th>M</th>
                                <th rowspan="2">Mos.<br> Species</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
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
                                <td rowspan="2"><input type="text" name="gps_long[]" class="form-control"></td>
                                <td rowspan="2"><input type="text" name="gps_lat[]" class="form-control"></td>
                                <td rowspan="2"><input type="text" name="house_no[]" class="form-control"></td>
                                <td rowspan="2"><input type="text" name="timeSpand[]" class="form-control"></td>

                                <td rowspan="2"><input style="width: 50px;" type="number" value="0" name="no_of_pre_postive_cx[]" class="form-control"></td>
                                <td rowspan="2"><input style="width: 50px;" type="number" value="0" name="no_of_pre_postive_man[]" class="form-control"></td>
                                <td rowspan="2"><input style="width: 50px;" type="number" value="0" name="no_of_culex[]" class="form-control"></td>
                                <td rowspan="2"><input style="width: 50px;" type="number" value="0" name="no_of_mosq[]" class="form-control"></td>



                                <th>Cx</th>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_1[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_2[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_3[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_4[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_5[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_6[]" class="form-control"></td>

                                <td><input style="width: 40px;" type="number" value="0" name="abdo_uf[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_f[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_sg[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_g[]" class="form-control"></td>

                                <td><input style="width: 40px;" type="number" value="0" name="males[]" class="form-control"></td>
                                <!-- new Failed need to add db -->
                                <td><input type="number" value="0" name="no_of_dissected[]" class="form-control"></td>
                                <td><input type="number" value="0" name="lab_positive[]" class="form-control"></td>
                                <td><input type="number" value="0" name="lab_no[]" class="form-control"></td>

                                <td rowspan="2"><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>

                            </tr>


                            <tr id="rec-1">
                                <th>M</th>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_1_mansonia[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_2_mansonia[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_3_mansonia[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_4_mansonia[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_5_mansonia[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_6_mansonia[]" class="form-control"></td>

                                <td><input style="width: 40px;" type="number" value="0" name="abdo_uf_ma[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_f_ma[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_sg_ma[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_g_ma[]" class="form-control"></td>

                                <td><input style="width: 40px;" type="number" value="0" name="males_ma[]" class="form-control"></td>
                                <!-- new Failed need to add db -->

                                <td><input type="number" value="0" name="no_of_dissected_ma[]" class="form-control"></td>
                                <td><input type="number" value="0" name="lab_positive_man[]" class="form-control"></td>
                                <td><input type="number" value="0" name="lab_no_man[]" class="form-control"></td>

                            </tr>


                        </tbody>
                    </table>

                </div>

                <div style="display:none;">
                    <table id="sample_table">
                        <tbody>
                            <tr id="">
                                <td id="sample_rowonre" rowspan="2"><span class="sn">1</span>.</td>
                                <td rowspan="2"><input type="text" name="ser_no[]" class="form-control"></td>
                                <td rowspan="2"><input type="text" name="gps_long[]" class="form-control"></td>
                                <td rowspan="2"><input type="text" name="gps_lat[]" class="form-control"></td>
                                <td rowspan="2"><input type="text" name="house_no[]" class="form-control"></td>
                                <td rowspan="2"><input type="text" name="timeSpand[]" class="form-control"></td>

                                <td rowspan="2"><input style="width: 50px;" type="number" value="0" name="no_of_pre_postive_cx[]" class="form-control"></td>
                                <td rowspan="2"><input style="width: 50px;" type="number" value="0" name="no_of_pre_postive_man[]" class="form-control"></td>
                                <td rowspan="2"><input style="width: 50px;" type="number" value="0" name="no_of_culex[]" class="form-control"></td>
                                <td rowspan="2"><input style="width: 50px;" type="number" value="0" name="no_of_mosq[]" class="form-control"></td>



                                <th>Cx</th>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_1[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_2[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_3[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_4[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_5[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_6[]" class="form-control"></td>

                                <td><input style="width: 40px;" type="number" value="0" name="abdo_uf[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_f[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_sg[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_g[]" class="form-control"></td>

                                <td><input style="width: 40px;" type="number" value="0" name="males[]" class="form-control"></td>
                                <!-- new Failed need to add db -->

                                <td><input type="number" value="0" name="no_of_dissected[]" class="form-control"></td>
                                <td><input type="number" value="0" name="lab_positive[]" class="form-control"></td>
                                <td><input type="number" value="0" name="lab_no[]" class="form-control"></td> -->

                                <td rowspan="2"><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>

                            </tr>







                            <tr name="secondrow" id="">


                                <th>M</th>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_1_mansonia[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_2_mansonia[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_3_mansonia[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_4_mansonia[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_5_mansonia[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="resting_place_6_mansonia[]" class="form-control"></td>

                                <td><input style="width: 40px;" type="number" value="0" name="abdo_uf_ma[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_f_ma[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_sg_ma[]" class="form-control"></td>
                                <td><input style="width: 40px;" type="number" value="0" name="abdo_g_ma[]" class="form-control"></td>

                                <td><input style="width: 40px;" type="number" value="0" name="males_ma[]" class="form-control"></td>
                                <!-- new Failed need to add db -->

                                <td><input type="number" value="0" name="no_of_dissected_ma[]" class="form-control"></td>
                                <td><input type="number" value="0" name="lab_positive_man[]" class="form-control"></td>
                                <td><input type="number" value="0" name="lab_no_man[]" class="form-control"></td>



                            </tr>

                        </tbody>
                    </table>
                </div>


                <style>
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
                </style>

                <br>
                <div class="box box-primary">
                    <div class="box-body" style="overflow: hidden;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Total no of Anopheles Mos:</label>
                                <input type="text" name="anopheles" class="form-control"> <!-- manual-->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Total no of Aedes Mos:</label>
                                <input type="text" name="andes" class="form-control"> <!-- manual-->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Total no of Armigeres Mos:</label>
                                <input type="text" name="andes" class="form-control"> <!-- manual -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">No of collectors</label>
                                <input type="text" name="no_of_collectors" class="form-control"> <!-- manual -->
                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputPassword1">No of man hours</label>
                                <input type="text" name="no_of_collectors" class="form-control"> <!-- manual -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mos. Density: Cx</label>
                                <input type="text" name="MosDensityCx" class="form-control"> <!-- auto-generated newly created-->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mos. Density: MN</label>
                                <input type="text" name="MosDensityMan" class="form-control"> <!-- auto-generated newly created-->
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
</script>