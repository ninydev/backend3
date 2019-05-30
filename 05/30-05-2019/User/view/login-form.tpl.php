Форма регистрации

<form action="<?=\User\RouteUser::getInstance()->getLoginLink();?>" method="post">
    <input type="hidden" name="doUserAction" value="loginInto">
    <label>e-mail</label><input type="text" name="email"><br>
    <label>pswd</label><input type="password" name="pswd"><br>
    <input type="submit">


</form>

<?php
