<?php
  ob_start();
    ?>

<!DOCTYPE html>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="modal-title">Système d'infomation Reboi<b>sement</b></h5>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="<?php echo home_base_url();?>images/reboisement.jpg" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="<?php echo home_base_url();?>images/reboisement1.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="<?php echo home_base_url();?>images/reboisement2.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="<?php echo home_base_url();?>images/reboisement3.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="<?php echo home_base_url();?>images/reboisement4.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="<?php echo home_base_url();?>images/reboisement5.jpg" alt="Product Image"></div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h4 class="my-3">L'application</h>
              <h6 align="justify">Pour appuyer le  processus de reboisement à l’échelle, et de restauration des paysages et des forêts. et afin d’atteindre les objectifs fixés de reverdir Madagascar ou « Madagasikara rakotr’ala », des cadres nationaux et documents techniques afférents ont été élaborés. L’initiative du Pays est de mettre en place au moins 150 000 ha/an de surfaces reboisées viables et utiles ; mais également de promouvoir les actions de restauration des paysages et des forêts avec un rythme annuel
               de 200 000 ha pour atteindre l’objectif de 4 millions d’hectare. A cet effet, cette application de suivi,d'aide à la décision et d'échanges d’informations sur les activités de reboisement et de restauration des paysages forestiers à Madagascar a été developpée.
             </h6>
            <h4 class="my-3">Ses objectifs</h>
            <h6 align="justify">
                - Améliorer le processus de suivi et l’interconnexion entre différents acteurs à ravers des systèmes d'informations et systèmes d’échanges afin d’augmente la réactivité, la dynamique et la performance individuelle et organisationnelle des acteurs et des réseaux <br>
                - Permettre non seulement à l’administration forestière mais aussi à l’ensemble des acteurs gouvernementaux et non 
                gouvernementaux d’avoir des informations, des outils de suivi, de planification et de décision à tous les niveaux
              </h6>
            </div>
          </div>
          <div class="row mt-4">

           
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <div class="mt-4 product-share">
                <a href="#" class="text-primary">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-primary">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->


<select id="example-getting-started" multiple="multiple" class="form-control selectpicker" title="Choose...">
    <option value="cheese">Cheese</option>
    <option value="tomatoes">Tomatoes</option>
    <option value="mozarella">Mozzarella</option>
    <option value="mushrooms">Mushrooms</option>
    <option value="pepperoni">Pepperoni</option>
    <option value="onions">Onions</option>
</select>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect({
            nonSelectedText: 'Colonne à afficher',
            enableFiltering: true,
            includeSelectAllOption: true,
            selectAllValue: 0,
            selectAllText: 'Selectionner tout',
            onChange: function() {
              console.log($('#example-getting-started').val());
            }
        });;
    });
</script>

<?php
  include 'login.php';
  $content = ob_get_clean();
  include 'baseLayout.php'; 
?>

