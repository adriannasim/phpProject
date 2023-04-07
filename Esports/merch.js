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

//const filterOption = document.querySelectorAll('.hidden button');
//const filterProd = document.querySelectorAll('.content');
//
//filterOption.forEach(button => {
//    button.onclick = function(){
//        filterOption.forEach(button => {
//            button.className = "";
//        });
//        button.className = "active";
//    };
//    const value = button.textContent;
//    filterContent.forEach(filterContent => {
//        filterContent.style.display ='none';
//        if(filterContent.getAttribute('data-filter') === value.toLowerCase()){
//            filterContent.style.display ='block';
//        }
//    });
//});


