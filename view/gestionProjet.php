
<?php
  ob_start();

?>


            <div class="col-12 col-md-12">
               <section>
                        <div class="row">
                            <div class="col-md-12" id='data-tab'>
                              

                                        <section class="content">
                                             <div class="card-body"  style="color:black;align-content: center;">

                                                           <div class="card-header">
                                                             <h5 class="card-title m-0"><strong>Liste des projets</strong></h5>
                                                           </div>
                                                           <div class="card-body" >
                                                             <table id="tabData" class="display" style="text-align: center;width:100%;font-weight:400">

                                                                
                                                             </table>
                                                           </div>

                                             </div>
                                       </section>
                                     
                                                             
                               
                            </div>

                            <div class="col-md-11" id='data-frm' style="display: none">
                                

                                        <section class="content">
                                             <div class="card-body"  style="color:black;align-content: center;">

                                                           <div class="card-header">
                                                             <h5 class="card-title m-0"><strong>Ajout/modification/suppression  projet</strong></h5>
                                                           </div>
                                                           <div class="card-body" >
                                                             <?php
                                                              echo $formulaire;
                                                            ?>
                                                          </br>
                                                          <div class="btn-group btn-group-sm mx-2" role="group" aria-label="Basic example">
                                                           <button class="btn btn-default" id="btn-save"><i class="bi bi-check2"></i> Enregistrer</button>
                                                           <button class="btn btn-default mx-2" id="btn-cancel"><i class="bi bi-x"></i>Annuler</button>
                                                           </div>

                                             </div>
                                       </section>
                                     
                                                             
                               
                            </div>

                        </div>
                </section>
        </div>
                  
    
    
     
 <?php
  $content = ob_get_clean();
  include 'baseLayoutWhitOutMenu.php';
?> 

<script>
  <?php
    $buttons=[ array('id'=>'Ajout',
                'libelle'=>'<i class="bi bi-pencil"> Ajout</i>',
                'selection'=>'N',
                'idTraitement'=>'Ajout',
                'action'=>'1'),                                          
                array('id'=>'Update',
                     'libelle'=>'<i class="bi bi-eraser"> Modification</i>',
                     'selection'=>'O',
                     'idTraitement'=>'Modification',
                     'action'=>'1'),
                array('id'=>'Suppression',
                  'libelle'=>'<i class="bi bi-trash3"> Suppression</i>',
                  'selection'=>'O',
                  'idTraitement'=>'Suppression',
                  'action'=>'1')]; 
  ?>

$(document).ready(function () {

var idTraitement="";
var url="<?php echo base_url() ?>";
var oldsValue="";
   $('#regioncode').change(function () {

     valueSelected =$(this).val();
     var sql="select a.district_id,a.district_libelle from district a, region b where a.region_id=b.region_id and b.region_id='"+valueSelected+"'";
      htmlDistrict="<select id='districtcode'>";
     $.ajax({
              url: url+'index.php/activite.php/getList',
              type:"POST",
               dataType: "json",
               data:{sql:sql},
               success: function(response) {  
                 
                      $.each(response, function(key, value) {
                              htmlDistrict=htmlDistrict+"<option value="+value['district_id']+">"+value['district_libelle']+"</option>";
                      });
              htmlDistrict=htmlDistrict+"</select>"; 
               $("#districtcode").html="";
              $("#districtcode").html(htmlDistrict);    
              }, 
               beforeSend: function() {
                                            },
               error :  function(e){
                 console.log(e);
              }      
                                       
    });
  });


$('#districtcode').change(function () {

     valueSelected =$(this).val();
     var sql="select a.commune_id,a.commune_libelle from commune a, district b where a.district_id=b.district_id and b.district_id='"+valueSelected+"'";
      htmlCommune="<select id='districtcode'>";
     $.ajax({
              url: url+'index.php/activite.php/getList',
              type:"POST",
               dataType: "json",
               data:{sql:sql},
               success: function(response) {  
                 
                      $.each(response, function(key, value) {
                              htmlCommune=htmlCommune+"<option value="+value['commune_id']+">"+value['commune_libelle']+"</option>";
                      });
              htmlCommune=htmlCommune+"</select>"; 
               $("#communecode").html="";
              $("#communecode").html(htmlCommune);     
                            }, 
               beforeSend: function() {
                                            },
               error :  function(e){
                console.log(e);
              }      
                                       
    });
  });


    function openDialogCRUD (selData){
         document.getElementById("frmAction").reset();
         $.each( selData, function( key, value ) {
          $("#"+key).val(value);
          });

          oldsValue =$("#frmAction").serialize();
          

           $("#data-frm").toggle();
          $("#data-tab").toggle(); 
    }

    function persistance(tableName,oldsValue){
            valSaisi =$("#frmAction").serialize();
            
            $.ajax({
                                              url:'https://meah.gov.mg/suiviProjet/index.php/gestionProjet.php/persistanceProjet',
                                              type:"POST",
                                              dataType: "html",
                                              data:{valSaisi:valSaisi,
                                                    tableName:tableName,
                                                    idTraitement:idTraitement,
                                                    oldsValue:oldsValue},
                                              success: function(response) { 
                                               //  $("#btn-cancel").click();
                                                 // location.reload();
                                                  console.log(response);
                                              
                                                 
                                              }, 
                                              beforeSend: function() {
                                               
                                                console.log(tableName);
                                                console.log(valSaisi);
                                                console.log(oldsValue);
                                                console.log('id:'+idTraitement);
                                            },
                                              error :  function(xhr, status, error){
                                                console.log(status);
                                               console.log(xhr.responseText);
                                        }      
              });
            
    }

    $("#btn-cancel").click(function(){
          $("#data-frm").toggle();
          $("#data-tab").toggle();        
          $("#data-tab").css('pointer-events','');
     }); 

     $("#btn-save").click(function(){
        persistance('projet',oldsValue);
     }); 

 var arrayCol = <?php echo json_encode($listChamps); ?>; 

 var cols =[];
  for (var i=0; i<arrayCol.length;i++){
    if (arrayCol[i].type!=="selectzzzz"){
      aCol ={};
               aCol.data=arrayCol[i].nom;
               aCol.title=arrayCol[i].libelle;
               cols.push(aCol);
    }
               
  }
 var dataSet=<?php echo json_encode($dataToload);?>;


$.fn.dataTable.ext.buttons.template = {
    
    action: function ( e, dt, node, config ) {

        el = $(this[0].node);
        idTraitement=el.attr('idTraitement');
        toDo=el.attr('href');
        var selectedData = dt.rows( { selected: true }).data()[0];
        if(selectedData === undefined){
            selectedData='';
        }

        openDialogCRUD(selectedData);
        }
};

 var btn=[];      

  var btn=[{
                    extend: 'template',
                    text: '1',
                },
                 {
                    extend: 'template',
                    text: '2',
                },
                {
                    extend: 'template',
                    text: '3',
                    titleAttr:''
                },
                {
                    extend: 'template',
                    text: '4',
                    titleAttr:''
                },
                 {
                    extend: 'template',
                    text: '5',
                    titleAttr:''
                },
                {
                    extend: 'template',
                    text: '6',
                    titleAttr:''
                },
            
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
                dom: 'lfBtrp',
                select: 'single',
                columns: cols,
                columnDefs: [
                              { width:  350, targets: 0 }
                          ],
                buttons: btn,
                language: lang,
                pageLength:5,
                scrollX: true, 
                fixedColumns: true,
                scrollCollapse: true,

                } );




var btns=<?php echo json_encode($buttons);?>; 

  for (var i = 0; i < 6; i++) {
    if (i<btns.length){
       tab.buttons(i).text(btns[i].libelle); 
       tab.button(i).nodes().attr('id',btns[i].id);
       tab.button(i).nodes().attr('idTraitement',btns[i].idTraitement);
       tab.button(i).nodes().attr('href',btns[i].action);
       var id="#"+btns[i].id;
       tab.button(i).nodes().css( 'margin-top', '10px' );
       if (btns[i].selection=='O'){
        tab.buttons( $(id) ).disable();
       }
    }else {
         tab.button(i).nodes().css( 'display', 'none' );
    }
    
  }   

  tab.on( 'select', function () {
            for (var i = 0; i < btns.length; i++) {
                var id="#"+btns[i].id;
                if (btns[i].selection=='O'){
                   tab.buttons( $(id) ).enable();
                }else{
                  tab.buttons( $(id) ).disable();
                }
            }
  });
    
    tab.on( 'deselect', function () {
               for (var i = 0; i < btns.length; i++) {
                 var id="#"+btns[i].id;
                if (btns[i].selection=='O'){
                         tab.buttons( $(id) ).disable();
                }else{
                  tab.buttons( $(id) ).enable();
                }
            }
            });    

});
     

   

</script> 

