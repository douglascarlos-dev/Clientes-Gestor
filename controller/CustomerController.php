<?php

require_once 'model/customerModel.php';
require_once 'model/phoneModel.php';
require_once 'model/addressModel.php';

class CustomerController {

    public function save() {
        $customer = new Customer();
        $customer->setCPF(preg_replace("/[^0-9]/", "", $_REQUEST['cpf']));
        $customer->setName($_REQUEST['nome']);
        $customer->setEmail($_REQUEST['email']);
        $customer->setBirthDate($_REQUEST['data_de_nascimento']);
        $customer->setSex($_REQUEST['sexo']);
        $customer->setMaritalStatus($_REQUEST['estado_civil']);
        $customer->post_customer_new();
        CustomerController::edit($customer->getCPF());
    }

    public function update( $cpf ) {
        $customer = new Customer();
        $customer->setCPF($cpf);
        $customer->setName($_REQUEST['nome']);
        $customer->setEmail($_REQUEST['email']);
        $customer->setBirthDate($_REQUEST['data_de_nascimento']);
        $customer->setSex($_REQUEST['sexo']);
        $customer->setMaritalStatus($_REQUEST['estado_civil']);
        $customer->post_customer_update();
        CustomerController::edit($customer->getCPF());
    }

    public function delete( $cpf ){
        $customer = new Customer();
        $customer->setCPF($cpf);
        $customer->post_customer_delete();
        CustomerController::visualizar();
    }

    public static function edit( $cpf ) {
        $customer = new Customer();
        $customer->setCPF($cpf);
        $customer = $customer->customer_list();
        $phone = new Phone();
        $phone->setCPF($cpf);
        $phone = $phone->post_phone_list();
        $address = new Address();
        $address->setCPF($cpf);
        $address = $address->post_address_list();
        require_once 'view/customer_editar.php';
    }

    public static function pdf( $cpf ) {
        $customer = new Customer();
        $customer->setCPF($cpf);
        $customer = $customer->customer_list();
        $phone = new Phone();
        $phone->setCPF($cpf);
        $phone = $phone->post_phone_list();
        $address = new Address();
        $address->setCPF($cpf);
        $address = $address->post_address_list();
        require_once 'view/customer_pdf.php';
    }

    public function new() {
        require_once 'view/customer_new.php';
    }

    public function visualizar() {
        $customer = new Customer();
        require_once 'view/customer_view.php';
    }

    public function search() {
        $customer = new Customer();
        $customer->setName($_REQUEST['search']);
        require_once 'view/customer_search.php';
    }
   
}
?>