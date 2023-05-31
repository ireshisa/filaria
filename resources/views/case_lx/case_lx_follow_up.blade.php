<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <!--2 <sup>nd</sup> form- -->
        MF POSITIVE PATIENT FOLLOW-UP FORM
        <br>
            <small>(To be filled for all fields)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> CASE INVESTIGATION </a></li>
            <li class="active">Mf positive patient follow-up form</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form method="post" action="{{ url('/case_lx_follow_up_save') }}">
                {{ csrf_field() }}
                <div class="col-md-12">
                    @if (session()->has('message'))
                        @if (session()->get('message') == true)
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Success!</h4>
                                Successfully save your data.
                            </div>
                        @endif
                        @if (session()->get('message') == false)
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                                Failed save your data.
                            </div>
                        @endif
                    @endif

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Patient Identification Number</label>
                                    <select name="case_lx_id" class="form-control" onchange="getpdate(this.value)">
                                        {{ $first = true }}
                                        @foreach ($caselx_list as $list)
<option value="{{ $list->case_lx_id }}">{{ $first == true ? 'Last Patient entered' : '' }}   OPD:- {{ $list-> slide_id_number }}</option>
                                            {{ $first == true ? ($first = false) : ($first = false) }}
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Due date for 5p</label>
                                    <input data-date-format="yyyy-mm-d" type="date" placeholder="" name="date"
                                        class="form-control pull-right datepicker_v">
                                </div>
                                

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Reported date for 5p</label>
                                    <input data-date-format="yyyy-mm-d" type="date" placeholder="" name="reporteddatefor5p"
                                        class="form-control pull-right datepicker_v">
                                </div>





                                <div class="form-group">
                                    <label for="exampleInputPassword1">Has patient completed the treatment as prescribed</label>
                                    <select name="has_completed" class="form-control" onchange="checkInput(this.value)">
                                        <option value="">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                                <div class="form-group" style="display: none" id="ifNo">
                                    <label for="exampleInputPassword1">If No, reasons for non-compliance </label>
                                    <input type="text" placeholder="" name="reason" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">
                                        Adverse Drug Reactions (ADR) experienced by the patient
                                    </label>
                                    <input type="text" placeholder="" name="adverse_effect" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Result of repeat blood film(5p)</label>
                                    <select name="blood_result" class="form-control" onchange="checkInput(this.value)">
                                        <option value="">Select</option>
                                        <option value="postive">Positive</option>
                                        <option value="Negative">Negative</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">MF count in repeat blood film(if
                                        Positive)</label>
                                    <input type="number" pattern="^\d*(\.\d{0,2})?$" placeholder="" name="mf_count"
                                        class="form-control">
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="idd">
                                    <label for="exampleInputPassword1">
                                         Corrective measures taken by the patient (if instructed during previous visit) 
                                    </label>
                                
                                    <select class="js-example-basic-multiple  form-control "  name="meassuresarray[]" multiple data-live-search="true">
                                        <option value="1"> Mosquito net</option>
                                        <option value="2"> Mosquito repellent vaporizer, spray or cream</option>
                                        <option value="3"> Use of natural remedies (eg:-maduruthala)</option>
                                        <option value="4">wearing light colored clothes to cover the whole body at night.</option>
                                        <option value="5"> Use windows with screens.</option>
                                        <option value="6"> Repair any damage in sewage pit and cover exhaust pipe opening with mosquito preventive net.</option>
                                        <option value="7"> Clean blocked drains</option>
                                        <option value="8"> Other</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the PHFO/ PHI collected the blood film</label>
                                    <input type="text" placeholder="" name="pfo_phi" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the PHLT examined the blood film</label>
                                    <input type="text" placeholder="" name="name_examind_blood" class="form-control">
                                </div>

                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">Recommendation </label>
                                    <textarea id="w3review" name="recommendation" rows="4" cols="50" class="form-control">

                                    </textarea>
                                </div> --}}


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Remarks</label>
                                    <input type="text" placeholder="" name="remarks" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name of the treating medical officer </label>
                                    <input type="text" placeholder="" name="name_followed_Officer" class="form-control">
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