<?php
$host = 'localhost';
$user = 'root'; // Usuário do banco
$password = ''; // Senha do banco
$database = 'escola_infantil';

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
