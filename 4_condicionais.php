<?php

//Verificar se formulário foi enviado ($_SEVER)
//Variavel nativa de PHP
if($_SEVER['REQUESTE_METHOD']=='POST'){
    //RECEBE A SENHA ENVIADA
    $senha = $_POST['senha'];

    if($senha == '12345'){
        //Redireciona para pg de Boas-vindas
        header("Location 4b_bem_vindo.php");
        exit();
        else{
            $erro= "Senha incorreta. Tente novamente"
        }
                }
}

<!DOCTYPE html>
<html lang = "pt-br">
<head>
        