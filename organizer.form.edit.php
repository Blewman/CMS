<!--Исполнение \ поручение-->

    <div class="modal" id='feedbackFormModalIsp<?=$value_planeS['id']?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

             <div class="modal-body">
          
            <div class="col-md-5 col-lg-12">
              <form role="forms" method="POST">
                <div class="templatemo_form">
                  <input name="NamePlanesEdit" type="text" class="form-control" id="NamePlanesEdit" placeholder="Наименование" maxlength="40" value="<?=$value_planeS['namePlanes']?>">
                  <input type="hidden" name="item" id="item<?=$value_planeS['id']?>" value="<?=$value_planeS['id']?>">
                </div>
                 <div class="templatemo_form">
                    <select name="IdUserEdit" class="form-control" id="fullname">
                      <?php
                      $sql_IdUser = "SELECT * FROM users WHERE role = 1";
                      $result_IdUser = $connectionPDO -> query($sql_IdUser) or die('Ошибка при выполнении запроса');

                      foreach ($result_IdUser as $key => $val) {

                        if ($value['IdUser'] == $val['id']) {
                          $select = 'selected';}
                          else{

                              $select = ''; }

                      ?>
                      <option value="<?=$val['id']?>"<?=$select?>><?=$val['fio']?></option>
                      <?php
                      
                          }
                      ?>
                    </select>
                   <!-- <input name="IdUserEdit" type="text" class="form-control" id="fullname" placeholder="<?=$value['IdUser']?>" maxlength="40">-->
                </div>
              <div class="templatemo_form">
                   <input name="dataNachEdit" type="date" class="form-control" id="dataNachEdit" value="<?=$value_planeS['dataNach']?>">
                </div>
                  <div class="templatemo_form">
                <textarea name="textPlanesEdit" rows="10" class="form-control" id="message" placeholder="Описание" ><?=$value_planeS['textPlanes']?></textarea>
                </div>
                <div class="templatemo_form">
                  <button type="submit" class="btn btn-primary custom2" id="EditPlane<?=$value_planeS['id']?>" name="EditPlane">Поручение</button>
                  <button type="submit" class="btn btn-primary custom2" id="IspPlane<?=$value_planeS['id']?>" name="IspPlane">Исполнить</button>
                </div>
            </form>