<?php
session_start();
include('configdb.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kriteria = $_POST['kriteria'];
    $kepentingan = $_POST['kepentingan'];
    $cost_benefit = $_POST['cost_benefit'];

    if ($stmt = $mysqli->prepare("INSERT INTO kriteria (kriteria, kepentingan, cost_benefit) VALUES (?, ?, ?)")) {
        $stmt->bind_param("sss", $kriteria, $kepentingan, $cost_benefit);
        $stmt->execute();
        $stmt->close();
        header('Location: kriteria.php');
        exit();
    } else {
        echo "Error: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?php echo $_SESSION['judul']." - ".$_SESSION['by'];?></title>
    <link href="ui/css/cerulean.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin-top: 20px;
        }
        .navbar {
            background-color: #2c3e50;
            border: none;
            border-radius: 0;
        }
        .navbar-brand, .navbar-nav li a {
            color: #ecf0f1 !important;
            font-size: 18px;
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
        .panel-body {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 0;
        }
        .btn {
            border-radius: 10px; 
            font-size: 16px;
            padding: 10px 20px;
        }
        .btn-info {
            background-color: #3498db;
            border-color: #3498db;
        }
        .btn-info:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
        }
        .btn-warning:hover {
            background-color: #e67e22;
            border-color: #e67e22;
        }
        .btn-primary {
            background-color: #2ecc71;
            border-color: #2ecc71;
        }
        .btn-primary:hover {
            background-color: #27ae60;
            border-color: #27ae60;
        }
        .panel-footer {
            background-color: #2980b9 !important;
            color: #fff !important;
            border-radius: 0;
            padding: 10px 20px;
        }
        .panel-footer a {
            color: #fff;
            text-decoration: none;
        }
        .panel-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="kriteria.php">Data Kriteria</a></li>
                    <li><a href="alternatif.php">Data Alternatif</a></li>
                    <li><a href="analisa.php">Analisa</a></li>
                    <li><a href="perhitungan.php">Perhitungan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading"><b>Tambah Data Kriteria</b></div>
            <div class="panel-body">
                <form role="form" method="post" action="add-kriteria.php">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="kriteria">Kriteria</label>
                            <input type="text" class="form-control" name="kriteria" id="kriteria" placeholder="Kriteria" required>
                        </div>
                        <div class="form-group">
                            <label for="kepentingan">Kepentingan</label>
                            <input type="text" class="form-control" name="kepentingan" id="kepentingan" placeholder="Kepentingan" required>
                        </div>
                        <div class="form-group">
                            <label for="cost_benefit">Cost / Benefit</label>
                            <input type="text" class="form-control" name="cost_benefit" id="cost_benefit" placeholder="Cost / Benefit" required>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-info">Reset</button>
                        <a href="kriteria.php" type="cancel" class="btn btn-warning">Batal</a>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
            <div class="panel-footer text-primary text-right"><b><?php echo $_SESSION['by'];?></b></div>
        </div>
    </div>
    <script src="ui/js/jquery-1.10.2.min.js"></script>
    <script src="ui/js/bootstrap.min.js"></script>
    <script src="ui/js/bootswatch.js"></script>
</body>
</html>
