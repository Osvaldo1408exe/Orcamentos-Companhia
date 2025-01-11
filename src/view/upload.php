<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/upload.css">
    <title>Orçamentos CAJ</title>
</head>
<body>
    <!-- header -->
    <?php require_once 'src/includes/header.php'?>

    <div class="container">
        <?php if($_GET['orcamento'] == 'investimento'):?>
            <h1>Envio de novos Investimentos</h1>
            <h3>Caso deseje enviar dados referente a Gastos <a href="./index.php?action=upload&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>">clique aqui</a></h3>
        <?php else:?>
            <h1>Envio de novos Gastos</h1>
            <h3>Caso deseje enviar dados referente a Investimentos <a href="./index.php?action=upload&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>">clique aqui</a></h3>
        <?php endif?>



        <form id="form" action="./index.php?action=uploading&orcamento=<?php echo $_GET['orcamento']?>" method="post" enctype="multipart/form-data">
            <label for="file">Upload CSV:</label>
            <input type="file" name="csv_file" id="csv_file" accept=".csv" required>            
            <button type="submit">Enviar</button>
        </form>

        <p class="important">O arquivo precisa estar no mesmo formato que o documento de exemplo abaixo:</p>
        <a href="./tabela_exemplo.csv" download>
            <button type="button">Baixar Arquivo</button>
        </a>
        <ul>
            <li>Colunas precisam estar na mesma ordem</li>
            <li>Para evitar qualquer conflito, é necessário que o envio seja realizado antes do ano dos orçamentos, indenpendente do mês</li>
            <li>Caso o campo solicitado não contenha na tabela, adicione uma coluna vazia</li>

        </ul>

    </div>
    
</form>
    
<script src="./public/js/upload.js"></script>
</body>
</html>