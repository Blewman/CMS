<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');

?>

<!-- Назначение инструмента-->

  <div class="modal fade" id="FormModalEditInstr<?=$value_instr['IDNST']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg">
    <div class="modal-content templatemo_form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
            <?=$value_instr['Name'].' '.$value_instr['Model'].' '.$value_instr['SN']?>
            </h4>
      </div>                   
        <div class="modal-body templatemo_form">
          
            <div class="col-md-5 col-lg-12">
                     <style>
      *{
  box-sizing: border-box;
}
.d-table{
  display: table;
  width: 100%;
  border-collapse: collapse;
  margin-left: -30px;
}
.d-tr{
  display: table-row;
}
.d-td{
 /* display: table-cell;*/
  text-align: center;
  border: none;
  border: 1px solid #ccc;
 /* vertical-align: middle;*/
    height: 30px;
    /*width: 150px;*/

  }

.d-th{
 font-weight: bold;
 /*display: table-cell;*/
  text-align: center;
  border: none;
  border: 1px solid #ccc;
  /*vertical-align: middle;*/
  border-right: 1px solid #ccc;
  color: #b2c831;
  font-size: 12px; 
  background:#353535;
 /* height: 30px; */
}

.d-tr:hover {
    background: #000702; /* Цвет фона под ссылкой */ 
} 

input[type=text].inp{
 /* height: 100%; 
   width: 100%; */
  /* padding: 0px;*/
    width: 100%;
   margin-top: 0px;
   padding: 0px;
}

input[type=text].inp:hover{
 background: #000702;
 width: 160px;
 margin-top: 0px;
}

input[type=date].inp{
 /* height: 100%; 
   width: 100%; */
margin-top: 0px;
   width: 100%;
   padding: 0px;

}

input[type=date].inp:hover{
 background: #000702;
 margin-top: 0px;
}

    </style>
              <form role="forms" method="POST">
                <br>
                
                <input type="hidden" name="IdInstr" id="IdInstr<?=$value_instr['IDNST']?>" value="<?=$value_instr['IDNST']?>">

               <!-- <button type="button" >+</button>-->
               <!--   <input type="hidden" name="IdInstrstate" id="IdInstrstate<?=$value_instr['IDNST']?>" value="<?=$value_instr['IdState']?>">
                  
                <div class="templatemo_form">
                  <input type="date" id="DTInstEdit" value="<?=date("Y-m-d")?>">
                </div>
                <div class="templatemo_form">
                  <select class="templatemo_form form-control" name="StateId<?=$value_instr['IDNST']?>" id="StateId<?=$value_instr['IDNST']?>">
                    <option value="1">В работе</option>
                    <option value="2">В ремонт</option>
                    <option value="3">Списать</option>
                  </select>
                </div>
                <div class="templatemo_form">
                    <textarea class="templatemo_form form-control" placeholder="Примечание"></textarea>
                </div>-->

<div class="d-table">

  <div class="d-tr">
    <div class="d-th" style="width: 160px;">Дата Поломки</div>
    <div class="d-th" style="width: 160px;">Поломка</div>
    <div class="d-th" style="width: 160px;">Причина поломки</div>
    <div class="d-th" style="width: 160px;">Стоимость ремонта</div>
    <div class="d-th" style="width: 160px;">Примечание</div>
  </div>
  <?php
  $sql_select_instr = "SELECT * FROM recinstrument WHERE IdInstrument = '".$value_instr['IDNST']."'";
  $resutl_instr = $connectionPDO -> query($sql_select_instr);
 // $id_mater = 1;
 foreach ($resutl_instr as $keyinstr => $valueinstr) {

  ?>
  <div class="d-tr">
    <div class="d-td" style="width: 160px;"><?=$valueinstr['DatV']?></div>
    <div class="d-td" style="width: 160px;"><?=$valueinstr['polom']?></div>
    <div class="d-td" style="width: 160px;"><?=$valueinstr['prich']?></div>
    <div class="d-td" style="width: 160px;"><?=$valueinstr['summ']?></div>
    <div class="d-td" style="width: 160px;"><?=$valueinstr['txt']?></div>

 </div>
 <?php 
    }
 ?>
</div>
<div class="d-table">
  <!--Дубликат для добавления-->
 <div class="fvrduplicateTabInst<?=$value_instr['IDNST']?>">

 <div class="d-tr">  
    <div class="d-td" style="width: 165px;"><input class="inp" type="date" id="datInst<?=$value_instr['IDNST']?>" name="datInst<?=$value_instr['IDNST']?>[]" value="<?=date('Y-m-d')?>"></div>
    <div class="d-td" style="width: 165px;">
    <input class="inp" type="text" id="polomInst<?=$value_instr['IDNST']?>" name="polomInst<?=$value_instr['IDNST']?>[]" placeholder="Поломка" ></div>
    <div class="d-td" style="width: 165px;"><input class="inp" type="text" id="prichInst<?=$value_instr['IDNST']?>" name="prichInst<?=$value_instr['IDNST']?>[]" placeholder="Причина поломки">
    </div>
    <div class="d-td" style="width: 165px;"><input class="inp" type="text" id="summremInst<?=$value_instr['IDNST']?>" name="summremInst<?=$value_instr['IDNST']?>[]" placeholder="Сумма ремонта">
    </div>
    <div class="d-td" style="width: 165px;"><input class="inp" type="text" id="comentInst<?=$value_instr['IDNST']?>" name="comentInst<?=$value_instr['IDNST']?>[]" placeholder="Примечание">
    </div>
    <div style="position: absolute; padding-top: 0px;">
        <span class="input-group-btn">
      <button class="btn btn-success btn-add_TabInst<?=$value_instr['IDNST']?>" type="button">
       <span class="glyphicon glyphicon-plus"></span>
       </button>
        </span>
        </div>

</div>
</div>
</div>
                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" name="EditInst" id="EditInst<?=$value_instr['IDNST']?>">Добавить</button>
                </div>
             </form>
            </div>
            <div class="modal-footer templatemo_form">
            </div>
          </div>

        </div>   
       </div>
     </div>

          <script type="text/javascript">
            
            $("#EditInst<?=$value_instr['IDNST']?>").click(function(){

  var EditInst = $("#EditInst<?=$value_instr['IDNST']?>").val();
  //var StateId = $("#StateId<?=$value_instr['IDNST']?>").val();
  var IdInstr = $("#IdInstr<?=$value_instr['IDNST']?>").val();

    var datInst = $("input[name='datInst<?=$value_instr['IDNST']?>[]']").map(function(){return $(this).val();}).get();
    var polomInst = $("input[name='polomInst<?=$value_instr['IDNST']?>[]']").map(function(){return $(this).val();}).get();
    var prichInst = $("input[name='prichInst<?=$value_instr['IDNST']?>[]']").map(function(){return $(this).val();}).get();
    var summremInst = $("input[name='summremInst<?=$value_instr['IDNST']?>[]']").map(function(){return $(this).val();}).get();
    var comentInst = $("input[name='comentInst<?=$value_instr['IDNST']?>[]']").map(function(){return $(this).val();}).get();

  //alert(IdInstr);
  $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{EditInst, IdInstr,datInst,polomInst,prichInst,summremInst,comentInst},
        dataType: 'html',
        success:
      function(html){
            $("#inst").html(html);
        }
    });

     $('#FormModalEditInstr<?=$value_instr['IDNST']?>').modal('hide');

  
});


$(function()
{
    $(document).ready(function(){
        var fvrhtmlclone = '<div class="fvrclonnedTabInst<?=$value_instr['IDNST']?>">'+$(".fvrduplicateTabInst<?=$value_instr['IDNST']?>").html()+'</div>';
        $( ".fvrduplicateTabInst<?=$value_instr['IDNST']?>" ).html(fvrhtmlclone);
        $( ".fvrduplicateTabInst<?=$value_instr['IDNST']?>" ).after('<div class="fvrcloneTabInst<?=$value_instr['IDNST']?>"></div>');

        $(document).on('click', '.btn-add_TabInst<?=$value_instr['IDNST']?>', function(e)
        {
            e.preventDefault();
    
            $( ".fvrcloneTabInst<?=$value_instr['IDNST']?>" ).append(fvrhtmlclone);
                  $(this).removeClass('btn-add_TabInst<?=$value_instr['IDNST']?>').addClass('btn-remove_TabInst<?=$value_instr['IDNST']?>')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
            
        }).on('click', '.btn-remove_TabInst<?=$value_instr['IDNST']?>', function(e)
        {
            $(this).parents('.fvrclonnedTabInst<?=$value_instr['IDNST']?>').remove();
    
        e.preventDefault();
        return false;
      });

    });

        
  function showValues() {
    var fields = $( ":input" ).serializeArray();
    $( "#results" ).empty();
    jQuery.each( fields, function( i, field ) {
      $( "#results" ).append( field.value + " " );
    });
  }    
    
    $( "forms" ).submit(function( event ) {
      showValues();
      console.log( $( this ).serializeArray() );
      event.preventDefault();
    });    

});




          </script>



<?php

switch ($value_instr['IdState']) {
  case 1:
  ?>

  <!-- Списание \ ремонт инструмента-->

<div class="modal" id="FormModalEditInstrDel<?=$value_instr['IDNST']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content templatemo_form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
            <?=$value_instr['Name'].' '.$value_instr['Model'].' '.$value_instr['SN']?>
            </h4>
      </div>                   
            <form role="forms" method="POST">
            <div class="modal-body">

              <input type="hidden" name="IdInstr" id="IdInstr<?=$value_instr['IDNST']?>" value="<?=$value_instr['IDNST']?>">                          
                <input type="hidden" name="idRI" id="idRI<?=$value_instr['IDNST']?>" value="<?=$valInst['idRI']?>">
                                  
                  <div class="d-table" style="margin-left: 3px;">

                    <div class="d-tr">
                      <div class="d-th" style="width: 160px;">Дата Поломки</div>
                      <div class="d-th" style="width: 160px;">Поломка</div>
                      <div class="d-th" style="width: 160px;">Причина поломки</div>
                      <div class="d-th" style="width: 160px;">Стоимость ремонта</div>
                      <div class="d-th" style="width: 160px;">Примечание</div>
                    </div>
                          <?php
                          $sql_select_instr = "SELECT * FROM recinstrument WHERE IdInstrument = '".$value_instr['IDNST']."'";
                          $resutl_instr = $connectionPDO -> query($sql_select_instr);
                         // $id_mater = 1;
                         foreach ($resutl_instr as $keyinstr => $valueinstr) {

                          ?>
                          <div class="d-tr">
                            <div class="d-td" style="width: 160px;"><?=$valueinstr['DatV']?></div>
                            <div class="d-td" style="width: 160px;"><?=$valueinstr['polom']?></div>
                            <div class="d-td" style="width: 160px;"><?=$valueinstr['prich']?></div>
                            <div class="d-td" style="width: 160px;"><?=$valueinstr['summ']?></div>
                            <div class="d-td" style="width: 160px;"><?=$valueinstr['txt']?></div>

                         </div>
                         <?php 
                            }
                         ?>
                  </div>           
         
          </div>

    
          
        <div class="modal-footer">
          <div class="templatemo_form">
                  <select class="templatemo_form form-control" name="StateInstEditVz" id="StateInstEditVz<?=$value_instr['IDNST']?>">
                    <option value="2">Ремонт</option>
                    <option value="3">Списать</option>
                  </select>
                </div>

                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" id='EditInstVz<?=$value_instr['IDNST']?>' name="EditInstVz" data-dismiss="modal">Изменить</button>
                </div>
        </div>
        </form>
    </div>
  </div>
</div>

          <script type="text/javascript">
            
            $("#EditInstVz<?=$value_instr['IDNST']?>").click(function(){

  var EditInstVz = $("#EditInstVz<?=$value_instr['IDNST']?>").val();
  var StateInstEditVz = $("#StateInstEditVz<?=$value_instr['IDNST']?>").val();
  var IdInstr = $("#IdInstr<?=$value_instr['IDNST']?>").val();
 // var idRI = $("#idRI<?=$value_instr['IDNST']?>").val();


    
   // alert('Переназначаем');
   $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{ 'EditInstVz':EditInstVz,'StateInstEditVz':StateInstEditVz,'IdInstr':IdInstr},
        dataType: 'html',
        success:
      function(html){
            $("#inst").html(html);
        }
    });

    // $('#FormModalEditInstr<?=$value_instr['IDNST']?>').modal('hide');

  
});
  </script>
  
  <?php

    break;
  case 2:
?>
<!-- Возврат инструмента-->

             <div class="modal" id="FormModalEditInstrDel<?=$value_instr['IDNST']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
    <div class="modal-content templatemo_form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
            <?=$value_instr['Name'].' '.$value_instr['Model'].' '.$value_instr['SN']?>
            </h4>
      </div>                   
            <form role="forms" method="POST">
            <div class="modal-body">
                                        
                <input type="hidden" name="idRI" id="idRI<?=$value_instr['IDNST']?>" value="<?=$valInst['idRI']?>">
                                  
                  <div class="d-table" style="margin-left: 3px; padding-bottom: 0px;">

                    <div class="d-tr">
                      <div class="d-th" style="width: 160px;">Дата Поломки</div>
                      <div class="d-th" style="width: 160px;">Поломка</div>
                      <div class="d-th" style="width: 160px;">Причина поломки</div>
                      <div class="d-th" style="width: 160px;">Стоимость ремонта</div>
                      <div class="d-th" style="width: 160px;">Примечание</div>
                    </div>
                        <?php
                        $sql_select_instr = "SELECT * FROM recinstrument WHERE IdInstrument = '".$value_instr['IDNST']."'";
                        $resutl_instr = $connectionPDO -> query($sql_select_instr);
                       // $id_mater = 1;
                       foreach ($resutl_instr as $keyinstr => $valueinstr) {

                        ?>
                        <div class="d-tr">
                          <div class="d-td" style="width: 160px;"><?=$valueinstr['DatV']?></div>
                          <div class="d-td" style="width: 160px;"><?=$valueinstr['polom']?></div>
                          <div class="d-td" style="width: 160px;"><?=$valueinstr['prich']?></div>
                          <div class="d-td" style="width: 160px;"><?=$valueinstr['summ']?></div>
                          <div class="d-td" style="width: 160px;"><?=$valueinstr['txt']?></div>

                       </div>
                       <?php 
                          }
                       ?>
                  </div>           
         
          </div>

    
          
        <div class="modal-footer">
          <div class="templatemo_form">
                  <select class="templatemo_form form-control" name="StateInstEditVz" id="StateInstEditVz<?=$value_instr['IDNST']?>">
                    <option value="1">Исправен</option>
                    <option value="3">Списать</option>
                  </select>
                </div>

                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" id='EditInstVz<?=$value_instr['IDNST']?>' name="EditInstVz" data-dismiss="modal" >Изменить</button>
                </div>
        </div>
        </form>
    </div>
  </div>

          <script type="text/javascript">
            
            $("#EditInstVz<?=$value_instr['IDNST']?>").click(function(){

   var EditInstVz = $("#EditInstVz<?=$value_instr['IDNST']?>").val();
  var StateInstEditVz = $("#StateInstEditVz<?=$value_instr['IDNST']?>").val();
  var IdInstr = $("#IdInstr<?=$value_instr['IDNST']?>").val();
 // var idRI = $("#idRI<?=$value_instr['IDNST']?>").val();


    
   // alert('Переназначаем');
   $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{ 'EditInstVz':EditInstVz,'StateInstEditVz':StateInstEditVz,'IdInstr':IdInstr},
        dataType: 'html',
        success:
      function(html){
            $("#inst").html(html);
        }
    });

     //$('#FormModalEditInstr<?=$value_instr['IDNST']?>').modal('hide');

  
});


          </script>

   
<?php
    break;   
    case 3: 
    ?>
    <!-- Списанный инструмента-->

             <div class="modal" id="FormModalEditInstrDel<?=$value_instr['IDNST']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog">
    <div class="modal-content templatemo_form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
            <?=$value_instr['Name'].' '.$value_instr['Model'].' '.$value_instr['SN']?>
            </h4>
      </div>                   
            <form role="forms" method="POST">
            <div class="modal-body">
                                        
                <input type="hidden" name="idRI" id="idRI<?=$value_instr['IDNST']?>" value="<?=$valInst['idRI']?>">
                                  
                  <div class="d-table" style="margin-left: 3px;">

                    <div class="d-tr">
                      <div class="d-th" style="width: 160px;">Дата Поломки</div>
                      <div class="d-th" style="width: 160px;">Поломка</div>
                      <div class="d-th" style="width: 160px;">Причина поломки</div>
                      <div class="d-th" style="width: 160px;">Стоимость ремонта</div>
                      <div class="d-th" style="width: 160px;">Примечание</div>
                    </div>
                        <?php
                        $sql_select_instr = "SELECT * FROM recinstrument WHERE IdInstrument = '".$value_instr['IDNST']."'";
                        $resutl_instr = $connectionPDO -> query($sql_select_instr);
                       // $id_mater = 1;
                       foreach ($resutl_instr as $keyinstr => $valueinstr) {

                        ?>
                        <div class="d-tr">
                          <div class="d-td" style="width: 160px;"><?=$valueinstr['DatV']?></div>
                          <div class="d-td" style="width: 160px;"><?=$valueinstr['polom']?></div>
                          <div class="d-td" style="width: 160px;"><?=$valueinstr['prich']?></div>
                          <div class="d-td" style="width: 160px;"><?=$valueinstr['summ']?></div>
                          <div class="d-td" style="width: 160px;"><?=$valueinstr['txt']?></div>

                       </div>
                       <?php 
                          }
                       ?>
                  </div>           
         
          </div>

            
        <div class="modal-footer">

                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" id='EditInstVz<?=$value_instr['IDNST']?>' name="EditInstVz">Удалить</button>
                </div>
        </div>
        </form>
    </div>
  </div>

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
            $("#inst").html(html);
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
            $("#inst").html(html);
        }
    });

     $('#FormModalEditInstr<?=$value_instr['IDNST']?>').modal('hide');

  
});


          </script>



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