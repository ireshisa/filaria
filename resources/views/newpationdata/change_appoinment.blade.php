<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
		Change appinment FORM<br>
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Patient Data</a></li>
			<li class="active">Change appinment  FORM</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<!-- left column -->
			<form method="post" action="{{ url('/changeappoinment_update') }}">

				{{ csrf_field() }}
				<div class="col-md-12">
					@if (session()->has('message'))
					@if (session()->get('message') == true)
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Success!</h4>
						Successfully save your data.
					</div>
					@endif
					@if (session()->get('message') == false)
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Failed!</h4>
						Failed save your data.
					</div>
					@endif
					@endif


					<div class="box box-primary">
						<div class="box-header with-border">

						</div>

						<div class="box-body" style="overflow: hidden;">
							<div class="col-md-10" style="left: 50%;
transform: translateX(-50%);">

                <div class="form-group">
									<label for="exampleInputEmail1">OPD No</label>
									<input list="opd" name="opd_no" id="inputopd" required class="form-control" onkeyup="onInputchange()">
									<datalist id="opd">
										@foreach($opd as $opdnum)
										<option value="{{ $opdnum->opd_no }}">
											@endforeach
									</datalist>
								</div>


								<div class="form-group">
									<label for="exampleInputEmail1">Current Appoinment</label>
									<input type="text" readonly id="current_appoinment" class="form-control">
								</div>

								<div class="form-group">
									<label for="exampleInputEmail1">Registration Date</label>
									<input type="text" readonly id="date_of_registration" class="form-control">
								</div>




								<div class="form-group">
									<label for="exampleInputEmail1">District lymphedema no</label>
									<input type="text" name="district_le_no" readonly id="district_le_no" class="form-control">
								</div>



				

								<div class="form-group">
									<label for="exampleInputEmail1">Patent name</label>
									<input type="text" readonly id="name" class="form-control">
								</div>



								<div class="form-group">
									<label for="exampleInputEmail1">New Appoinment Date</label>
									<input type="date" name="next_appoinment"  id="district_lymphedema_no" class="form-control">
								</div>




								<div class="box-footer">
									<center>
										<button type="submit" class="btn btn-primary">Submit</button>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
				<style>
					.totalth {
						white-space: nowrap;
						vertical-align: middle;
						background-color: #d58312;
						border-color: #ffffff;
						color: #fff;
						border: 1px solid #ad701c !important;
					}



					th {
						white-space: nowrap;
						vertical-align: middle;
						background-color: #3c8dbc;
						border-color: #367fa9;
						color: #fff;
						border: 1px solid #00a8c1 !important;
					}

					td {
						border: 1px solid #00a8c1 !important;
					}

					.table-bordered>thead>tr>th {
						border: 1px solid #00a8c1 !important;
					}

					.form-control {
						padding: 2px !important;
					}

					.ther {
						position: sticky !important;
						top: 0;
					}

					th,
					td {
						text-align: center !important;
						vertical-align: middle !important;
					}
				</style>
			</form>
		</div>
	</section>
</div>