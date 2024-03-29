<?php
include_once 'connection.php';

class Photo extends Connection{
    private $id;
    private $cpf;
    private $photo;

    public function setId($id){
        $this->id=$id;
        return $this;
    }

    public function setCPF($cpf){
        $this->cpf=$cpf;
        return $this;
    }

    public function setPhoto($photo){
        $this->photo=$photo;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function getCPF(){
        return $this->cpf;
    }

    public function getPhoto(){
        return $this->photo;
    }

    function photo_save(){
        $sql_query = "UPDATE public.clientes SET photo='" . $this->getPhoto() . "' WHERE cpf='" . $this->getCPF() . "'";
        $pdo = $this->o_db;
        $stmt = $pdo->prepare($sql_query);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }

    function post_photo_save(){
        $result = $this->photo_save();
        return $result;
    }

    function post_photo_delete(){
        $result = $this->photo_delete();
        return $result;
    }

    function photo_delete(){
        $row = $this->photo_save();
        @unlink("images/".md5($this->getCPF()).".jpg");
        return $row;
    }

    function photo_view(){
        $pdo = $this->o_db;
        $stmt = $pdo->prepare("SELECT * FROM clientes WHERE cpf = '" . $this->getCPF() . "' LIMIT 1"); 
        $stmt->execute(); 
        $row = $stmt->fetch();
        $photo = new Photo();
        $photo->setCPF($row[4]);
        $photo->setPhoto($row[10]);
        return $photo;
    }

}
?>