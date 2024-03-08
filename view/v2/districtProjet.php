<?php
ob_start();
?>
<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <?php if (count($details) > 1) { ?>
            <div class="full">
            <?php } else { ?>
                <div class="full" style="background-color: <?php echo $details[0]['couleur'] ?>;">
                <?php } ?>
                <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                <div class="logo_section" style="padding: 10px;">
                    <h2 class="" style="font-weight:bold;color:#fff;margin-top:5px;font-size:large;">LISTES TOTAL DES PROJETS
                        <?php if (count($details) > 1) { ?>
                            DE TOUT LES SECTEURS
                        <?php } else { ?>
                            DE L'<?php echo strtoupper($details[0]['secteur_libelle']); ?>
                        <?php } ?>
                        <?php if ($anneeDeb != '' && $anneeFin != '') { ?>
                            <?php if ($anneeDeb == $anneeFin) { ?>
                                DE L'ANNEE <?php echo  $anneeFin; ?>
                            <?php } else { ?>
                                DE L'ANNEE <?php echo  $anneeDeb; ?> au <?php echo  $anneeFin; ?>
                            <?php } ?>
                        <?php } ?>
                    </h2>
                </div>
                <div class="right_topbar">
                    <div class="icon_info" style="padding: 10px;">
                        <h2 style="color:#fff;margin-top:5px;font-size:large;"> <span style="font-weight:bold;"><?php echo $total[0]['nombre']; ?></span> Projets</h2>
                    </div>
                </div>
                <div class="right_topbar">
                    <div class="icon_info" style="padding: 10px;">
                        <a id="nouveau"><button type="button" class="btn btn-warning btn-sm" style="color:#fff;">NOUVEAU</button></a>
                    </div>
                </div>
                </div>
    </nav>
</div>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title" style="font-weight:bold;">
                    <div class="row">
                        <div class="col-md-11">
                            REGION : <span style="color:gray;"><?php echo strtoupper($detRegion[0]['region_libelle']); ?></span>
                        </div>
                        <div class="col-md-1">
                            <a href="<?php echo base_url() ?>index.php/suiviProjet.php/projet_region?secteur=<?php echo $secteur ?>&&debut=<?php echo $anneeDeb ?>&&fin=<?php echo $anneeFin ?>"><button type="button" class="btn btn-block btn-sm btn-danger"><i class="fa fa-reply"></i>retour</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <form action="<?php echo base_url() ?>index.php/suiviProjet.php/projet_district" method="GET" class="form-row">
                                <input type="hidden" name="region" value="<?php echo $region; ?>" />
                                <div class="col-md-2">
                                    <input type="hidden" name="secteur" value="<?php echo $secteur ?>">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="debut" class="form-control form-control-sm" id="debut" placeholder="Année debut" required />
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <input type="number" name="fin" class="form-control form-control-sm" id="fin" placeholder="Année Fin" required />
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-block btn-sm" style="background-color: #a7bcd6;" id="afficher">Filtrer</button>
                                </div>
                                <div class="col-md-1">
                                    <a href="<?php echo base_url() ?>index.php/suiviProjet.php/projet_district?region=<?php echo $region ?>&&secteur=<?php echo $codeSecteur; ?>"><button type="button" class="btn btn-block btn-sm btn-outline-danger" id="afficher">Voir Tout</button></a>
                                </div>
                            </form>
                        </div>
                        <div class="table_section padding_infor_info">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>District</th>
                                            <?php for ($i = 0; $i < count($types); $i++) { ?>
                                                <th><?php echo $types[$i]['type_projet'] ?></th>
                                            <?php } ?>
                                            <th style="width: 8%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>TOTAL</th>
                                            <?php
                                            for ($j = 0; $j < count($types); $j++) {
                                                $count = 0;
                                                for ($i = 0; $i < count($totalType); $i++) {
                                                    if ($types[$j]['type_projet'] == $totalType[$i]['type_projet']) { ?>
                                                        <th><?php echo $totalType[$i]['nombre']; ?></th>
                                                    <?php $count++;
                                                        break;
                                                    } ?>
                                                <?php } ?>
                                                <?php if ($count == 0) { ?>
                                                    <th>0</th>
                                                <?php } ?>
                                            <?php } ?>
                                            <th></th>
                                        </tr>
                                        <?php $cmp = 0;
                                        $i = 0;
                                        $dist = '';
                                        $val = null;
                                        while ($i < count($liste)) { ?>
                                            <?php if ($dist != $liste[$i]['district_libelle_v']) { ?>
                                                <?php $dist = $liste[$i]['district_libelle_v'];
                                                $val = $liste[$i];
                                                $cmp = $i; ?>
                                                <tr>
                                                    <td>
                                                        <a href="<?php echo base_url() ?>index.php/suiviProjet.php/projet_commune?secteur=<?php echo $codeSecteur; ?>&&region=<?php echo $liste[$i]['region_id_v']; ?>&&district=<?php echo $liste[$i]['district_id_v']; ?>&&debut=<?php echo $anneeDeb; ?>&&fin=<?php echo $anneeFin; ?>">
                                                            <span style="color: black;"><?php echo $liste[$i]['district_libelle_v']; ?></span>
                                                        </a>
                                                    </td>
                                                <?php } ?>
                                                <?php for ($j = 0; $j < count($types); $j++) { ?>
                                                    <?php if ($i < count($liste)) { ?>
                                                        <?php if (($dist == $liste[$i]['district_libelle_v']) && ($types[$j]['type_projet'] == $liste[$i]['type_projet'])) { ?>
                                                            <td><?php echo $liste[$i]['nombre']; ?></td>
                                                        <?php
                                                            $i++;
                                                        } else { ?>
                                                            <td><?php echo '0'; ?></td>
                                                        <?php }
                                                    } else { ?>
                                                        <td><?php echo '0'; ?></td>
                                                    <?php } ?>
                                                <?php } ?>
                                                <td>
                                                    <a class="btn btn-success" href="<?php echo base_url() ?>index.php/suiviProjet.php/projet_commune?secteur=<?php echo $codeSecteur; ?>&&region=<?php echo $val['region_id_v']; ?>&&district=<?php echo $val['district_id_v']; ?>&&debut=<?php echo $anneeDeb; ?>&&fin=<?php echo $anneeFin; ?>">
                                                        details
                                                    </a>
                                                </td>
                                                </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $content = ob_get_clean();
    include $_SERVER['DOCUMENT_ROOT'] . '/suiviProjet/view/baseLayoutWhitOutMenu.php';
    ?>
    <script>
        /////lien nouveau///////////////////////
        var lien = document.getElementById('nouveau');
        lien.href = "http://localhost/suiviProjet/index.php/crud.php/nouveau?secteur=<?php echo ($details[0]['secteur_code']); ?>&&region=<?php echo $detRegion[0]['region_id']; ?>&&district=&&commune=";
    </script>
    <script src="<?php echo home_base_url(); ?>plugins/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo home_base_url(); ?>js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo home_base_url(); ?>js/dataTables.buttons.min.js"></script>
    <script src="<?php echo home_base_url(); ?>plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo home_base_url(); ?>plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo home_base_url(); ?>plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo home_base_url(); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo home_base_url(); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo home_base_url(); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?php echo home_base_url(); ?>plugins/jquery-ui/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>plugins/jquery-ui/jquery-ui.css">

    <script src="<?php echo home_base_url(); ?>js/dataTables.select.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="<?php echo home_base_url(); ?>plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/reboisement.css">


    <!-- Bootstrap 4 -->
    <script src="<?php echo home_base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo home_base_url(); ?>dist/js/adminlte.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo home_base_url(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- ChartJS -->
    <script src="<?php echo home_base_url(); ?>plugins/chart.js/Chart.min.js"></script>

    <link rel="stylesheet" href="<?php echo home_base_url(); ?>dist/css/adminlte.min.css">

    </html>