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

    public function cadastrar() {
        $cliente = new Cliente();
        if($_REQUEST['cpf'] != 0) {
            $cpf = $_REQUEST['cpf'];
            $cpf = preg_replace("/[^0-9]/", "", $cpf);
            $cliente->post_cliente_new($_REQUEST['nome'], $_REQUEST['email'], $cpf, $_REQUEST['data_de_nascimento'], $_REQUEST['sexo'], $_REQUEST['estado_civil']);
            $this->editar($_REQUEST['cpf']);
        } else {
            $this->visualizar();
        }
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