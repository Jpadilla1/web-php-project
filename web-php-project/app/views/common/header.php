<?php
  date_default_timezone_set('America/Puerto_Rico');
?>
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo Config::get('SITE_URL') ?>menu/index">Security Administration Management System</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php 
          $user = new User();
          if ($user->isLoggedIn()) {
            echo "<li><a href='". Config::get('SITE_URL') . "home/logout'>Log out</a></li>";
          }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo date('m/d/Y') ?></a></li>
        <li><a href="#"><?php echo date('h:i A', strtotime(date('m/d/Y H:i:s'))); ?></a></li>
      </ul>
    </div>
  </div>
</nav>