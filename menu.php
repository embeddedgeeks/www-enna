 <?php include_once('common.php'); ?>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">Enna Box</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li<?php if (PAGE_NAV === PAGE_NAV_HOME) echo ' class="active"'; ?>><a href="index.php"><i class="icon-home"></i> Home</a></li>
              <li<?php if (PAGE_NAV === PAGE_NAV_NETWORK) echo ' class="active"'; ?>><a href="network.php"><i class="icon-wrench"></i> Network</a></li>
              <li<?php if (PAGE_NAV === PAGE_NAV_MUSIC_SOURCE) echo ' class="active"'; ?>><a href="music_source.php"><i class="icon-music"></i> Player configuration</a></li>
              <li<?php if (PAGE_NAV === PAGE_NAV_ABOUT) echo ' class="active"'; ?>><a href="about.php">About</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>