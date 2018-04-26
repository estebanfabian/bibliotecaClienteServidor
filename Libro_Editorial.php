    
 <?php
 header('Content-Type: text/html;charset=utf-8');
include('Conectar.php');
$edi=$_GET["edi"];


if($resultset = getSQLResultSet("SELECT * FROM `tbl_libro` WHERE `Editorial`='$edi'")){
   
    
   
    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        
           	echo utf8_decode(json_encode ($row))    ; 
               
             }
             
}

