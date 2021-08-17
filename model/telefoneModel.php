<?php
include_once 'connection.php';

class Telefone extends Connection{
    private $id;
    private $cpf;
    private $telefone;
    private $tipo;

    public function setId($id){
        $this->id=$id;
        return $this;
    }

    public function setCPF($cpf){
        $this->cpf=$cpf;
        return $this;
    }

    public function setTelefone($telefone){
        $this->telefone=$telefone;
        return $this;
    }
    public function setTipo($tipo){
        $this->tipo=$tipo;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function getCPF(){
        return $this->cpf;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function telefone_insert(){
        $sql_query = "SELECT * FROM inserir_telefone
                        (
                            '" . $this->getCPF() . "',
                            '" . $this->getTelefone() . "',
                            '" . $this->getTipo() . "'
                        )";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query); 
        $stmt->execute(); 
        $row = $stmt->fetch();
        return $row;
    }

    public function telefone_delete(){
        $sql_query = "SELECT * FROM apagar_telefone
                        (
                            '" . $this->getCPF() . "',
                            '" . $this->getTipo() . "',
                            '" . $this->getTelefone() . "'
                        )";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $stmt->execute(); 
        $row = $stmt->fetchAll();
        return $row;
    }

    function telefone_list(){
        $sql_query = "SELECT * FROM view_telefone_cliente WHERE cpf = '" . $this->getCPF() . "'";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $array_telefone = array();
        $stmt->execute();
        while($row = $stmt->fetch()){
            $the_telefone = new Telefone();
            $the_telefone->setCPF($row[1]);
            $the_telefone->setTelefone($row[2]);
            $the_telefone->setTipo($row[3]);
            array_push($array_telefone, $the_telefone);
        }
        return $array_telefone;
    }

}
?>