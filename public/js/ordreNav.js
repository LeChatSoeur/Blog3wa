'use strict'

let orderJs = [];
let orderId = [];
let order = 0;
let checkbox;

let checkboxNav = document.querySelectorAll('.checkboxOrderNav');
let buttonValid = document.getElementById('buttonValid')



function forAjax(checkboxNav)
{
        for (let i = 0; i < orderId.length; i++)
        {
            let orderBD = orderId[i]

            order = order + 1;

            // on lance autant de requête ajax qu'il y a dans le tableau orderId'
            ajax(orderBD, order)

        }

    // réinitialise les checkbox non séléctionnée
    for (let i = 0; i < checkboxNav.length; i++)
    {
        let checkboxId = checkboxNav[i].checked;

        if(checkboxId === false)
        {

            let orderBD = checkboxNav[i].dataset.id
            order = null;
            ajax(orderBD, order)
        }
    }

    // on réinitialise order pour les prochaines requêtes
    order = 0;
}

function prepare(checkbox)
{
    let indexSlugs  = document.querySelectorAll('.indexSlug');
    let checkboxNameNav = checkbox.dataset.namenav;


    // si le dataset de checkbox est égal au dataset du slug alors
    // on appel preview() pour afficher dans previewNav

    for (let i = 0; i < indexSlugs.length; i++)
    {
       let indexSlug = indexSlugs[i].dataset.namenav;
        if(checkboxNameNav === indexSlug)
        {
            checked(checkboxNameNav, checkbox)
        }
    }
}


function checked(checkboxNameNav, checkbox)
{
    let previewNav = document.getElementById('previewNav');
    let p = document.createElement('p');


    previewNav.append(p);


    if(checkbox.checked === true)
    {
        orderJs.push(checkboxNameNav);

        orderId.push(checkbox.dataset.id)
        addPreview(checkboxNameNav, p)
    }


    if(checkbox.checked === false)
    {
        // si on décoche une checkbox on supprime l'élement dans
        // le tableau id = orderId;
        // le tableau nom = orderJs;
        let index = orderJs.indexOf(checkboxNameNav)

        if (index > -1)
        {

            orderId.splice(index,1)
            orderJs.splice(index, 1);
            deletePreview(p, previewNav)
        }
    }
}


function addPreview(checkboxNameNav, p)
{
    p.textContent += checkboxNameNav;
}


function deletePreview(p, previewNav)
{
    previewNav.innerHTML = "";

    for(let i=0; i< orderJs.length; i++)
    {
        previewNav.innerHTML += `<p>${orderJs[i]}"</p>`;

    }
}


function ajax(orderBD, order)
{

    let _token  = document.querySelector("input[name='_token']").value
    const url   = 'gerer-le-menu/' + orderBD;


    const formData = new FormData();
    let data = JSON.stringify(order);


    formData.append("_token", _token);
    formData.append("order", data);

    let request = new Request(url, {
        method: "post",
        body: formData
    });



    fetch(request)
        .then(response => {
            return response.json();
        })
        .then(json => {
            console.log('retour js ok ')
        })
        .catch(error => console.error(error));
}



        ////////////////////////////////////////////////////////////
        ////////////////////// CODE PRINCIPAL //////////////////////
        ////////////////////////////////////////////////////////////


document.addEventListener('DOMContentLoaded', () => {


    for (let i = 0; i < checkboxNav.length; i++) {
        checkboxNav[i].addEventListener("CheckboxStateChange", function () {

            checkbox = checkboxNav[i];
            prepare(checkbox)
        });
    }


    buttonValid.addEventListener('click', function(){
        forAjax(checkboxNav)
    })
});
