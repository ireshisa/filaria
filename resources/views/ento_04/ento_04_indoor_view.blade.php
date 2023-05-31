<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ENTO 4 INDOOR VIEW
        <br>
        <small>ento 4 indoor view all data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/ento4_view">ENTO 4 INDOOR</a></li>
            <li class="active">ENTO 4 INDOOR VIEW</li>
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
                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>       </th>
                                    <th>6-7 pm</th>
                                    <th>7-8 pm </th>
                                    <th>8-9 pm</th>
                                    <th>9-10 pm</th>
                                    <th>10-11 pm</th>
                                    <th>11-12 pm</th>
                                    <th>12-1 am</th>
                                    <th>1-2 am</th>
                                    <th>2-3 am</th>
                                    <th>3-4 am</th>
                                    <th>4-5 am</th>
                                    <th>5-6 am</th>
                                 {{--    <th>Total</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ento4_indoor_list as $ento4)
                                <tr>
                                    <td> </td>
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat) > 0)
                                            @foreach($ento4->mosq_spec_stat as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;">{{$row->mos_number}}</span><br>
                                            <br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat7_8) > 0)
                                            @foreach($ento4->mosq_spec_stat7_8 as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;">{{$row->mos_number}}</span><br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat8_9) > 0)
                                            @foreach($ento4->mosq_spec_stat8_9 as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;">{{$row->mos_number}}</span><br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat9_10) > 0)
                                            @foreach($ento4->mosq_spec_stat9_10 as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;">{{$row->mos_number}}</span><br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat10_11) > 0)
                                            @foreach($ento4->mosq_spec_stat10_11 as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;">{{$row->mos_number}}</span><br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat11_12) > 0)
                                            @foreach($ento4->mosq_spec_stat11_12 as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;">{{$row->mos_number}}</span><br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat12_1) > 0)
                                            @foreach($ento4->mosq_spec_stat12_1 as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;">{{$row->mos_number}}</span><br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat1_2) > 0)
                                            @foreach($ento4->mosq_spec_stat1_2 as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;">{{$row->mos_number}}</span><br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat2_3) > 0)
                                            @foreach($ento4->mosq_spec_stat2_3 as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;">{{$row->mos_number}}</span><br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat3_4) > 0)
                                            @foreach($ento4->mosq_spec_stat3_4 as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;">{{$row->mos_number}}</span><br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat4_5) > 0)
                                            @foreach($ento4->mosq_spec_stat4_5 as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;"> {{$row->mos_number}} </span><br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    
                                    <td >
                                        <div style='width: 250px'>
                                            @if(count($ento4->mosq_spec_stat5_6) > 0)
                                            @foreach($ento4->mosq_spec_stat5_6 as $row)
                                            {{$row->mosq_species}} <span   style="font-weight: bold;">{{$row->mos_number}}</span><br>
                                            @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    
                                    
                                 {{--    <td >
                                        {{$ento4->total}}
                                        
                                    </td> --}}
                                    
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $ento4->id }}" data-target="#editModal2{{$ento4->id}}"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        <strong>Edit</strong></button>
                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_ento4_indoor') }}/{{ $ento4->id }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <div id="editModal2{{$ento4->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT ENTO 4 INDOOR</h4>
                                                <br />
                                            </div>
                                            <form method="post" action="{{ url('/ento4_indoor_update') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <input type="hidden" name="id" value="{{$ento4->id}}" class="form-control" />
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Ento4 ID</label>
                                                                <select name="ento_04_id" class="form-control">
                                                                    @foreach ($ento4_list as $list)
                                                                    {{$select=""}}
                                                                    @if($ento4->ento_04_id==$list->ento_04_id)
                                                                    {{$select="selected"}}
                                                                    @endif
                                                                    <option {{$select}} value="{{ $list->ento_04_id }}">
                                                                    {{ $list->ento_04_id }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <h4 class="sub_header">6-7 pm</h4>
                                                            {{--       <div class="form-group">
                                                                <label for="exampleInputPassword1">6-7 pm</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->pm_6_7}}" name="pm_6_7" id="c1" class="form-control" >
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbaits}}" name="noofbaits" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp6_7}}" name="temp6_7" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->RH6_7}}" name="RH6_7" class="form-control" >
                                                            </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_6_7" class="form-control" >

                                          <option value="{{$ento4->weather_condition_6_7}}"> {{$ento4->weather_condition_6_7}}</option>
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
                                                                @if(count($ento4->mosq_spec_stat) > 0)
                                                                @foreach($ento4->mosq_spec_stat as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number[]" required value="{{$row->mos_number}}"  />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number[]" value="0"  />
                                                                </div>
                                                            
                                                                <div class="form-group col-md-1">
                                                                    <input type="button" value="+" onclick="add(this)" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <h4 class="sub_header">7-8 pm</h4>
                                                            {{--    <div class="form-group">
                                                                <label for="exampleInputPassword1">7-8 pm</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->pm_7_8}}" name="pm_7_8" id="c2" class="form-control" >
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbairs7_8}}" name="noofbairs7_8" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp7_8}}" name="temp7_8" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->RH7_8}}" name="RH7_8" class="form-control" >
                                                            </div>



                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_7_8" class="form-control" >

                                        <option value="{{$ento4->weather_condition_7_8}}"> {{$ento4->weather_condition_7_8}}</option>
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
                                                                @if(count($ento4->mosq_spec_stat7_8) > 0)
                                                                @foreach($ento4->mosq_spec_stat7_8 as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat7_8[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number7_8[]"  value="{{$row->mos_number}}" />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat7_8[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
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
                                                            {{--   <div class="form-group">
                                                                <label for="exampleInputPassword1">8-9 pm</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->pm_8_9}}" name="pm_8_9" id="c3" class="form-control" >
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbairs8_9}}" name="noofbairs8_9" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp8_9}}" name="temp8_9" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->RH8_9}}" name="RH8_9" class="form-control" >
                                                            </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_8_9" class="form-control" >
                                        <option value="{{$ento4->weather_condition_8_9}}"> {{$ento4->weather_condition_8_9}}</option>
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
                                                                @if(count($ento4->mosq_spec_stat8_9) > 0)
                                                                @foreach($ento4->mosq_spec_stat8_9 as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat8_9[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number8_9[]" required value="{{$row->mos_number}}" />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat8_9[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
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
                                                            {{--     <div class="form-group">
                                                                <label for="exampleInputPassword1">9-10 pm</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->pm_9_10}}" name="pm_9_10" id="c4" class="form-control" >
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbairs9_10}}" name="noofbairs9_10" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp9_10}}" name="temp9_10" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->RH9_10}}" name="RH9_10" class="form-control" >
                                                            </div>


                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_9_10" class="form-control" >
                                        <option value="{{$ento4->weather_condition_9_10}}"> {{$ento4->weather_condition_9_10}}</option>
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
                                                                @if(count($ento4->mosq_spec_stat9_10) > 0)
                                                                @foreach($ento4->mosq_spec_stat9_10 as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat9_10[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number9_10[]" required value="{{$row->mos_number}}" />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat9_10[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number9_10[]" required value="0" />
                                                                </div>
                                                                
                                                                <div class="form-group col-md-1">
                                                                    <input type="button" value="+" onclick="add(this)" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <!-- =========================================================== -->
                                                            <h4 class="sub_header">10-11 pm</h4>
                                                            {{--      <div class="form-group">
                                                                <label for="exampleInputPassword1">10-11 pm</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->pm_10_11}}" name="pm_10_11" id="c5" class="form-control" >
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbairs10_11}}" name="noofbairs10_11" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp10_11}}" name="temp10_11" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->RH10_11}}" name="RH10_11" class="form-control" >
                                                            </div>



                            <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_10_11" class="form-control" >
                                        <option value="{{$ento4->weather_condition_10_11}}"> {{$ento4->weather_condition_10_11}}</option>
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy"> Cloudy </option>
                                        <option value="Cold"> Cold </option>
                                        <option value="Drizzly"> Drizzly </option>
                                        <option value="Rainy"> Rainy </option>
                                        <option value="Windy(moderate)"> Windy (moderate)</option>
                                        <option value="Windy(heavy)"> Windy (heavy)</option>
                                        <option value="Moonlight"> Moonlight</option>
                                        <option value="Dry"> Dry</option>
                                        <option value="Normal"> Normal</option>
                                    </select>
                                </div>














                                                            <div class="row form-group">
                                                                <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                                                <br>
                                                                @if(count($ento4->mosq_spec_stat10_11) > 0)
                                                                @foreach($ento4->mosq_spec_stat10_11 as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat10_11[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number10_11[]" value="{{$row->mos_number}}" required />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat10_11[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number10_11[]" required value="0" />
                                                                </div>
                                                              
                                                                <div class="form-group col-md-1">
                                                                    <input type="button" value="+" onclick="add(this)" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <!-- =========================================================== -->
                                                            <h4 class="sub_header">11-12 pm </h4>
                                                            {{--           <div class="form-group">
                                                                <label for="exampleInputPassword1">11-12 pm </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->pm_11_12}}" name="pm_11_12" id="c6" class="form-control" >
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbairs11_12}}" name="noofbairs11_12" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp11_12}}" name="temp11_12" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->RH11_12}}" name="RH11_12" class="form-control" >
                                                            </div>


                            <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_11_12" class="form-control" >
                                        <option value="{{$ento4->weather_condition_11_12}}"> {{$ento4->weather_condition_11_12}}</option>
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy"> Cloudy </option>
                                        <option value="Cold"> Cold </option>
                                        <option value="Drizzly"> Drizzly </option>
                                        <option value="Rainy"> Rainy </option>
                                        <option value="Windy(moderate)"> Windy (moderate)</option>
                                        <option value="Windy(heavy)"> Windy (heavy)</option>
                                        <option value="Moonlight"> Moonlight</option>
                                        <option value="Dry"> Dry</option>
                                        <option value="Normal"> Normal</option>
                                    </select>
                                </div>













                                                            <div class="row form-group">
                                                                <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                                                <br>
                                                                @if(count($ento4->mosq_spec_stat11_12) > 0)
                                                                @foreach($ento4->mosq_spec_stat11_12 as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat11_12[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number11_12[]" value="{{$row->mos_number}}" required />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat11_12[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number11_12[]" required  value="0" />
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
                                                            {{--      <div class="form-group">
                                                                <label for="exampleInputPassword1">12-1 am</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->am_12_1}}" name="am_12_1" id="c7" class="form-control" >
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbairs12_1}}" name="noofbairs12_1" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp12_1}}" name="temp12_1" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->RH12_1}}" name="RH12_1" class="form-control" >
                                                            </div>



                            <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_12_1" class="form-control" >
                                        <option value="{{$ento4->weather_condition_12_1}}"> {{$ento4->weather_condition_12_1}}</option>
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy"> Cloudy </option>
                                        <option value="Cold"> Cold </option>
                                        <option value="Drizzly"> Drizzly </option>
                                        <option value="Rainy"> Rainy </option>
                                        <option value="Windy(moderate)"> Windy (moderate)</option>
                                        <option value="Windy(heavy)"> Windy (heavy)</option>
                                        <option value="Moonlight"> Moonlight</option>
                                        <option value="Dry"> Dry</option>
                                        <option value="Normal"> Normal</option>
                                    </select>
                                </div>













                                                            <div class="row form-group">
                                                                <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                                                <br>
                                                                @if(count($ento4->mosq_spec_stat12_1) > 0)
                                                                @foreach($ento4->mosq_spec_stat12_1 as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat12_1[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number12_1[]" value="{{$row->mos_number}}" required />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat12_1[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number12_1[]" required value="0" />
                                                                </div>
                                                              
                                                                <div class="form-group col-md-1">
                                                                    <input type="button" value="+" onclick="add(this)" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <h4 class="sub_header">1-2 am</h4>
                                                            {{--                 <div class="form-group">
                                                                <label for="exampleInputPassword1">1-2 am</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->am_1_2}}" name="am_1_2" id="c8" class="form-control">
                                                            </div>
                                                            --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbairs1_2}}" name="noofbairs1_2" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp1_2}}" name="temp1_2" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->RH1_2}}" name="RH1_2" class="form-control" >
                                                            </div>


                            <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_1_2" class="form-control" >
                                        <option value="{{$ento4->weather_condition_1_2}}"> {{$ento4->weather_condition_1_2}}</option>
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy"> Cloudy </option>
                                        <option value="Cold"> Cold </option>
                                        <option value="Drizzly"> Drizzly </option>
                                        <option value="Rainy"> Rainy </option>
                                        <option value="Windy(moderate)"> Windy (moderate)</option>
                                        <option value="Windy(heavy)"> Windy (heavy)</option>
                                        <option value="Moonlight"> Moonlight</option>
                                        <option value="Dry"> Dry</option>
                                        <option value="Normal"> Normal</option>
                                    </select>
                                </div>


                                                            <div class="row form-group">
                                                                <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                                                <br>
                                                                @if(count($ento4->mosq_spec_stat1_2) > 0)
                                                                @foreach($ento4->mosq_spec_stat1_2 as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat1_2[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number1_2[]" value="{{$row->mos_number}}" required />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat1_2[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
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
                                                            {{--        <div class="form-group">
                                                                <label for="exampleInputPassword1">2-3 am</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->am_2_3}}" name="am_2_3" id="c9" class="form-control" >
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbairs2_3}}" name="noofbairs2_3" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp2_3}}" name="temp2_3" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->RH2_3}}" name="RH2_3" class="form-control" >
                                                            </div>






          <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_2_3" class="form-control" >
                                        <option value="{{$ento4->weather_condition_2_3}}"> {{$ento4->weather_condition_2_3}}</option>
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy"> Cloudy </option>
                                        <option value="Cold"> Cold </option>
                                        <option value="Drizzly"> Drizzly </option>
                                        <option value="Rainy"> Rainy </option>
                                        <option value="Windy(moderate)"> Windy (moderate)</option>
                                        <option value="Windy(heavy)"> Windy (heavy)</option>
                                        <option value="Moonlight"> Moonlight</option>
                                        <option value="Dry"> Dry</option>
                                        <option value="Normal"> Normal</option>
                                    </select>
                                </div>










                                                            <div class="row form-group">
                                                                <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                                                <br>
                                                                @if(count($ento4->mosq_spec_stat2_3) > 0)
                                                                @foreach($ento4->mosq_spec_stat2_3 as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat2_3[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number2_3[]" value="{{$row->mos_number}}" required />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                 @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat2_3[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number2_3[]" required value="0" />
                                                                </div>
                                                               
                                                                <div class="form-group col-md-1">
                                                                    <input type="button" value="+" onclick="add(this)" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <!-- =========================================================== -->
                                                            <h4 class="sub_header">3-4 am</h4>
                                                            {{--        <div class="form-group">
                                                                <label for="exampleInputPassword1">3-4 am</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->am_3_4}}" name="am_3_4" id="c10" class="form-control" >
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbairs3_4}}" name="noofbairs3_4" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp3_4}}" name="temp3_4" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->RH3_4}}" name="RH3_4" class="form-control" >
                                                            </div>





          <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_3_4" class="form-control" >
                                        <option value="{{$ento4->weather_condition_3_4}}"> {{$ento4->weather_condition_3_4}}</option>
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy"> Cloudy </option>
                                        <option value="Cold"> Cold </option>
                                        <option value="Drizzly"> Drizzly </option>
                                        <option value="Rainy"> Rainy </option>
                                        <option value="Windy(moderate)"> Windy (moderate)</option>
                                        <option value="Windy(heavy)"> Windy (heavy)</option>
                                        <option value="Moonlight"> Moonlight</option>
                                        <option value="Dry"> Dry</option>
                                        <option value="Normal"> Normal</option>
                                    </select>
                                </div>















                                                            <div class="row form-group">
                                                                <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                                                <br>
                                                                @if(count($ento4->mosq_spec_stat3_4) > 0)
                                                                @foreach($ento4->mosq_spec_stat3_4 as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat3_4[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number3_4[]" value="{{$row->mos_number}}" required />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat3_4[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number3_4[]" required value="0" />
                                                                </div>
                                                           
                                                                <div class="form-group col-md-1">
                                                                    <input type="button" value="+" onclick="add(this)" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <!-- =========================================================== -->
                                                            <h4 class="sub_header">4-5 am</h4>
                                                            {{--     <div class="form-group">
                                                                <label for="exampleInputPassword1">4-5 am</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->am_4_5}}" name="am_4_5" id="c11" class="form-control" >
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbairs4_5}}" name="noofbairs4_5" class="form-control" >
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp4_5}}" name="temp4_5" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->RH4_5}}" name="RH4_5" class="form-control" >
                                                            </div>



          <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_4_5" class="form-control" >
                                        <option value="{{$ento4->weather_condition_4_5}}"> {{$ento4->weather_condition_4_5}}</option>
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy"> Cloudy </option>
                                        <option value="Cold"> Cold </option>
                                        <option value="Drizzly"> Drizzly </option>
                                        <option value="Rainy"> Rainy </option>
                                        <option value="Windy(moderate)"> Windy (moderate)</option>
                                        <option value="Windy(heavy)"> Windy (heavy)</option>
                                        <option value="Moonlight"> Moonlight</option>
                                        <option value="Dry"> Dry</option>
                                        <option value="Normal"> Normal</option>
                                    </select>
                                </div>















                                                            <div class="row form-group">
                                                                <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                                                <br>
                                                                @if(count($ento4->mosq_spec_stat4_5) > 0)
                                                                @foreach($ento4->mosq_spec_stat4_5 as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat4_5[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number4_5[]" value="{{$row->mos_number}}" required />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat4_5[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number4_5[]" required  value="0"/>
                                                                </div>
                                                                
                                                                <div class="form-group col-md-1">
                                                                    <input type="button" value="+" onclick="add(this)" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <!-- =========================================================== -->
                                                            <h4 class="sub_header">5-6 am </h4>
                                                            {{--    <div class="form-group">
                                                                <label for="exampleInputPassword1">5-6 am </label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->am_5_6}}" name="am_5_6" id="c12" class="form-control" >
                                                            </div> --}}
                                                            
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">No of baits</label>
                                                                <input type="number" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->noofbairs5_6}}" name="noofbairs5_6" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> Temperature </label>
                                                                <input type="text" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->temp5_6}}" name="temp5_6" class="form-control" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> RH(%) </label>
                                                                <input type="number" value="{{$ento4->RH5_6}}" name="RH5_6" class="form-control" >
                                                            </div>







                              <div class="form-group">
                                    <label for="exampleInputPassword1">Weather condition </label>
                                    <select id="weather" name="weather_condition_5_6" class="form-control" >
                                        <option value="{{$ento4->weather_condition_5_6}}"> {{$ento4->weather_condition_5_6}}</option>
                                        <option value="">Select Weather Condition</option>
                                        <option value="Cloudy"> Cloudy </option>
                                        <option value="Cold"> Cold </option>
                                        <option value="Drizzly"> Drizzly </option>
                                        <option value="Rainy"> Rainy </option>
                                        <option value="Windy(moderate)"> Windy (moderate)</option>
                                        <option value="Windy(heavy)"> Windy (heavy)</option>
                                        <option value="Moonlight"> Moonlight</option>
                                        <option value="Dry"> Dry</option>
                                        <option value="Normal"> Normal</option>
                                    </select>
                                </div>











                                                            <div class="row form-group">
                                                                <label for="exampleInputEmail1" style="margin-left: 1em">Mosquito species</label>
                                                                <br>
                                                                @if(count($ento4->mosq_spec_stat5_6) > 0)
                                                                @foreach($ento4->mosq_spec_stat5_6 as $row)
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat5_6[]" class="form-control">
                                                                        <option value="{{$row->mosq_species}}">
                                                                        {{$row->mosq_species}}</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number5_6[]" value="{{$row->mos_number}}" required />
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                <div class="form-group col-md-8">
                                                                    <select name="mosq_spec_stat5_6[]" class="form-control">
                                                                        <option value="">Select</option>
                                                                        @foreach ($mosquito_list as $ms)
                                                                        <option value="{{ $ms->data }}">{{ $ms->data }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                
                                                                <div class="form-group col-md-3">
                                                                    <input type="Number" class="form-control" name="number5_6[]" required  value="0" />
                                                                </div>
                                                                
                                                                <div class="form-group col-md-1">
                                                                    <input type="button" value="+" onclick="add(this)" class="form-control" />
                                                                </div>
                                                            </div>
                                                       {{--      <div class="form-group">
                                                                <label for="exampleInputPassword1"> Total </label>
                                                                <input type="number" id="totalValue" pattern="^\d*(\.\d{0,2})?$" value="{{$ento4->total}}" name="total" class="form-control" >
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
     

<tfoot>
<th>
   
</th>
</tfoot>


<tfoot>
<th>
    Total
</th>
@foreach($total as $row1)
<th>     {{ $row1  }}</th>

@endforeach
</tfoot>

<br>


<tfoot>
@foreach ($ento4_indoor_list as $ento4)


<th> RH(%) </th>
   <th> {{$ento4->RH6_7}} </th>
   <th> {{$ento4->RH7_8}} </th>
   <th> {{$ento4->RH8_9}} </th>
   <th> {{$ento4->RH9_10}} </th>
   <th> {{$ento4->RH10_11}} </th>
   <th> {{$ento4->RH11_12}} </th>
   <th> {{$ento4->RH12_1}} </th>
   <th> {{$ento4->RH1_2}} </th>
   <th> {{$ento4->RH2_3}} </th>
   <th> {{$ento4->RH3_4}} </th>
   <th> {{$ento4->RH4_5}} </th>
   <th> {{$ento4->RH5_6}} </th>




@endforeach
</tfoot>




<tfoot>
@foreach ($ento4_indoor_list as $ento4)
   <th> Temp </th>
   <th> {{$ento4->temp6_7}} </th>
   <th> {{$ento4->temp7_8}} </th>
   <th> {{$ento4->temp8_9}} </th>
   <th> {{$ento4->temp9_10}} </th>
   <th> {{$ento4->temp10_11}} </th>
   <th> {{$ento4->temp11_12}} </th>
   <th> {{$ento4->temp12_1}} </th>
   <th> {{$ento4->temp1_2}} </th>
   <th> {{$ento4->temp2_3}} </th>
   <th> {{$ento4->temp3_4}} </th>
   <th> {{$ento4->temp4_5}} </th>
   <th> {{$ento4->temp5_6}} </th>
@endforeach
</tfoot>

<tfoot>

 <th> Weather  </th>
@foreach ($ento4_indoor_list as $ento4)
   <th>  {{$ento4->weather_condition_6_7}} </th>
   <th>  {{$ento4->weather_condition_7_8}} </th>
   <th>  {{$ento4->weather_condition_8_9}} </th>
   <th>  {{$ento4->weather_condition_9_10}} </th>
   <th>  {{$ento4->weather_condition_10_11}} </th>
   <th>  {{$ento4->weather_condition_11_12}} </th>
   <th>  {{$ento4->weather_condition_12_1}} </th>
   <th>  {{$ento4->weather_condition_1_2}} </th>
   <th>  {{$ento4->weather_condition_2_3}} </th>
   <th>  {{$ento4->weather_condition_3_4}} </th>
   <th>  {{$ento4->weather_condition_4_5}} </th>
   <th>  {{$ento4->weather_condition_5_6}} </th>
@endforeach
</tfoot>



@foreach($string_total as $row2)
<tfoot>
<th colspan="2">
    
    {{ $row2->mosq_species  }} <br>
</th>

<th colspan="">
    
    {{ $row2->total_mos  }} <br>
</th>
</tfoot>

@endforeach





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
<!-- /.content-wrapper -->
{{-- <script>
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
</script> --}}
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
<style>

.box-body {
overflow: scroll !important;
}
td
{
width:500px  !important;
}
</style>