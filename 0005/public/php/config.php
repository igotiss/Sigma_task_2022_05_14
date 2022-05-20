<?php

$host = 'localhost:3306';   /* Host name */
$db = 'sigma005';           /* Database name */
$user = 'root';             /* User */
$password = '';             /* Password */





/*
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
try {
    $pdo = new PDO($dsn, $user, $password);
    if ($pdo) {
        //echo "Connected to the $db database successfully!";
        $sql = 'SELECT * FROM products';
        $statement = $pdo->query($sql);
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($products);

    }
} catch (PDOException $e) {
    echo $e->getMessage();
}*/

