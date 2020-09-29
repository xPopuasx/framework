<?php
  include $_SERVER["DOCUMENT_ROOT"]."/app/db.php";
  $db = new app\db;
  $db_2 = clone($db);
  if($_POST['action'] == 'Drop')
  {
    $db_2->query_free("SELECT * FROM `application_deliver` WHERE `id_deliver` = '".$_POST['id']."'");
    $row_2 = $db_2->table_query->fetch_assoc();
    $db ->insert_log('Изменения в таблице работы с техникой <hr> Перенос события на другю дату', date('Y-m-d'), '1', 'application_deliver', $row_2['id_deliver'], date('Y-m-d H:i:s'));
    $new_date = date("Y-m-d", strtotime($_POST['start']));
    $new_date_end = date("Y-m-d", strtotime($_POST['end']));
    $db->query_free("UPDATE `application_deliver`  SET `deliver_date` = '".$new_date."',`deliver_date_end` = '".$new_date_end."' WHERE `id_deliver` = '".$_POST['id']."'");
  }
  elseif($_POST['action'] == 'Resize')
  {
    $db_2->query_free("SELECT * FROM `application_deliver` WHERE `id_deliver` = '".$_POST['id']."'");
    $row_2 = $db_2->table_query->fetch_assoc();
    $db ->insert_log('Изменения в таблице работы с техникой <hr> Изменён период работы техники', date('Y-m-d'), '1', 'application_deliver', $row_2['id_deliver'], date('Y-m-d H:i:s'));
    $new_date = date("Y-m-d", strtotime($_POST['start']));
    $new_date_end = date("Y-m-d", strtotime($_POST['end']));
    $db->query_free("UPDATE `application_deliver`  SET `deliver_date` = '".$new_date."',`deliver_date_end` = '".$new_date_end."' WHERE `id_deliver` = '".$_POST['id']."'");
  }
  elseif($_POST['action'] == 'Deleted')
  {
    $db_2->query_free("SELECT * FROM `application_deliver` WHERE `id_deliver` = '".$_POST['id']."'");
    $row_2 = $db_2->table_query->fetch_assoc();
    $db ->insert_log('Изменения в таблице работы с техникой <hr> Событие удалено', date('Y-m-d'), '1', 'application_deliver', $row_2['id_deliver'], date('Y-m-d H:i:s'));
    $db->query_free("DELETE FROM `application_deliver` WHERE `id_deliver` = '".$_POST['id']."'");
  }
  else
  {
    $events = array();

    $db->query_free("SELECT * FROM `application_deliver` INNER JOIN `technics` ON `application_deliver`.`deliver_technic_name` = `technics`.`id_technic` ");
    while($row = $db->table_query->fetch_assoc())
    {
      if($row['deliver_specification'] == 'Доставка материалов')
      {
        $color = '#AB47BC';
      }
      else
      {
        $color = '#6A1B9A';
      }
      $events[] = array(
        'id' => $row['id_deliver'],
        'title' => $row['technic_name'],
        'start' => $row['deliver_date'],
        'end' => date('Y-m-d', strtotime($row['deliver_date_end'] . ' +1 day')),
        'color' => $color
      );
    }

    echo json_encode($events);
  }

  ?>
