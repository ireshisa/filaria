<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			View-Subsequent Visit
			<br>

		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Patient Data</a></li>
			<li class="active">View-Subsequent Visit </li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						@if(session()->has('message')) @if(session()->get('message')==true)
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4>
							Successfully Delete Your Record.
						</div>
						@endif @if(session()->get('message')==false)
						<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Failed!</h4>
							Failed Delete Your Record.
						</div>
						@endif @endif @if(session()->has('update')) @if(session()->get('update')==true)
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4>
							Successfully Update Your Record.
						</div>
						@endif @if(session()->get('update')==false)
						<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Failed!</h4>
							Failed Update Your Record.
						</div>
						@endif @endif





						<form method="get" action="{{url('/subsequent_view') }}">
							{{csrf_field() }}
							<div class="col-md-12">



								<!-- general form elements -->
								<div class="box box-primary mr-auto ml-auto">
									<div class="box-header with-border">
										<!-- <h3 class="box-title">Quick Example</h3> -->
									</div>
									<!-- /.box-header -->
									<!-- form start -->
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
									<th>NO#</th>
									<th>District lymphedema no </th>
									<th>Full Name of Patient</th>
									<th>Sex</th>
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
									<th>Morbidity management</th>

									<th>Remarks</th>
									<th>Date next clinic visit</th>


								</tr>
							</thead>
							<tbody>
								@foreach ($Viewdata as $data)
								<tr>
									<td>

										<a target="_blank" href="{{url('/viewData_psubsequent') }}/{{ $data->id }}" class="btn btn-primary btn-sm">
											<i class="fa fa-eye"></i> View
										</a>


										<a target="_blank" href="{{url('/printData_psubsequent') }}/{{ $data->id }}" class="btn btn-primary btn-sm">
											<i class="fa fa-eye"></i> Export
										</a>

										<a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_subsequent') }}/{{ $data->id }}" class="btn btn-danger btn-sm">
											<i class="fa fa-trash"></i> Delete
										</a>
									</td>
									<td>{{$data->id}}</td>
									<td>{{ $data->district_lymphedema_no }}</td>
									<td>{{ $data->full_name }}</td>
									<td>{{ $data->gender }}</td>
									<td>{{ $data->date_of_birth }}</td>
									<td>{{ $data->age_in_completed }}</td>
									<td>{{ $data->address }}</td>
									<td>{{ $data->date_of_registration }}</td>
									<td>{{$data->name_doctor}}</td>
									<td>{{ $data->date_of_first_clinic_arrendance}}</td>
									<td>
										{{ $data->Clinical_lymphedema_regular_clinic == 'yes' ? 'Lymphedema regular clinic follow up' : '' }} <br>
										{{ $data->Clinical_lymphedema_regular_clinic == 'No' ? 'Acute attack of dermatolymphangioadenitis' : '' }} <br>
										{{ $data->Clinical_lymphedema_regular_clinic == 'other' ? 'Other:-'. $data->Clinical_other_specify : ''}} <br>
									</td>
									<td>
										{{ $data->history_of_attacks_yes == 'yes' ? 'Yes' : 'NO' }}
										{{ $data->history_of_attacks_yes == 'Other' ? 'Other:-'.$data->history_of_attacks_of_dermatoly_other : '' }}

									</td>

									<td>
										@if($data->stage_1_Left=='option1' || $data->stage_1_right=='option2' )
										Stage I- {{$data->stage_1_Left=='option1' ? 'Left':'' }} {{$data->stage_1_right=='option2' ? 'Right':'' }} <br>
										@endif

										@if($data->stage_2_Left=='option1' || $data->stage_2_right=='option2' )
										Stage II- {{$data->stage_2_Left=='option1' ? 'Left':'' }} {{$data->stage_2_right=='option2' ? 'Right':'' }} <br>
										@endif


										@if($data->stage_3_Left=='option1' || $data->stage_3_right=='option2' )
										Stage III- {{$data->stage_3_Left=='option1' ? 'Left':'' }} {{$data->stage_3_right=='option2' ? 'Right':'' }} <br>
										@endif

										@if($data->stage_4_Left=='option1' || $data->stage_4_right=='option2' )
										Stage IV- {{$data->stage_4_Left=='option1' ? 'Left':'' }} {{$data->stage_4_right=='option2' ? 'Right':'' }} <br>
										@endif

										@if($data->stage_5_Left=='option1' || $data->stage_5_right=='option2' )
										Stage V- {{$data->stage_5_Left=='option1' ? 'Left':'' }} {{$data->stage_5_right=='option2' ? 'Right':'' }} <br>
										@endif

										@if($data->stage_6_Left=='option1' || $data->stage_6_right=='option2' )
										Stage VI- {{$data->stage_6_Left=='option1' ? 'Left':'' }} {{$data->stage_6_right=='option2' ? 'Right':'' }} <br>
										@endif

										@if($data->stage_7_Left=='option1' || $data->stage_7_right=='option2' )
										Stage VII- {{$data->stage_7Left=='option1' ? 'Left':'' }} {{$data->stage_7_right=='option2' ? 'Right':'' }} <br>
										@endif
									</td>







									<td style="min-width: 300px;">

										<?php $q = 0;  ?>
										@foreach ($data->TreatmentHistory_history as $ento5)

										{{ $ento5->name_of_drug }} {{ $ento5->Dosage }}{{ $ento5->Frequency }} {{ $ento5->Duration }},<br>

										@endforeach
									</td>










									<td>
										@if($data->skin_care_satisfactory!='' )
										Skin care:-
										{{ $data->skin_care_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
										{{ $data->skin_care_satisfactory == 'option2' ? 'Need improvement' : ''  }}
										{{ $data->skin_care_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>
										@endif

										@if($data->elavation_satisfactory!='' )
										Elevation:-
										{{ $data->elavation_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
										{{ $data->elavation_satisfactory == 'option2' ? 'Need improvement' : ''  }}
										{{ $data->elavation_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>
										@endif

										@if($data->movement_satisfactory!='' )
										Movement and exercise :-
										{{ $data->movement_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
										{{ $data->movement_satisfactory == 'option2' ? 'Need improvement' : ''  }}
										{{ $data->movement_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>
										@endif

										@if($data->bandaging_satisfactory!='' )
										Bandaging/ compression:-
										{{ $data->bandaging_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
										{{ $data->bandaging_satisfactory == 'option2' ? 'Need improvement' : ''  }}
										{{ $data->bandaging_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>
										@endif

										@if($data->foot_satisfactory!='' )
										Foot wear :-
										{{ $data->foot_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
										{{ $data->foot_satisfactory == 'option2' ? 'Need improvement' : ''  }}
										{{ $data->foot_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>
										@endif

										@if($data->phychological_satsfactory!='' )
										Psychological support:-
										{{ $data->phychological_satsfactory == 'option1' ? 'Satisfactory' : ''  }}
										{{ $data->phychological_satsfactory == 'option2' ? 'Need improvement' : ''  }}
										{{ $data->phychological_satsfactory == 'option3' ? 'Not satisfactory ' : ''  }} <br>
										@endif

										@if($data->screening_satisfactory!='' )
										Screening (DM/ family):-
										{{ $data->screening_satisfactory == 'option1' ? 'Satisfactory' : ''  }}
										{{ $data->screening_satisfactory == 'option2' ? 'Need improvement' : ''  }}
										{{ $data->screening_satisfactory == 'option3' ? 'Not satisfactory ' : ''  }}
										@endif
									</td>

									<td>
										{{$data->remarks}}
									</td>
									<td>{{$data->next_clinic_visit}}</td>



								</tr>

								@endforeach
							</tbody>
							<tfoot>
								<thead>
									<tr>
										<th>Action</th>
										<th>NO#</th>
										<th>District lymphedema no </th>
										<th>Full Name of Patient</th>
										<th>Gender</th>
										<th>Date of Birth</th>
										<th>Age in completed Years</th>
										<th>Address</th>
										<th>Date of Registration</th>
										<th>Name of the doctor</th>
										<th>Date of first clinic attendance</th>
										<th style="min-width:250px !important;">Clinical presentation to the clinic</th>
										<th>History of acute attacks of dermatolymphangioadenitis during last 4 weeks*</th>
										<th style="min-width:150px !important;">Stage of lymphoedema</th>
										<th>Treatment</th>

										<th style="min-width:250px !important;">Morbidity management</th>

										<th style="min-width:150px !important;">Remarks</th>
										<th style="min-width:100px !important;">Date next clinic visit</th>
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
<style>
	td {
		text-align: left !important;
	}
</style>