<div class="col-sm-12">
        <div class="row">
          <div class="col-sm-3">
                          <form role="form" method="POST" id="form">
                       <div class="templatemo_form">
                      <div class="templatemo_form"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackFormModalAddDlj">Добавить</button></div>
                      </div>
                      </div>

                
            </form>
          </div>
        </div>
  
        <div class="row">
          <div class="col-sm-12">
                      <table class="display" border="1">
               <thead>
              <tr><th>№</th><th>Должность</th></tr>
            </thead>
            <?php

      $i = 1;
foreach (Result_dlj_data() as $key => $valuedlj) {
?>
<tr data-toggle="modal" data-target="#feedbackFormModalDljEdit<?=$valuedlj['id']?>">
  <th><?=$i++?></th>
  <th><?=$valuedlj['dljName']?></th>

   <div class="modal" id="feedbackFormModalDljEdit<?=$valuedlj['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
 
           <div class="modal-body">
           
            <div class="col-md-5 col-lg-12">
              <form role="form" method="POST">
               <input type="hidden" name="itemdlj" id="itemdlj<?=$valuedlj['id']?>" value="<?=$valuedlj['id']?>">
              
                <div class="templatemo_form">
                  <input name="EditTextDlj" type="text" value="<?=$valuedlj['dljName']?>" class="form-control" id="EditTextDlj<?=$valuedlj['id']?>" placeholder="Должность" maxlength="40">

                </div>
                
                <div class="templatemo_form"><button type="button" id="EditDlj<?=$valuedlj['id']?>" class="btn btn-primary"  name="EditDlj">Изменить</button></div>
            </form>
<script>

$("#EditDlj<?=$valuedlj['id']?>").click(function(){

  var EditDlj = $("#EditDlj<?=$valuedlj['id']?>").val();
     var itemdlj = $("#itemdlj<?=$valuedlj['id']?>").val();
     var EditTextDlj = $("#EditTextDlj<?=$valuedlj['id']?>").val();
    // alert(EditTextDlj);
    
   $.ajax({
        url: 'lib/obruser.php',
        type: 'POST',
        cache: false,
        data:{ 'EditDlj':EditDlj, 'itemdlj':itemdlj,'EditTextDlj':EditTextDlj},
        dataType: 'html',
        success:
      function(html){
            $("#menu1").html(html);
        }
    });

   $('#feedbackFormModalDljEdit<?=$valuedlj['id']?>').modal('hide');
  
});



   </script>    
            
 
            </div>

        </div>
      </div>
     </div>

  <?php
//include('DljFormEdit.php');
  ?>

</tr>


<?php

}

?>
</table>
        </div>
        </div>

     