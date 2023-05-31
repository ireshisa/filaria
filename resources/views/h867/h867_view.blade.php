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
                        @if (session()->has('message'))
                            @if (session()->get('message') == true)
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                                    Successfully Delete Your Record.
                                </div>
                            @endif
                            @if (session()->get('message') == false)
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                                    Failed Delete Your Record.
                                </div>
                            @endif
                        @endif
                        @if (session()->has('update'))
                            @if (session()->get('update') == true)
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                                    Successfully Update Your Record.
                                </div>
                            @endif
                            @if (session()->get('update') == false)
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                                    Failed Update Your Record.
                                </div>
                            @endif
                        @endif
                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mode of collection</th>
                                    <th>Name of PHI / PHFO</th>
                                    <th>District </th>
                                    <th>MOH Area</th>
                                    <th>PHI</th>
                                    <th>PHM</th>
                                    <th>GN</th>
                                    <th>Lab Ref no</th>
                                    <th>Town or village</th>
                                    <th>Date of blood filming</th>
                                    <th>Street of locality</th>
                                    <th>No of films Sent</th>
                                    <th>No.of B/F Examined</th>
                                    <th>EXAMINED BY </th>
                                    <th>DATE OF EXMAINATION</th>
                                    <th>No of Positive</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($h867_list as $h867)
                                    <tr>
                                        <td>{{$h867->ID }}</td>
                                        <td>{{$h867->group_number }}</td>
                                        <td>{{$h867->phi_name }}</td>
                                        <td>{{$h867->district }}</td>
                                        <td>{{$h867->moh_area }}</td>
                                        <td>{{$h867->phi_area }}</td>
                                        <td>{{$h867->phm_area }}</td>
                                        <td>{{$h867->town_village }}</td>
                                        <td>{{$h867->laboratory_no }}</td>
                                        <td>{{$h867->town_village}}</td>
                                        <td>{{$h867->date_of_blood}}</td>
                                        <td>{{$h867->street_of_locality}}</td>
                                        <td>{{$h867->no_of_films}}</td>
                                        <td>{{$h867->no_examined}}</td>
                                        <td>{{$h867->to_phi}}</td>
                                        <td>{{$h867->date}}</td>
                                         
                                        <td style="text-align: right;">{{ $h867->no_positive }} @if ($h867->no_positive !== null && $h867->no_positive !== '0')
                                            @endif
                                        </td> 
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-id="{{ $h867->ID }}"
                                                data-target="#eeditModal2{{ $h867->ID }}"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i>
                                                <strong>Edit</strong> </button>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-id="{{ $h867->ID }}"
                                                data-target="#editModal{{ $h867->ID }}"><i class="fa fa-eye"
                                                    aria-hidden="true"></i>
                                                <strong>View</strong> </button>
                                            <a href="{{ url('/view_h867_list_data') }}/{{ $h867->ID }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye"></i> View H867 Data</a>
                                            <a onclick="return confirm('Are you sure Delete this record?')"
                                                href="{{ url('/delete_h867') }}/{{ $h867->ID }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <div id="eeditModal2{{ $h867->ID }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                                    <h4 class="modal-title">EDIT H867 DETAIL</h4><br>
                                                </div>
                                                <form method="post" action="{{ url('/h867_update ') }}">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="ID" value="{{ $h867->ID }}"
                                                            class="form-control">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Mode of collection</label>
                                                                <select name="group_number" class="form-control" >
                                                                    <option
                                                                        {{ $h867->group_number == '1-C' ? 'selected' : '' }}
                                                                        value="1-C">1-C</option>
                                                                    <option
                                                                        {{ $h867->group_number == '2-R' ? 'selected' : '' }}
                                                                        value="2-R">2-R</option>
                                                                    <option
                                                                        {{ $h867->group_number == '3-I' ? 'selected' : '' }}
                                                                        value="3-I">3-I</option>
                                                                    <option
                                                                        {{ $h867->group_number == '4-S' ? 'selected' : '' }}
                                                                        value="4-S">4-S</option>
                                                                    <option
                                                                        {{ $h867->group_number == '5-P' ? 'selected' : '' }}
                                                                        value="5-P">5-P</option>
                                                                </select>

                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Code No</label>
                                                                <input value="{{ $h867->code_no }}" type="text"
                                                                    name="code_no" class="form-control">
                                                            </div>



                    
                                                            <div class="form-group">
                                                        <label for="exampleInputPassword1">Name and Designation Name of PHI </label>
                                                                <input value="{{ $h867->phi_name }}" type="text"
                                                                    name="phi_name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">District</label>

                                                                <input value="{{ $h867->district }}" type="text"
                                                                    name="district" class="form-control">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">MOH Area</label>

                                                                <input value="{{ $h867->moh_area }}" type="text"
                                                                    name="moh_area" class="form-control">

                                                            </div>

                                 <div class="form-group">
                                     <label for="exampleInputPassword1"> PHM </label>
                                    <input value="{{ $h867->phm_area }}" type="text" name="phm_area" class="form-control">
                                </div>

                                        <div class="form-group">
                                             <label for="exampleInputPassword1">PHI  </label>
                                             <input value="{{ $h867->phm_area }}" type="text" name="phi_area" class="form-control">
                                         </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Town or
                                                                    village</label>
                                                                <input value="{{ $h867->town_village }}" type="text"
                                                                    name="town_village" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">PHI/PHFO Annual
                                                                    Serial Number
                                                                    No.</label>
                                                                <input value="{{ $h867->phi_serial }}" type="text"
                                                                    name="phi_serial" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Laboratory Reference
                                                                    No</label>
                                                                <input value="{{ $h867->laboratory_no }}" type="text"
                                                                    name="laboratory_no" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date of blood
                                                                    filming</label>
                                                                <input value="{{ $h867->date_of_blood }}" type="date"
                                                                    name="date_of_blood" data-date-format="yyyy-mm-d"
                                                                    class="datepicker_v form-control pull-right">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4> SUMMARY</h4>

                                                            <!-- <div class="form-group">
                                                                <label for="exampleInputPassword1">Group no</label>
                                                                <select name="group_no" class="form-control">
                                                                    <option
                                                                        {{ $h867->group_no == '1-C' ? 'selected' : '' }}
                                                                        value="1-C">1-C</option>
                                                                    <option
                                                                        {{ $h867->group_no == '2-R' ? 'selected' : '' }}
                                                                        value="2-R">2-R</option>
                                                                    <option
                                                                        {{ $h867->group_no == '3-I' ? 'selected' : '' }}
                                                                        value="3-I">3-<I /option>
                                                                    <option
                                                                        {{ $h867->group_no == '4-S' ? 'selected' : '' }}
                                                                        value="4-S">4-S</option>
                                                                    <option
                                                                        {{ $h867->group_no == '5-P' ? 'selected' : '' }}
                                                                        value="5-P">5-P</option>
                                                                </select>
                                                            </div> -->


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Town or Village </label>
                                                                <input value="{{ $h867->town_or_village }}" type="text" name="town_or_village" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Street of locality</label>
                                                                <input value="{{ $h867->street_of_locality }}" type="text" name="street_of_locality" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of films Sent</label>
                                                                <input value="{{ $h867->no_of_films }}" type="text" name="no_of_films" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No Positive </label>
                                                                <input value="{{ $h867->no_positive }}" type="text" name="no_positive" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No.of B/F Examined
                                                                </label>
                                                                 <input value="{{ $h867->no_examined }}" type="text" name="no_examined" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">EXAMINED BY </label>
                                                                <input value="{{ $h867->to_phi }}" type="text" name="to_phi" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">DATE OF EXMAINATION</label>
                                                                <input value="{{ $h867->date }}" type="date" name="date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                                            </div>

                                                            <div class="form-group hide">
                                                                <label for="exampleInputPassword1">director.anti-filariasis campaign </label>
                                                                <input value="{{ $h867->director_campain }}" type="text" name="director_campain" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="editModal{{ $h867->ID }}" class="modal fade" role="dialog">
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
                                                                <label for="exampleInputPassword1">Mode of collection</label>
                                                                <input readonly value="{{ $h867->group_number }}" name="group_number" class="form-control">
                                                            </div>




                                                     <div class="form-group">
                                                                <label for="exampleInputPassword1">Code No</label>
                                                                <input value="{{ $h867->code_no }}" type="text" name="code_no" class="form-control">
                                                            </div>



                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Name and Designation
                                                                    of PHI / PHF</label>
                                                                <input readonly value="{{ $h867->phi_name }}" type="text" name="phi_name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">District</label>
                                                                <input readonly value="{{ $h867->district }}"
                                                                    name="district" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">MOH Area</label>
                                                                <input readonly value="{{ $h867->moh_area }}"
                                                                    name="moh_area" class="form-control">
                                                            </div>
                                                        

                               <div class="form-group">
                                     <label for="exampleInputPassword1"> PHM </label>
                                    <input value="{{ $h867->phm_area }}" type="text" name="phm_area" class="form-control" disabled>
                                </div>

                                        <div class="form-group">
                                             <label for="exampleInputPassword1">PHI  </label>
                                             <input value="{{ $h867->phi_area }}" type="text" name="phi_area" class="form-control" disabled>
                                         </div>



                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Town or
                                                                    village</label>
                                                                <input readonly value="{{ $h867->town_village }}"
                                                                    type="text" name="town_village"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">PHI/PHFO Annual
                                                                    Serial
                                                                    No.</label>
                                                                <input readonly value="{{ $h867->phi_serial }}"
                                                                    type="text" name="phi_serial" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Laboratory Reference
                                                                    no</label>
                                                                <input readonly value="{{ $h867->laboratory_no }}"
                                                                    type="text" name="laboratory_no"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date of blood
                                                                    filming</label>
                                                                <input readonly value="{{ $h867->date_of_blood }}"
                                                                    type="date" name="date_of_blood"
                                                                    data-date-format="yyyy-mm-d"
                                                                    class="datepicker_v form-control pull-right">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4>SUMMARY</h4>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Group no</label>
                                                                <input readonly value="{{ $h867->group_no }}"
                                                                    name="group_no" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Town or
                                                                    village </label>
                                                                <input readonly value="{{ $h867->town_or_village }}"
                                                                    type="text" name="town_or_village"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Street of
                                                                    locality</label>
                                                                <input readonly
                                                                    value="{{ $h867->street_of_locality }}"
                                                                    type="text" name="street_of_locality"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of films sent
                                                                </label>
                                                                <input readonly value="{{ $h867->no_of_films }}"
                                                                    type="text" name="no_of_films" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No Positive </label>
                                                                <input readonly value="{{ $h867->no_positive }}"
                                                                    type="text" name="no_positive" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No.of B/F Examined
                                                                </label>
                                                                <input readonly value="{{ $h867->no_examined }}"
                                                                    type="text" name="no_examined" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Name of PHLT
                                                                    examined</label>
                                                                <input readonly value="{{ $h867->to_phi }}"
                                                                    type="text" name="to_phi" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date of
                                                                    examination</label>
                                                                <input readonly value="{{ $h867->date }}" type="date"
                                                                    name="date" data-date-format="yyyy-mm-d"
                                                                    class="datepicker_v form-control pull-right">
                                                            </div>
                                                            <div class="form-group hide">
                                                                <label
                                                                    for="exampleInputPassword1">Director.anti-filariasis
                                                                    campaign </label>
                                                                <input readonly value="{{ $h867->director_campain }}"
                                                                    type="text" name="director_campain"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                            <tfoot>
                                    <th>ID</th>
                                    <th>Mode of collection</th>
                                    <th>Name of PHI / PHFO</th>
                                    <th>District </th>
                                    <th>MOH Area</th>
                                    <th>PHI</th>
                                    <th>PHM</th>
                                    <th>GN</th>


                                    <th>Lab Ref no</th>
                                   
                                    <th>Town or village</th>
                                    <th>Date of blood filming</th>
                                    <th>Street of locality</th>
                                    <th>No of films Sent</th>
                                    <th>No.of B/F Examined</th>
                                    <th>EXAMINED BY </th>
                                    <th>DATE OF EXMAINATION</th>
                                    <th>No of Positive</th>
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
