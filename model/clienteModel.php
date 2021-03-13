<?php
include_once 'connection.php';

class Cliente extends Connection {
    private $id;
    private $nome;
    private $cpf;
    private $cores;

    function todas_as_cores(){
        $this->cores = array('Azul', 'Amarelo', 'Verde');
        return $this->cores;
    }

    function set_name($name){
        $this->nome = $name;
    }

    function get_name(){
        return $this->nome;
    }

    

    function database_select_one($valor1, $valor2, $valor3){
        // - Inicio
        $pdo = $this->o_db;
        // - Fim
        $stmt = $pdo->prepare("SELECT * FROM $valor1 WHERE $valor2 = '$valor3' LIMIT 1"); 
        $stmt->execute(); 
        $row = $stmt->fetch();

        return $row;
    }

    function database_select_all_var($valor1, $valor2, $valor3){
        // - Inicio
        $pdo = $this->o_db;
        // - Fim
        $stmt = $pdo->prepare("SELECT * FROM $valor1 WHERE $valor2 = '$valor3'"); 
        $stmt->execute(); 
        $row = $stmt->fetchAll();
        return $row;
    }

    function database_select_all($valor1){
        // - Inicio
        $pdo = $this->o_db;
        // - Fim
        $stmt = $pdo->prepare("SELECT * FROM $valor1 ORDER BY id"); 
        $stmt->execute(); 
        //$row = $stmt->fetch();
        //$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $row = $stmt->fetchAll();
        //$pdo = null;
        return $row;
    }

    function database_insert($tabela_name, $valor1, $valor2, $valor3, $valor4, $valor5, $valor6){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("INSERT INTO $tabela_name(nome, email, cpf, data_de_nascimento, sexo_cliente, estado_civil_cliente) VALUES('$valor1', '$valor2', '$valor3', '$valor4', '$valor5', '$valor6')"); 
        $stmt->execute(); 
        //$row = $this->pdo->lastInsertId('stocks_id_seq');
        return true;
    }

    function cliente_update($nome, $cpf){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("UPDATE clientes SET nome = '$nome' WHERE cpf = '$cpf'"); 
        $stmt->execute(); 
        //$row = $this->pdo->lastInsertId('stocks_id_seq');
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

    function atualizar_cliente($valor1, $valor2){
        $consulta = $this->cliente_update($valor1, $valor2);
        return $consulta;
    }

}
?>