<?php


include_once 'dbconnect.php';
session_start();
if (!$_SESSION["connected"]) {
    header("Location: ../index.php");
}



$result = mysqli_query($conn, "SELECT * FROM produit");


// if (isset($_POST['])) {
if (count($_POST) > 0 && isset($_POST['UpdateProduct'])) {
    // header('location:json.php');
    // $id= $_POST['custId']; 
    $refernce = $_POST['reference'];
    $name = $_POST['nameP'];
    $price = $_POST['price'];
    $quantite = $_POST['quantiteP'];
    $critiquep = $_POST['qritiqueQT'];
    $description = $_POST['description'];
    // $image = $_POST['imageP'];

    $req = "UPDATE produit set reference='$refernce',nom='$name', descriptions='$description' ,prix='$price',quantite='$quantite',stockCritique='$critiquep'  WHERE reference= '$refernce' ";

    if (mysqli_query($conn, $req)) {
        header('Location:dashboard.php');
    } else {
        echo 'query error ' . mysqli_error($conn);
    }
}




if (isset($_POST['AddProduct'])) {
    $file = $_FILES["imageP"];
    $image_name = $_FILES["imageP"]["name"];
    $image_tmp_name = $_FILES["imageP"]["tmp_name"];
    $file_name = uniqid('', true) . $image_name;
    $file_destination = "../produit_img/" . $file_name;

    move_uploaded_file($image_tmp_name, $file_destination);

    $refernce = $_POST['reference'];
    $name = $_POST['nameP'];
    $price = $_POST['price'];
    $quantite = $_POST['quantiteP'];
    $critiquep = $_POST['qritiqueQT'];
    $description = $_POST['description'];

    $sql = "INSERT INTO produit (reference,nom,descriptions,prix,quantite,stockCritique,images ,date_entree) VALUES ('$refernce','$name', '$description','$price','$quantite','$critiquep','$file_name',NOW())";
    if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully !";

    }
    header('Location:dashboard.php');
}

if (count($_POST) > 0 && isset($_POST['deleteproduct'])) {
    $id = $_POST["deleteP"];
    $sql = "DELETE FROM produit WHERE reference='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    header('Location:dashboard.php');
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.min.css">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <title>Cietec dashboard</title>
</head>

<body>

    <!--popups-->

    <!--popups-->
    <div class="dashboard">
        <div class="imgCenter">
            <img id="logo" src="../images/logo.png">
        </div>
        <div class="dbMenu">
            <img src="../images/Dbchart.svg">
            <img src="../images/Maps.svg">
            <img src="../images/Shopping.svg">
            <img src="../images/Messages.svg">
            <img src="../images/Files.svg">
        </div>
        <span class="hideSideBar"></span>
    </div>
    <div class="divHolder">
        <div class="respNavbar">
            <div class="respNavbarHldr">
                <div class="brgrMenu">
                    <img src="../images/brgrMenu.svg" alt="brgrMenu">
                </div>
                <h2 id="RDashboard">dashboard</h2>
                <div class="rightMenuNav">
                    <div class="dropOpen">
                        <img id="dropOpenImg" src="../images/drop_down.svg" alt="dropDownMenu">
                    </div>
                    <div class="rightMenu">
                        <div class="searchRSP">
                            <div class="search">
                                <input type="text" id="searchInput" placeholder="Search">
                                <img src="../images/search.svg">
                            </div>
                        </div>
                        <div class="notificationRSP">
                            <img src="../images/notificationON.svg" alt="notification">
                        </div>
                        <div class="userRSP">
                            <img src="../images/signUP.svg" alt="signUP">
                        </div>
                        <div class="supportRSP">
                            <img src="../images/support.svg" alt="support" style="margin-left: 11px;">
                        </div>
                        <img id="dropUpmenu" src="../images/dropDownMenu.svg" alt="drop_down_Menu">
                    </div>
                </div>
            </div>
        </div>
        <div class="navBar">
            <h1 id="DbText">dashboard</h1>
            <div class="searchDiv">
                <div class="search">
                    <input type="text" id="searchInput" placeholder="Search">
                    <img src="../images/search.svg">
                </div>
                <img src="../images/sortBy.svg">
            </div>
            <a href="tel:+21262659535" style="text-decoration: none;" ><div class="support">
                <img src="../images/support.svg" alt="support" style="margin-left: 11px;">
                <h4 style="margin-right: 17px;">Support</h4>
            </div></a>

            <div class="userDiv">
                <h4><?php echo $_SESSION["Name"]; ?></h4>
                <form method="POST" action="logout.php" id="logout_form">
                    <img src="../images/logOut.svg" alt="signUP" id="logout">
                </form>

                <img src="../images/notificationON.svg" alt="notification">

            </div>


        </div>
        <h4 style="width: 87vw;margin-top: 50px; margin-bottom: 20px;">Overview</h4>
        <div class="statistics">
            <div class="news">
                <div class="texts">
                    <h2>Welcome back <?php echo $_SESSION["Name"]; ?></h2>
                    <h3>Since your last login on the system, there were:</h3>
                    <h4>21 new charts</h4>
                    <h4>15 new reports</h4>
                    <h4>45 new Messages</h4>
                </div>
                <div class="undrawFile">
                    <img src="../images/undraw_file_analysis_8k9b.svg" alt="undraw_file_analysis_8k9b">
                </div>
            </div>

            <div class="upcoming">
                <div class="textUpComming">
                    <h6>upcoming</h6>
                    <div class="todayCont">
                        <p>Today</p>
                        <span><img src="../images/drop_down.svg" alt="drop_down"></span>
                    </div>
                </div>
                <div class="event">
                    <img src="../images/eventColor.svg" alt="eventColor">
                    <span>
                        <h6>Team meeting</h6>
                        <p>10 AM - 11 AM</p>
                    </span>
                </div>
                <div class="event">
                    <img src="../images/eventRed.svg" alt="eventColor">
                    <span>
                        <h6>Team meeting</h6>
                        <p>10 AM - 11 AM</p>
                    </span>
                </div>
                <div class="event">
                    <img src="../images/eventprpl.svg" alt="eventColor">
                    <span>
                        <h6>Team meeting</h6>
                        <p>10 AM - 11 AM</p>
                    </span>
                </div>
                <div class="moreContainer"><img src="../images/MoreButton.svg" alt="MoreButton"></div>
            </div>
            <div class="upcoming2">
                <h6 style="display: flex;">Total inventory usage<span id="option"><img src="../images/option.svg" alt="option"></span></h6>
                <svg id="crcls">
                    <circle cx="42px" cy="42px" r="42px"></circle>
                    <circle cx="42px" cy="42px" r="42px"></circle>
                </svg>
                <h3>70%</h3>
                <div class="statIvtr">
                    <div id="frst"></div>
                    <p class="txtStat">218 items</p>
                    <div id="scnd"></div>
                    <p class="txtStat">32 are left</p>
                </div>
            </div>
            
        <div id="txtInventory">
            <div style="display: flex;align-items: baseline;">
                <h4 style="font-size: 25px;">218</h4>
                <p style=" font-size: 14px; margin-left: 0.5vw;"> products are in the inventory</p>
            </div>
            <button class="addProduct">
                <img src="../images/add-box.svg" alt="add-box">
                <h4>add product</h4>
            </button>
        </div>
        <?php
        if (mysqli_num_rows($result) > 0) {
        ?>
            <div class="tableHolder">
                <table>
                    <tr>
                        <th>Action</th>
                        <th>id</th>
                        <th>Reference</th>
                        <th>Name of the product</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Peaces</th>
                        <th>StockQritique</th>
                        <th>Time</th>
                        </tr)>
                    <tr class="devider">
                    </tr>
                    <!-- <img id="testMenu2" src="../images/Tracé 5.svg" alt=""> -->
                    <tr>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <td id="optionPopUp">
                                <div class="optionTd">

                                    <img id="editIcon" src="../images/editIcon.svg" alt="edit icon" class="editBtn">

                                    <img id="deleteIcon" src="../images/deleteIcon.svg" alt="delete icon">

                                </div>
                            </td>


                            <td><?= $row["id_p"]; ?></td>
                            <td><?= $row["reference"]; ?></td>
                            <td><?= $row["nom"]; ?></td>
                            <td> <?= $row["descriptions"]; ?></td>
                            <td><?= $row["prix"] . 'dh'; ?>
                            <td><?= $row["quantite"]; ?></td>
                            <td><?= $row["stockCritique"]  ?>
                            <td> <?= $row["date_entree"]; ?></td>

                    </tr>
                    <tr class="devider">
                    </tr>
                    <tr>
                    <?php
                            $i++;
                        }
                    ?>
                <?php } ?>
                </table>
            </div>
    </div>

    <!--models-->
    <form method="POST" enctype="multipart/form-data">
        <div id="testModel">
            <div class="popup">
                <h1>Add Product</h1>
                <div class="popup1">
                    <div class="firstInputs">
                        <div class="ref">
                            <label for="text">References</label>
                            <input type="text" id="textref" placeholder="type here..." name="reference" required>
                        </div>
                        <div class="nameP">
                            <label for="text">Name of product</label>
                            <input type="text" id="manep" placeholder="type here..." name="nameP" required>
                        </div>
                    </div>
                    <div id="Pimage">
                        <img id="output" src="../images/noImg.png" alt="">
                        <input id="imgPlcHldr" type="file" onchange=" loadFile(event)" placeholder="type here..." name="imageP" required>
                    </div>
                </div>
                <div class="popup2">
                    <div class="price">
                        <label for="text">Price</label>
                        <input type="text" id="textPrice" placeholder="type here..." name="price" required>
                    </div>
                    <div class="quntite">
                        <label for="text">Quantity</label>
                        <input type="text" id="textQuantite" placeholder="type here..." name="quantiteP" required>
                    </div>
                    <div class="critiqueQ">
                        <label for="text" style="font-size: 15px;">Critical Quantity</label>
                        <input type="text" id="textCQ" placeholder="type here..." name="qritiqueQT" required>
                    </div>
                </div>
                <div class="description">
                    <label for="textarea">Description</label>
                    <textarea id="textarea" cols="30" rows="10" name="description" placeholder="type here..."></textarea>
                </div>
                <div class="button">
                    <input type="submit" value="Cancel" id="cancel">
                    <input type="submit" value="AddProduct" name="AddProduct">
                </div>
            </div>
        </div>
    </form>

    <!-- model update -->

    <form method="POST">
        <div id="updateModel">
            <div class="popup">
                <h1>Update Product</h1>
                <div class="popup1">

                    <div class="firstInputs" style="flex-direction: column;
    gap: 7PX;">

                        <div class="ref">
                            <label for="text">References</label>
                            <input type="text" class="textref" placeholder="type here..." name="reference" value="<?php echo $_POST['reference']; ?> ">

                        </div>
                        <div class="nameP">
                            <label for="text">Name of product</label>
                            <input type="text" class="namePr" placeholder="type here..." name="nameP">
                        </div>
                    </div>
                    <div id="Pimage">
                        <img id="output" src="../images/noImg.png" alt="">
                        <input class="imgPlcHldr" type="file" onchange=" loadFile(event)" placeholder="type here..." name="imageP">
                    </div>
                </div>
                <div class="popup2">
                    <div class="price">
                        <label for="text">Price</label>
                        <input type="text" class="textPrice" placeholder="type here..." name="price">
                    </div>
                    <div class="quntite">
                        <label for="text">Quantity</label>
                        <input type="text" class="textQuantite" placeholder="type here..." name="quantiteP">
                    </div>
                    <div class="critiqueQ">
                        <label for="text" style="font-size: 15px;">Critical Quantity</label>
                        <input type="text" class="textCQ" placeholder="type here..." name="qritiqueQT">
                    </div>
                </div>
                <div class="description">
                    <label for="textarea">Description</label>
                    <textarea class="textarea" cols="30" rows="10" name="description" placeholder="type here..."></textarea>
                </div>

                <div class="button">
                    <input type="submit" value="Cancel" id="cancel">
                    <input type="submit" value="UpdateProduct" name="UpdateProduct">
                </div>
            </div>


        </div>
    </form>
    <!-- model updete -->

    <form action="" method="POST">
        <div id="testModel2">
            <div class="container">
                <div class="popup">
                    <h1> Are you sure ?</h1>
                    <input type="hidden" class="deleteP" id="deleteP" name="deleteP">
                    <div class="popup1" id="popup1delete">
                        <input type="submit" value="Cancel" id="cancel2">
                        <div class="delete">
                            <img src="image/Icon_material-delete.svg" alt="">
                            <input type="submit" value="deleteproduct" name="deleteproduct">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.querySelector("body > div.divHolder > div.respNavbar > div > div.rightMenuNav > div.dropOpen").addEventListener("click", function() {
            document.querySelector("body > div.divHolder > div.respNavbar > div > div.rightMenuNav > div.rightMenu").style.display = "flex";
        })
        document.querySelector("#dropUpmenu").addEventListener("click", function() {
            document.querySelector("body > div.divHolder > div.respNavbar > div > div.rightMenuNav > div.rightMenu").style.display = "none";
        })
        document.querySelector("body > div.divHolder > div.respNavbar > div > div.brgrMenu").addEventListener("click", function() {
            document.querySelector("body > div.dashboard").style.left = "0";
           
            document.querySelector("body > div.dashboard > span").style.display = "block";
        })

        document.querySelector("body > div.dashboard > span").addEventListener("click", function() {
            
            document.querySelector("body > div.dashboard").style.left = "-100px";
            document.querySelector("body > div.dashboard > span").style.display = "none";
        })




        document.querySelector("#txtInventory > button").addEventListener("click", function() {
            document.querySelector("#testModel").style.display = "flex";
            document.querySelector("body").style.overflowY = "hidden";
            document.querySelector("#testModel > div > h1").innerHTML = "Add product";
            document.querySelector("#testModel > div > div.button > input[type=submit]:nth-child(2)").value = "Add";

        })

        // document.querySelector("#deleteIcon").addEventListener("click", function() {
        //     document.querySelector("#testModel2").style.display = "flex";
        //     document.querySelector("body").style.overflowY = "hidden";
        // })

        document.querySelector("#editIcon").addEventListener("click", function() {
            document.querySelector("#updateModel").style.display = "flex";
            document.querySelector("body").style.overflowY = "hidden";
            // document.querySelector("#testModel > div > h1").innerHTML = "Edit product";
            // document.querySelector("#testModel > div > div.button > input[type=submit]:nth-child(2)").value = "done";

        })

        document.querySelector("#cancel").addEventListener("click", function() {
            document.querySelector("#testModel").style.display = "none";
            document.querySelector("body").style.overflowY = "auto";
        })

        document.querySelector("#cancel2").addEventListener("click", function() {
            document.querySelector("#testModel2").style.display = "none";
            document.querySelector("body").style.overflowY = "auto";
        })


        var testMenu2 = document.querySelector("#testMenu2");
        var editIcon = document.querySelector("#editIcon");
        var deleteIcon = document.querySelector("#deleteIcon");
        var option11 = document.querySelector("#optionPopUp");
        var click = document.querySelector("#optionPopUp > img:nth-child(3)")

        option11.addEventListener("click", function() {

            testMenu2.style.display = "block";
            editIcon.style.display = "block";
            deleteIcon.style.display = "block";

        })
        option11.addEventListener("click", function(event) {
            if (event.target == option11) {
                testMenu2.style.display = "none";
                editIcon.style.display = "none";
                deleteIcon.style.display = "none";
            }
        })

        var editBtn = document.querySelectorAll(".editBtn");
        editBtn.forEach((e) => {
            e.onclick = function() {
                // alert("pr_ref");
                document.querySelector("#updateModel").style.display = "flex";
                document.querySelector("body").style.overflowY = "hidden";

                // content.style.filter = "blur(15px)";
                // aside.style.filter = "blur(15px)";
                // editModal.style.transform = "translateY(0)";

                tr = this.parentElement.parentElement.parentElement;
                // id = tr.children[0].innerHTML;
                pr_ref = tr.children[2].innerHTML;
                pr_name = tr.children[3].innerHTML;
                // pr_image = tr.children[3].firstElementChild.src;
                pr_price = tr.children[5].innerHTML;
                pr_qty = tr.children[6].innerHTML;
                pr_stockCritique = tr.children[7].innerHTML;
                pr_description = tr.children[4].innerHTML;
                // alert(pr_ref);
                document.querySelector(".textref").value = pr_ref;
                document.querySelector(".namePr").value = pr_name;
                // document.querySelector(".imgPlcHldr").value = pr_image;

                document.querySelector(".textPrice").value = pr_price;
                document.querySelector(".textQuantite").value = pr_qty;
                document.querySelector(".textCQ").value = pr_stockCritique;
                document.querySelector(".textarea").value = pr_description;


            };
        });
        var deletep = document.querySelectorAll("#deleteIcon");
        deletep.forEach((e) => {
            e.onclick = function() {

                document.querySelector("#testModel2").style.display = "flex";
                document.querySelector("body").style.overflowY = "hidden";


                tr = this.parentElement.parentElement.parentElement;
                Ref = tr.children[2].innerHTML;

                document.querySelector(".deleteP").value = Ref;

            }

        });
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

        document.getElementById('logout').addEventListener("click", function() {

            document.getElementById('logout_form').submit();

        })
    </script>
</body>

</html>