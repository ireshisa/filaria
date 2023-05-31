<page>
	<!-- boostrap cdn limk -->
	<table>
		<thead class="ther">
			<tr>

				<th>Date of Registration </th>
				<th>District </th>
				<th>Name of the clinic </th>
				<th>District serial number</th>
				<th>Name of Patient</th>
				<th>Sex</th>
				<th>Date of Birth</th>
				<th>Age</th>
				<th>National Identity Card (NIC) number</th>
				<th>Civil Status</th>
				<th>Area of living?</th>
				<th>Type of residence</th>
				<th>Whom does the patient live with?</th>
				<th>Level of education</th>
				<th>Occupation category</th>
				<th>Contact numbers:</th>
				<th>Address</th>
				<th>MOH area</th>
				<th>PHM area</th>
				<th>Grama Niladari area</th>
				<th>Have you ever lived in an endemic area other than current residence</th>
			</tr>

		</thead>

		<tbody>

			<tr>

				<td>{{$Viewdata->date_of_registration}}</td>
				<td>{{$Viewdata->district}}</td>
				<td>{{$Viewdata->name_of_clinic}}</td>
				<td>{{$Viewdata->district_lymphedema_no}}</td>
				<td>{{$Viewdata->name_of_patient}}</td>
				<td>{{$Viewdata->gender}}</td>
				<td>{{$Viewdata->date_of_birth}}</td>
				<td>{{$Viewdata->age_in_completed_years}}</td>
				<td>{{$Viewdata->nic_no}}</td>
				<td>{{$Viewdata->civil_status}}</td>
				<td>{{$Viewdata->area_of_living}}</td>
				<td>{{$Viewdata->residence}}</td>
				<td>{{$Viewdata->living}}</td>
				<td>{{$Viewdata->education}}</td>
				<td>{{$Viewdata->occupation}} <br> </td>
				<td> Home :- {{$Viewdata->telephone_home}}
					Mobil :- {{$Viewdata->telephone_mobile}}
					Guardian :- {{$Viewdata->telephone_guardian}}
				</td>
				<td>{{$Viewdata->gps_point_lon}}</td>
				<td>{{$Viewdata->moh}}</td>
				<td>{{$Viewdata->phm}}</td>
				<td>{{$Viewdata->gn_area}}</td>
				<td>{{$Viewdata->endemic_area_than_cuurent_residence}}</td>




















			</tr>

		</tbody>

	</table>



</page>