<?php
include 'config.php';

if($_POST){
    //  echo 'testerre';
    // echo $_POST['selected_id'];
    //echo $_POST['Sube'];
    
    $konu_id= $_POST['konu_id'];
    // $values1 = $_POST['values1'];
    //$values2 = $_POST['values2'];
    // $values3= $_POST['values3'];
    // echo ''.$values3;die;
    
    if(!empty($konu_id)){
        // $output = array();
        $sql = "SELECT Inceleme_KonulerAadi FROM Inceleme_Konuler WHERE BolgeAdi = '".$konu_id."'";
        
        $res1 = mysqli_query($link,$sql);
        
        //     echo "<select name='state'>";
        //   echo "<option value=''>Select</option>";
        // echo  "<option value=''>-sube-</option>";
        while ($row = mysqli_fetch_array($res1)){
            
            
            echo "<option value='" . $row['Inceleme_KonulerAadi'] ."'>" . $row['Inceleme_KonulerAadi'] ."</option>";
            
        }
        // echo "</select>";
    }
}
?>