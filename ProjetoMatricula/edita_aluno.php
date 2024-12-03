<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Alunos</title>
</head>
<body>
    <?php
        include 'conexao.php';

        // Verifica se o parâmetro 'editar' foi fornecido
        if (isset($_GET['edita'])) {
            $cod_aluno = $_GET['edita'];

            // Prepara a consulta para obter os dados do aluno
            $consulta_aluno = "SELECT * FROM aluno WHERE id = :cod_aluno";
            $stmt = $conexao->prepare($consulta_aluno);
            $stmt->bindParam(':cod_aluno', $cod_aluno, PDO::PARAM_INT);
            $stmt->execute();

            // Obtém os dados do aluno
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se o aluno foi encontrado
            if ($linha  )  {
                echo "<p>Aluno não encontrado.</p>";
            }
        } else {
            echo "<p>Parâmetro 'editar' não fornecido.</p>";
        }
    ?>
    <h1>Edição de Alunos</h1>
    <form method="post" action="processa_edicao.php">
        <input type="hidden" name="cod_aluno" value="<?php echo htmlspecialchars($linha['id']); ?>"/>
        <label>Nome</label>
        <input type="text" name="nome_aluno" value="<?php echo htmlspecialchars($linha['nome_aluno']); ?>" required/>
        <br><br>
        <label>senha</label>
        <input type="password" name="senha" value="<?php echo htmlspecialchars($linha['senha']); ?>" required min="0"/>
        <br><br>
        <label>E-mail</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($linha['email']); ?>" required/>
        <br><br>

        <input type="submit" value="EDITAR ALUNO(A)"/>
    </form>
    <?php
         
    ?>
</body>
</html>
