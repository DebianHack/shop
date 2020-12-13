<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

// Если существует код верификации
if(isset($_GET['u_code']))
{
	$sql = "SELECT * FROM users WHERE confirm_mail='" .$_GET['u_code'] ."'";
	$result = mysqli_query($connect, $sql);
	if ($result->num_rows > 0)
	{
		$user = mysqli_fetch_assoc($result);
		// Менять статус верификации
		$sql = "UPDATE `users` SET `veryfided` = '1' WHERE id= " . $user['id'];
		
		if(mysqli_query($connect, $sql))
		{
			echo "Пользователь верифицирован";
			// Удалить значение кода верификации
			$sql = "UPDATE `users` SET `confirm_mail` = '' WHERE `users`.`id` = '". $user['id']."'";
			$result = mysqli_query($connect, $sql);
		}
		else
		{
			echo "Error";
		}
	}
}


// Проверка на POST запрос
if(isset($_POST) AND $_SERVER["REQUEST_METHOD"] =="POST")
{
	$password = md5($_POST['pass']);
	$u_code = generateRandomString(20);
	//Регистрация
	$sql = "INSERT INTO users(login, password, email, confirm_mail) VALUES ('".$_POST['username']."', '".$password."', '".$_POST['email']."', '$u_code' )";
	if(mysqli_query($connect, $sql))
	{
		echo "Пользователь зарегистрован! Вам выслано на почту подтверждение регистрации";

		$link = "<a href='http://shop-master.local/register.php?u_code=$u_code'>Confirm</a>";
		// Отправка письма на локальный сервер
		mail($_POST['email'], 'Register', $link);
	}
}
// Функция формирование рандомного кода верификации
function generateRandomString($length = 10) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/*
1. Сделать форму регистрации - done
2. Сделать отправку формы - done
3. Сделать отправку письма со ссылкой на подтверждение регистрации - done
4. Сделать страницу с подтверждением регистрации - done
*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
<form method="POST">
	<p>Username <br/>
		<input type="text" name="username">
	</p>
	<p>Email<br/>
		<input type="text" name="email">
	</p>
	<p>Password<br/>
		<input type="password" name="pass">
	</p>
	<button type="submit">Register</button>
</form>
<form action="errorlet.php">
<p>Не пришло письмо? Кликните по кнопке <br/>
		<button  type="submit">Help</button>
	</p>
</form>
</body>
</html>