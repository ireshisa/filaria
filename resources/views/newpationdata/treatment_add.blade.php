<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Treatment Data FORM<br>
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Treatment Data</a></li>
			<li class="active">Treatment Data FORM</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<!-- left column -->
			<form method="post" action="{{ url('/treatment_save') }}">

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
							<div class="col-md-10" style="left: 50%; transform: translateX(-50%);">



                  <input type="hidden" name="visittype" id="visittype">

								<div class="form-group">
									<label for="exampleInputEmail1">OPD No</label>
									<input list="opd" name="opd_no" id="inputopd" required class="form-control" onkeyup="onInput2()">
									<datalist id="opd">
										@foreach($opd as $opdnum)
										<option value="{{ $opdnum->district_lymphedema_no }}">
											@endforeach
									</datalist>
								</div>

								<div class="form-group">
									<label for="exampleInputEmail1"> Name of Patient</label>
									<input type="text" name="name" readonly id="name" class="form-control">
								</div>


								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Age</label>
											<input type="text" name="age" readonly id="age" class="form-control">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Gender</label>
											<input type="text" name="gender" readonly id="gender" class="form-control">
										</div>
									</div>

								</div>


								<div class="form-group">
									<label for="exampleInputEmail1">Address</label>
									<input type="text" name="address" id="address" readonly class="form-control">
								</div>


								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">District lymphedema no</label>
											<input type="text" name="district_le_no" readonly id="district_le_no" class="form-control">
										</div>
									</div>



									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Body Weight</label>
											<input type="text" name="body_weight"  readonly id="body_weight" class="form-control">
										</div>
									</div>



								</div>





								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Site of Disease:</label>
											<input type="text" name="site_of_disease" id="site_of_disease" readonly class="form-control">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Stage of Disease:</label>
											<input type="text" name="stage_of_disease" id="stage_of_disease"  class="form-control">
										</div>
									</div>

								</div>



								<div class="form-group">
									<label for="exampleInputEmail1">Co Morbidities:</label>
									<input type="text" name="co_morbidies" id="co_morbidies" readonly class="form-control">
								</div>


								<div class="form-group">
									<label for="exampleInputEmail1">Habits:</label>
									<input type="text" name="habits" id="habits" class="form-control">
								</div>

								<div class="form-group">
									<label for="exampleInputEmail1">Allergies:</label>
									<input type="text" name="allergies" id="allergies" class="form-control">
								</div>



								<br>
								<center> <b>Initial Treatment:</b> </center>
								<hr>





								<div class="form-group">
									<label for="exampleInputEmail1">At Clinic visit LE was observed without acute attacks:</label>
									<select id="at_clinice_visite_le_without" name="at_clinice_visite_le_without" required class="form-control">
										<option value="">Select</option>
										<option value="yes">yes</option>
										<option value="No">No</option>
									</select>
								</div>


								<div class="form-group">
									<label for="exampleInputEmail1">At Clinic visit LE was observed with acute attacks:</label>
									<select id="at_clinice_visite_le_with" name="at_clinice_visite_le_with" required class="form-control">
										<option value="">Select</option>
										<option value="yes">yes</option>
										<option value="No">No</option>
									</select>
								</div>

								<div class="form-group">
									<label for="exampleInputEmail1">At Clinic visit patient gave a history of acute attacks Duing the past 04 weeks:</label>
									<select id="at_clinice_visite_patient_give" name="at_clinice_visite_patient_give" required class="form-control">
										<option value="">Select</option>
										<option value="yes">yes</option>
										<option value="No">No</option>
									</select>
								</div>


								<span id="initial_treatment_history">
									<br>
									<center> <b>Treatment History:</b> </center>
									<hr>
									<table class="table table-bordered">
										<thead class="ther">
											<tr>
												<th>Date</th>
												<th>Name of Drug</th>
												<th>Per day</th>
												<th>No of Days</th>
												<th>Dose</th>
												<th>Prescribing Doctor</th>
												<th>Visit No</th>
											</tr>
										</thead>
										<tbody id="initial_treatment_history_row">
									
										</tbody>
									</table>
								</span>



								<span id="new_treatment"> 
								<br>
								<center> <b>New Treatment:</b> </center>
								<hr>
								<table class="table table-bordered" id="tbl_posts">

									<thead class="ther">
										<tr>
											<th>ID</th>
											<th>Date</th>
											<th>Name of Drug</th>
											<th>Per day</th>
											<th>No of Days</th>
											<th>Dose</th>
											<th>Prescribing Doctor</th>
											<th>Visit No</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody id="tbl_posts_body">
										<tr id="rec-1">
											<td id="sample_rowonre"><span class="sn">1</span>.</td>
											<td><input style="width: 100%;" type="date" name="date[]" class="form-control"></td>
											<td><input style="width: 100%;" type="text" name="name_of_grug[]" class="form-control"></td>
											<td><input style="width: 100%;" type="text" name="per_day[]" class="form-control"></td>
											<td><input style="width: 100%;" type="text" name="no_of_days[]" class="form-control"></td>
											<td><input style="width: 100%;" type="text" name="dose[]" class="form-control"></td>
											<td><input style="width: 100%;" type="text" name="prescribing_doctor[]" class="form-control"></td>
											<td><input style="width: 100%;" type="text" name="visit_no[]" class="form-control"></td>
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




								<div class="form-group">
									<label for="exampleInputEmail1">Health education on Washing technique:</label>
									<input type="text" name="health_education_on_washing" id="health_education_on_washing" class="form-control">
								</div>


								<div class="form-group">
									<label for="exampleInputEmail1">Health education on limb exercises:</label>
									<input type="text" name="health_education_on_limb" id="health_education_on_limb" class="form-control">
								</div>



								<div class="form-group">
									<label for="exampleInputEmail1">Correct technique of wearing Crepe bandage,Stockings etc:</label>
									<input type="text" name="correct_technice_of_wearing" id="correct_technice_of_wearing" class="form-control">
								</div>







								<span id="subsequent_visits">

									<br>
									<center> <b>Subsequent Visits:</b> </center>
									<hr>

									<div class="form-group">
										<label for="exampleInputEmail1">At Clinic visit LE was observed without acute attacks:</label>
										<select id="sub_at_clinice_visite_le_without" name="sub_at_clinice_visite_le_without"  class="form-control">
											<option value="">Select</option>
											<option value="yes">yes</option>
											<option value="No">No</option>
										</select>
									</div>


									<div class="form-group">
										<label for="exampleInputEmail1">At Clinic visit LE was observed with acute attacks:</label>
										<select id="sub_at_clinice_visite_le_with" name="sub_at_clinice_visite_le_with"  class="form-control">
											<option value="">Select</option>
											<option value="yes">yes</option>
											<option value="No">No</option>
										</select>
									</div>



									<div class="form-group">
										<label for="exampleInputEmail1">At Clinic visit patient gave a history of acute attacks During the past 04 weeks:</label>
										<select id="sub_at_clinice_visite_patient_give" name="sub_at_clinice_visite_patient_give"  class="form-control">
											<option value="">Select</option>
											<option value="yes">yes</option>
											<option value="No">No</option>
										</select>
									</div>






									<br>
									<center> <b>Treatment History:</b> </center>
									<hr>



									<table class="table table-bordered">
										<thead class="ther">
											<tr>
												<th>Date</th>
												<th>Name of Drug</th>
												<th>Per day</th>
												<th>No of Days</th>
												<th>Dose</th>
												<th>Prescribing Doctor</th>
												<th>Visit No</th>
											</tr>
										</thead>
										<tbody id="subsequent_treatment_history_row">
										</tbody>
									</table>





									<br>
									<center> <b>New Treatment:</b> </center>
									<hr>


									<table class="table table-bordered" id="tbl_posts2">
										<thead class="ther">
											<tr>
												<th>ID</th>
												<th>Date</th>
												<th>Name of Drug</th>
												<th>Per day</th>
												<th>No of Days</th>
												<th>Dose</th>
												<th>Prescribing Doctor</th>
												<th>Visit No</th>
												<th>Action</th>
											</tr>
										</thead>



										<tbody id="tbl_posts2_body">
											<tr id="rec-12">
												<td id="sample_rowonre2"><span class="sns">1</span>.</td>
												<td><input style="width: 100%;" type="date" name="date_sub[]" class="form-control"></td>
												<td><input style="width: 100%;" type="text" name="name_of_grug_sub[]" class="form-control"></td>
												<td><input style="width: 100%;" type="text" name="per_day_sub[]" class="form-control"></td>
												<td><input style="width: 100%;" type="text" name="no_of_days_sub[]" class="form-control"></td>
												<td><input style="width: 100%;" type="text" name="dose_sub[]" class="form-control"></td>
												<td><input style="width: 100%;" type="text" name="prescribing_doctor_sub[]" class="form-control"></td>
												<td><input style="width: 100%;" type="text" name="visit_no_sub[]" class="form-control"></td>
												<td><a class="btn btn-xs delete-record2" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>

											</tr>
										</tbody>
									</table>

									<div clss="row " style="background-color: #fff; padding:5px;">
										<div class="col-12">
											<center>
												<a class="btn btn-primary   add-record2" data-added="0"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Treatment</a>
											</center>
										</div>
									</div>

								</span>


								<div class="form-group">
									<label for="exampleInputEmail1">Patient following advice on Washing limbs, limb exercise,Wearing Crepe bandage etc.</label>
									<input type="text" name="patient_following_advice" id="patient_following_advice" class="form-control">
								</div>




								<div class="form-group">
									<label for="exampleInputEmail1">Remarks:</label>
									<input type="text" name="remarks" id="remarks" class="form-control">
								</div>






								<div class="form-group">
									<label for="exampleInputEmail1">Next Appointment::</label>
									<input type="date" name="next_appoinment" id="next_appoinment" class="form-control">
								</div>




								<div class="box-footer">
									<center>
										<button type="submit" class="btn btn-primary">Submit</button>
										<button type="submit" name="treatment" value="treatment" class="btn btn-primary"> <B>View</B></button>
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

					.deletetd
					{
						display: none;
					}
					
				</style>
			</form>
		</div>
	</section>
</div>






<div style="display:none;">
	<table id="sample_table">
		<tbody>
			<tr id="">
				<td id="sample_rowonre"><span class="sn">1</span>.</td>
				<td><input style="width: 100%;" type="date" name="date[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="name_of_grug[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="per_day[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="no_of_days[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="dose[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="prescribing_doctor[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="visit_no[]" class="form-control"></td>
				<td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>



			</tr>



		</tbody>
	</table>
</div>




<div style="display:none;">
	<table id="sample_table2">
		<tbody>
			<tr id="">
				<td id="sample_rowonre2"><span class="sns">1</span>.</td>
				<td><input style="width: 100%;" type="date" name="date_sub[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="name_of_grug_sub[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="per_day_sub[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="no_of_days_sub[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="dose_sub[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="prescribing_doctor_sub[]" class="form-control"></td>
				<td><input style="width: 100%;" type="text" name="visit_no_sub[]" class="form-control"></td>
				<td><a class="btn btn-xs delete-record2" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>



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