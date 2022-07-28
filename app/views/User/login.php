<?php 

require_once '../app/views/inc/header.php';


?>



<section class="form_container">

<div class="logo_container">
    <img src="<?php echo URLROOT?>asset/images/logo.jpg"  alt="logo">
</div>

    <form class=' form form-group' method='GET'>
        <div class="username">
            <input type='text' name="username">
        </div>
        <div class="password">
             <input type="password" name="password">
        </div>
        <div class='login'>
            
            <input type="submit" name='login' value="login">

        </div>
    </form>

</section>



<?php

require_once '../app/views/inc/footer.php';

?>