<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            FOLLOW UP FORM FOR MIGRANTS VIEW
            <br>
            <small>migrant follow view all data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">MIGRANT</a></li>
            <li class="active">FOLLOW UP FORM FOR MIGRANTS VIEW</li>
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
                        @if (session()->has('update')) @if (session()->get('update') == true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Update Your Record.
                        </div>
                        @endif @if (session()->get('update') == false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Update Your Record.
                        </div>
                        @endif @endif @if (session()->has('message')) @if (session()->get('message') == true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Delete Your Record.
                        </div>
                        @endif @if (session()->get('message') == false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Delete Your Record.
                        </div>
                        @endif @endif
                        <table id="ento2_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>MIGRANT&nbsp;ID</th>
                                    <th title="Date of follow up visit">Date&nbsp;of&nbsp;visit</th>
                                    <th title="Has patient completed the treatment as prescribed?"> COT&nbsp;for Patient&nbsp;treatment </th>
                                    <!-- <th title="If No, reasons for non-compliance">Reasons </th> -->
                                    <th title="What are the adverse effects experienced by the patient?">ADR
                                    </th>
                                    <th>(5P)&nbsp;Result</th>
                                    <th title="Mf count in repeated blood film">MF&nbsp;count</th>

                                    <th title="Has patient taken corrective measures as instructed if given in previous visit (describe) ">
                                    Corrective measures taken </th>
                                    <th title="Name of the PHFO/ PHI collected the blood">PHFO/ PHI collected&nbsp;the blood</th>
                                    <th title="Name and PHLT examined the blood film">PHLT examined the blood film</th>
                                    <th>Remarks</th>
                                    <th title="Name and Designation of the Officer following the patient"> MO</th>



                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($migrant_follow_list as $migrant)
                                <tr>
                                    <td>                                           @foreach ($migrant_list as $list)
                              {{ $migrant->migrant_id == $list->migrant_id ? $list->patient_id : '' }} 
                                        
                                </option>
                            
                                @endforeach
                            </td>
                                    <td>{{ $migrant->visit_date }}</td>
                                    <td>{{ $migrant->has_treated }}</td>
                                    <!-- <td>{{ $migrant->reson }}</td> -->
                                    <td>{{ $migrant->adverse_effects }}</td>
                                    <td>{{ $migrant->blood_result }}</td>
                                    <td>{{ $migrant->mf_count }}</td>

                                    <td>
                                                                 
                                    <select class="multiple-checkboxes form-control "  name="mosq_netsarray[]" multiple data-live-search="true">
                                        <?php if (strpos($migrant->actions_taken, "8") !== false) {echo "selected";}?> value="8"> Other</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "1") !== false) {echo "selected";}?> value="1"> Mosquito net</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "2") !== false) {echo "selected";}?> value="2"> Mosquito repellent vaporizer, coil, spray or cream</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "3") !== false) {echo "selected";}?> value="3"> Use of natural remedies (eg:-maduruthala)</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "4") !== false) {echo "selected";}?> value="4"> wearing light colored clothes to cover the whole body at night.</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "5") !== false) {echo "selected";}?> value="5"> Use windows with screens.</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "8") !== false) {echo "selected";}?> value="8"> Other</option>
                                    </select>

                                    </td>
                                    <td>{{ $migrant->phfo_phi }}</td>
                                    <td>{{ $migrant->name_examined_blood_film }}</td>
                                    <td>{{ $migrant->remarks }}</td>
                                    <td>{{ $migrant->name_followed_officer }}</td>






                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-id="{{ $migrant->id }}" data-target="#editModal2{{ $migrant->id }}"><i
                                                class="fa fa-pencil" aria-hidden="true"></i>
                                            <strong>Edit</strong> </button>
                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{ url('/delete_migrant_follow') }}/{{ $migrant->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <div id="editModal2{{ $migrant->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                                <h4 class="modal-title">EDIT MIGRANT FOLLOW</h4><br>
                                            </div>
                                            <form method="post" action="{{ url('/migrant_follow_update ') }}">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <input type="hidden" name="id" value="{{ $migrant->id }}" class="form-control" />

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">OPD identification number - migrant</label>
                                                                <select name="migrant_id" class="form-control">

                                                                    @foreach ($migrant_list as $list)
                                <option {{ $migrant->migrant_id == $list->migrant_id ? 'selected' : '' }} value="{{ $list->migrant_id }}">
                                         {{ $list->patient_id }}
                                </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Due date for follow up visit (5P)</label>
                                                                <input value="{{ $migrant->visit_date }}" type="text" name="visit_date" data-date-format="yyyy-mm-d" class="datepicker_v form-control pull-right">
                                                            </div>


                                                            
                         <div class="form-group">
                                    <label for="exampleInputPassword1">Date reported for follow up</label>
                                    <input  type="date" name="folloupdate" value="{{ $migrant->folloupdate }}"
                                        data-date-format="yyyy-mm-d"  class="datepicker_v form-control pull-right">
                                </div>



                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Has patient
                                                                    completed
                                                                    the treatment as
                                                                    prescribed? </label>
                                                                <select name="has_treated" class="form-control" id="moh_list">
                                                                    <option value=""> select</option>
                                                                    <option {{ $migrant->has_treated == 'Yes' ?
                                                                        'selected' : '' }}
                                                                        value="Yes">Yes</option>
                                                                    <option {{ $migrant->has_treated == 'No' ?
                                                                        'selected' : '' }}
                                                                        value="No">No</option>
                                                                </select>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label for="exampleInputPassword1">If No, reasons
                                                                    for
                                                                    non-compliance</label>
                                                                <input value="{{ $migrant->reson }}" type="text" name="reson" class="form-control">
                                                            </div> -->
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Adverse Drug Reactions (ADR) experienced by the patient</label>
                                                                <input value="{{ $migrant->adverse_effects }}" type="text" name="adverse_effects" class="form-control">
                                                            </div>










                    



















                                                        </div>
                                                        <div class="col-md-6">






                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Result of repeat blood film(5p)</label>
                                                                <select name="blood_result" class="form-control" onchange="checkInput(this.value)">
                                                                    <option value="">Select</option>
                                                                    <option value=""> select</option>
                                                                    <option {{ $migrant->blood_result == 'postive' ?'selected' : '' }} value="postive">postive</option>
                                                                    <option {{ $migrant->blood_result == 'Negative' ?'selected' : '' }} value="Negative">Negative</option>
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">MF count in repeat blood film(if Positive)</label>
                                                                <input value="{{ $migrant->mf_count }}" type="text" name="mf_count" class="form-control">
                                                            </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Measures adopted to prevent mosquito bites</label>
                                    <div> 
                                
                                    <select class="multiple-checkboxes form-control "  name="mosq_netsarray[]" multiple data-live-search="true">
                                        <?php if (strpos($migrant->actions_taken, "8") !== false) {echo "selected";}?> value="8"> Other</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "1") !== false) {echo "selected";}?> value="1"> Mosquito net</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "2") !== false) {echo "selected";}?> value="2"> Mosquito repellent vaporizer, coil, spray or cream</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "3") !== false) {echo "selected";}?> value="3"> Use of natural remedies (eg:-maduruthala)</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "4") !== false) {echo "selected";}?> value="4"> wearing light colored clothes to cover the whole body at night.</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "5") !== false) {echo "selected";}?> value="5"> Use windows with screens.</option>
                                        <option  <?php if (strpos($migrant->actions_taken, "8") !== false) {echo "selected";}?> value="8"> Other</option>
                                    </select>
                                </div>

                                </div>

                                                            <!-- <div class="form-group">
                                                                <label for="exampleInputPassword1">Has patient taken
                                                                    corrective measures as
                                                                    instructed if given in previous visit
                                                                    (describe) </label>
                                                               
                                                                <select name="meassures" class="form-control">
                                                                    <option {{$migrant->meassures=="Yes"?"selected":""}} value="Yes">Yes</option>
                                                                    <option {{$migrant->meassures=="No"?"selected":""}} value="No">No</option>
                                                                </select>
                                                            </div> -->





                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Name of the PHFO/ PHI collected the blood</label>
                                                                <input value="{{ $migrant->phfo_phi }}" type="text" name="phfo_phi" class="form-control">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Name of the PHLT examined the blood film</label>
                                                                <input type="text" name="name_examined_blood_film" class="form-control" value="{{ $migrant->name_examined_blood_film }}">
                                                            </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Remarks</label>
                                    <input type="text" placeholder="" name="remarks" class="form-control" value="{{ $migrant->remarks }}" >
                                </div>
                            
                                <div class="form-group">
                                    <label>Name of the treating medical officer </label>
                                     <input type="text" name="name_followed_officer" class="form-control" value="{{ $migrant->name_followed_officer }}">
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
                                <th>MIGRANT ID</th>
                                <th title="Date of follow up visit">Date of visit</th>
                                <th title="Has patient completed the treatment as prescribed?"> COT for Patient treatment </th>
                                <!-- <th title="If No, reasons for non-compliance">Reasons </th> -->
                                <th title="What are the adverse effects experienced by the patient?">ADR
                                    </th>
                                <th>(5P) Result</th>
                                <th title="Mf count in repeated blood film">MF count</th>
                                <th title="Has patient taken corrective measures as instructed if given in previous visit (describe) ">
                                Corrective measures taken  </th>
                                <th title="Name of the PHFO/ PHI collected the blood">PHFO/ PHI collected the blood
                                </th>
                                <th title="Name and PHLT examined the blood film">PHLT examined the blood film</th>
                                <th>Remarks</th>
                                <th title="Name and Designation of the Officer following the patient"> MO </th>



                                <th>Action</th>
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
<!-- /.content-wrapper --><style>
    .rowinput {
        margin-left: 0px !important;
        padding-left: 0px;
        margin-top: 3px;
    }

    #idd .btn-group
    {
        width: 100%;
    }

    #idd .multiselect 
    {
          width: 100%;
    }

</style>