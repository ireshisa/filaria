<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>CASE INVESTIGATION FORM
            <br>
            <smallCASE>  MF POSITIVE PATIENT FOLLOW-UP FORM VIEW</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">CASE INVESTIGATION</a></li>
            <li class="active">MF POSITIVE PATIENT FOLLOW-UP FORM VIEW</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">



        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body" style="overflow: auto;">


<form method="post" action="{{ url('/caselx_custom') }}">
    <div class="col-md-2">
        <span> </span>
    </div>
      {{ csrf_field() }}
    <div class="col-md-8">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"> Select list </label>
            <div class="col-sm-10">
                <select class="js-example-basic-multiple  form-control " name="fild[]" multiple
                        data-live-search="true">
                    <option value="district"> District </option>
                    <option value="moh_area"> MOH Area </option>
                    <option value="slide_id_number"> Opd No</option>
                    <option value="patient_id"> Lab No</option>
                    <option value="date_of_rep"> Date of registration</option>
                    <option value="name_of_patient"> Name of the patient</option>
                    <option value="sex"> Sex </option>
                    <option value="age"> Age </option>
                    <option value="occupation"> Occupation</option>
                    <option value="address"> Current address</option>
                    <option value="pastaddress"> Past addresses </option>
                    <option value="period_of_residence"> Period residence</option>
                    <option value="contact"> Contact No</option>
                    <option value="gps_lat"> GPS Latitude</option>
                    <option value="gps_long"> GPS Longitude</option>
                    <option value="date_of_col"> collection of bloodX</option>
                    <option value="date_of_examination"> examination of bloodX</option>
                    <option value="species_diag"> Species</option>
                    <option value="mf_count"> MF count </option>
                    <option value="resultOfFilariaAg"> Result of Filaria Ag test</option>
                    <option value="resultOfFilariaAntibody">Result of Filaria Antibody</option>
                    <option value="pslf"> Suggestive symptoms</option>
                    <option value="history"> PMHx /PSHx</option>
                    <option value="Past_allergic_history"> Allergic Hx</option>
                    <option value="treatment_started_on"> Date Rx </option>
                    <option value="treatment_given_alb"> Wt </option>
                    <option value="treatment_given_DEC"> Treatment given : DEC </option>
                    <option value="albendazole1"> Albendazole </option>
                    <option value="actions_taken"> Actions taken</option>
                    <option value="history_of_mda">History Of MDA</option>
                    <option value="phfo_phi"> PHFO/PHI collection</option>
                    <option value="investigation_officer"> PHLT examined </option>
                    <option value="inv_date"> Due date for 5P </option>
                    <option value="remarks"> Remarks </option>
                    <option value="trading_Officer"> treating medical officer</option>
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














        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- <div class="box-header">
                        <h3 class="box-title">Hover Data Table</h3>
                    </div> -->
                    <!-- /.box-header -->
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











                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                
                              @foreach ($table_headers as $key => $value)

                              <th>{{$value}}</th>
                               @endforeach
                              <th> Action </th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($caselx_list as $caselx)
                                <tr>
                            @foreach ($table_row as $key2 => $value2)
                             <td>{{ $caselx->$value2}}</td>
                             @endforeach









                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $caselx->case_lx_id }}" data-target="#editModal2{{$caselx->case_lx_id}}"><i class="fa fa-pencil"
                                               aria-hidden="true"></i>
                                            <strong>Edit</strong> </button>


                                        <!--         <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $caselx->case_lx_id }}" data-target="#editModal{{$caselx->case_lx_id}}"><i class="fa fa-eye"
                                                aria-hidden="true"></i>
                                            <strong>View</strong> </button>   -->




                                        <a href="{{url('/view_caselx_data') }}/{{ $caselx->case_lx_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i> VIEW FOLLOW UP</a>
                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_caselx') }}/{{ $caselx->case_lx_id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <div id="editModal2{{$caselx->case_lx_id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT CASE IX</h4><br>
                                            </div>
                                            <form method="post" action="{{ url('/caselx_update') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <input type="hidden" name="case_lx_id" value="{{$caselx->case_lx_id}}" class="form-control" />
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">District</label> {{-- <input type="text" name="district" class="form-control" value="{{ Auth::user()->district }}" /> --}}

                                                                <select name="district" class="form-control">
                                                                    <option value="">Select</option>
                                                                    <option {{$caselx->district=="Ampara"
                                                                        ?"selected":""}} value="Ampara"> Ampara</option>
                                                                    <option {{$caselx->district=="Anuradhapura"
                                                                        ?"selected":""}} value="Anuradhapura">
                                                                        Anuradhapura</option>
                                                                    <option {{$caselx->district=="Badulla"
                                                                        ?"selected":""}} value="Badulla"> Badulla
                                                                    </option>
                                                                    <option {{$caselx->district=="Batticaloa"
                                                                        ?"selected":""}} value="Batticaloa"> Batticaloa
                                                                    </option>
                                                                    <option {{$caselx->district=="CMC" ?"selected":""}}
                                                                        value="CMC"> CMC</option>
                                                                    <option {{$caselx->district=="Colombo"
                                                                        ?"selected":""}} value="Colombo"> Colombo
                                                                    </option>
                                                                    <option {{$caselx->district=="Galle"
                                                                        ?"selected":""}} value="Galle"> Galle</option>
                                                                    <option {{$caselx->district=="Gampaha"
                                                                        ?"selected":""}} value="Gampaha"> Gampaha
                                                                    </option>
                                                                    <option {{$caselx->district=="Hambantota"
                                                                        ?"selected":""}} value="Hambantota"> Hambantota
                                                                    </option>
                                                                    <option {{$caselx->district=="Jaffna"
                                                                        ?"selected":""}} value="Jaffna"> Jaffna</option>
                                                                    <option {{$caselx->district=="Kalmunei"
                                                                        ?"selected":""}} value="Kalmunei"> Kalmunei
                                                                    </option>
                                                                    <option {{$caselx->district=="Kalutara"
                                                                        ?"selected":""}} value="Kalutara"> Kalutara
                                                                    </option>
                                                                    <option {{$caselx->district=="Kandy"
                                                                        ?"selected":""}} value="Kandy"> Kandy</option>
                                                                    <option {{$caselx->district=="Kegalle"
                                                                        ?"selected":""}} value="Kegalle"> Kegalle
                                                                    </option>
                                                                    <option {{$caselx->district=="Kilinochchi"
                                                                        ?"selected":""}} value="Kilinochchi">
                                                                        Kilinochchi</option>
                                                                    <option {{$caselx->district=="Kurunegala"
                                                                        ?"selected":""}} value="Kurunegala"> Kurunegala
                                                                    </option>
                                                                    <option {{$caselx->district=="Mannar"
                                                                        ?"selected":""}} value="Mannar"> Mannar</option>
                                                                    <option {{$caselx->district=="Matale"
                                                                        ?"selected":""}} value="Matale"> Matale</option>
                                                                    <option {{$caselx->district=="Matara"
                                                                        ?"selected":""}} value="Matara"> Matara</option>
                                                                    <option {{$caselx->district=="Monaragala"
                                                                        ?"selected":""}} value="Monaragala"> Monaragala
                                                                    </option>
                                                                    <option {{$caselx->district=="Mullaitivu"
                                                                        ?"selected":""}} value="Mullaitivu"> Mullaitivu
                                                                    </option>
                                                                    <option {{$caselx->district=="Nuwara Eliya"
                                                                        ?"selected":""}} value="Nuwara Eliya">Nuwara
                                                                        Eliya</option>
                                                                    <option {{$caselx->district=="Polonnaruwa"
                                                                        ?"selected":""}} value="Polonnaruwa">
                                                                        Polonnaruwa</option>
                                                                    <option {{$caselx->district=="Puttalam"
                                                                        ?"selected":""}} value="Puttalam"> Puttalam
                                                                    </option>
                                                                    <option {{$caselx->district=="Ratnapura"
                                                                        ?"selected":""}} value="Ratnapura"> Ratnapura
                                                                    </option>
                                                                    <option {{$caselx->district=="Trincomalee"
                                                                        ?"selected":""}} value="Trincomalee">
                                                                        Trincomalee</option>
                                                                    <option {{$caselx->district=="Vavuniya"
                                                                        ?"selected":""}} value="Vavuniya"> Vavuniya
                                                                    </option>
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">MOH Area</label>
                                                                <input value="{{$caselx->moh_area}}" type="text" name="moh_area" class="form-control">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">OPD identification
                                                                    number</label>
                                                                <input type="text" name="slide_id_number" class="form-control" value="{{$caselx->slide_id_number}}" />
                                                            </div>



                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Lab identification
                                                                    number </label>
                                                                <input type="text" name="patient_id" class="form-control" value="{{$caselx->patient_id}}" />
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date of registration
                                                                </label>
                                                                <input data-date-format="yyyy-mm-d" value="{{$caselx->date_of_rep}}" type="date" name="date_of_rep" class="form-control pull-right datepicker_v">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Name of the
                                                                    patient</label>
                                                                <input value="{{$caselx->name_of_patient}}" type="text" name="name_of_patient" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Sex</label>
                                                                <select name="sex" id="" class="form-control">
                                                                    <option {{$caselx->sex=="Male" ?"selected":""}}
                                                                        value="Male">Male</option>
                                                                    <option {{$caselx->sex="Female"?"selected":""}}
                                                                        value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Age </label>
                                                                <input value="{{$caselx->age}}" type="text" name="age" class="form-control">
                                                            </div>




                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Occupation</label>
                                                               <!-- <input type="text" value="{{$caselx->occupation}}" name="occupation" class="form-control" placeholder="" />  -->
                                                               
<select name="occupation" id="" class="form-control">
	<option {{$caselx->occupation="1"?"selected":""}}  value="1">Managers</option>
	<option {{$caselx->occupation="2"?"selected":""}}  value="2">Technicians and associated professions</option>
	<option {{$caselx->occupation="3"?"selected":""}}  value="3">Clerical support Workers</option>
	<option {{$caselx->occupation="4"?"selected":""}}  value="4">Services and sales workers </option>
	<option {{$caselx->occupation="5"?"selected":""}}  value="5">Skilled agricultural forestry and fishery workers </option>
	<option {{$caselx->occupation="6"?"selected":""}}  value="6">Crafted and related trade workers</option>
	<option {{$caselx->occupation="7"?"selected":""}}  value="7">Machine operators </option>
	<option {{$caselx->occupation="8"?"selected":""}}  value="8">Elementary occupation</option>
	<option {{$caselx->occupation="9"?"selected":""}}  value="9">Security forces</option>
	<option {{$caselx->occupation="10"?"selected":""}} value="10">Other</option>
</select> 
                                                            </div>






                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Current
                                                                    address</label>
                                                                <input value="{{$caselx->address}}" type="text" name="address" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Past addresses(If new
                                                                    to the area, places of residence during last 5
                                                                    years)</label>
                                                                <textarea name="pastaddress" id="" class="form-control" rows="3">{{$caselx->pastaddress}}</textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Period of residence</label>
                                                                <input value="{{$caselx->period_of_residence}}" type="text" name="period_of_residence" class="form-control" placeholder="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Contact
                                                                    number</label>
                                                                <input value="{{$caselx->contact}}" type="text" name="contact" class="form-control" placeholder="contact ...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">GPS Latitude </label>
                                                                <input value="{{$caselx->gps_lat}}" type="text" name="gps_lat" class="form-control" placeholder="ex :- 89.5565...">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">GPS Longitude
                                                                </label>
                                                                <input value="{{$caselx->gps_long}}" type="text" name="gps_long" class="form-control" placeholder="ex :- 89.5565 ...">
                                                            </div>

<br>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date of collection of blood films</label>
                                                                <input data-date-format="yyyy-mm-d" value="{{$caselx->date_of_col}}" type="date" name="date_of_col" class="form-control pull-right datepicker_v">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date of examination of the blood film </label>
                                                                <input data-date-format="yyyy-mm-d" value="{{$caselx->date_of_examination}}" type="date" name="date_of_examination" class="form-control pull-right datepicker_v" />
                                                            </div>


                                                        </div>




                                                        <div class="col-md-6">


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Species
                                                                    diagnosed</label> {{-- <input value="{{$caselx->species_diag}}" type="text" name="species_diag" class="form-control"> --}}
                                                                <select name="species_diag" class="form-control" required>
                                                                    <option value=""> </option>
                                                                    <option {{$caselx->species_diag=="Wb"
                                                                        ?"selected":""}} value="Wb">Wb</option>
                                                                    <option {{$caselx->species_diag=="Bm"
                                                                        ?"selected":""}} value="Bm">Bm</option>
                                                                    <option {{$caselx->species_diag=="other"
                                                                        ?"selected":""}} value="other">other</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> MF count</label>
                                                                <input value="{{$caselx->mf_count}}" type="number" pattern="^\d*(\.\d{0,2})?$" name="mf_count" class="form-control">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Result of Filaria Ag
                                                                    test (ICT)</label>

                                                                <select name="resultOfFilariaAg" class="form-control" required>
                                                                    <option value=""> Select </option>
                                                                    <option {{$caselx->resultOfFilariaAg=="Positive"
                                                                        ?"selected":""}} value="Positive">Positive
                                                                    </option>
                                                                    <option {{$caselx->resultOfFilariaAg=="Positive"
                                                                        ?"selected":""}} value="Negative">Negative
                                                                    </option>
                                                                    <option {{$caselx->resultOfFilariaAg=="Not done"
                                                                        ?"selected":""}} value="Not done">Not done
                                                                    </option>
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Result of Filaria
                                                                    Antibody detection by ELISA</label>
                                                                <select name="resultOfFilariaAntibody" class="form-control" required>
                                                                    <option value=""> Select </option>
                                                                    <option {{$caselx->
                                                                        resultOfFilariaAntibody=="Positive"
                                                                        ?"selected":""}} value="Positive">Positive
                                                                    </option>
                                                                    <option {{$caselx->
                                                                        resultOfFilariaAntibody=="Positive"
                                                                        ?"selected":""}} value="Negative">Negative
                                                                    </option>
                                                                    <option {{$caselx->resultOfFilariaAntibody=="Not
                                                                        done" ?"selected":""}} value="Not done">Not done
                                                                    </option>
                                                                </select>
                                                            </div>




    <div class="form-group">
         <label for="exampleInputPassword1">WBC/DC</label>
         <input type="text" name="wbc_dc" class="form-control" value="{{$caselx->wbc_dc}}" placeholder="" />
    </div>






                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Presence of symptoms
                                                                    suggestive of filaria </label>
                                                                <input value="{{$caselx->pslf}}" type="text" name="pslf" class="form-control">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Past medical /
                                                                    surgical history</label>
                                                                <input type="text" name="history" value="{{$caselx->history}}" class="form-control" placeholder="" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Allergic history
                                                                    (food, drug ,plaster )</label>
                                                                <input type="text" name="Past_allergic_history" value="{{$caselx->Past_allergic_history}}" class="form-control" placeholder="" />
                                                            </div>










                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Date of starting
                                                                    treatment</label>
                                                                <input data-date-format="yyyy-mm-d" value="{{$caselx->treatment_started_on}}" type="date" name="treatment_started_on" class="form-control pull-right datepicker_v">
                                                            </div>







                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label for="treatment_given_alb">Approx. weight of
                                                                        the patient</label>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" name="treatment_given_alb" class="form-control" value="{{$caselx->treatment_given_alb}}" placeholder="" />
                                                                                </div>
                                                                                <label for="inputPassword" class="col-sm-2 col-form-label rowinput">
                                                                                    Kg</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>




                                                                <div class="form-group mt-2">
                                                                    <div class="col-md-12">
                                                                        <label for="treatment_given_DEC" style="margin-top: 10px;">Treatment given
                                                                            : DEC</label> {{-- <input type="text" name="treatment_given_DEC" class="form-control" placeholder="" />                                                                        --}}
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" name="treatment_given_DEC" class="form-control" placeholder="" value="{{$caselx->treatment_given_DEC}}" />
                                                                                    </div>
                                                                                    <label for="inputPassword" class="col-sm-2 col-form-label rowinput">
                                                                                        mg/Day</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-8">
                                                                                        <input type="text" name="treatment_given_DEC2" class="form-control" placeholder="" value="{{$caselx->treatment_given_DEC2}}" />
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
                                                                                        <input type="text" name="albendazole1" value="{{$caselx->albendazole1}}" class="form-control" placeholder="" />
                                                                                    </div>
                                                                                    <label for="inputPassword" class="col-sm-2 col-form-label rowinput">
                                                                                        mg/stat</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>






                                                                <div class="col-md-12">
                                                                    <label for="treatment_given_DEC">Treatment given
                                                                        (with number of tablets)</label>
                                                                    <input type="text" name="treatment_given_DEC" class="form-control" value="{{$caselx->treatment_given_DEC}}" />
                                                                </div>

                                                            </div>





                                                            <div class="form-group" id="idd">
                                                                <label for="exampleInputPassword1"> Actions taken for
                                                                    prevention</label>
                                                                <select class="selectpicker form-control " name="actions_takenarray[]" multiple data-live-search="true">
                                                                    <option value="1" <?php if (strpos($caselx->actions_taken, "1") !== false) {echo "selected";}?>> Mosquito net.</option>
                                                                    <option value="2" <?php if (strpos($caselx->actions_taken, "2") !== false) {echo "selected";}?>> Mosquito repellent vaporizer, spray or cream.</option>
                                                                    <option value="3" <?php if (strpos($caselx->actions_taken, "3") !== false) {echo "selected";}?>> Use of natural remedies (maduruthala etc...)</option>
                                                                    <option value="4" <?php if (strpos($caselx->actions_taken, "4") !== false) {echo "selected";}?>> wearing light colored clothes to cover the whole body at night.</option>
                                                                    <option value="5" <?php if (strpos($caselx->actions_taken, "5") !== false) {echo "selected";}?>> Use windows with screens.</option>
                                                                    <option value="6" <?php if (strpos($caselx->actions_taken, "6") !== false) {echo "selected";}?>> Repair any damage in sewage pit and cover exhaust pipe opening with mosquito preventive net.</option>
                                                                    <option value="7" <?php if (strpos($caselx->actions_taken, "7") !== false) {echo "selected";}?>> Clean blocked drains.</option>
                                                                    <option value="8" <?php if (strpos($caselx->actions_taken, "8") !== false) {echo "selected";}?>> Other.</option>
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">History Of MDA (year) </label>
                                                                <input value="{{$caselx->history_of_mda}}" type="text" name="history_of_mda" class="form-control">
                                                            </div>



                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Name of the  PHFO/PHI obtained blood films</label>
                                                                <input value="{{$caselx->phfo_phi}}" type="text" name="phfo_phi" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> 
                                                                        Name of the  PHFO/PHI  collected the blood film
                                                                </label>
                                                                <input value="{{$caselx->investigation_officer}}" type="text" name="investigation_officer" class="form-control">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Due date for 5P</label>
                                                                <input data-date-format="yyyy-mm-d" value="{{$caselx->inv_date}}" type="date" name="inv_date" class="form-control pull-right datepicker_v">
                                                            </div>




                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Remarks</label>
                                                                <input type="text" name="remarks" class="form-control" placeholder="" value="{{$caselx->remarks}}" />
                                                            </div>



                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Name of the treating  medical officer</label>
                                                                <input type="text" name="trading_Officer" class="form-control" value="{{$caselx->trading_Officer}}" />
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

                            @foreach ($table_headers as $key => $value)

                              <th>{{$value}}</th>
                           
                               @endforeach

                                <th>Action</th>
                                </tr>
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
        margin-top: 4px;
    }
</style>

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
    
    #idd .dropdown-toggle {
        overflow: hidden;
    }
    
    .aere div button {
        width: 200px !important;
    }
</style>