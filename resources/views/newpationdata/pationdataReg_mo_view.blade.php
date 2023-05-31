<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1> View-Clinical Assessment<br>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Patient Data </a></li>
			<li class="active">View-Clinical Assessment</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body"> @if(session()->has('message')) @if(session()->get('message')==true) <div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4> Successfully Delete Your Record.
						</div> @endif @if(session()->get('message')==false) <div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Failed!</h4> Failed Delete Your Record.
						</div> @endif @endif @if(session()->has('update')) @if(session()->get('update')==true) <div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4> Successfully Update Your Record.
						</div> @endif @if(session()->get('update')==false) <div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Failed!</h4> Failed Update Your Record.
						</div> @endif @endif





						<form method="GET" action="{{url('/initial_registration_mo_view') }}">
							<!-- {{csrf_field() }} -->
							<div class="col-md-12">
								<div class="box box-primary mr-auto ml-auto">
									<div class="box-body mr-auto ml-auto" style="overflow: hidden !important;">
										<div class="col-md-8 mr-auto ml-auto" style="float: none !important; margin-left: auto !important; margin-right: auto !important;">
											<div class="form-group">
												<label for="exampleInputPassword1">From   </label>
												<input data-date-format="yyyy-mm-d" required type="date" name="from" class="datepicker_v form-control pull-right" value="{{$from }}">
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">To   </label>
												<input data-date-format="yyyy-mm-d" required type="date" name="to" class="datepicker_v form-control pull-right" value="{{$to }}">
											</div>
										</div>
									</div>
									<!-- /.box-body -->
									<center> <a href="{{url('/ento1_view') }}"><button type="button" class="btn btn-primary">Clear</button></a> <button type="submit" class="btn btn-primary">Filter</button></center>
									<br>
								</div>
								<!-- /.box -->
							</div>
						</form>






						<table id="ento2_table" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Action</th>
									<th style="min-width: 150px !important;">District lymphedema no </th>
									<th style="min-width: 150px !important;">Full Name of Patient</th>
									<th>Sex</th>
									<th style="min-width: 100px !important;">Date of Birth</th>
									<th>Age in completed Years</th>
									<th style="min-width: 150px !important;">Address</th>
									<th>Date of Registration</th>
									<th style="min-width: 150px !important;">Name of the doctor</th>
									<th>Date of first clinic attendance</th>
									<th style="min-width: 150px !important;">Clinical presentation to the clinic</th>
									<th style="min-width: 150px !important;">Affected part of body by lymphoedema</th>
									<th>Duration of lymphoedema</th>
									<th>Stage of lymphoedema</th>
									<th style="min-width: 150px !important;">Probable cause of lymphoedema</th>
									<th> History of acute attacks of dermatolymphangioadenitis during last 4 weeks</th>
									<th style="min-width: 150px !important;">Comorbidities</th>
									<th>History of microfilaria positivity</th>
									<th style="min-width: 320px !important;">If Yes to Q9, How was it diagnosed?</th>
									<th style="min-width: 150px !important;"> Past surgical history (If yes specify)</th>
									<th style="min-width: 150px !important;">Drug allergies* (If yes specify)</th>
									<th style="min-width: 150px !important;">Food allergies* (If yes specify)</th>
									<th style="min-width: 100px !important;">Remarks</th>
									<th style="min-width: 80px !important;">Next clinic date</th>


								</tr>
							</thead>
							<tbody> @foreach ($Viewdata as $data) <tr>
									<td>
										<a target="_blank" href="{{url('/viewData_patinMoDataReg') }}/{{ $data->id }}" class="btn btn-primary btn-sm">
											<i class="fa fa-eye"></i> View </a>

										<a target="_blank" href="{{url('/printData_patinMoDataReg') }}/{{ $data->id }}" class="btn btn-primary btn-sm">
											<i class="fa fa-eye"></i> Export </a>



										<a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/registration_mo_delete') }}/{{ $data->id }}" class="btn btn-danger btn-sm">
											<i class="fa fa-trash"></i> Delete </a>
									</td>

									<td>{{$data->district_lymphedema_no}}</td>
									<td>{{$data->full_name}}</td>
									<td>{{$data->gender}}</td>
									<td>{{$data->date_of_birth}}</td>
									<td>{{$data->age_in_completed}}</td>
									<td>{{$data->address}}</td>
									<td>{{$data->date_of_registration}}</td>
									<td>{{$data->name_of_docter}}</td>
									<td>{{$data->date_of_first_clinic_arrendance}}</td>
									<td>{{$data->clinical_presentatio}}</td>

									<td>{{ ($data->Leg_Left=='option1')? 'Leg Left':'' }}
										{{$data->Leg_Right=='option1' ? 'Leg Right <br>':''}} 
										{{$data->Arm_Left=='option1' ? 'Arm Left':''}}
										{{$data->Arm_Right=='option1' ? 'Arm Right <br>':''}} 

										{{$data->Breast_left=='Left' ? 'Breast left':''}}
										{{$data->Breast_right=='Right' ? 'Breast right <br>':''}}

										{{$data->scrotortum_left=='scrotortum_left' ? 'scrotortum left':''}}
										{{$data->scrotortum_right=='scrotortum_right <br>' ? 'scrotortum right':''}}

										{{$data->Penisleft=='Peni_left' ? 'Penis <br>':'' }} 
										{{$data->no_lymhedema_left=='option1' ? 'No Lymphoedema':''}}
									</td>

									<td>Months:-{{$data->duration_on_lymhodema_month}} <br>
										Years:-{{$data->duration_on_lymhodema_years}}
									</td>
									<td>

										@if($data->stage_1_Left=='option1'||$data->stage_1_right=='option2' )
										Stage I- {{$data->stage_1_Left=='option1' ? 'Left':'' }} {{$data->stage_1_right=='option2' ? 'Right':'' }} <br>
										@endif


										@if($data->stage_2_Left=='option1'||$data->stage_2_right=='option2' )
										Stage II- {{$data->stage_2_Left=='option1' ? 'Left':'' }} {{$data->stage_2_right=='option2' ? 'Right':'' }} <br>
										@endif


										@if($data->stage_3_Left=='option1'||$data->stage_3_right=='option2' )
										Stage III- {{$data->stage_3_Left=='option1' ? 'Left':'' }} {{$data->stage_3_right=='option2' ? 'Right':'' }} <br>
										@endif

										@if($data->stage_4_Left=='option1'||$data->stage_4_right=='option2' )
										Stage IV- {{$data->stage_4_Left=='option1' ? 'Left':'' }} {{$data->stage_4_right=='option2' ? 'Right':'' }} <br>
										@endif

										@if($data->stage_4_Left=='option1'||$data->stage_4_right=='option2' )
										Stage V- {{$data->stage_5_Left=='option1' ? 'Left':'' }} {{$data->stage_5_right=='option2' ? 'Right':'' }} <br>
										@endif
										@if($data->stage_4_Left=='option1'||$data->stage_4_right=='option2' )
										Stage VI- {{$data->stage_6_Left=='option1' ? 'Left':'' }} {{$data->stage_6_right=='option2' ? 'Right':'' }} <br>
										@endif

										@if($data->stage_4_Left=='option1'||$data->stage_4_right=='option2' )
										Stage VII- {{$data->stage_7Left=='option1' ? 'Left':'' }} {{$data->stage_7_right=='option2' ? 'Right':'' }} <br>
										@endif
									</td>
									<td>

										@if($data->probable_couse_filariasis=='Probable cause of lymphoedema')
										{{$data->probable_couse_filariasis=='Probable cause of lymphoedema' ? 'Filariasis':'' }}<br>
										@endif
										
										@if($data->probable_couse_filariasis_fat_positive=='Filariasis (FAT positive)')
										{{$data->probable_couse_filariasis_fat_positive=='Filariasis (FAT positive)' ? 'Filariasis (FAT positive)':'' }}<br>
										@endif

										@if($data->probable_couse__cellulitis=='Cellulitis')
										{{$data->probable_couse__cellulitis=='Cellulitis' ? 'Cellulitis':'' }}<br>
										@endif

										@if($data->probable_couse_recurrent_of_cellulists=='Recurrent attacks of cellulitis')
										{{$data->probable_couse_recurrent_of_cellulists=='Recurrent attacks of cellulitis' ? 'Recurrent attacks of cellulitis':'' }}<br>
										@endif


										@if($data->probable_couse_Skin_rash=='Skin rash')
										{{$data->probable_couse_Skin_rash=='Skin rash' ? 'Skin rash':'' }}<br>
										@endif


										

		                @if($data->probable_couse_Thrombotic_disease=='Thrombotic disease')
										{{$data->probable_couse_Thrombotic_disease=='Thrombotic disease' ? 'Thrombotic disease':'' }}<br>
                    @endif


										@if($data->probable_couse_Past_surgery=='Past surgery')
										{{$data->probable_couse_Past_surgery=='Past surgery' ? 'Past surgery':'' }}<br>
                    @endif



										@if($data->probable_couse_Trauma=='Trauma')
										{{$data->probable_couse_Trauma=='Trauma' ? 'Trauma':'' }}<br>
										@endif

										@if($data->probable_couse_Obesity=='Obesity')
										{{$data->probable_couse_Obesity=='Obesity' ? 'Obesity':'' }}<br>
										@endif

										@if($data->probable_couse_Heart_disease=='Heart disease')
										{{$data->probable_couse_Heart_disease=='Heart disease' ? 'Heart disease':'' }}<br>
										@endif


										@if($data->probable_couse_Renal_disease=='Renal_disease')
										{{$data->probable_couse_Renal_disease=='Renal_disease' ? 'Heart disease':'' }}<br>
										@endif

										@if($data->probable_couse_Renal_disease=='Renal_disease')
										{{$data->probable_couse_Liver_disease=='Liver disease' ? 'Liver disease':'' }}<br>
										@endif

										{{$data->probable_couse_other}}<br>
									</td>
									<td>{{$data->history_of_attacks_of_dermatoly=='yes' ? 'Yes':'' }}
										{{$data->history_of_attacks_of_dermatoly=='No' ? 'No':'' }}
										{{($data->history_of_attacks_of_dermatoly!='yes' and $data->history_of_attacks_of_dermatoly!='No') ?  'other:-'. $data->history_of_attacks_of_dermatoly :'' }}
									</td>
									<td>
										{{$data->comorbidities_diabetes=='Diabetes mellitus' ? 'Diabetes mellitus':'' }}<br>
										{{$data->comorbidities_Hypertension=='Hypertension' ? 'Hypertension':'' }}<br>
										{{$data->comorbidities_Ischemic=='Ischemic Heart Disease' ? 'Ischemic Heart Disease':'' }}<br>
										{{$data->comorbidities_renal=='Renal disease' ? 'Renal disease':'' }}<br>
										{{$data->comorbidities_liver=='Liver disease' ? 'Liver disease':'' }}<br>

										@if($data->comorbidities_other)
										Other:-{{$data->comorbidities_other }}
										@endif

									</td>
									<td>{{$data->history_of_microfilaria_positivity=='yes' ? 'Yes':'No' }} </td>
									<td>


										@if($data->night_blood_film_postive)
										Night blood film positive:- {{$data->night_blood_film_postive=='Wucheraria bancrofti' ? 'Wucheraria bancrofti':'' }}{{$data->night_blood_film_postive=='Brugia malayi' ? 'Brugia malayi':'' }}<br>
										@endif

										@if($data->antigen_postive)
										Antigen positive:- {{$data->antigen_postive=='Wucheraria bancrofti' ? 'Wucheraria bancrofti':'' }} {{$data->antigen_postive=='Brugia malayi' ? 'Brugia malayi':'' }}<br>
										@endif

										@if($data->antibody_positive)
										Antibody positive:- {{$data->antibody_positive=='Wucheraria bancrofti' ? 'Wucheraria bancrofti':'' }} {{$data->antibody_positive=='Brugia malayi' ? 'Brugia malayi':'' }}<br>
										@endif

										@if($data->not_diagonses_by_a_test)
										Not diagnosed by a test, but treated :-{{$data->not_diagonses_by_a_test=='Wucheraria bancrofti' ? '':'' }} {{$data->not_diagonses_by_a_test=='Brugia malayi' ? 'Brugia malayi':'' }}<br>
										@endif

									</td>
									<td>{{($data->past_surgical_history!='No' ||  $data->past_surgical_history =='yes') ? 'Yes'.$data->history_of_attacks_of_dermatoly :'No' }}</td>
									<td>{{($data->droug_allergies!='No' ||  $data->droug_allergies =='yes') ? 'Yes'.$data->droug_allergies_specify : 'No' }}</td>



									<td>{{($data->food_allergies!='No' ||  $data->food_allergies =='yes') ? 'Yes'.$data->food_allergies : 'No' }}</td>



									<td>{{$data->remarks}}</td>
									<td>{{$data->next_clinic_data}}</td>














								</tr> @endforeach </tbody>
							<tfoot>
								<thead>
									<tr>
										<th>Action</th>
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
										<th>Food allergies* (If yes specify)</th>
										<th>Remarks</th>
										<th>Next clinic date</th>


									</tr>
								</thead>
							</tfoot>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Content Wrapper. Contains page content -->


<style>
	td {
		text-align: left !important;
	}
</style>