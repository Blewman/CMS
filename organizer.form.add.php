<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');

if (isset($_POST['AddPlane'])) {

  $idPlane = $_POST['idPlane'];
  $namePlanes = $_POST['namePlanes'];
  $textPlanes = $_POST['textPlanes'];
  $dataNach = $_POST['dataNach'];
  $IdUser = $_POST['idPlaneUser'];
 
 $sqlAdd_Pnames = "INSERT INTO planes (idPlane, IdUser,namePlanes, textPlanes, dataNach) 
VALUES ('$idPlane', '$IdUser ', '$namePlanes','$textPlanes','$dataNach')";
$resultPnames = $connectionPDO -> exec($sqlAdd_Pnames) or die('Ошибка при выполнении запроса');

?>
<script type="text/javascript">
  alert("Запись успешно добавленна");
</script>

<?php 
echo "<meta http-equiv='refresh' content='0'>";

}


?>

<!DOCTYPE html>
  <head>
    <title>Наш сайт</title>
    <meta name="keywords" content="" />
	<meta name="description" content="" />
    <!-- 
    Polygon Template
    https://templatemo.com/tm-400-polygon
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link href="css/templatemo_style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
      
    <script src="js/jquery-1.10.2.min.js"></script> 
	<script src="js/jquery.lightbox.js"></script>
     <script src="js/jquery-3.4.1.min.js"></script>
     <!--<script type="text/javascript" src="jquery.min.js"></script>-->
  <script src="js/main.js"></script>
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

<!--Создание нового задания-->

         <div class="modal" id='feedbackFormModalLog' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

    
           <div class="modal-body">
     
            <div class="col-md-5 col-lg-12">
              <form role="form" method="POST" action="#">
                <div class="templatemo_form">
                  <input name="namePlanes" type="text" class="form-control" id="namePlanes" placeholder="Наименование" maxlength="40">
                </div>
                 <div class="templatemo_form">
                  <select name="idPlaneUser" class="form-control" id="idPlaneUser">
                      <?php
                      $sql_IdUser = "SELECT * FROM users WHERE role = 1";
                      $result_IdUser = $connectionPDO -> query($sql_IdUser) or die('Ошибка при выполнении запроса');

                      foreach ($result_IdUser as $key => $val) {

                        if ($value['id'] == $IdUser) {
                          $select = 'selected';}
                          else{

                              $select = ''; }

                      ?>
                      <option value="<?=$val['id']?>"<?=$select?>><?=$val['fio']?></option>
                      <?php
                      
                          }
                      ?>
                    </select>
                </div>
              <div class="templatemo_form">
                   <input name="dataNach" type="date" class="form-control" id="dataNach" value="<?=date('Y-m-d')?>">
                </div>
                  <div class="templatemo_form">
                <textarea name="textPlanes" rows="10" class="form-control" id="textPlanes" placeholder="Описание"></textarea>
                </div>
                <div class="templatemo_form"><button type="submit" name="AddPlane" id="AddPlane" class="btn btn-primary">Добавить</button></div>
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