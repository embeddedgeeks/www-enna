
$(document).ready(function()
{
        $.ajax({
                url: 'action.php',
                type: 'POST',
                data: '{ "action": "music_source", "cmd": "list" }',
                success: function (data) {
                        $("#music_source_loading").hide();
                        for (var i = 0; i < data.result.length; i++) {

                                var row = '<tr>';
                                row += '<td><b>' + data.result[i]['name'] + '</b></td>';
                                row += '<td>' + data.result[i]['version'] + '</td>';
                                row += '<td>' + data.result[i]['ip'] + '</td>';
                                row += '<td><button class="btn" type="button">Connect</button></td>';
                                row += '</tr>';

                                $('#music_source_list > tbody:last').append(row);
                        }
                }
        });

        $.ajax({
                url: 'action.php',
                type: 'POST',
                data: '{ "action": "music_source", "cmd": "current" }',
                success: function (data) {
                        $("#cmusic_source_loading").hide();

                        $("#inputName").val(data.result['playerName']);
                        $("#currentIP").html(data.result['ip']);
                        $("#currentName").html(data.result['name']);
                }
        });

        $("#btChangeName").click(function ()
        {
                var btn = $(this);
                btn.button('loading');
                $.ajax({
                        url: 'action.php',
                       type: 'POST',
                       data: '{ "action": "music_source", "cmd": "setName", "value": "' + $("#inputName").val() + '" }',
                       success: function (data) {
                               setTimeout(function () {
                                       btn.button('reset')
                               }, 1000)
                       }
        });
        });
});
