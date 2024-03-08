<?php
ob_start();
?>
<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="logo_section" style="padding: 10px;">
            <h2 class="" style="font-weight:bold;color:#fff;margin-top:5px;font-size:large;">NOUVEAU ETUDE DE PROJET
            </h2>
        </div>
    </nav>
</div>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row" style="padding-top:50px;height:400px">
            <div class="col-md-12" style="height:400px">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <form action="<?php echo base_url(); ?>index.php/crud.php/Nouveauetude" method="post"
                            id="frmLogin">
                            <div class="form-row">
                                <div class="col-6 col-sm-6 col-md-6">

                                    <label for="selectData">Secteur:</label>
                                    <select id="selectData" name="secteur" class="form-control" required>
                                        <?php if ($secteur == '') { ?>
                                            <?php foreach ($listSecteur as $key => $value) { ?>
                                                <option value="<?php echo $value['secteur_code'] ?>">
                                                    <?php echo $value['secteur_libelle'] ?>
                                                </option>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <option value="<?php echo $secteur[0]['secteur_code'] ?>">
                                                <?php echo $secteur[0]['secteur_libelle'] ?>
                                            </option>
                                            <?php foreach ($listSecteur as $key => $value) { ?>
                                                <option value="<?php echo $value['secteur_code'] ?>">
                                                    <?php echo $value['secteur_libelle'] ?>
                                                </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    <label for="selectData">Date d'idée du projet :</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <label for="selectData">Libelle :</label>
                                    <textarea id="libelle" name="libelle" rows="3" cols="50"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Region:</label>
                                    <?php if ($region == '') { ?>
                                        <select id="selectRegion" name="region" class="form-control"
                                            onchange="selectedRegion()" required>
                                            <option value=''>
                                            </option>
                                            <?php foreach ($listRegion as $value) { ?>
                                                <option value="<?php echo $value['region_id'] ?>">
                                                    <?php echo $value['region_libelle'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    <?php } else { ?>
                                        <select id="selectRegion" name="region" class="form-control"
                                            onchange="selectedRegion()" required>
                                            <option value='<?php echo $region[0]['region_id'] ?>'>
                                                <?php echo $region[0]['region_libelle'] ?>
                                            </option>
                                            <?php foreach ($listRegion as $value) { ?>
                                                <option value="<?php echo $value['region_id'] ?>">
                                                    <?php echo $value['region_libelle'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    <?php } ?>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <label for="selectData">District :</label>
                                    <?php if ($district == '') { ?>
                                        <?php ?>
                                        <select id='selectDistrict' name='district' class='form-control'
                                            onchange="selectedDistrict()" required>
                                            <option value=''>
                                            </option>
                                            <?php foreach ($listDistrict as $value) { ?>
                                                <option value="<?php echo $value['district_id'] ?>">
                                                    <?php echo $value['district_libelle'] ?>
                                                </option>
                                            <?php } ?>
                                            <?php ?>
                                        </select>
                                    <?php } else { ?>
                                        <select id='selectDistrict' name='district' class='form-control'
                                            onchange="selectedDistrict()" required>
                                            <option value='<?php echo $district[0]['district_id'] ?>'>
                                                <?php echo $district[0]['district_libelle'] ?>
                                            </option>
                                            <?php foreach ($listDistrict as $value) { ?>
                                                <option value="<?php echo $value['district_id'] ?>">
                                                    <?php echo $value['district_libelle'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    <?php } ?>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Commune :</label>
                                    <?php if ($commune == '') { ?>
                                        <?php ?>
                                        <select id='selectCommune' name='commune' class='form-control' required>
                                            <option value=''>
                                            </option>
                                            <?php foreach ($listCommune as $value) { ?>
                                                <option value="<?php echo $value['commune_id'] ?>">
                                                    <?php echo $value['commune_libelle'] ?>
                                                </option>
                                            <?php } ?>
                                            <?php ?>
                                        </select>
                                    <?php } else { ?>
                                        <select id='selectCommune' name='commune' class='form-control' required>
                                            <option value='<?php echo $commune[0]['commune_id'] ?>'>
                                                <?php echo $commune[0]['commune_libelle'] ?>
                                            </option>
                                            <?php foreach ($listCommune as $value) { ?>
                                                <option value="<?php echo $value['commune_id'] ?>">
                                                    <?php echo $value['commune_libelle'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    <?php } ?>

                                </div>


                                <div class="col-12 col-sm-12 col-md-12">

                                    <label for="selectData">Description :</label>
                                    <textarea id="description" name="description" rows="3" cols="50"
                                        class="form-control"></textarea>

                                </div>
                                <div class="form-row">
                                    <div class="col-4 col-sm-4 col-md-4">

                                        <label for="selectData">Date d'étude du projet:</label>
                                        <input type="date" name="dateetude" class="form-control" required />

                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4">

                                        <label for="selectData">Reference :</label>
                                        <input type="text" name="reference" class="form-control" required />

                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4">

                                        <label for="selectData">Montant marche :</label>
                                        <input type="number" name="montant" class="form-control" required />

                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4">

                                        <label for="selectData">Delai d'execution:</label>
                                        <input type="number" name="delai" class="form-control" required />

                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4">

                                        <label for="selectData">Nombre beneficiaires :</label>
                                        <input type="number" name="beneficiaire" class="form-control" required />

                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4">

                                        <label for="selectData">Nombre infrastructures :</label>
                                        <input type="number" name="infra" class="form-control" required />

                                    </div>
                                </div>
                            </div>
                            <div class="container"><br />
                                <button type="submit" onclick="myFunction()" class="btn btn-warning btn-block"
                                    id="btnLogin">
                                    Valider</button>
                            </div>
                        </form>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

    function myFunction() {
        let text;
        if (confirm("Projet bien ajouté!") == true) {
            document.location.href = "<?php echo base_url(); ?>index.php/suiviProjet.php/liste_projet";
        } else {
            text = "You canceled!";
        }
    }

    function selectedRegion() {
        var selectRegion = document.getElementById("selectRegion");
        console.log(selectRegion);
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(xhttp.responseText);
                var selectDistrict = document.getElementById('selectDistrict');
                selectDistrict.innerHTML = '';
                response.forEach(function (option) {
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
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(xhttp.responseText);
                var selectCommune = document.getElementById('selectCommune');
                selectCommune.innerHTML = '';
                response.forEach(function (option) {
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

</script>

<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/dataTables.checkboxes.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>plugins/jquery-ui/jquery-ui.css">

<script src="<?php echo home_base_url(); ?>js/dataTables.select.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo home_base_url(); ?>plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/reboisement.css">
<link rel="stylesheet" href="<?php echo home_base_url(); ?>dist/css/adminlte.min.css">

</html>