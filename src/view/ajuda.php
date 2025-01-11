<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/ajuda.css">

    <title>Orçamentos CAJ</title>
</head>
<body>

    <!-- header -->
    <?php require_once 'src/includes/header.php'?>

    <div class="container mt-5">

        <p class="titulo"><span><strong>Orientações sobre as informações e funcionalidades do sistema de controle de processos a serem entregues na GSL.</strong></span></p>
        

        <ul>
            <li>Os dados foram importados da planilha de <strong>orçamento 2024 - 2028</strong>, fornecida pela GFI.</li>
            <li>A coluna "<strong>Situação</strong>" da planilha foi mantida, porém não está visível.</li>
            <li>Uma nova coluna "<strong>Status</strong>" foi adicionada com as seguintes opções:</li>
            <ul class="lista">
                <li>Não iniciado</li>
                <li>Em dia</li>
                <li>Atrasado</li>
                <li>Contratado</li>
            </ul>
        </ul>
        <ul class="lista">
            <li>"<strong>Não iniciado</strong>" = (sem cor) = Processos dos mês seguinte em diante que não foram iniciados.</li>
            <li>"<strong class="em-dia">Em dia</strong>" = (Amarelo) = Processos do mês atual.</li>
            <li>"<strong class="atrasado">Atrasado</strong>" = (Vermelho) = Processos do mês anterior ou mais antigos que não foram iniciados.</li>
            <li>"<strong class="contratado">Contratado</strong>" = (Azul) = Processos que já foram contratados.</li>
        </ul>
        <ul>
            <li>Uma rotina é executada uma vez ao dia no sistema e atualiza o status de "<strong>não iniciado</strong>" para "<strong>atrasado</strong>" quando o prazo de entrega na GSL (mês) não foi atendido.</li>
            <li>Cada gestor poderá alterar o status de "<strong>não iniciado</strong>" para "<strong>em dia</strong>" mediante a informação do processo SEI.</li>
            <li>Processos com status "<strong>em dia</strong>", que são referentes ao mês corrente e que não foi informado o processo SEI passarão automaticamente para "<strong>atrasado</strong>" no primeiro dia do mês seguinte.</li>
            <li>Para processos sem necessidade de licitação poderá ser informado número SEI 00.0.000000-0.<br />
            O painel (BI) tem duas visões. Uma com foco no prazo de entrega dos processos na GSL e outra com foco na data de desembolso (GFI).</li>
        </ul>
        
    </div>

    
</body>
</html>