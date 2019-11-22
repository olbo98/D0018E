<?php
session_start();

include "functions.php";

if(checkUserLoginStatus()){
    session_destroy();
}
header("Location: index.php");

?>