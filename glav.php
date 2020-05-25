
      
    <!-- Bootstrap -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link href="css/templatemo_style.css" rel="stylesheet">
          
    <script src="js/jquery-1.10.2.min.js"></script> 
  <script src="js/jquery.lightbox.js"></script>
  </head>
  <body>
    <div id="menu-container">
    <!-- gallery start -->
    <div class="content homepage" id="menu-1">
    <div class="container">
      <div class="row templatemo_servicerow ">



<?php
  $sql_menu = "SELECT * FROM menu WHERE role = '1' ";
    $result_menu = $connectionPDO -> query($sql_menu) or die('Ошибка при выполнении запроса');
    foreach ($result_menu as $key => $value) {
      if ($value['kod'] != "default"){
 
    
?>
      <div class="container-fluid col-xs-offset-2 col-md-3">
            <div class="templatemo_hexservices col-sm-6">
              <div class="hexagon-a">
                  <div class="hexagon-a">
                     <a class="hlinktop" href="<?=$name[basename];?>?id=<?=$value['kod']?>">
                       <div class="hexa-a">
                          <div class="hcontainer-a">
                          <div class="vertical-align-a">
                            <span class="texts-a"><i class="<?=$value['ico']?>"></i></span>
                          </div>
                        </div>
                         </div>
                     </a>
                  </div>  
                     <div class="hexagonservices">
                      <a class="hlinkbott" href="#">
                        <div class="hexa">
                          <div class="hcontainer">
                          <div class="vertical-align">
                          <span class="texts"></span>
                          </div>
                        </div>
                      </div>
                        </a>
                     </div>
                     </div>
                     <div class="templatemo_servicetext">
              </div>
              </div>
              </div>
<?php
}
  }
?>

    </div>
  </div>
</div>
</div>

