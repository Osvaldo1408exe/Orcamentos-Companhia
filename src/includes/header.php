<link rel="stylesheet" href="./public/css/header.css">
<script src="./public/js/header.js"></script>


</style>
<nav class="navbar">
  <div class="container-fluid">
    <?php if($_GET['orcamento'] == 'investimento'):?>
      <a class="navbar-brand" href="./index.php?action=plurianual&orcamento=investimento&ano_execucao=2024">Investimentos <?php echo $_GET['ano_execucao']?></a>
    <?php else:?>
      <a class="navbar-brand" href="./index.php?action=plurianual&orcamento=investimento&ano_execucao=2024">Gastos <?php echo $_GET['ano_execucao']?></a>
    <?php endif?>

    <button class="navbar-toggler" onclick="toggleNavbar()" aria-label="Toggle navigation" aria-expanded="false">
      <span>☰</span>
    </button>
    <div class="navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav">
      
      <?php if($_GET['orcamento'] == 'investimento'):?>

        <!-- dropdown de ano -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Ano</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>">Sem prazo de entrega</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2023">2023</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2024">2024</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2025">2025</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2026">2026</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2027">2027</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2028">2028</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2029">2029</a></li>
            
            <!-- Restante dos anos -->
          </ul>
        </li>

        <!-- dropdown de setor -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Setor</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=CIOP">CIOP</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=CME">CME</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GAG">GAG</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GES">GES</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GEX">GEX</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GFC">GFC</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GMS">GMS</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GQM">GQM</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GRI">GRI</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GSL">GSL</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GTI">GTI</a></li>
                
            <!-- Restante dos itens -->
          </ul>
        </li>



        <?php else:?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Ano</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>">Sem prazo de entrega</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2023">2023</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2024">2024</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2025">2025</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2026">2026</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2027">2027</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2028">2028</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2029">2029</a></li>
            
            <!-- Restante dos anos -->
          </ul>
        </li>     


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Setor</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=CIOP">CIOP</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=CME">CME</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GAG">GAG</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GES">GES</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GEX">GEX</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GFC">GFC</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GMS">GMS</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GQM">GQM</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GRI">GRI</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GSL">GSL</a></li>
              <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&setor=GTI">GTI</a></li>
                
            <!-- Restante dos itens -->
          </ul>
        </li>
        <?php endif?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Dashboards</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://app.powerbi.com/groups/me/reports/030b4318-6688-436a-88c7-be4515886cd0/ReportSection?experience=power-bi" target="_blank">Painel Licitações</a></li>
          </ul>
        </li>

        <?php if($_GET['orcamento'] == 'investimento'):?>
          <li class="nav-item">
            <a class="nav-link" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>">Ir para: Gastos</a>
          </li>

        <?php else:?>
          <li class="nav-item">
            <a class="nav-link" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>">Ir para: Investimentos</a>
          </li>
        <?php endif?>

        <li class="nav-item">
          <a class="nav-link" href="./index.php?action=ajuda&orcamento=<?php echo $_GET['orcamento']?>&ano_execucao=<?php echo $_GET['ano_execucao']?>">Help</a>
        </li>

        <?php if($_SESSION['username'] == 'admin'):?>
        <li >
          <form method="post" action="./index.php?action=upload&orcamento=<?php echo $_GET['orcamento']?>&ano_execucao=<?php echo $_GET['ano_execucao']?>">
            <button id="uploadBtn" class="nav-link">Upload</button>
          </form>
        </li>
        <?php endif?>

        <li class="nav-item">
          <form method="post" action="./index.php?action=logoff">
            <button id="cacheBtn" class="nav-link">Sair</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
