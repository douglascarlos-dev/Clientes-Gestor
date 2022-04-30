<?php

require_once 'model/clienteModel.php';
require_once 'model/phoneModel.php';
require_once 'model/addressModel.php';

class ClientesController {

    public function save() {
        $clientes = new Cliente();
        $clientes->setCPF(preg_replace("/[^0-9]/", "", $_REQUEST['cpf']));
        $clientes->setName($_REQUEST['nome']);
        $clientes->setEmail($_REQUEST['email']);
        $clientes->setBirthDate($_REQUEST['data_de_nascimento']);
        $clientes->setSex($_REQUEST['sexo']);
        $clientes->setMaritalStatus($_REQUEST['estado_civil']);
        $clientes->post_customer_new();
        ClientesController::edit($clientes->getCPF());
    }

    public function update( $cpf ) {
        $clientes = new Cliente();
        $clientes->setCPF($cpf);
        $clientes->setName($_REQUEST['nome']);
        $clientes->setEmail($_REQUEST['email']);
        $clientes->setBirthDate($_REQUEST['data_de_nascimento']);
        $clientes->setSex($_REQUEST['sexo']);
        $clientes->setMaritalStatus($_REQUEST['estado_civil']);
        $clientes->post_customer_update();
        ClientesController::edit($clientes->getCPF());
    }

    public function remove( $cpf ){
        $clientes = new Cliente();
        $clientes->setCPF($cpf);
        $clientes->post_customer_remove();
        ClientesController::visualizar();
    }

    public static function edit( $cpf ) {
        $clientes = new Cliente();
        $clientes->setCPF($cpf);
        $cliente = $clientes->customer_list();
        $phone = new Phone();
        $phone->setCPF($cpf);
        $phone = $phone->phone_list();
        $address = new Address();
        $address->setCPF($cpf);
        $address = $address->post_address_list();
        require_once 'view/clientes_editar.php';
    }

    public function new() {
        require_once 'view/clientes_novo.php';
    }

    public function visualizar() {
        $cliente = new Cliente();
        require_once 'view/clientes_view.php';
    }
   
}
?>