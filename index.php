<?php
/**
 * Created by thofle
 * Date: 12/24/2015
 * Time: 4:35 PM
 */
require_once('alda_db.php');
$alda = new alda();
// Design start --- NO OUTPUT BEFORE HERE
include('./design/header.php');



if (!isset($_GET['page']) || $_GET['page'] == 'alert-dashboard')
{
  include('./pages/alert_dashboard.php');
}

include('./design/footer.php');