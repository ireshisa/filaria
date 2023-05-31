<div class="form-group p-5 ml-2" style="    padding: 10px;">
									<label for="exampleInputEmail1"> <b>  Affected part of body by lymphoedema </b> </label>
							


									@if($Viewdata->Leg_Left=='option1'  || $Viewdata->Leg_Right=='option2' )

									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Leg</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1"  {{ $Viewdata->Leg_Left=='option1' ? 'checked':'disabled'}} value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2"  {{$Viewdata->Leg_Right=='option2' ? 'checked':'disabled'}} value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>
                @endif


								@if($Viewdata->Arm_Left=='option1' || $Viewdata->Arm_Right=='option2' )
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Arm</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1"  {{$Viewdata->Arm_Left=='option1' ? 'checked':'disabled'}} value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2"  {{$Viewdata->Arm_Right=='option2' ? 'checked':'disabled'}} value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>

										</div>
									</div>
									@endif


									@if($Viewdata->Breast_left=='Left'  || $Viewdata->Breast_right=='Right' )
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Breast</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1"   {{$Viewdata->Breast_left=='Left' ? 'checked':'disabled'}} name="Breast_left" value="Left">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2"   {{$Viewdata->Breast_right=='Right' ? 'checked':'disabled'}} name="Breast_right" value="Right">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>
									@endif



									@if($Viewdata->scrotortum_left=='scrotortum_left'  || $Viewdata->scrotortum_right=='scrotortum_right' )
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Scrotum</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1"   {{$Viewdata->scrotortum_left=='scrotortum_left' ? 'checked':'disabled'}} value="scrotortum_left" name="scrotortum_left">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2"   {{$Viewdata->scrotortum_right=='scrotortum_right' ? 'checked':'disabled'}} value="scrotortum_right" name="scrotortum_right">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>
									@endif


									@if($Viewdata->Penisleft=='Peni_left'  )
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Penis</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1"   {{$Viewdata->Penisleft=='Peni_left' ? 'checked':'disabled' }} value="Peni_left" name="Penisleft">
												<!-- <label class="form-check-label" for="inlineCheckbox1">Left </label> -->
											</div>
											<!-- <div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" {{$Viewdata->Penisright=='Penis_right' ? 'checked':'' }} value="Penis_right" name="Penisright">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div> -->
										</div>
									</div>
									@endif


									@if($Viewdata->no_lymhedema_left=='option1'  )
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">No Lymphoedema</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1"   {{$Viewdata->no_lymhedema_left=='option1' ? 'checked':'disabled'}} value="option1" name="no_lymhedema_left">
												<!-- <label class="form-check-label" for="inlineCheckbox1">Left </label> -->
											</div>
											<!-- <div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" {{$Viewdata->no_lymhedema_right=='option2' ? 'checked':''}} value="option2" name="no_lymhedema_right">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div> -->
										</div>
									</div>
									@endif










									<div class="form-group ">
									<label for="exampleInputEmail1"><b>  Stage of lymphoedema </b></label>
									<br> <br>


									@if($Viewdata->stage_1_Left=='option1' || $Viewdata->stage_1_right=='option2' )
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Stage I </label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_1_Left" {{$Viewdata->stage_1_Left=='option1' ? 'checked':'' }} value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_1_right" {{$Viewdata->stage_1_right=='option2' ? 'checked':'' }} value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>
									@endif





									@if($Viewdata->stage_2_Left=='option1'|| $Viewdata->stage_2_right=='option2')
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage II </label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_2_Left" {{$Viewdata->stage_2_Left=='option1' ? 'checked':'' }} value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_2_right" {{$Viewdata->stage_2_right=='option2' ? 'checked':'' }} value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>
									@endif


									@if($Viewdata->stage_3_Left=='option1'|| $Viewdata->stage_3_right=='option2')
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage III</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_3_Left" value="option1" {{$Viewdata->stage_3_Left=='option1' ? 'checked':'' }}>
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_3_right" value="option2" {{$Viewdata->stage_3_right=='option2' ? 'checked':'' }}>
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>
									@endif


									@if($Viewdata->stage_4_Left=='option1'|| $Viewdata->stage_4_right=='option2')
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage IV</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_4_Left" value="option1" {{$Viewdata->stage_4_Left=='option1' ? 'checked':'' }}>
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_4_right" value="option2" {{$Viewdata->stage_4_right=='option2' ? 'checked':'' }}>
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>
									@endif


									@if($Viewdata->stage_5_Left=='option1'|| $Viewdata->stage_5_right=='option2' )
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage V</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_5_Left" {{$Viewdata->stage_5_Left=='option1' ? 'checked':'' }} value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_5_right" {{$Viewdata->stage_5_right=='option2' ? 'checked':'' }} value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>
									@endif



									@if($Viewdata->stage_6_Left=='option1'|| $Viewdata->stage_6_right=='option2' )
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage VI</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_6_Left" {{$Viewdata->stage_6_Left=='option1' ? 'checked':'' }} value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_6_right" {{$Viewdata->stage_6_right=='option2' ? 'checked':'' }} value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>
									@endif

									@if($Viewdata->stage_7Left=='option1'|| $Viewdata->stage_7_right=='option2')
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label"> Stage VII</label>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="stage_7Left" {{$Viewdata->stage_7Left=='option1' ? 'checked':'' }} value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Left </label>
											</div>
											<div class="form-check form-check-inline" style="margin-left: 50px;">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="stage_7_right" {{$Viewdata->stage_7_right=='option2' ? 'checked':'' }} value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Right</label>
											</div>
										</div>
									</div>
									@endif
								</div>
























								</div>