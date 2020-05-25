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

?>
<!DOCTYPE html>
  <head>
    <title>Табель</title>
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
  background: #b69e40;
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
  color: #ffffff;
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
          
                
 <?php

$dat = date('Y-m-d');

 ?>       
       <div class="col-md-0 col-sm-0 col-lg-1">
       	

<?php

//if (isset($_POST['tab']) OR  !$_POST OR isset($_POST['mount']) ) {

?>        

                  
              <form action="" method="POST" id="formMount">
 <div class="col-md-0 col-sm-0 col-lg-12">            
                <div class="col-xs-offset-0 col-md-0 col-sm-0">
<div class="templatemo_form">
<div class="container">
              <div class="col-lg-1 col-sm-1 col-md-1 col-xs-2" style="margin-left: -27px;">
  					<button class="btn chevron" name="left"><i class="icon-chevron-right"><</i></button>	
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-5">
                        <select class="btn btn-primary selectpicker templatemo_form_select" name="mount" id="mount" onchange="this.form.submit('#formMount');return true;">
                          <?php
                          foreach ($ArrMount as $key => $value) {


                          		switch ($key) {
                          			case $_POST['mount']:
                          			$selected = "selected";break;	
                          			case date('m'):
                          			if (!isset($_POST['mount'])) {
                          				$selected = "selected";
                          			}break;
                          			
                          			
                          			default:
                          				$selected = " ";
                          				break;
                          		}

                          
                          ?>
                          <option value="<?=$key?>"<?=$selected?>><?=$value?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-4">
                        <select class="btn btn-primary selectpicker"  name="year" id="year" onchange="this.form.submit('#formMount');return true;">
                        	<?php

                        	$YearResult = SQLResult("SELECT
											    YEAR(Rep.DateRep) AS DATTY
											FROM
											    reportusers AS Rep
											    GROUP BY (DATTY)");

                        	if (!$YearResult->fetch()['DATTY']){

                        		$ArrYear[] = date('Y');
                        	}else{
                        	$YearResult = SQLResult("SELECT
											    YEAR(Rep.DateRep) AS DATTY
											FROM
											    reportusers AS Rep
											    GROUP BY (DATTY)");
                        	foreach ($YearResult as $keyYear => $valYear) {

                            if ($valYear['DATTY'] != date('Y')){
                              $ArrYear[] = date('Y');

                            }
                        		$ArrYear[] = $valYear['DATTY'];

                        	}

                        	}

						foreach ($ArrYear as $keyYear => $valYears) {


            
                  switch ($valYears) {

                  case $_POST['year']:
                  $selectedY = "selected";break; 
                  case date('Y'):
                  if (!isset($_POST['year'])) {
                  $selectedY = "selected";
                  }
                  break;             
                  default:
                  $selectedY = " ";
                  break;
                  }
								
														
							          	

                        			?>
                        <option value="<?=$valYears?>" <?=$selectedY?>><?=$valYears?></option>
                        			<?php

                     		
                        }
                       
                        	?>
                          	<?php

                          		
                          	?>
                        </select>
                      </div>
                      <div class="col-lg-1 col-sm-1 col-md-1 col-xs-2" style="margin-left: -2px;" >
                        <button class="btn chevron" name="right"><i class="icon-chevron-right">></i></button>	
                      </div>
                      </div>
  </div>
</div></div> 

                
            </form>
</div>   

            <?php


            ?>
           
            
                 
<div class="row">
</div>


<div class="col-md-3 col-sm-12 col-lg-12" >
<br>

          <table class="table " border="1" style="border-collapse:collapse;">
               <thead>
              <tr><th>№</th><th>ФИО</th><th>Должность</th>
                <?php


                if (isset($_POST['mount'])){

                	$IdDay = cal_days_in_month(CAL_GREGORIAN, $_POST['mount'], $_POST['year']);

                }else{

                	$IdDay = date('t');


                }


                

                for ($i=1; $i <= $IdDay ; $i++) { 

                  ?>
                  <th><?=$i?></th>

                  <?php
                }
                ?>
                <th>Итого</th>
  </tr>
</thead>

<?php

if (isset($_POST['mount'])){

$sql_reportusers = "SELECT 
  us.id AS UID,
  us.fio, 
  us.dlj,
  DAY(us.DatT) AS DATD,
  DATE_SUB(us.DatT,Interval 1 DAY) AS DATTD,
  IF (MONTH(us.DatT) = '".$_POST['mount']."' AND YEAR(us.DatT) = '".$_POST['year']."' , '1', '0') AS UVL,
  us.DatT AS DATT,
  us.role AS ROLE,
  us.DatU AS DATU, 
  d.id AS IDDLJ, 
  d.dljName
FROM 
	users AS us
INNER JOIN dlj AS d 
ON  
	us.dlj = d.id
WHERE
(ROLE = 3 AND YEAR(DATT) != '".$_POST['year']."' AND YEAR(DATT) > '".$_POST['year']."'  AND MONTH(DATT) != '".$_POST['mount']."' AND MONTH(DATT) > '".$_POST['mount']."' AND DATU = '0000-00-00') 
OR 
(ROLE = 3 AND YEAR(DATT) <= '".$_POST['year']."' AND MONTH(DATT) <= '".$_POST['mount']."' AND DATU = '0000-00-00')
OR 
(ROLE = 3 AND YEAR(DATU) >= '".$_POST['year']."' AND MONTH(DATU) >= '".$_POST['mount']."' AND DATU != '0000-00-00' AND YEAR(DATT) <= '".$_POST['year']."' AND MONTH(DATT) <= '".$_POST['mount']."')";


}else{

$sql_reportusers = "SELECT 
	us.id AS UID,
	us.fio, 
	us.dlj,
	DAY(us.DatT) AS DATD,
  DATE_SUB(us.DatT,Interval 1 DAY) AS DATTD,
  IF (MONTH(us.DatT) = '".date('m')."' AND YEAR(us.DatT) = '".date('Y')."', '1', '0') AS UVL,
	us.DatT AS DATT,
	us.role AS ROLE,
	us.DatU AS DATU, 
	d.id AS IDDLJ, 
	d.dljName
FROM 
	users AS us
INNER JOIN dlj AS d 
ON  
	us.dlj = d.id
WHERE 
(ROLE = 3 AND YEAR(DATT) != '".date('Y')."' AND YEAR(DATT) > '".date('Y')."' AND MONTH(DATT) != '".date('m')."' AND MONTH(DATT) > '".date('m')."' AND DATU = '0000-00-00') 
OR
(ROLE = 3 AND YEAR(DATT) <= '".date('Y')."' AND MONTH(DATT) <= '".date('m')."' AND DATU = '0000-00-00')
OR 
(ROLE = 3 AND YEAR(DATU) >= '".date('Y')."' AND MONTH(DATU) >= '".date('m')."' AND DATU != '0000-00-00')";


}




//AND DatU LIKE ('".date('Y-m')."-%')


$result_reportusers = $connectionPDO -> query($sql_reportusers) or die('Ошибка при выполнении запроса выборки');
$id = 1;
foreach ($result_reportusers as $key => $value) {
?>
<tr>
  <td><?=$id++?></td>
  <td data-toggle="collapse" data-target="#<?=$value['UID']?>" class="accordion-toggle"><?=$value['fio']?></td>
  <td><?=$value['dljName']?></td>
  <?php

  for ($i=0; $i < $IdDay ; $i++) {



            	if (isset($_POST['mount'])) {

            	//	echo $DatPrev = $_POST['year']."-".$_POST['mount'];
$mountSelect = $_POST['mount'];
$UserDat = $i;
$idForm = $value['UID'].'-'.$itemDay = $i+1;
$DtRep = $_POST['year'].'-'.$_POST['mount'].'-'.$itemDay;
            	}
            	/*elseif (isset($_POST['left'])) {

            		//echo $DatPrev = $_POST['year']."-".$_POST['mount'];
            		echo $DatPrev = $_POST['year']."-".$_POST['mount'];;
            	}*/else{

$UserDat = $i;
$idForm = $value['UID'].'-'.$itemDay = $i+1;
$DtRep = date('Y-m').'-'.$itemDay;

            	}

if ($value['UVL'] == 1){

  //$i = $i - $value['DATD'];
 for ($i; $i < $value['DATD']-1; $i++) { 
  ?>
  <td  style="background: maroon;">
  <?php
  $idForm = $value['UID'].'-'.$itemDay = $i+1+1;
  $DtRep = date('Y-m').'-'.$itemDay;
  echo '0';
}


?>
 </td>

<?php
}

if ($DtRep == $value['DATU'] AND $value['DATU'] != '0000-00-00'){

	for ($i;  $i< $IdDay; $i++) { 


	?>
	<td  style="background: maroon;">
	<?php
	echo "Ув";


	}
?>
 </td>

<?php

                }

                else{





   ?>
   <td  class="" data-toggle="modal" data-target="#feedbackFormModalTab<?=$idForm?>" >
    <?php
            $sqlRepUsersSelect = "SELECT id,Mark,koment FROM reportusers WHERE IdUsers =".$value['UID']." AND  DateRep = '".$DtRep."' ";
             $resultRepUsersSelect = $connectionPDO -> query($sqlRepUsersSelect) or die('Ошибка при выполнении запроса выборки');
             
                $RepMark = $resultRepUsersSelect->fetch();
                 

                 	echo $RepMark['Mark'];

                 }

         
        
   
    ?>
   </td>


         <div class="modal" id='feedbackFormModalTab<?=$idForm?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="col-md-6 col-lg-12" align="center" style="padding-top: 120px;">

         <div class="modal-dialog" role="document">
            <!--<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->

             <div class="modal-body">
          
            <div class="col-md-3">
              <form role="forms" method="POST">
                <div class="templatemo_form">
                  <input name="Mark" type="text" class="form-control" id="Mark<?=$idForm?>" placeholder="<?=$RepMark['Mark']?>" maxlength="40" value="">
                  <input type="hidden" name="IDR" id="IDR<?=$idForm?>" value="<?=$RepMark['id']?>">
                  <input type="hidden" name="item" id="item<?=$idForm?>" value="<?=$value['UID']?>">
                  <?php
                   $sqlSelectIdTarif = "SELECT id FROM tarif WHERE IdDlj = '".$value['dlj']."' AND TarifDatNach <= '".$DtRep."' AND TarifDatCon >= '".$DtRep."'";
                    $resultSelectTarif = $connectionPDO -> query($sqlSelectIdTarif) or die('Ошибка при выполнении запроса выборки тарифа');
                      $IdTarif = $resultSelectTarif->fetch();
                      //echo $IdTarif['id'];
                    //  echo $value['dlj'];

                  ?>
                  <input type="hidden" name="IdTarif" id="IdTarif<?=$idForm?>" value="<?=$IdTarif['id']?>">
                  <input type="hidden" name="datRep" id="datRep<?=$DtRep?>" value="<?=$DtRep?>">

                </div>
                </div>
                <div class="col-md-9">
                <div class="templatemo_form">
                  <input type="text" class="form-control" id="koment<?=$idForm?>" name="koment" placeholder="Коментарии" maxlength="40" value="<?=$RepMark['koment']?>" >
                </div>
              </div>
              <div class="col-md-12">
                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" name="AddTab" id="AddTab<?=$idForm?>">Сохранить</button>
                </div>
              </div>
            </form>
            <script type="text/javascript">

              $("#AddTab<?=$idForm?>").click(function(){
  var AddTab = $("#AddTab<?=$idForm?>").val();
  var IdTarif = $("#IdTarif<?=$idForm?>").val();
  var IDR = $("#IDR<?=$idForm?>").val();
  var item = $("#item<?=$idForm?>").val();
  var Mark = $("#Mark<?=$idForm?>").val();
  var DateRep = $("#datRep<?=$DtRep?>").val();
  var koment = $("#koment<?=$idForm?>").val();

     
   // alert(DateRep);
    
  $.ajax({
        url: 'lib/obrtab.php',
        type: 'POST',
        cache: false,
        data:{ 'AddTab':AddTab, 'IdTarif':IdTarif,'IDR':IDR,'item':item, 'Mark':Mark,'DateRep':DateRep,'koment':koment},
        dataType: 'html',
        success:
      function(html){
            $("#tabele").html(html);
        }
    });

   $('#feedbackFormModalTab<?=$idForm?>').modal('hide');
  
});


            </script>
            
        </div>
      </div>
     </div>
     </div>
   <?php
  }
  ?>
<td>
  <?php

  if (isset($_POST['mount'])){

  $sqlRepUsersItog = "SELECT
    SUM((IF(rep.Mark = 'Оп', 8, rep.Mark)) *(tar.tarif)) - SUM(IF(rep.Mark = 'Оп', 1, 0)) *(
    SELECT SummFine FROM  fine WHERE   AddNameFine = 'Оп') - IF( (  SELECT  COUNT(mark)  FROM  reportusers  WHERE  IdUsers = ".$value['UID']." AND Mark = 'Пр' AND DateRep BETWEEN '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."') != 0,
( ((SELECT SummFine FROM fine  WHERE AddNameFine = 'Пр') +8 * tar.tarif) *(SELECT COUNT(mark) FROM reportusers WHERE IdUsers = ".$value['UID']." AND Mark = 'Пр' AND DateRep BETWEEN '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."')),0) AS Itog
    FROM reportusers AS rep
  INNER JOIN tarif AS tar 
  ON rep.idTarif = tar.id
  WHERE IdUsers =".$value['UID']." 
  AND DateRep between '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."' ";

  }else{

 $sqlRepUsersItog = "SELECT
    SUM((IF(rep.Mark = 'Оп', 8, rep.Mark)) *(tar.tarif)) - SUM(IF(rep.Mark = 'Оп', 1, 0)) *(
    SELECT SummFine FROM  fine WHERE   AddNameFine = 'Оп') - IF( (  SELECT  COUNT(mark)  FROM  reportusers  WHERE  IdUsers = ".$value['UID']." AND Mark = 'Пр' AND DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."') != 0,
( ((SELECT SummFine FROM fine  WHERE AddNameFine = 'Пр') +8 * tar.tarif) *(SELECT COUNT(mark) FROM reportusers WHERE IdUsers = ".$value['UID']." AND Mark = 'Пр' AND DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."')),0) AS Itog
FROM  reportusers AS rep INNER JOIN tarif AS tar ON rep.idTarif = tar.id WHERE IdUsers = ".$value['UID']." AND DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."'";

  }



             $resultRepUsersItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');

            echo  $resultRepUsersItog->fetch()['Itog'];
        // var_dump($RepItog = $resultRepUsersItog->fetchAll());  

  /*$sqlSelectTarif = "SELECT * FROM tarif WHERE IdDlj =".$value['id']."";

             $resultSelectTarif = $connectionPDO -> query($sqlSelectTarif) or die('Ошибка при выполнении запроса выборки тарифа');

                $SelectTarif = $resultSelectTarif->fetch();      */

//echo $Itog[] = $SelectTarif['tarif']*$RepItog[0]; 




  ?>


</td>
</tr>
        <tr>
            <td colspan ="<?=$IdDay+4?>" class="hiddenRow"><div class="accordian-body collapse" id="<?=$value['UID']?>"> Прогулов всего, дней:
              <?php

              if (isset($_POST['mount'])){

              	$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Пр%') AND IdUsers = ".$value['UID']."
              	AND DateRep between '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."'";

              }else{

				$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Пр%') AND IdUsers = ".$value['UID']." AND DateRep between '".date("Y-m")."-01' and '".date("Y-m")."-".$IdDay."' ";

              }

              
             $resultRepUsersItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');
               $RepItog = $resultRepUsersItog->fetch();
               echo $RepItog[0];


              ?><br>
              Отпрашивался всего,  дней:
              <?php 



              if (isset($_POST['mount'])){

              	$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%От%') AND IdUsers = ".$value['UID']."
              	AND DateRep between '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."'";

              }else{

				$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%От%') AND IdUsers = ".$value['UID']." AND DateRep between '".date("Y-m")."-01' and '".date("Y-m")."-".$IdDay."' ";

              }

                $resultRepUsersItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');
                $RepItog = $resultRepUsersItog->fetch();  
                echo $RepItog[0]; 

?><br> Болел всего, дней:
<?php 
              if (isset($_POST['mount'])){

              	$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Б%') AND IdUsers = ".$value['UID']."
              	AND DateRep between '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."'";

              }else{

				$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Б%') AND IdUsers = ".$value['UID']." AND DateRep between '".date("Y-m")."-01' and '".date("Y-m")."-".$IdDay."' ";

              }


   
             $resultRepUsersItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');
                $RepItog = $resultRepUsersItog->fetch();  
               echo $RepItog[0];
?><br> Опоздал всего дней:
<?php 
              if (isset($_POST['mount'])){

              	$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Оп%') AND IdUsers = ".$value['UID']."
              	AND DateRep between '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."'";

              }else{

				$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Оп%') AND IdUsers = ".$value['UID']." AND DateRep between '".date("Y-m")."-01' and '".date("Y-m")."-".$IdDay."' ";

              }


   
             $resultRepUsersItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');
                $RepItog = $resultRepUsersItog->fetch();  
               echo $RepItog[0];                   

?><br> Всего выплачено по работнику:
		<?php
			$ItotUser = ("SELECT
    SUM(
        (IF(rep.Mark = 'Оп', 8, rep.Mark)) *(tar.tarif)
    ) - SUM(IF(rep.Mark = 'Оп', 1, 0)) *(
    SELECT
        SummFine
    FROM
        fine
    WHERE
        AddNameFine = 'Оп'
) - IF(
    (
    SELECT
        COUNT(mark)
    FROM
        reportusers
    WHERE
        IdUsers = '".$value['UID']."' AND Mark = 'Пр'
) != 0,
(
    (
        (
        SELECT
            SummFine
        FROM
            fine
        WHERE
            AddNameFine = 'Пр'
    ) +8 * tar.tarif
    ) *(
    SELECT
        COUNT(mark)
    FROM
        reportusers
    WHERE
        IdUsers = '".$value['UID']."' AND Mark = 'Пр'
)
),
0
) AS Itogo
FROM
    reportusers AS rep
INNER JOIN tarif AS tar
ON
    rep.idTarif = tar.id
WHERE
    IdUsers = '".$value['UID']."'");

       $resultItotUser = $connectionPDO -> query($ItotUser) or die('Ошибка при выполнении запроса выборки');
                $ItotUserItog = $resultItotUser->fetch();


			echo($ItotUserItog['Itogo']);
		?>


            </div> </td>
        </tr>



<?php

}

?>

<tr><td colspan ="<?=$IdDay+3?>">Опозданий всего, дней:</td>
<td><?php 

              if (isset($_POST['mount'])){

              	$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Оп%') AND DateRep between '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."'";

              }else{

				$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Оп%') AND DateRep between '".date("Y-m")."-01' and '".date("Y-m")."-".$IdDay."' ";

              }

      
             $resultRepUsersItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');
               $RepItog = $resultRepUsersItog->fetch();
               echo $RepItog[0];  

?></td>
</tr>
<tr><td colspan ="<?=$IdDay+3?>">Прогулов всего, дней:</td>
<td><?php 

              if (isset($_POST['mount'])){

              	$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Пр%') AND DateRep between '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."'";

              }else{

				$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Пр%') AND DateRep between '".date("Y-m")."-01' and '".date("Y-m")."-".$IdDay."' ";

              }

      
             $resultRepUsersItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');
               $RepItog = $resultRepUsersItog->fetch();
               echo $RepItog[0];  

?></td>
</tr>
<tr><td colspan ="<?=$IdDay+3?>">Отпрашивался всего,  дней:</td>
<td><?php 


              if (isset($_POST['mount'])){

              	$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%От%') AND DateRep between '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."'";

              }else{

				$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%От%') AND DateRep between '".date("Y-m")."-01' and '".date("Y-m")."-".$IdDay."' ";

              }

             $resultRepUsersItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');
                $RepItog = $resultRepUsersItog->fetch();  
                echo $RepItog[0]; 

?></td>
</tr>
<tr><td colspan ="<?=$IdDay+3?>">Болел всего, дней:</td>
<td><?php 

 		if (isset($_POST['mount'])){

              	$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Б%') AND DateRep between '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."'";

              }else{

				$sqlRepUsersItog = "SELECT COUNT(*) FROM reportusers WHERE Mark LIKE ('%Б%') AND DateRep between '".date("Y-m")."-01' and '".date("Y-m")."-".$IdDay."' ";

              }

             $resultRepUsersItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');
                $RepItog = $resultRepUsersItog->fetch();  
               echo $RepItog[0]; 
?></td>
</tr>
<tr><td colspan ="<?=$IdDay+3?>">Итого П</td>

<td>
<?php

  if (isset($_POST['mount'])){

  	$sqlRepUsersItog = "SELECT
    SUM((IF(rep.Mark = 'Оп', 8, rep.Mark)) *(tar.tarif)) - SUM(IF(rep.Mark = 'Оп', 1, 0)) *(
    SELECT SummFine FROM  fine WHERE   AddNameFine = 'Оп') - IF( (  SELECT  COUNT(mark)  FROM  reportusers  WHERE Mark = 'Пр' AND DateRep BETWEEN '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."') != 0,
( ((SELECT SummFine FROM fine  WHERE AddNameFine = 'Пр') +8 * tar.tarif) *(SELECT COUNT(mark) FROM reportusers WHERE Mark = 'Пр' AND DateRep BETWEEN '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."')),0) AS Itog
    FROM reportusers AS rep
  INNER JOIN tarif AS tar 
  ON rep.idTarif = tar.id
  WHERE DateRep between '".$_POST['year'].'-'.$_POST['mount']."-01' and '".$_POST['year'].'-'.$_POST['mount']."-".$IdDay."' ";

  }else{

 $sqlRepUsersItog = "SELECT
    SUM((IF(rep.Mark = 'Оп', 8, rep.Mark)) *(tar.tarif)) - SUM(IF(rep.Mark = 'Оп', 1, 0)) *(
    SELECT SummFine FROM  fine WHERE   AddNameFine = 'Оп') - IF( (  SELECT  COUNT(mark)  FROM  reportusers  WHERE Mark = 'Пр' AND DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."') != 0,
( ((SELECT SummFine FROM fine  WHERE AddNameFine = 'Пр') +8 * tar.tarif) *(SELECT COUNT(mark) FROM reportusers WHERE Mark = 'Пр' AND DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."')),0) AS Itog
FROM  reportusers AS rep INNER JOIN tarif AS tar ON rep.idTarif = tar.id WHERE DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."'";

  }
$resultRepItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');

            echo  $resultRepItog->fetch()['Itog'];



?>
</td>

</tr>


</table>
</div>

<?php
//}

?>
      
    <!-- contact end -->
  
<script type="text/javascript">
  
/*$("#mount").change(function(){

  var mount = $("#mount").val();
   //  var itemdlj = $("#itemdlj<?=$valuedlj['id']?>").val();
     //var EditTextDlj = $("#EditTextDlj<?=$valuedlj['id']?>").val();
   // alert(select);
    
   $.ajax({
        url: 'lib/obrtab.php',
        type: 'POST',
        cache: false,
        data:{ 'mount':mount},
        dataType: 'html',
        success:
      function(html){
            $("#tabele").html(html);
        }
    });

  
});*/

</script>

  <script>

    $("#datepicker").datepicker({
        viewMode: 'years',
         format: 'mm-yyyy'
    });


      </script>


  <!-- templatemo 400 polygon -->
  </body>
</html>