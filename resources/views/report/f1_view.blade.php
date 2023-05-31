<page >
    <!-- boostrap cdn limk -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap cdn limk -->
    <style>
        * {
            margin: 0 0;
            padding: 0 0;
        }
        
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        line-height: 18px;
        text-align: center;
    }

    th,
    td {
        padding: 5px 0px 5px 0px;
        
        position: relative;
    }

    .custom-table {
        text-align: center;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tha {

        width: 50px;
    }

    th:first-child {
        height: 60px;
    }
    </style>
    <h2 style="text-align: center; font-family:Arial; Arial; font-weight: bold;  margin-bottom:0;  "> ANTI FILARIASIS UNIT<br> </h2>
    <h3 style="text-align: center; font-family:Arial; font-weight: bold; margin-top:0;">
        <?php print_r($district);?>  <?php if($district != "CMC"){ echo " DISTRICT"; } ?> 
    </h3>
    
      <h3 style="text-align: center; font-family:Arial; font-weight: bold; margin-top:0;">
      A1 Report
    </h3>


    <div class="row pb-0 mb-0">
        <div class="col float-left "><strong>From:-   <?php print_r($from);?> &nbsp;  To:- <?php print_r($to);?></strong><strong
                class="ml-3"></strong></div>
    </div>
    <table class="mr-auto ml-auto mt-2"style="  position: absolute;
    left: -3%;
    top:20% ;
    transform: translate(-50%, 0);
    
    ">
   
        <tr>
          
            <th rowspan="2">Name of PHI/PHFO</th>
            <th rowspan="2">MOH Area</th>
            <th rowspan="2">PHI Area</th>
            <th rowspan="2">PHM Area</th>
            <th rowspan="2">GN</th>
            <th colspan="6">No of blood films taken</th>
            <th class="" rowspan="2"> No of <br> blood films  <br> examined</th>
            <th colspan="2">No of blood films <br>positive <br>(New patients)</th>
            <th colspan="2">No of blood films <br>positive<br>(5-P)</th>
            <th rowspan="2"> Mf Rate (%) </th>
        </tr>
        <tr>
            <th>
                <pre>1-C</pre>
            </th>
            <th>
                <pre>2-R</pre>
            </th>
            <th>
                <pre>3-I</pre>
            </th>
            <th>
                <pre>4-S</pre>
            </th>
            <th>
                <pre>5-P</pre>
            </th>
            <th>Total</th>
            <th>Wb.</th>
            <th>Bm.</th>
            <th>Wb.</th>
            <th>Bm.</th>
        </tr>
        <?php
  print_r($dataView);
?>
    </table>

</page>