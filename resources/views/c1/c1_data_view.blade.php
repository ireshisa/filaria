<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        MORBIDITY DATA FORM 2 VIEW (C2 FORM)
            <br>
            <small>list follow view all data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">C</a></li>
            <li class="active">  MORBIDITY DATA FORM 2 VIEW (C2 FORM))</li>
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
                        @if(session()->has('message'))
                            @if(session()->get('message')==true)
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                                    Successfully Delete Your Record.
                                </div>
                            @endif
                            @if(session()->get('message')==false)
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                                    Failed Delete Your Record.
                                </div>
                            @endif
                        @endif
                        @if(session()->has('update'))
                            @if(session()->get('update')==true)
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                                    Successfully Update Your Record.
                                </div>
                            @endif
                            @if(session()->get('update')==false)
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                                    Failed Update Your Record.
                                </div>
                            @endif
                        @endif
                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>C&nbsp;Data ID</th>
                                <th title="Name of the Clinic">Clinic Name</th>
                                <th title="No of Clinic Sessions"> Sessions</th>
                                <th title="3.1 No Presented ed without acute attacks"> without acute attacks</th>
                                <th title="3.2 No Presented ed with acute attacks"> with acute attacks</th>
                                <th title="3.3 No Had a H/O acute attack within last 4 weeks ">attack within last 4</th>
                                <th title="4.1 No pres ented without acute attacks ">pres ented without acute</th>
                                <th title="4.2 No Presented with acute attacks ">Presented with acute</th>
                                <th title="4.3 No had a H/O acute attack within last 4 weeks "> H/O acute attack within last 4  </th>
                                
                                <th title="No Presented with hydrocele/TPE "> hydrocele/TPE  </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($c1_data_list as $c1)
                                <tr>
                                    <td>{{ $c1->c1_dataid }}</td>
                                    <td>{{ $c1->name_clinic }}</td>
                                    <td>{{ $c1->no_clinic }}</td>
                                    <td>{{ $c1->no_3_1 }}</td>
                                    <td>{{ $c1->no_3_2 }}</td>
                                    <td>{{ $c1->no_3_3 }}</td>
                                    <td>{{ $c1->no_4_1 }}</td>
                                    <td>{{ $c1->no_4_2 }}</td>
                                    <td>{{ $c1->no_4_3 }}</td>
                                    <!-- <td>{{ $c1->total_nm_5 }}</td> -->
                                    <td>{{ $c1->No_presented_TPE }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-id="{{ $c1->c1_dataid }}"
                                                data-target="#editModal2{{$c1->c1_dataid}}"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i>
                                            <strong>Edit</strong></button>
                                        <a onclick="return confirm('Are you sure Delete this record?')"
                                           href="{{url('/delete_c1_data') }}/{{ $c1->c1_dataid }}"
                                           class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <div id="editModal2{{$c1->c1_dataid}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT C DATA</h4><br>
                                            </div>
                                            <form method="post" action="{{url('/c1_data_update ') }}">
                                                {{csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="c1_dataid" value="{{$c1->c1_dataid}}"
                                                               class="form-control">
                                                  


                                                               <div class="form-group">
                                <label for="exampleInputEmail1">District</label>
                                 <select name="district" class="form-control" required>
                                        <option value="">Select</option>
                                        @if(Auth::user()->role !== "ADMIN" & Auth::user()->role !== "AFC")
<option {{ $c1->district== Auth::user()->district?"selected":"" }}  value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
                                            
                                        @else
                                            @foreach ($district_list as $dis)
<option {{ $c1->district==$dis->district?"selected":"" }}  value="{{ $dis->district }}">{{ $dis->district }}</option>
                                            @endforeach
                                        @endif
                                    </select> 
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                <input  value="{{ $c1->year }}" type="text" name="year" class="form-control" required> 
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Month </label>
                                <select name="month" class="form-control" required>
                                        <option  value="">Select Month</option>
                                        <option {{ $c1->month=='January' ?"selected":"" }}  value="January">January</option>
                                        <option {{ $c1->month=='February' ?"selected":"" }}  value="February">February</option>
                                        <option {{ $c1->month=='March' ?"selected":"" }}  value="March">March</option>
                                        <option {{ $c1->month=='April' ?"selected":"" }}  value="April">April</option>
                                        <option {{ $c1->month=='May' ?"selected":"" }}  value="May">May</option>
                                        <option {{ $c1->month=='June' ?"selected":"" }}  value="June">June</option>
                                        <option {{ $c1->month=='July' ?"selected":"" }}  value="July">July</option>
                                        <option {{ $c1->month=='August' ?"selected":"" }}  value="August">August</option>
                                        <option {{ $c1->month=='September' ?"selected":"" }}  value="September">September</option>
                                        <option {{ $c1->month=='October' ?"selected":"" }}  value="October">October</option>
                                        <option {{ $c1->month=='November' ?"selected":"" }}  value="November">November</option>
                                        <option {{ $c1->month=='December' ?"selected":"" }}  value="December">December</option>
                                    </select>
                            </div>


                          <div class="form-group">
                                <label for="exampleInputPassword1">Date</label>
                                <input type="number" name="date" value="{{ $c1->date}}" class="form-control" required>
                            </div>




















                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Name of the
                                                                clinic</label>
                                                            <input value="{{ $c1->name_clinic }}" type="text"
                                                                   name="name_clinic" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No of clinic
                                                                Sessions</label>
                                                            <input value="{{ $c1->no_clinic }}" type="text"
                                                                   name="no_clinic" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No presented
                                                                without acute attacks  
                                                            </label>
                                                            <input value="{{ $c1->no_3_1 }}" type="text"
                                                                   name="no_3_1" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No presented  with acute attacks</label>
                                                            <input value="{{ $c1->no_3_2 }}" type="text"
                                                                   name="no_3_2" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1"> No had a H/O acute
                                                                attack within last 4
                                                                weeks</label>
                                                            <input value="{{ $c1->no_3_3 }}" type="text"
                                                                   name="no_3_3" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No pres ented without
                                                                acute attacks</label>
                                                            <input value="{{ $c1->no_4_1 }}" type="text"
                                                                   name="no_4_1" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No Presented with
                                                                acute attacks</label>
                                                            <input value="{{ $c1->no_4_2 }}" type="text"
                                                                   name="no_4_2" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No had a H/O acute
                                                                attack within last 4
                                                                weeks</label>
                                                            <input value="{{ $c1->no_4_3 }}" type="text"
                                                                   name="no_4_3" class="form-control" >
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label for="exampleInputPassword1">Total number of lympheod
                                                                ema patients
                                                                treated </label>
                                                            <input value="{{ $c1->total_nm_5 }}" type="text"
                                                                   name="total_nm_5" class="form-control" >
                                                        </div> -->
                                                        
                                                        
                                                        
                                                        
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No Presented with Hydrocele </label>
                                                            <input value="{{ $c1->No_presented_hydrocele }}"type="text" name="No_presented_hydrocele"class="form-control">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No Presented with TPE </label>
                                                            <input value="{{ $c1->No_presented_TPE }}"type="text" name="No_presented_TPE" class="form-control">
                                                        </div>






                                                              <div class="form-group">
                                                            <label for="exampleInputPassword1">No. of suspected dirofilaria cases</label>

                        <input value="{{ $c1->No_dirofilaria_cases }}" type="text" name="No_dirofilaria_cases" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning"
                                                            data-dismiss="modal">Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                            <tfoot>
                            <th>C&nbsp;Data ID</th>
                                <th title="Name of the Clinic">Clinic Name</th>
                                <th title="No of Clinic Sessions"> Sessions</th>
                                <th title="3.1 No Presented ed without acute attacks"> without acute attacks</th>
                                <th title="3.2 No Presented ed with acute attacks"> with acute attacks</th>
                                <th title="3.3 No Had a H/O acute attack within last 4 weeks ">attack within last 4</th>
                                <th title="4.1 No pres ented without acute attacks ">pres ented without acute</th>
                                <th title="4.2 No Presented with acute attacks ">Presented with acute</th>
                                <th title="4.3 No had a H/O acute attack within last 4 weeks "> H/O acute attack within last 4  </th>
                           
                                <th title="No Presented with hydrocele/TPE "> hydrocele/TPE  </th>
                                <th>Action</th>
                                <th> </th>
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