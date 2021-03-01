'use strict'

let img             = document.getElementById('image');
let previewHeader   = document.getElementById('previewHeader');
let divInputFile    = document.getElementById('divInputFile')
let loadImage       = document.getElementById('loadImage');
let inputFile             = document.getElementById('inputFile');
let _token  = document.querySelector("input[name='_token']").value

let p               = document.querySelector('#formChoiceLayout > p')
let data;



function prepareLayout(checkBox)
{

    if (checkBox === 'content-80_null' || checkBox === 'content-50_null')
    {
        data = 'Votre contenu aura une largeur 80% ou 50% en fonction de votre choix, ' +
            'cliquez sur valider pour passer a l\'étape suivante';

        divInputFile.style.visibility = "hidden";
        previewHeader.style.display = "none";
        img.value = "";
        information(data);


    }
    else if (checkBox === 'content-80_header' || checkBox === 'content-50_header')
        {
            data = 'Votre contenu aura une largeur 80% ou 50% en fonction de votre choix, ' +
                    'choisissez une image et un titre puis cliquez sur valider pour passer a l\'étape suivante';

            divInputFile.style.visibility = "visible";
            prepareHeader(checkBox)
            information(data);
        }
}



function information(data)
{
    p.textContent = data;
}



function prepareHeader(checkBox)
{

    loadImage.addEventListener('click', function()
    {
        const url = 'creer-nouvelle-page/saveAjaxImage';
        const formData = new FormData();

        formData.append("img", inputFile.files[0]);
        formData.append("checkbox", checkBox );
        formData.append("_token", _token);

        ajax(url, formData);
    });
}



function ajax(url, formData)
{

    let request = new Request(url, {
        method: "post",
        body: formData
    });

    fetch(request)
        .then(response => {
            return response.json();
        })
        .then(json => {
            processJson(json)
        })
        .catch(error => console.error(error));
}



function processJson(json)
{

    // s'il y a une image dans json, on appelle la function 'previewImageHeader' pour un visuel.
    if(json !== false)
    {
        previewImageHeader(json)
        img.setAttribute("value", json);
    }

}

// on fait une preview de l'image en temps reel dès le retour de la reponse en ajax
function previewImageHeader(json)
{


    let url = `url("../storage/uploads/${json}")`;
    previewHeader.style.display = "flex";
    previewHeader.style.backgroundImage = url;
    previewHeader.style.width = "100%";
    previewHeader.style.height = "auto";

    // on appelle OnClickPositionMouse() pour choisir la taille voulu
    previewHeader.addEventListener('click', OnClickPositionMouse);
}


function OnClickPositionMouse(event)
{

    // récupère la hauteur de la div preview.
    let savePositionY = event.clientY;

    let heightHeader = document.getElementById('headerHeight');
    heightHeader.setAttribute("value", savePositionY);

}

////////////////////////////////////////////////////////////
////////////////////// CODE PRINCIPAL //////////////////////
////////////////////////////////////////////////////////////


document.addEventListener('DOMContentLoaded', () =>
{

    let input = document.querySelectorAll('input');
    for (let i = 0; i < input.length; i++)
    {

        input[i].addEventListener("click", function()
        {

            let checkBox = input[i].value
            prepareLayout(checkBox)
            console.log(checkBox);
        });
    }
});

