<?php
/**
 * Created by thofle
 * Date: 06.01.2016
 * Time: 21.40
 */
if (!isset($alda)) die();

des_hostUptime($alda->getHostUptime());
des_showLoginTable($alda->getHostLogins(10));
