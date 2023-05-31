<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ENTO 3 DATA VIEW
            <br>
            <small>ento 3 data view all data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ENTO 3</a></li>
            <li class="active">ENTO 3 DATA VIEW</li>
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
                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <!-- <th>Mosquito Genus</th> -->
                                    <th>Mosquito Species</th>
                                    <th>Number of Mosquitos</th>
                                    <th>Percentage of mosquito species </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ento3_data_list as $ento3)
                                <tr>
                                    <td>{{ $ento3->id }}</td>
                                    <!-- <td>{{ $ento3->mosq_genus }}</td> -->
                                    <td>{{ $ento3->mosq_species }}</td>
                                    <td>{{ $ento3->no_of_mosq }}</td>
                                    <td>{{ $ento3->density_per_trap }}</td>
                                    <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-id="{{ $ento3->id }}" data-target="#editModal2{{$ento3->id}}"><i
                                                class="fa fa-pencil" aria-hidden="true"></i>
                                            <strong>Edit</strong> </button>
                                        <a onclick="return confirm('Are you sure Delete this record?')"
                                            href="{{url('/delete_ento3_data') }}/{{ $ento3->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <div id="editModal2{{$ento3->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">x</button>
              <h4 class="modal-title">EDIT ENTO 3 DATA</h4>
              <br />
            </div>
            <form method="post" action="{{ url('/ento3_data_update ') }}">
              {{ csrf_field() }}

<div class="modal-body">   
<div class="box-body">

    <div class="col-md-6">
        <input type="hidden" name="ento_03_id" value="{{$ento3->ento_03_id}}" class="form-control" id="ent_03_id">
        <div class="form-group">
            <label for="exampleInputEmail1">ID</label>
            <input readonly name="id" value="{{$ento3->id}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mosquito Species</label>
            <input readonly name="mosq_species" value="{{$ento3->mosq_species}}" class="form-control">  
        </div>
    </div>



  

<div class="col-md-6">

        <div class="form-group">
            <label for="exampleInputPassword1">Number of mosquitos</label>
            <input  value="{{$ento3->no_of_mosq}}"  type="number" id="no_of_mosq"
            name="no_of_mosq" class="form-control" onchange="get_total_calculate()" >
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Percentage of mosquito species </label>
            <input  onclick="get_total_calculate()" id="density_per_trap"  type="text" pattern="^\d*(\.\d{0,2})?$"
            value="{{$ento3->density_per_trap}}" name="density_per_trap" class="form-control">
        </div>
</div>

</div>
</div>
          <div class="modal-footer">

                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>

             </div>

            </form>
          </div>
        </div>
      </div>



                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <!-- <th>Mosquito Genus</th> -->
                                    <th>Mosquito Species</th>
                                    <th>Number of Mosquitos</th>
                                    <th>Percentage of mosquito species  </th>
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
<!-- /.content-wrapper -->