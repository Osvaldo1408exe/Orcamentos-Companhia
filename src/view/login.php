<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Orçamentos CAJ</title>
</head>
<body>
    <div class="log-form">
    <h2>Sistema de orçamentos CAJ</h2>
    <form action="config/auth.php" method="POST">
        <input type="text" name="username" placeholder="Usuário" required/>
        <input type="password" name="password" placeholder="Senha" required/>
        <button type="submit" class="btn">Entrar</button>
        
    </form>
    </div>
    
</body>
</html>