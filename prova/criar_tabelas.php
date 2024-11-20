<?php
require "config.php";

$sqlUsuario = "CREATE TABLE perfil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn -> exec(statement: $sqlUsuario);
echo "Entidade Usuario Criado com sucesso. "


?>