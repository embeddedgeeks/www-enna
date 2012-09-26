<?php
        define('ENNA_WWW', 1);
        include_once('common.php');
        define('PAGE_NAV', PAGE_NAV_HOME);

        include('header.php');
        include('menu.php');
?>
<div class="container">

<div class="hero-unit">
        <h1>Welcome to the configuration page!</h1>
        <p>This web page will help you configure your <?php echo $config['product_name']; ?>, from network connection to audio configuration.</p>
        <p>You can start the wizzard to help configure your device for the first time.</p>
        <p><a class="btn btn-primary btn-large">Configure &raquo;</a></p>
</div>

<div class="row">
<div class="span4">
          <h2>Network</h2>
          <p>Current network configuration:</p>
          <p><a class="btn" href="network.php">View details &raquo;</a></p>
</div>
        <div class="span4">
          <h2>Media Source</h2>
          <p>Current Media source:</p>
          <p><a class="btn" href="music_source.php">View details &raquo;</a></p>
       </div>
</div>

</div>
<?php
        include('footer.php');
?>