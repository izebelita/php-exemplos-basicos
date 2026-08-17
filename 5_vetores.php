<?php

//vetores 
$pilotos = ["Lewis Hamilton", "Max Verstappen", "Charles Leclerc"];

// exibindo o vetor
foreach ($pilotos as $indice => $piloto) {
    echo "O piloto de número $indice é: $piloto <br>";
}

// array (linhas e colunas)

$carros = [
    ["Ferrari", "F1-75", 2022],
    ["Mercedes", "W13", 2022],
    ["Red Bull", "RB18", 2022]
];
echo "<br><br>";
echo "Lista de carros (Dica: Ferrari causa muita dor e sofrimento): <br><br>";

// exibindo o array
foreach ($carros as $carro) {
    foreach ($carro as $atributo) {
        echo $atributo . " | ";
    }
    echo "<br>";
}
