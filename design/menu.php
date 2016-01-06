<?php if (!isset($alda)) die(); ?>
<div id="menu">
  <ul>
    <li><a href="index.php?page=alert-dashboard">Alert Dashboard</a></li>
    <li class="category">Hosts</li>
    <?php
      foreach ($alda->getHosts() as $host)
      {
        echo '<li class="subitem"><a href="index.php?page=host&host_id='.$host['host_id'].'">'.$host['hostname'].'</a></li>';
      }
    ?>
  </ul>
</div>