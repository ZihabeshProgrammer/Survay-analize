<?php
include 'config.php';

      
       $variableName=$_POST['txt_holder'];
        
        
      if($_POST) {
            
            $Konu1 = $_POST['Bolgeler'];
           
            $Konu2 = $_POST['Sube'];
            
            $Konu3 = $_POST['category_id'];
            
        $sql = "SELECT SorulerID,KAYIT_ACIKLAMASI,ISLEM_ACIKLAMASI,UYGUNLUK_DURUMU,UYGUN_BULUNMAMA_SEBEPLERI,GEREKEN_ISLEMLER,ANALIZDE_PUAN FROM Soruler
        WHERE sorulerkonu ='".$variableName."' AND konupuan = '".$Konu3."' AND KAYIT_ACIKLAMASI  IS NOT NULL 
        AND ISLEM_ACIKLAMASI IS NOT NULL AND UYGUNLUK_DURUMU IS NOT NULL AND UYGUN_BULUNMAMA_SEBEPLERI IS NOT NULL
		AND GEREKEN_ISLEMLER IS NOT NULL AND ANALIZDE_PUAN IS NOT NULL ORDER BY SorulerID ASC";
        
          $rs_result = mysqli_query($link,$sql);
          if (!$rs_result) {
              printf("Error: %s\n", mysqli_error($link));
              exit();
          }
         //$ROWNUM   =  $rs_result->num_rows;
         // echo "<br>"."number of rows:".$ROWNUM ;
          while ($row = mysqli_fetch_array($rs_result)){
                  echo "<tr id='" . $row['SorulerID'] . "'>";
                  echo  "<td>";
                  echo "<input type='hidden' name='input_box_" . $row['SorulerID'] . "[]' value='".$row['SorulerID']."'/>";
                  echo "<input type='text' name='input_box_" . $row['SorulerID'] . "[]' value='".$row['KAYIT_ACIKLAMASI']."'/></td>";
                  echo  "<td><input type='text' name='input_box_" . $row['SorulerID'] . "[]' value='".$row['ISLEM_ACIKLAMASI']."'/></td>";
                  echo  "<td><select  name ='input_box_" . $row['SorulerID'] ."[]'><option value='".$row['UYGUNLUK_DURUMU']."' >-'".$row['UYGUNLUK_DURUMU']."'-</option><option value='UYGUN'>UYGUN</option><option value='KISMEN UYGUN'>KISMEN UYGUN</option><option value='UYGUN DEGIL'>UYGUN DEGIL</option></select></td>";
                  echo  "<td><input type='text' name='input_box_" . $row['SorulerID'] . "[]' value='".$row['UYGUN_BULUNMAMA_SEBEPLERI']."'/></td>";
                  echo  "<td><input type='text' name='input_box_" . $row['SorulerID'] . "[]' value='".$row['GEREKEN_ISLEMLER']."'/></td>";
                  echo  "<td><input type='number' min='-1'  max='2' name='input_box_" . $row['SorulerID'] . "[]' value='".$row['ANALIZDE_PUAN']."'/><button type='button' id='remCF' onclick='callDelete(" . $row['SorulerID'] . ")' class='btn btn-warning btn-circle'><i class='fa fa-times'></i></button></td>";
                  echo "</tr>";  
          }
      } 

echo '</table>';
?>