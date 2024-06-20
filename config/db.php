<?php 
    $connect=mysqli_connect('localhost','root','','quan_li_san_pham');
    if($connect){
        mysqli_query($connect,"SET NAMES 'UTF8'");
        echo "ket noi thanh cong";
    }else{
        echo "ket noi that bai ";
    }
?>    