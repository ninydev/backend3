<!-- Modal Entrance-->
<div class="modal fade" id="ModalEntrance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input id="login" type="text" class="form-control" name="login" value="" placeholder="Login"/>
                            </div>
                            <div class="col">
                                <input id="pswd" type="password" class="form-control" name="pawd" value="" placeholder="Password"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="checkbox" value="1"> Запомнить меня
                    </div>
                    <div class="form-group center">
                        <button type="reset" name="reset" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="submit" name="entrance" class="btn btn-primary" value="ok">Войти</button>
                    </div>
                </form>      
            </div>
        </div>
    </div>
</div>
<!-- End Modal Entrance-->