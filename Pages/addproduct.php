<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddProduct</title>
    <link rel="stylesheet" href="css/addproduct.css">
</head>

<body>
<form action="" method="POST">
    <div class="popup">
        <h1>Add Product</h1>
<div class="popup1">
    <div class="firstInputs">
        <div class="ref">
            <label for="text">References</label>
            <input type="text" id="textref" placeholder="type here..." name="reference">
        </div>
        <div class="namep">
            <label for="text">Name of product</label>
            <input type="text" id="manep"  placeholder="type here..." name="nameP">
        </div>
    </div>
        <div id="Pimage">
            <img id="output" src="image/noImg.png" alt="">
            <input id="imgPlcHldr" type="file" onchange=" loadFile(event)"  placeholder="type here...">
        </div>
</div>

        <div class="popup2">
            <div class="price">
                <label for="text">Price</label>
                <input type="text" id="textPrice"  placeholder="type here..." name="price">
            </div>
            <div class="quntite">
                <label for="text">Quantite</label>
                <input type="text" id="textQuantite" placeholder="type here..." name="quantiteP">
            </div>
            <div class="critiqueQ">
                <label for="text">Critique Quantite</label>
                <input type="text" id="textCQ"  placeholder="type here..." name="qritiqueQT">
            </div>
        </div>
        <div class="description">
            <label for="textarea">Description</label>

            <textarea name="" id="textarea" cols="30" rows="10"  placeholder="type here..." name="description"></textarea >
        </div>
        <div class="button">
            <input type="submit" value="Cancel" id="cancel">
            <input type="submit" value="AddProduct" name="AddProduct">
        </div>
        

    </div>
    </form>
    
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</body>

</html> -->