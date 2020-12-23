'use strict'

function emptyTags()
{
    localStorage.removeItem('tags');
}


document.addEventListener('DOMContentLoaded', () => {

    let createArticle = document.getElementById('newArticle');
    createArticle.addEventListener('click', emptyTags);
});


