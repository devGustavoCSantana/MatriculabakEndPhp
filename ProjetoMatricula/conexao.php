<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "matricula";

    try {
        // Corrigindo a string de conexão e a ordem dos parâmetros
        $conexao = new PDO(
            "mysql:host=$servidor;dbname=$banco", 
            $usuario, $senha
        );

        // Definindo o modo de erro para exceções
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Conexão realizada com sucesso!";
    } catch (PDOException $e) {
        // Corrigindo a sintaxe para obter a mensagem de erro
        echo "Erro: " . $e->getMessage();
    }
?>