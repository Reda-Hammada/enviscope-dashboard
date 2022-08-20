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
<body class='bg-zinc-100'>
    <header class='bg-white pb-3'>
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
    <main>

        <div class='pt-16 pl-16' id='dashboard'>
            <button class="w-40 bg-blue-900 h-12 rounded"><a class='text-white text-base font-bold' href= <?php echo URLROOT . 'admin/dashboard' ?>>Dashboard</a></button>

        </div>
    
        <section class='w-9/12 mt-10 text-center'>
            <div  class=' rounded select-none	 w-3/4 ml-auto h-14 pt-3 font-bold cursor-pointer text-2xl		 flex justify-between pr-4 pl-4 bg-white'>
                <h3>changer votre mot de passe</h3>
            </div>
           
                <form method='POST' action='<?php echo URLROOT ?>admin/settings'>
                    <div class="flex flex-col pt-8 pb-8  align-center   rounded w-3/4 bg-white ml-auto ">

                        <div class='mx-auto w-full'>
                            <input placeholder='ancien mot de passe ' class='mb-5 text-inherit pl-3 h-10 mb-3 w-3/5  border-double border-2 rounded border-blue-900' type='password' name='oldpassword' ><br>
                            <span id='error' class=' mt-3 text-red-500 text-center'><?php if(isset($data['oldpassword_err']) || isset($data['doesntmatch'])): 
                                                                                                echo $data['oldpassword_err']; 
                                                                                                echo $data['doesntmatch'];

                                                                                            endif;?>
                                                                                            </span><br>

                        </div> 
                        <div class='mx-auto w-full'>

                            <input placeholder='nouveau mot de passe' class='mb-5 text-inherit pl-3 h-10 mb-3 w-3/5  border-double border-2 rounded border-blue-900' type='password' name='newpassword' ><br>
                            <span id='error' class=' mt-3 text-red-500 text-center'><?php if(isset($data['newpassword_err'])): 
                                                                                                echo $data['newpassword_err']; 

                                                                                            endif;?>
                                                                                            </span><br>

                        </div> 
                        <div class='mx-auto w-full'>

                            <input type='submit' class=' cursor-pointer w-52 bg-blue-900 h-8 rounded-md text-white font-bold'   name='change' value='changer le mot de pass'>
                        </div> 

                       
                    </div>
                </form>
           
        </section>
    </main>

<?php
 
 require_once '../app/views/inc/footer.php';

?>