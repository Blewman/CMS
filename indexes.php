<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');
require_once('lib/export_exel.php');



  if (isset($_GET['close'])){
    //session_start();
    $_SESION = array();
    session_destroy();
    
    header('Location: index.php');
    exit;
  }


?>

<!DOCTYPE html>
  <head>
    <title>Престиж</title>
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
    <link href="css/my.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link href="css/templatemo_style.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>-->
    <link href="css/table.css" rel="stylesheet">
      
    <script src="js/jquery-1.10.2.min.js"></script> 
	<script src="js/jquery.lightbox.js"></script>
	<script src="js/templatemo_custom.js"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/main.js"></script>


  </head>
 <body>

    <div class="site-header">
    <div class="main-navigation">
      <div class="responsive_menu">
        <ul>
          <?php
   $sql_menu = "SELECT * FROM menu WHERE role = '1' ";
    $result_menu = $connectionPDO -> query($sql_menu) or die('Ошибка при выполнении запроса');
     
           foreach ($result_menu as $key => $value) {
        
  ?>  
          <li class="<?=$value['action']?> templatemo_home"><a href="<?=$name[basename];?>?id=<?=$value['kod']?>"><?=$value['lync']?></a></li>

          <?php

          }
          ?>
          <li class="templatemo_home"><a href="<?=$name[basename];?>?close">Выход</a></li>
        </ul>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
        <div class="row templatemo_gallerygap">
          <div class="col-md-12 responsive-menu">
            <a href="#" class="menu-toggle-btn">
                    <i class="fa fa-bars"></i>
                </a>
          </div> <!-- /.col-md-12 -->
                    <div class="col-md-3 col-sm-9 logotip">
                      PRESTIGE
                    </div>
          <div class="col-md-9 col-ms-6 main_menu">
            <ul>
              <?php
              $sql_menu = "SELECT * FROM menu WHERE role = '1' ";
               $result_menu = $connectionPDO -> query($sql_menu) or die('Ошибка при выполнении запроса');

              foreach ($result_menu as $key => $value) {

              ?>
              <li class="<?=$value['action']?> templatemo_home"><a href="<?=$name[basename];?>?id=<?=$value['kod']?>"><?=$value['lync']?></a></li>
              <?php

                }
              ?>
            </ul>
          </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
        </div>
        </div>
      </div> <!-- /.container -->
    </div> <!-- /.main-navigation -->
  </div> <!-- /.site-header -->


    <div id="menu-container">
              <?php
                if ($_GET['id']){

                $id_kodm = $_GET['id'];
                $sql_inc = "SELECT href FROM menu WHERE  kod = '".$id_kodm."'";
                $result_inc = $connectionPDO -> query($sql_inc) or die('Ошибка при выполнении запроса');
                $inc = $result_inc -> fetch();
                
                } else {
                    
                    $sql_inc = "SELECT href FROM menu WHERE  kod = 'default'";
                $result_inc = $connectionPDO -> query($sql_inc) or die('Ошибка при выполнении запроса');
                $inc = $result_inc -> fetch();

                }
                
                include $inc['href'];
      ?>  
  <div class="templatemo_footer">
      <div class="container">
      <div class="row">
          <div class="col-md-9 col-sm-12">
              <span>Copyright &copy; 2020 Престиж</span>
            </div>

        </div>
        </div>
    </div>
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