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
                    <h2 class="" style="font-weight:bold;color:#fff;margin-top:5px;font-size:large;">LISTES DES PROJETS
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
                        <a id="nouveau" href="#"><button type="button" class="btn btn-warning btn-sm" style="color:#fff;">NOUVEAU</button></a>
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
                            &nbsp;&nbsp;&nbsp;
                            DISTRICT : <span style="color:gray;"><?php echo strtoupper($detDistrict[0]['district_libelle']); ?></span>
                            &nbsp;&nbsp;&nbsp;
                            COMMUNE :<span style="color:gray;"><?php echo strtoupper($detCommune[0]['commune_libelle']); ?></span>
                        </div>
                        <div class="col-md-1">
                        <a href="<?php echo base_url() ?>index.php/suiviProjet.php/projet_commune?region=<?php echo $region ?>&&district=<?php echo $district; ?>&&secteur=<?php echo $nomSecteur; ?>&&debut=<?php echo $anneeDeb ?>&&fin=<?php echo $anneeFin ?>"><button type="button" class="btn btn-block btn-sm btn-danger"><i class="fa fa-reply"></i> retour</button></a>             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <form action="<?php echo base_url() ?>index.php/suiviProjet.php/liste_projet" method="GET" class="form-row">
                            <input type="hidden" name="sec" value="<?php echo $nomSecteur; ?>">
                            <input type="hidden" name="debut" value="<?php echo $anneeDeb ?>">
                            <input type="hidden" name="fin" value="<?php echo $anneeFin ?>">
                            <input type="hidden" name="region" value="<?php echo $region ?>">
                            <input type="hidden" name="district" value="<?php echo $district ?>">
                            <input type="hidden" name="commune" value="<?php echo $commune ?>">

                            <div class="col-2 col-sm-2 col-md-2">

                                <label for="code" style="color:gray;">Code</label>
                                <input type="text" name="code" class="form-control form-control-sm" id="code" value="<?php echo $code; ?>" />
                            </div>
                            <div class="col-2 col-sm-2 col-md-2">
                                <label for="libelle" class="form-label" style="color:gray;">libelle</label>
                                <input type="text" name="libelle" class="form-control form-control-sm" id="libelle" />
                            </div>
                            <div class="col-2 col-sm-2 col-md-2">
                                <label for="type" class="form-label" style="color:gray;">Type de projet</label>
                                <select id='type' name="type" class="form-control form-control-sm">
                                    <option value=''> Choisir le Type </option>
                                    <?php foreach ($typesProjet as $key => $value) { ?>
                                        <option value="<?php echo $value['type_projet'] ?>"><?php echo $value['type_projet'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2">
                                <label for="date" class="form-label" style="color:gray;">Date</label>
                                <input type="date" name="date" class="form-control form-control-sm" id="date" />
                            </div>
                            <div class="col-2 col-sm-2 col-md-2">
                                <label for="date" class="form-label"></label>
                                <button type="submit" style="background-color: #a7bcd6; margin-top:5px;" class="btn btn-block btn-sm" id="afficher">Filtrer</button>
                            </div>
                        </form>
                    </div>
                    <div class="full padding_infor_info">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 6%">Code</th>
                                        <th style="width: 30%">Libelle</th>
                                        <th>secteur</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th style="width: 8%"></th>
                                    </tr>
                                </thead>
                                <tbody style="">
                                    <?php foreach ($liste as $key => $value) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $value['codeprojet'] ?>

                                            </td>
                                            <td><?php echo $value['libelleprojet'] ?></td>
                                            <td><?php echo $value['secteur_libelle'] ?></td>
                                            <td><?php echo $value['type_projet'] ?></td>
                                            <td><?php echo $value['date_eval_projet'] ?></td>
                                            <td> <button type="button" class="btn btn-primary" onclick="details(<?php echo $value['codeprojet'] ?>)">
                                                    details
                                                </button>
                                            </td>
                                            <?php if ($value['type_projet'] == 'Partenarisé' || $value['type_projet'] == 'etude de projet à Jour') { ?>
                                                <td> <button type="button" class="btn btn-danger" onclick="retour(<?php echo $value['codeprojet'] ?>,<?php echo $value['etapeprojet'] ?>)">
                                                        annuler
                                                    </button></td>
                                            <?php } else { ?>
                                                <td> <button type="button" class="btn btn-danger" onclick="supprimer(<?php echo $value['codeprojet'] ?>)">
                                                        supprimer
                                                    </button></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="full graph_head">
                        <ul class="pagination justify-content-center">
                            <?php if (($num - 1) == 0) { ?>
                                <li class="page-item disabled">
                                <?php } else { ?>
                                <li class="page-item">
                                <?php } ?>
                                <a class="page-link" href="<?php echo base_url() ?>index.php/suiviProjet.php/liste_projet?num=<?php echo ($num - 1) ?><?php echo $urlpage ?>" tabindex="-1">Precedent</a>
                                </li>
                                <?php if (count($liste) <= $ligne) { ?>
                                    <li class="page-item disabled">
                                    <?php } else { ?>
                                    <li class="page-item">
                                    <?php } ?>
                                    <a class="page-link" href="<?php echo base_url() ?>index.php/suiviProjet.php/liste_projet?num=<?php echo ($num + 1) ?><?php echo $urlpage ?>">Suivant</a>
                                    </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModal">

</div>


<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/suiviProjet/view/baseLayoutWhitOutMenu.php';

?>
<script>
    function retour(code, etape) {
        if (confirm("Voulez-vous vraiment retourner") == true) {
            document.location.href = "<?php echo base_url(); ?>index.php/crud.php/retour?sec=<?php echo $sec; ?>&&debut=<?php echo $anneeDeb; ?>&&fin=<?php echo $anneeFin; ?>&&region=<?php echo $region; ?>&&district=<?php echo $district; ?>&&commune=<?php echo $commune; ?>&&code=" + code + "&&etape=" + etape + "";
        }
    }

    function supprimer(code) {
        if (confirm("Voulez-vous vraiment supprimer") == true) {
            document.location.href = "<?php echo base_url(); ?>index.php/crud.php/supprimer?sec=<?php echo $sec; ?>&&debut=<?php echo $anneeDeb; ?>&&fin=<?php echo $anneeFin; ?>&&region=<?php echo $region; ?>&&district=<?php echo $district; ?>&&commune=<?php echo $commune; ?>&&code=" + code + "";
        }
    }
    /////lien nouveau///////////////////////
    var lien = document.getElementById('nouveau');
    lien.href = "<?php echo base_url(); ?>index.php/crud.php/nouveau?secteur=<?php echo ($details[0]['secteur_code']); ?>&&region=<?php echo $detRegion[0]['region_id']; ?>&&district=<?php echo ($detDistrict[0]['district_id']); ?>&&commune=<?php echo $detCommune[0]['commune_id']; ?>";
</script>
<script src="<?php echo template_base_url(); ?>httpRequest.js"></script>
<script>
    var xhttp = null;

    function details(code) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("myModal").innerHTML =
                    this.responseText;
                // alert(this.responseText);
                $('#myModal').modal('show');
            }
        };
        xhttp.open("GET", "<?php echo base_url() ?>index.php/suiviProjet.php/details?code=" + code, true);
        xhttp.send();
    }

    function modification(lien, code) {
        let xhttp = null;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content-modif").innerHTML =
                    this.responseText;
                // alert(this.responseText);
                $('#modification').modal('show');
            }
        };
        xhttp.open("GET", lien + "index.php/crud.php/modifier?code=" + code, true);
        xhttp.send();
    }
    ////alignement ////////////////////////
    function update(code) {
        alignementPartenaire("<?php echo base_url() ?>", code, document.getElementById("nom_parte").value, function act() {
            $('#alignePartenaire').modal('hide');
            window.location.reload();
        });
    }
    
    function updateAlignement(code) {
        let c = document.getElementById("content-parte");
        c.innerHTML = "";
        c.appendChild(getHtmlAlgnement(code, update));
        $('#alignePartenaire').modal('show');
    }
    //// fin alignement ////////////////////////

    function updateEtudes(code) {
        rattachemetnEtude("<?php echo base_url() ?>", code, document.getElementById("dateetude").value, document.getElementById("reference").value, document.getElementById("montant").value , document.getElementById("delai").value, document.getElementById("beneficiaire").value, document.getElementById("infra").value, function act() {
            $('#aligneEtude').modal('hide');
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("myModal").innerHTML =
                        this.responseText;
                }
            };
            xhttp.open("GET", "<?php echo base_url() ?>index.php/suiviProjet.php/details?code=" + code, true);
            xhttp.send();
        });
    }

    function updateEtude(code) {
        let c = document.getElementById("content-etude");
        c.innerHTML = "";
        c.appendChild(getHtmlEtude(code, updateEtudes));
        $('#aligneEtude').modal('show');
    }

</script>




<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/dataTables.checkboxes.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>plugins/jquery-ui/jquery-ui.css">

<script src="<?php echo home_base_url(); ?>js/dataTables.select.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo home_base_url(); ?>plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/reboisement.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- ChartJS -->
<link rel="stylesheet" href="<?php echo home_base_url(); ?>dist/css/adminlte.min.css">

<script src="<?php echo home_base_url(); ?>js/jquery-3.5.1.js" type="text/javascript"></script>
<script type="text/javascript">
    
    /////modif////////
     
    function selectedRegion() {
        var selectRegion = document.getElementById("selectRegion");
        console.log(selectRegion);
        xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(xhttp.responseText);
                    var selectDistrict = document.getElementById('selectDistrict');
                    selectDistrict.innerHTML = '';
                    response.forEach(function(option) {
                        var optionElem = document.createElement('option');
                        optionElem.value = option['district_id'];
                        optionElem.textContent = option['district_libelle'];
                        selectDistrict.appendChild(optionElem);
                    });
                }
            };
        xhttp.open("GET", "<?php echo base_url() ?>index.php/suiviProjet.php/district?region=" + selectRegion.value, true);
        xhttp.send();
   }

   function selectedDistrict() {
        var selectDistrict = document.getElementById("selectDistrict");
        xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(xhttp.responseText);
                    var selectCommune = document.getElementById('selectCommune');
                    selectCommune.innerHTML = '';
                    response.forEach(function(option) {
                        var optionElem = document.createElement('option');
                        optionElem.value = option['commune_id'];
                        optionElem.textContent = option['commune_libelle'];
                        selectCommune.appendChild(optionElem);
                    });
                }
            };
        xhttp.open("GET", "<?php echo base_url() ?>index.php/suiviProjet.php/commune?district=" + selectDistrict.value, true);
        xhttp.send();
   }
   ///////////
    function validerModif() {
            var formData = $('#frmLogin').serialize();
            $.ajax({
                type: 'POST',
                url: $('#frmLogin').attr('action'), 
                data: formData,
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    alert(error);
                    // Gérer les erreurs de la requête AJAX
                    console.error('Erreur lors de la requête AJAX :', status, error);
                }
            });
        }
</script>
