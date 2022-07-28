<?php 

require_once '../app/views/inc/header.php';

if(isset($_GET['login'])):  

    $_GET['password'] = $data['password'];
    $_GET['username'] = $data['username'];

   print_r($data);

endif;
?>


<a href="<?php  echo URLROOT .'pages/index.php'?>">HOME</a>
<h1>Login page</h1>
<form class='form-group' method='GET'>
    <input type='text' name="username">
    <input type="password" name="password">
    <input type="submit" name='login' value="login">
</form>
<?php

require_once '../app/views/inc/footer.php';

?>