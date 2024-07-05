<?php
session_start();
include('configdb.php');

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $mysqli->prepare("DELETE FROM kriteria WHERE id_kriteria = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    header('Location: kriteria.php');
    exit();
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
    <link rel="stylesheet" type="text/css" href="ui/css/datatables/dataTables.bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="ui/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" language="javascript" src="ui/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="ui/js/dataTables.bootstrap.min.js"></script>

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
    .btn {
        font-family: 'Open Sans', sans-serif;
        transition: background-color 0.3s ease;
    }
    .btn:hover {
        background-color: #34495e;
        color: #fff !important;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table thead {
        background-color: #2980b9;
        color: white;
    }
    table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    table tbody tr:hover {
        background-color: #ddd;
    }
    table th, table td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }
    .btn-success {
        background-color: #27ae60;
    }
    .btn-success:hover {
        background-color: #219150;
    }
    .btn-danger {
        background-color: #c0392b;
    }
    .btn-danger:hover {
        background-color: #a93226;
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

</head>
<body>
    <div id="wrapper">
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
                        <li class="active"><a href="kriteria.php">Data Kriteria</a></li>
                        <li><a href="alternatif.php">Data Alternatif</a></li>
                        <li><a href="analisa.php">Analisa</a></li>
                        <li><a href="perhitungan.php">Perhitungan</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><b>Data Kriteria</b></div>
                            <?php
                            $kriteria = $mysqli->query("SELECT * FROM kriteria");
                            if (!$kriteria) {
                                echo $mysqli->connect_errno." - ".$mysqli->connect_error;
                                exit();
                            }
                            ?>
                            <div class="panel-body table-responsive">
                                <a class='btn btn-warning pull-right' href='add-kriteria.php'> Tambah Data Kriteria</a><br /><br />
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Kriteria</th>
                                            <th class="text-center">Kepentingan</th>
                                            <th class="text-center">Cost / Benefit</th>
                                            <th class="text-center">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($row = $kriteria->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>'.$i++.'</td>';
                                            echo '<td>'.ucwords($row["kriteria"]).'</td>';
                                            echo '<td>'.$row["kepentingan"].'</td>';
                                            echo '<td class="text-uppercase">'.$row["cost_benefit"].'</td>';
                                            echo '<td>
                                                <a href="edit-kriteria.php?id='.$row["id_kriteria"].'" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="kriteria.php?delete_id='.$row["id_kriteria"].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer text-primary text-right"><b><?php echo $_SESSION['by'];?></b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="ui/js/bootstrap.min.js"></script>
    <script src="ui/js/bootswatch.js"></script>
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>
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
