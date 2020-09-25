<?php
  include $_SERVER['DOCUMENT_ROOT'].'/app/db.php';
  include $_SERVER['DOCUMENT_ROOT'].'/app/Session.php';
  $db = new app\db;
  $db_2 = clone($db);

  $timestart = time();
  if($_POST['arr_post'][1]['value'] != '')
  {
  		$timestamp = $_POST['arr_post'][1]['value'];
  }
  else
  {
      $timestamp = date('Y-m-d H:i:s');
  }
  $newData = false;

  while($newData === false && (time() - $timestart) < 50)
	{
    $db->query_free("SELECT * FROM `logs` WHERE `logs_timestamp` > '".$timestamp."' ");
    if($db->table_query->num_rows >0)
    {
      $row = $db->table_query->fetch_assoc();
      $alert_code = 1;
      $alert_msg = $row['log_do'];
      $result_query = 'true';
      $newData = true;
    }
    else
    {
      $result_query = 'false';
    }
    usleep(500000);
  }
  $timestamp = date('Y-m-d H:i:s');

  $result = json_encode(array(
   'alert_code' => $alert_code,
   'alert_msg' => $alert_msg,
   'result_query' => $result_query,
   'timestamp' => $timestamp));
  echo $result;

?>
