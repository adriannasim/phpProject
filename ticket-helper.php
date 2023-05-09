<?php

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","xy");

function checkRegisterName($name){
    if($name==null){
        return "Please enter your <b>name</b>!";
    }else if(strlen($name)>30){
        return "Maximum 30 characters only for <b>name</b>!";
    }else if(!preg_match("/^[A-Za-z @,\"\.\/]+$/",$name)){
        return "Invalid <b>name</b>!";
    }
}

function checkRegisterEmail($email){
    if($email==null){
        return "Please enter your <b>email</b>!";
    }else if(!preg_match("/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/",$email)){
        return "Invalid <b>email</b>!";
    }
}

function checkRegisterPhone($phone){
    if($phone==null){
        return "Please enter your <b>phone number</b>!";
    }else if(!preg_match("/^(01)[0-46-9][-][0-9]{7,8}$/",$phone)){
        return "Invalid <b>phone number</b>!";
    }
}

function checkTicketType($ticketType){
    if($ticketType==null){
        return "Please select your <b>ticket type</b>!";
    }
}

function checkRow($row){
    if($row==null){
        return "Please select your <b>seat row</b>!";
    }
}

function checkColumn($column){
    if($column==null){
        return "Please select your <b>seat column</b>!";
    }
}



?>