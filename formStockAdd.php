<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');

?>
<!-- Поступление инструмента -->

         <div class="modal" id='feedbackFormModalAddInstr' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                	<input type="text" name="NameInstAdd" placeholder="Наименование">
                </div>
                <div class="templatemo_form">
                	<input type="text" name="ModelInstAdd" placeholder="Модель">
                </div>
                <div class="templatemo_form">
                	<input type="text" name="SNInstAdd" placeholder="Серийный номер">
                </div>
                <div class="templatemo_form">
                	<input type="date" name="DatInstAdd" placeholder="" value="<?=date('Y-m-d')?>">
                </div>
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" name="AddInst">Сохранить</button>
                </div>
   
            </div>
          </form>
      			</div>
  			</div>
  		</div>
     </div>



<!-- Выдача инструмента -->

         <div class="modal" id='feedbackFormModalEditInstr' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                	<input type="text" name="NameInstAdd" placeholder="Наименование">
                </div>
                <div class="templatemo_form">
                	<input type="text" name="ModelInstAdd" placeholder="Модель">
                </div>
                <div class="templatemo_form">
                	<input type="text" name="SNInstAdd" placeholder="Сирийный номер">
                </div>
                <div class="templatemo_form">
                	<input type="date" name="DatInstAdd" placeholder="" value="<?=date('Y-m-d')?>">
                </div>
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" name="AddInst">Сохранить</button>
                </div>
   
            </div>
          </form>
      			</div>
  			</div>
  		</div>
     </div>




<?php
if (isset($_POST['AddInst'])) {

     $NameInstAdd = $_POST['NameInstAdd'];
   $ModelInstAdd = $_POST['ModelInstAdd'];
   $DatInstAdd = $_POST['DatInstAdd'];
   $SNInstAdd = $_POST['SNInstAdd'];

 

	SQLResultAdd("INSERT INTO instrument (Name, Model, SN, DatP,IdState) 
VALUES ('$NameInstAdd', '$ModelInstAdd ', '$SNInstAdd','$DatInstAdd','1')");
	?>
<script type="text/javascript">
  alert("Запись успешно добавленна");
</script>

<?php 
echo "<meta http-equiv='refresh' content='0'>";

	
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