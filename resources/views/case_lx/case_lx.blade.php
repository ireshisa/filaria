<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>


 <!--1<sup>st</sup> form--->

           CASE INVESTIGATION FORM<br />
            <small> (To be filled by all positive patients for filariasis)</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <!-- <li><a href="#">Forms</a></li> -->
            <li class="active"> CASE INVESTIGATION FORM</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form method="post" action="{{ url('/register_case_lx') }}">
                {{ csrf_field() }}
                <div class="col-md-12">
                    @if (session()->has('message'))
                    @if (session()->get('message') == true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        Successfully save your data.
                    </div>
                    @endif @if (session()->get('message') == false)
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
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">District</label>

                                    <select name="district" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Ampara">Ampara </option>
                                        <option value="Anuradhapura">Anuradhapura </option>
                                        <option value="Badulla">Badulla </option>
                                        <option value="Batticaloa">Batticaloa </option>
                                        <option value="CMC">CMC </option>
                                        <option value="Colombo">Colombo </option>
                                        <option value="Galle">Galle </option>
                                        <option value="Gampaha">Gampaha </option>
                                        <option value="Hambantota">Hambantota </option>
                                        <option value="Jaffna">Jaffna </option>
                                        <option value="Kalmunei">Kalmunei </option>
                                        <option value="Kalutara">Kalutara </option>
                                        <option value="Kandy">Kandy </option>
                                        <option value="Kegalle">Kegalle </option>
                                        <option value="Kilinochchi">Kilinochchi </option>
                                        <option value="Kurunegala">Kurunegala </option>
                                        <option value="Mannar">Mannar </option>
                                        <option value="Matale">Matale </option>
                                        <option value="Matara">Matara </option>
                                        <option value="Monaragala">Monaragala </option>
                                        <option value="Mullaitivu">Mullaitivu </option>
                                        <option value="Nuwara Eliya">Nuwara Eliya </option>
                                        <option value="Polonnaruwa">Polonnaruwa </option>
                                        <option value="Puttalam">Puttalam </option>
                                        <option value="Ratnapura">Ratnapura </option>
                                        <option value="Trincomalee">Trincomalee </option>
                                        <option value="Vavuniya">Vavuniya </option>
                                    </select>


                                    {{-- <input type="text" name="district" class="form-control"  placeholder="" /> --}}
                                    {{-- <select name="district" class="form-control" onchange="getMoh(this.value)">
										<option value="">Select</option>

										@if ((Auth::user()->role !== 'ADMIN') & (Auth::user()->role !== 'AFC'))
										<option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
                                    @else @foreach ($district_list as $dis)
                                    <option value="{{ $dis->district }}">{{ $dis->district }}</option>
                                    @endforeach @endif
                                    </select> --}}
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">MOH Area</label>
                                    <input type="text" name="moh_area" class="form-control" placeholder="" />
                                    <!-- <input type="text" name="moh_area" class="form-control" id="moh_list" placeholder="MOH Area ..." /> -->
                                    {{-- <select name="moh_area" class="form-control" id="moh_list" onchange="getPhi(this.value)">
										<option value="">Select</option> --}}
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1">OPD identification number</label>
                                    <input type="text" name="slide_id_number" class="form-control" placeholder="" />
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1">Lab identification number </label>
                                    <input type="text" name="patient_id" class="form-control" placeholder="" />
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of registration </label>
                                    <input data-date-format="dd/mm/yyyy" type="date" name="date_of_rep" class="form-control pull-right datepicker_v" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the patient</label>
                                    <input type="text" name="name_of_patient" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sex</label>
                                    <select name="sex" id="" class="form-control" required>
                                        <option> select </option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Age </label>
                                    <input type="text" name="age" class="form-control" placeholder="" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Occupation</label>

                                    <!-- <input type="text" name="occupation" class="form-control" placeholder="" /> -->

<select name="occupation" id="" class="form-control">
	<option value="1">Managers</option>
	<option value="2">Technicians and associated professions</option>
	<option value="3">Clerical support Workers</option>
	<option value="4">Services and sales workers </option>
	<option value="5">Skilled agricultural forestry and fishery workers </option>
	<option value="6">Crafted and related trade workers</option>
	<option value="7">Machine operators </option>
	<option value="8">Elementary occupation</option>
	<option value="9">Security forces</option>
	<option value="10">Other</option>
</select> 
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">
                                        Current address
                                    </label>
                                    <textarea name="address" id="" class="form-control" rows="3" placeholder="">
                                  </textarea>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Past addresses (If new to the area, places of residence during last 5 years)</label>
                                    <textarea name="pastaddress" id="" class="form-control" rows="3">
                                                                </textarea>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1">Period of residence</label>
                                    <input type="text" name="period_of_residence" class="form-control" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact Number</label>
                                    <input type="text" name="contact" class="form-control" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">GPS Latitude </label>
                                    <input type="text" name="gps_lat" class="form-control" placeholder="ex :- 89.5565 ..." />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">GPS Longitude </label>
                                    <input type="text" name="gps_long" class="form-control" placeholder="ex :- 89.5565 ..." />
                                    <!--^\d*(\.\d{0,2})?$-->
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of collection of blood film </label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="date_of_col" class="form-control pull-right datepicker_v" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of examination of the blood film</label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="date_of_examination" class="form-control pull-right datepicker_v" />
                                </div>



                            </div>
                            <div class="col-md-6">



                                <div class="form-group">
                                    <label for="exampleInputPassword1">Species </label>
                                    {{-- <input type="text" name="species_diag" class="form-control" /> --}}
                                    <select name="species_diag" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="Wb">Wb</option>
                                        <option value="Bm">Bm</option>
                                        <option value="other">other</option>
                                    </select>
                                </div>








                                <div class="form-group">
                                    <label for="exampleInputPassword1">MF count</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" name="mf_count" class="form-control" placeholder="" />
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Result of Filaria Ag test (ICT)</label>
                                    <select name="resultOfFilariaAg" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="Positive">Positive</option>
                                        <option value="Negative">Negative</option>
                                        <option value="Not done">Not done</option>
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Result of Filaria Antibody detection by ELISA</label>
                                    <select name="resultOfFilariaAntibody" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="Positive">Positive</option>
                                        <option value="Negative">Negative</option>
                                        <option value="Not done">Not done</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">WBC/DC</label>
                                    <input type="text" name="wbc_dc" class="form-control" placeholder="" />
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Presence of symptoms suggestive of Filaria</label>
                                    <input type="text" name="pslf" class="form-control" placeholder="" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Past medical / surgical history</label>
                                    <input type="text" name="history" class="form-control" placeholder="" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Allergic history (food, drug ,plaster )</label>
                                    <input type="text" name="Past_allergic_history" class="form-control" placeholder="" />
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of starting treatment</label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="treatment_started_on" class="form-control pull-right datepicker_v" />
                                </div>

                                <div class="form-group mt-2" style="margin-top: 50px;">
                                    <div class="col-md-12">
                                        <label for="treatment_given_alb">Approx. weight of the patient</label>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="text" name="treatment_given_alb" class="form-control" placeholder="" />
                                                    </div>
                                                    <label for="inputPassword" class="col-sm-2 col-form-label rowinput"> Kg</label>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>



                                <div class="form-group mt-2">
                                    <div class="col-md-12">
                                        <label for="treatment_given_DEC" style="margin-top: 10px;">Treatment given : DEC</label>
                                        {{-- <input type="text" name="treatment_given_DEC" class="form-control"  placeholder="" /> --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="text" name="treatment_given_DEC" class="form-control" placeholder="" />
                                                    </div>
                                                    <label for="inputPassword" class="col-sm-2 col-form-label rowinput">
                                                        mg/Day</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="text" name="treatment_given_DEC2" class="form-control" placeholder="" />
                                                    </div>
                                                    <label for="inputPassword" class="col-sm-2 col-form-label rowinput">
                                                        No.of days</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <div class="col-md-12">
                                        <label for="treatment_given_DEC">Albendazole</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="text" name="albendazole1" class="form-control" placeholder="" />
                                                    </div>
                                                    <label for="inputPassword" class="col-sm-2 col-form-label rowinput">
                                                        mg/stat</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>






                                <div class="form-group" id="idd">
                                    <label for="exampleInputPassword1">Actions taken for prevention</label>
                                    <!-- <input type="text" name="actions_taken" class="form-control" placeholder="" /> -->

                                    <br>

                                    <select class="js-example-basic-multiple form-control " name="actions_takenarray[]" multiple="multiple">
                                        <option value="1"> Mosquito net</option>
                                        <option value="2"> Mosquito repellent vaporizer, spray or cream</option>
                                        <option value="3"> Use of natural remedies (eg:-maduruthala)</option>
                                        <option value="4"> wearing light colored clothes to cover the whole body at night.</option>
                                        <option value="5"> Use windows with screens.</option>
                                        <option value="6"> Repair any damage in sewage pit and cover exhaust pipe opening with mosquito preventive net.</option>
                                        <option value="7"> Clean blocked drains</option>
                                        <option value="8"> Other</option>
                                    </select>



                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">History Of MDA (year) </label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" name="history_of_mda" class="form-control" placeholder="" />
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the PHFO/PHI collected the blood film</label>
                                    <input type="text" name="phfo_phi" class="form-control" placeholder="" />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the PHLT examined the blood film</label>
                                    <input type="text" name="investigation_officer" class="form-control" placeholder="" />
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Due date for 5P </label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="inv_date" class="form-control pull-right datepicker_v" placeholder=" " />
                                </div>

                                <br>





                                <div class="form-group">
                                    <label for="exampleInputPassword1">Remarks</label>
                                    <input type="text" name="remarks" class="form-control" placeholder="" />
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the treating medical officer</label>
                                    <input type="text" name="trading_Officer" class="form-control" placeholder="" />
                                </div>









                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                    <!-- /.box -->
                </div>
            </form>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<style>
    .rowinput {
        margin-left: 0px !important;
        padding-left: 0px;
        margin-top: 3px;
    }

    #idd .btn-group {
        width: 100%;
    }

    #idd .multiselect {
        width: 100%;
    }
</style>