<?php
include_once 'connection.php';

class Customer extends Connection {
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

    function database_select_all_var($valor1, $valor2, $valor3){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT * FROM $valor1 WHERE $valor2 ILIKE '%$valor3%' ORDER BY nome"); 
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
    
    function get_all_customer(){
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

    function customer_insert(){
        $sql_query = "SELECT * FROM customer_insert_function
                        (
                            '" . $this->getName() . "',
                            '" . $this->getEmail() . "',
                            '" . $this->getCPF() . "',
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

    function custumer_update(){
        $sql_query = "SELECT * FROM customer_update_function
                        (
                            '" . $this->getName() . "',
                            '" . $this->getEmail() . "',
                            '" . $this->getCPF() . "',
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

    function post_customer_update(){
        $result = $this->custumer_update();
        return $result;
    }

    function custumer_delete(){
        $sql_query = "SELECT * FROM customer_remove_function
                        (
                            '" . $this->getCPF() . "'
                        )";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $stmt->execute();
        $row = $stmt->rowCount();
        return $row;
    }

    function post_customer_delete(){
        $result = $this->custumer_delete();
        return $result;
    }

    function customer_list(){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT * FROM clientes WHERE cpf = '" . $this->getCPF() . "' LIMIT 1"); 
        $stmt->execute(); 
        $row = $stmt->fetch();
        $cliente = new Customer();
        $cliente->setName($row[2]);
        $cliente->setEmail($row[3]);
        $cliente->setCPF($row[4]);
        $cliente->setBirthDate($row[5]);
        $cliente->setSex($row[6]);
        $cliente->setMaritalStatus($row[7]);
        return $cliente;
    }

    function custumer_search(){
        $consulta = $this->database_select_all_var('clientes', 'nome', $this->getName());
        return $consulta;
    }

    function post_customer_search(){
        $result = $this->custumer_search();
        return $result;
    }

}
?>