'use strict'

let PreLocalStorage = []
let previewTag      = document.querySelector('.previewTag');
let inputHiddenTags = document.querySelector('.inputHiddenTags');
let tags;
let json            = localStorage.getItem('tags');


function loadLocalStorage()
{
    // lors du chargement, s'il n'est pas " null " le localstorage est chargé,
    // puis " parse " pour ravoir un tableau et enfin recharger sur la page
    if(json !== null)
    {

        json = JSON.parse(json);
        for(let i=0; i < json.length; i++)
        {
            let tableau = json[i]
            addLocalStorage(tableau)
        }
    }
}


function addLocalStorage(tableau)
{
    // si la valeur n'existe pas on push sinon on efface textarea
    if(PreLocalStorage.indexOf(tableau) === -1)
    {
        PreLocalStorage.push(tableau)
        // Serialization pour convertir en Json
        let addLocalStorage = JSON.stringify(PreLocalStorage)
        localStorage.setItem("tags", addLocalStorage)
        inputHiddenTags.setAttribute('value', JSON.parse(addLocalStorage));
        posterTag(tableau)

    } else
    {
        tags.value = "";
    }
}

// on affiche le tag une fois validé
function posterTag(tableau)
{
    let dataName = tableau
    let div      = document.createElement('div');

    div.classList.add('div')
    div.setAttribute('data-name', dataName);

    previewTag.append(div);

    div.innerHTML = tableau;
    // on efface textarea pour une nouvelle saisie après avoir afficher le tag
    tags.value = ""
}

//on supprime le tag
function deleteTag(targetDataSet)
{
    let divTags = document.querySelectorAll(`div[data-name]`)

    for(let i=0; i < divTags.length; i++)
    {
        let tagDelete = divTags[i]
        // si la valeur du button delete et de la div du tag sont les mêmes on peut supprimé
        if(targetDataSet === tagDelete.dataset.name)
        {
            // supprime l'affichage du tag
            tagDelete.remove();
            //supprime le tag dans le PreLocalStorage[}
            let id = PreLocalStorage.indexOf(tagDelete.dataset.name);
            PreLocalStorage.splice(id,1)
            //actualisation du localStorage en rechargeant le tableau
            let addLocalStorage = JSON.stringify(PreLocalStorage)
            localStorage.setItem("tags", addLocalStorage)

            visibiltyDivTag()
        }
    }
}


function visibiltyDivTag()
{

    if (previewTag.textContent !== "")
    {
        previewTag.style.visibility = "visible";
    }
    else
    {
        previewTag.style.visibility = "hidden";
    }
}



        ////////////////////////////////////////////////////////////
        ////////////////////// CODE PRINCIPAL //////////////////////
        ////////////////////////////////////////////////////////////




document.addEventListener('DOMContentLoaded', () => {

    tags = document.querySelector('.tagsTextarea');

    tags.addEventListener('keyup', function (e) {
        let entrer = e.keyCode
        let tag = tags.value;
        const reg = /^[a-zA-Z0-9-\s]+$/
        let tableau = tag.toLowerCase()

        //supprime les espaces avant après et dans la chaine de caractère
        tableau = tableau.replace(/\s/g,'')

        // on test le regex s'il y a un caractère autre qu'une lettre alphabétique ou un nombre on efface textarea
        if (reg.test(tag))
        {
            // Si on ecrit au minimum 4 caractères et que l'on appuie sur
            // la touche " espace " ou " entrer "
            // on déclenche la function pour ajouter au localstorage
            if ((tableau.length >= 3 && tableau.length <= 25) && (entrer === 32 || entrer === 13))
            {
                addLocalStorage(tableau);
                visibiltyDivTag()
            }
        }
        else
        {
            tags.value = ""
        }
    });


    previewTag.addEventListener('click', function (e)
    {
        let targetDataSet = e.target.dataset.name
        deleteTag(targetDataSet)
    });


    loadLocalStorage()
    visibiltyDivTag()

});






