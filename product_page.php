<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';

// Текущая страница
if (isset($_GET['page'])){
	$page = $_GET['page']; // текущая страница
}else $page = 1;
$kol = 6; //количество записей для вывода
$art = ($page * $kol) - $kol; // с какой записи выводить


// Определяем все количество записей в таблице
$sql = "SELECT COUNT(*) FROM `products`";

$res = mysqli_query($connect,$sql);
$row = mysqli_fetch_array($res);
$total = $row[0]; // всего записей
$str_pag = ceil($total / $kol); // количество страниц для пагинации
?>


<div class="row" id="products">
	<?php 

	$sql = "SELECT * FROM products LIMIT $art, $kol";
	$result = mysqli_query($connect, $sql);
	while ($row = mysqli_fetch_assoc($result)) 
	{
		include $_SERVER['DOCUMENT_ROOT']. '/parts/product_card.php';
		?>
	
		<?php
	}

	?>
	<?php 
	// Переключение между страницами
	for ($i = 1; $i <= $str_pag; $i++){
		
			echo "<a href=product_page.php?page=".$i."> Страница ".$i." </a>";
	}


	?>

</div>