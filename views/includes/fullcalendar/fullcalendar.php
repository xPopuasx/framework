<?php
  include $_SERVER["DOCUMENT_ROOT"]."/app/db.php";
  $db = new app\db;
  $db_2 = clone($db);

  $events = array();

  $db->select_table(NULL, 'application_deliver', NULL);
  while($row = $db->table_select->fetch_assoc())
  {
    $events[] = array(
      'id' => $row['id_deliver'],
      'title' => 'Перевозка',
      'start' => $row['deliver_date'].' '.$row['deliver_time'],
    );
  }




  echo json_encode($events);
  ?>
