document.addEventListener('DOMContentLoaded', () => {

    let input = document.querySelectorAll('input');
    let finish = document.getElementById('finish');
    for (let i = 0; i < input.length; i++)
    {
        input[i].addEventListener("click", function()
        {
            let checkBox = input[i].value
            prepareLayout(checkBox)
        });
    }

    finish.addEventListener('click', ajaxFinish)
});


function prepareLayout(checkBox)
{
    let _token  = document.querySelector("input[name='_token']").value
    let valid = document.getElementById('valid');
    let divInputFile = document.getElementById('divInputFile')
    let data;
    if (checkBox === 'content-80_null' || checkBox === 'content-50_null')
    {

        data = 'Votre contenu aura une largeur 80% ou 50% en fonction de votre choix, ' +
            'cliquez sur valider pour passer a l\'étape suivante';

        divInputFile.style.visibility = "hidden";
        ajaxContent(checkBox, _token, valid);
        information(data);


    } else if (checkBox === 'content-80_header' || checkBox === 'content-50_header')
        {

            data = 'Votre contenu aura une largeur 80% ou 50% en fonction de votre choix, ' +
                    'choisissez une image et un titre puis cliquez sur valider pour passer a l\'étape suivante';

            divInputFile.style.visibility = "visible";
            prepareHeader(checkBox, _token, valid)
            information(data);
        }
}

function ajaxContent(checkBox, _token, valid)
{
    valid.addEventListener('click', function()
    {
        const url = 'saveAjaxPageDynamic';
        const formData = new FormData();

        formData.append("checkbox", checkBox );
        formData.append("_token", _token);

        ajaxChoiceLayout(url, formData);
    });
}

function information(data)
{
let p = document.querySelector('#formChoiceLayout > p')
    p.textContent = data;
}

function prepareHeader(checkBox, _token, valid)
{
    let img = document.getElementById('inputFile');

    valid.addEventListener('click', function()
    {
        const url = 'saveAjaxPageDynamic';
        const formData = new FormData();

        formData.append("img", img.files[0]);
        formData.append("checkbox", checkBox );
        formData.append("_token", _token);

        ajaxChoiceLayout(url, formData);
});

}

function ajaxChoiceLayout(url, formData)
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
    let image = json[1]
    console.log(json);
    // s'il y a une image dans json, on appelle la function 'previewImageHeader' pour un visuel.
    if(image !== false)
    {
        previewImageHeader(image)
    }
}

function previewImageHeader(image)
{

    let url = "url('" + "../../storage/"  + image + "')";
    let previewHeader = document.getElementById('previewHeader');
    previewHeader.style.display = "flex";
    previewHeader.style.backgroundImage = url;
    previewHeader.style.backgroundColor = "red";
    // on appelle heightImageHeader() pour choisir la taille voulu
    previewHeader.addEventListener('click', OnClickPositionMouse);
}

function ajaxFinish()
{
 //   recuperer toutes les valeurs et les renvoyers a php, cette fois ciune fois dans php updload par rapport a lid.
}

// récupère la position de la souris au clique.
    function OnClickPositionMouse(event) {

        let savePositionY = event.clientY;
        console.log(savePositionY);
    }





