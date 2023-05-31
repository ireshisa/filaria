
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ENTO 1 FORM<br>
            <small>Indoor Hand Collection </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Indoor Hand Collection </a></li>
            <li class="active">Indoor Hand Collection   </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/ento1_save') }}">

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
                            {{--         <select name="district" class="form-control" onchange="getMoh(this.value)" required="">
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

                                    <input type="text" name="district" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">MOH area</label>
                                    
                                     <input type="text" name="moh_area" class="form-control" >
                                    <!--<select name="moh_area" class="form-control" id="moh_list" onchange="getPhi(this.value)">-->
                                    <!--    <option value="">Select</option>-->
                                    <!--</select>-->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PHM area</label>
                                    <input type="text" name="phi_and_phm" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">GN division</label>
                                    <input type="text" name="gn_divison" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date </label>
                                    <input data-date-format="yyyy-mm-d" type="Date" name="date" class="form-control pull-right datepicker_v" >
                                </div>
                                <!-- <div class="form-group">
                                      <label for="exampleInputPassword1">Address  </label>
                                      <input  type="text" placeholder="Address..." name="address "
                                          class="form-control">
                                  </div> -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> <br>Started at   </label>
                                    <input type="time" name="start_at" class="form-control  ">
                                </div>

                                
                


                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition" class="form-control">
                                        <option value=" ">Select Weather Condition</option>
                                        <option value="Cloudy ">Cloudy </option>
                                        <option value="Cold">Cold </option>
                                        <option value="Drizzly">Drizzly </option>
                                        <option value="Rainy">Rainy </option>
                                        <option value="Windy(moderate)">Windy (moderate)</option>
                                        <option value="Windy(heavy)">Windy (heavy)</option>
                                        <option value="Moonlight">Moonlight</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1">Finished at</label>
                                    <input type="time"  name="finished_at" class="form-control">
                                </div>
                             {{--    <div class="form-group">
                                    <label for="exampleInputPassword1">Number of premises examined </label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="no_of_premises" class="form-control">
                                </div> --}}

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Total time spent</label>
                                    <input type="number" name="total_time_spend" class="form-control">
                                </div>



                           {{--     <div class="form-group">
                                    <label for="exampleInputPassword1">No of premises positive for Cx. quin</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="no_of_premises_positive" class="form-control">
                                </div>  --}}
                                
                            {{--        <div class="form-group">
                                    <label for="exampleInputPassword1">No of premises positive for Mansonia
                                        species</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="mansonia_species_of_positive" class="form-control">
                                </div> 
                                
                                 --}}
                                
                            {{--      <div class="form-group">
                                    <label for="exampleInputPassword1">Total culex sp collected</label> <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="total_mosquitos_collected" class="form-control" required>
                                </div>
                                 --}}
                          
                             
{{-- 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Total Mansonia species collected </label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="mansonia_spcies_of_mosquitos_collected" class="form-control" required>
                                </div> --}}
                                
                           {{--      <div class="form-group">
                                    <label for="exampleInputPassword1">Anopheles species</label>
                                    <input type="number" pattern=" ^\d*(\.\d{0,2})?$"  name="anopheles_species" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Aedes sp</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="aedes_sp" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Armigerus sp</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="armigerus_sp" class="form-control" required>
                                </div> --}}
                               
                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Total culex sp  Collected</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" placeholder="Total culex sp positive (+) Collected.." name="culex_sp" class="form-control" required>
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tubes submitted</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" name="tubes_submitted" class="form-control" required>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Number of collectors</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$"  name="no_of_collectors" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of HEO</label>
                                    <input type="text"  name="name_of_heo" class="form-control">
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