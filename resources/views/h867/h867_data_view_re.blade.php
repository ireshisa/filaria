<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            H 867 DATA VIEW
            <br />
            <small>list follow view all data</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li><a href="#">H 867</a></li>
            <li class="active">H 867 DATA VIEW</li>
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
                        <table id="list_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>F1 Form ID</th>
                                    <th title="Group NO">Mode of collection</th>
                                    <th title="Name">Name</th>
                                    <th title="Address (incldung ward,Street and assessment No)">Address</th>
                                    <th title="Age ">Age</th>
                                    <th title="Sex ">Sex</th>
                                    <th title="Reason for Blood Filming">Reason</th>
                                    <th title="Result of Blood Examination">Blood Examination</th>
                                    <th>Species</th>
                                    <th>Other</th>
                                    <th>MF count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($f1_data_list as $h867)
                                <tr>
                                    <td>{{ $h867->f1_form_id }}</td>
                                    <td>{{ $h867->no }}</td>
                                    <td>{{ $h867->phiname }}</td>
                                    <td>{{ $h867->address }}</td>
                                    <td>{{ $h867->age }}</td>
                                    <td>{{ $h867->sex }}</td>
                                    <td>{{ $h867->reason }}</td>
                                    <td>{{ $h867->result }}</td>
                                    <td>{{ $h867->Species }}</td>
                                    <td>{{ $h867->other }}</td>
                                    <td>{{ $h867->mfcount }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $h867->id }}" data-target="#editModal2{{$h867->id}}"><i class="fa fa-pencil" aria-hidden="true"></i> <strong>Edit</strong></button>
                                    </td>
                                </tr>
                                <div id="editModal2{{$h867->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT H867 DETAIL</h4>
                                                <br />
                                            </div>
                                            <form method="post" action="{{ url('/ ') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$h867->id}}" class="form-control" />

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">H 867 ID</label>
                                                            <select name="f1_form_id" class="form-control">
																@foreach ($h867_list as $list)
																<option {{ $h867->f1_form_id== $list->ID?"selected":"" }} value="{{ $list->ID }}">{{ $list->ID }} </option>
																@endforeach
															</select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Mode of collection </label>
                                                            <select name="no" class="form-control">
																<option {{ $h867->no=="1-C"?"selected":"" }} value="1-C">1-C</option>
																<option {{ $h867->no=="2-R"?"selected":"" }} value="2-R">2-R</option>
																<option {{ $h867->no=="3-I"?"selected":"" }} value="3-I">3-I</option>
																<option {{ $h867->no=="4-S"?"selected":"" }} value="4-S">4-S</option>
																<option {{ $h867->no=="5-P"?"selected":"" }} value="5-P">5-P</option>
															</select>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Name</label>
                                                            <input value="{{$h867->phiname}}" type="text" name="phiname" class="form-control"  />
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Address (incldung ward,Street and assessment no) </label>
                                                            <input value="{{$h867->address}}" type="text" name="address" class="form-control"  />
                                                        </div>









                                <div class="form-group">
                                     <label for="exampleInputPassword1">GPS Latitude </label>
                                    <input value="{{$h867->gps_lat}}" type="text" name="gps_lat" class="form-control" placeholder="ex :- 89.5565 ...">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">GPS Longitude </label>
                                    <input value="{{$h867->gps_long}}" type="text" name="gps_long" class="form-control" placeholder="ex :- 89.5565 ...">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> lab ref no </label>
                                    <input type="text" name="labref"   value="{{$h867->labref}}" class="form-control" >
                                </div>








                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Age </label>
                                                            <input value="{{$h867->age}}" type="number" name="age" class="form-control"  pattern="^\d*(\.\d{0,2})?$" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Sex </label>
                                                            <select name="sex" class="form-control">
																<option {{ $h867->sex=="Male"?"selected":"" }} value="Male">Male</option>
																<option {{ $h867->sex=="Female"?"selected":"" }} value="Female">Female</option>
															</select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Reason for blood filming</label>
                                                            <input value="{{$h867->reason}}" type="text" name="reason" class="form-control"  />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Result of blood film examination</label>
                                                            <select name="result" class="form-control" onchange="result_bloodChange(this.value)">
																<option {{ $h867->result=="Positive"?"selected":"" }} value="Positive">Positive</option>
																<option {{ $h867->result=="Negative"?"selected":"" }} value="Negative">Negative</option>
															</select>
                                                        </div>
                                                        <div id="checkData" style="display:{{ $h867->result==&quot;Positive&quot;?&quot;block&quot;:&quot;none&quot; }}">
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Species </label>
                                                                <select name="Species" class="form-control">
																	<option {{ $h867->Species=="W.bancrofti"?"selected":"" }} value="W.bancrofti">W.bancrofti</option>

																	<option {{ $h867->Species=="B.malayi"?"selected":"" }} value="B.malayi">B.malayi</option>
																</select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Other </label>
                                                                <input type="text" value="{{$h867->other}}" name="other" class="form-control"  />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">MF count</label>
                                                                <input type="number" value="{{$h867->mfcount}}" name="mfcount" class="form-control"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <th>F1 Form ID</th>
                                <th title="Group NO">Mode of collection</th>
                                <th title="Name">Name</th>
                                <th title="Address (incldung ward,Street and assessment No)">Address</th>
                                <th title="Age ">Age</th>
                                <th title="Sex ">Sex</th>
                                <th title="Reason for Blood Filming">Reason</th>
                                <th title="Result of Blood Examination">Blood Examination</th>
                                <th>Species</th>
                                <th>Other</th>
                                <th>MF count</th>
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
