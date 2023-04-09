let hiddenContent = document.querySelector(".hide-payment");
let isShow = true;
hiddenContent.style.display = "none";

function showHidePayment(){
    if(isShow){
        hiddenContent.style.display = "none";
        isShow = false;
    }
    else {
        hiddenContent.style.display = "block";
        isShow = true;
    }
}

function addedFunc(){
    alert("Item added to cart");
}