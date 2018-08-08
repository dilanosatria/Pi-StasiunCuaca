@extends('adminlte::page')

@section('content')
<style>
thead{
  /*background-image: linear-gradient(to right, #395d92, #0088bf, #00b2ba, #00d580, #a8eb12);*/
  background-image: linear-gradient(to right, #395d92, #0083b5, #00a7ac, #00c47b, #a4d635);
  color:white;
}
</style>
  <div class="card">
    <div class="card-header">
      <h2 class="card-title">Baca Data Channel ThingSpeak API Internet Of Things</h2>
      <br>
    </div>
  </div>

  <div class="table-responsive">
    <div class="box-body">
          <table class="table table-striped table-hover" id="Komentar-table">
            <thead>
              <th>No</th>
              <th>Nama Stasiun Cuaca</th>
              <th>Channel ID</th>
              <th>Kunci API</th>
              <th>Field Temp</th>
              <th>Field Kelembaban</th>
              <th>Field Tekanan</th>
              <th>Field Cahaya</th>
              <th>Field Hujan</th>
              <th>Field Embun</th>
            </thead>
            <tbody>
              <?php $no =1;?>
              @foreach($bacadatathingspeak->sortByDesc('updated_at') as $key=> $value)
                <tr>
                  <th>{{ $no++ }}</th>
                  <td>{{ $value->nama }}</td>
                  <td style="word-wrap: break-word;min-width: 50px;max-width: 50px;">{{ $value->channel_ts }}</td>
                  <td style="word-wrap: break-word;min-width: 130px;max-width: 130px;">{{ $value->kunci_api_publik }}</td>
                  <td style="word-wrap: break-word;min-width: 35px;max-width: 35px;">{{ $value->field_temp }}</td>
                  <td style="word-wrap: break-word;min-width: 35px;max-width: 35px;">{{ $value->field_kelembaban }}</td>
                  <td style="word-wrap: break-word;min-width: 35px;max-width: 35px;">{{ $value->field_tekanan }}</td>
                  <td style="word-wrap: break-word;min-width: 35px;max-width: 35px;">{{ $value->field_cahaya }}</td>
                  <td style="word-wrap: break-word;min-width: 35px;max-width: 35px;">{{ $value->field_hujan }}</td>
                  <td style="word-wrap: break-word;min-width: 35px;max-width: 35px;">{{ $value->field_embun }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
  </div>

        <h4 class="card-title">Baca Data Channel Dengan Kunci API Publik</h4>
          <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="collapse" id="channel-panel-config">
                            <div class="input-group">
                                <span class="input-group-addon">User API Key</span>
                                <input type="text" class="form-control channel-form" id="user_api_key">
                            </div>
                            <div style="height:10px"></div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon">Tag Channel</span>
                            <input type="search" class="form-control channel-form" id="tag" placeholder="Filter menurut tag channel">
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <button type="button" class="btn btn-primary" onClick="refreshChannels()" id="refresh_channels">
                            <span class="glyphicon glyphicon-refresh"></span>
                        </button>
                        <span style="float:right">
                            <button type="button" class="btn btn-default" onClick="toggleConfigureChannelPanel(this)" id="configure-channel-panel">
                                <span class="glyphicon glyphicon-cog"></span> Pengaturan
                            </button>
                            <button type="button" class="btn btn-link" onClick="toggleChannelPanel(this)" id="toggle-channel-panel">
                                <span class="glyphicon glyphicon-menu-down"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="panel-collapse collapse" id="channel-panel">
                <div class="panel-body">
                    <h3 id="channels-header"></h3>

                    <div class="well text-muted" id="user-api-prompt" onClick="showConfigureChannelPanel();" style="margin:-1em 0 -1em 0">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <span>Masukkan Kunci API Pengguna untuk Melihat Channel.</span>
                        <a href="https://thingspeak.com/account/profile" target="_blank">(Klik disini untuk login ke ThingSpeak)</a>
                    </div>

                    <table class="table table-striped" id="channels"></table>
                </div>
            </div>
        </div>
        <br>
        <h4 class="card-title">Baca Data Channel Dengan ID Channel Pengguna</h4>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="input-group">
                            <span class="input-group-addon">Channel ThingSpeak</span>
                            <input type="text" class="form-control feed-form" id="channel">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <span class="input-group-addon">Kunci API (Read)</span>
                            <input type="text" class="form-control feed-form" id="read_api_key">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-default" onClick="includeLocation(this)" id="location">
                            <span class="glyphicon glyphicon-unchecked"></span> Field Lokasi IoT
                        </button>

                        <button type="button" class="btn btn-default" onClick="includeStatus(this)" id="status">
                            <span class="glyphicon glyphicon-unchecked"></span> Field Status IoT
                        </button>

                        <button type="button" class="btn btn-primary" onClick="playPause(this)" id="start">
                            <span class="glyphicon glyphicon-play"></span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <h1 id="header"></h1>

                <table class="table table-striped" id="output"></table>
            </div>
        </div>

@endsection

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script type="text/javascript">
        // setup time for updates
        var updates = null;
        // setup IoT service details and defaults
        var thingspeak = {};
        // check local storage for thingspeak
        if (localStorage.getItem('thingspeak')) {
            thingspeak = JSON.parse(localStorage.getItem('thingspeak'));
        }
        else {
            // set thingspeak
            thingspeak['url'] = 'https://api.thingspeak.com';
            thingspeak['channel'] = 9;
            thingspeak['read_api_key'] = ''; //GM7T1VBPSLT5EV0L
            thingspeak['results'] = 5;
            thingspeak['location'] = false;
            thingspeak['status'] = false;
            thingspeak['start'] = false;
            // save to local storage
            localStorage.setItem('thingspeak', JSON.stringify(thingspeak));
        }
        $(document).ready(function() {
            // set default inputs
            $('#channel').val(thingspeak['channel']);
            $('#read_api_key').val(thingspeak['read_api_key']);
            $('#user_api_key').val(thingspeak['user_api_key']);
            $('#tag').val(thingspeak['tag']);
            if (thingspeak['location']) {
                $('#location').find(".glyphicon").removeClass("glyphicon-unchecked").addClass("glyphicon-check");
            }
            if (thingspeak['status']) {
                $('#status').find(".glyphicon").removeClass("glyphicon-unchecked").addClass("glyphicon-check");
            }
            if (thingspeak['start']) {
                $('#start').find(".glyphicon").removeClass("glyphicon-play").addClass("glyphicon-pause");
            }
            // when feed inputs change update params and clear output
            $( ".feed-form" ).change(updateFeedParams);
            // when channel inputs change update params
            $( ".channel-form" ).change(updateChannelParams);
            // start updates if play button is active
            if (thingspeak['start']) {
                // start updates
                getUpdates();
                // check for new updates
                updates = setInterval('getUpdates()',5000);
            }
            // check if a user api key is available
            if (thingspeak['user_api_key']) {
                // hide user key prompt and load channels
                $('#user-api-prompt').hide();
                refreshChannels();
            }
            else {
                // show channel config panel
                showConfigureChannelPanel();
            }
        });
        function updateFeedParams() {
            // update params
            thingspeak['channel'] = $('#channel').val();
            thingspeak['read_api_key'] = $('#read_api_key').val();
            // save to local storage
            localStorage.setItem('thingspeak', JSON.stringify(thingspeak));
            // clear output
            $('#header').html('');
            $('#output').html('');
        }
        function updateChannelParams() {
            if (!thingspeak['user_api_key'] && $('#user_api_key').val()) {
                // hide API key panel
                hideConfigureChannelPanel();
            }
            // update params
            thingspeak['user_api_key'] = $('#user_api_key').val();
            thingspeak['tag'] = $('#tag').val();
            // check if user api key is present
            if (thingspeak['user_api_key']) {
                // hide prompt to enter key
                $('#user-api-prompt').hide();
                // refresh channels
                refreshChannels();
                // expand channel panel
                showChannelPanel();
            } else {
                // clear display
                $('#channels-header').html('');
                $('#channels').html('');
                // show prompt to enter key
                $('#user-api-prompt').show();
                if (thingspeak['tag']) {
                    // show API key panel
                    showConfigureChannelPanel();
                }
            }
            // save to local storage
            localStorage.setItem('thingspeak', JSON.stringify(thingspeak));
        }
        function getUpdates() {
            // get the data with a webservice call
            $.getJSON( thingspeak['url'] + '/channels/' + thingspeak['channel'] + '/feed.json?results=' + thingspeak['results'] + '&location=' + thingspeak['location'] + '&status=' + thingspeak['status'] + '&api_key=' + thingspeak['read_api_key'], function( data ) {
                // create table and headers if channel object exists
                if (data.channel) {
                    // set headers
                    $('#header').html('<b>' + data.channel.name + '</b>');
                    // create table head and body if they do not exist
                    if ($('#output').find('thead').length == 0) {
                        // add head to output table
                        $('#output').append("<thead><tr></tr></thead>");
                        // add date/time field as header
                        $('#output').find('thead').append("<th>Update Time</th>");
                        // add header for each field
                        if (data.channel.hasOwnProperty('field1')) { $('#output').find('thead').append("<th>Field 1</th>"); }
                        if (data.channel.hasOwnProperty('field2')) { $('#output').find('thead').append("<th>Field 2</th>"); }
                        if (data.channel.hasOwnProperty('field3')) { $('#output').find('thead').append("<th>Field 3</th>"); }
                        if (data.channel.hasOwnProperty('field4')) { $('#output').find('thead').append("<th>Field 4</th>"); }
                        if (data.channel.hasOwnProperty('field5')) { $('#output').find('thead').append("<th>Field 5</th>"); }
                        if (data.channel.hasOwnProperty('field6')) { $('#output').find('thead').append("<th>Field 6</th>"); }
                        if (data.channel.hasOwnProperty('field7')) { $('#output').find('thead').append("<th>Field 7</th>"); }
                        if (data.channel.hasOwnProperty('field8')) { $('#output').find('thead').append("<th>Field 8</th>"); }
                        // add location fields if included
                        if (thingspeak['location']) {
                            $('#output').find('thead').append("<th>Latitude</th>");
                            $('#output').find('thead').append("<th>Longitude</th>");
                            $('#output').find('thead').append("<th>Elevation</th>");
                        }
                        // add status field if included
                        if (thingspeak['status']) {
                            $('#output').find('thead').append("<th>Status</th>");
                        }
                        // add body to output table
                        $('#output').append("<tbody></tbody>");
                    }
                }
                // if the field1 has data update the page
                if (data.feeds) {
                    // go through each feed and add it to the top of the table if the row does not exist
                    $.each( data.feeds, function( i, feed ) {
                        // add entry to table if it does not exist
                        if ($('#output').find('#entry_' + feed.entry_id).length === 0) {
                            // create a new blank row
                            var $new_row = $("<tr id='entry_" + feed.entry_id + "' class='feed-row'></tr>");
                            // add time/date data to field
                            $new_row.append("<td><time datetime='" + feed.created_at + "'>" + feed.created_at + "</time></td>");
                            // add field data to each field
                            if (feed.hasOwnProperty('field1')) { $new_row.append(getTableElement(feed.field1)); }
                            if (feed.hasOwnProperty('field2')) { $new_row.append(getTableElement(feed.field2)); }
                            if (feed.hasOwnProperty('field3')) { $new_row.append(getTableElement(feed.field3)); }
                            if (feed.hasOwnProperty('field4')) { $new_row.append(getTableElement(feed.field4)); }
                            if (feed.hasOwnProperty('field5')) { $new_row.append(getTableElement(feed.field5)); }
                            if (feed.hasOwnProperty('field6')) { $new_row.append(getTableElement(feed.field6)); }
                            if (feed.hasOwnProperty('field7')) { $new_row.append(getTableElement(feed.field7)); }
                            if (feed.hasOwnProperty('field8')) { $new_row.append(getTableElement(feed.field8)); }
                            // add location data if included
                            if (thingspeak['location']) {
                                $new_row.append("<td>" + feed.latitude + "</td>");
                                $new_row.append("<td>" + feed.longitude + "</td>");
                                $new_row.append("<td>" + feed.elevation + "</td>");
                            }
                            // add status data if included
                            if (thingspeak['status']) {
                                $new_row.append("<td>" + feed.status + "</td>");
                            }
                            // add the row to the table
                            $('#output').prepend($new_row);
                            // set the background color to green
                            $new_row.css('background-color', '#efe');
                            // remove the background color after 500ms
                            // css transitions are used with the feed-row class to make this smooth
                            setTimeout(function() {
                                $new_row.css('background-color', '');
                            }, 500);
                        }
                    });
                }
            });
        }
        function getTableElement(content) {
            // create a table element containing the given content
            var $td = $('<td>' + content + '</td>');
            // regex pattern to match RGB hex values
            // remove preceding ^ to match colors within text
            var rgbPattern = /^#(([a-f\d]{2}){3})$/i;
            // check content for a color
            if (rgbPattern.test(content)) {
            // extract that color
            var color = rgbPattern.exec(content)[0];
            // mark the cell as a rgb-cell for the CSS transitions
            $td.addClass('rgb-cell');
            // set the cell's background color to the hex color
            $td.css('background-color', color);
            // determine whether to set the font to white or black depending on the hex color
            $td.css('color', useDarkFont(color) ? '#000' : '#fff');
            // remove background and text color when hovering and restore when mouse exits
            $td.hover(
                function() {
                    $td.css('background-color', '');
                    $td.css('color', '');
                },
                function() {
                    $td.css('background-color', color);
                    $td.css('color', useDarkFont(color) ? '#000' : '#fff');
                });
            }
            return $td;
        }
        function refreshChannels() {
            var tagQuery = thingspeak['tag'] ? '&tag=' + encodeURIComponent(thingspeak['tag']) : '';
            $.getJSON( thingspeak['url'] + '/channels.json?api_key=' + thingspeak['user_api_key'] + tagQuery, function( data ) {
                // clear old channel data
                $('#channels').empty();
                if (data.length > 0) {
                    // set channel header including tag if present
                    $('#channels-header').html('Channels' + (thingspeak['tag'] ? ' with Tag: ' + thingspeak['tag'] : ''));
                } else {
                    // set channel header including tag if present
                    $('#channels-header').html('No Channels Found' + (thingspeak['tag'] ? ' with Tag: ' + thingspeak['tag'] : ''));
                    // return so no table is drawn
                    return;
                }
                // add a row for each channel
                $.each( data, function( i, channel ) {
                    // create a new row
                    var $new_item = $("<li class='list-group-item channel-row'></li>");
                    $new_item.append($('<div class="text-muted" style="float:right">ID: ' + channel.id + '<br />' + (channel.public_flag ? 'Public' : 'Private') + '</div>'))
                    var $title = $('<span></span>');
                    // create the channel name link element
                    var $title_link = $('<h4 class="list-group-item-heading"><a href="#">' + channel.name + '</a></h4>');
                    // add an onClick event to the name link
                    $title_link.click(function( event ) {
                        // prevent navigation
                        event.preventDefault();
                        // find channel's read key
                        var readKey = channel.api_keys.find(function ( key ) {
                            return key.write_flag;
                        })
                        // update forms with this channel's id and key
                        $('#channel').val(channel.id);
                        $('#read_api_key').val(readKey.api_key);
                        // update configuration
                        updateFeedParams();
                        // collapse channels panel
                        hideChannelPanel();
                        // start fetching updates
                        play();
                    })
                    $title.append($title_link);
                    // add channel name to row
                    $new_item.append($title);
                    // wrap tag links and add icon
                    var $tag_item = $('<p class="list-group-item-text"><span class="glyphicon glyphicon-tags" />&nbsp;&nbsp;</p>');
                    $tag_item.append(listTags(channel.tags));
                    // add placeholder if no tags are present
                    if (channel.tags.length === 0) {
                        $tag_item.append('<span class="text-muted">None</span>')
                    }
                    // add tag links to row
                    $new_item.append($tag_item);
                    if (channel.description && channel.description !== "") {
                        $new_item.append($('<div class="text-muted">' + channel.description + '</div>'));
                    }
                    // add the row to the table
                    $('#channels').append($new_item);
                });
            });
        }
        function listTags(tags) {
            // create the list container
            var $list = $('<span></span>');
            // iterate through each tag
            $.each(tags, function ( i, tag ) {
                // create a link with the tag's name
                var $link = $('<a href="#">' + tag.name + '</a>');
                // make the tag bold if it's the currently searched tag
                if (tag.name.toUpperCase() === thingspeak['tag'].toUpperCase()) {
                    $link.css("font-weight","Bold");
                }
                // add an onClick event that filters the user's channels by tag
                $link.click(function ( event ) {
                    event.preventDefault();
                    $('#tag').val(tag.name);
                    updateChannelParams();
                });
                // add the tag to the list with a comma if it isn't the last tag
                $list.append($link).append($('<span>' + (i < tags.length - 1 ? ', ' : '') + '</span>'));
            })
            return $list;
        }
        // tweaked from https://stackoverflow.com/questions/1855884/determine-font-color-based-on-background-color
        function useDarkFont(color) {
          // regex to separate RGB components
          var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(color);
          // Counting the perceptive luminance - human eye favors green color...
          var a = 1 - ( 0.299 * parseInt(result[1], 16) + 0.587 * parseInt(result[2], 16) + 0.114 * parseInt(result[3], 16)) / 255;
          return a < 0.5;
        }
        // start / stop updates
        function playPause(button) {
            // switch button state and start or stop updates
            if ($(button).find(".glyphicon").hasClass("glyphicon-pause")) {
                pause();
            }
            else {
                play();
            }
        }
        function pause() {
            // show play button state
            if ($("#start").find(".glyphicon").hasClass("glyphicon-pause")) {
                $("#start").find(".glyphicon").removeClass("glyphicon-pause").addClass("glyphicon-play");
            }
            // update params
            thingspeak['start'] = false;
            // stop updates
            clearInterval(updates);
            // save to local storage
            localStorage.setItem('thingspeak', JSON.stringify(thingspeak));
        }
        function play() {
            // show pause button state
            if ($("#start").find(".glyphicon").hasClass("glyphicon-play")) {
                $("#start").find(".glyphicon").removeClass("glyphicon-play").addClass("glyphicon-pause");
            }
            // update params
            thingspeak['start'] = true;
            // start updates
            getUpdates();
            // check for new updates
            updates = setInterval('getUpdates()',5000);
            // save to local storage
            localStorage.setItem('thingspeak', JSON.stringify(thingspeak));
        }
        // option to include location data
        function includeLocation(button) {
            // switch button state and change API request
            if ($(button).find(".glyphicon").hasClass("glyphicon-unchecked")) {
                // show checked button state
                $(button).find(".glyphicon").removeClass("glyphicon-unchecked").addClass("glyphicon-check");
                // update params
                thingspeak['location'] = true;
                // clear output table
                $('#output').html('');
            }
            else {
                // show unchecked button state
                $(button).find(".glyphicon").removeClass("glyphicon-check").addClass("glyphicon-unchecked");
                // update params
                thingspeak['location'] = false;
                // clear output table
                $('#output').html('');
            }
            // save to local storage
            localStorage.setItem('thingspeak', JSON.stringify(thingspeak));
        }
        // option to include status data
        function includeStatus(button) {
            // switch button state and change API request
            if ($(button).find(".glyphicon").hasClass("glyphicon-unchecked")) {
                // show checked button state
                $(button).find(".glyphicon").removeClass("glyphicon-unchecked").addClass("glyphicon-check");
                // update params
                thingspeak['status'] = true;
                // clear output table
                $('#output').html('');
            }
            else {
                // show unchecked button state
                $(button).find(".glyphicon").removeClass("glyphicon-check").addClass("glyphicon-unchecked");
                // update params
                thingspeak['status'] = false;
                // clear output table
                $('#output').html('');
            }
            // save to local storage
            localStorage.setItem('thingspeak', JSON.stringify(thingspeak));
        }
        // toggle for channel info panel
        function toggleChannelPanel(button) {
            // switch button state and show/hide panel
            if ($(button).find(".glyphicon").hasClass("glyphicon-menu-down")) {
                // call helper show function
                showChannelPanel();
            }
            else {
                // call helper hide function
                hideChannelPanel();
            }
        }
        function showChannelPanel() {
            // show minus button state
            $('#toggle-channel-panel').find(".glyphicon").removeClass("glyphicon-menu-down").addClass("glyphicon-menu-up");
            // show panel
            $('#channel-panel').collapse('show');
        }
        function hideChannelPanel() {
            // show plus button state
            $('#toggle-channel-panel').find(".glyphicon").removeClass("glyphicon-menu-up").addClass("glyphicon-menu-down");
            // hide panel
            $('#channel-panel').collapse('hide');
        }
        function toggleConfigureChannelPanel() {
            // toggle channel panel configuration
            $('#channel-panel-config').collapse('toggle');
        }
        function showConfigureChannelPanel() {
            // show channel panel configuration
            $('#channel-panel-config').collapse('show');
        }
        function hideConfigureChannelPanel() {
            // hide channel panel configuration
            $('#channel-panel-config').collapse('hide');
        }
      </script>
@endsection
