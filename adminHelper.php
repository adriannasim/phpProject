<?php
//Define db
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "esports&gaming");

/*Start of user validation*/
function checkUserID($UserID, $chkID){
    if($UserID == NULL){
        return "⚠ Please enter a UserID";
    }else if(strlen($UserID) > 10){
        return "⚠ Maximum 10 characters for UserID";
    }else if(strcmp($UserID, $chkID) == 0){
        return "⚠ UserID already exists, please try another one";
    }else if(!preg_match("/^[A-Za-z0-9]+$/", $UserID)){
        return "⚠ Illegal character detected in UserID";
    }
}
function checkUserName($Name){
    if($Name == NULL){
        return "⚠ Please enter a Name";
    }else if(strlen($Name) > 30){
        return "⚠ Maximum 30 characters for Name";
    }else if(!preg_match("/^[A-Za-z]+$/", $Name)){
        return "⚠ Illegal character/numbers detected in Name";
    }
}
function checkUserEmail($Email){
    if($Email == NULL){
        return "⚠ Please enter an Email";
    }else if(!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", $Email)){
        return "⚠ Please enter a valid Email";
    }
}
function checkUserTel($TelNo){
    if($TelNo == NULL){
        return "⚠ Please enter a TelNo.";
    }else if(!preg_match("/^\d{3}-\d{7}$/", $TelNo)){
        return "⚠ Please enter a valid TelNo.";
    }
}
function checkUserPsw($Password){
    if($Password == NULL){
        return "⚠ Please enter a Password";
    }else if(strlen($Password) > 50){
        return "⚠ Maximum 50 characters for Password";
    }
}
/*End of user validation*/

/*Start of eventAdd.php validation*/
function checkEventID($eventID, $chkEventID){
    if($eventID == NULL){
        return "⚠ Please enter the event ID";
    }else if(strlen($eventID) > 5){
        return "⚠ Maximum 5 characters for event ID";
    }else if(strcmp($eventID, $chkEventID) == 0){
        return "⚠ Event ID already exists";
    }else if(!preg_match("/^[A-Z\d]{5}$/", $eventID)){
        return "⚠ Please enter a valid event ID";
    }
}
function checkEventName($name){
    if($name == NULL){
        return "⚠ Please enter the event name";
    }else if(strlen($name) > 50){
        return "⚠ Maximum 50 characters for event name";
    }else if(!preg_match("/^[a-zA-Z0-9\-\.\'\!\: ]+$/", $name)){
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
function checkTicketID($ticketID, $chkID){
    if($ticketID == NULL){
        return "⚠ Please enter the ticket ID";
    }else if(!preg_match("/^[A-Z\d]{5}$/",$ticketID)){
        return "⚠ Please enter a valid ticket ID";
    }else if(strcmp($ticketID, $chkID) == 0){
        return "⚠ Product ID already exists";
    }
}
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
function checkProdID($id, $chkID){
    if($id == NULL){
        return "⚠ Please enter the product id";
    }else if(!preg_match("/^[A-Z\d]{5}$/",$id)){
        return "⚠ Invalid product ID format";
    }else if(strcmp($id, $chkID) == 0){
        return "⚠ Product ID already exists";
    }
}
function checkProdName($name){
    if($name == NULL){
        return "⚠ Please enter the product name";
    }else if(strlen($name)>50){
        return "⚠ Maximum 50 characters for product name";
    }else if(strlen($name)<3){
        return "⚠ Minimum 3 characters for product name";
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
    }else if(!preg_match("/^[A-Za-z\-\ ]{1,20}$/",$material)){
        return "⚠ Invalid product material/Illegal character detected";
    }
}
function checkProdColor($color){
    if($color==NULL){
        return "⚠ Please enter the product color";
    }else if(!preg_match("/^[A-Za-z\-\ ]{1,20}$/",$color)){
        return "⚠ Invalid product color/Illegal character detected";
    }
}
function checkProdStyle($style){
    if($style==NULL){
        return "⚠ Please enter the product style";
    }else if(!preg_match("/^[A-Za-z\-\ ]{1,20}$/",$style)){
        return "⚠ Invalid product style/Illegal character detected";
    }
}
function checkProdFittype($fitType){
    if($fitType==NULL){
        return "⚠ Please enter the product fit type";
    }else if(!preg_match("/^[A-Za-z\-\ ]+$/", $fitType)){
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
function checkProdQty($qty){
    if($qty==NULL){
        return "⚠ Please enter a quantity";
    }else if(!preg_match("/^\d{1,3}$/", $qty)){
        return "⚠ Please enter a valid amount of quantity";
    }
}
/*End of merchAdd.php validation*/

?>