<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');

?>

     <!-- Расход материалов -->

  <div class="modal" id='feedbackFormModalEditStock<?=$valueStock['STID']?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <!--<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->

             <div class="modal-body">
          
            <div class="col-md-5 col-lg-12">
              <form role="forms" method="POST">
				<div class="templatemo_form">
                	<input type="text" name="NameStockAdd" id="NameStockAdd<?=$valueStock['STID']?>" value="<?=$valueStock['name']?>">
                  <input type="hidden" name="IdStok" id="IdStok<?=$valueStock['STID']?>" value="<?=$valueStock['STID']?>">
                </div>
                				<div class="templatemo_form">
                	<input type="text" name="" id="" value="<?=$valueStock['nameCompany']?>">
                  <input type="hidden" name="IdNameCompanyRec" value="<?=$valueStock['STID']?>">
                </div>
                <div class="templatemo_form">
                	<input type="text" name="NameRecStok" id="NameRecStok<?=$valueStock['STID']?>" placeholder="Наименование материала">
                </div>
                				<div class="templatemo_form">
                	<select name="EdIzmStockRec" id="EdIzmStockRec<?=$valueStock['STID']?>" class="form-control">
                    <?php
                    $resultEdIZM = SQLResult("SELECT id,edIzmName FROM edizm");
                    foreach ($resultEdIZM as $keyEdIZM => $valueEdIZM) {
                     
                    
                      
                    ?>
                   <option value="<?=$valueEdIZM['id']?>"><?=$valueEdIZM['edIzmName']?></option> 



                      <?}?>
                  </select>
                
                </div>
                				<div class="templatemo_form">
                	<input type="text" name="KolVoStockRec" id="KolVoStockRec<?=$valueStock['STID']?>" placeholder="Количество">
                </div>
                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" id="EditStock<?=$valueStock['STID']?>" name="EditStock">Добавить</button>
                  <button type="button" class="btn btn-primary" id="CloseStock<?=$valueStock['STID']?>" name="CloseStock">Закрыть</button>
                </div>
            </form>
            <script type="text/javascript">
              

                $("#EditStock<?=$valueStock['STID']?>").click(function(){

 
  /*var NameStockAdd = $("#NameStockAdd<?=$valueStock['STID']?>").val();
    
  
  var NameStockAdd = $("#NameStockAdd<?=$valueStock['STID']?>").val();*/

 
  var EditStock = $("#EditStock<?=$valueStock['STID']?>").val();
  var IdStok = $("#IdStok<?=$valueStock['STID']?>").val();
  var NameRecStok = $("#NameRecStok<?=$valueStock['STID']?>").val(); 
  var EdIzmStockRec = $("#EdIzmStockRec<?=$valueStock['STID']?>").val();
  var KolVoStockRec = $("#KolVoStockRec<?=$valueStock['STID']?>").val();
  // alert(EditStock+IdStok+NameRecStok+KolVoStockRec);
    
   $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{ 'EditStock':EditStock,'IdStok':IdStok,'NameRecStok':NameRecStok,'EdIzmStockRec':EdIzmStockRec,'KolVoStockRec':KolVoStockRec},
        dataType: 'html',
        success:
      function(html){
            $("#Stock").html(html);
        }
    });


$('#feedbackFormModalEditStock<?=$valueStock['STID']?>').modal('hide');

alert("Добавленно!");
  
});


$("#CloseStock<?=$valueStock['STID']?>").click(function(){

  var CloseStock = $("#CloseStock<?=$valueStock['STID']?>").val();
  var IdStok = $("#IdStok<?=$valueStock['STID']?>").val();
   //  var itemdlj = $("#itemdlj<?=$valuedlj['id']?>").val();
     //var EditTextDlj = $("#EditTextDlj<?=$valuedlj['id']?>").val();
    // alert("close");
    
   $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{ 'CloseStock':CloseStock,'IdStok':IdStok},
        dataType: 'html',
        success:
      function(html){
            $("#Stock").html(html);
        }
    });

  $('#feedbackFormModalEditStock<?=$valueStock['STID']?>').modal('hide');
});


            </script>
            </div>
        </div>
      </div>
     </div>     





   
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