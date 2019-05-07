<?php
$url = explode("?", $_SERVER['REQUEST_URI']);
?>

<form action="<?=$url[0]?>" method="get">

        <input type="hidden" name="id" value="<?=$data['id']?>">
        <input type="hidden" name="action" value="saveEdit">
        <?php
        for($i = 0; $i < sizeof($tbl->editFilds); $i++){
            echo '<div class="form-group">';
            echo '<label for="'. $tbl->editFilds[$i]. '">'. $tbl->editFildsAlter[$i] . '</label>';
            echo '<input type="text" class="form-control" id="' . $tbl->editFilds[$i] . '" name="'.$tbl->editFilds[$i].'" value="' . $data["row"][$tbl->editFilds[$i]] .  '"/>';
            echo '</div>';
        }
        ?>
        <button type="submit" class="btn btn-success">Сохранить</button>
</form>