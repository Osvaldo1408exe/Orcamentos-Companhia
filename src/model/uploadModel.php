<?php

require_once './config/database.php';

class UploadModel {
    private $conn;



    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function insertData($tabela, $prazo_entrega_gsi, $prazo_entrega_gqm, $centro_custo, $setor, $grupo, $descricao, $status, $data_reajuste, $numero_documento, $data_primeiro_desembolsos, $data_desembolso) {

        $ano_insercao = date('Y') + 1;

        //tratamentos de  identificadores
        $setor = $this->idSetor($setor);
        $grupo = $this->idGrupo($grupo);
        $status = $this->idStatus($status);



        $query = "INSERT INTO $tabela (prazo_entrega_gsi, prazo_entrega_gqm,id_centro_custo, id_setor_responsavel,  id_grupo ,
                descricao, id_status , data_reajuste ,numero_documento, data_primeiro_desembolso, ano_insercao) 
                VALUES ('$prazo_entrega_gsi', '$prazo_entrega_gqm', '$centro_custo', '$setor',  '$grupo', '$descricao', '$status', '$data_reajuste', '$numero_documento', 
                '$data_primeiro_desembolsos', '$ano_insercao') RETURNING id_investimento";

        $result = pg_query($this->conn,$query);
        if(!$result){
            die("Erro ao inserir: " . pg_last_error());
            error_log("Erro no update: " . pg_last_error() . PHP_EOL, 3, __DIR__ . '/logs/php_errors.log');
        }else{
            // Captura o ID inserido
            $row = pg_fetch_assoc($result);
            $idInserido = $row['id_' . $tabela];

            $this->insertDataDesembolso($tabela, $idInserido, $data_desembolso);

            
        }
    }


    public function insertDataDesembolso($tabela, $id_investimento, $data_desembolso) {
        $data = new DateTime(); 
        $data = $data->modify('+1 year'); 
    
        foreach ($data_desembolso as $ano => $meses) {
            foreach ($meses as $mes => $valor) {
                $data_formatada = $data->format('Y-m-d');
    
                $query = "INSERT INTO desembolso_$tabela (id_investimento, data_desembolso, valor) 
                          VALUES ('$id_investimento', '$data_formatada', '$valor')";
    
                $result = pg_query($this->conn, $query);
                if (!$result) {
                    die("Erro ao inserir desembolso: " . pg_last_error());
                    error_log("Erro ao inserir desembolso: " . pg_last_error());
                }
    
                $data->modify('+1 month');
            }
        }
        
    }


    //tratamentos de  identificadores
    private function idSetor($setor) {
        $query = "SELECT id_setor_responsavel FROM setor_responsavel WHERE descricao = '$setor'";
        $result = pg_query($this->conn, $query);
        if (!$result) {
            error_log("Erro ao buscar setor: " . pg_last_error($this->conn));
        }
        $row = pg_fetch_assoc($result);
        if (!$row) {
            error_log("Erro ao buscar setor: Setor $setor não cadastrado");
        }
        return $row['id_setor_responsavel'];
    }

    private function idGrupo($grupo) {
        $query = "SELECT id_grupo FROM grupo WHERE descricao = '$grupo'";
        $result = pg_query($this->conn, $query);
        if (!$result) {
        error_log("Erro ao buscar grupo: " . pg_last_error($this->conn));
        }
        $row = pg_fetch_assoc($result);
        if (!$row) {
            $query = "INSERT INTO grupo (descricao) VALUES ('$grupo') RETURNING id_grupo";
            $result = pg_query($this->conn, $query);
            return $row['id_grupo'];

        }
        return $row['id_grupo'];
    }

    private function idStatus($status) {
        $query = "SELECT id_status FROM status WHERE descricao = '$status'";
        $result = pg_query($this->conn, $query);
        if (!$result) {
            error_log("Erro ao buscar status: " . pg_last_error($this->conn));
        }
        $row = pg_fetch_assoc($result);
        if (!$row) {
            return 1;
        }
        return $row['id_status'];
    }
}
?>