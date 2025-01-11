<?php
session_start();

use App\Controller\DesembolsosController;
use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\PlurianualController;
use App\Controller\AjudaController;
use App\Controller\UploadController;



require_once './src/controller/loginController.php';
require_once './src/controller/homeController.php';
require_once './src/controller/ajudaController.php';
require_once './src/controller/desembolsosController.php';
require_once './src/controller/plurianualController.php';
require_once './src/controller/uploadController.php';
require_once './config/database.php';



// Verificar autenticação antes de qualquer ação
$action = isset($_GET['action']) ? $_GET['action'] : '';
if (!isset($_SESSION['auth']) || $_SESSION['auth'] != true) {
    // Permite apenas a página de login sem autenticação
    if ($action !== 'login') {
        header('Location: index.php?action=login');
        exit();
    }
}



//controlllers
$loginController = new LoginController();
$ajudaController = new AjudaController();
$homeController = new HomeController($conn);
$plurianualController = new PlurianualController();
$desembolsoController = new DesembolsosController($conn);
$uploadController = new UploadController($conn);





$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : ''; 
$ano_execucao = isset($_GET['ano_execucao']) ? $_GET['ano_execucao'] : ''; 
$ano_prazo = isset($_GET['ano_prazo']) ? $_GET['ano_prazo'] : ''; 
$setor = isset($_GET['setor']) ? $_GET['setor'] : ''; 
$orcamento = isset($_GET['orcamento']) ? $_GET['orcamento'] : ''; 





switch ($action) {
    case 'login':
        $loginController->index();
        break;
    case 'logoff':
        $loginController->logout();
        break;
    case 'home':
        $homeController->index($orcamento ,$ano_execucao,$ano_prazo,$setor);
        break;
    case 'update':
        $homeController->route('update');
        break;
    case 'desembolsos':
        $desembolsoController->index($orcamento,$id);
        break;
    case 'ajuda':
        $ajudaController->index();
        break;
    case 'upload':
        $uploadController->index();
        break;
    case 'uploading':
        $uploadController->uploadCsv($_FILES['csv_file']);
        break;
    case 'plurianual':
        $plurianualController->index();
        break;
    default:
        header('Location: index.php?action=home');
        exit();

}
?>