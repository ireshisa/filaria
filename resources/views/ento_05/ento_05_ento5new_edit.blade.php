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
			<form method="post" action="{{url('/ento_05_new_edit') }}">
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



							@foreach ( $ento5_list as $key )

							<?php
							$formid = $key->formid;
							$main_form_type = $key->main_form_type;
							$received_by_postion = $key->received_by_postion;
							$received_by = $key->received_by;
							$dissected_by_by_postion = $key->dissected_by_by_postion;
							$dissected_by = $key->dissected_by;
							$examined_by_by_postion = $key->examined_by_by_postion;
							$examined = $key->examined;
							$main_form_id = $key->main_form_id;
							$received_by_date = $key->received_by_date;
							$dissected_by_date = $key->dissected_by_date;
							$examined_date = $key->examined_date;
							$confirmed_by = $key->confirmed_by;


							?>
							@endforeach
							<input type="hidden" name="formid" value="{{$formid}}">

							<div class="col-md-6">

								<div class="form-group">
									<label for="exampleInputEmail1">Form List</label>
									<select name="main_form_type" required id="main_form_type" class="form-control" readonly>
										<option value="">Select</option>
										<option value="ento_01" {{ $main_form_type =='ento_01' ? 'selected':'' }}>IHC</option>
										<option value="ento_02" {{ $main_form_type =='ento_02' ? 'selected':'' }}>GTC</option>
										<option value="ento_03" {{ $main_form_type =='ento_03' ? 'selected':'' }}>CBNT</option>
										<option value="ento_04" {{ $main_form_type =='ento_04' ? 'selected':'' }}>HLNC</option>
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
													<option value="PHLT" {{ $received_by_postion =='PHLT' ? 'selected':'' }}>PHLT</option>
													<option value="HEO" {{ $received_by_postion =='HEO' ? 'selected':'' }}>HEO</option>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Name</label>
												<input type="text" required name="received_by" value="{{ $received_by }}" id="received_by" class="form-control">
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
													<option value="PHLT" {{ $dissected_by_by_postion =='PHLT' ? 'selected':'' }}>PHLT</option>
													<option value="HEO" {{ $dissected_by_by_postion =='HEO' ? 'selected':'' }}>HEO</option>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Name</label>
												<input type="text" required name="dissected_by" value="{{ $dissected_by }}" id="dissected_by" required="" class="form-control">
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
													<option value="PHLT" {{ $examined_by_by_postion =='PHLT' ? 'selected':'' }}>PHLT</option>
													<option value="HEO" {{ $examined_by_by_postion =='HEO' ? 'selected':'' }}>HEO</option>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputPassword1">Name</label>
												<input type="text" required name="examined" value="{{ $examined }}" id="examined" class="form-control">
											</div>
										</div>

									</div>
								</div>






							</div>




							<div class="col-md-6">

								<div class="form-group">
									<label for="exampleInputPassword1">Ento from ID</label>
									<select name="main_form_id" class="form-control" id="id_list" onchange="newgetaddress(this.value)" required readonly>
										<option value="{{ $main_form_id }}">{{ $main_form_id }}</option>
									</select>
								</div>


								<div class="form-group">
									<label for="exampleInputPassword1">Date of received </label>
									<input required data-date-format="yyyy-mm-d" type="date" name="received_by_date" value="{{ $received_by_date }}" id="received_by_date" class="datepicker_v form-control ">
								</div>


								<div class="form-group">
									<label for="exampleInputPassword1">Date of dissected </label>
									<input required data-date-format="yyyy-mm-d" type="date" name="dissected_by_date" value="{{ $dissected_by_date }}" id="dissected_by_date" class="datepicker_v form-control ">
								</div>



								<div class="form-group">
									<label for="exampleInputPassword1">Date of examined</label>
									<input required data-date-format="yyyy-mm-d" type="date" name="examined_date" value="{{ $examined_date }}" id="examined_date" class="datepicker_v form-control ">
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
									<input type="text" name="confirmed_by" value="{{ $confirmed_by }}" class="form-control">
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


						</thead>


						<tbody id="tbl_posts_body">
							<?php $X = 0; ?>
							@foreach ( $ento5_list as $key )
							<?php $X++; ?>

							<tr id="">
								<td id="sample_rowonre" rowspan="1"><span class="sn">{{ $X }}</span> <input type="hidden" name="ento_05_new_id[]" value="{{ $key->ento_05_new_id }}"> .</td>
								<td><select name="" required class="form-control" id="ad_list_old" disabled>
										<option selected value="{{ $key->address }}"> {{ $key->address }}</option>
									</select>
								</td>

								<td>
									<select style="width: 200px;"  required name="species2[]" class="form-control"  disabled>
										<option selected value="{{$key->species2}}">{{$key->species2}}</option>

									</select>
								</td>

								<td> <input  required type="number" name="no_dissected_mosquitos[]" value="{{ $key->no_dissected_mosquitos }}" class="form-control"></td>
								<td>
									<select   required name="type_of_parasite[]" class="form-control">
										<option value="">Select</option>
										<option value="Wuchereria bancrofit" {{ $key->type_of_parasite == 'Wuchereria bancrofit' ? 'selected' : '' }}>Wuchereria bancrofit</option>
										<option value="Brugia malayi" {{$key->type_of_parasite == 'Brugia malayi' ? 'selected' : '' }}>Brugia malayi</option>
										<option value="0" {{ $key->type_of_parasite=='0'? 'selected':'' }}>0</option>
									</select>
								</td>
								<td><input required type="number" name="positive_mosq[]" value="{{ $key->positive_mosq }}" class="form-control"></td>

								<td><input type="number" name="mq_postive_for_l3[]" value="{{ $key->mq_postive_for_l3 }}" class="form-control"></td>


								<td><input style="width: 40px;" type="number" name="head_mf[]" class="form-control" value="{{ $key->head_mf }}"></td>
								<td><input style="width: 40px;" type="number" name="head_l1[]" class="form-control" value="{{ $key->head_l1 }}"></td>
								<td><input style="width: 40px;" type="number" name="head_l2[]" class="form-control" value="{{ $key->head_l2 }}"></td>
								<td><input style="width: 40px;" type="number" name="head_l3[]" class="form-control" value="{{ $key->head_l3 }}"></td>
								<td><input style="width: 40px;" type="number" name="thorax_mf[]" class="form-control" value="{{ $key->thorax_mf }}"></td>
								<td><input style="width: 40px;" type="number" name="thorax_l1[]" class="form-control" value="{{ $key->thorax_l1 }}"></td>
								<td><input style="width: 40px;" type="number" name="thorax_l2[]" class="form-control" value="{{ $key->thorax_l2 }}"></td>
								<td><input style="width: 40px;" type="number" name="thorax_l3[]" class="form-control" value="{{ $key->thorax_l3 }}"></td>
								<td><input style="width: 40px;" type="number" name="abdomen_mf[]" class="form-control" value="{{ $key->abdomen_mf }}"></td>
								<td><input style="width: 40px;" type="number" name="abdomen_l1[]" class="form-control" value="{{ $key->abdomen_l1 }}"></td>
								<td><input style="width: 40px;" type="number" name="abdomen_l2[]" class="form-control" value="{{ $key->abdomen_l2 }}"></td>
								<td><input style="width: 40px;" type="number" name="abdomen_l3[]" class="form-control" value="{{ $key->abdomen_l3 }}"></td>
								<td><input style="width: 40px;" type="text" name="remarks[]" value="{{ $key->remarks }}" class="form-control"></td>




								<td> <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/ento5_view_new_delete') }}/{{ $key->ento_05_new_id  }}" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i> </a></td>



							</tr>


							@endforeach


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

				<td id="sample_rowonre" rowspan="1"><span class="sn">1</span>. <input type="hidden" name="idnew[]" value="0"></td>
				<td><select name="addresse[]" required class="form-control" id="ad_list">
						<option value=""> Select Ento 5 ID </option>
					</select>
				</td>
				<td>
					<select required name="species2e[]" class="form-control" id="mosqspecies">
						<option value="">Select</option>
						<option value="CX"> Cx quin </option>
						<option value="Mansonia"> Mansonia </option>
					</select>
				</td>
				<td> <input required type="number" name="no_dissected_mosquitose[]" value="0" class="form-control"></td>
				<td>
					<select required name="type_of_parasitee[]" class="form-control" id="mosqspecies">
						<option value="">Select</option>
						<option value="Wuchereria bancrofit">Wuchereria bancrofit</option>
						<option value="Brugia malayi">Brugia malayi</option>
						<option value="0">0</option>
					</select>
				</td>
				<td><input required type="number" name="positive_mosqe[]" value="0" class="form-control"></td>

				<td><input type="number" name="mq_postive_for_l3e[]" value="0" class="form-control"></td>


				<td><input type="number" name="head_mfe[]" class="form-control" value="0"></td>
				<td><input type="number" name="head_l1e[]" class="form-control" value="0"></td>
				<td><input type="number" name="head_l2e[]" class="form-control" value="0"></td>
				<td><input type="number" name="head_l3e[]" class="form-control" value="0"></td>
				<td><input type="number" name="thorax_mfe[]" class="form-control" value="0"></td>
				<td><input type="number" name="thorax_l1e[]" class="form-control" value="0"></td>
				<td><input type="number" name="thorax_l2e[]" class="form-control" value="0"></td>
				<td><input type="number" name="thorax_l3e[]" class="form-control" value="0"></td>
				<td><input type="number" name="abdomen_mfe[]" class="form-control" value="0"></td>
				<td><input type="number" name="abdomen_l1e[]" class="form-control" value="0"></td>
				<td><input type="number" name="abdomen_l2e[]" class="form-control" value="0"></td>
				<td><input type="number" name="abdomen_l3e[]" class="form-control" value="0"></td>
				<td><input type="text" name="remarkse[]" class="form-control"></td>
				<td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>



			</tr>
		</tbody>
	</table>
</div>




<script type="text/javascript">
	$(document).ready(function() {

		var index2 = {{$X}};

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

	newgetaddress({{$main_form_id}});

</script>