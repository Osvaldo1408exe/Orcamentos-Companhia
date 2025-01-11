<?php 
namespace App\Controller;

use UploadModel;

require_once './src/model/uploadModel.php';
require_once './config/database.php';

Class UploadController{
    private $model;
    public $response = [];



    public function __construct($dbconn)
    {
        $this->model = new uploadModel($dbconn);
    }


    public function index(){
        require './src/view/upload.php';
    }


    public function uploadCSV() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
            $file = $_FILES['csv_file']['tmp_name'];

            if (($handle = fopen($file, 'r')) !== false) {
                $header = fgetcsv($handle, 1000, ";"); 

                while (($data = fgetcsv($handle, 1000, ";")) !== false) {
                    // Pula linhas vazias
                    if (count($data) < 11) {
                        continue;
                    }

                    $data = array_map('trim', $data);

                    $tabela = $_GET['orcamento'];

                    //tabela de gasto/investimento
                    $prazo_entrega_gsi = $this->formatarData($data[0]);
                    $prazo_entrega_gqm =  $this->formatarData($data[1]);
                    $centro_custo = !empty($data[2]) ? trim($data[2]) : null;
                    $setor = !empty($data[3]) ? trim($data[3]) : null;
                    $grupo = !empty($data[4]) ? trim($data[4]) : null;
                    $descricao = !empty($data[5]) ? trim($data[5]) : null;
                    $status = !empty($data[6]) ? trim($data[6]) : null;
                    $data_reajuste =  $this->formatarData($data[7]);
                    $numero_documento = !empty($data[8]) ? trim($data[8]) : null;
                    $data_primeiro_desembolsos =  $this->formatarData($data[9]);


                    //tabela de desembolso do investimento/gasto
                    $desembolsos = [];

                    for ($ano = 1; $ano <= 4; $ano++) {
                        for ($mes = 0; $mes < 12; $mes++) {
                            $indice = 11 + (($ano - 1) * 12) + $mes;

                        
                            $desembolsos[$ano][] = $this->formatarValor($data[$indice]);
                        }
                    }
 

                    $this->model->insertData(
                        $tabela,
                        $prazo_entrega_gsi,
                        $prazo_entrega_gqm,
                        $centro_custo,
                        $setor,
                        $grupo,
                        $descricao,
                        $status,
                        $data_reajuste,
                        $numero_documento,
                        $data_primeiro_desembolsos,
                        $desembolsos
                    );                    
                }
                    
            }
            fclose($handle);
                $response['status'] = 'success';
                $response['message'] = "Dados enviados!";  
                
            }else {
                $response['status'] = 'error';
                $response['message'] = "Arquivo não enviado.";
            }

        // Retorna um JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    //tratamentos 
    private function formatarData($data) {
        $data = trim($data);
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $data)) {
            return $data;
        }
    
        $timestamp = strtotime(str_replace('/', '-', $data)); 
        if ($timestamp) {
            return date('Y-m-d', $timestamp); 
        }
    
        return '1900-01-01';
    }

    private function formatarValor($valor) {
        if ($valor === '-') {
            return 0;
        }

        $valor = preg_replace('/[^0-9]/', '', $valor);
        $valor = $valor * 1000;

        return $valor;
    }
    
}
?>