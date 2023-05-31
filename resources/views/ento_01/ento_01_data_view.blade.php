<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Human Hand Collection FORM
   
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/ento1_data') }}">Entomological data</a></li>
            <li class="active">Human Hand Collection FORM</li>
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
                        @endif @endif
                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                               <th>Ser No</th>
                                <th>House No</th>
                                <th>NOM</th>
                                <th>NOC</th>
                                <th>F&F</th>
                                <th>C&H</th>
                                <th>BN</th>
                                <th>Wal</th>
                                <th>EA</th>
                                <th>Others</th>

                                <th>Infected</th>
                                <th>Infective</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ento1_data_list as $ento1)
                                <tr>
                                    <td>{{ $ento1->ser_no }}</td>
                                    <td>{{ $ento1->house_no }}</td>
                                    <td>{{ $ento1->no_of_mosq }}</td>
                                    <td>{{ $ento1->no_of_culex}}</td>
                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento1->resting_place_1 }}<br>Mansonia:-{{ $ento1->resting_place_1_mansonia }}</span>  </td>
                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento1->resting_place_2}}<br>Mansonia:-{{ $ento1->resting_place_2_mansonia }}</span> </td>
                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento1->resting_place_3}}<br>Mansonia:-{{ $ento1->resting_place_3_mansonia }}</span> </td>
                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento1->resting_place_4}}<br>Mansonia:-{{ $ento1->resting_place_4_mansonia }}</span> </td>
                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento1->resting_place_5}}<br>Mansonia:-{{ $ento1->resting_place_5_mansonia }}</span> </td>
                                    <td><span style="width: 100% !important;">Culex quin:-{{ $ento1->resting_place_6}}<br>Mansonia:-{{ $ento1->resting_place_6_mansonia }}</span> </td>


                                    <td>Culex quin:-{{ $ento1->lab_positive }}  <br>Mansonia :-{{ $ento1->lab_positive_man }} </td>
                                    <td>Culex quin:-{{ $ento1->lab_no }}  <br>Mansonia :-{{ $ento1->lab_no_man }}</td>
                                    
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $ento1->id }}" data-target="#editModal{{$ento1->id}}"><i class="fa fa-eye" aria-hidden="true"></i>
                                        <strong>View</strong> </button>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $ento1->id }}" data-target="#editModal2{{$ento1->id}}"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        <strong>Edit</strong> </button>
                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_ento1_data') }}/{{ $ento1->id }}/{{ $ento1->ento_01_id }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <div id="editModal2{{$ento1->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title"> ENTO 1 DATA EDIT</h4><br>
                                            </div>
                                            <form method="post" action="{{url('/ento1_data_update ') }}">
                                                {{csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <!-- <h3>ENTO 1</h3> -->
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="id" value="{{$ento1->id}}" class="form-control">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Ento1 ID</label>
                                                                <select name="ento_01_id" class="form-control">
                                                                    <option value="">Select Ento 4 Id</option>
                                                                    @foreach ($ento1_list as $list)
                                                                    @if($ento1->ento_01_id==$list->ento_01_id)
                                                                    <option selected value="{{ $list->ento_01_id }}">
                                                                    {{ $list->ento_01_id }} </option>
                                                                    @endif
                                                                    @if($ento1->ento_01_id!=$list->ento_01_id)
                                                                    <option value="{{ $list->ento_01_id }}">
                                                                    {{ $list->ento_01_id }} </option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Serial No</label>
                                                                <input value="{{$ento1->ser_no}}" type="text"  name="ser_no" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">House No and address</label>
                                                                <input value="{{$ento1->house_no}}" type="text"  name="house_no" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of Mansonia</label>
                                                                <input value="{{$ento1->no_of_mosq}}" type="text"  name="no_of_mosq" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of Culex</label>
                                                                <input type="number" value="{{$ento1->no_of_culex}}" name="no_of_culex" class="form-control">
                                                            </div>
                                                            {{--       <div class="form-group">
                                                                <label for="exampleInputPassword1">NO of other
                                                                Mosquitos</label>
                                                                <input type="number"  value="{{$ento1->no_of_other}}" name="no_of_other" class="form-control">
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> No of Anopheles species</label>
                                                                <input type="number"  name="anopheles" class="form-control" value="{{$ento1->anopheles}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> No of Aedes species</label>
                                                                <input type="number"  name="andes" class="form-control" value="{{$ento1->andes}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> No of Armigeres species</label>
                                                                <input type="number"  name="armigerous" class="form-control" value="{{$ento1->armigerous}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">(1) Furniture & fittings</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input value="{{$ento1->resting_place_1_mansonia}}" type="Number"  name="resting_place_1_mansonia" class="form-control" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input value="{{$ento1->resting_place_1}}" type="Number"  name="resting_place_1" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">(2) Cloths & hangings</label>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input value="{{$ento1->resting_place_2_mansonia}}" type="Number"  name="resting_place_2_mansonia" class="form-control" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input value="{{$ento1->resting_place_2}}" type="number"  name="resting_place_2" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">(3) Bed nets</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input value="{{$ento1->resting_place_3_mansonia}}" type="Number"  name="resting_place_3_mansonia" class="form-control" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input value="{{$ento1->resting_place_3}}" type="number"  name="resting_place_3" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">(4) Walls</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input value="{{$ento1->resting_place_4_mansonia}}" type="Number"  name="resting_place_4_mansonia" class="form-control" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input value="{{$ento1->resting_place_4}}" type="number"  name="resting_place_4" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">(5) Electronic appliances</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input value="{{$ento1->resting_place_5_mansonia}}" type="Number"  name="resting_place_5_mansonia" class="form-control" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input value="{{$ento1->resting_place_5}}" type="number"  name="resting_place_5" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">(6) Others (if specify)</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Mansonia</label>
                                                                        <input value="{{$ento1->resting_place_6_mansonia}}" type="Number"  name="resting_place_6_mansonia" class="form-control" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="exampleInputPassword1">Culex quin</label>
                                                                        <input value="{{$ento1->resting_place_6}}" type="number"  name="resting_place_6" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                       
                                                          
<div class="form-group">
    <label for="exampleInputPassword1"> No of infected mosquitoes </label>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputPassword1">Mansonia</label>
            <input value="{{$ento1->lab_positive_man}}"  type="number"  name="lab_positive_man" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1">Culex quin</label>
            <input  value="{{$ento1->lab_positive}}" type="number"   name="lab_positive" class="form-control">
        </div>
    </div>
    <hr>
</div>






<div class="form-group">
    <label for="exampleInputPassword1">No of infective mosquitoes</label>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputPassword1">Mansonia</label>
            <input type="number"  value="{{$ento1->lab_no_man}}" name="lab_no_man" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1">Culex quin</label>
            <input type="number"  value="{{$ento1->lab_no}}" name="lab_no" class="form-control">
        </div>
    </div>
</div>















                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">GPS latitude</label>
                                                                <input type="text"  name="gps_lat" class="form-control" value="{{$ento1->gps_lat}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">GPS longitude</label>
                                                                <input type="text"  name="gps_long" class="form-control" value="{{$ento1->gps_long}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" modal-footer ">
                                                    <button type="button " class="btn btn-warning " data-dismiss="modal ">Cancel</button>
                                                    <button type="submit " class="btn btn-primary ">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="editModal{{$ento1->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title"> ENTO 1 DATA VIEW</h4><br>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <!-- <h3>ENTO 1</h3> -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Ento1ID</label>
                                                            <input value="{{$ento1->ento_01_id}}" readonly type="text"  name="ser_no" class="form-control" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Serial No</label>
                                                            <input value="{{$ento1->ser_no}}" readonly type="text"  name="ser_no" class="form-control" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">House no and address</label>
                                                            <input value="{{$ento1->house_no}}" readonly type="text"  name="house_no" class="form-control" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No of Mansonia</label>
                                                            <input value="{{$ento1->no_of_mosq}}" readonly type="number" name="no_of_mosq" class="form-control" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">No of Culex quin species</label>
                                                            <input type="number" readonly value="{{$ento1->no_of_culex}}" name="no_of_culex" class="form-control">
                                                        </div>
                                                        {{--    <div class="form-group">
                                                            <label for="exampleInputPassword1">NO of other
                                                            Mosquitos</label>
                                                            <input type="number" readonly  value="{{$ento1->no_of_other}}" name="no_of_other" class="form-control">
                                                        </div> --}}
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1"> No of Anopheles species</label>
                                                            <input type="number"  name="anopheles" class="form-control" value="{{$ento1->anopheles}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1"> No of Aedes species</label>
                                                            <input type="number"  name="andes" class="form-control" value="{{$ento1->andes}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1"> No of Armigeres species</label>
                                                            <input type="number"  name="armigerous" class="form-control" value="{{$ento1->armigerous}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">(1)Furniture & fittings</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Mansonia</label>
                                                                    <input value="{{$ento1->resting_place_1_mansonia}}" type="Number"  name="resting_place_1_mansonia" class="form-control" disabled="" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input value="{{$ento1->resting_place_1}}" type="number"  name="resting_place_1" class="form-control" disabled="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">(2) Cloths & hangings</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Mansonia</label>
                                                                    <input value="{{$ento1->resting_place_2_mansonia}}" type="Number"  name="resting_place_2_mansonia" class="form-control" disabled="" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input value="{{$ento1->resting_place_2}}" type="number"  name="resting_place_2" class="form-control" disabled="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">(3) Bed nets</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Mansonia</label>
                                                                    <input value="{{$ento1->resting_place_3_mansonia}}" type="Number"  name="resting_place_3_mansonia" class="form-control" disabled="" />
                                                                </div>
                                                                
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input value="{{$ento1->resting_place_3}}" type="number"  name="resting_place_3" class="form-control" disabled="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">(4) Walls</label>
                                                            <input value="{{$ento1->resting_place_4}}" readonly type="number"  name="resting_place_4" class="form-control" />
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Mansonia</label>
                                                                    <input value="{{$ento1->resting_place_4_mansonia}}" type="Number"  name="resting_place_4_mansonia" class="form-control" disabled="" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input value="{{$ento1->resting_place_4}}" type="number"  name="resting_place_4" class="form-control" disabled="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">(5) Electronic appliances</label>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Mansonia</label>
                                                                    <input value="{{$ento1->resting_place_5_mansonia}}" type="Number"  name="resting_place_5_mansonia" class="form-control" disabled="" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input value="{{$ento1->resting_place_5}}" type="number"  name="resting_place_5" class="form-control" disabled="" />
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">(6) Others (if specify)</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Mansonia</label>
                                                                    <input value="{{$ento1->resting_place_6_mansonia}}" type="Number"  name="resting_place_5_mansonia" class="form-control" disabled="" />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleInputPassword1">Culex quin</label>
                                                                    <input value="{{$ento1->resting_place_6}}" type="number"  name="resting_place_5" class="form-control" disabled="" />
                                                                </div>
                                                            </div>
                                                        </div>





<div class="form-group">
    <label for="exampleInputPassword1"> No of infected mosquitoes </label>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputPassword1">Mansonia</label>
            <input value="{{$ento1->lab_positive_man}}"  type="number"  name="lab_positive_man" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1">Culex quin</label>
            <input  value="{{$ento1->lab_positive}}" type="number"   name="lab_positive" class="form-control">
        </div>
    </div>
    <hr>
</div>






<div class="form-group">
    <label for="exampleInputPassword1">No of infective mosquitoes</label>
    <div class="row">
        <div class="col-md-6">
            <label for="exampleInputPassword1">Mansonia</label>
            <input type="number"  value="{{$ento1->lab_no_man}}" name="lab_no_man" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="exampleInputPassword1">Culex quin</label>
            <input type="number"  value="{{$ento1->lab_no}}" name="lab_no" class="form-control">
        </div>
    </div>
</div>



                                    <div class="form-group">
                                           <label for="exampleInputPassword1">GPS latitude</label>
                                           <input type="text"  name="gps_lat" class="form-control" value="{{$ento1->gps_lat}}">
                                     </div>

                                     <div class="form-group">
                                            <label for="exampleInputPassword1">GPS longitude</label>
                                            <input type="text"  name="gps_long" class="form-control" value="{{$ento1->gps_long}}">
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
                            <tr>
    
                               <th>Ser No</th>
                                <th>House No</th>
                                <th>NOM</th>
                                <th>NOC</th>
                                <th>F&F</th>
                                <th>C&H</th>
                                <th>BN</th>
                                <th>Wal</th>
                                <th>EA</th>

                                <th>Others</th>
                                <th>Infected</th>
                                <th>Infective</th>
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
<!-- /.content-wrapper