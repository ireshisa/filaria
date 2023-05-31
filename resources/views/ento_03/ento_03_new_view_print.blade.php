<?php
$total_no_dissected_mosquitos = 0;
$total_positive_mosq = 0;
$total_mq_postive_for_l3 = 0;


$total_head_mf = 0;
$total_head_l1 = 0;
$total_head_l2 = 0;
$total_head_l3 = 0;
$total_thorax_mf = 0;
$total_thorax_l1 = 0;
$total_thorax_l2 = 0;
$total_thorax_l3 = 0;
$total_abdomen_mf = 0;
$total_abdomen_l1 = 0;
$total_abdomen_l2 = 0;
$total_abdomen_l3 = 0;




$total_abdominalcondition_UF = 0;
$total_abdominalcondition_U = 0;
$total_abdominalcondition_SG = 0;
$total_abdominalcondition_G = 0;
$Total_no_of_mosq = 0;
$Toatal_density_per_trap = 0;
$Toatal_No_mos_1 = 0;

$no_dissected_mosquitos = 0;
$positive_mosq = 0;
$mq_postive_for_l3 = 0;
$head_mf = 0;
$head_l1 = 0;
$head_l2 = 0;
$head_l3 = 0;
$thorax_mf = 0;
$thorax_l1 = 0;
$thorax_l2 = 0;
$thorax_l3 = 0;
$abdomen_mf = 0;
$abdomen_l1 = 0;
$abdomen_l2 = 0;
$abdomen_l3 = 0;
?>

<page>
	<!-- boostrap cdn limk -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- boostrap cdn limk -->
	<style>
		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
			line-height: 18px;
			align-items: center;
			margin: auto auto;
			width: 30px;

		}

		th,
		td {
			position: relative;
			padding: 1px;
			align-items: center;
			width: 100%;
			text-align: center;
		}

		td {
			text-align: center;
		}

		.custom-table {
			text-align: center;
			border-collapse: collapse;
			border-spacing: 0;
		}

		.input {
			width: 280px;
			border: 0px solid black;
			text-align: left !important;
			padding: 8px;
		}

		.input11 {
			width: 150px;
			border: 0px solid black !important;
			text-align: left !important;
			padding: 8px;
		}

		.input22 {
			width: 150px;
			border: 0px solid black;
			text-align: left !important;
			padding: 8px;
			border-bottom: 1px dotted black;
		}

		th:first-child {
			height: 100px;
		}
	</style>

	<div style="position: absolute;
    left: 45%;
    top:1% ;
    transform: translate(-50%, 0);">
		<h1> <b>Cattle Baited Net Trap Collection</b> </h1>
	</div>

	<table style="	 position: absolute;
    left: 15%;
    top:5% ;
    transform: translate(-50%, 0);">

		<tr>
			<th class="input11">Form ID:-</th>
			<th class="input22">{{ $ento3_list->formid }}</th>
			<th class="input"></th>
			<th class="input11">GN division:- </th>
			<th class="input22">{{ $ento3_list->gn   }}</th>
		</tr>

		<tr>
			<th class="input11">District:-</th>
			<th class="input22">{{ $ento3_list->district }}</th>
			<th class="input"></th>
			<th class="input11">Locality:-</th>
			<th class="input22">{{ $ento3_list->address }}</th>
		</tr>

		<tr>
			<th class="input11">MOH area:-</th>
			<th class="input22">{{ $ento3_list->moh }}</th>
			<th class="input"></th>
			<th class="input11">GPS Longitude:-</th>
			<th class="input22">{{ $ento3_list->gps_long  }}</th>
		</tr>

		<tr>
			<th class="input11">PHM  area:-</th>
			<th class="input22">{{ $ento3_list->phi }}</th>
			<th class="input"></th>
			<th class="input11">GPS Latitude:-</th>
			<th class="input22">{{ $ento3_list->gps_lat }}</th>
		</tr>

		<tr>
			<th class="input"></th>
			<th class="input"></th>
			<th class="input"></th>
			<th class="input11">No.of traps:-</th>
			<th class="input22">{{ $ento3_list->no_of_traps }}</th>


		</tr>


	</table>

	<table>
		<thead class="ther">
			<tr>
				<th rowspan="4" style="width:30px ;"> NO</th>
				<th rowspan="4" style="width:80px ;">Mosquito species</th>
				<th rowspan="4" style="width:60px ;">No of mosqui toes</th>
				<th rowspan="4" style="width:60px ;">Density (per trap)</th>
				<th colspan="6">PCR detail</th>
				<th colspan="19">Dissection</th>
				<th rowspan="4" style="width:80px ;">Action</th>
			</tr>

			<tr>
				<th rowspan="3" style="width:40px ;"> No of Mos:</th>
				<th rowspan="3" style="width:80px ;">Pool no</th>
				<th rowspan="3" style="width:80px ;">Date received</th>
				<th rowspan="3" style="width:80px ;"> Ref. No</th>
				<th rowspan="3" style="width:80px ;">Date Tested</th>
				<th rowspan="3" style="width:80px ;">Result</th>
				<th rowspan="3" style="width:60px ; ">No of Mos:</th>
				<th colspan="4" rowspan="2">Abdominal condition</th>
				<th rowspan="3" style="width:60px ; ">No of infected mos</th>
				<th rowspan="3" style="width:60px ; ">No of infective mos</th>
				<th colspan="12">Part Of Infection</th>
			</tr>

			<tr>
				<th colspan="4">Head</th>
				<th colspan="4">Thorax</th>
				<th colspan="4">Abdomen</th>
			</tr>

			<tr>
				<th>UF</th>
				<th>F</th>
				<th>SG</th>
				<th>G</th>

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
			@foreach ($ento3_list_5 as $data)
			<?php $i++; ?>
			<tr id="rec-1">
				<td rowspan="2">{{$i}}.</td>
				<td rowspan="2">{{ $data->mosq_species }}</td>
				<td rowspan="2">{{ $data->no_of_mosq != null ? $data->no_of_mosq : '0' }}</td>
				<td rowspan="2">{{ $data->density_per_trap != null ? $data->density_per_trap : '0' }}</td>
				<td>{{ $data->No_mos_1 != null ? $data->No_mos_1 : '0' }}</td>
				<td>{{ $data->Pool_no_1 != null ? $data->Pool_no_1 : '0' }}</td>
				<td rowspan="2">{{ $data->pcr_date_rec != null ? $data->pcr_date_rec : '0' }}</td>
				<td>{{ $data->ref_no_1 != null ? $data->ref_no_1 : '0' }}</td>
				<td rowspan="2">{{ $data->pcr_date_test != null ? $data->pcr_date_test : '0' }}</td>
				<td>{{ $data->pcr_remarks}}</td>
				@foreach ($data->Ento_5_news as $data2)
				<?php

				if ($data2->type_of_parasite == 'Brugia malayi' || $data2->type_of_parasite == 'Wuchereria bancrofit') {

					$no_dissected_mosquitos = $data2->no_dissected_mosquitos;
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

					$total_no_dissected_mosquitos += $no_dissected_mosquitos;
					$total_positive_mosq += $positive_mosq;
					$total_mq_postive_for_l3 += $mq_postive_for_l3;
					$total_head_mf += $head_mf;
					$total_head_l1 += $head_l1;
					$total_head_l2 += $head_l2;
					$total_head_l3 += $head_l3;
					$total_thorax_mf += $thorax_mf;
					$total_thorax_l1 += $thorax_l1;
					$total_thorax_l2 += $thorax_l2;
					$total_thorax_l3 += $thorax_l3;
					$total_abdomen_mf += $abdomen_mf;
					$total_abdomen_l1 += $abdomen_l1;
					$total_abdomen_l2 += $abdomen_l2;
					$total_abdomen_l3 += $abdomen_l3;
				}
				?>
				@endforeach

				<!-- 	Dissection -->
				<td rowspan="2">

					{{ $no_dissected_mosquitos  }}
				</td>

				<td rowspan="2">{{ $data->abdominalcondition_UF}}</td>
				<td rowspan="2">{{ $data->abdominalcondition_U}}</td>
				<td rowspan="2">{{ $data->abdominalcondition_SG}}</td>
				<td rowspan="2">{{ $data->abdominalcondition_G}}</td>

				<?php
				$total_abdominalcondition_UF += $data->abdominalcondition_UF;
				$total_abdominalcondition_U += $data->abdominalcondition_U;
				$total_abdominalcondition_SG += $data->abdominalcondition_SG;
				$total_abdominalcondition_G += $data->abdominalcondition_G;
				$Total_no_of_mosq += $data->no_of_mosq;
				$Toatal_density_per_trap += $data->density_per_trap;
				$Toatal_No_mos_1 += $data->No_mos_1;
				$Toatal_No_mos_1 += $data->No_mos_2;
				?>



				<td rowspan="2">{{ $positive_mosq != null ? $positive_mosq : '0' }}</td>
				<td rowspan="2">{{ $mq_postive_for_l3 != null ? $mq_postive_for_l3 : '0' }}</td>

				<td rowspan="2">{{ $head_mf != null ? $head_mf : '0' }}</td>
				<td rowspan="2">{{ $head_l1 != null ? $head_l1 : '0' }}</td>
				<td rowspan="2">{{ $head_l2 != null ? $head_l2 : '0' }}</td>
				<td rowspan="2">{{ $head_l3 != null ? $head_l3 : '0' }}</td>
				<td rowspan="2">{{ $thorax_mf != null ? $thorax_mf : '0' }}</td>
				<td rowspan="2">{{ $thorax_l1 != null ? $thorax_l1 : '0' }}</td>
				<td rowspan="2">{{ $thorax_l2 != null ? $thorax_l2 : '0' }}</td>
				<td rowspan="2">{{ $thorax_l3 != null ? $thorax_l3 : '0' }}</td>
				<td rowspan="2">{{ $abdomen_mf != null ? $abdomen_mf : '0' }}</td>
				<td rowspan="2">{{ $abdomen_l1 != null ? $abdomen_l1 : '0' }}</td>
				<td rowspan="2">{{ $abdomen_l2 != null ? $abdomen_l2 : '0' }}</td>
				<td rowspan="2">{{ $abdomen_l3 != null ? $abdomen_l3 : '0' }}</td>
				<td rowspan="2">
					<a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_ento3_data_new') }}/{{$data->id }}" class="btn btn-danger btn-sm">
						<i class="glyphicon glyphicon-trash"></i></a>
				</td>




				<?php

				$no_dissected_mosquitos = 0;
				$positive_mosq = 0;
				$mq_postive_for_l3 = 0;
				$head_mf = 0;
				$head_l1 = 0;
				$head_l2 = 0;
				$head_l3 = 0;
				$thorax_mf = 0;
				$thorax_l1 = 0;
				$thorax_l2 = 0;
				$thorax_l3 = 0;
				$abdomen_mf = 0;
				$abdomen_l1 = 0;
				$abdomen_l2 = 0;
				$abdomen_l3 = 0;
				?>
			</tr>

			<tr id="rec-1">
				<td>{{$data->No_mos_2 != null ? $data->No_mos_2 : '0' }}</td>
				<td>{{$data->Pool_no_2 != null ? $data->Pool_no_2 : '0' }}</td>
				<td>{{$data->ref_no_2 != null ? $data->ref_no_2 : '0' }}</td>
				<td>{{$data->pcr_remarks2}}</td>
			</tr>


			@endforeach

		</tbody>




		<tfoot>
			<tr>
				<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> Total</td>
				<td class="totalth"> {{ $Total_no_of_mosq }}</td>
				<td class="totalth"> {{ $Toatal_density_per_trap }}</td>
				<td class="totalth">{{ $Toatal_No_mos_1 }}</td>
				<td class="totalth" colspan="5"> </td>
				<td class="totalth">{{$total_no_dissected_mosquitos}}</td>
				<td class="totalth">{{$total_abdominalcondition_UF}}</td>
				<td class="totalth">{{$total_abdominalcondition_U}}</td>
				<td class="totalth">{{$total_abdominalcondition_SG}}</td>
				<td class="totalth">{{$total_abdominalcondition_G}}</td>
				<td class="totalth">{{$total_positive_mosq}}</td>
				<td class="totalth">{{$total_mq_postive_for_l3}}</td>
				<td class="totalth">{{$total_head_mf}}</td>
				<td class="totalth">{{$total_head_l1}}</td>
				<td class="totalth">{{$total_head_l2}}</td>
				<td class="totalth">{{$total_head_l3 }}</td>
				<td class="totalth">{{$total_thorax_mf}}</td>
				<td class="totalth">{{$total_thorax_l1 }}</td>
				<td class="totalth">{{$total_thorax_l2 }}</td>
				<td class="totalth">{{$total_thorax_l3 }}</td>
				<td class="totalth">{{$total_abdomen_mf}}</td>
				<td class="totalth">{{$total_abdomen_l1}}</td>
				<td class="totalth">{{$total_abdomen_l2}}</td>
				<td class="totalth">{{$total_abdomen_l3 }}</td>
			</tr>
		</tfoot>

		<!-- $total_no_dissected_mosquitos -->



	</table>




</page>