<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 1</title>
</head>
<body>
    <!-- Formulário de Cadastro -->
    <form method="POST" action="">

        <!-- Campo de Nome -->
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" required><br><br>

        <!-- Campo de Data -->
        <label for="data">Ano de Nascimento: </label>
        <input type="date" name="data" id="data" required><br><br>

        <!-- Botão de Cadastro -->
        <button type="submit">Cadastro de usuário</button>

    <?php

    // Calculo da idade com base na data de nascimento
    function calcularIdade($dataNascimento) {
        $dataAtual = new DateTime();
        $dataNascimento = new DateTime($dataNascimento);
        $idade = $dataAtual->diff($dataNascimento)->y;
        return $idade;
    }

    // Processamento do formulário
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Captura os valores
        $nome = trim($_POST['nome'] ?? '');
        $data = trim($_POST['data'] ?? '');

        // Grava apenas se ambos os campos contiverem dados reais
        $idade = calcularIdade($data);
        if ($idade >= 18 && !empty($nome) && !empty($data)) {

        // Cria uma linha pra guardar o nome e data
            $arquivo = fopen('log_acessos.txt', 'a');
            $linha = $nome . ';' . $data . "\n";

            // Escreve a linha no arquivo
            fwrite($arquivo, $linha);

            // Fecha o arquivo
            fclose($arquivo);

            // Mensagem de sucesso para o usuário
            echo "<p style=\"font-size: 24px;\"><strong>Acesso permitido $nome!</strong></p>";

            // Comunica para o front-end e atualiza após 3segundos
            header('Refresh: 3; url=' . $_SERVER['PHP_SELF']);

        } else {

            // Mensagem de erro para o usuário
            echo "<p style=\"font-size: 24px;\"><strong>Acesso negado $nome!</strong></p>";

            // Comunica para o front-end e atualiza após 3 segundos
            header('Refresh: 3; url=' . $_SERVER['PHP_SELF']);
        }
    }

    ?>
</body>
</html>