<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            H 867 DATA FORM<br />
            <small>(To be filled for all fields) </small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li><a href="#">H 867 </a></li>
            <li class="active">H 867 DATA FORM</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form method="post" action="{{ url('/h867_data_save') }}">
                {{ csrf_field() }}
                <div class="col-md-12">
                    @if(session()->has('message')) @if(session()->get('message')==true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        Successfully save your data.
                    </div>
                    @endif @if(session()->get('message')==false)
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                        Failed save your data.
                    </div>
                    @endif @endif

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title">Quick Example</h3> -->
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">H 867 ID</label>
                                    <select name="f1_form_id" class="form-control" required="" onchange="geth867From(this.value)">
										<option value="">Select</option>
										@foreach ($h867_list as $list)
										<option value="{{ $list->ID }}">{{ $list->ID }} </option>
										@endforeach
									</select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mode of collection </label>
                                    <select name="no" class="form-control" id="group_id">
										<option value="">Select</option>
										<option value="1-C">1-C</option>
										<option value="2-R">2-R</option>
										<option value="3-I">3-I</option>
										<option value="4-S">4-S</option>
										<option value="5-P">5-P</option>
									</select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text" name="phiname" class="form-control"  />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address ( including ward, street, assessment no) </label>
                                    <input type="text" name="address" class="form-control" />
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputPassword1">GPS Latitude </label>
                                    <input type="text" name="gps_lat" class="form-control" placeholder="ex :- 89.5565 ...">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">GPS Longitude </label>
                                    <input type="text" name="gps_long" class="form-control" placeholder="ex :- 89.5565 ...">
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1"> lab ref no </label>
                                    <input type="text" name="labref" class="form-control" >
                                </div>

                               





                                <div class="form-group">
                                    <label for="exampleInputPassword1">Age </label>
                                    <input type="Number" name="age" class="form-control"  pattern="^\d*(\.\d{0,2})?$" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sex </label>
                                    <select name="sex" class="form-control">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Reason for blood filming </label>
                                    <input type="text" name="reason" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Result of blood film examination </label>
                                    <select name="result" class="form-control" onchange="result_bloodChange(this.value)">
										{{--
										<option value="" disabled selected>select</option>
										--}}
										<option value="Negative" selected>Negative</option>
										<option value="Positive">Positive</option>
									</select>
                                </div>
                                <div id="checkData" style="display:none">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Species </label>
                                        <select name="Species" class="form-control">
											<option value="">select</option>
											<option value="W.bancrofti">W.bancrofti</option>
											<option value="B.malayi">B.malayi</option>
										</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Other </label>
                                        <input type="text" name="other" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">MF count</label>
                                        <input type="number" name="mfcount" class="form-control"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                    <!-- /.box -->
                </div>
            </form>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
