<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Senha</th>
                <th>Email</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexao.php'; // Inclui a conexão com o banco de dados

            try {
                // Prepara e executa a consulta com PDO
                $consulta_aluno = "SELECT * FROM aluno";
                $consulta = $conexao->query($consulta_aluno);

                // Percorre os resultados e exibe na tabela
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $linha['nome_aluno'] . '</td>';
                    echo '<td>' . $linha['senha'] . '</td>';
                    echo '<td>' . $linha['email'] . '</td>';
                    // Exibindo o link para deletar o aluno
                      echo '<td><a href="edita_aluno.php?edita=' . $linha['id'] . '">
                            <input type="submit" value="EDITAR ALUNO" />
                          </a></td>';
                 
                    echo '<td><a href="deleta_aluno.php?cod_aluno=' . $linha['id'] . '">
                            <input type="submit" value="DELETAR ALUNO" />
                          </a></td>';
                    echo '</tr>';
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        
            ?>
        </tbody>
    </table>
</body>
</html>
