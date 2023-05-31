<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ENTO 5 DISSECTION FORM<br>
            <small>(To be filled for all fields) </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ENTO 5</a></li>
            <li class="active">ENTO 5 DISSECTION FORM</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/ento_05_mosq_save') }}">

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
                            <!-- <h3>ENTO 5 MOSQUITO</h3> -->
                            <div class="col-md-6">
                                <hr>
                                <h3><b>ENTO 05 DISSECTION</b></h3>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ento 5 ID</label>
                                    <select name="ento_05_id" class="form-control" required>
                                        <option value="">Select Ento 5 Id</option>
                                        @foreach ($ento5_list as $list)
                                        <option value="{{ $list->ento_05_id }}">{{ $list->ento_05_id}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Dissected by</label>
                                    <input type="text" name="dissected_by" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Dissected  date</label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="dissected_by_date" class="datepicker_v form-control pull-right">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Examined by  </label>
                                    <input type="text" name="examined" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Examined date</label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="examined_date" class="datepicker_v form-control pull-right">
                                </div>
                                <div class="form-group hidden">
                                    <label for="exampleInputPassword1">Entered in data register by HEO</label>
                                    <input type="text" name="entered" class="form-control" >
                                </div>
                                <div class="form-group hidden">
                                    <label for="exampleInputPassword1">Entered date</label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="entered_date" class="datepicker_v form-control pull-right">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Species  </label>
                                    <select name="species" class="form-control">
                                        <option value="Cx quin"> Cx quin </option>
                                        <option value="Mansonia"> Mansonia </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Total mosquitoes</label>
                                    <input type="number" value="0" required name="total_mosqito" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Unfed </label>
                                    <input type="number" name="abdo_uf" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Fed  </label>
                                    <input type="number" name="abdo_f" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Semi gravid</label>
                                    <input type="number" name="abdo_sg" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">G</label>
                                    <input type="number" name="abdo_g" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Number spoiled</label>
                                    <input type="number" value="0" required name="no_of_spoiled" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> No of dissected mosquitoes </label>
                                    <input type="number" value="0" required name="no_of_dissected" class="form-control" >
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
