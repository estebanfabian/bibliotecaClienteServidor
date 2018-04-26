 <?php
 header('Content-Type: text/html;charset=utf-8');
include('Conectar.php');
$cod=$_GET["cod"];


/**/
if($resultset = getSQLResultSet("SELECT `contrasena`FROM `tbl_usuario` WHERE `codigo`= '$cod'")){
   // if($resultset = getSQLResultSet("SELECT `apellido`FROM `usuario` WHERE `codigo`= '$cod'")){
    
    
    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        
           	echo utf8_decode(json_encode ($row))    ; 
               
             }
}





