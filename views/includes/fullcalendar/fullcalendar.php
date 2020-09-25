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
    $db->query_free("UPDATE `application_deliver`  SET `deliver_date` = '".$new_date."' WHERE `id_deliver` = '".$_POST['id']."'");
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
      $events[] = array(
        'id' => $row['id_deliver'],
        'title' => $row['technic_name'],
        'start' => $row['deliver_date'],
      );
    }

    echo json_encode($events);
  }

  ?>
