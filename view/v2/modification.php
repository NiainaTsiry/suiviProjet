<div class="midde_cont">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <form action="<?php echo base_url(); ?>index.php/crud.php/updateProjet" method="post" id="frmLogin">
                        <div class="form-row">
                                <div class="col-6 col-sm-6 col-md-6">
                                    <input type="hidden" value ="<?php echo $valeur['codeprojet'] ?>" name ="code"/>
                                    <input type="hidden" value ="0" name ="etapeprojet[]"/>
                                    <label for="selectData">Secteur:</label>
                                    <select id="selectData" name="sec" class="form-control" required>
                                        <option value='<?php echo $valeur['codesecteur']?>'><?php echo $valeur['secteur_libelle']?></option>
                                        <?php foreach ($listSecteur as $key => $value) { ?>
                                            <option value="<?php echo $value['secteur_code'] ?>">
                                                <?php echo $value['secteur_libelle'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    <label for="selectData">Date d'idée du projet :</label>
                                    <input type="date" class="form-control" id="date" name="dateidee" value = "<?php echo $valeur['date_idee']?>" required>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <label for="selectData">Libelle :</label>
                                    <input id="myInputDesc" style="width : 100%; height : 80px;" name="libelle"
                                        rows="3" cols="60" class="form-control"
                                        value="<?php echo $valeur['libelleprojet'] ?>" />
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-4 col-sm-4 col-md-4">
                                    <label for="selectData">Region:</label>
                                    <select id="selectRegion" name="region" class="form-control" onchange="selectedRegion()" required>
                                        <option value='<?php echo $valeur['region_id_v']?>'><?php echo $valeur['region_libelle_v']?></option>
                                        <?php foreach ($listRegion as $value) { ?>
                                            <option value="<?php echo $value['region_id'] ?>">
                                                <?php echo $value['region_libelle'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <label for="selectData">District :</label>
                                    <select id='selectDistrict' name='district' class='form-control' onchange="selectedDistrict()" required>
                                       <option value='<?php echo $valeur['district_id_v']?>'><?php echo $valeur['district_libelle_v']?></option>
                                       <?php foreach ($listDistrict as $value) { ?>
                                            <option value="<?php echo $value['district_id'] ?>">
                                                <?php echo $value['district_libelle'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Commune :</label>
                                    <select id='selectCommune' name='commune' class='form-control' required>
                                    <option value='<?php echo $valeur['commune_id_v']?>'><?php echo $valeur['commune_libelle_v']?></option>
                                    <?php foreach ($listCommune as $value) { ?>
                                            <option value="<?php echo $value['commune_id'] ?>">
                                                <?php echo $value['commune_libelle'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12">

                                    <label for="selectData">Description :</label>
                                    <input id="myInputDesc" style="width : 100%; height : 80px;" name="description"
                                        rows="3" cols="50" class="form-control"
                                        value="<?php echo $valeur['decription'] ?>" />

                                </div>
                                <?php if ($valeur['etapeprojet'] == 1) { ?>
                                    <div class="form-row">
                                        <input type="hidden" value ="1" name ="etapeprojet[]"/>
                                        <div class="col-4 col-sm-4 col-md-4">
                                         
                                            <label for="selectData">Date d'étude du projet:</label>
                                            <input type="date" name="dateetude" class="form-control"
                                                value="<?php echo $valeur['date_etude'] ?>" required />

                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">

                                            <label for="selectData">Reference :</label>
                                            <input type="text" name="reference" class="form-control"
                                                value="<?php echo $valeur['referenceprojet'] ?>" required />

                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">

                                            <label for="selectData">Montant marche :</label>
                                            <input type="number" name="montantmarche" class="form-control"
                                                value="<?php echo $valeur['montantmarche'] ?>" required />

                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">

                                            <label for="selectData">Delai d'execution:</label>
                                            <input type="number" name="delai" class="form-control"
                                                value="<?php echo $valeur['delaiexecution'] ?>" required />

                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">

                                            <label for="selectData">Nombre beneficiaires :</label>
                                            <input type="number" name="nombreben" class="form-control"
                                                value="<?php echo $valeur['nbrebeneficiaire'] ?>" required />

                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">

                                            <label for="selectData">Nombre infrastructures :</label>
                                            <input type="number" name="nombreinfra" class="form-control"
                                                value="<?php echo $valeur['nbreinfrastructure'] ?>" required />

                                        </div>
                                    </div>
                                <?php }  elseif ($valeur['etapeprojet'] == 2) { ?>
                                    <div class="form-row">
                                        <input type="hidden" value ="1" name ="etapeprojet[]"/>
                                        <div class="col-4 col-sm-4 col-md-4">
                                         
                                            <label for="selectData">Date d'étude du projet:</label>
                                            <input type="date" name="dateetude" class="form-control"
                                                value="<?php echo $valeur['date_etude'] ?>" required />

                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">

                                            <label for="selectData">Reference :</label>
                                            <input type="text" name="reference" class="form-control"
                                                value="<?php echo $valeur['referenceprojet'] ?>" required />

                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">

                                            <label for="selectData">Montant marche :</label>
                                            <input type="number" name="montantmarche" class="form-control"
                                                value="<?php echo $valeur['montantmarche'] ?>" required />

                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">

                                            <label for="selectData">Delai d'execution:</label>
                                            <input type="number" name="delai" class="form-control"
                                                value="<?php echo $valeur['delaiexecution'] ?>" required />

                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">

                                            <label for="selectData">Nombre beneficiaires :</label>
                                            <input type="number" name="nombreben" class="form-control"
                                                value="<?php echo $valeur['nbrebeneficiaire'] ?>" required />

                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">

                                            <label for="selectData">Nombre infrastructures :</label>
                                            <input type="number" name="nombreinfra" class="form-control"
                                                value="<?php echo $valeur['nbreinfrastructure'] ?>" required />

                                        </div>
                                    </div>
                                            <input type="hidden" value ="2" name ="etapeprojet[]"/>
                                            <div class="col-12 col-sm-12 col-md-12">
                                                <label for="selectData">Nom du partenaire :</label>
                                                <input type="text" name="nompartenaire" class="form-control"
                                                    value="<?php echo $valeur['partenairenom'] ?>" required />
                                            </div>
                                        <?php } ?>
                            </div>
                            <div class="container"><br />
                                <button type="button" class="btn btn-warning btn-block" id="btnLogin" onclick="validerModif()">
                                    Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/dataTables.checkboxes.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>plugins/jquery-ui/jquery-ui.css">

<script src="<?php echo home_base_url(); ?>js/dataTables.select.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo home_base_url(); ?>plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/reboisement.css">
<link rel="stylesheet" href="<?php echo home_base_url(); ?>dist/css/adminlte.min.css">