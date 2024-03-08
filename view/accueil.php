


<?php
  ob_start();
?>
     <link rel="stylesheet" href="<?php echo home_base_url();?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo home_base_url();?>css/leaflet.css">

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

          .legend {
              line-height: 18px;
              color: #555;
          }
          .legend i {
              width: 18px;
              height: 18px;
              float: left;
              margin-right: 8px;
              opacity: 0.7;
          }
          .info {
               background: white;
              background: rgba(255,255,255,0.8);
              box-shadow: 0 0 15px rgba(0,0,0,0.2);
              border-radius: 5px;
          }
          .info h4 {
             color: #777;
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

 <div class="container" style="background-color: #3C8DBC">

    <section class="content " style="margin-top:25px;text-align:center;">
         <div class="mbr-section-head mb-4 ">
            <h4 class="mbr-section-title mbr-fonts-style align-item-center mb-0 display-6">
                <strong>Projets sur l'Eau , de l'Assainissement et de l'Hygiène à MADAGASCAR</strong><br>
               
              </h4>
            
        </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <h5 class="mb-2"></h5>
        <div class="row">
          <?php if (isset($_SESSION['isConnected'])){ ?>
            <div class="col-md-2 col-sm-6 col-12">
              <div class="info-box" style="background-color:#1E8FFF">

                <div class="info-box-content">
                   <span class="info-box-text text-white">Projets achevés</span>
                   <span class="info-box-number text-white"> <?php echo json_encode($lstProjetAcheve[0]['nbreprojet']) ?></span>
                    </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
            <div class="col-md-2 col-sm-6 col-12">
              <div class="info-box" style="background-color:#CA00E4">

                <div class="info-box-content">
                  <span class="info-box-text text-white">Satisfaisants</span>
                  <span class="info-box-number text-white"><?php echo json_encode($lstProjetProgresSatisfaisant[0]['nbreprojet']) ?></span>
                  </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

             <div class="col-md-2 col-sm-6 col-12">
              <div class="info-box" style="background-color:#C19D1C">

                <div class="info-box-content">
                  <span class="info-box-text text-white">Obstacles majeurs</span>
                  <span class="info-box-number text-white"> <?php echo json_encode($lstProjetPasProgres[0]['nbreprojet']) ?></span>
                   </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
            <div class="col-md-2 col-sm-6 col-12">
              <div class="info-box" style="background-color:#17AC00">

                <div class="info-box-content">
                  <span class="info-box-text text-white">Non démarrés</span>
                  <span class="info-box-number text-white"><?php echo json_encode($listProjetNonDemarre[0]['nbreprojet']) ?></span>
                     </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
             <div class="col-md-2 col-sm-6 col-12">
              <div class="info-box" style="background-color:#FF2A00">

                <div class="info-box-content">
                  <span class="info-box-text text-white">Projets lents</span>
                  <span class="info-box-number text-white"> <?php echo json_encode($lstProjetLents[0]['nbreprojet']) ?></span>
                  </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
          <?php } ?>
          <div class="col-md-2 col-sm-6 col-12">
            <div class="info-box" style="background-color:#da702a">
             
              <div class="info-box-content">
                <span class="info-box-text text-white">Matelas de projets</span>
                <span class="info-box-number text-white"><?php echo json_encode($nbreProjetIdentifie[0]['nbreprojet']) ?></span>
                 </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
    </div>
       <div class="row">
        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-industry"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Montant total des matelas de projet</span>
                <span class="info-box-number"> Ar <?php echo (number_format($nbreProjetIdentifie[0]['montantmarche'],0, ',', ' ')) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <?php if (isset($_SESSION['isConnected'])){ ?>
             <div class="col-md-6 col-sm-6 col-12">
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
         <?php } ?>
    </div>
    <div class="row">
      <?php if (isset($_SESSION['isConnected'])){ ?> 
        <div class="col-md-6 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fas fa-money-bill"></i></span>

                <div class="info-box-content justify-content-center">
                  <span class="info-box-text">Montant total des projets engagés</span>
                  <span class="info-box-number">Ar <?php echo (number_format($montantProjetEngage[0]['montantmarche'],0, ',', ' ')) ?></span>

                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          <div class="col-md-6 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-money-bill"></i></span>

                <div class="info-box-content justify-content-center">
                  <span class="info-box-text">Montant total des investissements</span>
                  <span class="info-box-number">Ar <?php echo (number_format($montantProjet[0]['montantmarche'],0, ',', ' ')) ?></span>

                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
      <?php } ?>
    </div>
</section>

    <section class="map1 cid-t5w89jH6Nw" id="map1-y">
    
    <div>
     
        <div class="google-map justify-content-center">
             <div class="row  ">    
               
                  <div class="col-12 col-sm-12 col-md-9" id="map" ></div>
               

                    <div class="col-12 col-sm-12 col-md-3" >
                  
                     <div class="card bg-light">
                            <div class="card-header bg-secondary" >
                              <h5 class="card-title m-0 " >Région</h5>
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
<?php if (isset($_SESSION['isConnected'])){ ?> 
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
                <strong>Appréciation actualisée des projets engagés</strong><br>
                <strong>Nombre de projets engagés par année </strong><br>
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
<?php } ?>
 </div>           
 <div id='loader'> <img src="<?php echo home_base_url();?>images/loading.gif" style="heigth:5%;width:5%;position: fixed;top: 50%; left: 50%; margin-top: -100px;  margin-left: -100px;clear:both"></div> 
<?php
  
  $content = ob_get_clean();
  include 'baseLayoutWhitOutMenu.php';
?>
<!-- ChartJS -->
<script src="<?php echo home_base_url();?>plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/uplot/uPlot.iife.min.js"></script>
<script src="<?php echo home_base_url();?>js/leaflet.js"></script>

<script type="text/javascript">



$(document).ready(function () {
   var assetUrl = "<?php echo home_base_url(); ?>";
  var url="<?php echo base_url() ?>";
  var sess="<?php echo $_SESSION['isConnected']; ?>";
  console.log(sess);
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
  addTauxAccesLayer();
$("#loader").hide();

 
  //addControl();

   if (uri[4]=="accueil_region") {
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
         map.setZoom(9);
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

    
    let madagascarlayer = L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        
                      minZoom: 6,
                      maxZoom: 10,
                      tms: false,
                      attribution: 'Generated by HayTic',
                      style:function (feature) {
                        return { color: 'red', weight: 4 };
                      }
                    });

        return madagascarlayer;
   }


   function addTauxAccesLayer(){
    
      var tauxacces = <?php echo json_encode($untauxacces)?>;
      var pathDataRegion=assetUrl+"data/region.geojson";
      $.getJSON(pathDataRegion,function(data){

  datalayer = L.geoJson(data,{

    style: styletaux,
        onEachFeature: function(feature, featureLayer) {
        featureLayer.bindTooltip('<b>' + feature.properties.REGION + '</b><br />' +tauxacces[feature.properties.DHIS_CODE] + '%');
    }
   
  }).addTo(map);

  
  map.fitBounds(datalayer.getBounds());




   });

   }


var legend = L.control({position: 'bottomright'});

legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend'),
        grades = [0, 10, 20, 30, 40, 50, 60, 70],
        labels = [];
      div.innerHTML='<p>Taux d\'accès à l\'eau potable</p>';
    // loop through our density intervals and generate a label with a colored square for each interval
    for (var i = 0; i < grades.length; i++) {
        div.innerHTML +=
            '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
            grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '%<br>' : '+');
    }

    return div;
};

legend.addTo(map);





var info = L.control({position: 'bottomleft'});

info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
    this.update();
    return this._div;
};

// method that we will use to update the control based on feature properties passed
info.update = function (props) {
    this._div.innerHTML = '<h4>Taux d\'accès à l\'eau potable</h4>' +  (props ?
        '<b>' + props.name + '</b><br />' + props.density + ' people / mi<sup>2</sup>'
        : 'Parcourir les régions');
};

info.addTo(map);

function styletaux(feature) {
   var tauxacces = <?php echo json_encode($untauxacces)?>;
  console.log(tauxacces[feature.properties.DHIS_CODE]);
    return {
        fillColor: getColor(tauxacces[feature.properties.DHIS_CODE]),
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7
    };
}

function getColor(d) {
    return d > 70 ? '#800026' :
           d > 60  ? '#BD0026' :
           d > 50  ? '#E31A1C' :
           d > 40  ? '#FC4E2A' :
           d > 30   ? '#FD8D3C' :
           d > 20   ? '#FEB24C' :
           d > 10   ? '#FED976' :
                      '#FFEDA0';
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

          var orangeIcon = new LeafIcon({
            iconUrl: assetUrl+'/images/nice_marker/orange.png'
        });

        var orangeEauIcon = new LeafIcon({
            iconUrl: assetUrl+'/images/nice_marker/eau.png'
        });

        var orangeHygIcon = new LeafIcon({
            iconUrl: assetUrl+'/images/nice_marker/hygiene.png'
        });

        var orangeEauIconFinance = new LeafIcon({
            iconUrl: assetUrl+'/images/nice_marker/eau_finance.png'
        });

        var orangeHygIconFinance = new LeafIcon({
            iconUrl: assetUrl+'/images/nice_marker/hygiene_finance.png'
        });

     var  listprojetacheve = [];
     var  listprojetpasdeprogres = [];
     var  listprojetlent = [];
     var  listprojetnondemarre = [];
     var  listprojetsatisfaisant = [];
     var  listprojetidentifie = [];

     var  lstProjet=<?php echo json_encode($lstProjet);?>;
     var isconnected = "<?php echo isset($_SESSION['isConnected']) ? 'connecte' : 'nonconnecte'; ?>";
        var customOptions =
        {
        'maxWidth': '500',
        'className' : 'transparent-tooltip'
        }
               
               for (var i=0; i<lstProjet.length;i++){
                
                var htmlDetail="";

     
        htmlDetail=htmlDetail+"<a href='<?php echo base_url();?>index.php/activite.php/projet?projetid="+lstProjet[i].codeprojet+ "' target='popup' onclick='window.open('<?php echo base_url();?>index.php/activite.php/projet?projetid="+lstProjet[i].codeprojet+",'popup','width=600,height=600'); return false;>Voir détail du projet</a> </p></div>";        
             
           if(sess){

                if (lstProjet[i].appreciation=='Achevé'){

                  var projetacheve = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: blueIcon})
                            .bindTooltip(lstProjet[i].district_libelle, 
                            {   permanent: true, 
                                direction: 'right',
                                className: 'transparent-tooltip',
                                                  offset: [0, -8]
                            })
                            .bindPopup(htmlDetail,customOptions);

                 var projetacheve = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: blueIcon})
                                  .bindTooltip(htmlDetail);
              
 
                 
                 listprojetacheve.push(projetacheve);

                }
               
                else if (lstProjet[i].appreciation=='Non démarré'){
                  var projetnondemarre = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: greenIcon})
                            .bindTooltip(lstProjet[i].district_libelle, 
                            {   permanent: true, 
                                direction: 'right',
                                className: 'transparent-tooltip',
                                                  offset: [0, -8]
                            }) .bindPopup(htmlDetail,customOptions);

                  var projetnondemarre = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: greenIcon}).bindTooltip(htmlDetail);
                  listprojetnondemarre.push(projetnondemarre);
                }
                else if (lstProjet[i].appreciation=='Progrès satisfaisant'){
                   var projetsatisfaisant = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: jauneIcon})
                            .bindTooltip(lstProjet[i].district_libelle, 
                            {   permanent: true, 
                                direction: 'right',
                                className: 'transparent-tooltip',
                                                  offset: [0, -8]
                            }
                        ) .bindPopup(htmlDetail,customOptions);

                  var projetsatisfaisant = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: jauneIcon}).bindTooltip(htmlDetail);
                  listprojetsatisfaisant.push(projetsatisfaisant);
                }
                else if (lstProjet[i].appreciation=='Pas de progrès/Obstacles majeurs'){

                  var projetpasdeprogres = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: violetIcon})
                            .bindTooltip(lstProjet[i].district_libelle, 
                            {   permanent: true, 
                                direction: 'right',
                                className: 'transparent-tooltip',
                                                  offset: [0, -8]
                            }
                        ) .bindPopup(htmlDetail,customOptions);

                  var projetpasdeprogres = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: violetIcon}).bindTooltip(htmlDetail);
                  listprojetpasdeprogres.push(projetpasdeprogres);
                }
                
                else if (lstProjet[i].appreciation=='Progrès lents'){

                  var projetlent = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: redIcon})
                            .bindTooltip(lstProjet[i].district_libelle, 
                            {   permanent: true, 
                                direction: 'right',
                                className: 'transparent-tooltip',
                                                  offset: [0, -8]
                            }
                        ) .bindPopup(htmlDetail,customOptions);

                  listprojetlent.push(projetlent);
                }

                else if (lstProjet[i].appreciation=='Projet identifié'){

                  var projetidentifie;

                  if (lstProjet[i].conditiontranche=='SOFT_ASS_HYG' || lstProjet[i].conditiontranche=='HARD_ASS_HYG'){

                    if(lstProjet[i].finacementtype==''){

                        projetidentifie = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: orangeHygIconFinance})
                            .bindTooltip(lstProjet[i].district_libelle, 
                            {   permanent: true, 
                                direction: 'right',
                                className: 'transparent-tooltip',
                                                  offset: [0, -8]
                            }
                        ) .bindPopup(htmlDetail,customOptions);

                    } else {

                        projetidentifie = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: orangeHygIcon})
                            .bindTooltip(lstProjet[i].district_libelle, 
                            {   permanent: true, 
                                direction: 'right',
                                className: 'transparent-tooltip',
                                                  offset: [0, -8]
                            }
                        ) .bindPopup(htmlDetail,customOptions);

                    }

                   

                  }
                  else {

                     if(lstProjet[i].finacementtype==''){

                          projetidentifie = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: orangeEauIconFinance})
                            .bindTooltip(lstProjet[i].district_libelle, 
                            {   permanent: true, 
                                direction: 'right',
                                className: 'transparent-tooltip',
                                                  offset: [0, -8]
                            }
                        ) .bindPopup(htmlDetail,customOptions);

                     }
                      else {

                            projetidentifie = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: orangeEauIcon})
                            .bindTooltip(lstProjet[i].district_libelle, 
                            {   permanent: true, 
                                direction: 'right',
                                className: 'transparent-tooltip',
                                                  offset: [0, -8]
                            }
                        ) .bindPopup(htmlDetail,customOptions);

                      }
                
                  }
                  


                  listprojetidentifie.push(projetidentifie);
                }
              }else{
              	if (lstProjet[i].appreciation=='Projet identifié'){

                  var projetidentifie;


                  if (lstProjet[i].conditiontranche=='SOFT_ASS_HYG' || lstProjet[i].conditiontranche=='HARD_ASS_HYG'){

                     projetidentifie = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: orangeHygIcon})
                            .bindTooltip(lstProjet[i].district_libelle, 
                            {   permanent: true, 
                                direction: 'right',
                                className: 'transparent-tooltip',
                                                  offset: [0, -8]
                            }
                        ) .bindPopup(htmlDetail,customOptions);

                  }
                  else {
                    projetidentifie = L.marker([lstProjet[i].latitude ,lstProjet[i].longitude],{icon: orangeEauIcon})
                            .bindTooltip(lstProjet[i].district_libelle, 
                            {   permanent: true, 
                                direction: 'right',
                                className: 'transparent-tooltip',
                                                  offset: [0, -8]
                            }
                        ) .bindPopup(htmlDetail,customOptions);
                  }
                  


                  listprojetidentifie.push(projetidentifie);
              }   

           }

        }

     if(sess){
       var layerProjetAcheve = L.layerGroup(listprojetacheve);
      var layerprojetnondemarre = L.layerGroup(listprojetnondemarre);
      var layerprojetsatisfaisant = L.layerGroup(listprojetsatisfaisant);
      var layerprojetpasdeprogres = L.layerGroup(listprojetpasdeprogres);
      var layerlistprojetlent = L.layerGroup(listprojetlent);
      var layerlistprojetidentifie = L.layerGroup(listprojetidentifie);

      layerProjetAcheve.addTo(map);
      layerprojetnondemarre.addTo(map);
      layerprojetsatisfaisant.addTo(map);
      layerprojetpasdeprogres.addTo(map);
      layerlistprojetlent.addTo(map);
      layerlistprojetidentifie.addTo(map);
       
          var overlayMaps = {
            " <span class='my-layer-item'><i class='fas fa-circle' style='color:#1E8FFF'></i> Projets achevés</span>": layerProjetAcheve,
            "<span class='my-layer-item'><i class='fas fa-circle' style='color:#CA00E4'></i> Projets en progrès satisfaisant</span>": layerprojetsatisfaisant,
            "<span class='my-layer-item'><i class='fas fa-circle' style='color:#C19D1C'></i> Projets pas de progrès / Obstacles majeurs</span>": layerprojetpasdeprogres,
            "<span class='my-layer-item'><i class='fas fa-circle' style='color:#17AC00'></i> Projets non démarrés</span>":layerprojetnondemarre,
            "<span class='my-layer-item'><i class='fas fa-circle' style='color:#FF2A00'></i> Projets lents</span>": layerlistprojetlent,
            "<span class='my-layer-item'><i class='fas fa-circle' style='color:#da702a'></i> Matelas de projets</span>": layerlistprojetidentifie,
           };
     }else{
       var layerlistprojetidentifie = L.layerGroup(listprojetidentifie);
        layerlistprojetidentifie.addTo(map);
     var overlayMaps = {
            "<span class='my-layer-item'><i class='fas fa-circle' style='color:#da702a'></i> Matelas de projets</span>": layerlistprojetidentifie,
           };
     }



           var legend = L.control({position: 'topleft'});

                legend.onAdd = function () {
                      var div = L.DomUtil.create('div');
                      div.innerHTML = ' <p class="text-left"><h5><strong>Suivi des projets</strong></h5>';
                      return div;
                };
                legend.addTo(map);

                var fooCtrl = L.control.layers(null,overlayMaps,
                              {collapsed : true, position: 'topleft'});

                                        
              
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
        dashArray: '3',
       
    };
  
}
 


  function getJsonLayer(pathData){

   var tauxaccesdistrict = <?php echo json_encode($tauxaccesdistrict)?>;

   console.log(pathData);

     
  $.getJSON(pathData,function(data){

  datalayer = L.geoJson(data,{

    style: style,// css carte defin ery ambony
    onEachFeature: function(feature, featureLayer) {
      console.log(feature.properties.DHIS_CODE);
      featureLayer.bindTooltip('<strong>Taux accès: '+tauxaccesdistrict[feature.properties.DHIS_CODE] + '%<strong>', {
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

function styledistrict(feature) {
   
   var tauxaccesdistrict = <?php echo json_encode($tauxaccesdistrict)?>;
 
    return {
        fillColor: getColor(tauxaccesdistrict[feature.properties.DHIS_CODE]),
        weight: 0.5,
        opacity: 1,
        color: 'black',
        dashArray: '2',
    };
}





 });

</script>

<script>
var sess="<?php echo $_SESSION['isConnected']; ?>";

  function evolutioninvestissement(){

  var data=<?php echo json_encode($evolutioninvestissement);?>;
  var annee = [];
  var montantinvestissement = [];

  for (var i = 0; i < data.length; i++) {
    annee.push(data[i]['anneeengagementcp']);
    montantinvestissement.push(data[i]['montant']/1000000000);
  }

  

  var financementData = {
    labels: annee,
    datasets: [
      {
        label: 'PIP',
        backgroundColor: 'rgb(5, 154, 173)',
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
  if(sess){
  var financementCanvas = $('#financementChart').get(0).getContext('2d')
  var financementChart = new Chart(financementCanvas, {
    type: 'line',
    data: financementData,
    options: financementOptions
  }
                              
  )
  }


  }
  
  
function appreciationprojet(){

      var data  = <?php echo json_encode($appreciationprojetparannee); ?>;
      var dataannee = <?php echo json_encode($listanneeengagement); ?>;
      var acheve = [];
      var pasdeprogres = [];
      var progreslents = [];
      var nondemarre = [];
      var identifie = [];
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
         else if (data[i]['appreciation'] =='Projet identifié'){
          identifie.push(data[i]['nombreprojet']);
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
if(sess){
  var stackedBarChartCanvas = $('#stackedBarProjet').get(0).getContext('2d')
    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions,
    });
}
    sessionStorage.setItem("dataChartHygiene", JSON.stringify(areaChartData));
}

  



</script>
