<?php

class CEP extends Connection{
    private $cep_v;
    private $bairro;
    private $cidade;
    private $uf;

    public function setCep_v($cep_v){
        $this->cep_v=$cep_v;
        return $this;
    }

    public function setBairro($bairro){
        $this->bairro=$bairro;
        return $this;
    }

    public function setCidade($cidade){
        $this->cidade=$cidade;
        return $this;
    }

    public function setUf($uf){
        $this->uf=$uf;
        return $this;
    }

    public function getCep_v(){
        return $this->cep_v;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function getUf(){
        return $this->uf;
    }

    function cep_query(){
        $params = require "database.php";
        $cep = $this->getCep_v();

        $url = "https://www.cepaberto.com/api/v3/cep?cep=" . $cep;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Authorization: Token token=" . $params['cepaberto'],
        );

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        $obj = json_decode($resp);

        return array('bairro'=>$obj->bairro, 'cidade'=>$obj->cidade->nome, 'estado'=>$obj->estado->sigla);
    }

}