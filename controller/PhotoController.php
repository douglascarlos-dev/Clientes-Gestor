<?php

require_once 'model/photoModel.php';
require_once 'controller/CustomerController.php';

class PhotoController {

    public function new( $cpf ){
        $photo = new Photo();
        $photo->setCPF($cpf);
        $photo = $photo->photo_view();
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
                if($file_type == "image/png"){
                    // convert to jpg
                    $image = imagecreatefrompng("images/".$file_name_2);
                    $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
                    imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
                    imagealphablending($bg, TRUE);
                    imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
                    imagedestroy($image);
                    $quality = 100;
                    imagejpeg($bg, "images/".md5($cpf).".jpg", $quality);
                    imagedestroy($bg);
                    unlink("images/".$file_name_2);
                    $file_name_2 = md5($cpf).".jpg";
                }
                // resize jpg
                $filename = "images/".$file_name_2;
                $width = 266;
                $height = 266;
                list($width_orig, $height_orig) = getimagesize($filename);
                $ratio_orig = $width_orig/$height_orig;
                if ($width/$height > $ratio_orig) {
                    $width = $height*$ratio_orig;
                } else {
                    $height = $width/$ratio_orig;
                }
                $image_p = imagecreatetruecolor($width, $height);
                $image = imagecreatefromjpeg($filename);
                imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                imagejpeg($image_p, "images/".$file_name_2, 95);
                $photo->setPhoto($file_name_2);
                $photo->post_photo_save();
                CustomerController::edit($photo->getCPF());

            }else{
                CustomerController::edit($cpf);
            }
         }
    }

}
?>