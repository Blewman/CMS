<?php

$ArrMount = array("01"=>"Январь",
"02"=>"Февраль",
"03"=>"Март",
"04"=>"Апрель",
"05"=>"Май",
"06"=>"Июнь",
"07"=>"Июль",
"08"=>"Август",
"09"=>"Сентябрь",
"10"=>"Октябрь",
"11"=>"Ноябрь",
"12"=>"Декабрь"
);


?>

  
    <!-- Bootstrap -->
      
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link href="css/templatemo_style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
    <!--<script src="js/validator.min.js"></script>-->
      


  <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap-theme.min.css">


         <script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

      
      <script src='style/bootstrap-tags-master/dist/js/bootstrap-tags.js'></script>
      <link rel="stylesheet" type="text/css" href="style/bootstrap-tags-master/dist/css/bootstrap-tags.css" />

    <script>
    function showhide()
    {
      var div = document.getElementById("newpost");
    if (div.style.display !== "none")
    {
      div.style.display = "none";
    }
    else {
      div.style.display = "block";
    }
    }

    </script>

        <style type="text/css">
      .custom {
    width: 150px !important;
    }

    .custom2 {
    width: 150px !important;
    }

    .hiddenRow {
    padding: 0 !important;
}

.selectpicker{
  float: left; 
  width: 100%;
  line-height: 34px;
  text-align: center;
  color: #ffffff;
  border-radius: 0px;
  background: #3D365E;
  border: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 600;
  margin-top: 10px;
}



    </style>

  </head>
  <body>

 
            


                
 <?php

$dat = date('Y-m-d');

 ?>  

  




 <ul class="nav nav-tabs">
  <div class="col-sm-3 col-md-3 col-lg-3">
        <li class="nav-item">
            <div class="templatemo_form">
      <button class="btn btn-primary nav-link" type="button" data-toggle="tab" href="#object">Объекты</button>
  </div>

    </li>
  </div>  
  <div class="col-sm-3 col-md-3 col-lg-3">  
    <li class="nav-item">
            <div class="templatemo_form">
      <button class="btn btn-primary nav-link" type="button" data-toggle="tab" href="#stock">Склад</button>
  </div>

    </li>
  </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
    <li class="nav-item">
            <div class="templatemo_form">
      <button class="btn btn-primary nav-link" type="button" data-toggle="tab" href="#work">Работы</button>
    </div>


    </li>
  </div>
  <div class="col-sm-3 col-md-3 col-lg-3">
    <li class="nav-item">
            <div class="templatemo_form">
      <button class="btn btn-primary nav-link" type="button" data-toggle="tab" href="#inst">Инструменты</button>
    </div>


    </li>
  </div>
  </ul>

<div class="tab-content">

      <div id="object" class="tab-pane active">
   <?php
    include('object.php');
   ?>
</div>

    <div id="stock" class="tab-pane">
   <?php
    include('addstock.php');
   ?>
</div>
  <div id="work" class="tab-pane">
    <?php
     include('work.php');
    ?>

</div>

  <div id="inst" class="tab-pane">
    <?php
     include('inst.php');
    ?>
</div>
</div>
            
  




      


