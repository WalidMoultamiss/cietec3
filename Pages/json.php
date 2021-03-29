<?php 
include 'dbconnect.php' ;
$sql = "SELECT * FROM produit";
$result = $conn->query($sql);
// $emparray = array();
if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    // $emparray[]=$rows ;
    echo json_encode($rows);
    


} else {
    echo "no results found";
}

?> 
<script>
                    
//AJAX

                // var xmlhttp = new XMLHttpRequest();
                // xmlhttp.onreadystatechange = function() {
                //     if (this.readyState == 4 && this.status == 200) {
                //         var rows = JSON.parse(this.responseText);
                //         // document.getElementById("demo").innerHTML.value = rows[1].reference;
                    
                    
                //         document.querySelector(".textref").value =rows[1].reference;
                //     }
                // };
                // xmlhttp.open("GET", "json.php", true);
                // xmlhttp.send();
</script>