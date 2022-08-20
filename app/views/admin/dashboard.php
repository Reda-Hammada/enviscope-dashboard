<!DOCTYPE html>
<html class='box-border' lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboad - EnviScope</title>
</head>
<body >
    <header>
        <nav class="w-full flex relative  justify-evenly">
            <div class="w-9/12">
                <img class="w-52 pl-2.5 pt-2.5" src="<?php echo URLROOT   ?>asset/images/logo.jpg" alt='logo'>
            </div>
            <i onclick=showSetting() id='icon_settings' class="fa fa-cog text-3xl cursor-pointer text-blue-900 mt-4" aria-hidden="true"></i>

            <div  id='settings'  style='display:none' class="select-none py-5 h-32 mr-3 drop-shadow-2xl ml-auto  w-52 pl-2.5  bg-white absolute rounded right-0 top-16" >

                <div   class=' w-full ml-auto mr-auto block font-bold flex flex-col items-center w-20   '>
                    <div class='text-blue-900'>
                        <a href="<?php echo URLROOT ?>admin/settings">paramètres</a>
                    </div>
                    <div class='pt-4'>                        
                        <button class="w-36 bg-blue-900 h-8 rounded-md"><a class='text-white text-base' href= <?php echo URLROOT . 'user/logout' ?>>déconnexion</a></button>
                    </div>
                </div>

            </div>
        </nav>
    </header>
    <main class='bg-zinc-100 h-screen mt-5'>
        <section>
       <h1 class='font-bold text-3xl pt-10 pl-10'>Bienvenue admin </h1>
 
        </section>
        <section class='flex flex-row justify-between mt-10 flex-wrap'>
           
            <div class= ' font-bold pt-8 pb-8 cursor-pointer rounded-md pt-auto h-32 ml-3 w-1/5 text-white text-center	bg-blue-900'>
                <a href='<?php echo URLROOT ?>admin/bienvenue'>
                    Modifier bienvenue
                </a>
            </div>
            <div class='cursor-pointer pt-8 pb-8 font-bold rounded-md w-1/4 text-white text-center	bg-blue-900'>
                <a href='<?php echo URLROOT ?>admin/references'>

                    Références
                </a>

            </div>
            <div class='cursor-pointer pt-8 pb-8  font-bold rounded-md w-1/4 text-white text-center	bg-blue-900'>
                <a href='<?php echo URLROOT ?>admin/projet'>

                    Projets en cours
                </a>
            </div>
            <div class='cursor-pointer pt-8 pb-8 font-bold rounded-md mr-3 w-1/4 text-white text-center	bg-blue-900'>
                <a href='<?php echo URLROOT ?>admin/competences'>

                    Compétences
                </a>
            </div>
        </section>
    </main>

<?php
 
 require_once '../app/views/inc/footer.php';

?>