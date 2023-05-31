<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              ENTO 2 SINGLE VIEW<br>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">ENTO 2</a></li>
              <li class="active">ENTO 2 SINGLE VIEW</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">

              <!-- left column -->
              <form method="post" action="{{url('/ento2_save') }}">

                  {{csrf_field() }}
                  <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="box box-primary">
                          <div class="box-header with-border">
                              <!-- <h3 class="box-title">Quick Example</h3> -->
                          </div>
                          <!-- /.box-header -->
                          <!-- form start -->
                          <div class="box-body">
                              <div class="col-md-6">
                                  <h3>ENTO 2</h3>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1"> District </label>
                                      <input required type="text" name="district" class="form-control" >
                                  </div>
                                  <div class="form-group hide" style="display: none;">
                                      <label for="exampleInputPassword1"> Method </label>
                                      <input required type="text" name="method" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> Total CX quin mosquitos </label>
                                      <input required type="number" name="total_cx_quin_mosq" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Total traps</label>
                                      <input required type="number" name="total_traps" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Mosquito density per trap</label>
                                      <input required type="number" name="mosq_density_per_trap" class="form-control" >
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Name of HEO </label>
                                      <input required type="text" name="heo"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Date   </label>
                                      <input required type="date" name="date" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Regional medical officer/entomologist  </label>
                                      <input required type="text" name="rmo_ent"
                                          class="form-control">
                                  </div>
                                  <h3>ENTO 2 DATA</h3>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Date</label>
                                      <input required type="date"  name="date"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Serial No</label>
                                      <input required type="text"  name="serial_no"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">MOH area</label>
                                      <input required type="text"  name="moh_area"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">GN division</label>
                                      <input required type="text"  name="gn_division"
                                          class="form-control">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <h3>ENTO 2 DATA</h3>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Chief occupant</label>
                                      <input required type="text"  name="chief_occupant"
                                          class="form-control">
                                  </div>
                                  <div class="form-group hide">
                                      <label for="exampleInputPassword1">Address</label>
                                      <input required type="text"  name="address"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">GPS latitude</label>
                                      <input required type="number"  name="gps_lat"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">GPS longitude</label>
                                      <input required type="number"  name="gps_long"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Total CX quin collected</label>
                                      <input required type="number" name="total_cx_quin" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Mosquito PCR</label>
                                      <input required type="number" name="mosq_pcr"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Mosquito dis</label>
                                      <input required type="number"  name="mosq_dis"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Tube No</label>
                                      <input required type="text"  name="tube_no"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">PCR date received</label>
                                      <input required type="date"  name="pcr_date_rec"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">PCR ref no</label>
                                      <input required type="text"  name="pcr_ref"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">PCR date tested</label>
                                      <input required type="date"  name="pcr_date_test"
                                          class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">PCR remarks</label>
                                      <input required type="text"  name="pcr_remarks"
                                          class="form-control">
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