<?php


/*
1. Добавить кнопку удаления товара - done
2. Пройтись по всему массиву товаров - done
3. Проверить id товара и удалить - done 





*/
if(isset($_POST) AND $_SERVER["REQUEST_METHOD"] =="POST")
{
	if(isset($_COOKIE['basket']))
	{
		$basket = $_COOKIE['basket'];
		$basket = json_decode( $_COOKIE[ 'basket' ], true );

		for($i = 0; $i < count( $basket[ 'basket' ] ); $i++)
		{
			if($basket[ 'basket' ][$i]['product_id'] == $_POST['id'])
			{
				unset($basket[ 'basket' ][$i]);
				sort($basket[ 'basket' ]);
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
	







?>



