  <div class="content-wrapper" style="min-height:200px!important">
    <!-- Main content -->
    @if(Auth::user()->role == "ADMIN" || Auth::user()->role == "AFC" || Auth::user()->role == "RMO")
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <div class="text-center">
                <!-- <input id="mfRate" type="text" class="knob" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="0" data-width="120" data-height="120" data-fgColor="#00c0ef" readonly> -->
                <progress  id="mfRate" value="12" max="100" style="height: 28px;"> 32% </progress>
                <sup style="font-size: 20px">%</sup>
                <div class="knob-label" style="font-size: 20px">MF RATE</div>
              </div>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-bag"></i> -->
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            <select class="form-control" style="width:90%;margin-left: 5%;" id="mfRateYear" onchange="mfRate()">
              @for($i=2016;$i<2026;$i++) <option {{$i==2023?"selected":""}} value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <select name="distrcit" class="form-control" style="width:90%;margin-left: 5%;" onchange="mfRate()" id="mfRateDistrict">
              @if(Auth::user()->role == "RMO")
              <option value="{{ Auth::user()->district }}">{{ Auth::user()->district }}</option>
              @else
              <option value="a">All of Sri Lanka</option>
              @foreach ($district_list as $dis)
              <option value="{{ $dis->district }}">{{ $dis->district }}</option>
              @endforeach
              @endif
            </select>
            <a href="#" class="small-box-footer"><br></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <div class="text-center">
                <!-- <input id="infectiveRate" type="text" class="knob" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="0" data-width="120" data-height="120" data-fgColor="#00c0ef" readonly> -->
                <progress  id="infectiveRate" value="12" max="100" style="height: 28px;"> 32% </progress>
                <sup style="font-size: 20px">%</sup>
                <div class="knob-label" style="font-size: 20px">INFECTIVE RATE</div>
              </div>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-stats-bars"></i> -->
            </div>
            <select class="form-control" style="width:90%; margin-left: 5%;" id="infectiveRateYear" onchange="infectiveRate()">
              @for($i=2018;$i<2026;$i++) <option {{$i==2023?"selected":""}} value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <select name="distrcit" class="form-control" style="width:90%;margin-left: 5%;" id="infectiveRateDistrict" onchange="infectiveRate()">
              @if(Auth::user()->role == "RMO")
              <option value="{{ Auth::user()->district }}">{{ Auth::user()->district }}</option>
              @else
              <option value="a">All of Sri Lanka</option>
              @foreach ($district_list as $dis)
              <option value="{{ $dis->district }}">{{ $dis->district }}</option>
              @endforeach
              @endif
            </select>
            <a href="#" class="small-box-footer"><br></a>
          </div>
        </div>
        <!-- </div> -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <div class="text-center">
                <!-- <input type="text" class="knob" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="0" data-width="120" data-height="120" data-fgColor="#00c0ef" readonly id="infectedRate"> -->
                <progress  id="infectedRate" value="12" max="100" style="height: 28px;"> 32% </progress>
                <sup style="font-size: 20px">%</sup>
                <div class="knob-label" style="font-size: 20px">INFECTED RATE</div>
              </div>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-person-add"></i> -->
            </div>
            <select class="form-control" style="width:90%;margin-left: 5%;" id="infectedRateYear" onchange="infectedRate()">
              @for($i=2018;$i<2026;$i++) <option {{$i==2023?"selected":""}} value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <select name="distrcit" class="form-control" style="width:90%;margin-left: 5%;" id="infectedRateDistrict" onchange="infectedRate()">
              @if(Auth::user()->role == "RMO")
              <option value="{{ Auth::user()->district }}">{{ Auth::user()->district }}</option>
              @else
              <option value="a">All of Sri Lanka</option>
              @foreach ($district_list as $dis)
              <option value="{{ $dis->district }}">{{ $dis->district }}</option>
              @endforeach
              @endif
            </select>
            <a href="#" class="small-box-footer"><br></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <div class="text-center">
                <!-- <input type="text"  class="knob" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="0" data-width="120" data-height="120" data-fgColor="#00c0ef" readonly> -->
                <progress  id="mfDensity" value="12" max="100" style="height: 28px;"> 32% </progress>
                <sup style="font-size: 20px">%</sup>
                <div class="knob-label" style="font-size: 20px">MF DENSITY</div>
              </div>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-pie-graph"></i> -->
            </div>
            <select class="form-control" style="width:90%;margin-left: 5%;" id="mfDensityYear" onchange="mfDensity()">
              @for($i=2018;$i<2026;$i++) <option {{$i==2023?"selected":""}} value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <select name="distrcit" class="form-control" style="width:90%;margin-left: 5%;" id="mfDensityDistrict" onchange="mfDensity()">
              @if(Auth::user()->role == "RMO")
              <option value="{{ Auth::user()->district }}">{{ Auth::user()->district }}</option>
              @else
              <option value="a">All of Sri Lanka</option>
              @foreach ($district_list as $dis)
              <option value="{{ $dis->district }}">{{ $dis->district }}</option>
              @endforeach
              @endif
            </select>
            <a href="#" class="small-box-footer"><br></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
            <li class="pull-left header"><i class="fa fa-inbox"></i> Chart</li>
          </ul>
          <div class="tab-content no-padding">
            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
          </div>
        </div>
      </section>
    </div> -->
      <!-- /.row (main row) -->




















    </section>
    @endif

    <section style="padding: 10px;">


      <div class="row" style="display: flex;     justify-content: space-between;">

        <div class="col-lg-3 col-6">
          <div class="small-box bg-info1">
            <div class="inner">
              <h3 id="ew_lymphoedema">{{ $new_lymphoedema_patients_registered }}</h3>

              <p style="font-weight:bold; ">Number of new lymphoedema patients registered</p>
              <select class="form-control" style="width:90%;margin-left: 5%; z-index: 100000000;" id="getnewlymyaer" onchange="getnewlym()">
                @for($i=2016;$i<2030;$i++) <option {{$i==2019?"selected":""}} value="{{$i}}">{{$i}}</option>
                  @endfor
              </select>
            </div>
            <div class="icon" style=" z-index: 1 ip !important;">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>




        <div class="col-lg-3 col-6">
          <div class="small-box bg-info1">
            <div class="inner">
              <h3>{{$lymphoedema_patients_care }} </h3>
              <br> <br>
              <p style="font-weight:bold; ">Number of total lymphoedema patients under the care</p>

            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>



        <div class="col-lg-3 col-6">
          <div class="small-box bg-info1">
            <div class="inner">
              <h3>{{$subsequent_patients }} </h3>
              <br> <br>
              <p style="font-weight:bold; ">Number of total lymphoedema patients under the care</p>

            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
      </div>




    </section>



    <!-- /.content -->
  </div>



  <style>
    .bg-info1 {
      background-color: #17a2b8 !important;
    }

    h3,
    p {
      color: #ffff;
    }
  </style>
  <script>
    window.onload = function() {
      mfRate();
      infectedRate();
      infectiveRate();
      mfDensity();
    }

    function mfRate() {
      $district = $("#mfRateDistrict").val();
      $year = $("#mfRateYear").val();

      $.ajax({
        type: 'GET',
        url: 'mf_rate/' + $district + '/' + $year,

        success: function(data) {
          $('#mfRate')
            .val(data.mfRate);
        }
      });
    }

    function getnewlym() {

      $year = $("#getnewlymyaer").val();

      $.ajax({
        type: "GET",
        url: 'new_lymphoedema_patients_registered/' + $year,
        success: function(data) {

          $("#ew_lymphoedema").html(data);;
        }
      });


    }












    function infectedRate() {
      $district = $("#infectedRateDistrict").val();
      $year = $("#infectedRateYear").val();

      $.ajax({
        type: 'GET',
        url: 'infectedRate/' + $district + '/' + $year,

        success: function(data) {
          $('#infectedRate')
            .val(data.infectedRate);
        }
      });
    }

    function infectiveRate() {
      $district = $("#infectiveRateDistrict").val();
      $year = $("#infectiveRateYear").val();

      $.ajax({
        type: 'GET',
        url: 'infectiveRate/' + $district + '/' + $year,

        success: function(data) {
          $('#infectiveRate')
            .val(data.infectiveRate);
        }
      });
    }

    function mfDensity() {

   


      $district = $("#mfDensityDistrict").val();
      $year = $("#mfDensityYear").val();

      $.ajax({
        type: 'GET',
        url: 'mf_density/' + $district + '/' + $year,

        success: function(data) {
          $('#mfDensity')
            .val(data.mfDensity);
        }
      });
    }
  </script>