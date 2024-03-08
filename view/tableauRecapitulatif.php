
<?php
  ob_start();

 ?>

<body>
     <div class="container" style="background-color: #3C8DBC">
        <div class="row "  >
            <div class="col-12 col-sm-12 col-md-12 " style="margin-top: 20px;">
                
                      <div class="card" >
                
                              <div class="card-header border-0  bg-secondary">
                                <div class="d-flex justify-content-between">
                                  <h4 class="card-title">Filtre </h4>
                                      <div class="card-tools">
                                       <a href="#" onclick="initializeFilter()"><span style="color:#fff">Réinitialiser tous les filtres</span></a>
                                </div>
                                </div>
                              </div>

             
              <div class="card-body">

                
                 <div class="form-row">
                  
                     <div class="col-2 col-sm-2 col-md-2">
                     
                     
                     <select id='searchByYear' class="form-control form-control-sm">
                       <option value=''> Période du </option>
                       <?php  
                            foreach ($periodeDonnees as $row):
                             echo '<option value="'.$row["anneeengagementcp"].'">'. $row["anneeengagementcp"].'</option>';
                            endforeach;
                            
                      ?>
                     
                     </select>
                        
                   </div>
                   <div class="col-2 col-sm-2 col-md-2">
                     
                     
                     <select id='searchByYearFin' class="form-control form-control-sm">
                       <option value=''> au  </option>
                       <?php  
                            foreach ($periodeDonnees as $row):
                             echo '<option value="'.$row["anneeengagementcp"].'">'. $row["anneeengagementcp"].'</option>';
                            endforeach;
                            
                      ?>
                     
                     </select>
                        
                   </div>

                     <div class="col-2 col-sm-2 col-md-2">
                     
                     <select id='region' class="form-control form-control-sm">
                        <option value=''> Région </option>
                         <?php for ($i=0; $i < count($lstRegion); $i++) { ?>
                        <option value=<?php echo json_encode($lstRegion[$i]['region_id']) ?>><?php echo ($lstRegion[$i]['region_libelle']) ?> </option>
                         <?php }  ?>
                     </select>
                        
                     </div>

                    <div class="col-2 col-sm-2 col-md-2">
                     
                     <select id='appreciationProjet' class="form-control form-control-sm">
                        <option value=''> Appréciation </option>
                       	<?php if (isset($_SESSION['isConnected'])){ ?> 
                          <option value='Achevé'> Achevé </option>
                          <option value='Progrès satisfaisant'> Progrès satisfaisant </option>
                          <option value='Pas de progrès/Obstacles majeurs'> Pas de progrès/Obstacles majeurs </option>
                          <option value='Projet lent'> Projet lent </option>
                     	<?php } ?>
                     </select>
                        
                     </div>
                     <div class="col-4 col-sm-4 col-md-4">
                    
                    <button type="button" class="btn btn-block btn-success btn-sm" id="afficher">Afficher</button>

                     </div>
                     
                 
              </div>
          
          </div>   
              </div>
          
        </div>
    </div>
    <div class="row">
            <div class="col-auto col-sm col-md">

               

                <div class="col-12">
                    
                              <div class="card">
            
              <div class="card-body" id='data-container' style="color:black;align-content: center;">
              
                            <div class="card-header bg-secondary">
                              <h5 class="card-title m-0"><?php echo ucfirst($table); ?></h5>
                            </div>
                            <div class="card-body" >
                              <table id="tabData" class="display" style="width:100%">
                                <thead>
                                 
                                </thead>
                                <tbody style="text-align: right;"></tbody>
                                <tfoot style="background-color:#e6e6e6;text-align: right;font-weight:bold" id="footer">
                                  
                                </tfoot>
                              </table>
                            </div>
                        

                  


              </div>
           
                </div>
                </div>
                

            </div>

        </div>
      </div>
        
</body>

<?php
  $content = ob_get_clean();
  include 'baseLayoutWhitOutMenu.php';
?>


<script src="<?php echo home_base_url();?>plugins/jquery/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo home_base_url();?>js/jquery.dataTables.min.js" type="text/javascript"></script> 
<script src="<?php echo home_base_url();?>js/dataTables.buttons.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo home_base_url();?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo home_base_url();?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/jquery-ui/jquery-ui.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/dataTables.checkboxes.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>plugins/jquery-ui/jquery-ui.css">

<script src="<?php echo home_base_url();?>js/dataTables.select.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo home_base_url();?>plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/reboisement.css">


<!-- Bootstrap 4 -->
<script src="<?php echo home_base_url();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo home_base_url();?>dist/js/adminlte.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo home_base_url();?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- ChartJS -->
<script src="<?php echo home_base_url();?>plugins/chart.js/Chart.min.js"></script>

 <link rel="stylesheet" href="<?php echo home_base_url();?>dist/css/adminlte.min.css">

<script type="text/javascript">
var libelle_region = '';
var id_region = '';
var sess="<?php echo $_SESSION['isConnected']; ?>";

 var arrayCol = <?php echo json_encode($listChamps); ?>; 

 var cols =[];
  for (var i=0; i<arrayCol.length;i++){
    if (arrayCol[i].type !=='select'){
      
      aCol ={};
               aCol.data=arrayCol[i].nom;
               aCol.title=arrayCol[i].libelle;
               cols.push(aCol);
    }
               
  }
  if(sess){
      var dataSet=<?php echo json_encode($dataToload); ?>;
    }else{
        var dataSet=<?php echo json_encode($dataToloadNoUser); ?>;
    }
 var btn=[];      

  var btn=[
                {extend: 'excelHtml5',
                 filename: function(){
                          var d = new Date();
                          var t = "Export";
                          var n = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear();
                          return t + '-' + n;
                                          },
                  text: '<i class="fas fa-file-excel">Export excel</i>'

                }                
              ];

    var lang= {
                             processing:     "Traitement en cours...",
                             search:         "Rechercher&nbsp;:",
                             lengthMenu:     "Afficher _MENU_ &eacute;l&eacute;ments",
                             info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                             infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                             infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                             infoPostFix:    "",
                             loadingRecords: "Chargement en cours...",
                             zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                             emptyTable:     "Aucune donnée disponible dans le tableau",
                             paginate: {
                                 first:      "Premier",
                                 previous:   "Pr&eacute;c&eacute;dent",
                                 next:       "Suivant",
                                 last:       "Dernier"
                             },
                             "select": {
                             "rows": {
                                 "_": ".   %d lignes sélectionnées",
                                 "0": ".   Aucune ligne sélectionnée",
                                 "1": ".   1 ligne sélectionnée"
                             } 
                             },
                             aria: {
                                 sortAscending:  ": activer pour trier la colonne par ordre croissant",
                                 sortDescending: ": activer pour trier la colonne par ordre décroissant"
                             }
                         };



var tab=$('#tabData').DataTable( {
                aaData: dataSet, 
                dataType: 'json',
                dom: 'iftrpB',
                select: 'single',
                scrollX:true,
                columns: cols,
                buttons: btn,
                language: lang,
                pageLength:5,
               
                } );




var btns=[];



$('#afficher').click(function(){
     
       

        dateDebut=$("#searchByYear").val();
        dateFin=$("#searchByYearFin").val();
        appreciationProjet=$("#appreciationProjet").val();
        region = $("#region").val();
        
        updateTable(dateDebut,dateFin,appreciationProjet,region);
       


  });




   function updateTable(dateDebut,dateFin,appreciationProjet,region) {
   
    var baseUrl="<?php echo base_url();?>";

    var action = baseUrl+"index.php/activite.php/getDataToLoadWithFilter.php";
   
                   var $this = $(this);
                                                    
                            $.ajax({
                               url: action,
                               type:"POST",
                               dataType: "html",
                               data:{dateDebut:dateDebut,dateFin:dateFin,appreciationProjet:appreciationProjet,region:region},
                               success: function(response,e) {
                                  
                                  console.log(response);
                                   $("#data-container").empty().append(response);

                                   e.preventDefault;
                                  
                                    
                               },
                               error :  function(e){
                               
                                  console.log(e);
                               }
                          });
 
}
 


  function initializeFilter(){

   $("option:selected").prop("selected", false);
    
        dateDebut=$("#searchByYear").val();
        appreciationProjet=$("#appreciationProjet").val();
        region = $("#region").val();

        updateTable(dateDebut,appreciationProjet,region);
  }
  


</script>
