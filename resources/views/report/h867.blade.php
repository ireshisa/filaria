<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>H867 VIEW
            <br>
            <small>h867 view all data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">H867 VIEW</a></li>
            <li class="active">H867 VIEW</li>
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
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Delete Your Record.
                        </div>
                        @endif
                        @if(session()->get('message')==false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Delete Your Record.
                        </div>
                        @endif
                        @endif
                        @if(session()->has('update'))
                        @if(session()->get('update')==true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Update Your Record.
                        </div>
                        @endif
                        @if(session()->get('update')==false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Update Your Record.
                        </div>
                        @endif
                        @endif
                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Group NO</th>
                                    <th>Name of P.H.I</th>
                                    <th>District </th>
                                    <th>MOH Area</th>
                                    <th>PHI or PHM</th>
                                     <th>LAB.Re .NO</th>
                                    <th>No Positive</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($h867_list as $h867)
                                <tr>
                                    <td>{{ $h867->ID }}</td>
                                    <td>{{ $h867->group_number }}</td>
                                    <td>{{ $h867->phi_name }}</td>
                                    <td>{{ $h867->district }}</td>
                                    <td>{{ $h867->moh_area }}</td>
                                    <td>{{ $h867->phm_area }}</td>
                                    <td>{{ $h867->laboratory_no }}</td>
                                       <td>{{ $h867->no_positive }} @if($h867->no_positive !== null && $h867->no_positive !== '0' ) +  @endif </td>
                                    <td class="d-inline">
                                     
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $h867->ID }}" data-target="#editModal{{$h867->ID}}"><i class="fa fa-eye" aria-hidden="true"></i>
                                            <strong>View</strong> </button>
                                       
                                        <a href="{{url('/view_h867_list_data') }}/{{ $h867->ID }}" class="btn btn-primary btn-sm">
                                         </i> View  Data</a>

                                            <a href="{{url('/h867_print') }}/{{ $h867->ID }}" class="btn btn-primary btn-sm">
                                            Print</a>
                                      
                                    </td>
                                </tr>


          





                                <div id="editModal{{$h867->ID}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">VIEW H867 DETAIL</h4><br>
                                            </div>

                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">ID</label>
                                                            <input readonly value="{{ $h867->ID }}" name="group_number" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Group No & code Name</label>
                                                            <input readonly value="{{ $h867->group_number }}" name="group_number" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Name and Designation of P.H.I</label>
                                                            <input readonly value="{{ $h867->phi_name }}" type="text" name="phi_name" class="form-control" placeholder="Name and Designation of P.H.I...">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">District</label>
                                                            <input readonly value="{{ $h867->district }}" name="district" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">MOH Area</label>
                                                            <input readonly value="{{ $h867->moh_area }}" name="moh_area" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">PHI or PHM </label>
                                                            <input readonly value="{{ $h867->phm_area }}" name="phm_area" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Town or village</label>
                                                            <input readonly value="{{ $h867->town_village }}" type="text" name="town_village" class="form-control" placeholder="Town or village...">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">P.H.I.Annual Serial
                                                                No.</label>
                                                            <input readonly value="{{ $h867->phi_serial }}" type="text" name="phi_serial" class="form-control" placeholder="P.H.I.Annual Serial No....">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Laboratory Reference
                                                                No</label>
                                                            <input readonly value="{{ $h867->laboratory_no }}" type="text" name="laboratory_no" class="form-control" placeholder="Laboratory Reference No...">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Date of Blood
                                                                Filming</label>
                                                            <input readonly value="{{ $h867->date_of_blood }}" type="text" name="date_of_blood" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4>SUMMARY</h4>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Group No</label>
                                                            <input readonly value="{{ $h867->group_no }}" name="group_no" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Town or Village </label>
                                                            <input readonly value="{{ $h867->town_or_village }}" type="text" name="town_or_village" placeholder="Town or Village " class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Street of
                                                                Locality</label>
                                                            <input readonly value="{{ $h867->street_of_locality }}" type="text" name="street_of_locality" placeholder="Street of Locality" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No of Films Sent </label>
                                                            <input readonly value="{{ $h867->no_of_films }}" type="text" name="no_of_films" placeholder="No of Films Sent" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No Positive </label>
                                                            <input readonly value="{{ $h867->no_positive }}" type="text" name="no_positive" placeholder="No Positive" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No.of B/F Examined
                                                            </label>
                                                            <input readonly value="{{ $h867->no_examined }}" type="text" name="no_examined" placeholder="No.of B/F Examined" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">EXAMINED BY</label>
                                                            <input readonly value="{{ $h867->to_phi }}" type="text" name="to_phi" placeholder="TO P.H.I" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">DATE OF EXMAINATION</label>
                                                            <input readonly value="{{ $h867->date }}" type="text" name="date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">director.anti-filariasis
                                                                campaign </label>
                                                            <input readonly value="{{ $h867->director_campain }}" type="text" name="director_campain" placeholder="director.anti-filariasis campaign" class="form-control">
                                                        </div>
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
                                     <th>ID</th>
                                    <th>Group NO</th>
                                    <th>Name of P.H.I</th>
                                    <th>District </th>
                                    <th>MOH Area</th>
                                    <th>PHI or PHM</th>
                                     <th>LAB.Re .NO</th>
                                    <th>No Positive</th>
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