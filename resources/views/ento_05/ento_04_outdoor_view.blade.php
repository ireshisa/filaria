<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ENTO 4 OUTDOOR VIEW
            <br>
            <small>ento 4 outdoor view all data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('/ento4_view') }}">ENTO 4 OUTDOOR</a></li>
            <li class="active">ENTO 4 OUTDOOR VIEW</li>
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
                        <table id="ento4_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Mosquito species</th>
                                    <th>6-7 pm</th>
                                    <th>7-8 pm </th>
                                    <th>8-9 pm</th>
                                    <th>9-10 pm</th>
                                    <th>10-11 pm</th>
                                    <th>11-12 pm</th>
                                    <th>12-1 am</th>
                                    <th>1-2 am</th>
                                    <th>2-3 am</th>
                                    <th>3-4 am</th>
                                    <th>4-5 am</th>
                                    <th>5-6 am</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ento4_outdoor_list as $ento4)
                                <tr>
                                    <td>{{ $ento4->mosq_spec_stat }}</td>
                                    <td>{{ $ento4->pm_6_7 }}</td>
                                    <td>{{ $ento4->pm_7_8 }}</td>
                                    <td>{{ $ento4->pm_8_9 }}</td>
                                    <td>{{ $ento4->pm_9_10 }}</td>
                                    <td>{{ $ento4->pm_10_11 }}</td>
                                    <td>{{ $ento4->pm_11_12 }}</td>
                                    <td>{{ $ento4->am_12_1 }}</td>
                                    <td>{{ $ento4->am_1_2 }}</td>
                                    <td>{{ $ento4->am_2_3 }}</td>
                                    <td>{{ $ento4->am_3_4 }}</td>
                                    <td>{{ $ento4->am_4_5 }}</td>
                                    <td>{{ $ento4->am_5_6 }}</td>
                                    <td>{{ $ento4->total }}</td>
                                    <td> 
                                        <a onclick="return confirm('Are you sure Delete this record?')"
                                            href="{{url('/delete_ento4_outdoor') }}/{{ $ento4->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th>Mosquito species</th>
                                <th>6-7 pm</th>
                                <th>7-8 pm </th>
                                <th>8-9 pm</th>
                                <th>9-10 pm</th>
                                <th>10-11 pm</th>
                                <th>11-12 pm</th>
                                <th>12-1 am</th>
                                <th>1-2 am</th>
                                <th>2-3 am</th>
                                <th>3-4 am</th>
                                <th>4-5 am</th>
                                <th>5-6 am</th>
                                <th>Total</th>
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
<!-- /.content-wrapper -->