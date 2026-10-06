<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <!-- Formulário de Cadastro -->
    <form method="post" action="">

        <!-- Campo de Nome -->
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" required><br><br>

        <!-- Campo de Senha -->
        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="senha" required><br><br>

        <!-- Botão de Cadastro -->
        <button type="submit">Cadastro de usuário</button>

    </form>

    <!-- Lógica para gravar as informações -->
    <?php

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Captura os valores e remove espaços em branco extras
        $nome = trim($_POST['nome'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        // Grava apenas se ambos os campos contiverem dados reais
        if (!empty($nome) && !empty($senha)) {

            // Cria uma linha pra guardar o nome e senha
            $arquivo = fopen('usuarios.txt', 'a');
            $linha = $nome . ';' . $senha . "\n";

            // Escreve a linha no arquivo
            fwrite($arquivo, $linha);

            // Fecha o arquivo
            fclose($arquivo);
            
            // Redireciona para a própria página (Após cadastro)
            header('Location: ' . $_SERVER['PHP_SELF'] . '?success=1');
            exit();
        }
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            // Mensagem de sucesso para o usuário
            echo "<p>Usuário cadastrado com sucesso!</p>";

            // Comunica para o front-end e atualiza após 3segundos
            header('Refresh: 3; url=' . $_SERVER['PHP_SELF']);
        }
    }

    ?>

</body>
</html>