<?php
namespace App\Controller;
use DesembolsosModel;

require_once './src/model/desembolsosModel.php';
require_once './config/database.php';

class DesembolsosController {
    private $model;

    public function __construct($dbConn) {
        $this->model = new DesembolsosModel($dbConn); 
    }

    public function index($orcamento,$id) {
        $desembolsos = $this->model->getDesembolsos($orcamento,$id);
        require './src/view/desembolsos.php';

    }
}
?>
