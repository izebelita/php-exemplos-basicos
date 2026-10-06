<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
</head>
<body>
    <form method="POST" action="">
        <!-- Campo para nome -->
        <label for="nome">Nome: </label>
        <input type="text" name="nome" required><br><br>

        <!-- Campo para senha -->
        <label for="senha">Senha: </label>
        <input type="password" name="senha" required><br><br>

        <!-- Botão de envio -->
        <button type="submit">Entrar</button>
    </form>

    <!-- Lógica em PHP -->
    <?php

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe os valores enviadas pelo formulário
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        // Abre o arquivo de usuário.txt para leitura "read - r"
        $arquivo = fopen('../Assunto_3/usuarios.txt', 'r');
        $login_sucesso = false;

        // Lê cada linha do arquivo
        while (($linha = fgets($arquivo)) !== false) {

            // Divide a linha em nome e senha (assumindo que estejam separados por um caractere como ':')
            list($usuario_arquivo, $senha_arquivo) = explode(';', trim($linha));
            
            // Verifica se o nome e a senha correspondem
            if ($nome == $usuario_arquivo && $senha == $senha_arquivo) {
                $login_sucesso = true;
                break;
            }
        }

        // Fecha o arquivo]
        fclose($arquivo);

        // Exibe mensagem de sucesso ou erro
        if ($login_sucesso) {
            echo "<p style=\"color: darkgreen;\">Login bem-sucedido! Bem-vindo, $nome.</p>";
        } else {
            echo "<p style=\"color: red;\">Nome ou senha incorretos. Tente novamente.</p>";
        }
            
         // Comunica para o front-end e atualiza após 3segundos
        header('Refresh: 3; url=' . $_SERVER['PHP_SELF']);
    }

    ?>

</body>
</html>