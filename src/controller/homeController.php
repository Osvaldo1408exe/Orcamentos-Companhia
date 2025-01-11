<?php
namespace App\Controller;

use HomeModel;

require_once './src/model/homeModel.php';
require_once './config/database.php';


class HomeController {
    private $model;

    public function __construct($dbConn) {
        $this->model = new HomeModel($dbConn); 
    }

    //Gerenciardor de rotas
    public function route($action) {
        switch ($action) {
            case 'index':
                $orcamento = $_GET['orcamento'] ?? null;
                $ano_insercao = $_GET['ano_insercao'] ?? null;
                $ano_prazo = $_GET['ano_insercao'] ?? null;
                $setor = $_GET['setor'] ?? null;

                $this->index($orcamento, $ano_insercao,$ano_prazo,$setor);
                break;

            case 'update':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->update(
                        $_POST['orcamento'],
                        $_POST['id'],
                        $_POST['processo_sei'],
                        $_POST['situacao']
                    );
                } else {
                    echo "Método inválido.";
                }
                break;

            default:
                echo "Rota não encontrada.";
                break;
        }
    }

    

    public function index($orcamento, $ano_insercao, $ano_prazo,$setor) {
        $orcamentos = $this->model->getOrcamentos($orcamento, $ano_insercao, $ano_prazo,$setor);
        require './src/view/home.php';
    }

    public function update($orcamento, $id, $processoSei, $situacao) {
        $this->model->updateOrcamentos($orcamento, $id, $processoSei, $situacao);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
?>
