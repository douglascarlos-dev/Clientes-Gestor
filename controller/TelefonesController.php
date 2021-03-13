<?php

require_once 'model/telefoneModel.php';
require_once 'controller/ClientesController.php';

//class TelefonesController extends ClientesController {
class TelefonesController {

    public function novo( $cpf ){
        //$telefone = new Telefone();
        require_once 'view/telefones_novo.php';
    }

    public function cadastrar( $cpf ){
        $telefone = new Telefone();
        $telefone->post_telefone_new($cpf, $_REQUEST['telefone'], $_REQUEST['tipo']);
        //$this->editar($cpf);
        ClientesController::editar($cpf);
    }

    public function apagar( $array ){
        $telefone = new Telefone();
        $cpf = $array[0];
        $tipo = $array[1];
        $numero = $array[2];
        $telefone->deletar_cliente($cpf, $tipo, $numero);
        ClientesController::editar($cpf);
    }

}
?>