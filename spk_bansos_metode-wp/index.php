<?php
	session_start();
	include('configdb.php');
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title><?php echo $_SESSION['judul']." - ".$_SESSION['by'];?></title>

    <!-- Bootstrap core CSS -->
    <!--link href="ui/css/bootstrap.css" rel="stylesheet"-->
	<link href="ui/css/cerulean.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="./index_files/ie-emulation-modes-warning.js"></script-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .navbar {
        background-color: #2c3e50;
        border: none;
        border-radius: 0;
    }
    .navbar-brand, .navbar-nav li a {
        color: #ecf0f1 !important;
        font-size: 18px;
        font-family: 'Open Sans', sans-serif;
    }
    .navbar-brand {
        font-size: 24px;
    }
    .navbar-nav li a:hover {
        background-color: #34495e !important;
    }
    .panel {
        border-radius: 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .panel-heading {
        background-color: #2980b9 !important;
        color: #fff !important;
        border-radius: 0;
    }
    .panel-footer {
        background-color: #2980b9 !important;
        color: #fff !important;
        border-radius: 0;
    }
    h2 {
        margin-top: 0;
        font-family: 'Open Sans', sans-serif;
    }
    .text-primary {
        color: #2980b9 !important;
    }
    .panel-body h3, .panel-body h2 {
        margin-top: 0;
        font-family: 'Open Sans', sans-serif;
    }
    .hero-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 20px auto;
    }
    @media (max-width: 768px) {
        .navbar-header {
            float: none;
        }
        .navbar-toggle {
            display: block;
        }
        .navbar-collapse {
            border-top: 1px solid transparent;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
        }
        .navbar-collapse.collapse {
            display: none!important;
        }
        .navbar-nav {
            float: none!important;
            margin-top: 7.5px;
        }
        .navbar-nav>li {
            float: none;
        }
        .navbar-nav>li>a {
            padding-top: 10px;
            padding-bottom: 10px;
        }
    }
</style>

    </style>

  </head>

  <body>
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><b><?php echo $_SESSION['judul'];?></b></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse pull-right">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="kriteria.php">Data Kriteria</a></li>
              <li><a href="alternatif.php">Data Alternatif</a></li>
			        <li><a href="analisa.php">Analisa</a></li>
              <li><a href="perhitungan.php">Perhitungan</a></li>
			      </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
		<div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading"><b>Selamat Datang</b></div>
		  <div class="panel-body">
			<h3><p align="center" class="text-primary" ><?php echo $_SESSION['welcome'];?></p></h3>

			<center>
				<h2 style="color:#2980b9; font-family:'arial black'" >PENERIMA BANTUAN SOSIAL<br/>  <br/> </h2>
			<img src="hero_dtks.png" alt="skuyy" height="300" width="637.5" >
		</center>
		  </div>

		  <!-- Table -->
		  <table class="table">
		  </table>
		  <div class="panel-footer text-primary text-right"><b><?php echo $_SESSION['by'];?></b><div class="pull-right"></div></div>
		</div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="ui/js/jquery-1.10.2.min.js"></script>
	<script src="ui/js/bootstrap.min.js"></script>
	<script src="ui/js/bootswatch.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>

</body></html>
