<?php
include 'config.php';

// Fetch the data
$konu = $_POST['values'];

$query = "
     SELECT Inceleme_Konuler_id,BolgeAdi,ANALIZDE_TOPLAM_PUAN
    FROM Inceleme_Konuler where Inceleme_KonulerAadi ='".$konu."' ";
$sonuc2 = mysqli_query($link,$query);

// All good?
if ( !$sonuc2 ) {
    // Nope
    $message  = 'Invalid query: ' . mysqli_error($link) . "n";
    $message .= 'Whole query: ' . $query;
    die( $message );
}

// Print out rows
while ( $row = mysqli_fetch_array($sonuc2) ) {
    //echo $prefix ;
    
    // echo '  "category": "' . $row['Inceleme_KonulerAadi'] . '"' . "";
    // echo '  "category": "' . $row['ANALIZDE_TOPLAM_PUAN'] . '"' . "";
    // echo "";
    //$prefix = "/";
    $new_array[$row['Inceleme_Konuler_id']] = $row;
    //$new_array[$row['ANALIZDE_TOPLAM_PUAN']] = $row;
}
$json_array = json_encode($new_array,$new_array2);
// Close the connection
//print_r($json_array);
mysqli_close($link);
?>
<script type="text/javascript">
$(document).ready(function($){
	var arrayObjects = <?php echo $json_array; ?>;
	var salesdata = [{period:"2014-02-05",Modena:810, Bologna:0, Rimini:0},
      			     {period:"2014-02-09",Modena:0, Bologna: 396, Rimini:0},
      			     {period:"2014-02-10",Modena:0, Bologna:0, Rimini: 380},
       				 {period:"2014-02-11",Modena:0, Bologna: 736, Rimini:0},
        				 {period:"2014-02-13",Modena: 345, Bologna:54, Rimini:0}]; 
	 /*                 
                    	{"ecxwcw":{"0":"ecxwcw","Inceleme_KonulerAadi":"ecxwcw","1":"3","ANALIZDE_TOPLAM_PUAN":"3"},
                    	 "3":{"0":"ecwecw","Inceleme_KonulerAadi":"ecwecw","1":"3","ANALIZDE_TOPLAM_PUAN":"3"},
                    	 "cwcwe":{"0":"cwcwe","Inceleme_KonulerAadi":"cwcwe","1":"3","ANALIZDE_TOPLAM_PUAN":"3"},
                    	 "ecwecw":{"0":"ecwecw","Inceleme_KonulerAadi":"ecwecw","1":"3","ANALIZDE_TOPLAM_PUAN":"3"}};
                    	 
                    	 {"ecxwcw":{"0":"ecxwcw","Inceleme_KonulerAadi":"ecxwcw","1":"3","ANALIZDE_TOPLAM_PUAN":"3"},
                       "cwcwe":{"0":"cwcwe","Inceleme_KonulerAadi":"cwcwe","1":"3","ANALIZDE_TOPLAM_PUAN":"3"},
                       "ecwecw":{"0":"ecwecw","Inceleme_KonulerAadi":"ecwecw","1":"3","ANALIZDE_TOPLAM_PUAN":"3"}}
                    	[{"0":"feverteer","Inceleme_KonulerAadi":"feverteer","1":"6","ANALIZDE_TOPLAM_PUAN":"6"},
                      {"0":"ecxwcw","Inceleme_KonulerAadi":"ecxwcw","1":"5","ANALIZDE_TOPLAM_PUAN":"5"},
                      {"0":"efwcw","Inceleme_KonulerAadi":"efwcw","1":"6","ANALIZDE_TOPLAM_PUAN":"6"}]
*/
            Morris.Line({
                    element: 'morris-bar-chart',
                    padding: 10,
                    behaveLikeLine: true,
                    gridEnabled: false,
                    gridLineColor: '#dddddd',
                    axes: true,
                    fillOpacity:.7,
                    data: arrayObjects,
                    lineColors:['#ED5D5D','#D6D23A','#32D2C9'],
                    xkey: 'Inceleme_KonulerAadi',
                    ykeys: ['ANALIZDE_TOPLAM_PUAN'],
                    labels: ['Series A', 'Series B'],

                    xLabels: 'Inceleme_KonulerAadi',
                    pointSize: 0,
                    lineWidth: 0,
                    hideHover: 'auto',
                        smooth: true,
                        resize: true
                    });
            	            
});
</script>