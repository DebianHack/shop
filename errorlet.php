<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

if(isset($_POST) AND $_SERVER["REQUEST_METHOD"] =="POST")
{
	
		echo "Вам выслано на почту подтверждение регистрации";
		$u_code = generateRandomString(20);
		$sql = "SELECT * FROM users WHERE email = '". $_POST['email']."'";
		$result = mysqli_query($connect, $sql);
		if ($result->num_rows > 0)
		{
			$user = mysqli_fetch_assoc($result);
			
			
			$sql2 =	"UPDATE `users` SET `confirm_mail` = '".$u_code."' WHERE `users`.`id` = '". $user['id']."'";
			$result2 = mysqli_query($connect, $sql2);
			$link = "<a href='http://shop-master.local/authoriza.php?u_code=$u_code'>Confirm</a>";
			mail($_POST['email'], 'Authoriza', $link);
		}
}
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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Errorlet</title>
</head>
<body>
<form method="POST" >
	<p>Введите свою електронную почту<br/>
	<p>Email<br/>
		<input type="text" name="email">
	</p>
	<button type="submit">Выслать повторно</button>
</form>
</body>
</html>