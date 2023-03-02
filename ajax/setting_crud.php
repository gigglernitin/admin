<?php
require('../inc/db.config.php')
require('../inc/essential.php');
adminLogin();

if(isset($_POST['get_general'])){
    $q="SELECT * FROM  `setting` WHERE `sr_no`=?";
    $value=[1];
    $res = select($q,$value,"i");
    $data=mysqli_fetch_assoc($res);

    $json_data = json_encode($data);

    echo $json_data;
}
?>