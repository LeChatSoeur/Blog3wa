'use strict'

let inputNameNav    = document.getElementById('inputNameNav')
let inputSlug       = document.getElementById('inputSlug');

let slug = document.querySelector('#PreviewSlug>p>span')

let input;



    function previewNameNav(input)
    {
        inputNameNav.value = input;
    }



    function previewSlug()
    {
        input = inputSlug.value;

        slug.textContent = (inputSlug.value).toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')

        for(let i=0; i<(input).length; i++)
        {
            if( (input[i] === "-")  && (input[i - 1] === "-")
                                    ||
                (input[i] === " ")  && (input[i - 1] === " ")
                                    ||
                (input[i] === " ")  && (input[i - 1] === "-")
                                    ||
                (input[i] === "-")  && (input[i - 1] === " "))
            {
                input = "";
                slug.textContent = "";

            }
        }
        previewNameNav(input)
    }


    ////////////////////////////////////////////////////////////
    ////////////////////// CODE PRINCIPAL //////////////////////
    ////////////////////////////////////////////////////////////

    document.addEventListener('DOMContentLoaded', () => {

        inputSlug.addEventListener('input',  previewSlug);

});
