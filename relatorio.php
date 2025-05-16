<?php
   require_once 'classes/Ativo.php';
   require_once 'classes/Dividendo.php';

   $ativo = new Ativo();
   $dividendo = new Dividendo();

   $investimentos =  $ativo->calcularPrecoMedio();
   $dividendos = $dividendo->calcularDividendosPorAtivo(); 

   $dadosGraficos = [];
  
   foreach($investimentos as $item)
   {
       $dadosGraficos[$item['ativo']] = [
        'investido' => $item['total_valor'],
        'dividendos' => 0
       ];
   }

   foreach($dividendos as $item)
   {
    if (insset($dadosGraficos[$item['ativo']])) {
        $dadosGraficos[$item['ativo']]['dividendo'] = $item['total_dividendos'];
    }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio de Investimentos x Dividendos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Relatorio de Investimentos x Dividendos</h1>

    <canvas id="graficosInvestimentosDividendos"></canvas>

    <script>
        const dados = <?php echo json_encode($dadosGraficos); ?>;
        const labels = Object.keys(dados); 
        console.log(dados);
        console.log(labels);

        const dadosInvestidos = Object.values(dados).map(item => item.investido)
        console.log(dadosInvestidos)
        const dadosDividendos = Object.values(dados).map(item => item.dividendos)   

        const ctx = document.getElementById('graficosInvestidosDividendos')
        .getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label : 'Total Ivenstido (R$)',
                        data: dadosInvestidos,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label : 'Dividendos Recebidos (R$)',
                        data: dadosInvestidos,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true, 
                plugin: {
                    legend{
                        position: 'top'
                        
                    }
                }
            }
        });
    </script>
</body>
</html>