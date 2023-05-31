


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ENTO 05 MOSQUITO VIEW
        <br>
        <small>ento 5 MOSQUITO view all data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/ento5_view') }}">ENTO 5</a></li>
            <li class="active">ENTO 05 MOSQUITO VIEW</li>
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
                        

                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> ID</th>
                                     <th>Species </th>
                                     <th>MPFP</th>
                                      <th>MPF L3</th>
                                     <th>Remarks</th>

                                     <th>Address</th>
                                     <th>Head</th>
                                     <th>Thorax</th>
                                     <th>Abdomen</th>
                                


                   




                                     <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ento5_mosq_list as $ento5)
                                <tr>
                                    <td>{{ $ento5->ento_05_id }}</td>
                                   
                                   <td>{{ $ento5->species2 }}</td>
                                   <td>{{ $ento5->positive_mosq }}</td>
                                   <td>{{ $ento5->mq_postive_for_l3 }}</td>
                                   <td> {{ $ento5->remarks }}</td>


                                     <td>{{ $ento5->address }}</td>

                                     <td>MF:-{{ $ento5->head_mf }} <br>
                                         L1 :-{{ $ento5->head_l1 }} <br>
                                         L2 :-{{ $ento5->head_l2 }} <br>
                                         L3 :-{{ $ento5->head_l3 }} <br>
                                     </td>

                                     
                                     <td>MF:-{{ $ento5->thorax_mf }} <br>
                                         L1 :-{{ $ento5->thorax_l1 }} <br>
                                         L2 :-{{ $ento5->thorax_l2 }} <br>
                                         L3 :-{{ $ento5->thorax_l3 }} <br>
                                     </td>
                                     
                                     <td>MF:-{{ $ento5->abdomen_mf }} <br>
                                         L1:-{{ $ento5->abdomen_l1 }} <br>
                                         L2:-{{ $ento5->abdomen_l2 }} <br>
                                         L3:-{{ $ento5->abdomen_l3 }} <br>
                                     </td>
                                   
                             
                               
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-id="{{ $ento5->id }}" data-target="#editModal{{$ento5->id}}"><i
                                        class="fa fa-eye" aria-hidden="true"></i>
                                        <strong>View</strong> </button>
                                        <button class="btn btn-success btn-sm" data-toggle="modal"
                                        data-id="{{ $ento5->id }}" data-target="#editModal2{{$ento5->id}}"><i
                                        class="fa fa-pencil" aria-hidden="true"></i>
                                        <strong>Edit</strong> </button>
                                        <a onclick="return confirm('Are you sure Delete this record?')"
                                            href="{{url('/delete_ento5_new_mosq') }}/{{ $ento5->id }}"
                                            class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <div id="editModal{{$ento5->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">VIEW ENTO 5 SPECIES</h4><br>
                                            </div>
                                            <form method="post" action="{{ url('/ento5_new_mosq_update ') }}">
                                                {{ csrf_field() }}




                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <input type="hidden" name="id" value="{{$ento5->id}}"
                                                        class="form-control" />
                                                        <div class="col-md-6">
                                                            <hr>
                                                            <h3><b>ENTO 05 Mosquito</b></h3>
                                                            <hr>
                                                            
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Address  </label>
                                                                <select name="address" class="form-control" id="ad_list">
                                                                    <option value="{{ $ento5->address }}"> {{ $ento5->address }} </option>

                                                                         @foreach ($address_list as $addrist)

                                                            <option value="{{ $addrist['address'] }}"> {{ $addrist['address'] }} </option>
 
                                                                         @endforeach 
                                                                             
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Species  </label>
                                                                <input readonly value="{{$ento5->species2}}" type="text"
                                                                name="positive_mosq" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Mosquito positive for
                                                                parasite :</label>
                                                                <input readonly value="{{$ento5->positive_mosq}}"
                                                                type="text" name="positive_mosq"
                                                                class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Mosquito positive For L3</label>
                                                                <input type="number"
                                                                value="{{$ento5->mq_postive_for_l3}}"
                                                                
                                                                name="mq_postive_for_l3" class="form-control"
                                                                required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Remarks</label>
                                                                <input readonly value="{{$ento5->remarks}}" type="text" name="remarks" class="form-control">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-md-6">
                                                            <hr>
                                                            <h3>Head</h3>
                                                            <div class="col-md-12">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">MF</label>
                                                                        <input readonly value="{{$ento5->head_mf}}" type="text" name="head_mf" class="form-control"  value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 1</label>
                                                                        <input readonly value="{{$ento5->head_l1}}"
                                                                        type="text" name="head_l1"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                              <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 2</label>
                                                                        <input readonly value="{{$ento5->head_l2}}"
                                                                        type="text" name="head_l2"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 3</label>
                                                                        <input readonly value="{{$ento5->head_l3}}"
                                                                        type="text" name="head_l3"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <hr>
                                                                <h3>Thorax </h3>
                                                              <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">MF</label>
                                                                        <input readonly value="{{$ento5->thorax_mf}}"
                                                                        type="text" name="thorax_mf"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 1</label>
                                                                        <input readonly value="{{$ento5->thorax_l1}}"
                                                                        type="text" name="thorax_l1"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 2</label>
                                                                        <input readonly value="{{$ento5->thorax_l2}}"
                                                                        type="text" name="thorax_l2"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 3</label>
                                                                        <input readonly value="{{$ento5->thorax_l3}}"
                                                                        type="text" name="thorax_l3"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div style="border-top:1px solid;"></div>
                                                                <h3>Abdomen</h3>
                                                             <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">MF</label>
                                                                        <input readonly value="{{$ento5->abdomen_mf}}"
                                                                        type="text" name="abdomen_mf"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 1</label>
                                                                        <input readonly value="{{$ento5->abdomen_l1}}"
                                                                        type="text" name="abdomen_l1"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 2</label>
                                                                        <input readonly value="{{$ento5->abdomen_l2}}"
                                                                        type="text" name="abdomen_l2"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 3</label>
                                                                        <input readonly value="{{$ento5->abdomen_l3}}"
                                                                        type="text" name="abdomen_l3"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning"
                                                    data-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="editModal2{{$ento5->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT ENTO 5 SPECIES</h4><br>
                                            </div>
                                            <form method="post" action="{{ url('/ento5_new_mosq_update') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <input type="hidden" name="id" value="{{$ento5->id}}"
                                                        class="form-control" />
                                                        <hr>
                                                        <center>   <h3><b>ENTO 05 Mosquito</b></h3> </center>
                                                        <hr>
                                                        <div class="col-md-6" >
                                                            
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Address  </label>
                                                                <select name="address" class="form-control" id="ad_list" disabled="">
                                                                    <option value="{{ $ento5->address }}"> {{ $ento5->address }} </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Species  </label>
                                                                <select name="species2" class="form-control">
                                                                    <option value="CX"
                                                                        {{$ento5->species2=="CX"?"selected":""}}> CX quin
                                                                    </option>
                                                                    <option value="Mansonia"
                                                                        {{$ento5->species2=="Mansonia"?"selected":""}}>
                                                                    Mansonia </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Mosquito positive for
                                                                parasite :</label>
                                                                <input value="{{$ento5->positive_mosq}}" type="text"
                                                                name="positive_mosq" class="form-control" >
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Mosquito positive For L3</label>
                                                                <input type="number"
                                                                value="{{$ento5->mq_postive_for_l3}}"
                                                                
                                                                name="mq_postive_for_l3" class="form-control"
                                                                required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Remarks</label>
                                                                <input value="{{$ento5->remarks}}" type="text"
                                                                name="remarks"
                                                                class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" >
                                                            <hr>
                                                            <h3>Head</h3>
                                                            <div class="col-md-12">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">MF</label>
                                                                        <input value="{{$ento5->head_mf}}" type="text"
                                                                        name="head_mf" class="form-control"  value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 1</label>
                                                                        <input value="{{$ento5->head_l1}}" type="text"
                                                                        name="head_l1" class="form-control"  value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 2</label>
                                                                        <input value="{{$ento5->head_l2}}" type="text"
                                                                        name="head_l2" class="form-control"  value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 3</label>
                                                                        <input value="{{$ento5->head_l3}}" type="text"
                                                                        name="head_l3" class="form-control"  value="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <hr>
                                                                <h3>Thorax </h3>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">MF</label>
                                                                        <input value="{{$ento5->thorax_mf}}" type="text"
                                                                        name="thorax_mf" class="form-control" value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 1</label>
                                                                        <input value="{{$ento5->thorax_l1}}" type="text"
                                                                        name="thorax_l1" class="form-control"  value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 2</label>
                                                                        <input value="{{$ento5->thorax_l2}}" type="text"
                                                                        name="thorax_l2" class="form-control"  value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 3</label>
                                                                        <input value="{{$ento5->thorax_l3}}" type="text"
                                                                        name="thorax_l3" class="form-control"  value="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div style="border-top:1px solid;"></div>
                                                                <h3>Abdomen</h3>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">MF</label>
                                                                        <input value="{{$ento5->abdomen_mf}}"
                                                                        type="text" name="abdomen_mf"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 1</label>
                                                                        <input value="{{$ento5->abdomen_l1}}"
                                                                        type="text" name="abdomen_l1"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 2</label>
                                                                        <input value="{{$ento5->abdomen_l2}}"
                                                                        type="text" name="abdomen_l2"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">L 3</label>
                                                                        <input value="{{$ento5->abdomen_l3}}"
                                                                        type="text" name="abdomen_l3"
                                                                        class="form-control"
                                                                        value="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
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
                                @endforeach
                            </tbody>
                            <tfoot>
                                     <th> ID</th>
                                     <th>Species </th>
                                     <th>MPFP</th>
                                     <th>MPF L3</th>
                                     <th>Remarks</th>

                                     <th>Address</th>
                                     <th>Head</th>
                                     <th>Thorax</th>
                                     <th>Abdomen</th>
                                

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