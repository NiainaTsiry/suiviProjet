


<?php
  ob_start();
?>
     <link rel="stylesheet" href="<?php echo home_base_url();?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <style type="text/css">
             .parent {
              position: relative;
              width: auto;
              height: 750px;
              margin: 0px;
          }
          .child1 {
              position: absolute;
              width: 100%;
              height: 100%;
              top: 0;
              left: 0;
              opacity: 0.7;
             
          }
          .child2 {
              z-index: 10;
              margin-left: 900px;
              margin-top : 25px;
            
          }
          .legend {
              padding: 4px 6px;
              background: white;
              font: 14px/16px Arial, Helvetica, sans-serif;
              background: rgba(255,255,255,0.8);
              box-shadow: 0 0 15px rgba(0,0,0,0.2);
              border-radius: 5px;
              min-width: 200px;


          }
          #map{
                width: 100%; 
                height: 700px; 
                background: none;
                left: 2%; 
                top: 3%;   
            }
         .transparent-tooltip {
                background: transparent;
                border: none;
                box-shadow: none;

              }

              .transparent-tooltip::before {
                border: none;
              }
                   

 </style>

 <div class="container">

    <section class="content " style="margin-top:25px;text-align:center;">
         <div class="mbr-section-head mb-4 ">
            <h4 class="mbr-section-title mbr-fonts-style align-item-center mb-0 display-6">
                <strong>Situation des projets sur l'Assainissement, l'Eau et l'Hygiène à Madagascar</strong><br>
                <strong><?php echo json_encode($periodeDonnees[0]['anneedebut']) ?> - <?php echo json_encode($periodeDonnees[0]['anneefin']) ?></strong><br>
                <strong> <?php if (isset($libelleRegion[0])) echo 'Région: '.($libelleRegion[0]['libelleregion']) ?> </strong>
              </h4>
            
        </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <h5 class="mb-2"></h5>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-industry"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Nombre total des projets</span>
                <span class="info-box-number"> <?php echo json_encode($nbreProjet[0]['nbreprojet']) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-money-bill"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Montant total des investissements</span>
                <span class="info-box-number">Ar <?php echo (number_format($montantProjet[0]['montantmarche'],0, ',', ' ')) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Projets achevés</span>
                <span class="info-box-number"><?php echo json_encode($lstProjetAcheve[0]['nbreprojetacheve']) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
       
          <!-- /.col -->
          
    </div>
</section>

    <section class="map1 cid-t5w89jH6Nw" id="map1-y">
    
    <div>
     
        <div class="google-map justify-content-center">
             <div class="row  ">    
               
                  <div class="col-12 col-sm-12 col-md-9" id="map" ></div>
               

                    <div class="col-12 col-sm-12 col-md-3" >
                  
                     <div class="card ">
                            <div class="card-header">
                              <h5 class="card-title m-0">Région</h5>
                            </div>
                            <div class="card-body">

                                 <div class="form-row">
                  
                                     <div class="col-12">
                                      <p class="text-left">
                                          <strong></strong>
                                      </p>
                                      <div class="form-group clearfix">
                                           <div class="icheck-info d-inline">
                                              <input type="radio" name="data" id="tous" value="tous">
                                              <label for="tous">
                                                Toutes
                                              </label>
                                            </div>
                                            <br>
                                        <?php for ($i=0; $i < count($lstRegion); $i++) { ?>

                                                                                    
                                          <div class="icheck-info d-inline">
                                          <input type="radio" name="data" id=<?php echo json_encode($lstRegion[$i]['region_id']) ?> value=<?php echo json_encode($lstRegion[$i]['region_id']) ?>>
                                          <label for=<?php echo json_encode($lstRegion[$i]['region_id']) ?>>
                                            <?php echo ($lstRegion[$i]['region_libelle']) ?>
                                          </label>
                                        </div>
                                        <br>
                                        
                                       <?php }  ?>
                                      </div>
                                        
                                   </div>

                                  
               
                                 </div>
                              
                            </div>
                          </div>
                  </div>
                  </div>
                
             
            </div>
                
   </div>   
        
   </section>

   <section class="content " style="margin-top:25px;text-align:center;">
         <div class="mbr-section-head mb-4 ">
            <h6 class="mbr-section-title mbr-fonts-style align-item-center mb-0 display-6">
                <strong>Evolution des investissements engagés</strong><br>
                <strong>En milliards d'Ariary</strong><br>
                <strong><?php echo json_encode($periodeDonnees[0]['anneedebut']) ?> - <?php echo json_encode($periodeDonnees[0]['anneefin']) ?></strong>
              </h6>
            
        </div>
    </section>

  <section class="content15 cid-t5wQHhrtxr" id="content15-16">
 
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-12 col-lg-10 ">
                <div class="card-wrapper">
                    <div class="card-box ">
                         
                         <p class="text-center">
                      <strong></strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="financementChart" height="280" ></canvas>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <section class="content " style="margin-top:25px;text-align:center;">
         <div class="mbr-section-head mb-4 ">
            <h6 class="mbr-section-title mbr-fonts-style align-item-center mb-0 display-6">
                <strong>Appréciation  des projets engagés</strong><br>
                <strong>Nombre de projet/Année d'engagement</strong><br>
                <strong><?php echo json_encode($periodeDonnees[0]['anneedebut']) ?> - <?php echo json_encode($periodeDonnees[0]['anneefin']) ?></strong>
              </h6>
            
        </div>
    </section>

  <section class="content15 cid-t5wQHhrtxr" id="content15-16">

    

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-12 col-lg-10 ">
                <div class="card-wrapper">
                    <div class="card-box ">
                         
                         <p class="text-center">
                      <strong></strong>
                    </p>

                    <div class="chart">
                          <canvas id="stackedBarProjet" width="650" height="250"></canvas>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

 </div>           

<?php
  
  $content = ob_get_clean();
  include 'baseLayoutWhitOutMenu.php';
?>
<script type="text/javascript">



$(document).ready(function () {
   var assetUrl = "<?php echo home_base_url(); ?>";

  var url="<?php echo base_url() ?>";

  var datalayer;
  var uri=  window.location.pathname.split('/');
  var regionjson; 
  var regionchoix = <?php  echo json_encode($libelleRegion) ?>;

 evolutioninvestissement();
 appreciationprojet();
  
/* formulaire*/
/*************/
  
    
  var map = L.map('map').setView([-18.7785704655, 46.830888048], 5);



    
  addLayerNational().addTo(map);
  addLayerControl().addTo(map);
 
  //addControl();

   if (uri[3]=="accueil_region") {
    var region=regionchoix[0]['region_id'];

      if (region==='MDG41'){
        regionjson ='boeny';
      }
      else if (region==='MDG42'){
        regionjson ='sofia';
      }
      else if (region==='MDG11'){
        regionjson ='analamanga';
      }
      else if (region==='MDG12'){
        regionjson ='vakinankaratra';
      }
      else if (region==='MDG13'){
        regionjson ='itasy';
      }
      else if (region==='MDG14'){
        regionjson ='bongolava';
      }
      else if (region==='MDG21'){
        regionjson ='hautematsiatra';
      }
      else if (region==='MDG22'){
        regionjson ='amoronimania';
      }
      else if (region==='MDG23'){
        regionjson ='vatovavyfitovinany';
      }
      else if (region==='MDG24'){
        regionjson ='ihorombe';
      }
      else if (region==='MDG25'){
        regionjson ='atsimoatsinanana';
      }
      else if (region==='MDG31'){
        regionjson ='atsinanana';
      }
      else if (region==='MDG32'){
        regionjson ='analanjirofo';
      }
      else if (region==='MDG33'){
        regionjson ='alaotramangoro';
      }
      else if (region==='MDG43'){
        regionjson ='betsiboka';
      }
      else if (region==='MDG44'){
        regionjson ='melaky';
      }
      else if (region==='MDG51'){
        regionjson ='atsimoandrefana';
      }
      else if (region==='MDG52'){
        regionjson ='androy';
      }
      else if (region==='MDG53'){
        regionjson ='anosy';
      }
      else if (region==='MDG54'){
        regionjson ='menabe';
      }
      else if (region==='MDG71'){
        regionjson ='diana';
      }
      else if (region==='MDG72'){
        regionjson ='sava';
      }
      else {
        regionjson ='';
      }



       if (regionjson){
         addRegionLayer(regionjson);
         map.setZoom(8);
       }
    
      
      

  }
 


   $(document).on('click', '[name="data"]', function () {

    if ($(this).val()=='tous'){
       window.location.href =url+'index.php/activite.php/accueil';
    } else {
       window.location.href =url+'index.php/activite.php/accueil_region?region='+$(this).val();
    }
       
   
    })


 
  
   function addLayerNational (){

    
    let madagascarlayer = L.tileLayer(assetUrl+'images/osm/{z}/{x}/{y}.png', {
        
                      minZoom: 6,
                      maxZoom: 8,
                      tms: false,
                      attribution: 'Generated by HayTic',
                      style:function (feature) {
                        return { color: 'red', weight: 4 };
                      }
                    });

        return madagascarlayer;
   }


   function addRegionLayer(region){
      var pathDataRegion=assetUrl+"data/region_district/"+region+"_json.geojson";
       
       getJsonLayer(pathDataRegion);
   }

   function addLayerControl(){

      var LeafIcon = L.Icon.extend({
            options: {
               iconSize:     [23, 37],
               iconAnchor: [15,25],
               popupAnchor:  [3, 35]
            }
     });



        var redIcon = new LeafIcon({
            iconUrl: assetUrl+'/images/nice_marker/red.png'
        });

        var blueIcon = new LeafIcon({
            iconUrl: assetUrl+'/images/nice_marker/blue.png'
        });

        var greenIcon = new LeafIcon({
            iconUrl: assetUrl+'/images/nice_marker/vert.png'
        });

        var violetIcon = new LeafIcon({
            iconUrl: assetUrl+'/images/nice_marker/jaune.png'
        });

        var jauneIcon = new LeafIcon({
            iconUrl: assetUrl+'/images/nice_marker/violet.png'
        });

     var  listprojetacheve = [];
     var  listprojetpasdeprogres = [];
     var  listprojetlent = [];
     var  listprojetnondemarre = [];
     var  listprojetsatisfaisant = [];
      var  lstProjet=<?php echo json_encode($lstProjet);?>;
               
               for (var i=0; i<lstProjet.length;i++){
                
                var htmlDetail="";
                htmlDetail=htmlDetail+"<p> <strong>Région:</strong>"+lstProjet[i].region_libelle+"</p>";
                htmlDetail=htmlDetail+"<p> <strong>District:</strong>"+lstProjet[i].district_libelle+"</p>";
               // htmlDetail=htmlDetail+"<p> <strong>Commune:</strong>"+data[0].commune_libelle+"</p>";
                htmlDetail=htmlDetail+"<p> <strong>Projet:</strong>"+lstProjet[i].libelleprojet+"</p>";
                htmlDetail=htmlDetail+"<p> <strong>Entreprise:</strong>"+lstProjet[i].nomtiers+"</p>";
                htmlDetail=htmlDetail+"<p> <strong>Date début:</strong>"+lstProjet[i].datedebutactivite+"</p>";
                htmlDetail=htmlDetail+"<p> <strong>Date fin prévue:</strong>"+lstProjet[i].datefinprevue+"</p>";
                htmlDetail=htmlDetail+"<p> <strong>Avancement des travaux: </strong>"+lstProjet[i].avancementtravaux+" %</p>";
                htmlDetail=htmlDetail+"<p> <strong>Etat des travaux: </strong>"+lstProjet[i].appreciation+" </p>";
                
                if (lstProjet[i].appreciation=='Achevé'){

                 var projetacheve = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: blueIcon})
                                  .bindPopup(htmlDetail);

                 
                 listprojetacheve.push(projetacheve);

                }
               
                else if (lstProjet[i].appreciation=='Non démarré'){
                  var projetnondemarre = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: greenIcon}).bindPopup(htmlDetail);
                  listprojetnondemarre.push(projetnondemarre);
                }
                else if (lstProjet[i].appreciation=='Progrès satisfaisant'){
                  var projetsatisfaisant = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: jauneIcon}).bindPopup(htmlDetail);
                  listprojetsatisfaisant.push(projetsatisfaisant);
                }
                else if (lstProjet[i].appreciation=='Pas de progrès/Obstacles majeurs'){
                  var projetpasdeprogres = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: violetIcon}).bindPopup(htmlDetail);
                  listprojetpasdeprogres.push(projetpasdeprogres);
                }
                else {
                  var projetlent = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: redIcon}).bindPopup(htmlDetail);
                  listprojetlent.push(projetlent);
                }

                
               
                 

           }

      var layerProjetAcheve = L.layerGroup(listprojetacheve);
      var layerprojetnondemarre = L.layerGroup(listprojetnondemarre);
      var layerprojetsatisfaisant = L.layerGroup(listprojetsatisfaisant);
      var layerprojetpasdeprogres = L.layerGroup(listprojetpasdeprogres);
      var layerlistprojetlent = L.layerGroup(listprojetlent);

          var overlayMaps = {
            " <span class='my-layer-item'>Projets achevés</span>": layerProjetAcheve,
            "Projets en progrès satisfaisant": layerprojetsatisfaisant,
            "Projets pas de progrès/Obstacles majeurs": layerprojetpasdeprogres,
            "Projets non démarrés":layerprojetnondemarre,
            "Projets lents": layerlistprojetlent
           };



           var legend = L.control({position: 'topleft'});

                legend.onAdd = function () {
                      var div = L.DomUtil.create('div');
                      div.innerHTML = ' <p class="text-left"><h5><strong>Suivi des projets</strong></h5>';
                      return div;
                };
                legend.addTo(map);

                var fooCtrl = L.control.layers(null,overlayMaps,
                              {collapsed : false, position: 'topleft'});

                                        
               
              
                //console.log(fooCtrlDiv);
               // fooCtrlDiv.insertBefore(fooLegend.getContainer(), fooCtrlDiv.firstChild);
         
         // var layerControl = L.control.layers(null,overlayMaps,{position: 'topleft'});

        
              return fooCtrl;

      }

   function addControl(){
    L.Control.Watermark = L.Control.extend({
            onAdd: function(map) {
                var img = L.DomUtil.create('img');

                img.src = assetUrl+'/images/Republique-logo.png';
                img.style.width = '200px';

                return img;
            },

            onRemove: function(map) {
                // Nothing to do here
            }
        });

        L.control.watermark = function(opts) {
            return new L.Control.Watermark(opts);
        }

        L.control.watermark({ position: 'bottomleft' }).addTo(map);
   }

   

  function createMarker(latitude,longitude,popupContent){

         var marker;

      marker = L.marker([latitude,longitude],{icon: greenIcon}).addTo(map).on('click',function(e){
         var sql="select * from tableaudebord_pip where appreciation='"+popupContent+"'";

         $.ajax({
              url: url+'index.php/activite.php/getList',
              type:"POST",
               dataType: "json",
               data:{sql:sql},
               success: function(data) {  
                
                htmlDetail="";
                htmlDetail=htmlDetail+"<p> <strong>Région:</strong>"+data[0].region_libelle+"</p>";
                htmlDetail=htmlDetail+"<p> <strong>District:</strong>"+data[0].district_libelle+"</p>";
               // htmlDetail=htmlDetail+"<p> <strong>Commune:</strong>"+data[0].commune_libelle+"</p>";
                htmlDetail=htmlDetail+"<p> <strong>Projet:</strong>"+data[0].libelleprojet+"</p>";
                htmlDetail=htmlDetail+"<p> <strong>Entreprise:</strong>"+data[0].nomtiers+"</p>";
                htmlDetail=htmlDetail+"<p> <strong>Date début:</strong>"+data[0].datedebutactivite+" Ha</p>";
                htmlDetail=htmlDetail+"<p> <strong>Date fin prévue:</strong>"+data[0].datefinprevue+"</p>";
                htmlDetail=htmlDetail+"<p> <strong>Avancement des travaux: </strong>"+data[0].avancementtravaux+" %</p>";
                htmlDetail=htmlDetail+"<p> <strong>Etat des travaux: </strong>"+data[0].appreciation+" </p>";
                  marker.bindPopup(htmlDetail).openPopup();
                
              }, 
               beforeSend: function() {
                                            },
               error :  function(e){
                console.log(e);
              }      
                                       
    });


      });
  }


  function style(feature) {

   
    return {
       
        weight: 0.5,
        opacity: 1,
        color: 'black',
        dashArray: '2',
       
    };
  
}
 


  function getJsonLayer(pathData){


     
  $.getJSON(pathData,function(data){

  datalayer = L.geoJson(data,{

    style: style,// css carte defin ery ambony
    onEachFeature: function(feature, featureLayer) {
      featureLayer.bindTooltip(feature.properties.DISTRICT, {
                                                  permanent: true, 
                                                  direction : 'bottom',
                                                  className: 'transparent-tooltip',
                                                  offset: [0, -8]
                                                });
    }
  }).addTo(map);

  
  map.fitBounds(datalayer.getBounds());




   });
}




 });

</script>

<script>

  function evolutioninvestissement(){

  var data=<?php echo json_encode($evolutioninvestissement);?>;
  var annee = [];
  var montantinvestissement = [];

  for (var i = 0; i < data.length; i++) {
    annee.push(data[i]['anneeengagementcp']);
    montantinvestissement.push(data[i]['montant']/1000000000);
  }

  var financementCanvas = $('#financementChart').get(0).getContext('2d')

  var financementData = {
    labels: annee,
    datasets: [
      {
        label: 'PIP',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: montantinvestissement
      },
      {
        label: 'Partenaire financier',
        backgroundColor: 'rgba(210, 214, 222, 1)',
        borderColor: 'rgba(210, 214, 222, 1)',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: []
      }
    ]
  }

  var financementOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: true
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: true
        }
      }],
      yAxes: [{
        gridLines: {
          display: true
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var financementChart = new Chart(financementCanvas, {
    type: 'line',
    data: financementData,
    options: financementOptions
  }
  )


  }
  
  
function appreciationprojet(){

      var data  = <?php echo json_encode($appreciationprojetparannee); ?>;
      var dataannee = <?php echo json_encode($listanneeengagement); ?>;
      var acheve = [];
      var pasdeprogres = [];
      var progreslents = [];
      var nondemarre = [];
      var progressatisfaisant = [];
      var annee =[];

      console.log(annee);

      for (var y = dataannee.length - 1; y >= 0; y--) {
        annee.push(dataannee[y]['anneeengagementcp']);
      }

      for (var i = 0; i < data.length; i++) {
       
        if (data[i]['appreciation'] =='Achevé'){
          acheve.push(data[i]['nombreprojet']);
        }
        
        else if (data[i]['appreciation'] =='Pas de progrès/Obstacles majeurs'){
          pasdeprogres.push(data[i]['nombreprojet']);
        }
        else if (data[i]['appreciation'] =='Progrès lents'){
          progreslents.push(data[i]['nombreprojet']);
        }
        else if (data[i]['appreciation'] =='Non démarré'){
          nondemarre.push(data[i]['nombreprojet']);
        }
        else {
          progressatisfaisant.push(data[i]['nombreprojet']);
        };
        
      }
 
    var areaChartData = {
      labels  : annee,
      datasets: 
      //national
      [        
           {
            label               : 'Achevé',
            backgroundColor     : '#1e8fff',
            borderColor         : '#1e8fff',
            pointRadius         : false,
            pointColor          : 'rgba( 23, 165, 137 , 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : acheve
          },
                
        {
          label               : 'Progrès satisfaisant',
          backgroundColor     : '#ca00e4',
          borderColor         : '#ca00e4',
          pointRadius         : false,
          pointColor          : 'rgba( 23, 165, 137 , 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : progressatisfaisant
        },
        {
          label               : 'Pas de progrès- Obstacles majeurs',
          backgroundColor     : '#c19d1c',
          borderColor         : '#c19d1c',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : pasdeprogres
        },
        {
          label               : 'Progrès lents',
          backgroundColor     : '#ff2a00',
          borderColor         : '#ff2a00',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : progreslents
        },
         {
          label               : 'Non démarré',
          backgroundColor     : '#2b8282',
          borderColor         : '#2b8282',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : nondemarre
        },

     

      ]

    }

    var barChartData = $.extend(true, {}, areaChartData)


    var stackedBarChartCanvas = $('#stackedBarProjet').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : false,
      maintainAspectRatio     : false,
      legend: {
          display: true,
          position:'right'
      },

      scales: {
        xAxes: [{
          stacked: true,
          display: true,
        }],
        yAxes: [{
          stacked: true,
          ticks: {
            
                   min: 0,
                   max: 70,
                   
                },
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions,
    });
    sessionStorage.setItem("dataChartHygiene", JSON.stringify(areaChartData));
}

 



</script>
