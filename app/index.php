<?php
spl_autoload_register(function ($className) {
    include 'src/' . $className . '.php';
});


// $pdo = (new PDOClient('mysql', 'localhost', 'laravel-permission', 'root', ''))->connect();
// $products = $pdo->select('SELECT * FROM products')->get();
// var_dump($products);

// $mysql = (new MYSQLIClient('localhost', 'root', '', 'laravel-permission'))->connect();
// var_dump($mysql);
// $products = $mysqli->select("SELECT * FROM products")->get();

// $host = 'localhost';
// $db_user = 'root';
// $db_password = '';
// $db_name = 'laravel-permission';

// $client = (new MYSQLIClient($host, $db_user, $db_password, $db_name))->connect();
// $products = $client->select("SELECT * FROM products")->get();
// // var_dump($client);

// foreach ($products as $product) {
//     echo $product->name . '<br>';
// }


// this->host, $this->db_user, $this->db_password, $this->db_name


$billy = new Dog();
$loko = new Rabbit();

$billy->chase($loko);

var_dump($billy);
