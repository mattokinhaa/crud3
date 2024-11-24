<?php

// Efetua a conexao com o banco de dados
include('config.php');

// Recebe os dados do formulário
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$acao = $_POST["acao"];

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
        $stmt->close();
        header('Location: pagina1.html');
    } else {
        $resposta[] = array("resultado" => "erro de inserção");
        echo json_encode($resposta);
        $stmt->close();
    }
} elseif ($acao == "login") {
    // Prepara a SQL para verificar as credenciais
    $sql = "SELECT * FROM clientes WHERE nome = ? AND senha = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se as credenciais são válidas
    if ($result->num_rows > 0) {
        $_SESSION["nome"] = $nome;
        $resposta[] = array("resultado" => "login bem-sucedido");
        header('Location: pagina1.html');
    } else {
        $resposta[] = array("resultado" => "nome ou senha incorretos");
        echo json_encode($resposta);
    }

    $stmt->close();
}

// Retorna a resposta em JSON
$con->close();
?>
