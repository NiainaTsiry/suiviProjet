<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <meta http-equiv="Content-Type" content="application/json; charset=utf-8">
   <!-- site metas -->
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- site icon -->
   <link rel="icon" href="<?php echo template_base_url() ?>images/fevicon.png" type="image/png" />
   <!-- bootstrap css -->
   <link rel="stylesheet" href="<?php echo template_base_url() ?>css/bootstrap.min.css" />
   <!-- site css -->
   <link rel="stylesheet" href="<?php echo template_base_url() ?>style.css" />
   <!-- responsive css -->
   <link rel="stylesheet" href="<?php echo template_base_url() ?>css/responsive.css" />
   <!-- color css -->
   <link rel="stylesheet" href="<?php echo template_base_url() ?>css/colors.css" />
   <!-- select bootstrap -->
   <link rel="stylesheet" href="<?php echo template_base_url() ?>css/bootstrap-select.css" />
   <!-- scrollbar css -->
   <link rel="stylesheet" href="<?php echo template_base_url() ?>css/perfect-scrollbar.css" />
   <!-- custom css -->
   <link rel="stylesheet" href="<?php echo template_base_url() ?>css/custom.css" />
</head>

<body class="inner_page map">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar_blog_1">
               <div class="sidebar-header">
                  <div class="logo_section">
                     <a href="index.html"><img class="logo_icon img-responsive" src="<?php echo template_base_url() ?>images/logo/ministere.png" alt="#" /></a>
                  </div>
               </div>
               <div class="sidebar_user_info">
                  <div class="icon_setting"></div>
                  <div class="user_profle_side">
                     <div class="user_img"><img class="img-responsive" src="<?php echo template_base_url() ?>images/logo/ministere.png" alt="#" /></div>
                     <div class="user_info">
                        <h6>Suivie Projet</h6>
                        <p><span class="online_animation"></span>Madagascar</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sidebar_blog_2">
               <a href="<?php echo base_url(); ?>index.php/suiviProjet.php/state_global">
                  <h4>M.E.A.H</h4>
               </a>
               <ul class="list-unstyled components">
                  <li><a href="<?php echo base_url(); ?>index.php/suiviProjet.php/state_global"><i class="fa fa-bar-chart-o yellow_color"></i> <span>Tableau de bord</span></a></li>
                  <li>
                     <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-table purple_color2"></i> <span>Liste total par Region</span></a>

                     <ul class="collapse list-unstyled" id="element">

                        <li>
                           <a href="<?php echo base_url(); ?>index.php/suiviProjet.php/projet_region">
                              <i class="fa fa-tint" style="color: white;"></i>
                              <span style="font-weight:bold;">Tout les secteurs</span>
                           </a>
                        </li>
                        <?php for ($i = 0; $i < count($listeSecteur); $i++) { ?>
                           <li>
                              <a href="<?php echo base_url(); ?>index.php/suiviProjet.php/projet_region?secteur=<?php echo $listeSecteur[$i]['secteur_code'] ?>">
                                 <i class="fa fa-tint" style="color: <?php echo $listeSecteur[$i]['couleur'] ?>;"></i>
                                 <span style="font-weight:bold;color: <?php echo $listeSecteur[$i]['couleur'] ?>;"><?php echo $listeSecteur[$i]['secteur_libelle'] ?></span>
                              </a>
                           </li>
                        <?php } ?>
                     </ul>
                  </li>
                  <li><a href="<?php echo base_url(); ?>index.php/suiviProjet.php/map"><i class="fa fa-map purple_color2"></i> <span>Carthographie</span></a></li>
               </ul>
            </div>
         </nav>
         <!-- end sidebar -->
         <!-- right content -->
         <div id="content">
            <?php echo $content; ?>
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <script src="<?php echo template_base_url() ?>js/jquery.min.js"></script>
   <script src="<?php echo template_base_url() ?>js/popper.min.js"></script>
   <script src="<?php echo template_base_url() ?>js/bootstrap.min.js"></script>
   <!-- wow animation -->
   <script src="<?php echo template_base_url() ?>js/animate.js"></script>
   <!-- select country -->
   <script src="<?php echo template_base_url() ?>js/bootstrap-select.js"></script>
   <!-- owl carousel -->
   <script src="<?php echo template_base_url() ?>js/owl.carousel.js"></script>
   <!-- chart js -->
   <script src="<?php echo template_base_url() ?>js/Chart.min.js"></script>
   <script src="<?php echo template_base_url() ?>js/Chart.bundle.min.js"></script>
   <script src="<?php echo template_base_url() ?>js/utils.js"></script>
   <script src="<?php echo template_base_url() ?>js/analyser.js"></script>
   <!-- nice scrollbar -->
   <script src="<?php echo template_base_url() ?>js/perfect-scrollbar.min.js"></script>
   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>
   <!-- custom js -->
   <script src="<?php echo template_base_url() ?>js/custom.js"></script>
   <script src="<?php echo template_base_url() ?>js/chart_custom_style1.js"></script>
</body>

</html>