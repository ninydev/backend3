<?php
$url = explode("?", $_SERVER['REQUEST_URI']);
?>

<form action="<?=$url[0]?>" method="get">

    <input type="hidden" name="action" value="create">
    <?php
    for($i = 0; $i < sizeof($tbl->addFilds); $i++){
        echo '<div class="form-group">';
        echo '<label for="'. $tbl->addFilds[$i]. '">'. $tbl->addFildsAlter[$i] . '</label>';
        echo '<input type="text" class="form-control" id="' . $tbl->addFilds[$i] . '" name="'.$tbl->addFilds[$i].'" value=""/>';
        echo '</div>';
    }
    ?>
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>