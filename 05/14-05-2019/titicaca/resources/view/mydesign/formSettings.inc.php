<!-- Modal Settings-->
<div class="modal fade" id="ModalSettings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Настройки</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="index.html" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                Цвет фона
                                <div class="example-content well">
                                    <div class="example-content-widget">
                                        <div id="color-picker-component1" class="input-group colorpicker-component">
                                            <input name="bgColor" type="text" value="<?=$_SESSION['bgColor']; ?>" class="form-control"/>
                                            <span class="input-group-addon"><i></i></span>
                                        </div>
                                        <script>
                                            $(function () {
                                                $('#color-picker-component1').colorpicker();
                                            });
                                        </script>
                                    </div>
                                </div>                               
                            </div>
                            <div class="col">
                                Цвет текста
                                <div class="example-content well">
                                    <div class="example-content-widget">
                                        <div id="color-picker-component" class="input-group colorpicker-component">
                                            <input name="txColor" type="text" value="<?=$_SESSION['txColor']; ?>" class="form-control"/>
                                            <span class="input-group-addon"><i></i></span>
                                        </div>
                                        <script>
                                            $(function () {
                                                $('#color-picker-component').colorpicker();
                                            });
                                        </script>
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" checked type="radio" name="typeSetting" id="session" value="session">
                        <label class="form-check-label" for="inlineRadio1">Session</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typeSetting" id="coookies" value="coookies">
                        <label class="form-check-label" for="inlineRadio2">Cookies</label>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="form-group center">
                        <button type="reset" name="reset" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="submit" name="settings" class="btn btn-primary" value="ok">Применить</button>
                    </div>
                </form>      
            </div>
        </div>
    </div>
</div>
<!-- End Modal Settings-->