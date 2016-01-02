<?php
/**
 * Created by thofle
 * Date: 12/24/2015
 * Time: 4:35 PM
 */

// Design start --- NO OUTPUT BEFORE HERE
include('des_top.php');

if (!isset($_GET['page']))
{
  include('./pages/alert_dashboard.php');
}

include('des_bottom.php');