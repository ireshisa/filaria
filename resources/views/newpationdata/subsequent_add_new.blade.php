<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Subsequent Visit Form <br>
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Patient Data</a></li>
			<li class="active">Subsequent Visit FORM</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<!-- left column -->
			<form method="post" action="{{ url('/subsequentsave') }}">

				{{ csrf_field() }}
				<div class="col-md-12">
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
								<div class="col-md-10" style="left: 50%; transform: translateX(-50%);">

									<input type="hidden" name="visittype" id="visittype">

									<div class="row">

										<div class="form-group">
											<label for="exampleInputEmail1">District lymphedema no</label>
											<input list="opd" name="district_lymphedema_no" id="inputopd" required class="form-control" onkeyup="onInput(),getbodydetails()">
											<datalist id="opd">
												@foreach($opd as $opdnum)
												<option value="{{ $opdnum->district_lymphedema_no }}">{{ $opdnum->name_of_patient }} </option>
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


											
											<div class="col-md-3">
												<div class="form-group">
													<label for="exampleInputEmail1">Name of the clinic</label>
													<input type="text" name="name_of_clinic" readonly id="name_of_clinic" class="form-control">
												</div>
											</div>

										</div>


										<div class="row" id="bodypartDetails">




										</div>



									</div>


									<br>
									<br>
									<br>


									<div class="row">


										<div class="form-group form-group1">
											<label for="exampleInputEmail1"> 1.Name of the doctor</label>
											<input type="text" name="name_doctor" id="name_doctor" class="form-control">
										</div>



										<div class="form-group form-group1">
											<label for="exampleInputEmail1">2. Date of clinic visit</label>
											<input type="date" name="date_of_first_clinic_arrendance" id="date_of_first_clinic_arrendance" class="form-control">
										</div>



										<div class="form-group form-group1">
											<label for="exampleInputEmail1">3. Clinical presentation to the clinic*</label>
											<br> <br>

											<div class="form-check">
												<input class="form-check-input" type="radio" name="Clinical_lymphedema_regular_clinic" value="yes" onchange="history_of_attacksshow()" required>
												<label class="form-check-label" for="gridRadios1">
													Lymphedema regular clinic follow up
												</label>
											</div>

											<div class="form-check">
												<input class="form-check-input" type="radio" name="Clinical_lymphedema_regular_clinic" value="No" onchange="history_of_attacksshow()" required>
												<label class="form-check-label" for="gridRadios1">
													Acute attack of dermatolymphangioadenitis
												</label>
											</div>

											<div class="form-check">
												<input class="form-check-input" type="radio" name="Clinical_lymphedema_regular_clinic" value="other" onchange="history_of_attacksshow()" required>
												<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
													Other (please specify)....
												</label>
												<input type="text" name="Clinical_other_specify" class="form-control" style="width: 70% !important;">
											</div>


										</div>



										<div class="form-group form-group1">
											<label for="exampleInputEmail1"> 4. History of acute attacks of dermatolymphangioadenitis during last 4 weeks*</label>
											<br> <br>

											<div class="form-check">
												<input class="form-check-input" type="radio" name="history_of_attacks_yes" id="history_of_attacks_of_dermatoly" value="yes" onchange="history_of_attacksshow()" required>
												<label class="form-check-label" for="gridRadios1">
													Yes
												</label>
											</div>

											<div class="form-check">
												<input class="form-check-input" type="radio" name="history_of_attacks_yes" id="history_of_attacks_of_dermatoly" value="No" onchange="history_of_attacksshow()" required>
												<label class="form-check-label" for="gridRadios1">
													No
												</label>
											</div>

											<div class="form-check">
												<input class="form-check-input" type="radio" name="history_of_attacks_yes" id="history_of_attacks_of_dermatoly" value="other" onchange="history_of_attacksshow()" required>
												<label class="form-check-label" for="gridRadios1" style="margin-right:10px ;">
													Other:
												</label>
												<input type="text" name="history_of_attacks_of_dermatoly_other" class="form-control" id="history_of_attacks_of_dermatoly_other" style="width: 70% !important;">
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
											<span id="new_treatment">
												<br>
												<label for="staticEmail" class=" col-form-label">6. Treatment</label>
												<hr>
												<table class="table table-bordered" id="tbl_posts">

													<thead class="ther">
														<tr>
															<th>ID</th>
															<th>Drug </th>
															<th>Dosage</th>
															<th>Frequency</th>
															<th>Duration</th>
															<th>Action</th>
														</tr>
													</thead>

													<tbody id="tbl_posts_body">
														<tr id="rec-1">
															<td id="sample_rowonre"><span class="sn">1</span>.</td>
															<td><input style="width: 100%;" type="text" name="name_of_drug[]" class="form-control"></td>
															<td><input style="width: 100%;" type="text" name="Dosage[]" class="form-control"></td>

															<td>
																<select id="weather" name="Frequency[]" class="form-control">
																	<option value=" ">Select Frequency</option>
																	<option value="mane">mane</option>
																	<option value="bd">bd</option>
																	<option value="tds">tds</option>
																	<option value="nocte">nocte</option>
																</select>
															</td>


															<td><input style="width: 100%;" type="text" name="Duration[]" class="form-control"></td>
															<td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
														</tr>
													</tbody>

												</table>
											</span>


											<div clss="row " style="background-color: #fff; padding:5px;">
												<div class="col-12">
													<center>
														<a class="btn btn-primary   add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Treatment</a>
													</center>
												</div>
											</div>

										</div>







										<div class="form-group form-group1">
											<label for="exampleInputEmail1">7. Morbidity management</label>
											<br> <br>


											<div class="form-group row">
												<label for="staticEmail" class="col-sm-3 col-form-label">Skin care </label>
												<div class="col-sm-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" id="inlineCheckbox1" name="skin_care_satisfactory" value="option1">
														<label class="form-check-label" for="inlineCheckbox1">Satisfactory </label>
													</div>
													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="skin_care_satisfactory" value="option2">
														<label class="form-check-label" for="inlineCheckbox2">Need improvement </label>
													</div>

													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="skin_care_satisfactory" value="option3">
														<label class="form-check-label" for="inlineCheckbox2">Not satisfactory </label>
													</div>
												</div>
											</div>


											<div class="form-group row">
												<label for="staticEmail" class="col-sm-3 col-form-label">Elevation </label>
												<div class="col-sm-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" id="inlineCheckbox1" name="elavation_satisfactory" value="option1">
														<label class="form-check-label" for="inlineCheckbox1">Satisfactory </label>
													</div>
													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="elavation_satisfactory" value="option2">
														<label class="form-check-label" for="inlineCheckbox2">Need improvement </label>
													</div>

													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="elavation_satisfactory" value="option3">
														<label class="form-check-label" for="inlineCheckbox2">Not satisfactory </label>
													</div>
												</div>
											</div>





											<div class="form-group row">
												<label for="staticEmail" class="col-sm-3 col-form-label">Movement and exercise </label>
												<div class="col-sm-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" id="inlineCheckbox1" name="movement_satisfactory" value="option1">
														<label class="form-check-label" for="inlineCheckbox1">Satisfactory </label>
													</div>
													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="movement_satisfactory" value="option2">
														<label class="form-check-label" for="inlineCheckbox2">Need improvement </label>
													</div>

													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="movement_satisfactory" value="option3">
														<label class="form-check-label" for="inlineCheckbox2">Not satisfactory </label>
													</div>
												</div>
											</div>



											<div class="form-group row">
												<label for="staticEmail" class="col-sm-3 col-form-label">Bandaging/ compression </label>
												<div class="col-sm-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" id="inlineCheckbox1" name="bandaging_satisfactory" value="option1">
														<label class="form-check-label" for="inlineCheckbox1">Satisfactory </label>
													</div>
													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="bandaging_satisfactory" value="option2">
														<label class="form-check-label" for="inlineCheckbox2">Need improvement </label>
													</div>

													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="bandaging_satisfactory" value="option3">
														<label class="form-check-label" for="inlineCheckbox2">Not satisfactory </label>
													</div>
												</div>
											</div>




											<div class="form-group row">
												<label for="staticEmail" class="col-sm-3 col-form-label">Foot wear </label>
												<div class="col-sm-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" id="inlineCheckbox1" name="foot_satisfactory" value="option1">
														<label class="form-check-label" for="inlineCheckbox1">Satisfactory </label>
													</div>
													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="foot_satisfactory" value="option2">
														<label class="form-check-label" for="inlineCheckbox2">Need improvement </label>
													</div>

													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="foot_satisfactory" value="option3">
														<label class="form-check-label" for="inlineCheckbox2">Not satisfactory </label>
													</div>
												</div>
											</div>


											<div class="form-group row">
												<label for="staticEmail" class="col-sm-3 col-form-label">Psychological support </label>
												<div class="col-sm-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" id="inlineCheckbox1" name="psychological" value="option1">
														<label class="form-check-label" for="inlineCheckbox1">Satisfactory </label>
													</div>
													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="psychological" value="option2">
														<label class="form-check-label" for="inlineCheckbox2">Need improvement </label>
													</div>

													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="psychological" value="option3">
														<label class="form-check-label" for="inlineCheckbox2">Not satisfactory </label>
													</div>
												</div>
											</div>


											<div class="form-group row">
												<label for="staticEmail" class="col-sm-3 col-form-label">Screening (DM/ family) </label>
												<div class="col-sm-9">
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" id="inlineCheckbox1" name="screening_satisfactory" value="option1">
														<label class="form-check-label" for="inlineCheckbox1">Satisfactory </label>
													</div>
													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="screening_satisfactory" value="option2">
														<label class="form-check-label" for="inlineCheckbox2">Need improvement </label>
													</div>

													<div class="form-check form-check-inline" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" id="inlineCheckbox2" name="screening_satisfactory" value="option3">
														<label class="form-check-label" for="inlineCheckbox2">Not satisfactory </label>
													</div>
												</div>
											</div>



										</div>






										<div class="form-group  form-group1">
											<label for="exampleInputEmail1">8. Remarks:</label>
											<input type="text" name="remarks" id="remarks" class="form-control">
										</div>





										<div class="form-group  form-group1">
											<label for="exampleInputEmail1">9. Date next clinic visit:</label>
											<input type="date" name="next_clinic_visit" id="next_clinic_visit" class="form-control">
										</div>





										<div class="box-footer">
											<center>
												<button type="submit" id="submitbuttone" class="btn btn-primary">Submit</button>
												<!-- <button type="submit" name="treatment" value="treatment" class="btn btn-primary"> <B>View</B></button> -->
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






<div style="display:none;">
	<table id="sample_table">
		<tbody>

			<tr>
				<td id="sample_rowonre"><span class="sn">1</span>.</td>
				<td><input style="width: 100%;" type="text" name="name_of_drug[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="Dosage[]" class="form-control"></td>

				<td>
					<select id="weather" name="Frequency[]" class="form-control">
						<option value=" ">Select Frequency</option>
						<option value="mane">mane</option>
						<option value="bd">bd</option>
						<option value="tds">tds</option>
						<option value="nocte">nocte</option>
					</select>
				</td>


				<td><input style="width: 100%;" type="text" name="Duration[]" class="form-control"></td>
				<td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>



		</tbody>
	</table>
</div>





<script type="text/javascript">
	document.getElementById("submitbuttone").style.display = "none";

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


	});



	$(document).ready(function() {

		var index3 = 1;

		jQuery(document).delegate('a.add-record2', 'click', function(e) {
			e.preventDefault();
			var content = jQuery('#sample_table2 tr'),
				size = jQuery('#tbl_posts2 >tbody >tr').length + 1,
				element = null,
				element = content.clone();
			element.attr('id', 'rec-' + size);

			//  var third  =element.('tr[name ="secondrow"]');
			//  third.attr('id', 'rec2-'+size);


			element.find('.delete-record2').attr('data-id', size);
			element.appendTo('#tbl_posts2_body');
			index3 = index3 + 1;
			element.find('.sns').html(index3);
		});
		jQuery(document).delegate('a.delete-record2', 'click', function(e) {
			e.preventDefault();
			var didConfirm = confirm("Are you sure You want to delete");
			if (didConfirm == true) {
				var id = jQuery(this).attr('data-id');
				var targetDiv = jQuery(this).attr('targetDiv');
				jQuery('#rec-' + id).remove();
				index3 = index3 - 1;


				//       regnerate index number on table
				$('#tbl_posts2_body #sample_rowonre2').each(function(index12 = 0) {

					$(this).find('span.sns').html(index12 + 1);
				});

				return true;
			} else {
				return false;
			}
		});


	});
</script>