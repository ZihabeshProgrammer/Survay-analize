<?php

print_r($_POST);
include 'config.php';

IF($_POST){
    
$Id = $_POST['soruid'];

$mysql ="DELETE FROM Soruler
        WHERE  SorulerID = '".$Id."'";  
$sonuc = mysqli_query($link,$mysql);

if ($sonuc){
    echo 'successfull';
}
else{
    echo 'unsuccessfull';
}
}