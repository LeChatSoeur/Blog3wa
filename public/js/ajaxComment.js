let parentId = null;

function prepare()
{
    let nameUser    = document.getElementById('nameUser').value;
    let email       = document.getElementById('email').value;
    let content     = document.getElementById('content').value;
    let parent_id   = document.getElementById('parent_id').value;
    let post_id     = document.getElementById('formComment').dataset['id'];


    nameUser    = nameUser.toLowerCase().trim();
    email       = email.toLowerCase().trim();
    content     = content.toLowerCase().trim();

    // la condition ci dessous est pour la validation de la function checkJson.
    if(parent_id === "")
    {
        parent_id = null;
    }


    let dataComment =
        {
            'email'     :email,
            'content'   :content,
            'nameUser'  : nameUser,
            'post_id'   : post_id,
            'parent_id' : parent_id
        };

    ajaxComment(dataComment)
}

function ajaxComment(dataComment)
{
    let _token  = document.querySelector("input[name='_token']").value
    let url = 'addAjaxComment';

    $.post( {
        url : url,
        data : { dataComment, _token  },

        success : function(json)
        {
        checkJson(json, dataComment)
        }
    });
}

function checkJson(json, dataComment)
{

    if(JSON.stringify(dataComment) === JSON.stringify(json))
    {
        commentPoster(json);
    }
    else
    {
        // on gère les erreurs
        error();
    }
}

function commentPoster(json)
{
    let divParent   = document.getElementById('commentsPoster');
    let divChild    = document.createElement('div');
    let name        = document.createElement('p');
    let date        = document.createElement('p');
    let comment     = document.createElement('p');
    let parent_id   = json['parent_id']

    //if parent_id === null c'est qu'il est lui même un parent
    if(parent_id === null)
    {
        divParent.append(divChild);
        divChild.append(name);
        divChild.append(date);
        divChild.append(comment);
    }

    // if parent_id !== null c'est qu'il est un enfant
    if(parent_id !== null)
    {
        let divCommentParent = document.getElementsByClassName('divCommentParent');

        // parcours toutes les div enfant dans divCommentParent
        for( let i = 0; i < divCommentParent.length; i++ )
        {
            let commentId = divCommentParent[i].getAttribute("id");

            // lorsque l'id de la div enfant correspond au parent_id on ajoute
            if(parent_id === commentId)
            {
                let divChild    = document.createElement('div');
                let addCommentChild = document.getElementById(commentId);
                addCommentChild.append(divChild)
                divChild.append(name);
                divChild.append(date);
                divChild.append(comment);
            }
       }
    }
    name.textContent    ='De: ' + json['nameUser'];
    date.textContent    = "Le: a l'instant";
    comment.textContent = json['content'];
    resetForm()
}

function resetForm()
{
    document.getElementById('nameUser').value = "";
    document.getElementById('email').value = "";
    document.getElementById('content').value = "";
    document.getElementById('formComment').value = "";
    document.getElementById('parent_id').value = "";
}


function error()
{
    let form = document.getElementById('formComment');
    let p = document.createElement('p');
    form.prepend(p);

    p.textContent           =
        "Merci d'inscrire une adresse E-mail correct ainsi qu'au minimum " +
        "4 caractères pour le nom et commentaire"
    p.style.color           = "#9b1010";
    p.style.textAlign       = "center";
    form.style.border       = "solid #a70707";
    form.style.padding      = "0.5rem 1rem";
    form.style.marginTop    = "1rem";

    deleteErrorTime(form, p)
}

function deleteErrorTime(form, p) {

    setTimeout( ()=>{

        p.remove();
        form.style.border = "none";
    }, 5000);
}



////////////////////////////////////////////////////////////
////////////////////// CODE PRINCIPAL //////////////////////
////////////////////////////////////////////////////////////


document.addEventListener('DOMContentLoaded', () =>{
    let buttonComment  = document.getElementById('buttonComment');
    let commentsPoster = document.getElementById('commentsPoster');
    let buttonCancelComment = document.getElementById('buttonCancelComment');

    buttonComment.addEventListener('click', prepare)
    buttonCancelComment.addEventListener('click', resetForm )

    commentsPoster.addEventListener('click', function(e)
    {
        // pour créer un commentaire enfant
        let targetCommentChild = e.target.dataset['id'];

        if(targetCommentChild !== undefined)
        {
            parentId = targetCommentChild;
            document.getElementById('parent_id').value = parentId;
        }
    });
});

