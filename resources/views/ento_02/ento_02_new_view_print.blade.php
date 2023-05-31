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
			width: 25px;

		}

		th,
		td {
			position: relative;
			padding: 2px;
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

		/* .tha {
			-webkit-transform: rotate(-90deg);
			-moz-transform: rotate(-90deg);
			-ms-transform: rotate(-90deg);
			-o-transform: rotate(-90deg);
			transform: rotate(-90deg);
			width: 8px;
			text-align: center;
		} */

		th:first-child {
			height: 100px;
		}
	</style>
	<?php
	$cno_dissected_mosquitos = "";
	$cpositive_mosq = "";
	$cmq_postive_for_l3 = "";
	$no_dissected_mosquitos = "";
	$positive_mosq = "";
	$mq_postive_for_l3 = "";
	$cno_dissected_mosquitos = "";
	$cpositive_mosq = "";
	$cmq_postive_for_l3 = "";
	$mno_dissected_mosquitos = "";
	$mpositive_mosq = "";
	$mmq_postive_for_l3 = "";
	?>


	<div style="position: absolute;
    left: 45%;
    top:1% ;
    transform: translate(-50%, 0);">
		<h1> <b>Gravid Trap Collection </b> </h1>
	</div>





	<table style="	 position: absolute;
    left: 15%;
    top:5% ;
    transform: translate(-50%, 0);">
		<tr>
			<th class="input11">Form ID</th>
			<th class="input22">{{ $ento2_list->formid }}</th>
			<th class="input"></th>

		</tr>


		<tr>
			<th class="input11">District</th>
			<th class="input22">{{ $ento2_list->district}}</th>
			<th class="input"></th>
			<th class="input11">PHM area</th>
			<th class="input22">{{ $ento2_list->phm_area}}</th>
		</tr>


		<tr>
			<th class="input11">MOH area </th>
			<th class="input22">{{ $ento2_list->moh_area}}</th>
			<th class="input"></th>
			<th class="input11">Weather condition</th>
			<th class="input22">{{ $ento2_list->weather_condition}}</th>
		</tr>

		<tr>


		</tr>



	</table>




	<table>
		<thead class="ther">
			<tr>
				<th rowspan="4" style="width:20px ;">NO</th>
				<th rowspan="4" style="width:68px ;">Date</th>
				<th rowspan="4" style="width:40px ;">No. of Traps</th>
				<th rowspan="4" style="width:70px ;">GN Division</th>
				<th rowspan="4" style="width:70px ;">Name Of The Chief Occupant</th>
				<th rowspan="4" style="width:80px ;">Address</th>
				<th rowspan="4" style="width:65px ;">Longitude</th>
				<th rowspan="4" style="width:65px ;">Latitude</th>
				<th rowspan="4" style="width:62px ;">Total No of Cx. <br> quin. Collected </th>
				<th colspan="6">PCR detail</th>
				<th colspan="15">Dissection</th>
				<th rowspan="4" style="width:82px ;">Action</th>
			</tr>

			<tr>
				<th rowspan="3" style="width: 32px;">No of Mos:</th>
				<th rowspan="3" style="width:32px ;">Pool no</th>
				<th rowspan="3" style="width:62px ;">Date received</th>
				<th rowspan="3"  style="width:32px ;" >Ref. No</th>
				<th rowspan="3" style="width:62px ;">Date Tested</th>
				<th rowspan="3" style="width:45px ;">Result</th>
				<th rowspan="3" style="width:52px ;">No of Mos:</th>
				<th rowspan="3" style="width:52px ;">No of infected mos</th>
				<th rowspan="3" style="width:52px ;">No of infective mos</th>
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


			<tr>
				<td rowspan="2"><span class="sn">{{$i}}</span>.</td>
				<td rowspan="2">{{ $data->date }}</td>
				<td rowspan="2">{{ $data->no_of_traps }}</td> <!-- 					//new filed -->
				<td rowspan="2">{{ $data->gn_division }}</td>
				<td rowspan="2">{{ $data->chief_occupant }}</td>
				<td rowspan="2">{{ $data->address }}</td>
				<td rowspan="2">{{ $data->gps_lat }}</td>
				<td rowspan="2">{{ $data->gps_long }}</td>
				<td rowspan="2">{{ $data->total_cx_quin }}</td>
				<td>{{ $data->No_mos_1 != null ? $data->No_mos_1 : '0' }}</td>
				<td>{{ $data->Pool_no_1 != null ? $data->Pool_no_1 : '0' }}</td>
				<td rowspan="2">{{ $data->pcr_date_rec }}</td>
				<td>{{ $data->ref_no_1 != null ? $data->ref_no_1 : '0' }}</td>
				<td rowspan="2">{{ $data->pcr_date_test }}</td>
				<td>{{ ucfirst($data->pcr_remarks) }}</td>
				@foreach ($data->Ento_5_news as $data2)
				<?php

					if ($data2->species2 == 'CX') {
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
					}
				 ?>
				@endforeach
				<td rowspan="2">{{ $no_dissected_mosquitos != null ? $no_dissected_mosquitos : '0' }}</td>
				<td rowspan="2">{{ $positive_mosq != null ? $positive_mosq : '0' }}</td>
				<td rowspan="2"> {{ $mq_postive_for_l3 != null ? $mq_postive_for_l3 : '0' }}</td>
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
				</td>

			</tr>
			<tr>
				<td>{{ $data->No_mos_2 != null ? $data->No_mos_2 : '0' }}</td>
				<td>{{ $data->Pool_no_2 != null ? $data->Pool_no_2 : '0' }}</td>
				<td>{{ $data->ref_no_2 != null ? $data->ref_no_2 : '0' }}</td>
				<td>{{ucfirst($data->pcr_remarks2) }} </td>

			</tr>

			@endforeach
		</tbody>



		<tfoot>
			<tr>
				<td colspan="8"> Total</td>
				<td class="totalth"> {{ $ento_total['TotalCxQuin']}} </td>
				<td class="totalth"> {{ $ento_total['TotalNo_Mos']}} </td>
				<td class="totalth" colspan="5"> </td>
				<td class="totalth"> {{ $ento_total['TotalNoOF_Mos']}} </td>
				<td class="totalth"> {{ $ento_total['TotalNOInfected_Mos']}} </td>
				<td class="totalth"> {{ $ento_total['TotalNOInfective_Mos']}} </td>
				<td class="totalth"> {{ $ento_total['TotalHead_mf']}} </td>
				<td class="totalth"> {{ $ento_total['Totalhead_l1']}} </td>
				<td class="totalth"> {{ $ento_total['Totalhead_l2']}} </td>
				<td class="totalth"> {{ $ento_total['Totalhead_l3']}} </td>
				<td class="totalth"> {{ $ento_total['TotalThorax_mf']}} </td>
				<td class="totalth"> {{ $ento_total['TotalThorax_l1']}} </td>
				<td class="totalth"> {{ $ento_total['TotalThorax_l2']}} </td>
				<td class="totalth"> {{ $ento_total['TotalThorax_l3']}} </td>
				<td class="totalth"> {{ $ento_total['TotalAbdomen_mf']}} </td>
				<td class="totalth"> {{ $ento_total['TotalAbdomen_L1']}} </td>
				<td class="totalth"> {{ $ento_total['TotalAbdomen_L2']}} </td>
				<td class="totalth"> {{ $ento_total['TotalAbdomen_L3']}} </td>
			</tr>
		</tfoot>


	</table>



	<table style="margin-top:150px; margin-left:240px;">
		<tr>
			<th class="input11">Total Cx quin mosquitos:-</th>
			<th class="input22">{{ $ento2_list->total_cx_quin_mosq }}</th>
			<th class="input"></th>
			<th class="input11"></th>
			<th class="input11"></th>
		</tr>

		<tr>
			<th class="input11">Total traps laid:-</th>
			<th class="input22">{{ $ento2_list->total_traps }}</th>
			<th class="input"></th>
			<th class="input11"></th>
			<th class="input11"></th>
		</tr>



		<tr>
			<th class="input11">Mosquito density per trap:-</th>
			<th class="input22">{{ $ento2_list->mosq_density_per_trap }}</th>
			<th class="input"></th>
			<th class="input11"></th>
			<th class="input11"></th>
		</tr>


		<tr>
		<th class="input11">Date:- </th>
			<th class="input22">{{ $ento2_list->date }}</th>
			<th class="input"></th>
			<th class="input11"></th>
			<th class="input11"></th>
		</tr>




	</table>



</page>