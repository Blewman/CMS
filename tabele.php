<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');
$IdUser = $_SESSION['id'];

$year = $_POST['year'];
$mount = $_POST['mount'];

 
if (!isset($_POST['year']) AND !isset($_POST['mount']) ) {
  $year = date('Y');
   $mount = date('m');
} 

if (!isset($_POST['year']) AND isset($_POST['mount']) ) {
 
    echo $mount;
echo $year;
   ?>
   <?php
} 

if (isset($_POST['year']) AND !isset($_POST['mount']) ) {
 
    echo $mount;
echo $year;
} 





setlocale(LC_TIME, 'ru_RU.utf8');
//echo strftime('%w', strtotime('26.10.2019'));

$ArrMount = array(
"01"=>"Январь",
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

                $(document).ready(function() {
            $('#year').on('change', function() {
                this.formYear.submit();
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
  background: #3D365E;
  border: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 600;
  margin-top: 10px;
  margin-left: -25px;

}

.chevron{
  float: left; 
  width: 100%;
  line-height: 20px;
  text-align: center;
  color: #ffffff;
  border-radius: 0px;
  background: #3D365E;
  border: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 600;
  margin-top: 10px;
  padding-left: 0px;
  margin-right: 50px;
  margin-left: -17px;

}

    </style>

  </head>
  <body>
          
                
 <?php

$dat = date('Y-m-d');

 ?>       
       <div class="col-md-0 col-sm-0 col-lg-1">
       	
                  
              
 <div class="col-md-0 col-sm-0 col-lg-12">            
                <div class="col-xs-offset-0 col-md-0 col-sm-0">
<div class="templatemo_form">
<div class="container">
              <div class="col-lg-1 col-sm-1 col-md-1 col-xs-2" style="margin-left: -22px;">
  					<button type="button" class="btn chevron fa fa-chevron-left" id="left_mount"></button>	
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-5">
              <form action="" method="POST" id="formMount">
                        <select class="btn btn-primary selectpicker templatemo_form_select" name="mount" id="mount">
                          <?php
                          foreach ($ArrMount as $key => $value) {

                              if ($key == $mount) {
                                $selected = "selected";
                              } else {
                                $selected = " ";
                              }
                          
                          ?>
                          <option value="<?=$key?>"<?=$selected?>><?=$value?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </form>
                      </div>
                      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-4">
                        <form action="" method="POST" id="formYear">
                        <select class="btn btn-primary selectpicker templatemo_form_select"  name="year" id="year">
                        	<?php

                          $YearResult = SQLResult("SELECT YEAR(Rep.DateRep) AS DATTY FROM reportusers AS Rep GROUP BY (DATTY)");
                              
                              $arrYear = $YearResult->fetchAll();
                              foreach ($arrYear as $keyYear => $valueYear) {

                                if ($valueYear['DATTY'] == $year) {

                                  $selectedy = "selected";
                                }
                                  else  {
                                    $selectedy = " ";
                                  }
                                ?>
                                <option <?=$selectedy?>><?=$valueYear['DATTY'];?></option>
                                <?php
                                    

                              }
                          $key_search = array_search(date('Y'), array_column($arrYear, 'DATTY'));

                          if ($key_search == false) {
                            ?>
                             <option selected ><?=date('Y');?></option>
                            <?php
                             
                          }
                       
                        	?>
                          	<?php

                          		
                          	?>
                        </select>
                      </form>
                      </div>
                      <div class="col-lg-1 col-sm-1 col-md-1 col-xs-2" style="margin-left: -25px;" >
                        <button type="button" class="btn chevron fa fa-chevron-right" id="right_mount"></button>
                        <input type="hidden" name="rchevron" id="rlchevron" value="<?=$mount?>">	
                      </div>
                      </div>
  </div>
</div></div> 
              
            </form>
              <script type="text/javascript">
  
$("#left_mount").click(function(){

  //var left = ("<?=$mount?>");
    var year = $("#year").val();
    var mount = $("#mount").val();
    var a = mount -1;

     if (a<10){
  a = 0+String(a)
 }

  if (a == '00'){
  a = '12';
 }
 // var year = $("#year").val();

 //alert(a);

 $('select[name="mount"] option[value='+a+']').prop('selected', true);



 mount = a;
  $.ajax({
        url: 'lib/obrtabmount.php',
        type: 'POST',
        cache: false,
        data:{ 'mount':mount,'year':year},
        dataType: 'html',
        success:
      function(html){
            $("#tabele").html(html);
        }
    });


  
});

$("#right_mount").click(function(){
    var year = $("#year").val();
    var mount = $("#mount").val();
    var b = Number(mount)+1;


 if (b<10){
  b = 0+String(b);
 }

 if (b == '13'){
  b = '01';
 }

//alert(b);

 $('select[name="mount"] option[value='+b+']').prop('selected', true);
 mount = b;

 $.ajax({
        url: 'lib/obrtabmount.php',
        type: 'POST',
        cache: false,
        data:{ 'mount':mount,'year':year},
        dataType: 'html',
        success:
      function(html){
            $("#tabele").html(html);
        }
    });
 
 
});
</script>          
</div>   




<div class="col-md-3 col-sm-12 col-lg-12" >


 <table class="table " border="1" style="border-collapse:collapse;">
               <thead>
              <tr><th>№</th><th>ФИО</th><th>Должность</th>
                <?php

                  $IdDay = cal_days_in_month(CAL_GREGORIAN, $mount, $year);
                

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

//if (isset($_POST['mount'])){

$sql_reportusers = "SELECT 
  us.id AS UID,
  us.fio, 
  us.dlj,
  DAY(us.DatT) AS DATD,
  DATE_SUB(us.DatT,Interval 1 DAY) AS DATTD,
  IF (MONTH(us.DatT) = '".$mount."' AND YEAR(us.DatT) = '".$year."' , '1', '0') AS UVL,
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
(ROLE = 3 AND YEAR(DATT) != '".$year."' AND YEAR(DATT) > '".$year."'  AND MONTH(DATT) != '".$mount."' AND MONTH(DATT) > '".$mount."' AND DATU = '0000-00-00') 
OR 
(ROLE = 3 AND YEAR(DATT) <= '".$year."' AND MONTH(DATT) <= '".$mount."' AND DATU = '0000-00-00')
OR 
(ROLE = 3 AND YEAR(DATU) >= '".$year."' AND MONTH(DATU) >= '".$mount."' AND DATU != '0000-00-00' AND YEAR(DATT) <= '".$year."' AND MONTH(DATT) <= '".$mount."')";


/*}else{

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


}*/




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



              //if (isset($_POST['mount'])) {

              //  echo $DatPrev = $_POST['year']."-".$_POST['mount'];
$mountSelect = $mount;
$UserDat = $i;
$idForm = $value['UID'].'-'.$itemDay = $i+1;
$DtRep = $year.'-'.$mount.'-'.$itemDay;
             // }
              /*elseif (isset($_POST['left'])) {

                //echo $DatPrev = $_POST['year']."-".$_POST['mount'];
                echo $DatPrev = $_POST['year']."-".$_POST['mount'];;
              }*//*else{

$UserDat = $i;
$idForm = $value['UID'].'-'.$itemDay = $i+1;
$DtRep = date('Y-m').'-'.$itemDay;

              }*/

if ($value['UVL'] == 1){

  //$i = $i - $value['DATD'];
 for ($i; $i < $value['DATD']-1; $i++) { 
  ?>
  <td  style="background: maroon;">
  <?php
  $idForm = $value['UID'].'-'.$itemDay = $i+1+1;
  $DtRep = $year.'-'.$mount.'-'.$itemDay;
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
                  <input type="hidden" name="dljNames" id="dljNames<?=$idForm?>" value="<?=$value['dljName']?>">
                  <?php
                   $sqlSelectIdTarif = "SELECT id FROM tarif WHERE IdDlj = '".$value['dlj']."' AND TarifDatNach <= '".$DtRep."' AND TarifDatCon >= '".$DtRep."'";
                    $resultSelectTarif = $connectionPDO -> query($sqlSelectIdTarif) or die('Ошибка при выполнении запроса выборки тарифа');
                      $IdTarif = $resultSelectTarif->fetch();
                      //echo $IdTarif['id'];
                    //  echo $value['dlj'];

                  ?>
                  <input type="hidden" name="IdTarif" id="IdTarif<?=$idForm?>" value="<?=$IdTarif['id']?>">
                  <input type="hidden" name="datRep" id="datRep<?=$DtRep?>" value="<?=$DtRep?>">
                  <input type="hidden" name="mdatRep" id="mdatRep<?=$DtRep?>" value="<?=$mount?>">

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
  var mount = $("#mount").val();
  var year = $("#year").val();
  var dljNames = $("#dljNames<?=$idForm?>").val();
  
   
   if (!IdTarif) {
    alert("Необходимо добавить тариф для должности "+dljNames);
   } else {

    $.ajax({
        url: 'lib/obrtab.php',
        type: 'POST',
        cache: false,
        data:{ 'AddTab':AddTab, 'IdTarif':IdTarif,'IDR':IDR,'item':item, 'Mark':Mark,'DateRep':DateRep,'koment':koment,'mount':mount,'year':year},
        dataType: 'html',
        success:
      function(html){
            $("#tabele").html(html);
        }
    });


   }
  

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



  //if (isset($_POST['mount'])){

 $sqlRepUsersItog = "SELECT
    IF(  SUM(far.SummFine) != 0,
        SUM(tarif * Mark) - SUM(far.SummFine),
        SUM(tarif * Mark)
    ) AS itog
FROM
    reportusers AS rep
INNER JOIN tarif AS tar
ON
    rep.idTarif = tar.id
LEFT JOIN fine AS far
ON
    far.AddNameFine = rep.Mark
    WHERE IdUsers =".$value['UID']." 
  AND DateRep between '".$year.'-'.$mount."-01' and '".$year.'-'.$mount."-".$IdDay."' ";

 // }

  /*else{

 $sqlRepUsersItog = "SELECT
    SUM((IF(rep.Mark = 'Оп', 8, rep.Mark)) *(tar.tarif)) - SUM(IF(rep.Mark = 'Оп', 1, 0)) *(
    SELECT SummFine FROM  fine WHERE   AddNameFine = 'Оп') - IF( (  SELECT  COUNT(mark)  FROM  reportusers  WHERE  IdUsers = ".$value['UID']." AND Mark = 'Пр' AND DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."') != 0,
( ((SELECT SummFine FROM fine  WHERE AddNameFine = 'Пр') +8 * tar.tarif) *(SELECT COUNT(mark) FROM reportusers WHERE IdUsers = ".$value['UID']." AND Mark = 'Пр' AND DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."')),0) AS Itog
FROM  reportusers AS rep INNER JOIN tarif AS tar ON rep.idTarif = tar.id WHERE IdUsers = ".$value['UID']." AND DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."'";

  }*/



             $resultRepUsersItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');

            print_r($resultRepUsersItog->fetch()['itog']);
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


               echo report_user_itog_mark($year,$mount,'Пр',$IdDay,$value['UID']);


              ?><br>
              Отпрашивался всего,  дней:
              <?php 

              echo report_user_itog_mark($year,$mount,'От',$IdDay,$value['UID']);


?><br> Болел всего, дней:
<?php 
  echo report_user_itog_mark($year,$mount,'Б',$IdDay,$value['UID']);

            
?><br> Опоздал всего дней:
<?php 

  echo report_user_itog_mark($year,$mount,'Оп',$IdDay,$value['UID']);
                             

?><br> Всего выплачено по работнику:
    <?php
      $ItotUser = ("SELECT
    IF(  SUM(far.SummFine) != 0,
        SUM(tarif * Mark) - SUM(far.SummFine),
        SUM(tarif * Mark)
    ) AS Itogo
FROM
    reportusers AS rep
INNER JOIN tarif AS tar
ON
    rep.idTarif = tar.id
LEFT JOIN fine AS far
ON
    far.AddNameFine = rep.Mark
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
      
      echo report_user_itog_mark_mount($year,$mount,'Оп',$IdDay);
 

?></td>
</tr>
<tr><td colspan ="<?=$IdDay+3?>">Прогулов всего, дней:</td>
<td><?php 
echo report_user_itog_mark_mount($year,$mount,'Пр',$IdDay);      

?></td>
</tr>
<tr><td colspan ="<?=$IdDay+3?>">Отпрашивался всего,  дней:</td>
<td><?php 

echo report_user_itog_mark_mount($year,$mount,'От',$IdDay);         

?></td>
</tr>
<tr><td colspan ="<?=$IdDay+3?>">Болел всего, дней:</td>
<td><?php 
echo report_user_itog_mark_mount($year,$mount,'Б',$IdDay);
    
?></td>
</tr>
<tr><td colspan ="<?=$IdDay+3?>">Итого П</td>

<td>
<?php

  //if (isset($_POST['mount'])){

   $sqlRepUsersItog = "SELECT
    IF(  SUM(far.SummFine) != 0,
        SUM(tarif * Mark) - SUM(far.SummFine),
        SUM(tarif * Mark)
    ) AS itog
FROM
    reportusers AS rep
INNER JOIN tarif AS tar
ON
    rep.idTarif = tar.id
LEFT JOIN fine AS far
ON
    far.AddNameFine = rep.Mark
  WHERE DateRep between '".$year.'-'.$mount."-01' and '".$year.'-'.$mount."-".$IdDay."' ";

 /* }else{

 $sqlRepUsersItog = "SELECT
    SUM((IF(rep.Mark = 'Оп', 8, rep.Mark)) *(tar.tarif)) - SUM(IF(rep.Mark = 'Оп', 1, 0)) *(
    SELECT SummFine FROM  fine WHERE   AddNameFine = 'Оп') - IF( (  SELECT  COUNT(mark)  FROM  reportusers  WHERE Mark = 'Пр' AND DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."') != 0,
( ((SELECT SummFine FROM fine  WHERE AddNameFine = 'Пр') +8 * tar.tarif) *(SELECT COUNT(mark) FROM reportusers WHERE Mark = 'Пр' AND DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."')),0) AS Itog
FROM  reportusers AS rep INNER JOIN tarif AS tar ON rep.idTarif = tar.id WHERE DateRep BETWEEN '".date("Y-m")."-01' AND '".date("Y-m")."-".$IdDay."'";

  }*/
$resultRepItog = $connectionPDO -> query($sqlRepUsersItog) or die('Ошибка при выполнении запроса выборки');

            echo  $resultRepItog->fetch()['itog'];



?>
</td>

</tr>


</table>

<?php
//}

?>




         
</div>

<?php


?>
      
    <!-- contact end -->
  
<script type="text/javascript">
  
$("#mount").change(function(){

  var mount = $("#mount").val();
  var year = $("#year").val();
   //  var itemdlj = $("#itemdlj<?=$valuedlj['id']?>").val();
     //var EditTextDlj = $("#EditTextDlj<?=$valuedlj['id']?>").val();
   // alert(select);
    
   $.ajax({
        url: 'lib/obrtabmount.php',
        type: 'POST',
        cache: false,
        data:{ 'mount':mount,'year':year},
        dataType: 'html',
        success:
      function(html){
            $("#tabele").html(html);
        }
    });

  
});

$("#year").change(function(){

  var year = $("#year").val();
  var mount = $("#mount").val();
   //  var itemdlj = $("#itemdlj<?=$valuedlj['id']?>").val();
     //var EditTextDlj = $("#EditTextDlj<?=$valuedlj['id']?>").val();
   // alert(select);
    
   $.ajax({
        url: 'lib/obrtabmount.php',
        type: 'POST',
        cache: false,
        data:{ 'year':year,'mount':mount},
        dataType: 'html',
        success:
      function(html){
            $("#tabele").html(html);
        }
    });

  
});

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