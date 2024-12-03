<?php
    include 'conexao.php'; // Inclui a conexão com o banco de dados usando PDO

    $cod_aluno = $_GET['cod_aluno'];

    // Prepara a query para deletar o aluno com o código específico
    $deleta_aluno = "DELETE FROM aluno WHERE cod_aluno = :cod_aluno";

    try {
        // Prepara a consulta
        $stmt = $conexao->prepare($deleta_aluno);

        // Associa o valor do código do aluno ao parâmetro
        $stmt->bindParam(':cod_aluno', $cod_aluno, PDO::PARAM_INT);

        // Executa a consulta
        $stmt->execute();

        // Redireciona para a página de visualização após a exclusão
        header('Location: ver_aluno.php');
    } catch (PDOException $e) {
        echo "Erro ao deletar aluno: " . $e->getMessage();
    }
?>
