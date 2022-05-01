<?php

require_once 'model/addressModel.php';
require_once 'controller/CustomerController.php';

class AddressController {

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
        CustomerController::edit($cpf);
    }

    public function delete( $array ){
        $address = new Address();
        if(sizeof($array) == 2){
            $cpf = $array[0];
            $address_category = $array[1];
            $address->setCPF($cpf);
            $address->setAddressCategory($address_category);
            $address->post_address_delete();
        }
        CustomerController::edit($cpf);
    }

}
?>