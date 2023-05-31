<page>
	<!-- boostrap cdn limk -->
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
			padding: 5px 0px 5px 0px;

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
	<h2 style="text-align: center; font-family:Arial; Arial; font-weight: bold;  margin-bottom:0;  "> ANTI FILARIASIS UNIT<br> </h2>
	<h3 style="text-align: center; font-family:Arial; font-weight: bold; margin-top:0;">
		<?php print_r($district); ?> <?php if ($district != "CMC") {
																	echo " DISTRICT";
																} ?>
	</h3>

	<h3 style="text-align: center; font-family:Arial; font-weight: bold; margin-top:0;">
		District Lymphedema Register
	</h3>


	<div class="row pb-0 mb-0">
		<div class="col float-left "><strong>From:- <?php print_r($from); ?> &nbsp; To:- <?php print_r($to); ?></strong><strong class="ml-3"></strong></div>
	</div>
	<table class="mr-auto ml-auto mt-2" style="  position: absolute;
    left: 50%;
    top:20% ;
    transform: translate(-50%, 0);
    
    ">

		<tr>

			<th rowspan="2">No</th>
			<th rowspan="2">Date Registered</th>
			<th rowspan="2">District LE patient No</th>
			<th rowspan="2">Name in Full</th>
			<th rowspan="2">Gender</th>
			<th rowspan="2">Age (in completed years)</th>
			<th rowspan="2">Complete Address</th>
			<th rowspan="2">District</th>
			<th rowspan="2">MOH</th>
			<th rowspan="2">PHM</th>
			<th rowspan="2">GN</th>
			<th rowspan="2">Referred by</th>
			<th rowspan="2">Part of Body disease</th>
			<th rowspan="2">Cause of disease</th>
			<th rowspan="2">No of past attacks of ADLA</th>



			<th colspan="5">Under heading of investigation</th>
			<th colspan="4">Under heading of investigation</th>

		</tr>


		<tr>
			<th rowspan="2">NBF for Mf</th>
			<th rowspan="2">Antigen test for Wb</th>
			<th rowspan="2">Antibody test for Wb(IgM)</th>
			<th rowspan="2">Antibody test for Wb(IgG)</th>
			<th rowspan="2">Antibody test for Bm</th>


			<th>History heading of treatment</th>
			<th>Year past treatment started and how long</th>
			<th>Date Current treatment started</th>
			<th>DEC/Albendazole given/Not</th>
		</tr>


		<tr>
			@foreach ($ento1_list as $ento1)
			</td>
			<td>{{$ento1->formid }}</td>
			<!-- date_of_registration
			district_lymphedema_no
			name_of_patient
			gender
			age_in_completed_years
			district
			moh
			phm
			gn_area -->
			 


		</tr>








	</table>

</page>