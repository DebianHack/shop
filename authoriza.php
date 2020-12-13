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
		$sql = "UPDATE `users` SET `veryfided` = '1' WHERE id= " . $user['id'];

		if(mysqli_query($connect, $sql) )
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
	else
	{
		echo "Error";
	}
}

if(isset($_POST) AND $_SERVER["REQUEST_METHOD"] =="POST") // Проверка на POST запрос
{
	
	$password = md5($_POST['pass']);
	$u_code = generateRandomString(20);
    //Логин
	$sql = "SELECT * FROM users WHERE login ='".$_POST['username'] . "' AND password='$password'";
	$result = mysqli_query($connect, $sql);
	
	if ($ver = mysqli_fetch_assoc($result)) // 2
	{
		var_dump($ver);
		// Проверка на соответствие данных для авторизации
		if($ver['email'] == $_POST['email'] && $ver['login'] == $_POST['username'] && $ver['password'] == $password)
		{
			// Проверка на статус верификации
			if ($ver['veryfided'] == 0)
			{
				echo "Пользователь не авторизован, поскольку он не верифицирован! Нажмите на кнопку чтобы перейти на страницу верификации";
				?>
				 <form  action="errorlet.php">
				 		<button  type="submit">Help</button>
				 </form>
				<?php

			}
			else
			{
				echo "Пользователь авторизован и верифицирован!";
				$sql = "SELECT * FROM users WHERE email = '". $_POST['email']."'";
				$result = mysqli_query($connect, $sql);
				$user = mysqli_fetch_assoc($result);
				// Удалить значение кода верификации
				$sql2 = "UPDATE `users` SET `confirm_mail` = '' WHERE `users`.`id` = '". $user['id']."'";
				$result2 = mysqli_query($connect, $sql2);
			}
		}
		else
		{
			echo "Пользователь не найден";
		}
}
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
/*
1. Сделать форму авторизации - done
2. Сделать отправку формы - done
3. Проверить, верифицирован ли пользователь (если нет, то посылать его на страницу с подтверждением регистрации)
3. Сделать отправку письма со ссылкой на подтверждение регистрации - done
4. Сделать страницу с подтверждением регистрации
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Authorization</title>
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
	<button type="submit">Authorization</button>
</form>
</body>
</html>