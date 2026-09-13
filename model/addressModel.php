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
    public function setUpdated(){
        date_default_timezone_set('America/Sao_Paulo');
        $date = new DateTimeImmutable();
        $date = $date->format('Y-m-d H:i:s O');
        $this->updated=$date;
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
    public function getUpdated()
    {
        return $this->updated;
    }

    function address_insert(){
        $sql_query = "SELECT * FROM address_insert_function(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $stmt->execute([
            $this->getCPF(),
            $this->getAddressCategory(),
            $this->getType(),
            $this->getName(),
            $this->getNumber(),
            $this->getDistrict(),
            $this->getCity(),
            $this->getState(),
            $this->getZipCode(),
            $this->getComplement()
        ]);
        return $stmt->fetch();
    }

    function address_delete(){
        $sql_query = "SELECT * FROM address_delete_function(?, ?)";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $stmt->execute([
            $this->getCPF(),
            $this->getAddressCategory()
        ]); 
        $row = $stmt->fetchAll();
        return $row;
    }

    function address_list(){
        $sql_query = "SELECT * FROM view_address WHERE cpf = ?";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $array_address = array();
        $stmt->execute([
            $this->getCPF()
        ]);
        while($row = $stmt->fetch())
        {
            $the_address = new Address();
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

    function address_list_editar(){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT tipo, nome, numero, bairro, cidade, uf, complemento, cep FROM view_address WHERE cpf = ? AND categoria_endereco = ? LIMIT 1"); 
        $stmt->execute([
            $this->getCPF(),
            $this->getAddressCategory()
        ]); 
        $row = $stmt->fetch();
        $address= new Address();
        $address->setType($row[0]);
        $address->setName($row[1]);
        $address->setNumber($row[2]);
        $address->setDistrict($row[3]);
        $address->setCity($row[4]);
        $address->setState($row[5]);
        $address->setComplement($row[6]);
        $address->setZipCode($row[7]);
        $address->setAddressCategory($this->getAddressCategory());
        return $address;
    }

    function address_update(){
        $pdo = $this->o_db;

        $sql_cliente = "SELECT id FROM clientes WHERE cpf = ?";
        $stmt_cliente = $pdo->prepare($sql_cliente);
        $stmt_cliente->execute([$this->getCPF()]);
        $cliente = $stmt_cliente->fetch();

        if (!$cliente) {
            return false; 
        }

        $id_retorno = $cliente['id'];

        $sql_query = "UPDATE public.address
                    SET tipo = ?, nome = ?, numero = ?, bairro = ?, cidade = ?, uf = ?, complemento = ?, cep = ?, updated = ?
                    WHERE id_clientes = ? AND categoria_endereco = ?";
        
        $stmt = $pdo->prepare($sql_query);
        
        $success = $stmt->execute([
            $this->getType(),
            $this->getName(),
            $this->getNumber(),
            $this->getDistrict(),
            $this->getCity(),
            $this->getState(),
            $this->getComplement(),
            $this->getZipCode(),
            $this->getUpdated(),
            $id_retorno,
            $this->getAddressCategory()
        ]);
        return $success;
    }

    function post_address_new(){
        $result = $this->address_insert();
        return $result;
    }

    function post_address_delete(){
        $result = $this->address_delete();
        return $result;
    }

    function post_address_list(){
        $result = $this->address_list();
        return $result;
    }

    function post_address_list_editar(){
        $result = $this->address_list_editar();
        return $result;
    }

    function post_address_update(){
        $result = $this->address_update();
        return $result;
    }
    
}
?>