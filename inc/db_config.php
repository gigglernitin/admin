<?php

$hname="localhost";
$uname="root";
$pass = "";
$db="gigglerweb";

$con=mysqli_connect($hname,$uname,$pass,$db);
if(!$con){
    die("cannot connect to database".mysqli_connect_error());
}

function filteration($data){  // this function of filter the data
    foreach($data as $key =>$value){
        $data[$key] = trim($value);
        $data[$key] = stripcslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

function select($sql,$value,$datatype){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
        mysqli_stmt_bind_param($stmt,$datatype,...$value); //splat operator ...
        if(mysqli_stmt_execute($stmt)){
            $res = mysqli_stmt_get_result($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - select");
        }
        
    }
    else{
        die("Query cannot be prepared - select");
    }
}
?>