<?php

require_once 'model/cepModel.php';

class CepController {

    public function query( $cep_v ){
        $cep = new CEP();
        $cep->setCep_v($cep_v);
        $cep = $cep->cep_query();
        // Saída JSON
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($cep);
    }

}
?>