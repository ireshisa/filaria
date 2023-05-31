<?php
			$no_dissected_mosquitos = null;
			$positive_mosq = null;
			$mq_postive_for_l3 = null;
			$head_mf = null;
			$head_l1 = null;
			$head_l2 = null;
			$head_l3 = null;
			$thorax_mf = null;
			$thorax_l1 = null;
			$thorax_l2 = null;
			$thorax_l3 = null;
			$abdomen_mf = null;
			$abdomen_l1 = null;
			$abdomen_l2 = null;
			$abdomen_l3 = null;
?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
		Gravid Trap Collection  FORM<br>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Entomological data</a></li>
			<li class="active">Gravid Trap Collection VIEW</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- left column -->
			<form method="post" action="{{url('/ento2UpdateNew') }}">
				{{csrf_field() }}
				<div class="col-md-12">
					@if(session()->has('message'))
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

								<div class="form-group">
									<label for="exampleInputEmail1">Form ID</label>
									<input type="text" name="formid" class="form-control" readonly value="{{ $ento2_list->formid }}" required>
								</div>




								<div class="form-group">
									<label for="exampleInputEmail1">District</label>
									{{-- <select name="district" class="form-control" required="">
                    <option value="">Select</option>
                    @if(Auth::user()->role!=="ADMIN" & Auth::user()->role !== "AFC")
                    <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}
									</option>
									@else
									@foreach ($district_list as $dis)
									<option value="{{ $dis->district }}">{{ $dis->district }}</option>
									@endforeach
									@endif
									</select> --}}
									<input type="text" name="district" readonly class="datepicker_v form-control pull-right" value="{{ $ento2_list->district }}">
								</div>




								<div class="form-group">
									<label for="exampleInputPassword1">MOH area </label>
									<input type="text" name="moh_area" class="form-control" value="{{ $ento2_list->moh_area }}">
								</div>

								<input type="hidden" name="ento_02_id" value="{{ $ento2_list->ento_02_id }}" class="form-control">



								{{-- <div class="form-group">
									<label for="exampleInputPassword1">GN division</label>
									<input type="text" name="gn_division" class="form-control">
								</div>  --}}

								{{-- <div class="form-group hide">
									<label for="exampleInputPassword1">Method </label>
									<!-- <input  type="text" name="method" class="form-control"
                  placeholder="Method..."> -->
									<select name="method" class="form-control">
										<option value="">Select</option>
										<option value="gravid trap collection">gravid trap collection</option>
										<option value="indoor hand collection">indoor hand collection</option>
										<option value="cattle bait collection">cattle bait collection</option>
										<option value="human landing night collection">human landing night collection
										</option>
									</select>
								</div>  --}}

							</div>



							<div class="col-md-6">
								<br>

								<div class="form-group">
									<label for="exampleInputPassword1">PHM area</label>
									<input type="text" name="phm_area" class="form-control" value="{{ $ento2_list->phm_area }}">
								</div>




								<div class="form-group">
									<label for="exampleInputPassword1">Weather condition </label>
									<select id="weather" name="weather_condition" class="form-control">
										<option value=" ">Select Weather Condition</option>
										<option {{ $ento2_list->weather_condition == 'Cloudy' ? 'selected' : '' }} value="Cloudy ">Cloudy </option>
										<option {{ $ento2_list->weather_condition == 'Cold' ? 'selected' : '' }} value="Cold">Cold </option>
										<option {{ $ento2_list->weather_condition == 'Drizzly' ? 'selected' : '' }} value="Drizzly">Drizzly </option>
										<option {{ $ento2_list->weather_condition == 'Rainy' ? 'selected' : '' }} value="Rainy">Rainy </option>
										<option {{ $ento2_list->weather_condition == 'Windy(moderate)' ? 'selected' : '' }} value="Windy(moderate)">Windy (moderate)</option>
										<option {{ $ento2_list->weather_condition == 'Windy(heavy)' ? 'selected' : '' }} value="Windy(heavy)">Windy (heavy)</option>
										<option {{ $ento2_list->weather_condition == 'Moonlight' ? 'selected' : '' }} value="Moonlight">Moonlight</option>
										<option {{ $ento2_list->weather_condition == 'Dry' ? 'selected' : '' }} value="Dry">Dry</option>
										<option {{ $ento2_list->weather_condition == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
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




				@foreach ($ento2_list->ento_02_dataes as $data)

				<input type="hidden" name="id2[]" value="{{ $data->id }}">
				@endforeach





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

								<th rowspan="4">GN Division</th>
								<th rowspan="4">Name Of The Chief Occupant</th>
								<th rowspan="4">Address</th>
								<th rowspan="4">Longitude</th>
								<th rowspan="4">Latitude</th>
								<th rowspan="4">Total No of Cx. <br> quin. Collected </th>
								<th colspan="6">PCR detail</th>
								<th colspan="15">Dissection</th>
								<th rowspan="4">Action</th>

							</tr>


							<tr>
								<th rowspan="3">No of Mos:</th>
								<th rowspan="3">Pool no</th>
								<th rowspan="3">Date of received</th>
								<th rowspan="3">Ref. No</th>
								<th rowspan="3">Date of Tested</th>
								<th rowspan="3">Result</th>
								<th rowspan="3">No of Mos:</th>
								<th rowspan="3">No of infected mos</th>
								<th rowspan="3">No of infective mos</th>
								<th colspan="12">Part Of Infection</th>

							</tr>

							<tr>
								<th colspan="4">Head</th>
								<th colspan="4">Thorax</th>
								<th colspan="4">Abdomen</th>
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

							<?php $i = 0; ?>
							@foreach ($ento1_list_5 as $data)

							<?php $i++; ?>


							<tr id="rec-1">
								<td id="sample_rowonre" rowspan="2"><span class="sn">{{$i}}</span>.</td>
								<!-- <td rowspan="2"><input type="text" name="quin. Collected[]" value="{{ $data->serial_no }}" class="form-control"></td> -->
								<td rowspan="2"><input type="date" name="date2[]" value="{{ $data->date }}" class="form-control"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="no_of_traps[]" value="{{ $data->no_of_traps }}" class="form-control" onchange="TotalTrapLaid()" onkeyup="TotalTrapLaid()"></td> <!-- 					//new filed -->

								<td rowspan="2"><input type="text" name="gn_division[]" value="{{ $data->gn_division }}" class="form-control"></td>
								<td rowspan="2"><input type="text" name="chief_occupant[]" value="{{ $data->chief_occupant }}" class="form-control"></td>
								<td rowspan="2"><input type="text" name="address[]" value="{{ $data->address }}" class="form-control"></td>
								<td rowspan="2"><input type="text" name="gps_lat[]" value="{{ $data->gps_lat }}" class="form-control"></td>
								<td rowspan="2"><input type="text" name="gps_long[]" value="{{ $data->gps_long }}" class="form-control"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="total_cx_quin[]" value="{{ $data->total_cx_quin }}" class="form-control" value="0" onchange="Total_CxQuin()" onkeyup="Total_CxQuin()"></td>

								<td><input type="number" required pattern="\d*" min="0" name="No_mos_1[]" value="{{ $data->No_mos_1 != null ? $data->No_mos_1 : '0' }}" class="form-control" onchange="TotalNoMos()" onkeyup="TotalNoMos()"></td>
								<td><input type="text" min="0" name="Pool_no_1[]" value="{{ $data->Pool_no_1 != null ? $data->Pool_no_1 : '0' }}" class="form-control"></td>


								<td rowspan="2"><input type="date" min="0" name="pcr_date_rec[]" value="{{ $data->pcr_date_rec }}" class="form-control" {{ $pcr_details }}></td>

								<td><input type="text" min="0" name="ref_no_1[]" value="{{ $data->ref_no_1 != null ? $data->ref_no_1 : '0' }}" value="0" class="form-control" {{ $pcr_details }}></td>

								<td rowspan="2"><input type="date" name="pcr_date_test[]" value="{{ $data->pcr_date_test }}" class="form-control" {{ $pcr_details }}></td>

								<td><select name="pcr_remarks[]" class="form-control" style="width: 130px;" {{ $pcr_details }}>
										<option value="">Select </option>
										<option {{ $data->pcr_remarks == 'postive' ? 'selected' : '' }} value="postive">postive</option>
										<option {{ $data->pcr_remarks == 'Negative' ? 'selected' : '' }} value="Negative">Negative</option>
										<option {{ $data->pcr_remarks == 'Not tested' ? 'selected' : '' }} value="Not tested">Not tested</option>
									</select>
								</td>
								@foreach ($data->Ento_5_news as $data2)
								<?php
								$no_dissected_mosquitos = $data2->no_dissected_mosquitos;
								if ($data2->type_of_parasite == 'Brugia malayi' || $data2->type_of_parasite == 'Wuchereria bancrofit') {
									if ($data2->species2 == 'CX') {

										$positive_mosq = $data2->positive_mosq;
										$mq_postive_for_l3 = $data2->mq_postive_for_l3;
										$head_mf = $data2->head_mf;
										$head_l1 = $data2->head_l1;
										$head_l2 = $data2->head_l2;
										$head_l3 = $data2->head_l3;
										$thorax_mf = $data2->thorax_mf;
										$thorax_l1 = $data2->thorax_l1;
										$thorax_l2 = $data2->thorax_l2;
										$thorax_l3 = $data2->thorax_l3;
										$abdomen_mf = $data2->abdomen_mf;
										$abdomen_l1 = $data2->abdomen_l1;
										$abdomen_l2 = $data2->abdomen_l2;
										$abdomen_l3 = $data2->abdomen_l3;
									}
								}
								?>
								@endforeach

								<!-- 	Dissection -->
								<td rowspan="2"> <input type="number" required pattern="\d*" min="0" name="no_of_dissected[]" value="{{ $no_dissected_mosquitos != null ? $no_dissected_mosquitos : '0' }}" class="form-control" onchange="TotalNoOFMos()" onkeyup="TotalNoOFMos()"></td>
								<td rowspan="2"> <input type="number" required pattern="\d*" min="0" name="no_of_infrcted[]" value="{{ $positive_mosq != null ? $positive_mosq : '0' }}" class="form-control" onchange="TotalNOInfectedMos()" onkeyup="TotalNOInfectedMos()"></td>
								<td rowspan="2"> <input type="number" required pattern="\d*" min="0" name="no_of_infective[]" value="{{ $mq_postive_for_l3 != null ? $mq_postive_for_l3 : '0' }}" class="form-control" onchange="TotalNOInfectiveMos()" onkeyup="TotalNOInfectiveMos()"></td>

								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="head_mf[]" value="{{ $head_mf != null ? $head_mf : '0' }}" class="form-control" style="width: 40px;" onchange="TotalHeadmf()" onkeyup="TotalHeadmf()"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="head_l1[]" value="{{ $head_l1 != null ? $head_l1 : '0' }}" class="form-control" style="width: 40px;" onchange="Totalheadl1()" onkeyup="Totalheadl1()"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="head_l2[]" value="{{ $head_l2 != null ? $head_l2 : '0' }}" class="form-control" style="width: 40px;" onchange="Totalheadl2()" onkeyup="Totalheadl2()"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="head_l3[]" value="{{ $head_l3 != null ? $head_l3 : '0' }}" class="form-control" style="width: 40px;" onchange="Totalheadl3()" onkeyup="Totalheadl3()"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="thorax_mf[]" value="{{ $thorax_mf != null ? $thorax_mf : '0' }}" class="form-control" style="width: 40px;" onchange="TotalThoraxmf()" onkeyup="TotalThoraxmf()"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="thorax_l1[]" value="{{ $thorax_l1 != null ? $thorax_l1 : '0' }}" class="form-control" style="width: 40px;" onchange="TotalThoraxl1()" onkeyup="TotalThoraxl1()"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="thorax_l2[]" value="{{ $thorax_l2 != null ? $thorax_l2 : '0' }}" class="form-control" style="width: 40px;" onchange="TotalThoraxl2()" onkeyup="TotalThoraxl2()"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="thorax_l3[]" value="{{ $thorax_l3 != null ? $thorax_l3 : '0' }}" class="form-control" style="width: 40px;" onchange="TotalThoraxl3()" onkeyup="TotalThoraxl3()"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="abdomen_mf[]" value="{{ $abdomen_mf != null ? $abdomen_mf : '0' }}" class="form-control" style="width: 40px;" onchange="TotalAbdomenmf()" onkeyup="TotalAbdomenmf()"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="abdomen_l1[]" value="{{ $abdomen_l1 != null ? $abdomen_l1 : '0' }}" class="form-control" style="width: 40px;" onchange="TotalAbdomenL1()" onkeyup="TotalAbdomenL1()"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="abdomen_l2[]" value="{{ $abdomen_l2 != null ? $abdomen_l2 : '0' }}" class="form-control" style="width: 40px;" onchange="TotalAbdomenL2()" onkeyup="TotalAbdomenL2()"></td>
								<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="abdomen_l3[]" value="{{ $abdomen_l3 != null ? $abdomen_l3 : '0' }}" class="form-control" style="width: 40px;" onchange="TotalAbdomenL3()" onkeyup="TotalAbdomenL3()"></td>
								<?php
								$no_dissected_mosquitos = "";
								$positive_mosq = "";
								$mq_postive_for_l3 = "";
								$head_mf = "";
								$head_l1 = "";
								$head_l2 = "";
								$head_l3 = "";
								$thorax_mf = "";
								$thorax_l1 = "";
								$thorax_l2 = "";
								$thorax_l3 = "";
								$abdomen_mf = "";
								$abdomen_l1 = "";
								$abdomen_l2 = "";
								$abdomen_l3 = "";
								?>

								<td rowspan="2">
									<a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_ento2_data_new') }}/{{$data->id }}" class="btn btn-danger btn-sm">
										<i class="glyphicon glyphicon-trash"></i></a>
								</td>
							</tr>

							<tr id="rec-1">
								<td><input type="number" required pattern="\d*" min="0" name="No_mos_2[]" value="{{ $data->No_mos_2 != null ? $data->No_mos_2 : '0' }}" onchange="TotalNoMos()" onkeyup="TotalNoMos()" class="form-control"></td>
								<td><input type="text" min="0" name="Pool_no_2[]" value="{{ $data->Pool_no_2 != null ? $data->Pool_no_2 : '0' }}" class="form-control"></td>
								<td><input type="text" min="0" name="ref_no_2[]" {{ $pcr_details }} value="{{ $data->ref_no_2 != null ? $data->ref_no_2 : '0' }}" class="form-control"></td>
								<td><select name="pcr_remarks2[]" {{ $pcr_details }} class="form-control">
										<option value="">Select </option>
										<option {{ $data->pcr_remarks2 == 'postive' ? 'selected' : '' }} value="postive">postive</option>
										<option {{ $data->pcr_remarks2 == 'Negative' ? 'selected' : '' }} value="Negative">Negative</option>
										<option {{ $data->pcr_remarks2 == 'Not tested' ? 'selected' : '' }} value="Not tested">Not tested</option>
									</select>
								</td>


							</tr>


							@endforeach


						</tbody>








						<tfoot>
							<tr>
								<td class="totalth" colspan="8" style="text-align: center; vertical-align: middle;"> Total</td>
								<td class="totalth"><input type="text" disabled name="TotalCxQuin" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalNo_Mos" class="form-control"></td>
								<td class="totalth" colspan="5"> </td>
								<td class="totalth"><input type="text" disabled name="TotalNoOF_Mos" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalNOInfected_Mos" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalNOInfective_Mos" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalHead_mf" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="Totalhead_l1" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="Totalhead_l2" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="Totalhead_l3" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalThorax_mf" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalThorax_l1" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalThorax_l2" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalThorax_l3" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalAbdomen_mf" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalAbdomen_L1" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalAbdomen_L2" class="form-control"></td>
								<td class="totalth"><input type="text" disabled name="TotalAbdomen_L3" class="form-control"></td>
							</tr>
						</tfoot>
					</table>




				</div>




				<div class="box box-primary">
					<div class="box-body" style="overflow: hidden;">
						<div class="col-md-6">




							<div class="form-group">
								<label for="exampleInputPassword1">Total Cx quin mosquitos </label>
								<input type="number" min="0" step="0.01" onkeyup="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" onchange="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" id="total_cx_quin_mosq" name="total_cx_quin_mosq" value="{{ $ento2_list->total_cx_quin_mosq }}" class="form-control">
							</div>



							<div class="form-group">
								<label for="exampleInputPassword1">Total traps laid </label>
								<input onkeyup="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" onchange="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" type="number" id="total_traps" name="total_traps" value="{{ $ento2_list->total_traps }}" class="form-control">
							</div>





							<div class="form-group">
								<label for="exampleInputPassword1">Mosquito density per trap</label>
								<input step=0.01 onclick="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" onchange="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')" id="mosquito_density_per_trap" type="number" name="mosq_density_per_trap" value="{{ $ento2_list->mosq_density_per_trap }}" class="form-control">
							</div>




						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleInputPassword1">Name of HEO </label>
								<input type="text" name="heo" class="form-control" value="{{ $ento2_list->heo }}">
							</div>



							<div class="form-group">
								<label for="exampleInputPassword1">Date   </label>
								<input data-date-format="yyyy-mm-d" type="date" name="date" value="{{ $ento2_list->date }}" class="datepicker_v form-control ">
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Regional medical Officer </label>
								<input type="text" name="rmo_ent" class="form-control" value="{{ $ento2_list->rmo_ent }}">
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
				<td rowspan="2"><input type="number" required value="0" name="no_of_traps[]" class="form-control" onchange="TotalTrapLaid()" onkeyup="TotalTrapLaid()"></td> <!-- 					//new filed -->
				<td rowspan="2"><input type="text" name="gn_division[]" class="form-control"></td>
				<td rowspan="2"><input type="text" name="chief_occupant[]" class="form-control"></td>
				<td rowspan="2"><input type="text" name="address[]" class="form-control"></td>
				<td rowspan="2"><input type="text" name="gps_lat[]" class="form-control"></td>
				<td rowspan="2"><input type="text" name="gps_long[]" class="form-control"></td>
				<td rowspan="2"><input type="number" required min="0" name="total_cx_quin[]" class="form-control" value="0" onchange="Total_CxQuin()" onkeyup="Total_CxQuin()"></td>

				<td><input type="number" required min="0" name="No_mos_1[]" value="0" class="form-control" onchange="TotalNoMos()" onkeyup="TotalNoMos()"></td>
				<td><input type="text" min="0" name="Pool_no_1[]" value="0" class="form-control"></td>

				<td rowspan="2"><input type="date" min="0" name="pcr_date_rec[]" {{ $pcr_details }} class="form-control"></td>

				<td><input type="text" min="0" name="ref_no_1[]" {{ $pcr_details }} value="0" class="form-control"></td>

				<td rowspan="2"><input type="date" name="pcr_date_test[]" {{ $pcr_details }} class="form-control"></td>

				<td><select name="pcr_remarks[]" {{ $pcr_details }} class="form-control">
						<option value="">Select </option>
						<option value="postive">postive</option>
						<option value="Negative">Negative</option>
						<option value="Not tested">Not tested</option>
					</select>
				</td>
				<!-- 	Dissection -->
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="no_of_dissected[]" class="form-control" value="0" onchange="TotalNoOFMos()" onkeyup="TotalNoOFMos()"></td>
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="no_of_infrcted[]" class="form-control" value="0" onchange="TotalNOInfectedMos()" onkeyup="TotalNOInfectedMos()"></td>
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="no_of_infective[]" class="form-control" value="0" onchange="TotalNOInfectiveMos()" onkeyup="TotalNOInfectiveMos()"></td>

				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="head_mf[]" class="form-control" style="width: 40px;" value="0" onchange="TotalHeadmf()" onkeyup="TotalHeadmf()"></td>
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="head_l1[]" class="form-control" style="width: 40px;" value="0" onchange="Totalheadl1()" onkeyup="Totalheadl1()"></td>
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="head_l2[]" class="form-control" style="width: 40px;" value="0" onchange="Totalheadl2()" onkeyup="Totalheadl2()"></td>
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="head_l3[]" class="form-control" style="width: 40px;" value="0" onchange="Totalheadl3()" onkeyup="Totalheadl3()"></td>

				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="thorax_mf[]" class="form-control" style="width: 40px;" value="0" onchange="TotalThoraxmf()" onkeyup="TotalThoraxmf()"></td>
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="thorax_l1[]" class="form-control" style="width: 40px;" value="0" onchange="TotalThoraxl1()" onkeyup="TotalThoraxl1()"></td>
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="thorax_l2[]" class="form-control" style="width: 40px;" value="0" onchange="TotalThoraxl2()" onkeyup="TotalThoraxl2()"></td>
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="thorax_l3[]" class="form-control" style="width: 40px;" value="0" onchange="TotalThoraxl3()" onkeyup="TotalThoraxl3()"></td>

				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="abdomen_mf[]" class="form-control" style="width: 40px;" value="0" onchange="TotalAbdomenmf()" onkeyup="TotalAbdomenmf()"></td>
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="abdomen_l1[]" class="form-control" style="width: 40px;" value="0" onchange="TotalAbdomenL1()" onkeyup="TotalAbdomenL1()"></td>
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="abdomen_l2[]" class="form-control" style="width: 40px;" value="0" onchange="TotalAbdomenL2()" onkeyup="TotalAbdomenL2()"></td>
				<td rowspan="2"><input type="number" required pattern="\d*" min="0" name="abdomen_l3[]" class="form-control" style="width: 40px;" value="0" onchange="TotalAbdomenL3()" onkeyup="TotalAbdomenL3()"></td>
				<td rowspan="2">
					<a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
				</td>


			</tr>


			<tr name="secondrow" id="">

				<td><input type="number" pattern="\d*" min="0" name="No_mos_2[]" value="0" onchange="TotalNoMos()" onkeyup="TotalNoMos()" class="form-control"></td>
				<td><input type="text" min="0" name="Pool_no_2[]" value="0" class="form-control"></td>
				<td><input type="text" name="ref_no_2[]" {{ $pcr_details }} value="0" class="form-control"></td>
				<td><select name="pcr_remarks2[]" {{ $pcr_details }} class="form-control">
						<option value="">Select </option>
						<option value="postive">postive</option>
						<option value="Negative">Negative</option>
						<option value="Not tested">Not tested</option>
					</select>


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
		var inps = document.querySelectorAll('input[name="no_of_dissected[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalNoOF_Mos")[0].value = totals;
	}


	function TotalNOInfectedMos() {
		var inps = document.querySelectorAll('input[name="no_of_infrcted[]"]');
		var totals = 0;

		for (var i = 0; i < inps.length; i++) {
			totals = totals + parseInt(inps[i].value);
		}
		console.log("Total amount on " + totals);
		document.getElementsByName("TotalNOInfected_Mos")[0].value = totals;
	}

	function TotalNOInfectiveMos() {
		var inps = document.querySelectorAll('input[name="no_of_infective[]"]');
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



	function mosquitoCalculation(id1, id2, id3) {
		var total_cx_quin_mosq = document.getElementById(id1).value;
		var total_traps = document.getElementById(id2).value;
		document.getElementById(id3).value = ((total_cx_quin_mosq) / (total_traps)).toFixed(2);
	}









	var checkboxes = document.querySelectorAll("input[name='Pool_no_1[]']");
	for (var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].addEventListener("keyup", function() {
			var index = Array.prototype.indexOf.call(checkboxes, this);
			document.getElementsByName("ref_no_1[]")[index].value = document.getElementsByName("Pool_no_1[]")[index].value;
		});
	}







	var checkboxes2 = document.querySelectorAll("input[name='Pool_no_2[]']");
	for (var i = 0; i < checkboxes2.length; i++) {
		checkboxes2[i].addEventListener("keyup", function() {
			var index = Array.prototype.indexOf.call(checkboxes2, this);
			document.getElementsByName("ref_no_2[]")[index].value = document.getElementsByName("Pool_no_2[]")[index].value;
		});
	}


	Total_CxQuin();
	TotalNoMos();
	TotalNoOFMos();
	TotalNOInfectedMos();
	TotalNOInfectiveMos();
	TotalHeadmf();
	Totalheadl1();
	Totalheadl2();
	Totalheadl3();
	TotalThoraxmf();
	TotalThoraxl1();
	TotalThoraxl2();
	TotalThoraxl3();
	TotalAbdomenmf();
	TotalAbdomenL1();
	TotalAbdomenL2();
	TotalAbdomenL3();
	TotalTrapLaid();
</script>