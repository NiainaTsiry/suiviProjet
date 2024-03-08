<div class="container mt-3">
    <table class="table table-hover" style="background-color: #fff;">
        <thead style="background-color: #737573;color:#fff;">
            <tr>
                <th>Secteur</th>
                <th>Code</th>
                <th>Libelle</th>
                <th>Type</th>
                <th>Date</th>
                <th>Region</th>
                <th>District</th>
                <th>Commune</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php foreach ($liste as $key => $value) { ?>
                <tr>
                    <td><?php echo $value['secteur_libelle'] ?></td>
                    <td><?php echo $value['codeprojet'] ?></td>
                    <td><?php echo $value['libelleprojet'] ?></td>
                    <td><?php echo $value['type_projet'] ?></td>
                    <td><?php echo $value['date_eval_projet'] ?></td>
                    <td><?php echo $value['region_libelle_v'] ?></td>
                    <td><?php echo $value['district_libelle_v'] ?></td>
                    <td><?php echo $value['commune_libelle_v'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="container">
    <ul class="pagination justify-content-center">
        <?php if (($num - 1) == 0) { ?>
            <li class="page-item disabled">
            <?php } else { ?>
            <li class="page-item">
            <?php } ?>
            <a class="page-link" href="<?php echo base_url() ?>index.php/suiviProjet.php/liste_projet?num=<?php echo ($num - 1) ?><?php echo $urlpage ?>" tabindex="-1">Precedent</a>
            </li>
            <?php if (count($liste) == 0) { ?>
                <li class="page-item disabled">
                <?php } else { ?>
                <li class="page-item">
                <?php } ?>
                <a class="page-link" href="<?php echo base_url() ?>index.php/suiviProjet.php/liste_projet?num=<?php echo ($num + 1) ?><?php echo $urlpage ?>">Suivant</a>
                </li>
    </ul>
</div>