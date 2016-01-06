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