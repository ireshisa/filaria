
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              ENTO 3 DATA FORM<br>
              <small>(To be filled for all fields) </small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">ENTO 3</a></li>
              <li class="active">ENTO 3 DATA FORM</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">

              <!-- left column -->
              <form method="post" action="{{url('/ento3_data_save') }}">

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
                                      <label for="exampleInputEmail1">Ento 3 ID</label>
                                      <select name="ento_03_id" class="form-control" id="ent_03_id">
                                          {{$first=true}}
                                          @foreach ($ento3_list as $list)
                                          <option value="{{ $list->ento_03_id }}">
                                              {{$first==true?"Last entered ID":""}} {{ $list->ento_03_id }} / {{ $list->total_no_of_mosq }} 
                                          </option>
                                          {{$first==true?$first=false:$first=false}}
                                          @endforeach
                                      </select>
                                  </div>
                                  <!-- <div class="form-group">
                                      <label for="exampleInputPassword1">Mosquito Genus</label>
                                      <input  type="text" placeholder="Mosquito Genus..." name="mosq_genus"
                                          class="form-control">
                                  </div> -->
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Mosquito species</label>
                                      <!-- <input  type="text" placeholder="Mosquito Species..." name="mosq_species"
                                          class="form-control"> -->
                                      <select name="mosq_species" class="form-control" required="">
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
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Number of mosquitos</label>
              <input type="number" id="no_of_mosq"  name="no_of_mosq" class="form-control" required="" onchange="get_total_calculate()">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Percentage of mosquito species </label>
                                <input onclick="get_total_calculate()" id="density_per_trap" type="text" pattern="^\d*(\.\d{0,2})?$"  name="density_per_trap" class="form-control" required="">
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