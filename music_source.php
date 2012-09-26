<?php
        define('ENNA_WWW', 1);
        include_once('common.php');
        define('PAGE_NAV', PAGE_NAV_MUSIC_SOURCE);

        include('header.php');
        include('menu.php');
?>
<div class="container">

<h2 id="main-title">Music source</h2>
<div id="main-title-help" class="hidden-phone">
Select a valid Media Server where the box can connect and play your files.</div>

<div class="round-box">
        List of music sources
        <img id="music_source_loading" alt="loading" src="img/ajax-loader.gif" />

        <div id="music_source_list">

        </div>
</div>

</div>
<script src="js/enna-musicsource.js"></script>
<?php
        include('footer.php');
?>