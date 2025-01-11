<!DOCTYPE html>
<html lang="en">
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
    <script src="./public/js/tabela.js"></script>
    <script src="./public/js/modal.js"></script>
    <title>Orçamentos CAJ</title>
</head>
<body>
    <!-- header -->
    <?php require_once 'src/includes/header.php'?>

    <!-- Tela de carregamento -->
    <div class="loading-screen">
        <div id="loader" class="loader"></div>
        <div class="loading-text">Carregando...</div>
    </div>

    
    <!-- tabela -->
    <div class="table-container">
    <table id="tabela" class="table table-bordered table-hover">
        <thead class="thead-dark thead-fixed">
            <tr>
                <th class="col text-center"></th>
                <th class="col text-center">Prazo GSL</th>
                <th class="col text-center">Prazo GQM</th>
                <th class="col text-center">Setor</th>
                <th class="col text-center">Descrição</th>
                <th class="col text-center">Situação</th>
                <th class="col text-center">1° Desembolso</th>
                <th class="col text-center">Total <?php echo date('Y');?></th>
                <th class="col text-center">Custo do atraso</th>
                <th class="col text-center">Processo SEI</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($orcamentos)): ?>
                <tr>
                    <td colspan="10" class="text-center">Nenhum registro encontrado para esse ano de execução</td>
                </tr>
            <?php else: ?>
                <?php foreach ($orcamentos as $orcamento): ?>
                    <tr>
                        <td class='text-center'>
                            <button class='editar' onclick="toggleModal(this)"
                                data-id='<?php echo $orcamento['id']; ?>'
                                data-situacao='<?php echo $orcamento['id_situacao']; ?>'
                                data-processo_sei='<?php echo $orcamento['processo_sei']; ?>'>
                                Editar
                            </button>
                            <a href='./index.php?action=desembolsos&orcamento=<?php echo $_GET['orcamento']?>&id=<?php echo $orcamento['id']; ?>&ano_execucao=<?php echo $_GET['ano_execucao']; ?>' >
                                <button class='desembolsos' 
                                >
                                    Desembolsos
                                </button>
                            </a>
                        </td>
                        <td><?php echo $orcamento['prazo_entrega_gsi']; ?></td>
                        <td><?php echo $orcamento['prazo_entrega_gqm']; ?></td>
                        <td><?php echo $orcamento['setor_responsavel']; ?></td>
                        <td><?php echo $orcamento['descricao']; ?></td>
                        <td class="situacao"><?php echo $orcamento['situacao']; ?></td>
                        <td><?php echo $orcamento['primeiro_desembolso']; ?></td>
                        <td>R$<?php echo str_replace(',', '.', number_format($orcamento['total_ano'])); ?></td>
                        <td>R$<?php echo str_replace(',', '.', number_format($orcamento['total_atrasos'])); ?></td>
                        <td><?php echo $orcamento['processo_sei']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
    <!-- Modal de Edição -->
    <div class="modal" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-center">Editar</h5>
                </div>
                <div class="modal-body">
                    <form id="formEdicao" action="./index.php?action=update" method="POST">
                        <input type="hidden" id="edit-id" name="id">
                        <input type="hidden" id="edit-table" name="orcamento" value="<?php echo $_GET['orcamento']?>">
                        <div class="form-group">
                            <label for="edit-processo_sei">Processo SEI</label>
                            <input type="text" class="form-control" id="processoSei" placeholder="00.0.000000-0" name="processo_sei" onfocus="mask()" maxlength="13" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-situacao">Situação:</label>
                            <select type="text" class="form-control" id="edit-situacao" name="situacao" required>
                               <option value="1">Reprogramado</option>
                               <option value="2">Atrasado</option>
                               <option value="3">Processo não iniciado</option>
                               <option value="4">Em dia</option>
                               <option value="5">Contratado</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="salvar-edicao">Salvar</button>
                            <button type="button" id="fechar-edicao" onclick="closeModal()">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/js/loader.js"></script>

</body>
</html>