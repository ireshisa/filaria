<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ENTO 1 DATA FORM<br>
        <small>(To be filled for all fields) </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ENTO 1DATA </a></li>
            <li class="active">ENTO 1 DATA FORM</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form method="post" action="{{url('/ento1_data_save') }}">
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
                                    <label for="exampleInputEmail1">Ento1 ID</label>
                                    <select required name="ento_01_id" class="form-control">
                                        {{$first=true}}
                                        @foreach ($ento1_list as $list)
                                        <option value="{{ $list->ento_01_id }}">{{$first==true?"Last entered ID":""}}
                                        {{ $list->ento_01_id }} </option>
                                        {{$first==true?$first=false:$first=false}}
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Serial no</label>
                                    <input type="text"  name="ser_no" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">House no and address</label>
                                    <input type="text" name="house_no" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of Mansonia species</label>
                                    <input type="number"  value="0" name="no_of_mosq" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of Culex quin species</label>
                                    <input type="number" value="0"  name="no_of_culex" class="form-control">
                                </div>
                                {{-- removed by 1/27/2012 desidesd to devided to 3  --}}
                                {{--      <div class="form-group">
                                    <label for="exampleInputPassword1"> No of other mosquito species</label>
                                    <input type="number"  name="no_of_other" class="form-control">
                                </div>
                                --}}
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> No of Anopheles species</label>
                                    <input type="number" value="0"  name="anopheles" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> No of Aedes species</label>
                                    <input type="number" value="0"  name="andes" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> No of Armigeres species</label>
                                    <input type="number"  value="0" name="armigerous" class="form-control">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Furniture & fittings</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia</label>
                                            <input type="number"  value="0" name="resting_place_1_mansonia" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Culex quin</label>
                                            <input type="number"  value="0" name="resting_place_1" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Cloths & hangings</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia</label>
                                            <input type="number" value="0"  name="resting_place_2_mansonia" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Culex quin</label>
                                            <input type="number" value="0"  name="resting_place_2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bed nets</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia</label>
                                            <input type="number"  value="0" name="resting_place_3_mansonia" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Culex quin</label>
                                            <input type="number"  value="0" name="resting_place_3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Walls</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia</label>
                                            <input type="number" value="0" name="resting_place_4_mansonia" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Culex quin</label>
                                            <input type="number" value="0" name="resting_place_4" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Electronic appliances</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia</label>
                                            <input type="number"  value="0" name="resting_place_5_mansonia" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Culex quin</label>
                                            <input type="number"  value="0" name="resting_place_5" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Others (if specify)</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia</label>
                                            <input type="number"  value="0" name="resting_place_6_mansonia" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Culex quin</label>
                                            <input type="number"  value="0" name="resting_place_6" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of infected mosquitoes </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia</label>
                                            <input type="number"  value="0" name="lab_positive_man" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Culex quin</label>
                                            <input type="number"  value="0" name="lab_positive" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of infective mosquitoes</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia</label>
                                            <input type="number"  value="0" name="lab_no_man" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Culex quin</label>
                                            <input type="number"  value="0" name="lab_no" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">GPS latitude</label>
                                    <input type="text"  name="gps_lat" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">GPS longitude</label>
                                    <input type="text"  name="gps_long" class="form-control">
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
<!-- /.content-wrapper