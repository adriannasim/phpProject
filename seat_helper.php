<?php 

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","esports&gaming");
function isStudentExist($seatID){
    $exist = false;
    
    //step 1 :connection to link PHP app with DB
    $con = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    
    //step 2 :sql statement 
    $sql = "SELECT * FROM seat WHERE SeatID ='$seatID'";
    
    //step 3 : run sql code
    if($result = $con->query($sql)){
        //same PK found
        if($result->num_rows >0){
            $exist = true;
        }
    }
    //step 4 :free result/close connection
    $result-> free();
    $con -> close();
    return $exist;
}
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
function checkseatID($seatID) {
    $error = null;
    if (empty($seatID)) {
        $error = "Please enter the SeatType ID";
    }else if (isStudentExist($seatID)){
        $error = "Seat Type ID already exists";
    } else if (!preg_match("/^[A-Za-z\d]+$/", $seatID)) {
        $error = "Please enter a valid SeatType ID";
    }
    return $error;
}

function getAllevent(){
    return array(
        "MLBB Grand Finale" => "MLBB Grand Finale",
        "Warzone S2 Fun Camp" => "Warzone S2 Fun Camp",
        "Valorant: Battle of the Ace" =>"Valorant: Battle of the Ace"
    );
}
function getAllticketID(){
    return array(
        "AU001" => "Standard",
        "AU002" => "VIP"
    );
}
?>
