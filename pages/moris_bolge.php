<?php
include 'config.php';

// Fetch the data
$bolge = $_POST['values'];

$query = "
     SELECT Inceleme_Konuler_id,Inceleme_KonulerAadi,ANALIZDE_TOPLAM_PUAN
    FROM Inceleme_Konuler where BolgeAdi='".$bolge."' ";
    $sonuc2 = mysqli_query($link,$query);

$rows = '';

if($sonuc2)
{
    $rows = mysqli_fetch_all($sonuc2, MYSQLI_ASSOC);
}

echo   '<div id = "morris-line-chart" style="width: 500px; height: 300px;">';
echo    '</div>';

// Print out rows
//while ( $row = mysqli_fetch_array($sonuc2) ) {
    //echo $prefix ;
    
    //echo '  "category": "' . $row['Inceleme_KonulerAadi'] . '"' . "";
    //echo '  "category": "' . $row['ANALIZDE_TOPLAM_PUAN'] . '"' . "";
    //echo "";
    //$prefix = "/";
   // $new_array[$row['Inceleme_Konuler_id']] = $row;
    
   // $chart_data .= "{ Konu:'".$row["Inceleme_KonulerAadi"]."', Toplam:".$row["ANALIZDE_TOPLAM_PUAN"].", ";
    //$new_array[$row['ANALIZDE_TOPLAM_PUAN']] = $row;
//}
$json_array = json_encode($rows);
// Close the connection
print_r($json_array);
//$chart_data = substr($chart_data, 0, -2);
//mysqli_close($link);
?>
<script type="text/javascript">
	 /*   var arrayObjects = < ?php echo $chart_data; ?>;
	var salesdata = [{period:"2014-02-05",Modena:810, Bologna:0, Rimini:0},
      			     {period:"2014-02-09",Modena:0, Bologna: 396, Rimini:0},
      			     {period:"2014-02-10",Modena:0, Bologna:0, Rimini: 380},
       				 {period:"2014-02-11",Modena:0, Bologna: 736, Rimini:0},
        				 {period:"2014-02-13",Modena: 345, Bologna:54, Rimini:0}]; 
*/
				Morris.Line({
                    element: 'morris-line-chart',
                    data:  <?php echo json_encode($rows);?>,
                    lineColors:['##0000FF'],
                    xkey: 'Inceleme_KonulerAadi',
                    ykeys: ['ANALIZDE_TOPLAM_PUAN'],
                    labels: ['ANALIZDE_TOPLAM_PUAN'],

                    xLabels: 'Inceleme_Konuler_id',
                    smooth: true,
                    resize: true
                    });
</script>