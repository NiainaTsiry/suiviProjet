<?php
  ob_start();
?>


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <div>
            <strong>Indicateurs:</strong>
            <input type="checkbox" name="boisEnergie" id="boisEnergie" value="boisEnergie" checked>Bois energie
            <input type="checkbox" name="equipementCuisson" id="equipementCuisson" value="equipementCuisson" checked>Equipement de cuisson
            <input type="checkbox" name="alternativeCuisson" id="alternativeCuisson" value="alternativeCuisson" checked>Alternative de cuisson
        </div>
        <div class="ml-5">
            <strong>Niveau:</strong>
            <input type="radio" name="aggregation" class="ml-1"
            <?php if (isset($aggregation) && $aggregation=="National") echo "checked";?>
            value="National"> National
            <input type="radio" name="aggregation" class="ml-1"
            <?php if (isset($aggregation) && $aggregation=="Regional") echo "Regional";?>
            value="Regional"> Regional
            <input type="radio" name="aggregation" class="ml-1"
            <?php if (isset($aggregation) && $aggregation=="District") echo "checked";?>
            value="District"> District
        </div>

           
                  
      </div>

    </div>
  </nav>
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
  <div class="row">
         <div class="col-2 col-md-2 align-top" >
           <div id="card-map"  class="img-fluid">
              <div >
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Madagascar
                </h3>
                
                <!-- /.card-tools -->
              </div>
                
                <div id="map" style="width:100%;height:650px;align-content: top;"  ></div>
         </div>
       </div>
        <div class="col-10 col-md-10">

          <div class="container-fluid">

                      <div id="cadre">
                        <div class="row">
                              <p><strong>Cadres référentiels:</strong></p>
                        </div>
                        <div class="row">
                          <div class="col" >
                              <div class="card ml-0">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°1</h5>
                                </div>
                                <div class="card-body" id="ind1-a">
                                  <p class="card-text">Nombre des documents cadres référentiels relatifs aux bois énergie et alternatives de cuisson: </p>
                                  <a href="#" class="card-link" ><i class="fas fa-chart-line text-success"></i></a>
                                </div>

                                <div class="card-body" id="ind1-h">
                                    <div class="card-body">
                                      <div class=" mt-0">
                                        <div id="areaChart" style="min-height: 250px; height: 450px; width: 1650px"></div>
                                      </div>
                                    </div>
                                  <a href="#" class="card-link" ><i class="fas fa-chart-line text-success"></i></a>
                                </div>
                              </div>




                          </div>
                        </div>

                      </div>

                      <div  id="equipement">
                        <div class="row">
                              <p><strong>Equipement de cuisson:</strong></p>
                        </div>
                        <div class="row">
                          <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title">Indicateur N°5</h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Nombre des différents types d’équipement de cuisson disponible pour l’offre:</p>
                                </div>
                              </div>
                           </div>   
                           <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title">Indicateur N° 14</h5>
                                </div>
                                <div class="card-body">

                                  <p class="card-text">Taux moyen d’utilisation d’équipement de cuisson :</p>
                                </div>
                              </div>
                           </div>  
                          </div>
                      </div>


                      <div  id="alternative">
                        <div class="row">
                              <p><strong>Alternative de cuisson:</strong></p>
                        </div>
                        <div class="row">
                          <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°6</h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Quantité d’énergie disponible issue de différents types d’alternatives de cuisson (KJ) :</p>
                                </div>
                              </div>
                           </div>   
                           <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N° 18 </h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Quantité totale d’énergie de cuisson alternative consommée (KJ)</p>
                                </div>
                              </div>
                           </div>  

                            <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°19</h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Dépenses moyennes annuelles en alternatives de cuisson (ariary):</p>
                                </div>
                              </div>
                           </div> 

                          </div>
                      </div>

                      <div  id="bois">
                        <div class="row">
                              <p><strong>Bois energie:</strong></p>
                        </div>
                        <div class="row">
                          <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°2 </h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Surface potentielle en Bois Energie des forêts naturelles (ha) :</p>
                                </div>
                              </div>
                           </div>   
                           <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°3 </h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Superficie potentielle en Bois Energie de reboisement (ha) :</p>
                                </div>
                              </div>
                           </div>  

                            <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°4 </h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Nombre de plants produits prêts à être mis en terre :</p>
                                </div>
                              </div>
                           </div> 

                          </div>

                          <div class="row">
                          <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°7 </h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Taux d'adoption des pratiques/techniques de carbonisation améliorées par les charbonniers formellement recensés (%):</p>
                                </div>
                              </div>
                           </div>   
                           <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°8 </h5>
                                </div>
                                <div class="card-body">
                                 <p class="card-text">Pourcentage moyen de production de charbon de bois par type de technique de carbonisation (%) :</p>
                                </div>
                              </div>
                           </div>  

                          </div>



                          <div class="row">
                          <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°9 </h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Nombre des opérateurs formels en bois énergie :</p>
                                </div>
                              </div>
                           </div>   
                           <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°10</h5>
                                </div>
                                <div class="card-body">

                                  <p class="card-text">Prix moyen d’achat des différents types de produits bois énergie selon les opérateurs (ariary):</p>
                                </div>
                              </div>
                           </div>  

                            <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°11</h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Montant total de taxes perçues relatifs aux activités liées au Bois Energie (ariary):</p>
                                </div>
                              </div>
                          </div>
                          <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°12</h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Taux de produits Bois Energie illégaux saisis (%)</p>
                                </div>
                              </div>
                          </div>

                          <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°13</h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Quantité des produits bois énergie en circulation (kg)</p>
                                </div>
                              </div>
                          </div>
                      </div> 

                        <div class="row">
                          <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°15 </h5>
                                </div>
                                <div class="card-body">
                                  <h6 class="card-title"></h6>

                                  <p class="card-text">Quantité totale annuelle consommée en Bois Energie (kg):  </p>
                                </div>
                              </div>
                           </div>  
                          <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°16</h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">Dépenses moyennes annuelles par type de bois énergie (ariary)</p>
                                </div>
                              </div>
                           </div>   
                           <div class="col" >
                              <div class="card">
                                <div class="card-header">
                                  <h5 class="card-title m-0">Indicateur N°17 </h5>
                                </div>
                                <div class="card-body">

                                  <p class="card-text">Taux de personnes touchées par des maladies causées par l’utilisation de Bois Energie (%) </p>
                                </div>
                              </div>
                           </div>  

                          </div>

                   </div> <!--bois-->
                 </div><!--div container-->
        </div><
</div>
</div>
<?php
  include 'login.php';
  include 'register.php';
  $content = ob_get_clean();
  include 'baseLayoutWhitOutMenu.php';
?>
<script type="text/javascript">
  var assetUrl = "<?php echo home_base_url(); ?>";
  $(document).ready(function () {

    $( "#btnShow" ).click(function() {
        $("#loginMOdal").modal("show");
        $("#loginMOdal").appendTo("body");
    });

    $('#ind1-h').hide();

    $(".card-link").on( 'click',function(){
         $('#ind1-a,#ind1-h').toggle()
      }
    );

    $("#boisEnergie").change(function(event) {
        var checkbox = event.target;
        var elem = document.getElementById('bois');

        elem.style.display = this.checked ? 'block' : 'none';
    });

      $("#alternativeCuisson").change(function(event) {
          var checkbox = event.target;
          var elem = document.getElementById('alternative');

          elem.style.display = this.checked ? 'block' : 'none';
      });


      $("#equipementCuisson").change(function(event) {
          var checkbox = event.target;
          var elem = document.getElementById('equipement');

          elem.style.display = this.checked ? 'block' : 'none';
      });

/*MAP

   /* MAP*/
/*************/

    // defini map niveau region 
      
  var map = L.map('map').setView([-18.7785704655, 46.830888048], 4.1);
  var markerGroup = L.featureGroup().addTo(map);
 
   var legend = L.control({position: 'bottomleft'});
    legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend');
    labels = ['<strong>Zone reboisée</strong>'],
    categories = ['foret'];

    for (var i = 0; i < categories.length; i++) {

            div.innerHTML += 
            labels.push(
                '<i class="fa fa-circle" style="color:' + getColor(categories[i]) + '"></i> ' +
            (categories[i] ? categories[i] : '+'));

        }
        div.innerHTML = labels.join('<br>');


    return div;
    };


  addLayerNational().addTo(map);
  var pathData="";
   addJsonLayer(pathData);
   //addCentroid().addTo(map);
  // addText().addTo(map);
 
 
  
   
   function style1(feature) {
    return {
        fillColor: '#ffff',
        weight: 0.5,
        opacity: 1,
        color: 'black',
        dashArray: '2',
        fillOpacity: 0
    };
}

   function style(feature,shapefile) {
    return {
        fillColor: getColor(shapefile),
        color: getColor(shapefile),
        clickable:true
    };
  
}

   function addLayerNational (){
     let madagascarlayer = L.tileLayer(assetUrl+'images/madagascar/{z}/{x}/{y}.png', {
        
                      minZoom: 5,
                      maxZoom: 10,
                      tms: false,
                      attribution: 'Generated by HayTic'
                     
                    });
      return madagascarlayer;
   }

   function addShapeFile(tilesName){

    var shpfile = new L.Shapefile(assetUrl+'images/'+tilesName+'.zip', {

      style: style,
      onEachFeature: function(feature, layer) {

         layer.setStyle({fillColor: getColor(tilesName),
                         color: getColor(tilesName),
                         clickable:true,
                         weight:1});
        
        if (feature.properties) {
           layer.bindPopup(Object.keys(feature.properties).map(function(k) {
            return k + ": " + feature.properties[k];
          }).join("<br />"), {
            maxHeight: 200
          });
        }
      }
    });
    return shpfile;
  
   }

var datalayer;
var layers = L.layerGroup().addTo(map);

function addJsonLayer(pathData){

            
  $.getJSON(pathData,function(data){

  if(map.hasLayer(datalayer)){
         map.removeLayer(datalayer);
    }

  datalayer = L.geoJson(data ,{
     style: style1,
    onEachFeature: function(feature, featureLayer) {  

    
      if (feature.properties) {

           featureLayer.bindPopup(Object.keys(feature.properties).map(function(k) {

                  return k + ": " + feature.properties[k];
                }).join("<br />"), {
                  maxHeight: 200
                }).openPopup();
              }
          

          /* featureLayer.on('click',function(e){
            clickOnMap(feature.properties);
           
          });*/
       
   }
  }).addTo(layers);

  map.fitBounds(datalayer.getBounds());
});
}



/*function addCentroid(){

  var regionCentro=L.geoJson(regioncentro, {
  pointToLayer: function (feature, latlng) {

    return L.circleMarker(latlng,{
      radius : 4, 
      color : '#005824',
      fillOpacity: 1,
      fillColor: '#41AE76'
     });
   }
    });

  return regionCentro;
}

function addText(){

  var regionText=L.geoJson(regioncentro, {
  pointToLayer: function (feature, latlng) {

    var icon = L.divIcon({
         iconSize:null,
         html:'<div>'+feature.properties.REGION+'</div>'
       });
 
    return L.marker(latlng,{
      icon:icon
     });
   }
    });

  return regionText;
}*/


$(document).on('click', '[name="aggregation"]', function () {

         
        if($(this).val()==='Regional'){
           layers.clearLayers();
           var pathData=assetUrl+"data/region.geojson";
           addJsonLayer(pathData);
        }
        else if($(this).val()==='District'){
          layers.clearLayers();
          var pathData=assetUrl+"data/districtattribute.geojson";
           addJsonLayer(pathData);
        }
        else{
         layers.clearLayers();
          var pathData="";
            addJsonLayer(pathData);
        }
});


});



</script>


<!-- Page specific script -->
<script>
  $(function () {
    /* uPlot
     * -------
     * Here we will create a few charts using uPlot
     */

    function getSize(elementId) {
      return {
        width: 1000,
        height: 120,
      }
    }

    let data = [
      [0, 1, 2, 3, 4, 5, 6],
      [28, 48, 40, 19, 86, 27, 90],
      [65, 59, 80, 81, 56, 55, 40]
    ];

    //--------------
    //- AREA CHART -
    //--------------

    const optsAreaChart = {
      ... getSize('areaChart'),
      scales: {
        x: {
          time: false,
        },
        y: {
          range: [0, 100],
        },
      },
      series: [
        {},
        {
          fill: 'rgba(60,141,188,0.7)',
          stroke: 'rgba(60,141,188,1)',
        },
        {
          stroke: '#c1c7d1',
          fill: 'rgba(210, 214, 222, .7)',
        },
      ],
    };

    let areaChart = new uPlot(optsAreaChart, data, document.getElementById('areaChart'));

    window.addEventListener("resize", e => {
      areaChart.setSize(getSize('areaChart'));
    });
  })
</script>