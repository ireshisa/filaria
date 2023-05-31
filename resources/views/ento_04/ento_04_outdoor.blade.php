<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ENTO 4 OUTDOOR FORM<br>
            <small>(To be filled for all fields) </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ENTO 4 OUTDOOR</a></li>
            <li class="active">ENTO 4 OUTDOOR FORM</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- left column -->
            <form method="post" action="{{url('/ento4_outdoor_save') }}">

                {{csrf_field() }}
                <div class="col-md-12">
                    @if(session()->has('message'))
                    @if(session()->get('message')==true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        Successfully save your data.
                    </div>
                    @endif
                    @if(session()->get('message')==false)
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                        </button>
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
                                    <label for="exampleInputEmail1">Ento4 ID</label>
                                    <select name="ento_04_id" class="form-control" required>
                                        {{$first=true}}
                                        @foreach ($ento4_list as $list)
                                        <option value="{{ $list->ento_04_id }}">{{$first==true?"Last entered ID":""}}
                                            {{ $list->ento_04_id }} </option>
                                        {{$first==true?$first=false:$first=false}}
                                        @endforeach
                                    </select>
                                </div>
                                <h4 class="sub_header">6-7 pm</h4>

                                {{--<div class="form-group">
                                    <label for="exampleInputPassword1">6-7 pm</label>
                                    <input type="number"   name="pm_6_7" id="c1"
                                        class="form-control" >
                                </div> --}}





                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of baits</label>
                                    <input type="number"   name="noofbaits" class="form-control"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="text"   name="temp6_7" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH6_7" class="form-control">
                                </div>



                            <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_6_7" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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



                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>

                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <input type="Number" class="form-control" name="number[]" required value="0" />
                                    </div>

                                    <div class="form-group col-md-1">
                                        <input type="button" value="+" onclick="add(this)" class="form-control" />
                                    </div>

                                </div>

                     <h4 class="sub_header">7-8 pm</h4>
{{-- 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">7-8 pm</label>
                                    <input type="number"   name="pm_7_8" id="c2"
                                        class="form-control" >
                                </div> --}}

                        <div class="form-group">
                            <label for="exampleInputPassword1">No of baits</label>
                            <input type="number"   name="noofbairs7_8" class="form-control"  >
                        </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="text"   name="temp7_8" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH7_8" class="form-control">
                                </div>


                            <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_7_8" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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


                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>
                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat7_8[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <input type="Number" class="form-control" name="number7_8[]" required value="0" />
                                    </div>

                                    <div class="form-group col-md-1">
                                        <input type="button" value="+" onclick="add(this)" class="form-control" />
                                    </div>

                                </div>


                                <h4 class="sub_header">8-9 pm</h4>

                               {{--  <div class="form-group">
                                    <label for="exampleInputPassword1">8-9 pm</label>
                                    <input type="number"   name="pm_8_9" id="c3"
                                        class="form-control" >
                                </div> --}}

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of baits</label>
                                    <input type="number"   name="noofbairs8_9"
                                        class="form-control"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="number"   name="temp8_9" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH8_9" class="form-control">
                                </div>



                            <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_8_9" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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

                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>
                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat8_9[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                    <div class="form-group col-md-3">
                        <input type="Number" class="form-control" name="number8_9[]" required value="0" />
                    </div>

                                    <div class="form-group col-md-1">
                                        <input type="button" value="+" onclick="add(this)" class="form-control" />
                                    </div>

                                </div>
                                <!-- =========================================================== -->

                                <h4 class="sub_header">9-10 pm</h4>

                              {{--   <div class="form-group">
                                    <label for="exampleInputPassword1">9-10 pm</label>
                                    <input type="number"   name="pm_9_10" id="c4"
                                        class="form-control" >
                                </div> --}}


            <div class="form-group">
                <label for="exampleInputPassword1">No of baits</label>
                <input type="number"   name="noofbairs9_10" class="form-control" >
            </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="number"   name="temp9_10" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH9_10" class="form-control">
                                </div>


                          <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_9_10" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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




                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>
                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat9_10[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <input type="number" class="form-control" name="number9_10[]" required value="0" />
                                    </div>

                                    <div class="form-group col-md-1">
                                        <input type="button" value="+" onclick="add(this)" class="form-control" />
                                    </div>

                                </div>
                                <!-- =========================================================== -->

                                <h4 class="sub_header">10-11 pm</h4>


    {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">10-11 pm</label>
    <input type="number"   name="pm_10_11" id="c5" class="form-control" >
         </div>--}}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of baits</label>
                                    <input type="number"   name="noofbairs10_11"
                                        class="form-control"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="text"   name="temp10_11" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH10_11" class="form-control" >
                                </div>



                         <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_10_11" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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




                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>
                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat10_11[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                            <input type="Number" class="form-control" name="number10_11[]" value="0" required />
                                    </div>

                                    <div class="form-group col-md-1">
                                        <input type="button" value="+" onclick="add(this)" class="form-control" />
                                    </div>
                                </div>
                                <!-- =========================================================== -->

                                <h4 class="sub_header">11-12 pm </h4>

                             {{--    <div class="form-group">
                                    <label for="exampleInputPassword1">11-12 pm </label>
                                    <input type="number"   name="pm_11_12" id="c6"
                                        class="form-control" >
                                </div>
 --}}

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of baits</label>
                                    <input type="number"   name="noofbairs11_12" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="text"   name="temp11_12" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH11_12" class="form-control" >
                                </div>



                            <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_11_12" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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



                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>
                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat11_12[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <input type="Number" class="form-control" name="number11_12[]" value="0" required />
                                    </div>

                                    <div class="form-group col-md-1">
                                        <input type="button" value="+" onclick="add(this)" class="form-control" />
                                    </div>

                                </div>
                                <!-- =========================================================== -->


                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h1> &nbsp; </h1>
                                </div>
                                <h4 class="sub_header">12-1 am</h4>

                              {{--   <div class="form-group">
                                    <label for="exampleInputPassword1">12-1 am</label>
                                    <input type="number"   name="am_12_1" id="c7" class="form-control" >
                                </div> --}}


                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of baits</label>
                                    <input type="number"   name="noofbairs12_1" class="form-control"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="text"   name="temp12_1" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH12_1" class="form-control">
                                </div>



                    <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_12_1" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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


                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>
                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat12_1[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                        <div class="form-group col-md-3">
                            <input type="Number" class="form-control" name="number12_1[]" value="0" required />
                        </div>

                        <div class="form-group col-md-1">
                               <input type="button" value="+" onclick="add(this)" class="form-control" />
                        </div>

                                </div>

                                <h4 class="sub_header">1-2 am</h4>

{{-- 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">1-2 am</label>
                                    <input type="number"   name="am_1_2" id="c8"
                                        class="form-control" >
                                </div>
 --}}

                        <div class="form-group">
                        <label for="exampleInputPassword1">No of baits</label>
                        <input type="number"   name="noofbairs1_2" class="form-control" >
                        </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="text"   name="temp1_2" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH1_2" class="form-control">
                                </div>


                            <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_1_2" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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


                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>
                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat1_2[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <input type="Number" class="form-control" name="number1_2[]" value="0" required />
                                    </div>

                                    <div class="form-group col-md-1">
                                        <input type="button" value="+" onclick="add(this)" class="form-control" />
                                    </div>

                                </div>

                                <h4 class="sub_header">2-3 am</h4>


                            {{--     <div class="form-group">
                                    <label for="exampleInputPassword1">2-3 am</label>
                                    <input type="number"   name="am_2_3" id="c9"
                                        class="form-control" >
                                </div>
 --}}

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of baits</label>
                                    <input type="number"   name="noofbairs2_3"
                                        class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="text"   name="temp2_3" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH2_3" class="form-control">
                                </div>




                       <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_2_3" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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




                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>
                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat2_3[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <input type="Number" class="form-control" name="number2_3[]" value="0" required />
                                    </div>

                                    <div class="form-group col-md-1">
                                        <input type="button" value="+" onclick="add(this)" class="form-control" />
                                    </div>

                                </div>
                                <!-- =========================================================== -->

                                <h4 class="sub_header">3-4 am </h4>

{{-- 

                                <div class="form-group">
                                    <label for="exampleInputPassword1">3-4 am</label>
                                    <input type="number"   name="am_3_4" id="c10"
                                        class="form-control" >
                                </div> --}}



                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of baits</label>
                                    <input type="number"   name="noofbairs3_4"
                                        class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="text"   name="temp3_4" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH3_4" class="form-control">
                                </div>


                            <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_3_4" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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




                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>

                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat3_4[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <input type="Number" class="form-control" name="number3_4[]" value="0"  required />
                                    </div>

                                    <div class="form-group col-md-1">
                                        <input type="button" value="+" onclick="add(this)" class="form-control" />
                                    </div>

                                </div>

                                <!-- =========================================================== -->

                                <h4 class="sub_header">4-5 am</h4>

                            {{--     <div class="form-group">
                                    <label for="exampleInputPassword1">4-5 am</label>
                                    <input type="number"   name="am_4_5" id="c11"
                                        class="form-control" >
                                </div>--}}

                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of baits</label>
                                    <input type="number"   name="noofbairs4_5"
                                        class="form-control"  >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="text"   name="temp4_5" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH4_5" class="form-control" >
                                </div>



                          <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_4_5" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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



                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>

                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat4_5[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                            <div class="form-group col-md-3">
                                <input type="Number" class="form-control" name="number4_5[]" value="0" required />
                            </div>

                                    <div class="form-group col-md-1">
                                        <input type="button" value="+" onclick="add(this)" class="form-control" />
                                    </div>
                                </div>
                                <!-- =========================================================== -->

                                <h4 class="sub_header">5-6 am </h4>


                               {{--  <div class="form-group">
                                    <label for="exampleInputPassword1">5-6 am </label>
                                    <input type="number"   name="am_5_6" id="c12"
                                        class="form-control" >
                                </div> --}}


                                <div class="form-group">
                                    <label for="exampleInputPassword1">No of baits</label>
                                    <input type="number"   name="noofbairs5_6"
                                        class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Temperature </label>
                                    <input type="text"   name="temp5_6" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> RH(%) </label>
                                    <input type="number"   name="RH5_6" class="form-control">
                                </div>



                            <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_5_6" class="form-control" >
                                        <option value="">Select Weather Condition</option>
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



                                <div class="row form-group">
                                    <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                    <br>

                                    <div class="form-group col-md-8">
                                        <select name="mosq_spec_stat5_6[]" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($mosquito_list as $ms)
                                            <option value="{{ $ms->data }}">{{ $ms->data }} </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <input type="Number" class="form-control" name="number5_6[]" required
                                            value="0" />
                                    </div>

                                    <div class="form-group col-md-1">
                                        <input type="button" value="+" onclick="add(this)" class="form-control" />
                                    </div>
                                </div>
                                <!-- =========================================================== -->

                              {{--   <div class="form-group">
                                    <label for="exampleInputPassword1"> Total </label>
                                    <input type="text" id="totalValue"   name="total" class="form-control" >
                                </div> --}}
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                       {{--      <button type="button" onclick="Calculate();" class="btn btn-success">Calculate</button> --}}
                            <button type="submit" onclick="Calculate();" class="btn btn-primary">Submit</button>
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

<script>
function add(btn) {
    $(btn).parent().before(
        '<div class="form-group col-md-8">\n' +
        '<select name="' + $(btn).parent().prev().prev().children().attr("name") + '" class="form-control">\n' +
        '<option value="">Select</option>\n' +
        '@foreach ($mosquito_list as $ms)\n' +
        '<option value="{{ $ms->data }}">{{ $ms->data }} </option>\n' +
        '@endforeach\n' +
        '</select>\n' +
        '</div>\n ' +
        '<div class="form-group col-md-3">\n' +
        '<input type="Number" class="form-control" required name="' + $(btn).parent().prev().children().attr(
            "name") +
        '" />\n' +
        '</div>'
    );
}
</script>
