<page>
    <!-- boostrap cdn limk -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    }

    th,
    td {
        padding: 5px;
        position: relative;
        text-align: center;
    }

    .custom-table {
        text-align: center;
        border-collapse: collapse;
        border-spacing: 0;
    }

    th {

        width: 30px;
    }

    th:first-child {
        height: 50px;
    }

    .flt{
        float: left;
        margin: -25px 0 0 0;
    }


    /* table divider */


    td {

    border:1px solid black;
    text-align:center;
}


.th {

width: 100% !important;
text-align:left !important;
}



hr {
     -moz-transform: rotate(45deg) !important;  
       -o-transform: rotate(45deg) !important;  
  -webkit-transform: rotate(45deg) !important;  
      -ms-transform: rotate(45deg) !important;  
          transform: rotate(45deg) !important;  
    
}

    </style>




<h3 style="text-align: center; margin: 0 0;"> Morbidity data </h3>

<span class="flt"> <h3>C2</h3></span>
<br>
    <h4 style="text-align: center;  font-weight: bold; margin: 0 0; padding:0 0;"> Anti Filariasis unit -<?php  print_r($district); ?>  </h4>
        


    <h4 style="text-align: center;  font-weight: bold; margin: 0 0;  padding:0 0;">

        <?php
//   print_r($district);
?>   <!-- <?php if($district != "CMC"){ echo " District"; } ?> --> <br> 




<?php echo $request_type; ?>    </h4>


<br>





<?php
if ($dataView2 != "")
{ ?>

    <table class="mr-auto ml-auto mt-2" align="center">

 
 <tr>
           <th colspan="17" style=" text-align: center; background-color: #e9f7ad"  >FIRST VISIT  </th>


 </tr>
        <tr>
            <td rowspan="2" style="background-color: #e9f7ad;"> 
            <span id="A">Age</span>
            <hr/>
            <span>STAGE </span>
            </td>

            
            <td colspan="7" style="background-color: #e9f7ad;">MALE</td>
            <td rowspan="2" style="background-color: #e9f7ad;">TOTAL</td>
            <td colspan="7" style="background-color: #e9f7ad;">FEMALE</td>
            <td rowspan="2" style="background-color: #e9f7ad;">TOTAL</td>
        </tr>
<tr>
    <th colspan="1" style="background-color: #e9f7ad;">I</th>
    <th colspan="1" style="background-color: #e9f7ad;">II</th>
    <th colspan="1" style="background-color: #e9f7ad;">III</th>
    <th colspan="1" style="background-color: #e9f7ad;">IV</th>
    <th colspan="1" style="background-color: #e9f7ad;">V</th>
    <th colspan="1" style="background-color: #e9f7ad;">VI</th>
    <th colspan="1" style="background-color: #e9f7ad;">VII</th>




    <th colspan="1" style="background-color: #e9f7ad;">I</th>
    <th colspan="1" style="background-color: #e9f7ad;">II</th>
    <th colspan="1" style="background-color: #e9f7ad;">III</th>
    <th colspan="1" style="background-color: #e9f7ad;">IV</th>
    <th colspan="1" style="background-color: #e9f7ad;">V</th>
    <th colspan="1" style="background-color: #e9f7ad;">VI</th>
    <th colspan="1" style="background-color: #e9f7ad;">VII</th>
</tr>
    <?php
  print_r($dataView2);

?>
</table>





<?php
}
if ($dataViewQuarter != "")
{

?>

<table class="mr-auto ml-auto mt-2" align="center">

 <tr>
           <th colspan="17" style=" text-align: center; background-color: #e9f7ad;"  >FIRST VISIT </th>


 </tr>

         <tr >
            <td rowspan="2" style="background-color: #e9f7ad;"> 
            <span id="A">AGE </span>
            <hr/>
            <span>STAGE</span>
            </td>

            
            <td colspan="7" style="background-color: #e9f7ad;">MALE</td>
            <td rowspan="2" style="background-color: #e9f7ad;">TOTAL</td>
            <td colspan="7" style="background-color: #e9f7ad;">FEMALE</td>
            <td rowspan="2" style="background-color: #e9f7ad;">TOTAL</td>
        </tr>
<tr>
    <th colspan="1" style="background-color: #e9f7ad;">I</th>
    <th colspan="1" style="background-color: #e9f7ad;">II</th>
    <th colspan="1" style="background-color: #e9f7ad;">III</th>
    <th colspan="1" style="background-color: #e9f7ad;">IV</th>
    <th colspan="1" style="background-color: #e9f7ad;">V</th>
    <th colspan="1" style="background-color: #e9f7ad;">VI</th>
    <th colspan="1" style="background-color: #e9f7ad;">VII</th>
    <th colspan="1" style="background-color: #e9f7ad;">I</th>
    <th colspan="1" style="background-color: #e9f7ad;">II</th>
    <th colspan="1" style="background-color: #e9f7ad;">III</th>
    <th colspan="1" style="background-color: #e9f7ad;">IV</th>
    <th colspan="1" style="background-color: #e9f7ad;">V</th>
    <th colspan="1" style="background-color: #e9f7ad;">VI</th>
    <th colspan="1" style="background-color: #e9f7ad;">VII</th>
</tr>
<?php
print_r($dataViewQuarter);
?>
</table>
<?php } ?>







<?php
if ($month != "")
{ ?>
    <table class="mr-auto ml-auto mt-2" align="center">

    <tr>
           <th colspan="17" style=" text-align: center; background-color: #e9f7ad;"  >FIRST VISIT  </th>
          

 </tr>


        <tr>
            
        <td rowspan="2"  style="background-color: #e9f7ad;"> 
            <span id="A">AGE </span>
            <hr/>
            <span>STAGE</span>
        </td>
            <td colspan="7"  style="background-color: #e9f7ad;">MALE</td>
            <td rowspan="2"  style="background-color: #e9f7ad;">TOTAL</td>
            <td colspan="7"  style="background-color: #e9f7ad;">FEMALE</td>
            <td rowspan="2"  style="background-color: #e9f7ad;">TOTAL</td>
        </tr>
<tr>
    <th colspan="1"  style="background-color: #e9f7ad;">1</th>
    <th colspan="1"  style="background-color: #e9f7ad;">2</th>
    <th colspan="1"  style="background-color: #e9f7ad;">3</th>
    <th colspan="1"  style="background-color: #e9f7ad;">4</th>
    <th colspan="1"  style="background-color: #e9f7ad;">5</th>
    <th colspan="1"  style="background-color: #e9f7ad;">6</th>
    <th colspan="1"  style="background-color: #e9f7ad;">7</th>




    <th colspan="1"  style="background-color: #e9f7ad;">1</th>
    <th colspan="1"  style="background-color: #e9f7ad;">2</th>
    <th colspan="1"  style="background-color: #e9f7ad;">3</th>
    <th colspan="1"  style="background-color: #e9f7ad;">4</th>
    <th colspan="1"  style="background-color: #e9f7ad;">5</th>
    <th colspan="1"  style="background-color: #e9f7ad;">6</th>
    <th colspan="1"  style="background-color: #e9f7ad;">7</th>
</tr>
    <?php
  print_r($month);

?>
    </table>


<?php } ?>


<br>


<table class="mr-auto ml-auto mt-2" align="center">
        <tr>  
            <th class="th" rowspan="">Total number of lymphoedema patients registered at the clinic </th>
            <th rowspan=""><?php print_r($total_num_lymphed); ?></th>
        </tr>
        <tr>  
            <th  class="th" rowspan="">Total number of hydrocele patients registered at the clinic</th>
            <th rowspan=""><?php print_r($total_num_hydro); ?></th>
        </tr>

        <tr>  
            <th  class="th" rowspan="">Follow up of MF positive patients (local)</th>
            <th rowspan=""><?php print_r($mf_pos_patient); ?></th>
        </tr>

        <tr>  
            <th  class="th" rowspan="">No of patients referred from other institutions</th>
            <th rowspan=""><?php print_r($opd_patient) ; ?></th>
        </tr>
     
</table>





</page>