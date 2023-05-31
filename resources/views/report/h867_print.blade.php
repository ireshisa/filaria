
<page >



    <!-- boostrap cdn limk -->

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
        padding: 18px;
        position: relative;
    }

    .custom-table {
        text-align: center;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tha {

        width: 150px;
    }

    th:first-child {
        height: 60px;
    }



    #fk  table,
      #fk th,
     #fk  td
{
    border: 1px solid #fff !important;
 padding: 5px 0;
}

.#fk th
{
    margin 0 0 0 0;
}


    #qwe  table,
      #qwe th,
     #qwe  td
{
   
 padding: 5px 5px;
}

#qwe
{
    margin-top: 50px;
}
    </style>
    <h2 style="text-align: center; font-family:Arial; Arial; font-weight: bold;"> ANTI FILARIASIS UNIT/<br> </h2>
    <h3 style="text-align: center; font-family:Arial; font-weight: bold;"></h3>

<div id="fk" align="center" style="margin: 0 0;">



 @foreach ($f1_list as $f1)
        <table style="width:70%" align="center"   >
            <tr>
                <th style="width:25%; text-align:left; " >group No & code Namw</th>
                <th style="width:25%; text-align:right; padding-right: 30px;">{{ $f1->group_number }}</th>

               
                <th style="width:25%; text-align:left; ">P.H.L annual serial No</th>
                <th style="width:25%; text-align:right; ">{{ $f1->phi_serial }}</th>
                
            </tr>
            <tr>
                <th style="width:25%; text-align:left;">Name and Designation of P.H.L</th>
                <th style="width:25%; text-align:right; padding-right: 30px;">{{ $f1->phi_name }}</th>
                    
                <th style="width:25%; text-align:left;">Laboratory No.</th>
                <th style="width:25%; text-align:right; ">{{ $f1->laboratory_no }}</th>
                
            </tr>
            <tr>
                <th style="width:25%; text-align:left;">M.O.H/M.O Area</th>
                <th style="width:25%; text-align:right; padding-right: 30px;">{{ $f1->moh_area }}</th>
                       
                <th  style="width:25%;text-align:left; ">Date Of Blood Filming</th>
                <th  style="width:25%; text-align:right; ">{{ $f1->date_of_blood }}</th>
                
            </tr>

            <tr>
                <th style="width:25%; text-align:left;">Tawon Or village </th>
                <th style="width:25%; text-align:right; padding-right: 30px;">{{ $f1->town_or_village }}</th>
                  
            </tr>
        </table>
        @endforeach
</div>

<br>

<br>

    <table class="mr-auto ml-auto mt-2"  align="center">
        <tr>
            <th >No</th>
            <th >Name</th>
            <th >Address</th>
            <th >Age</th>
            <th >sex</th>
            <th >resone for Blood filming </th>
            <th >Result Of blood Examination</th>
            <th >Species</th>
            <th >Other</th>
            <th >Mf count</th>
        </tr>

        <tr>

             @foreach ($f1_data_list as $f1_data)
              <tr>
                  <th> {{ $f1_data->no }}</th>
                  <th>{{ $f1_data->phiname }} </th>
                  <th> {{ $f1_data->address }}</th>
                  <th> {{ $f1_data->age }}</th>
                  <th>{{ $f1_data->sex }} </th>
                  <th>{{ $f1_data->reason }} </th>
                  <th> {{ $f1_data->result }}</th>
                  <th>{{ $f1_data->Species }} </th>
                  <th> {{ $f1_data->other }}</th>
                  <th> {{ $f1_data->Mfcount }}</th>

              </tr>
             @endforeach

        </tr>


    </table>







    <table class="mr-auto ml-auto mt-2"  align="center" id="qwe">

        <tr>
            <th >Group No</th>
            <th >Town or village</th>
            <th >Street of Locality</th>
            <th >No of films sent</th>
            <th>No Positive</th>
        </tr>
        



 @foreach ($f1_list as $f1)
        <tr>
         
         <th> {{ $f1->group_number }}</th>
         <th> {{ $f1->town_village }}</th>
         <th> {{ $f1->street_of_locality }}</th>
           <th> {{ $f1->no_of_films }}</th>
         <th> {{ $f1->no_positive }}</th>
   

        </tr>
 @endforeach

    </table>





</page>