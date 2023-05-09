<?php
//Define db
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "esports&gaming");

/*Start of eventAdd.php validation*/
function checkEventID($eventID, $chkEventID){
    if($eventID == NULL){
        return "⚠ Please enter the event name";
    }else if(strlen($eventID) > 5){
        return "⚠ Maximum 5 characters for event name";
    }else if(strcmp($eventID, $chkEventID) == 0){
        return "⚠ Event ID already exists";
    }
}
function checkEventName($name){
    if($name == NULL){
        return "⚠ Please enter the event name";
    }else if(strlen($name) > 50){
        return "⚠ Maximum 50 characters for event name";
    }else if(!preg_match("/^[A-Za-z,\'\: ]+$/", $name)){
        return "⚠ Please enter a valid event name";
    }
}
function checkEventVenue($venue){
    if($venue == NULL){
        return "⚠ Please enter the event venue";
    }else if(strlen($venue) > 50){
        return "⚠ Maximum 50 characters for event venue";
    }else if(!preg_match("/^[A-Za-z,@\.\ ]+$/", $venue)){
        return "⚠ Please enter a valid event venue";
    }
}
function checkEventDesc($desc){
    if($desc == NULL){
        return"⚠ Please enter the event description";
    }else if(strlen($desc) > 500){
        return "⚠ Maximum 500 characters for event description";
    }else if(strlen($desc) < 10){
        return "⚠ Minimum 10 characters for event description";
    }
}
/*End of eventAdd.php validation*/
/*Start of eventTicket.php validation*/
function checkTicketPrice($price){
    if($price == NULL){
        return "⚠ Please enter the ticket price";
    }else if(!preg_match("/^\d+(\.\d{2})?$/", $price)){
        return "⚠ Please enter a valid price";
    }
}
function checkType($type){
    if($type == NULL){
        return "⚠ Please enter the ticket type";
    }else if(strlen($type) > 20){
        return "⚠ Maximum 20 characters for ticket type";
    }else if(!preg_match("/^[A-Za-z,\'\: ]+$/", $type)){
        return "⚠ Please enter a valid ticket type";
    }
}
function checkQty($qty){
    if($qty == NULL){
        return "⚠ Please enter the ticket quantity";
    }else if(!preg_match("/^\d{1,3}$/", $qty)){
        return "⚠ Please enter a valid amount of quantity";
    }
}
/*End of eventTicket.php validation*/
/*Start of merchAdd.php validation*/
function checkProdID($id){
    if($id == NULL){
        return "⚠ Please enter the product id";
    }else if(!preg_match("/^[A-Z\d]{5}$/",$id)){
        return "⚠ Invalid product ID format";
    }

}
function checkProdName($name){
    if($name == NULL){
        return "⚠ Please enter the product name";
    }else if(strlen($name)>50){
        return "⚠ Maximum 50 characters for product name";
    } else if(!preg_match("/^[A-Za-z\'\ ]{3,50}$/",$name)){
        return "⚠ Minimum 3 characters for product name/Illegal character detected";
    }
}
function checkProdPrice($price){
    if($price == NULL){
        return "⚠ Please enter the product price";
    }else if(!preg_match("/^[\d\.]+$/",$price)){
        return "⚠ Invalid product price format";
    }
}
function checkProdMaterial($material){
    if($material==NULL){
        return "⚠ Please enter the product material";
    }else if(!preg_match("/^[A-Za-z\-]{1,20}$/",$material)){
        return "⚠ Invalid product material/Illegal character detected";
    }
}
function checkProdColor($color){
    if($color==NULL){
        return "⚠ Please enter the product color";
    }else if(!preg_match("/^[A-Za-z\-]{1,20}$/",$color)){
        return "⚠ Invalid product color/Illegal character detected";
    }
}
function checkProdStyle($style){
    if($style==NULL){
        return "⚠ Please enter the product style";
    }else if(!preg_match("/^[A-Za-z\-]{1,20}$/",$style)){
        return "⚠ Invalid product style/Illegal character detected";
    }
}
function checkProdFittype($fitType){
    if($fitType==NULL){
        return "⚠ Please enter the product fit type";
    }else if(!preg_match("/^[A-Za-z\-]{1,20}$/",$fitType)){
        return "⚠ Invalid product fit type/Illegal character detected";
    }
}
function checkProdCategory($pCategory){
    if($pCategory==NULL){
        return "⚠ Please select the product category";
    }
}
function checkProdSize($size){
    if($size==NULL){
        return "⚠ Please select the size information";
    }
}
/*End of merchAdd.php validation*/

?>