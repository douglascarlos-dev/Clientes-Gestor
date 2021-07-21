<?php
include_once 'connection.php';

class Address extends Connection {
    private $id;
    private $id_clientes;
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

    function address_insert($function_name, $cpf, $address_category, $type, $name, $number, $district, $city, $state, $zip_code, $complement){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT * FROM $function_name('$cpf', '$address_category', '$type', '$name', '$number', '$district', '$city', '$state', '$zip_code', '$complement')"); 
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

    function post_address_new($cpf, $address_category, $type, $name, $number, $district, $city, $state, $zip_code, $complement){
        $result = $this->address_insert('address_insert_function', $cpf, $address_category, $type, $name, $number, $district, $city, $state, $zip_code, $complement);
        return $result;
    }

    function post_address_delete($cpf, $address_category){
        $result = $this->address_delete('address_delete_function', $cpf, $address_category);
        return $result;
    }
}

?>