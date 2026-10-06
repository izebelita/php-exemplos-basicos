<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro - Status Codes </title>

</head>
<body>

    <h1> Cadastro de Alunos (Com status Codes) </h1>

    <form method="post" action="">

        <label for="nome"> Nome: </label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="idade"> Idade: </label>
        <input type="number" name="idade" id="idade" required><br><br>

        <button type="submit"> Enviar </button>

    </form>

<hr>

<?php

// $_SERVER éuma variavel superglobal do PHP que contém varias informações sobre requisições feitas ao servidor. Nesse caso verifica se o método ultilizado foi POST e se verdade captura as informações (Nome e Idade) 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Pega os valores digitalizados no formulário pelo usuário 
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    // Tratativa dos erros por "Status Codes"

    //Erro por parte do usuário (Faixa 400 - Não preencheu Nome ou Idade)
    if ($nome == ''|| $idade == ''){
        http_response_code(400); //Bad Request
        echo "<h2>Status 400 - Faltou algum dado a ser preenchido</h2>";

    //Erro por parte do usuário (Faixa 400 - Usuário preencheu errado, por exemplo em vez de "20" digitou "vinte")
    }elseif(!is_numeric($idade)){
        http_response_code(400); //Bad Request
        echo "<h2>Status 400 - A idade deve ser um número válido</h2>";

    //Resposta para quando tudo foi bem (Cadastro feito com sucesso)
    } else {
        http_response_code(201); // Created
        echo "<h2>Status 201 - Criado: $nome, $idade anos!</h2>";
    }

}else {
    // Status 200 - Usuário entrou na página mas ainda não enviou
    http_response_code(200); //Success
    echo "<h2>Status 200 - Preencha o formulário acima e envie</h2>";
}

?>

</body>
</html>