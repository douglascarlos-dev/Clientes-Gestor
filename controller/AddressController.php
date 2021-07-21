<?php

require_once 'model/addressModel.php';
require_once 'controller/ClientesController.php';

class AddressController {
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

    public function list( $cpf ){
        //require_once 'view/address_new.php';
    }

    public function new( $cpf ){
        require_once 'view/address_new.php';
    }

    public function save( $cpf ){
        $address = new Address();
        //if($_REQUEST['address_category'] != 0) {
            $address->post_address_new($cpf, $_REQUEST['address_category'], $_REQUEST['type'], $_REQUEST['name'], $_REQUEST['number'], $_REQUEST['district'], $_REQUEST['city'], $_REQUEST['state'], $_REQUEST['zip_code'], $_REQUEST['complement']);
        //}
        ClientesController::editar($cpf);
    }

    public function remove( $array ){
        $address = new Address();
        $cpf = $array[0];
        if(sizeof($array) == 2){
            $address_category = $array[1];
            $address->post_address_delete($cpf, $address_category);
        }
        ClientesController::editar($cpf);
    }

}
?>