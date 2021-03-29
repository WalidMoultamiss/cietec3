


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.min.css">
    <link rel="icon" type="image/png" href="../images/logo.png" />
</head>

<body>

    <form method="POST" action="Pages/login.php">
        <div class="loginform">
            <div class="logo">
                <img src="images/logobig.png" alt="logo">
            </div>
            <div class="text">
                <h1>Login</h1>
                <h4>Please login to your account</h4>
            </div>
            <div class="input">
                <div class="username">
                    <input type="text" id="usernameId" placeholder="User name" name="user_name">
                    <img id="userImg" src="images/Icon feather-user.svg" alt="">
                </div>
                <div class="password">
                    <input type="password" id="passwordId" placeholder="Password" name="pass_word">
                </div>
                <div class="remember">
                    <input type="checkbox" class="checkbox">
                    <label for="checkbox">Remember me</label>
                </div>
                <input type="submit" value="LOGIN" id="btnLogin" name="login">
            </div>
        </div>
    </form>

</body>

</html>