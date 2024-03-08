<!-- templates/baseLayout.php -->
<!DOCTYPE html>
<html>
<head>
    <?php
    require_once 'utility.php';
?>

     <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.0.29, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/medd-126x120.png" type="image/x-icon">
  <meta name="description" content=""> 



<script src="<?php echo home_base_url();?>plugins/jquery/jquery.min.js"></script>


<!-- Bootstrap 4 -->
<script src="<?php echo home_base_url();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo home_base_url();?>dist/js/adminlte.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo home_base_url();?>plugins/jquery-ui/jquery-ui.min.js"></script>

<script href="<?php echo home_base_url();?>css/bootstrap-multiselect.css" type="text/css"></script>
<script src="<?php echo home_base_url();?>js/bootstrap-multiselect.js"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<link rel="stylesheet" href="<?php echo home_base_url();?>images/node_modules/bootstrap-icons/font/bootstrap-icons.css">

<script src="<?php echo home_base_url();?>plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/uplot/uPlot.iife.min.js"></script>


 <link rel="stylesheet" href="<?php echo home_base_url();?>dist/css/adminlte.min.css">

 <style type="text/css">
   .navbar-light .navbar-nav .nav-link {
    color: green;
}
 </style>

 <style type="text/css">
   .ui-widget-overlay
{
  opacity: .50 !important; /* Make sure to change both of these, as IE only sees the second one */
  filter: Alpha(Opacity=50) !important;

  background: rgb(50, 50, 50) !important; /* This will make it darker */
}
 </style>
</head>
<body>
 <div class="container" style="margin: auto;width: 750px" >
    <img  src= "<?php echo home_base_url();?>images/entete" style="width:80%;margin-left: 10px"></img>
  </div>  

 </div> 
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-auto bg-light sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                    <i class="bi-bootstrap fs-1"></i>
                </a>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">
                    <li class="nav-item">
                        <a href="<?php echo base_url();?>index.php/activite.php/accueil" class="nav-link py-3 px-2"  title="Accueil" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Home">
                            <i class="bi-house fs-1"></i>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url();?>index.php/activite.php/projet" class="nav-link py-3 px-2" title="Données" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Orders">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link py-3 px-2" title="Référentiel" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Customers">
                            <i class="fa fa-database"></i>
                        </a>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="true">
                        <i class="bi-person-circle h2"></i>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                        <li><a class="dropdown-item" href="#">New project</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm p-3 min-vh-100">
            <!-- content -->
            
            <h3>More content...</h3>
            <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut semiotics, raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation. Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p>
            <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>
            <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut semiotics, raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation. Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p>
        </div>
    </div>
</div>
</body>


<script>
$(document).ready(function(){
   $('[data-toggle="tooltip"]').tooltip({
   container: 'body'
});
});
</script>
</html>