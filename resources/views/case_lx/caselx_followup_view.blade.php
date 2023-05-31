<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Case investigation and Mf positive patients follow up view

            <br /> {{-- <small>Case investigation and Mf positive patients follow up view</small> --}}
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li><a href="/caselx_data">CASE INVESTIGATION</a></li>
            <li class="active">Mf positive patient follow-up form</li>
                    
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
                    <div class="box-body" style="    height: 500px !important;">
                        @if(session()->has('message')) @if(session()->get('message')==true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Delete Your Record.
                        </div>
                        @endif @if(session()->get('message')==false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Delete Your Record.
                        </div>
                        @endif @endif @if(session()->has('update')) @if(session()->get('update')==true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Update Your Record.
                        </div>
                        @endif @if(session()->get('update')==false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Update Your Record.
                        </div>
                        @endif @endif
                        <table id="ento2_table" class="table table-bordered table-hover">
                            
                            <thead>
                                <tr>
                                    <th>OPD ID no. </th>
                                    <th>Due date for 5P </th>
                                    <th>Reported date </th>
                                    <th>Completion of Rx</th>
                                    <th>ADR</th>
                                    <th>5P result</th>
                                    <th>MF count </th>
                                    <th>Corrective measures taken </th>
                                    <th>PHFO/PHI</th>
                                    <th>PHLT</th>
                                    <th>Remarks</th>
                                    <th>MO</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($case_lx_followup_list as $caselx)
                                <tr>
                                    <td>

                                    <select name="case_lx_id" class="form-control" disabled  style="width:200px;">
                                    
                                                                    <option value="">Select Case Ix Id</option>
                                                                    @foreach ($caselx_list as $list)
                                                                    <option {{$caselx->case_lx_id==$list->case_lx_id
                                                                        ?"selected":""}} value="{{ $list->case_lx_id
                                                                        }}">
                                                                        {{ $list->slide_id_number }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                    </td>
                                    <td>{{ $caselx->date }}</td>
                                    <td>{{ $caselx->reporteddatefor5p }}</td>
                                    <td>{{ $caselx->has_completed }}</td>
                                    <td>{{ $caselx->adverse_effect}}</td>
                                    <td>{{ $caselx->blood_result }}</td>
                                     <td>{{ $caselx->mf_count }}</td>
                                    <td id="smlla">
                                        <select class="form-control js-example-basic-multiple" id="multiple-checkboxes2" multiple="multiple" name="meassuresarray[]">
                                            <option value="1" <?php if(strpos($caselx->meassures,"1")!== false){echo
                                                "selected";} ?>> Mosquito net</option>
                                            <option value="2" <?php if(strpos($caselx->meassures,"2")!== false){echo
                                                "selected";} ?>> Mosquito repellent vaporizer, spray
                                                or cream</option>
                                            <option value="3" <?php if(strpos($caselx->meassures,"3")!== false){echo
                                                "selected";} ?>> Use of natural remedies
                                                (maduruthala etc...)</option>
                                            <option value="4" <?php if(strpos($caselx->meassures,"4")!== false){echo
                                                "selected";} ?>> Wearing light colored covered
                                                clothes during work at night</option>
                                            <option value="5" <?php if(strpos($caselx->meassures,"5")!== false){echo
                                                "selected";} ?>> Use windows with screens</option>
                                            <option value="6" <?php if(strpos($caselx->meassures,"6")!== false){echo
                                                "selected";} ?>> Repair any damage in sewage pit,
                                                clean up blocked drains.</option>
                                            <option value="7" <?php if(strpos($caselx->meassures,"7")!== false){echo
                                                "selected";} ?>> Cover exhaust pipe opening with
                                                mosquito preventing net</option>
                                            <option value="8" <?php if(strpos($caselx->meassures,"8")!== false){echo
                                                "selected";} ?>> Other</option>
                                        </select>

                                    </td>



                                    <td>{{ $caselx->pfo_phi }}</td>
                                    <td>{{ $caselx->name_examind_blood }}</td>
                                    <td>{{$caselx->remarks}}</td>
                                    <td>{{ $caselx->name_followed_Officer }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $caselx->id }}" data-target="#editModal2{{$caselx->id}}"><i
                                               class="fa fa-pencil" aria-hidden="true"></i>
                                            <strong>Edit</strong></button>
                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{ url('/delete_caselx_follow') }}/{{ $caselx->id }}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <div id="editModal2{{$caselx->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT CASE IX</h4>
                                                <br />
                                            </div>
                                            <form method="post" action="{{ url('/caselx_followup_update') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <input type="hidden" name="id" value="{{$caselx->id}}" class="form-control" />


                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Patient Identification
                                                                    Number</label>

                                                                <select name="case_lx_id" class="form-control">
                                                                    <option value="">Select Case Ix Id</option>
                                                                    @foreach ($caselx_list as $list)
                                                                    <option {{$caselx->case_lx_id==$list->case_lx_id
                                                                        ?"selected":""}} value="{{ $list->case_lx_id
                                                                        }}">
                                                                        {{ $list->slide_id_number }}
                                                                    </option>
                                                                    @endforeach

                                                                

                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Due date for
                                                                    5p</label>
                                                                <input data-date-format="yyyy-mm-d" value="{{$caselx->date}}" name="date" type="date" class="form-control pull-right datepicker_v" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Reported date for
                                                                    5p</label>
                                                                <input data-date-format="yyyy-mm-d" type="date" name="reporteddatefor5p" class="form-control pull-right datepicker_v" value="{{$caselx->reporteddatefor5p}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Has patient completed
                                                                    the treatment as prescribed?</label>
                                                                <select name="has_completed" class="form-control">
                                                                    <option {{$caselx->
                                                                        has_completed=="Yes"?"selected":""}}
                                                                        value="Yes">Yes</option>
                                                                    <option {{$caselx->has_completed=="No"
                                                                        ?"selected":""}} value="No">No</option>
                                                                </select>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label for="exampleInputPassword1">If No, reasons for non-compliance </label>
                                                                <input value="{{$caselx->reason}}" type="text" placeholder="" name="reason" class="form-control" />
                                                            </div> -->


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">  Adverse Drug Reactions (ADR) experienced by the patient </label>
                                                                <input value="{{$caselx->adverse_effect}}" type="text" placeholder="" name="adverse_effect" class="form-control" />
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Result of repeat
                                                                    blood film(5p)</label>
                                                                <select name="blood_result" class="form-control" onchange="checkInput(this.value)">
                                                                    <option value="">Select</option>
                                                                    <option {{$caselx->
                                                                        blood_result=="postive"?"selected":""}}
                                                                        value="postive">postive</option>
                                                                    <option {{$caselx->blood_result=="Negative"
                                                                        ?"selected":""}} value="Negative">Negative
                                                                    </option>
                                                                </select>
                                                            </div>



                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">MF count in repeat
                                                                    blood film </label>
                                                                <input value="{{$caselx->mf_count}}" type="number" pattern="^\d*(\.\d{0,2})?$" placeholder="" name="mf_count" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">


                                                            <div class="form-group" id="idd">
                                                                <label for="exampleInputPassword1">Corrective measures taken by the patient (if
                                                                    instructed during previous visit)</label>

                                                                <select class="form-control multiple-checkboxes" id="multiple-checkboxes" multiple="multiple" name="meassuresarray[]">
                                                                    <option value="1" <?php if(strpos($caselx->
                                                                        meassures,"1")!== false){echo "selected";} ?>>
                                                                        Mosquito net</option>
                                                                    <option value="2" <?php if(strpos($caselx->
                                                                        meassures,"2")!== false){echo "selected";} ?>>
                                                                        Mosquito repellent vaporizer, spray or cream
                                                                    </option>
                                                                    <option value="3" <?php if(strpos($caselx->
                                                                        meassures,"3")!== false){echo "selected";} ?>>
                                                                       Use of natural remedies (eg:-maduruthala)
                                                                    </option>
                                                                    <option value="4" <?php if(strpos($caselx->
                                                                        meassures,"4")!== false){echo "selected";} ?>>
                                                                        Wearing light-coloured long clothes </option>
                                                                    <option value="5" <?php if(strpos($caselx->
                                                                        meassures,"5")!== false){echo "selected";} ?>>
                                                                        Use windows with screens</option>
                                                                    <option value="6" <?php if(strpos($caselx->
                                                                        meassures,"6")!== false){echo "selected";} ?>>
                                                                        Repair any damage in sewage pit and cover exhaust pipe opening with mosquito preventive net.
                                                                    </option>
                                                                    <option value="7" <?php if(strpos($caselx->
                                                                        meassures,"7")!== false){echo "selected";} ?>>
                                                                        Clean blocked drains
                                                                    </option>
                                                                    <option value="8" <?php if(strpos($caselx->
                                                                        meassures,"8")!== false){echo "selected";} ?>>
                                                                        Other</option>
                                                                </select>

 

                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Name of the PHFO/ PHI collected the blood film</label>
                                                                <input value="{{$caselx->pfo_phi}}" type="text" placeholder="" name="pfo_phi" class="form-control" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Name of the PHLT examined the blood film</label>
                                                                <input type="text" placeholder="" value="{{$caselx->name_examind_blood}}" name="name_examind_blood" class="form-control">
                                                            </div>

                                                            {{--
                                                            <div Sclass="form-group">
                                                                <label for="exampleInputPassword1">Recommendation </label>
                                                                <textarea id="w3review" name="recommendation" rows="4" cols="50" class="form-control">
                                                            {{$caselx->recommendation}}
                                                            </textarea>
                                                            </div>--}}

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Remarks</label>
                                                                <input type="text" placeholder="" name="remarks" class="form-control" value="{{$caselx->remarks}}">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Name of the treating medical officer </label>
                                                                <input type="text" value="{{$caselx->name_followed_Officer}}" name="name_followed_Officer" class="form-control">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>OPD ID&nbsp;no. </th>
                                    <th>Due&nbsp;date for 5P </th>
                                    <th>Reported date </th>
                                    <th>Completion of Rx</th>
                                    <th>ADR</th>
                                    <th>5P&nbsp;result</th>
                                    <th>MF&nbsp;count </th>
                                    <th>Corrective&nbsp;measures taken </th>
                                    <th>PHFO/PHI</th>
                                    <th>PHLT</th>
                                    <th>Remarks</th>
                                    <th>MO</th>
                                    <th>Action</th>

                                    <th></th>
                                </tr>
                            </tfoot>
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

<style>
    #smlla .select2-container{
        width: 200px !important;
    }
    
    .rowinput {
        margin-left: 0px !important;
        padding-left: 0px;
        margin-top: 3px;
    }
    
    #idd .btn-group {
        width: 100%;
    }
    
    #idd .select2-container-conta {
        width: 100%;
    
    }
    
    #idd .dropdown-toggle {
        overflow: hidden;
    }
    
    .aere div button {
        width: 200px !important;
    }
</style>