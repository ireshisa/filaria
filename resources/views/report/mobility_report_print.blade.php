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
		padding: 5px 5px 5px 5px;
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
	<h3 style="text-align: center; font-family:Arial; Arial; font-weight: bold;  margin-bottom:0;  line-height: 25px;" ><b>
	    
	     ANTI FILARASIS  CAMPAIGN  <br> 
                         National Lymphedema Morbidity Report
		               <br>
		               From- <?php print_r($from); ?> &nbsp; To- <?php print_r($to); ?> 
	</b></h3>




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

		<th rowspan="2">District</th>
		<th rowspan="2">No of Clinic Sessions </th>
		<th colspan="4">First Visit Lympedema patients</th>
		<th colspan="4">Subsequent Visit Lympedema patients</th>
		<th rowspan="2">Total No of Lymphedema patients</th>
		<th rowspan="2"> Hydrocele</th>
		<th rowspan="2"> TPE</th>

	</tr>



	<tr>
		<th>Lymphedema without acute attacks of ADLA </th>
		<th>Lymphedema with acute attacks of ADLA </th>
		<th>No.with H/O acute attacks within last 4 weeks </th>
		<th>Total No of New Lymphedema patients</th>


		<th>Lymphedema without acute attacks of ADLA </th>
		<th>Lymphedema with acute attacks of ADLA </th>
		<th>No.with H/O acute attacks within last 4 weeks </th>
		<th>Total No of Subsequent Visit Lymphedema patients</th>
	</tr>


	<?php if($district == 'All' || $district == 'CMC' ){
; ?>
	<tr>
		<td>AFC HQ</td>
		<td>{{ $dataView['CMC']['no_of_clinic'] }}</td>
		<td>{{ $dataView['CMC']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['CMC']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['CMC']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['CMC']['lymphoedema_without_acute_attack']+$dataView['CMC']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['CMC']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['CMC']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['CMC']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['CMC']['sub_no_of_clinic']+$dataView['CMC']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['CMC']['lymphoedema_without_acute_attack']+$dataView['CMC']['lymphoedema_with_acute_attack'] +$dataView['CMC']['sub_no_of_clinic']+$dataView['CMC']['sub_lymphoedema_without_acute_attack']}}</td>
		<td>{{ $dataView['CMC']['hydrocele'] }}</td>
		<td>{{ $dataView['CMC']['tpe'] }}</td>
	</tr>
<?php } ?>



<?php if($district == 'All' ){
; ?>
	<tr>
		<td>Colombo</td>
		<td>{{ $dataView['Colombo']['no_of_clinic'] }}</td>
		<td>{{ $dataView['Colombo']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Colombo']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Colombo']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Colombo']['lymphoedema_without_acute_attack']+$dataView['Colombo']['lymphoedema_with_acute_attack'] }}</td>

		<td>{{ $dataView['Colombo']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Colombo']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Colombo']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Colombo']['sub_no_of_clinic'] + $dataView['Colombo']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Colombo']['lymphoedema_without_acute_attack']+$dataView['Colombo']['lymphoedema_with_acute_attack'] + $dataView['Colombo']['sub_no_of_clinic'] + $dataView['Colombo']['sub_lymphoedema_without_acute_attack']}}</td>
		<td>{{ $dataView['Colombo']['hydrocele'] }}</td>
		<td>{{ $dataView['Colombo']['tpe'] }}</td>
	</tr>

<?php } ?>




<?php if($district == 'All' || $district == 'Gampaha' ){
; ?>
	<tr>
		<td>Gampaha</td>
		<td>{{ $dataView['Gampaha']['no_of_clinic'] }}</td>
		<td>{{ $dataView['Gampaha']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Gampaha']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Gampaha']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Gampaha']['lymphoedema_without_acute_attack']+$dataView['Gampaha']['lymphoedema_with_acute_attack']  }}</td>
		<td>{{ $dataView['Gampaha']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Gampaha']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Gampaha']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Gampaha']['sub_no_of_clinic']+ $dataView['Gampaha']['sub_lymphoedema_without_acute_attack']}}</td>
		<td>{{ $dataView['Gampaha']['lymphoedema_without_acute_attack']+$dataView['Gampaha']['lymphoedema_with_acute_attack'] + $dataView['Gampaha']['sub_no_of_clinic']+ $dataView['Gampaha']['sub_lymphoedema_without_acute_attack']     }}</td>
		<td>{{ $dataView['Gampaha']['hydrocele'] }}</td>
		<td>{{ $dataView['Gampaha']['tpe'] }}</td>
	</tr>
<?php } ?>


<?php if($district == 'All' || $district == 'Kalutara' ){
; ?>
	<tr>
		<td>Kalutara</td>
		<td>{{ $dataView['Kalutara']['no_of_clinic'] }}</td>
		<td>{{ $dataView['Kalutara']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Kalutara']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Kalutara']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Kalutara']['lymphoedema_without_acute_attack']+$dataView['Kalutara']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Kalutara']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Kalutara']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Kalutara']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Kalutara']['sub_no_of_clinic']+$dataView['Kalutara']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Kalutara']['lymphoedema_without_acute_attack']+$dataView['Kalutara']['lymphoedema_with_acute_attack'] + $dataView['Kalutara']['sub_no_of_clinic']+$dataView['Kalutara']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Kalutara']['hydrocele'] }}</td>
		<td>{{ $dataView['Kalutara']['tpe'] }}</td>
	</tr>
<?php } ?>


<?php if($district == 'All' ){
; ?>
	<tr>
		<td>Western Province</td>
		<td>{{ $dataView['Colombo']['no_of_clinic']+$dataView['CMC']['no_of_clinic']+$dataView['Gampaha']['no_of_clinic']+$dataView['Kalutara']['no_of_clinic'] }}</td>
		<td>{{ $dataView['Colombo']['lymphoedema_without_acute_attack']+$dataView['CMC']['lymphoedema_without_acute_attack']+$dataView['Gampaha']['lymphoedema_without_acute_attack']+$dataView['Kalutara']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Colombo']['lymphoedema_with_acute_attack']+$dataView['CMC']['lymphoedema_with_acute_attack']+$dataView['Gampaha']['lymphoedema_with_acute_attack']+$dataView['Kalutara']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Colombo']['no_with_ho_4week']+$dataView['CMC']['no_with_ho_4week']+$dataView['Gampaha']['no_with_ho_4week']+$dataView['Kalutara']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Colombo']['lymphoedema_without_acute_attack']+$dataView['CMC']['lymphoedema_without_acute_attack']+$dataView['Gampaha']['lymphoedema_without_acute_attack']+$dataView['Kalutara']['lymphoedema_without_acute_attack'] +
			$dataView['Colombo']['lymphoedema_with_acute_attack']+$dataView['CMC']['lymphoedema_with_acute_attack']+$dataView['Gampaha']['lymphoedema_with_acute_attack']+$dataView['Kalutara']['lymphoedema_with_acute_attack'] }}</td>

		<td>{{ $dataView['Colombo']['sub_no_of_clinic'] +$dataView['CMC']['sub_no_of_clinic']+$dataView['Gampaha']['sub_no_of_clinic']+$dataView['Kalutara']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Colombo']['sub_lymphoedema_without_acute_attack'] +$dataView['CMC']['sub_lymphoedema_without_acute_attack']+$dataView['Gampaha']['sub_lymphoedema_without_acute_attack']+$dataView['Kalutara']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Colombo']['sub_no_with_ho_4week']+ $dataView['CMC']['sub_no_with_ho_4week'] + $dataView['Gampaha']['sub_no_with_ho_4week'] + $dataView['Kalutara']['sub_no_with_ho_4week']  }}</td>
		<td>{{$dataView['Colombo']['sub_no_of_clinic'] +$dataView['CMC']['sub_no_of_clinic']+$dataView['Gampaha']['sub_no_of_clinic']+$dataView['Kalutara']['sub_no_of_clinic']+$dataView['Colombo']['sub_lymphoedema_without_acute_attack'] 
			+$dataView['CMC']['sub_lymphoedema_without_acute_attack']+$dataView['Gampaha']['sub_lymphoedema_without_acute_attack']+$dataView['Kalutara']['sub_lymphoedema_without_acute_attack'] }}</td>



		<td>{{$dataView['Colombo']['lymphoedema_without_acute_attack']+$dataView['CMC']['lymphoedema_without_acute_attack']+$dataView['Gampaha']['lymphoedema_without_acute_attack']+$dataView['Kalutara']['lymphoedema_without_acute_attack'] +
			$dataView['Colombo']['lymphoedema_with_acute_attack']+$dataView['CMC']['lymphoedema_with_acute_attack']+$dataView['Gampaha']['lymphoedema_with_acute_attack']+$dataView['Kalutara']['lymphoedema_with_acute_attack'] +$dataView['Colombo']['sub_no_of_clinic'] +$dataView['CMC']['sub_no_of_clinic']+$dataView['Gampaha']['sub_no_of_clinic']+$dataView['Kalutara']['sub_no_of_clinic']+$dataView['Colombo']['sub_lymphoedema_without_acute_attack'] 
			+$dataView['CMC']['sub_lymphoedema_without_acute_attack']+$dataView['Gampaha']['sub_lymphoedema_without_acute_attack']+$dataView['Kalutara']['sub_lymphoedema_without_acute_attack']  }}</td>

		<td>{{ $dataView['Colombo']['hydrocele']+$dataView['CMC']['hydrocele']+$dataView['Gampaha']['hydrocele']+$dataView['Kalutara']['hydrocele']}}</td>
		<td>{{ $dataView['Colombo']['tpe']+$dataView['CMC']['tpe']+$dataView['Gampaha']['tpe']+$dataView['Kalutara']['tpe'] }}</td>
	</tr>
<?php } ?>


<?php if($district == 'All' || $district == 'Galle' ){
; ?>
	<tr>
		<td>Galle</td>
		<td>{{ $dataView['Galle']['no_of_clinic'] }}</td>
		<td>{{ $dataView['Galle']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Galle']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Galle']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Galle']['lymphoedema_without_acute_attack']+$dataView['Galle']['lymphoedema_with_acute_attack'] }}</td>

		<td>{{ $dataView['Galle']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Galle']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Galle']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Galle']['sub_no_of_clinic']+$dataView['Galle']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Galle']['lymphoedema_without_acute_attack']+$dataView['Galle']['lymphoedema_with_acute_attack'] + $dataView['Galle']['sub_no_of_clinic']+$dataView['Galle']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Galle']['hydrocele'] }}</td>
		<td>{{ $dataView['Galle']['tpe'] }}</td>
	</tr>
<?php } ?>


<?php if($district == 'All' || $district == 'Matara' ){
; ?>
	<tr>
		<td>Matara</td>
		<td>{{ $dataView['Matara']['no_of_clinic'] }}</td>
		<td>{{ $dataView['Matara']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Matara']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Matara']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Matara']['lymphoedema_without_acute_attack']+$dataView['Matara']['lymphoedema_with_acute_attack'] }}</td>

		<td>{{ $dataView['Matara']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Matara']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Matara']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Matara']['sub_no_of_clinic']+$dataView['Matara']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Matara']['lymphoedema_without_acute_attack']+$dataView['Matara']['lymphoedema_with_acute_attack'] + $dataView['Matara']['sub_no_of_clinic']+$dataView['Matara']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Matara']['hydrocele'] }}</td>
		<td>{{ $dataView['Matara']['tpe'] }}</td>
	</tr>
<?php } ?>






<?php if($district == 'All' || $district == 'Hambantota' ){
; ?>
	<tr>
		<td>Hambantota</td>
		<td>{{ $dataView['Hambantota']['no_of_clinic'] }}</td>
		<td>{{ $dataView['Hambantota']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Hambantota']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Hambantota']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Hambantota']['lymphoedema_without_acute_attack']+$dataView['Hambantota']['lymphoedema_with_acute_attack'] }}</td>

		<td>{{ $dataView['Hambantota']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Hambantota']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Hambantota']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Hambantota']['sub_no_of_clinic']+$dataView['Hambantota']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Hambantota']['lymphoedema_without_acute_attack']+$dataView['Hambantota']['lymphoedema_with_acute_attack'] + $dataView['Hambantota']['sub_no_of_clinic']+$dataView['Hambantota']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Hambantota']['hydrocele'] }}</td>
		<td>{{ $dataView['Hambantota']['tpe'] }}</td>
	</tr>
<?php } ?>



<?php if($district == 'All'){
; ?>
	<tr>
		<td>Southern province</td>
		<td>{{ $dataView['Galle']['no_of_clinic']+$dataView['Matara']['no_of_clinic'] }}</td>
		<td>{{ $dataView['Galle']['lymphoedema_without_acute_attack']+$dataView['Matara']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Galle']['lymphoedema_with_acute_attack']+$dataView['Matara']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Galle']['no_with_ho_4week']+$dataView['Matara']['no_with_ho_4week'] }}</td>
		<td>{{$dataView['Galle']['lymphoedema_without_acute_attack']+$dataView['Matara']['lymphoedema_without_acute_attack']+$dataView['Galle']['lymphoedema_with_acute_attack']+$dataView['Matara']['lymphoedema_with_acute_attack'] }}</td>

		<td>{{ $dataView['Galle']['sub_no_of_clinic']+$dataView['Matara']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Galle']['sub_lymphoedema_without_acute_attack']+$dataView['Matara']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Galle']['sub_no_with_ho_4week'] + $dataView['Matara']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Galle']['sub_no_of_clinic']+$dataView['Matara']['sub_no_of_clinic']+ $dataView['Galle']['sub_lymphoedema_without_acute_attack']+$dataView['Matara']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>
			{{$dataView['Galle']['lymphoedema_without_acute_attack']+$dataView['Matara']['lymphoedema_without_acute_attack']+$dataView['Galle']['lymphoedema_with_acute_attack']+$dataView['Matara']['lymphoedema_with_acute_attack']+
	$dataView['Galle']['sub_no_of_clinic']+$dataView['Matara']['sub_no_of_clinic']+ $dataView['Galle']['sub_lymphoedema_without_acute_attack']+$dataView['Matara']['sub_lymphoedema_without_acute_attack']   }}
		</td>
		<td>{{ $dataView['Galle']['hydrocele'] + $dataView['Matara']['hydrocele']}}</td>
		<td>{{ $dataView['Galle']['tpe'] + $dataView['Matara']['tpe'] }}</td>
	</tr>
<?php } ?>


<?php if($district == 'All' || $district == 'Kurunegala' ){
; ?>
	<tr>
		<td>Kurunegala</td>
		<td>{{ $dataView['Kurunegala']['no_of_clinic'] }}</td>
		<td>{{ $dataView['Kurunegala']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Kurunegala']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Kurunegala']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Kurunegala']['lymphoedema_without_acute_attack']+$dataView['Kurunegala']['lymphoedema_with_acute_attack'] }}</td>

		<td>{{ $dataView['Kurunegala']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Kurunegala']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Kurunegala']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Kurunegala']['sub_no_of_clinic']+$dataView['Kurunegala']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Kurunegala']['lymphoedema_without_acute_attack']+$dataView['Kurunegala']['lymphoedema_with_acute_attack'] + $dataView['Kurunegala']['sub_no_of_clinic']+$dataView['Kurunegala']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Kurunegala']['hydrocele'] }}</td>
		<td>{{ $dataView['Kurunegala']['tpe'] }}</td>
	</tr>
<?php } ?>


<?php if($district == 'All' || $district == 'Puttalam' ){
; ?>
	<tr>
		<td>Puttalam</td>
		<td>{{ $dataView['Puttalam']['no_of_clinic'] }}</td>
		<td>{{ $dataView['Puttalam']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Puttalam']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Puttalam']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Puttalam']['lymphoedema_without_acute_attack']+$dataView['Puttalam']['lymphoedema_with_acute_attack'] }}</td>

		<td>{{ $dataView['Puttalam']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Puttalam']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Puttalam']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Puttalam']['sub_no_of_clinic']+$dataView['Puttalam']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Puttalam']['lymphoedema_without_acute_attack']+$dataView['Puttalam']['lymphoedema_with_acute_attack'] + $dataView['Puttalam']['sub_no_of_clinic']+$dataView['Puttalam']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Puttalam']['hydrocele'] }}</td>
		<td>{{ $dataView['Puttalam']['tpe'] }}</td>
	</tr>
<?php } ?>


<?php if($district == 'All' ){
; ?>
	<tr>
		<td>North western province</td>
		<td>{{ $dataView['Kurunegala']['no_of_clinic'] + $dataView['Puttalam']['no_of_clinic']}}</td>
		<td>{{ $dataView['Kurunegala']['lymphoedema_without_acute_attack'] +$dataView['Puttalam']['lymphoedema_without_acute_attack']}}</td>
		<td>{{ $dataView['Kurunegala']['lymphoedema_with_acute_attack']+ $dataView['Puttalam']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Kurunegala']['no_with_ho_4week']+$dataView['Puttalam']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Kurunegala']['lymphoedema_without_acute_attack'] +$dataView['Puttalam']['lymphoedema_without_acute_attack'] +$dataView['Kurunegala']['lymphoedema_with_acute_attack']+ $dataView['Puttalam']['lymphoedema_with_acute_attack']}}</td>

		<td>{{ $dataView['Kurunegala']['sub_no_of_clinic']+ $dataView['Puttalam']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Kurunegala']['sub_lymphoedema_without_acute_attack'] +$dataView['Puttalam']['sub_lymphoedema_without_acute_attack']}}</td>
		<td>{{ $dataView['Kurunegala']['sub_no_with_ho_4week']+$dataView['Puttalam']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Kurunegala']['sub_no_of_clinic']+ $dataView['Puttalam']['sub_no_of_clinic'] + $dataView['Kurunegala']['sub_lymphoedema_without_acute_attack'] +$dataView['Puttalam']['sub_lymphoedema_without_acute_attack']}}</td>

		<th>{{ $dataView['Kurunegala']['lymphoedema_without_acute_attack'] +$dataView['Puttalam']['lymphoedema_without_acute_attack'] +$dataView['Kurunegala']['lymphoedema_with_acute_attack']+ $dataView['Puttalam']['lymphoedema_with_acute_attack'] +
			$dataView['Kurunegala']['sub_no_of_clinic']+ $dataView['Puttalam']['sub_no_of_clinic'] + $dataView['Kurunegala']['sub_lymphoedema_without_acute_attack'] +$dataView['Puttalam']['sub_lymphoedema_without_acute_attack']}}</th>
		<td>{{ $dataView['Kurunegala']['hydrocele']+$dataView['Puttalam']['hydrocele'] }}</td>
		<td>{{ $dataView['Kurunegala']['tpe']+$dataView['Puttalam']['tpe'] }}</td>
	</tr>
<?php } ?>

	<tr>
		<td>Sri lanka</td>
		<td>{{ $dataView['Total']['no_of_clinic'] }}</td>
		<td>{{ $dataView['Total']['lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Total']['lymphoedema_with_acute_attack'] }}</td>
		<td>{{ $dataView['Total']['no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Total']['lymphoedema_without_acute_attack']+$dataView['Total']['lymphoedema_with_acute_attack'] }}</td>

		<td>{{ $dataView['Total']['sub_no_of_clinic'] }}</td>
		<td>{{ $dataView['Total']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Total']['sub_no_with_ho_4week'] }}</td>
		<td>{{ $dataView['Total']['sub_no_of_clinic']+$dataView['Total']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Total']['lymphoedema_without_acute_attack']+$dataView['Total']['lymphoedema_with_acute_attack'] + $dataView['Total']['sub_no_of_clinic']+$dataView['Total']['sub_lymphoedema_without_acute_attack'] }}</td>
		<td>{{ $dataView['Total']['hydrocele'] }}</td>
		<td>{{ $dataView['Total']['tpe'] }}</td>
	</tr>





</table>

</page>