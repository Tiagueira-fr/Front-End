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
    $stmt = $conn->prepare("SELECT senha_hash FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    
    // Executa a consulta
    $stmt->execute();
    
    // Armazena o resultado da consulta
    $result = $stmt->get_result();
    
    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Obtém o hash da senha armazenado no banco de dados
        $row = $result->fetch_assoc();
        $hash = $row['senha_hash'];
        
        // Verifica se a senha enviada pelo usuário é válida
        if (hash_equals($hash, hash('sha256', $senha))) {
            // Senha válida, o usuário está autenticado
            echo "Usuário autenticado!";
        } else {
            // Senha inválida, o usuário não está autenticado
            echo "Email ou senha inválidos!";
        }
    } else {
        // Email não encontrado, o usuário não está autenticado
        echo "Email ou senha inválidos!";
    }
    
    // Fecha a conexão com o banco de dados
    $conn->close();
}

?>
