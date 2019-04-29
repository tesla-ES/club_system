<?php

 $con ;

const host = "localhost:3306"; // Host name
const username = "root"; // Mysql username
const password =""; // Mysql password
const dbname = "new_club_db";

function connect(){
    if (!isset($con)) {

        $con=mysqli_connect(host, username, password,dbname);
        //mysqli_query($con,"SET CHARACTER_SET_SERVER 'CP1256'");
        //mysqli_query($con,"SET NAMES 'CP1256'");
        mysqli_set_charset($con,"CP1256");
    }

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    return $con ;
};
?>