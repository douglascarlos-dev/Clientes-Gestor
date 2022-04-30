<?php
include_once 'connection.php';

class Phone extends Connection{
    private $id;
    private $cpf;
    private $phone;
    private $type;

    public function setId($id){
        $this->id=$id;
        return $this;
    }

    public function setCPF($cpf){
        $this->cpf=$cpf;
        return $this;
    }

    public function setPhone($phone){
        $this->phone=$phone;
        return $this;
    }
    public function setType($type){
        $this->type=$type;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function getCPF(){
        return $this->cpf;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getType(){
        return $this->type;
    }

    public function phone_insert(){
        $sql_query = "SELECT * FROM inserir_telefone
                        (
                            '" . $this->getCPF() . "',
                            '" . $this->getPhone() . "',
                            '" . $this->getType() . "'
                        )";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query); 
        $stmt->execute(); 
        $row = $stmt->fetch();
        return $row;
    }

    public function phone_delete(){
        $sql_query = "SELECT * FROM apagar_telefone
                        (
                            '" . $this->getCPF() . "',
                            '" . $this->getType() . "',
                            '" . $this->getPhone() . "'
                        )";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $stmt->execute(); 
        $row = $stmt->fetchAll();
        return $row;
    }

    function phone_list(){
        $sql_query = "SELECT * FROM view_phone_customer WHERE cpf = '" . $this->getCPF() . "'";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $array_phone= array();
        $stmt->execute();
        while($row = $stmt->fetch()){
            $the_phone = new Phone();
            $the_phone->setCPF($row[1]);
            $the_phone->setPhone($row[2]);
            $the_phone->setType($row[3]);
            array_push($array_phone, $the_phone);
        }
        return $array_phone;
    }

    function post_phone_new(){
        $result = $this->phone_insert();
        return $result;
    }

    function post_phone_delete(){
        $result = $this->phone_delete();
        return $result;
    }

    function post_phone_list(){
        $result = $this->phone_list();
        return $result;
    }

}
?>