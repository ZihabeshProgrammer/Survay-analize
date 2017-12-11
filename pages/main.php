<?php
include 'config.php';

if($_POST){
  //  echo 'testerre';
   // echo $_POST['selected_id'];
    //echo $_POST['Sube'];
    
    $search_id = $_POST['selected_id'];
   // $values1 = $_POST['values1'];
   //$values2 = $_POST['values2'];
   // $values3= $_POST['values3'];
   // echo ''.$values3;die;
    
    if(!empty($search_id)){
        // $output = array();
        $sql = "SELECT subeAdi FROM Sube WHERE BolgeAdi = '".$search_id."'";
        
        $res1 = mysqli_query($link,$sql);
        
   //     echo "<select name='state'>";
     //   echo "<option value=''>Select</option>"; 
       // echo  "<option value=''>-sube-</option>";
        while ($row = mysqli_fetch_array($res1)){
          
            
		    echo "<option value='" . $row['subeAdi'] ."'>" . $row['subeAdi'] ."</option>";
		  
        }
       // echo "</select>"; 
    }
}
	?>