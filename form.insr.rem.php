<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');

?>


<?php



?>  
<!-- Назначение инструмента-->

             <div class="modal" id="FormModalEditInstr<?=$key?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                  <input type="text" name="NameInstEdit" placeholder="Наименование" value="<?=$value['Name']?>">
                  <input type="hidden" name="IdInstr" value="<?=$value['IDNST']?>">
                </div>
                <div class="templatemo_form">
                  <input type="text" name="ModelInstEdit" placeholder="Модель" value="<?=$value['Model']?>">
                </div>
                <div class="templatemo_form">
                  <input type="text" name="SNInstEdit" placeholder="Сирийный номер" value="<?=$value['SN']?>" enabled>
                </div>
                <div class="templatemo_form">
                  <select class="templatemo_form form-control" name="IdUserInstEdit">
                    <?php

                    $resultUser = SQLResult("SELECT id,role,fio FROM users WHERE role = 3");
                    foreach ($resultUser as $key => $val) {                 
                    ?>
                    <option value="<?=$val['id']?>"><?=$val['fio']?></option>
                    <?php
                    }
                    
                    ?>
                  </select>
                </div>
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" name="EditInst">Ремонт</button>
                </div>
   
            </div>
            </div>
        </div>
          </form>

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

