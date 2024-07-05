<?php
session_start();
include('configdb.php');
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
    <link rel="stylesheet" type="text/css" href="ui/css/datatables/dataTables.bootstrap.css">
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
        .table > thead > tr > th {
            text-align: center; /* Center align text in table header */
        }
        .table > tbody > tr > td {
            text-align: center; /* Center align text in table cells */
            vertical-align: middle; /* Center align vertically */
        }
        .btn {
            border-radius: 5px; /* Border radius for all buttons */
            font-size: 14px;
            padding: 8px 16px;
        }
        .btn-success:hover, .btn-danger:hover {
            transform: scale(1.05); /* Hover effect to slightly scale up the button */
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
                    <li class="active"><a href="#">Data Alternatif</a></li>
                    <li><a href="analisa.php">Analisa</a></li>
                    <li><a href="perhitungan.php">Perhitungan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading"><b>Data Alternatif</b></div>
            
            <?php

            $kriteria = $mysqli->query("select * from kriteria");
            if(!$kriteria){
                echo $mysqli->connect_errno." - ".$mysqli->connect_error;
                exit();
            }
            $i=0;
            while ($row = $kriteria->fetch_assoc()) {
                @$k[$i] = $row["kriteria"];
                $i++;
            }

            $alternatif = $mysqli->query("select * from alternatif");
            if(!$alternatif){
                echo $mysqli->connect_errno." - ".$mysqli->connect_error;
                exit();
            }
            $i=0;
            ?>
            <div class="panel-body table-responsive">
                <a class='btn btn-warning pull-right' href='add-alternatif.php'> Tambah Data Alternatif</a><br /><br />
                <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Alternatif</th>
                            <?php for ($j = 0; $j < count($k); $j++) { ?>
                                <th><?php echo ucwords($k[$j]); ?></th>
                            <?php } ?>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = $alternatif->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>'.$i++.'</td>';
                            echo '<td>'.ucwords($row["alternatif"]).'</td>';
                            for ($j = 1; $j <= count($k); $j++) {
                                echo '<td>'.$row["k".$j].'</td>';
                            }
                            echo '<td>';
                            ?>
                            <a href="edit-alternatif.php?id=<?php echo $row['id_alternatif'];?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="del.php?id=<?php echo $row['id_alternatif'];?>" onClick="return confirm('Menghapus data ke-<?php echo $i-1;?> Alternatif <?php echo $row['alternatif'];?> ?');" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</a>
                            <?php
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer text-primary text-right"><b><?php echo $_SESSION['by'];?></b></div>
        </div>
    </div>
    <script src="ui/js/jquery-1.11.3.min.js"></script>
    <script src="ui/js/bootstrap.min.js"></script>
    <script src="ui/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').dataTable({
                "language": {
                    "url": "ui/css/datatables/Indonesian.json"
                }
            });
        });
    </script>
</body>
</html>
