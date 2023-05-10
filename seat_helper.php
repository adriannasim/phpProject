<?php 

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","esports&gaming");
function isTypeIDExist($id,$chkTypeID){
    if($id == NULL){
        return " Please enter the SeatType ID";
    }else if(strlen($id) > 5){
        return "Maximum 5 characters for SeatType ID";
    }else if(strcmp($id,$chkTypeID) == 0){
        return " Seat Type ID already exists";
    }else if(!preg_match("/^[A-Z\d]{5}$/", $id)){
        return " Please enter a valid SeatType ID";
    }
}
?>