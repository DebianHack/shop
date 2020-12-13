<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';


/*

Сделай изменение количества товаров в корзине используя AJAX
1. Проверить сколько товаров было добавлено в корзину с основной страницы (Проверить куки count)
2. 





*/
if(isset($_POST) AND $_SERVER["REQUEST_METHOD"] =="POST")
{
	if(isset($_COOKIE['basket']))
	{
		$basket = $_COOKIE['basket'];
		var_dump($basket );

		$basket = json_decode( $_COOKIE[ 'basket' ], true );
		
		for($i = 0; $i < count( $basket[ 'basket' ] ); $i++)
		{
			if($basket[ 'basket' ][$i]['product_id'] == $_POST['id'])
			{
				$basket[ 'basket' ][$i]['count'] = $_POST['count'];
			}
		}
		//Преобразования массива в JSON формат
			
			$jsonProduct = json_encode($basket);

		 	setcookie("basket", "",0, "/");
		 	//Добавляем куки
			setcookie("basket",$jsonProduct, time() + 60*60, "/");

			echo $jsonProduct;
	}
}
else
{
	echo "POST не прошел";
}
?>