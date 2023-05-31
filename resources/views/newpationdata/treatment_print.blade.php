<page>

	<table>
		<thead class="ther">
			<tr>
				<th>District lymphedema no </th>
				<th>Full Name of Patient</th>
				<th>Gender</th>
				<th>Date of Birth</th>
				<th>Age in completed Years</th>
				<th>Address</th>
				<th>Date of Registration</th>
				<th>Body Mass Index</th>
				<th>Treatment</th>
				<th>Morbidity management advice</th>
				<th>Remarks</th>
			</tr>

		</thead>

		<tbody>
			<tr>
				<td>{{ $Viewdata->district_lymphedema_no }}</td>
				<td>{{ $Viewdata->full_name }}</td>
				<th>{{ $Viewdata->gender }}</th>
				<th>{{ $Viewdata->date_of_birth }}</th>
				<th>{{ $Viewdata->age_in_completed }}</th>
				<th>{{ $Viewdata->address }}</th>
				<th>{{ $Viewdata->date_of_registration }}</th>
				<td> Weight (kg):- {{ $Viewdata->weight }}<br>
					Height (m) :- {{ $Viewdata->height }}<br>
					BmI:- {{ $Viewdata->bmi}}</td>

				<td>

					<?php $q = 0;  ?>
					@foreach ($Viewdata->TreatmentHistory_dates as $ento5)

					<?php $q++;  ?>
					{{ $q }}<br>
					Drug:-{{ $ento5->name_of_drug }}<br>
					Dosage:-{{ $ento5->Dosage }}<br>
					Frequency:-{{ $ento5->Frequency }}<br>
					Duration :-{{ $ento5->Duration }}<br><br><br>
					@endforeach
				</td>

				<td>
					Skin care:- {{ $Viewdata->skin_care == 'option1' ? 'Yes' : 'No' }} <br>
					Elevation:- {{ $Viewdata->elvation == 'option1' ? 'Yes' : 'No' }} <br>
					Movement and exercise:- {{ $Viewdata->movement_and_exercise == 'option1' ? 'Yes' : 'No' }} <br>
					Bandaging/ compression:- {{ $Viewdata->bandaging == 'option1' ? 'Yes' : 'No' }} <br>
					Foot wear:- {{ $Viewdata->foot_wear == 'option1' ? 'Yes' : 'No' }} <br>
					Psychological support:- {{ $Viewdata->psychological == 'option1' ? 'Yes' : 'No' }} <br>
					Screening (DM/ family):- {{ $Viewdata->screening == 'option1' ? 'Yes' : 'No' }} <br>
				</td>
				<td>{{ $Viewdata->remarks}}</td>


			</tr>

		</tbody>

	</table>



</page>