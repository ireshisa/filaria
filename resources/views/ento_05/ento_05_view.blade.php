<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Mosquito Dissectio
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Entomological Data</a></li>
            <li class="active">Mosquito Dissectio VIEW</li>
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
                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>

                                    <th>Mansonia collected </th>
                                    <th>Cx quin collected</th>
                                    <th>Form type </th>


                                    <th>Man hrs spent</th>
                                    <th>Catch per man hr</th>
                                    <th>Furniture </th>
                                    <th>C&H</th>
                                    <th>Bed nets</th>
                                    <th>walls </th>
                                    <th>Electronic A.</th>
                                    <th>Others </th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ento5_list as $ento5)
                                <tr>
                                    <td>{{ $ento5->ento_05_id }}</td>
                                    <td>{{ $ento5->total_mansonia_sp }}</td>
                                    <td>{{ $ento5->total_cx_quin_mosq }}</td>
                                    <td>{{ $ento5->main_form_type }}</td>

                                    <td>{{ $ento5->man_hrs_spent }}</td>
                                    <td>{{ $ento5->catch_per_mh }}</td>

                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento5->furniture_and_fittings}}<br>Mansonia:-{{ $ento5->furniture_and_fittings_mansonia }}</span> </td>
                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento5->clothes_and_hang}}<br>Mansonia:-{{ $ento5->clothes_and_hang_mansonia }}</span> </td>
                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento5->bed_nets_mansonia}}<br>Mansonia:-{{ $ento5->bed_nets_mansonia }}</span> </td>
                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento5->walls}}<br>Mansonia:-{{ $ento5->walls_mansonia }}</span> </td>
                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento5->electronic}}<br>Mansonia:-{{ $ento5->electronic_mansonia }}</span> </td>
                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento5->others}}<br>Mansonia:-{{ $ento5->others_mansonia }}</span> </td>


                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-id="{{ $ento5->ento_05_id }}" data-target="#editModal2{{$ento5->ento_05_id}}"><i class="fa fa-pencil"
                                        aria-hidden="true"></i>
                                        <strong>Edit</strong> </button>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $ento5->ento_05_id  }}" data-target="#editModal{{$ento5->ento_05_id }}"><i class="fa fa-eye"
                                        aria-hidden="true"></i>
                                        <strong>View</strong> </button>
                                        <a href="{{url('/getEnto5MosqData') }}/{{ $ento5->ento_05_id }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i> EN05 DISSECTION</a>
                                        <a href="{{url('/getEnto5NewMosqData') }}/{{ $ento5->ento_05_id }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i> EN05  MOSQUITO</a>
                                        <!-- <a href="{{url('/getEnto5SpeciesData') }}/{{ $ento5->ento_05_id }}"
                                            class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>  EN05 DISSECTION 2</a> -->
                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_ento5') }}/{{ $ento5->ento_05_id }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <div id="editModal2{{$ento5->ento_05_id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT ENTO 5 DETAIL</h4><br>
                                            </div>
                                            <form method="post" action="{{ url('/ento5_update ') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <input type="hidden" name="ento_05_id" value="{{$ento5->ento_05_id}}" class="form-control" />
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Form List</label>
                                                                <select name="main_form_type" id="main_form_type" class="form-control" onchange="getEntoFrom(this.value)" disabled>
                                                                    <option value="">Select</option>
                                                                    <option
                                                                        {{$ento5->main_form_type=="ento_01"?"selected":""}}
                                                                    value="ento_01">ENTO/01</option>
                                                                    <option
                                                                        {{$ento5->main_form_type=="ento_02"?"selected":""}}
                                                                    value="ento_02">ENTO/02</option>
                                                                    <option
                                                                        {{$ento5->main_form_type=="ento_03"?"selected":""}}
                                                                    value="ento_03">ENTO/03</option>
                                                                    <option
                                                                        {{$ento5->main_form_type=="ento_04"?"selected":""}}
                                                                    value="ento_04">ENTO/04</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Ento from ID</label>
                                                                <select name="main_form_id" class="form-control" id="id_list" onchange="formIdChange(this.value)">
                                                                    <option value="{{$ento5->main_form_id}}">
                                                                    {{$ento5->main_form_id}}</option>
                                                                </select>
                                                            </div>
                                                            <!-- .............................. -->
                                                            
                                                            <div class="form-group hidden">
                                                                <label for="exampleInputPassword1">No of Cpq</label>
                                                                <input value="{{$ento5->no_of_cpq}}" type="number" pattern="^\d*(\.\d{0,2})?$" name="no_of_cpq" class="form-control">
                                                            </div>




                                                    <div class="form-group">
                                                                <label for="exampleInputPassword1">No of Mansonia</label>
                                                                <input value="{{$ento5->total_mansonia_sp}}" type="number" pattern="^\d*(\.\d{0,2})?$" name="total_mansonia_sp" class="form-control">
                                                    </div>






                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Total no of Cx quin
                                                                collected </label>
                                                                <input value="{{$ento5->total_cx_quin_mosq}}" type="number" pattern="^\d*(\.\d{0,2})?$" name="total_cx_quin_mosq" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Man hrs spent
                                                                </label>
                                                                <input value="{{$ento5->man_hrs_spent}}" type="number" pattern="^\d*(\.\d{0,2})?$" name="man_hrs_spent" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Catch per man hr
                                                                </label>
                                                                <input value="{{$ento5->catch_per_mh}}" type="number" pattern="^\d*(\.\d{0,2})?$" name="catch_per_mh" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Furniture & fittings</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input  type="Number" value="{{$ento5->furniture_and_fittings_mansonia}}" name="furniture_and_fittings_mansonia" id="furniture_and_fittings_mansonia" class="form-control"  />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input  type="number" value="{{$ento5->furniture_and_fittings}}" name="furniture_and_fittings" id="furniture_and_fittings" class="form-control"  />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Cloths & hangings</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input value="{{$ento5->clothes_and_hang_mansonia}}" type="Number"  name="clothes_and_hang_mansonia" class="form-control" id="clothes_and_hang_mansonia"  />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input value="{{$ento5->clothes_and_hang}}" type="number"  name="clothes_and_hang" class="form-control" id="clothes_and_hang"  />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Bed nets</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input value="{{$ento5->bed_nets_mansonia}}" type="Number"  name="bed_nets_mansonia" class="form-control" id="bed_nets_mansonia"  />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input value="{{$ento5->bed_nets}}" type="number"  name="bed_nets" class="form-control" id="bed_nets"  />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">walls </label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input value="{{$ento5->walls_mansonia}}" type="Number"  name="walls_mansonia" class="form-control" id="walls_mansonia"  />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input value="{{$ento5->walls}}" type="number"  name="walls" class="form-control" id="walls"  />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Electronic appliances</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input value="{{$ento5->electronic_mansonia}}" type="Number"  name="electronic_mansonia" class="form-control" id="electronic_mansonia"  />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input value="{{$ento5->electronic}}" type="number"  name="electronic" class="form-control" id="electronic"  />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Others (if specify)</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input value="{{$ento5->others_mansonia}}" type="number"  name="others_mansonia" class="form-control" id="others_mansonia"  />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input value="{{$ento5->others}}" type="number"  name="others" class="form-control" id="others"  />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="editModal{{$ento5->ento_05_id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">VIEW ENTO 5 DETAIL</h4><br>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Form List</label>
                                                            <input readonly value="{{$ento5->main_form_type}}" type="text" name="main_form_type" class="form-control" disabled="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Ento from ID</label>
                                                            <input readonly value="{{$ento5->main_form_id}}" type="text" name="main_form_id" class="form-control" disabled>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No of Cpq</label>
                                                            <input readonly value="{{$ento5->no_of_cpq}}" type="number" pattern="^\d*(\.\d{0,2})?$" name="no_of_cpq" class="form-control" disabled>
                                                        </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">No of Mansonia</label>
                    <input value="{{$ento5->total_mansonia_sp}}" type="number" pattern="^\d*(\.\d{0,2})?$" name="total_mansonia_sp" class="form-control">
              </div>









                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Total no of Cx quin
                                                            collected </label>
                                                            <input readonly value="{{$ento5->total_cx_quin_mosq}}" type="number" pattern="^\d*(\.\d{0,2})?$" name="total_cx_quin_mosq" class="form-control" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Man hrs spent  </label>
                                                            <input readonly value="{{$ento5->man_hrs_spent}}" type="number" pattern="^\d*(\.\d{0,2})?$" name="man_hrs_spent" class="form-control" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Catch per man hr </label>
                                                            <input readonly value="{{$ento5->catch_per_mh}}" type="number" pattern="^\d*(\.\d{0,2})?$" name="catch_per_mh" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Furniture & fittings</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Mansonia</label>
                                                                    <input  type="Number" value="{{$ento5->furniture_and_fittings_mansonia}}" name="furniture_and_fittings_mansonia" id="furniture_and_fittings_mansonia" class="form-control" disabled />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input  type="number" value="{{$ento5->furniture_and_fittings}}" name="furniture_and_fittings" id="furniture_and_fittings" class="form-control" disabled />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Cloths & hangings</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Mansonia</label>
                                                                    <input value="{{$ento5->clothes_and_hang_mansonia}}" type="Number"  name="clothes_and_hang_mansonia" class="form-control" id="clothes_and_hang_mansonia" disabled />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input value="{{$ento5->clothes_and_hang}}" type="number"  name="clothes_and_hang" class="form-control" id="clothes_and_hang" disabled />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Bed nets</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Mansonia</label>
                                                                    <input value="{{$ento5->bed_nets_mansonia}}" type="Number"  name="bed_nets_mansonia" class="form-control" id="bed_nets_mansonia" disabled />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input value="{{$ento5->bed_nets}}" type="number"  name="bed_nets" class="form-control" id="bed_nets" disabled />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">walls </label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Mansonia</label>
                                                                    <input value="{{$ento5->walls_mansonia}}" type="Number"  name="walls_mansonia" class="form-control" id="walls_mansonia" disabled />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input value="{{$ento5->walls}}" type="number"  name="walls" class="form-control" id="walls" disabled />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Electronic appliances</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Mansonia</label>
                                                                    <input value="{{$ento5->electronic_mansonia}}" type="Number"  name="electronic_mansonia" class="form-control" id="electronic_mansonia" disabled />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input value="{{$ento5->electronic}}" type="number"  name="electronic" class="form-control" id="electronic" disabled />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">others (if specify)</label>
                                                            <div class="row">
                         <div class="col-md-6">
                              <label for="exampleInputPassword1">Mansonia</label>
                               <input value="{{$ento5->others_mansonia}}" type="number"  name="others_mansonia" class="form-control" id="others_mansonia" disabled/>
                          </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input value="{{$ento5->others}}" type="number"  name="others" class="form-control" id="others" disabled  />
                                                                </div>
                                                            </div>
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
                                    <th>Mansonia collected </th>
                                    <th>Cx quin collected</th>
                                    <th>Form type </th>

                                    <th>Man hrs spent</th>
                                    <th>Catch per man hr</th>
                                    <th>Furniture & fittings Mansonia</th>
                                    <th>Cloths & hangings</th>
                                    <th>Bed nets</th>
                                    <th>walls </th>
                                    <th>Electronic appliances</th>
                                    <th>Others </th>


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