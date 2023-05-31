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
				<th>Name of the doctor</th>
				<th>Date of first clinic attendance</th>
				<th>Clinical presentation to the clinic</th>
				<th>History of acute attacks of dermatolymphangioadenitis during last 4 weeks*</th>
				<th>Stage of lymphoedema</th>
				<th>Treatment</th>
				<th>Remarks</th>
				<th>Date next clinic visit</th>







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
				<th>{{$Viewdata->name_doctor}}</th>
				<th>{{ $Viewdata->date_of_first_clinic_arrendance}}</th>
				<th>
					{{ $Viewdata->Clinical_lymphedema_regular_clinic == 'yes' ? 'Lymphedema regular clinic follow up' : '' }} <br>
					{{ $Viewdata->Clinical_lymphedema_regular_clinic == 'No' ? 'Acute attack of dermatolymphangioadenitis' : '' }} <br>
					{{ $Viewdata->Clinical_lymphedema_regular_clinic == 'other' ? 'checked' : 'Other:-'. $Viewdata->Clinical_other_specify }} <br>
				</th>
				<th>
					{{ $Viewdata->history_of_attacks_yes == 'yes' ? 'Yes' : 'NO' }}
					{{ $Viewdata->history_of_attacks_yes == 'Other' ? 'Other:-'.$Viewdata->history_of_attacks_of_dermatoly_other : '' }}

				</th>

				<td>
					Stage I- {{$Viewdata->stage_1_Left=='option1' ? 'Left':'' }} {{$Viewdata->stage_1_right=='option2' ? 'Right':'' }} <br>
					Stage II- {{$Viewdata->stage_2_Left=='option1' ? 'Left':'' }} {{$Viewdata->stage_2_right=='option2' ? 'Right':'' }} <br>
					Stage III- {{$Viewdata->stage_3_Left=='option1' ? 'Left':'' }} {{$Viewdata->stage_3_right=='option2' ? 'Right':'' }} <br>
					Stage IV- {{$Viewdata->stage_4_Left=='option1' ? 'Left':'' }} {{$Viewdata->stage_4_right=='option2' ? 'Right':'' }} <br>
					Stage V- {{$Viewdata->stage_5_Left=='option1' ? 'Left':'' }} {{$Viewdata->stage_5_right=='option2' ? 'Right':'' }} <br>
					Stage VI- {{$Viewdata->stage_6_Left=='option1' ? 'Left':'' }} {{$Viewdata->stage_6_right=='option2' ? 'Right':'' }} <br>
					Stage VII- {{$Viewdata->stage_7Left=='option1' ? 'Left':'' }} {{$Viewdata->stage_7_right=='option2' ? 'Right':'' }} <br>
				</td>


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
					Skin care:-
					{{ $Viewdata->skin_care_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
					{{ $Viewdata->skin_care_satisfactory == 'option2' ? 'Need improvement' : ''  }}
					{{ $Viewdata->skin_care_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>



					Elevation:-
					{{ $Viewdata->elavation_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
					{{ $Viewdata->elavation_satisfactory == 'option2' ? 'Need improvement' : ''  }}
					{{ $Viewdata->elavation_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>


					Movement and exercise :-
					{{ $Viewdata->movement_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
					{{ $Viewdata->movement_satisfactory == 'option2' ? 'Need improvement' : ''  }}
					{{ $Viewdata->movement_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>

					Bandaging/ compression:-

					{{ $Viewdata->bandaging_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
					{{ $Viewdata->bandaging_satisfactory == 'option2' ? 'Need improvement' : ''  }}
					{{ $Viewdata->bandaging_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>

					Foot wear :-
					{{ $Viewdata->foot_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
					{{ $Viewdata->foot_satisfactory == 'option2' ? 'Need improvement' : ''  }}
					{{ $Viewdata->foot_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>

					Psychological support:-

					{{ $Viewdata->phychological_satsfactory == 'option1' ? 'Satisfactory' : ''  }}
					{{ $Viewdata->phychological_satsfactory == 'option2' ? 'Need improvement' : ''  }}
					{{ $Viewdata->phychological_satsfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>

					Screening (DM/ family):-
					{{ $Viewdata->screening_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
					{{ $Viewdata->screening_satisfactory == 'option2' ? 'Need improvement' : ''  }}
					{{ $Viewdata->screening_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }}
				</td>

				<td>
					{{$Viewdata->remarks}}
				</td>
				<td>{{$Viewdata->next_clinic_visit}}</td>

			</tr>

		</tbody>

	</table>



</page>