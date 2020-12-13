<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
// Смена статуса товара
		$sql = "UPDATE orders SET status = 'Отправлен клиенту' WHERE id=".$_GET['id'].
		var_dump($sql);
		if(mysqli_query($connect, $sql))
		{
			echo "Отправлен";
			header("Location: /admin");
		}
		else
		{
			echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
		}
?>