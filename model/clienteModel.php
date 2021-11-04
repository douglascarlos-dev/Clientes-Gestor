<?php
include_once 'connection.php';

class Cliente extends Connection {
    private $id;
    private $cpf;
    private $name;
    private $email;
    private $birthdate;
    private $sex;
    private $maritalstatus;

    public function setId($id){
        $this->id=$id;
        return $this;
    }
    public function setCPF($cpf){
        $this->cpf=$cpf;
        return $this;
    }
    public function setName($name){
        $this->name=$name;
        return $this;
    }
    public function setEmail($email){
        $this->email=$email;
        return $this;
    }
    public function setBirthDate($birthdate){
        $this->birthdate=$birthdate;
        return $this;
    }
    public function setSex($sex){
        $this->sex=$sex;
        return $this;
    }
    public function setMaritalStatus($maritalstatus){
        $this->maritalstatus=$maritalstatus;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getCPF()
    {
        return $this->cpf;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getBirthDate()
    {
        return $this->birthdate;
    }
    public function getSex()
    {
        return $this->sex;
    }
    public function getMaritalStatus()
    {
        return $this->maritalstatus;
    }



    // old

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

    function get_cliente_address($id){
        $id = (string) $id;
        $consulta = $this->database_select_all_var('view_address', 'cpf', $id);
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

    // new

    function customer_insert(){
        $sql_query = "SELECT * FROM customer_insert_function
                        (
                            '" . $this->getCPF() . "',
                            '" . $this->getName() . "',
                            '" . $this->getEmail() . "',
                            '" . $this->getBirthDate() . "',
                            '" . $this->getSex() . "',
                            '" . $this->getMaritalStatus() . "'
                        )";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }

    function post_customer_new(){
        $result = $this->customer_insert();
        return $result;
    }

}
?>