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
            align-items: center;
            margin: auto auto;

        }

        th,
        td {
            position: relative;
            padding: 0px;
            align-items: center;
        }

        td {
            text-align: center;
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
            width: 81px;
            text-align: center;
        }

        th:first-child {
            height: 100px;
        }
    </style>



    <div class="row" style="margin: 15px">



        <div class="col float-left ">
            <strong>
                <br> <i> Culex (culex) quinquefasciatus </i></strong>
            <div class=" mr-4" style="margin-left:60%;"> <strong>B1 </strong><strong class="ml-3"> Report</strong> </div>
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

            <h2 style="text-align: center; font-family:Arial; "> ANTI FILARIASIS CAMPAIGN <br>
                Non Endemic Survey
                <?php

                ?>


            <?php } ?>


            <br>

            <strong> Entomological Surveillance Report </strong>

            </h2>



            <div class="row pb-0 mb-0" style="margin-left: 8px">
                <div class="col float-left"><strong>From: <?php print_r($from); ?>...... To: <?php print_r($to); ?>...... </strong><strong class="ml-3"></strong></div>
            </div>
            <table class="mr-auto mt-5" style="margin-left: 2px">
                <tr>
                    <?php if ($type == 'srilanka') { ?>
                        <th rowspan="2" style="padding: 2px">District</th>
                    <?php         } ?>
                    <th rowspan="2" style="padding: 2px">Form name</th>
                    <th colspan="3" style="padding: 2px">Area</th>

                    <th colspan="3" style="padding: 4px">Premises</th>
                    <th class="tha" rowspan="2">Catch time(hr)</th>
                    <th class="tha" rowspan="2">Mosquito density (per man hr)</th>
                    <th colspan="5" style="padding: 3px"><i> Culex quinquefasciatus</i></th>
                    <th class="tha" rowspan="2"> Infected rate</th>
                    <th class="tha" rowspan="2">Infective rate</th>
                </tr>
                <tr>
                    <th style="padding: 4px">MOH area</th>
                    <th style="padding: 4px">PHM area</th>
                    <th style="padding: 4px">GN division</th>
                    <th class="tha" style="padding: 3px 0">No of <br> premises examined</th>
                    <th class="tha">No of positive for Cx quin</th>
                    <th class="tha">% Positive</th>
                    <!-- <th class="tha">No of positive for Mansonia</th>
            <th class="tha">% positive</th> -->
                    <th class="tha">Collected</th>
                    <th class="tha">PCR</th>
                    <th class="tha">Dissected</th>
                    <th class="tha">Infected</th>
                    <th class="tha">Infective</th>
                </tr>

                <?php
                print_r($dataView);
                ?>
            </table>

</page>