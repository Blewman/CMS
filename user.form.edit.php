<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');


?>

<!DOCTYPE html>
  <head>
    <title>Изменение пользователя</title>
    <meta name="keywords" content="" />
	<meta name="description" content="" />
    <!-- 
    Polygon Template
    https://templatemo.com/tm-400-polygon
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link href="css/templatemo_style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>-->
      
   <!-- <script src="js/jquery-1.10.2.min.js"></script> 
	<script src="js/jquery.lightbox.js"></script>-->

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
  	</script>

        <style type="text/css">
      .custom {
    width: 150px !important;
    }

    .custom2 {
    width: 50% !important;
    }
    </style>

  </head>
  <body>


<!--Изменение Пользователя-->

         <div class="modal" id="feedbackFormModalUserEdit<?=$key?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-header">


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>



    
           <div class="modal-body">
           
            <div class="col-md-5 col-lg-12">
              <form role="form" method="POST" >

           <input type="hidden" name="item" value="<?=$value['UID']?>">            
              <div class="templatemo_form">
                <input name="EditUserRole" type="text" value="<?=$value['NameRole']?>" class="form-control" id="fullname" placeholder="Логин" maxlength="40">
                <?php

                  if ($value['role'] == 1){
                    $hidd = "text";
                  }else{
                    $hidd = "hidden";
                  }
                ?>
                  <!--<select name="EditUserRole" class="form-control" id="EditUserRole">
                      <?php
                      $sql_IdRole = "SELECT * FROM role";
                      $result_IdRole = $connectionPDO -> query($sql_IdRole) or die('Ошибка при выполнении запроса');

                      foreach ($result_IdRole as $key => $val) {

                      if ($value['role'] == $val['id']) {
                          $select = 'selected';}
                          else{

                              $select = ''; }

                      ?>
                      <option value="<?=$val['id']?>"<?=$select?>><?=$val['NameRole']?></option>
                      <?php
                      
                          }
                      ?>
                    </select>-->
                </div>
                <div class="templatemo_form">
                  <input name="EditUserLogin" type="<?=$hidd?>" value="<?=$value['login']?>" class="form-control" id="fullname" placeholder="Логин" maxlength="40">
                </div>
                <div class="templatemo_form">
                  <input name="EditUserPass" type="<?=$hidd?>" value="<?=$value['password']?>" class="form-control" id="fullname" placeholder="Пароль" maxlength="40">
                </div>
                <div class="templatemo_form">
                  <input name="EditUserFio" type="text" value="<?=$value['fio']?>" class="form-control" id="fullname" placeholder="ФИО" maxlength="40">

                </div>

                <div class="templatemo_form">

                   <select name="EditUserDlj" class="form-control">
                    <?php
                      $sqlSelectDlg = "SELECT * FROM dlj";
                      $resultSelectDlg = $connectionPDO->query($sqlSelectDlg);
                      foreach ($resultSelectDlg as $keyDlg => $valueDlg) {

                        if ($value['DLJID'] == $valueDlg['id']) {
                          $select = 'selected';}
                          else{

                              $select = ''; }

                       ?>
                       <option value="<?=$valueDlg['id']?>"<?=$select?>><?=$valueDlg['dljName']?></option>
                       <?php
                      }
                    ?>
                    
                  </select>
      
                </div>

                <div class="templatemo_form"><button type="submit" class="btn btn-primary" name="EditUser">Изменить</button></div>
                </form>
      
            </div>

        </div>
      </div>
     </div>


<?php




?>  
  
<!--Увольнение Пользователя-->

         <div class="modal" id="feedbackFormModalUserUVL<?=$value['UID']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-header">


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>



    
           <div class="modal-body">
           
            <div class="col-md-5 col-lg-12">
              <form role="form" method="POST">
                <input type="hidden" name="item" value="<?=$value['UID']?>">
                <div class="templatemo_form">
                  <input name="EditUserDatU" id="EditUserDatU" type="date" value="<?=date('Y-m-d')?>" class="form-control">
                  
                </div>
                <div class="templatemo_form">
                  <input name="prich_uvl" id="prich_uvl" type="text" value="" placeholder="Причина увольнения" class="form-control">
                  
                </div>
            <div class="templatemo_form">
    
                   <div class="templatemo_form"><button type="submit" class="btn btn-primary" name="UvlUser">Уволить</button></div>
             </form>
      
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