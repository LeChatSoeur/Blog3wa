let checkboxHeader      = document.getElementById('checkboxHeader');
let subCategoryHeader   = document.getElementById('subCategoryHeader');
let noTitle             = document.getElementById('noTitle');
let toTitle             = document.getElementById('toTitle');
let file           = document.getElementById('inputFile')
let imgNoTitle          = document.getElementById('imgNoTitle')
checkboxHeader.addEventListener('click', checkboxVisibility);
noTitle.addEventListener('click', previewImgExample);
toTitle.addEventListener('click', previewImgExample);
file.addEventListener('change', updateFile)



function updateFile()
{
    file.type = 'file';
    file.accept = 'image/*';
    let reader = new FileReader();
  // reader.readAsDataURL(file.files[0])

    reader.addEventListener('load', function()
    {

        imgNoTitle.height = 50;
        imgNoTitle.title = file.name;
        imgNoTitle.src = reader.result;
        console.log(imgNoTitle)
    }, false);

    if(file)
    {
        reader.readAsDataURL(file.files[0]);
    }

}


function previewImgExample()
{
    if(noTitle.checked === true)
    {
        if(imgNoTitle.style.visibility !== "visible")
        {
            imgNoTitle.style.visibility = "visible";
            imgNoTitle.style.width = "75%";

            toTitle.checked = false;
            imgToTitle.style.visibility = "hidden";
            imgToTitle.style.width = "0";
        }
    }


    if(toTitle.checked === true)
    {
        imgToTitle.style.visibility = "visible";
        imgToTitle.style.width = "75%";

        noTitle.checked = false;
        imgNoTitle.style.visibility = "hidden";
        imgNoTitle.style.width = "0";
    }
}

function checkboxVisibility()
{
    if(checkboxHeader.checked === true)
    {
        subCategoryHeader.style.visibility = "visible";
    } else
        {
            subCategoryHeader.style.visibility = "hidden";
            imgToTitle.style.visibility = "hidden";
            imgToTitle.style.width = "0";
            imgNoTitle.style.visibility = "hidden";
            imgNoTitle.style.width = "0";
        }
}


