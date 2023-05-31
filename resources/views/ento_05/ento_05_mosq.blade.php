
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ENTO 5 DISSECTION FORM<br>
        <small>(To be filled for all fields) </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ENTO 5</a></li>
            <li class="active">ENTO 5 DISSECTION FORM</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            
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
                        <hr>
                        <center> <h3><b>ENTO 05 DISSECTION</b></h3></center>
                        <hr>
                        <form method="post" action="{{url('/ento_05_mosq_save') }}">
                            {{csrf_field() }}
                            <!-- <h3>ENTO 5 MOSQUITO</h3> -->
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ento 5 ID</label>
                                    <select name="ento_05_id" class="form-control" required onchange="getaddress(this.value)">
                                        <option value="">Select Ento 5 Id</option>
                                        @foreach ($ento5_list as $list)
                                        <option value="{{ $list->ento_05_id }}">{{ $list->ento_05_id}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Dissected by</label>
                                    <input type="text" name="dissected_by" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Dissected Date</label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="dissected_by_date" class="datepicker_v form-control pull-right">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Examined by  </label>
                                    <input type="text" name="examined" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="exampleInputPassword1">Examined date</label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="examined_date" class="datepicker_v form-control pull-right">
                                </div>
                                <br>
                                <div class="form-group hidden">
                                    <label for="exampleInputPassword1">Entered in data register by HEO</label>
                                    <input type="text" name="entered" class="form-control" >
                                </div>
                                <div class="form-group hidden">
                                    <label for="exampleInputPassword1">Entered date</label>
                                    <input data-date-format="yyyy-mm-d" type="date" name="entered_date" class="datepicker_v form-control pull-right">
                                </div>
             {{--                    <div class="form-group">
                                    <label for="exampleInputPassword1">Species  </label>
                                    <select name="species" class="form-control">
                                        <option value="Cx quin"> Cx quin </option>
                                        <option value="Mansonia"> Mansonia </option>
                                    </select>
                                </div>
                                 --}}







         <div class="form-group" style="margin-top: 10px;">
                                    <label for="exampleInputPassword1"> Total mosquitoes</label>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Cx quin </label>
                                            <input type="number" value="0" required name="total_mosqito" class="form-control" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia </label>
                                            <input type="number" value="0" required name="total_mosqito_ma" class="form-control" >
                                        </div>
                                        
                                    </div>
                                </div>
                                <span style="padding: 5px 5px" > <br></span>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Unfed </label>
                                    
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Cx quin </label>
                                            <input type="number" value="0"  name="abdo_uf" class="form-control" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia </label>
                                            <input type="number" value="0"  name="abdo_uf_ma" class="form-control" >
                                        </div>
                                        
                                    </div>
                                    
                                </div>





                            </div>
                            
                            <div class="col-md-6">
                                
           
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Fed  </label>
                                    
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Cx quin </label>
                                            <input type="number" value="0"  name="abdo_f" class="form-control" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia </label>
                                            <input type="number" value="0"  name="abdo_f_ma" class="form-control" >
                                        </div>
                                        
                                    </div>
                                </div>
                                <span style="padding: 5px 5px" > <br></span>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Semi gravid</label>
                                    
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Cx quin </label>
                                            <input type="number" value="0"  name="abdo_sg" class="form-control" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia </label>
                                            <input type="number" value="0"  name="abdo_sg_ma" class="form-control" >
                                        </div>
                                        
                                    </div>
                                </div>
                                <span style="padding: 5px 5px" > <br></span>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Gravid</label>
                                    
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Cx quin </label>
                                            <input type="number" value="0"  name="abdo_g" class="form-control" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia </label>
                                            <input type="number" value="0"  name="abdo_g_ma" class="form-control" >
                                        </div>

                                    </div>
                                </div> 
                                <span style="padding: 5px 5px" > <br></span>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Number spoiled</label>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Cx quin </label>
                                            <input type="number" value="0"  name="no_of_spoiled" class="form-control" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia </label>
                                            <input type="number" value="0"  name="no_of_spoiled_ma" class="form-control" >
                                        </div>
                                        
                                    </div>
                                </div>
                                <span style="padding: 5px 5px" > <br></span>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> No of dissected mosquitoes </label>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Cx quin </label>
                                            <input type="number" value="0"  name="no_of_dissected" class="form-control" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Mansonia </label>
                                            <input type="number" value="0"  name="no_of_dissected_ma" class="form-control" >
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <center>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </center>
                                
                            </div>
                            
                        </form>
                        <div class="col-md-12" >
                            <span style="padding: 10px 10px; "><br></span>
                        </div>
                        <br>
                        
                        <center  class="col-md-12"  style="padding: 10px 10px; " >
                        <hr>
                        <h3><b>ENTO 05 Mosquito</b></h3>
                        </center>
                        <hr>
                        <form method="post" action="{{url('/ento_05_new_mosq_save') }}">
                            {{csrf_field() }}
                            
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ento 5 ID</label>
                                    <select name="ento_05_id" class="form-control" required onchange="getaddress(this.value)">
                                        <option value="">Select Ento 5 Id</option>
                                        @foreach ($ento5_list as $list)
                                        <option value="{{ $list->ento_05_id }}">{{ $list->ento_05_id}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address  </label>
                                    <select name="address" class="form-control" id="ad_list">
                                        
                                        <option value=""> Select Ento 5 ID  </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Species  </label>
                                    <select name="species2" class="form-control">
                                        <option value="CX"> Cx quin </option>
                                        <option value="Mansonia"> Mansonia </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mosquito positive for parasite :</label>
                                    <input type="text" name="positive_mosq" class="form-control" value="0" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <hr>
                                    <h3>Head</h3>
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">MF</label>
                                                <input type="number" required name="head_mf" class="form-control"  value="0">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">L 1</label>
                                                <input type="number" required name="head_l1" class="form-control"  value="0">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">L 2</label>
                                                <input type="number" required name="head_l2" class="form-control"  value="0">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">L 3</label>
                                                <input type="number" required name="head_l3" class="form-control"  value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <span style="padding: 5px 5px" > <br></span>
                                    <hr>
                                    <h3>Thorax </h3>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">MF</label>
                                            <input type="number" required name="thorax_mf" class="form-control"  value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">L 1</label>
                                            <input type="number" required name="thorax_l1" class="form-control"  value="0">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">L 2</label>
                                            <input type="number" required name="thorax_l2" class="form-control"  value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">L 3</label>
                                            <input type="number" name="thorax_l3" class="form-control"  value="0">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div style="border-top:1px solid;"></div>
                                    <h3>Abdomen</h3>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">MF</label>
                                            <input type="number" name="abdomen_mf" class="form-control"  value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">L 1</label>
                                            <input type="number" name="abdomen_l1" class="form-control"  value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">L 2</label>
                                            <input type="number" name="abdomen_l2" class="form-control"  value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">L 3</label>
                                            <input type="number" name="abdomen_l3" class="form-control"  value="0">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mosquito positive For L3</label>
                                        <input type="number"  name="mq_postive_for_l3" value="0" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Remarks</label>
                                        <input type="text"  name="remarks" class="form-control" value="0" required>
                                    </div>
                                </div>
                            </div>
                            <span style="padding: 10px 5px" > <br> <br> <br> <br> <br> <br> <br> <br></span>
                            <div class="box-footer ">
                                <center> <button type="submit" class="btn btn-primary">Submit</button></center>
                                
                            </div>
                        </form>
                        {{--                  againg divided to to table and keep all table insert on one view  --}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper