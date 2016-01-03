<?php
/**
 * Created by thofle
 * Date: 12/24/2015
 * Time: 4:31 PM
 */

class alda
{
  private $db_handle = null;

  function __construct()
  {
    include('config.php');
    $dsn = 'mysql:host=' . $_DB['server'] . ';dbname=' . $_DB['database'] . ';port=' . $_DB['port'];
    $this->db_handle = new PDO($dsn, $_DB['username'], $_DB['password']);
  }

  function getAlertOverview()
  {
    $query = <<<EOL
SELECT
	queue_id
  ,hostname
  ,message
  ,is_sms_sent
	,num_sms_recipients
  ,is_cleared
  ,cleared_message
  ,level
  ,date_created
  ,date_cleared
FROM
  v_al_dashboard
LIMIT 100;
EOL;

    $handle = $this->db_handle->query($query);
    $result = $handle->fetchAll(PDO::FETCH_NAMED);
    return $result;
  }

  function getLastLogins()
  {
    $query = <<<EOL
SELECT
  host_id
  ,username
  ,remote_addr
  ,login_timestamp
FROM
  sd_logins
ORDER BY
  login_timestamp DESC
LIMIT 100;
EOL;

    $handle = $this->db_handle->query($query);
    $result = $handle->fetchAll(PDO::FETCH_NAMED);
    return $result;
  }
}