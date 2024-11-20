<!-- configurar a conexão com o banco de dados. -->

<?php
$IP = "127.0.0.1:3306";
$USUARIO = "root";
$SENHA = "";
$nomedobanco = "crud_php";
// connection
try{
    $conn = new PDO (dsn: "mysql:host = $IP", username: $USUARIO,password: $SENHA); // conexão segura com PDO
    $conn -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // tratamento de erro. retorna erro.
    $conn -> exec("USE $nomedobanco");


}catch(PDOException $msg){
    echo "Erro: ". $msg->getMessage();
 
}
?>
