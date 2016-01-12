<?php
/**
 * Created by thofle
 * Date: 12.01.2016
 * Time: 19.59
 */

include('./config.php');
include('./alda_db.php');

$queue_id = (isset($_GET['queue_id']) ? $_GET['queue_id'] : null);
$message = (isset($_GET['message']) ? $_GET['message'] : null);

if ($queue_id != null)
{
  $alda = new alda();

  // message can be null...
  echo $alda->setAlertClearedStatus($queue_id, $message) ? 'success' : 'error';
}
else
{
  echo 'error';
}