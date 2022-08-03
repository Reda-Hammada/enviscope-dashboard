<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboad - EnviScope</title>
</head>
<body>
    <header>
        <nav>
            <div>
                <img src="<?php echo URLROOT   ?>asset/images/logo.jpg" alt='logo'>
            </div>
            <div>
            </div>
        </nav>
    </header>

<a href= <?php echo URLROOT . 'user/logout' ?>>logout</a>

<h1>Welcome <?php echo $_SESSION['username'] ?></h1>









<?php
 
 require_once '../app/views/inc/footer.php';

?>