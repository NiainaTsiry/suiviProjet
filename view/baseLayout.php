<!-- templates/baseLayout.php -->
<!DOCTYPE html>
<html>
<head>
	<?php
	require_once 'utility.php';
?>

     
 

   
   
    <div> <?php 	include 'header.php'; ?></div>
    <link rel="stylesheet" href="<?php echo home_base_url();?>css/leaflet.css">

<script src="<?php echo home_base_url();?>js/leaflet.js"></script>
    

</head>
<link rel="stylesheet" href="<?php echo home_base_url();?>plugins/fontawesome-free/css/all.min.css">
<body class="hold-transition sidebar-collapse layout-top-nav">
	<table style="width: 100%">
		<tr>
			<td width="15%"  valign="top">
				<nav class="nav flex-column">
					
					<?php
						foreach ($leftMenu as $value) {
							echo '<a class="nav-link active" style="color:green;" href="'.$value['lien'].'">'.$value['libelle'].'</a>';
						}?>
						 <div class="row text-center" style="width:150px;margin-top:150px;margin-left:10px;margin-bottom: 50px;">

              				<?php
		              				if (isset($_SESSION['isConnected'])){
					              			if ($_SESSION['isConnected']){
					              				echo '<a id="btnLogout" href="#" class="btn btn-sm btn-outline-warning btn-block "><i class="fas fa-user-lock"></i> Se deconneter</a>';
					              			 }else{
							              		echo '<a href="#"  id="btnShow" class="btn  btn-sm btn-outline-warning btn-block "><i class="fas fa-user-lock"></i> Se connecter</a>'
											;
							              	}
							         }else{     	
							          echo '<a href="#"  id="btnShow" class="btn  btn-sm btn-outline-warning btn-block"><i class="fas fa-user-lock"></i> Se connecter</a>'
											;
				              		}
		              		?> 
						</div>
              			 

				</nav>
			</td>

			<td width="85%"  valign="top"><?php echo $content ?></td>
			
		</tr>
	</table>	

	
    
</body>

<script>
$(document).ready(function () {

  $("#btnLogout").click(function(){
    url='<?php echo base_url();?>index.php/auth.php/logout';
        $.ajax({
                                              url: url,
                                              type:"POST",
                                              dataType: "html",
                                              success: function(response) {
                                                    location.reload();
                                                   
                                              }, 
                                              beforeSend: function() { 
                                            },
                                              error :  function(e){
                                                 console.log(e);
                                        }      
                                       });
    }); 
  
  

});
</script>

</html>