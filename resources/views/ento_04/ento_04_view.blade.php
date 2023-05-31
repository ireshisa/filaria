<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Human landing Night Collection


        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li><a href="#">Entomological Data</a></li>
            <li class="active"> Human landing Night Collection  VIEW</li>
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
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                &times;
                            </button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Delete Your Record.
                        </div>
                        @endif @if(session()->get('message')==false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                &times;
                            </button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Delete Your Record.
                        </div>
                        @endif @endif @if(session()->has('update')) @if(session()->get('update')==true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                &times;
                            </button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Update Your Record.
                        </div>
                        @endif @if(session()->get('update')==false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                &times;
                            </button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Update Your Record.
                        </div>
                        @endif @endif

                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>ID</th>
                                    <th>Date of Collection</th>
                                    <th>District</th>
                                    <th>MOH area</th>
                                    <th>PHM area</th>
                                    <th>GN division</th>
                                    <th>Locality/ Address</th>
                                    <th>longitude</th>
                                    <th>latitude</th>




                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ento4_list as $ento4)
                                <tr>
                                    <td>
                                        <a href="{{ url('/newgetEntoIndoorData') }}/{{ $ento4->ento_04_id }}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> View </a>
                                        <a href="{{ url('/newgetEntoIndoorData_print') }}/{{ $ento4->ento_04_id }}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Print </a>
                                        <a href="{{ url('/newgetEntoIndoorData_excel') }}/{{ $ento4->ento_04_id }}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Excel </a>
                                        
                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{ url('/delete_ento4') }}/{{ $ento4->ento_04_id }}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                    <td>{{ $ento4->formid }}</td>

                                    <td>{{ $ento4->date_of_collection }}</td>
                                    <td>{{ $ento4->district }}</td>
                                    <td>{{ $ento4->moh }}</td>
                                    <td>{{ $ento4->phi }}</td>
                                    <td>{{ $ento4->gn_division }}</td>
                                    <td>{{ $ento4->locality }}</td>
                                    <td>{{ $ento4->gps_long }}</td>
                                    <td>{{ $ento4->gps_lat }}</td>
                                 





                                </tr>
                                <div id="editModal2{{$ento4->ento_04_id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT ENTO 4 DETAIL</h4>
                                                <br />
                                            </div>
                                            <form method="post" action="{{ url('/ento4_update ') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="ento_04_id" value="{{$ento4->ento_04_id}}" class="form-control" />
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">District</label>
                                                                {{-- <select name="district" class="form-control" onchange="getMoh(this.value)">
                                                          @if(Auth::user()->role!=="ADMIN" & Auth::user()->role !== "AFC")
                                                           <option {{ $ento4->district==Auth::user()->distric?"selected":"" }} value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
                                                                @else @foreach ($district_list as $dis)
                                                                <option {{ $ento4->district==$dis->district?"selected":"" }} value="{{ $dis->district }}">{{ $dis->district }}</option>
                                                                @endforeach @endif
                                                                </select> --}}
                                                                <input type="text" name="district" value="{{$ento4->district}}" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">MOH area</label>
                                                                {{--
                                                               <select name="moh" class="form-control" id="moh_list" onchange="getPhi(this.value)">
            <option value="{{$ento4->moh}}">{{$ento4->moh}}</option>
                                                                </select>
                                                                --}}
                                                                <input type="text" name="moh" value="{{$ento4->moh}}" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">PHM area </label>

                                                                <input type="text" name="phi" value="{{$ento4->phi}}" class="form-control" />
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">GN division</label>
                                                                <input type="text" name="gn_division" value="{{$ento4->gn_division}}" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Locality/ Address </label>
                                                                <input type="text" value="{{$ento4->locality}}" name="locality" class="form-control" />
                                                            </div>




                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">GPS latitude</label>
                                                                <input type="text" name="gps_lat" class="form-control" value="{{$ento4->gps_lat}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">GPS longitude</label>
                                                                <input type="text" name="gps_long" class="form-control" value="{{$ento4->gps_long}}">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date </label>
                                                                <input data-date-format="yyyy-mm-d" value="{{$ento4->date_of_collection}}" type="text" name="date_of_collection" class="datepicker_v form-control pull-right" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                        Cancel
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
                                <th>latitude</th>
                                <th>Action</th>
                                <th>ID</th>
                                <th>Date of Collection</th>
                                <th>District</th>
                                <th>MOH area</th>
                                <th>PHM area</th>
                                <th>GN division</th>
                                <th>Locality/ Address</th>
                                <th>longitude</th>

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