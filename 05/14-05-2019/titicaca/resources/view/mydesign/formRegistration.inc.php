<?php

function getSelect($begin, $end)
{
    $varOption="";
    for ($i=$begin; $i <= $end; $i++) {
        $varOption .= "<option>" . $i . "</option>\n";
    }
    return $varOption;
}
?>
<!-- Modal Registration-->
<div class="modal fade" id="ModalRegistration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input id="Fname" type="text" class="form-control" name="Fname" 
                                <?php
                                if(isset($_POST['Fname']))
                                    echo 'value="'.$_POST['Fname'].'"';
                                else
                                    echo 'value=""';
                                ?>
                                placeholder="Имя"/>
                            </div>
                            <div class="col">
                                <input id="Lname" type="text" class="form-control" name="Lname" value="" placeholder="Фамилия"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input id="loginReg" type="text" class="form-control" name="loginReg" value="" placeholder="Login"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input id="pswdReg" type="password" class="form-control" name="pswdReg" value="" placeholder="Password"/>
                            </div>
                            <div class="col">
                                <input id="confpawdReg" type="password" class="form-control" name="confpawdReg" value="" placeholder="Confirm Password"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bd">Дата рождения</label>
                        <div class="row">
                            <div class="col">
                                <select id="day" name="day" class="form-control">
                                    <?php
                                        echo getSelect(1, 31);
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <select id="month" name="month" class="form-control">
                                    <option value="1"> Январь </option>
                                    <option value="2"> Февраль </option>
                                    <option value="3"> Март </option>
                                    <option value="4"> Апрель </option>
                                    <option value="5"> Май </option>
                                    <option value="6"> Июнь </option>
                                    <option value="7"> Июль </option>
                                    <option value="8"> Август </option>
                                    <option value="9"> Сентябрь </option>
                                    <option value="10"> Октябрь </option>
                                    <option value="11"> Ноябрь </option>
                                    <option value="12"> Декабрь </option>
                                </select>
                            </div>
                            <div class="col">
                                <select id="year" name="year" class="form-control">
                                <?php
                                    echo getSelect(1980, 2000);
                                    ?>
                                </select>
                            </div>
                        </div>
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col justify-content-end">
                                <button type="reset" name="reset" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                <button type="submit" name="entrance" class="btn btn-primary" value="ok">Зарегистрироваться</button>
                            </div>
                        </div>                       
                    </div>
                </form>      
            </div>
        </div>
    </div>
</div>
<!-- End Modal Registration-->