<?php

include_once 'dbconnect.php';
session_start() ;

// if(isset($_POST['LOGIN']))
if($_POST>0)
{

    $username=$_POST['user_name'] ;
    $password=$_POST['pass_word']; 
  $req= "SELECT * FROM employe WHERE nom_prenom= '$username' AND  motdepass= '$password' ";
    $result=mysqli_query($conn,$req);
    $row  = mysqli_fetch_assoc($result);
    $count=mysqli_num_rows($result); 
    if($count==1)
    {
        // echo $count;
         $_SESSION["Name"]=$row['nom_prenom'];
  
        $_SESSION["connected"]=true ;
          header("Location: dashboard.php"); 
    }
    else
    {
        echo $count;
        
        header("Location: ../index.php"); 
    }
}
?>
