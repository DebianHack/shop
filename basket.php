<?php
/*
1. Вывсти блок с корзиной - в шапке сайта - done
2. Сделать таблицу в БД для хранения заказов - done
3. Добавление товара в корзину
	3.1 Сделать клик по кнопке добавить в корзину - done
	3.2 Добавить товар в куки корзины - done
	3.3 Отобразить что товар добавился на корзине
4. Сделать страницу корзины
5. Сделать оформление заказа
*/
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';

?>
<div class="row" id="products">
		<table class="table table-dark">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Title</th>
	      <th scope="col">Count</th>
	      
	      <th scope="col">Costs</th>
	      <th scope="col">Username</th>
	      <th scope="col">Options</th>
	      
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 
	  	// Проверка на наличие куки
	  	if( isset( $_COOKIE[ 'basket' ]) )
	  	{


	  		// Декодирование JSON форматы
	  		$basket = json_decode( $_COOKIE[ 'basket' ], true );
	  		
	  		// Цикл для вывода товаров таблицу
	  		for ($i=0 ; $i < count( $basket[ 'basket' ] ); $i++)
	  		{
	  			$sql = "SELECT * FROM products WHERE id=". $basket['basket'][$i]['product_id'];
	  			$result = mysqli_query($connect, $sql);
	  			$product = mysqli_fetch_assoc($result);
	  			?>
	  			<tr>
			      <th scope="row"><?php echo $product['id'] ?></th>
			      <td><?php echo $product['title'] ?></td>
			      <td>
			      	<!--  Изменить количество товаров и расчитать стоимость -->
			      	<input metod = "POST" type="text" name="count" value="<?php echo $basket['basket'][$i]['count']; ?>" onchange = "editCountCostProduct(this, <?php echo $product['id'] ?>)" ></td>
			      	</td>
			      	
			      <td><?php echo number_format($product['costs'] * $basket['basket'][$i]['count'], 2)?></td>
			      <td>
			      	<!--  Ссылка на страницу оформление заказа -->
			      	<a href="/modules/basket/orders.php" class="btn btn-primary">Оформить заказ </a>
			      	</td>
			      	<!--  Удалить товар из корзины -->
			      	<td><button onclick="deleteProductBasket(this, <?php echo $product['id'] ?>)"class="btn btn-primary">Delete</button></td>
	    		</tr>
	    		
	    		<?php
	  		}
	  	}
	  	?>   
	  </tbody>
	</table>
</div>



<div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Оформить заказ</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="/modules/basket/orders.php">
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Ваше имя</label>
                                                    <input name = "username" type="text" class="form-control" placeholder="username" >
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Ваш адрес</label>
                                                    <input name = "address" type="text" class="form-control" placeholder="address" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Ваш телефон</label>
                                                    <input name = "phone" type="text" class="form-control" placeholder="phone" >
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button name = "submit" type="submit" class="btn btn-success btn-fill pull-right">Оформить заказ</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>




</div>



<?php
include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';
?>
  		

