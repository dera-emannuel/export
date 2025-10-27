<?php include '../../../../includes/config.php';?><?php 
    include '../../../asset/style.php';
    include './loginCodes.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="containe">
        <div class="genContainer">
            <form action="" method="POST">
                <h1>login your account</h1>
                <div class="forms">
                    <input type="text" placeholder="Email Address" name="email">
                    <input type="text" placeholder="Password" name="pass">
                    <div class="formBtn">
                        <button name="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>