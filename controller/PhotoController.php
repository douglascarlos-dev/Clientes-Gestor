<?php

require_once 'model/photoModel.php';
require_once 'controller/CustomerController.php';

class PhotoController {

    public function new( $cpf ){
        require_once 'view/photo_new.php';
    }

    public function delete( $cpf ){
        $photo = new Photo();
        $photo->setCPF($cpf);
        $photo->setPhoto("default.svg");
        $photo->post_photo_delete();
        CustomerController::edit($photo->getCPF());
    }

    public function save( $cpf ){
        $photo = new Photo();
        $photo->setCPF($cpf);

        if(isset($_FILES['photo'])){
            $errors= array();
            $file_name = $_FILES['photo']['name'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name_2 = md5($cpf).".".$file_ext;
            $file_size =$_FILES['photo']['size'];
            $file_tmp =$_FILES['photo']['tmp_name'];
            $file_type=$_FILES['photo']['type'];
            @$file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));
            
            $extensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$extensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($file_size > 2097152){
               $errors[]='File size must be excately 2 MB';
            }
            
            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"images/".$file_name_2);

                $file_name_3 = md5($cpf).".jpg";
                $image = new Imagick();
                $image->readImage("images/".$file_name_2);
                $image->setImageFormat('jpeg');
                $image->resizeImage(266,266,Imagick::FILTER_BOX,1);
                $image->setImageCompressionQuality(95);
                $image->stripImage();
                
                $image->writeImage("images/".$file_name_3);
                if($file_type != "image/jpeg"){
                    unlink("images/".$file_name_2);
                }
                
                $photo->setPhoto($file_name_3);
                $photo->post_photo_save();
                CustomerController::edit($photo->getCPF());

            }else{
                CustomerController::edit($cpf);
            }
         }
    }

}
?>