<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- estilos -->
    <link rel="stylesheet" href="./public/css/tabela.css">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">

    <!-- bibliotecas -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    
    <!-- scripts -->
    <script src="./public/js/tabelaDesembolsos.js"></script>
    <title>Orçamentos CAJ</title>
</head>
<body>
    <!-- header -->
    <?php require_once 'src/includes/header.php'?>
    
    <!-- tabela -->
    <div class="table-container">
    <table id="tabela" class="table table-bordered table-hover">
        <thead class="thead-dark thead-fixed">
            <tr>
                <th class="col text-center">Data de Desembolso</th>
                <th class="col text-center">Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($desembolsos)): ?>
                <tr>
                    <td colspan="2" class="text-center">Nenhum registro encontrado para esse ano de execução</td>
                </tr>
            <?php else: ?>
                <?php foreach ($desembolsos as $desembolso): ?>
                    <tr>
                        <td><?php echo $desembolso['data_desembolso']; ?></td>
                        <td>R$<?php echo str_replace(',', '.', number_format($desembolso['valor'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <a class="btnBack" href="<?php echo $_SERVER['HTTP_REFERER']?>">Voltar</a>
</div>
</body>
</html>