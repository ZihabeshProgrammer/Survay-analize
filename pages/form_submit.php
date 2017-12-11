<?php
print_r($_POST);
include 'config.php';


session_start();
    
    
    $Konu1 = $_POST['Bolgeler'];
    $Konu2 = $_POST['Sube'];
    $variableName=$_POST['txt_holder'];
    
    $_SESSION["thisthing"]=$variableName;
    
    $Konu3 = $_POST['counter'];
    $Konu4 = $_POST['category_id'];

foreach ($_POST as $key => $value) {
    $i=0;
    $k += $value[6];
    if (0 === strpos($key, 'input_box_New')) {
        
            $mysql ="INSERT INTO Soruler(Bolge,sorulerkonu,konupuan,Sube,KAYIT_ACIKLAMASI,ISLEM_ACIKLAMASI,UYGUNLUK_DURUMU,UYGUN_BULUNMAMA_SEBEPLERI,GEREKEN_ISLEMLER,ANALIZDE_PUAN)
                      VALUES('$Konu1','$variableName',$Konu4,'$Konu2','".$value[++$i]."','".$value[++$i]."','".$value[++$i]."','".$value[++$i]."','".$value[++$i]."','".$value[++$i]."')";
            
            
            $sonuc7 = mysqli_query($link,$mysql);
    
    }
    
    if (0 === strpos($key, 'input_box_')) {
           
          
        $sql = "UPDATE Soruler SET Bolge = '" . $Konu1. "' , Sube = '" . $Konu2 . "' , KAYIT_ACIKLAMASI = '" . $value[++$i] . "' , ISLEM_ACIKLAMASI = '" . $value[++$i] . "',UYGUNLUK_DURUMU  = '" .$value[++$i] . "'
                   ,UYGUN_BULUNMAMA_SEBEPLERI  = '" . $value[++$i] . "',GEREKEN_ISLEMLER  = '" . $value[++$i] . "', ANALIZDE_PUAN  = '" . $value[++$i] . "'
                    where SorulerID = '".$value[0]."'";
   
         $sonuc = mysqli_query($link,$sql);          
     }
     $z = $k-1;
     $sql6 = "UPDATE Inceleme_Konuler SET BolgeAdi = '" . $Konu1. "' , subeAdi = '" . $Konu2 . "' , ANALIZDE_TOPLAM_PUAN = '" . $z. "'
                    where Inceleme_KonulerAadi = '".$variableName."' AND incelemePuan = '".$Konu4."'";
     $sonuc = mysqli_query($link,$sql6);
      //if(0 === strpos($key, 'Durum_')){
       // $mysql = "UPDATE Soruler SET UYGUNLUK_DURUMU  = '" . $value[0] . "' where sorulerkonu = '".$variableName."'";
       // $sonuc = mysqli_query($link,$mysql);
      // }
   }
     $asql= "SELECT SUM(ANALIZDE_PUAN) AS total_puan FROM Soruler WHERE Bolge = '" . $Konu1. "' AND sorulerkonu = '".$variableName."'";
     $sonucq = mysqli_query($link,$asql);
     $row = mysqli_fetch_array($sonucq);
     $total_drops = $row['total_puan'];
     
     $asql2 = "UPDATE Bolgeler SET Bolge_puan = '" . $total_drops. "' 
                    where BolgeAdi = '".$Konu1."'";
     $sonuc = mysqli_query($link,$asql2);
     
     echo ''.$total_drops;
return ;

session_start();

$konu = $_SESSION['NEWBaslik'];

$variableName=$_POST['txt_holder'];
echo $variableName;


   // $Konu3 = $_POST['category_id'];
    $field_values_array1 = $_POST['input_box_1'];
    $field_values_array2 = $_POST['input_box_2'];
    $field_values_array3 = $_POST['Durum'];
    $field_values_array4 = $_POST['input_box_4'];
    $field_values_array5 = $_POST['input_box_5'];
    $field_values_array6 = $_POST['input_box_6'];
    
    
    for ($i = 0; $i < count($field_values_array1); $i++) {
        $f1=$field_values_array1[$i];
        $f2=$field_values_array2[$i];
        $f3=$field_values_array3[$i];
        $f4=$field_values_array4[$i];
        $f5=$field_values_array5[$i];
        $f6=$field_values_array6[$i];
        $f7 += $field_values_array6[$i];
        
        
        $mysql ="UPDATE Soruler
           SET Bolge='$Konu1',Sube='$Konu2',KAYIT_ACIKLAMASI = '$f1' , ISLEM_ACIKLAMASI = '$f2',UYGUNLUK_DURUMU  = '$f3'
                ,UYGUN_BULUNMAMA_SEBEPLERI  = '$f4',GEREKEN_ISLEMLER  = '$f5', ANALIZDE_PUAN  = '$f6'
                WHERE  sorulerkonu = '".$variableName."'";  
        
  
        $sonuc7 = mysqli_query($link,$mysql);
    }
    $sql8 = "UPDATE Inceleme_Konuler  SET  Inceleme_Konuler_ToplamPuan = '$f7',Bolge='$Konu1',Sube='$Konu2'   WHERE  Inceleme_KonulerAadi = '".$variableName."' ";
    $sonuc8 = mysqli_query($link,$sql8);
    
    if($sonuc8){?>
    
        <script type="text/javascript">
alert('thisoky');
</script>
    <?}
    else {?>
     <script type="text/javascript">
        alert('thisnotOkay');
        </script>
    <?}
  

?>