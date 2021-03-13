<?php
include_once 'connection.php';

class Telefone extends Connection {
    private $descricao;
    private $cpf;

    function telefone_insert($tabela_name, $valor1, $valor2, $valor3){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT * FROM $tabela_name('$valor1', '$valor2', '$valor3')"); 
        $stmt->execute(); 
        $row = $stmt->fetch();

        return $row;
    }

    function telefone_delete($tabela_name, $valor1, $valor2, $valor3){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT * FROM $tabela_name('$valor1', '$valor2', '$valor3')");
        $stmt->execute(); 
        $row = $stmt->fetchAll();
        return $row;
    }

    //$result = pg_prepare($dbconn, "my_query", 'SELECT * FROM inserir_telefone( $1, $2, $3 )');

    //$result = pg_execute($dbconn, "my_query", array($cpf, $telefone, $tipo));

    function post_telefone_new($valor1, $valor2, $valor3){
        $consulta = $this->telefone_insert('inserir_telefone', $valor1, $valor2, $valor3);
        return $consulta;
    }

    /*$result = pg_query($dbconn, "SELECT * FROM apagar_telefone('".$cpf."','".$tipo."','".$telefone."')");
    while ($row = pg_fetch_assoc($result)) {
      $apagar_telefone = $row["apagar_telefone"];
    }*/

    function deletar_cliente($cpf, $tipo, $numero){
        $consulta = $this->telefone_delete('apagar_telefone', $cpf, $tipo, $numero);
        return $consulta;
    }
}

?>