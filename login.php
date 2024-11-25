<?php
// Recebe os dados do formulário
$nome = $_POST["nome"];
$senha = $_POST["senha"];

// Conecta ao banco de dados
$con = new mysqli("127.0.0.1", "root", "", "Funko");

// Verifica a conexão
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Inicia a sessão
session_start();

// Prepara a SQL para verificar as credenciais
$sql = "SELECT * FROM clientes WHERE nome = ? AND senha = ?";
$stmt = $con->prepare($sql);
if ($stmt === false) {
    die("Prepare failed: " . $con->error);
}
$stmt->bind_param("ss", $nome, $senha);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se as credenciais são válidas
if ($result->num_rows > 0) {
    $_SESSION["nome"] = $nome;
    $stmt->close();
    $con->close();
    header("Location: pagina1.html");
    exit();
} else {
    $stmt->close();
    $con->close();
    header("Location: index.php?erro=login");
    exit();
}
?>
