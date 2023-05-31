<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>MORBIDITY DATA FORM 1 VIEW (C1 FORM)
            <br>
            <small>MORBIDITY  VIEW All Data </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">C</a></li>
            <li class="active">MORBIDITY DATA FORM 1 VIEW (C1 FORM)</li>
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
                        @if(session()->has('update'))
                            @if(session()->get('update')==true)
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                                    Successfully Update Your Record.
                                </div>
                            @endif
                            @if(session()->get('update')==false)
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                                    Failed Update Your Record.
                                </div>
                            @endif
                        @endif

                        @if(session()->has('message'))
                            @if(session()->get('message')==true)
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                                    Successfully Delete Your Record.
                                </div>
                            @endif
                            @if(session()->get('message')==false)
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                                    Failed Delete Your Record.
                                </div>
                            @endif
                        @endif
                        <table id="ento22_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>District</th>
                                <th>Month</th>
                                <th>OPD patients </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($c1_list as $c1)
                                <tr>
                                    <td>{{ $c1->c1_id }}</td>
                                    <td>{{ $c1->district }}</td>
                                    <td>{{ $c1->month }}</td>
                                    <td style="width: 60% !important">


                            <div   style="margin: auto auto !important; width: 100% !important;">
                                 <div class="col-lg-5 " style="margin: auto auto !important;">

                                      <center>  FIRST VISIT MALE</center>

                                      <div class="row" style="margin: auto auto !important;">

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">1</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">2</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">3</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">4</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                       <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">5</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">6</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">7</label>
                                          </div><!-- /input-group -->
                                        
                                        </div><!-- /.col-lg-6 -->



                                      </div>


                                      <div class="row" style="margin: auto auto !important;" >


                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control" name ="male_total_1"  placeholder="0" value="{{ $c1->male_total_1}}">
                                          </div>
                                        </div>

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="male_total_2" placeholder="0" value="{{ $c1->male_total_2}}">
                                          </div>
                                        </div>


                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="male_total_3" placeholder="0" value="{{ $c1->male_total_3}}">
                                          </div>
                                        </div>


                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="male_total_4" placeholder="0" value="{{ $c1->male_total_4}}">
                                          </div>
                                        </div>


                                       <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="male_total_5" placeholder="0" value="{{ $c1->male_total_5}}">
                                          </div>
                                        </div>

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control" name ="male_total_6"  placeholder="0" value="{{ $c1->male_total_6}}">
                                          </div>
                                        </div>


                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control" name ="male_total_7"  placeholder="0" value="{{ $c1->male_total_7}}">
                                          </div><!-- /input-group -->
                                        </div>



                                      </div>

                                    </div>


                                    <div class="col-lg-5 " style="margin: auto auto !important;">

                                      <center>  FIRST VISIT FEMALE</center>
                                      <div class="row" style="margin: auto auto !important;">





                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">1</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">2</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">3</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">4</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                       <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">5</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">6</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">7</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->



                                      </div>


                                      <div class="row" style="margin: auto auto !important;" >


                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control" name="female_total_1"  placeholder="0" value="{{ $c1->female_total_1}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="female_total_2" placeholder="0" value="{{ $c1->female_total_2}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control" name="female_total_3"  placeholder="0" value="{{ $c1->female_total_3}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="female_total_4" placeholder="0" value="{{ $c1->female_total_4}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                       <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="female_total_5" placeholder="0" value="{{ $c1->female_total_5}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="female_total_6" placeholder="0" value="{{ $c1->female_total_6}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="female_total_7" placeholder="0" value="{{ $c1->female_total_7}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                      </div><!-- /.row -->


                                      </div>
                               </div>














                            <div   style="margin: auto auto !important; width: 100% !important;">
                                 <div class="col-lg-5 " style="margin: auto auto !important;">

                                      <center> <h4> SUBSEQUENT VISIT MALE</h4></center>

                                      <div class="row" style="margin: auto auto !important;">

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">1</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">2</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">3</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">4</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                       <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">5</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">6</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">7</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

         <!-- <div class="col-lg-1" style="padding: 5px 3px !important; ">Total</div> -->

                                      </div>


                                      <div class="row" style="margin: auto auto !important;" >


                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control" name ="male_total_1"  placeholder="0" value="{{ $c1->subsequent_male_total_1}}">
                                          </div>
                                        </div>

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="male_total_2" placeholder="0" value="{{ $c1->subsequent_male_total_2}}">
                                          </div>
                                        </div>


                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="male_total_3" placeholder="0" value="{{ $c1->subsequent_male_total_3}}">
                                          </div>
                                        </div>


                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="male_total_4" placeholder="0" value="{{ $c1->subsequent_male_total_4}}">
                                          </div>
                                        </div>


                                       <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="male_total_5" placeholder="0" value="{{ $c1->subsequent_male_total_5}}">
                                          </div>
                                        </div>

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control" name ="male_total_6"  placeholder="0" value="{{ $c1->subsequent_male_total_6}}">
                                          </div>
                                        </div>


                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control" name ="male_total_7"  placeholder="0" value="{{ $c1->subsequent_male_total_7}}">
                                          </div><!-- /input-group -->
                                        </div>



                                      </div>

                                    </div>


                                    <div class="col-lg-5 " style="margin: auto auto !important;">

                                      <center> <h4> SUBSEQUENT VISIT FEMALE</h4></center>
                                      <div class="row" style="margin: auto auto !important;">





                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">1</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">2</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">3</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">4</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->


                                       <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">5</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">6</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 3px !important; ">
                                          <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">7</label>
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->



                                      </div>


                                      <div class="row" style="margin: auto auto !important;" >


                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control" name="female_total_1"  placeholder="0" value="{{ $c1->subsequent_female_total_1}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="female_total_2" placeholder="0" value="{{ $c1->subsequent_female_total_2}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                        <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control" name="female_total_3"  placeholder="0" value="{{ $c1->subsequent_female_total_3}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="female_total_4" placeholder="0" value="{{ $c1->subsequent_female_total_4}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                       <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="female_total_5" placeholder="0" value="{{ $c1->subsequent_female_total_5}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="female_total_6" placeholder="0" value="{{ $c1->subsequent_female_total_6}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                      <div class="col-lg-1 isa-col-1" style="padding: 5px 1px !important; ">
                                          <div class="input-group">
                                            <input type="text" class="form-control"  name="female_total_7" placeholder="0" value="{{ $c1->subsequent_female_total_7}}">
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                      </div><!-- /.row -->


                                      </div>
                               </div>



                                    </td>





                                    <td>
                                        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" style="margin-bottom: 2px;"
                                                data-id="{{ $c1->c1_id }}" data-target="#editModal2{{$c1->c1_id}}"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i>
                                            <strong>Edit</strong></button>
                         {{--                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-id="{{ $c1->c1_id }}" data-target="#editModal{{$c1->c1_id}}"><i
                                                    class="fa fa-eye" aria-hidden="true"></i>
                                            <strong>View</strong></button> --}}

                                        <!-- <a href="{{url('/view_c1_data') }}/{{ $c1->c1_id }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i> View C Data</a> -->


<br>


                                        <a onclick="return confirm('Are you sure Delete this record?')"
                                           href="{{url('/delete_c1') }}/{{ $c1->c1_id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>


                                <div id="editModal2{{$c1->c1_id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT C DETAIL</h4><br>
                                            </div>






                                            <form method="post" action="{{url('/c1_update ') }}">
                                                {{csrf_field() }}
   <div class="form-group">

                <div class="col-md-12">
                    @if(session()->has('message')) @if(session()->get('message')==true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                        <h3><i class="icon fa fa-check"></i> Success!</h3>
                        Successfully save your data.
                    </div>
                    @endif @if(session()->get('message')==false)
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                        <h3><i class="icon fa fa-warning"></i> Failed!</h3>
                        Failed save your data.
                    </div>
                    @endif @endif

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title">Quick Example</h3> -->
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body"></div>
                        <div class="col-md-6">
  <div class="form-group">
                                                        <label for="exampleInputEmail1">ID</label>
                                                        <input readonly value="{{ $c1->c1_id }}" name="c1_id"
                                                               class="form-control">
                                                    </div>


                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">District</label>
                                <input type="text" name="district" class="form-control" value="{{ $c1->district }}"> {{-- <select name="district" class="form-control" onchange="getMoh(this.value)">
                                        <option value="">Select</option>
                                        @if(Auth::user()->role !== "ADMIN" & Auth::user()->role !== "AFC")
                                            <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
                                        @else
                                            @foreach ($district_list as $dis)
                                                <option value="{{ $dis->district }}">{{ $dis->district }}</option>
                                            @endforeach
                                        @endif
                                    </select> --}}
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="text" name="year" class="form-control" value="{{ $c1->year }}">  {{-- <select required name="year" class="form-control">
                                        <option value="">Select Year</option>
                                        @for($i = 2016; $i < 2022; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select> --}}
                            </div>










                            <div class="form-group">
                                <label for="exampleInputPassword1">Month </label>
                                <select name="month" class="form-control" value="{{ $c1->month }}" >
                                        <option value="">Select Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                            </div>

                          <div class="form-group">
                                <label for="exampleInputPassword1">Date</label>
                                <input type="text" name="date" class="form-control" value="{{ $c1->date }}">
                            </div>


                            <!-- <div class="form-group">
                                <label for="exampleInputPassword1">Nunber of clinic sessions</label>
                                <input type="text" name="site" class="form-control" value="{{ $c1->site }}">
                            </div> -->

                     
                            <div class="col-md-12">
                                <br>
                                <br>
                                <br>
                                <hr>
                                <div class="row" style="margin: auto auto !important;">
                                    <center>
                                        <h4> FIRST VISIT MALE</h4>
                                    </center>

                                    <div class="col-lg-12 " style="padding: 5px 3px !important; ">

                                        <div class="col-lg-2" style="padding: 5px 3px !important; ">
                                            Age/Stage
                                        </div>

                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">1</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">2</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">3</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">4</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">5</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">6</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">7</div>
                                        <div class="col-lg-1" style="padding: 5px 3px !important; ">Total</div>
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group">
                                            <label for="exampleInputPassword1" style="padding: 5px 0 0 0 !important; ">0 - 10</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="male_0_10_1" value="{{ $c1->male_0_10_1 }}"  onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class=" col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_0_10_2" value="{{ $c1->male_0_10_2 }}"  onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_0_10_3" value="{{ $c1->male_0_10_3 }}" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_0_10_4" value="{{ $c1->male_0_10_4 }}" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_0_10_5" value="{{ $c1->male_0_10_5 }}" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_0_10_6" value="{{ $c1->male_0_10_6 }}" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                     <div class="input-group ">
                                            <input type="text" class="form-control " name="male_0_10_7" value="{{ $c1->male_0_10_7 }}" onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_0_10_total" value="{{ $c1->male_0_10_total }}"   onchange="total_01()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->




                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">11-20</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_11_20_1" value="{{ $c1->male_11_20_1 }}"  onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_11_20_2" value="{{ $c1->male_11_20_2 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_11_20_3" value="{{ $c1->male_11_20_3 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_11_20_4" value="{{ $c1->male_11_20_4 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_11_20_5" value="{{ $c1->male_11_20_5 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_11_20_6" value="{{ $c1->male_11_20_6 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_11_20_7" value="{{ $c1->male_11_20_7 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_11_20_total" value="{{ $c1->male_11_20_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->





                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">21-30</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_21_30_1" value="{{ $c1->male_21_30_1 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_21_30_2" value="{{ $c1->male_21_30_2 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_21_30_3" value="{{ $c1->male_21_30_3 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_21_30_4" value="{{ $c1->male_21_30_4 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_21_30_5"value="{{ $c1->male_21_30_5}}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_21_30_6" value="{{ $c1->male_21_30_6 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_21_30_7" value="{{ $c1->male_21_30_7 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_21_30_total" value="{{ $c1->male_21_30_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->










                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">31-40</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_31_40_1" value="{{ $c1->male_31_40_1 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_31_40_2" value="{{ $c1->male_31_40_2 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_31_40_3" value="{{ $c1->male_31_40_3 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control" name="male_31_40_4" value="{{ $c1->male_31_40_4 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control" name="male_31_40_5" value="{{ $c1->male_31_40_5 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control" name="male_31_40_6" value="{{ $c1->male_31_40_6 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_31_40_7" value="{{ $c1->male_31_40_7 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_31_40_total" value="{{ $c1->male_31_40_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->








                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">41-50</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_41_50_1" value="{{ $c1->male_41_50_1 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_41_50_2" value="{{ $c1->male_41_50_2 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_41_50_3" value="{{ $c1->male_41_50_3 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_41_50_4" value="{{ $c1->male_41_50_4 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_41_50_5" value="{{ $c1->male_41_50_5 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_41_50_6" value="{{ $c1->male_41_50_6 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_41_50_7" value="{{ $c1->male_41_50_7 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_41_50_total" value="{{ $c1->male_41_50_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->







                                <div class="row " style="margin: auto auto !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">51-60</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_51_60_1" value="{{ $c1->male_51_60_1 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_51_60_2" value="{{ $c1->male_51_60_2 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_51_60_3" value="{{ $c1->male_51_60_3 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_51_60_4" value="{{ $c1->male_51_60_4 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_51_60_5" value="{{ $c1->male_51_60_5 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_51_60_6" value="{{ $c1->male_51_60_6 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_51_60_7" value="{{ $c1->male_51_60_7 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_51_60_total" value="{{ $c1->male_51_60_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->



                                <div class="row " style="margin: auto auto !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">61-70</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_61_70_1" value="{{ $c1->male_61_70_1 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_61_70_2" value="{{ $c1->male_61_70_2 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_61_70_3" value="{{ $c1->male_61_70_3 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_61_70_4" value="{{ $c1->male_61_70_4 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_61_70_5" value="{{ $c1->male_61_70_5 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_61_70_6" value="{{ $c1->male_61_70_6 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_61_70_7" value="{{ $c1->male_61_70_7 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_61_70_total" value="{{ $c1->male_61_70_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->





                                <div class="row " style="margin: auto auto !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">71-80</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_71_80_1" value="{{ $c1->male_71_80_1 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_71_80_2" value="{{ $c1->male_71_80_2 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_71_80_3" value="{{ $c1->male_71_80_3 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_71_80_4" value="{{ $c1->male_71_80_4 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_71_80_5" value="{{ $c1->male_71_80_5 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_71_80_6" value="{{ $c1->male_71_80_6 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_71_80_7" value="{{ $c1->male_71_80_7 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_71_80_total" value="{{ $c1->male_71_80_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->








                                <div class="row " style="margin: auto auto !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">81 and above</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_81_1" value="{{ $c1->male_81_1 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_81_2" value="{{ $c1->male_81_2 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_81_3" value="{{ $c1->male_81_3 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_81_4" value="{{ $c1->male_81_4 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_81_5" value="{{ $c1->male_81_5 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_81_6" value="{{ $c1->male_81_6 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_81_7" value="{{ $c1->male_81_7 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_81_total" value="{{ $c1->male_81_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->








                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">Total</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_total_1" value="{{ $c1->male_total_1 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_total_2" value="{{ $c1->male_total_2 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_total_3" value="{{ $c1->male_total_3 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_total_4" value="{{ $c1->male_total_4 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_total_5" value="{{ $c1->male_total_5 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                        </div>
                                            <input type="text" class="form-control " name="male_total_6" value="{{ $c1->male_total_6 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_total_7" value="{{ $c1->male_total_7 }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="male_total_total" value="{{ $c1->male_total_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
</div>

                                </div>
                                <!-- /.row -->






                                <!--   /////////////////////////////////////////////////////////////////----------------------------------------------------------------------------     -->










                                <hr>






                                <div class="row " style="margin: auto auto !important; ">
                                    <center>
                                        <h4> SUBSEQUENT VISIT MALE</h4>
                                    </center>




                                    <div class="col-lg-12 " style="padding: 5px 3px !important; ">
                                        <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                            Age/Stage
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                            1
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                            2
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                            3
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                            4
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                            5
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                            6
                                        </div>
                                        <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                            7
                                        </div>


                                       <div class="col-lg-1" style="padding: 5px 3px !important; ">Total</div>



                                    </div>
                                    <!-- /.col-lg-6 -->










                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 " style="padding: 5px 0 0 0 !important; ">0 - 10</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_0_10_1" value="{{ $c1->subsequent_male_0_10_1 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_0_10_2" value="{{ $c1->subsequent_male_0_10_2 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_0_10_3" value="{{ $c1->subsequent_male_0_10_3 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_0_10_4" value="{{ $c1->subsequent_male_0_10_4 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_0_10_5" value="{{ $c1->subsequent_male_0_10_5 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_0_10_6"  value="{{ $c1->subsequent_male_0_10_6 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_0_10_7" value="{{ $c1->subsequent_male_0_10_7 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_0_10_total" value="{{ $c1->subsequent_male_0_10_total }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->




                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">11-20</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_11_20_1" value="{{ $c1->subsequent_male_11_20_1 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_11_20_2" value="{{ $c1->subsequent_male_11_20_2 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_11_20_3" value="{{ $c1->subsequent_male_11_20_3 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_11_20_4" value="{{ $c1->subsequent_male_11_20_4 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_11_20_5" value="{{ $c1->subsequent_male_11_20_5 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_11_20_6" value="{{ $c1->subsequent_male_11_20_6 }}"  onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_11_20_7" value="{{ $c1->subsequent_male_11_20_7 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_11_20_total" value="{{ $c1->subsequent_male_11_20_total }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->







                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">21-30</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                              <input type="text" class="form-control " name="subsequent_male_21_30_1" onchange="total_02()" value="{{ $c1->subsequent_male_21_30_1 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_21_30_2" onchange="total_02()" value="{{ $c1->subsequent_male_21_30_2 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                              <input type="text" class="form-control " name="subsequent_male_21_30_3" onchange="total_02()" value="{{ $c1->subsequent_male_21_30_3 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_21_30_4" onchange="total_02()" value="{{ $c1->subsequent_male_21_30_4 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                          <input type="text" class="form-control " name="subsequent_male_21_30_5" onchange="total_02()" value="{{ $c1->subsequent_male_21_30_5 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_21_30_6" onchange="total_02()" value="{{ $c1->subsequent_male_21_30_6 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                      <input type="text" class="form-control " name="subsequent_male_21_30_7" onchange="total_02()" value="{{ $c1->subsequent_male_21_30_7 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_21_30_total" onchange="total_02()" value="{{ $c1->subsequent_male_21_30_total }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->



                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">31-40</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_31_40_1" onchange="total_02()" value="{{ $c1->subsequent_male_31_40_1 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_31_40_2" onchange="total_02()" value="{{ $c1->subsequent_male_31_40_2 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_31_40_3" onchange="total_02()" value="{{ $c1->subsequent_male_31_40_3 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_31_40_4" onchange="total_02()" value="{{ $c1->subsequent_male_31_40_4 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_31_40_5" onchange="total_02()" value="{{ $c1->subsequent_male_31_40_5 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_31_40_6" onchange="total_02()" value="{{ $c1->subsequent_male_31_40_6 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_31_40_7" onchange="total_02()" value="{{ $c1->subsequent_male_31_40_7 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_31_40_total" onchange="total_02()" value="{{ $c1->subsequent_male_31_40_total }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->



                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">41-50</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_41_50_1" onchange="total_02()" value="{{ $c1->subsequent_male_41_50_1 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_41_50_2" onchange="total_02()" value="{{ $c1->subsequent_male_41_50_2 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_41_50_3" onchange="total_02()" value="{{ $c1->subsequent_male_41_50_3 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_41_50_4" onchange="total_02()" value="{{ $c1->subsequent_male_41_50_4 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_41_50_5" onchange="total_02()" value="{{ $c1->subsequent_male_41_50_5 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_41_50_6" onchange="total_02()" value="{{ $c1->subsequent_male_41_50_6 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_41_50_7" onchange="total_02()" value="{{ $c1->subsequent_male_41_50_7 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_41_50_total" onchange="total_02()" value="{{ $c1->subsequent_male_41_50_total }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->








                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">51-60</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_51_60_1" onchange="total_02()" value="{{ $c1->subsequent_male_51_60_1 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_51_60_2" onchange="total_02()" value="{{ $c1->subsequent_male_51_60_2 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_51_60_3" onchange="total_02()" value="{{ $c1->subsequent_male_51_60_3 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_51_60_4" onchange="total_02()" value="{{ $c1->subsequent_male_51_60_4 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_51_60_5" onchange="total_02()" value="{{ $c1->subsequent_male_51_60_5 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_51_60_6" onchange="total_02()" value="{{ $c1->subsequent_male_51_60_6 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_51_60_7" onchange="total_02()" value="{{ $c1->subsequent_male_51_60_7 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_51_60_total" onchange="total_02()" value="{{ $c1->subsequent_male_51_60_total }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->












                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">61-70</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_61_70_1" onchange="total_02()" value="{{ $c1->subsequent_male_61_70_1 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_61_70_2" onchange="total_02()" value="{{ $c1->subsequent_male_61_70_2 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_61_70_3" onchange="total_02()" value="{{ $c1->subsequent_male_61_70_3 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_61_70_4" onchange="total_02()" value="{{ $c1->subsequent_male_61_70_4 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_61_70_5" onchange="total_02()" value="{{ $c1->subsequent_male_61_70_5 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_61_70_6" onchange="total_02()" value="{{ $c1->subsequent_male_51_60_1 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_61_70_7" onchange="total_02()" value="{{ $c1->subsequent_male_61_70_7 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_61_70_total" onchange="total_02()" value="{{ $c1->subsequent_male_61_70_total }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->














                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">71-80</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_71_80_1" onchange="total_02()" value="{{ $c1->subsequent_male_71_80_1 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_71_80_2" onchange="total_02()" value="{{ $c1->subsequent_male_71_80_2 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_71_80_3" onchange="total_02()" value="{{ $c1->subsequent_male_71_80_3 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_71_80_4" onchange="total_02()" value="{{ $c1->subsequent_male_71_80_4 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_71_80_5" onchange="total_02()" value="{{ $c1->subsequent_male_71_80_5 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_71_80_6" onchange="total_02()" value="{{ $c1->subsequent_male_71_80_6 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_71_80_7" onchange="total_02()" value="{{ $c1->subsequent_male_71_80_7 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_71_80_total" onchange="total_02()" value="{{ $c1->subsequent_male_71_80_total }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->













                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">81 and above</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_80_1" onchange="total_02()" value="{{ $c1->subsequent_male_80_1 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_80_2" onchange="total_02()" value="{{ $c1->subsequent_male_80_2 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                              <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                <div class="input-group ">
                                  <input type="text" class="form-control " name="subsequent_male_80_3" onchange="total_02()" value="{{ $c1->subsequent_male_80_3 }}">
                                </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_80_4" onchange="total_02()" value="{{ $c1->subsequent_male_80_4 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_80_5" onchange="total_02()" value="{{ $c1->subsequent_male_80_5 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_80_6" onchange="total_02()" value="{{ $c1->subsequent_male_80_6 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_80_7" onchange="total_02()" value="{{ $c1->subsequent_male_80_7 }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_80_total" onchange="total_02()" value="{{ $c1->subsequent_male_80_total }}">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                </div>
                                <!-- /.row -->









                                <div class="row " style="margin: auto auto !important; ">

                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <label for="exampleInputPassword1 ">Total</label>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_total_1" value="{{ $c1->subsequent_male_total_1 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_total_2" value="{{ $c1->subsequent_male_total_2 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_total_3" value="{{ $c1->subsequent_male_total_3 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_total_4"  value="{{ $c1->subsequent_male_total_4 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_total_5" value="{{ $c1->subsequent_male_total_5 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_total_6" value="{{ $c1->subsequent_male_total_6 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->


                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_total_7" value="{{ $c1->subsequent_male_total_7 }}" onchange="total_02()">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.col-lg-6 -->

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="female_total_total" value="{{ $c1->female_total_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                </div>
                                <!-- /.row -->

                                <!--       /////////////////////////////////////////////////////////////////----------------------------------------------------------------------------       -->
                            </div>















                        </div>
                        <div class="col-md-6 ">


                            <div class="form-group ">
                                <label for="exampleInputPassword1 ">Total number of lymphoedema patients registered
                                        at the clinic </label>
                                <input type="text" name="total_num_lymphed" class="form-control ">
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputPassword1 ">Total number of hydrocele patients registered at
                                        the clinic</label>
                                <input type="text" name="total_num_hydro" class="form-control " value="0">
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputPassword1 ">Follow up of MF positive patients (local)</label>
                                <input type="text" name="mf_pos_patient" class="form-control ">
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputPassword1 ">No of patients referred from other institutions</label>
                                <input type="text" name="opd_patient" class="form-control ">
                            </div>
                            <br>
                            <br>
                            <br>




                            <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                            <hr>
                            <div class="row " style="margin: auto auto !important; ">
                                <center>
                                    <h4> FIRST VISIT FEMALE</h4>
                                </center>


                                <div class="col-lg-12 " style="padding: 5px 3px !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        Age/Stage
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        1
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        2
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        3
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        4
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        5
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        6
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        7
                                    </div>

                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        Total
                                    </div>

                                    
                                </div>
                                <!-- /.col-lg-6 -->










                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 " style="padding: 5px 0 0 0 !important; ">0 - 10</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_0_10_1" value="{{ $c1->female_0_10_1 }}"  onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_0_10_2" value="{{ $c1->female_0_10_2 }}"  onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_0_10_3" value="{{ $c1->female_0_10_3 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_0_10_4" value="{{ $c1->female_0_10_4 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_0_10_5" value="{{ $c1->female_0_10_5 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_0_10_6" value="{{ $c1->female_0_10_6 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_0_10_7" value="{{ $c1->female_0_10_7 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_0_10_total" value="{{ $c1->female_0_10_total }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->


                            <div class="row " style="margin: auto auto !important; ">
                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">11-20</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_11_20_1" value="{{ $c1->female_11_20_1 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_11_20_2" value="{{ $c1->female_11_20_2 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_11_20_3" value="{{ $c1->female_11_20_3 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_11_20_4" value="{{ $c1->female_11_20_4 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_11_20_5" value="{{ $c1->female_11_20_5 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_11_20_6" value="{{ $c1->female_11_20_6 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_11_20_7" value="{{ $c1->female_11_20_7 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_11_20_total" value="{{ $c1->female_11_20_total }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->









                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">21-30</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_21_30_1" value="{{ $c1->female_21_30_1 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_21_30_2" value="{{ $c1->female_21_30_2 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_21_30_3" value="{{ $c1->female_21_30_3 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_21_30_4" value="{{ $c1->female_21_30_4 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_21_30_5" value="{{ $c1->female_21_30_5 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_21_30_6" value="{{ $c1->female_21_30_6 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_21_30_7" value="{{ $c1->female_21_30_7 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_21_30_total" value="{{ $c1->female_21_30_total }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->


                            <div class="row " style="margin: auto auto !important; ">
                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">31-40</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_31_40_1" value="{{ $c1->female_31_40_1 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_31_40_2" value="{{ $c1->female_31_40_2 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_31_40_3" value="{{ $c1->female_31_40_3 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_31_40_4" value="{{ $c1->female_31_40_4 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_31_40_5" value="{{ $c1->female_31_40_5 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_31_40_6" value="{{ $c1->female_31_40_6 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_31_40_7" value="{{ $c1->female_31_40_7 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_31_40_total" value="{{ $c1->female_31_40_total }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->







                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">41-50</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_41_50_1" value="{{ $c1->female_41_50_1 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_41_50_2" value="{{ $c1->female_41_50_2 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_41_50_3" value="{{ $c1->female_41_50_3 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_41_50_4" value="{{ $c1->female_41_50_4 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_41_50_5" value="{{ $c1->female_41_50_5 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_41_50_6" value="{{ $c1->female_41_50_6 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_41_50_7" value="{{ $c1->female_41_50_7 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_41_50_total" value="{{ $c1->female_41_50_total }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->







                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">51-60</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_51_60_1" value="{{ $c1->female_51_60_1 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_51_60_2" value="{{ $c1->female_51_60_2 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_51_60_3" value="{{ $c1->female_51_60_3 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_51_60_4" value="{{ $c1->female_51_60_4 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_51_60_5" value="{{ $c1->female_51_60_5 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_51_60_6" value="{{ $c1->female_51_60_6 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_51_60_7" value="{{ $c1->female_51_60_7 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_51_60_total" value="{{ $c1->female_51_60_total }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->






                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">61-70</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_61_70_1" value="{{ $c1->female_61_70_1 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_61_70_2" value="{{ $c1->female_61_70_2 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_61_70_3" value="{{ $c1->female_61_70_3 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_61_70_4" value="{{ $c1->female_61_70_4 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_61_70_5" value="{{ $c1->female_61_70_5 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_61_70_6" value="{{ $c1->female_61_70_6 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_61_70_7" value="{{ $c1->female_61_70_7 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_61_70_total" value="{{ $c1->female_61_70_total }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->








                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">71-80</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_71_80_1" value="{{ $c1->female_71_80_1 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_71_80_2" value="{{ $c1->female_71_80_2 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_71_80_3" value="{{ $c1->female_71_80_3 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_71_80_4" value="{{ $c1->female_71_80_4 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_71_80_5" value="{{ $c1->female_71_80_5 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_71_80_6" value="{{ $c1->female_71_80_6 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_71_80_7" value="{{ $c1->female_71_80_7 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_71_80_total" value="{{ $c1->female_71_80_total }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->







                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">81 and above</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_80_1" value="{{ $c1->female_80_1 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_80_2" value="{{ $c1->female_80_2 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_80_3" value="{{ $c1->female_80_3 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_80_4" value="{{ $c1->female_80_4 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_80_5" value="{{ $c1->female_80_5 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_80_6" value="{{ $c1->female_80_6 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_80_7" value="{{ $c1->female_80_7 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_80_total" value="{{ $c1->female_80_total }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->






                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">Total</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_total_1" value="{{ $c1->female_total_1 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_total_2" value="{{ $c1->female_total_2 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_total_3" value="{{ $c1->female_total_3 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_total_4" value="{{ $c1->female_total_4 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_total_5" value="{{ $c1->female_total_5 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_total_6" value="{{ $c1->female_total_6 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="female_total_7" value="{{ $c1->female_total_7 }}" onchange="total_03()">
                                    </div>
                                    <!-- /input-group -->
                                </div>





                                      <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_male_total_total" value="{{ $c1->subsequent_male_total_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>


                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->

                            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->












                            <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                            <hr>
                            <div class="row " style="margin: auto auto !important; ">
                                <center>
                                    <h4> SUBSEQUENT VISITS FEMALE</h4>
                                </center>


                                <div class="col-lg-12 " style="padding: 5px 3px !important; ">
                                    <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                        Age/Stage
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        1
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        2
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        3
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        4
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        5
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        6
                                    </div>
                                    <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        7
                                    </div>

                                     <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        Total
                                    </div>


                                </div>
                                <!-- /.col-lg-6 -->











                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 " style="padding: 5px 0 0 0 !important; ">0 - 10</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_0_10_1" value="{{ $c1->subsequent_female_0_10_1 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_0_10_2" value="{{ $c1->subsequent_female_0_10_2 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_0_10_3" value="{{ $c1->subsequent_female_0_10_3 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_0_10_4" value="{{ $c1->subsequent_female_0_10_4 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_0_10_5" value="{{ $c1->subsequent_female_0_10_5 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_0_10_6" value="{{ $c1->subsequent_female_0_10_6 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_0_10_7" value="{{ $c1->subsequent_female_0_10_7 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_0_10_total" value="{{ $c1->subsequent_female_0_10_total }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->





                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">11-20</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_11_20_1" value="{{ $c1->subsequent_female_11_20_1 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_11_20_2" value="{{ $c1->subsequent_female_11_20_2 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_11_20_3" value="{{ $c1->subsequent_female_11_20_3 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_11_20_4" value="{{ $c1->subsequent_female_11_20_4 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_11_20_5" value="{{ $c1->subsequent_female_11_20_5 }}" onchange="total_04()">
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_11_20_6" value="{{ $c1->subsequent_female_11_20_6 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_11_20_7" value="{{ $c1->subsequent_female_11_20_7 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_11_20_total" value="{{ $c1->subsequent_female_11_20_total }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->














                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">21-30</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_21_30_1" value="{{ $c1->subsequent_female_21_30_1 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_21_30_2" value="{{ $c1->subsequent_female_21_30_2 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_21_30_3" value="{{ $c1->subsequent_female_21_30_3 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_21_30_4" value="{{ $c1->subsequent_female_21_30_4 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_21_30_5" value="{{ $c1->subsequent_female_21_30_5 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_21_30_6" value="{{ $c1->subsequent_female_21_30_6 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_21_30_7" value="{{ $c1->subsequent_female_21_30_7 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->


                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_21_30_total" value="{{ $c1->subsequent_female_21_30_total }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->


                            <div class="row " style="margin: auto auto !important; ">
                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">31-40</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_31_40_1"  onchange="total_04()" value="{{ $c1->subsequent_female_31_40_1 }}">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_31_40_2"  onchange="total_04()" value="{{ $c1->subsequent_female_31_40_2 }}">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_31_40_3"  onchange="total_04()" value="{{ $c1->subsequent_female_31_40_3 }}">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_31_40_4"  onchange="total_04()" value="{{ $c1->subsequent_female_31_40_4 }}">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_31_40_5"  onchange="total_04()" value="{{ $c1->subsequent_female_31_40_5 }}">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_31_40_6"  onchange="total_04()" value="{{ $c1->subsequent_female_31_40_6 }}">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_31_40_7"  onchange="total_04()" value="{{ $c1->subsequent_female_31_40_7 }}">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_31_40_total"  onchange="total_04()" value="{{ $c1->subsequent_female_31_40_total }}">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->

                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">41-50</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_41_50_1" value="{{ $c1->subsequent_female_41_50_1 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_41_50_2" value="{{ $c1->subsequent_female_41_50_2 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_41_50_3" value="{{ $c1->subsequent_female_41_50_3 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_41_50_4" value="{{ $c1->subsequent_female_41_50_4 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_41_50_5" value="{{ $c1->subsequent_female_41_50_5 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_41_50_6" value="{{ $c1->subsequent_female_41_50_6 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_41_50_7" value="{{ $c1->subsequent_female_41_50_7 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_41_50_total" value="{{ $c1->subsequent_female_41_50_total }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->











                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">51-60</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_51_60_1" value="{{ $c1->subsequent_female_51_60_1 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_51_60_2" value="{{ $c1->subsequent_female_51_60_2 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_51_60_3" value="{{ $c1->subsequent_female_51_60_3 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_51_60_4" value="{{ $c1->subsequent_female_51_60_4 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_51_60_5" value="{{ $c1->subsequent_female_51_60_5 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_51_60_6" value="{{ $c1->subsequent_female_51_60_6 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_51_60_7" value="{{ $c1->subsequent_female_51_60_7 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_51_60_total" value="{{ $c1->subsequent_female_51_60_total }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->

















                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">61-70</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_61_70_1" value="{{ $c1->subsequent_female_61_70_1 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_61_70_2" value="{{ $c1->subsequent_female_61_70_2 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_61_70_3" value="{{ $c1->subsequent_female_61_70_3 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_61_70_4" value="{{ $c1->subsequent_female_61_70_4 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_61_70_5" value="{{ $c1->subsequent_female_61_70_5 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_61_70_6" value="{{ $c1->subsequent_female_61_70_6 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_61_70_7" value="{{ $c1->subsequent_female_61_70_7 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_61_70_total" value="{{ $c1->subsequent_female_61_70_total }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->








                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">71-80</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_71_80_1" value="{{ $c1->subsequent_female_71_80_1 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_71_80_2" value="{{ $c1->subsequent_female_71_80_2 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_71_80_3" value="{{ $c1->subsequent_female_71_80_3 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_71_80_4" value="{{ $c1->subsequent_female_71_80_4 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_71_80_5" value="{{ $c1->subsequent_female_71_80_5 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_71_80_6" value="{{ $c1->subsequent_female_71_80_6 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_71_80_7" value="{{ $c1->subsequent_female_71_80_7 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_71_80_total" value="{{ $c1->subsequent_female_71_80_total }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->










                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">81 and above</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_81_1" value="{{ $c1->subsequent_female_81_1 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_81_2" value="{{ $c1->subsequent_female_81_2 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_81_3" value="{{ $c1->subsequent_female_81_3 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_81_4" value="{{ $c1->subsequent_female_81_4 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_81_5" value="{{ $c1->subsequent_female_81_5 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_81_6" value="{{ $c1->subsequent_female_81_6 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_81_7" value="{{ $c1->subsequent_female_81_7 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
      <input type="text" class="form-control " name="subsequent_female_81_total" value="{{ $c1->subsequent_female_81_total }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                            </div>
                            <!-- /.row -->









                            <div class="row " style="margin: auto auto !important; ">

                                <div class="col-lg-2 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <label for="exampleInputPassword1 ">Total</label>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_total_1" value="{{ $c1->subsequent_female_total_1 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_total_2" value="{{ $c1->subsequent_female_total_2 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_total_3" value="{{ $c1->subsequent_female_total_3 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_total_4" value="{{ $c1->subsequent_female_total_4 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_total_5" value="{{ $c1->subsequent_female_total_5 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_total_6" value="{{ $c1->subsequent_female_total_6 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /.col-lg-6 -->

                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control " name="subsequent_female_total_7" value="{{ $c1->subsequent_female_total_7 }}" onchange="total_04()">
                                    </div>
                                    <!-- /input-group -->
                                </div>


                                <div class="col-lg-1 " style="padding: 5px 3px !important; ">
                                        <div class="input-group ">
                                            <input type="text" class="form-control " name="subsequent_female_total_total" value="{{ $c1->subsequent_female_total_total }}" onchange="total_01() ">
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->

                            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->









                            <style>
                                .form-control {
                                    padding: 0 0 !important;
                                    color: red;
                                }
                            </style>





                            <!-- male_0_10_total -->






                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>
                <center>
                    <div class="box-footer mr-auto ml-auto ">
                        <button type="submit " class="btn btn-primary ">Submit</button>
                    </div>

                </center>

                <!-- /.box -->
        </div>


        </form>




































                                        </div>
                                    </div>
                                </div>


                                <div id="editModal{{$c1->c1_id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">VIEW C DETAIL</h4><br>
                                            </div>

                                            <div class="modal-body">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">ID</label>
                                                        <input readonly value="{{ $c1->c1_id }}" name="c1_id"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">District</label>
                                                        <input readonly value="{{ $c1->district }}" name="district"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Month </label>
                                                        <input readonly value="{{ $c1->month }}" name="month"
                                                               class="form-control" id="moh_list">
                                                    </div>




                                                </div>
                                                <div class="col-md-6">


                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Total text of lymphoedema
                                                            patients Registered
                                                            at the clinic </label>
                                                        <input readonly value="{{ $c1->total_num_lymphed }}" type="text"
                                                               name="total_num_lymphed" class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Total text of Hydrocele
                                                            patiens registerd at
                                                            the clinic</label>
                                                        <input readonly value="{{ $c1->total_num_hydro }}" type="text"
                                                               name="total_num_hydro" class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Follow up MF positive
                                                            Patients</label>
                                                        <input readonly value="{{ $c1->mf_pos_patient }}" type="text"
                                                               name="mf_pos_patient" class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">No of patients referred from other institutions</label>
                                                        <input readonly value="{{ $c1->opd_patient }}" type="text"
                                                               name="opd_patient" class="form-control">
                                                    </div>


                        <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Nunber of clinic sessions</label>
                                    <input type="text" name="site" class="form-control" value="{{ $c1->site }}">
                                </div> -->


                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <th>ID</th>
                            <th>District</th>
                            <th>Month</th>
                            <th>OPD patients </th>
                            <th>Action</th>
                            <th> </th>
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