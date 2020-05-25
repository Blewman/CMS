



      <div class="modal" id='addproject' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">  
             <div class="modal-body">
               <div class="col-xs-12 col-md-12 col-lg-12">
                  <form id="" method="POST" enctype="multipart/form-data">
                      <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="templatemo_form">
                           <input type="text" name="addnameproject" placeholder="Наименование объекта" required>
                        </div>
                      </div>
                      <div class="col-xs-12 col-md-12 col-lg-12">
                         <div class="templatemo_form">
                           <input type="text" name="addadresproject" placeholder="Адрес">
                         </div>
                      </div>
                      <div class="col-xs-12 col-md-12 col-lg-12">   
                        <div class="templatemo_form">
                           <input type="text" name="addcompanyproject" placeholder="Заказчик">
                        </div>
                      </div>
                      <div class="col-xs-6 col-md-6 col-lg-6">       
                        <div class="templatemo_form">
                           <input type="date" name="adddatnproject" placeholder="" value="<?=date('Y-m-d')?>">
                        </div>
                       </div>
                      <div class="col-xs-6 col-md-6 col-lg-6">       
                         <div class="templatemo_form">
                           <input type="date" name="adddatcproject" placeholder="" value="<?=date('Y-m-d')?>">
                        </div>
                      </div>
                      <div class="fvrduplicate">
                          <div class="col-xs-11 col-md-11 col-lg-11">       
                            <div class="templatemo_form">
                              <input type="text" class="form-control" id="contactdata[]" name="contactdata[]" placeholder="Контактные данные">
                            </div> 
                          </div>
                          <div class="col-xs-1 col-md-1 col-lg-1" style="margin-top: 10px; margin-left: -20px; position: static;"> 
                            <span class="">
                              <button class="btn btn-success btn-add" type="button">
                                  <span class="glyphicon glyphicon-plus"></span>
                              </button>
                            </span>
                          </div>
                      </div>
                      <div class="fvrduplicate1">
                        <div class="col-xs-11 col-md-11 col-lg-11">       
                          <div class="templatemo_form">
                            <input type="text" class="form-control" id="workdata" name="workdata[]" placeholder="Наименование работ">
                          </div> 
                        </div>
                        <div class="col-xs-1 col-md-1 col-lg-1" style="margin-top: 10px; margin-left: -20px; position: static; "> 
                          <span class="">
                            <button class="btn btn-success btn-add1" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                          </span>
                        </div>   
                      </div>
                      <div class="col-xs-12 col-md-12 col-lg-12">       
                        <div class="templatemo_form">
                          <input type="file" id="files" name="addfilesproject[]" multiple placeholder="Файлы">
                        </div>
                      </div>
                      <div class="col-xs-12 col-md-12 col-lg-12">       
                        <div class="templatemo_form">
                          <textarea col ="2" class="form-control" name="addkomenproject">Примечание</textarea>
                        </div>
                      </div>
                      <div class="col-xs-12 col-md-12 col-lg-12">       
                        <div class="templatemo_form">
                           <button type="submit" class="btn btn-primary" id="newobject" name="newobject">Добавить</button>
                        </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

           <script type="text/javascript">
$(function()
{
    $(document).ready(function(){
        var fvrhtmlclone = '<div class="fvrclonned">'+$(".fvrduplicate").html()+'</div>';
        $( ".fvrduplicate" ).html(fvrhtmlclone);
        $( ".fvrduplicate" ).after('<div class="fvrclone"></div>');

        $(document).on('click', '.btn-add', function(e)
        {
            e.preventDefault();
    
            $( ".fvrclone" ).append(fvrhtmlclone);
                  $(this).removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
            
        }).on('click', '.btn-remove', function(e)
        {
            $(this).parents('.fvrclonned').remove();
    
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


$(function()
{
    $(document).ready(function(){
        var fvrhtmlclone = '<div class="fvrclonned1">'+$(".fvrduplicate1").html()+'</div>';
        $( ".fvrduplicate1" ).html(fvrhtmlclone);
        $( ".fvrduplicate1" ).after('<div class="fvrclone1"></div>');

        $(document).on('click', '.btn-add1', function(e)
        {
            e.preventDefault();
    
            $( ".fvrclone" ).append(fvrhtmlclone);
                  $(this).removeClass('btn-add1').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
            
        }).on('click', '.btn-remove', function(e)
        {
            $(this).parents('.fvrclonned1').remove();
    
        e.preventDefault();
        return false;
      });

    });

   
    
// FUNÇÂO DE TESTE    
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



 $(function()
{
    $(document).ready(function(){
        var fvrhtmlclone = '<div class="fvrclonned2">'+$(".fvrduplicate2").html()+'</div>';
        $( ".fvrduplicate2" ).html(fvrhtmlclone);
        $( ".fvrduplicate2" ).after('<div class="fvrclone2"></div>');

        $(document).on('click', '.btn-add2', function(e)
        {
            e.preventDefault();
    
            $( ".fvrclone" ).append(fvrhtmlclone);
                  $(this).removeClass('btn-add2').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
            
        }).on('click', '.btn-remove', function(e)
        {
            $(this).parents('.fvrclonned2').remove();
    
        e.preventDefault();
        return false;
      });

    });

    // FUNÇÂO DE TESTE    
  function showValues() {
    var fields = $( ":input" ).serializeArray();
    $( "#results" ).empty();
    jQuery.each( fields, function( i, field ) {
      $( "#results" ).append( field.value + " " );
    });
  }    
    
    $( "formworks" ).submit(function( event ) {
      showValues();
      console.log( $( this ).serializeArray() );
      event.preventDefault();
    });    

});

  </script>
