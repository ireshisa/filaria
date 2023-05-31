<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			New Patient Registration Form<br>
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li>
				<aSS href="#">Patient Data</aSS>
			</li>
			<li class="active"> New Patient Registration Edit</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<!-- left column -->
			<form method="post" action="{{ url('/pation_data_update') }}">

				{{ csrf_field() }}
				<input hidden name="id" type="id" value="{{$Viewdata->id}}">
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


					<div class="box box-primary">
						<div class="box-header with-border">

						</div>

						<div class="box-body" style="overflow: hidden;">
							<div class="col-md-8" style="left: 50%;transform: translateX(-50%);">


								<div class="form-group form-group1 ">
									<label for="exampleInputEmail1">1. Date of Registration <span style="color:red;">*</span></label>
									<input type="date" name="date_of_registration" value="{{ !empty($Viewdata->date_of_registration) ? $Viewdata->date_of_registration : '' }}" required class="form-control">
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">2. District <span style="color:red;">*</span></label>
									<!-- <input type="text" name="Patient_district" class="form-control"> -->
									<select name="district" class="form-control" onchange="getMoh(this.value)" required="" autocomplete="off">
										<option value="">Select</option>
										@if ((Auth::user()->role !== 'ADMIN') & (Auth::user()->role !== 'AFC'))
										<option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
										@else
										@foreach ($district_list as $dis)
										<option value="{{ $dis->district }}" {{ $Viewdata->district == $dis->district  ? 'selected' : '' }}>{{ $dis->district }}</option>
										@endforeach
										@endif
									</select>
								</div>


								
								<div class="form-group form-group1">
									<label for="exampleInputEmail1">2.1 Residential District<span style="color:red;">*</span></label>
									<!-- <input type="text" name="Patient_district" class="form-control"> -->
									<select name="residentialdistrict" class="form-control"  required="" autocomplete="off">
										<option value="">Select</option>
										@if ((Auth::user()->role !== 'ADMIN') & (Auth::user()->role !== 'AFC'))
										<option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
										@else
										@foreach ($district_list as $dis)
										<option value="{{ $dis->district }}" {{ $Viewdata->residentialdistrict == $dis->district  ? 'selected' : '' }}>{{ $dis->district }}</option>
										@endforeach
										@endif
									</select>
								</div>




								

								<div class="form-group form-group1">
									<label for="exampleInputEmail1">3.Name of the clinic <span style="color:red;">*</span>  </label>
									<input list="clinic" name="name_of_clinic" value="{{ !empty($Viewdata->name_of_clinic) ? $Viewdata->name_of_clinic : '' }}"  id="clinicList" class="form-control" placeholder="Places where clinics are held">
									<datalist id="clinic">
									<option value="AFC HQ">
										<option value="Boralasgamuwa">
										<option value="Dehiwala">
										<option value="Kolonawa(IDH)">
										<option value="Galle">
										<option value="Ahangama">
										<option value="Ambalangoda">
										<option value="Kiribathgoda">
										<option value="Athanagalla">
										<option value="Peliyagoda">
										<option value="Beliatta">
										<option value="Ambalantota">
										<option value="Kalutara">
										<option value="Panadura">
										<option value="Wadduwa">
										<option value="Kurunagala">
										<option value="Kuliyapitiya">
										<option value="Nikaweratiya">
										<option value="Matara">
										<option value="Polhena">
										<option value="Kamburugamuwa">
										<option value="Chilaw">
										<option value="Puttalam">
										<option value="Dankottuwa">
										<option value="Walahapitiya">


									</datalist>




								</div>


								<div class="form-group form-group1">
									<label for="exampleInputEmail1">4.District serial number <span style="color:red;">*</span></label>
									<input type="text" name="district_lymphedema_no" value="{{ !empty($Viewdata->district_lymphedema_no) ? $Viewdata->district_lymphedema_no : '' }}" required class="form-control">
								</div>


								<div class="form-group form-group1">
									<label for="exampleInputEmail1">5.Name of Patient <span style="color:red;">*</span> </label>
									<input type="text" name="name_of_patient" value="{{ !empty($Viewdata->name_of_patient) ? $Viewdata->name_of_patient : '' }}" required class="form-control">
								</div>




								<div class="form-group form-group1">
									<label for="exampleInputEmail1">6.Sex <span style="color:red;">*</span> </label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="gender" id="gender" value="male" {{ $Viewdata->gender == 'male' ? 'checked' : '' }} required>
										<label class="form-check-label" for="gridRadios1">
											Male
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="gender" id="gender" value="female" {{ $Viewdata->gender == 'female' ? 'checked' : '' }} value="s" required>
										<label class="form-check-label" for="gridRadios1">
											Female
										</label>
									</div>

								</div>





								<div class="form-group form-group1">
									<label for="exampleInputEmail1">7.Date of Birth <span style="color:red;">*</span></label>
									<input type="date" name="date_of_birth" id="date_of_birth" onchange="ageCalculator()" value="{{ !empty($Viewdata->date_of_birth) ? $Viewdata->date_of_birth : '' }}" required class="form-control">
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">8. Age of the patient (auto filled) <span style="color:red;">*</span> </label>
									<input type="text" name="age_in_completed_years" id="age_in_completed_years" value="{{ !empty($Viewdata->age_in_completed_years) ? $Viewdata->age_in_completed_years : '0' }}" required class="form-control">
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">9. National Identity Card (NIC) number </label>
									<input type="text" name="nic_no" value="{{ !empty($Viewdata->nic_no) ? $Viewdata->nic_no : '' }}" class="form-control">
								</div>







								<div class="form-group form-group1">
									<label for="exampleInputEmail1">10.Civil Status</label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="civil_status" value="Married" {{ $Viewdata->civil_status == 'Married' ? 'checked' : '' }} onchange="displayRadioValue()" >
										<label class="form-check-label" for="gridRadios1">
											Married
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="civil_status" value="Single" {{ $Viewdata->civil_status == 'Single' ? 'checked' : '' }} onchange="displayRadioValue()" >
										<label class="form-check-label" for="gridRadios1">
											Single
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="civil_status" value="Divorced" {{ $Viewdata->civil_status == 'Divorced' ? 'checked' : '' }} onchange="displayRadioValue()" >
										<label class="form-check-label" for="gridRadios1">
											Divorced
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="civil_status" value="Separated" {{ $Viewdata->civil_status == 'Separated' ? 'checked' : '' }} onchange="displayRadioValue()" >
										<label class="form-check-label" for="gridRadios1">
											Separated
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="civil_status" value="other" {{ $Viewdata->civil_status != 'Married' && $Viewdata->civil_status != 'Single' && $Viewdata->civil_status != 'Divorced' && $Viewdata->civil_status != 'Separated' ? 'checked' : '' }} onchange="displayRadioValue()" >
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Other
										</label>




										<input class="form-check-input" type="text" name="civil_status_other" id="civil_status_other" style="width: 70% !important;" value="{{ !empty($Viewdata->civil_status) ? $Viewdata->civil_status : '' }}">
									</div>

								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">11. Area of living?</label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="area_of_living" id="Urban" value="Urban" {{ $Viewdata->area_of_living == 'Urban' ? 'checked' : '' }}>
										<label class="form-check-label" for="gridRadios1">
											Urban
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="area_of_living" id="Rural" value="Rural" {{ $Viewdata->area_of_living == 'Rural' ? 'checked' : '' }}>
										<label class="form-check-label" for="gridRadios1">
											Rural
										</label>
									</div>


								</div>





								<div class="form-group form-group1">
									<label for="exampleInputEmail1">12. Type of residence</label>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="residence" id="Temporary" {{ $Viewdata->residence == 'Temporary' ? 'checked' : '' }} value="Temporary" onchange="residencedisplayRadioValue()" >
										<label class="form-check-label" for="gridRadios1">
											Temporary
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="residence" id="Rural" value="Permanant" {{ $Viewdata->residence == 'Permanant' ? 'checked' : '' }} onchange="residencedisplayRadioValue()" >
										<label class="form-check-label" for="gridRadios1">
										Permanant
										</label>
									</div>





									<div class="form-check">
										<input class="form-check-input" type="radio" name="residence" id="residence_Other" value="other" {{ $Viewdata->residence != 'Temporary' &&  $Viewdata->residence != 'Rural' ? 'checked' : '' }} onchange="residencedisplayRadioValue()" >
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Other
										</label>
										<input class="form-check-input" type="text" name="residence_other" id="residence_other" value="{{ !empty($Viewdata->residence) ? $Viewdata->residence : '' }}" style="width: 70% !important;">
									</div>


								</div>







								<div class="form-group form-group1">
									<label for="exampleInputEmail1">13. Whom does the patient live with?</label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="living" id="With spouse" {{ $Viewdata->living == 'With spouse' ? 'checked' : '' }} value="With spouse" >
										<label class="form-check-label" for="gridRadios1">
											With spouse
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="living" id="With parents" {{ $Viewdata->living == 'With parents' ? 'checked' : '' }} value="With parents" >
										<label class="form-check-label" for="gridRadios1">
											With parents
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="living" id="With children" {{ $Viewdata->living == 'With children' ? 'checked' : '' }} value="With children" >
										<label class="form-check-label" for="gridRadios1">
											With children
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="living" id="With relatives" {{ $Viewdata->living == 'With relatives' ? 'checked' : '' }} value="With relatives" >
										<label class="form-check-label" for="gridRadios1">
											With relatives
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="living" id="Alone" value="Alone" {{ $Viewdata->living == 'Alone' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Alone
										</label>
									</div>
								</div>

								<div class="form-group form-group1">
									<label for="exampleInputEmail1">14. Level of education</label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="education" id="Never gone to school" value="Never gone to school" {{ $Viewdata->education == 'Never gone to school' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Never gone to school
										</label>
									</div>




									<div class="form-check">
										<input class="form-check-input" type="radio" name="education" id="Up to Grade 5" value="Up to Grade 5" {{ $Viewdata->education == 'Up to Grade 5' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Up to Grade 5
										</label>
									</div>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="education" id="Grade 6-10" value="Grade 6-10" {{ $Viewdata->education == 'Grade 6-10' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Grade 6-10
										</label>
									</div>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="education" id="Up to GCE (A/L)" value="Up to GCE (A/L)" {{ $Viewdata->education == 'Up to GCE (A/L)' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Up to GCE (A/L)
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="education" id="Higher education (degree/ diploma)" {{ $Viewdata->education == 'Higher occupation (degree/ diploma)' ? 'checked' : '' }} value="Higher education (degree/ diploma)" >
										<label class="form-check-label" for="gridRadios1">
											Higher education (degree/ diploma)
										</label>
									</div>


								</div>

								<div class="form-group form-group1">
									<label for="exampleInputEmail1">15 Occupation category</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Managers" value="Managers" onchange="occupationdisplayRadioValue()" {{ $Viewdata->occupation == 'Managers' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Managers
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Professionals" value="Professionals" {{ $Viewdata->occupation == 'Professionals' ? 'checked' : '' }} onchange="occupationdisplayRadioValue()" >
										<label class="form-check-label" for="gridRadios1">
											Professionals
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Technicians_and_associated_professionals" {{ $Viewdata->occupation == 'Technicians_and_associated_professionals' ? 'checked' : '' }} onchange="occupationdisplayRadioValue()" value="Technicians and associated professionals" >
										<label class="form-check-label" for="gridRadios1">
											Technicians and associated professionals
										</label>
									</div>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Clerical_support_workers" onchange="occupationdisplayRadioValue()" value="Clerical support workers" {{ $Viewdata->occupation == 'Clerical support workers' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Clerical support workers
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Clerical_support_workers" onchange="occupationdisplayRadioValue()" value="Service and sales workers" {{ $Viewdata->occupation == 'Service and sales workers' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Service and sales workers
										</label>
									</div>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Skilled_agricultural_forestry" onchange="occupationdisplayRadioValue()" value="Skilled agricultural, forestry" {{ $Viewdata->occupation == 'Skilled agricultural, forestry' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Skilled agricultural, forestry
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Skilled_agricultural_forestry" onchange="occupationdisplayRadioValue()" value="Craft related trade workers" {{ $Viewdata->occupation == 'Craft related trade workers' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Craft related trade workers
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Skilled_agricultural_forestry" onchange="occupationdisplayRadioValue()" value="Plant & machine operators and assemblers" {{ $Viewdata->occupation == 'Plant & machine operators and assemblers' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Plant & machine operators and assemblers
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Skilled_agricultural_forestry" onchange="occupationdisplayRadioValue()" value="Elementary occupations" {{ $Viewdata->occupation == 'Elementary occupations' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Elementary occupations
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Armed forces" value="Armed forces" onchange="occupationdisplayRadioValue()" {{ $Viewdata->occupation == 'Armed forces' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1">
											Armed forces
										</label>
									</div>


									<?php
									$otherenable = 0;
									if (
										$Viewdata->occupation != 'Up to GCE (A/L)'
										&& $Viewdata->occupation != 'Higher education (degree/ diploma)'
										&& $Viewdata->occupation != 'Managers'
										&& $Viewdata->occupation != 'Professionals'
										&& $Viewdata->occupation != 'Technicians and associated professionals'
										&& $Viewdata->occupation != 'Clerical support workers'
										&& $Viewdata->occupation != 'Service and sales workers'
										&& $Viewdata->occupation != 'Skilled agricultural, forestry'
										&& $Viewdata->occupation != 'Craft related trade workers'
										&& $Viewdata->occupation != 'Plant & machine operators and assemblers'
										&& $Viewdata->occupation != 'Elementary occupations'
										&& $Viewdata->occupation != 'Armed forces'
									) {
										$otherenable = 1;
									}
									?>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="occupation_Other" value="other" onchange="occupationdisplayRadioValue()"  {{ $otherenable == 1 ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
										Other
										</label>


										<input class="form-check-input" type="text" name="occupation_other_input" id="occupation_other_input" style="width: 70% !important;" value="{{ $otherenable == 1 ? $Viewdata->occupation : '' }}">
									</div>













								</div>

								<div class="form-group form-group1">
									<label for="exampleInputEmail1"> 16. Contact numbers: </label>

									<br><br>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Home</label>
										<div class="col-sm-10">
											<input type="text" name="telephone_home" class="form-control" value="{{ !empty($Viewdata->telephone_home) ? $Viewdata->telephone_home : '' }}">
										</div>
									</div>


									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Mobile</label>
										<div class="col-sm-10">
											<input type="text" name="telephone_mobile" class="form-control" value="{{ !empty($Viewdata->telephone_mobile) ? $Viewdata->telephone_mobile : '' }}">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Guardian (If applicable)</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="telephone_guardian" value="{{ !empty($Viewdata->telephone_guardian) ? $Viewdata->telephone_guardian : '' }}">
										</div>
									</div>

								</div>




								<div class="form-group form-group1">
									<label for="exampleInputEmail1">17. Address * </label>
									<input type="text" name="address" class="form-control" require   value="{{ !empty($Viewdata->address) ? $Viewdata->address : '' }}">
								</div>







								<div class="form-group form-group1">
									<label for="exampleInputEmail1"> 18. GPS coordinate:: </label>

									<br>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Longitude</label>
										<div class="col-sm-10">
											<input type="text" name="gps_point_lon" value="{{ !empty($Viewdata->gps_point_lon) ? $Viewdata->gps_point_lon : '' }}" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Latitude</label>
										<div class="col-sm-10">
											<input type="text" name="gps_point_latitude" value="{{ !empty($Viewdata->gps_point_latitude) ? $Viewdata->gps_point_latitude : '' }}" class="form-control">
										</div>
									</div>

								</div>

								<div class="form-group form-group1">
									<label for="exampleInputEmail1">18. MOH area</label>
									<input list="moh_list" name="moh"  class="form-control" autocomplete="off" value="{{ !empty($Viewdata->moh) ? $Viewdata->moh : '' }}">
									<datalist id="moh_list">

									</datalist>
								</div>


								<div class="form-group form-group1">
									<label for="exampleInputEmail1">19. PHM area</label>
									<input type="text" name="phm"  class="form-control" value="{{ !empty($Viewdata->phm) ? $Viewdata->phm : '' }}">
								</div>


								<div class="form-group form-group1">
									<label for="exampleInputEmail1">20. Grama Niladari area</label>
									<input type="text" name="gn_area"  class="form-control" value="{{ !empty($Viewdata->gn_area) ? $Viewdata->gn_area : '' }}">
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">21. Have you ever lived in an endemic area other than current residence</label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="endemic_area_than_cuurent_residence" value="yes" {{ $Viewdata->endemic_area_than_cuurent_residence == 'yes' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Yes
										</label>
									</div>

									<di class="form-check">
										<input class="form-check-input" type="radio" name="endemic_area_than_cuurent_residence" value="NO" {{ $Viewdata->endemic_area_than_cuurent_residence == 'No' ? 'checked' : '' }} >
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											No
										</label>
									</di	v>

								</div>


							</div>
						</div>



						<div class="box-footer">
							<center>
								<button type="submit" class="btn btn-primary">Submit</button>
							</center>
						</div>
					</div>
				</div>
		</div>
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






	.form-group1 {
		margin-bottom: 15px;
		background: #f9f9f9;
		padding: 20px;
		border-radius: 10px;
		box-shadow: 0px 0px 20px 1px #88888870;

	}
</style>
</form>
</div>
</section>
</div>


<script>
	function ageCalculator() {
		var userinput = document.getElementById("date_of_birth").value;
		var dob = new Date(userinput);
		if (userinput == null || userinput == '') {
			document.getElementById("message").innerHTML = "**Choose a date please!";
			return false;
		} else {

			//calculate month difference from current date in time
			var month_diff = Date.now() - dob.getTime();

			//convert the calculated difference in date format
			var age_dt = new Date(month_diff);

			//extract year from date    
			var year = age_dt.getUTCFullYear();

			//now calculate the age of the user
			var age = Math.abs(year - 1970);

			//display the calculated age
			return document.getElementById("age_in_completed_years").value = age;

			// return document.getElementById("age_in_completed_years").innerHTML =  
			//          "Age is: " + age + " years. ";
		}
	}


	// show input for othe option
	function displayRadioValue() {
		var ele = document.getElementsByName('civil_status');
		for (i = 0; i < ele.length; i++) {
			if (ele[i].checked)
				if (ele[i].value == "other") {
					document.getElementById("civil_status_other").style.display = "initial";
				} else {
					document.getElementById("civil_status_other").style.display = "none";
				}

		}
	}
	document.getElementById("civil_status_other").style.display = "none";










	function residencedisplayRadioValue() {
		var ele = document.getElementsByName('residence');
		for (i = 0; i < ele.length; i++) {
			if (ele[i].checked)
				if (ele[i].value == "other") {
					document.getElementById("residence_other").style.display = "initial";
				} else {
					document.getElementById("residence_other").style.display = "none";
				}

		}
	}
	document.getElementById("residence_other").style.display = "none";




	function occupationdisplayRadioValue() {
		var ele = document.getElementsByName('occupation');
		for (i = 0; i < ele.length; i++) {
			if (ele[i].checked)
				if (ele[i].value == "other") {
					document.getElementById("occupation_other_input").style.display = "initial";
				} else {
					document.getElementById("occupation_other_input").style.display = "none";
				}

		}
	}
	document.getElementById("occupation_other_input").style.display = "none";


	<?php
	if ($Viewdata->civil_status != 'Married' && $Viewdata->civil_status != 'Single' && $Viewdata->civil_status != 'Divorced' && $Viewdata->civil_status != 'Separated') {
		echo "civil_status_other_show()";
	}; ?>

	function civil_status_other_show() {


		document.getElementById("civil_status_other").style.display = "initial";
	}



	<?php
	if ($Viewdata->residence != 'Temporary' &&  $Viewdata->residence) {
		echo "	residence_other_show();";
	}
	?>

	function residence_other_show() {
		document.getElementById("residence_other").style.display = "initial";
	}
</script>