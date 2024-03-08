<?php
  ob_start();
?>


<div class="container" style="background-color: #3C8DBC">
<div class="row"  >
  <div class="col-12 col-sm-12 col-md-12" style="margin-top:25px">
        <div class="card" >
            <div class="card-header bg-secondary">
              <h5 class="card-title m-0">
                <p class="text-left">
                    <strong>Liste projet</strong>
                </p></h5>
              </div>
            <div class="card-body">
             
                 <table id="tabData" class="display" style="width:100%"></table>
            </div>    
        </div> 
  </div>   
 
</div>
<div class="row">
       <div class="col-12 col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header bg-secondary">
              <h5 class="card-title m-0">
                <p class="text-left">
                    <strong>Fiche projet</strong>
                </p></h5>
              </div>
            <div class="card-body">
                   <?php echo $formulaire;?>
               </div>    
               
        </div>
      </div> 
   
</div>
<section>
</br>
    <div class="row">
       <div class="col-12 col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header bg-secondary">
              <h5 class="card-title m-0">
                <p class="text-left">
                    <strong>Suivi projet</strong>
                </p></h5>
              </div>
           
              <div class="card-body">
           <table id="tabDataAvtivite" class="display" style="width:100%"></table>
        </div>
        </div>
      </div> 
   
</div>
</section>

</div>
 <div id='loader'> <img src="<?php echo home_base_url();?>images/loading.gif" style="heigth:5%;width:5%;position: fixed;top: 50%; left: 50%; margin-top: -100px;  margin-left: -100px;clear:both"></div> 
<?php
  $content = ob_get_clean();
  include 'baseLayoutWhitOutMenu.php';
?> 

<script type="text/javascript">
 $("#loader").hide();
function createDataTable(idTab,lstChamps,dataToload){

  var arrayCol = lstChamps;   
  console.log(arrayCol);
  var dataSet=dataToload;
  var cols =[];
  for (var i=0; i<arrayCol.length;i++){
      aCol ={};
               aCol.data=arrayCol[i].nom;
               aCol.title=arrayCol[i].libelle;
               cols.push(aCol);               
  }

  $.fn.dataTable.ext.buttons.template = {
    
    action: function ( e, dt, node, config ) {

            el = $(this[0].node);
            idTraitement=el.attr('idTraitement');
            toDo=el.attr('href');



            var selectedData = dt.rows( { selected: true }).data()[0];

            if(selectedData === undefined){
                selectedData='';
            }

            remplirDetail(selectedData,idTraitement);

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

var tab=$("#"+idTab).DataTable( {
                aaData: dataSet, 
                dataType: 'json',
                dom: 'ftrpB',
                select: 'single',
                scrollX:true,
                columns: cols,
                buttons: btn,
                language: lang,
                pageLength:5
                } );
}


$(document).ready(function () {
  
  var url="<?php echo base_url() ?>";

    let listSuiviActivite = <?php echo json_encode($listSuiviActivite); ?>; 

    let dataToloadActivite = [];

    if ($(this).val()){
         valueSelected =$(this).val();
    }
    else{
        valueSelected=0;
    }

    
    let sql="select * from tableaudebord_pip where codeactivite='"+valueSelected+"'";
    
     $.ajax({
              url: url+'index.php/activite.php/getList',
              type:"POST",
               dataType: "json",
               data:{sql:sql},
               success: function(response) {  
                      dataToloadActivite=response;
                      createDataTable('tabDataAvtivite',listSuiviActivite,dataToloadActivite);
              }, 
               beforeSend: function() {
                                            },
               error :  function(e){
                console.log(e);
              }      
                                       
    });

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
 

  function persistance(tableName,valSaisi){
     $("#loader").show();
    idTraitement=$("#frmDialog").dialog("option", "idTratitement");
    oldsValue=$("#frmDialog").dialog("option", "oldsValue"); 
    config='projet.ini';
    $.ajax({
                                              url: url+'index.php/activite.php/persistance',
                                              type:"POST",
                                              dataType: "html",
                                              data:{valSaisi:valSaisi,tableName:tableName,idTraitement:idTraitement,oldsValue:oldsValue,config:config},
                                              success: function(response) { 
                                                 $("#loader").hide();
                                                console.log(response);        
                                              }, 
                                              beforeSend: function() {
                                            },
                                              error :  function(e){
                                                 $("#loader").hide();
                                                 console.log(e);
                                        }      
                                       });
  }
  var tableName='<?php echo $table ?>';
  $( "#frmDialog" ).dialog({
                                     autoOpen: false,
                                     modal: true,
                                     width: "100%",
                                     maxWidth: "100px",
                                     autoResize:true,
                                     overflow:'scroll',
                                     idTratitement: '',
                                     oldsValue: '',
                                     title: 'Formulaire saisie',
                                      buttons: {
                                      "Enregistrer": function() {
                                        var valSaisi =$("#frmAction").serialize();
                                        idTraitement=$( this ).dialog("option", "idTratitement");
                                        persistance(tableName,valSaisi);
                                        //$( this ).dialog( "close" );
                                         //location.reload(true);
                                      },
                                      Cancel: function() {
                                        $( this ).dialog( "close" );
                                      }
                                    },
                                    close: function() {
                                      $( this ).dialog( "close" );
                                    }
                           });

  function remplirDetail (selData,idTraitement,oldsValue){

   

  document.getElementById("frmAction").reset();

  $.each( selData, function( key, value ) {
  $val = value;
  if (typeof $val ==='string'){
     $val = $val.replace(/ /g,"");
  }
 
  $("#"+key).val($val); 
 });
}

// createDataTable
 var arrayCol = <?php echo json_encode($listChamps); ?>; 

 var cols =[];
  for (var i=0; i<arrayCol.length;i++){
    if (arrayCol[i].type!=="select"){
      aCol ={};
               aCol.data=arrayCol[i].nom;
               aCol.title=arrayCol[i].libelle;
               cols.push(aCol);
    }
               
  }
  
var dataSet=<?php echo json_encode($dataToload);?>;
var codeActiviteVal=""


$.fn.dataTable.ext.buttons.template = {
    
    action: function ( e, dt, node, config ) {
         $("#loader").show();
        el = $(this[0].node);
        idTraitement=el.attr('idTraitement');
        toDo=el.attr('href');
        var selectedData = dt.rows( { selected: true }).data()[0];
        codeActiviteVal=selectedData['codeactivite'];

        if(selectedData === undefined){
            selectedData='';
        }

        remplirDetail(selectedData,idTraitement);
         $("#loader").hide();
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


var url="<?php echo base_url() ?>";

var tab=$('#tabData').DataTable( {
                aaData: dataSet, 
                dataType: 'json',
                dom: 'ftrpB',
                select: 'single',
                scrollX:true,
                columns: cols,
                buttons: btn,
                language: lang,
                pageLength:5
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
         $("#loader").show();
        selectedData =tab.rows( { selected: true }).data()[0];

          

        codeActiviteVal=selectedData['codeprojet'];
       
        let listSuiviActivite = <?php echo json_encode($listSuiviActivite); ?>; 
        let dataToloadActivite = [];
        let sql="select a.*,b.* from projet a LEFT JOIN suivi_activite b ON a.codeprojet = b.codeprojet where a.codeprojet="+codeActiviteVal;

    
         
        $.ajax({
              url: url+'index.php/activite.php/getList',
              type:"POST",
               dataType: "json",
               data:{sql:sql},
               success: function(response) {  

                      remplirDetail(response[0],'idTraitement'); 
                 
                      dataToloadActivite=response;
                      $('#tabDataAvtivite').DataTable().clear().destroy();
                      createDataTable('tabDataAvtivite',listSuiviActivite,dataToloadActivite);
                   $("#loader").hide();
              }, 
               beforeSend: function() {
                                            },
               error :  function(e){
                console.log(e);
              }    

                                       
    });

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
  
   /* var projetid="<?php echo $projetid ?>";

    if (projetid){
    
    var column_index = 0;
    tab.columns().search().draw();
    tab.columns(column_index).search(projetid).draw();
  
    }*/

});
     

function createDataTable(idTab,lstChamps,dataToload){

  var arrayCol = lstChamps;   
  var dataSet=dataToload;
  var cols =[];
  for (var i=0; i<arrayCol.length;i++){
      aCol ={};
               aCol.data=arrayCol[i].nom;
               aCol.title=arrayCol[i].libelle;
               cols.push(aCol);               
  }

  $.fn.dataTable.ext.buttons.template = {
    
    action: function ( e, dt, node, config ) {

            el = $(this[0].node);
            idTraitement=el.attr('idTraitement');
            toDo=el.attr('href');

            var selectedData = dt.rows( { selected: true }).data()[0];

            if(selectedData === undefined){
                selectedData='';
            }

            remplirDetail(selectedData,idTraitement);
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

var tab=$("#"+idTab).DataTable( {
                aaData: dataSet, 
                dataType: 'json',
                dom: 'ftrpB',
                select: 'single',
                scrollX:true,
                columns: cols,
                buttons: btn,
                language: lang,
                pageLength:5
                } );
}
   

</script>

