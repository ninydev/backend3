<html>
<head>
    <meta charset="utf-8">
</head>

<body>

<?php

$user = 'c1laravel';
$pass = 'QweAsdZxc!23';

echo '<h1> test PDO </h1>';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=c1backend3', $user, $pass);
    foreach($dbh->query('
    SELECT cars_config.id, cars_config.name, GROUP_CONCAT(distinct accessories.name) AS accessorie  FROM cars_config
JOIN cars_accessories ON cars_config.id = cars_accessories.cars_id
JOIN accessories ON cars_accessories.accessories_id = accessories.id
WHERE cars_config.id = 2
') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}





echo '<hr> <h1> Test MySqli</h1>';

$dbo = new mysqli('localhost', $user, $pass, 'c1backend3');
if ($dbo) {
    $res = $dbo->query('
    
    SELECT cars_config.id, cars_config.name, GROUP_CONCAT(distinct accessories.name) AS accessorie  FROM cars_config
JOIN cars_accessories ON cars_config.id = cars_accessories.cars_id
JOIN accessories ON cars_accessories.accessories_id = accessories.id
WHERE cars_config.id = 2

    ');
     print_r($res);
echo "<table>";
while ($row = $res->fetch_assoc()) {

    var_dump(  array_keys($row) );
    ?>
   <tr>
     <td><?php echo $row["id"]; ?></td>
     <td><?php echo $row["name"]; ?></td>
   </tr>
<?php }
    echo "</table>";


    echo "Connect well";
} else {
    echo "Connecnt fail";
}
//
//foreach($dbo->query('SELECT * from cars_config') as $row) {
//    print_r($row);
//}


?>
</body>
</html>

