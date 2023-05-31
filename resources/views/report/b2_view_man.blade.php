<page>
    <!-- boostrap cdn limk -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- boostrap cdn limk -->
    <style>
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
            width: 105px;
        }

        th:first-child {
            height: 100px;
        }
    </style>






<div class="row" style="margin: 15px">



<div class="col float-left ">
    <strong>
        <br> <i> Mansonia species </i></strong>
    <div class=" mr-4" style="margin-left:60%;"> <strong>B2 </strong><strong class="ml-3"> Report</strong> </div>
</div>

</div>


<?php if ($district != "Non endemic") { ?>

<h2 style="text-align: center; font-family:Arial; "> {{$type=='srilanka' ? '':'REGIONAL' }} ANTI FILARIASIS {{$type=='srilanka' ? 'CAMPAIGN':'UNIT' }} <br>
<?php
if ($type != 'srilanka') {
print_r(ucfirst($district));
if ($district != "CMC") {
    echo " District";
}
}
?>

<?php } else { ?>

<h2 style="text-align: center; font-family:Arial; ">  ANTI FILARIASIS CAMPAIGN   <br>
    Non Endemic Survey
<?php

?>


<?php } ?>





<br>







<strong> Mosquito Positive  Report </strong>
</h2>














<div class="row pb-0 mb-0" style="margin-left: 10px">
        <div class="col float-left"><strong>From: <?php print_r($from); ?>...... To: <?php print_r($to); ?>...... </strong><strong class="ml-3"></strong></div>
    </div>



    <table class="mr-auto ml-auto mt-5" style="  position: absolute;
    left: 10%;
    top:20% ;
    transform: translate(-50%, 0);">
        <tr>
        <th rowspan="2">District</th>
        <th rowspan="2">Form name</th>
            <th rowspan="2">Date of collection</th>
            <th rowspan="2">MOH area</th>
            <th rowspan="2">PHM area</th>
            <th rowspan="2">GN division</th>
            <th rowspan="2">Name & Address</th>
            <th colspan="2">GPS Location</th>
            <th rowspan="2">No of <br>positive <br>mosquitoes</th>
            <th colspan="4">Nematode stage</th>

        </tr>
        <tr>

            <th>Longitude</th>
            <th>Latitude</th>
            <th>Mf</th>
            <th>L1</th>
            <th>L2</th>
            <th>L3</th>
        </tr>

        <?php
        print_r($dataView);
        ?>
    </table>

</page>