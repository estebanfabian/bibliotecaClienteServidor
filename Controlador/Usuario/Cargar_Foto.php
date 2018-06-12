<?php

header('Access-Control-Allow-Origin: *');
require '../../CLASES/BD/MySql.php';
require '../../CLASES/BD/datosbd.php';
require '../../CLASES/DAO/UsuarioDAO.php';
require '../../CLASES/VO/UsuarioVO.php';

$json = file_get_contents("php://input");
$local = json_decode($json);
print_r($json);
print_r($local);

$target_dir = "../../img/usuario/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
$UsuarioDAO=new UsuarioDAO();
$UsuarioDAO->Foto($local);

//$target_dir = '../../img/usuario/';
//$target_dir = $target_dir . basename($_FILES["uploadFile"]["name"]);
//$uploadOk = 1;
//if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)) {
  //  echo "The file" . basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";
//} else {
  //  echo "Sorry, there was an error uploading your file.";
//}