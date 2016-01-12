<div id="adcontainer"></div>
<script type="text/babel">
  var AlertHandler = React.createClass({
      updateState: function(){
        var _this = this;
        $.getJSON( "./json_api.php").success(function (data) {

          _this.setState({data: data, nextupdate: _this.props.updateInterval});
        });
      },
      timerTick: function() {
        this.setState({nextupdate: this.state.nextupdate - 1});
        if (this.state.nextupdate == 0)
        {

          this.updateState();
        }
      },
      getInitialState: function(){
        return {
          data: this.props.initialData,
          nextupdate: this.props.updateInterval
        }
      },
      componentDidMount: function() {
        setInterval(this.timerTick, 1000);
      },
      render: function() {
        var servers = this.state.data.map(function(i){

            var classString = "alertView";
            classString = classString + (i.is_cleared == 0 ? ' is-not-cleared' : ' is-cleared');
            classString = classString + ' level-' + i.level.toLowerCase();
            var level_icon_src = 'img/level-' + i.level.toLowerCase() + '.png';
            var sms_icon_src = 'img/sms-';

            if (i.is_cleared == 0)
            {
              var message_content = '<a onclick="showMessageBox(' + i.queue_id + ')" href="javascript:void(0);">' + i.message +'</a>';
            }
            else
            {
              var message_content = i.message
            }

            switch (i.is_sms_sent)
            {
              case '0': sms_icon_src = sms_icon_src + 'not-sent'; break;
              case '1': sms_icon_src = sms_icon_src + 'sent'; break;
              default: sms_icon_src = sms_icon_src + 'no'; break;
            }

            sms_icon_src = sms_icon_src + '.png';

            return (
              <tr className={classString}>
              <td><img src={level_icon_src} className="alert-level-icon" /></td>
              <td><img src={sms_icon_src} className="alert-sms-icon" /></td>
              <td>{i.hostname}</td>
          <td dangerouslySetInnerHTML={{__html: message_content}}></td>
      <td>{i.date_created}</td>
    <td>{i.date_cleared}</td>
  </tr>
  );
  });
  return (
    <div>
    <table id="alertOverview">
    <tr>
    <th></th>
    <th></th>
    <th>Hostname</th>
    <th>Message</th>
    <th>Alert Created</th>
  <th>Cleared</th>
  </tr>
  {servers}
  </table>
  <div className="nu">Next update in: {this.state.nextupdate}</div></div>
  );
  }
  });

  $.getJSON( "json_api.php").success(function (data) {

    React.render(<AlertHandler initialData={data} updateInterval="60" />, document.getElementById('adcontainer'));
  });
</script>


<div id="overlay">
  <div id="messageBox">


  </div>
</div>

<script>
  // ajax stuff
  function clearAlert(queue_id)
  {
    var message = document.getElementById('input_message').value;
    $.get("ajax.php?queue_id=" + queue_id + "&message=" + message);
    hideMessageBox();
  }

  function showMessageBox(queue_id)
  {
    var div = document.getElementById('messageBox');

    div.innerHTML = '<a onclick="hideMessageBox()" href="javascript:void(0);" style="position: relative; float:left;">[x]</a>';
    div.innerHTML = div.innerHTML + 'Clear message: <input type="text" id="input_message"><br />';
    div.innerHTML = div.innerHTML + '<input type="button" onclick="clearAlert(' + queue_id + ')" value="Clear" />';

    el = document.getElementById("overlay");
    el.style.visibility = "visible";
    document.getElementById('input_message').focus();
  }

  function hideMessageBox()
  {
    el = document.getElementById("overlay");
    el.style.visibility = "hidden";
    location.reload();
  }
</script>