<nav class="navbar navbar-expand-lg navbar-info bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link activ" href="#">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Галерея
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Фото</a>
                    <a class="dropdown-item" href="#">Видео</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Лучшее</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Команда</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Вход
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEntrance">Войти</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalRegistration">Новый пользователь</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalSettings">Настройка</a>
                </div>
            </li>
        </ul>
        <?php
            include_once('formEntrance.inc.php');
            include_once('formRegistration.inc.php');
            include_once('formSettings.inc.php');
        ?>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>