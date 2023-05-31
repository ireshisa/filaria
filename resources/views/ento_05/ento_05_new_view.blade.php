<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Mosquito Dissection
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
			<li><a href="#">Entomological Data</a></li>
			<li class="active">Mosquito Dissectio VIEW</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<!-- <div class="box-header">
                        <h3 class="box-title">Hover Data Table</h3>
                    </div> -->
					<!-- /.box-header -->
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
						<table id="ento2_table" class="table table-bordered table-hover">
							<thead>
								<tr>

									<th>ID</th>
									<th>Form type</th>
									<th>Ento from ID</th>
									<th>Received by</th>
									<th>Dissected by</th>
									<th>Examined by  </th>
									<th>received date </th>
									<th>Dissected Date</th>
									<th>Examined Date</th>
									<th>Name & address </th>
									<th>Mosquito species  </th>

									<th>No dissected Mosquitos</th>
									<th>Type of parasite</th>
									<th>No of Mosquitos Positive</th>
									<th>Mosquito positive For L3</th>

									<th> Head Mf</th>
									<th> Head L1</th>
									<th> Head L2</th>
									<th> Head L3</th>

									<th> Thorax Mf</th>
									<th> Thorax L1</th>
									<th> Thorax L2</th>
									<th> Thorax L3</th>

									<th>Abdoman Mf</th>
									<th>Abdoman L1</th>
									<th>Abdoman L2</th>
									<th>Abdoman L3</th>
									<th>Remarks</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>
								@foreach ($ento5_list as $ento5)
								<tr>

									<td>{{ $ento5->ento_05_new_id }}</td>
									<td>{{ $ento5->main_form_type }}</td>
									<td>{{ $ento5->formid }}</td>
									<td>{{ $ento5->received_by }}</td>
									<td>{{ $ento5->dissected_by }}</td>
									<td>{{ $ento5->examined  }}</td>

									<td>{{ $ento5->received_by_date  }}</td>
									<td>{{ $ento5->dissected_by_date  }}</td>
									<td>{{ $ento5->examined_date  }}</td>
									<td>{{ $ento5->address }}</td>
									<td>{{ $ento5->species2 }}</td>
									<td>{{ $ento5->no_dissected_mosquitos }}</td>

									<td>{{ $ento5->type_of_parasite }} </td>
									<td>{{ $ento5->positive_mosq  }}</td>
									<td>{{ $ento5->mq_postive_for_l3  }}</td>

									<td>{{ $ento5->head_mf }}</td>
									<td>{{ $ento5->head_l1 }}</td>
									<td>{{ $ento5->head_l2 }}</td>
									<td>{{ $ento5->head_l3 }}</td>
									<td>{{ $ento5->thorax_mf }}</td>
									<td>{{ $ento5->thorax_l1 }}</td>
									<td>{{ $ento5->thorax_l2 }}</td>
									<td>{{ $ento5->thorax_l3 }}</td>
									<td>{{ $ento5->abdomen_mf }}</td>
									<td>{{ $ento5->abdomen_l1 }}</td>
									<td>{{ $ento5->abdomen_l2 }}</td>
									<td>{{ $ento5->abdomen_l3 }}</td>
									<td>{{ $ento5->remarks }} </td>












									<td>
										<a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/ento5_view_new_delete') }}/{{ $ento5->ento_05_new_id  }}" class="btn btn-danger btn-sm">
											<i class="fa fa-trash"></i> </a>

										<a href="{{url('/ento5_view_new') }}/{{ $ento5->main_form_type}}/{{ $ento5->main_form_id  }}" class="btn btn-success btn-sm">
											<i class="fa fa-eye" aria-hidden="true"></i>
											<strong>View</strong>
										</a>
									</td>
								</tr>


								@endforeach
							</tbody>
							<tfoot>
								<th>ID</th>
								<th>Form type</th>
								<th>Ento from ID</th>
								<th>Received by</th>
								<th>Dissected by</th>
								<th>Examined by  </th>
								<th>received date </th>
								<th>Dissected Date</th>
								<th>Examined Date</th>
								<th>Name & address </th>
								<th>Mosquito species  </th>
								<th>No dissected Mosquitos</th>
								<th>Type of parasite</th>
								<th>No of Mosquitos Positive</th>
								<th>Mosquito positive For L3</th>

							  	<th> Head Mf</th>
									<th> Head L1</th>
									<th> Head L2</th>
									<th> Head L3</th>

									<th> Thorax Mf</th>
									<th> Thorax L1</th>
									<th> Thorax L2</th>
									<th> Thorax L3</th>

									<th>Abdoman Mf</th>
									<th>Abdoman L1</th>
									<th>Abdoman L2</th>
									<th>Abdoman L3</th>
									<th>Remarks</th>


								<th>Action</th>
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