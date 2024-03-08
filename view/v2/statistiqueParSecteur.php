<?php
ob_start();
?>
<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="full">
            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
            <div class="logo_section" style="padding: 10px;">
                <h2 class="" style="font-weight:bold;color:#fff;margin-top:5px;font-size:large;">SITUATION ACTUEL DES PROJETS
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
                    <h2 style="color:#fff;margin-top:5px;font-size:large;"> <span style="font-weight:bold;"><?php echo $totalProjet; ?></span> Projets</h2>
                </div>
            </div>
            <div class="right_topbar">
                    <div class="icon_info" style="padding: 10px;">
                    <a id="nouveau" href="#"><button type="button" class="btn btn-warning btn-sm" style="color:#fff;">NOUVEAU</button></a>
            </div>
        </div>
    </nav>
</div>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <form action="<?php echo base_url() ?>index.php/suiviProjet.php/state_global" method="GET" class="form-row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <input type="number" name="debut" class="form-control form-control-sm" id="debut" placeholder="Année debut" required />
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <input type="number" name="fin" class="form-control form-control-sm" id="fin" placeholder="Année Fin" required />
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-block btn-sm" style="background-color: #a7bcd6;" id="afficher">Filtrer</button>
                        </div>
                        <div class="col-md-1">
                            <a href="<?php echo base_url() ?>index.php/suiviProjet.php/state_global"><button type="button" class="btn btn-block btn-sm btn-outline-danger" id="afficher">Voir Tout</button></a>
                        </div>
                        <div class="col-md-1"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row column1 social_media_section">
            <?php for ($i = 0; $i < count($totalSecteur); $i++) { ?>
                <div class="col-md-6 col-lg-4">
                    <a href="<?php echo base_url(); ?>index.php/suiviProjet.php/projet_region?secteur=<?php echo $totalSecteur[$i]['secteur_code'] ?>&&debut=<?php echo $anneeDeb ?>&&fin=<?php echo $anneeFin ?>">
                        <div class="card-header border-0" style="background-color: <?php echo $listeSecteur[$i]['couleur'] ?>;">
                            <div class="d-flex justify-content-between">
                                <h1 class="card-title" style="font-weight: bold;color:white;"><?php echo $totalSecteur[$i]['secteur_libelle'] ?></h1>
                                <div class="card-tools">
                                    <a href="#"><span style="font-weight: bold;color:#fff;"><?php echo $totalSecteur[$i]['nombre'] ?></a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body" style="background-color: #fff;">
                        <?php foreach ($total as $key => $value) { ?>
                            <div class="row" style="padding:2px;border:solid 1px #979393;">
                                <div class="col-8"><?php echo $value['type_projet'] ?></div>
                                <div class="col-4" style="text-align:right;"><?php echo $value[$totalSecteur[$i]['secteur_libelle']] ?></div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-body" style="background-color: #fff;">
                        <canvas id="chart<?php echo $totalSecteur[$i]['secteur_libelle'] ?>" height="280px" />
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</body>
<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/suiviProjet/view/baseLayoutWhitOutMenu.php';

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    <?php for ($j = 0; $j < count($listeSecteur); $j++) { ?>
        console.log("\n")
        var colorType<?php echo $j; ?> = <?php echo json_encode($types, JSON_UNESCAPED_UNICODE); ?>.map(row => row.couleur_projet);
        var data<?php echo $j; ?> = <?php echo json_encode($listeProjetSec[$j], JSON_UNESCAPED_UNICODE); ?>;
        var annee<?php echo $j; ?> = [...new Set(data<?php echo $j; ?>.map(row => row.annee))];
        var types<?php echo $j; ?> = [...new Set(data<?php echo $j; ?>.map(row => row.type_projet))];
        var dataset<?php echo $j; ?> = getMultipleDataSet(types<?php echo $j; ?>, data<?php echo $j; ?>, colorType<?php echo $j; ?>);
        var ctx<?php echo $j; ?> = document.getElementById('chart<?php echo $listeSecteur[$j]['secteur_libelle']; ?>');
        new Chart(ctx<?php echo $j; ?>, {
            type: 'bar',
            data: {
                labels: annee<?php echo $j; ?>,
                datasets: dataset<?php echo $j; ?>
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'start',
                        labels: {
                            textAlign: 'left',
                            boxWidth: 80
                        }
                    }
                }
            },
        });
    <?php } ?>

    function getDataProjet(type, data, couleur) {
        var res = []
        let j = 0
        for (let j = 0; j < data.length; j++) {
            if (data[j].type_projet.toString() === type.toString()) {
                res.push(data[j].nombre);
            }
        }
        return {
            label: type,
            data: res,
            borderWidth: 1,
            borderColor: couleur.toString(),
            backgroundColor: couleur.toString(),
        };
    }

    function getMultipleDataSet(types, data, couleurs) {
        let rep = [];
        let j = 0;
        for (j = 0; j < types.length; j++) {
            rep.push(getDataProjet(types[j], data, couleurs[j]));
        }
        return rep;
    }

      //////lien nouveau
    var lien = document.getElementById('nouveau');
    lien.href = "http://localhost/suiviProjet/index.php/crud.php/nouveau?secteur=&&region=&&district=&&commune=";
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