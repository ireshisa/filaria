Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ENTO 2 DATA VIEW
            <br>
            <small>ento 2 view all data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('/ento2_view') }}">ENTO 2 DATA</a></li>
            <li class="active">ENTO 2 DATA VIEW</li>
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
                        @if (session()->has('message')) @if (session()->get('message') == true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Delete Your Record.
                        </div>
                        @endif @if (session()->get('message') == false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Delete Your Record.
                        </div>
                        @endif @endif @if (session()->has('update')) @if (session()->get('update') == true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Update Your Record.
                        </div>
                        @endif @if (session()->get('update') == false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Update Your Record.
                        </div>
                        @endif @endif
                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Date</th>
                                    <th>MOH area</th>
                                    <th>PHM area</th>
                                    <th>GN division</th>
                                    <th>CO+addres</th>
                                    <th>TCQC</th>
                                    <th>MSFPCR</th>
                                    <th>SFD</th>
                                    <th>PCR R1</th>
                                    <th>PCR R2 </th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>

                                    <th>PCR&nbsp;&nbsp;&nbsp;date received</th>
                                    <th>PCR&nbsp;&nbsp;&nbsp;date tested</th>
                                    <th>Tube no 1</th>
                                    <th>Tube no 2</th>
                                    <th>PCR ref no 1</th>
                                    <th>PCR ref no 2</th>




                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ento2_data_list as $ento2)
                                <tr>

                                    <td>{{ $ento2->serial_no }}</td>
                                    <td>{{ $ento2->date }}</td>
                                    <td>{{ $ento2->moh_area }}</td>
                                    <td>{{ $ento2->phm_area }}</td>
                                    <td>{{ $ento2->gn_division }}</td>
                                    <td>{{ $ento2->chief_occupant }}</td>
                                    <td>{{ $ento2->total_cx_quin }}</td>
                                    <td>{{ $ento2->mosq_pcr }}</td>
                                    <td>{{ $ento2->mosq_dis }}</td> {{-- new for send to dessc --}}
                                    <td>{{ $ento2->pcr_remarks }}</td>
                                    <td>{{ $ento2->pcr_remarks2 }}</td>
                                    <td>{{ $ento2->gps_lat }}</td>
                                    <td>{{ $ento2->gps_long }}</td>

                                    <td>{{ $ento2->pcr_date_rec }}</td>
                                    <td>{{ $ento2->pcr_date_test }}</td>
                                    <td>{{ $ento2->tube_no }}</td>
                                    <td>{{ $ento2->tube_no2 }}</td>
                                    <td>{{ $ento2->pcr_ref }}</td>
                                    <td>{{ $ento2->pcr_ref_2 }}</td>

                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $ento2->id }}" data-target="#editModal2{{ $ento2->id }}">
                                                <i class="fa fa-pencil" aria-hidden="true"></i><strong>Edit</strong>
                                            </button>

                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $ento2->id }}" data-target="#editModal{{ $ento2->id }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i> <strong>View</strong>
                                            </button>
                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{ url('/delete_ento2_data') }}/{{ $ento2->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <div id="editModal2{{ $ento2->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT ENTO 2 DATA</h4>
                                                <br />
                                            </div>

                                            <form method="post" action="{{ url('/ento2_data_update ') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="id" value="{{ $ento2->id }}" class="form-control">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Ento 2 ID</label>
                                                            <select name="ento_02_id" class="form-control">
                                                                    @foreach ($ento2_list as $list)
                                                                        {{ $selected = '' }}
                                                                        @if ($ento2->ento_02_id == $list->ento_02_id)
                                                                            {{ $selected = 'selected' }}
                                                                        @endif
                                                                        <option {{ $selected }}
                                                                            value="{{ $list->ento_02_id }}">
                                                                            {{ $list->ento_02_id }} </option>
                                                                    @endforeach
                                                                </select>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Serial no</label>
                                                            <input value="{{ $ento2->serial_no }}" type="text" name="serial_no" class="form-control" />
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Date when trap
                                                                    layed</label>
                                                            <input data-date-format="yyyy-mm-d" value="{{ $ento2->date }}" type="date" name="date" class="form-control " />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">MOH area</label>
                                                            <input type="text" name="moh_area" class="form-control" value="{{ $ento2->moh_area }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">PHM area</label>
                                                            <input type="text" name="phm_area" class="form-control" value="{{ $ento2->phm_area }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Chief occupantcand
                                                                    and address </label>
                                                            <input value="{{ $ento2->chief_occupant }}" type="text" name="chief_occupant" class="form-control" />
                                                        </div>

                                                        <div class="form-group hide">
                                                            <label for="exampleInputPassword1">Address</label>
                                                            <input value="{{ $ento2->address }}" type="text" name="address" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">GPS latitude</label>
                                                            <input value="{{ $ento2->gps_lat }}" type="text" name="gps_lat" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">GPS longitude</label>
                                                            <input value="{{ $ento2->gps_long }}" type="text" name="gps_long" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Total Cx quin
                                                                    collected</label>
                                                            <input value="{{ $ento2->total_cx_quin }}" type="number" name="total_cx_quin" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Mosquito PCR</label>
                                                            <input value="{{ $ento2->mosq_pcr }}" type="number" name="mosq_pcr" class="form-control" />
                                                        </div>
                                                        <!-- <div class="form-group">
                <label for="exampleInputEmail1">District</label>
                <select  name="distrcit" class="form-control"
                    onchange="getMoh(this.value)">
                    @foreach ($district_list as $dis)
                    <option value="{{ $dis->district }}">
                    {{ $dis->district }}</option>
                    @endforeach
                </select>
            </div> -->


                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">GN division</label>
                                                            <input value="{{ $ento2->gn_division }}" type="text" name="gn_division" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Sent for
                                                                    dissection</label>
                                                            <input value="{{ $ento2->mosq_dis }}" type="text" name="mosq_dis" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">PCR date
                                                                    received</label>
                                                            <input data-date-format="yyyy-mm-d" value="{{ $ento2->pcr_date_rec }}" type="Date" name="pcr_date_rec" class="form-control pull-right datepicker_v" id="" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">PCR date
                                                                    tested</label>
                                                            <input data-date-format="yyyy-mm-d" value="{{ $ento2->pcr_date_test }}" type="date" name="pcr_date_test" class="form-control pull-right datepicker_v" id="" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Tube no 1</label>
                                                            <input value="{{ $ento2->tube_no }}" type="text" name="tube_no" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">PCR ref no 1</label>
                                                            <input value="{{ $ento2->pcr_ref }}" type="text" name="pcr_ref" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">PCR remarks 1</label>
                                                            <select name="pcr_remarks" class="form-control">
                                                                    <option
                                                                        {{ $ento2->pcr_remarks == 'Postive' ? 'selected' : '' }}
                                                                        value="Postive">postive</option>
                                                                    <option
                                                                        {{ $ento2->pcr_remarks == 'Negative' ? 'selected' : '' }}
                                                                        value="Negative">Negative</option>
                                                                    <option
                                                                        {{ $ento2->pcr_remarks == 'spoilt' ? 'selected' : '' }}
                                                                        value="spoilt">spoilt</option>
                                                                </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Tube no 2</label>
                                                            <input value="{{ $ento2->tube_no2 }}" type="text" name="tube_no2" class="form-control" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">PCR ref no 2</label>
                                                            <input value="{{ $ento2->pcr_ref_2 }}" type="text" name="pcr_ref_2" class="form-control" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">PCR remarks 2</label>
                                                            <select name="pcr_remarks2" class="form-control">
                                                                    <option
                                                                        {{ $ento2->pcr_remarks2 == 'Postive' ? 'selected' : '' }}
                                                                        value="Postive">Postive</option>
                                                                    <option
                                                                        {{ $ento2->pcr_remarks2 == 'Negative' ? 'selected' : '' }}
                                                                        value="Negative">Negative</option>
                                                                    <option
                                                                        {{ $ento2->pcr_remarks2 == 'Spoilt' ? 'selected' : '' }}
                                                                        value="Spoilt">Spoilt</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="editModal{{ $ento2->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT ENTO 2 DATA</h4><br>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Ento 2 ID</label>
                                                        <input readonly value="{{ $ento2->ento_02_id }}" name="ento_02_id" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Serial no</label>
                                                        <input readonly value="{{ $ento2->serial_no }}" type="text" name="serial_no" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Date when trap
                                                                layed</label>
                                                        <input data-date-format="yyyy-mm-d" readonly value="{{ $ento2->date }}" type="date" name="date" class="form-control ">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">MOH area</label>
                                                        <input readonly value="{{ $ento2->moh_area }}" name="moh_area" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">PHM area</label>
                                                        <input type="text" name="phm_area" class="form-control" value="{{ $ento2->phm_area }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Chief occupantcand and
                                                                address</label>
                                                        <input readonly value="{{ $ento2->chief_occupant }}" type="text" name="chief_occupant" class="form-control">
                                                    </div>
                                                    <div class="form-group view_ento2_data hide">
                                                        <label for="exampleInputPassword1">Address</label>
                                                        <input readonly value="{{ $ento2->address }}" type="text" name="address" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">GPS latitude</label>
                                                        <input readonly value="{{ $ento2->gps_lat }}" type="text" name="gps_lat" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">GPS longitude</label>
                                                        <input readonly value="{{ $ento2->gps_long }}" type="text" name="gps_long" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Total Cx quin
                                                                Collected</label>
                                                        <input readonly value="{{ $ento2->total_cx_quin }}" type="number" name="total_cx_quin" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Mosquito PCR</label>
                                                        <input readonly value="{{ $ento2->mosq_pcr }}" type="number" name="mosq_pcr" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">GN division</label>
                                                        <input readonly value="{{ $ento2->gn_division }}" type="text" name="gn_division" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Sent to
                                                                dissection</label>
                                                        <input readonly value="{{ $ento2->mosq_dis }}" type="text" name="mosq_dis" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">PCR date received</label>
                                                        <input data-date-format="yyyy-mm-d" readonly value="{{ $ento2->pcr_date_rec }}" type="text" name="pcr_date_rec" class="form-control pull-right datepicker_v" id="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">PCR ref no</label>
                                                        <input readonly value="{{ $ento2->pcr_ref }}" type="text" name="pcr_ref" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">PCR date tested</label>
                                                        <input data-date-format="yyyy-mm-d" readonly value="{{ $ento2->pcr_date_test }}" type="date" name="pcr_date_test" class="form-control pull-right datepicker_v" id="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Tube no 1</label>
                                                        <input readonly value="{{ $ento2->tube_no }}" type="text" name="tube_no" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">PCR remarks 1</label>
                                                        <input readonly value="{{ $ento2->pcr_remarks }}" name="pcr_remarks" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Tube no 2</label>
                                                        <input readonly value="{{ $ento2->tube_no2 }}" type="text" name="tube_no2" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">PCR remarks 2</label>
                                                        <input readonly value="{{ $ento2->pcr_remarks2 }}" name="pcr_remarks2" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Date</th>
                                    <th>MOH area</th>
                                    <th>PHM area</th>
                                    <th>GN division</th>
                                    <th>CO+addres</th>
                                    <th>TCQC</th>
                                    <th>MSFPCR</th>
                                    <th>SFD</th>
                                    <th>PCR R1</th>
                                    <th>PCR R2 </th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>PCR date received</th>
                                    <th>PCR date tested</th>
                                    <th>Tube no 1</th>
                                    <th>Tube no 2</th>
                                    <th>PCR ref no 1</th>
                                    <th>PCR ref no 2</th>
                                    <th>Action</th>
                                </tr>
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
<!-- /.content-wrapper-->

<style>
    td {
        text-align: right !important;
    }
</style>