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

// Prepara a SQL para verificar se o nome de usuário já existe
$sql = "SELECT * FROM clientes WHERE nome = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $nome);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Se o nome de usuário já existe
    $stmt->close();
    $con->close();
    header("Location: registro.php?erro=ja-existe");
    exit();
}

// Prepara a SQL para inserção
$sql = "INSERT INTO clientes (nome, senha) VALUES (?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $nome, $senha);

// Executa a SQL
if ($stmt->execute()) {
    $stmt->close();
    $con->close();
    header("Location: index.php?sucesso=cadastro");
    exit();
} else {
    $stmt->close();
    $con->close();
    header("Location: registro.php?erro=insercao");
    exit();
}
?>
