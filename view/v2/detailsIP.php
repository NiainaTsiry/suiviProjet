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
                            <h4 class="card-title">Details Idée Projet </h4>
                            <div class="card-tools">
                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                        <form action="<?php echo base_url(); ?>index.php/crud.php/Nouveauetude" method="post"
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
                                    echo "<input value=\"$projet[date_idee]\" class='form-control' name='date' id='myInputDate' readonly>";
                                    ?>

                                </div>

                                <div class="col-12 col-sm-12 col-md-12">

                                    <label for="selectData">Libelle:</label>
                                    <input id="myInputLibelle" style="width : 960px; height : 80px;" name="libelle"
                                        rows="3" cols="50" class="form-control" value="<?php echo $projet['libelleprojet']  ?>" readonly/>
                                </div>

                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Region:</label>
                                    <?php
                                    echo "<input value=\"$regionName\" class='form-control' name ='regionName' readonly>";
                                    ?>

                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">District:</label>
                                    <?php
                                    echo "<input value=\"$districtName\" class='form-control' name = 'districtName'  readonly>";
                                    ?>

                                </div>
                                <div class="col-4 col-sm-4 col-md-4">

                                    <label for="selectData">Commune:</label>
                                    <?php
                                    echo "<input value=\"$communeName\" class='form-control' name = 'communeName'  readonly>";
                                    ?>

                                </div>
                                <div class="col-12 col-sm-12 col-md-12">

                                    <label for="selectData">Description:</label>
                                    <input id="myInputDesc" style="width : 960px; height : 80px;" name="description"
                                        rows="3" cols="50" class="form-control" value="<?php echo $projet['decription'] ?>"
                                        readonly />

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-sm-12 col-md-12"><br />
                                    <button type="submit" class="btn btn-warning btn-block" id="btnLogin">
                                        Nouveau Etude</button>

                                </div>
                            </div>
                        </form>
                        <div class="col-12 col-sm-12 col-md-12"><br />
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

<script type="text/javascript">
        function enableInput() {
            document.getElementById('myInputLibelle').readOnly = false;
            document.getElementById('myInputDesc').readOnly = false;
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