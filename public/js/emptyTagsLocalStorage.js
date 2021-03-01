'use strict'
// on vide le localstorage à chaque nouvel article
function emptyTags()
{
    localStorage.removeItem('tags');
}


document.addEventListener('DOMContentLoaded', () => {

    let createArticle = document.getElementById('newArticle');
    createArticle.addEventListener('click', emptyTags);
});


