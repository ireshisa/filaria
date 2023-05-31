<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


<section class="content-header">
         <h1>REPORTING & FOLLOW-UP FORM FOR MIGRANTS VIEW<br>
               <small>(fill all fields) </small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">MIGRANT</a></li>
            <li class="active">REPORTING & FOLLOW-UP FORM FOR MIGRANTS VIEW </li>
        </ol>
</section>
    <!-- Main content -->
<section class="content">
                <div class="col-xs-12">
                <div class="box">

                    <div class="box-body" style="overflow: auto;">

<form method="post" action="{{ url('/migrant_custom ') }}">
    <div class="col-md-2">
        <span> </span>
    </div>
      {{ csrf_field() }}
    <div class="col-md-8">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"> Select list </label>
            <div class="col-sm-10">
                <select class="js-example-basic-multiple  form-control " name="fild[]" multiple data-live-search="true" required>
                    <option value="district"> District </option>
                    <option value="moh_area"> MOH Area </option>
                    <option value="date"> date </option>
                    <option value="patient_id"> Lab ID.No  </option>
                    <option value="opd_number"> OPD –ID.No-Migrant </option>
                    <option value="passport"> Passport No </option>
                    <option value="patient"> Name </option>
                    <option value="gender"> Sex </option>
                    <option value="age">Age</option>
                    <option value="country_of_origin">Country</option>
                    <option value="state">state</option>
                    <option value="home_town">Town/village </option>
                    <option value="work_place_in_lk">working Institution </option>
                    <option value="work_plc_address">Work address </option>
                    <option value="occupation">occupation</option>
                    <option value="how_long">Period of stay in Sri Lanka (since arrival) </option>
                    <option value="adress_in_sri_lanka">Resident. Add. </option>
                    <option value="lk_contact">Cont.no.(SL)  </option>
                    <option value="origin_contact"> Cont.no(Country)  </option>
                    <option value="had_filaria"> Prev.infec. Fila.  </option>
                    <option value="when_filaria"> when   (If yes,when?)  </option>
                    <option value="lymph"> Symptoms  (lim)  </option>
                    <option value="has_treated"> Prev.Rx   </option>
                    <option value="mass_drug_admin"> MDA </option>
                    <option value="mass_drug_when"> MDA (year)  </option>
                    <option value="mosq_netsarray"> Preventive methods </option>
                    <option value="gps_lat">GPS (Long.)</option>
                    <option value="gps_long"> GPS (Lat.) </option>
                    <option value="antigen_by_ICT">Ag result</option>
                    <option value="antibody_by_elisa">Ab result</option>
                    <option value="collection_date"> Date of collection of blood film </option>
                    <option value="result_as_blood_samear"> Result of the blood film  </option>
                    <option value="species_diagnosed">  Species diagnosed  </option>
                    <option value="mf_count">   MF count  </option>
                    <option value="treatment_start_date">   Date of starting treatment</option>
                    <option value="treatment_given_alb">Wt ( weight of the patient) </option>
                    <option value="treatment_given_DEC">Rx (Treatment given : DEC / Albendazole)</option>
                    <option value="Albendazole"> albendazole1 </option>
                    <option value="due_date_for_5p">  Due date for 5P </option>
                    <option value="phfo_phi">  PHFO/PHI    </option>
                    <option value="investigation_officer">  PHLT          </option>
                    <option value="remarks"> Remarks </option>
                    <option value="deisgnation_inv"> Name of treating medical officer </option>
                </select>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
  </div>

  </div>
    </div>
</div>




        <div class="row " style="padding: 0 0 !important">
            <div class="col-xs-12" style="padding: 0 0 !important">
                <div class="box">
                    <!-- <div class="box-header">
                        <h3 class="box-title">Hover Data Table</h3>
                    </div> -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(session()->has('update')) @if(session()->get('update')==true)
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
                        @endif @endif @if(session()->has('message')) @if(session()->get('message')==true)
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
                        @endif @endif
                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                     <th>OPD&nbsp;ID</th>
                                       <th>Lab&nbsp;ID</th>
                                       <th>District </th>
                                       <th>MOH&nbsp;area</th>
                                       <th>Date&nbsp;of reporting</th>
                                       <th>Passport No</th>
                                       <th>Name</th>
                                       <th>Sex</th>
                                       <th>Age </th>
                                       <th>Country</th>
                                       <th>State</th>
                                       <th>Town/village </th>
                                       <th>working&nbsp;Institution</th>
                                       <th>Work&nbsp;address</th>
                                       <th>Occupation </th>
                                       <th>Period of stay</th>
                                       <th>Resident. Add.</th>
                                       <th>Cont.no.(SL)  </th>
                                       <th>Cont.no(Country)</th>
                                       <th>Prev.infec. Fila.</th>
                                       <th>when   (If yes,when?) </th>
                                       <th>Symptoms  (Filariasis) </th>
                                       <th>Prev.Rx </th>
                                       <th>Fam.Hx </th>
                                       <th>MDA </th>
                                       <th>MDA (year) </th>
                                       <th>Preventive methods</th>
                                       <th>GPS (Long.)  </th>
                                       <th>GPS (Lat.) </th>
                                       <th>Ag result </th>
                                       <th>Ab result  </th>
                                       <th>Date of NBF </th>
                                       <th>Result of NBF </th>
                                       <th>Species  </th>
                                       <th>Mf count  </th>
                                       <th>Date Rx</th>
                                       <th>Wt</th>
                                       <th>Rx</th>
                                       <th>Due&nbsp;date for 5P</th>
                                       <th>PHFO/PHI </th>
                                       <th>PHLT</th>
                                       <th>MO </th>
                                       <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($migrant_list as $migrant)
                                <tr>
                                    <td>{{ $migrant->opd_number }}</td>
                                    <td>{{ $migrant->patient_id }}</td>
                                    <td>{{ $migrant->district }}</td>
                                    <td>{{ $migrant->moh_area }}</td>
                                    <td>{{ $migrant->date }}</td>
                                    <td>{{ $migrant->passport }}</td>
                                    <td>{{ $migrant->patient }}</td>
                                    <td>{{ $migrant->gender }}</td>
                                    <td>{{ $migrant->age }}</td>
                                    <td>{{ $migrant->country_of_origin }}</td>
                                    <td>{{ $migrant->state }}</td>
                                    <td>{{ $migrant->home_town }}</td>
                                    <td>{{ $migrant->work_place_in_lk }}</td>
                                    <td>{{ $migrant->work_plc_address }}</td>
                                    <td>{{ $migrant->occupation }}</td>
                                    <td>{{ $migrant->how_long }}</td>
                                    <td>{{ $migrant->adress_in_sri_lanka }}</td>
                                    <td>{{ $migrant->lk_contact }}</td>
                                    <td>{{ $migrant->origin_contact }}</td>
                                    <td>{{ $migrant->had_filaria }}</td>
                                    <td>{{ $migrant->when_filaria }}</td>
                                    <td>{{ $migrant->lymph }}</td>
                                    <td>{{ $migrant->has_treated }}</td>
                                    <td>{{ $migrant->has_family_members }}</td>
                                    <td>{{ $migrant->mass_drug_admin }}</td>
                                    <td>{{ $migrant->mass_drug_when }}</td>
                                    <td>{{ $migrant->mass_drug_admin }}</td>
                                    <td>{{ $migrant->gps_lat }}</td>
                                    <td>{{ $migrant->gps_long }}</td>
                                    <td>{{ $migrant->antigen_by_ICT }}</td>
                                    <td>{{ $migrant->antibody_by_elisa }}</td>
                                    <td>{{ $migrant->collection_date }}</td>
                                    <td>{{ $migrant->result_as_blood_samear }}</td>
                                    <td>{{ $migrant->species_diagnosed }}</td>
                                    <td>{{ $migrant->mf_count }}</td>
                                    <td>{{ $migrant->treatment_start_date }}</td>
                                    <td>{{ $migrant->treatment_given_alb }}</td>
                                    <td>{{ $migrant->treatment_given_DEC }}&nbsp;mg/Day 
                                      <br>{{ $migrant->treatment_given_DEC2 }} Days 
                                      <br>{{ $migrant->albendazole1}} mg/Stat 
                                    </td>
                                    <td>{{ $migrant->due_date_for_5p }}</td>
                                    <td>{{ $migrant->phfo_phi }}</td>
                                    <td>{{ $migrant->investigation_officer }}</td>
                                    <td>{{ $migrant->deisgnation_inv }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $migrant->migrant_id }}" data-target="#editModal2{{$migrant->migrant_id}}"><i class="fa fa-pencil"
                                                aria-hidden="true"></i>
                                            <strong>Edit</strong> </button> {{-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $migrant->migrant_id }}" data-target="#editModal{{$migrant->migrant_id}}"><i class="fa fa-eye"
                                            aria-hidden="true"></i>
                                        <strong>View</strong> </button> --}}
                                        <a href="{{url('/view_migrant_data') }}/{{ $migrant->migrant_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i> View Follow Up</a>
                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_migrant') }}/{{ $migrant->migrant_id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <div id="editModal2{{$migrant->migrant_id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT MIGRANT DETAIL </h4><br>
                                            </div>
                                            <form method="post" action="{{ url('/migrant_update ') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <input type="hidden" name="migrant_id" value="{{$migrant->migrant_id}}" class="form-control" />
                                                    <div class="box-body">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">District</label>
                                                                      <select name="district" class="form-control">
                                            <option value="">Select</option>
                                            <option {{$migrant->district=="Ampara" ?"selected":""}} value="Ampara"> Ampara</option>
                                            <option {{$migrant->district=="Anuradhapura" ?"selected":""}} value="Anuradhapura"> Anuradhapura</option>
                                            <option {{$migrant->district=="Badulla" ?"selected":""}} value="Badulla"> Badulla</option>
                                            <option {{$migrant->district=="Batticaloa" ?"selected":""}} value="Batticaloa"> Batticaloa</option>
                                            <option {{$migrant->district=="CMC" ?"selected":""}} value="CMC"> CMC</option>
                                            <option {{$migrant->district=="Colombo" ?"selected":""}} value="Colombo"> Colombo</option>
                                            <option {{$migrant->district=="Galle" ?"selected":""}} value="Galle"> Galle</option>
                                            <option {{$migrant->district=="Gampaha" ?"selected":""}} value="Gampaha"> Gampaha</option>
                                            <option {{$migrant->district=="Hambantota" ?"selected":""}} value="Hambantota"> Hambantota</option>
                                            <option {{$migrant->district=="Jaffna" ?"selected":""}} value="Jaffna"> Jaffna</option>
                                            <option {{$migrant->district=="Kalmunei" ?"selected":""}} value="Kalmunei"> Kalmunei</option>
                                            <option {{$migrant->district=="Kalutara" ?"selected":""}} value="Kalutara"> Kalutara</option>
                                            <option {{$migrant->district=="Kandy" ?"selected":""}} value="Kandy"> Kandy</option>
                                            <option {{$migrant->district=="Kegalle" ?"selected":""}} value="Kegalle"> Kegalle</option>
                                            <option {{$migrant->district=="Kilinochchi" ?"selected":""}} value="Kilinochchi"> Kilinochchi</option>
                                            <option {{$migrant->district=="Kurunegala" ?"selected":""}} value="Kurunegala"> Kurunegala</option>
                                            <option {{$migrant->district=="Mannar" ?"selected":""}} value="Mannar"> Mannar</option>
                                            <option {{$migrant->district=="Matale" ?"selected":""}} value="Matale"> Matale</option>
                                            <option {{$migrant->district=="Matara" ?"selected":""}} value="Matara"> Matara</option>
                                            <option {{$migrant->district=="Monaragala" ?"selected":""}} value="Monaragala"> Monaragala</option>
                                            <option {{$migrant->district=="Mullaitivu" ?"selected":""}} value="Mullaitivu"> Mullaitivu</option>
                                            <option {{$migrant->district=="Nuwara Eliya" ?"selected":""}} value="Nuwara Eliya">Nuwara Eliya</option>
                                            <option {{$migrant->district=="Polonnaruwa" ?"selected":""}} value="Polonnaruwa"> Polonnaruwa</option>
                                            <option {{$migrant->district=="Puttalam" ?"selected":""}} value="Puttalam"> Puttalam</option>
                                            <option {{$migrant->district=="Ratnapura" ?"selected":""}} value="Ratnapura"> Ratnapura</option>
                                            <option {{$migrant->district=="Trincomalee" ?"selected":""}} value="Trincomalee"> Trincomalee</option>
                                            <option {{$migrant->district=="Vavuniya" ?"selected":""}} value="Vavuniya"> Vavuniya</option>
                                        </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">MOH Area</label>
                                                                <input value="{{ $migrant->passport }}" type="text" name="moh_area" class="form-control" value="{{ $migrant->moh_area}}">

                                                            </div>




                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date of reporting</label>
                                                                <input value="{{ $migrant->date }}" type="date" name="date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> <br>Lab identification number </label>
                                                                <input type="text" name="patient_id" class="form-control" value="{{ $migrant->patient_id }}">
                                                            </div> 

                                                            <div class="form-group">
                                                                    <label for="exampleInputPassword1"> <br>OPD identification number </label>
                                                                    <input type="text" name="opd_number" class="form-control" placeholder="" value="{{ $migrant->opd_number }}">
                                                            </div>


                                                         <div class="form-group">
                                                                <label for="exampleInputPassword1">Patient Passport  number </label>
                                                                <input value="{{ $migrant->passport }}" type="text" name="passport" class="form-control" placeholder="Patient Passport Number...">
                                                            </div>




                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Name </label>
                                                                <input value="{{ $migrant->patient }}" type="text" name="patient" class="form-control" placeholder="Name od the patient...">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Patient Passport
                                                                    number </label>
                                                                <input value="{{ $migrant->passport }}" type="text" name="passport" class="form-control" placeholder="Patient Passport Number...">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Sex</label>
                                                                <select name="gender" class="form-control">
                                                                    <option value=""> </option>
                                                                    <option {{ $migrant->gender=="Male"?"selected":"" }} value="Male">Male</option>
                                                                    <option {{ $migrant->gender=="Female"?"selected":"" }}value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Age of
                                                                    Patient</label>
                                                                <input value="{{ $migrant->age }}" type="text" name="age" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Country of
                                                                    Origin</label>
                                                                <input value="{{ $migrant->country_of_origin }}" type="text" name="country_of_origin" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">State </label>
                                                                <input value="{{ $migrant->state }}" type="text" name="state" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Home town/village endemic for filariasis</label>
                                                                <input value="{{ $migrant->home_town }}" type="text" name="home_town" class="form-control">
                                                            </div>

<!--
   <div class="form-group">
     <label for="exampleInputPassword1">Is your Home Town/village endemic for filariasis? </label>
     <input value="{{ $migrant->is_endemic }}" type="text" name="is_endemic" class="form-control">
   </div>
 -->



                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Working institution in Sri Lanka</label>
                                                                <input value="{{ $migrant->work_place_in_lk }}" type="text" name="work_place_in_lk" class="form-control">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Address of work place</label>
                                                                <input value="{{ $migrant->work_plc_address }}" type="text" name="work_plc_address" class="form-control">
                                                            </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Occupation </label>
                                         <select name="occupation" id="#occupation" class="form-control">
	                                        <option value="1"  {{ $migrant->occupation=="1"?"selected":"" }} >Managers</option>
	                                        <option value="2"  {{ $migrant->occupation=="2"?"selected":"" }} >Technicians and associated professions</option>
	                                        <option value="3"  {{ $migrant->occupation=="3"?"selected":"" }} >Clerical support Workers</option>
	                                        <option value="4"  {{ $migrant->occupation=="4"?"selected":"" }} >Services and sales workers </option>
	                                        <option value="5"  {{ $migrant->occupation=="5"?"selected":"" }} >Skilled agricultural forestry and fishery workers </option>
	                                        <option value="6"  {{ $migrant->occupation=="6"?"selected":"" }} >Crafted and related trade workers</option>
	                                        <option value="7"  {{ $migrant->occupation=="7"?"selected":"" }} >Machine operators </option>
	                                        <option value="8"  {{ $migrant->occupation=="8"?"selected":"" }} >Elementary occupation</option>
	                                        <option value="9"  {{ $migrant->occupation=="9"?"selected":"" }} >Security forces</option>
	                                        <option value="10" {{ $migrant->occupation=="10"?"selected":""}} >Other</option>
                                          </select>   
                                    </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">How long have been in Sri Lanka</label>
                                                                <input value="{{ $migrant->how_long }}" type="text" name="how_long" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Residential address in Sri Lanka</label>
                                                                <input value="{{ $migrant->adress_in_sri_lanka }}" type="text" name="adress_in_sri_lanka" class="form-control">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Contact numbers Sri
                                                                    Lanka</label>
                                                                <input value="{{ $migrant->lk_contact }}" type="text" name="lk_contact" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Contact numbers in country of origin</label>
                                                                <input value="{{ $migrant->origin_contact }}" type="text" name="origin_contact" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Previous infection with filariasis</label>
                                                                <select name="had_filaria" class="form-control">
                                                                    <option value=""> </option>
                                                                    <option {{ $migrant->
                                                                        had_filaria=="Yes"?"selected":"" }}
                                                                        value="Yes">Yes</option>
                                                                    <option {{ $migrant->had_filaria=="No"?"selected":""
                                                                        }} value="No">No</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                             <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">If yes,when?</label>
                                                                <select name="when_filaria" class="form-control">
                                                                    <option value=""> </option>
                                                                    <option {{ $migrant->when_filaria=="Within one year"?"selected":"" }} value="Within one year">Within one year</option>
                                                                    <option {{ $migrant->when_filaria=="More than one year"?"selected":"" }} value="More than one year">More than one year
                                                                    </option>
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Did you get any clinical symptoms?</label> 
                                                                <input value="{{ $migrant->lymph }}" type="text" name="lymph" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Was he/she treated?</label>
                                                                <select name="has_treated" class="form-control">
                                                                    <option value=""> </option>
                                                                    <option {{ $migrant->has_treated=="Yes"?"selected":""}} value="Yes">Yes</option>
                                                                    <option {{ $migrant->has_treated=="No"?"selected":""}} value="No">No</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">History of family members treated for filariasis/lymphoedema</label>
                                                                <select name="has_family_members" class="form-control">
                                                                    <option value=""> </option>
                                                                    <option {{ $migrant->has_family_members=="Yes"?"selected":"" }} value="Yes">Yes</option>
                                                                    <option {{ $migrant->has_family_members=="No"?"selected":"" }}value="No">No</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> History of participation in a Mass Drug Administration (MDA)</label>
                                                                <select name="mass_drug_admin" class="form-control">
                                                                    <option value=""> </option>
                                                                    <option {{ $migrant->mass_drug_admin=="Yes"?"selected":"" }} value="Yes">Yes</option>
                                                                    <option {{ $migrant->mass_drug_admin=="No"?"selected":"" }} value="No">No</option>
                                                                </select>
                                                            </div>

                                     <div class="form-group">
                                          <label for="exampleInputPassword1">If Yes, when did you participate(Year)?</label>
                                          <input type="text" name="mass_drug_when" value="{{ $migrant->mass_drug_when }}" class="datepicker_v form-control pull-right">
                                     </div>
                                           <br><br>


                              <div class="form-group">
                                    <label for="exampleInputPassword1">Measures adopted to prevent mosquito bites</label>
                                <div>
                                     <select class="multiple-checkboxes form-control "  name="mosq_netsarray[]" multiple data-live-search="true">
                                        <option  <?php if (strpos($migrant->actions_taken, "1") !== false) {echo "selected";}?> value="1"> Mosquito net</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "2") !== false) {echo "selected";}?> value="2">Mosquito repellent vaporizer, spray or cream Use of natural remedies (eg:Maduruthala)</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "4") !== false) {echo "selected";}?> value="4"> wearing light colored clothes to cover the whole body at night.</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "8") !== false) {echo "selected";}?> value="8"> Use windows with screens.</option>
                                     </select>
                              </div>
                             </div>





                             <div class="form-group">
                                <label for="exampleInputPassword1">GPS Coordinate</label>
                                 <div class="col-md-12">
                                    <div class="col-md-6">
                                        <input value="{{ $migrant->gps_lat }}" type="text" placeholder="LAT" name="gps_lat" class="form-control">
                                     </div>
                                     <div class="col-md-6">
                                          <input value="{{ $migrant->gps_long }}" type="text" placeholder="LON" name="gps_long" class="form-control">
                                     </div>
                                 </div>
                             </div>



                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Date Ag test performed</label>
                                    <div class="col-md-12">
                                        <div class="col-md-12"></div>
                                        <input type="date" value="{{ $migrant->ag_date}}"  name="ag_date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                    </div>
                                </div>

<br><br>


                              <div class="form-group">
                                    <label for="exampleInputPassword1">Result of antigen detection by ICT</label>
                                    <!-- <input type="text" placeholder="" name="antigen_by_ICT" class="form-control"> -->
                                    <select name="antigen_by_ICT" class="form-control">
                                            <option value="">select</option>
                                            <option {{ $migrant->antigen_by_ICT=="Positive"?"selected":"" }} value="Positive">Positive</option>
                                            <option {{ $migrant->antigen_by_ICT=="Negative"?"selected":"" }} value="Negative"> Negative</option>
                                            <option {{ $migrant->antigen_by_ICT=="Not done"?"selected":"" }} value="Negative"> Not done</option>
                                              
                                        </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of antigen detection</label>
                                    <div class="col-md-12">
                                        <div class="col-md-12"></div>
                                        <input type="date" value="{{ $migrant->antigen_date}}" name="antigen_date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                    </div>
                                </div>



                                

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Result of antibody detection by ELISA</label>
                                    <!-- <input type="text" placeholder="" name="antibody_by_elisa" class="form-control"> -->
                                    <select name="antibody_by_elisa" class="form-control">
                                        <option value="">select</option>
                                        <option {{ $migrant->antibody_by_elisa=="Positive"?"selected":"" }} value="Positive">Positive</option>
                                        <option {{ $migrant->antibody_by_elisa=="Negative"?"selected":"" }} value="Negative"> Negative</option>
                                        <option {{ $migrant->antibody_by_elisa=="Not done"?"selected":"" }} value="Not done"> Negative</option>
                                            <option {{ $migrant->antigen_by_ICT=="Not done"?"selected":"" }} value="Negative"> Not done</option>

                                    </select>
                                </div>


                              


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of antibody</label>
                                    <div class="col-md-12">
                                        <div class="col-md-12"></div>
                                        <input type="date" name="antibody_date"  value="{{ $migrant->antibody_date}}" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                    </div>
                                </div>






                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date of NBF</label>
                                                                <div class="col-md-12">
                                                                    <div class="col-md-12"></div>
                                                                    <input type="date" value="{{ $migrant->collection_date }}" name="collection_date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                                                </div>

                                                            </div>



                            <div class="form-group">
                                    <label for="exampleInputPassword1"><br> Result of the blood film</label>
                                <div class="col-md-12">
                                        <div class="col-md-12"></div>
                                        <!-- <input type="text" name="result_as_blood_samear" class="form-control"> -->
                                    <select name="result_as_blood_samear" class="form-control">
                                         <option value="">select</option>
                                         <option {{ $migrant->result_as_blood_samear=="Positive"?"selected":"" }} value="Positive">Positive</option>
                                         <option {{ $migrant->result_as_blood_samear=="Negative"?"selected":"" }} value="Negative"> Negative</option>
                                         <option {{ $migrant->result_as_blood_samear=="Negative"?"selected":"" }}value="Not done">Not done</option>
                                    </select>
                                </div>
                            </div>








                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date of examination of blood film</label>
                                    <div class="col-md-12">
                                        <div class="col-md-12"></div>
                                        <input type="date" name="date_of_examination" value="{{ $migrant->date_of_examination }}" data-date-format="yyyy-mm-d" class="datepicker_v form-control ">
                                    </div>
                                </div>





                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Species identified  </label>
                                    <!-- <input type="text" name="species_diagnosed" class="form-control"> -->
                                    <select name="species_diagnosed" class="form-control">
                                        <option value="">select</option>
                                        <option {{ $migrant->species_diagnosed=="Wb"?"selected":"" }} value="Wb">Wb</option>
                                        <option {{ $migrant->species_diagnosed=="Bm"?"selected":"" }} value="Bm">Bm</option>
                                        <option {{ $migrant->species_diagnosed=="other"?"selected":"" }} value="other"> other</option>
                                    </select>
                                </div>







                               <div class="form-group">
                                      <label for="exampleInputPassword1">MF count</label>
                                      <input type="text" value="{{ $migrant->mf_count }}" name="mf_count" class="form-control">
                               </div>







             <div class="form-group mt-2" style="margin-top: 50px;">
                                    <div class="col-md-12">
                                        <label for="treatment_given_alb">Approximate weight of the patient</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                     <input type="text"value="{{ $migrant->treatment_given_alb }}" name="treatment_given_alb" class="form-control" placeholder="" />
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
                                                        <input type="text" name="treatment_given_DEC" value="{{ $migrant->treatment_given_DEC }}"
                                                            class="form-control" placeholder="" />
                                                    </div>
                                                    <label for="inputPassword" class="col-sm-2 col-form-label rowinput">
                                                        mg/Day</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="text" name="treatment_given_DEC2" value="{{ $migrant->treatment_given_DEC2 }}"
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
                                                        <input type="text" name="albendazole1"value="{{ $migrant->albendazole1 }}"
                                                            class="form-control" placeholder="" />
                                                    </div>
                                                    <label for="inputPassword" class="col-sm-2 col-form-label rowinput">
                                                        mg/stat</label>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                 </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Due date for 5P</label>
                                                                <input type="date" value="{{ $migrant->treatment_start_date }}" name="treatment_start_date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Name of the  PHFO/PHI collection blood film</label>
                                                                <input type="text" name="phfo_phi" value="{{ $migrant->phfo_phi }}" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Name of the  PHLT examined the blood film</label>
                                                                <input type="text" value="{{ $migrant->investigation_officer }}" name="investigation_officer" class="form-control">
                                                            </div>
 
                                                    <div class="form-group">
                                                         <label for="exampleInputPassword1">Remarks</label>
                                                         <input type="text" name="remarks" class="form-control" placeholder="" value="{{ $migrant->remarks }}" />
                                                     </div>

                                                    <div class="form-group">
                                                    <label for="exampleInputPassword1">Name of the treating medical officer</label>
                                                         <input type="text" name="deisgnation_inv" value="{{ $migrant->deisgnation_inv }}" class="form-control">
                                                    </div>

                                                </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                @endforeach
                            </tbody>
                            <tfoot>
                                       <th>OPD&nbsp;ID</th>
                                       <th>Lab&nbsp;ID</th>
                                       <th>District </th>
                                       <th>MOH&nbsp;area</th>
                                       <th>Date&nbsp;of reporting</th>
                                       <th>Passport No</th>
                                       <th>Name</th>
                                       <th>Sex</th>
                                       <th>Age </th>
                                       <th>Country</th>
                                       <th>State</th>
                                       <th>Town/village </th>
                                       <th>working&nbsp;Institution</th>
                                       <th>Work&nbsp;address</th>
                                       <th>Occupation </th>
                                       <th>Period of stay</th>
                                       <th>Resident. Add.</th>
                                       <th>Cont.no.(SL)  </th>
                                       <th>Cont.no(Country)</th>
                                       <th>Prev.infec. Fila.</th>
                                       <th>when   (If yes,when?) </th>
                                       <th>Symptoms  (Filariasis) </th>
                                       <th>Prev.Rx </th>
                                       <th>Fam.Hx </th>
                                       <th>MDA </th>
                                       <th>MDA (year) </th>
                                       <th>Preventive methods</th>
                                       <th>GPS (Long.)  </th>
                                       <th>GPS (Lat.) </th>
                                       <th>Ag result </th>
                                       <th>Ab result  </th>
                                       <th>Date of NBF </th>
                                       <th>Result of NBF </th>
                                       <th>Species  </th>
                                       <th>Mf count  </th>
                                       <th>Date Rx</th>
                                       <th>Wt</th>
                                       <th>Rx</th>
                                       <th>Due&nbsp;date for 5P</th>
                                       <th>PHFO/PHI </th>
                                       <th>PHLT</th>
                                       <th>MO </th>
                                       <th>Action</th>
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