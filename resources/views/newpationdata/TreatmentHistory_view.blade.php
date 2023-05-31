<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1> View-Clinical Management <br>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Prescription Data </a></li>
			<li class="active">View-Clinical Management</li>
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



						<form method="get" action="{{url('/treatment_view') }}">
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
									<th style="min-width:150px !important;">District lymphedema no </th>
									<th style="min-width:150px !important;">Full Name of Patient</th>
									<th>Sex</th>
									<th style="min-width:100px !important;">Date of Birth</th>
									<th>Age in completed Years</th>
									<th style="min-width:150px !important;">Address</th>
									<th>Date of Registration</th>
									<th style="min-width:150px !important;">Body Mass Index</th>
									<th style="min-width:150px !important;">Treatment</th>
									<th style="min-width:150px !important;">Morbidity management advice</th>
									<th style="min-width:150px !important;">Remarks</th>


								</tr>
							</thead>
							<tbody> @foreach ($Viewdata as $data) <tr>
									<td>
										<a target="_blank" href="{{url('/treatment_view_one') }}/{{ $data->id }}" class="btn btn-primary btn-sm">
											<i class="fa fa-eye"></i> View </a>


										<a target="_blank" href="{{url('/treatment_export_one') }}/{{ $data->id }}" class="btn btn-primary btn-sm">
											<i class="fa fa-eye"></i> Export </a>




										<a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/treatment_delete') }}/{{ $data->id }}" class="btn btn-danger btn-sm">
											<i class="fa fa-trash"></i> Delete </a>
									</td>

									<td>{{ $data->district_lymphedema_no }}</td>
									<td>{{ $data->full_name }}</td>
									<td>{{ $data->gender }}</td>
									<td>{{ $data->date_of_birth }}</td>
									<td>{{ $data->age_in_completed }}</td>
									<td>{{ $data->address }}</td>
									<td>{{ $data->date_of_registration }}</th>
									<td> {{ $data->bmi}}</td>

									<td style="min-width: 300px;">

										<?php $q = 0;  ?>
										@foreach ($data->TreatmentHistory_dates as $ento5)

										{{ $ento5->name_of_drug }} {{ $ento5->Dosage }}{{ $ento5->Frequency }} {{ $ento5->Duration }},<br>

										@endforeach
									</td>

									<td>
										@if($data->skin_care)
										Skin care:- {{ $data->skin_care == 'option1' ? 'Yes' : '' }} {{ $data->skin_care == 'option2' ? 'No' : '' }} <br>
										@endif

										@if($data->elvation)
										Elevation:- {{ $data->elvation == 'option1' ? 'Yes' : '' }} {{ $data->elvation == 'option2' ? 'No' : '' }} <br>
										@endif

										@if($data->movement_and_exercise)
										Movement and exercise:- {{ $data->movement_and_exercise == 'option1' ? 'Yes' : '' }} {{ $data->movement_and_exercise == 'option2' ? 'No' : '' }} <br>
										@endif

										@if($data->bandaging)
										Bandaging/ compression:- {{ $data->bandaging == 'option1' ? 'Yes' : '' }} {{ $data->bandaging == 'option2' ? 'No' : '' }}<br>
										@endif

										@if($data->foot_wear)
										Foot wear:- {{ $data->foot_wear == 'option1' ? 'Yes' : '' }} {{ $data->foot_wear == 'option2' ? 'NO' : '' }} <br>
										@endif



										@if($data->psychological)
										Psychological support:- {{ $data->psychological == 'option1' ? 'Yes' : '' }} {{ $data->psychological == 'option2' ? 'NO' : '' }} <br>
										@endif

										@if($data->screening)
										Screening (DM/ family):- {{ $data->screening == 'option1' ? 'Yes' : '' }} {{ $data->screening == 'option2' ? 'No' : '' }}<br>
										@endif

									</td>
									<td>{{ $data->remarks}}</td>



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
										<th>Body Mass Index</th>
										<th>Treatment</th>
										<th>Morbidity management advice</th>
										<th>Remarks</th>


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