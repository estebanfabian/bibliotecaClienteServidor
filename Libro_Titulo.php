<?php
header('Content-Type: text/html;charset=utf-8');
include('Conectar.php');
$Val=$_GET["Val"];//valor que se consulta
$Fil=$_GET["Fil"]; 
$rawdata = array(); 

if($resultset = getSQLResultSet("SELECT * FROM tbl_libro WHERE ".$Fil."='".$Val."'")){
	$rawdata = array(); //creamos un array
	$i=0;
	while($row = mysqli_fetch_array($resultset))
	{
		$rawdata[$i] = $row;
		$i++;
	}
	echo json_encode($rawdata);
}