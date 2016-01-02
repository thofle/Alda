<?php
require_once('alda_db.php');
$alda = new alda();
echo json_encode($alda->getAlertOverview());