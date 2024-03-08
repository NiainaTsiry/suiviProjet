var url = "";
export var map = L.map('map').setView([-18.9167, 47.5167], 6);
L.tileLayer('', {
    maxZoom: 19, minZoom: 6,
}).addTo(map);

export async function reinitialisationMap() {
    listCercle.forEach(element => {
        map.removeLayer(element);
    });
    listIcon.forEach(element => {
        map.removeLayer(element);
    });
}
export async function repaint() {
    //map.invalidateSize();
}

var listIcon = [];
var listTitreRegion = [];
var listCercle = [];

var listTitreDistrict = [];

export async function afficheRegion(data, lienIcon) {
    reinitialisationMap();
    listTitreDistrict.forEach(element => {
        map.removeLayer(element);
    });
    map.removeLayer(geoJSONDistrict);
    addDataRegionToMaps(data, lienIcon);
}
export async function afficheDistrict(data, lienIcon) {
    reinitialisationMap();
    listTitreDistrict.forEach(element => {
        map.removeLayer(element);
    });
    addDataDistrictToMaps(data, lienIcon);
    geoJSONDistrict.addTo(map);
    geoJSONRegion.bringToFront();
}
export async function addDataDistrictToMaps(data, lienIcon) {
    let i = 0;
    let donneNombre = data.map(item => item.secteurs.map(row => parseInt(row.nombre))).flat();
    let maxValue = calculeMax(donneNombre);
    let rayonMax = 30000;
    let yScale = d3.scaleLinear().domain([0, maxValue]).range([0, rayonMax]);
    listIcon = [];
    listTitreDistrict = [];
    listCercle = [];
    for (i = 0; i < data.length; i++) {
        let value = data[i];
        let longitude = value.district.longitude_d;
        let latitude = value.district.latitude_d;
        let district = value.district.district_libelle;
        let region = value.district.region_libelle;
        let marker = addMarkerIcon(map, district, longitude, latitude, lienIcon);
        marker.bindPopup(createPopupTitre(region,district)+ createPopupSecteursNombre(value.secteurs)
        +generateButtonDetails(value.district.region_id,value.district.district_id));
        listIcon.push(marker);
        listTitreDistrict.push(addMarkerTitre(map, district, longitude, latitude, 'text-label-district'));
        generateSecteurs(yScale, longitude, latitude, value.secteurs);
    }
}
export async function addDataRegionToMaps(data, lienIcon) {
   // map.setZoom(6);
    //map.fitBounds(geoJSONRegion.getBounds());
    let i = 0;
    let donneNombre = data.map(item => item.secteurs.map(row => parseInt(row.nombre))).flat();
    let maxValue = calculeMax(donneNombre);
    let rayonMax = 90000;
    let yScale = d3.scaleLinear().domain([0, maxValue]).range([0, 90000]);
    listIcon = [];
    listTitreRegion = [];
    listCercle = [];
    for (i = 0; i < data.length; i++) {
        let value = data[i];
        let longitude = value.region.longitude;
        let latitude = value.region.latitude;
        let region = value.region.region_libelle;
        let marker = addMarkerIcon(map, region, longitude, latitude, lienIcon);
        marker.bindPopup(createPopupTitre(region,'')+ createPopupSecteursNombre(value.secteurs));
        listIcon.push(marker);
        listTitreRegion.push(addMarkerTitre(map, region, longitude, latitude, 'text-label-region'));
        generateSecteurs(yScale, longitude, latitude, value.secteurs);
    }
}
function generateButtonDetails(region,district) {
    let html = "<ul class='list-group' style='width: 230px;'>";
    html += "<li class='list-group-item d-flex justify-content-between align-items-center'>";
    html += "<button class='btn btn-success' onclick=\"afficheListe('" + region + "','" + district + "')\">voir details</button>";
    html += "</li>";
    html += "</ul>";
    return html;
}
function createPopupTitre(region,district){
    let html = "<div style='font-weight:bold;color:gray;'>";
    html+="<span style='color:black'>Region : </span>"+region;
    if(district != ''){
        html+="<br/>";
        html+="<span style='color:black'>District</span>"+district;
    }
    html+="</div>";
    return html;
}
function createPopupSecteursNombre(secteurs) {
    let html = "<ul class='list-group' style='width: 230px;'>";
    secteurs.forEach(element => {
        html += "<li class='list-group-item d-flex justify-content-between align-items-center'>";
        html +="<span style='color:"+element.couleur+"'>"+element.secteur_libelle+"</span>";
        html += "<span class='badge rounded-pill' style='background-color:"+element.couleur+";color:#fff'>";
        html+=element.nombre;
        html += "</span>";
        html += "</li>";
    });
    html += "</ul>";
    return html;
}

async function generateSecteurs(yScale, longitude, latitude, dataSec) {
    let i = 0;
    for (i = 0; i < dataSec.length; i++) {
        listCercle.push(addCircle(longitude, latitude, yScale(parseInt(dataSec[i].nombre)), dataSec[i].couleur, dataSec[i].nombre, dataSec[i].secteur_libelle));
    }
}
function calculeMax(val) {
    let max = Math.max(...val);
    return max;
}
var boundsRegion = null;

export function setUrl(urls) {
    url = urls;
}
var geoJSONRegion = null;
var geoJSONDistrict = null;
export function generateGeoJsonDistrict(data, couleurDistrict) {
    geoJSONDistrict = L.geoJSON(data, {
        style: function (feature) {
            return {
                fillColor: 'white',
                weight: 1,
                color: couleurDistrict,
            };
        }
    });
    geoJSONDistrict.on('mouseover', function(event) {
        event.layer.setStyle({ color: couleurDistrict, fillColor: couleurDistrict,weight: 3 });
    });
    
    geoJSONDistrict.on('mouseout', function(event) {
        geoJSONDistrict.resetStyle(event.layer);
    });
}
export function addGeoJsonBondaries(data, pathJsonDstict, affDistrictCheked, couleurRegion, couleurDistrict, affDistrict) {
    $.getJSON(pathJsonDstict, function (data) {
        generateGeoJsonDistrict(data, couleurDistrict);
    });
    geoJSONRegion = L.geoJSON(data, {
        style: function (feature) {
            return {
                fillColor: 'white',
                weight: 1,
                color: couleurRegion,
            };
        }
    }).addTo(map);

    map.fitBounds(geoJSONRegion.getBounds());
    let color = '';
    geoJSONRegion.on('mouseover', function(event) {
        //event.layer.setStyle({ color: 'black' });
        event.layer.setStyle({ color: couleurRegion, fillColor: couleurRegion,weight: 3 });
        let mouseX = event.originalEvent.clientX;
        let mouseY = event.originalEvent.clientY;
       // event.layer.bindTooltip("REGION : "+event.layer.feature.properties.REGION+" <br/> Cliquer*")
     //.openTooltip();
    });

    
    geoJSONRegion.on('mouseout', function(event) {
        geoJSONRegion.resetStyle(event.layer);
        //event.layer.unbindTooltip();
    });
    geoJSONRegion.on('click', function (event) {
        map.fitBounds(event.layer.getBounds());
    });
    
}

function addMarkerIcon(maps, title, longitude, latitude, lienIcon) {
    let icons = L.icon({
        iconUrl: lienIcon,
        iconSize: [15, 15],
        iconAnchor: [7, 15]
    });
    let marker = L.marker(
        [parseFloat(latitude), parseFloat(longitude)], { alt: '', icon: icons, title: title }
    )
        .addTo(maps);
    return marker;
}

function addCircle(longitude, latitude, rayon, color, nombre, secteur) {
    if (nombre > 0) {
        let cercle = L.circle([parseFloat(latitude), parseFloat(longitude)], { radius: rayon, color: color })
            .addTo(map);
        let popup = L.popup();
        cercle.on('mouseover', function (e) {
            popup.setLatLng(e.latlng)
                .setContent(secteur + " : " + nombre)
                .openOn(map);
        });
        cercle.on('mouseout', function (e) {
            map.closePopup(popup);
        });
        return cercle;
    } else {
        return (L.circle([parseFloat(latitude), parseFloat(longitude)], { radius: rayon }));
    }
}

function addMarkerTitre(maps, title, longitude, latitude, className) {
    let icons = L.divIcon({
        className: className,
        html: title
    })
    let marker = L.marker(
        [parseFloat(latitude), parseFloat(longitude)],
        {
            alt: ''
            , icon: icons
        }
    ).addTo(maps);
    return marker;
}