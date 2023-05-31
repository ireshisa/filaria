<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ENTO 4 FORM<br>
            <small>HUMAN LANDING COLLECTIONS </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ENTO 4</a></li>
            <li class="active">ENTO 4 FORM</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/ento4_save') }}">

                {{csrf_field() }}
                <div class="col-md-12">
                    @if(session()->has('message'))
                        @if(session()->get('message')==true)
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-check"></i> Success!</h4>
                                Successfully save your data.
                            </div>
                        @endif
                        @if(session()->get('message')==false)
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
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
                                    <label for="exampleInputEmail1">District</label>

                                    <input type="text" name="district" class="form-control" >

{{-- <select name="district" class="form-control" onchange="getMoh(this.value)" required="">
    <option value="">Select</option>
    @if(Auth::user()->role!=="ADMIN" & Auth::user()->role !== "AFC")
    <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
    @else
    @foreach ($district_list as $dis)
    <option value="{{ $dis->district }}">{{ $dis->district }}</option>
    @endforeach
    @endif
</select> --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">MOH area</label>
                                    {{-- <select name="moh" class="form-control" id="moh_list" onchange="getPhi(this.value)">
                                        <option value="">Select</option>
                                    </select> --}}
                                     <input type="text" name="moh" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PHM area </label>
                                    <input type="text" name="phi" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">GN division</label>
                                    <input type="text" name="gn_division" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Locality/ Address </label>
                                    <input type="text"  name="locality" class="form-control">
                                </div>


                                   <div class="form-group">
                                      <label for="exampleInputPassword1">GPS latitude</label>
                                      <input type="text"  name="gps_lat" class="form-control">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">GPS longitude</label>
                                      <input type="text"  name="gps_long" class="form-control">
                                  </div>

                                  
                    <div class="form-group">
                        <label for="exampleInputPassword1">Date </label>
                        <input data-date-format="yyyy-mm-d" type="date" name="date_of_collection" class="datepicker_v form-control pull-right">
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
