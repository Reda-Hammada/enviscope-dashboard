<!DOCTYPE html>
<html class='box-border' lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>competences</title>
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

        <!-- add competence form -->
        <section class='w-9/12 mt-10 text-center'>
            <div onclick=showForm() id='add_toggle' class=' rounded select-none	 w-3/4 ml-auto h-14 pt-3 font-bold cursor-pointer text-2xl		 flex justify-between pr-4 pl-4 bg-white'>
                Ajouter Compétence
                <i   id='arrow'  class='fas text-blue-900  add_rotate'>&#xf106;</i>

            </div>
            <div class="flex flex-col pt-8 pb-8  align-center  rounded w-3/4 bg-white ml-auto " id="form_container" style='display:none'>
                <form id='form' method='post' action='<?php echo URLROOT ?>admin/competences'>
                   
                    <div class='pb-5'>

                            <input  class='mb-5 text-inherit pl-3 h-10 mb-3 w-1/2  border-double border-2 rounded border-blue-900' type='text' name='title' placeholder='veuillez entrer le titre'><br>
                            <span id='error' class=' mb-5 text-red-500 text-center'><?php if(isset($data['title_err'])):  echo $data['title_err'];  
                                                                                          endif; ?></span><br>
                            <textarea name='body' class=' text-inherit h-20 w-1/2 resize-none border-double border-2 rounded border-blue-900' placeholder='veuillez entrer le paragraphe' ></textarea><br>
                            <span id='error'  class=' mb-5 text-red-500 text-center'><?php if(isset($data['body_err'])):  
                            echo $data['body_err']; endif;  ?>
                            </span>

                    </div>

                    
                    <input class=' cursor-pointer w-24 bg-blue-900 h-8 rounded-md text-white font-bold' type='submit' name='add' value='ajouter'> 
                </form>
            </div>
        </section>

        <!-- Compétences  -->

        <section class='flex flex-row bg-blue-900	justify-between'>

        <?php if(isset($data['competence_added'])):
                foreach($data['competence_added']  as $displayCompetences):   ?>

            <div>
                <h3><?php echo  $displayCompetences['title'] ?></h3>
                <p><?php echo $displayCompetences['body'] ?></p>
            <div>

        <?php endforeach;
              endif; ?>
        
        </section>
      
    </main>














<?php
 
 require_once '../app/views/inc/footer.php';

?>