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
         <script type="text/javascript" src="jquery.min.js"></script>
     <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
  </head>
  <body>
         <div class="modal" id='feedbackFormModalTab<?=$idForm?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="col-md-6 col-lg-12" align="center" style="padding-top: 120px;">

         <div class="modal-dialog" role="document">
            <!--<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->

             <div class="modal-body">
          
            <div class="col-md-3 col-lg-3">
              <form role="forms" method="POST">
                <div class="templatemo_form">
                  <input name="Mark" type="text" id="Mark" class="form-control" id="fullname" placeholder="<?=$RepMark['Mark']?>" maxlength="40" value="">
                  <input type="hidden" name="IDR" id="IDR" value="<?=$RepMark['id']?>">
                  <input type="hidden" name="item" id="item" value="<?=$value['UID']?>">
                  <?php
                   $sqlSelectIdTarif = "SELECT id FROM tarif WHERE IdDlj = '".$value['dlj']."' AND TarifDatNach <= '".$DtRep."' AND TarifDatCon >= '".$DtRep."'";
                    $resultSelectTarif = $connectionPDO -> query($sqlSelectIdTarif) or die('Ошибка при выполнении запроса выборки тарифа');
                      $IdTarif = $resultSelectTarif->fetch();
                      //echo $IdTarif['id'];
                    //  echo $value['dlj'];

                  ?>
                  <input type="hidden" name="IdTarif" id="IdTarif" value="<?=$IdTarif['id']?>">
                  <input type="hidden" name="datRep" id="datRep" value="<?=$DtRep?>">

                </div>
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary" name="AddTab" 
                  id="AddTab">Сохранить</button>
                </div>
            </form>
            </div>
        </div>
      </div>
     </div>
     </div>
    <script>

$("#AddTab").click(function(){

  /*  var namePlanes = $("#namePlanes").val();
    var idPlaneUser = $("#idPlaneUser").val();
    var dataNach = $("#dataNach").val();
    var textPlanes = $("#textPlanes").val();*/

alert("привет z");
  /* $.ajax({
        url: 'Myphp.php',
        type: 'POST',
        cache: false,
        data:{ 'namePlanes':namePlanes, 'idPlaneUser':idPlaneUser,'dataNach':dataNach,'textPlanes':textPlanes,'AddPlane':AddPlane},
        dataType: 'html',
        success: function(dat){
            alert(dat);
          //  $("#Plane").prop('disabled',false);
        }
    });*/

});

   </script>
   </body>
</html>