<?php
$url = explode("?", $_SERVER['REQUEST_URI']);
echo '<table class="table-sm table-hover">
    <thead>
    <tr>';
        for($i = 0; $i < sizeof($tbl->viewFildsAllAlter); $i++){
        echo "<th>" . $tbl->viewFildsAllAlter[$i] . "</th>";
        }
        echo '</tr>
    </thead>';
    while ($row = $data->fetch_assoc()) {
    echo "<tr>";
        for($i = 0; $i < sizeof($tbl->viewFildsAll); $i++){
        echo "<td>" . $row[$tbl->viewFildsAll[$i]] . "</td>";
        }
        // print_r ($row);

        echo '<td><a class="btn btn-outline-warning btn-sm" title="Edit" role="button" href="' . $url[0] .'?action=edit&id=' . $row['id'] . '"><i class="fas fa-pencil-alt">e</i></a> </td>';
        echo '<td><a class="btn btn-outline-danger btn-sm" title="Delete" role="button" href="' . $url[0] .'?action=del&id=' . $row['id'] . '"><i class="fas fa-times">d</i></a> </td>';
        echo "</tr>";
    }

    echo '</table></br><a class="btn btn-outline-success btn-sm" title="Add" role="button" href="' . $url[0] . '?action=add"><i class="fas fa-plus">add</i></a>';