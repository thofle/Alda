<?php
/**
 * Created by thofle
 * Date: 12/24/2015
 * Time: 4:35 PM
 */
$host_id = isset($_GET['host_id']) ? $_GET['host_id'] : null;
require_once('./design/display_functions.php');
require_once('alda_db.php');
$alda = new alda($host_id);

// Design start --- NO OUTPUT BEFORE HERE
include('./design/header.php');



if (!isset($_GET['page']) || $_GET['page'] == 'alert-dashboard')
{
  include('./pages/alert_dashboard.php');
}
else
{
  if ($_GET['page'] == 'host')
  {
    include('./pages/host_detailed.php');
  }
}

include('./design/footer.php');