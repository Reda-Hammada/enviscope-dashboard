<?php 
require_once '../app/views/inc/header.php';

?>



<section class="form_container">

<div class="logo_container">
    <img src="<?php echo URLROOT?>asset/images/logo.jpg"  alt="logo">
</div>

    <form action='<?php echo URLROOT?>user/login' class=' form form-group' method='GET'>

        <label class='label' for='name'>nom d'utilisateur :</label>
        <div class="username">
      
            <input type='text' name="username" value=<?php echo $data['username'] ?>><br>
            <span ><?php echo $data['username_err'] ?></span>
        </div>

        <label  class='label' for='name'>mot de pass :</label>
        <div class="password">
             <inputtype="password" name="password" value=<?php echo $data['username_err'] ?>>

        </div>
        <div class='login'>
            
            <input type="submit" name='login' value="login">

        </div>
    </form>

</section>



<?php
require_once '../app/views/inc/footer.php';
?>