<?php
function MForm($idform,$name,$exp_dat){
    $host = $GLOBALS['host'];
  $db = $GLOBALS['db'];
  $login = $GLOBALS['login'];
  $psw = $GLOBALS['psw'];


  $connectionPDO = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$login","$psw");
  
  ?>
  <style type="text/css">
    @media (min-width: 992px) {
  .modal-lg {
    width: 900px;
  }
}
  </style>


  <div id="editproject<?=$idform?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
   <div class="modal-dialog modal-lg">
    <div class="modal-content templatemo_form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
              <?=$name?>
            </h4>
      </div>

      <div class="modal-body templatemo_form">
         
<div class="row"> 
        <div class="col-xs-1 col-md-1 col-lg-1">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addmat<?=$idform?>">+</button>
        </div>
        <div class="col-xs-11 col-md-11 col-lg-11">      
              <input name="nameInput" type="text" class="form-control" id="nameInput" onkeyup="mySearch_stock()" placeholder="Поиск" maxlength="40">
         </div>  
</div>   
         <div class="row">    
<div class="col-xs-12 col-md-12 col-lg-12" style="margin-left: 15px" >
       <style>
      *{
  box-sizing: border-box;
}
.d-table{
  display: table;
  width: 100%;
  border-collapse: collapse;
}
.d-tr{
  display: table-row;
}
.d-td{
  display: table-cell;
  text-align: center;
  border: none;
  border: 1px solid #ccc;
  vertical-align: middle;
}

.d-th{
 font-weight: bold;
 display: table-cell;
  text-align: center;
  border: none;
  border: 1px solid #ccc;
  vertical-align: middle;
  border-right: 1px solid #ccc;
  color: #b2c831;
  font-size: 12px; 
  background:#3D365E;
  height: 30px; 
}

.d-tr:hover {
    background: #000702;; /* Цвет фона под ссылкой */ 
} 

    </style>
</head>
<body>

<div class="d-table" id="Mtable">

  <div class="d-tr">

    <div class="d-th">№ п/п</div>
    <div class="d-th">Дата поступления</div>
    <div class="d-th">Наименование</div>
    <div class="d-th">Е.Изм.</div>
    <div class="d-th">Кол-во</div>
    <div class="d-th">Стоимость</div>
    <div class="d-th">Файл</div>
    <div class="d-th">Примечание</div>
  </div>
  <?php
  $sql_select_mater = "SELECT * FROM recstokmater WHERE idrecstok = '".$idform."'";
  $resutl_mater = $connectionPDO -> query($sql_select_mater);
  $id_mater = 1;
  foreach ($resutl_mater as $keymater => $valuemater) {

  ?>
  <div class="d-tr">
    <div class="d-td"><?=$id_mater++?></div>
    <div class="d-td"><?=$valuemater['dat']?></div>
    <div class="d-td"><?=$valuemater['name']?></div>
    <div class="d-td"><?=$valuemater['edizm']?></div>
    <div class="d-td"><?=$valuemater['kolvo']?></div>
    <div class="d-td"><?=$valuemater['summ']?></div>
    <div class="d-td">file</div>
    <div class="d-td"><?=$valuemater['koment']?></div>
 </div>
  <?php
    }
  ?>
  </div>
      </div>
      </div>
      <div class="modal-footer templatemo_form">
        <form method="POST">

                  <button type="submit" class="btn btn-primary" name="exp_exe_mat">
                    
          Выгрузить
        </button>
  
          <input type="hidden" name="sql_exp_mat" value="<?=$sql_select_mater?>">
          <input type="hidden" name="name_exp_mat" value="<?=$name?>">
          <input type="hidden" name="dat_exp_mat" value="<?=$exp_dat?>">
          
          
        </form>

        <script type="text/javascript">
  
  /*$("#exp_exe_mat<?=$idform?>").click(function(){

   var exp_exe_mat = $("#exp_exe_mat<?=$idform?>").val();
   //  var itemdlj = $("#itemdlj<?=$valuedlj['id']?>").val();
     //var EditTextDlj = $("#EditTextDlj<?=$valuedlj['id']?>").val();
    //alert("<?=$idform?>");
    
   $.ajax({
        url: '/',
        type: 'POST',
        cache: false,
        data:{ 'exp_exe_mat':exp_exe_mat},
        dataType: 'html',
        success:
      function(html){
            //$("#stock").html(html);
        }
    });

  
});*/
</script>

    </div>
  </div>
  </div>
</div>
</div>




<?php

}
?>

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
   	
<script type="text/javascript">
  
  function mySearch_stock() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("nameInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("classTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

  function mySearch_stock2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("nameInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("classTable2");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function exc()
  {
    var table= document.getElementById("classTable2");
    var html = table.outerHTML;
    window.open('data:application/vnd.ms-excel, ' + '\uFEFF' + encodeURIComponent(html));
  }

function exce()
  {
    var table= document.getElementById("classTable");
    var html = table.outerHTML;
    window.open('data:application/vnd.ms-excel, ' + '\uFEFF' + encodeURIComponent(html));
  }  
</script>
<?php

if (!isset($_POST['select_mount_stock'])) {
  $mount_stock = date('m');
} else {
  $mount_stock;
  $year_stock;
}

if (!isset($_POST['select_year_stock'])) {
  $year_stock = date('Y');
} else {
   $year_stock;
   $mount_stock;
}


require_once('form.edit.addstock.php');

?>  
      
  <div class="col-xs-12 col-lg-3 col-sm-3 col-md-12" >
<div class="templatemo_form">

    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addstock">Добавить работы</button>
  </div>
</div>
<div class="col-lg-3 col-sm-3 col-md-12 col-xs-12">
  <div class="templatemo_form" >
   <form action="" method="POST" id="form_mount_stock">
      <select class="selectpicker" id="select_mount_stock">
        <?php
        $select_mount_name = "SELECT * FROM monthname";
        $result_mount_name = $connectionPDO->query($select_mount_name);
        foreach ($result_mount_name as $key_mount_name => $value_mount_name) { 
          if ($value_mount_name['kodMonth'] == $mount_stock) {
              $selected = "selected";
          } 
          else {
                $selected = "";
                 } 
        ?>
          <option class="btn" value="<?=$value_mount_name['kodMonth']?>" <?=$selected?>><?=$value_mount_name['NameMonth']?></option>
        <?php
          
        }
        ?>  
            }
      </select>
    </form>
  </div>
</div>


<script type="text/javascript">
  
  $("#select_mount_stock").change(function(){

   var select_mount_stock = $("#select_mount_stock").val();
   //  var itemdlj = $("#itemdlj<?=$valuedlj['id']?>").val();
     //var EditTextDlj = $("#EditTextDlj<?=$valuedlj['id']?>").val();
   // alert(select_mount_stock);
    
   $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{ 'select_mount_stock':select_mount_stock},
        dataType: 'html',
        success:
      function(html){
            $("#stock").html(html);
        }
    });

  
});


  $("#select_year_stock").change(function(){

   var select_year_stock = $("#select_year_stock").val();
   //var select_mount_stock_year = $("#select_mount_stock").val();
   //  var itemdlj = $("#itemdlj<?=$valuedlj['id']?>").val();
     //var EditTextDlj = $("#EditTextDlj<?=$valuedlj['id']?>").val();
    //alert(select_mount_stock);
    
   $.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{ 'select_year_stock':select_year_stock},
        dataType: 'html',
        success:
      function(html){
            $("#stock").html(html);
        }
    });

  
});

</script>
      

<div class="col-md-3 col-sm-12 col-lg-12" id="stockTable">

  <table class="table table-responsive">
    <thead>
        <tr><th width="20"></th><th width="20">Дата</th><th>Объект</th><th colspan="<?=count_span()?>">Виды работ</th></tr>
    </thead>
    <tbody>
      <?php
        $sql_select_project = "SELECT DAY(st.datN) AS day_prj, COUNT(st.datN) AS kols, st.datN, st.idStok AS name_prj, st.id  AS sid, s.name
        FROM recstok AS st
        INNER JOIN stock AS s
        ON st.idStok = s.id
        WHERE MONTH(datN) = '".$mount_stock."' 
        AND YEAR(datN) = '".$year_stock."'  
        GROUP BY datN
        ";
        $resutl_project = $connectionPDO -> query($sql_select_project) or die('Ошибка при выполнении запроса выборки');

        foreach ($resutl_project as $key_project => $value_project) {

         if ($value_project['kols'] > 1) {
     
      
      ?> 
        <tr>
          <td>
            <i class="element<?=$key_project?> fa fa-plus clickable" data-toggle="collapse" data-target="#group-of-rows-<?=$value_project['sid']?>" aria-expanded="false" aria-controls="group-of-rows-2" aria-hidden="true" onclick='$(".element<?=$key_project?>").toggleClass("fa fa-plus fa fa-minus");'></i>
          </td>

           <?php
           } else {
            ?>

        <tr class="">
          <td>
            <i class="" aria-hidden="true"></i>
          </td>

            <?php

           }

           ?>  
            <td>
              <?=$value_project['day_prj']?>
            </td>
            <td data-toggle="modal" data-target="#editproject<?=$value_project['sid']?>">
              <?=$value_project['name']?>


            </td>

            <?php
            MForm($value_project['sid'],$value_project['name'],$value_project['day_prj']);
             AddMForm($value_project['sid'],$value_project['name']);
              $sql_select_namestok = "SELECT * FROM namestok WHERE idrecstok = ".$value_project['sid']."";
              $resutl_namestok = $connectionPDO -> query($sql_select_namestok) or die('Ошибка при выполнении запроса выборки');
                foreach ($resutl_namestok as $key_namestok => $value_namestok) {

            ?>
            <td>
              <?=$value_namestok['name']?>
            </td>
        
              <?php
               }
              ?>
        </tr>
      </tbody>
      <tbody id="group-of-rows-<?=$value_project['sid']?>" class="collapse">
          <?php
            $sql_select_project2 = "SELECT DAY(st.datN) AS dnachs, st.idStok, st.id, s.name  
              FROM recstok AS st
              INNER JOIN stock AS s
              ON st.idStok = s.id 
              WHERE st.datN = '".$value_project['datN']."' AND st.id != '".$value_project['sid']."' ";
            $resutl_project2 = $connectionPDO -> query($sql_select_project2) or die('Ошибка при выполнении запроса выборки');
              foreach ($resutl_project2 as $key_project2 => $value_project2) {

                        ?>
             
        <tr>
          <td></td>
          <td data-toggle="modal" data-target="#editproject<?=$value_project2['idStok']?>"><?=$value_project2['dnachs']?></td>
          <?php
          ?>
          <td data-toggle="modal" data-target="#editproject<?=$value_project2['id']?>"><?=$value_project2['name']?></td>

          <?php
            
            $sql_select_namestok = "SELECT * FROM namestok WHERE idrecstok = ".$value_project2['id']."";
            $resutl_namestok = $connectionPDO -> query($sql_select_namestok) or die('Ошибка при выполнении запроса выборки');
              foreach ($resutl_namestok as $key_namestok => $value_namestok) {
            ?>
          <td><?=$value_namestok['name']?></td>
            <?php
            }
              $sql_select_work2 = "SELECT * FROM recstok WHERE idStok = ".$value_project2['id']."";
              $resutl_work2 = $connectionPDO -> query($sql_select_work2) or die('Ошибка при выполнении запроса выборки');
               foreach ($resutl_work2 as $key_work2 => $value_work2) {
            ?>
            <?php
            }
            ?>
        </tr>
         <?php
         MForm($value_project2['id'],$value_project2['name'],$value_project['day_prj']);
            AddMForm($value_project2['id'],$value_project2['name']);
          }
          ?> 
      </tbody>   

          <?php
           
           }
          ?>
  </table>


<?php

?>
 
</tr>
</tbody>
</table>
</div>



<!-- Добавляем работу -->

 <div class="modal" id='addstock' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-body">
        <div class="col-xs-12 col-md-12 col-lg-12">
          <form role="formstock" method="POST">
            <div class="col-md-12 col-lg-12">        
              <div class="templatemo_form">
                <select  id="addstockwork" class="form-control"> 
                  <?php
                    $sql_select_objectlis = "SELECT s.id AS sid, s.name AS sname  FROM stock AS s WHERE status = 0";
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
            <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="templatemo_form">
                <input type="date" id="adddatstock" placeholder="" value="<?=date('Y-m-d')?>">
              </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="templatemo_form">
                <input type="text" class="form-control" id="worksstock" name="worksstock" placeholder="Виды работ">
              </div>  
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="templatemo_form">
                <button type="button" class="btn btn-primary" id="newstock" data-dismiss="modal">Добавить</button>
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

