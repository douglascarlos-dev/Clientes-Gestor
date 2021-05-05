<?php

require_once 'model/telefoneModel.php';
require_once 'controller/ClientesController.php';

class TelefonesController {

    public function novo( $cpf ){
        require_once 'view/telefones_novo.php';
    }

    public function cadastrar( $cpf ){
        $telefone = new Telefone();
        if($_REQUEST['telefone'] != 0) {
            $telefone->post_telefone_new($cpf, $_REQUEST['telefone'], $_REQUEST['tipo']);
        }
        ClientesController::editar($cpf);
    }

    public function apagar( $array ){
        $telefone = new Telefone();
        
        $cpf = $array[0];
        if(sizeof($array) == 3){
            $tipo = $array[1];
            $numero = $array[2];
            $telefone->deletar_cliente($cpf, $tipo, $numero);
        }
        
        ClientesController::editar($cpf);
    }

}
?>