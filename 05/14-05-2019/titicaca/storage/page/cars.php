<?php
/**
 * Created by PhpStorm.
 * User: golol
 * Date: 26.04.2019
 * Time: 20:31
 */
echo "<h3>Cars</h3></br>";
$tbl = new Kernel\DataBase\Color();
$tbl->getCount();
$arrName = explode("\\", strtolower(get_class($tbl)));
echo "<h2>".$arrName[sizeof($arrName)-1].'s'."</h2>";
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'del':
            $data = $tbl->Delete();
            include("view/save.tpl.php");
            break;
        case 'edit':
            $data = $tbl->getEditForm();
            include("view/edit.tpl.php");
            break;
        case 'saveEdit':
            $data = $tbl->Update();
            include("view/save.tpl.php");
            break;
        case 'add':
            $data = $tbl->getAddForm();
            include("view/add.tpl.php");
            break;
        case 'create':
            $data = $tbl->Create();
            include("view/save.tpl.php");
            break;
        default:
            echo "No Command";
    }
} else {
    if(isset($_GET['numCnt']))
{
    $data = $tbl->OrderBy('id')->Paginate($_GET['numCnt'])->Get();
}
else {
    $data = $tbl->OrderBy('id')->Get();
}
$pag =  $tbl->getPaginate();
include("view/all.tpl.php");


}

