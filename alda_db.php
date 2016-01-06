<?php
/**
 * Created by thofle
 * Date: 12/24/2015
 * Time: 4:31 PM
 */

class alda
{
  private $db_handle = null;
  private $host_id;

  function __construct($host_id = null)
  {
    if ($host_id != null)
      $this->host_id = $this->validateNumber($host_id, false);

    include('config.php');
    $dsn = 'mysql:host=' . $_DB['server'] . ';dbname=' . $_DB['database'] . ';port=' . $_DB['port'];
    $this->db_handle = new PDO($dsn, $_DB['username'], $_DB['password']);
  }

  function simpleQueryResult($query)
  {
    // for simle queries without params
    $handle = $this->db_handle->query($query);
    return $handle->fetchAll(PDO::FETCH_NAMED);
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

    return $this->simpleQueryResult($query);
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

    return $this->simpleQueryResult($query);
  }

  function getHostLogins($num = 10, $offset = 0)
  {
    if ($this->host_id === false)
      return 'invalid host_id';

    $query = <<<EOL
SELECT
  host_id
  ,username
  ,remote_addr
--  ,login_timestamp
  ,DATE_FORMAT(login_timestamp, '%d.%m.%y %H:%i:%s') AS timestamp
FROM
  sd_logins
WHERE
  host_id = :host_id
ORDER BY
  login_timestamp DESC
LIMIT :num OFFSET :offset;
EOL;

    $num = $this->validateNumber($num, 10, 1, 100);
    $offset = $this->validateNumber($offset, 0, 0);

    $handle = $this->db_handle->prepare($query);
    $handle->bindParam(':host_id', $this->host_id, PDO::PARAM_INT);
    $handle->bindParam(':offset',  $offset, PDO::PARAM_INT);
    $handle->bindParam(':num', $num, PDO::PARAM_INT);
    $handle->execute();
    return $handle->fetchAll(PDO::FETCH_NAMED);
  }

  function validateNumber($number, $invalid_value, $min = 0, $max = 99999999999)
  {
    if (is_numeric($number) && $number >= $min && $number <= $max)
      return $number;
    else
      return $invalid_value;
  }

  function getHosts()
  {
    $query = <<<EOL
SELECT
  host_id
  ,hostname
FROM
  sd_hosts
ORDER BY
  hostname ASC;
EOL;

    return $this->simpleQueryResult($query);
  }

}