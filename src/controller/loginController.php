<?php
namespace App\Controller;

class LoginController {
    public function index() {
        // Exibe a página inicial após login
        require './src/view/login.php';
    }

    public function logout() {
        session_start();

        session_unset();
        session_destroy();

        // Redireciona para a página de login
        header("Location: index.php?action=login");
        exit();       
    }

}
?>
