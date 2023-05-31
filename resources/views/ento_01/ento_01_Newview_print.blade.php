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
			width: 36px;

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
	$cno_dissected_mosquitos = "0";
	$cpositive_mosq = "0";
	$cmq_postive_for_l3 = "0";
	$no_dissected_mosquitos = "0";
	$positive_mosq = "0";
	$mq_postive_for_l3 = "0";
	$cno_dissected_mosquitos = "0";
	$cpositive_mosq = "0";
	$cmq_postive_for_l3 = "0";
	$mno_dissected_mosquitos = "0";
	$mpositive_mosq = "0";
	$mmq_postive_for_l3 = "0";



	$Total_cno_dissected_mosquitos = "0";
	$Total_cpositive_mosq = "0";
	$Total_cmq_postive_for_l3 = "0";
	$Total_mno_dissected_mosquitos = "0";
	$Total_mpositive_mosq = "0";
	$Total_mmq_postive_for_l3 = "0";



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





	$total_head_mf_mn = 0;
	$total_head_l1_mn = 0;
	$total_head_l2_mn = 0;
	$total_head_l3_mn = 0;
	$total_thorax_mf_mn = 0;
	$total_thorax_l1_mn = 0;
	$total_thorax_l2_mn = 0;
	$total_thorax_l3_mn = 0;
	$total_abdomen_mf_mn = 0;
	$total_abdomen_l1_mn = 0;
	$total_abdomen_l2_mn = 0;
	$total_abdomen_l3_mn = 0;


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


	$head_mf_mn = 0;
	$head_l1_mn = 0;
	$head_l2_mn = 0;
	$head_l3_mn = 0;
	$thorax_mf_mn = 0;
	$thorax_l1_mn = 0;
	$thorax_l2_mn = 0;
	$thorax_l3_mn = 0;
	$abdomen_mf_mn = 0;
	$abdomen_l1_mn = 0;
	$abdomen_l2_mn = 0;
	$abdomen_l3_mn = 0;

	?>


	<div style="position: absolute;
    left: 45%;
    top:1% ;
    transform: translate(-50%, 0);">
		<h1> <b>Indoor Hand Collection </b> </h1>
	</div>

	<table style="	 position: absolute;
    left: 15%;
    top:5% ;
    transform: translate(-50%, 0);">
		<tr>
			<th class="input11">Form ID:-</th>
			<th class="input22">{{ $ento1_list->formid}}</th>
			<th class="input"></th>
			<th class="input11">Weather condition:- </th>
			<th class="input22">{{ $ento1_list->weather_condition  }}</th>
		</tr>


		<tr>
			<th class="input11">District:-</th>
			<th class="input22">{{ $ento1_list->district }}</th>
			<th class="input"></th>
			<th class="input11">Date of Collection :-</th>
			<th class="input22">{{ $ento1_list->date  }}</th>
		</tr>

		<tr>
			<th class="input11">MOH area:-</th>
			<th class="input22">{{ $ento1_list->moh_area }}</th>
			<th class="input"></th>
			<th class="input11">Started at:- </th>
			<th class="input22"> <?php $dateString = $ento1_list->start_at;
														$dateObject = new DateTime($dateString);
														echo $dateObject->format('h:i A');; ?> </th>

		</tr>

		<tr>
			<th class="input11">PHM area:-</th>
			<th class="input22">{{ $ento1_list->phi_and_phm }}</th>
			<th class="input"></th>
			<th class="input11">Finished at:- </th>
			<th class="input22"> <?php $dateString = $ento1_list->finished_at;
														$dateObject = new DateTime($dateString);
														echo $dateObject->format('h:i A');; ?> </th>
		</tr>

		<tr>
			<th class="input11">GN division:-</th>
			<th class="input22">{{ $ento1_list->gn_divison }}</th>

		</tr>

		<tr>
			<th class="input11">Locality:-</th>
			<th class="input22">{{ $ento1_list->locality }}</th>

		</tr>








	</table>






	<table>
		<thead class="ther">
			<tr>

				<th rowspan="2">#Ser NO</th>
				<th rowspan="2" style="width:60px ;">Longitude</th>
				<th rowspan="2" style="width:60px ;">Latitude </th>
				<th rowspan="2" style="width:100px ;">Name & Address</th>
				<!-- <th rowspan="2">Time Spent (mins)</th> -->
				<th colspan="2">No of Pre:+ve</th>
				<th colspan="2">Total No Of Mos</th>
				<th colspan="7">Resting places<br> (No .of females)</th>
				<th colspan="4">Abdominal condition</th>

			

				<th rowspan="2">Males</th>
				<th rowspan="2" style="width:70px ;">No. of dissected</th>
				<th rowspan="2" style="width:70px ;">No of infected</th>
				<th rowspan="2" style="width:70px ;">No of infective</th>
					<th colspan="4" style="width:60px ;">Head</th>
				<th colspan="4" style="width:60px ;">Thorax</th>
				<th colspan="4" style="width:60px ;">Abdomen</th>

			</tr>














			<tr>
				<th>Cx</th>
				<th>Mn</th>
				<th>Cx</th>
				<th>Mn</th>
				<th>Mos.<br> Sp</th>

				<th>FF</th>
				<th>CH</th>
				<th>BN</th>
				<th>W</th>
				<th>EA</th>
				<th>O</th>

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
			@foreach ($ento1_list->ento_01_dataes as $data)
			<?php $i++; ?>

			<tr id="rec-1">



				<td rowspan="2">
					{{ $data->ser_no }}
				</td>

				<td rowspan="2">
					{{ $data->gps_long }}
				</td>

				<td rowspan="2">
					{{ $data->gps_lat }}
				</td>

				<td rowspan="2">
					{{ $data->house_no }}
				</td>


				<td rowspan="2">{{ $data->no_of_pre_postive_cx }}</td>
				<td rowspan="2">{{ $data->no_of_pre_postive_man }}</td>
				<td rowspan="2">{{ $data->no_of_culex }}</td>
				<td rowspan="2">{{ $data->no_of_mosq }}</td>



				<th>
					Cx
				</th>



				<td>
					{{ $data->resting_place_1 }}
				</td>

				<td>
					{{ $data->resting_place_2 }}
				</td>

				<td>
					{{ $data->resting_place_3 }}
				</td>

				<td>
					{{ $data->resting_place_4 }}
				</td>

				<td>
					{{ $data->resting_place_5 }}
				</td>

				<td>
					{{ $data->resting_place_6 }}
				</td>

				<td>
					{{ $data->abdo_uf }}
				</td>

				<td>
					{{ $data->abdo_f }}
				</td>

				<td>
					{{ $data->abdo_sg }}
				</td>

				<td>
					{{ $data->abdo_g }}
				</td>



				@foreach ($data->Ento_5_news as $data2)
				<?php



				if ($data2->species2 == 'CX') {
					$cno_dissected_mosquitos = $data2->no_dissected_mosquitos != null ? $data2->no_dissected_mosquitos : '0';
					$Total_cno_dissected_mosquitos += $cno_dissected_mosquitos;







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
				} else {
					$mno_dissected_mosquitos = $data2->no_dissected_mosquitos != null ? $data2->no_dissected_mosquitos : '0';
					$Total_mno_dissected_mosquitos += $mno_dissected_mosquitos;










					$head_mf_mn = $data2->head_mf;
					$head_l1_mn = $data2->head_l1;
					$head_l2_mn = $data2->head_l2;
					$head_l3_mn = $data2->head_l3;
					$thorax_mf_mn = $data2->thorax_mf;
					$thorax_l1_mn = $data2->thorax_l1;
					$thorax_l2_mn = $data2->thorax_l2;
					$thorax_l3_mn = $data2->thorax_l3;
					$abdomen_mf_mn = $data2->abdomen_mf;
					$abdomen_l1_mn = $data2->abdomen_l1;
					$abdomen_l2_mn = $data2->abdomen_l2;
					$abdomen_l3_mn = $data2->abdomen_l3;


					$total_head_mf_mn += $head_mf_mn;
					$total_head_l1_mn += $head_l1_mn;
					$total_head_l2_mn += $head_l2_mn;
					$total_head_l3_mn += $head_l3_mn;
					$total_thorax_mf_mn += $thorax_mf_mn;
					$total_thorax_l1_mn += $thorax_l1_mn;
					$total_thorax_l2_mn += $thorax_l2_mn;
					$total_thorax_l3_mn += $thorax_l3_mn;
					$total_abdomen_mf_mn += $abdomen_mf_mn;
					$total_abdomen_l1_mn += $abdomen_l1_mn;
					$total_abdomen_l2_mn += $abdomen_l2_mn;
					$total_abdomen_l3_mn += $abdomen_l3_mn;
				}


				if ($data2->species2 == 'CX') {

					$cpositive_mosq = $data2->positive_mosq != null ? $data2->positive_mosq : '0';
					$cmq_postive_for_l3 = $data2->mq_postive_for_l3 != null ? $data2->mq_postive_for_l3 : '0';

					$Total_cpositive_mosq += $cpositive_mosq;
					$Total_cmq_postive_for_l3 += $cmq_postive_for_l3;
				} else {

					$mpositive_mosq = $data2->positive_mosq != null ? $data2->positive_mosq : '0';
					$mmq_postive_for_l3 = $data2->mq_postive_for_l3 != null ? $data2->mq_postive_for_l3 : '0';

					$Total_mpositive_mosq += $mpositive_mosq;
					$Total_mmq_postive_for_l3 += $mmq_postive_for_l3;
				}
				?>
				@endforeach




				<td>
					{{ $data->males }}
				</td>




















				<td>{{ $cno_dissected_mosquitos }}</td>
				<td>{{ $cpositive_mosq }}</td>
				<td>{{ $cmq_postive_for_l3 }}</td>


				<td>
					{{$head_mf}}
				</td>

				<td>
					{{$head_l1}}
				</td>
				<td>
					{{$head_l2}}
				</td>
				<td>
					{{$head_l3}}
				</td>
				<td>
					{{$thorax_mf}}
				</td>
				<td>
					{{$thorax_l1}}
				</td>
				<td>
					{{$thorax_l2}}
				</td>
				<td>
					{{$thorax_l3}}
				</td>
				<td>
					{{$abdomen_mf}}
				</td>
				<td>
					{{$abdomen_l1}}
				</td>
				<td>
					{{$abdomen_l2}}
				</td>
				<td>
					{{$abdomen_l3}}
				</td>


				<?php
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
				<th>Mn</th>
				<td>
					{{ $data->resting_place_1_mansonia }}
				</td>

				<td>
					{{ $data->resting_place_2_mansonia }}
				</td>

				<td>
					{{ $data->resting_place_3_mansonia }}
				</td>

				<td>
					{{ $data->resting_place_4_mansonia }}
				</td>

				<td>
					{{ $data->resting_place_5_mansonia }}
				</td>

				<td>
					{{ $data->resting_place_6_mansonia }}
				</td>

				<td>
					{{ $data->abdo_uf_ma }}
				</td>

				<td>
					{{ $data->abdo_f_ma }}
				</td>

				<td>
					{{ $data->abdo_sg_ma }}
				</td>

				<td>
					{{ $data->abdo_g_ma }}
				</td>

















				<td>
					{{ $data->males_ma }}
				</td>






				<!-- new Failed need to add db -->

				<td>{{ $mno_dissected_mosquitos }}</td>
				<td>{{ $mpositive_mosq }}</td>
				<td>{{ $mmq_postive_for_l3 }}</td>


				
				<td>
					{{$head_mf_mn}}
				</td>

				<td>
					{{$head_l1_mn}}
				</td>
				<td>
					{{$head_l2_mn}}
				</td>
				<td>
					{{$head_l3_mn}}
				</td>
				<td>
					{{$thorax_mf_mn}}
				</td>
				<td>
					{{$thorax_l1_mn}}
				</td>
				<td>
					{{$thorax_l2_mn}}
				</td>
				<td>
					{{$thorax_l3_mn}}
				</td>
				<td>
					{{$abdomen_mf_mn}}
				</td>
				<td>
					{{$abdomen_l1_mn}}
				</td>
				<td>
					{{$abdomen_l2_mn}}
				</td>
				<td>
					{{$abdomen_l3_mn}}
				</td>




				<?php
				$head_mf_mn = 0;
				$head_l1_mn = 0;
				$head_l2_mn = 0;
				$head_l3_mn = 0;
				$thorax_mf_mn = 0;
				$thorax_l1_mn = 0;
				$thorax_l2_mn = 0;
				$thorax_l3_mn = 0;
				$abdomen_mf_mn = 0;
				$abdomen_l1_mn = 0;
				$abdomen_l2_mn = 0;
				$abdomen_l3_mn = 0;
				?>





				<?php
				$cno_dissected_mosquitos = "0";
				$cpositive_mosq = "0";
				$cmq_postive_for_l3 = "0";
				$mno_dissected_mosquitos = "0";
				$mpositive_mosq = "0";
				$mmq_postive_for_l3 = "0";
				?>
			</tr>
			@endforeach






		<tfoot>
			<tr>
				<td class="totalth" colspan="4" rowspan="2"> Total</td>
				<td class="totalth" rowspan="2"><span name="NoofPreTotal"> {{ $ento_total['NoofPreTotal'] }}</span></td>
				<td class="totalth" rowspan="2"><span name="NoofPreTotalMn">{{ $ento_total['NoofPreTotalMn'] }}</span></td>
				<td class="totalth" rowspan="2"><span name="TotalMosCu">{{ $ento_total['TotalMosCu'] }}</span></td>
				<td class="totalth" rowspan="2"><span name="TotalMosMa">{{ $ento_total['TotalMosMa'] }}</span></td>
				<td class="totalth">Cx</td>
				<td><span name="t1TotalCx">{{ $ento_total['t1TotalCx'] }} </span></td>
				<td><span name="t2TotalCx">{{ $ento_total['t2TotalCx'] }} </span></td>
				<td><span name="t3TotalCx">{{ $ento_total['t3TotalCx'] }} </span></td>
				<td><span name="t4TotalCx">{{ $ento_total['t4TotalCx'] }} </span></td>
				<td><span name="t5TotalCx">{{ $ento_total['t5TotalCx'] }} </span></td>
				<td><span name="t6TotalCx">{{ $ento_total['t6TotalCx'] }} </span></td>
				<td><span name="UfTotalCx">{{ $ento_total['UfTotalCx'] }} </span></td>
				<td><span name="fTotalCx">{{ $ento_total['fTotalCx'] }} </span></td>
				<td><span name="SgTotalCx">{{ $ento_total['SgTotalCx'] }} </span></td>
				<td><span name="GtoTalCx">{{ $ento_total['GtoTalCx'] }} </span></td>










				<td><span name="MalestoTalCx">{{ $ento_total['MalestoTalCx'] }} </span></td>
				<td>{{ $Total_cno_dissected_mosquitos }}</td>
				<td>{{ $Total_cpositive_mosq }}</td>
				<td>{{ $Total_cmq_postive_for_l3 }}</td>

				
				<td>
					{{ $total_head_mf}}
				</td>

				<td>
					{{ $total_head_l1}}
				</td>
				<td>
					{{ $total_head_l2}}
				</td>
				<td>
					{{ $total_head_l3}}
				</td>
				<td>
					{{ $total_thorax_mf}}
				</td>
				<td>
					{{ $total_thorax_l1}}
				</td>
				<td>
					{{ $total_thorax_l2}}
				</td>
				<td>
					{{ $total_thorax_l3}}
				</td>
				<td>
					{{ $total_abdomen_mf}}
				</td>
				<td>
					{{ $total_abdomen_l1}}
				</td>
				<td>
					{{ $total_abdomen_l2}}
				</td>
				<td>
					{{ $total_abdomen_l3}}
				</td>

			</tr>


			<tr>
				<td class="totalth">Mn</td>
				<td><span name="t1TotalMn"> {{ $ento_total['t1TotalMn'] }}</span></td>
				<td><span name="t2TotalMn">{{ $ento_total['t2TotalMn'] }} </span></td>
				<td><span name="t3TotalMn">{{ $ento_total['t3TotalMn'] }} </span></td>
				<td><span name="t4TotalMn">{{ $ento_total['t4TotalMn'] }} </span></td>
				<td><span name="t5TotalMn">{{ $ento_total['t5TotalMn'] }} </span></td>
				<td><span name="6TotalMn">{{ $ento_total['t6TotalMn'] }} </span></td>
				<td><span name="UfTotalMn">{{ $ento_total['UfTotalMn'] }} </span></td>
				<td><span name="fTotalMn">{{ $ento_total['fTotalMn'] }} </span></td>
				<td><span name="SgTotalMn">{{ $ento_total['SgTotalMn'] }} </span></td>
				<td><span name="GtoTalMn">{{ $ento_total['GtoTalMn'] }} </span></td>





				<td><span name="MalestoTalMn"> {{ $ento_total['MalestoTalMn'] }} </span></td>

				<td>{{ $Total_mno_dissected_mosquitos }}</td>
				<td>{{ $Total_mpositive_mosq }}</td>
				<td>{{ $Total_mmq_postive_for_l3 }}</td>

				



				<td>
					{{ $total_head_mf_mn }}
				</td>

				<td>
					{{ $total_head_l1_mn }}
				</td>
				<td>
					{{ $total_head_l2_mn }}
				</td>
				<td>
					{{ $total_head_l3_mn }}
				</td>
				<td>
					{{ $total_thorax_mf_mn }}
				</td>
				<td>
					{{ $total_thorax_l1_mn }}
				</td>
				<td>
					{{ $total_thorax_l2_mn }}
				</td>
				<td>
					{{ $total_thorax_l3_mn }}
				</td>
				<td>
					{{ $total_abdomen_mf_mn }}
				</td>
				<td>
					{{ $total_abdomen_l1_mn }}
				</td>
				<td>
					{{ $total_abdomen_l2_mn }}
				</td>
				<td>
					{{ $total_abdomen_l3_mn }}
				</td>

			</tr>
		</tfoot>

		</tbody>
	</table>



	<table style="margin-top:150px; margin-left:240px;">
		<tr>
			<th class="input11">Total no of Anopheles Mos:-</th>
			<th class="input22">{{ $ento1_list->anopheles_species}}</th>
			<th class="input"></th>
			<th class="input11">No of man hours:- </th>
			<th class="input22">{{ $ento1_list->total_time_spend  }}</th>
		</tr>


		<tr>
			<th class="input11">Total no of Armigeres Mos:-</th>
			<th class="input22">{{ $ento1_list->armigerus_sp }}</th>
			<th class="input"></th>
			<th class="input11">Mos. Density: Cx :-</th>
			<th class="input22">{{ $ento1_list->MosDensityCx  }}</th>
		</tr>



		<tr>
			<th class="input11">Total no of Aedes Mos:-</th>
			<th class="input22">{{ $ento1_list->aedes_sp }}</th>
			<th class="input"></th>
			<th class="input11">Mos Density Mn: :-</th>
			<th class="input22">{{ $ento1_list->MosDensityMan  }}</th>

		</tr>









		<tr>
			<th class="input11">No of collectors:-</th>
			<th class="input22">{{ $ento1_list->no_of_collectors }}</th>
			<th class="input"></th>

		</tr>

	</table>

</page>