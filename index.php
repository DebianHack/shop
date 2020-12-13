<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
header('Content-Type: text/html; charset=utf-8');
// Текущая страница
if (isset($_GET['page'])){
	$page = $_GET['page']; // текущая страница
}else $page = 1;
$kol = 6; //количество записей для вывода
$art = ($page * $kol) - $kol; // с какой записи выводить



$sql = "SELECT COUNT(*) FROM `products`"; // Определяем все количество записей в таблице

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

</div>
<?php 

for ($i = 1; $i <= $str_pag; $i++){

		echo "<a href=product_page.php?page=".$i."> Страница ".$i." </a>";
	}
?>
<!-- Вывод функции "Показать еще" -->
<!-- <div class="row">
	<div class="col-4 offset-4">
		<input type="hidden" value="1" id="current_page">
		<button class="btn btn-primary btn-lg " id="show_more">Показать еще</button>

	</div>


</div>
 -->
<?php

include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';

?>
  		

