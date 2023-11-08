<?php
$username = '';
$email = '';
$ps1 = '';
$ps2 = '';
$error = array("username"=>'',
                "ps1"=>'',
                "ps2"=>'',
                "email"=>'',
                "total"=>'');
// Checking submit button if clicked
if (isset($_POST['submit'])){
    // checking username input filled 
    if (empty($_POST['username'])){
        $error['username'] = "you have to enter your name <br>";
    }
    else {
        $username = $_POST['username'];
        if (!preg_match('/^[a-z]+$/', $username)){
            $error['username'] = "your name must writin by lower case (JUST lower case) <br>";
        }
    }
    // checking Password input filled 
    if (empty($_POST['ps1'])){
        $error['ps1'] = "Password required <br>";
    }
    else {
        $ps1 = $_POST['ps1'];
        if (!preg_match('/^[a-zA-Z\w\S]+$/', $ps1)){
            $error['ps1'] = "Password must be include just lettes, numbers or underscore <br>";
        }
    }
    // checking Confirming password input filled 
    if (empty($_POST['ps2'])){
        $error['ps2'] = "Confirming password required <br>";
    }
    else {
        $ps2 = $_POST['ps2'];
        if (!preg_match('/^[a-zA-Z\w\S]+$/', $ps2)){
            $error['ps2'] = "Password must be include just lettes, numbers or underscore <br>";
        }
        else{
            if ($ps1 != $ps2){
                $error['total'] = "Password must be matched";
            }
        }
    }
    // checking email input filled 
    if (empty($_POST['email'])){
        $error['email'] = "Email required <br>";
    }
    else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email'] = "Email is invalid <br>";
        }
    }

    if (array_filter($error)){
        $error['total'] = "There are some errors in your sign-up form";
    }
    else {
        header("Location: login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sing up form</title>
    <style>
                input{
            border: none ;
            border-bottom:2px solid skyblue;
            box-shadow: 0px 2px 3px 2px skyblue;
            border-radius: 4px;
            width: 170px;
            padding: 5px;
            margin: 6px;
        }
        .sub1{
            width: 60px;
        }
        .sub1:hover{
            background-color: #5353ec ;
            margin: 11px;
        }
        p{
            color: blueviolet;
            font-size: 12px;
        }
        .sec1{
            width: 230px;
            border: 6px double #a8dbfa;
            border-radius: 8px;
            align-items: center;
            background-image: url('skyblue.jpg');
            background-size: cover;
        }
        h1{
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="sec1">
        <h1>complete follow form</h1>
        <div class="error">
            <p><?php echo $error['total'];  ?></p>
        </div>
        <form action="#" method="post">
            <label for="username">
                <div class="error">
                    <p><?php echo $error['username'];  ?></p>
                </div>
                <input type="text" name="username" placeholder="enter your username"> <br>
            </label>
            <label for="ps1">
                <div class="error">
                    <p><?php echo $error['ps1'];  ?></p>
                </div>
                <input type="password" name="ps1" placeholder=" enter your password"> <br>
            </label>
            <label for="ps2">
                <div class="error">
                    <p><?php echo $error['ps2'];  ?></p>
                </div>
                <input type="password" name="ps2" placeholder="again enter your password"> <br>
            </label>
            <label for="email">
                <div class="error">
                    <p><?php echo $error['email'];  ?></p>
                </div>
                <input type="email" name="email" placeholder="enter your email"> <br>
            </label>
            <label for="submit">
                <input type="submit" name="submit" value="click me" class="sub1"> <br>
            </label>
        </form>
    </section>
</body>

</html>