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
            $telefone->setCPF($cpf);
            $telefone->setTipo($_REQUEST['tipo']);
            $telefone->setTelefone($_REQUEST['telefone']);
            $telefone->telefone_insert();
        }
        ClientesController::editar($cpf);
    }

    public function apagar( $array ){
        $telefone = new Telefone();
        if(sizeof($array) == 3){
            $cpf = $array[0];
            $tipo = $array[1];
            $numero = $array[2];;
            $telefone->setCPF($cpf);
            $telefone->setTipo($tipo);
            $telefone->setTelefone($numero);
            $telefone->telefone_delete();
        }
        ClientesController::editar($cpf);
    }

}
?>