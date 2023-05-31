<?php
$data1 = 0;
$data2 = 0;
$data3 = 0;
$data4 = 0;
$data5 = 0;
$data6 = 0;
$data7 = 0;
$data8 = 0;
$data9 = 0;
$data10 = 0;
$data11 = 0;
$data12 = 0;
$data13 = 0;
?>
<page><!-- boostrap cdn limk -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- boostrap cdn limk -->
	<style>
		* {
			margin: 0 0;
			padding: 0 0;
		}

		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
			line-height: 18px;
			text-align: center;
		}

		th,
		td {
			padding: 8px 5px 5px 8px;
			width: 80px;
			position: relative;
		}

		.custom-table {
			text-align: center;
			border-collapse: collapse;
			border-spacing: 0;
		}

		.tha {

			width: 50px;
		}

		th:first-child {
			height: 60px;
		}
	</style>

	<br>
	<span style="padding:40px; ">
		<h2 style="text-align: center; font-family:Arial; Arial; font-weight: bold;  margin-bottom:0;  "> REGIONAL ANTI FILARASIS UNIT -<?php if ($district == "CMC") {
																																																																			echo "AFC HQ";
																																																																		} else {
																																																																			echo $district;
																																																																		}   ?> </h2>


		<h3 style="text-align: center; font-family:Arial; font-weight: bold; margin-top:0;">
			Morbidity Report
		</h3>

		<h3 style="text-align: center; font-family:Arial; font-weight: bold; margin-top:0;" >From: <?php print_r($from); ?> &nbsp; To: <?php print_r($to); ?></h3><strong class="ml-3"></strong>






	</span>


	<table class="mr-auto ml-auto mt-2" style="  position: absolute;
    left: 8%;
    top:20% ;
    transform: translate(-50%, 0);
    
    ">
		<tr>
			<th colspan="13">Morbidity Data </th>
		</tr>

		<tr>

			<th rowspan="2">Name</th>
			<th rowspan="2">No of Clinic Sessions </th>
			<th colspan="4">First Visit Lympoedema patients</th>
			<th colspan="4">Subsequent Visit Lympoedema patients</th>
			<th rowspan="2">Total No of Lymphoedema patients</th>
			<th rowspan="2"> Hydrocele</th>
			<th rowspan="2"> TPE</th>

		</tr>



		<tr>
			<th>Lymphoedema without acute attack of ADLA </th>
			<th>Lymphoedema with acute attack of ADLA </th>
			<th>No.with H/O acute attack within last 4 weeks </th>
			<th>Total No of New Lymphoedema patients</th>


			<th>Lymphoedema without acute attack of ADLA </th>
			<th>Lymphoedema with acute attack of ADLA </th>
			<th>No.with H/O acute attack within last 4 weeks </th>
			<th>Total No of Subsequent Visit Lymphoedema patients</th>
		</tr>


		@foreach ( $dataView as $rowdata )

		<tr>

			<td>{{ $rowdata['name_of_clinic']  }}</td>
			<td>{{ $rowdata['no_of_clinic']  }}</td>
			<td>{{ $rowdata['lymphoedema_without_acute_attack']  }}</td>
			<td>{{ $rowdata['lymphoedema_with_acute_attack']  }}</td>
			<td>{{ $rowdata['no_with_ho_4week']  }}</td>
			<td>{{ $rowdata['lymphoedema_without_acute_attack'] + $rowdata['lymphoedema_with_acute_attack']   }}</td>

			<td>{{ $rowdata['sub_no_of_clinic']  }}</td>
			<td>{{ $rowdata['sub_lymphoedema_with_acute_attack']  }}</td>
			<td>{{ $rowdata['sub_no_with_ho_4week']  }}</td>
			<td>{{$rowdata['sub_no_of_clinic']+$rowdata['sub_lymphoedema_with_acute_attack']}}</td>

			<td>{{$rowdata['sub_no_of_clinic']+$rowdata['sub_lymphoedema_with_acute_attack']+$rowdata['lymphoedema_without_acute_attack'] + $rowdata['lymphoedema_with_acute_attack']  }}</td>


			<td>{{ $rowdata['hydrocele']  }}</td>
			<td>{{ $rowdata['tpe']  }}</td>

		</tr>

		<?php


		$data2 += $rowdata['no_of_clinic'];
		$data3 += $rowdata['lymphoedema_without_acute_attack'];
		$data4 += $rowdata['lymphoedema_with_acute_attack'];
		$data5 += $rowdata['no_with_ho_4week'];
		$data6 += $rowdata['lymphoedema_without_acute_attack'] + $rowdata['lymphoedema_with_acute_attack'];
		$data7 += $rowdata['sub_no_of_clinic'];
		$data8 += $rowdata['sub_lymphoedema_with_acute_attack'];
		$data9 += $rowdata['sub_no_with_ho_4week'];
		$data10 += $rowdata['sub_no_of_clinic'] + $rowdata['sub_lymphoedema_with_acute_attack'];
		$data11 += $rowdata['sub_no_of_clinic'] + $rowdata['sub_lymphoedema_with_acute_attack'] + $rowdata['lymphoedema_without_acute_attack'] + $rowdata['lymphoedema_with_acute_attack'];
		$data12 += $rowdata['hydrocele'];
		$data13 += $rowdata['tpe'];
		?>
		@endforeach


		<tr>

			<td>Total</td>
			<td>{{ $data2 }}</td>
			<td>{{ $data3 }}</td>
			<td>{{ $data4 }}</td>
			<td>{{ $data5 }}</td>
			<td>{{ $data6 }}</td>
			<td>{{ $data7 }}</td>
			<td>{{ $data8 }}</td>
			<td>{{ $data9 }}</td>
			<td>{{ $data10 }}</td>
			<td>{{ $data11 }}</td>
			<td>{{ $data12 }}</td>
			<td>{{ $data13 }}</td>
		</tr>


	</table>

</page>