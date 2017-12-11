<?php
//echo 'test';die;
ini_set('max_execution_time', 60);
include 'config.php';


$values = $_POST['values'];
$values1 = $_POST['values1'];
$values2 = $_POST['values2'];
$values3 = $_POST['values3'];

echo '<table id= "dy_add" border="1" width="100%" class="table table-striped table-bordered  table-hover">';
echo '<tr>';
echo '<th scope="col">SIRA</th>';
echo '<th scope="col">INCELME KONUSU</th>';
echo '<th scope="col">KAYIT AÇIKLAMASI</th>';
echo '<th scope="col"> İŞLEM AÇIKLAMASI</th>';
echo '<th scope="col">UYGUNLUK DURUMU<br>(UYGUN/KISMEN UYGUN/UYGUN DEĞİL)</th>';
echo '<th scope="col"> UYGUN BULUNMAMA SEBEPLERİ</th>';
echo '<th scope="col">GEREKEN İŞLEMLER</th>';
echo '<th scope="col">ANALİZDE ESAS ALINACAK PUAN</th>';
echo ' </tr>';

$sql = "SELECT SorulerID,sorulerkonu,KAYIT_ACIKLAMASI,ISLEM_ACIKLAMASI,UYGUNLUK_DURUMU,UYGUN_BULUNMAMA_SEBEPLERI,GEREKEN_ISLEMLER,ANALIZDE_PUAN FROM Soruler
        WHERE KonulerBasligiId = '".$values1."' AND Bolge = '".$values2."' AND Sube = '".$values3."' AND sorulerkonu = '".$values."'  ORDER BY sorulerkonu ASC";
$rs_result = mysqli_query($link,$sql);

    
    while ($row = mysqli_fetch_array($rs_result)){
            echo "<tr>";
                          echo "<td>" .$row["SorulerID"]."</td>";
                          echo  "<td>" .$row["sorulerkonu"]."</td>";
                          echo  "<td>" .$row["KAYIT_ACIKLAMASI"]."</td>";
                          echo  "<td>" .$row["ISLEM_ACIKLAMASI"]."</td>";
                          echo  "<td>" .$row["UYGUNLUK_DURUMU"]. "</td>";
                          echo  "<td>" .$row["UYGUN_BULUNMAMA_SEBEPLERI"]."</td>";
                          echo  "<td>" .$row["GEREKEN_ISLEMLER"]."</td>";
                          echo  "<td>" .$row["ANALIZDE_PUAN"]."</td>";
             echo "</tr>";
          
             
    } 
            $sql = "SELECT Inceleme_Konuler_id,Inceleme_KonulerAadi,ANALIZDE_TOPLAM_PUAN FROM Inceleme_Konuler
                WHERE KonulerBasligiId = '".$values1."' AND BolgeAdi = '".$values2."' AND subeAdi = '".$values3."' AND Inceleme_KonulerAadi = '".$values."' AND ANALIZDE_TOPLAM_PUAN != '".NULL."'";
            $rs_result = mysqli_query($link,$sql);
            
            while ($row = mysqli_fetch_array($rs_result)) {
                $qty = $row["ANALIZDE_TOPLAM_PUAN"];
            }
                echo "<tr>";
                echo "<th colspan='2' rowspan='2'> ANALIZE_TOPLAM </th>";
                echo  "<th colspan='3' style='text-align:center;'> KONU </th>";
                echo  "<th colspan='3' style='text-align:center;'> Aldgi puan</th>";
                echo "</tr>";
                echo "<tr>";
                echo  "<td colspan='3' style='text-align:center;'>'".$values."'</td>";
                echo  "<td colspan='3' style='text-align:center;'> '" .$qty."' </td>";
                echo "</tr>";
            
    mysqli_close($link);
echo '</table>';
// This echo for jquery
//echo json_encode($output_string);
?>