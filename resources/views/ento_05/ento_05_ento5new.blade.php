<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Mosquito Dissection<br>

		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#"> Entomological data</a></li>
			<li class="active">Mosquito Dissection</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<!-- left column -->
			<form method="post" action="{{url('/ento_05_new_save') }}">

				{{ csrf_field() }}
				<div class="col-md-12">
					@if (session()->has('message'))


					@if (session()->has('id'))
					<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<Center>
							<h3><i class="icon fa fa-check"></i> Your form ID is :- {{ session()->get('id') }} </h3>
						</Center>
					</div>
					@endif






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






							<div class="col-md-6">

								<div class="form-group">
									<label for="exampleInputEmail1">Form List</label>
									<select name="main_form_type" required id="main_form_type" class="form-control" onchange="getEntoFrom(this.value)">
										<option value="">Select</option>
										<option value="ento_01">IHC</option>
										<option value="ento_02">GTC</option>
										<option value="ento_03">CBNT</option>
										<option value="ento_04">HLNC</option>
									</select>
								</div>



								<div class="form-group">
									<label for="exampleInputPassword1">Received by </label>
									<div class="col-md-12">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Position</label>
												<select name="received_by_postion" id="received_by_postion" class="form-control">
													<option value=" ">Select</option>
													<option value="PHLT">PHLT</option>
													<option value="HEO">HEO</option>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Name</label>
												<input type="text" required name="received_by" id="received_by" class="form-control">
											</div>
										</div>

									</div>
								</div>





								<div class="form-group">
									<label for="exampleInputPassword1">Dissected by </label>
									<div class="col-md-12">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Position</label>
												<select name="dissected_by_by_postion" id="dissected_by_by_postion" required class="form-control">
													<option value=" ">Select</option>
													<option value="PHLT">PHLT</option>
													<option value="HEO">HEO</option>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Name</label>
												<input type="text" required name="dissected_by" id="dissected_by" required="" class="form-control">
											</div>
										</div>

									</div>
								</div>



								<div class="form-group">
									<label for="exampleInputPassword1">Examined by </label>
									<div class="col-md-12">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Position</label>
												<select name="examined_by_by_postion" id="examined_by_by_postion" required class="form-control">
													<option value=" ">Select</option>
													<option value="PHLT">PHLT</option>
													<option value="HEO">HEO</option>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Name</label>
												<input type="text" required name="examined" id="examined" class="form-control">
											</div>
										</div>

									</div>
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputPassword1">Ento from ID</label>
									<select name="main_form_id" class="form-control" id="id_list" onchange="newgetaddress(this.value)" required>
										<option value="">Select</option>
									</select>
								</div>


								<div class="form-group">
									<label for="exampleInputPassword1">Date of received </label>
									<input required data-date-format="yyyy-mm-d" type="date" name="received_by_date" id="received_by_date" class="datepicker_v form-control ">
								</div>


								<div class="form-group">
									<label for="exampleInputPassword1">Date of dissected </label>
									<input required data-date-format="yyyy-mm-d" type="date" name="dissected_by_date" id="dissected_by_date" class="datepicker_v form-control ">
								</div>



								<div class="form-group">
									<label for="exampleInputPassword1">Date of examined</label>
									<input required data-date-format="yyyy-mm-d" type="date" name="examined_date" id="examined_date" class="datepicker_v form-control ">
								</div>



								<div class="form-group hidden">
									<label for="exampleInputPassword1">Confirmed</label>
									<select name="confirmed" id="" class="form-control">
										<option value="">Select</option>
										<option value="yes">yes</option>
										<option value="No">No</option>
									</select>
								</div>

								<div class="form-group hidden">
									<label for="exampleInputPassword1">Confirmed by(Entomologist)</label>
									<input type="text" name="confirmed_by" class="form-control">
								</div>




							</div>








						</div>
					</div>
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
								<th rowspan="2">#Row NO</th>
								<th rowspan="2">Name & address </th>
								<th rowspan="2">Mosquito species</th>
					
								<th rowspan="2">No dissected Mosquitos</th>
								<th rowspan="2">Type of Parasite</th>
								<th rowspan="2">No of Mosquitos Positive for Parasite</th>
								<th rowspan="2">Mosquito positive For L3</th>

								<th rowspan="1" colspan="4">Head</th>
								<th rowspan="1" colspan="4">Thorax</th>
								<th rowspan="1" colspan="4">Abdoman</th>

								<th rowspan="2">Remarks</th>

								<th rowspan="2">Action</th>
							</tr>

							<tr>
								<th>Mf</th>
								<th>L1</th>
								<th>L2</th>
								<th>L3</th>

								<th>Mf</th>
								<th>L1</th>
								<th>L2</th>
								<th>L3</th>

								<th>Mf</th>
								<th>L1</th>
								<th>L2</th>
								<th>L3</th>
							</tr>

							</tr>
						</thead>


						<tbody id="tbl_posts_body">




						</tbody>


						<tfoot>
							<tr>
							</tr>
						</tfoot>
					</table>






					<div class="box-footer">
                        <center>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </center>

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
				</style>

		






			</form>
		</div>
	</section>
</div>







<div style="display:none;">
	<table id="sample_table">
		<tbody>
			<tr id="">

				<td id="sample_rowonre" rowspan="1"><span class="sn">1</span>.</td>
				<td><select name="address[]" required class="form-control" id="ad_list">
						<option value=""> Select Ento 5 ID </option>
					</select>
				</td>
				<td>
					<select required name="species2[]" class="form-control" id="mosqspecies">
						<option value="">Select</option>
						<option value="CX"> Cx quin </option>
						<option value="Mansonia"> Mansonia </option>
					</select>
				</td>
				<td> <input required type="number"  min="0"  name="no_dissected_mosquitos[]" value="0" class="form-control"></td>
				<td>
					<select required name="type_of_parasite[]" class="form-control" id="mosqspecies">
						<option value="">Select</option>
						<option value="Wuchereria bancrofit">Wuchereria bancrofit</option>
						<option value="Brugia malayi">Brugia malayi</option>
						<option value="0">0</option>
					</select>
				</td>
				<td><input required type="number"  min="0"  name="positive_mosq[]" value="0" class="form-control"></td>

				<td><input type="number"  min="0"  name="mq_postive_for_l3[]" value="0" class="form-control"></td>


				<td><input type="number" min="0"  name="head_mf[]" class="form-control" style="    width: 40px;" value="0"></td>
				<td><input type="number" min="0"  name="head_l1[]" class="form-control"  style="    width: 40px;"value="0"></td>
				<td><input type="number"  min="0" name="head_l2[]" class="form-control"  style="    width: 40px;"value="0"></td>
				<td><input type="number"  min="0" name="head_l3[]" class="form-control"  style="    width: 40px;"value="0"></td>
				<td><input type="number"  min="0" name="thorax_mf[]" class="form-control" style="    width: 40px;" value="0"></td>
				<td><input type="number"  min="0" name="thorax_l1[]" class="form-control" style="    width: 40px;" value="0"></td>
				<td><input type="number"  min="0" name="thorax_l2[]" class="form-control"  style="    width: 40px;"value="0"></td>
				<td><input type="number"  min="0" name="thorax_l3[]" class="form-control"  style="    width: 40px;"value="0"></td>
				<td><input type="number"  min="0" name="abdomen_mf[]" class="form-control" style="    width: 40px;" value="0"></td>
				<td><input type="number"  min="0" name="abdomen_l1[]" class="form-control" style="    width: 40px;" value="0"></td>
				<td><input type="number"  min="0" name="abdomen_l2[]" class="form-control" style="    width: 40px;" value="0"></td>
				<td><input type="number"  min="0" name="abdomen_l3[]" class="form-control" style="    width: 40px;" value="0"></td>
				<td><input type="text"  min="0" name="remarks[]" class="form-control"></td>
				<td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>



			</tr>
		</tbody>
	</table>
</div>



<script type="text/javascript">
	$(document).ready(function() {

		var index2 = 0;

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


	});














</script>