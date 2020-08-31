<?php
  session_start();
  include $_SERVER["DOCUMENT_ROOT"]."/app/db.php";
  include $_SERVER["DOCUMENT_ROOT"]."/app/Session.php";
  $Session = new app\Session();
  $db = new app\db;
      $specification = $_POST["arr_post"][0]["value"];

      if($specification == "table_counterpartys")
      {
        $result_content .= '<table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="font-weight:bold; width:35%;">Название организации</th>
                                    <th style="font-weight:bold;">Контакты</th>
                                    <th style="font-weight:bold; width:5%;">Функции</th>
                                </tr>
                            </thead>
                            <tbody id="'.$specification.'_append">';
                            $db->query_free("SELECT * FROM `technics_counterparty`  ORDER BY `counterparty_id` DESC "); 
                            while($row = $db->table_query->fetch_assoc())
                            {
                              $result_content .= 
                              '<tr>
                                <td data-label="Название организации"><b>';
                                $result_content .= $row['counterparty_name'];
                                $result_content .= '</b>
                                <br>
                                  <span><i class="icon-credit-card"></i> '.$row['counterparty_INN'].'</span>
                                </td>
                                <td data-label="Контакты">';
                                $result_content .= '<i class="icon-phone"></i> '.$row['counterparty_phone'];
                                $result_content .= '
                                <br>
                                  <span><i class="icon-envelop"></i> '.$row['counterparty_email'].'</span>
                                </td>
                                <td data-label="Функции">
                                   <ul class="icons-list">
                                    <div class="btn-group"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i><span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right" style="width:200px;">

                                            <li><a><i class="icon-info3"></i>Информация</a></li>
                                            <li><a><i class="icon-pencil"></i> Редактировать</a></li>
                                            <li><a><i class="icon-eye"></i> Карточка предприятия</a></li>
                                            <li class="divider"></li>
                                            <li><a><i class="icon-cross2" style="color:red"></i> Удалить</a></li>
                                        </ul>
                                       </li>
                                    </ul>
                                </td>
                              </tr>';
                            } 
                               
          $result_content .= 
                            '</tbody>
                            </table>';
      }
      elseif($specification == "table_organizations")
      {
          $result_content .= '<table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="font-weight:bold;">Название организации</th>
                                    <th style="font-weight:bold;">Контакты</th>
                                    <th style="font-weight:bold; width:5%;">Функции</th>
                                </tr>
                            </thead>
                            <tbody id="'.$specification.'_append">';
                            $db->query_free("SELECT * FROM `organizations`  ORDER BY `organization_id` DESC "); 
                            while($row = $db->table_query->fetch_assoc())
                            {
                              $result_content .= 
                              '<tr>
                                <td data-label="Название организации"><b>';
                                $result_content .= $row['organization_name'];
                                $result_content .= '</b>
                                <br>
                                  <span><i class="icon-credit-card"></i> '.$row['organization_inn'].'</span>
                                </td>
                                <td data-label="Контакты">';
                                $result_content .= $row['organization_phone'];
                                $result_content .= '
                                <br>
                                  <span><i class="icon-envelop"></i> '.$row['organization_email'].'</span>
                                </td>
                                <td data-label="Функции">
                                   <ul class="icons-list">
                                    <div class="btn-group"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i><span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right" style="width:200px;">

                                            <li><a><i class="icon-info3"></i>Информация</a></li>
                                            <li><a><i class="icon-pencil"></i> Редактировать</a></li>
                                            <li><a><i class="icon-eye"></i> Карточка предприятия</a></li>
                                            <li class="divider"></li>
                                            <li><a><i class="icon-cross2" style="color:red"></i> Удалить</a></li>
                                        </ul>
                                       </li>
                                    </ul>
                                </td>
                              </tr>';
                            } 
                               
          $result_content .= 
                            '</tbody>
                            </table>';
      }

      elseif($specification == "table_sectors")
      {
          $result_content .= '<table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="font-weight:bold;">Название отделения</th>
                                    <th style="font-weight:bold; width:5%;">Функции</th>
                                </tr>
                            </thead>
                            <tbody id="'.$specification.'_append">';
                            $db->query_free("SELECT * FROM `sectors` INNER JOIN `organizations` ON `sectors`.`sector_id_organization` = `organizations`.`organization_id` ORDER BY `sector_id` DESC ");
                            while($row = $db->table_query->fetch_assoc())
                            {
                              $result_content .= 
                              '<tr>
                                <td data-label="Название отделения"><b>';
                                $result_content .= $row['sector_title'];
                                $result_content .= '</b>
                                <br>
                                  <span><i class="icon-credit-card"></i> '.$row['organization_name'].'</span>
                                </td>
                                <td data-label="Функции">
                                   <ul class="icons-list">
                                    <div class="btn-group"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i><span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right" style="width:200px;">

                                            <li><a><i class="icon-info3"></i>Информация</a></li>
                                            <li><a><i class="icon-pencil"></i> Редактировать</a></li>
                                            <li><a><i class="icon-eye"></i> Карточка предприятия</a></li>
                                            <li class="divider"></li>
                                            <li><a><i class="icon-cross2" style="color:red"></i> Удалить</a></li>
                                        </ul>
                                       </li>
                                    </ul>
                                </td>
                              </tr>';
                            } 
                               
          $result_content .= 
                            '</tbody>
                            </table>';
      }
      elseif($specification == "table_roles")
      {
          $result_content .= '
                          <script>
                          $("[data-popup=popover-supply-view]").popover({
                              title: "",
                              content: "",
                              trigger: "hover"
                            });
                          </script>
                          <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="font-weight:bold;">#</th>
                                    <th style="font-weight:bold;">Название роли</th>
                                    <th style="font-weight:bold;">Доступные разделы</th>
                                    <th style="font-weight:bold;">Привелегии</th>
                                    <th style="font-weight:bold;">Количество пользователей</th>
                                    <th style="font-weight:bold; width:5%;">Функции</th>
                                </tr>
                            </thead>
                            <tbody id="'.$specification.'_append">';
                            $db->query_free("SELECT * FROM `roles`  ORDER BY `role_id` DESC ");
                            while($row = $db->table_query->fetch_assoc())
                            {
                              if($row['role_status'] == 0)
                              {
                                $status = '<a  class="btn border-success-400 text-success-400 btn-rounded btn-icon btn-xs" data-popup = "popover-supply-view" data-placement="top" data-content="Роль открыта"><i class="icon-unlocked2" style="color:green;"></i></a>';
                              }
                              else
                              {
                                $status = '<a class="btn border-danger-400 text-danger-400 btn-rounded btn-icon btn-xs" data-popup = "popover-supply-view" data-placement="top" data-content= "Роль заблокирована"><i class="icon-lock2" style="color:red;" ></i></a>';
                              }
                              $result_content .= 
                              '<tr>
                                <td data-label="#">
                                '.$status.'
                                </td>
                                <th data-label="Название роли">';
                                $result_content .= $row['role_name'];
                                $result_content .= '
                                </th>
                                <td data-label="Доступные разделы"></td>
                                <td data-label="Привелегии"></td>
                                <td data-label="Количество пользователей"></td>
                                <td data-label="Функции">
                                   <ul class="icons-list">
                                    <div class="btn-group"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i><span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right" style="width:200px;">

                                            <li><a><i class="icon-info3"></i>Информация</a></li>
                                            <li><a><i class="icon-pencil"></i> Редактировать</a></li>
                                            <li><a><i class="icon-eye"></i> Карточка предприятия</a></li>
                                            <li class="divider"></li>
                                            <li><a><i class="icon-cross2" style="color:red"></i> Удалить</a></li>
                                        </ul>
                                       </li>
                                    </ul>
                                </td>
                              </tr>';
                            } 
                               
          $result_content .= 
                            '</tbody>
                            </table>';
      }
      elseif($specification == "table_users")
      {
          $result_content .= '
                          <script>
                          $("[data-popup=popover-supply-view]").popover({
                              title: "",
                              content: "",
                              trigger: "hover"
                            });
                          </script>
                          <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="font-weight:bold; width:5%;">#</th>
                                    <th style="font-weight:bold; width:25%;">Данные</th>
                                    <th style="font-weight:bold;">Логин</th>
                                    <th style="font-weight:bold;">Контакты</th>
                                    <th style="font-weight:bold; width:25%;">Информация</th>
                                    <th style="font-weight:bold; width:5%;">Функции</th>
                                </tr>
                            </thead>
                            <tbody id="'.$specification.'_append">';
                            $db->query_free("SELECT * FROM `users` INNER JOIN `roles` ON `users`.`user_access` = `roles`.`role_id` INNER JOIN `sectors` ON `users`.`user_position` = `sectors`.`sector_id`  ORDER BY `user_id` DESC ");
                            while($row = $db->table_query->fetch_assoc())
                            {
                              if($row['user_status'] == 1)
                              {
                                $status = '<a class="btn border-danger-400 text-danger-400 btn-rounded btn-icon btn-xs" data-popup = "popover-supply-view" data-placement="top" data-content= "Заблокирован"><i class="icon-user-block" style="color:red;" ></i></a>';
                              }
                              else
                              {
                                $status = '<a  class="btn border-success-400 text-success-400 btn-rounded btn-icon btn-xs" data-popup = "popover-supply-view" data-placement="top" data-content="Действует"><i class="icon-user-check" style="color:green;"></i></a>';
                              }
                              $result_content .= 
                              '<tr>
                                <td data-label="#">
                                '.$status.'
                                </td>
                                <td data-label="Данные">';
                                $result_content .= $row['user_surname'].' '.$row['user_name'].' '.$row['user_middle_name'];
                                $result_content .= '<br>
                                <i class="icon-calendar2"></i> '.date("d.m.Y", strtotime($row['user_birthday'])).'
                                </td>
                                <td data-label="Доступные разделы">
                                  '.$row['user_login'].'
                                </td>
                                <td data-label="Контакты">
                                <i class="icon-phone"></i> '.$row['user_phone'].'<br>
                                <i class="icon-envelop"></i> '.$row['user_email'].'
                                </td>
                                <td data-label="Информация">
                                <b>Роль</b>: '.$row['role_name'].'<br>
                                <b>Отдел</b>: '.$row['sector_title'].'
                                </td>
                                <td data-label="Функции">
                                   <ul class="icons-list">
                                    <div class="btn-group"><button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i><span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right" style="width:200px;">
                                            <li><a><i class="icon-lock2"></i> Заблокировать</a></li>
                                            <li><a><i class="icon-key"></i> Сменить роль</a></li>
                                            <li><a><i class="icon-shrink7"></i> Сменить отделение</a></li>
                                            <li class="divider"></li>
                                            <li><a><i class="icon-info3"></i>Информация</a></li>
                                            <li><a><i class="icon-pencil"></i> Редактировать</a></li>
                                            <li class="divider"></li>
                                            <li><a><i class="icon-cross2" style="color:red"></i> Удалить</a></li>
                                        </ul>
                                       </li>
                                    </ul>
                                </td>
                              </tr>';
                            } 
                               
          $result_content .= 
                            '</tbody>
                            </table>';
      }
    
  	
  $result = json_encode(array("error_code" => $error_code, "error_msg" => $error_msg, "result_content" => $result_content));
  echo $result;

?>