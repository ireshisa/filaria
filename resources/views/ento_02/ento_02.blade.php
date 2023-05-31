
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    ENTO 2 FORM<br>
    <small>Gravid Trap Collection</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">ENTO 2</a></li>
      <li class="active">ENTO 2 FORM</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <form method="post" action="{{url('/ento2_save') }}">
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
                  <label for="exampleInputEmail1">District</label>
                  {{--   <select name="district" class="form-control" required="">
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
          <input type="text" name="district" class="datepicker_v form-control pull-right">
                </div>


              <div class="form-group">
                  <label for="exampleInputPassword1">MOH area </label>
                  <input type="text"  name="moh_area" class="form-control">
                </div>

                             <div class="form-group">
                                      <label for="exampleInputPassword1">PHM area</label>
                                        <input type="text"  name="phm_area"  class="form-control">
                                  </div> 

<div class="form-group">
  <label for="exampleInputPassword1">GN division</label>
  <input type="text" name="gn_division" class="form-control" >
</div>

                <div class="form-group hide">
                  <label for="exampleInputPassword1">Method </label>
                  <!-- <input  type="text" name="method" class="form-control"
                  placeholder="Method..."> -->
                  <select name="method" class="form-control">
                    <option value="">Select</option>
                    <option value="gravid trap collection">gravid trap collection</option>
                    <option value="indoor hand collection">indoor hand collection</option>
                    <option value="cattle bait collection">cattle bait collection</option>
                    <option value="human landing night collection">human landing night collection
                    </option>
                  </select>
                </div>









                <div class="form-group">
                  <label for="exampleInputPassword1">Total Cx quin mosquitos </label>
                  <input type="number" step="0.01" onkeyup="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')"
                  id="total_cx_quin_mosq" name="total_cx_quin_mosq" class="form-control"
                  >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Total traps laid </label>
                  <input
                  onkeyup="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')"
                  type="number" id="total_traps" name="total_traps" class="form-control"
                  >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Mosquito density per trap</label>
                  <input step=0.01
                  onclick="mosquitoCalculation('total_cx_quin_mosq','total_traps','mosquito_density_per_trap')"
                  id="mosquito_density_per_trap" type="number" name="mosq_density_per_trap"
                  class="form-control" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Name of HEO </label>
                  <input type="text"  name="heo" class="form-control">
                </div>

               

                <div class="form-group">
                  <label for="exampleInputPassword1">Date   </label>
              <input data-date-format="yyyy-mm-d" type="date" name="date" class="datepicker_v form-control pull-right">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Regional medical Officer/Entomologist  </label>
                  <input type="text" 
                  name="rmo_ent" class="form-control">
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
<!-- /.content-wrapper