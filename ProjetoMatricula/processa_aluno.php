<?php
    require 'conexao.php'; // Certifique-se de que 'conexao.php' está correto e inclui a conexão PDO.

    // Recebendo os dados do formulário
    $nome_aluno = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    
    // Query SQL para inserir um novo aluno
    $insere_aluno = "INSERT INTO aluno (nome_aluno, senha, email)
                     VALUES (:nome_aluno, :senha, :email)";






    // echo $insere_aluno;

    try {
        // Prepara a consulta
        $stmt = $conexao->prepare($insere_aluno);

        // Associa os parâmetros à consulta
        $stmt->bindParam(":nome_aluno", $nome_aluno);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":email", $email);
       
        // Executa a consulta
        $stmt->execute();

        // Redireciona para a página de visualização após o cadastro
        header('Location: ver_aluno.php');
        exit(); // É uma boa prática usar exit() após o header para garantir que o script pare aqui.
    } catch (PDOException $e) {
        // Exibe mensagem de erro se algo der errado
        echo "Erro ao inserir aluno: " . $e->getMessage();
    }
?>
