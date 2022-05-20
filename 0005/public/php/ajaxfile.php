<?php



include "../php/config.php";

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
try {
    $connect = new PDO($dsn, $user, $password);
    if ($connect) {
        //echo "Connected to the $db database successfully!";
        $sql = 'SELECT * FROM products';
        $statement = $connect->query($sql);
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        $_GET = json_encode($products);
        echo $_GET;
        exit;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}





