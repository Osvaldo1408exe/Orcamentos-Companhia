
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/escolha_ano.css">
    <title>OrçamentosCAJ</title>
</head>
<body>

    <?php $orcamento = isset($_GET['orcamento']) ? $_GET['orcamento'] : '';?>

    <div class="container">
        <h1>Deseja visualizar os orçamentos a partir de:</h1>

       

        <div class="btnList">

            <div id="buttonContainer"></div>
            <!-- <div class="btn">
                <a href="./index.php?action=home&orcamento=<?php echo $orcamento?>&ano_execucao=2024"><button>2024/2028</button></a>
            </div>
            <div class="btn">
                <a href="./index.php?action=home&orcamento=<?php echo $orcamento?>&ano_execucao=2025"><button>2025/2029</button></a>
            </div>             -->
        </div>
        
    </div>
    
</body>

<script src="./public/js/escolha_ano.js"></script>
</html>