<?php
include_once 'connection.php';

class Phone extends Connection{
    private $id;
    private $cpf;
    private $phone;
    private $type;
    private $created;
    private $updated;

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

    public function setUpdated(){
        date_default_timezone_set('America/Sao_Paulo');
        $date = new DateTimeImmutable();
        $date = $date->format('Y-m-d H:i:s O');
        $this->updated=$date;
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
    public function getUpdated()
    {
        return $this->updated;
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

    function phone_list_editar(){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT id, cpf, phone, type FROM view_phone_customer WHERE cpf = ? AND type = ? LIMIT 1"); 
        $stmt->execute([
            $this->getCPF(),
            $this->getType()
        ]); 
        $row = $stmt->fetch();
        $the_phone = new Phone();
        $the_phone->setCPF($row[1]);
        $the_phone->setPhone($row[2]);
        $the_phone->setType($this->getType());
        return $the_phone;
    }

    function phone_update(){
        $pdo = $this->o_db;

        $sql_cliente = "SELECT id FROM clientes WHERE cpf = ?";
        $stmt_cliente = $pdo->prepare($sql_cliente);
        $stmt_cliente->execute([$this->getCPF()]);
        $cliente = $stmt_cliente->fetch();

        if (!$cliente) {
            return false; 
        }

        $id_retorno = $cliente['id'];

        $sql_query = "UPDATE public.phone_customer
                    SET phone = ?, updated = ?
                    WHERE id_clientes = ? AND type = ?";
        
        $stmt = $pdo->prepare($sql_query);
        
        $success = $stmt->execute([
            $this->getPhone(),
            $this->getUpdated(),
            $id_retorno,
            $this->getType()
        ]);
        return $success;
    }

    function post_phone_new(){
        $result = $this->phone_insert();
        return $result;
    }

    function post_phone_delete(){
        $result = $this->phone_delete();
        return $result;
    }

    function post_phone_list_editar(){
        $result = $this->phone_list_editar();
        return $result;
    }

    function post_phone_list(){
        $result = $this->phone_list();
        return $result;
    }

    function post_phone_update(){
        $result = $this->phone_update();
        return $result;
    }

}
?>