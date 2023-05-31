  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              CASE INVESTIGATION FORM<br>
              <small>(To be filled for all mf positive Lymphatic Filariasis patients during visit to treat the patient)
              </small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <!-- <li><a href="#">Forms</a></li> -->
              <li class="active">CASE INVESTIGATION FORM</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <!-- left column --> 
              <form method="post" action="/register_case_lx">
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
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">District</label>
                                      <input type="text" name="district" class="form-control"
                                          placeholder="District name ...">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">MOH area</label>
                                      <input type="text" name="moh_area" class="form-control"
                                          placeholder="MOH Area ...">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Patient ID number </label>
                                      <input type="text" name="patient_id" class="form-control"
                                          placeholder="Patient ID Number  ...">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Date of reporting </label>
                                      <input type="date" name="date_of_rep" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> Name of the patient</label>
                                      <input type="text" name="name_of_patient" class="form-control"
                                          placeholder="Name Of Patient ...">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Sex</label>
                                      <select name="sex" id="" class="form-control">
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Age of the patient</label>
                                      <input type="number" name="age" class="form-control"
                                          placeholder="Age of the patient ...">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Occupation</label>
                                      <input type="text" name="occupation" class="form-control"
                                          placeholder="occupation ...">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Address</label>
                                      <textarea name="address" id="" class="form-control" rows="3"></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Period of residence in the area</label>
                                      <input type="text" name="period_of_residence" class="form-control"
                                          placeholder="Period of residence in the area: ...">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> Contact number</label>
                                      <input type="text" name="contact" class="form-control" placeholder="contact ...">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">GPS latitude </label>
                                      <input type="text" name="gps_lat" class="form-control"
                                          placeholder="ex :- 89.5565 ...">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">GPS longitude </label>
                                      <input type="text" name="gps_long" class="form-control"
                                          placeholder="ex :- 89.5565...">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Date of collection of blood smear </label>
                                      <input type="date" name="date_of_col" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> Species diagnosed</label>
                                      <input type="text" name="species_diag" class="form-control"
                                          placeholder=" (Wb, Bm, other)">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> MF count</label>
                                      <input type="number" name="mf_count" class="form-control"
                                          placeholder="MF Count ...">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> Presence of symptoms of Lymphatic Filariasis
                                          (specify)</label>
                                      <input type="text" name="pslf" class="form-control"
                                          placeholder="Presence of symptoms of Lymphatic Filariasis (specify)">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">   Past medical history</label>
                                      <input type="text" name="history" class="form-control"
                                          placeholder="Past medical history">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">    Date of starting treatment</label>
                                      <input type="date" name="treatment_started_on" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> Treatment given (with number of tablets)
                                          Approx. weight of the patient </label>
                                      <input type="text" name="treatment_given" class="form-control"
                                          placeholder="Treatment given (with number of tablets) Approx. weight of the patient">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> Actions taken for prevention:</label>
                                      <input type="text" name="actions_taken" class="form-control"
                                          placeholder=" Actions taken for prevention:">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> History of obtaining MDA with years</label>
                                      <input type="text" name="history_of_mda" class="form-control"
                                          placeholder="History of obtaining MDA with years">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> Name of PHFO/PHI obtained blood smear</label>
                                      <input type="text" name="phfo_phi" class="form-control"
                                          placeholder="Name of PHFO/PHI obtained blood smear">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> Name/ Designation of Investigating Officer:
                                      </label>
                                      <input type="text" name="investigation_officer" class="form-control"
                                          placeholder="Name/ Designation of Investigating Officer: ">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1"> Date</label>
                                      <input type="date" name="inv_date" class="form-control"
                                          placeholder=" (Wb, Bm, other)">
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