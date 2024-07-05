<?php
    session_start();
    include('configdb.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?php echo $_SESSION['judul']." - ".$_SESSION['by'];?></title>
    <link href="ui/css/cerulean.min.css" rel="stylesheet">
    <link href="ui/css/jumbotron.css" rel="stylesheet">
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
                    <li class="active"><a href="#">Perhitungan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading"><b>Perhitungan</b></div>
            <div class="panel-body">
                <center>
                    <?php
                        echo "<b>Matrix Alternatif - Kriteria</b></br>";
                        $alt = get_alternatif();
                        $alt_name = get_alt_name();
                        $kep = get_kepentingan();
                        $cb = get_costbenefit();
                        $k = jml_kriteria();
                        $a = jml_alternatif();
                        $tkep = 0;
                        $tbkep = 0;

                        echo "<table class='table table-striped table-bordered table-hover'>";
                        echo "<thead><tr><th>Alternatif / Kriteria</th><th>K1</th><th>K2</th><th>K3</th><th>K4</th><th>K5</th><th>K6</th></tr></thead>";
                        for($i = 0; $i < $a; $i++){
                            echo "<tr><td><b>A".($i+1)."</b></td>";
                            for($j = 0; $j < 6; $j++){
                                if (isset($alt[$i][$j])) {
                                    echo "<td>".$alt[$i][$j]."</td>";
                                } else {
                                    echo "<td>undefined</td>";
                                }
                            }
                            echo "</tr>";
                        }
                        echo "</table><hr>";

                        echo "<b>Perhitungan Bobot Kepentingan</b></br>";
                        echo "<table class='table table-striped table-bordered table-hover'>";
                        echo "<thead><tr><th></th><th>K1</th><th>K2</th><th>K3</th><th>K4</th><th>K5</th><th>K6</th><th>Jumlah</th></tr></thead>";
                        echo "<tr><td><b>Kepentingan</b></td>";
                        for($i=0;$i<$k;$i++){
                            $tkep = $tkep + $kep[$i];
                            echo "<td>".$kep[$i]."</td>";
                        }
                        echo "<td>".$tkep."</td></tr>";
                        echo "<tr><td><b>Bobot Kepentingan</b></td>";
                        for($i=0;$i<$k;$i++){
                            $bkep[$i] = ($kep[$i]/$tkep);
                            $tbkep = $tbkep + $bkep[$i];
                            echo "<td>".round($bkep[$i],7)."</td>";
                        }
                        echo "<td>".$tbkep."</td></tr>";
                        echo "</table><hr>";

                        echo "<b>Perhitungan Pangkat</b></br>";
                        echo "<table class='table table-striped table-bordered table-hover'>";
                        echo "<thead><tr><th></th><th>K1</th><th>K2</th><th>K3</th><th>K4</th><th>K5</th><th>K6</th></tr></thead>";
                        echo "<tr><td><b>Cost/Benefit</b></td>";
                        for($i=0;$i<$k;$i++){
                            echo "<td>".ucwords($cb[$i])."</td>";
                        }
                        echo "</tr>";
                        $pangkat = get_pangkat($bkep);

                        echo "<tr><td><b>Pangkat</b></td>";
                        for ($i=0;$i<$k;$i++){
                        $display_pangkat = ($pangkat[$i] < 0) ? "-".round(abs($pangkat[$i]),6) : round($pangkat[$i],6);
                        echo "<td>".$display_pangkat."</td>";
                        }
                        
                        echo "</tr>";
                        echo "</table><hr>";

                        echo "<b>Tabel Hasil Pangkat dari Matrix Alternatif - Kriteria</b></br>";
                        echo "<table class='table table-striped table-bordered table-hover'>";
                        echo "<thead><tr><th>Alternatif / Kriteria</th><th>K1</th><th>K2</th><th>K3</th><th>K4</th><th>K5</th><th>K6</th></tr></thead>";
                        for($i = 0; $i < $a; $i++){
                            echo "<tr><td><b>A".($i+1)."</b></td>";
                            for($j = 0; $j < $k; $j++){
                                if (isset($alt[$i][$j]) && isset($pangkat[$j])) {
                                    $hasil_pangkat[$i][$j] = pow($alt[$i][$j], $pangkat[$j]);
                                    echo "<td>".round($hasil_pangkat[$i][$j],6)."</td>";
                                } else {
                                    echo "<td>undefined</td>";
                                }
                            }
                            echo "</tr>";
                        }
                        echo "</table><hr>";


                        echo "<b>Perhitungan Nilai S</b></br>";
                        echo "<table class='table table-striped table-bordered table-hover'>";
                        echo "<thead><tr><th>Alternatif</th><th>S</th></tr></thead>";
                        for($i = 0; $i < $a; $i++){
                            echo "<tr><td><b>A".($i+1)."</b></td>";
                            $ss[$i] = 1;
                            for($j = 0; $j < $k; $j++){
                                if (isset($hasil_pangkat[$i][$j])) {
                                    $ss[$i] *= $hasil_pangkat[$i][$j];
                                } else {
                                    $ss[$i] *= 1;
                                }
                            }
                            echo "<td>".round($ss[$i],6)."</td></tr>";
                        }
                        echo "</table><hr>";

                        echo "<b>Hasil Akhir</b></br>";
                        echo "<table class='table table-striped table-bordered table-hover'>";
                        echo "<thead><tr><th>Alternatif</th><th>V</th></tr></thead>";
                        $total = 0;
                        for($i=0;$i<$a;$i++){
                            $total += $ss[$i];
                        }
                        for($i=0;$i<$a;$i++){
                            echo "<tr><td><b>".$alt_name[$i]."</b></td>";
                            $v[$i] = round($ss[$i]/$total,6);
                            echo "<td>".$v[$i]."</td></tr>";
                        }
                        echo "</table><hr>";

                        arsort($v);

                        $sorted_alt_names = array_keys($v);
                        $sorted_values = array_values($v);
                    ?>
                </center>
            </div>
            <div class="panel-footer text-primary text-right"><b><?php echo $_SESSION['by'];?></b><div class="pull-right"></div></div>
        </div>
    </div>
    <script src="ui/js/jquery-1.10.2.min.js"></script>
    <script src="ui/js/bootstrap.min.js"></script>
    <script src="ui/js/bootswatch.js"></script>
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

<?php
    function get_pangkat($bkep) {
        $k = jml_kriteria();
        $pangkat = array();
        for ($i = 0; $i < $k; $i++) {
          $cb = get_costbenefit(); // Assuming this function retrieves cost/benefit information
          if ($cb[$i] == "Benefit") {
            $pangkat[$i] = $bkep[$i];
          } else {
            $pangkat[$i] = (-1) * $bkep[$i];
          }
        }
        return $pangkat;
    }

    function jml_kriteria(){
        include 'configdb.php';
        $kriteria = $mysqli->query("select * from kriteria");
        return $kriteria->num_rows;
    }

    function jml_alternatif(){
        include 'configdb.php';
        $alternatif = $mysqli->query("select * from alternatif");
        return $alternatif->num_rows;
    }

    function get_kepentingan(){
        include 'configdb.php';
        $kepentingan = $mysqli->query("select * from kriteria");
        if(!$kepentingan){
            echo $mysqli->connect_errno." - ".$mysqli->connect_error;
            exit();
        }
        $i=0;
        while ($row = $kepentingan->fetch_assoc()) {
            @$kep[$i] = $row["kepentingan"];
            $i++;
        }
        return $kep;
    }

    function get_costbenefit(){
        include 'configdb.php';
        $costbenefit = $mysqli->query("select * from kriteria");
        if(!$costbenefit){
            echo $mysqli->connect_errno." - ".$mysqli->connect_error;
            exit();
        }
        $i=0;
        while ($row = $costbenefit->fetch_assoc()) {
            @$cb[$i] = $row["cost_benefit"];
            $i++;
        }
        return $cb;
    }

    function get_alt_name(){
        include 'configdb.php';
        $alternatif = $mysqli->query("select * from alternatif");
        if(!$alternatif){
            echo $mysqli->connect_errno." - ".$mysqli->connect_error;
            exit();
        }
        $i=0;
        while ($row = $alternatif->fetch_assoc()) {
            @$alt[$i] = $row["alternatif"];
            $i++;
        }
        return $alt;
    }

    function get_alternatif(){
        include 'configdb.php';
        $alternatif = $mysqli->query("select * from alternatif");
        if(!$alternatif){
            echo $mysqli->connect_errno." - ".$mysqli->connect_error;
            exit();
        }
        $i=0;
        while ($row = $alternatif->fetch_assoc()) {
            @$alt[$i][0] = $row["k1"];
            @$alt[$i][1] = $row["k2"];
            @$alt[$i][2] = $row["k3"];
            @$alt[$i][3] = $row["k4"];
            @$alt[$i][4] = $row["k5"];
            @$alt[$i][5] = $row["k6"]; 
            $i++;
        }
        return $alt;
    }

    function cmp($a, $b){
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }

    function print_ar(array $x){    
        echo "<pre>";
        print_r($x);
        echo "</pre></br>";
    }
?>
