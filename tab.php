<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');
$IdUser = $_SESSION['id'];


setlocale(LC_TIME, 'ru_RU.utf8');
//echo strftime('%w', strtotime('26.10.2019'));

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


function qwerty ($Itog){

  foreach ($Itog as $key => $value) {

  $itog[] = $value['Mark']*$value['tarif'];

  }   

  return array_sum($itog);
}



?>
<!DOCTYPE html>
  <head>
    <title>Табель</title>
    <meta name="keywords" content="" />
  <meta name="description" content="" />
    <!-- 
    Polygon Template
    https://templatemo.com/tm-400-polygon
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--<link href="css/font-awesome.css" rel="stylesheet">-->
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link href="css/templatemo_style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css">
    <!--<script src="js/validator.min.js"></script>-->
      
    <script src="js/jquery-1.10.2.min.js"></script> 
  <script src="js/jquery.lightbox.js"></script>

  <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap-theme.min.css">
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


    $(function(){
     $('#form').validator();
    });




        $(document).ready(function() {
            $('#mount').on('change', function() {
                this.formMount.submit();
            });
        });



        </script>

        <style type="text/css">
      .custom {
    width: 150px !important;
    }

    .custom2 {
    width: 150px !important;
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

.chevron{
  float: left; 
  width: 100%;
  line-height: 25px;
  text-align: center;
  color: #3D365E;
  border-radius: 0px;
  background: #3D365E;
  border: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 600;
  margin-top: 10px;
  padding-left: 25px;
  margin-right: 50px;

}

    </style>

  </head>
  <body>

<ul class="nav nav-tabs">
  <div class="col-sm-3 col-md-3 col-lg-3">
    <li class="nav-item">
      <div class="templatemo_form">
      <button class="btn btn-primary nav-link" type="button" data-toggle="tab" href="#tabele">Табель</button>
    </div>
    </li>
  </div>
  <div class="col-sm-3 col-md-3 col-lg-3">
    <li class="nav-item">
      <div class="templatemo_form">
      <button class="btn btn-primary nav-link" type="button" data-toggle="tab" href="#tabtarif">Тариф</button>
  </div>
    </li>
  </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
    <li class="nav-item">
      <div class="templatemo_form">
      <button class="btn btn-primary nav-link" type="button" data-toggle="tab" href="#shtraph">Штраф</button>
  </div>
    </li>
  </div>
  </ul>

<div class="tab-content">
    <div id="tabele" class="tab-pane active">
      <?php
      include('tabele.php');
      ?>
    </div>  
    <div id="tabtarif" class="tab-pane">
      <?php
      include('tarif.php');
      ?>

    </div> 
    <div id="shtraph" class="tab-pane">
                <div class="col-md-3">
                            <div class="templatemo_form"><button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#feedbackFormModalFine">Добавить</button></div>
                    
                   </div>

            <div class="templatemo_form"></div>
            <br>

          <table class="table " border="1">
               <thead>
              <tr>
                <th>№</th><th>Абревиатура</th><th>Наименование</th><th>Сумма</th>
            </tr>
</thead>
<?php

$sql_Fine = "SELECT NameFine,AddNameFine,SummFine FROM fine";

$result_Fine = $connectionPDO -> query($sql_Fine);
$idt = 1;
foreach ($result_Fine as $keyFine => $valueFine) {


?>
<tr>
  <td><?=$idt++?></td>
  <td><?=$valueFine['AddNameFine']?></td>
  <td><?=$valueFine['NameFine']?></td>
   <td><?=$valueFine['SummFine']?></td>
</tr>

<?php
}

?>
</table>

         <div class="modal" id='feedbackFormModalFine' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

             <div class="modal-body">
          
            <div class="col-md-5 col-lg-12">
              <form role="forms" method="POST">
                
                <div class="templatemo_form">
                <input name="AddNameFineAdd" type="text" class="form-control" id="fullname" placeholder="Абревиатура" maxlength="40" value="">              
                </div>
                <div class="templatemo_form">
                  <input name="NameFineAdd" type="text" class="form-control" id="fullname" placeholder="Наименование" maxlength="40" value="">              
                </div>
                <div class="templatemo_form">
                  <input name="SummFineAdd" type="text" class="form-control" id="fullname" placeholder="Сумма" maxlength="40" value="">              
                </div>
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" name="AddFine">Добавить</button>
                </div>
            </form>
            </div>
        </div>
      </div>


</div>
</div>
</div>
</div>


<?php


# Ввод Штрафа
if (isset($_POST['AddFine'])) {

 $AddNameFineAdd = $_POST['AddNameFineAdd'];
 $NameFineAdd = $_POST['NameFineAdd'];
 $SummFineAdd = $_POST['SummFineAdd'];


$sqlAddFine = "INSERT INTO fine (NameFine,AddNameFine,SummFine) VALUES ('$NameFineAdd','$AddNameFineAdd','$SummFineAdd')";

$resultAddFine = $connectionPDO -> exec($sqlAddFine) or die('Ошибка при выполнении запроса');

  

?>
<script type="text/javascript">
  alert("Штраф добавлен");
</script>

<?php 
echo "<meta http-equiv='refresh' content='0'>";

}



?>



              <div class="row">

        </div>
      
    <!-- contact end -->
  
      <!-- footer end -->    
  <script>

    $("#datepicker").datepicker({
        viewMode: 'years',
         format: 'mm-yyyy'
    });


      </script>

    <script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
function myFunction(x) {
  alert("ID: " + x);
}
</script>

<script>
    
    $(document).ready(function(){
        $("#myModalBox").modal('show');
    });

</script>
  <!-- templatemo 400 polygon -->
  </body>
</html>