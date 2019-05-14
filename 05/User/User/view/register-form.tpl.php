Форма регистрации

<form action="<?=\User\RouteUser::getInstance()->getRegisterLink();?>" method="post">
    <input type="hidden" name="doUserAction" value="registerCreate">
    <label>e-mail</label><input type="text" name="email"><br>
    <label>pswd</label><input type="password" name="pswd"><br>
    <label>pswd1</label><input type="password" name="pswd1"><br>
    <input type="submit">


</form>

<?php
