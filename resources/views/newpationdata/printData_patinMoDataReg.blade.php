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
				<th> Date of first clinic attendance</th>
				<th>Clinical presentation to the clinic</th>
				<th>Affected part of body by lymphoedema</th>
				<th>Duration of lymphoedema</th>
				<th>Stage of lymphoedema</th>
				<th>Probable cause of lymphoedema</th>
				<th> History of acute attacks of dermatolymphangioadenitis during last 4 weeks</th>
				<th>Comorbidities</th>
				<th>History of microfilaria positivity</th>
				<th>If Yes to Q9, How was it diagnosed?</th>
				<th>Past surgical history (If yes specify)</th>
				<th>Drug allergies* (If yes specify)</th>
				<th>Remarks</th>
				<th>Next clinic date</th>


				</div>












			</tr>

		</thead>

		<tbody>

			<tr>

				<td>{{$Viewdata->district_lymphedema_no}}</td>
				<td>{{$Viewdata->full_name}}</td>
				<td>{{$Viewdata->gender}}</td>
				<td>{{$Viewdata->date_of_birth}}</td>
				<td>{{$Viewdata->age_in_completed}}</td>
				<td>{{$Viewdata->address}}</td>
				<td>{{$Viewdata->date_of_registration}}</td>
				<td>{{$Viewdata->name_of_docter}}</td>
				<td>{{$Viewdata->date_of_first_clinic_arrendance}}</td>
				<td>{{$Viewdata->clinical_presentatio}}</td>

				<td>{{ ($Viewdata->Leg_Left=='option1')? 'Leg Left':'' }}
					{{$Viewdata->Leg_Right=='option1' ? 'Leg Right':''}} <br>
					{{$Viewdata->Arm_Left=='option1' ? 'Arm Left':''}}
					{{$Viewdata->Arm_Right=='option1' ? 'Arm Right':''}} <br>

					{{$Viewdata->Breast_left=='Left' ? 'Breast left':''}}
					{{$Viewdata->Breast_right=='Right' ? 'Breast right':''}}<br>

					{{$Viewdata->scrotortum_left=='scrotortum_left' ? 'scrotortum left':''}}
					{{$Viewdata->scrotortum_right=='scrotortum_right' ? 'scrotortum right':''}}<br>

					{{$Viewdata->Penisleft=='Peni_left' ? 'Penis':'' }} <br>
					{{$Viewdata->no_lymhedema_left=='option1' ? 'No Lymphoedema':''}}
				</td>

				<td>Months:-{{$Viewdata->duration_on_lymhodema_month}} <br>
					Years:-{{$Viewdata->duration_on_lymhodema_years}}
				</td>

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
					{{$Viewdata->probable_couse_filariasis=='Probable cause of lymphoedema' ? 'Filariasis':'' }}<br>
					{{$Viewdata->probable_couse_filariasis_fat_positive=='Filariasis (FAT positive)' ? 'Filariasis (FAT positive)':'' }}<br>
					{{$Viewdata->probable_couse__cellulitis=='Cellulitis' ? 'Cellulitis':'' }}<br>
					{{$Viewdata->probable_couse_recurrent_of_cellulists=='Recurrent attacks of cellulitis' ? 'Recurrent attacks of cellulitis':'' }}<br>
					{{$Viewdata->probable_couse_Skin_rash=='Skin rash' ? 'Skin rash':'' }}<br>
					{{$Viewdata->probable_couse_Thrombotic_disease=='Thrombotic disease' ? 'Thrombotic disease':'' }}<br>
					{{$Viewdata->probable_couse_Past_surgery=='Past surgery' ? 'Past surgery':'' }}<br>
					{{$Viewdata->probable_couse_Trauma=='Trauma' ? 'Trauma':'' }}<br>
					{{$Viewdata->probable_couse_Obesity=='Obesity' ? 'Obesity':'' }}<br>
					{{$Viewdata->probable_couse_Heart_disease=='Heart disease' ? 'Heart disease':'' }}<br>
					{{$Viewdata->probable_couse_Renal_disease=='Renal_disease' ? 'Heart disease':'' }}<br>
					{{$Viewdata->probable_couse_Liver_disease=='Liver disease' ? 'Liver disease':'' }}<br>
					{{$Viewdata->probable_couse_other}}<br>
				</td>

				<td>{{$Viewdata->history_of_attacks_of_dermatoly=='yes' ? 'Yes':'' }}
					{{$Viewdata->history_of_attacks_of_dermatoly=='No' ? 'No':'' }}
					{{($Viewdata->history_of_attacks_of_dermatoly!='yes' and $Viewdata->history_of_attacks_of_dermatoly!='No') ?  'other:-'. $Viewdata->history_of_attacks_of_dermatoly :'' }}
				</td>

				<td>
					{{$Viewdata->comorbidities_diabetes=='Diabetes mellitus' ? 'Diabetes mellitus':'' }}<br>
					{{$Viewdata->comorbidities_Hypertension=='Hypertension' ? 'Hypertension':'' }}<br>
					{{$Viewdata->comorbidities_Ischemic=='Ischemic Heart Disease' ? 'Ischemic Heart Disease':'' }}<br>
					{{$Viewdata->comorbidities_renal=='Renal disease' ? 'Renal disease':'' }}<br>
					{{$Viewdata->comorbidities_liver=='Liver disease' ? 'Liver disease':'' }}<br>
					Other:-{{$Viewdata->comorbidities_other }}
				</td>

				<td>{{$Viewdata->history_of_microfilaria_positivity=='yes' ? 'Yes':'No' }} </td>

				<td>
					Night blood film positive:- {{$Viewdata->night_blood_film_postive=='Wucheraria bancrofti' ? 'Wucheraria bancrofti':'Brugia malayi' }}<br>
					Antigen positive:- {{$Viewdata->antigen_postive=='Wucheraria bancrofti' ? 'Wucheraria bancrofti':'Brugia malayi' }} <br>
					Antibody positive:- {{$Viewdata->antibody_positive=='Wucheraria bancrofti' ? 'Wucheraria bancrofti':'Brugia malayi' }}<br>
					Not diagnosed by a test, but treated :-{{$Viewdata->not_diagonses_by_a_test=='Wucheraria bancrofti' ? 'Wucheraria bancrofti':'Brugia malayi' }}<br>
				</td>

				<td>{{($Viewdata->past_surgical_history!='yes') ? 'Yes'.$Viewdata->history_of_attacks_of_dermatoly:'NO' }}</td>
				<td>{{($Viewdata->droug_allergies!='Yes') ? 'Yes'.$Viewdata->droug_allergies:'No' }}</td>


				<td>{{$Viewdata->remarks}}</td>
				<td>{{$Viewdata->next_clinic_data}}</td>










			</tr>

		</tbody>

	</table>



</page>