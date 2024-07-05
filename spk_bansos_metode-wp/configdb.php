<?php
	@session_start();
	$_SESSION['judul'] = 'SPK PENERIMA BANTUAN SOSIAL';
	$_SESSION['welcome'] = 'SISTEM PENDUKUNG KEPUTUSAN BERBASIS WEB DENGAN METODE WEIGHT PRODUCT';
	$_SESSION['by'] = '© Kelompok 1';
	$mysqli = new mysqli('localhost','root','','database');
	if($mysqli->connect_errno){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
?>
