<?php
   require_once 'classes/Dividendo.php';

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$dividendo = new Dividendo();
$dividendo->adicionarDividendo(
    $_POST['ativo'],
    $_POST['valor'],
    $_POST['data_recebimento']
   );
   echo "Dividendo registrado com sucesso";
   }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Dividendos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <h1>Cadastrar Dividendos</h1>
 <form method="POST"
    <label for="ativo">Ativo:</label>
    <input type="text" name="ativo" id="ativo" required>
    <br>
    <label for="valor">Valor Recebido:</label>
    <input type="number" name="valor" id="valor" required>
    <br>
    <label for="data_recebimento">Data de Recebimento:</label>
    <input type="data" name="data_recebimento" id="data_recebimento" required>
    <br>
    <button type="submit">Cadastrar</button>
</form>
</body>
</html>