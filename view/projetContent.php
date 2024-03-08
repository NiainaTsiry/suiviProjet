


  <table id="tabData" class="display" style="width:100%"></table>



<script>



$(document).ready(function () {

  //$.noConflict();
 
  var url="<?php echo base_url() ?>";

function remplirDetail (selData,idTraitement,oldsValue){
  document.getElementById("frmAction").reset();
 $.each( selData, function( key, value ) {
  $("#"+key).val(value); 
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

        el = $(this[0].node);
        idTraitement=el.attr('idTraitement');
        toDo=el.attr('href');
        var selectedData = dt.rows( { selected: true }).data()[0];
        codeActiviteVal=selectedData['codeactivite'];

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

        selectedData =tab.rows( { selected: true }).data()[0];
        codeActiviteVal=selectedData['codeactivite'];
        let listSuiviActivite = <?php echo json_encode($listSuiviActivite); ?>; 
        let dataToloadActivite = [];
        let sql="select * from tableaudebord_pip where codeactivite='"+codeActiviteVal+"'";
        $.ajax({
              url: url+'index.php/activite.php/getList',
              type:"POST",
               dataType: "json",
               data:{sql:sql},
               success: function(response) {  
                      remplirDetail(selectedData,'idTraitement');  
                      dataToloadActivite=response;
                      $('#tabDataAvtivite').DataTable().clear().destroy();
                      createDataTable('tabDataAvtivite',listSuiviActivite,dataToloadActivite);
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



