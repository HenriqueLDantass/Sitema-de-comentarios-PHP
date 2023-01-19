<?php
$user = "root";
$pass = "";
try{
$pdo = new PDO("mysql:dbname=mensagens;host=localhost",$user,$pass);
}catch(PDOException $err){
    echo "Não possivel conectar ".$err->getMessage();
}