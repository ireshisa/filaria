  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        MORBIDITY DATA OUTPUT FORM 1 (C2 FORM)<br>
            <small>(To be filled for all fields) </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Report</a></li>
            <li class="active">C2 FORM</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/c2_report_print') }}" target="blank" id="formC1">

                {{ csrf_field() }}
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
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">District</label>
                                    <select required name="district" class="form-control" onchange="getMoh(this.value)">
                                        <option value="">Select</option>

                                        @if(Auth::user()->role !== "ADMIN" && Auth::user()->role !== "AFC")
                                          <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
                                        @else
                                        @foreach ($district_list as $dis)
                                          <option value="{{ $dis->district }}">{{ $dis->district }}</option>
                                        @endforeach
                                        @endif

                                    </select>
                                </div>
                                <input type="radio" name="select" class="form-check-input" value="yearly" onclick="selection(this.value)">
                                <label class="form-check-label">
                                  Annualy
                                </label>
                                <input type="radio" name="select" class="form-check-input" value="quarterly" style="margin-left: 10px" onclick="selection(this.value)">
                                <label class="form-check-label">
                                  Quarterly
                                </label>
                                <input type="radio" name="select" class="form-check-input" value="monthly" style="margin-left: 10px" onclick="selection(this.value)">
                                <label class="form-check-label">
                                  Monthly
                                </label>

                                  <div class="form-group" id="yearSelect" style="display: none">
                                      <label for="year">Year</label>
                                      <input type="text" name="year" class="form-control"  id="year" >
                                      <!-- <select name="year" class="form-control" id="year">
                                          <option value="">Select Year</option>
                                          @for($i = 2016; $i < 2022; $i++)
                                          <option value="{{$i}}">{{$i}}</option>
                                          @endfor
                                      </select> -->
                                  </div>
                                <div class="form-group" id="monthSelect" style="display: none">
                                    <label for="exampleInputPassword1">Month</label>
                                    <select name="month" class="form-control" id="month">
                                        <option value="">Select Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February </option>
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
                                <div class="form-group" id="quarterSelect" style="display: none">
                                  <label for="exampleInputPassword1">Quarter</label>
                                  <select name="quarter" class="form-control" id="quarter">
                                      <option value="">Select Quarter</option>
                                      <option value="Quarter1">Quarter 1</option>
                                      <option value="Quarter2">Quarter 2</option>
                                      <option value="Quarter3">Quarter 3</option>
                                      <option value="Quarter4">Quarter 4</option>
                                  </select>
                              </div>

<div class="form-group mt-5">
                                      <label for="exampleInputPassword1"> Export type   </label>
                                      <select required name="export_type" class="form-control" required="">
                                          <option value=""></option>
                                          <option value="PDF"> PDF </option>
                                          <option value="Excel"> Excel </option>
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
<style>
       .box-body {
overflow: hidden !important;
}
</style>
<script>

  function selection(text) {
      switch (text) {
          case "yearly":
              $("#yearSelect").show();
              $("#quarterSelect").hide();
              $("#monthSelect").hide();
              $("#month").val("");
              $("#quarter").val("");
              break;
          case "quarterly":
              $("#yearSelect").show();
              $("#quarterSelect").show();
              $("#monthSelect").hide();
              $("#month").val("");
              break;
          case "monthly":
              $("#yearSelect").show();
              $("#monthSelect").show();
              $("#quarterSelect").hide();
              $("#quarter").val("");
              break;
      }
  }

 document.getElementById("formC1").addEventListener("submit", function(e) {
     e.preventDefault();
     switch ($("input[name='select']:checked").val()) {
          case "yearly":
                  if ($("#year").val() == "") {
                      alert("Select Year");
                  } else {
                      $(this).trigger('submit');
                  }
                  break;
              case "quarterly":
                  if ($("#year").val() == "") {
                      alert("Select Year");
                  } else if ($("#quarter").val() == "") {
                      alert("Select Quarter");
                  } else {
                      $(this).trigger('submit');
                  }
                  break;
              case "monthly":
                  if ($("#year").val() == "") {
                      alert("Select Year");
                  } else if ($("#month").val() == "") {
                      alert("Select Month");
                  } else {
                      $(this).trigger('submit');
                  }
                  break;
     }

 })

</script>