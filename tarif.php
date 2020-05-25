             <div class="templatemo_form">
                <div class="col-md-3">
                       <div class="templatemo_form">
                            <div class="templatemo_form"><button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#feedbackFormModalTarif" >Добавить</button></div>
                    
                     </div>
                   </div>

            </div>

          <table class="table " border="1">
               <thead>
              <tr>
                <th>№</th><th>Должность</th><th>Дата начала</th><th>Окончания</th><th>Тариф</th>
            </tr>
</thead>
<?php

$sql_tarif = "SELECT t.id AS TID,t.IdDlj,t.TarifDatCon,t.TarifDatNach,t.tarif, d.id, d.dljName FROM tarif AS t
INNER JOIN dlj AS d
ON t.IdDlj = d.id";

$result_tarif = $connectionPDO -> query($sql_tarif);
$idt = 1;
foreach ($result_tarif as $tarif_key => $tarif_value) {


?>
<tr data-toggle="modal" data-target="#EditFormModalTarif<?=$tarif_value['TID']?>">
  <td><?=$idt++?></td>
  <td><?=$tarif_value['dljName']?></td>
  <td><?=$tarif_value['TarifDatNach']?></td>
  <td><?=$tarif_value['TarifDatCon']?></td>
  <td><?=$tarif_value['tarif']?></td>
</tr>

         <div class="modal" id='EditFormModalTarif<?=$tarif_value['TID']?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                  <div class="templatemo_form">
                  <input name="EditNameDLJ" type="text" id="EditNameDLJ" value="<?=$tarif_value['dljName']?>" class="form-control" id="fullname"  maxlength="40"> 
                  <input type="hidden" id="idtarrif<?=$tarif_value['TID']?>" value="<?=$tarif_value['TID']?>">             
                </div>
                 </div>
                <div class="templatemo_form">
                  <input name="EditTarifDatCon" type="date" class="form-control" id="EditTarifDatCon<?=$tarif_value['TID']?>"  maxlength="40" value="<?=$tarif_value['TarifDatCon']?>">              
                </div>
                <div class="templatemo_form">
                  <button type="button" id="ETarif<?=$tarif_value['TID']?>" class="btn btn-primary" name="ETarif<?=$tarif_value['TID']?>">Изменить</button>
                </div>
            </form>

           
            </div>
        </div>
      </div>
     </div>

 <script type="text/javascript">
  
   $("#ETarif<?=$tarif_value['TID']?>").click(function(){

  var ETarif = $("#ETarif<?=$tarif_value['TID']?>").val();
  var EditTarifDatCon = $("#EditTarifDatCon<?=$tarif_value['TID']?>").val();
  var idtarrif = $("#idtarrif<?=$tarif_value['TID']?>").val();


  $.ajax({
        url: 'lib/obrtab.php',
        type: 'POST',
        cache: false,
        data:{ 'ETarif':ETarif, 'EditTarifDatCon':EditTarifDatCon,'idtarrif':idtarrif},
        dataType: 'html',
        success:
      function(html){
            $("#tabtarif").html(html);
        }
    });

 $('#EditFormModalTarif<?=$tarif_value['TID']?>').modal('hide');
 alert("Тариф изменен");
  
});


</script>
<?php
}

?>
</table>

         <div class="modal" id='feedbackFormModalTarif' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

             <div class="modal-body">
          
            <div class="col-md-5 col-lg-12">
              <form role="forms" method="POST" id="form-tarif">
                <div class="templatemo_form">

                  <select name="IdDlj" class="form-control" id="IdDlj">
                    <?php
                      $sqlSelectDlg = "SELECT * FROM dlj WHERE id != 0";
                      $resultSelectDlg = $connectionPDO->query($sqlSelectDlg);
                      foreach ($resultSelectDlg as $key => $value) {
                       ?>
                       <option value="<?=$value['id']?>"><?=$value['dljName']?></option>
                       <?php
                      }
                    ?>
                    
                  </select>

                 </div>
                <div class="templatemo_form">
                <input name="TarifDatNach" type="date" class="form-control" id="TarifDatNach" placeholder="<?=$RepMark['Mark']?>" maxlength="40" value="<?=date('Y-m-d')?>">              
                </div>
                <div class="templatemo_form">
                  <input name="TarifDatCon" type="date" class="form-control" id="TarifDatCon" placeholder="<?=$RepMark['Mark']?>" maxlength="40" value="<?=date('Y-12-31')?>">              
                </div>
                <div class="templatemo_form">
                  <input name="tarif_summ" type="text" class="form-control" id="tarif_summ" maxlength="40" required="required">              
                </div>
                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" name="AddTarif" id="AddTarif">Добавить</button>
                </div>
            </form>
            </div>
        </div>
      </div>
     </div>

<script type="text/javascript">
  
   $("#AddTarif").click(function(){

  var AddTarif = $("#AddTarif").val();
  var TarifDatNach = $("#TarifDatNach").val();
  var TarifDatCon = $("#TarifDatCon").val();
  var IdDlj = $("#IdDlj").val();
  var tarif_summ = $("#tarif_summ").val();

  $.ajax({
        url: 'lib/obrtab.php',
        type: 'POST',
        cache: false,
        data:{ 'AddTarif':AddTarif, 'TarifDatNach':TarifDatNach,'TarifDatCon':TarifDatCon,'IdDlj':IdDlj, 'tarif_summ':tarif_summ},
        dataType: 'html',
        success:
      function(html){
            $("#tabtarif").html(html);
        }
    });

   $('#feedbackFormModalTarif').modal('hide');
    alert("Тариф добавлен");
  
});


</script>
