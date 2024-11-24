<?php
// Conecta ao banco de dados
$con = new mysqli("127.0.0.1", "root", "", "Funko");

// Verifica a conexão
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>