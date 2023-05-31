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
			width: 103px;

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
	$Total_number = 0;
	$Total_number7_8 = 0;
	$Total_number8_9 = 0;
	$Total_number9_10 = 0;
	$Total_number10_11 = 0;
	$Total_number11_12 = 0;
	$Total_number12_1 = 0;
	$Total_number1_2 = 0;
	$Total_number2_3 = 0;
	$Total_number3_4 = 0;
	$Total_number4_5 = 0;
	$Total_number5_6 = 0;
	?>


	<div style="position: absolute;
    left: 40%;
    top:1% ;
    transform: translate(-50%, 0);">
		<h1> <b>Human landing Night Collection  </b> </h1>
	</div>


	<table style="	 position: absolute;
    left: 15%;
    top:5% ;
    transform: translate(-50%, 0);">
		<tr>
			<th class="input11">Form ID:-</th>
			<th class="input22">{{ $ento4_list->formid}}</th>
			<th class="input"></th>
			<th class="input11">GN division :-</th>
			<th class="input22">{{ $ento4_list->gn_division }}</th>
		</tr>


		<tr>
			<th class="input11">District:-</th>
			<th class="input22">{{ $ento4_list->district}}</th>
			<th class="input"></th>
			<th class="input11">Locality/ Address:- </th>
			<th class="input22">{{ $ento4_list->locality }}</th>

		</tr>

		<tr>
			<th class="input11">MOH area:-</th>
			<th class="input22">{{ $ento4_list->moh }}</th>
			<th class="input"></th>

			<th class="input11">GPS longitude:- </th>
			<th class="input22">{{ $ento4_list->gps_long }}</th>
		

		</tr>

		<tr>
			<th class="input11">PHM area:-</th>
			<th class="input22">{{ $ento4_list->phi }}</th>
			<th class="input"></th>
			<th class="input11">GPS latitude:- </th>
			<th class="input22">{{ $ento4_list->gps_lat  }}</th>

		</tr>


		<tr>
			<th class="input11">Date:-</th>
			<th class="input22">{{ $ento4_list->date_of_collection }}</th>
			<th class="input"></th>
		</tr>



	</table>







	<table>

		<thead class="ther">
			<tr>
				<th rowspan="2">#Row NO</th>
				<th rowspan="2">Mosquito species</th>
				<th colspan="12">Indoor</th>
				<th rowspan="2">Total</th>
			</tr>
			<tr>
				<th>6-7pm</th>
				<th>7-8pm</th>
				<th>8-9pm</th>
				<th>9-10pm</th>
				<th>10-11pm</th>
				<th>11-12pm</th>
				<th>12-1am</th>
				<th>1-2am</th>
				<th>2-3am</th>
				<th>3-4am</th>
				<th>4-5am</th>
				<th>5-6am</th>
			</tr>
		</thead>

		<tbody id="tbl_posts_body">
			<?php $i = 0; ?>
			@foreach ($ento4_list->ento_04_mosq_news as $data)
			<?php
			if ($data->formtype == 'indoor') {
				$i++; ?>
				<tr>
					<td><span>{{$i}}</span></td>
					<td>{{ $data->mosq_spec_stat }}</td>
					<td>{{ $data->number != null ? $data->number : '0' }}</td>
					<td>{{ $data->number7_8 != null ? $data->number7_8 : '0' }}</td>
					<td>{{ $data->number8_9 != null ? $data->number8_9 : '0' }}</td>
					<td>{{ $data->number9_10 != null ? $data->number9_10 : '0' }}</td>
					<td>{{ $data->number10_11 != null ? $data->number10_11 : '0' }}</td>
					<td>{{ $data->number11_12 != null ? $data->number11_12 : '0' }}</td>
					<td>{{ $data->number12_1 != null ? $data->number12_1 : '0' }}</td>
					<td>{{ $data->number1_2 != null ? $data->number1_2 : '0' }}</td>
					<td>{{ $data->number2_3 != null ? $data->number2_3 : '0' }}</td>
					<td>{{ $data->number3_4 != null ? $data->number3_4 : '0' }}</td>
					<td>{{ $data->number4_5 != null ? $data->number4_5 : '0' }}</td>
					<td>{{ $data->number5_6 != null ? $data->number5_6 : '0' }}</td>
					<?php $TOTAL1 = $data->number + $data->number7_8 + $data->number8_9 + $data->number9_10 + $data->number10_11 + $data->number11_12 + $data->number12_1 + $data->number1_2 + $data->number2_3 + $data->number3_4 + $data->number4_5 + $data->number5_6;



					$Total_number += $data->number;
					$Total_number7_8 += $data->number7_8;
					$Total_number8_9 += $data->number8_9;
					$Total_number9_10 += $data->number9_10;
					$Total_number10_11 += $data->number10_11;
					$Total_number11_12 += $data->number11_12;
					$Total_number12_1 += $data->number12_1;
					$Total_number1_2 += $data->number1_2;
					$Total_number2_3 += $data->number2_3;
					$Total_number3_4 += $data->number3_4;
					$Total_number4_5 += $data->number4_5;
					$Total_number5_6 += $data->number5_6;


					$total = $Total_number + $Total_number7_8 + $Total_number8_9 + $Total_number9_10 + $Total_number10_11 + $Total_number11_12 + $Total_number12_1 + $Total_number1_2 + $Total_number2_3 + $Total_number3_4 + $Total_number4_5 + $Total_number5_6;

					?>
					<td>{{ $TOTAL1 }}</td>
				</tr>
			<?php }; ?>
			@endforeach
		</tbody>




		<tfoot>
			<tr>
				<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> Total</td>
				<td> {{ $Total_number  }}</td>
				<td> {{ $Total_number7_8  }}</td>
				<td> {{ $Total_number8_9  }}</td>
				<td> {{ $Total_number9_10  }}</td>
				<td> {{ $Total_number10_11  }}</td>
				<td> {{ $Total_number11_12  }}</td>
				<td> {{ $Total_number12_1  }}</td>
				<td> {{ $Total_number1_2  }}</td>
				<td> {{ $Total_number2_3  }}</td>
				<td> {{ $Total_number3_4  }}</td>
				<td> {{ $Total_number4_5  }}</td>
				<td> {{ $Total_number5_6  }}</td>
				<td> {{ $total }} </td>
			</tr>


			<tr>
				<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> No of baits</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbaits != null ? $ento4_list->ento_04_indoors->noofbaits : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbairs7_8 != null ? $ento4_list->ento_04_indoors->noofbairs7_8 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbairs8_9 != null ? $ento4_list->ento_04_indoors->noofbairs8_9 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbairs9_10 != null ? $ento4_list->ento_04_indoors->noofbairs9_10 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbairs10_11 != null ? $ento4_list->ento_04_indoors->noofbairs10_11 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbairs11_12 != null ? $ento4_list->ento_04_indoors->noofbairs11_12 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbairs12_1 != null ? $ento4_list->ento_04_indoors->noofbairs12_1 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbairs1_2 != null ? $ento4_list->ento_04_indoors->noofbairs1_2 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbairs2_3 != null ? $ento4_list->ento_04_indoors->noofbairs2_3 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbairs3_4 != null ? $ento4_list->ento_04_indoors->noofbairs3_4 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbairs4_5 != null ? $ento4_list->ento_04_indoors->noofbairs4_5 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->noofbairs5_6 != null ? $ento4_list->ento_04_indoors->noofbairs5_6 : '0' }}</td>
			</tr>

			<tr>
				<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Temp (0c)</td>
				<td>{{ $ento4_list->ento_04_indoors->temp6_7 != null ? $ento4_list->ento_04_indoors->temp6_7 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->temp7_8 != null ? $ento4_list->ento_04_indoors->temp7_8 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->temp8_9 != null ? $ento4_list->ento_04_indoors->temp8_9 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->temp9_10 != null ? $ento4_list->ento_04_indoors->temp9_10 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->temp10_11 != null ? $ento4_list->ento_04_indoors->temp10_11 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->temp11_12 != null ? $ento4_list->ento_04_indoors->temp11_12 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->temp12_1 != null ? $ento4_list->ento_04_indoors->temp12_1 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->temp1_2 != null ? $ento4_list->ento_04_indoors->temp1_2 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->temp2_3 != null ? $ento4_list->ento_04_indoors->temp2_3 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->temp3_4 != null ? $ento4_list->ento_04_indoors->temp3_4 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->temp4_5 != null ? $ento4_list->ento_04_indoors->temp4_5 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->temp5_6 != null ? $ento4_list->ento_04_indoors->temp5_6 : '0' }}</td>
			</tr>

			<tr>
				<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Rh(%)</td>
				<td>{{ $ento4_list->ento_04_indoors->RH6_7 != null ? $ento4_list->ento_04_indoors->RH6_7 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->RH7_8 != null ? $ento4_list->ento_04_indoors->RH7_8 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->RH8_9 != null ? $ento4_list->ento_04_indoors->RH8_9 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->RH9_10 != null ? $ento4_list->ento_04_indoors->RH9_10 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->RH10_11 != null ? $ento4_list->ento_04_indoors->RH10_11 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->RH11_12 != null ? $ento4_list->ento_04_indoors->RH11_12 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->RH12_1 != null ? $ento4_list->ento_04_indoors->RH12_1 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->RH1_2 != null ? $ento4_list->ento_04_indoors->RH1_2 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->RH2_3 != null ? $ento4_list->ento_04_indoors->RH2_3 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->RH3_4 != null ? $ento4_list->ento_04_indoors->RH3_4 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->RH4_5 != null ? $ento4_list->ento_04_indoors->RH4_5 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_indoors->RH5_6 != null ? $ento4_list->ento_04_indoors->RH5_6 : '0' }}</td>
			</tr>


			<tr>
				<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Weather Condition</td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_6_7 }}</td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_7_8}}</td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_8_9 }}</td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_9_10 }}</td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_10_11 }}</td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_11_12 }} </td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_12_1 }}</td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_1_2 }}</td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_2_3 }}</td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_3_4 }}</td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_4_5 }}</td>
				<td>{{ $ento4_list->ento_04_indoors->weather_condition_5_6  }}</td>
			</tr>
		</tfoot>
	</table>






	<?php
	$Total_number = 0;
	$Total_number7_8 = 0;
	$Total_number8_9 = 0;
	$Total_number9_10 = 0;
	$Total_number10_11 = 0;
	$Total_number11_12 = 0;
	$Total_number12_1 = 0;
	$Total_number1_2 = 0;
	$Total_number2_3 = 0;
	$Total_number3_4 = 0;
	$Total_number4_5 = 0;
	$Total_number5_6 = 0;
	?>




	



</page>

<page>
<table>

		<thead class="ther">
			<tr>
				<th rowspan="2">#Row NO</th>
				<th rowspan="2">Mosquito species</th>
				<th colspan="12">Outdoor</th>
				<th rowspan="2">Total</th>
			</tr>
			<tr>
				<th>6-7pm</th>
				<th>7-8pm</th>
				<th>8-9pm</th>
				<th>9-10pm</th>
				<th>10-11pm</th>
				<th>11-12pm</th>
				<th>12-1am</th>
				<th>1-2am</th>
				<th>2-3am</th>
				<th>3-4am</th>
				<th>4-5am</th>
				<th>5-6am</th>
			</tr>
		</thead>


		<?php $ie = 0; ?>
                      



		<tbody id="tbl_posts_body">
			<?php $i = 0; ?>
			@foreach ($ento4_list->ento_04_mosq_news as $data)
			
			<?php
			
			if ($data->formtype == 'outdoor') {
				$i++; ?>
				<tr>
					<td><span>{{$i}}</span></td>
					<td>{{ $data->mosq_spec_stat }}</td>
					<td>{{ $data->number != null ? $data->number : '0' }}</td>
					<td>{{ $data->number7_8 != null ? $data->number7_8 : '0' }}</td>
					<td>{{ $data->number8_9 != null ? $data->number8_9 : '0' }}</td>
					<td>{{ $data->number9_10 != null ? $data->number9_10 : '0' }}</td>
					<td>{{ $data->number10_11 != null ? $data->number10_11 : '0' }}</td>
					<td>{{ $data->number11_12 != null ? $data->number11_12 : '0' }}</td>
					<td>{{ $data->number12_1 != null ? $data->number12_1 : '0' }}</td>
					<td>{{ $data->number1_2 != null ? $data->number1_2 : '0' }}</td>
					<td>{{ $data->number2_3 != null ? $data->number2_3 : '0' }}</td>
					<td>{{ $data->number3_4 != null ? $data->number3_4 : '0' }}</td>
					<td>{{ $data->number4_5 != null ? $data->number4_5 : '0' }}</td>
					<td>{{ $data->number5_6 != null ? $data->number5_6 : '0' }}</td>
					<?php $TOTAL1 = $data->number + $data->number7_8 + $data->number8_9 + $data->number9_10 + $data->number10_11 + $data->number11_12 + $data->number12_1 + $data->number1_2 + $data->number2_3 + $data->number3_4 + $data->number4_5 + $data->number5_6;



					$Total_number += $data->number;
					$Total_number7_8 += $data->number7_8;
					$Total_number8_9 += $data->number8_9;
					$Total_number9_10 += $data->number9_10;
					$Total_number10_11 += $data->number10_11;
					$Total_number11_12 += $data->number11_12;
					$Total_number12_1 += $data->number12_1;
					$Total_number1_2 += $data->number1_2;
					$Total_number2_3 += $data->number2_3;
					$Total_number3_4 += $data->number3_4;
					$Total_number4_5 += $data->number4_5;
					$Total_number5_6 += $data->number5_6;


					$total = $Total_number + $Total_number7_8 + $Total_number8_9 + $Total_number9_10 + $Total_number10_11 + $Total_number11_12 + $Total_number12_1 + $Total_number1_2 + $Total_number2_3 + $Total_number3_4 + $Total_number4_5 + $Total_number5_6;

					?>
					<td>{{ $TOTAL1 }}</td>
				</tr>
			<?php }; ?>
			@endforeach
		</tbody>




		<tfoot>
			<tr>
				<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> Total</td>
				<td> {{ $Total_number  }}</td>
				<td> {{ $Total_number7_8  }}</td>
				<td> {{ $Total_number8_9  }}</td>
				<td> {{ $Total_number9_10  }}</td>
				<td> {{ $Total_number10_11  }}</td>
				<td> {{ $Total_number11_12  }}</td>
				<td> {{ $Total_number12_1  }}</td>
				<td> {{ $Total_number1_2  }}</td>
				<td> {{ $Total_number2_3  }}</td>
				<td> {{ $Total_number3_4  }}</td>
				<td> {{ $Total_number4_5  }}</td>
				<td> {{ $Total_number5_6  }}</td>
				<td> {{ $total }} </td>
			</tr>


			<tr>
				<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> No of baits</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbaits != null ? $ento4_list->ento_04_outdoors->noofbaits : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbairs7_8 != null ? $ento4_list->ento_04_outdoors->noofbairs7_8 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbairs8_9 != null ? $ento4_list->ento_04_outdoors->noofbairs8_9 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbairs9_10 != null ? $ento4_list->ento_04_outdoors->noofbairs9_10 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbairs10_11 != null ? $ento4_list->ento_04_outdoors->noofbairs10_11 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbairs11_12 != null ? $ento4_list->ento_04_outdoors->noofbairs11_12 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbairs12_1 != null ? $ento4_list->ento_04_outdoors->noofbairs12_1 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbairs1_2 != null ? $ento4_list->ento_04_outdoors->noofbairs1_2 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbairs2_3 != null ? $ento4_list->ento_04_outdoors->noofbairs2_3 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbairs3_4 != null ? $ento4_list->ento_04_outdoors->noofbairs3_4 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbairs4_5 != null ? $ento4_list->ento_04_outdoors->noofbairs4_5 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->noofbairs5_6 != null ? $ento4_list->ento_04_outdoors->noofbairs5_6 : '0' }}</td>
			</tr>

			<tr>
				<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Temp (0c)</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp6_7 != null ? $ento4_list->ento_04_outdoors->temp6_7 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp7_8 != null ? $ento4_list->ento_04_outdoors->temp7_8 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp8_9 != null ? $ento4_list->ento_04_outdoors->temp8_9 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp9_10 != null ? $ento4_list->ento_04_outdoors->temp9_10 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp10_11 != null ? $ento4_list->ento_04_outdoors->temp10_11 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp11_12 != null ? $ento4_list->ento_04_outdoors->temp11_12 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp12_1 != null ? $ento4_list->ento_04_outdoors->temp12_1 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp1_2 != null ? $ento4_list->ento_04_outdoors->temp1_2 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp2_3 != null ? $ento4_list->ento_04_outdoors->temp2_3 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp3_4 != null ? $ento4_list->ento_04_outdoors->temp3_4 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp4_5 != null ? $ento4_list->ento_04_outdoors->temp4_5 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->temp5_6 != null ? $ento4_list->ento_04_outdoors->temp5_6 : '0' }}</td>
			</tr>

			<tr>
				<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Rh(%)</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH6_7 != null ? $ento4_list->ento_04_outdoors->RH6_7 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH7_8 != null ? $ento4_list->ento_04_outdoors->RH7_8 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH8_9 != null ? $ento4_list->ento_04_outdoors->RH8_9 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH9_10 != null ? $ento4_list->ento_04_outdoors->RH9_10 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH10_11 != null ? $ento4_list->ento_04_outdoors->RH10_11 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH11_12 != null ? $ento4_list->ento_04_outdoors->RH11_12 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH12_1 != null ? $ento4_list->ento_04_outdoors->RH12_1 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH1_2 != null ? $ento4_list->ento_04_outdoors->RH1_2 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH2_3 != null ? $ento4_list->ento_04_outdoors->RH2_3 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH3_4 != null ? $ento4_list->ento_04_outdoors->RH3_4 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH4_5 != null ? $ento4_list->ento_04_outdoors->RH4_5 : '0' }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->RH5_6 != null ? $ento4_list->ento_04_outdoors->RH5_6 : '0' }}</td>
			</tr>


			<tr>
				<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;">Weather Condition</td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_6_7 }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_7_8}}</td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_8_9 }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_9_10 }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_10_11 }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_11_12 }} </td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_12_1 }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_1_2 }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_2_3 }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_3_4 }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_4_5 }}</td>
				<td>{{ $ento4_list->ento_04_outdoors->weather_condition_5_6  }}</td>
			</tr>
		</tfoot>
	</table>
</page>