<?php
include 'dbconnect.php' ;
session_start();
if($_POST>0)
{
    $_SESSION["connected"]=false;
}
header("Location: ../index.php");







?>