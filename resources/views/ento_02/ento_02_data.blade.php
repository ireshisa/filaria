<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              ENTO 2 DATA FORM<br>
              <small>(To be filled for all fields) </small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#">
                <i class="fa fa-dashboard"> </i> Home</a>
              </li>

              <li>
                <a href="#">ENTO 2</a>
              </li>

              <li class="active">ENTO 2 FORM</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">

              <!-- left column -->
              <form method="post" action="{{url('/ento2_data_save') }}">

                  {{csrf_field() }}
                  <div class="col-md-12">
                      @if(session()->has('message'))
                      @if(session()->get('message')==true)
                      <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Success!</h4>
                          Successfully save your data.
                      </div>
                      @endif
                      @if(session()->get('message')==false)
                      <div class="alert alert-warning alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                          Failed save your data.
                      </div>
                      @endif
                      @endif

                      <!-- general form elements -->
                      <div class="box box-primary">
                          <div class="box-header with-border">
                              <!-- <h3 class="box-title">Quick Example</h3> -->
                          </div>
                          <!-- /.box-header -->
                          <!-- form start -->
                          <div class="box-body">
                              <div class="col-md-6">

                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Ento 2 ID</label>
                                      <select name="ento_02_id" class="form-control">
                                          {{$first=true}}
                                          @foreach ($ento2_list as $list)
                                          <option value="{{ $list->ento_02_id }}">{{$first==true?"Last entered ID":""}}
                                              {{ $list->ento_02_id }} </option>
                                          {{$first==true?$first=false:$first=false}}
                                          @endforeach
                                      </select>
                                  </div>



                                 <div class="form-group">
                                      <label for="exampleInputPassword1">Serial No</label>
                                      <input type="text"  name="serial_no" class="form-control">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Date when trap layed</label>
                                      <input data-date-format="yyyy-mm-d" type="date" name="date" class="form-control">
                                  </div>


                                  <div class="form-group">
                                      <label for="exampleInputEmail1">District</label>
                                 {{--      <select name="distrcit" class="form-control" onchange="getMoh(this.value)">
                                          <option value="">Select</option>
                                          @if(Auth::user()->role!=="ADMIN" & Auth::user()->role !== "AFC")
                                          <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}
                                          </option>
                                          @else
                                          @foreach ($district_list as $dis)
                                          <option value="{{ $dis->district }}">{{ $dis->district }}</option>
                                          @endforeach
                                          @endif
                                      </select> --}}
                                            <input type="text"  name="distrcit"  class="form-control">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">MOH area</label>
                                        <input type="text"  name="moh_area"  class="form-control">
                                     {{--  <select name="moh_area" class="form-control" id="moh_list"
                                          onchange="getPhi(this.value)">
                                          <option value="">Select</option>
                                      </select> --}}
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">PHM area</label>
                                        <input type="text"  name="phm_area"  class="form-control">
                                  </div>




                                  <div class="form-group">
                                      <label for="exampleInputPassword1">GN division</label>
                                      <input type="text"  name="gn_division"  class="form-control">
                                  </div>



                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Chief occupant and address</label>
                                      <input type="text" name="chief_occupant" class="form-control">
                                  </div>




                                  <div class="form-group hide ">
                                      <label for="exampleInputPassword1">Address</label>
                                      <input type="text" name="address" class="form-control">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">GPS latitude</label>
                                      <input type="text"  name="gps_lat" class="form-control">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">GPS longitude</label>
                                      <input type="text" name="gps_long" class="form-control">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Total Cx quin collected</label>
                                      <input type="number" name="total_cx_quin" class="form-control">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Mosquito sent for PCR</label>
                                      <input type="number"  name="mosq_pcr" class="form-control">
                                  </div>

                              </div>


                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Sent to dissection</label>
                                      <input type="text" name="mosq_dis" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">PCR date received</label>
                                      <input data-date-format="yyyy-mm-d" type="date" 
                                          name="pcr_date_rec" class="form-control datepicker_v" id="">
                                  </div>



                                  <div class="form-group">
                                      <label for="exampleInputPassword1">PCR date tested</label>
                                      <input data-date-format="yyyy-mm-d" type="date" name="pcr_date_test" class="form-control  datepicker_v" id="">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> Tube no 1</label>
                                      <input type="text"  name="tube_no" class="form-control">
                                  </div>


                                  <div class="form-group">
                                      <label for="exampleInputPassword1">PCR ref no 1</label>
                                      <input type="text"  name="pcr_ref"
                                          class="form-control">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">PCR remarks 1</label>
                                      <select name="pcr_remarks" class="form-control">
                                          <option value="">Select </option>
                                          <option value="postive">postive</option>
                                          <option value="Negative">Negative</option>
                                          <option value="spoilt">spoilt</option>
                                      </select>
                                  </div>






                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Tube no 2</label>
                                      <input type="text"  name="tube_no2" class="form-control">
                                  </div>



                                  <div class="form-group">
                                      <label for="exampleInputPassword1">PCR ref no 2</label>
                                      <input type="text"  name="pcr_ref_2"
                                          class="form-control">
                                  </div>


                                  <div class="form-group">
                                      <label for="exampleInputPassword1">PCR remarks 2</label>
                                      <select name="pcr_remarks2" class="form-control">
                                          <option value="">Select </option>
                                          <option value="postive">postive</option>
                                          <option value="Negative">Negative</option>
                                          <option value="spoilt">spoilt</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <!-- /.box-body -->

                          <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </div>

                      <!-- /.box -->
                  </div>


              </form>
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
