

<div class="col-sm-3">
      
    <div class="templatemo_form">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackFormModalAddInstr">Поступление</button>
    </div>
    </div>
    <div class="col-sm-3">
    <div class="templatemo_form" >

            <input type="text" class="form-control form-inline" style="" id="SearchInst" autocomplete="off" size="30" >
      
    </div>
    
  </div>
     <div class="col-sm-3">
    <div class="templatemo_form" >
      <form method="POST" name="form_state">
            <select name="select_state" id="select_state" class="btn btn-primary selectpicker templatemo_form_select">
              <?php
                $sql_state = "SELECT id,name FROM state";
                $result_state = $connectionPDO->query($sql_state);
                foreach ($result_state as $key_state => $value_state) {

                    if ($select_state == $value_state['id'] ){

                    $selected = "selected";
                    } else {
                      $selected = "";
                    }


                  ?>
                  <option value="<?=$value_state['id']?>" <?=$selected?>><?=$value_state['name']?></option>

                  <?php
                }

              ?>          
            </select>
      </form>      
    </div>
    
  </div> 
  
  <script type="text/javascript">

    $("#SearchInst").change(function(){

  var SearchInst = $("#SearchInst").val();
   //  var itemdlj = $("#itemdlj<?=$valuedlj['id']?>").val();
     //var EditTextDlj = $("#EditTextDlj<?=$valuedlj['id']?>").val();
  // alert(SearchInst);
    
   $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{ 'SearchInst':SearchInst},
        dataType: 'html',
        success:
      function(html){
            $("#inst").html(html);
        }
    });

  
});
  </script>

<?php

if (isset($_POST['SearchInst']) AND isset($_POST['SearchInst']) != "" ) {
$Search = $_POST['SearchInst'];

//if (!$Search == " ") {
 // $result_instrument = SQLResult($sql_instrument);
//}else{

  /*echo $sql_instrument = "SELECT inst.id AS IDNST, inst.Name, inst.Model, inst.DatP, inst.SN, inst.IdState, inst.summ, state.id, state.name FROM instrument AS inst
  INNER JOIN state 
  ON  inst.IdState = state.id
  WHERE inst.Name LIKE('%".$_POST['SearchInst']."%')
  ";*/

  $result_instrument = SQLResult($sql_instrument);


//} 
} 
elseif (isset($_POST['select_state'])) {
  $result_instrument = SQLResult("SELECT inst.id AS IDNST, inst.Name, inst.Model, inst.DatP, inst.SN, inst.IdState, inst.summ, state.id, state.name FROM instrument AS inst
  INNER JOIN state 
  ON  inst.IdState = state.id WHERE IdState = ".$_POST['select_state'].";
  ");
} 


else {
  $result_instrument = SQLResult("SELECT inst.id AS IDNST, inst.Name, inst.Model, inst.DatP, inst.SN, inst.IdState, inst.summ, state.id, state.name FROM instrument AS inst
  INNER JOIN state 
  ON  inst.IdState = state.id WHERE IdState = 1;
  ");



}


?>
                 

<br>

          <table class="table " border="1" style="border-collapse:collapse;">
               <thead>
              <tr>
                <th>№</th><th>Наименование</th><th>Модель</th><th>Дата</th><th>Цена</th><th>Состояние</th>
            </tr>
</thead>
<?php
$idt=1;


foreach ($result_instrument as $keyinstr => $value_instr) {


?>
<tr>

  <td data-toggle="modal" data-target="#FormModalEditInstrDel<?=$value_instr['IDNST']?>"><?=$idt++?></td>
  <td data-toggle="modal" data-target="#FormModalEditInstr<?=$value_instr['IDNST']?>"><?=$value_instr['Name']?></td>
  <td data-toggle="modal" data-target="#FormModalEditInstr<?=$value_instr['IDNST']?>"><?=$value_instr['Model']?></td>
  <td data-toggle="modal" data-target="#FormModalEditInstr<?=$value_instr['IDNST']?>"><?=$value_instr['DatP']?></td>
  <td data-toggle="modal" data-target="#FormModalEditInstr<?=$value_instr['IDNST']?>"><?=$value_instr['summ']?></td>
  <td data-toggle="modal" data-target="#FormModalEditInstr<?=$value_instr['IDNST']?>"><?=$value_instr['name']?></td>
</tr>
<tr>
            <td colspan ="<?=$IdDay+6?>" class="hiddenRow"><div class="accordian-body collapse" id="<?=$value_instr['IDNST']?>">

             
  <?php
 //   }
  ?>
              <?php
             //  $ItogInst = SQLResult("SELECT INST.id AS idRI, INST.IdUser,INST.IdInstrument,INST.DatV,INST.DatVZ,INST.Sost,INST.summ,users.id,users.fio FROM recinstrument AS INST INNER JOIN users ON INST.IdUser = users.id WHERE IdInstrument = ".$value_instr['IDNST']."");

               /*foreach ($ItogInst as $k => $valInst) {
                 echo $valInst['fio'].' Выдан: ';
                 echo $valInst['DatV'];

                switch ($valInst['Sost']) {
                   case 1:
                  echo " Возращен: ";
                 echo $valInst['DatVZ']." В: ";
                     echo " Исправном состоянии<br>";
                     break;
                  case 3:
                        echo " Возращен: ";
                      echo $valInst['DatVZ']." В: ";
                     echo " Не исправном состоянии";
                     if ($valInst['summ'] != 0){
                        echo " Ремонт произведен на сумму: ".$valInst['summ'];
                     }
                     echo "<br>";

                     break;  
                   
                   default:
                    echo "<br>";
                     break;
                 }

             }*/
                 




              ?>

              </div>
            </td>
          </tr>

          
               

<?php
include('form.insr.edit.php');

}

?>
</table>

<script type="text/javascript">
  
$("#select_state").change(function(){

  var select_state = $("#select_state").val();
   //  var itemdlj = $("#itemdlj<?=$valuedlj['id']?>").val();
     //var EditTextDlj = $("#EditTextDlj<?=$valuedlj['id']?>").val();
   // alert(select);
    
   $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{ 'select_state':select_state},
        dataType: 'html',
        success:
      function(html){
            $("#inst").html(html);
        }
    });

  
});



</script>
<?php

include('form.stock.add.php');

?>


 