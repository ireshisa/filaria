  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <div class="pull-right hidden-xs">
          <b>Version</b> 2.4.13
      </div>
      <strong> Anti Filaria Campaign &copy; 2019, All Rights Reserved
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <!-- <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li> -->
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
          <!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
          <!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
              <form method="post">
                  <h3 class="control-sidebar-heading">General Settings</h3>

                  <div class="form-group">
                      <label class="control-sidebar-subheading">
                          Report panel usage
                          <input type="checkbox" class="pull-right" checked>
                      </label>

                      <p>
                          Some information about this general settings option
                      </p>
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                      <label class="control-sidebar-subheading">
                          Allow mail redirect
                          <input type="checkbox" class="pull-right" checked>
                      </label>

                      <p>
                          Other sets of options are available
                      </p>
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                      <label class="control-sidebar-subheading">
                          Expose author name in posts
                          <input type="checkbox" class="pull-right" checked>
                      </label>

                      <p>
                          Allow the user to show his name in blog posts
                      </p>
                  </div>
                  <!-- /.form-group -->

                  <h3 class="control-sidebar-heading">Chat Settings</h3>

                  <div class="form-group">
                      <label class="control-sidebar-subheading">
                          Show me as online
                          <input type="checkbox" class="pull-right" checked>
                      </label>
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                      <label class="control-sidebar-subheading">
                          Turn off notifications
                          <input type="checkbox" class="pull-right">
                      </label>
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                      <label class="control-sidebar-subheading">
                          Delete chat history
                          <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                      </label>
                  </div>
                  <!-- /.form-group -->
              </form>
          </div>
          <!-- /.tab-pane -->
      </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="{{ asset('/') }}bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('/') }}bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
      $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <!-- Morris.js charts -->
  <script src="{{ asset('/bower_components/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('/bower_components/morris.js/morris.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
  <!-- jvectormap -->
  <script src="{{ asset('/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script src="{{ asset('/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('/bower_components/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <!-- datepicker -->
  <script src="{{ asset('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
  <!-- Slimscroll -->
  <script src="{{ asset('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('/bower_components/fastclick/lib/fastclick.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('/dist/js/pages/dashboard.js') }}"></script>
  <!-- bootstrap time picker -->
  <script src="{{ asset('/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('/dist/js/demo.js') }}"></script>
  {{-- <script src="{{ asset('/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script> --}}


  {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/datatables.min.js"></script>

 --}}







  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">


  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script> -->


  <script>
      function calculate_bmi() {
          var w = document.getElementById("Weight").value
          var h = document.getElementById("Height").value
          document.getElementById("bmi").value = (w / (h * h)).toFixed(2);
      }







      // $('select').selectpicker();
      $(document).ready(function() {
          $('.multiple-checkboxes').multiselect({
              includeSelectAllOption: true,
          });

          $('.selectpicker').multiselect({
              includeSelectAllOption: true,
          });
          selectpicker

      });

      $(document).ready(function() {
          $('#ento2_table').DataTable({
              "order": [
                  [0, "desc"]
              ],
              pageLength: 5,
              dom: 'Bfrtip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  // {{-- 'pdfHtml5', --}}
                  'pageLength'
              ]
          });



      });



      $(document).ready(function() {
          $('#ento22_table').DataTable({
              dom: 'Bfrtip',
              buttons: [

                  'pageLength'
              ]
          });



      });



      //Date picker
      $('.datepicker_v').datepicker({
          autoclose: true
      })
      //Timepicker
      $('.timepicker').timepicker({
          showInputs: true
      })

      function Calculate() {
          var a1 = document.getElementById('c1').value;
          var a2 = document.getElementById('c2').value;
          var a3 = document.getElementById('c3').value;
          var a4 = document.getElementById('c4').value;
          var a5 = document.getElementById('c5').value;
          var a6 = document.getElementById('c6').value;
          var a7 = document.getElementById('c7').value;
          var a8 = document.getElementById('c8').value;
          var a9 = document.getElementById('c9').value;
          var a10 = document.getElementById('c10').value;
          var a11 = document.getElementById('c11').value;
          var a12 = document.getElementById('c12').value;
          document.getElementById('totalValue').value = Number(a1) + Number(a2) + Number(a3) + Number(a4) + Number(a5) +
              Number(a6) +
              Number(a7) + Number(a8) + Number(a9) + Number(a10) + Number(a11) + Number(a12);
          document.form1.submit();
      }

      function get_total_calculate() {

          var ent_03_id = document.getElementById("ent_03_id");
          var strUser = ent_03_id.options[ent_03_id.selectedIndex].text;
          var traps = strUser.split("/")[1]
          var mosquito = document.getElementById('no_of_mosq').value;
          document.getElementById('density_per_trap').value = parseFloat((parseInt(mosquito) / parseInt(traps)) * 100).toFixed(
              1);

      }

      function mosquitoCalculation(id1, id2, id3) {
          var total_cx_quin_mosq = document.getElementById(id1).value;
          var total_traps = document.getElementById(id2).value;
          document.getElementById(id3).value = ((total_cx_quin_mosq) / (total_traps)).toFixed(2);
      }


      function getpdate(val) {
          $.ajax({
              type: "GET",
              url: "get5pdate/" + val,
              data: null,
              success: function(data) {
                  $("#visit_date").html(data);
              }
          });
      }



      function onInput() {
          var val = document.getElementById("inputopd").value;
          var opts = document.getElementById('opd').childNodes;
          var faind = 0;
          for (var i = 0; i < opts.length; i++) {
              if (opts[i].value === val) {
                  // An item was selected from the list!
                  // yourCallbackHere()
                  getpationdata(val); // call ajex to fill the rest detais of patin(in)
                  faind = 1;
                  document.getElementById("inputopd").style.background = "#ffffff";
                  break;
              }
          }

          if (faind == 0) {
              document.getElementById("inputopd").style.background = "#d50c0c99";
              document.getElementById("date_of_first_clinice").value = " ";
              document.getElementById("full_name").value = " ";
              document.getElementById("gender").value = " ";
              document.getElementById("date_of_birth").value = " ";
              document.getElementById("age_in_completed").value = " ";
              document.getElementById("address").value = " ";
              document.getElementById("date_of_registration").value = " ";
              document.getElementById("district_lymphedema_no").value = " ";
              document.getElementById("submitbuttone").style.display = "none";
          } else {
              document.getElementById("submitbuttone").style.display = "block";
          }
      }



      // treatment form filling 
      function onInput2() {
          var val = document.getElementById("inputopd").value;
          var opts = document.getElementById('opd').childNodes;
          var faind = 0;
          for (var i = 0; i < opts.length; i++) {
              if (opts[i].value === val) {
                  // An item was selected from the list!
                  // yourCallbackHere()
                  getpationdata2(val); // call ajex to fill the rest detais of patin(in)
                  faind = 1;
                  document.getElementById("inputopd").style.background = "#ffffff";
                  break;
              }
          }
          if (faind == 0) {
              document.getElementById("inputopd").style.background = "#d50c0c99";
              document.getElementById("name").value = " ";
              document.getElementById("age").value = " ";
              document.getElementById("gender").value = " ";
              document.getElementById("address").value = " ";
              document.getElementById("district_le_no").value = " ";
              document.getElementById("site_of_disease").value = " ";
              document.getElementById("co_morbidies").value = " ";

              document.getElementById("body_weight").value = " ";

          }
      }



      //new pation data get using opd noumber
      function getpationdata(opd) {
          //  getEnto4FromData
          $.ajax({
              type: "POST",
              url: "{{url('/getpationdata/') }}",
              data: "opd=" + opd,
              success: function(data) {
                  // alert(data);
                  var splitAr = data.split(":");
                  document.getElementById("full_name").value = splitAr[0];
                  document.getElementById("gender").value = splitAr[1];
                  document.getElementById("date_of_birth").value = splitAr[2];
                  document.getElementById("age_in_completed").value = splitAr[3];
                  document.getElementById("address").value = splitAr[4];
                  document.getElementById("date_of_registration").value = splitAr[5];
                  document.getElementById("name_of_clinic").value = splitAr[7];
              }
          });
      }






      function onInputchange() {
          var val = document.getElementById("inputopd").value;
          var opts = document.getElementById('opd').childNodes;
          var faind = 0;
          for (var i = 0; i < opts.length; i++) {
              if (opts[i].value === val) {
                  changeappoinment(val); // call ajex to fill the rest detais of patin(in
                  faind = 1;
                  document.getElementById("inputopd").style.background = "#ffffff";
                  break;
              }
          }


          if (faind == 0) {
              document.getElementById("inputopd").style.background = "#d50c0c99";
              document.getElementById("current_appoinment").value = " ";
              document.getElementById("district_le_no").value = " ";
              document.getElementById("name").value = " ";
              document.getElementById("date_of_registration").value = " ";

          }


      }











      // get data to  chage appoinment using opd number
      function changeappoinment(opd) {
          //  getEnto4FromData
          $.ajax({
              type: "GET",
              url: "getappoinmentdata/" + opd,
              data: null,
              success: function(data) {
                  var splitAr = data.split(":");
                  document.getElementById("current_appoinment").value = splitAr[0];
                  document.getElementById("district_le_no").value = splitAr[1];
                  document.getElementById("name").value = splitAr[2];
                  document.getElementById("date_of_registration").value = splitAr[3];




              }
          });
      }















      function getpationdata2(opd) {
          //  getEnto4FromData
          $.ajax({
              type: "GET",
              url: "{{url('/getpationdata2') }}/" + opd,
              data: null,
              success: function(data) {
                  var splitAr = data.split(":");
                  document.getElementById("name").value = splitAr[0];
                  document.getElementById("age").value = splitAr[1];
                  document.getElementById("gender").value = splitAr[2];
                  document.getElementById("address").value = splitAr[3];
                  document.getElementById("district_le_no").value = splitAr[4];
                  document.getElementById("site_of_disease").value = splitAr[5];
                  document.getElementById("co_morbidies").value = splitAr[6];


                  document.getElementById("body_weight").value = splitAr[8];
                  if (splitAr[7] == 'unavailable') {
                      // firstVisit
                      document.getElementById("subsequent_visits").style.display = "none";
                      document.getElementById("initial_treatment_history").style.display = "none";
                      document.getElementById("visittype").value = 'first';
                  } else {
                      // subvisit
                      document.getElementById("subsequent_visits").style.display = "show";
                      document.getElementById("new_treatment").style.display = "none";
                      document.getElementById("visittype").value = 'subvisite';


                      gettreatmentHistory(opd);
                      getintialtableHistory(opd);
                      getsubvisitTableHistory(opd);
                  }
              }
          });
      }




      function gettreatmentHistory(opd) {
          $.ajax({
              type: "GET",
              url: "gettreatmentHistory/" + opd,
              data: null,
              success: function(data) {
                  var splitAr = data.split(":");
                  document.getElementById("body_weight").value = splitAr[0];
                  document.getElementById("stage_of_disease").value = splitAr[1];
                  document.getElementById("habits").value = splitAr[2];
                  document.getElementById("allergies").value = splitAr[3];
                  document.getElementById("at_clinice_visite_le_without").value = splitAr[4];
                  document.getElementById("at_clinice_visite_le_with").value = splitAr[5];
                  document.getElementById("at_clinice_visite_patient_give").value = splitAr[6];
                  document.getElementById("health_education_on_washing").value = splitAr[7];
                  document.getElementById("health_education_on_limb").value = splitAr[8];
                  document.getElementById("correct_technice_of_wearing").value = splitAr[9];
                  document.getElementById("sub_at_clinice_visite_le_without").value = splitAr[10];
                  document.getElementById("sub_at_clinice_visite_le_with").value = splitAr[11];
                  document.getElementById("sub_at_clinice_visite_patient_give").value = splitAr[12];
                  document.getElementById("patient_following_advice").value = splitAr[13];
                  document.getElementById("remarks").value = splitAr[14];
                  document.getElementById("next_appoinment").value = splitAr[15];

                  //selct

                  document.getElementById("at_clinice_visite_le_without").value = splitAr[16];
                  document.getElementById("at_clinice_visite_le_with").value = splitAr[17];
                  document.getElementById("at_clinice_visite_patient_give").value = splitAr[18];
                  document.getElementById("sub_at_clinice_visite_le_without").value = splitAr[19];
                  document.getElementById("sub_at_clinice_visite_le_with").value = splitAr[20];
                  document.getElementById("sub_at_clinice_visite_patient_give").value = splitAr[21];



                  document.getElementById("body_weight").disabled = true;
                  document.getElementById("stage_of_disease").disabled = true;
                  document.getElementById("habits").disabled = true;
                  document.getElementById("allergies").disabled = true;
                  document.getElementById("at_clinice_visite_le_without").disabled = true;
                  document.getElementById("at_clinice_visite_le_with").disabled = true;
                  document.getElementById("at_clinice_visite_patient_give").disabled = true;
                  document.getElementById("health_education_on_washing").disabled = true;
                  document.getElementById("health_education_on_limb").disabled = true;
                  document.getElementById("correct_technice_of_wearing").disabled = true;





              }
          });

      }


      function getintialtableHistory(opd) {


          $.ajax({
              type: "GET",
              url: "{{url('/getintialtableHistory') }}/" + opd,
              data: null,
              success: function(data) {
                  $("#initial_treatment_history_row").html(data)


              }
          });

      }

      function getsubvisitTableHistory(opd) {
          $.ajax({
              type: "GET",
              url: "{{url('/getsubvisitTableHistory') }}/" + opd,
              data: null,
              success: function(data) {
                  $("#subsequent_treatment_history_row").html(data)


              }
          });
      }








      //new pation data get using opd noumber
      function getbodydetails() {
          //  getEnto4FromData
          var val = document.getElementById("inputopd").value;
          var opts = document.getElementById('opd').childNodes;
          var faind = 0;
          for (var i = 0; i < opts.length; i++) {
              if (opts[i].value === val) {
                  $.ajax({
                      type: "POST",
                      url: "{{url('/getbodydetailspost/') }}",
                      data: "opd=" + val,
                      success: function(data) {
                          // alert(data);
                          $("#bodypartDetails").html(data)

                      }
                  });
              }
          }
      }
  </script>
  </body>

  <style>
      table.dataTable tbody th,
      table.dataTable tbody td {
          padding: 15px 3px !important;
      }

      table.dataTable {
          text-align: center !important;
      }

      .sorting {
          text-align: center !important;
      }

      .box-body {
          overflow: scroll;
      }

      td {
          width: 500px !important;
      }



      .select2-container--default .select2-selection--multiple .select2-selection__choice {
          color: #060606;
      }

      td button,
      a {
          margin: 5px !important;
      }

      .btn {
          display: table-cell !important;
      }







      td {
          font-weight: 500 !important;
      }

      #ento2_table_wrapper {
          height: 500px;
          OVERFLOW: scroll;
      }
  </style>
  <!-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
      $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
      });
  </script>

  </html>