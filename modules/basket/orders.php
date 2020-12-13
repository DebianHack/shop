<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/configs/configs.php';
include $_SERVER['DOCUMENT_ROOT'].'/modules/telegram/send_message.php';



/*
1. Проверить есть ли пользователь в БД с номером телефона что вел пользователь
2. Если нет, то регистрируем пользователя
3. Добавляем заказ в БД с привязкой к пользователю
*/
// Проверка на наличие POST запроса
if(isset($_POST) AND $_SERVER["REQUEST_METHOD"] =="POST")
{

    $sql = "SELECT * FROM users WHERE phone LIKE " .$_POST['phone'];
    $user_id = 0;
    $result = mysqli_query($connect, $sql);
    if($result->num_rows > 0)
    {
        
        $user = mysqli_fetch_assoc($result);
        $user_id = $user['id'];
    }
    else
    {
        $sql = "INSERT INTO users(login, phone) VALUES ('".$_POST['username']."', '".$_POST['phone']."')";

        if (mysqli_query($connect, $sql))
        {
            echo "User add!";
            $user_id = mysqli_insert_id($connect);
        }
        else
        {
            echo "error user";
        }
    }
    
    // Добавление заказов
    $sql = "INSERT INTO `orders` (`user_id`, `Name`, `address`, status) VALUES ( '".$user_id."', '".$_COOKIE[ 'basket' ]."', '".$_POST['address']."' , 'Новый');";
    if(mysqli_query($connect, $sql))
    {
        echo "Заказ оформлен <br/>
        <a href='/'>На главную</a>
        ";

        message_to_telegram('New order!');
    }
    else
    {
        echo "error order";
    }


}









// Это код домашнего задания из предыдущего урока. Не обращай внимание
// include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
/*
if( isset($_POST["submit"]))
	
	{
	// Вставить в таблицу
		$sql = "INSERT INTO orders (Name, address, phone) VALUES('".$_POST["Name"]."', '".$_POST["address"] ."' , '".$_POST["phone"]."')";
	
		if(mysqli_query($connect, $sql))
		{
			echo "<h2>Заказ оформлен</h2>" ;
			header("Location: /");
		}
		else
		{
			echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
		}
	}
*/
?>
<!-- <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Оформление заказа</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input name = "Name" type="text" class="form-control" placeholder="Name" >
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea name = "address" type="text" class="form-control" placeholder="address"></textarea> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <textarea name = "phone" type="text" class="form-control" placeholder="phone"></textarea> 
                                                </div>
                                            </div>
                                        </div>
                                        <button name = "submit" type="submit" class="btn btn-success btn-fill pull-right">Save</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div> -->

<?php 
// include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';
?>