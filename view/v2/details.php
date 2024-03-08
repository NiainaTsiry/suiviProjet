<div class="modal-dialog modal-lg">
    <div class="modal-content" style="width:100%;">
        <!-- Modal Header -->
        <div class="modal-header" style="background-color:<?php echo $value['couleur'] ?>;">
            <h4 class="modal-title" style="font-weight: bold;color:#fff;"><?php echo $value['secteur_libelle'] ?></h4>
            <h4 class="modal-title" style="font-weight: bold;color:#fff;font-size:medium;"><?php echo $value['type_projet'] ?></h4>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <div class="full">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="full dis_flex center_text">
                            <div class="profile_contant">
                                <div class="contact_inner">
                                    <h5><?php echo $value['libelleprojet'] ?></h5>
                                    <p><strong>description : </strong><?php echo $value['decription'] ?></p>
                                    <ul class="list-unstyled">
                                        <li><strong>Region : </strong><?php echo $value['region_libelle_v'] ?></li>
                                        <li><strong>District : </strong><?php echo $value['district_libelle_v'] ?></li>
                                        <li><strong>Commune : </strong><?php echo $value['commune_libelle_v'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Etude/Partenaire-->
                        <div class="row column4 graph container-fluid">
                            <!--Etude-->
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Etude Projet</h2>
                                        </div>
                                    </div>
                                    <div class="full progress_bar_inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="msg_section">
                                                    <div class="msg_list_main">
                                                        <ul class="msg_list">
                                                            <?php if ($value['etapeprojet'] == '0') { ?>
                                                                <li>
                                                                <button type="button" class="btn cur-p btn-warning" onclick="updateEtude(<?php echo $value['codeprojet'] ?>)">Rattacher une etude</button>
                                                                </li>
                                                            <?php } else { ?>
                                                                <li style="padding: 10px;">
                                                                    <span style="color: gray;">
                                                                        <span><strong>Date : </strong><?php echo $value['date_etude'] ?></span>
                                                                    </span>
                                                                </li>
                                                                <li style="padding: 10px;">
                                                                    <span style="color: gray;">
                                                                        <span><strong>Ref : </strong><?php echo $value['referenceprojet'] ?></span>
                                                                    </span>
                                                                </li>
                                                                <li style="padding: 10px;">
                                                                    <span style="color: gray;">
                                                                        <span><strong>Montant : </strong><?php echo $value['montantmarche'] ?> Ariary <i class="fa fa-money" style="color:green;"></i></span>
                                                                    </span>
                                                                </li>
                                                                <li style="padding: 10px;">
                                                                    <span style="color: gray;">
                                                                        <span><strong>Delai d'éxecution : </strong><?php echo $value['delaiexecution'] ?> jours</span>
                                                                    </span>
                                                                </li>
                                                                <li style="padding: 10px;">
                                                                    <span style="color: gray;">
                                                                        <span><strong>Nombre de béneficiaire: </strong><?php echo $value['nbrebeneficiaire'] ?></span>
                                                                    </span>
                                                                </li>
                                                                <li style="padding: 10px;">
                                                                    <span style="color: gray;">
                                                                        <span><strong>Nombre d'infrastructure : </strong><?php echo $value['nbreinfrastructure'] ?></span>
                                                                    </span>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---Partenaire--->
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Partenaire</h2>
                                        </div>
                                    </div>
                                    <div class="full progress_bar_inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="msg_section">
                                                    <div class="msg_list_main">
                                                        <ul class="msg_list">
                                                            <?php if ($value['etapeprojet'] == '1') { ?>
                                                                <li>
                                                                    <button type="button" class="btn cur-p btn-warning" onclick="updateAlignement(<?php echo $value['codeprojet'] ?>)">Alignement Partenaire</button>
                                                                </li>
                                                            <?php } elseif ($value['etapeprojet'] == '2') { ?>
                                                                <li style="padding: 10px;">
                                                                    <span style="color: gray;">
                                                                        <span><strong><?php echo $value['partenairenom'] ?></strong></span>
                                                                    </span>
                                                                </li>
                                                                <li style="padding: 10px;">
                                                                    <span style="color: gray;">
                                                                        <span><strong>Date : </strong> <?php echo $value['date_partenaire'] ?></span>
                                                                    </span>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End--Etude/Partenaire-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" onclick="modification('<?php echo base_url(); ?>',<?php echo $value['codeprojet'] ?>)">Modifier</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
<!---MODAL ALGNEMENT ---->
<div class="modal" id="alignePartenaire">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color:dimgray;">
                <h4 class="modal-title" style="color:#fff;">Alignement Partenaire</h4>
                </div>
            <!-- Modal body -->
            <div class="modal-body" id="content-parte">

            </div>
            <!-- Modal footer -->
            <div class="modal-footer" style="background-color:dimgray;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">annuler</button>
            </div>
        </div>
    </div>
</div>
<!---FIN MODAL ALGNEMENT ---->

<!---MODAL ETUDE ---->
<div class="modal" id="aligneEtude">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color:dimgray;">
                <h4 class="modal-title" style="color:#fff;">Rattachement Etude</h4>
                </div>
            <!-- Modal body -->
            <div class="modal-body" id="content-etude">

            </div>
            <!-- Modal footer -->
            <div class="modal-footer" style="background-color:dimgray;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">annuler</button>
            </div>
        </div>
    </div>
</div>
<!---FIN MODAL etude ---->

<div class="modal" id="modification">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color:dimgray;">
                <h4 class="modal-title" style="color:#fff;">Modification</h4>
                </div>
            <!-- Modal body -->
            <div class="modal-body" id="content-modif">
                
            </div>
            <!-- Modal footer -->
            <div class="modal-footer" style="background-color:dimgray;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">annuler</button>
            </div>
        </div>
    </div>
</div>