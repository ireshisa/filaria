<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
					 MORBIDITY DATA Report<br>
              <small>(To be filled for all fields) </small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Report</a></li>
              <li class="active">MORBIDITY DATA</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">

              <!-- left column -->
              <form method="post" action="{{url('/mobility_report_print') }}" target="blank">

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
                              <div class="col-md-8">

                                  <div class="form-group">
                                      <label for="exampleInputEmail1">District</label>
                                      <select required name="district" class="form-control"
                                          onchange="getMoh(this.value)">
                                          <option value="All">All</option>
                                          @if(Auth::user()->role !== "ADMIN" && Auth::user()->role !== "AFC")
                                            <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
                                            @else
                                            @foreach ($district_list as $dis)
                                            <option value="{{ $dis->district }}">{{ $dis->district }}</option>
                                            @endforeach
                                            @endif
                                      </select>
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">From   </label>
                                      <input data-date-format="yyyy-mm-d" required type="date" name="from"
                                          class="datepicker_v form-control pull-right">
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputPassword1">To   </label>
                                      <input data-date-format="yyyy-mm-d" required type="date" name="to"
                                          class="datepicker_v form-control pull-right">
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