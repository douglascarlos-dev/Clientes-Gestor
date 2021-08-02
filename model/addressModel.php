<?php
include_once 'connection.php';

class Address extends Connection {
    private $id;
    private $cpf;
    private $address_category;
    private $type;
    private $name;
    private $number;
    private $district;
    private $city;
    private $state;
    private $zip_code;
    private $complement;

    public function setId($id){
        $this->id=$id;
        return $this;
    }

    public function setCPF($cpf){
        $this->cpf=$cpf;
        return $this;
    }
    public function setAddressCategory($address_category){
        $this->address_category=$address_category;
        return $this;
    }
    public function setType($type){
        $this->type=$type;
        return $this;
    }
    public function setName($name){
        $this->name=$name;
        return $this;
    }

    public function setNumber($number){
        $this->number=$number;
        return $this;
    }

    public function setDistrict($district){
        $this->district=$district;
        return $this;
    }

    public function setCity($city){
        $this->city=$city;
        return $this;
    }

    public function setState($state){
        $this->state=$state;
        return $this;
    }

    public function setZipCode($zip_code){
        $this->zip_code=$zip_code;
        return $this;
    }

    public function setComplement($complement){
        $this->complement=$complement;
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

    public function getAddressCategory()
    {
        return $this->address_category;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getZipCode()
    {
        return $this->zip_code;
    }

    public function getComplement()
    {
        return $this->complement;
    }

    function address_insert(){
        $sql_query = "SELECT * FROM address_insert_function
                        (
                            '" . $this->getCPF() . "',
                            '" . $this->getAddressCategory() . "',
                            '" . $this->getType() . "',
                            '" . $this->getName() . "',
                            '" . $this->getNumber() . "',
                            '" . $this->getDistrict() . "',
                            '" . $this->getCity() . "',
                            '" . $this->getState() . "',
                            '" . $this->getZipCode() . "',
                            '" . $this->getComplement() . "'
                        )";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }

    function address_delete($function_name, $cpf, $address_category){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT * FROM $function_name('$cpf', '$address_category')");
        $stmt->execute(); 
        $row = $stmt->fetchAll();
        return $row;
    }

    function address_list($valor1, $valor2){
        $sql_query = "SELECT * FROM $valor1 WHERE $valor2 = '" . $this->getCPF() . "'";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $array_address = array();
        $stmt->execute();
        while($row = $stmt->fetch())
        {
            $the_address = new Address();
            //$the_address->setId($row[0]);
            $the_address->setCPF($row[1]);
            $the_address->setAddressCategory($row[2]);
            $the_address->setType($row[3]);
            $the_address->setName($row[4]);
            $the_address->setNumber($row[5]);
            $the_address->setDistrict($row[6]);
            $the_address->setCity($row[7]);
            $the_address->setState($row[8]);
            $the_address->setZipCode($row[9]);
            $the_address->setComplement($row[10]);
            array_push($array_address, $the_address);
        }
        return $array_address;
    }

    function post_address_new(){
        $result = $this->address_insert();
        return $result;
    }

    function post_address_delete($cpf, $address_category){
        $result = $this->address_delete('address_delete_function', $cpf, $address_category);
        return $result;
    }

    function post_address_list($cpf){
        $this->setCPF($cpf);
        $result = $this->address_list('view_address', 'cpf');
        return $result;
    }
}

?>