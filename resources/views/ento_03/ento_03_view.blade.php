<?php $no_dissected_mosquitos = 0;
$positive_mosq = 0;
$mq_postive_for_l3 = 0;
$head_mf = 0;
$head_l1 = 0;
$head_l2 = 0;
$head_l3 = 0;
$thorax_mf = 0;
$thorax_l1 = 0;
$thorax_l2 = 0;
$thorax_l3 = 0;
$abdomen_mf = 0;
$abdomen_l1 = 0;
$abdomen_l2 = 0;
$abdomen_l3 = 0;

?><div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cattle Baited Net Trap
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">ENTO 3</a></li>
            <li class="active">ENTO 3 VIEW</li>
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
                        @if(session()->has('message'))
                        @if(session()->get('message')==true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Delete Your Record.
                        </div>
                        @endif
                        @if(session()->get('message')==false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Delete Your Record.
                        </div>
                        @endif
                        @endif
                        @if(session()->has('update'))
                        @if(session()->get('update')==true)
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            Successfully Update Your Record.
                        </div>
                        @endif
                        @if(session()->get('update')==false)
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Failed!</h4>
                            Failed Update Your Record.
                        </div>
                        @endif
                        @endif
                        <table id="ento2_table" class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>ID</th>
                                    <th>Period of Collection  </th>
                                    <th>District</th>
                                    <th>MOH area</th>
                                    <th>PHM area</th>
                                    <th>GN division</th>
                                    <th>Address</th>
                                    <th>longitude </th>
                                    <th>latitude </th>



                                    <th>#Row NO</th>
                                    <th>Mosquito species</th>
                                    <th>No of mosquitoes</th>
                                    <th>Density (per trap)</th>

                                    <th>No of Mos: (I)</th>
                                    <th>Pool no (I)</th>
                                    <th>Ref. No(I)</th>
                                    <th>Result (I)</th>


                                    <th>No of Mos: (II)</th>
                                    <th>Pool no (II)</th>
                                    <th>Ref. No(II)</th>
                                    <th>Result (II)</th>


                                    <th>Date received</th>

                                    <th>Date Tested</th>
                                    <th>No of Mos:</th>
                                    <th>No of infected mos</th>
                                    <th>No of infective mos</th>


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
                                @foreach ($ento3_list as $ento3)
                                <?php $i = 0;
                                $data22 = \App\Ento_03::with('ento_03_dataes')->where("ento_03_id", $ento3->ento_03_id)->first();
                                $data3 = \App\Ento_03_data::with('Ento_5_news')->where("ento_03_id", $ento3->ento_03_id)->get();
                                ?>

                                @foreach ($data3 as $data)
                                <?php $i++; ?>

                                <tr>

                                    <td>

                                        <a href="{{url('/new_view_ento3') }}/{{ $ento3->ento_03_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i> View</a>

                                        <a onclick="return confirm('Are you sure Delete this record?')" href="{{url('/delete_ento3') }}/{{ $ento3->ento_03_id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete</a>

                                        <a href="{{url('/new_view_ento3_print') }}/{{ $ento3->ento_03_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i> print</a>

                                        <a href="{{url('/new_view_ento3_excel') }}/{{ $ento3->ento_03_id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i> Excel</a>


                                    </td>



                                    <td>{{$ento3->formid }}</td>
                                    <td>From:- {{$ento3->period_of_collection_from }} <br>
                                        To:-{{$ento3->period_of_collection_to }}
                                    </td>



                                    <td>{{$ento3->district }}</td>
                                    <td>{{$ento3->moh }}</td>
                                    <td>{{$ento3->phi }}</td>
                                    <td>{{$ento3->gn }}</td>
                                    <td>{{$ento3->address}}</td>
                                    <td>{{$ento3->gps_long}}</td>
                                    <td>{{$ento3->gps_lat}}</td>



                                    <td>{{$i}}</td>
                                    <td>{{ $data->mosq_species}}</td>
                                    <td>{{ $data->no_of_mosq != null ? $data->no_of_mosq : '0' }}</td>
                                    <td>{{ $data->density_per_trap != null ? $data->density_per_trap : '0' }}</td>





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

                                    if ($data2->type_of_parasite == 'Brugia malayi' || $data2->type_of_parasite == 'Wuchereria bancrofit') {

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
                                    } else {
                                        $positive_mosq = 0;
                                        $mq_postive_for_l3 = 0;
                                    }
                                    $no_dissected_mosquitos = $data2->no_dissected_mosquitos;
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

                                <th>Action</th>
                                <th>ID</th>
                                <th>Period of Collection  </th>
                                <th>District</th>
                                <th>MOH area</th>
                                <th>PHM area</th>
                                <th>GN division</th>
                                <th>Address</th>
                                <th>longitude </th>
                                <th>latitude </th>



                                <th>#Row NO</th>
                                <th>Mosquito species</th>
                                <th>No of mosquitoes</th>
                                <th>Density (per trap)</th>

                                <th>No of Mos: (I)</th>
                                <th>Pool no (I)</th>
                                <th>Ref. No(I)</th>
                                <th>Result (I)</th>


                                <th>No of Mos: (II)</th>
                                <th>Pool no (II)</th>
                                <th>Ref. No(II)</th>
                                <th>Result (II)</th>


                                <th>Date received</th>

                                <th>Date Tested</th>
                                <th>No of Mos:</th>
                                <th>No of infected mos</th>
                                <th>No of infective mos</th>


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

                                <!-- <th>Number of mosquito species </th>
                                    <th>Total number of mosquitos</th>
                                 -->


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