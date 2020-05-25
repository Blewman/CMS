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
          
            
              <form role="forms" method="POST">
                <div class="col-xs-12 col-md-5 col-lg-12">
                    <div class="templatemo_form">
                    	<input type="text" id="NameInstAdd" placeholder="Наименование">
                    </div>
                    <div class="templatemo_form">
                    	<input type="text" id="ModelInstAdd" placeholder="Модель">
                    </div>
                    <div class="templatemo_form">
                    	<input type="text" id="SNInstAdd" placeholder="Серийный номер">
                    </div>
                    <div class="templatemo_form">
                    	<input type="date" id="DatInstAdd" placeholder="" value="<?=date('Y-m-d')?>">
                    </div>
                    <div class="templatemo_form">
                      <input type="text" id="SummInstAdd" placeholder="Цена">
                    </div>
                    <div class="templatemo_form">
                      <button type="button" class="btn btn-primary" id="AddInst" data-dismiss="modal">Сохранить</button>
                    </div>
   
            </div>
          </form>
      			</div>
  			</div>
  		</div>
     </div>



<!-- Выдача инструмента -->

      <!--   <div class="modal" id='feedbackFormModalEditInstr' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
         	      <form role="forms" method="POST">
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
                  <button type="submit" class="btn btn-primary" name="AddInstr">Сохранить</button>
                </div>
   
            </div>
          </form>
      			</div>
  			</div>
  		</div>
     </div>-->

  <script type="text/javascript">

        $("#AddInst").click(function(){


  var AddInst = $("#AddInst").val();
  var NameInstAdd = $("#NameInstAdd").val();
  var ModelInstAdd = $("#ModelInstAdd").val();
  var DatInstAdd = $("#DatInstAdd").val();
  var SNInstAdd = $("#SNInstAdd").val();
  var SummInstAdd = $("#SummInstAdd").val();

 //alert(idinstr);
 /*var add_dat_work = ("#add_dat_work").val();*/
   
  
$.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{AddInst, NameInstAdd, ModelInstAdd, DatInstAdd, SNInstAdd,SummInstAdd},
        dataType:'html',
        success:
      function(html){
            $("#inst").html(html);
        }
    });

});

      </script>




   
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