<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
$page = "products";
include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/header.php';






if(isset($_GET["id"] ))
{
	
	$sql = "DELETE FROM categories WHERE id = '".$_GET["id"] ."' " ;
	var_dump($sql);
	if(mysqli_query($connect,$sql))
		{
			header("Location: /admin");

		}
	else
	{
		echo "<h2>Ошибка</h2>". mysqli_error($connect); 
	}
}
?>

<?php 
include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/footer.php';
?>