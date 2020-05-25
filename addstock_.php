

       <style type="text/css">
         .modal-content {
  font-family: Tahoma, Arial; 
  padding: 0px; 
  margin: 0px; 
  color: #e7e7e7;
  background: #393e42;
  font-size: 12px;
}
       </style>
  
       	

<?php

//if (isset($_POST['tab']) OR  !$_POST OR isset($_POST['mount']) ) {

?>        
<div class="templatemo_form">
  <div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addstock">Добавить работы</button>
  </div>
</div>
<div class="templatemo_form">
  <div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addmater">Материал</button>
  </div>
</div>
       

<div class="col-md-3 col-sm-12 col-lg-12" >

<table class="table table-responsive">
    <thead>
        <tr><th width="20"></th><th width="20">Дата</th><th>Объект</th><th colspan="<?=count_span()?>">Виды работ</th></tr>

    </thead>
   
              <?php

        $sql_select_project = "SELECT DAY(st.dataNach) AS day_prj, COUNT(st.dataNach) AS kols, st.dataNach, st.name AS name_prj, st.id  AS sid  
        FROM stock AS st
        GROUP BY dataNach";
        $resutl_project = $connectionPDO -> query($sql_select_project) or die('Ошибка при выполнении запроса выборки');

        foreach ($resutl_project as $key_project => $value_project) {
         ?>
<tbody>

      <?php
        if ($value_project['kols'] > 1) {
     
      
      ?> 
        <tr>
            <td><i class="element<?=$key_project?> fa fa-plus clickable" data-toggle="collapse" data-target="#group-of-rows-<?=$value_project['sid']?>" aria-expanded="false" aria-controls="group-of-rows-2" aria-hidden="true" onclick='$(".element<?=$key_project?>").toggleClass("fa fa-plus fa fa-minus");'></i></td>

       <?php
       } else {
        ?>

           <tr class="">
            <td><i class="" aria-hidden="true"></i></td>

        <?php

       }

       ?>     


            <td data-toggle="modal" data-target="#editproject<?=$value_project['sid']?>"><?=$value_project['day_prj']?></td>
            <td data-toggle="modal" data-target="#editproject<?=$value_project['sid']?>"><?=$value_project['name_prj']?></td>
            <?php
            $sql_select_work = "SELECT * FROM recstok WHERE idStok = ".$value_project['sid']."";
        $resutl_work = $connectionPDO -> query($sql_select_work) or die('Ошибка при выполнении запроса выборки');
          foreach ($resutl_work as $key_work => $value_work) {
            ?>
            <td data-toggle="modal" data-target="#editproject<?=$value_project['sid']?>"><?=$value_work['nameStok']?></td>

            <?php
          }
          $projectedit1[]['id'] = $value_project['sid'];
            ?>


        </tr>
    </tbody>
    <?php
    
   // if (condition) {
      # code...
    
    ?>

            <tbody id="group-of-rows-<?=$value_project['sid']?>" class="collapse"> 
              <?php

              

               $sql_select_project2 = "SELECT DAY(dataNach) AS dnachs, name , id FROM stock WHERE dataNach = '".$value_project['dataNach']."' AND id != '".$value_project['sid']."' ";
        $resutl_project2 = $connectionPDO -> query($sql_select_project2) or die('Ошибка при выполнении запроса выборки');
              foreach ($resutl_project2 as $key_project2 => $value_project2) {
            
              ?>
             
        <tr>
            <td></td>
            <td data-toggle="modal" data-target="#editproject<?=$value_project2['id']?>"><?=$value_project2['dnachs']?></td>
            <td data-toggle="modal" data-target="#editproject<?=$value_project2['id']?>"><?=$value_project2['name']?></td>
            <?php

    $sql_select_work2 = "SELECT * FROM recstok WHERE idStok = ".$value_project2['id']."";
        $resutl_work2 = $connectionPDO -> query($sql_select_work2) or die('Ошибка при выполнении запроса выборки');
          foreach ($resutl_work2 as $key_work2 => $value_work2) {
            ?>
            <td><?=$value_work2['nameStok']?></td>
            <?php
          }

          $projectedit2[]['id'] = $value_project2['id'];
            ?>
        </tr>

         <?php
          }
          ?>
        

              </tbody> 


             
            </div>
        </div>
              
          <?php
       //  }
        }



        ?>

 

    
</table>

<?php
  foreach ($projectedit1 as $keyprojectedit1 => $valueprojectedit1) {

    $sql_projectedit1 = "SELECT * FROM stock WHERE id = '".$valueprojectedit1['id']."' ";
    $resutl_projectedit1 = $connectionPDO -> query($sql_projectedit1) or die('');
    
    $itog = $resutl_projectedit1 -> fetch();

    //echo $resutl_projectedit['name'];
?>
 
  <div id="editproject<?=$valueprojectedit1['id']?>" class="modal" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
              <?=$itog['name']?>
            </h4>
      </div>
      <div class="modal-body">

                       <div class="col-sx-2 col-md-2 col-lg-2">
      <div class="templatemo_form">
                  <button type="button" class="btn chevron" id="left_mount" data-toggle="modal" data-target="#addmater" >+</button>
                </div>
              </div>

               <div class="col-sx-10 col-md-10 col-lg-10" >
      <div class="templatemo_form">
                  <input name="" type="text" class="form-control" id="fullname" placeholder="Поиск" maxlength="40" multiple>
                </div>
    </div>



        <div class="col-sx-12 col-md-12 col-lg-12" style="margin-left: -30px">
        <table id="classTable" class="table table-bordered">
          <thead>
            <tr>
              <th>№</th>
              <th>Дата</th>
              <th>Наименование</th>
              <th>Е.Изм.</th>
              <th>Кол-во</th>
              <th>Стоимость</th>
              <th>Файл</th>
              <th>Примечание </th>
            </tr>
          </thead>
          <tbody>
             <th>1</th>
              <th>Дата поступления</th>
              <th>Наименование</th>
              <th>Ед.изм.</th>
              <th>100</th>
              <th>Стоимость</th>
              <th>Файл</th>
              <th>Примечание </th>
          </tbody>
        </table>
        </div>
      </div>
      <div class="modal-footer templatemo_form">
        <button type="button" class="btn btn-primary">
          Выгрузить
        </button>
      </div>
    </div>
  </div>
</div>



<?php
  }

  foreach ($projectedit2 as $keyprojectedit2 => $valueprojectedit2) {

    $sql_projectedit2 = "SELECT * FROM stock WHERE id = '".$valueprojectedit2['id']."' ";
    $resutl_projectedit2 = $connectionPDO -> query($sql_projectedit2) or die('');
    
    $itog = $resutl_projectedit2 -> fetch();

    //echo $resutl_projectedit['name'];
?>
 
  <div id="editproject<?=$valueprojectedit2['id']?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content templatemo_form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
              <?=$itog['name']?>
            </h4>
      </div>

      <div class="modal-body templatemo_form">
      <div class="col-sx-12 col-md-12 col-lg-12" >
      <div class="templatemo_form">
      <input name="" type="text" class="form-control" id="fullname" placeholder="Поиск" maxlength="40" multiple>
       </div>
    </div>
    <div class="row">
      
    </div>
        <div class="col-sx-12 col-md-12 col-lg-12" style="margin-left: -30px">
          
        <table id="classTable" class="table table-bordered">
          <thead>
            <tr>
              <th>№ п/п</th>
              <th>Дата поступления</th>
              <th>Наименование</th>
              <th>Е.Изм.</th>
              <th>Кол-во</th>
              <th>Стоимость</th>
              <th>Файл</th>
              <th>Примечание </th>
            </tr>
          </thead>
          <tbody>
             <th>1</th>
              <th>2019-01-20</th>
              <th>Наименование</th>
              <th>Ед.изм.</th>
              <th>100</th>
              <th>Стоимость</th>
              <th>Файл</th>
              <th>Примечание </th>
          </tbody>
        </table>
      </div>
      </div>
      <div class="modal-footer templatemo_form">
        <button type="button" class="btn btn-primary" >
          Выгрузить
        </button>
      </div>
    </div>
  </div>
</div>



<?php
  }

?>
      <div class="modal" id='addstock' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
                
            <!--<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->

             <div class="modal-body">
          
            <div class="col-sx-12 col-md-12 col-lg-12">
              <form role="formstock" method="POST">
                   <div class="col-md-12 col-lg-12">        
                <div class="templatemo_form">
               
                  <select  id="addstockwork" class="form-control"> 
                    <?php
                    $sql_select_objectlis = "SELECT s.id AS sid, s.name AS sname  FROM stock AS s ";
          $result_select_objectlis = $connectionPDO -> query($sql_select_objectlis );
          foreach ($result_select_objectlis as $keyobjectlis => $valueobjectlis) {
            # code...
          
                    ?>
                    <option value="<?=$valueobjectlis['sid']?>"><?=$valueobjectlis['sname']?></option>
                    <?php
            }
                    ?>
                 </select>
            
            </div>
          </div>
<div class="col-sx-12 col-md-12 col-lg-12">
                   <div class="templatemo_form">
                  <input type="date" id="adddatstock" placeholder="" value="<?=date('Y-m-d')?>">
                </div>
                
               </div>

               <div class="col-sx-12 col-md-12 col-lg-12">
                   <div class="templatemo_form">
                  <input type="text" class="form-control" id="worksstock" name="worksstock" placeholder="Виды работ">
                </div>
                
               </div>
              <!--  <div class="fvrduplicate3">
                 <div class="col-sx-11 col-md-11 col-lg-11">
                <div class="templatemo_form">
                  
                  
        <input type="text" class="form-control" id="workdata" name="workdata" placeholder="Виды работ">
  </div> 
           </div>         

                    <div class="col-sx-1 col-md-1 col-lg-1" style="margin-top: 10px; margin-left: -20px;"> 
                  <span class="input-group-btn">
                            <button class="btn btn-success btn-add3" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
            </div>
                    
            </div>-->
          
          <div class="col-sx-12 col-md-12 col-lg-12">
                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" id="newstock" data-dismiss="modal">Добавить</button>
                </div>
              </div>
   
            </div>
          </form>

                   
            </div>
        </div>
</div>
</div>

     <script type="text/javascript">

        $("#newstock").click(function(){


  var newstock = $("#newstock").val();
  var worksstock = $("#worksstock").val();
  var adddatstock = $("#adddatstock").val();
  var addstockwork = $("#addstockwork").val();
 

 //alert(worksstock);
 /*var add_dat_work = ("#add_dat_work").val();*/
   
  
$.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{'newstock' : newstock, 'worksstock' : worksstock,'adddatstock':adddatstock,'addstockwork':addstockwork},
        dataType:'html',
        success:
      function(html){
            $("#stock").html(html);
        }
    });

 //$("#addworks").modal('hide');
 alert('Запись успешно добавлена!');
});

      </script>


<script type="text/javascript">
$(function()
{
    $(document).ready(function(){
        var fvrhtmlclone3 = '<div class="fvrclonned3">'+$(".fvrduplicate3").html()+'</div>';
        $( ".fvrduplicate3" ).html(fvrhtmlclone3);
        $( ".fvrduplicate3" ).after('<div class="fvrclone3"></div>');

        $(document).on('click', '.btn-add3', function(e)
        {
            e.preventDefault();
    
            $( ".fvrclone3" ).append(fvrhtmlclone3);
                  $(this).removeClass('btn-add3').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
            
        }).on('click', '.btn-remove', function(e)
        {
            $(this).parents('.fvrclonned3').remove();
    
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
    
    $( "formstock" ).submit(function( event ) {
      showValues();
      console.log( $( this ).serializeArray() );
      event.preventDefault();
    });    

});
</script>