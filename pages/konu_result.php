<?php
ini_set('max_execution_time', 60);
include 'config.php';


$Bolge = $_POST['values'];
$konu = $_POST['values1'];
echo '<table id= "dy_add" border="1" width="100%" class="table table-striped table-bordered  table-hover">';


$sql = "SELECT  ANALIZDE_TOPLAM_PUAN FROM Inceleme_Konuler
                WHERE BolgeAdi = '".$konu."' AND Inceleme_KonulerAadi = '".$Bolge."'";
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
echo  "<td colspan='3' style='text-align:center;'>'".$konu."'</td>";
echo  "<td colspan='3' style='text-align:center;'> '" .$qty."' </td>";
echo "</tr>";

mysqli_close($link);
echo '</table>';
// This echo for jquery
//echo json_encode($output_string);
?>