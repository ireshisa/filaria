<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ENTO 5 FORM
            <br>
            <small>(To be filled for all fields) </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ENTO 5</a></li>
            <li class="active">ENTO 5 FORM</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/ento5_save') }}">

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
        <label for="exampleInputEmail1">Form List</label>

        <select name="main_form_type" id="main_form_type" class="form-control" onchange="getEntoFrom(this.value)">
            <option value="">Select</option>
            <option value="ento_01">ENTO/01</option>
            <option value="ento_02">ENTO/02</option>
            <option value="ento_03">ENTO/03</option>
            <option value="ento_04">ENTO/04</option>
        </select>

    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Ento from ID</label>
        <select name="main_form_id" class="form-control" id="id_list" onchange="formIdChange(this.value)" required>
            <option value="">Select</option>
        </select>
    </div>
 
    <div class="form-group" id="no_of_cpq">
      {{--   <label for="exampleInputPassword1">No of Cpq</label>
        <input type="number" value="0" required pattern="^\d*(\.\d{0,2})?$" name="no_of_cpq"  class="form-control" > --}}
    </div>

    <div class="form-group" id="total_cx_sp_div">
        <label for="exampleInputPassword1">Total no of Cx quin collected </label>
        <input type="number" value="0" required pattern="^\d*(\.\d{0,2})?$"  name="total_cx_quin_mosq"  id="total_cx_quin_mosq" class="form-control">
    </div>

    <div class="form-group" id ="total_mansonia_sp_div">
        <label for="exampleInputPassword1">Total no of  Mansonia species collected </label>
        <input type="number" value="0" required pattern="^\d*(\.\d{0,2})?$"  name="total_mansonia_sp"  id="total_mansonia_sp" class="form-control">
    </div>
    <div id='display_none'>
        <div class="form-group">
            <label for="exampleInputPassword1">Man hrs spent  </label>
            <input type="text" value="0" required   name="man_hrs_spent" id="man_hrs_spent" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Catch per man hr </label>
            <input type="text" value="0" required name="catch_per_mh" id="catch_per_mh" class="form-control">
        </div>
    </div>
</div>

 <div class="col-md-6" id="display_none2">

<div class="form-group">
    <label for="exampleInputPassword1">Furniture & fittings</label>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputPassword1">Mansonia</label>
            <input value="0" type="Number"  name="furniture_and_fittings_mansonia" id="furniture_and_fittings_mansonia" class="form-control"  />
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1">Culex quin</label>
            <input value="0" type="number"  name="furniture_and_fittings" id="furniture_and_fittings" class="form-control"  />
        </div>
    </div>
</div>



<div class="form-group">
    <label for="exampleInputPassword1">Cloths & hangings</label>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputPassword1">Mansonia</label>
            <input value="0" type="Number"  name="clothes_and_hang_mansonia" class="form-control" id="clothes_and_hang_mansonia"  />
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1">Culex quin</label>
            <input value="0" type="number"  name="clothes_and_hang" class="form-control" id="clothes_and_hang"  />
        </div>
    </div>
</div>


<div class="form-group">
    <label for="exampleInputPassword1">Bed nets</label>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputPassword1">Mansonia</label>
            <input value="0" type="Number"  name="bed_nets_mansonia" class="form-control" id="bed_nets_mansonia"  />
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1">Culex quin</label>
            <input value="0" type="number"  name="bed_nets" class="form-control" id="bed_nets"  />
        </div>
    </div>
</div>


<div class="form-group">
    <label for="exampleInputPassword1">Walls </label>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputPassword1">Mansonia</label>
            <input value="0" type="Number"  name="walls_mansonia" class="form-control" id="walls_mansonia"  />
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1">Culex quin</label>
            <input value="0" type="number"  name="walls" class="form-control" id="walls"  />
        </div>
    </div>
</div>


<div class="form-group">
    <label for="exampleInputPassword1">Electronic appliances</label>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputPassword1">Mansonia</label>
            <input value="0" type="Number"  name="electronic_mansonia" class="form-control" id="electronic_mansonia"  />
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1">Culex quin</label>
            <input value="0" type="number"  name="electronic" class="form-control" id="electronic"  />
        </div>
    </div>
</div>


<div class="form-group">
    <label for="exampleInputPassword1">Others (if specify)</label>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputPassword1">Mansonia</label>
            <input value="0" type="number"  name="others_mansonia" class="form-control" id="others_mansonia"  />
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1">Culex quin</label>
            <input value="0" type="number"  name="others" class="form-control" id="others"  />
        </div>
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
