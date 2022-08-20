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
<body id='body' class='bg-zinc-100'> 
<header id='nav_container'>
        <nav class="w-full flex relative bg-white justify-evenly pb-5">
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
        <div class='pt-16 pl-16' id='dashboard'>
            <button class="w-40 bg-blue-900 h-12 rounded"><a class='text-white text-base font-bold' href= <?php echo URLROOT . 'admin/dashboard' ?>>Dashboard</a></button>

        </div>
    

       <!-- add reference form -->
       <section id='add_container' class='w-9/12 mt-10 text-center'>
            <div onclick=showForm() id='add_toggle' class=' rounded select-none	 w-3/4 ml-auto h-14 pt-3 font-bold cursor-pointer text-2xl		 flex justify-between pr-4 pl-4 bg-white'>
                Ajouter  référence
                <i   id='arrow'  class='fas text-blue-900  add_rotate'>&#xf106;</i>

            </div>
            <div class="flex flex-col pt-8 pb-8  align-center  rounded w-3/4 bg-white ml-auto " id="form_container" style='display:none'>
                <form id='form' method='POST' action='<?php echo URLROOT ?>admin/references'>
                   
                    <div class='pb-5'>
                            
                            <input  class='mb-5 text-inherit pl-3 h-10 mb-3 w-1/2  border-double border-2 rounded border-blue-900' type='text' name='year' placeholder='veuillez entrer l’année'><br>
                            <span id='error' class=' mb-5 text-red-500 text-center'><?php if(isset($data['year_err'])){ echo $data['year_err']; } ?></span><br>

                            <textarea placeholder=' veuillez entrer le référence' name='reference' class=' mt-3  pl-3.1 h-20 w-1/2 resize-none border-double border-2 rounded border-blue-900' ></textarea><br>
                            <span id='error' class='text-red-500 text-center'><?php if(isset($data['reference_err'])){ echo $data['reference_err']; } ?></span>

                    </div>

                    
                    <input class=' cursor-pointer w-24 bg-blue-900 h-8 rounded-md text-white font-bold' type='submit' name='add' value='ajouter'> 
                </form>
            </div>
        </section>
        <section id='data_table'>

             <!--references table -->
             <table class='table-fixed mt-8 rounded w-3/4  text-center mr-auto ml-auto bg-white pb-5 border-separate border-spacing-2 border border-slate-500 mb-20'>
                <tr>
                    <th>Année</th>
                    <th>Référence</th>
                    <th>Actions</th>

                </tr>

                <?php 
            if(isset($data['reference_added'])):
        foreach($data['reference_added'] as $displayReferences): ?>
        
            <tr>
                <td><?php echo $displayReferences['year']; ?></td>
                <td><?php echo $displayReferences['reference'] ?></td>
                <td ><button  class='bg-blue-900 w-20 text-white rounded text-center '><a  href="<?php echo URLROOT?>admin/editReference/<?php echo $displayReferences['id']; ?>">Modifier</a></button>
                    <button class='bg-red-900 w-20 text-white rounded text-center ' ><a href="<?php echo URLROOT?>admin/deleteById/<?php echo $displayReferences['id'];?>">Suprimer</a></button> 
                </td>
            </tr>
            

        <?php endforeach; 
              endif;
              ?>



            </table>
 
        </section>
       
        <!-- edit reference -->
        <section class='w-full h-screen absolute inset-0 bottom-0.5		' id="edit_container"> 
            <div class="flex flex-col pt-8 pb-8  align-center h-80 mt-48	pt-10 pb-10 rounded w-3/4 bg-white ml-auto mr-auto">

                <form method='POST' >
                <span class='float-right mr-10 mt-0.5 font-bold cursor-pointer hover:text-blue-900 text-xl	 ' id="c">x</span>

                    <div class='text-center pt-20'>

                        <?php if(isset($data['edit_year'])): ?>
                        <input  class='mb-5 text-inherit pl-3 h-10 mb-3 w-1/2  border-double border-2 rounded border-blue-900' value="<?php echo $data['edit_year']?>" type='text' name='year' placeholder='veuillez entrer l’année'><br>
                        <?php endif; ?>
                        <textarea class='h-20 w-1/2 resize-none border-double border-2 rounded border-blue-900' name='reference'>  <?php if(isset($data['edit_reference'])): echo $data['edit_reference']; endif; ?></textarea>
                                 
                      
                    <div>
                    <div>
                        <input class=' mt-2 cursor-pointer w-52 bg-blue-900 h-8 rounded-md text-white font-bold' type='submit' name='editReference' value='Modifier référence' >
                    </div>
                </form>
            </div>
        </section>

    </main>





<?php
 
 require_once '../app/views/inc/footer.php';

?>