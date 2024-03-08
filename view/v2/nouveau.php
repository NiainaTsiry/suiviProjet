<?php
ob_start();
?>
<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="logo_section" style="padding: 10px;">
            <h2 class="" style="font-weight:bold;color:#fff;margin-top:5px;font-size:large;">NOUVEAU PROJETS</h2>
        </div>
    </nav>
</div>
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row" style ="padding-top:50px;height:400px">
        <div class="col-md-12" style ="height:400px">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <form action="<?php echo base_url(); ?>index.php/crud.php/nouveauProjet" method="post"
                            id="frmLogin">
                            <div class="form-row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <input type="hidden" value="<?php echo $regionCode ?>" name="regionCode" />
                                    <input type="hidden" value="<?php echo $districtCode ?>" name="districtCode" />
                                    <input type="hidden" value="<?php echo $communeCode ?>" name="communeCode" />
                                    <input type="hidden" value="<?php echo $secteurCode ?>" name="secteurCode" />
                                    <label for="selectData">Choisir le type du projet:</label>
                                    <select id="selectData" name="projet" class="form-control" required>
                                        <option value="1">Idée de projet</option>
                                        <option value="2">Etude de projet</option>
                                        <option value="3">Partenarisé</option>
                                    </select>
                                </div>
                            </div>
                            <div id="form"></div>
                            <div class="container"><br />
                                <button type="submit" class="btn btn-warning btn-block" id="btnLogin">
                                    Valider</button>
                            </div>
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

<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/dataTables.checkboxes.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>plugins/jquery-ui/jquery-ui.css">

<script src="<?php echo home_base_url(); ?>js/dataTables.select.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo home_base_url(); ?>plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo home_base_url(); ?>css/reboisement.css">
<link rel="stylesheet" href="<?php echo home_base_url(); ?>dist/css/adminlte.min.css">

</html>