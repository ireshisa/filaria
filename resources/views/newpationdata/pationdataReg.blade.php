<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			New Patient Registration Form<br>
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Patient Data</a></li>
			<li class="active">New Patient Registration Form</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<!-- left column -->
			<form method="post" action="{{ url('/pation_data_save') }}">

				{{ csrf_field() }}
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
									<input type="date" name="date_of_registration" required class="form-control">
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">2. District of Registration <span style="color:red;">*</span> </label>
									<!-- <input type="text" name="Patient_district" class="form-control"> -->
									<select name="district" class="form-control" onchange="getMoh(this.value)" required autocomplete="off">
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




								
								<div class="form-group form-group1">
									<label for="exampleInputEmail1">2.1 District of Residence  <span style="color:red;">*</span> </label>
									<!-- <input type="text" name="Patient_district" class="form-control"> -->
									<select name="residentialdistrict" class="form-control" required autocomplete="off">
										<option value="">Select</option>
						
<option value="Colombo">Colombo</option>
<option value="Gampaha"> Gampaha</option>
<option value="Kalutara"> Kalutara</option>
<option value="Kandy"> Kandy</option>
<option value="Matale"> Matale</option>
<option value="Nuwara Eliya"> Nuwara Eliya</option>
<option value="Galle"> Galle</option>
<option value="Matara"> Matara</option>
<option value="Hambantota"> Hambantota</option>
<option value="Jaffna"> Jaffna</option>
<option value="Kilinochchi"> Kilinochchi</option>
<option value="Mannar"> Mannar</option>
<option value="Vavuniya"> Vavuniya</option>
<option value="Mullaitivu"> Mullaitivu</option>
<option value="Batticaloa"> Batticaloa</option>
<option value="Ampara"> Ampara</option>
<option value="Trincomalee"> Trincomalee</option>
<option value="Kurunegala"> Kurunegala</option>
<option value="Puttalam"> Puttalam</option>
<option value="Anuradhapura"> Anuradhapura</option>
<option value="Polonnaruwa"> Polonnaruwa</option>
<option value="Badulla"> Badulla</option>
<option value="Moneragala"> Moneragala</option>
<option value="Ratnapura"> Ratnapura</option>
<option value="Kegalle"> Kegalle</option>


									</select>
								</div>






								<div class="form-group form-group1">
									<label for="exampleInputEmail1">3.Name of the clinic <span style="color:red;">*</span> </label>
									<input list="clinic" name="name_of_clinic" id="clinicList" class="form-control" placeholder="Places where clinics are held">
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
										<option value="Hambantota">
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
									<label for="exampleInputEmail1">4. District serial number <span style="color:red;">*</span></label>
									<input type="text" name="district_lymphedema_no" required class="form-control">
								</div>


								<div class="form-group form-group1">
									<label for="exampleInputEmail1">5.Name of Patient <span style="color:red;">*</span> </label>
									<input type="text" name="name_of_patient" required class="form-control">
								</div>




								<div class="form-group form-group1">
									<label for="exampleInputEmail1">6.Sex <span style="color:red;">*</span> </label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="gender" id="gender" value="male" required>
										<label class="form-check-label" for="gridRadios1">
											Male
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="gender" id="gender" value="female" required>
										<label class="form-check-label" for="gridRadios1">
											Female
										</label>
									</div>

								</div>





								<div class="form-group form-group1">
									<label for="exampleInputEmail1">7.Date of Birth <span style="color:red;">*</span> </label>
									<input type="date" name="date_of_birth" id="date_of_birth" onchange="ageCalculator()" required class="form-control">
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">8. Age of the patient (auto filled)</label>
									<input type="text" name="age_in_completed_years" id="age_in_completed_years" required class="form-control">
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">9. National Identity Card (NIC) number </label>
									<input type="text" name="nic_no" class="form-control">
								</div>







								<div class="form-group form-group1">
									<label for="exampleInputEmail1">10.Civil Status</label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="civil_status" id="gender" value="Married" onchange="displayRadioValue()">
										<label class="form-check-label" for="gridRadios1">
											Married
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="civil_status" id="gender" value="Single" onchange="displayRadioValue()">
										<label class="form-check-label" for="gridRadios1">
											Single
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="civil_status" id="gender" value="Divorced" onchange="displayRadioValue()">
										<label class="form-check-label" for="gridRadios1">
											Divorced
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="civil_status" id="gender" value="Separated" onchange="displayRadioValue()">
										<label class="form-check-label" for="gridRadios1">
											Separated
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="civil_status" id="gender" value="other" onchange="displayRadioValue()">
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Other
										</label>
										<input class="form-check-input" type="text" name="civil_status_other" id="civil_status_other" style="width: 70% !important;">
									</div>

								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">11. Area of living?</label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="area_of_living" id="Urban" value="Urban">
										<label class="form-check-label" for="gridRadios1">
											Urban
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="area_of_living" id="Rural" value="Rural">
										<label class="form-check-label" for="gridRadios1">
											Rural
										</label>
									</div>


								</div>





								<div class="form-group form-group1">
									<label for="exampleInputEmail1">12. Type of residence</label>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="residence" id="Rural" value="Permanant" onchange="residencedisplayRadioValue()">
										<label class="form-check-label" for="gridRadios1">
											Permanant
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="residence" id="Temporary" value="Temporary" onchange="residencedisplayRadioValue()">
										<label class="form-check-label" for="gridRadios1">
											Temporary
										</label>
									</div>






									<div class="form-check">
										<input class="form-check-input" type="radio" name="residence" id="residence_Other" value="other" onchange="residencedisplayRadioValue()">
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Other
										</label>
										<input class="form-check-input" type="text" name="residence_other" id="residence_other" style="width: 70% !important;">
									</div>


								</div>







								<div class="form-group form-group1">
									<label for="exampleInputEmail1">13. Whom does the patient live with?</label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="living" id="With spouse" value="With spouse">
										<label class="form-check-label" for="gridRadios1">
											With spouse
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="living" id="With parents" value="With parents">
										<label class="form-check-label" for="gridRadios1">
											With parents
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="living" id="With children" value="With children">
										<label class="form-check-label" for="gridRadios1">
											With children
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="living" id="With children" value="With relatives">
										<label class="form-check-label" for="gridRadios1">
											With relatives
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="living" id="Alone" value="Alone">
										<label class="form-check-label" for="gridRadios1">
											Alone
										</label>
									</div>
								</div>

								<div class="form-group form-group1">
									<label for="exampleInputEmail1">14. Level of education</label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="education" id="Never gone to school" value="Never gone to school">
										<label class="form-check-label" for="gridRadios1">
											Never gone to school
										</label>
									</div>




									<div class="form-check">
										<input class="form-check-input" type="radio" name="education" id="Up to Grade 5" value="Up to Grade 5">
										<label class="form-check-label" for="gridRadios1">
											Up to Grade 5
										</label>
									</div>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="education" id="Grade 6-10" value="Grade 6-10">
										<label class="form-check-label" for="gridRadios1">
											Grade 6-10
										</label>
									</div>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="education" id="Up to GCE (A/L)" value="Up to GCE (A/L)">
										<label class="form-check-label" for="gridRadios1">
											Up to GCE (A/L)
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="education" id="Higher education (degree/ diploma)" value="Higher education (degree/ diploma)">
										<label class="form-check-label" for="gridRadios1">
											Higher education (degree/ diploma)
										</label>
									</div>


								</div>

								<div class="form-group form-group1">
									<label for="exampleInputEmail1">15 Occupation category</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Managers" value="Managers" onchange="occupationdisplayRadioValue()">
										<label class="form-check-label" for="gridRadios1">
											Managers
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Professionals" value="Professionals" onchange="occupationdisplayRadioValue()">
										<label class="form-check-label" for="gridRadios1">
											Professionals
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Technicians_and_associated_professionals" onchange="occupationdisplayRadioValue()" value="Technicians and associated professionals">
										<label class="form-check-label" for="gridRadios1">
											Technicians and associated professionals
										</label>
									</div>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Clerical_support_workers" onchange="occupationdisplayRadioValue()" value="Clerical support workers">
										<label class="form-check-label" for="gridRadios1">
											Clerical support workers
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Clerical_support_workers" onchange="occupationdisplayRadioValue()" value="Clerical support workers">
										<label class="form-check-label" for="gridRadios1">
											Service and sales workers
										</label>
									</div>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Skilled_agricultural_forestry" onchange="occupationdisplayRadioValue()" value="Skilled agricultural, forestry">
										<label class="form-check-label" for="gridRadios1">
											Skilled agricultural, forestry
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Skilled_agricultural_forestry" onchange="occupationdisplayRadioValue()" value="Craft related trade workers">
										<label class="form-check-label" for="gridRadios1">
											Craft related trade workers
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Skilled_agricultural_forestry" onchange="occupationdisplayRadioValue()" value="Plant & machine operators and assemblers">
										<label class="form-check-label" for="gridRadios1">
											Plant & machine operators and assemblers
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Skilled_agricultural_forestry" onchange="occupationdisplayRadioValue()" value="Elementary occupations">
										<label class="form-check-label" for="gridRadios1">
											Elementary occupations
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="Armed forces" value="Armed forces" onchange="occupationdisplayRadioValue()">
										<label class="form-check-label" for="gridRadios1">
											Armed forces
										</label>
									</div>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="occupation" id="occupation_Other" value="other" onchange="occupationdisplayRadioValue()">
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Other
										</label>
										<input class="form-check-input" type="text" name="occupation_other_input" id="occupation_other_input" style="width: 70% !important;">
									</div>


								</div>

								<div class="form-group form-group1">
									<label for="exampleInputEmail1"> 16. Contact numbers: </label>

									<br><br>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Home</label>
										<div class="col-sm-10">
											<input type="text" name="telephone_home" class="form-control">
										</div>
									</div>


									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Mobile</label>
										<div class="col-sm-10">
											<input type="text" name="telephone_mobile" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Guardian (If applicable)</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="telephone_guardian">
										</div>
									</div>

								</div>




								<div class="form-group form-group1">
									<label for="exampleInputEmail1">17. Address <span style="color:red;">*</span> </label>
									<input type="text" name="address" required class="form-control">
								</div>




								<div class="form-group form-group1">
									<label for="exampleInputEmail1"> 18. GPS coordinate:: </label>

									<br><br>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Longitude</label>
										<div class="col-sm-10">
											<input type="text" name="gps_point_lon" class="form-control">
										</div>
									</div>


									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Latitude</label>
										<div class="col-sm-10">
											<input type="text" name="gps_point_latitude" class="form-control">
										</div>
									</div>
								</div>




								<div class="form-group form-group1">
									<label for="exampleInputEmail1">19. MOH area <span style="color:red;">*</span> </label>
									<input list="moh_list" name="moh" required class="form-control" autocomplete="off">
									<datalist id="moh_list">

									</datalist>
								</div>


								<div class="form-group form-group1">
									<label for="exampleInputEmail1">20. PHM area</label>
									<input type="text" name="phm" class="form-control">
								</div>


								<div class="form-group form-group1">
									<label for="exampleInputEmail1">21. Grama Niladari area</label>
									<input type="text" name="gn_area" class="form-control">
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">22. Have you ever lived in an endemic area other than current residence</label>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="endemic_area_than_cuurent_residence" value="yes">
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Yes
										</label>
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="endemic_area_than_cuurent_residence" value="NO">
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											No
										</label>
									</div>

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
</script>