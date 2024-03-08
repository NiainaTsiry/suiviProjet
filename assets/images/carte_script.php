  <aside class="main-sidebar sidebar-lightblue">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Oepa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="overflow-x: hidden;margin-left: auto;
    margin-right: auto;">
      <!-- Sidebar user (optional) -->
     


        <div style="float:left">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Madagascar
                </h3>
              
                <!-- /.card-tools -->
              </div>

                <div id="map" style="width:300px;height: 450px;background: white;display:none " ></div>

         </div>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>




   <script type="text/javascript">

  var ASSET_URL = "<?php echo asset_url(); ?>";
  var selectDistrict='';
  var selectRegion='';


    // defini map niveau region 
      
  var map = L.map('map').setView([-18.7785704655, 46.830888048], 6.0);
      var madagascarlayer = L.tileLayer(ASSET_URL+'images/region/{z}/{x}/{y}.png', {
        
                      minZoom: 5,
                      maxZoom: 7,
                      tms: false,
                      attribution: 'Generated by HaytTic',
                      style:function (feature) {
                        return { color: 'red', weight: 4 };
                      }
                    });
     

 // defini légende par zone 

 var legend = L.control({position: 'bottomleft'});
    legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend');
    labels = ['<strong>Zone d\'intervention</strong>'],
    categories = ['Zone_Nord','Zone_Sud'];

    for (var i = 0; i < categories.length; i++) {

            div.innerHTML += 
            labels.push(
                '<i class="fa fa-circle" style="color:' + getColor(categories[i]) + '"></i> ' +
            (categories[i] ? categories[i] : '+'));

        }
        div.innerHTML = labels.join('<br>');


    return div;
    };

  // defini pathdata geojson antsoina ery ambany

var pathDataRegion="<?php echo asset_url();?>"+"data/region.geojson";

getJsonLayer(pathDataRegion);
madagascarlayer.addTo(map);
legend.addTo(map);


 map.on("zoomend", function(e){ // rehefe dezoomer na dia miverina region
      
  if(map.getZoom() < 7 ){ //Level 6 is the treshold 
    getJsonLayer(pathDataRegion);
    madagascarlayer.addTo(map);
     }
    });


 // traitement fichier geojson


function getJsonLayer(pathData){

  $.getJSON(pathData,function(data){


  var datalayer = L.geoJson(data ,{

    style: style,// css carte defin ery ambony
    onEachFeature: function(feature, featureLayer) {// parcours layers dans geojson

      // mandoko zone ilaine dia mamoaka anarana onmouseover zay region hiasana ihany
 
       
    if (feature.properties.REGION=='Boeny' ||feature.properties.REGION=='Diana' ){

       featureLayer.setStyle({fillColor: getColor('Zone_Nord')});

      
        featureLayer.on('mouseover',function(){
        
        if (typeof feature.properties.COMMUNE === 'undefined'){

           featureLayer.bindPopup('Region '+feature.properties.REGION).openPopup();
        }
        else{
          featureLayer.bindPopup('Commune '+feature.properties.COMMUNE).openPopup();
        }
      

      });   // action on click sur la carte

           featureLayer.on('click',function(){

            clickOnMap(feature.properties);

          });
    
    }

      if (feature.properties.REGION=='Menabe' ||feature.properties.REGION=='Atsimo Andrefana' ){

       featureLayer.setStyle({fillColor:getColor('Zone_Sud')});
      
        featureLayer.on('mouseover',function(){


        if (typeof  feature.properties.COMMUNE === 'undefined'){

           featureLayer.bindPopup('Région '+feature.properties.REGION).openPopup();
        }
        else{

          featureLayer.bindPopup('Commune '+feature.properties.COMMUNE).openPopup();
        }
        
      

      });

           featureLayer.on('click',function(){
        
             clickOnMap(feature.properties);

      });
    
    }
    

     
    }
  }).addTo(map);


  map.fitBounds(datalayer.getBounds());



});
}


function  clickOnMap(data){ // raha region no clicquer na dia afficher na ny commune

  var region = data['REGION'];
  var communelayerselected=setCommuneLayer(region);
  var pathData = setJsonCommuneLayer(region); //prendre layer dynamiquement suivant region
  var site =  data['P_CODE']; //code_commune ou code_region
  
          getJsonLayer(pathData);
         // map.removeLayer(madagascarlayer);
          communelayerselected.addTo(map);


        //    $( "#data-container" ).load(window.location.href + " #data-container" );
          updateGraphSite(site);
        

}

function setCommuneLayer(region){


   var communeLayer =  L.tileLayer(ASSET_URL+'images/commune/'+region+'/{z}/{x}/{y}.png', {
        
        minZoom: 5,
        maxZoom: 10,
        tms: false,
        attribution: 'Generated by HaytTic',
        style:function (feature) {
          return { color: 'red', weight: 4 };
        }
      });
   return communeLayer;

}

function setJsonCommuneLayer(region){
  var regionName = region;
   regionName=regionName.replace(/\s/g,"");
  var pathDataCommune="<?php echo asset_url();?>"+"data/commune/"+regionName+".geojson";
  return pathDataCommune;
}
   




function style(feature) {

   
    return {
        fillColor: '#ffff',
        weight: 0.5,
        opacity: 1,
        color: 'black',
        dashArray: '2',
        fillOpacity: 2
    };
  
}

function getColor(d) { // mandoko

        return d === 'Zone_Nord'  ? "#de2d26" :
               d === 'Zone_Sud'  ? "#377eb8" : "#ffff" ;
    }


function updateGraphSite(site) {

     
     // $("#loader").show();

      $.ajax({
            type: "POST",
            url: "<?php echo site_url("donnees/loadDataGraph") ?>",
            data: {searchByYear : $('#searchByYear').val(),
                   searchByProduit : $('#searchByProduit').val(),
                   searchByConservation :$('#searchByConservation').val(),
                   searchByActeur :$('#searchByActeur').val(),
                 //  searchByTaille :$('#searchByTaille').val(),
                   searchByZone : $('#searchByZone').val(),
                   searchByPresentation : $('#searchByPresentation').val(),
                   searchByEspeces : $('#searchByEspeces').val(),
                   searchByMarche : $('#searchByMarche').val(),
                   searchByPaysDestination : $('#searchByPaysDestination').val(),
                   searchByDestination : $('#searchByDestination').val(),
                   searchBySiteCollecte : site,
                    searchByendYear :$("#searchByendYear").val(),
                   //searchBySiteDebarquement : $('#searchBySiteDebarquement').val()
                   },
           
        }).done(function(response) {

    
                        response=JSON.parse(response);
                         var x = [];
                         var y = [];


                        for(var i in response) {

                          x.push(response[i].x);
                          y.push(response[i].y);
                        }

                           var salesGraphChartData = {
                            labels: x,
                            datasets: [
                              {
                                label: site +'- Prix moyen '+ $( "#searchByProduit option:selected" ).text() +' (en Ariary)',
                                fill: false,
                                borderWidth: 2,
                                lineTension: 0,
                                spanGaps: true,
                                borderColor: '#C08181',
                                pointRadius: 3,
                                pointHoverRadius: 7,
                                pointColor: '#C08181',
                                pointBackgroundColor: '#C08181',
                                data: y
                              }
                            ]
                     }

        var salesGraphChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
              display: true
            },
            scales: {
              xAxes: [{
                ticks: {
                  fontColor: '#efefef'
                },
                gridLines: {
                  display: false,
                  color: '#efefef',
                  drawBorder: false
                }
              }],
              yAxes: [{
                ticks: {
                  stepSize: 1000,
                  fontColor: '#efefef'
                },
                gridLines: {
                  display: true,
                  color: '#efefef',
                  drawBorder: false
                }
              }]
            }
          }

              var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d');

            if (barGraph){
              barGraph.data = y;
              barGraph.update();
            }
            else {

           var barGraph = new Chart(salesGraphChartCanvas, { 
                            type: 'line',
                            data: salesGraphChartData,
                            options: salesGraphChartOptions
                          });
            }

       // $("#loader").hide();
            
        })


       
            
        }


  


</script>