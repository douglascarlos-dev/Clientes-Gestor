<?php

require_once 'model/phoneModel.php';
require_once 'controller/CustomerController.php';

class PhoneController {

    public function new( $cpf ){
        require_once 'view/phone_new.php';
    }

    public function editar( $array ){
        $phone = new Phone();
        if(sizeof($array) == 2){
            $cpf = $array[0];
            $phone_category = $array[1];
            $phone->setCPF($cpf);
            $phone->setType($phone_category);
            $phone = $phone->post_phone_list_editar();
        }
        require_once 'view/phone_editar.php';
    }

    public function atualizar( $cpf ) {
        $phone = new Phone();
        $phone->setCPF($cpf);
        $phone->setType($_REQUEST['type']);
        $phone->setPhone($_REQUEST['phone']);
        $phone->setUpdated();
        $phone->post_phone_update();
        header("HTTP/1.1 303 See Other");
        header("Location: ../../customer/edit/$cpf");
    }

    public function save( $cpf ){
        $phone = new Phone();
        if($_REQUEST['phone'] != 0) {
            $phone->setCPF($cpf);
            $phone->setType($_REQUEST['type']);
            $phone->setPhone($_REQUEST['phone']);
            $phone->post_phone_new();
        }
        CustomerController::edit($cpf);
    }

    public function delete( $array ){
        $phone = new Phone();
        if(sizeof($array) == 3){
            $cpf = $array[0];
            $type = $array[1];
            $number = $array[2];;
            $phone->setCPF($cpf);
            $phone->setType($type);
            $phone->setPhone($number);
            $phone->post_phone_delete();
        }
        CustomerController::edit($cpf);
    }

}
?>