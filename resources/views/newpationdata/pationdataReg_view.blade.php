<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			View-New Patient Registration
			<br>
			<small>View-New Patient Registration all data</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Patient Data</a></li>
			<li class="active"> View-New Patient Registration data</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body" style="overflow: unset;">


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












						<form method="GET" action="{{url('/initial_registration_view') }}">
							<!-- {{csrf_field() }} -->
							<div class="col-md-12">



								<!-- general form elements -->
								<div class="box box-primary mr-auto ml-auto">
									<div class="box-header with-border">
										<!-- <h3 class="box-title">Quick Example</h3> -->
									</div>
									<!-- /.box-header -->
									<!-- form start -->
									<div class="box-body mr-auto ml-auto" style="overflow: hidden !important;">


										<div class="col-md-6 __web-inspector-hide-shortcut__">
											<div class="form-group">
												<label for="exampleInputPassword1">From   </label>
												<input data-date-format="yyyy-mm-d" required type="date" name="from" class="datepicker_v form-control pull-right" value="{{$from }}">
											</div>


										</div>

										<div class="col-md-6 __web-inspector-hide-shortcut__">
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
									<th>ID</th>
									<th>Date Of Registration</th>
									<th>District</th>
									<th style="min-width: 150px !important;">Name Of the clinic</th>
									<th style="min-width: 150px !important;">District serial number</th>
									<th style="min-width: 150px !important;">Name of Patient</th>
									<th>Sex</th>
									<th style="    min-width: 110px !important;">Date of Birth</th>
									<th>Age of the patient</th>
									<th>NIC number</th>
									<th>Civil Status</th>
									<th>Area of living?</th>
									<th>Type of residence</th>
									<th style="min-width: 150px !important;">Whom does the patient live with?</th>
									<th style="min-width: 200px !important;">Level of education</th>
									<th>Occupation category</th>
									<th style="min-width: 150px !important;">Contact numbers:</th>
									<th style="min-width: 150px !important;">Address</th>
									<th style="min-width: 150px !important;">MOH area</th>
									<th style="min-width: 150px !important;">PHM area</th>
									<th style="min-width: 150px !important;">Grama Niladari area </th>
									<th style="min-width: 150px !important;">Have you ever lived in an endemic area other than current residence</th>

								</tr>
							</thead>
							<tbody>
								@foreach ($Viewdata as $data)
								<tr style="font-weight: 500  !important;">
									<td>

										<a target="_blank" href="{{url('/viewData_patinDataReg') }}/{{ $data->id }}" class="btn btn-primary btn-sm">
											<i class="fa fa-eye"></i> View
										</a>
										<a target="_blank" href="{{url('/printData_patinDataReg') }}/{{ $data->id }}" class="btn btn-primary btn-sm">
											<i class="fa fa-eye"></i> Export
										</a>

										<a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_patinData') }}/{{ $data->id }}" class="btn btn-danger btn-sm">
											<i class="fa fa-trash"></i> Delete
										</a>
									</td>


									<td>{{$data->id}}</td>
									<td>{{$data->date_of_registration}}</td>
									<td>{{$data->district}}</td>
									<td>{{$data->name_of_clinic}}</td>
									<td>{{$data->district_lymphedema_no}}</td>
									<td>{{$data->name_of_patient}}</td>
									<td>{{$data->gender}}</td>
									<td>{{$data->date_of_birth}}</td>
									<td>{{$data->age_in_completed_years}}</td>
									<td>{{$data->nic_no}}</td>
									<td>{{$data->civil_status}}</td>
									<td>{{$data->area_of_living}}</td>
									<td>{{$data->residence}}</td>
									<td>{{$data->living}}</td>
									<td>{{$data->education}}</td>
									<td>{{$data->occupation}}</td>
									<td>{{$data->telephone_home}} <br>
										{{$data->telephone_mobile}} <br>
										{{$data->telephone_guardian}} <br>
									</td>
									<td>{{$data->address}}</td>
									<td>{{$data->moh}}</td>
									<td>{{$data->phm}}</td>
									<td>{{$data->gn_area}}</td>
									<td>{{$data->endemic_area_than_cuurent_residence}}</td>
								</tr>

								@endforeach
							</tbody>
							<tfoot>
								<thead>
									<tr>
										<th>Action</th>
										<th>ID</th>
										<th>Date Of Registration</th>
										<th>District</th>
										<th>Name Of the clinic</th>
										<th>District serial number</th>
										<th>Name of Patient</th>
										<th>Sex</th>
										<th>Date of Birth</th>
										<th>Age of the patient</th>
										<th>NIC number</th>
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
										<th>Grama Niladari area </th>
										<th>Have you ever lived in an endemic area other than current residence</th>

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
		font-weight: 500 !important;
	}

	#ento2_table_wrapper
	{
		height: 500px;
    OVERFLOW: scroll;
	}

</style>