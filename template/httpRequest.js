
/////////////// DEBUT ALIGNEMENT -- PARTENAIRE/////////////
function getHtmlAlgnement(code , update){
    let divM = document.createElement("div");
    divM.className="row";
    let div = document.createElement("div");
    div.className = "col-md-12";
    let label = document.createElement("label");
    label.className = "form-label";
    label.textContent = "Entrer le Nom du partenaire";
    label.style = "font-weight: bold;";
    let input = document.createElement("input");
    input.type="text";
    input.required = true;
    input.id = "nom_parte";
    input.className = "form-control";
    div.appendChild(label);
    div.appendChild(input);
    let div1 = document.createElement("div");
    div1.className = "col-md-12";
    div1.style="padding:10px;";
    let button = document.createElement("button");
    button.className = "btn btn-warning";
    button.textContent = "aligner";
    button.id = "btn-aligner";
    button.onclick = function() {
        update(code);
    }
    div1.appendChild(button);
    divM.appendChild(div);
    divM.appendChild(div1);
    return divM;
}
function alignementPartenaire(lien,code,patenaire,actualisation){
    let value = { code:code,partenaire:patenaire};
   // alert(JSON.stringify(value));
    fetch(lien + "index.php/suiviProjet.php/alignement", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(value)
    }).then(res => res.text()) 
    .then(data => {
        if(patenaire == ''){
            alert("entrer le nom du partenaire");
        }else{
            actualisation();
        }
    })
    .catch(error => {
        console.error('Error:', error); 
    });
}


///////////////FIN ALIGNEMENT -- PARTENAIRE/////////////

function listeProjet(lien, secteur,type, debut, fin,region,district,num,content,afficheModal) {
    let value = { secteurs: secteur ,type:type,debut:debut,fin:fin,district:district,region:region,num:num};
    fetch(lien + "index.php/suiviProjet.php/liste_projet/modal", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(value)
    }).then(res => res.text()) 
    .then(data => {
        content.innerHTML = data;
        afficheModal();
    })
    .catch(error => {
        console.error('Error:', error); 
    });

}

/////////////// DEBUT ALIGNEMENT -- ETUDE/////////////
function getHtmlEtude(code , updateEtudes){
    let divM = document.createElement("div");
    divM.className="row";
    let div = document.createElement("div");
    div.className = "col-md-12";
    let labelD = document.createElement("label");
    labelD.className = "form-label";
    labelD.textContent = "Date d'etude";
    labelD.style = "font-weight: bold;";
    let inputD = document.createElement("input");
    inputD.type="date";
    inputD.required = true;
    inputD.id = "dateetude";
    inputD.className = "form-control";
    div.appendChild(labelD);
    div.appendChild(inputD);
    div.className = "col-md-12";
    let labelR = document.createElement("label");
    labelR.className = "form-label";
    labelR.textContent = "Reference";
    labelR.style = "font-weight: bold;";
    let inputR = document.createElement("input");
    inputR.type="text";
    inputR.required = true;
    inputR.id = "reference";
    inputR.className = "form-control";
    div.appendChild(labelR);
    div.appendChild(inputR);
    div.className = "col-md-12";
    let labelM = document.createElement("label");
    labelM.className = "form-label";
    labelM.textContent = "Montant marche";
    labelM.style = "font-weight: bold;";
    let inputM = document.createElement("input");
    inputM.type="number";
    inputM.required = true;
    inputM.id = "montant";
    inputM.className = "form-control";
    div.appendChild(labelM);
    div.appendChild(inputM);
    div.className = "col-md-12";
    let labelDel = document.createElement("label");
    labelDel.className = "form-label";
    labelDel.textContent = "Delai d'éxecution";
    labelDel.style = "font-weight: bold;";
    let inputDel = document.createElement("input");
    inputDel.type="number";
    inputDel.required = true;
    inputDel.id = "delai";
    inputDel.className = "form-control";
    div.appendChild(labelDel);
    div.appendChild(inputDel);
    div.className = "col-md-12";
    let labelNb = document.createElement("label");
    labelNb.className = "form-label";
    labelNb.textContent = "Nombres beneficiaires";
    labelNb.style = "font-weight: bold;";
    let inputB = document.createElement("input");
    inputB.type="number";
    inputB.required = true;
    inputB.id = "beneficiaire";
    inputB.className = "form-control";
    div.appendChild(labelNb);
    div.appendChild(inputB);
    let labelNi = document.createElement("label");
    labelNi.className = "form-label";
    labelNi.textContent = "Nombres infrastructures";
    labelNi.style = "font-weight: bold;";
    let inputI = document.createElement("input");
    inputI.type="number";
    inputI.required = true;
    inputI.id = "infra";
    inputI.className = "form-control";
    div.appendChild(labelNi);
    div.appendChild(inputI);
    let div1 = document.createElement("div");
    div1.className = "col-md-12";
    div1.style="padding:10px;";
    let button = document.createElement("button");
    button.className = "btn btn-warning";
    button.textContent = "Rattacher";
    button.id = "btn-aligner";
    button.onclick = function() {
        updateEtudes(code);
    }
    div1.appendChild(button);
    divM.appendChild(div);
    divM.appendChild(div1);
    return divM;
}
function rattachemetnEtude(lien,code,date,reference,montant,delai,beneficiaire,infra,actualisation){
    let value = { code:code,date:date,reference:reference,montant:montant,delai:delai,beneficiaire:beneficiaire,infra:infra};
   // alert(JSON.stringify(value));
    fetch(lien + "index.php/suiviProjet.php/rattachement", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(value)
    }).then(res => res.text()) 
    .then(data => {
        if(date == '' || reference == '' || montant == '' || delai == '' || beneficiaire == ''  || infra == '' ){
            alert("Veillez completer les champs");
        }else{
            actualisation();
        }
    })
    .catch(error => {
        console.error('Error:', error); 
    });
}


///////////////FIN ALIGNEMENT -- ETUDE/////////////


function getData(lien, secteur,type, debut, fin, addDataRegionToMaps, icon,updateValeurTotal,updateNombreParSecteur) {
    let value = { secteurs: secteur ,type:type,debut:debut,fin:fin};
   // alert(JSON.stringify(value));
    fetch(lien + "index.php/suiviProjet.php/jsonNombreProjet", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(value)
    }).then(res => res.json()) 
        .then(data => {
            let value = JSON.parse(JSON.stringify(data));
            //alert(value.total);
            updateValeurTotal(value.total);
            updateNombreParSecteur(value.secteurs);
            addDataRegionToMaps(value.data, icon); 
        })
        .catch(error => {
            console.error('Error:', error); 
        });
}

function getDataDistrict(lien, secteur,type, debut, fin, addDataDistrictToMaps, icon,updateValeurTotal,updateNombreParSecteur) {
    let value = { secteurs: secteur ,type:type,debut:debut,fin:fin};
    fetch(lien + "index.php/suiviProjet.php/jsonNombreProjet/district", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(value)
    }).then(res => res.json()) 
        .then(data => {
            let value = JSON.parse(JSON.stringify(data));
            updateValeurTotal(value.total);
            updateNombreParSecteur(value.secteurs);
            addDataDistrictToMaps(value.data, icon); 
        })
        .catch(error => {
            console.error('Error:', error); 
        });
}
