
<!--Добавляем материал-->

<?php
function AddMForm($idform,$name){
?>
<div id="addmat<?=$idform?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
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
   <style>
      *{
  box-sizing: border-box;
}
.d-table{
  display: table;
  /*width: 100%;*/
  border-collapse: collapse;
  margin-left: -30px;
}
.d-tr{
  display: table-row;
}
.d-td{
 /* display: table-cell;*/
  text-align: center;
  border: none;
  border: 1px solid #ccc;
 /* vertical-align: middle;*/
   /* height: 30px;*/

    /*width: 150px;*/

  }

.d-th{
 font-weight: bold;
 /*display: table-cell;*/
  text-align: center;
  border: none;
  border: 1px solid #ccc;
  /*vertical-align: middle;*/
  border-right: 1px solid #ccc;
  color: #b2c831;
  font-size: 12px; 
  background:#353535;
 /* height: 30px; */
}

.d-tr:hover {
    background: #000702; /* Цвет фона под ссылкой */ 
} 

input[type=text].inp{
 /* height: 100%; 
   width: 100%; */
  /* padding: 0px;*/
    width: 100%;
   margin-top: 0px;
   padding: 0px;
}

input[type=text].inp:hover{
 background: #000702;
 width: 160px;
 margin-top: 0px;
}

input[type=date].inp{
 /* height: 100%; 
   width: 100%; */
margin-top: 0px;
   width: 100%;
   padding: 0px;

}

input[type=file].inp{
 /* height: 100%; 
   width: 100%; */
margin-top: 0px;
   width: 100%;
   padding: 0px;

}

input[type=date].inp:hover{
 background: #000702;
 margin-top: 0px;
}


/*
.example-1 input[type=file]{outline:0;opacity:0;pointer-events:none;user-select:none}
.example-1 .label{margin-top: 15px; width:0px;border:2px dashed grey;border-radius:5px;display:block;padding:10px;cursor:pointer;text-align:center}*/

    </style>
      
      <div class="modal-body templatemo_form">
        <form enctype="multipart/form-data" method="POST">
         <div class="col-sx-12 col-md-12 col-lg-12">
          <div class="d-table">

  <div class="d-tr">
    <div class="d-th" style="width: 165px;">Дата поступления</div>
    <div class="d-th" style="width: 160px;">Наименование</div>
    <div class="d-th" style="width: 60px;">Ед.изм.</div>
    <div class="d-th" style="width: 130px;">Кол-во</div>
    <div class="d-th" style="width: 130px;">Стоимость</div>
    <div class="d-th" style="width: 165px;">Файл</div>
    <div class="d-th" style="width: 160px;">Примечание</div>
  </div>
</div>
<div class="d-table">
           <div class="fvrduplicateTabMat<?=$idform?>">
               <div class="d-tr">  
                <form method="POST">
                  <input type="hidden" id="IdMat<?=$idform?>" value="<?=$idform?>" >
                  <div class="d-td" style="width: 150px;"><input class="inp datMat<?=$idform?>" type="date" id="datMat<?=$idform?>" name="datMat<?=$idform?>[]" value="<?=date("Y-m-d")?>" id=""></div>
                  <div class="d-td" style="width: 160px;"><input class="inp" type="text" id="nameMat<?=$idform?>" name="nameMat<?=$idform?>[]" placeholder="Наименование"></div>
                  <div class="d-td" style="width: 60px;"><input class="inp" type="text" id="edizm<?=$idform?>" name="edizm<?=$idform?>[]" size="3" placeholder="Ед.Изм."></div>
                  <div class="d-td" style="width: 130px;"><input class="inp" type="text" id="kolvo<?=$idform?>" name="kolvo<?=$idform?>[]" size="8" placeholder="Кол-во"></div>
                  <div class="d-td" style="width: 130px;"><input class="inp" type="text" id="summ<?=$idform?>" name="summ<?=$idform?>[]" placeholder="Стоимость"></div>
                  <div class="d-td" style="width: 160px;">
                    <input type="file">

                  </div>
                  <div class="d-td" style="width: 160px;"><input class="inp" id="coment<?=$idform?>" name="coment<?=$idform?>[]" type="text" name="" placeholder="Примечание"></div>
                  <div style="position: absolute; padding-top: 11px;">
                      <span class="input-group-btn">
                    <button class="btn btn-success btn-add_TabMat<?=$idform?>" type="button">
                     <span class="glyphicon glyphicon-plus"></span>
                     </button>
                      </span>
                      </div>

              </div>
              </div>
            
          </div>
          <div class="col-sx-12 col-md-12 col-lg-12">
        <button type="button" class="btn btn-primary" id="addmatertab<?=$idform?>" data-dismiss="modal">
          Добавить
        </button>
      </div>
      </div>
      </form>
        <div class="modal-footer templatemo_form">
  
    </div>

      
      </div>

  </div>
  </div>
</div>
<script type="text/javascript">

        $("#addmatertab<?=$idform?>").click(function(){


  var newmater = $("#addmatertab<?=$idform?>").val();
//var str = $( "form" ).serialize();
var IdMat = $("#IdMat<?=$idform?>").val();

var datMat = $("input[name='datMat<?=$idform?>[]']").map(function(){return $(this).val();}).get();
var nameMat = $("input[name='nameMat<?=$idform?>[]']").map(function(){return $(this).val();}).get();
var edizm = $("input[name='edizm<?=$idform?>[]']").map(function(){return $(this).val();}).get();
var kolvo = $("input[name='kolvo<?=$idform?>[]']").map(function(){return $(this).val();}).get();
var summ = $("input[name='summ<?=$idform?>[]']").map(function(){return $(this).val();}).get();
var coment = $("input[name='nameMat<?=$idform?>[]']").map(function(){return $(this).val();}).get();
 // alert(nameMat); 
/*
alert(datMat);
alert(nameMat);
alert(edizm);
alert(kolvo);
alert(summ);
alert(coment);*/

/*  var dat_add_mater = $("#dat_add_mater<?=$idform?>").val();
  var id_add_mater = $("#id_add_mater<?=$idform?>").val();
  var name_add_mater = $("#name_add_mater<?=$idform?>").val();
  var edizm_add_mater = $("#edizm_add_mater<?=$idform?>").val();
  var kolvo_add_mater = $("#kolvo_add_mater<?=$idform?>").val();
  var summ_add_mater = $("#summ_add_mater<?=$idform?>").val();
  var komen_add_mater = $("#komen_add_mater<?=$idform?>").val();*/
 // var file_add_mater = $("#file_add_mater<?=$idform?>").val();

    /*var file_data = $('#file_add_mater<?=$idform?>').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);*/



 //alert(file_add_mater);
 /*var add_dat_work = ("#add_dat_work").val();*/
     
$.ajax({
        url: 'lib/obrstoke.php',
        type: 'POST',
        cache: false,
        data:{newmater, datMat, nameMat, edizm, kolvo, summ, coment,IdMat},
        dataType:'html',
        success:alert('Запись успешно добавлена!'),
      function(html){
            $("#stock").html(html);
        }
    });

 $("#editproject<?=$idform?>").modal('hide');
 
});


$(function()
{
    $(document).ready(function(){
        var fvrhtmlclone = '<div class="fvrclonnedTabMat<?=$idform?>">'+$(".fvrduplicateTabMat<?=$idform?>").html()+'</div>';
        $( ".fvrduplicateTabMat<?=$idform?>" ).html(fvrhtmlclone);
        $( ".fvrduplicateTabMat<?=$idform?>" ).after('<div class="fvrcloneTabMat<?=$idform?>"></div>');

        $(document).on('click', '.btn-add_TabMat<?=$idform?>', function(e)
        {
            e.preventDefault();
    
            $( ".fvrcloneTabMat<?=$idform?>" ).append(fvrhtmlclone);
                  $(this).removeClass("btn-add_TabMat<?=$idform?>").addClass("btn-remove_TabMat<?=$idform?>")
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
            
        }).on('click', '.btn-remove_TabMat<?=$idform?>', function(e)
        {
            $(this).parents(".fvrclonnedTabMat<?=$idform?>").remove();
    
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
    
    $( "forms" ).submit(function( event ) {
      showValues();
      console.log( $( this ).serializeArray() );
      event.preventDefault();
    });    

});        

      </script>

<?php
}
?>      