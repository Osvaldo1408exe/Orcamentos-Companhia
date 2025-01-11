<?php

require_once './config/database.php';

class DesembolsosModel {
    private $conn;



    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function getDesembolsos($orcamento,$id) {
            // Consulta SQL
            $query = "SELECT TO_CHAR(data_desembolso, 'MM/YYYY') as data_desembolso,valor FROM desembolso_$orcamento
                        WHERE id_$orcamento = $id
                        ORDER BY desembolso_$orcamento.data_desembolso ";
        
        
        

        $result = pg_query($this->conn, $query);

        if (!$result) {
            die("Erro na consulta ao banco de dados: " . pg_last_error());
        }

        // Armazenar os resultados em um array
        $desembolsos = [];
        while ($row = pg_fetch_assoc($result)) {
            $desembolsos[] = $row;
        }

        return $desembolsos;
    }
}
?>
