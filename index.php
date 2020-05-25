<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');


if (isset($_POST['log'])){

$login = htmlspecialchars($_POST['login']);
$pass = htmlspecialchars($_POST['pass']);

$sql = "SELECT * FROM users WHERE login = :login AND password = :pass" ;
    $result = $connectionPDO -> prepare($sql) or die('Ошибка при выполнении запроса');
    $result -> execute([':login' => $login,
              ':pass' => $pass]);
    foreach ($result as $row) {
      $loginP = $row['login'];
      $passP = $row['pass'];
      $role = $row['role'];
      $id = $row['id'];}
if ($role != 0){
  $header = "Location: indexes.php";
}

if($_SESSION['user']){
  header($header);
  exit;
}
  
//if($_POST['log']){
/*  if (empty($_POST['login']) AND empty($_POST['pass'])){
    //$header = "Location: admin/index.php";
  }*/


  if($loginP == $_POST['login'] AND $passP == $_POST['pass']){
    $header = "Location: admin/index.php";
  }else{ 

    $_SESSION['username'] = $loginP;
    $_SESSION['role'] = $role;
    $_SESSION['id'] = $id;
    //header("Location: admin/index.php");
    header($header);
    //exit;

}
?>
<script type="text/javascript">
  alert("Не правльный логин<?=$loginP?> или пароль<?=$passP?>");
</script>
<?php
}
elseif($loginP != $_POST['login'] or $passP != $_POST['pass']){
echo "<meta http-equiv='refresh' content='0'>";
exit;

  }

?>
<!DOCTYPE html>
  <head>
    <title>Polygon</title>
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
    <!--<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>-->
      
    <script src="js/jquery-1.10.2.min.js"></script> 
  <script src="js/jquery.lightbox.js"></script>
  <script src="js/templatemo_custom.js"></script>
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

  </head>
  <body>

<div class="row">
    <div class="container">
      <div class="col-md-3 col-sm-12 logotip">
                      PRESTIGE
                    </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
<div class="row centered">
    <div class="container">
                    <div class="col-md-2 col-sm-offset-3 col-lg-offset-4">

                <form method="POST">
                <div class="templatemo_form">
                  <input name="login" type="text" class="form-control" id="fullname" placeholder="Логин" maxlength="40">
                </div>
                <div class="templatemo_form">
                  <input name="pass" type="password" class="form-control" id="pass" placeholder="Пароль" maxlength="40">
                </div>
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" name="log">Войти</button></div>
            </form>

            </div>
      
    </div>
</div>
    <div class="templatemo_footer">
      <div class="container">
      <div class="row">
          <div class="col-md-9 col-sm-12">
              <span>Copyright &copy; 2020 Колор и Т</span>
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