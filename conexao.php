<?php
$host = "localhost";
$db   = "katchau_db"; // substitua pelo nome real do seu banco
$user = "root";          // usuário padrão do XAMPP
$pass = "";              // senha padrão é vazia

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
} else {
    echo "Conexão bem sucedida!";
}
?>
