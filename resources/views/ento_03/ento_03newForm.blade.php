  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<h1> Cattle Baited Net  Trap <br>
  			<small></small>
  		</h1>
  		<ol class="breadcrumb">
  			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  			<li><a href="#">ENTO 3</a></li>
  			<li class="active">ENTO 3 FORM</li>
  		</ol>
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<div class="row">

  			<!-- left column -->
  			<form method="post" action="{{url('/ento3_data_newsave') }}">

  				{{csrf_field() }}
  				<div class="col-md-12">
  					@if(session()->has('message'))





  					@if (session()->has('id'))
  					<div class="alert alert-info alert-dismissible">
  						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  						<Center>
  							<h3><i class="icon fa fa-check"></i> Your form ID is :- {{ session()->get('id') }} </h3>
  						</Center>
  					</div>
  					@endif


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


  					<div class="box box-primary">
  						<div class="box-header with-border">
  							<!-- <h3 class="box-title">Quick Example</h3> -->
  						</div>

  						<div class="box-body" style="overflow: auto;">
  							<div class="col-md-6">

  								<!-- <div class="form-group">
  									<label for="exampleInputEmail1">Form ID</label>
  									<input type="text" name="formid" class="form-control" required>
  								</div> -->

  								{{-- <div class="form-group">
                                      <label for="exampleInputEmail1">District</label>
                                      <select name="district" class="form-control" onchange="getMoh(this.value)" required="">
                                          <option value="">Select</option>
                                          @if(Auth::user()->role!=="ADMIN" & Auth::user()->role !== "AFC")
                                          <option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
  								@else
  								@foreach ($district_list as $dis)
  								<option value="{{ $dis->district }}">{{ $dis->district }}</option>
  								@endforeach
  								@endif

  								</select>
  							</div> --}}


  							<div class="form-group">
  								<label for="exampleInputEmail1">District</label>
  								<!-- <input type="text" name="district" class="form-control" required> -->

  								<select name="district" class="form-control" required="" onchange="getMoh(this.value)">
  									<option value="">Select</option>
  									@if ((Auth::user()->role !== 'ADMIN') & (Auth::user()->role !== 'AFC'))
  									<option value="{{ Auth::user()->district }}">{{Auth::user()->district }}</option>
  									@else
  									@foreach ($district_list as $dis)
  									<option value="{{ $dis->district }}">{{ $dis->district }}</option>
  									@endforeach
  									@endif
  								</select>


  							</div>

  							<div class="form-group">
  								<label for="exampleInputPassword1">MOH area</label>
  								<input list="moh_list" name="moh" required class="form-control" autocomplete="off">
  								<datalist id="moh_list">

  								</datalist>
  							</div>


  							<div class="form-group">
  								<label for="exampleInputPassword1">PHM  area</label>
  								<input type="text" name="phi" class="form-control">
  							</div>

  							<div class="form-group">
  								<label for="exampleInputPassword1">GN division</label>
  								<input type="text" name="gn" class="form-control">
  							</div>

  							<div class="form-group">
  								<label for="exampleInputPassword1">Locality</label>
  								<input type="text" class="form-control" name="address">
  							</div>


  						</div>
  						<div class="col-md-6">


  							<div class="form-group">
  								<label for="exampleInputPassword1">GPS latitude</label>
  								<input type="text" name="gps_lat" class="form-control">
  							</div>

  							<div class="form-group">
  								<label for="exampleInputPassword1">GPS longitude</label>
  								<input type="text" name="gps_long" class="form-control">
  							</div>


  							{{--
  							<!-- <div class="form-group">
  								<label for="exampleInputPassword1">Time of bait entered</label>
  								<input type="time" name="time_of_bait" class="form-control">
  							</div> -->  --}}

  							{{-- <!-- <div class="form-group">
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
  							</div> -->  --}}


  							<div class="form-group">
  								<label for="exampleInputPassword1">Period of Collection</label>{{-- new data fields  --}}
  								<div class="col-md-12">

  									<div class="col-md-6">
  										<div class="form-group">
  											<label for="exampleInputPassword1">From</label>
  											<input type="date" name="period_of_collection_from" class="form-control">
  										</div>
  									</div>

  									<div class="col-md-6">
  										<div class="form-group">
  											<label for="exampleInputPassword1">To</label>
  											<input type="date" name="period_of_collection_to" class="form-control">
  										</div>
  									</div>

  								</div>
  							</div>


  							<div class="form-group">
  								<label for="exampleInputPassword1">No.of traps:</label>
  								<input type="number" min="0" name="no_of_traps"  value="0" class="form-control">
  							</div>


  							<div class="form-group">
  								<label for="exampleInputPassword1">Start time of collection</label>
  								<input type="time" name="start_time_of_col" class="form-control">
  							</div>

  						</div>
  						<!-- /.box-body -->


  					</div>

  					<!-- /.box -->


  				</div>









  				<div clss="row " style="background-color: #fff; padding:5px;">
  					<div class="col-12">
  						<center>
  							<a class="btn btn-primary   add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Row</a>
  						</center>
  					</div>
  				</div>









  				<div clss="row " style="background-color: #fff; padding:5px;
                    overflow-x:auto;
                    overflow-y:none;
                    max-height:80vh">



  					<table class="table table-bordered" id="tbl_posts">
  						<thead class="ther">

  							<tr>
  								<th rowspan="4">#Row NO</th>
  								<th rowspan="4">Mosquito species</th>
  								<th rowspan="4">No of mosquitoes</th>

  								<th rowspan="4">Density (per trap)</th>




  								<th colspan="6">PCR detail</th>

  								<th rowspan="4">Action</th>

  							</tr>


  							<tr>
  								<th rowspan="3">No of Mos:</th>
  								<th rowspan="3">Pool no</th>
  								<th rowspan="3">Date received</th>
  								<th rowspan="3">Ref. No</th>
  								<th rowspan="3">Date Tested</th>
  								<th rowspan="3">Result</th>




  							</tr>





  							</tr>
  						</thead>




  						<tbody id="tbl_posts_body">
  							<tr id="rec-1">
  								<td id="sample_rowonre" rowspan="2"><span class="sn">1</span>.</td>
  								<td rowspan="2">
  									<select name="mosq_species[]" class="form-control" required="">
  										<option value="">Select mosquito species</option>
  										<option value="Aedes (aedimorphus) jamesi">Aedes (aedimorphus) jamesi</option>
  										<option value="Aedes (aedimorphus) pallidostriatus">Aedes (aedimorphus)
  											pallidostriatus</option>
  										<option value="Aedes (aedimorphus) pipersalatus">Aedes (aedimorphus)
  											pipersalatus</option>
  										<option value="Aedes (aedimorphus) vexans">Aedes (aedimorphus) vexans</option>
  										<option value="Aedes (aedimorphus) vittatus">Aedes (aedimorphus) vittatus
  										</option>
  										<option value="Aedes (mucidus) scatophagoides">Aedes (mucidus) scatophagoides
  										</option>
  										<option value="Aedes (stegomyia) aegypti">Aedes (stegomyia) aegypti</option>
  										<option value="Aedes (stegomyia) albopictus">Aedes (stegomyia) albopictus
  										</option>
  										<option value="Anopheles (anopheles) barbirostris">Anopheles (anopheles)
  											barbirostris</option>
  										<option value="Anopheles (anopheles) nigerrimus">Anopheles (anopheles)
  											nigerrimus</option>
  										<option value="Anopheles (anopheles) peditaeniatus">Anopheles (anopheles)
  											peditaeniatus</option>
  										<option value="Anopheles (cellia) aconitus">Anopheles (cellia) aconitus
  										</option>
  										<option value="Anopheles (cellia) annularis">Anopheles (cellia) annularis
  										</option>
  										<option value="Anopheles (cellia) culicifacies">Anopheles (cellia)
  											culicifacies</option>
  										<option value="Anopheles (cellia) elegans">Anopheles (cellia) elegans</option>
  										<option value="Anopheles (cellia) jamesii">Anopheles (cellia) jamesii</option>
  										<option value="Anopheles (cellia) karwari">Anopheles (cellia) karwari</option>
  										<option value="Anopheles (cellia) maculatus">Anopheles (cellia) maculatus
  										</option>
  										<option value="Anopheles (cellia) pallidus">Anopheles (cellia) pallidus
  										</option>
  										<option value="Anopheles (cellia) stephensi">Anopheles (cellia) stephensi
  										</option>
  										<option value="Anopheles (cellia) subpictus">Anopheles (cellia) subpictus
  										</option>
  										<option value="Anopheles (cellia) tessellatus">Anopheles (cellia) tessellatus
  										</option>
  										<option value="Anopheles (cellia) vagus">Anopheles (cellia) vagus</option>
  										<option value="Anopheles (cellia) varuna">Anopheles (cellia) varuna</option>
  										<option value="Armigeres (armigeres) subalbatus">Armigeres (armigeres)
  											subalbatus</option>
  										<option value="Coquillettidia (coquillettidia) crassipes">Coquillettidia
  											(coquillettidia) crassipes</option>
  										<option value="Culex (culex) bitaeniorhynchus ">Culex (culex) bitaeniorhynchus
  										</option>
  										<option value="Culex (culex) fuscocephala">Culex (culex) fuscocephala</option>
  										<option value="Culex (culex) gelidus">Culex (culex) gelidus</option>
  										<option value="Culex (culex) hutchinsoni">Culex (culex) hutchinsoni</option>
  										<option value="Culex (culex) infula">Culex (culex) infula</option>
  										<option value="Culex (culex) jacksoni">Culex (culex) jacksoni</option>
  										<option value="Culex (culex) mimulus">Culex (culex) mimulus</option>
  										<option value="Culex (culex) pseudovishnui">Culex (culex) pseudovishnui
  										</option>
  										<option value="Culex (culex) quinquefasciatus">Culex (culex) quinquefasciatus
  										</option>
  										<option value="Culex (culex) sinensis">Culex (culex) sinensis</option>
  										<option value="Culex (culex) sitiens">Culex (culex) sitiens</option>
  										<option value="Culex (culex) tritaeniorhynchus">Culex (culex)
  											tritaeniorhynchus</option>
  										<option value="Culex (culex) vishnui">Culex (culex) vishnui</option>
  										<option value="Culex (culex) whitmorei">Culex (culex) whitmorei</option>
  										<option value="Culex (culiciomyia) nigropunctatus">Culex (culiciomyia)
  											nigropunctatus</option>
  										<option value="Culex (culiciomyia) pallidothorax">Culex (culiciomyia)
  											pallidothorax</option>
  										<option value="Culex (eumelnomyia) brevipalpis">Culex (eumelnomyia)
  											brevipalpis</option>
  										<option value="Culex (lophoceraomyia) bicornutus">Culex (lophoceraomyia)
  											bicornutus</option>
  										<option value="Culex (lophoceraomyia) infantulus">Culex (lophoceraomyia)
  											infantulus</option>
  										<option value="Culex (lophoceraomyia) minutissimus ">Culex (lophoceraomyia)
  											minutissimus </option>
  										<option value="Lutzia (lutzia) fuscanus">Lutzia (lutzia) fuscanus</option>
  										<option value="Lutzia (lutzia) halifaxii">Lutzia (lutzia) halifaxii</option>
  										<option value="Mansonia (mansonioides) annulifera">Mansonia (mansonioides)
  											annulifera</option>
  										<option value="Mansonia (mansonioides) indiana">Mansonia (mansonioides)
  											indiana</option>
  										<option value="Mansonia (mansonioides) uniformis">Mansonia (mansonioides)
  											uniformis</option>
  										<option value="Other ">Other</option>
  									</select>
  								</td>

  								<td rowspan="2"><input type="number" min="0" value="0" id="no_of_mosq" name="no_of_mosq[]" class="form-control" required onchange="TotalTrapLaid()"></td>
  								<td rowspan="2"><input type="text" min="0" name="density_per_trap[]" class="form-control" required=""></td>





  								<td><input type="number" name="No_mos_1[]" min="0" value="0" class="form-control" onchange="TotalNoMos()" onkeyup="TotalNoMos()"></td>
  								<td><input type="text" name="Pool_no_1[]" min="0" value="0" class="form-control"></td>

  								<td rowspan="2"><input type="date" min="0" name="pcr_date_rec[]" class="form-control"></td>

  								<td><input type="text" name="ref_no_1[]" min="0" value="0" class="form-control"></td>

  								<td rowspan="2"><input type="date" name="pcr_date_test[]" class="form-control"></td>

  								<td><select name="pcr_remarks[]" class="form-control" style="width:150Px">
  										<option value="">Select </option>
  										<option value="Postive">Postive</option>
  										<option value="Negative">Negative</option>
  										<option value="Not Tested">Not Tested</option>
  									</select>
  								</td>




  								<td rowspan="2">
  									<a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
  								</td>
  							</tr>

  							<tr id="rec-1">
  								<td><input type="number" min="0" name="No_mos_2[]" value="0" onchange="TotalNoMos()" onkeyup="TotalNoMos()" class="form-control"></td>
  								<td><input type="text" min="0" name="Pool_no_2[]" value="0" class="form-control"></td>
  								<td><input type="text" min="0" name="ref_no_2[]" value="0" class="form-control"></td>
  								<td><select name="pcr_remarks2[]" class="form-control" style="width: 150px;">
  										<option value="">Select </option>
  										<option value="Postive">Postive</option>
  										<option value="Negative">Negative</option>
  										<option value="Not Tested">Not Tested</option>
  									</select>
  								</td>
  							</tr>

  						</tbody>





  						<tfoot>
  							<tr>
  								<td class="totalth" colspan="2" style="text-align: center; vertical-align: middle;"> Total</td>
  								<td class="totalth"> <input type="number" min="0" disabled name="total_no_of_mosq" class="form-control"></td>
  								<td class="totalth"> <input type="number" min="0" disabled name="totaldencity" class="form-control"></td>

  								<!-- <td class="totalth"><input type="text" disabled name="TotalCxQuin" class="form-control"></td>
  						<td class="totalth"><input type="text" disabled name="TotalNo_Mos" class="form-control"></td> -->

  								<td class="totalth"><input type="text" disabled name="TotalNo_Mos" class="form-control"></td>
  								<td class="totalth" colspan="5"> </td>

  							</tr>
  						</tfoot>
  					</table>

  				</div>









  				<div class="box box-primary">
  					<div class="box-body" style="overflow: hidden;">
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="exampleInputPassword1">Name of HEO</label>
  								<input type="text" name="name_of_heo" class="form-control">
  							</div>
  							<div class="form-group">
  								<label for="exampleInputPassword1">Name of RMO:</label>
  								<input type="text" name="name_of_rmo_entomologist" class="form-control">
  							</div>
  						</div>
  						<div class="col-md-6">
  							<div class="form-group">
  								<label for="exampleInputPassword1">Date</label>
  								<input type="date" name="date_of_collection" class="form-control">
  							</div>
  						</div>
  					</div>
  				</div>




  				<div class="box-footer">
  					<center>
  						<button type="submit" class="btn btn-primary">Submit</button>
  					</center>
  				</div>


  		</div>


  		</form>

  		<!-- /.row -->
  	</section>
  	<!-- /.content -->
  </div>
















  </form>

  <!-- /.row -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





  <div style="display:none;">
  	<table id="sample_table">
  		<tbody>
  			<tr id="">
  				<td id="sample_rowonre" rowspan="2"><span class="sn">1</span>.</td>
  				<td rowspan="2">
  					<select name="mosq_species[]" class="form-control" required="">
  						<option value="">Select mosquito species</option>
  						<option value="Aedes (aedimorphus) jamesi">Aedes (aedimorphus) jamesi</option>
  						<option value="Aedes (aedimorphus) pallidostriatus">Aedes (aedimorphus)
  							pallidostriatus</option>
  						<option value="Aedes (aedimorphus) pipersalatus">Aedes (aedimorphus)
  							pipersalatus</option>
  						<option value="Aedes (aedimorphus) vexans">Aedes (aedimorphus) vexans</option>
  						<option value="Aedes (aedimorphus) vittatus">Aedes (aedimorphus) vittatus
  						</option>
  						<option value="Aedes (mucidus) scatophagoides">Aedes (mucidus) scatophagoides
  						</option>
  						<option value="Aedes (stegomyia) aegypti">Aedes (stegomyia) aegypti</option>
  						<option value="Aedes (stegomyia) albopictus">Aedes (stegomyia) albopictus
  						</option>
  						<option value="Anopheles (anopheles) barbirostris">Anopheles (anopheles)
  							barbirostris</option>
  						<option value="Anopheles (anopheles) nigerrimus">Anopheles (anopheles)
  							nigerrimus</option>
  						<option value="Anopheles (anopheles) peditaeniatus">Anopheles (anopheles)
  							peditaeniatus</option>
  						<option value="Anopheles (cellia) aconitus">Anopheles (cellia) aconitus
  						</option>
  						<option value="Anopheles (cellia) annularis">Anopheles (cellia) annularis
  						</option>
  						<option value="Anopheles (cellia) culicifacies">Anopheles (cellia)
  							culicifacies</option>
  						<option value="Anopheles (cellia) elegans">Anopheles (cellia) elegans</option>
  						<option value="Anopheles (cellia) jamesii">Anopheles (cellia) jamesii</option>
  						<option value="Anopheles (cellia) karwari">Anopheles (cellia) karwari</option>
  						<option value="Anopheles (cellia) maculatus">Anopheles (cellia) maculatus
  						</option>
  						<option value="Anopheles (cellia) pallidus">Anopheles (cellia) pallidus
  						</option>
  						<option value="Anopheles (cellia) stephensi">Anopheles (cellia) stephensi
  						</option>
  						<option value="Anopheles (cellia) subpictus">Anopheles (cellia) subpictus
  						</option>
  						<option value="Anopheles (cellia) tessellatus">Anopheles (cellia) tessellatus
  						</option>
  						<option value="Anopheles (cellia) vagus">Anopheles (cellia) vagus</option>
  						<option value="Anopheles (cellia) varuna">Anopheles (cellia) varuna</option>
  						<option value="Armigeres (armigeres) subalbatus">Armigeres (armigeres)
  							subalbatus</option>
  						<option value="Coquillettidia (coquillettidia) crassipes">Coquillettidia
  							(coquillettidia) crassipes</option>
  						<option value="Culex (culex) bitaeniorhynchus ">Culex (culex) bitaeniorhynchus
  						</option>
  						<option value="Culex (culex) fuscocephala">Culex (culex) fuscocephala</option>
  						<option value="Culex (culex) gelidus">Culex (culex) gelidus</option>
  						<option value="Culex (culex) hutchinsoni">Culex (culex) hutchinsoni</option>
  						<option value="Culex (culex) infula">Culex (culex) infula</option>
  						<option value="Culex (culex) jacksoni">Culex (culex) jacksoni</option>
  						<option value="Culex (culex) mimulus">Culex (culex) mimulus</option>
  						<option value="Culex (culex) pseudovishnui">Culex (culex) pseudovishnui
  						</option>
  						<option value="Culex (culex) quinquefasciatus">Culex (culex) quinquefasciatus
  						</option>
  						<option value="Culex (culex) sinensis">Culex (culex) sinensis</option>
  						<option value="Culex (culex) sitiens">Culex (culex) sitiens</option>
  						<option value="Culex (culex) tritaeniorhynchus">Culex (culex)
  							tritaeniorhynchus</option>
  						<option value="Culex (culex) vishnui">Culex (culex) vishnui</option>
  						<option value="Culex (culex) whitmorei">Culex (culex) whitmorei</option>
  						<option value="Culex (culiciomyia) nigropunctatus">Culex (culiciomyia)
  							nigropunctatus</option>
  						<option value="Culex (culiciomyia) pallidothorax">Culex (culiciomyia)
  							pallidothorax</option>
  						<option value="Culex (eumelnomyia) brevipalpis">Culex (eumelnomyia)
  							brevipalpis</option>
  						<option value="Culex (lophoceraomyia) bicornutus">Culex (lophoceraomyia)
  							bicornutus</option>
  						<option value="Culex (lophoceraomyia) infantulus">Culex (lophoceraomyia)
  							infantulus</option>
  						<option value="Culex (lophoceraomyia) minutissimus ">Culex (lophoceraomyia)
  							minutissimus </option>
  						<option value="Lutzia (lutzia) fuscanus">Lutzia (lutzia) fuscanus</option>
  						<option value="Lutzia (lutzia) halifaxii">Lutzia (lutzia) halifaxii</option>
  						<option value="Mansonia (mansonioides) annulifera">Mansonia (mansonioides)
  							annulifera</option>
  						<option value="Mansonia (mansonioides) indiana">Mansonia (mansonioides)
  							indiana</option>
  						<option value="Mansonia (mansonioides) uniformis">Mansonia (mansonioides)
  							uniformis</option>
  						<option value="Other ">Other</option>
  					</select>
  				</td>

  				<td rowspan="2"><input type="number" id="no_of_mosq" name="no_of_mosq[]" value="0" class="form-control" required onchange="TotalTrapLaid()"></td>
  				<td rowspan="2"><input type="text" name="density_per_trap[]" value="0" class="form-control" required=""></td>





  				<td><input type="number" name="No_mos_1[]" value="0" class="form-control" onchange="TotalNoMos()" onkeyup="TotalNoMos()"></td>
  				<td><input type="text" name="Pool_no_1[]" value="0" class="form-control"></td>

  				<td rowspan="2"><input type="date" name="pcr_date_rec[]" class="form-control"></td>

  				<td><input type="text" name="ref_no_1[]" value="0" class="form-control"></td>

  				<td rowspan="2"><input type="date" name="pcr_date_test[]" class="form-control"></td>

  				<td><select name="pcr_remarks[]" class="form-control" style="width: 150px;">
  						<option value="">Select </option>
  						<option value="Postive">Postive</option>
  						<option value="Negative">Negative</option>
  						<option value="Not Tested">Not Tested</option>
  					</select>
  				</td>




  				<td rowspan="2">
  					<a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a>
  				</td>

  			</tr>


  			<tr name="secondrow" id="">
  				<td><input type="number" name="No_mos_2[]" value="0" onchange="TotalNoMos()" onkeyup="TotalNoMos()" class="form-control"></td>
  				<td><input type="text" name="Pool_no_2[]" value="0" class="form-control"></td>
  				<td><input type="text" name="ref_no_2[]" value="0" class="form-control"></td>
  				<td><select name="pcr_remarks2[]" class="form-control" style="width: 150px;">
  						<option value="">Select </option>
  						<option value="Postive">Postive</option>
  						<option value="Negative">Negative</option>
  						<option value="Not Tested">Not Tested</option>
  					</select>
  				</td>
  			</tr>




  		</tbody>
  	</table>
  </div>











  <style>
  	.totalth {
  		white-space: nowrap;
  		vertical-align: middle;
  		background-color: #d58312;
  		border-color: #ffffff;
  		color: #fff;
  		border: 1px solid #ad701c !important;
  	}



  	th {
  		white-space: nowrap;
  		vertical-align: middle;
  		background-color: #3c8dbc;
  		border-color: #367fa9;
  		color: #fff;
  		border: 1px solid #00a8c1 !important;
  	}

  	td {
  		border: 1px solid #00a8c1 !important;
  	}

  	.table-bordered>thead>tr>th {
  		border: 1px solid #00a8c1 !important;
  	}

  	.form-control {
  		padding: 2px !important;
  	}

  	.ther {
  		position: sticky !important;
  		top: 0;
  	}

  	th,
  	td {
  		text-align: center !important;
  		vertical-align: middle !important;
  	}
  </style>



  <script type="text/javascript">
  	$(document).ready(function() {

  		var index2 = 1;

  		jQuery(document).delegate('a.add-record', 'click', function(e) {
  			e.preventDefault();
  			var content = jQuery('#sample_table tr'),
  				size = jQuery('#tbl_posts >tbody >tr').length + 1,
  				element = null,
  				element = content.clone();
  			element.attr('id', 'rec-' + size);

  			//  var third  =element.('tr[name ="secondrow"]');
  			//  third.attr('id', 'rec2-'+size);


  			element.find('.delete-record').attr('data-id', size);
  			element.appendTo('#tbl_posts_body');
  			index2 = index2 + 1;
  			element.find('.sn').html(index2);










				var checkboxes = document.querySelectorAll("input[name='Pool_no_1[]']");
	for (var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].addEventListener("keyup", function() {
			var index = Array.prototype.indexOf.call(checkboxes, this);
			document.getElementsByName("ref_no_1[]")[index].value = document.getElementsByName("Pool_no_1[]")[index].value;
		});
	}







	var checkboxes2 = document.querySelectorAll("input[name='Pool_no_2[]']");
	for (var i = 0; i < checkboxes2.length; i++) {
		checkboxes2[i].addEventListener("keyup", function() {
			var index = Array.prototype.indexOf.call(checkboxes2, this);
			document.getElementsByName("ref_no_2[]")[index].value = document.getElementsByName("Pool_no_2[]")[index].value;
		});
	}








  		});
  		jQuery(document).delegate('a.delete-record', 'click', function(e) {
  			e.preventDefault();
  			var didConfirm = confirm("Are you sure You want to delete");
  			if (didConfirm == true) {
  				var id = jQuery(this).attr('data-id');
  				var targetDiv = jQuery(this).attr('targetDiv');
  				jQuery('#rec-' + id).remove();

  				jQuery('#rec-' + id).remove();

  				//       regnerate index number on table
  				$('#tbl_posts_body #sample_rowonre').each(function(index = 0) {

  					$(this).find('span.sn').html(index + 1);
  				});

  				return true;
  			} else {
  				return false;
  			}
  		});
  		mosquitoCalculation('total_cx_quin_mosq', 'total_traps', 'mosquito_density_per_trap');

  	});






		var checkboxes = document.querySelectorAll("input[name='Pool_no_1[]']");
	for (var i = 0; i < checkboxes.length; i++) {
		checkboxes[i].addEventListener("keyup", function() {
			var index = Array.prototype.indexOf.call(checkboxes, this);
			document.getElementsByName("ref_no_1[]")[index].value = document.getElementsByName("Pool_no_1[]")[index].value;
		});
	}







	var checkboxes2 = document.querySelectorAll("input[name='Pool_no_2[]']");
	for (var i = 0; i < checkboxes2.length; i++) {
		checkboxes2[i].addEventListener("keyup", function() {
			var index = Array.prototype.indexOf.call(checkboxes2, this);
			document.getElementsByName("ref_no_2[]")[index].value = document.getElementsByName("Pool_no_2[]")[index].value;
		});
	}


	


  	function Total_CxQuin() {
  		var inps = document.querySelectorAll('input[name="total_cx_quin[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalCxQuin")[0].value = totals;
  		document.getElementsByName("total_cx_quin_mosq")[0].value = totals;

  		mosquitoCalculation('total_cx_quin_mosq', 'total_traps', 'mosquito_density_per_trap');


  	}






  	function TotalNoMos() {
  		var inps = document.querySelectorAll('input[name="No_mos_1[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}


  		var inps2 = document.querySelectorAll('input[name="No_mos_2[]"]');
  		var totals2 = 0;

  		for (var i = 0; i < inps2.length; i++) {
  			totals2 = totals2 + parseInt(inps2[i].value);
  		}




  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalNo_Mos")[0].value = totals + totals2;
  	}


  	function TotalNoOFMos() {
  		var inps = document.querySelectorAll('input[name="No_of_mos[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalNoOF_Mos")[0].value = totals;
  	}


  	function TotalNOInfectedMos() {
  		var inps = document.querySelectorAll('input[name="No_of_infected_mos[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalNOInfected_Mos")[0].value = totals;
  	}

  	function TotalNOInfectiveMos() {
  		var inps = document.querySelectorAll('input[name="No_of_infective_mos[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalNOInfective_Mos")[0].value = totals;
  	}





  	function TotalHeadmf() {
  		var inps = document.querySelectorAll('input[name="head_mf[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalHead_mf")[0].value = totals;
  	}





  	function Totalheadl1() {
  		var inps = document.querySelectorAll('input[name="head_l1[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("Totalhead_l1")[0].value = totals;
  	}








  	function Totalheadl2() {
  		var inps = document.querySelectorAll('input[name="head_l2[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("Totalhead_l2")[0].value = totals;
  	}




  	function Totalheadl3() {
  		var inps = document.querySelectorAll('input[name="head_l3[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("Totalhead_l3")[0].value = totals;
  	}




  	function TotalThoraxmf() {
  		var inps = document.querySelectorAll('input[name="thorax_mf[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalThorax_mf")[0].value = totals;
  	}



  	function TotalThoraxl1() {
  		var inps = document.querySelectorAll('input[name="thorax_l1[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalThorax_l1")[0].value = totals;
  	}




  	function TotalThoraxl2() {
  		var inps = document.querySelectorAll('input[name="thorax_l2[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalThorax_l2")[0].value = totals;
  	}




  	function TotalThoraxl3() {
  		var inps = document.querySelectorAll('input[name="thorax_l3[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalThorax_l3")[0].value = totals;
  	}





  	function TotalAbdomenmf() {
  		var inps = document.querySelectorAll('input[name="abdomen_mf[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalAbdomen_mf")[0].value = totals;
  	}



  	function TotalAbdomenL1() {
  		var inps = document.querySelectorAll('input[name="abdomen_l1[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalAbdomen_L1")[0].value = totals;
  	}





  	function TotalAbdomenL2() {
  		var inps = document.querySelectorAll('input[name="abdomen_l2[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalAbdomen_L2")[0].value = totals;
  	}




  	function TotalAbdomenL3() {
  		var inps = document.querySelectorAll('input[name="abdomen_l3[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total amount on " + totals);
  		document.getElementsByName("TotalAbdomen_L3")[0].value = totals;
  	}



  	function TotalTrapLaid() {
  		var inps = document.querySelectorAll('input[name="no_of_traps[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total trap " + totals);
  		document.getElementsByName("total_traps")[0].value = totals;

  		mosquitoCalculation('total_cx_quin_mosq', 'total_traps', 'mosquito_density_per_trap');
  	}





  	function Totalabdominalcondition_UF() {
  		var inps = document.querySelectorAll('input[name="abdominalcondition_UF[]"]');
  		var totals = 0;
  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		document.getElementsByName("Total_abdominalcondition_UF")[0].value = totals;


  	}

  	function Totalabdominalcondition_U() {
  		var inps = document.querySelectorAll('input[name="abdominalcondition_U[]"]');
  		var totals = 0;
  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		document.getElementsByName("Total_abdominalcondition_U")[0].value = totals;


  	}


  	function Totalabdominalcondition_SG() {
  		var inps = document.querySelectorAll('input[name="abdominalcondition_SG[]"]');
  		var totals = 0;
  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		document.getElementsByName("Total_abdominalcondition_SG")[0].value = totals;


  	}


  	function Totalabdominalcondition_G() {
  		var inps = document.querySelectorAll('input[name="abdominalcondition_G[]"]');
  		var totals = 0;
  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		document.getElementsByName("Total_abdominalcondition_G")[0].value = totals;


  	}














  	function TotalTrapLaid() {
  		var inps = document.querySelectorAll('input[name="no_of_mosq[]"]');
  		var totals = 0;
  		var i;
  		for (i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  			document.getElementsByName("total_no_of_mosq")[0].value = totals;

  			console.log(i);
  		}
  		for (var r = 0; r < inps.length; r++) {
  			get_total_calculate3(r);
  		}
  	}





  	///////////////////////////////////// new 

  	function get_total_calculate3(i) {

  		var inps = document.querySelectorAll('input[name="no_of_mosq[]"]');
  		var mosquito = parseInt(inps[i].value);

  		var traps = document.getElementsByName('no_of_traps')[0].value;

  		document.getElementsByName("density_per_trap[]")[i].value = parseFloat((parseInt(mosquito) / parseInt(traps)) * 1).toFixed(1);
  		TotalDencity();
  	}





  	function TotalDencity() {
  		var inps = document.querySelectorAll('input[name="density_per_trap[]"]');
  		var totals = 0;

  		for (var i = 0; i < inps.length; i++) {
  			totals = totals + parseInt(inps[i].value);
  		}
  		console.log("Total trap " + totals);
  		document.getElementsByName("totaldencity")[0].value = totals;


  	}
  </script>