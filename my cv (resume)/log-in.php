<?php
$username = '';
$email = '';
$pass = '';
$error = array("username"=>'',
                "pass"=>'',
                "total"=>'');
// submit clicked
if (isset($_POST['submit'])){
    // username input  
    if (empty($_POST['username'])){
        $error['username'] = "you must enter your name<br>";
    }
    else {
        $username = $_POST['username'];
        if (!preg_match('/^[a-z]+$/', $username)){
            $error['username'] = "your name must writin by lower case (JUST lower case) <br>";
        }
    }
    //  Password input
    if (empty($_POST['pass'])){
        $error['pass'] = " you have to entere your password <br>";
    }
    else {
        $pass = $_POST['pass'];
        if (!preg_match('/^[a-zA-Z\w\S]+$/', $pass)){
            $error['pass'] = " you must use a-z , A-Z , numbers and no space between your writings <br>";
        }
    }

    if (array_filter($error)){
        $error['total'] = "your answers arent true";
    }
    else {
        header("Location: resume.html");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in form</title>
    <style>
        input{
            border: none ;
            border-bottom:2px solid #f5beba;
            box-shadow: 0px 2px 3px 2px #f5beba;
            border-radius: 4px;
            width: 210px;
            padding: 9px;
            margin: 8px;
        }
        .sub2{
            width: 80px;
            margin: 25px;
        }
        .sub2:hover{
            background-color: #e3aadd ;
        }
        p{
            color: purple;
            font-size: 12px;
        }
        .sec2{
            width: 290px;
            border: 6px double #e0709f;
            border-radius: 8px;
            align-items: center;
            text-align: center;
            margin: 0 auto;
            margin-top: 55px;
            background-image: url(pink.jpg);
            background-size:cover ;
        }
        h1{
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            color: #e0709f;
        }
    </style>
</head>

<body>
    <section class="sec2">
        <h1>complete follow form</h1>
        <div class="error">
            <p><?php echo $error['total'];  ?></p>
        </div>
        <form action="#" method="post">
            <label for="username">
                <div class="error">
                    <p><?php echo $error['username'];  ?></p>
                </div>
                <input type="text" name="username" placeholder="enter your name"> <br>
            </label>
            <label for="pass">
                <div class="error">
                    <p><?php echo $error['pass'];  ?></p>
                </div>
                <input type="password" name="pass" placeholder="enter your password"> <br>
            </label>
            <label for="submit">
                <input type="submit" name="submit" value="click me" class="sub2"> <br>
            </label>
        </form>
    </section>
</body>

</html>