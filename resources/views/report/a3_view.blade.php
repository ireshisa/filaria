<page>
    <!-- boostrap cdn limk -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap cdn limk -->
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            line-height: 15px;
            align-items: center;
            margin: auto auto;
            padding-top: 5px;
           padding-bottom: 5px;
            
        }

        th{
            position: relative;
            padding: 1px;
           
        
        }

        

        td {
            text-align: center;
            font-size:10px;
            padding-top: 5px;
           padding-bottom: 5px;
        }

        .custom-table {
            text-align: center;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tha {
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            transform: rotate(-90deg);
            width: 88px !important;
            text-align: center;
        }

        th:first-child {
            height: 100px;
        }
    </style>
    <h2 style="text-align: center; font-family:Arial; Arial; font-weight: bold;"> ANTI FILARIASIS UNIT<br></h2>
    <h3 style="text-align: center; font-family:Arial; font-weight: bold;">
        <?php print_r($district);?>     

         <?php if($district != "CMC"){ echo "DISTRICT"; } ?>   <br> A3 Report
    </h3> 


    <div class="row pb-0 mb-0" style="position: absolute;
    left: -3%;
    top:20% ;
    transform: translate(-50%, 0);
    font-size: 11px;
     ">
        <div class="col float-left "><strong>From:  <?php print_r($from);?>   To: <?php print_r($to);?>  </strong><strong
                    class="ml-3"></strong></div>
 
    <table class="">
        <tr>
            <th style="text-align:center">Lab serial number </th>
            <th style="text-align:center">Name of Patient</th>
            <th style="text-align:center">Age</th>
            <th style="text-align:center">Sex</th>
            <th style="text-align:center">Address</th> 
            <th style="text-align:center">MOH Area</th> 
            <th style="text-align:center">PHI Area</th> 
            <th style="text-align:center">PHM Area</th> 
            <th style="text-align:center">GN</th>

            <th style="text-align:center">Mode of <br> collection</th>
            <th style="text-align:center">Species</th>
            <th style="text-align:center">Mf<br />Count</th>
            <th style="text-align:center">Date of
                <br />blood films taken</th>
            <th style="text-align:center">Date <br>of blood films <br> examined</th>
            <th style="text-align:center">Date <br>of treatment <br> started</th>
            <th style="text-align:center"> History of MDA/ Year</th>

        </tr>
        <?php
        print_r($dataView);
        ?> 
    </table>
   </div>
</page>