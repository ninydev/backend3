<?php

$user = 'c1laravel';
$pass = 'QweAsdZxc!23';

echo '<h1> test PDO </h1>';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=c1backend3', $user, $pass);
    foreach($dbh->query('SELECT * from cars_config') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


echo '<hr> <h1> Test MySqli</h1>';

$dbo = new mysqli('localhost', $user, $pass, 'c1backend3');
//
//foreach($dbo->query('SELECT * from cars_config') as $row) {
//    print_r($row);
//}


