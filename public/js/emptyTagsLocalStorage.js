'use strict'

let createArticle            = document.getElementById('newArticle');
createArticle.addEventListener('click', emptyTags);


function emptyTags()
{
    localStorage.removeItem('tags');
}
