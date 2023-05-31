<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
		Clinical Assessment Form<br>
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Patient Data</a></li>
			<li class="active">Clinical Assessment Form</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<!-- left column -->
			<form method="post" action="{{ url('/mopation_data_save') }}">

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
							<div class="col-md-10" style="left: 50%;transform: translateX(-50%);">


								<div class="form-group">
									<label for="exampleInputEmail1">District lymphedema no</label>
									<input list="opd" name="district_lymphedema_no" id="inputopd" required class="form-control" onkeyup="onInput()">
									<datalist id="opd">
										@foreach($opd as $opdnum)
										<option value="{{ $opdnum->district_lymphedema_no }}">
											@endforeach
									</datalist>
								</div>



								<div class="form-group">
									<label for="exampleInputEmail1">Full Name of Patient</label>
									<input type="text" name="full_name" readonly id="full_name" class="form-control">
								</div>


								<div class="row">

									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Sex</label>
											<input type="text" name="gender" readonly id="gender" class="form-control">
										</div>
									</div>



									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Date of Birth</label>
											<input type="text" name="date_of_birth" readonly id="date_of_birth" class="form-control">
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Age in completed Years</label>
											<input type="text" name="age_in_completed" readonly id="age_in_completed" class="form-control">
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Address</label>
											<input type="text" name="address" id="address" readonly class="form-control">
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Date of Registration</label>
											<input type="text" name="date_of_registration" readonly id="date_of_registration" class="form-control">
										</div>
									</div>

								</div>
								<br>







								<div class="form-group form-group1">
									<label for="exampleInputEmail1">Name of the doctor</label>
									<input type="name" name="name_of_docter" id="name" class="form-control">
								</div>





								<div class="form-group form-group1">
									<label for="exampleInputEmail1">1. Date of first clinic attendance</label>
									<input type="date" name="date_of_first_clinic_arrendance" id="date_of_first_clinic_arrendance" class="form-control">
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1"> 2. Clinical presentation to the clinic*</label>
									<br> <br>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="clinical_presentatio" id="clinical_presentatio_lymhedema" value="Lymphedema" onchange="clinicalpresentatioshow()" required>
										<label class="form-check-label" for="gridRadios1">
											Lymphedema
										</label>
									</div>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="clinical_presentatio" id="clinical_presentatio_acut_dermatol" value="Acute dermatolymphangioadenitis" onchange="clinicalpresentatioshow()" required>
										<label class="form-check-label" for="gridRadios1">
											Acute dermatolymphangioadenitis
										</label>
									</div>



									<div class="form-check">
										<input class="form-check-input" type="radio" name="clinical_presentatio" id="clinical_presentatio_acut_dermatol" value="Tropical Pulmonary eosinophilia" onchange="clinicalpresentatioshow()" required>
										<label class="form-check-label" for="gridRadios1">
										Tropical Pulmonary eosinophilia (TPE)
										</label>
									</div>





									<div class="form-check">
										<input class="form-check-input" type="radio" name="clinical_presentatio" id="clinical_presentatio_acut_other" value="other" onchange="clinicalpresentatioshow()" required>
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Other (please specify)....
										</label>
										<input class="form-check-input" type="text" name="civil_status_other" id="clinical_presentatio_other" style="width: 70% !important;">
									</div>

								</div>


























								<div class="form-group form-group1">
									<label for="exampleInputEmail1"> 3. Affected part of body by lymphoedema* (can choose more than one option)</label>
									<br> <br>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Leg</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="Leg_Left" value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="Leg_Right" value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>

										</div>
									</div>


								
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Arm</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="Arm_Left" value="option1" >
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="Arm_Right" value="option2" >
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>

										</div>
									</div>



									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Breast</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="Breast_left" value="Left">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="Breast_right" value="Right">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Scrotum</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="scrotortum_left" name="scrotortum_left">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="scrotortum_right" name="scrotortum_right">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Penis</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1"  name="Penisleft">
												<!-- <label class="form-check-label" for="inlineCheckbox1">Left </label> -->
											</div>
											<!-- <div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2"  name="Penisright">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div> -->
										</div>
									</div>

							

									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">No Lymphoedema</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" name="no_lymhedema_left">
												<!-- <label class="form-check-label" for="inlineCheckbox1">Left </label> -->
											</div>
											<!-- <div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" name="no_lymhedema_right">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div> -->
										</div>
									</div>


								</div>







								<div class="form-group form-group1">
									<label for="exampleInputEmail1"> 4. Duration of lymphoedema*</label>
									<br>

									<div class="form-group row">
										<label for="staticEmail" class="col-sm-2 col-form-label">Months</label>
										<div class="col-sm-10">
											<input type="text" class="form-control-plaintext" id="staticEmail" name="duration_on_lymhodema_month">
										</div>
									</div>

									<div class="form-group row">
										<label for="staticEmail" class="col-sm-2 col-form-label">Years</label>
										<div class="col-sm-10">
											<input type="text" class="form-control-plaintext" id="staticEmail" name="duration_on_lymhodema_years">
										</div>
									</div>

								</div>









								<div class="form-group form-group1">
									<label for="exampleInputEmail1">5. Stage of lymphoedema*</label>
									<br> <br>



									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Stage I </label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_1_Left" value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_1_right" value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>






									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage II </label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_2_Left" value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_2_right" value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage III</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_3_Left" value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_3_right" value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage IV</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_4_Left" value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_4_right" value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>



									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage V</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_5_Left" value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_5_right" value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>




									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage VI</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_6_Left" value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_6_right" value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>

									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage VII</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_7Left" value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_7_right" value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>

								</div>









								<div class="form-group form-group1">
									<label for="exampleInputEmail1">6. Probable cause of lymphoedema</label>
									<br> <br>

									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Filariasis</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="Filariasis" name="probable_couse_filariasis" value="Probable cause of lymphoedema">
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Filariasis (FAT positive)</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="probable_couse_filariasis_fat_positive" value="Filariasis (FAT positive)">
										</div>
									</div>

									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Cellulitis</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="probable_couse__cellulitis" value="Cellulitis">
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label"> Recurrent attacks of cellulitis</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="probable_couse_recurrent_of_cellulists" value="Recurrent attacks of cellulitis">
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Skin rash</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="probable_couse_Skin_rash" value="Skin rash">
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Thrombotic disease</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="probable_couse_Thrombotic_disease" value="Thrombotic disease">
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Past surgery</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="Past_surgery" name="probable_couse_Past_surgery" value="Past surgery">
										</div>
									</div>

									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Trauma</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="Trauma" name="probable_couse_Trauma" value="Trauma">
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Obesity</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="Obesity" name="probable_couse_Obesity" value="Obesity">
										</div>
									</div>

									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Heart disease</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="Heart_disease" name="probable_couse_Heart_disease" value="Heart disease">
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Heart disease</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="Renal_disease" name="probable_couse_Renal_disease" value="Renal_disease">
										</div>
									</div>



									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Liver disease</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="Liver_disease" name="probable_couse_Liver_disease" value="Liver disease">
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">other</label>
										<div class="col-sm-8">
											<input type="text" class="form-control-plaintext" id="staticEmail" name="probable_couse_other">
										</div>
									</div>
								</div>














								<div class="form-group form-group1">
									<label for="exampleInputEmail1"> 7. History of acute attacks of dermatolymphangioadenitis during last 4 weeks</label>
									<br> <br>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="history_of_attacks_of_dermatoly" id="history_of_attacks_of_dermatoly" value="yes" onchange="history_of_attacksshow()" required>
										<label class="form-check-label" for="gridRadios1">
											Yes
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="history_of_attacks_of_dermatoly" id="history_of_attacks_of_dermatoly" value="No" onchange="history_of_attacksshow()" required>
										<label class="form-check-label" for="gridRadios1">
											No
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="history_of_attacks_of_dermatoly" id="history_of_attacks_of_dermatoly" value="other" onchange="history_of_attacksshow()" required>
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Other (please specify)....
										</label>
										<input class="form-check-input" type="text" name="history_of_attacks_of_dermatoly_other" id="history_of_attacks_of_dermatoly_other" style="width: 70% !important;">
									</div>


								</div>





								<div class="form-group form-group1">
									<label for="exampleInputEmail1"> 8. Comorbidities*</label>
									<br> <br>

									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Diabetes mellitus</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="comorbidities_diabetes" name="comorbidities_diabetes" value="Diabetes mellitus">
										</div>
									</div>



									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Hypertension</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="comorbidities_Hypertension" name="comorbidities_Hypertension" value="Hypertension">
										</div>
									</div>




									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Ischemic Heart Disease</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="comorbidities_Ischemic" name="comorbidities_Ischemic" value="Ischemic Heart Disease">
										</div>
									</div>




									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Renal disease</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="comorbidities_renal" name="comorbidities_renal" value="Renal disease">
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Liver disease</label>
										<div class="col-sm-8">
											<input class="form-check-input" type="checkbox" id="comorbidities_liver" name="comorbidities_liver" value="Liver disease">
										</div>
									</div>


									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">Other (please specify)..</label>
										<div class="col-sm-8">
											<input type="text" class="form-control-plaintext" id="comorbidities" name="comorbidities_other">
										</div>
									</div>
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1"> 9. History of microfilaria positivity</label>
									<br> <br>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="history_of_microfilaria_positivity" id="history_of_microfilaria_positivity" value="yes" required>
										<label class="form-check-label" for="gridRadios1">
											Yes
										</label>
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="history_of_microfilaria_positivity" id="history_of_microfilaria_positivity" value="No" required>
										<label class="form-check-label" for="gridRadios1">
											No
										</label>
									</div>



								</div>









								<div class="form-group form-group1">
									<label for="exampleInputEmail1"> 9.1 If Yes to Q9, How was it diagnosed? (can choose more than one response)</label>
									<br> <br>



									<table>


										<tr>
											<td></td>
											<td>Wucheraria bancrofti</td>
											<td>Brugia malayi</td>
										</tr>


										<tr>
											<td style="text-align: left !important;" >Night blood film positive </td>
											<td style="text-align:left" > <input class="form-check-input" type="radio" name="night_blood_film_postive" id="night_blood_film_postive" value="Wucheraria bancrofti" ></td>
											<td> <input class="form-check-input" type="radio" name="night_blood_film_postive" id="night_blood_film_postive" value="Brugia malayi" ></td>
										</tr>


										<tr>
											<td  style="text-align: left !important;" > Antigen positive </td>
											<td> <input class="form-check-input" type="radio" name="antigen_postive" id="antigen_postive" value="Wucheraria bancrofti" ></td>
											<td> <input class="form-check-input" type="radio" name="antigen_postive" id="antigen_postive" value="Brugia malayi" ></td>
										</tr>

										<tr>
											<td style="text-align: left !important;"> Antibody positive</td>
											<td> <input class="form-check-input" type="radio" name="antibody_positive" id="antibody_positive" value="Wucheraria bancrofti" ></td>
											<td> <input class="form-check-input" type="radio" name="antibody_positive" id="antibody_positive" value="Brugia malayi" ></td>
										</tr>

										<tr  style="text-align: left !important;">
											<td>Not diagnosed by a test, but treated</td>
											<td> <input class="form-check-input" type="radio" name="not_diagonses_by_a_test" id="not_diagonses_by_a_test" value="Wucheraria bancrofti" ></td>
											<td> <input class="form-check-input" type="radio" name="not_diagonses_by_a_test" id="not_diagonses_by_a_test" value="Brugia malayi" ></td>
										</tr>
									</table>

								</div>







								<div class="form-group form-group1">
									<label for="exampleInputEmail1">10. Past surgical history (If yes specify)</label>
									<br> <br>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="past_surgical_history" id="history_of_attacks_of_dermatoly" value="yes" onchange="pasthistoryshow()" >
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Yes
										</label>
										<input class="form-check-input" type="text" name="past_surgical_history_specify" id="history_of_attacks_of_dermatoly_specify" style="width: 70% !important;">
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="past_surgical_history" id="history_of_attacks_of_dermatoly" value="No" onchange="pasthistoryshow()" >
										<label class="form-check-label" for="gridRadios1">
											No
										</label>
									</div>
								</div>





								<div class="form-group form-group1">
									<label for="exampleInputEmail1">11. Drug allergies* (If yes specify)</label>
									<br> <br>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="droug_allergies" id="droug_allergies_yes" value="yes" onchange="droug_allergiesshow()" >
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Yes
										</label>
										<input class="form-check-input" type="text" name="droug_allergies_specify" id="droug_allergies_no" style="width: 70% !important;">
									</div>


									<div class="form-check">
										<input class="form-check-input" type="radio" name="droug_allergies" value="No" onchange="droug_allergiesshow()" >
										<label class="form-check-label" for="gridRadios1">
											No
										</label>
									</div>
								</div>


								<div class="form-group form-group1">
									<label for="exampleInputEmail1">12. Food allergies* (If yes specify)</label>
									<br> <br>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="food_allergies" id="food_allergies_yes" value="yes" onchange="food_allergiesshow()" >
										<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
											Yes
										</label>
										<input class="form-check-input" type="text" name="food_allergies_specify" id="food_allergies_specify" style="width: 70% !important;">
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="food_allergies" id="food_allergies_no" value="No" onchange="food_allergiesshow()" >
										<label class="form-check-label" for="gridRadios1">
											No
										</label>
									</div>
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">13. Remarks </label>
									<input type="text" name="remarks" id="date_of_first_clinic_arrendance" class="form-control">
								</div>



								<div class="form-group form-group1">
									<label for="exampleInputEmail1">14. Next clinic date</label>
									<input type="date" name="next_clinic_data" id="next_clinic_data" class="form-control">
								</div>

								<div class="box-footer" >
									<center>
										<button type="submit" id="submitbuttone" class="btn btn-primary">Submit</button>
										<button type="submit" name="treatment" value="treatment" class="btn btn-primary"> <B>+Treatment</B></button>
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
						padding: 5px;
					}

					.form-group1 {
						margin-bottom: 15px;
						background: #f9f9f9;
						padding: 20px;
						border-radius: 10px;
						box-shadow: 0px 0px 20px 1px #88888870;

					}

					.form-check-inline {
						display: inline;
					}

					.form-check {
						margin-bottom: 5px;
					}
				</style>
			</form>
		</div>
	</section>
</div>

<script>
	function clinicalpresentatioshow() {
		var ele = document.getElementsByName('clinical_presentatio');
		for (i = 0; i < ele.length; i++) {
			if (ele[i].checked)
				if (ele[i].value == "other") {
					document.getElementById("clinical_presentatio_other").style.display = "initial";
				} else {
					document.getElementById("clinical_presentatio_other").style.display = "none";
				}

		}
	}
	document.getElementById("clinical_presentatio_other").style.display = "none";




	function history_of_attacksshow() {
		var ele = document.getElementsByName('history_of_attacks_of_dermatoly');
		for (i = 0; i < ele.length; i++) {
			if (ele[i].checked)
				if (ele[i].value == "other") {
					document.getElementById("history_of_attacks_of_dermatoly_other").style.display = "initial";
				} else {
					document.getElementById("history_of_attacks_of_dermatoly_other").style.display = "none";
				}
		}
	}
	document.getElementById("history_of_attacks_of_dermatoly_other").style.display = "none";

	function pasthistoryshow() {
		var ele = document.getElementsByName('past_surgical_history');
		for (i = 0; i < ele.length; i++) {
			if (ele[i].checked)
				if (ele[i].value == "yes") {
					document.getElementById("history_of_attacks_of_dermatoly_specify").style.display = "initial";
				} else {
					document.getElementById("history_of_attacks_of_dermatoly_specify").style.display = "none";
				}

		}
	}
	document.getElementById("history_of_attacks_of_dermatoly_specify").style.display = "none";




	function droug_allergiesshow() {
		var ele = document.getElementsByName('droug_allergies');
		for (i = 0; i < ele.length; i++) {
			if (ele[i].checked)
				if (ele[i].value == "yes") {
					document.getElementById("droug_allergies_no").style.display = "initial";
				} else {
					document.getElementById("droug_allergies_no").style.display = "none";
				}

		}
	}
	document.getElementById("droug_allergies_no").style.display = "none";






	function food_allergiesshow() {
		var ele = document.getElementsByName('food_allergies');
		for (i = 0; i < ele.length; i++) {
			if (ele[i].checked)
				if (ele[i].value == "yes") {
					document.getElementById("food_allergies_specify").style.display = "initial";
				} else {
					document.getElementById("food_allergies_specify").style.display = "none";
				}

		}
	}
	document.getElementById("food_allergies_specify").style.display = "none";
</script>