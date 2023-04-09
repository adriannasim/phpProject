let filterContent = document.querySelector(".hidden");
let isShow = true;
filterContent.style.display = "none";

function showHideFilter(){
    if(isShow){
        filterContent.style.display = "none";
        isShow = false;
    }
    else {
        filterContent.style.display = "block";
        isShow = true;
    }
}

