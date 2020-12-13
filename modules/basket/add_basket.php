<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

/*
1. Получить товар по которому кликнул пользователь - done
2. Добавить в массив товар - done
3. Добавить массив в куки - done
4. Перебрать прошлый массив
	4.1 Преобразовать JSON с куки в массив
	4.2 Добавить новый элемент в массив
	4.3 Преобразовать массив в правильный json
	4.4 Добавить в куки
*/

// Проверка на наличие POST запроса
if(isset($_POST) AND $_SERVER["REQUEST_METHOD"] =="POST")
{

	$sql = "SELECT * FROM products WHERE id =".$_POST['id'];
	$result = mysqli_query($connect, $sql);
	$product = mysqli_fetch_assoc($result);

// Проверка на наличие куки
	if(isset($_COOKIE['basket'])) // Если в корзине что то есть
	{
		$basket = json_decode( $_COOKIE[ 'basket' ], true );

		/*
		1. Пройтись по всему массиву корзины - done
		2. Проверить есть ли совпадение по id
		3. Если совпадения есть: увеличить количество товара
		*/
		$issetProduct = 0;
		for($i = 0; $i < count($basket[ "basket" ]); $i++)
		{
			if( $basket[ "basket" ][$i]["product_id"] == $product['id'] )
			{
				$basket[ "basket" ][$i]["count"]++;
				$issetProduct = 1;
			}
			
		}
		if($issetProduct != 1)
			{
				$basket[ "basket" ][ ] = [ 
				"product_id" => $product[ 'id' ],
				"count" => 1
			];
		}



		

		/*
			product_id: 1,
			count: 3


		*/


	}
	else
	{
		// Если в корзине пусто
		$basket = [ "basket" => [ 
			["product_id" => $product[ 'id' ],
			"count" => 1]
		] ];
	}
	
 //Преобразования массива в JSON формат
	
	$jsonProduct = json_encode($basket);

 	setcookie("basket", "",0, "/");
 	//Добавляем куки
	setcookie("basket",$jsonProduct, time() + 60*60, "/");

	// echo $jsonProduct;
	



	echo json_encode([
		"count" => count( $basket[ 'basket' ] )
	]);
}
?>