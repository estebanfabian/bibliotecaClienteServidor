    
 <?php
 header('Content-Type: text/html;charset=utf-8');
include('Conectar.php');
$fac=$_GET["fac"];


if($resultset = getSQLResultSet("SELECT * FROM `tbl_libro` WHERE `Facultad`='$fac'")){
   
    
   
    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        
           	echo utf8_decode(json_encode ($row))    ; 
               
             }
             
}

