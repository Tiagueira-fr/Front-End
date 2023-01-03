<?php

// Verifica se os dados foram enviados através do método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados de email e senha enviados pelo formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // Conecta-se ao banco de dados
    $conn = new mysqli('localhost', 'username', 'password', 'database');
    
    // Verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Falha ao conectar ao banco de dados: " . $conn->connect_error);
    }
    
    // Prepara a consulta SQL
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    
    // Executa a consulta
    $stmt->execute();
    
    // Armazena o resultado da consulta
    $result = $stmt->get_result();
    
    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Dados encontrados, o usuário está autenticado
        echo "Usuário autenticado!";
    } else {
        // Dados não encontrados, o usuário não está autenticado
        echo "Email ou senha inválidos!";
    }
    
    // Fecha a conexão com o banco de dados
    $conn->close();
}

?>
