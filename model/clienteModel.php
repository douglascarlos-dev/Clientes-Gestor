<?php
include_once 'connection.php';

class Cliente extends Connection {
    private $id;
    private $nome;
    private $cpf;

    function database_select_one($valor1, $valor2, $valor3){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT * FROM $valor1 WHERE $valor2 = '$valor3' LIMIT 1"); 
        $stmt->execute(); 
        $row = $stmt->fetch();
        return $row;
    }

    function database_select_all_var($valor1, $valor2, $valor3){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT * FROM $valor1 WHERE $valor2 = '$valor3'"); 
        $stmt->execute(); 
        $row = $stmt->fetchAll();
        return $row;
    }

    function database_select_all($valor1){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT * FROM $valor1 ORDER BY id"); 
        $stmt->execute(); 
        $row = $stmt->fetchAll();
        return $row;
    }

    function database_insert($tabela_name, $valor1, $valor2, $valor3, $valor4, $valor5, $valor6){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("INSERT INTO $tabela_name(nome, email, cpf, data_de_nascimento, sexo_cliente, estado_civil_cliente) VALUES('$valor1', '$valor2', '$valor3', '$valor4', '$valor5', '$valor6')"); 
        $stmt->execute(); 
        return true;
    }

    function cliente_update($nome, $email, $data_de_nascimento, $sexo_cliente, $estado_civil_cliente, $cpf){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("UPDATE clientes SET nome = '$nome', email = '$email', data_de_nascimento = '$data_de_nascimento', sexo_cliente = '$sexo_cliente', estado_civil_cliente = '$estado_civil_cliente' WHERE cpf = '$cpf'"); 
        $stmt->execute(); 
        return true;
    }

    function deletar($tabela, $coluna, $valor){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("DELETE FROM $tabela WHERE $coluna = '$valor'");
        $stmt->execute();
        return $stmt->rowCount();
    }


    function get_cliente($id){
        $id = (string) $id;
        $consulta = $this->database_select_one('clientes', 'cpf', $id);
        return $consulta;
    }
    
    function get_all_clientes(){
        $consulta = $this->database_select_all('clientes');
        return $consulta;
    }

    function get_cliente_telefone($id){
        $id = (string) $id;
        $consulta = $this->database_select_all_var('view_telefone_cliente', 'cpf', $id);
        return $consulta;
    }

    function post_cliente_new($valor1, $valor2, $valor3, $valor4, $valor5, $valor6){
        $consulta = $this->database_insert('clientes', $valor1, $valor2, $valor3, $valor4, $valor5, $valor6);
        return $consulta;
    }

    function deletar_cliente($cpf){
        $cpf = (string) $cpf;
        $consulta = $this->deletar('clientes', 'cpf', $cpf);
        return $consulta;
    }

    function atualizar_cliente($valor1, $valor2, $valor3, $valor4, $valor5, $valor6){
        $consulta = $this->cliente_update($valor1, $valor2, $valor3, $valor4, $valor5, $valor6);
        return $consulta;
    }

}
?>