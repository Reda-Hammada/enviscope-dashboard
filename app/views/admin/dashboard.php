<?php 


?>

<!DOCTYPE html>
<html class='box-border' lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboad - EnviScope</title>
</head>
<body>
    <header>
        <nav class="w-full flex  justify-evenly">
            <div class="w-9/12">
                <img class="w-52" src="<?php echo URLROOT   ?>asset/images/logo.jpg" alt='logo'>
            </div>
            <div class="w-3/12">
            <a href= <?php echo URLROOT . 'user/logout' ?>>logout</a>

            </div>
        </nav>
    </header>
    <main>
        <section>
        <h1>Welcome <?php echo $_SESSION['username'] ?></h1>

        </section>
    </main>








<?php
 
 require_once '../app/views/inc/footer.php';

?>