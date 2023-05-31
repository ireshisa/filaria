<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        FOLLOW UP FORM FOR MIGRANTS<br>
            <small>(To be filled for all fields) </small>
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

            <!-- left column -->
            <form method="post" action="{{url('/migrant_follow_up_save') }}">

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
                                    <label for="exampleInputEmail1">OPD identification number - migrant </label>
                                    <select  name="migrant_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($migrant_list as $list)
                                        <option value="{{ $list->migrant_id }}">{{ $list->opd_number }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Due date for follow up visit (5P)</label>
                                    <input  type="date" name="visit_date"
                                        data-date-format="yyyy-mm-d"  class="datepicker_v form-control pull-right">
                                </div>


                               <div class="form-group">
                                    <label for="exampleInputPassword1">Date reported for follow up</label>
                                    <input  type="date" name="folloupdate" data-date-format="yyyy-mm-d"  class="datepicker_v form-control pull-right">
                                </div>

                            
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Has patient completed the treatment as prescribed? </label>
                                    <select  name="has_treated" class="form-control" id="moh_list" onchange="checkInput(this.value)">
                                        <option value=""> select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                
                                <div class="form-group" id="ifNo" style="display: none">
                                    <label for="exampleInputPassword1">If No, reasons for non-compliance</label>
                                    <input  type="text" name="reson" class="form-control" >
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Adverse Drug Reactions (ADR) experienced by the patient</label>
                                    <input  type="text" name="adverse_effects" class="form-control" >
                                </div>
                                
                                
                                
                          

                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Result of repeat blood film(5p)</label>
                                    <select name="blood_result" class="form-control" onchange="checkInput(this.value)">
                                        <option value="">Select</option>
                                        	<option value="postive">postive</option>
									        <option value="Negative">Negative</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">MF count in repeat blood film(if Positive)</label>
                                    <input  type="text" name="mf_count" class="form-control">
                                </div>




                                                                
                             <div class="form-group">
                                    <label for="exampleInputPassword1">Measures adopted to prevent mosquito bites</label>
                                   <div>
                                     <select class="multiple-checkboxes form-control "  name="mosq_netsarray[]" multiple data-live-search="true">
                                        <option value="1"> Mosquito net</option>
                                        <option value="2"> Mosquito repellent vaporizer, coil, spray or cream</option>
                                        <option value="3"> Use of natural remedies (eg:-maduruthala)</option>
                                        <option value="4"> wearing light colored clothes to cover the whole body at night.</option>
                                        <option value="5"> Use windows with screens.</option>
                                        <option value="8"> Other</option>
                                     </select>
                                    </div>
                                </div>



  

                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Has patient taken corrective measures as instructed if given in previous visit (describe) </label>
                                      <select name="meassures" class="form-control" onchange="checkInput(this.value)">
                                        <option value="">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                      -->






                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the PHFO/ PHI collected the blood </label>
                                    <input  type="text" name="phfo_phi" class="form-control">
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the PHLT examined the blood film</label>
                                     <input  type="text" name="name_examined_blood_film" class="form-control" >
                                </div>
                                
                                

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Remarks</label>
                                    <input type="text" placeholder="" name="remarks" class="form-control">
                                </div>
                            
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the treating medical officer </label>
                                    <input  type="text" name="name_followed_officer" class="form-control">
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

<script>

    function checkInput(text) {
        if (text == "No") {
            $("#ifNo").show();
        } else {
            $("#ifNo").hide();
        }
    }

</script>
<style>
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