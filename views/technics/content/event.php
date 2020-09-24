<div class="row">

  <div class="col-md-3">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <ul class="list-inline panel-title">
            <li>
                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom">
                    <i class = "icon-alignment-align"></i>
                </a>
            </li>
            <li class="text-left">
                <h5 class="panel-title">Стаутс</h5></br>
                <span class="text-muted">Статус исполнения</span>
            </li>
        </ul>
          <div class="heading-elements">
              <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
              </ul>
          </div>
      </div>
      <div class="panel-body">
        Номер машины : <?=$row['deliver_gov_number']?>
        Статус : Исполненно
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <ul class="list-inline panel-title">
            <li>
                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom">
                    <i class = "icon-cash"></i>
                </a>
            </li>
            <li class="text-left">
                <h5 class="panel-title">Оплата</h5>
                <span class="text-muted">Статус оплаты</span>
            </li>
        </ul>
          <div class="heading-elements">
              <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
              </ul>
          </div>
      </div>
      <div class="panel-body">
        Оговоренная сумма : <?=$row['deliver_price']?></br>
        Статус: Не оплачено
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <ul class="list-inline panel-title">
            <li>
                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom">
                    <i class = "icon-user"></i>
                </a>
            </li>
            <li class="text-left">
                <h5 class="panel-title">Водитель</h5>
                <span class="text-muted">Информация о водителе</span>
            </li>
        </ul>
          <div class="heading-elements">
              <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
              </ul>
          </div>
      </div>
      <div class="panel-body">
        Имя : <?=$row['deliver_user_name']?></br>
        Телефон : <?=$row['deliver_phone']?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
      <div class="panel panel-flat">
          <div class="panel-heading">
              <h5 class="panel-title">Точки доставки</h5>
              <div class="heading-elements">
                  <ul class="icons-list">
                      <li><a data-action="collapse"></a></li>
                  </ul>
              </div>
          </div>
          <div class="panel-body">
            <ul class="list-feed">
                <?php
                  $array_to = unserialize($row['deliver_objects']);

                  foreach ($array_to as $key => $value) {
                      $db_2->query_free("SELECT * FROM `objects` WHERE `object_id` = '".$value."' ");
                      $row_2 = $db_2->table_query->fetch_assoc();
                    echo'  <li>'.$row_2['object_title'].'('.$row_2['obecjt_address'].')</li>';

                  }
                ?>
						</ul>
          </div>
      </div>
  </div>
  <div class="col-md-4">
      <div class="panel panel-flat">
          <div class="panel-heading">
              <h5 class="panel-title">Точки заезда</h5>
              <div class="heading-elements">
                  <ul class="icons-list">
                      <li><a data-action="collapse"></a></li>
                  </ul>
              </div>
          </div>
          <div class="panel-body">
            <ul class="list-feed">

              <?php
                $array_at = unserialize($row['deliver_contractors']);

                foreach ($array_at as $key => $value) {
                    $db_2->query_free("SELECT * FROM `contractors` WHERE `id_contractor` = '".$value."' ");
                    $row_2 = $db_2->table_query->fetch_assoc();
                    echo'  <li>'.$row_2['title_contractor'].' ('.$row_2['city_contractor'].')</li>';

                }
              ?>
            </ul>
          </div>
      </div>
  </div>
</div>
