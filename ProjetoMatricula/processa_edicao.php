<?php
include 'conexao.php'; // Inclui a conexão com o banco de dados usando PDO

// Verifica se os valores estão definidos no $_POST
$id = $_POST['id'] ?? null;

$senha = $_POST['senha'] ?? null;
$email = $_POST['email'] ?? null;

// Validação básica
if (!$id || !$senha || !$email) {
    die("Erro: todos os campos devem ser preenchidos.");
}

// Query SQL corrigida para atualizar o aluno
$edita_aluno = "UPDATE aluno SET 
                    id = :id,
                    senha = :senha,
                    email = :email
                WHERE cod_aluno = :cod_aluno";

try {
    // Prepara a consulta
    $stmt = $conexao->prepare($edita_aluno);

    // Associa os parâmetros à consulta
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR); // Senha como string
    $stmt->bindParam(':email', $email);
   
    // Executa a consulta
    $stmt->execute();

    // Redireciona para a página de visualização após a edição
    header('Location: ver_aluno.php');
} catch (PDOException $e) {
    echo "Erro ao atualizar aluno: " . $e->getMessage();
}
?>
