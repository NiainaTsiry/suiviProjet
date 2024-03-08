<?php
ob_start();

?>

<body>
    <div class="container" style="background-color: #3C8DBC">
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-12 " style="margin-top: 20px;">

                <div class="card">

                    <div class="card-header border-0  bg-secondary">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Details du partenaire </h4>
                            <div class="card-tools">
                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                        <form action="<?php echo base_url(); ?>index.php/crud.php/PartenaireValid" method="post"
                            id="frmLogin">
                            <div class="form-row">
                            <div class="col-6 col-sm-6 col-md-6">
                                <input type="hidden" class='form-control' value="<?php echo $projet['codeprojet'] ?>" name="idProjet"/>
                                    <input type="hidden" class='form-control' value="<?php echo $projet['regioncode'] ?>" name="regionCode"/>
                                    <input type="hidden" class='form-control' value="<?php echo $projet['districtcode'] ?>" name="districtCode"/>
                                    <input type="hidden" class='form-control' value="<?php echo $projet['communecode'] ?>" name="communeCode"/>
                                    <input type="hidden" class='form-control' value="<?php echo $projet['codesecteur'] ?>" name="secteurCode"/>
                                    <label for="selectData">Secteur:</label>
                                    <?php
                                    echo "<input value=\"$secteurName\" class='form-control' name='secteur' readonly>";
                                    ?>

                                </div>

                                <div class="col-6 col-sm-6 col-md-6">

                                    <label for="selectData">Date d'idée du projet:</label>
                                    <?php
                                    echo "<input value=\"$projet[date_idee]\" class='form-control' name='date' readonly>";
                                    ?>

                                </div>

                                <div class="col-12 col-sm-12 col-md-12">

                                    <label for="selectData">Libelle:</label>
                                    <input id="libelle" style="width : 960px; height : 80px;" name="libelle"
                                        rows="3" cols="50" class="form-control" value="<?php echo $projet['libelleprojet'] ?>" readonly/>

                                </div>

                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Region:</label>
                                    <?php
                                    echo "<input value=\"$regionName\" class='form-control' name ='region' readonly>";
                                    ?>

                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">District:</label>
                                    <?php
                                    echo "<input value=\"$districtName\" class='form-control' name = 'district' readonly>";
                                    ?>

                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Commune:</label>
                                    <?php
                                    echo "<input value=\"$communeName\" class='form-control' name = 'commune' readonly>";
                                    ?>

                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Description:</label>
                                    <input id="description" style="width : 960px; height : 80px;" name="description"
                                        rows="3" cols="50" class="form-control" value="<?php echo $projet['decription'] ?>"
                                        readonly />

                                </div>
                                <div class="form-row">
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Date d'étude du projet:</label>
                                    <input type="date" name="dateetude" class="form-control" value="<?php echo $projet['date_etude'] ?>" readonly/>

                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Reference :</label>
                                    <input type="text" name="reference" class="form-control" value="<?php echo $projet['referenceprojet'] ?>" readonly/>

                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Montant marche :</label>
                                    <input type="number" name="montant" class="form-control" value="<?php echo $projet['montantmarche'] ?>" readonly/>

                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Delai d'execution:</label>
                                    <input type="number" name="delai" class="form-control" value="<?php echo $projet['delaiexecution'] ?>" readonly/>

                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Nombre beneficiaires :</label>
                                    <input type="number" name="beneficiaire" class="form-control" value="<?php echo $projet['nbrebeneficiaire'] ?>" readonly/>

                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Nombre infrastructures :</label>
                                    <input type="number" name="infra" class="form-control" value="<?php echo $projet['nbreinfrastructure'] ?>" readonly/>

                                </div>

                                <div class="col-6 col-sm-6 col-md-6">
                                    <label for="selectData">Nom du partenaire :</label>
                                    <input type="text" name="partenaire" class="form-control"  value="<?php echo $projet['partenairenom'] ?>" id = "myInputPartenaire" readonly/>

                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    <label for="selectData">Date de validation(OS) :</label>
                                    <input type="text" name="dateval" class="form-control" value="<?php echo $dateOs ?>"  id = "myInputDateos" readonly/>

                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    <label for="selectData">Annee d'engagement :</label>
                                    <input type="number" name="engagement" class="form-control" value="<?php echo $projet['anneeengagementcp'] ?>" id = "myInputAnneeEng" readonly/>

                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    <label for="selectData">Type de financement:</label>
                                    <input type="text" name="financement" class="form-control" value="<?php echo $financementName ?>" id = "myInputFinancement" readonly/>
                                </div>
                            </div>
                                <div class="container"><br />
                                    <button type="submit" class="btn btn-warning btn-block" id="btnvalid" hidden='true'>
                                        Valider</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-12 col-sm-12 col-md-12" id='mod' ><br />
                                    <button onclick="enableInput()" class="btn btn-info btn-block">
                                        Modifier</button>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<?php
$content = ob_get_clean();
include $_SERVER['DOCUMENT_ROOT'] . '/suiviProjet/view/baseLayoutWhitOutMenu.php';
?>
<script>
      //alert("Projet terminé avec succès !");
      function enableInput() {
            document.getElementById('myInputPartenaire').readOnly = false;
            document.getElementById('myInputDateos').readOnly = false;
            document.getElementById('myInputDateos').type = 'date';
            document.getElementById('myInputDateos').value = '';
            document.getElementById('myInputAnneeEng').readOnly = false;
            document.getElementById('btnvalid').hidden = false;
            var currentInput = document.getElementById("myInputFinancement");
            var selectElement = document.createElement("select");
            selectElement.id = "financement";
            selectElement.name = "financement";
            selectElement.className = "form-control";
            var reponse = <?php echo json_encode($financement);?>;
            console.log(reponse);
            for (var i = 0; i < reponse.length; i++) {
                var option = document.createElement("option");
                option.value = reponse[i].financementlibelle;
                option.text = reponse[i].financementlibelle;
                selectElement.appendChild(option);
            }

            currentInput.parentNode.replaceChild(selectElement, currentInput);
        }
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

<!-- ChartJS -->
<script src="<?php echo home_base_url(); ?>plugins/chart.js/Chart.min.js"></script>

<link rel="stylesheet" href="<?php echo home_base_url(); ?>dist/css/adminlte.min.css">

