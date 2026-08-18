<?php

$preco = 50;
$quantidade = 5;

$total = $preco * $quantidade;

if ($total >= 200) {
    $desconto = $total * 0.10;
    $valorFinal = $total - $desconto;
} else {
    $valorFinal = $total;
}

echo "Valor total: R$ " . number_format($total, 2, ',', '.') . "<br>";
echo "Valor final da compra: R$ " . number_format($valorFinal, 2, ',', '.');

?>