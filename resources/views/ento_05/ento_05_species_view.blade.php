<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ENTO 05 SPECIES VIEW
            <br>
            <small>ento 5 species view all data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/ento5_view">ENTO 5</a></li>
            <li class="active">ENTO 05 SPECIES View</li>
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
                        @if(session()->has('update')) @if(session()->get('update')==true)
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
                        <table id="ento5_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Ento 5 ID</th>
                                    <th>Species  </th>
                                    <th>Total Mosquito</th>
                                    <th>UF  </th>
                                    <th>F</th>
                                    <th>SG</th>
                                    <th>G</th>
                                    <th>No of spoiled</th>
                                    <th>No of disscected mosquito </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ento5_species_list as $ento5)
                                <tr>
                                    <td>{{ $ento5->ento_05_id }}</td>
                                    <td>{{ $ento5->species }}</td>
                                    <td>{{ $ento5->total_mosqito }}</td>
                                    <td>{{ $ento5->abdo_uf }}</td>
                                    <td>{{ $ento5->abdo_f }}</td>
                                    <td>{{ $ento5->abdo_sg }}</td>
                                    <td>{{ $ento5->abdo_g }}</td>
                                    <td>{{ $ento5->no_of_spoiled }}</td>
                                    <td>{{ $ento5->no_of_dissected }}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-id="{{ $ento5->id }}" data-target="#editModal2{{$ento5->id}}"><i
                                                class="fa fa-pencil" aria-hidden="true"></i>
                                            <strong>Edit</strong> </button>
                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_ento5_species') }}/{{ $ento5->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <div id="editModal2{{$ento5->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT ENTO 5 DISSECTION</h4><br>
                                            </div>
                                            <form method="post" action="{{ url('/ento5_species_update ') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <input type="hidden" name="id" value="{{$ento5->id}}" class="form-control" />

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Ento 5 ID</label>
                                                                <select name="ento_05_id" class="form-control">
                                                                    <option value="">Select Ento 5 Id</option>
                                                                    @foreach ($ento5_list as $list)
                                                                    <option
                                                                        {{ $ento5->ento_05_id==$list->ento_05_id?"selected":"" }}
                                                                        value="{{ $list->ento_05_id }}">
                                                                        {{ $list->ento_05_id }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Dissected by</label>
                                                                <input value="{{ $ento5->dissected_by }}" type="text" name="dissected_by" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date</label>
                                                                <input value="{{ $ento5->dissected_by_date }}" data-date-format="yyyy-mm-d" type="text" name="dissected_by_date" class="datepicker_v form-control pull-right">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Examined by  </label>
                                                                <input value="{{ $ento5->examined }}" type="text" name="examined" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date</label>
                                                                <input value="{{ $ento5->examined_date }}" data-date-format="yyyy-mm-d" type="date" name="examined_date" class="datepicker_v form-control pull-right">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Entered in data
                                                                    register by HEO</label>
                                                                <input value="{{ $ento5->entered }}" type="date" name="entered" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Date</label>
                                                                <input value="{{ $ento5->entered_date }}" data-date-format="yyyy-mm-d" type="date" name="entered_date" class="datepicker_v form-control pull-right">
                                                            </div>


                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Species  </label>
                                                                <select name="species" class="form-control">
                                                                    <option {{ $ento5->species=="CX"?"selected":"" }}
                                                                        value="CX"> CX </option>
                                                                    <option
                                                                        {{ $ento5->species=="Mansonia"?"selected":"" }}
                                                                        value="Mansonia"> Mansonia </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Total
                                                                   mosquito</label>
                                                                <input value="{{ $ento5->total_mosqito }}" type="number" name="total_mosqito" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">UF  </label>
                                                                <input value="{{ $ento5->abdo_uf }}" type="number" name="abdo_uf" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">F  </label>
                                                                <input value="{{ $ento5->abdo_f }}" type="number" name="abdo_f" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">SG</label>
                                                                <input value="{{ $ento5->abdo_sg }}" type="number" name="abdo_sg" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">G</label>
                                                                <input value="{{ $ento5->abdo_sg }}" type="number" name="abdo_g" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of spoiled</label>
                                                                <input value="{{ $ento5->no_of_spoiled }}" type="number" name="no_of_spoiled" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of disscected
                                                                    mosquito</label>
                                                                <input value="{{ $ento5->no_of_dissected }}" type="number" name="no_of_dissected" class="form-control" >
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

                                @endforeach
                            </tbody>
                            <tfoot>
                                <th> Ento 5 ID</th>
                                <th>Species  </th>
                                <th>Total Mosquito</th>
                                <th>UF  </th>
                                <th>F</th>
                                <th>SG</th>
                                <th>G</th>
                                <th>No of spoiled</th>
                                <th>No of disscected mosquito </th>
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
