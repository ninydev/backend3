<?php
$user = 'c1laravel';
$pass = 'QweAsdZxc!23';

// Step 1
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}


try {
    $db = new PDO('mysql:host=localhost;dbname=c1backend3', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$sql = "SELECT * FROM cars_config 
JOIN colors ON cars_config.color=colors.id
";

$wcount = 0;

if (isset($id) AND is_numeric($id)) {
    $where[$wcount]= " cars_config.id=" .$id . " ";
    $wcount++;
}
if (isset($where)){
    $sql.= "WHERE ". implode(" AND ", $where );
}
echo "SQL string: " . $sql;

$dbAnswer = $db->query($sql);

?>



<html>
<head>
    <meta charset="utf-8">
</head>

<body>

<form action="<?=$_SERVER['PHP_SELF']?>">

    <?php
    $q = $db->prepare("DESCRIBE cars_config");
    $q->execute();
    $table_fields = $q->fetchAll(PDO::FETCH_COLUMN);

    //$table_fields = array_keys( $dbAnswer->fetch() );


    for ($i = 0; $i < sizeof($table_fields); $i++) {
        echo
            '
            <label>' . $table_fields[$i] . '</label>
            <input name="' . $table_fields[$i] . '" value="' . $_GET[$table_fields[$i] ] .  '" /><br />';
    }


    ?>
<input type="submit">
</form>
<h3> Result: </h3>
<ul>
<?php
print_r($dbAnswer);
foreach ($dbAnswer as $row){
    echo '<li>' . $row["id"] . " "  . $row["name"] . '</li>';
}
?>
</ul>

</body>
</html>

