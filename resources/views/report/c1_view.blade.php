<page style="margin: auto auto;">
    <!-- boostrap cdn limk -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap cdn limk -->
    <style>
    *{
            margin:  0 0;
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
            padding: 12px;
            position: relative;
            text-align: center;
        }

        .custom-table {
            text-align: center;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th {

            width: 100px;
        }

        th:first-child {
            height: 60px;
        }

        .flt{
        float: left;
        margin: -50px 0 0 0;
    }
    </style>

<!-- <span class="flt"> <h3>C1</h3></span>
    <h2 style="text-align: center; font-family:Arial; font-weight: bold;"> ANTI FILARIASIS UNIT</h2>
    <h3 style="text-align: center; font-family:Arial; font-weight: bold;">
        <?php
      
        
           print_r($district);  
        ?>  <?php if($district != "CMC"){ echo " District"; }
        echo "<br>";
        print_r($type);  ?> <br> 
             
         
    </h3> -->



    <h3 style="text-align: center; margin: 0 0;"> Morbidity data </h3>

<span class="flt"> <h3>C1</h3></span>
<br><br>
    <h4 style="text-align: center;  font-weight: bold;"> Anti Filariasis unit -<?php  print_r($district); ?>  </h4>
        


    <h4 style="text-align: center;  font-weight: bold; margin: 0 0; padding:0 0;">

        <?php
//   print_r($district);
?>   <!-- <?php if($district != "CMC"){ echo " District"; } ?> --> <br> 




<?php echo $type; ?>    </h4>







<br>






    <table class="mr-auto ml-auto mt-2" style="width: 100%;">
        <tr>
            <th rowspan="2">1 Name of the Clinic</th>
            <th rowspan="2">2 No.of Clinic Sessions</th>
            <th colspan="4">3 First visit of Lymphoedema patients</th>
            <th colspan="4">4 Subsequent visitors Lymphedema Patients</th>
            <th rowspan="2">5 Total Number of lympheod patients treated</th>
            <th rowspan="2">6 No Presented with Hydrocele / TPE</th>
            <th rowspan="2">7No. of Suspected Dirofilaria cases</th>


        </tr>
        <tr>
            <th>3.1 No present ed without acute attacks</th>
            <th>3.2 No presented whith acute attacks</th>
            <th>3.3 No had a H/O acute attack within last 4 weeks</th>
            <th>3.4 (3.1 + 3.2) Total No of 1 visit</th>
            <th>4.1 No presented without acute attacks</th>
            <th>4.2 No presented whith acute attacks</th>
            <th>4.3 No had a H/O acute attack within last 4 weeks</th>
            <th>4.4 (4.1 + 4.2) Total No of subsequent visit</th>
        </tr>

        <?php
        print_r($dataView);
        ?>
    </table>

</page>