<?php

require_once 'model/clienteModel.php';

class ClientesController{

    public function visualizar() {
        $cliente = new Cliente();
        //$cliente2 = new Cliente();
        //$clientes = $cliente->viewAll();
        //$clientes2 = $cliente2->todas_as_cores();
        //$_REQUEST['clientes'] = $clientes;
        require_once 'view/clientes_view.php';
    }

    public static function editar( $cpf ) {
    //public static function editar( $array ) {
        //$cpf = $array[0];
    //public function editar( $cpf ) {
        $cliente = new Cliente();
        require_once 'view/clientes_editar.php';
    }

    public function novo() {
        require_once 'view/clientes_novo.php';
    }

    public function cadastrar() {
        $cliente = new Cliente();
        $cliente->post_cliente_new($_REQUEST['nome'], $_REQUEST['email'], $_REQUEST['cpf'], $_REQUEST['data_de_nascimento'], $_REQUEST['sexo'], $_REQUEST['estado_civil']);
        $this->editar($_REQUEST['cpf']);
    }

    public function deletar( $cpf ){
        $cliente = new Cliente();
        $cliente->deletar_cliente($cpf);
        $this->visualizar();
    }

    public function atualizar( $cpf ){
        $cliente = new Cliente();
        $cliente->atualizar_cliente($_REQUEST['nome'], $cpf);
        $this->editar($cpf);
    }
   
}
?>