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

<div class="row-fluid round-box">
        <div class="span4">
                <div class="page-header">
                        <h4>Current music source</h4>
                </div>

                <img id="cmusic_source_loading" alt="loading" src="img/ajax-loader2.gif" />
                <div id="music_source_current">

                <form class="form-inline">
                        <label>Server Name :</label>
                        <b><span id="currentName"></span></b>
                </form>
                <form class="form-inline">
                        <label>Server IP :</label>
                        <span id="currentIP"></span>
                </form>

                </div>
        </div>

        <div class="span8">
                <div class="page-header">
                        <h4>List of music sources</h4>
                </div>
                <table id="music_source_list" class="table">
                <thead>
                <tr>
                  <th style="width: 35%">Name</th>
                  <th style="width: 20%">Version</th>
                  <th style="width: 25%">IP address</th>
                  <th style="width: 20%"></th>
                </tr>
                </thead>
                <tbody></tbody>
                </table>
                <img id="music_source_loading" alt="loading" src="img/ajax-loader.gif" />

                <table class="table">
                <tbody>
                        <tr>
                        <td style="width: 30%">Manual Media Server IP Adress</td>
                        <td style="width: 50%">
                                <div class="input-prepend">
                                <span class="add-on"><i class="icon-hdd"></i></span><input size="15" id="inputManualIP" type="text">
                                </div>
                        </td>
                        <td style="width: 20%"><button class="btn" type="button">Connect</button></td>
                        </tr>
                </tbody>
                </table>
        </div>
</div>

<h2 id="main-title">Player Name</h2>
<div id="main-title-help" class="hidden-phone">
You can give this player a name that will be used to identify the player on the Media Server web pages.</div>

<div class="row round-box">
<form class="form-inline">
        <label class="control-label" for="inputName">Player Name :</label>
        <input type="text" id="inputName" placeholder="Enna Player">
        <button id="btChangeName" type="button" class="btn btn-primary" data-loading-text="Saving...">Save changes</button>
</form>
</div>

</div>
<script src="js/enna-musicsource.js"></script>
<?php
        include('footer.php');
?>