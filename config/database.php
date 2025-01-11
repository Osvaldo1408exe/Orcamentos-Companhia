<?php
$host = "localhost";
$port = "5432";
$dbname = "db_orcamentos";
$user = "postgres";
$password = "321";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
      
    die("Erro ao conectar ao banco de dados PostgreSQL.");
}
?>
