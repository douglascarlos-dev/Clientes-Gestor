<?php

require_once 'model/addressModel.php';
require_once 'controller/ClientesController.php';

class AddressController {

    public function list( $cpf ){
        //$address = new Address();
        //$this->setCPF($cpf);
        //$address->setCPF($cpf);
        //echo $cpf;
        //$address->post_address_list($cpf);
        //require_once 'view/address_list.php';
    }

    public function new( $cpf ){
        require_once 'view/address_new.php';
    }

    public function save( $cpf ){
        $address = new Address();
        $address->setCPF($cpf);
        $address->setAddressCategory($_REQUEST['address_category']);
        $address->setType($_REQUEST['type']);
        $address->setName($_REQUEST['name']);
        $address->setNumber($_REQUEST['number']);
        $address->setDistrict($_REQUEST['neighborhood']);
        $address->setCity($_REQUEST['city']);
        $address->setState($_REQUEST['state']);
        $address->setZipCode($_REQUEST['zip_code']);
        $address->setComplement($_REQUEST['complement']);
        $address->post_address_new();
        ClientesController::edit($cpf);
    }

    public function remove( $array ){
        $address = new Address();
        if(sizeof($array) == 2){
            $cpf = $array[0];
            $address_category = $array[1];
            $address->setCPF($cpf);
            $address->setAddressCategory($address_category);
            $address->post_address_delete();
        }
        ClientesController::edit($cpf);
    }

}
?>