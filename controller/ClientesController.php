<?php

require_once 'model/clienteModel.php';
require_once 'model/telefoneModel.php';
require_once 'model/addressModel.php';

class ClientesController {

    public function visualizar() {
        $cliente = new Cliente();
        require_once 'view/clientes_view.php';
    }

    public static function editar( $cpf ) {
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cliente = new Cliente();
        $telefone = new Telefone();
        $telefone->setCPF($cpf);
        $telefone = $telefone->telefone_list();
        $address = new Address();
        $address->setCPF($cpf);
        $address = $address->post_address_list();
        require_once 'view/clientes_editar.php';
    }

    public function novo() {
        require_once 'view/clientes_novo.php';
    }

    /*
    public function cadastrar() {
        $cliente = new Cliente();
        if($_REQUEST['cpf'] != 0) {
            $cpf = $_REQUEST['cpf'];
            $cpf = preg_replace("/[^0-9]/", "", $cpf);
            
            try {
                $cliente->post_cliente_new($_REQUEST['nome'], $_REQUEST['email'], $cpf, $_REQUEST['data_de_nascimento'], $_REQUEST['sexo'], $_REQUEST['estado_civil']);
                $this->editar($_REQUEST['cpf']);
            } catch (Exception $e) {
                //echo 'Exceção capturada: ',  $e->getMessage(), "\n";
                $this->visualizar();
            }

        } else {
            $this->visualizar();
        }
    }
    */

    public function save() {
        $clientes = new Cliente();
        $clientes->setCPF($_REQUEST['cpf']);
        $clientes->setName($_REQUEST['nome']);
        $clientes->setEmail($_REQUEST['email']);
        $clientes->setBirthDate($_REQUEST['data_de_nascimento']);
        $clientes->setSex($_REQUEST['sexo']);
        $clientes->setMaritalStatus($_REQUEST['estado_civil']);

        $clientes->post_customer_new();
        ClientesController::editar($cpf);
    }

    public function deletar( $cpf ){
        $cliente = new Cliente();
        $cliente->deletar_cliente($cpf);
        $this->visualizar();
    }

    public function atualizar( $cpf ){
        $cliente = new Cliente();
        $cliente->atualizar_cliente($_REQUEST['nome'], $_REQUEST['email'], $_REQUEST['data_de_nascimento'], $_REQUEST['sexo'], $_REQUEST['estado_civil'], $cpf);
        $this->editar($cpf);
    }
   
}
?>