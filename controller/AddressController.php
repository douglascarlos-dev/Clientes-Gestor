<?php

require_once 'model/addressModel.php';
require_once 'controller/ClientesController.php';

class AddressController {

    public function list( $cpf ){
        $address = new Address();
        $address = $address->post_address_list($cpf);
        require_once 'view/address_list.php';
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