<?php
require_once './database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["password"])){
        header("Location: /orcamentosCaJ");
        exit;
    }
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];


        $ldap_server = "";
        $ldap_port = "389"; 
        $ldap_user = "" .  $username;
        
        // Tenta se conectar ao servidor LDAP
        $ldap_conn = ldap_connect($ldap_server, $ldap_port);

        if ($ldap_conn) {
            // Tentativa de autenticação
            if (ldap_bind($ldap_conn, $ldap_user, $password)) {
                // Autenticação bem-sucedida
                
                $_SESSION['auth'] = true; 
                $_SESSION['username'] = $username;


                // historico 
                $user_registro = $username;
                date_default_timezone_set('America/Sao_Paulo');
                $data_entrada = date('Y-m-d H:i:s');
                $ip = $_SERVER['REMOTE_ADDR'];

                $update_historico = "INSERT INTO logs (usuario, data_entrada) VALUES ('$user_registro', '$data_entrada')";
                $result_historico = pg_query($conn, $update_historico);

                // Redireciona para a página Principal
                header("Location: ../index.php?action=plurianual&orcamento=investimento");
                exit; // Importante: encerra o script após o redirecionamento
            } else {
                // Falha na autenticação
                header("Location: /orcamentosCaJ");
                exit; 
            }
        } else {
            
            header("Location: /404");
        }

        
    } else {
        
        $error_message = "Por favor, preencha ambos os campos de usuário e senha.";
    }
    // Fecha a conexão 
    ldap_close($ldap_conn);
}

?>
