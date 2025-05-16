<?php
    require_once 'classes/Ativo.php';

    $ativo = new Ativo();
    $relatorio = $ativo->calcularPrecoMedio();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Ativos - Preço médio</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Relatório de Ativos - Preço médio</h1>
    <table border="1">
        <tr>
            <td>Ativo</td>
            <td>Total Comprado</td>
            <td>Preço Médio</td>
        </tr>
        <?php foreach($relatorio as $linha): ?>
            <tr>
                <td><?= $linha['ativo'] ?></td>
                <td><?= $linha['total_quantidade'] ?></td>
                <td><?= number_format($linha['preco_medio'], 2, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>