

    
        <script>
    function showhide()
    {
      var div = document.getElementById("newpost");
    if (div.style.display !== "none")
    {
      div.style.display = "none";
    }
    else {
      div.style.display = "block";
    }
    }



        $(document).ready(function() {
            $('#mount').on('change', function() {
                this.formMount.submit();
            });
        });

  
   function mySearch_work() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("search_work");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableWorks");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

       </script>

        <style type="text/css">


      .custom {
    width: 150px !important;
    }

    .custom2 {
    width: 150px !important;
    }

    .hiddenRow {
    padding: 0 !important;
}

tbody.collapse.in {
  display: table-row-group;
}


.selectpicker{
  float: left; 
  width: 100%;
  line-height: 34px;
  text-align: center;
  color: #ffffff;
  border-radius: 0px;
  background: #b69e40;
  border: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 600;
  margin-top: 10px;
  margin-left: -25px;

}

.chevron{
  float: left; 
  width: 100%;
  line-height: 20px;
  text-align: center;
  color: #ffffff;
  border-radius: 0px;
  background: #b69e40;
  border: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 600;
  margin-top: 10px;
  padding-left: 0px;
  margin-right: 50px;
  margin-left: -17px;

}

.entry:not(:first-of-type)
{
    margin-top: 10px;
}

.glyphicon
{
    font-size: 12px;
}

.my_templatemo_form textarea{
  float: left; 
  padding: 6px 12px; 
  height: 30px;
  border-radius: 0px; 
  background: #343536; 
  border: 1px solid #4b5257; 
  margin-top: 10px; 
  color: #cccccc;
  overflow: hidden;
}

.my_label textarea{
  background: #343536; 
  border: 2px solid #4b5257; 
  background-color: #343536;

}

    </style>

<?php

    if (isset($_POST['dcch']) OR isset($_POST['dnch']) ) {
         $dnch;
         $dcch;
    } else{

    $dcch = date('Y-m-d');
    $dnch = date('Y-m').'-01';

    }

?>
             
     
<div class="col-md-12 col-sm-12 col-lg-12">
      <div class="col-md-1 col-sm-1 col-lg-1 col-xs-2">
          <div class="templatemo_form">
              <button type="button" class="btn btn-primary" id="left_mount" data-toggle="modal" data-target="#addworks" >+</button>
          </div> 
      </div>  
      <ul class="nav nav-tabs">  
                  <div class="col-lg-1 col-sm-1 col-md-1 col-xs-2">
              <li class="nav-item">
                  <div class="templatemo_form">
                       <button class="btn btn-primary nav-link" type="button" data-toggle="tab" id="ppobjt" href="#pobjt">P</button>
                   </div>
              </li>
          </div>
          <!--<div class="col-lg-1 col-sm-1 col-md-1 col-xs-2">
              <li class="nav-item">
                  <div class="templatemo_form">
                    <button class="btn btn-primary nav-link" type="button" data-toggle="tab" href="#Oobjtablework">O</button>
                  </div>
              </li>
           </div>-->  
          <div class="col-lg-1 col-sm-1 col-md-1 col-xs-2">  
              <li class="nav-item">
                  <div class="templatemo_form">
                      <button class="btn btn-primary nav-link" type="button" data-toggle="tab"  id="mmobjt" href="#mobjt">M</button>
                  </div>
              </li>
          </div>


       </ul>
</div>


<div class="tab-content">

      <div id="pobjt" class="tab-pane active">
                  <div class="col-lg-2 col-sm-2 col-md-6 col-xs-6">  
         
                  <div class="templatemo_form">
                      <input type="date" id="dnch" value="<?=$dnch?>">
                  </div>
              
          </div>
          <div class="col-lg-2 col-sm-2 col-md-6 col-xs-6">  
             
                  <div class="templatemo_form">
                      <input type="date" id="dcch" value="<?=$dcch?>">
                  </div>

            
          </div>

          <div class="col-lg-2 col-sm-2 col-md-6 col-xs-6">  
                  <div class="templatemo_form">
                      <input type="text" id="search_work" placeholder="Наименование объекта" onkeyup="mySearch_work()">
                  </div>

          </div>
          <script type="text/javascript">

  $("#dnch").change(function(){
    var dnch = $("#dnch").val();
    var dcch = $("#dcch").val();
   
      $.ajax({
          url: 'lib/obrstoke.php',
          type: 'POST',
          cache: false,
          data:{'dnch' : dnch,'dcch' : dcch},
          dataType:'html',
          success:
            function(html){
              $("#work").html(html);
            }
      });
   // alert(dnch);
  });

  $("#dcch").change(function(){

    var dcch = $("#dcch").val();
    var dnch = $("#dnch").val();
   
      $.ajax({
          url: 'lib/obrstoke.php',
          type: 'POST',
          cache: false,
          data:{'dcch' : dcch,'dnch':dnch},
          dataType:'html',
          success:
            function(html){
              $("#work").html(html);
            }
      });
  });

  
</script>
<table class="table table-responsive" id="tableWorks">
    <thead>
      <th>№</th><th>Объект</th><th>Работы</th><th>Место</th><th>Сотрудники</th><th>Инструмент</th><th>Дата</th><th>Выполнено</th><th>Примечание</th>
    </thead>
   
<tbody>
                <?php
    $sql_select_works = "SELECT w.id AS wid, w.worksfakt, w.workscoment, w.namework, w.mesto,w.dat, w.timeN, w.timeK, w.status, w.iduserworks , s.name     
    FROM works AS w 
    INNER JOIN stock AS s 
    ON s.id = w.Idproject
    WHERE dat BETWEEN '".$dnch."' AND '".$dcch."'";
    $result_select_works = $connectionPDO -> query($sql_select_works);          
foreach ($result_select_works as $keyworks => $valueworks) {
?>
<tr>
  <td data-toggle="modal" data-target="#delworks<?=$valueworks['wid']?>"><?=$valueworks['wid']?></td>
  <td data-toggle="modal" data-target="#editworks<?=$valueworks['wid']?>"><?=$valueworks['name']?></td>
  <td data-toggle="modal" data-target="#editworks<?=$valueworks['wid']?>"><?=$valueworks['namework']?></td>
  <td data-toggle="modal" data-target="#editworks<?=$valueworks['wid']?>"><?=$valueworks['mesto']?></td>
  <td data-toggle="modal" data-target="#editworks<?=$valueworks['wid']?>"><?php        
  $sql_select_workuser = "SELECT
    u.fio
FROM
    worksuser AS wu
INNER JOIN users AS u
ON
    u.id = wu.iduser
    WHERE wu.idworks = '".$valueworks['wid']."'";
  $result_select_workuser = $connectionPDO -> query($sql_select_workuser);
 // $count_field = $result_select_workuser->rowCount();
  //$i = 1;
  foreach ($result_select_workuser as $keyworkuser => $valueworkuser) {
 // echo $i++.'.';
  echo $valueworkuser['fio'];
  echo "<br>";    
          }
        

  ?></td>
  <td data-toggle="modal" data-target="#editworks<?=$valueworks['wid']?>">
    <?php        
  $sql_select_workinstr = "SELECT
    i.id,
    i.Name,
    i.Model,
    wi.idobj,
    wi.idinstr
FROM
    worksinstr AS wi
INNER JOIN instrument AS i
ON
    i.id = wi.idinstr
WHERE
    wi.idobj = '".$valueworks['wid']."'";
  $result_select_workinstr = $connectionPDO -> query($sql_select_workinstr);
 // $count_field = $result_select_workuser->rowCount();
  //$i = 1;
  foreach ($result_select_workinstr as $keyworkinstr => $valueworkinstr) {
 // echo $i++.'.';
  echo $valueworkinstr['Name'];
  echo "<br>";    
          }
        

  ?>
  </td>
  <td  data-toggle="modal" data-target="#editworks<?=$valueworks['wid']?>"><?=$valueworks['dat']?> С <?=$valueworks['timeN']?> по <?=$valueworks['timeK']?></td>
  <td data-toggle="modal" data-target="#editworks<?=$valueworks['wid']?>"><?=$valueworks['worksfakt']?></td>
  <td data-toggle="modal" data-target="#editworks<?=$valueworks['wid']?>"><?=$valueworks['workscoment']?></td>
  
</tr>

<!-- Изменение Работы-->
  <div class="modal" id="editworks<?=$valueworks['wid']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form id="form" method="POST">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="templatemo_form">
                  <input type="hidden" id="idworkedit<?=$valueworks['wid']?>" value="<?=$valueworks['wid']?>">
                  <input type="text" id="" placeholder="" value="<?=$valueworks['name']?>">
            </div>
          </div>
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="templatemo_form">
                  <input type="text" id="edit_name_work<?=$valueworks['wid']?>" placeholder="" value="<?=$valueworks['namework']?>">
              </div>
          </div>
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="templatemo_form">
                  <input type="text" id="edit_mesto_work<?=$valueworks['wid']?>" placeholder="" value="<?=$valueworks['mesto']?>">
                </div>
          </div>
          <div class="col-xs-6 col-md-6 col-lg-6">    
              <div class="templatemo_form">
                  <input type="date" id="edit_dat_work<?=$valueworks['wid']?>" placeholder="" value="<?=$valueworks['dat']?>">
              </div>
          </div>
          <div class="col-xs-3 col-md-3 col-lg-3">    
                <div class="templatemo_form">
                  <input type="time" id="edit_timeN_work<?=$valueworks['wid']?>" placeholder="" value="<?=$valueworks['timeN']?>">
                </div>
              </div>
            <div class="col-xs-3 col-md-3 col-lg-3">    
                <div class="templatemo_form">
                  <input type="time" id="edit_timeK_work<?=$valueworks['wid']?>" placeholder="" value="<?=$valueworks['timeK']?>">
                </div>
              </div>  
              <div class="col-xs-12 col-md-12 col-lg-12">    
                <div class="templatemo_form">
                  <input type="text" id="edit_works_fakt<?=$valueworks['wid']?>" value="<?=$valueworks['worksfakt']?>">
                </div>
              </div>      
              <div class="col-xs-12 col-md-12 col-lg-12">    
                <div class="templatemo_form">
                  <input type="text" id="edit_works_comment<?=$valueworks['wid']?>" value="<?=$valueworks['workscoment']?>" >
                </div>
              </div>                  
            <div class="col-xs-12 col-md-12 col-lg-12">    
                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" id="beditwork<?=$valueworks['wid']?>" data-dismiss="modal">Изменить</button>
                </div>
              </div>  
          </form>
      </div>
    </div>  
<script type="text/javascript">
  $("#beditwork<?=$valueworks['wid']?>").click(function(){
    var beditwork = $("#beditwork<?=$valueworks['wid']?>").val();
    var idworkedit = $("#idworkedit<?=$valueworks['wid']?>").val();
    var edit_timeN_work = $("#edit_timeN_work<?=$valueworks['wid']?>").val();
    var edit_timeK_work = $("#edit_timeK_work<?=$valueworks['wid']?>").val();
    var edit_works_fakt = $("#edit_works_fakt<?=$valueworks['wid']?>").val();
    var edit_works_comment = $("#edit_works_comment<?=$valueworks['wid']?>").val();
    var edit_name_work = $("#edit_name_work<?=$valueworks['wid']?>").val();
    var edit_mesto_work = $("#edit_mesto_work<?=$valueworks['wid']?>").val();


      $.ajax({
          url: 'lib/obrstoke.php',
          type: 'POST',
          cache: false,
          data:{'beditwork' : beditwork, 'idworkedit' : idworkedit,'edit_timeN_work':edit_timeN_work,'edit_timeK_work':edit_timeK_work,'edit_works_fakt':edit_works_fakt,'edit_works_comment':edit_works_comment,'edit_name_work':edit_name_work,'edit_mesto_work':edit_mesto_work},
          dataType:'html',
          success:
            function(html){
              $("#work").html(html);
            }
      });
    alert('Запись успешно изменена!');
  });
</script> 

<!-- Удаление Работы-->
  <div class="modal" id="delworks<?=$valueworks['wid']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form id="form" method="POST">
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="templatemo_form">
                  <input type="hidden" id="iddelworkedit<?=$valueworks['wid']?>" value="<?=$valueworks['wid']?>">
                  <input type="text" id="" placeholder="" value="<?=$valueworks['name']?>">
            </div>
          </div>
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="templatemo_form">
                  <input type="text" id="" placeholder="" value="<?=$valueworks['namework']?>">
              </div>
          </div>
          <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="templatemo_form">
                  <input type="text" id="" placeholder="" value="<?=$valueworks['mesto']?>">
                </div>
          </div>
          <div class="col-xs-6 col-md-6 col-lg-6">    
              <div class="templatemo_form">
                  <input type="date" id="edit_dat_work<?=$valueworks['wid']?>" placeholder="" value="<?=$valueworks['dat']?>">
              </div>
          </div>
          <div class="col-xs-3 col-md-3 col-lg-3">    
                <div class="templatemo_form">
                  <input type="time" id="edit_timeN_work<?=$valueworks['wid']?>" placeholder="" value="<?=$valueworks['timeN']?>">
                </div>
              </div>
            <div class="col-xs-3 col-md-3 col-lg-3">    
                <div class="templatemo_form">
                  <input type="time" id="edit_timeK_work<?=$valueworks['wid']?>" placeholder="" value="<?=$valueworks['timeK']?>">
                </div>
              </div>  
              <div class="col-xs-12 col-md-12 col-lg-12">    
                <div class="templatemo_form">
                  <input type="text" id="edit_works_fakt<?=$valueworks['wid']?>" placeholder="Выполненно фактически">
                </div>
              </div>      
              <div class="col-xs-12 col-md-12 col-lg-12">    
                <div class="templatemo_form">
                  <input type="text" id="edit_works_comment<?=$valueworks['wid']?>" placeholder="Примечание" >
                </div>
              </div>                  
            <div class="col-xs-12 col-md-12 col-lg-12">    
                <div class="templatemo_form">
                  <button type="button" class="btn btn-primary" id="delwork<?=$valueworks['wid']?>" data-dismiss="modal">Удалить</button>
                </div>
              </div>  
          </form>
      </div>
    </div>  
<script type="text/javascript">
  $("#delwork<?=$valueworks['wid']?>").click(function(){
    var delwork = $("#delwork<?=$valueworks['wid']?>").val();
    var iddelworkedit = $("#iddelworkedit<?=$valueworks['wid']?>").val();
    $.ajax({
          url: 'lib/obrstoke.php',
          type: 'POST',
          cache: false,
          data:{'delwork' : delwork, 'iddelworkedit' : iddelworkedit},
          dataType:'html',
          success:
            function(html){
              $("#work").html(html);
            }
      });
    alert('Запись успешно удалена!');
  });
</script> 
                           
<?php
  }
?>
  </tbody>
</table>

</div>

      <div id="Oobjtablework" class="tab-pane">
  <?php
  $select_object_works = "SELECT * FROM works AS w 
  INNER JOIN stock AS s
  ON s.id = w.Idproject 
  GROUP BY w.Idproject";
  $result_object_works = $connectionPDO -> query($select_object_works);


?>


<table class="table table-responsive">
    <thead>
      <th>№</th><th>Объект</th><th>Работы</th>
    </thead>
   
<tbody>
  <?php
  foreach ($result_object_works as $key_object_works => $value_object_works) {
    $item_object = $key_object_works;
  ?>
  <tr>
    <td width="30"><?=$item_object+1?></td>
    <td><?=$value_object_works['name']." ".$value_object_works['address']?></td>
      <?php
        $select_works_object = "SELECT * FROM works AS w WHERE Idproject = '".$value_object_works['id']."'";
  $result_works_object = $connectionPDO -> query($select_works_object);
      ?>
    <td>
      <script type="text/javascript">
  function my_div_search(search,target) {
  var input = document.getElementById(search);
  var filter = input.value.toLowerCase();
  var nodes = document.getElementsByClassName(target);

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
    } else {
      nodes[i].style.display = "none";
    }
  }
}
</script>
      <div class="templatemo_form">
        <input type="text" id="Search<?=$value_object_works['id']?>" onkeyup="my_div_search('Search<?=$value_object_works['id']?>','target<?=$value_object_works['id']?>')" placeholder="Поиск" title="">
      </div>
        <?php
        foreach ($result_works_object as $key_works_object => $value_works_object) {
        ?>
        <div class="target<?=$value_object_works['id']?>"><?=$value_works_object['namework']?></div>
        <?php
          }
        ?>
    </td>
  </tr>
    <?php
  }
  ?>
</tbody>

</table>
</div>

    <div id="mobjt" class="tab-pane">
        <?php
          include ('workMobjtable.php');
        ?>
     </div>

  
          
    <?php
    include('form.work.edit.php');
    ?>
 

