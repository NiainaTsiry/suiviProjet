
<!-- templates/baseLayout.php -->
<!DOCTYPE html>
<html>
<head>
    <?php
    require_once 'utility.php';
?>

     <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/medd-126x120.png" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/dataTables.checkboxes.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>plugins/jquery-ui/jquery-ui.css">
<link rel="stylesheet" href="<?php echo home_base_url();?>plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/reboisement.css">
 <link rel="stylesheet" href="<?php echo home_base_url();?>dist/css/adminlte.min.css">
 <link rel="stylesheet" href="<?php echo home_base_url();?>images/node_modules/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="<?php echo home_base_url();?>css/leaflet.css">
 <style type="text/css">
   .navbar-light .navbar-nav .nav-link {
    color: green;
  }

 .ui-widget-overlay
{
  opacity: .50 !important; /* Make sure to change both of these, as IE only sees the second one */
  filter: Alpha(Opacity=50) !important;

  background: rgb(50, 50, 50) !important; /* This will make it darker */
}
 </style>
</head>

<body>
    <section >
       
     <div class="container"  >
        <div class="main-header">
           <img  src= "http://localhost/suiviProjet/assets/images/entete.png" style="width:100%;height: 50%"></img>
        </div>
        <div class="container-fluid">
            <div class="row">
                  <div class="col-1 col-md-1 col-sm-1 bg-light sticky-top">
                     <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                        
                        <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">


                            <li class="nav-item">
                                <a href="<?php echo base_url();?>index.php/activite.php/accueil" class="nav-link py-3 px-2"  title="Accueil" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Home">
                                    <i class="bi-house fs-1"></i>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo base_url();?>index.php/activite.php/analyse" class="nav-link py-3 px-2" title="Tableau de bord" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Dashboard">
                                    <i class="bi-speedometer2 fs-1"></i>
                                </a>
                           </li>


                            <li>
                                <a href="<?php echo base_url();?>index.php/activite.php/projet" class="nav-link py-3 px-2" title="Fiche projet" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Dashboard">
                                    <i class="bi-card-checklist"></i>
                                </a>
                            </li>
                         
                           
                            <li>
                                <div class="dropdown">
                                    <a class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" title="Données" aria-expanded="false"><i class="bi bi-pencil-square"></i>
                                   </a>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo base_url();?>index.php/activite.php/referentiel?tableName=projet">Les projets</a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>index.php/activite.php/referentiel?tableName=activite">Les activités</a>
                                        <a class="dropdown-item" href="<?php echo base_url();?>index.php/activite.php/referentiel?tableName=suivi_activite">Suivis des activités</a>
                                  </div>  
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/activite.php/referentiel?tableName=tiers" class="nav-link py-3 px-2" title="Référentiel" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Customers">
                                    <i class="fa fa-database"></i>
                                </a>
                            </li>
                </ul>
                </div>
            </div>
                <div class="col-11 col-sm-11 col-md-11 " >
                     <?php echo $content ?>
                </div>
        
        </section>
      </div>
    </div>
     </div> 
<script src="<?php echo home_base_url();?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo home_base_url();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo home_base_url();?>dist/js/adminlte.min.js"></script>
<script href="<?php echo home_base_url();?>css/bootstrap-multiselect.css" type="text/css"></script>
<script src="<?php echo home_base_url();?>js/bootstrap-multiselect.js"></script>
<script src="<?php echo home_base_url();?>js/jquery.dataTables.min.js" type="text/javascript"></script> 
<script src="<?php echo home_base_url();?>js/dataTables.buttons.min.js"></script>

<script src="<?php echo home_base_url();?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo home_base_url();?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo home_base_url();?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo home_base_url();?>js/dataTables.select.min.js" type="text/javascript"></script>
<script src="<?php echo home_base_url();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo home_base_url();?>dist/js/adminlte.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="<?php echo home_base_url();?>plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/uplot/uPlot.iife.min.js"></script>
<script src="<?php echo home_base_url();?>js/leaflet.js"></script>



<script>
$(document).ready(function () {

$('[data-toggle="tooltip"]').tooltip({
   container: 'body'
});

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
</body>
</html>