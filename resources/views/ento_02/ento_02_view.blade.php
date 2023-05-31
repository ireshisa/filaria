<!-- <?php

$no_dissected_mosquitos = null;
$positive_mosq = null;
$mq_postive_for_l3 = null;
$head_mf = null;
$head_l1 = null;
$head_l2 = null;
$head_l3 = null;
$thorax_mf = null;
$thorax_l1 = null;
$thorax_l2 = null;
$thorax_l3 = null;
$abdomen_mf = null;
$abdomen_l1 = null;
$abdomen_l2 = null;
$abdomen_l3 = null;

?> --><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Gravid Trap Collection VIEW
          
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Entomological data</a></li>
            <li class="active">Gravid Trap Collection  VIEW</li>
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
                        @if (session()->has('message'))
                        @if (session()->get('message') == true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Delete Your Record.
                        </div>
                        @endif
                        @if (session()->get('message') == false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Delete Your Record.
                        </div>
                        @endif
                        @endif

                        @if (session()->has('update'))
                        @if (session()->get('update') == true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Update Your Record.
                        </div>
                        @endif
                        @if (session()->get('update') == false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Update Your Record.
                        </div>
                        @endif
                        @endif

                        <table id="ento2_table" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>ID</th>
                                    <th>Date of Collection</th>
                                    <th>District</th>
                                    <th>MOH area</th>
                                    <th>PHM area</th>
                                    <th>Total traps</th>
                                    <th>Total Cx quin Mosquitos</th>
                                    <th>Mosquito density per trap</th>
                                    <th>Name of HEO</th>
                                    <th>Regional medical Officer </th>


                                    <!-- new data -->
                                    <th>Row NO</th>
                                    <th>Date</th>
                                    <th>No. of Traps</th>
                                    <th>GN Division</th>
                                    <th>Name Of The Chief Occupant</th>
                                    <th>Address</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th>Total No of Cx. <br> quin. Collected </th>

                                    <th >No of Mos: (I)</th>
                                    <th >Pool no (I)</th>
                                    <th >Ref. No(I)</th>
                                    <th >Result (I)</th>


                                    <th >No of Mos: (II)</th>
                                    <th >Pool no (II)</th>
                                    <th >Ref. No(II)</th>
                                    <th >Result (II)</th>


                                    <th >Date received</th>

                                    <th >Date Tested</th>
                                    <th >No of Mos:</th>
                                    <th >No of infected mos</th>
                                    <th >No of infective mos</th>


                                    <th>Head:-Mf</th>
                                    <th>Head:-L1</th>
                                    <th>Head:-L2</th>
                                    <th>Head:-L3</th>

                                    <th>Thorax:-Mf</th>
                                    <th>Thorax:-L1</th>
                                    <th>Thorax:-L2</th>
                                    <th>Thorax:-L3</th>

                                    <th>Abdomen:-Mf</th>
                                    <th>Abdomen:-L1</th>
                                    <th>Abdomen:-L2</th>
                                    <th>Abdomen:-L3</th>




                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($ento2_list as $ento2)


                                <?php $i = 0;


                                $data3 = \App\Ento_02_data::with('Ento_5_news')->where("ento_02_id",  $ento2->ento_02_id)->get();



                                ?>
                                @foreach ($data3 as $data)

                                <?php $i++; ?>

                                <tr>
                                    <td>
                                        <a href="{{ url('/view_ento2new') }}/{{ $ento2->ento_02_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>VIEW </a>
                                        <a href="{{ url('/view_ento2new_print') }}/{{ $ento2->ento_02_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>Print </a>



                                            <a href="{{ url('/view_ento2new_excel') }}/{{ $ento2->ento_02_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>Excel </a>





                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{ url('/delete_ento2') }}/{{ $ento2->ento_02_id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete</a>
                                    </td>

                                    <td>{{ $ento2->formid }}</td>
                                    <td>{{ $ento2->date }}</td>
                                    <td>{{ $ento2->district }}</td>
                                    <td>{{ $ento2->moh_area }}</td>
                                    <td>{{ $ento2->phm_area }}</td>
                                    <td>{{ $ento2->total_traps }}</td>
                                    <td>{{ $ento2->total_cx_quin_mosq }}</td>
                               
                                    <td>{{ $ento2->mosq_density_per_trap }}</td>
                                    <td>{{ $ento2->heo }}</td>
                                    <td>{{ $ento2->rmo_ent }}</td>

                                    <td>{{$i}}</td>
                                    <td>{{ $data->date }}</td>
                                    <td>{{ $data->no_of_traps }}</td>
                                    <td>{{ $data->gn_division }}</td>
                                    <td>{{ $data->chief_occupant }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>{{ $data->gps_lat }}</td>
                                    <td>{{ $data->gps_long }}</td>
                                    <td>{{ $data->total_cx_quin }}</td>

                                    <td>{{ $data->No_mos_1 != null ? $data->No_mos_1 : '0' }}</td>
                                    <td>{{ $data->Pool_no_1 != null ? $data->Pool_no_1 : '0' }}</td>
                                    <td>{{ $data->ref_no_1 != null ? $data->ref_no_1 : '0' }}</td>
                                    <td>{{ $data->pcr_remarks }}</td>

                                    <td>{{ $data->No_mos_2 != null ? $data->No_mos_2 : '0' }}</td>
                                    <td>{{ $data->Pool_no_2 != null ? $data->Pool_no_2 : '0' }}</td>
                                    <td>{{ $data->ref_no_2 != null ? $data->ref_no_2 : '0' }}</td>
                                    <td>{{ $data->pcr_remarks2 }}</td>




                                    <td>{{ $data->pcr_date_rec }}</td>
                                    <td>{{ $data->pcr_date_test }}</td>


                                    @foreach ($data->Ento_5_news as $data2)
                                    <?php
                                    $no_dissected_mosquitos = $data2->no_dissected_mosquitos;
                                    if ($data2->type_of_parasite == 'Brugia malayi' || $data2->type_of_parasite == 'Wuchereria bancrofit') {
                                        if ($data2->species2 == 'CX') {

                                            $positive_mosq = $data2->positive_mosq;
                                            $mq_postive_for_l3 = $data2->mq_postive_for_l3;
                                            $head_mf = $data2->head_mf;
                                            $head_l1 = $data2->head_l1;
                                            $head_l2 = $data2->head_l2;
                                            $head_l3 = $data2->head_l3;
                                            $thorax_mf = $data2->thorax_mf;
                                            $thorax_l1 = $data2->thorax_l1;
                                            $thorax_l2 = $data2->thorax_l2;
                                            $thorax_l3 = $data2->thorax_l3;
                                            $abdomen_mf = $data2->abdomen_mf;
                                            $abdomen_l1 = $data2->abdomen_l1;
                                            $abdomen_l2 = $data2->abdomen_l2;
                                            $abdomen_l3 = $data2->abdomen_l3;
                                        }
                                    }
                                    ?>
                                    @endforeach

                                    <td>{{ $no_dissected_mosquitos != null ? $no_dissected_mosquitos : '0' }}</td>
                                    <td>{{ $positive_mosq != null ? $positive_mosq : '0' }}</td>
                                    <td>{{ $mq_postive_for_l3 != null ? $mq_postive_for_l3 : '0' }}</td>
                                    <td>{{ $head_mf != null ? $head_mf : '0' }}</td>
                                    <td>{{ $head_l1 != null ? $head_l1 : '0' }}</td>
                                    <td>{{ $head_l2 != null ? $head_l2 : '0' }}</td>
                                    <td>{{ $head_l3 != null ? $head_l3 : '0' }}</td>
                                    <td>{{ $thorax_mf != null ? $thorax_mf : '0' }}</td>
                                    <td>{{ $thorax_l1 != null ? $thorax_l1 : '0' }}</td>
                                    <td>{{ $thorax_l2 != null ? $thorax_l2 : '0' }}</td>
                                    <td>{{ $thorax_l3 != null ? $thorax_l3 : '0' }}</td>
                                    <td>{{ $abdomen_mf != null ? $abdomen_mf : '0' }}</td>
                                    <td>{{ $abdomen_l1 != null ? $abdomen_l1 : '0' }}</td>
                                    <td>{{ $abdomen_l2 != null ? $abdomen_l2 : '0' }}</td>
                                    <td>{{ $abdomen_l3 != null ? $abdomen_l3 : '0' }}</td>

                                </tr>





                                @endforeach

                                @endforeach
                            </tbody>




















                            <tfoot>
                                <tr>
                                    <th>Action</th>
                                    <th>ID</th>
                                    <th>Date of Collection</th>
                                    <th>District</th>
                                    <th>MOH area</th>
                                    <th>PHM area</th>
                                    <th>Total traps</th>
                                    <th>Total Cx quin Mosquitos</th>
                                    <th>Mosquito density per trap</th>
                                    <th>Name of HEO</th>
                                    <th>Regional medical Officer </th>


                                    <!-- new data -->
                                    <th>Row NO</th>
                                    <th>Date</th>
                                    <th>No. of Traps</th>
                                    <th>GN Division</th>
                                    <th>Name Of The Chief Occupant</th>
                                    <th>Address</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th>Total No of Cx. <br> quin. Collected </th>

                                    <th >No of Mos: (I)</th>
                                    <th >Pool no (I)</th>
                                    <th >Result (I)</th>


                                    <th >No of Mos: (II)</th>
                                    <th >Pool no (II)</th>
                                    <th >Result (II)</th>


                                    <th >Date received</th>
                                    <th >Ref. No</th>
                                    <th >Date Tested</th>
                                    <th >Result</th>
                                    <th >No of Mos:</th>
                                    <th >No of infected mos</th>
                                    <th >No of infective mos</th>


                                    <th>Head:-Mf</th>
                                    <th>Head:-L1</th>
                                    <th>Head:-L2</th>
                                    <th>Head:-L3</th>

                                    <th>Thorax:-Mf</th>
                                    <th>Thorax:-L1</th>
                                    <th>Thorax:-L2</th>
                                    <th>Thorax:-L3</th>

                                    <th>Abdomen:-Mf</th>
                                    <th>Abdomen:-L1</th>
                                    <th>Abdomen:-L2</th>
                                    <th>Abdomen:-L3</th>




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