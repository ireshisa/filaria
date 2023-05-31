<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> 
            
        MORBIDITY DATA FORM 2 (C2 FORM)<br>
            <small>(To be filled for all fields) </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">C </a></li>
            <li class="active">MORBIDITY DATA FORM 2 (C2 FORM)</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/c1_data_save') }}">

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



<!-- 



                                <div class="form-group">
                                    <label for="exampleInputEmail1">Clinic Identification Number </label>
                                    <select name="c1_ID" class="form-control">
                                        {{$first=true}}
                                        @foreach ($c1_list as $list)
                                            <option value="{{ $list->c1_id }}">{{$first==true?"Last entered ID":""}} {{ $list->c1_id }} </option>
                                            {{$first==true?$first=false:$first=false}}
                                        @endforeach
                                    </select>
                                </div> -->



                                <div class="form-group">
                                <label for="exampleInputEmail1">District</label>
                                 <select name="district" class="form-control" required>
                                        <option value="">Select</option>
                                        @if(Auth::user()->role !== "ADMIN" & Auth::user()->role !== "AFC")
                                            <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
                                        @else
                                            @foreach ($district_list as $dis)
                                                <option value="{{ $dis->district }}">{{ $dis->district }}</option>
                                            @endforeach
                                        @endif
                                    </select> 
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="text" name="year" class="form-control" required> 
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Month </label>
                                <select name="month" class="form-control" required>
                                        <option value="">Select Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                            </div>


                          <div class="form-group">
                                <label for="exampleInputPassword1">Date</label>
                                <input type="number" name="date" class="form-control" required>
                            </div>









                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the clinic</label>
                                    <input type="text" name="name_clinic" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of clinic Sessions</label>
                                    <input type="number" name="no_clinic" class="form-control" required>
                                </div>
                                <br>
                                <h3>First Visit</h3>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No presented without acute attacks  
                                    </label>
                                    <input type="number" name="no_3_1" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No presented  with acute attacks</label>
                                    <input type="number" name="no_3_2" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No had a H/O acute attack within last 4
                                        weeks</label>
                                    <input type="number" name="no_3_3" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <h3>Subsequent Visit</h3>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No presented without acute attacks</label>
                                    <input type="number" name="no_4_1" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No presented with acute attacks</label>
                                    <input type="number" name="no_4_2" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No had a H/O acute attack within last 4
                                        weeks</label>
                                    <input type="number" name="no_4_3" class="form-control" required>
                                </div>
                                


                                <div class="form-group hide">
                                    <label for="exampleInputPassword1"> Total number of lympheod ema patients
                                        treated </label>
                                    <input type="number" name="total_nm_5" class="form-control" >
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> No presented with hydrocele </label>
                                    <input type="number" name="No_presented_hydrocele" class="form-control" required>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No presented with TPE </label>
                                    <input type="number" name="No_presented_TPE" class="form-control" required>
                                </div>

                                
                                


                                  <div class="form-group">
                                    <label for="exampleInputPassword1"> No of suspected dirofilaria cases </label>
                                    <input type="number" name="No_dirofilaria_cases" class="form-control" required>
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