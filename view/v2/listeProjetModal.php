<style>
    .table-responsive-sm {
    height: 400px; /* Hauteur maximale pour le contenu de la table */
    overflow-y: auto; /* Ajouter une barre de défilement verticale si nécessaire */
}

.table-responsive-sm thead th {
    position: sticky; /* Fixer les cellules de l'en-tête lors du défilement */
    top: 0; /* Positionner l'en-tête en haut de la table */
    z-index: 1; /* Assurer que l'en-tête reste au-dessus du contenu défilant */
    background-color: #fff; /* Arrière-plan de l'en-tête pour le distinguer du reste du contenu */
}
</style>
    <!-- Modal Header -->
    <div class="modal-header" style="">
        <h4 class="modal-title" style="font-weight: bold;font-size:small;">
                    REGION : <span style="color:gray;"><?php echo strtoupper($detRegion[0]['region_libelle']); ?></span>
                    &nbsp;&nbsp;&nbsp;
                    DISTRICT : <span style="color:gray;"><?php echo strtoupper($detDistrict[0]['district_libelle']); ?></span></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
    </div>
    <div class="full padding_infor_info">
        <div class="table-responsive-sm">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th style="width: 3%">Code</th>
                        <th style="width: 30%">Libelle</th>
                        <th>secteur</th>
                        <th style="width: 10%">Type</th>
                        <th>Date</th>
                        <th>commune</th>
                        <th style="width: 7%"></th>
                    </tr>
                </thead>
                <tbody style="" style="height:200px;">
                    <?php foreach ($liste as $key => $value) { ?>
                        <tr>
                            <td>
                                <?php echo $value['codeprojet'] ?>
                            </td>
                            <td><?php echo $value['libelleprojet'] ?></td>
                            <td><?php echo $value['secteur_libelle'] ?></td>
                            <td><?php echo $value['type_projet'] ?></td>
                            <td><?php echo $value['date_eval_projet'] ?></td>
                            <td><?php echo $value['commune_libelle_v'] ?></td>
                            <td> <button type="button" class="btn btn-primary" onclick="details(<?php echo $value['codeprojet'] ?>)">
                                    details
                                </button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    
    <script>
        /*var xhttp = null;
    function details(code) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("myModallis").innerHTML =
                    this.responseText;
                   $('#myModallis').modal('show');
            }
        };
        xhttp.open("GET", "<?php echo base_url() ?>index.php/suiviProjet.php/details?code="+code, true);
        xhttp.send();
    }*/
    </script>