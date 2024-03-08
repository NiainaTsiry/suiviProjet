<?php
ob_start();
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="full">
            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
            <div class="logo_section" style="padding: 10px;">
                <h2 class="" style="font-weight:bold;color:#fff;margin-top:5px;font-size:large;">
                    VISUALISATION CARTOGRAPHIQUE DES PROJETS
                </h2>
            </div>
            <div class="right_topbar">
                <div class="icon_info" style="padding: 10px;">
                    <h2 style="color:#fff;margin-top:5px;font-size:large;"> <span style="font-weight:bold;" id="total"></span> Projets</h2>
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title" style="padding: 10px;">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="type" class="form-label" style="font-weight: bold;">Type Projet </label>
                            <select id="type" class="form-control form-control-sm">
                                <option value="" selected>Tout</option>
                                <?php foreach ($typesProjet as $key => $value) { ?>
                                    <option value="<?php echo $value['type_projet'] ?>"><?php echo $value['type_projet'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="type" class="form-label" style="font-weight: bold;">Année Debut</label>
                            <input type="number" name="debut" id="debut" class="form-control form-control-sm" />
                        </div>
                        <div class="col-md-2">
                            <label for="type" class="form-label" style="font-weight: bold;">Année Fin</label>
                            <input type="number" name="fin" id="fin" class="form-control form-control-sm" />
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary btn-sm" id="filtrer" style="margin-top:27px;">filtrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row column1">
            <div class="col-md-8">
                <div class="white_shd full margin_bottom_30">
                    <div class="map_section padding_infor_info">
                        <div class="map m_style1">
                            <div id="map" style="background-color: rgba(0, 0, 255, 0.1);"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <div class="white_shd">
                        <div class="widget_progress_bar">
                            <ul class="list-group">
                                <?php for ($i = 0; $i < count($listeSecteur); $i++) { ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="border: 0;padding:0px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="secteurs" id="secteurs<?php echo $i; ?>" value="<?php echo $listeSecteur[$i]['secteur_code'] ?>" checked>
                                            <label class="form-check-label" for="secteurs">
                                                <i class="fa fa-circle" style="color: <?php echo $listeSecteur[$i]['couleur'] ?>;"></i> <span style="color:<?php echo $listeSecteur[$i]['couleur'] ?>;"> <?php echo $listeSecteur[$i]['secteur_libelle'] ?>
                                                </span>
                                            </label>
                                        </div>
                                        <span class="badge rounded-pill" id="nbre<?php echo $listeSecteur[$i]['secteur_libelle'] ?>" style="background-color:<?php echo $listeSecteur[$i]['couleur'] ?>;color:#fff;"></span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top:5px;">
                    <div class="white_shd">
                        <div class="widget_progress_bar">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="localisation" id="region" value="region" checked>
                                <label class="form-check-label" for="region">
                                    <i class="fa fa-circle-o" style="color: <?php echo $couleuRegion; ?>;"></i> <span style="color:<?php echo $couleuRegion; ?>;">
                                        Region
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="localisation" id="district" value="district">
                                <label class="form-check-label" for="district">
                                    <i class="fa fa-circle-o" style="color: <?php echo $couleuDistrict; ?>;"></i> <span style="color:<?php echo $couleuDistrict; ?>;">
                                        District
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div id="contentModal">

                <div class="modal-header" style="">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModallis">

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/suiviProjet/view/baseLayoutWhitOutMenu.php';

?>
<style>
    .text-label-district {
        text-align: center;
        position: absolute;
        color: <?php echo $couleuDistrict; ?>;
        top: 5px;
        left: -10px;
        /* Déplace le texte vers la droite de 50% de la largeur de son conteneur */
    }

    .text-label-region {
        text-align: center;
        position: absolute;
        color: <?php echo $couleuRegion; ?>;
        top: 5px;
        left: -10px;

        /* Déplace le texte vers la droite de 50% de la largeur de son conteneur */
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo home_base_url(); ?>js/jquery-3.5.1.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://d3js.org/d3.v7.min.js"></script>

<script src="<?php echo template_base_url(); ?>httpRequest.js"></script>
<script type="module" src="<?php echo template_base_url() ?>map.js"></script>
<script>
    var couleuRegion = "<?php echo $couleuRegion; ?>";
    var couleuDistrict = "<?php echo $couleuDistrict; ?>";

    function updateValeurTotal(value) {
        document.getElementById("total").innerHTML = value;
    }
    var elementSecteur = [];

    function updateNombreParSecteur(secteurs) {
        if (elementSecteur.length == 0) {
            secteurs.forEach(element => {
                elementSecteur.push(element.secteur_libelle);
                document.getElementById("nbre" + element.secteur_libelle).innerHTML = element.nombre;
            });
        } else {
            elementSecteur.forEach(element => {
                let n = 0;
                for (let i = 0; i < secteurs.length; i++) {
                    if (secteurs[i].secteur_libelle == element) {
                        n = parseInt(secteurs[i].nombre);
                        break;
                    }
                }
                document.getElementById("nbre" + element).innerHTML = n;
            });
        }
    }

    function checkSecteur() {
        let checkboxes = document.querySelectorAll(".form-check-input");
        let checkboxStates = [];
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked == true) {
                checkboxStates.push(checkbox.value);
            }
        });
        return checkboxStates;
    }
    var num = 1;

    function getValueTypeProjet() {
        return document.getElementById("type").value;
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
    function affDistrictCheked() {
        document.getElementById('affDistrict').checked = true;
    }

    function getValueLocalisation() {
        let val = document.querySelector('input[name="localisation"]:checked');
        return val.value;
    }

    function getValueDebut() {
        return document.getElementById("debut").value;
    }

    function getValueFin() {
        return document.getElementById("fin").value;
    }

    function afficheModal() {
        $('#myModal').modal('show');
    }

    function afficheListe(region, district) {
        listeProjet("<?php echo base_url() ?>", checkSecteur(), getValueTypeProjet(), getValueDebut(), getValueFin(), region, district, num, document.getElementById("contentModal"), afficheModal);
    }

    var xhttp = null;

    function details(code) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("myModallis").innerHTML =
                    this.responseText;
                $('#myModallis').modal('show');
            }
        };
        xhttp.open("GET", "<?php echo base_url() ?>index.php/suiviProjet.php/details?code=" + code, true);
        xhttp.send();
    }
    function update(code) {
        alignementPartenaire("<?php echo base_url() ?>", code, document.getElementById("nom_parte").value, function act() {
            //alert("okay");
            $('#alignePartenaire').modal('hide');
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("myModallis").innerHTML =
                        this.responseText;
                        searchMap();
                }
            };
            xhttp.open("GET", "<?php echo base_url() ?>index.php/suiviProjet.php/details?code=" + code, true);
            xhttp.send();
        });
    }

    function updateAlignement(code) {
        let c = document.getElementById("content-parte");
        c.innerHTML = "";
        c.appendChild(getHtmlAlgnement(code, update));
        $('#alignePartenaire').modal('show');
    }
</script>
<script type="module">
    import {
        afficheRegion,
        setUrl,
        addGeoJsonBondaries,
        reinitialisationMap,
        repaint,
        afficheDistrict
    } from "<?php echo template_base_url() ?>map.js";
    var pathRegion = "<?php echo home_base_url(); ?>data/region.geojson";
    var pathdistrict = "<?php echo home_base_url(); ?>data/districtattribute.geojson";
    var icon = '<?php echo template_base_url() ?>point.png';

    function generateDistrict() {
        getDataDistrict("<?php echo base_url() ?>", checkSecteur(), getValueTypeProjet(), getValueDebut(), getValueFin(), afficheDistrict, icon, updateValeurTotal, updateNombreParSecteur);
    }

    function generateRegion() {
        getData("<?php echo base_url() ?>", checkSecteur(), getValueTypeProjet(), getValueDebut(), getValueFin(), afficheRegion, icon, updateValeurTotal, updateNombreParSecteur);
    }

    function searchMap() {
        let val = getValueLocalisation();
        if (val == "region") {
            generateRegion();
        } else if (val == "district") {
            generateDistrict();
        }
    }
    $.getJSON(pathRegion, function(data) {
        addGeoJsonBondaries(data, pathdistrict, affDistrictCheked, couleuRegion, couleuDistrict, generateDistrict);
    });
    <?php for ($i = 0; $i < count($listeSecteur); $i++) { ?>
        document.getElementById('secteurs<?php echo $i; ?>').onchange = function() {
            searchMap();
        };
    <?php } ?>
    searchMap();
    document.getElementById('district').onchange = function() {
        generateDistrict();
    };

    document.getElementById('region').onchange = function() {
        generateRegion();
    };
    document.getElementById('type').onchange = function() {
        searchMap();
    };
    document.getElementById('debut').onchange = function() {
        searchMap();
    };
    document.getElementById('fin').onchange = function() {
        searchMap();
    };
    document.getElementById('filtrer').onclick = function() {
        searchMap();
    };
</script>

<script src="<?php echo home_base_url(); ?>js/jquery-3.5.1.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#selectRegion').on('change', function() {
            var selectedValue = $(this).val();
            let dt;
            if ($('#selectDistrict').val() === null) {
                $.ajax({
                    url: 'http://localhost/suiviProjet/service/modele.php ',
                    type: 'POST',
                    data: {
                        value: selectedValue
                    },
                    success: function(response) {
                        var options = JSON.parse(response);
                        $('#selectDistrict').empty();
                        $.each(options, function(index, option) {
                            $('#selectDistrict').append($('<option>', {
                                value: option.value,
                                text: option.text
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            } else {
                $.ajax({
                    url: 'http://localhost/suiviProjet/service/modele.php ',
                    type: 'POST',
                    data: {
                        value: selectedValue
                    },
                    success: function(response) {
                        var options = JSON.parse(response);
                        $('#selectDistrict').empty();
                        $.each(options, function(index, option) {
                            $('#selectDistrict').append($('<option>', {
                                value: option.value,
                                text: option.text
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
        $('#selectDistrict').on('change', function() {
            var selectedValue = $(this).val();
            let dt;
            if ($('#selectCommune').val() === null) {
                $.ajax({
                    url: 'http://localhost/suiviProjet/service/service.php ',
                    type: 'POST',
                    data: {
                        district: selectedValue
                    },
                    success: function(response) {
                        console.log(response);
                        var options = JSON.parse(response);
                        $('#selectCommune').empty();
                        $.each(options, function(index, option) {
                            $('#selectCommune').append($('<option>', {
                                value: option.value,
                                text: option.text
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            } else {
                $.ajax({
                    url: 'http://localhost/suiviProjet/service/service.php ',
                    type: 'POST',
                    data: {
                        district: selectedValue
                    },
                    success: function(response) {
                        console.log(response);
                        var options = JSON.parse(response);
                        $('#selectCommune').empty();
                        $.each(options, function(index, option) {
                            $('#selectCommune').append($('<option>', {
                                value: option.value,
                                text: option.text
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });
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