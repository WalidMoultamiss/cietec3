<?php

include_once 'dbconnect.php' ;
if(isset($_POST['AddProduct'])&& !empty($_POST['reference'])&& !empty($_POST['nameP'])) 
{
    
        $refernce = $_POST['reference'];
        $name = $_POST['nameP'];
        $price = $_POST['price'];
        $quantite = $_POST['quantiteP'];
        $critiquep = $_POST['qritiqueQT'];
        $description= $_POST['description'];
        $image= $_POST['imageP'];
        $date= 
        $sql = "INSERT INTO produit (reference,nom,descriptions,prix,quantite,stockCritique,images ,date_entree) VALUES ('$refernce','$name', '$description','$price','$quantite','$critiquep','$image',NOW())";
        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
        }
        header ('Location:dashboard.php');
    
    
      
}
?>: