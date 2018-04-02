<?php

// $server = 'localhost';
// $login = 'root';
// $pass = '';
// $bd = "hw12";
//
// $connect = mysqli_connect($server, $login, $pass, $bd);

// try {
//     $pdo = new PDO('mysql:host=localhost;dbname=hw12', 'root', '');
//     }
//     catch (PDOException $e) {
//         die("Error!: " . $e->getMessage());
//     }
$isbn = "";
$name = "";
$author = "";

define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','hw12');
define('DB_USER','root');
define('DB_PASS','');

try {
	$connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
	$db = new PDO($connect_str, DB_USER, DB_PASS);
	$post = $_POST;

	if (isset($post['isbn']) || isset($post['name']) || isset($post['author'])) {
		$isbn = $post['isbn'];
		$name = $post['name'];
		$author = $post['author'];
		$sql = ("select * from books where isbn LIKE '%{$post['isbn']}%' and name LIKE '%{$post['name']}%' and author LIKE '%{$post['author']}%'");
	} else {
		$sql = ("select * from books");
		}
	}
	catch (PDOException $e) {
			die("Error!: " . $e->getMessage());
	}


 ?>
