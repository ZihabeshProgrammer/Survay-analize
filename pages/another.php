<?php
include 'config.php';


if($_POST) {
    $Konu3 = $_POST['counter'];
    
        echo "<tr>";
        echo  "<td>";
        echo " <input type='hidden' name='". $Konu3 ."_[]' value='". $Konu3 ."'/>";
        echo  "<input type='text' name='". $Konu3 ."_[]'/></td>";
        echo  "<td><input type='text' name='". $Konu3 ."_[]'  /></td>";
        echo  "<td><select id='Durum' name ='". $Konu3 ."_[]'><option value=''>-Durum-</option><option value='UYGUN'>UYGUN</option><option value='KISMEN UYGUN'>KISMEN UYGUN</option><option value='UYGUN DEGIL'>UYGUN DEGIL</option></select></td>";
        echo  "<td><input type='text' name='". $Konu3 ."_[]' /></td>";
        echo  "<td><input type='text' name='". $Konu3 ."_[]' /></td>";
        echo  "<td><input type='number' min='-1'  max='2' name='". $Konu3 ."_[]'/> <button type='button' id='remCF' class='btn btn-warning btn-circle'><i class='fa fa-times'></i></button></td></tr>";
        echo "</tr>";
 }
?>