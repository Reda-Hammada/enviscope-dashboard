<!DOCTYPE html>
<html class='box-border' lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel='stylesheet' href="<?php echo URLROOT?>asset/css/projet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projet</title>
</head>
<body>
<header>
        <nav class="w-full flex relative  justify-evenly">
            <div class="w-9/12">
                <img class="w-52 pl-2.5 pt-2.5" src="<?php echo URLROOT   ?>asset/images/logo.jpg" alt='logo'>
            </div>
            <div class="w-3/12 pl-2.5 pt-2.5" ">
                <i onclick=showSetting() id='icon_settings' class="fa fa-cog text-3xl cursor-pointer text-blue-900" aria-hidden="true"></i>

                    <div style='display:none'  id='settings'  class='block font-bold flex flex-col items-center w-20 bg-red-600	 absolute '>
                        <div>
                            <a href="<?php echo URLROOT ?>admin/settings">Settings</a>
                        </div>
                        <button class="w-24 bg-blue-900 h-8 rounded-md"><a class='text-white text-base' href= <?php echo URLROOT . 'user/logout' ?>>logout</a></button>
                    </div>

            </div>
        </nav>
    </header>
    <main class='bg-zinc-100 h-screen mt-5'>
        <div class='pt-16 pl-16'>
            <button class="w-40 bg-blue-900 h-12 rounded"><a class='text-white text-base font-bold' href= <?php echo URLROOT . 'admin/dashboard' ?>>Dashboard</a></button>

        </div>
    

        <!-- add project form -->
        <section class='w-9/12 mt-10 text-center'>
            <div onclick=showForm() id='add_toggle' class=' rounded select-none	 w-3/4 ml-auto h-14 pt-3 font-bold cursor-pointer text-2xl		 flex justify-between pr-4 pl-4 bg-white'>
                Ajouter un nouveau projet 
                <i   id='arrow'  class='fas text-blue-900  add_rotate'>&#xf106;</i>

            </div>
            <div class="flex flex-col pt-8 pb-8  align-center  rounded w-3/4 bg-white ml-auto " id="form_container" style='display:none'>
                <form id='form' method='post' action='<?php echo URLROOT ?>admin/projet'>
                    <div class="pb-5">

                        <input class='text-center h-10 text-inherit  pl-4 border-double w-1/2 rounded  border-2 border-blue-900' name ="year" type='text' placeholder="saiser l'annnee"/><br>
                        <span id='error' class='text-red-500 text-center'><?php if(isset($data['year_err'])){  echo $data['year_err']; } ?></span>
                      
                    </div>
                    <div class='pb-5'>

                            <textarea name='projet' class=' text-inherit h-20 w-1/2 resize-none border-double border-2 rounded border-blue-900' >
                            </textarea><br>
                            <span id='error' class='text-red-500 text-center'><?php if(isset($data['projet_err'])){ echo $data['projet_err']; } ?></span>

                    </div>

                    
                    <input class=' cursor-pointer w-24 bg-blue-900 h-8 rounded-md text-white font-bold' type='submit' name='add' value='ajouter'> 
                </form>
            </div>
        </section>
        <section>

            <!--projects table -->
            <table class='table-fixed mt-10  w-3/4  text-center mr-auto ml-auto bg-white'>
                <tr>
                    <th>Id</th>
                    <th>Year</th>
                    <th>Projet</th>
                    <th>Actions</th>

                </tr>

                <?php 

        foreach($data['projet'] as $displayProject): ?>
        
            <tr>
                <td><?php echo $displayProject['id']; ?>
                <td><?php echo $displayProject['year']; ?>
                <td><?php echo $displayProject['project']; ?>
                <td><button><a href="<?php echo URLROOT?>admin/editProject/<?php echo $displayProject['id']; ?>">Modifier</a></button>
                    <button><a href="<?php echo URLROOT?>admin/deleteProject/<?php echo $displayProject['id'];?>">Suprimer</a></button> 
                </td>
            </tr>
            

        <?php endforeach; ?>



            </table>
 
        </section>

    </main>





<?php
 
 require_once '../app/views/inc/footer.php';

?>