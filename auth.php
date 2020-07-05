<?php
session_start( [
    'cookie_lifetime' => 300,
] );

if (isset($_POST['username']) && $_POST['password']) {
    if ($_POST['username']=='admin' && $_POST['password']=='password') {
        $_SESSION['loggedin']=true;
    }else{
        $_SESSION['loggedin']=false;
    }
}
if (isset($_POST['logout'])) {
    session_destroy();
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.0/milligram.css">
    <title>Login</title>
    <style>
        body{
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="column column-60 column-offset-20">
            <h2>Simple Auth Example</h2>
        </div>
    </div>
    <div class="row">
        <div class="column column-60 column-offset-20">
            
              <?php 
                if (isset($_SESSION['loggedin'])) {
                    echo "Hello Admin, Welcome";
                }else{
                    echo "Hello User, Login Blow";
                }

               ?>

        </div>
    </div>
    <div class="row" style="...">
   
        <div class="column column-60 column-offset-20">
                <?php 
                    if (isset($_SESSION['loggedin'])==false):
                   

                 ?>
            <form action="" method="POST">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <button type="submit" class="button-primary" name="submit">Login In</button>
            </form>
        </div>
        <?php else: ?>
            <form accept="auth.php" method="POST">
                <input type="hidden" name="logout" value="1">
                <button type="submit" class="button-primary" name="submit">Login Out</button>
            </form>
    <?php endif; ?>

</div>
</body>
</html>
