    
 <?php
 header('Content-Type: text/html;charset=utf-8');
include('Conectar.php');
$ide=$_GET["ide"];


if($resultset = getSQLResultSet("SELECT * FROM `tbl_libro` WHERE `Id`='$ide'")){
   
    
   
    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        
           	echo utf8_decode(json_encode ($row))    ; 
               
             }
             
}

