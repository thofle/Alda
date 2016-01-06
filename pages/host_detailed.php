<?php
/**
 * Created by thofle
 * Date: 06.01.2016
 * Time: 21.40
 */
if (!isset($alda)) die();

$logins = $alda->getHostLogins(10);


des_showLoginTable($logins);