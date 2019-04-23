Из базы получили
<?php
print_r ($data);
?>

<table border="2">
    <?php
    while ($row = $data->fetch_assoc()) {
        echo "<tr>";
        for($i = 0; $i < sizeof($this->viewFildsAll); $i++){
            echo "<td>" . $row[$this->viewFildsAll[$i]] . "</td>";
        }
        // print_r ($row);
        echo "<td><a href='" . $_SERVER['PHP_SELF'] ."?action=edit&id=" . $row['id'] . "'> Edit</a> </td>";
        echo "<td><a href='" . $_SERVER['PHP_SELF'] ."?action=del&id=" . $row['id'] . "'> Delete</a> </td>";
        echo "</tr>";
    }
    ?>
</table>
<a href="<?=$_SERVER['PHP_SELF']?>?action=add"> Add </a>
