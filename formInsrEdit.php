<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');

?>


<?php

switch ($value_instr['IdState']) {
  case 1:
  ?>
  <!-- Назначение инструмента-->

             <div class="modal" id="FormModalEditInstr<?=$value_instr['IDNST']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
                <form role="forms" method="POST">
            <!--<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->

             <div class="modal-body">
          
            <div class="col-md-5 col-lg-12">
              <form role="forms" method="POST">
                <div class="templatemo_form">
                  <input type="text" name="NameInstEdit" placeholder="Наименование" value="<?=$value_instr['Name']?>">
                  <input type="hidden" name="IdInstr" value="<?=$value_instr['IDNST']?>">
                </div>
                <div class="templatemo_form">
                  <input type="text" name="ModelInstEdit" placeholder="Модель" value="<?=$value_instr['Model']?>">
                </div>
                <div class="templatemo_form">
                  <input type="text" name="SNInstEdit" placeholder="Сирийный номер" value="<?=$value_instr['SN']?>" enabled>
                </div>
                <div class="templatemo_form">
                  <select class="templatemo_form form-control" name="IdUserInstEdit">
                    <?php

                    $resultUser = SQLResult("SELECT id,role,fio FROM users WHERE role = 3 AND datU < ".date('Y-m-d')."");
                    foreach ($resultUser as $k => $val) {                 
                    ?>
                    <option value="<?=$val['id']?>"><?=$val['fio']?></option>
                    <?php
                    }
                    
                    ?>
                  </select>
                </div>
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" name="EditInst">Выдать</button>
                </div>
   
            </div>
            </div>
        </div>
          </form>

      </div>
     </div>
  <?php

    break;
  case 2:
?>
<!-- Возврат инструмента-->

             <div class="modal" id="FormModalEditInstr<?=$value_instr['IDNST']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
                <form role="forms" method="POST">
            <!--<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->

             <div class="modal-body">
          
            <div class="col-md-5 col-lg-12">
              <form role="forms" method="POST">
                <input type="hidden" name="idRI" id="idRI<?=$value_instr['IDNST']?>" value="<?=$valInst['idRI']?>">
                <div class="templatemo_form">
                  <input type="text" name="NameInstEdit" placeholder="Наименование" value="<?=$value_instr['Name'].' '.$value_instr['Model'].' '.$value_instr['SN']?>">
                  <input type="hidden" name="IdInstr" id="IdInstr<?=$value_instr['IDNST']?>" value="<?=$value_instr['IDNST']?>">
                </div>
                <div class="templatemo_form">
                  <?php
                  $resultUSInst = SQLResult("SELECT * FROM recinstrument INNER JOIN users ON recinstrument.IdUser = users.id WHERE IdInstrument = ".$value_instr['IDNST']."")->fetch();
                

                  ?>
                  <input type="text" name="ModelInstEdit" placeholder="Пользователь" value="Выдана сотруднику: <?=$resultUSInst['fio']?>">
                </div>
                <div class="templatemo_form">
                  <select class="templatemo_form form-control" name="StateInstEditVz" id="StateInstEditVz<?=$value_instr['IDNST']?>">
                    <option value="1">Исправен</option>
                    <option value="3">Не исправно</option>
                  </select>
                </div>
                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" id='EditInstVz<?=$value_instr['IDNST']?>' name="EditInstVz">Возврат</button>
                </div>
   
            </div>
            </div>
        </div>
          </form>

          <script type="text/javascript">
            
            $("#EditInstVz<?=$value_instr['IDNST']?>").click(function(){

  var EditInstVz = $("#EditInstVz<?=$value_instr['IDNST']?>").val();
  var StateInstEditVz = $("#StateInstEditVz<?=$value_instr['IDNST']?>").val();
  var IdInstr = $("#IdInstr<?=$value_instr['IDNST']?>").val();
  var idRI = $("#idRI<?=$value_instr['IDNST']?>").val();


    
   // alert('Переназначаем');
   $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{ 'EditInstVz':EditInstVz,'StateInstEditVz':StateInstEditVz,'IdInstr':IdInstr,'idRI':idRI},
        dataType: 'html',
        success:
      function(html){
            $("#Inst").html(html);
        }
    });

     $('#FormModalEditInstr<?=$value_instr['IDNST']?>').modal('hide');

  
});


          </script>

      </div>
     </div>
<?php
    break;   
    case 3: 
    ?>
    <!-- Ремонт инструмента-->

             <div class="modal" id="FormModalEditInstr<?=$value_instr['IDNST']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
                <form role="forms" method="POST">
            <!--<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->

             <div class="modal-body">
          
            <div class="col-md-5 col-lg-12">
              <form role="forms" method="POST">
                <input type="hidden" name="idRI" id="idRI<?=$value_instr['IDNST']?>" value="<?=$valInst['idRI']?>">
                <div class="templatemo_form">
                  <input type="text" name="NameInstEdit" id="NameInstEdit<?=$value_instr['IDNST']?>" placeholder="Наименование" value="<?=$value_instr['Name'].' '.$value['Model'].' '.$value['SN']?>">
                  <input type="hidden" id="IdInstr<?=$value_instr['IDNST']?>" name="IdInstr" value="<?=$value_instr['IDNST']?>">
                </div>
                <div class="templatemo_form">
                  <?php
                  $resultUSInst = SQLResult("SELECT * FROM recinstrument INNER JOIN users ON recinstrument.IdUser = users.id WHERE IdInstrument = ".$value_instr['IDNST']."")->fetch();
                

                  ?>
                  <input type="text" name="ModelInstEdit" id="ModelInstEdit<?=$value_instr['IDNST']?>"> placeholder="Пользователь" value="Возвращен сотрудником: <?=$resultUSInst['fio'].' '.$valInst['DatVZ']?> в неисправном состоянии ">
                </div>
                <div class="templatemo_form">
                  <textarea class="templatemo_form form-control" id="txt" name ='txt'>
                  </textarea>
               </div>
              <div class="templatemo_form">
                  <input type="text" name="SummInstEdit" id="SummInstEdit<?=$value_instr['IDNST']?>" placeholder="Сумма ремонта" >
                  
                </div>

                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" id="EditInstRem<?=$value_instr['IDNST']?>" name="EditInstRem">Ремонт</button>
                  <button type="submit" class="btn btn-primary" id="EditInstSpis<?=$value_instr['IDNST']?>" name="EditInstSpis">Списать</button>
                </div>
   
            </div>
            </div>
        </div>
          </form>

          <script type="text/javascript">
            
            $("#EditInstSpis<?=$value_instr['IDNST']?>").click(function(){

  var EditInstSpis = $("#EditInstSpis<?=$value_instr['IDNST']?>").val();
  var IdInstr = $("#IdInstr<?=$value_instr['IDNST']?>").val();
 
    
   // alert('Переназначаем');
   $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{ 'EditInstSpis':EditInstSpis,'IdInstr':IdInstr},
        dataType: 'html',
        success:
      function(html){
            $("#Inst").html(html);
        }
    });

     $('#FormModalEditInstr<?=$value_instr['IDNST']?>').modal('hide');

  
});

             $("#EditInstRem<?=$value_instr['IDNST']?>").click(function(){

  var EditInstRem = $("#EditInstRem<?=$value_instr['IDNST']?>").val();
 
    var StateInstEditVz = $("#StateInstEditVz<?=$value_instr['IDNST']?>").val();
    var IdInstr = $("#IdInstr<?=$value_instr['IDNST']?>").val();
    var idRI = $("#idRI<?=$value_instr['IDNST']?>").val();
    var txt = $("#txt<?=$value_instr['IDNST']?>").val();
    var SummInstEdit = $("#SummInstEdit<?=$value_instr['IDNST']?>").val();


   // alert('Переназначаем');
   $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{ 'EditInstRem':EditInstRem,'StateInstEditVz':StateInstEditVz,'IdInstr':IdInstr,'idRI':idRI,'txt':txt,'SummInstEdit':SummInstEdit},
        dataType: 'html',
        success:
      function(html){
            $("#Inst").html(html);
        }
    });

     $('#FormModalEditInstr<?=$value_instr['IDNST']?>').modal('hide');

  
});


          </script>

      </div>
     </div>


    <?php
}





?>  



       
    <div class="container">

    	
    </div>
    </div>
    </div>
    <!-- contact end -->
	<!-- footer start -->
    <!-- footer end -->    
	<script>
	$('.gallery_more').click(function(){
		var $this = $(this);
		$this.toggleClass('gallery_more');
		if($this.hasClass('gallery_more')){
			$this.text('Load More');			
		} else {
			$this.text('Load Less');
		}
	});
    </script>
	<!-- templatemo 400 polygon -->
  </body>
</html>