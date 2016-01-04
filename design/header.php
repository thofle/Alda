<html>
  <head>
    <title>Alda v0.1</title>
    <script src="./js/react/react.min.js"></script>
    <script src="./js/react/react-dom.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
    <style type="text/css">
      body {
        background: url('./img/bg_blur.jpg') center center fixed;
        background-repeat: no-repeat;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        text-align:center;
      }

      tr.is-cleared {
        opacity:.50;
      }

      .alert-sms-icon, .alert-level-icon {
        width:16px;
      }
      div#container {
        margin-left:auto;
        margin-right: auto;
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

      div#menu, div#content {
        float:left;
      }

      #content {
        padding:10px;
        border-left: 1px dashed #ccc;
      }

      #container {
        text-align: left;
        display:inline-block;
        clear:both;
      }

      div#menu ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
      }

      div#menu li {
        padding:5px 10px 5px 10px;
      }

      div#menu li a {
        display:block;
        font-family: sans-serif;
        font-size: 0.95em;
        text-decoration: none;
      }

      div#menu li:hover {
        background-color: #ddd;
      }
    </style>
  </head>
<body>
<div id="container">
<?php include('./design/menu.php'); ?>
<div id="content">
