<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>REPORTING FORM FOR MIGRANTS
            <br>
            <small>(fill all fields) </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">MIGRANT</a></li>
            <li class="active">REPORTING FORM FOR MIGRANTS</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/migrant_save') }}">

                {{csrf_field() }}
                <div class="col-md-12">
                    @if(session()->has('message')) @if(session()->get('message')==true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        Successfully save your data.
                    </div>
                    @endif @if(session()->get('message')==false)
    <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
    </button>
    <h4><i class="icon fa fa-warning"></i> Failed!</h4>
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
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">District</label> {{-- <input type="text" name="district" class="form-control" placeholder=""> --}}
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
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">MOH Area</label>

                                    <input type="text" name="moh_area" class="form-control" placeholder="">

                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of reporting</label>
                                    <input type="date" name="date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                </div>





                                <div class="form-group">
                                    <label for="exampleInputPassword1"> <br>Lab identification number </label>
                                    <input type="text" name="patient_id" class="form-control" placeholder="">
                                </div>

                               <div class="form-group">
                                    <label for="exampleInputPassword1"> <br>OPD identification number </label>
                                    <input type="text" name="opd_number" class="form-control" placeholder="">
                                </div>


                             <div class="form-group">
                                    <label for="exampleInputPassword1"> <br>  Patient passport number</label>
                                    <input type="text" name="passport" class="form-control" placeholder="">
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name </label>
                                    <input type="text" name="patient" class="form-control" placeholder="">
                                </div>

                            


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sex</label>
                                    <select name="gender" class="form-control">
                                        <option value="">select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Age</label>
                                    <input type="text" name="age" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Country of origin</label>
                                    <input type="text" name="country_of_origin" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">State</label>
                                    <input type="text" name="state" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Home town/village endemic for filariasis</label>
                                    <input type="text" name="home_town" class="form-control" placeholder="">
                                </div>

                                {{--  <div class="form-group">
                                    <label for="exampleInputPassword1"></label> Whether the patient’s home town/village endemic for filariasis
                                    <input type="text" name="is_endemic" class="form-control" placeholder="">
                                </div>  --}}





                                <div class="form-group">
                                    <label for="exampleInputPassword1">Working institution in Sri Lanka</label>
                                    <input type="text" name="work_place_in_lk" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address of work place</label>
                                    <input type="text" name="work_plc_address" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Occupation </label>
                                    <select name="occupation" class="form-control" id="" >
	                                  <option value="1">Managers</option>
	                                  <option value="2">Technicians and associated professions</option>
	                                  <option value="3">Clerical support Workers</option>
	                                  <option value="4">Services and sales workers </option>
	                                  <option value="5">Skilled agricultural forestry and fishery workers </option>
	                                  <option value="6">Crafted and related trade workers</option>
	                                  <option value="7">Machine operators </option>
	                                  <option value="8">Elementary occupation</option>
	                                  <option value="9">Security forces</option>
	                                  <option value="10">Security forces</option>
                                   </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Period of stay in Sri Lanka (since arrival)</label>
                                    <input type="text" name="how_long" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Residential address in Sri Lanka</label>
                                    <input type="text" placeholder="" name="adress_in_sri_lanka" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact numbers in Sri Lanka</label>
                                    <input type="text" placeholder="" name="lk_contact" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contact numbers in  country of origin</label>
                                    <input type="text" placeholder="" name="origin_contact" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Previous infection with filariasis</label>
                                    <select name="had_filaria" class="form-control">
                                        <option value="">select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                            </div>




                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">If yes,when?</label>
                                    <select name="when_filaria" class="form-control">
                                        <option value="">select</option>
                                        <option value="Within one year">Within one year</option>
                                        <option value="More than one year">More than one year</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Clinical symptoms of filariasis?</label>

                                    <input type="text" name="lymph"  class="datepicker_v form-control pull-right">
                                  
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Was he/she treated?</label>
                                    <select name="has_treated" class="form-control">
                                        <option value="">select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No"> No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">History of family members treated for filariasis/lymphoedema</label>
                                    <select name="has_family_members" class="form-control">
                                        <option value="">select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No"> No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> History of participation in a Mass Drug Administration (MDA) </label>
                                    <select name="mass_drug_admin" class="form-control">
                                        <option value="">select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No"> No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">If Yes, when did you participate (Year)?</label>
                                    <div>
                                        <input type="text" name="mass_drug_when"  class="datepicker_v form-control pull-right">
                                    </div>
                                </div>
                                <br>
                                   <br>
                                   
                            <div class="form-group">
                                <label for="exampleInputPassword1">Measures adopted to prevent mosquito bites</label>
                             <div>
                                     <select class="multiple-checkboxes form-control"  name="mosq_netsarray[]" multiple data-live-search="true">
                                        <option value="1"> Mosquito net</option>
                                        <option value="2"> Mosquito repellent vaporizer, spray or cream
                                            <br>Use of natural remedies (eg:Maduruthala)
                                        </option>
                                        <option value="4"> wearing light colored clothes to cover the whole body at night.</option>
                                        <option value="8"> Use of windows with screens</option>
                                     </select>
                                </div>
                                </div>

<!-- 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Do you use any other preventive methods for
                                        mosquito bites at your present residence?</label>
                                    <select name="mosq_prevent" class="form-control">
                                        <option value="">select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No"> No</option>
                                    </select>
                                </div> -->

                                <div class="form-group">
                                    <label for="exampleInputPassword1">GPS Coordinate</label>
                                    <div class="col-md-12">

                                        <div class="col-md-6">
                                            <input type="text" placeholder="LAT : ex :- 89.5565" name="gps_lat" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" placeholder="LON : ex :- 89.5565" name="gps_long" class="form-control">
                                        </div>

                                    </div>
                                </div>


                                <br><br>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Date Ag test performed</label>
                                    <div class="col-md-12">
                                        <div class="col-md-12"></div>
                                        <input type="date" name="ag_date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                    </div>
                                </div>


<br><br>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Result of antigen detection by ICT</label>
                                    <!-- <input type="text" placeholder="" name="antigen_by_ICT" class="form-control"> -->
                                    <select name="antigen_by_ICT" class="form-control">
                                            <option value="">select</option>
                                            <option value="Positive"> Positive</option>
                                            <option value="Negative"> Negative</option>
                                            <option value="Not done"> Not done</option>
                                      
                                        </select>
                                </div>


                                <!--<div class="form-group">-->
                                <!--    <label for="exampleInputPassword1">Date of antigen detection</label>-->
                                <!--    <div class="col-md-12">-->
                                <!--        <div class="col-md-12"></div>-->
                                <!--        <input type="date" name="antigen_date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">-->
                                <!--    </div>-->
                                <!--</div>-->


                            
                                        <div class="form-group">
                                    <label for="exampleInputPassword1">Date of antibody</label>
                                    <div class="col-md-12">
                                        <div class="col-md-12"></div>
                                        <input type="date" name="antibody_date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Result of antibody detection by ELISA</label>
                                    <!-- <input type="text" placeholder="" name="antibody_by_elisa" class="form-control"> -->
                                    <select name="antibody_by_elisa" class="form-control">
                                        <option value="">select</option>
                                        <option value="Positive">Positive</option>
                                        <option value="Negative"> Negative</option>
                                        <option value="Not done"> Not done</option>
                                    </select>
                                </div>

                        



                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of collection of blood film</label>
                                    <div class="col-md-12">
                                        <div class="col-md-12"></div>
                                        <input type="date" name="collection_date" data-date-format="yyyy-mm-d" class="datepicker_v form-control ">
                                    </div>
                                </div>

                                


                                <div class="form-group">
                                    <label for="exampleInputPassword1"><br> Result of the blood film</label>
                                    <div class="col-md-12">
                                        <div class="col-md-12"></div>
                                        <!-- <input type="text" name="result_as_blood_samear" class="form-control"> -->
                                        <select name="result_as_blood_samear" class="form-control">
                                            <option value="">select</option>
                                            <option value="Positive">Positive</option>
                                            <option value="Negative"> Negative</option>
                                            <option value="Not done">Not done</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of examination of blood film</label>
                                    <div class="col-md-12">
                                        <div class="col-md-12"></div>
                                        <input type="date" name="date_of_examination" data-date-format="yyyy-mm-d" class="datepicker_v form-control ">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Species identified </label>
                                    <!-- <input type="text" name="species_diagnosed" class="form-control"> -->
                                    <select name="species_diagnosed" class="form-control">
                                        <option value="">select</option>
                                        <option value="Wb">Wb</option>
                                        <option value="Bm">Bm</option>
                                        <option value="other"> other</option>
                                    </select>
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputPassword1">MF count  </label>
                                    <input type="text" placeholder="" name="mf_count" class="form-control">
                                </div>



                         
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of starting treatment</label>
                                    <input type="date" name="treatment_start_date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                </div>



                                  <div class="form-group mt-2" style="margin-top: 50px;">
                                    <div class="col-md-12">
                                        <label for="treatment_given_alb">Approximate weight of the patient</label>
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



                                <div class="form-group mt-2" >
                                    <div class="col-md-12">
                                        <label for="treatment_given_DEC" style="margin-top: 10px;">Treatment given : DEC</label>
                                        {{-- <input type="text" name="treatment_given_DEC" class="form-control"  placeholder="" /> --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="text" name="treatment_given_DEC"
                                                            class="form-control" placeholder="" />
                                                    </div>
                                                    <label for="inputPassword" class="col-sm-2 col-form-label rowinput">
                                                        mg/Day</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="text" name="treatment_given_DEC2"
                                                            class="form-control" placeholder="" />
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
                                                    <label for="inputPassword" class="col-sm-2 col-form-label rowinput"> mg/stat </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>


                                <div class="form-group">
                                    <label for="treatment_given_DEC">Due date for 5P</label>
                                    <input type="date" name="due_date_for_5p" class="form-control">
                                </div>


                                <div class="form-group">
                                   
                                    <label for="exampleInputPassword1">Name of the PHFO/PHI collection the blood film</label>
                                    <input type="text" name="phfo_phi" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the  PHLT examined the blood film</label>
                                    <input type="text" name="investigation_officer" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Remarks</label>
                                    <input type="text" name="remarks" class="form-control" placeholder="" />
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the  treating medical officer</label>
                                    <input type="text" name="deisgnation_inv" class="form-control">
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

<script>
    function others(select) {
        var select = $(select);
        if (select.val() == "Other") {
            select.removeAttr('name');
            select.next().attr('name', 'lymph').show();
        } else {
            select.attr('name', 'lymph');
            select.next().removeAttr('name').hide();
        }
    }
</script>

<style>
    .rowinput {
        margin-left: 0px !important;
        padding-left: 0px;
        margin-top: 3px;
    }

    #idd .btn-group
    {
        width: 100%;
    }

    #idd .multiselect 
    {
          width: 100%;
    }

</style>