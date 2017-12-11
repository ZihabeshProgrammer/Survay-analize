<?php
include 'config.php';

//print_r(get_loaded_extensions()); echo'<br>';
session_start();
if(isset($_REQUEST['submit2'])){
    $konu = $_POST['Baslik'];
    
    $sql2 = "INSERT INTO Baslik (Baslik_konu) values('$konu')";//your database query goes here
    $sonuc2 = mysqli_query($link,$sql2);
    $konuid = mysqli_insert_id($link);
    
    $_SESSION["NEWBaslik"]=$konu;
    echo  $_SESSION["NEWBaslik"];
 
    echo $_SESSION["variableName1"];
    $field_values_array = $_REQUEST['textbox1'];
    $field_values_array9 = $_REQUEST['point'];
    
    print_r($field_values_array9);
    $j = count($field_values_array);
    echo '<br>'.$j;
    for ($i=0;$i<count($field_values_array);$i++){
        $f1 = $field_values_array[$i];
        $f2 = $field_values_array9[$i];
        $mysql ="INSERT INTO Inceleme_Konuler(Inceleme_KonulerAadi,incelemePuan,KonulerBasligiId)
        values ('$f1','$f2','$konuid')";
        $sonuc = mysqli_query($link,$mysql);
        $incelemeid = mysqli_insert_id($link);
        
        
        
        
        
        for($k=0;$k<$field_values_array9[$i];$k++){
        $sql7 = "INSERT INTO Soruler(Konuler_incelemeId,KonulerBasligiId,Bolge,Sube,sorulerkonu,konupuan,KAYIT_ACIKLAMASI,ISLEM_ACIKLAMASI,UYGUNLUK_DURUMU,UYGUN_BULUNMAMA_SEBEPLERI,GEREKEN_ISLEMLER,ANALIZDE_PUAN)
                   values ($incelemeid,$konuid,'','','$field_values_array[$i]','$field_values_array9[$i]','','','','','','')";
        //FROM table1 p
        //INNER JOIN table2 c ON c.Id = p.Id
            $sonuc7 = mysqli_query($link,$sql7);
        }
    }
           
          if ($sonuc7){?>
                <script> //window.location.href = "AnalizeTamplet.php";
                alert ("thissuccessfull")</script>
            <?}
            else {?>
                 <script>alert ("thisunsuccessfull")</script>
          <?  }                        
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    .wrapper {
            text-align: center;
        }
        
        .button {
            position: absolute;
            top: 50%;
        }
        .selectclass {
          margin: 50px;
          border: 1px solid #111;
          background: transparent;
          width: 150px;
          padding: 5px 35px 5px 5px;
          font-size: 16px;
          border: 1px solid #ccc;
          height: 34px;
          -webkit-appearance: none;
          -moz-appearance: none;
          appearance: none;
        }
        
        /* CAUTION: IE hackery ahead */
        select::-ms-expand { 
            display: none; /* remove default arrow on ie10 and ie11 */
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  <title>Bootstrap Example</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- frerereterterrt >
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
 
    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#myForm').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
            }); 
        }); 
    </script--> 
 
</head>
<body>
<div id="wrapper">
	  <div class="jumbotron">
   <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="big_table.php"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                     <a href="blank.php">Information insertion Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                                <li>
                                    <a class="active" href="AnalizeTamplet.php">Analize Page</a>
                                </li>
                                 <li>
                                    <a href="Result.php">Result Page</a>
                                </li>
                                 <li>
                                    <a href="Bolge_analize.php">Bolge Result Page</a>
                                </li>
                                 <li>
                                    <a href="konu_analize.php">Konu Result Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
   <div id="page-wrapper">   
      <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div> 
         <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <?php
                        // $konu = $_POST['Baslik'];
                         
                         echo "Analize Konu :- ".$konu;
                           ?>
                        </div>             
      		<div class="panel-body">
      		<div class="table-responsive"> 
                    <h2>Table Test</h2>
                    	<div class="wrapper">
      		</div>
                  <form> 
                   <table  id= "dy_add" border="1" width="100%" class="table table-striped table-bordered  table-hover">
                   <input type='hidden' name='konuid'/>
        				
        				    	 <col>
                          <colgroup span="5"></colgroup>
                          <colgroup span="5"></colgroup>
                          <tr>
                           <td rowspan="1"></td>
                          
        					 
        					     <th scope="colgroup">
        			             Bolge:
                				  <?	 $sql = "SELECT BolgeAdi FROM Bolgeler";
            
                                        $res = mysqli_query($link,$sql);
                                        ?>
                                   <!--form action="main.php" method="post" onchange='this.form.submit()'-->
                                 
                                        <?
                                        echo "<select class='selectclass' name='Bolgeler' id='Bolgeler'>";?>
                                        <option value="">-bolge-</option><?
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "<option value='" . $row['BolgeAdi'] ."'>" . $row['BolgeAdi'] ."</option>";
                                        }
                                        echo "</select>";
                                   
                					   ?>
                					 		
                					   <!--/form-->
                				</th>
                				<th scope="colgroup" >
                						   
                				Sube:
                				       <select class="selectclass" name='Sube' id='Sube'>
                				       <optgroup label="">-sube-</optgroup>
                                   </select>
                          
                		          </th>
                		          
                		          <th scope="colgroup">
                		          
                		           <select class="selectclass" name="category_id" id="category_id">
                                   <option value="">-konu-</option>  
                            		     
                <?
                         foreach((array_combine($field_values_array,$field_values_array9))as $value1 => $value4) 
                                        {
                                            //$value4 = htmlspecialchars($value1);
                                            
                                            echo '<option value="'. $value4 .'">'. $value1 .'</option>';
                                        }
                            		  
                                    ?>
                                    </select>
								</th>
								
                            		     <?// print_r($rearrayy1);?>
                		         <input type="hidden" name="txt_holder" id="txt_holder">
                		          
                		           <td rowspan="1" ></td>
                		           <td rowspan="1"></td>
        					
        				</tr> 
                          <tbody name="thisbody" id="thisbody"> 
                          <tr>
                    				<th scope="col">KAYIT AÇIKLAMASI</th>
                    				<th scope="col"> İŞLEM AÇIKLAMASI</th>
                    				<th scope="col">UYGUNLUK DURUMU<br>(UYGUN/KISMEN UYGUN/UYGUN DEĞİL)</th>
                    				<th scope="col"> UYGUN BULUNMAMA SEBEPLERİ</th>
                    				<th scope="col">GEREKEN İŞLEMLER</th>
                    				<th scope="col">ANALİZDE ESAS ALINACAK PUAN</th>
                    		</tr>
                          </tbody> 
                          
                        
                     </table>
                     <div class="wrapper">
                  	   <input type="hidden" id="hiddenVal" value="0"/>
                  	   <input type='button' value='Satir ekle' name="addCF" id='addCF' class="btn btn-default"/>
                		   <input type="submit" name="submit" id="submit" value="SUBMIT" class="btn btn-default"/>
                		   <!--button type="button" class="btn btn-default"  name="getthis" id="getthis">liste gor.</button-->
                   	</div>
                   	</form>
                 </div>
                 <div class="table-responsive" id = 'result_table'>
                  </div>	
    			</div>
    			
    		</div>
    	</div>
    </div>
</div>
</div>
</div>
 <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    

 <script type="text/javascript">
 $(function () {
	 var selectedValue;
	 var selectedtext;
	$("#category_id").on('focus', function () {
	        // Store the current value on focus and on change
	        selectedValue = this.value; 
	      }
	  );
	  
	    $("#category_id").on('change', function()  {
	    	selectedtext = $(this).find("option:selected").text();   
	    document.getElementById("txt_holder").value = selectedtext;
	   // text_holder
	    	 // alert(selectedValue)	
	    	  alert(selectedtext);	    
	    	 $("#thisbody").find("tr:gt(0)").remove();

	    		$.ajax({
	      			url: "newblank.php",
	      			method:"POST",
	      		 	data: $('form').serialize(),
	      			success: function(resp){
	      	  			
	      					$("#thisbody").append(resp);
	      					//alert("succ");
	      				} // End of success function of ajax form
	      				,error: function(xhr, status, error) {
	      					 console.log(arguments);
	      					//console.warn(xhr.responseText)
	      			        alert(" Can't do because: " + error);
	      				}
	      	
	     	 });  
	    /*	
         selectedValue = this.value; 

         for(var x=0; x<selectedValue; x++) {
             var newRow = document.getElementById('thisbody').insertRow();

             var newCell = newRow.insertCell();
             newCell.innerHTML="<td><input type='text' name='input_box_1[]' /></td>";
                 
            	 newCell = newRow.insertCell();
            	 newCell.innerHTML="<td><input type='text' name='input_box_2[]' /></td>";

             newCell = newRow.insertCell();
             newCell.innerHTML="<td><select id='Durum' name ='Durum[]'><option value=''>-Durum-</option><option value='UYGUN'>UYGUN</option><option value='KISMEN UYGUN'>KISMEN UYGUN</option><option value='UYGUN DEGIL'>UYGUN DEGIL</option></select></td>";

             newCell = newRow.insertCell();       
             newCell.innerHTML="<td><input type='text' name='input_box_4[]' /></td>";

            	newCell = newRow.insertCell();    
             newCell.innerHTML="<td><input type='text' name='input_box_5[]' /></td>";

             newCell = newRow.insertCell();         
             newCell.innerHTML="<tr><td><input type='number' min='-1'  max='2' name='input_box_6[]' /> <button type='button' id='remCF' class='btn btn-warning btn-circle'><i class='fa fa-times'></i></button></td></tr>";

         }
        */
           
      //  selectedValue = this.value;
        $('#category_id').blur();  
  });
 });

    </script>
	
 <script>
      $(function () {
        $('#submit').on('click', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: 'form_submit.php',
            data:$('form').serialize(),
            success: function (data) {
                console.log(data);
              alert('form was submitted');
            }
          });
        });

      });
    </script>
    
    <script type="text/javascript">
    $(document).ready(function(){
    $("#addCF").click(function(){

        	 var counter = 'input_box_New';
        	 	 $.ajax({
        	            url: "another.php",
        	            method: "POST",
        	            data: {counter:counter},
        	            success: function(data){
        	                $("#thisbody").append(data);
        	               alert(counter);
        	            }
        	        })
          /*
             var newRow = document.getElementById('thisbody').insertRow();
             
             var newCell = newRow.insertCell();
             newCell.innerHTML="<tr><td><input type='hidden' name='"+ counter +"[]' value='"+ counter +"'/>"
            					 +"<input type='text' name='"+ counter+"_1[]'/></td>";
                 
            	 newCell = newRow.insertCell();
            	 newCell.innerHTML="<td><input type='text' name='"+ counter +"_2[]'  /></td>";
    
             newCell = newRow.insertCell();
             newCell.innerHTML="<td><select id='Durum' name ='"+ counter +"_3[]'><option value=''>-Durum-</option><option value='UYGUN'>UYGUN</option><option value='KISMEN UYGUN'>KISMEN UYGUN</option><option value='UYGUN DEGIL'>UYGUN DEGIL</option></select></td>";
    
             newCell = newRow.insertCell();       
             newCell.innerHTML="<td><input type='text' name='"+ counter +"_4[]' /></td>";
    
            	newCell = newRow.insertCell();    
             newCell.innerHTML="<td><input type='text' name='"+ counter +"_5[]' /></td>";
    
             newCell = newRow.insertCell();         
             newCell.innerHTML="<td><input type='number' min='-1'  max='2' name='"+ counter +"_6[]'/> <button type='button' id='remCF' class='btn btn-warning btn-circle'><i class='fa fa-times'></i></button></td></tr>";
          */
    });
    /*
    $("#dy_add").on('click','#remCF',function(){
        $(this).parent().parent().remove();
    });
    
    */
});
</script>

<script  type="text/javascript">
function callDelete(soruid){
	var row = document.getElementById(soruid);
    alert('id' + soruid);
    $.ajax({
        url: "sorudelete.php",
        method: "POST",
        data: {soruid:soruid},
        success: function(data){
           alert('row sil');
           row.parentNode.removeChild(row);
           
        }
    });
}
</script>
<script type="text/javascript">
$(document).ready(function($){
    $("#Bolgeler").on('change' ,function() {
        var selected_id = $(this).val();
        //var dataString = "Bolgeler="+search_id;
        $.ajax({
            url: "main.php",
            method: "POST",
            data: {selected_id:selected_id},
            success: function(data){
                $("#Sube").html(data);
               //alert(selected_id);
            }
        })
    });

});
</script>
</body>
</html>