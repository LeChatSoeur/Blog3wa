'use strict'

let pays                        = document.getElementById('pays');
let regions                     = document.getElementById('region');
let div                         = document.getElementById('categoryRegions');
let select                      = document.getElementById('region');
let selectCategoryProvinces     = document.getElementById('province');
let divCategoryProvinces        = document.getElementById('categoryProvinces');

let categoryId = pays;
let url = 'categoryAjaxRegions';




    // fonction général pour récupérer à chaque EventListener une catégorie désirée.
    function CategoryAjax(categoryId,url, select)
    {
        // récupère le token du formulaire pour valider la requête Ajax.
        let _token = document.querySelector("input[name='_token']").value;
        let id = categoryId.value;


        $.ajax({
            type: 'post',
            url : url,
            data : { id, _token  },
            success : function(json){

                let category = JSON.parse(json)
                ViewCategory(category, select);

            }
        });
    }
    // fonction général pour afficher la catégorie désirée une fois la requête Ajax exécutée.
    function ViewCategory(category, select)
    {
        console.log(category);
        console.log(select);
        let optionCategory = `<option value=''>---------</option>` ;


        for (let i = 0; i < category.length; i++)
        {
           optionCategory += `<option value="${category[i].id}">${category[i].title}</option>`;
        }
        select.innerHTML = optionCategory;
    }




////////////////////////////////////////////////////////////
////////////////////// CODE PRINCIPAL //////////////////////
////////////////////////////////////////////////////////////




document.addEventListener('DOMContentLoaded', () =>{



// au 'change' du select PAYS, la catégorie région devient visible et la requête Ajax est lancée.
    pays.addEventListener('change', function()
    {

        // si on change de pays après avoir sélectionner une région, on retire les values de la div
        // categoryProvinces et on repasse la div en 'hidden';
        if(divCategoryProvinces.style.visibility)
        {
            while(selectCategoryProvinces.firstChild)
            {
                selectCategoryProvinces.removeChild(selectCategoryProvinces.firstChild);
            }
            divCategoryProvinces.style.visibility = 'hidden';
        }

        div.style.visibility = 'visible';

        CategoryAjax(categoryId,url, select )
    });



    regions.addEventListener('change', function()
    {
        let div                 = document.getElementById('categoryProvinces');
        let select              = document.getElementById('province');
        div.style.visibility = 'visible';
        let categoryId = regions;
        let url = 'categoryAjaxProvinces'

        CategoryAjax(categoryId, url, select);
    })

});




