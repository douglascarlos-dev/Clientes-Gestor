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

    function post_telefone_new($valor1, $valor2, $valor3){
        $consulta = $this->telefone_insert('inserir_telefone', $valor1, $valor2, $valor3);
        return $consulta;
    }

    function deletar_cliente($cpf, $tipo, $numero){
        $consulta = $this->telefone_delete('apagar_telefone', $cpf, $tipo, $numero);
        return $consulta;
    }
}

?>