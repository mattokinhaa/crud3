<?php 
// Recebe os dados do formulário
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$acao = $_POST["acao"];

// Conecta ao banco de dados
$con = new mysqli("127.0.0.1", "root", "", "Funko");

// Verifica a conexão
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Inicia a sessão
session_start();
$resposta = array();

if ($acao == "cadastro") {
    // Prepara a SQL para inserção
    $sql = "INSERT INTO clientes (nome, senha) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $nome, $senha);

    // Executa a SQL
    if ($stmt->execute()) {
        $resposta[] = array("resultado" => "inserido");
    } else {
        $resposta[] = array("resultado" => "erro de inserção");
    }

    $stmt->close();
}

// Retorna a resposta em JSON
echo json_encode($resposta);
$con->close();
?>
