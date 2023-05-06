<?php

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","xy");

function checkRegisterName($name){
    if($name==null){
        return "Please enter your name!";
    }else if(strlen($name)>30){
        return "Maximum 30 characters only for name!";
    }else if(!preg_match("/^[A-Za-z @,\"\.\/]+$/",$name)){
        return "Invalid name!";
    }
}

function checkRegisterEmail($email){
    if($email==null){
        return "Please enter your email!";
    }else if(!preg_match("/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/",$email)){
        return "Invalid email!";
    }
}

function checkRegisterPhone($phone){
    if($phone==null){
        return "Please enter your phone number!";
    }else if(!preg_match("/^(01)[0-46-9][-][0-9]{7,8}$/",$phone)){
        return "Invalid phone number!";
    }
}

function checkTicketType($ticketType){
    if($ticketType==null){
        return "Please select your [GENDER].";
    }else if(!array_key_exists($ticketType, getAllTicketType())){
        return "Invalid [Gender] entered.";
    }
   
}

function getAllTicketType(){
    return array(
        "M" => "👦 Male",
        "F" => "👧 Female"
    );
}  

?>