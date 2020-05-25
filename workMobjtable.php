 <?php
$select_mount_works = "SELECT MONTH(w.dat) AS Mdat, YEAR(w.dat) AS Ydat, mn.NameMonth  FROM works AS w 
INNER JOIN monthname AS mn
ON mn.id = MONTH(w.dat)
GROUP BY Mdat";
  $result_mount_works = $connectionPDO -> query($select_mount_works);



?>

<table class="table table-responsive">
    <thead>
      <th width="30">№</th><th>Месяц</th><th>Работы</th><th>Примечание</th>
    </thead>
   
<tbody>
  <?php
 // $idformcoment = 1;
    foreach ($result_mount_works as $key_mount_works => $value_mount_works) {
    
  ?>
  <tr data-toggle="modal" data-target="#edit_mounth_work_coment<?=$value_mount_works['Mdat']?>">
    <td><?=$value_mount_works['Mdat']?></td>
    <td><?=$value_mount_works['NameMonth']?></td>
    <td>
      <?php
      $select_works_mount = "SELECT * FROM works AS w WHERE MONTH(dat) = '".$value_mount_works['Mdat']."'";
      $result_works_mount = $connectionPDO -> query($select_works_mount);
      foreach ($result_works_mount as $key_works_mount => $value_works_mount) {
        $id_work = $key_works_mount;
        ?>
        <div>
        <?php
        echo $id_work+1;
        echo ". "; 
        echo $value_works_mount['namework']." ".$value_works_mount['mesto'];
        ?>
        </div>

             
        <?php
        
      }

      $select_works_coment = "SELECT * FROM workscoment WHERE datM = '".$value_mount_works['Mdat']."' AND datY = '".$value_mount_works['Ydat']."'";
      $result_works_coment = $connectionPDO -> query($select_works_coment);
        $comments_works = $result_works_coment->fetch();

      ?>
        
    </td>
    <td>
      
    </td>
  </tr>
   <!-- Редактируем наименование проекта-->

<div class="modal" id="edit_mounth_work_coment<?=$value_mount_works['Mdat']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
                
               <div class="modal-body">
          
            <div class="col-sx-12 col-md-12 col-lg-12">
              <form id="" method="POST" enctype="multipart/form-data">
                <div class="col-sx-12 col-md-12 col-lg-12">
                <div class="templatemo_form">
                  <textarea id = "edit_coment_text<?=$value_mount_works['Mdat']?>" cols="76"><?=$comments_works['coment']?></textarea>
                    <input type="hidden" id="idworkcomentm<?=$value_mount_works['Mdat']?>" value="<?=$value_mount_works['Mdat']?>">
                    <input type="hidden" id="idworkcomenty<?=$value_mount_works['Mdat']?>" value="<?=$value_mount_works['Ydat']?>">
                </div>
            </div>
            <div class="col-sx-12 col-md-12 col-lg-12">       
                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" id="edit_coment_works<?=$value_mount_works['Mdat']?>" data-dismiss="modal">Изменить</button>
                </div>
   
            </div>
          </form>  

        </div>
      </div>
    </div>
  </div>
   <script type="text/javascript">

        $("#edit_coment_works<?=$value_mount_works['Mdat']?>").click(function(){


  var edit_coment_works = $("#edit_coment_works<?=$value_mount_works['Mdat']?>").val();
  var edit_coment_text = $("#edit_coment_text<?=$value_mount_works['Mdat']?>").val();
  var idworkcomentm = $("#idworkcomentm<?=$value_mount_works['Mdat']?>").val();
  var idworkcomenty = $("#idworkcomenty<?=$value_mount_works['Mdat']?>").val();
  
 //alert(idworkcomenty);
 /*var add_dat_work = ("#add_dat_work").val();*/
   
  
$.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{'edit_coment_works' : edit_coment_works, 'edit_coment_text' : edit_coment_text, 'idworkcomentm' : idworkcomentm, 'idworkcomenty':idworkcomenty},
        dataType:'html',
        success:
      function(html){
            $("#mobjt").html(html);
        }
    });

 alert('Запись успешно добавлена!');
});

      </script>
  <?php
 // $idformcoment++;
  }
  ?>
</tbody>

</table>
</div>

