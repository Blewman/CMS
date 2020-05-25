<?php
session_start();
require_once('lib/connect.inc.php');
require_once('lib/lib.inc.php');


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


<!--Создание нового Пользователя-->

        
<?php




?>  
  



  

    



   
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