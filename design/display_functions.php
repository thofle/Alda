<?php
/**
 * Created by thofle
 * Date: 06.01.2016
 * Time: 22.04
 */

function des_showLoginTable($logins)
{
  echo '<table class="hostLogins">';
  echo '<tr><th>Username</th><th>Source</th><th>Date</th></tr>';
  foreach ($logins as $login)
  {
    echo '<tr>';
    echo '<td>'.htmlentities($login['username']).'</td>';
    echo '<td>'.$login['remote_addr'].'</td>';
    echo '<td>'.$login['timestamp'].'</td>';
    echo '</tr>';
  }
  echo '</table>';
}

function des_hostUptime($uptime_h)
{
  $uptime = '';

  $days = floor($uptime_h / 24);
  $hours = ($uptime_h % 24);

  if ($days == 0)
  {
    if ($hours == 0)
      $uptime = 'Less than one hour';
    else
      $uptime = $hours . ' hour(s)';
  }
  else
  {
    $uptime = $days . ' day(s)';
    if ($hours > 0)
      $uptime .= ' ' . $hours . ' hour(s)';
  }

  echo '<p class="uptime">Uptime: <span class="uptime">' . $uptime . '</span></p>';
}