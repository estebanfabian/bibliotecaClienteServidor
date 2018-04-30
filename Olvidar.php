 <?php
 Header('Content-Type: text/html;charset=utf-8');
include('Conectar.php');
$cod=$_GET["cod"];


/**/
if($resultset = getSQLResultSet("SELECT `emailPrincipal` FROM `tbl_usuario` WHERE `codigo`= '$cod'")){
    
    
    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        
           	echo utf8_encode(json_encode ($row))    ; 
               
             }
}



