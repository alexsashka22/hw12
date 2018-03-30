<?php
header ("Content-Type: text/html; charset=utf-8");

include_once 'config.php';

$sql = "select * from books";

// foreach ($pdo->query($sql) as $row) {
// echo $row['name'] . "<br />";
// }

// $res = mysqli_query($connect, $sql);

// while ($data = mysqli_fetch_assoc($res)) {
// 	echo "<pre>";
// 	var_dump($data);
	// echo $data['name'] . $data['author'] . $data['year'] . $data['genre'] . $data['isbin'] . "<br>";
// }

$where = [];

if (isset($_GET['isbn'])) {
	$where[] = "`isbn` LIKE '%{$_GET['isbn']}%'";
}

if (isset($_GET['name'])) {
	$where[] = "`name` LIKE '%{$_GET['name']}%'";
}

if (isset($_GET['author'])) {
	$where[] = "`author` LIKE '%{$_GET['author']}%'";
}

?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Книги</title>
	</head>
	<body>
		<h1>Библиотека успешного человека</h1>

    <form method="GET">
      <input type="text" name="isbn" placeholder="ISBN" value="">
      <input type="text" name="name" placeholder="Название книги" value="">
      <input type="text" name="author" placeholder="Автор книги" value="">
      <input type="submit" value="Поиск">
    </form>

    <table>
      <tbody>
			  <tr>
          <th>Название</th>
          <th>Автор</th>
          <th>Год выпуска</th>
          <th>Жанр</th>
          <th>ISBN</th>
        </tr>
		    <?php foreach ($pdo->query($sql) as $row) { ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['author'] ?></td>
          <td><?= $row['year'] ?></td>
          <td><?= $row['genre'] ?></td>
          <td><?= $row['isbn'] ?></td>
        </tr>
     <?php } ?>
      </tbody>
    </table>

	</body>
</html>
