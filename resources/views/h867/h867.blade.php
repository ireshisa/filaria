<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            H 867 FORM<br>
            <small>(To be filled for all fields) </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">H 867</a></li>
            <li class="active">H 867 FORM</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/h867_save') }}">

                {{csrf_field() }}
                <div class="col-md-12">
                    @if(session()->has('message'))
                    @if(session()->get('message')==true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        Successfully save your data.
                    </div>
                    @endif
                    @if(session()->get('message')==false)
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                        Failed save your data.
                    </div>
                    @endif
                    @endif

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
                                    <label for="exampleInputPassword1"> Mode of collection</label>
                                    <select name="group_number" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1-C">1-C</option>
                                        <option value="2-R">2-R</option>
                                        <option value="3-I">3-I</option>
                                        <option value="4-S">4-S</option>
                                        <option value="5-P">5-P</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Code No </label>
                                    <input type="text" name="code_no" class="form-control">
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Name and Designation of PHI / PHFO</label>
                                    <input type="text" name="phi_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> District</label>

                                    <input type="text" name="district" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> MOH Area</label>
                                    <input type="text" name="moh_area" class="form-control">

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1"> PHM </label>
                                    <input type="text" name="phm_area" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">PHI  </label>
                                    <input type="text" name="phi_area" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> GN Area</label>
                                    <input type="text" name="town_village" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> PHI/PHFO Annual Serial Number</label>
                                    <input type="text" name="phi_serial" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Laboratory Reference No</label>
                                    <input type="text" name="laboratory_no" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Date of blood filming</label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="date_of_blood" class="datepicker_v form-control pull-right">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <h4> SUMMARY</h4>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Town or Village </label>
                                    <input type="text" name="town_or_village" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Street of locality</label>
                                    <input type="text" name="street_of_locality" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> No of blood slides sent </label>
                                    <input type="number" name="no_of_films" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> No of blood slides examined </label>
                                    <input type="number" name="no_examined" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> No of blood slides positive </label>
                                    <input type="number" name="no_positive" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Name of PHLT examined </label>
                                    <input type="text" name="to_phi" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Date of examination</label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="date" class="datepicker_v form-control pull-right">
                                </div>

                                <div class="form-group hide">
                                    <label for="exampleInputPassword1"> Director.anti-filariasis campaign </label>
                                    <input type="text" name="director_campain" class="form-control">
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