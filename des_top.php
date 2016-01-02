<html>
  <head>
    <title>Alda v0.1</title>
    <script src="js/react/react.min.js"></script>
    <script src="js/react/react-dom.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
    <style type="text/css">
      body {
        background: url('img/bg_blur.jpg') center center fixed;
        background-repeat: no-repeat;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      tr.is-cleared {
        opacity:.50;
      }

      .alert-sms-icon, .alert-level-icon {
        width:16px;
      }
      table#alertOverview {
        margin-left:auto;
        margin-right: auto;
        padding:10px;
        background-color: #fefefe;
        border-radius: 2px;
        border: 3px solid rgb(180, 180, 180);
        border: 3px solid rgba(0, 0, 0, .3);
      }

      table#alertOverview td, table#alertOverview th {
        font-family: sans-serif;
        font-size: 0.95em;
      }
      table#alertOverview td {
        padding: 2px 5px 2px 5px;
      }
    </style>
  </head>
<body>
