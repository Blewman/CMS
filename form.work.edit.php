<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');

?>

<div class="modal fade" id="addworks" tabindex="-1000" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content templatemo_form">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">Добавление работ</h4>
      </div> 
<div class="modal-body">
    <form id="form" method="POST">
      <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="templatemo_form">
          <select  id="addobjectwork" class="form-control"> 
          <?php
            $sql_select_objectlis = "SELECT s.id AS sid, s.name AS sname  FROM stock AS s ";
             $result_select_objectlis = $connectionPDO -> query($sql_select_objectlis );
               foreach ($result_select_objectlis as $keyobjectlis => $valueobjectlis) {
                   
                    ?>
                    <option value="<?=$valueobjectlis['sid']?>"><?=$valueobjectlis['sname']?></option>
                    <?php
                }
                    ?>
            </select>
        </div>
      </div>
            <div class="col-xs-6 col-md-6 col-lg-6">    
                <div class="templatemo_form">
                  <input type="date" id="add_dat_work" value="<?=date('Y-m-d')?>">
                </div>
              </div>
            <div class="col-xs-3 col-md-3 col-lg-3">    
                <div class="templatemo_form">
                  <input type="time" id="add_timeN_work" placeholder="" value="07:00">
                </div>
              </div>
            <div class="col-xs-3 col-md-3 col-lg-3">    
                <div class="templatemo_form">
                  <input type="time" id="add_timeK_work" placeholder="" value="18:00">
                </div>
              </div>     
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="templatemo_form">
                  <input type="text" id="add_mesto_work" placeholder="Место" required>
                </div>
            </div>

            <div class="col-xs-12 col-md-12 col-lg-12 my_templatemo_form">

            
            </div>

            <div class="col-xs-12 col-md-12 col-lg-12">    
                <div class="templatemo_form">

                    <select id="banks_select" class="input-group-addon" style="width: 100%;" onchange="sel_bnk($('option:selected',this))">
                    <option></option>
                    <?php
                      $sql_select_users = "SELECT id, fio FROM users WHERE role = 3";
                      $result_users = $connectionPDO ->query($sql_select_users);
                      foreach ($result_users as $key_users => $value_users) {
                      
                    ?>

                    <option value="<?=$value_users['id']?>"><?=$value_users['fio']?></option>
                    <?php
                      }
                    ?>
                    </select>
               </div>
            </div>


            <div class="textarea col-xs-12 col-sm-12 col-md-12 col-lg-12"  id="_tags"></div>   

             <input type="hidden" id="_id" name="_id" class="form-control" value="">

            <div class="col-xs-12 col-md-12 col-lg-12">    
                <div class="templatemo_form">
                  <textarea col ="2" class="form-control" id="add_name_work">Наименование работ</textarea>
                </div>
              </div>
            <div class="col-xs-12 col-md-12 col-lg-12">    
                <div class="templatemo_form">

                    <select id="instr_select" class="input-group-addon" style="width: 100%;" onchange="sel_instr($('option:selected',this))">
                    <option></option>
                    <?php
                      $sql_select_instrument = "SELECT id, name, Model FROM instrument";
                      $result_instrument = $connectionPDO ->query($sql_select_instrument);
                      foreach ($result_instrument as $key_instrument => $value_instrument) {
                      
                      
                    ?>

                    <option value="<?=$value_instrument['id']?>"><?=$value_instrument['name'].' - '.$value_instrument['Model']?></option>
                    <?php
                      }
                    ?>
                    </select>
               </div>
            </div>


            <div class="textarea col-xs-12 col-sm-12 col-md-12 col-lg-12"  id="_tagsinstr"></div>   

             <input type="hidden" id="_idinstr" name="_idinstr" class="form-control" value="">


            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="templatemo_form">
                  <input type="text" id="add_work_norm" placeholder="Норма" required>
                </div>
            </div> 
                        <div class="col-xs-12 col-md-12 col-lg-12">    
                <div class="templatemo_form">
                  <input type="text" id="add_works_comment" placeholder="Примечание" >
                </div>
              </div>
            <div class="col-xs-12 col-md-12 col-lg-12">    
                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" id="newwork" data-dismiss="modal">Добавить</button>
                </div>
              </div>  
   
           </form>
         </div>
         <div class="modal-footer">
         </div>
      </div>
  </div>
</div>





<script>
function sel_bnk(bnk) {
var id = bnk.val();
var name = bnk.text();
if($("#_tags span#tag_" + id).length == 0 && id != '') {
$("#_tags").append("<span class='label my_label' id='tag_" + id + "'>" + name + " &nbsp;<a href onclick='remove_tag(" + id + ",event)'>x</a></span>");
$('form#form input#_id').val($('form#form input#_id').val() + id + ',');
}
}
 
function remove_tag(id,event) {
event.preventDefault();
$("#_tags #tag_" + id).remove();
var string = $("input#_id").val();
$("input#_id").val(string.replace(id + ",", ""));
return false;
}
 </script>

 <script>
function sel_instr(bnk) {
var id = bnk.val();
var name = bnk.text();
if($("#_tagsinstr span#tag_" + id).length == 0 && id != '') {
$("#_tagsinstr").append("<span class='label my_label' id='instrtag_" + id + "'>" + name + " &nbsp;<a href onclick='remove_taginstr(" + id + ",event)'>x</a></span>");
$('form#form input#_idinstr').val($('form#form input#_idinstr').val() + id + ',');
}
}
 
function remove_taginstr(id,event) {
event.preventDefault();
$("#_tagsinstr #instrtag_" + id).remove();
var string = $("input#_idinstr").val();
$("input#_idinstr").val(string.replace(id + ",", ""));
return false;
}
 </script>


     <script type="text/javascript">

        $("#newwork").click(function(){


  var newwork = $("#newwork").val();
  var addobjectwork = $("#addobjectwork").val();
  var add_dat_work = $("#add_dat_work").val();
  var add_timeN_work = $("#add_timeN_work").val();
  var add_timeK_work = $("#add_timeK_work").val();
 var add_mesto_work = $("#add_mesto_work").val();
 var add_name_work = $("#add_name_work").val();
var idusers = $('#_id').val();
var idinstr = $('#_idinstr').val();
var add_work_norm = $("#add_work_norm").val();
var add_works_comment = $("#add_works_comment").val();

 //alert(idinstr);
 /*var add_dat_work = ("#add_dat_work").val();*/
   
  
$.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{'newwork' : newwork, 'addobjectwork' : addobjectwork,'add_dat_work':add_dat_work,'add_timeN_work':add_timeN_work,'add_timeK_work':add_timeK_work,'add_mesto_work':add_mesto_work,'add_name_work':add_name_work,'idusers':idusers,'idinstr':idinstr,'add_work_norm':add_work_norm,'add_works_comment':add_works_comment},
        dataType:'html',
        success:
      function(html){
            $("#work").html(html);
        }
    });

 //$("#addworks").modal('hide');
 alert('Запись успешно добавлена!');
});

      </script>