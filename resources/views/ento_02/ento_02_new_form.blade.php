<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Gravid Trap Collection
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Entomological data</a></li>
			<li class="active">Gravid Trap Collection FORM</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- left column -->
			<form method="post" action="{{url('/ento2_newsave') }}">
				{{csrf_field() }}
				<div class="col-md-12">
					@if(session()->has('message'))



					@if (session()->has('id'))
					<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<Center>
							<h3><i class="icon fa fa-check"></i> Your form ID is :- {{ session()->get('id') }} </h3>
						</Center>
					</div>
					@endif









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
						<div class="box-body" style="overflow: auto;">
							<div class="col-md-6">

								<!-- 
								<div class="form-group">
									<label for="exampleInputEmail1">Form ID</label>
									<input type="text" name="formid" class="form-control" required>
								</div> -->




								<div class="form-group">
									<label for="exampleInputEmail1">District</label>
									<select name="district" class="form-control" required="" onchange="getMoh(this.value)">
										<option value="">Select</option>
										@if ((Auth::user()->role !== 'ADMIN') & (Auth::user()->role !== 'AFC'))
										<option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
										@else
										@foreach ($district_list as $dis)
										<option value="{{ $dis->district }}">{{ $dis->district }}</option>
										@endforeach
										@endif
									</select>
									<!-- <input type="text" name="district" class="datepicker_v form-control pull-right"> -->
								</div>

								<div class="form-group">
									<label for="exampleInputPassword1">MOH area</label>
									<input list="moh_list" name="moh_area" required class="form-control" autocomplete="off">
									<datalist id="moh_list">
									</datalist>
								</div>






							</div>



							<div class="col-md-6">

								<div class="form-group">
									<label for="exampleInputPassword1">PHM area</label>
									<input type="text" name="phm_area" class="form-control" required>
								</div>






								<div class="form-group">
									<label for="exampleInputPassword1">Weather condition </label>
									<select id="weather" name="weather_condition" class="form-control" required>
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

							</div>



						</div>



						<!-- /.box-body -->

					</div>
					<!-- /.box -->
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
								<th rowspan="4">#Row NO</th>
								<th rowspan="4">Date</th>
								<th rowspan="4">No. of Traps</th>
								<!-- <th rowspan="4">PHM area</th> -->
								<th rowspan="4">GN Division</th>
								<th rowspan="4">Name Of The Chief Occupant</th>
								<th rowspan="4">Address</th>
								<th rowspan="4">Longitude</th>
								<th rowspan="4">Latitude</th>
								<th rowspan="4">Total No of Cx. <br> quin. Collected </th>
								<!-- <th colspan="6">PCR detail</th> -->
								<th rowspan="4">Action</th>

							</tr>

							<tr>
								<!-- <th rowspan="3">No of Mos:</th>
								<th rowspan="3">Pool no</th>
								<th rowspan="3">Date received</th>
								<th rowspan="3">Ref. No</th>
								<th rowspan="3">Date Tested</th>
								<th rowspan="3">Negative/ Positive</th>
							 -->
							</tr>


						</thead>




						<tbody id="tbl_posts_body">
							<tr id="rec-1">
								<td id="sample_rowonre" rowspan="2"><span class="sn">1</span>.</td>
								<!-- <td rowspan="2"><input type="text" name="serial_no[]" class="form-control"></td> -->
								<td rowspan="2"><input data-date-format="yyyy-mm-d" type="date" name="date2[]" class="form-control"></td>
								<td rowspan="2"><input type="number" required min="0" name="no_of_traps[]" class="form-control" onchange="TotalTrapLaid()" onkeyup="TotalTrapLaid()"></td> <!-- 					//new filed -->
								<!-- <td rowspan="2"><input type="text" name="phm_area[]" class="form-control"></td> -->
								<td rowspan="2"><input type="text" name="gn_division[]" class="form-control"></td>
								<td rowspan="2"><input type="text" name="chief_occupant[]" class="form-control"></td>
								<td rowspan="2"><input type="text" name="address[]" required class="form-control"></td>
								<td rowspan="2"><input type="text" name="gps_lat[]" class="form-control"></td>
								<td rowspan="2"><input type="text" name="gps_long[]" class="form-control"></td>
								<td rowspan="2"><input type="number" required min="0" name="total_cx_quin[]" class="form-control" value="0" onchange="Total_CxQuin()" onkeyup="Total_CxQuin()"></td>

								<!-- <td><input type="number" name="No_mos_1[]" value="0" class="form-control" onchange="TotalNoMos()" onkeyup="TotalNoMos()"></td> -->
								<!-- <td><input type="number" name="Pool_no_1[]" value="0" class="form-control"></td>

								<td rowspan="2"><input type="number" name="pcr_date_rec[]" class="form-control"></td>

								<td><input type="number" name="ref_no_1[]" value="0" class="form-control"></td>

								<td rowspan="2"><input type="date" name="pcr_date_test[]" class="form-control"></td>

								<td><select name="pcr_remarks[]" class="form-control">
										<option value="">Select </option>
										<option value="postive">postive</option>
										<option value="Negative">Negative</option>
										<option value="spoilt">spoilt</option>
									</select>
								</td> -->
								<!-- 	Dissection -->



								<td rowspan="2">
									<a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
								</td>
							</tr>

							<tr id="rec-1">
								<!-- <td><input type="number" name="No_mos_2[]" value="0" onchange="TotalNoMos()" onkeyup="TotalNoMos()" class="form-control"></td> -->
								<!-- <td><input type="number" name="Pool_no_2[]" value="0" class="form-control"></td>
								<td><input type="number" name="ref_no_2[]" value="0" class="form-control"></td>
								<td><select name="pcr_remarks2[]" class="form-control">
										<option value="">Select </option>
										<option value="postive">postive</option>
										<option value="Negative">Negative</option>
										<option value="spoilt">spoilt</option>
									</select>
								</td> -->


							</tr>

						</tbody>








						<tfoot>
							<tr>
								<td class="totalth" colspan="8" style="text-align: center; vertical-align: middle;"> Total</td>
								<td class="totalth"><input type="text" disabled name="TotalCxQuin" class="form-control"></td>
								<!-- <td class="totalth"><input type="text" disabled name="TotalNo_Mos" class="form-control"></td> -->
								<!-- <td class="totalth" colspan="5"> </td> -->



						</tfoot>
					</table>




				</div>




				<div class="box box-primary">
					<div class="box-body" style="overflow: hidden;">
						<div class="col-md-6">




							<div class="form-group">
								<label for="exampleInputPassword1">Total Cx quin mosquitos </label>
								<input type="number" min="0" step="0.01" onkeyup="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" onchange="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" id="total_cx_quin_mosq" name="total_cx_quin_mosq" class="form-control">
							</div>



							<div class="form-group">
								<label for="exampleInputPassword1">Total traps laid </label>
								<input onkeyup="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" onchange="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" type="number" min="0" id="total_traps" name="total_traps" class="form-control">
							</div>





							<div class="form-group">
								<label for="exampleInputPassword1">Mosquito density per trap</label>
								<input step=0.01 onclick="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" onchange="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" id="mosquito_density_per_trap" type="number" min="0" name="mosq_density_per_trap" class="form-control">
							</div>




						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputPassword1">Name of HEO </label>
								<input type="text" name="heo" class="form-control">
							</div>



							<div class="form-group">
								<label for="exampleInputPassword1">Date   </label>
								<input data-date-format="yyyy-mm-d" type="date" name="date" class="datepicker_v form-control ">
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Regional medical Officer </label>
								<input type="text" name="rmo_ent" class="form-control">
							</div>




						</div>


						<div class="box-footer">
							<center>
								<button type="submit" class="btn btn-primary">Submit</button>
							</center>
						</div>


					</div>


			</form>

			<!-- /.row -->
	</section>
	<!-- /.content -->
</div>






<div style="display:none;">
	<table id="sample_table">
		<tbody>
			<tr id="">
				<td id="sample_rowonre" rowspan="2"><span class="sn">1</span>.</td>
				<!-- <td rowspan="2"><input type="text" name="serial_no[]" class="form-control"></td> -->
				<td rowspan="2"><input data-date-format="yyyy-mm-d" type="date" name="date2[]" class="form-control"></td>
				<td rowspan="2"><input type="number" required value="0" min="0" name="no_of_traps[]" class="form-control" onchange="TotalTrapLaid()" onkeyup="TotalTrapLaid()"></td> <!-- 					//new filed -->
				<!-- <td rowspan="2"><input type="text" name="phm_area[]" class="form-control"></td> -->
				<td rowspan="2"><input type="text" name="gn_division[]" class="form-control"></td>
				<td rowspan="2"><input type="text" name="chief_occupant[]" class="form-control"></td>
				<td rowspan="2"><input type="text" name="address[]" required class="form-control"></td>
				<td rowspan="2"><input type="text" name="gps_lat[]" class="form-control"></td>
				<td rowspan="2"><input type="text" name="gps_long[]" class="form-control"></td>
				<td rowspan="2"><input type="number" required min="0" name="total_cx_quin[]" class="form-control" value="0" onchange="Total_CxQuin()" onkeyup="Total_CxQuin()"></td>

				<!-- <td><input type="number" name="No_mos_1[]" value="0" class="form-control" onchange="TotalNoMos()" onkeyup="TotalNoMos()"></td>
				<td><input type="number" name="Pool_no_1[]" value="0" class="form-control"></td>

				<td rowspan="2"><input type="number" name="pcr_date_rec[]" class="form-control"></td>

				<td><input type="number" name="ref_no_1[]" value="0" class="form-control"></td>

				<td rowspan="2"><input type="date" name="pcr_date_test[]" class="form-control"></td>

				<td><select name="pcr_remarks[]" class="form-control">
						<option value="">Select </option>
						<option value="postive">postive</option>
						<option value="Negative">Negative</option>
						<option value="spoilt">spoilt</option>
					</select>
				</td>
				<!-- 	Dissection -->



				<td rowspan="2">
					<a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
				</td>


			</tr>


			<tr name="secondrow" id="">

				<!-- <td><input type="number" name="No_mos_2[]" value="0" onchange="TotalNoMos()" onkeyup="TotalNoMos()" class="form-control"></td>
				<td><input type="number" name="Pool_no_2[]" value="0" class="form-control"></td>
				<td><input type="number" name="ref_no_2[]" value="0" class="form-control"></td>
				<td><select name="pcr_remarks2[]" class="form-control">
						<option value="">Select </option>
						<option value="postive">postive</option>
						<option value="Negative">Negative</option>
						<option value="spoilt">spoilt</option>
					</select> -->


			</tr>




		</tbody>
	</table>
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
</style>



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
		mosquitoCalculation('total_cx_quin_mosq', 'total_traps', 'mosquito_density_per_trap');

	});







	function Total_CxQuin() {
		var inps = document.querySelectorAll('input[name="total_cx_quin[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalCxQuin")[0].value = totals;
		document.getElementsByName("total_cx_quin_mosq")[0].value = totals;

		mosquitoCalculation('total_cx_quin_mosq', 'total_traps', 'mosquito_density_per_trap');


	}






	function TotalNoMos() {
		var inps = document.querySelectorAll('input[name="No_mos_1[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}


		var inps2 = document.querySelectorAll('input[name="No_mos_2[]"]');
		var totals2 = 0;

		for (var i = 0; i < inps2.length; i++) {
			totals2 = totals2 + parseInt(inps2[i].value);
		}




		console.log("Total amount on " + totals);
		document.getElementsByName("TotalNo_Mos")[0].value = totals + totals2;
	}


	function TotalNoOFMos() {
		var inps = document.querySelectorAll('input[name="No_of_mos[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalNoOF_Mos")[0].value = totals;
	}


	function TotalNOInfectedMos() {
		var inps = document.querySelectorAll('input[name="No_of_infected_mos[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalNOInfected_Mos")[0].value = totals;
	}

	function TotalNOInfectiveMos() {
		var inps = document.querySelectorAll('input[name="No_of_infective_mos[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalNOInfective_Mos")[0].value = totals;
	}





	function TotalHeadmf() {
		var inps = document.querySelectorAll('input[name="head_mf[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalHead_mf")[0].value = totals;
	}





	function Totalheadl1() {
		var inps = document.querySelectorAll('input[name="head_l1[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("Totalhead_l1")[0].value = totals;
	}








	function Totalheadl2() {
		var inps = document.querySelectorAll('input[name="head_l2[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("Totalhead_l2")[0].value = totals;
	}




	function Totalheadl3() {
		var inps = document.querySelectorAll('input[name="head_l3[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("Totalhead_l3")[0].value = totals;
	}




	function TotalThoraxmf() {
		var inps = document.querySelectorAll('input[name="thorax_mf[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalThorax_mf")[0].value = totals;
	}



	function TotalThoraxl1() {
		var inps = document.querySelectorAll('input[name="thorax_l1[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalThorax_l1")[0].value = totals;
	}




	function TotalThoraxl2() {
		var inps = document.querySelectorAll('input[name="thorax_l2[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalThorax_l2")[0].value = totals;
	}




	function TotalThoraxl3() {
		var inps = document.querySelectorAll('input[name="thorax_l3[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalThorax_l3")[0].value = totals;
	}





	function TotalAbdomenmf() {
		var inps = document.querySelectorAll('input[name="abdomen_mf[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalAbdomen_mf")[0].value = totals;
	}



	function TotalAbdomenL1() {
		var inps = document.querySelectorAll('input[name="abdomen_l1[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalAbdomen_L1")[0].value = totals;
	}





	function TotalAbdomenL2() {
		var inps = document.querySelectorAll('input[name="abdomen_l2[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalAbdomen_L2")[0].value = totals;
	}




	function TotalAbdomenL3() {
		text
		var inps = document.querySelectorAll('input[name="abdomen_l3[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalAbdomen_L3")[0].value = totals;
	}



	function TotalTrapLaid() {
		var inps = document.querySelectorAll('input[name="no_of_traps[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total trap " + totals);
		document.getElementsByName("total_traps")[0].value = totals;

		mosquitoCalculation('total_cx_quin_mosq', 'total_traps', 'mosquito_density_per_trap');
	}
</script>