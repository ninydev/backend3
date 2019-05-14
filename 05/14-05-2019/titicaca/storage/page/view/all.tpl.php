<?php
    $url = explode("?", $_SERVER['REQUEST_URI']);
?>
    <a class="btn btn-light btn-sm <?=($pag['num']==$pag['count'])? "active":""?>" href="<?=$url[0].'?numCnt='.$pag['count']?>">All</a>
    <a class="btn btn-light btn-sm <?=($pag['num']==3)? "active":""?>" href="<?=$url[0].'?numCnt=3'?>">3</a>
    <a class="btn btn-light btn-sm <?=($pag['num']==5)? "active":""?>" href="<?=$url[0].'?numCnt=5'?>">5</a>
    <a class="btn btn-light btn-sm <?=($pag['num']==10)? "active":""?>" href="<?=$url[0].'?numCnt=10'?>">10</a>
    <a class="btn btn-light btn-sm <?=($pag['num']==20)? "active":""?>" href="<?=$url[0].'?numCnt=20'?>">20</a>
    Количество записей на странице
<?php
    echo '<table class="table-sm table-hover"><thead><tr>';
    for($i = 0; $i < sizeof($tbl->viewFildsAllAlter); $i++)
    {
        echo "<th>" . $tbl->viewFildsAllAlter[$i] . "</th>";
    }
    echo '</tr></thead>';
    while ($row = $data->fetch_assoc()) {
        echo '<tr>';
        for($i = 0; $i < sizeof($tbl->viewFildsAll); $i++){
            echo "<td>" . $row[$tbl->viewFildsAll[$i]] . "</td>";
        }
        echo '<td><a class="btn btn-outline-warning btn-sm" title="Edit" role="button" href="' . $url[0] .'?action=edit&id=' . $row['id'] . '"><i class="fas fa-pencil-alt"></i></a> </td>';
        echo '<td><a class="btn btn-outline-danger btn-sm" title="Delete" role="button" href="' . $url[0] .'?action=del&id=' . $row['id'] . '"><i class="fas fa-times"></i></a> </td>';
        echo "</tr>";
    }

    echo '</table></br><a class="btn btn-outline-success btn-sm" title="Add" role="button" href="' . $url[0] . '?action=add"><i class="fas fa-plus"></i></a>';

    if(isset($pag['num']))
    {
        $str = '<nav aria-label="Page navigation example">
            <ul class="pagination">
            <li class="page-item"><a class="page-link active" href="' . $pag['url'] . 'pagStart=0' . '">Start</a></li>';

        for ($i = 0; $i < $pag['count']/$pag['num']; $i++)
            {
                $pg = $i+1;
                $str .= '<li class="page-item"><a class="page-link" href="' . $pag['url'] . 'pagStart=' . $i*$pag['num'] . '">' . $pg . '</a></li>';
            }

        $str .= '<li class="page-item"><a class="page-link" href="'.$pag['url'] . 'pagStart='. $pag['pagStart'].'">End</a></li>';
        $str .= '</ul></nav>';
        echo $str;
     }
