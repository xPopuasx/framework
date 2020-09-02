<?php
  include $_SERVER['DOCUMENT_ROOT'].'/app/db.php';
  include $_SERVER['DOCUMENT_ROOT'].'/app/Session.php';
  $db = new app\db;
  $Session = new app\Session();
  session_start();
      $specification = $_POST['specification'];

      function check_array($array, $mast)
      {
          if(is_array($array))
          {
              foreach($array as $key => $value)
              {
                  if(is_null($value) || $value == '')
                  {
                    unset($array[$key]);
                  }
              }
              if(count($array) == $mast)
              {
                  return true;
              }
              else
              {
                  return false;
              }
          }
      }


      function input_protect($value)
      {
          if(!is_array($value))
          {
              $value = trim($value);
              $value = addslashes($value);

              return $value;
          }
          else
          {
              return serialize($value);
          }
      }

      if($specification == 'authorization')
      {
        if(strlen($_POST['login']) != 0 && strlen($_POST['password']) != 0)
        {
            $login = input_protect($_POST['login']);
            $password = input_protect($_POST['password']);
            $db->query_free("SELECT * FROM `users`
              INNER JOIN `roles` ON `users`.`user_access` = `roles`.`role_id`
              WHERE `user_login` = '".$login."' AND `user_password` = '".$password."' AND `user_status` = '0'");
            if($db->table_query->num_rows == 1)
            {
                $row = $db->table_query->fetch_assoc();
                $_SESSION['access'] = $row['role_access'];
                $_SESSION['auth'] = 1;
                $error_code = 0;
            }
            else
            {
                $error_code = 1;
                $error_msg = '<div class="alert bg-danger">
                                  <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">закрыть</span></button>
                                  <span class="text-semibold">Неверный логин или пароль</a>.
                              </div>';
            }
        }
        else
        {
          $error_code = 1;
          $error_msg = '<div class="alert bg-danger">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">закрыть</span></button>
                <span class="text-semibold">Заполните обязательные поля</a>.
                </div>';
        }
      }

      elseif($specification == 'add_counterparty_doc')
      {

        if(check_array($_POST, 4) == true)
        {
          $db->Check_duble_Table('technics_doc', 'Данный договор уже зарегестрирован', ['technics_doc_counterparty' => $_POST['doc_counterparty'], 'technics_doc_number' => $_POST['doc_number']]);
          if($db->error_status == 0)
          {

              $error_code = $db->error_code;
              $error_msg  = $db->error_message;
          }
          else
          {
            $error_code = $db->error_code;
            $error_msg  = $db->error_message;
          }
        }
        else
        {
          $error_code = 300;
          $error_msg = 'Заполните все обязательные поля';
        }
      }

      elseif($specification == 'add_counterparty')
      {
        if(check_array($_POST, 7) == true)
        {
           if(count($_POST['counterparty_tech'] != 0))
           {
              $db->Check_duble_Table('technics_counterparty', 'Данный контрагент уже присутствует в системе', ['counterparty_INN' => $_POST['counterparty_inn']]);
                if($db->error_status == 0)
                {
                  $db->Check_duble_Table('technics_counterparty', 'Данная почта уже присутствует в системе', ['counterparty_email' => $_POST['counterparty_email']]);
                  if($db->error_status == 0)
                  {
                      $array_counterparty = array();
                      $array_counterparty['counterparty_name']  = $_POST['counterparty_title'];
                      $array_counterparty['counterparty_INN']   = $_POST['counterparty_inn'];
                      $array_counterparty['counterparty_phone_name_user'] = $_POST['counterparty_user'];
                      $array_counterparty['counterparty_phone'] = $_POST['counterparty_phone'];
                      $array_counterparty['counterparty_email'] = $_POST['counterparty_email'];
                      $array_counterparty['counterparty_tech']  = serialize($_POST['counterparty_tech']);
                      $db->insert_into_table('technics_counterparty', $array_counterparty);
                      if($db->error_code == 0)
                      {
                        $error_code = $db->error_code;
                        $error_msg = 'Контрагент успешно добавлен';
                      }
                      else
                      {
                        $error_code = $db->error_code;
                        $error_msg  = $db->error_message;
                      }
                  }
                  else
                  {
                    $error_code = $db->error_code;
                    $error_msg  = $db->error_message;
                  }
              }
              else
              {
                $error_code = $db->error_code;
                $error_msg  = $db->error_message;
              }
           }
           else
           {
             $error_code = 304;
             $error_msg = 'Укажите виды техники';
           }
        }
        else
        {
          $error_code = 300;
          $error_msg = 'Заполните все обязательные поля';
        }
      }

      elseif($specification == 'add_organization')
      {
        if(check_array($_POST, 6) == true)
        {
          $db->insert_into_table('organizations', $_POST);
          if($db->error_code == 0)
          {
            $error_code = $db->error_code;
            $error_msg = 'Организация успешно добавлена';
          }
          else
          {
            $error_code = $db->error_code;
            $error_msg  = $db->error_message;
          }
        }
        else
        {
          $error_code = 300;
          $error_msg = 'Заполните все обязательные поля';
        }
      }

      elseif($specification == 'add_technics')
      {
        if(check_array($_POST, 3) == true && $_POST['technic_class'] == 0)
        {
          $db->Check_duble_Table('technics', 'Данный вид техники уже имеется в системе', ['technic_name' => $_POST['technic_name']]);
            if($db->error_status == 0)
            {
              $array_technic = array();
              $array_technic['id_technic_class'] = $_POST['technic_class'];
              $array_technic['technic_name']     = $_POST['technic_name'];
              $db->insert_into_table('technics', $array_technic);
              if($db->error_code == 0)
              {
                $error_code = $db->error_code;
                $error_msg = 'Техника успешно добавлена';
              }
              else
              {
                $error_code = $db->error_code;
                $error_msg  = $db->error_message;
              }
            }
            else
            {
              $error_code = $db->error_code;
              $error_msg  = $db->error_message;
            }
        }
        else
        {
          $error_code = 300;
          $error_msg = 'Заполните все обязательные поля';
        }
      }

      elseif($specification == 'add_sector')
      {
        if(check_array($_POST, 3) == true)
        {
          $db->insert_into_table('sectors', $_POST);
          if($db->error_code == 0)
          {
            $error_code = $db->error_code;
            $error_msg = 'Отделение успешно добавлено';
          }
          else
          {
            $error_code = $db->error_code;
            $error_msg  = $db->error_message;
          }
        }
        else
        {
          $error_code = 300;
          $error_msg = 'Заполните все обязательные поля';
        }
      }

      elseif($specification == 'add_role')
      {
        if(strlen($_POST['role_title']) > 0)
        {
          $db->Check_duble_Table('roles', 'Данная роль уже присутствует в системе', ['role_name' => $_POST['role_title']]);
          if($db->error_status == 0)
          {
            $access_role_arrey = array_keys($_POST, "on");
            if(count($access_role_arrey) != 0)
            {
                array_push($access_role_arrey, "access/loginout", "user/profil", "access/login");
                $array_role['role_name']        = $_POST['role_title'];
                $array_role['role_access']      = serialize($access_role_arrey);
                $array_role['role_possibility'] = 0;
                $array_role['role_status']      = 0;
                $db->insert_into_table('roles', $array_role);
              if($db->error_code == 0)
              {

                $error_code = $db->error_status;
                $error_msg = 'Роль успешно добавлена';
              }
              else
              {
                $error_code = $db->error_code;
                $error_msg  = $db->error_message;
              }
            }
            else
            {
              $error_code = 301;
              $error_msg = 'Укажите доступы для создаваемой роли';
            }
          }
          else
          {
            $error_code = $db->error_code;
            $error_msg  = $db->error_message;
          }
        }
        else
        {
          $error_code = 300;
          $error_msg = 'Заполните все обязательные поля';
        }
      }
      elseif($specification == 'add_user')
      {
        if(check_array($_POST, 12) == true)
        {
          if($_POST['user_role'] != 0 && $_POST['user_sector'] != 0)
          {
            $db->Check_duble_Table('users', 'Данная почта уже присутствут в системе', ['user_email' => $_POST['user_email']]);
            if($db->error_status == 0)
            {
              $db->Check_duble_Table('users', 'Данный login уже присутствут в системе', ['user_login' => $_POST['user_login']]);
              if($db->error_status == 0)
              {
                $db->Check_duble_Table('users', 'Данный телефон уже присутствут в системе', ['user_phone' => $_POST['user_phone']]);
                if($db->error_status == 0)
                {
                  $array_user['user_name'] = $_POST['user_surname'];
                  $array_user['user_surname'] = $_POST['user_name'];
                  $array_user['user_middle_name'] = $_POST['user_middle_name'];
                  $array_user['user_birthday'] = date("Y-m-d", strtotime($_POST['user_birthday']));
                  $array_user['user_phone'] = $_POST['user_phone'];
                  $array_user['user_email'] = $_POST['user_email'];
                  $array_user['user_access'] = $_POST['user_role'];
                  $array_user['user_position'] = $_POST['user_sector'];
                  $array_user['user_login'] = $_POST['user_login'];
                  $array_user['user_password'] = $_POST['user_password'];
                  $array_user['user_status'] = 0;

                  if($_POST['user_password_re'] == $array_user['user_password'])
                  {
                    $db->insert_into_table('users', $array_user);
                    if($db->error_code == 0)
                    {
                      $error_code = $db->error_code;
                      $error_msg = 'Пользователь успешно добавлен';
                    }
                    else
                    {
                      $error_code = $db->error_code;
                      $error_msg  = $db->error_message;
                    }
                  }
                  else
                  {
                    $error_code = 303;
                    $error_msg = 'Заданные пароли не совпадают';
                  }
                }
                else
                {
                  $error_code = $db->error_code;
                  $error_msg  = $db->error_message;
                }
              }
              else
              {
                $error_code = $db->error_code;
                $error_msg  = $db->error_message;
              }
            }
            else
            {
              $error_code = $db->error_code;
              $error_msg  = $db->error_message;
            }
          }
          else
          {
            $error_code = 302;
            $error_msg = 'Задайте параметры выбора (роль, отделение)';
          }
        }
        else
        {
          $error_code = 300;
          $error_msg = 'Заполните все обязательные поля';
        }
      }
      else
      {
        $error_code = 101;
        $error_msg = 'Отсутствует ключ обработки';
      }


  $result = json_encode(array('error_code' => $error_code, 'error_msg' => $error_msg, 'specification' => $specification));
  echo $result;

?>
