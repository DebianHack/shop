<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
$page = "products";
include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/header.php';

/*

1. Дизаин/мокап - есть
2. Сделать отправку формы - есть
3. Проверить если ли товар с таким именем, категорией и описанием - есть
4. проверить заполнил ли продавец поля формы - есть
5. Если все шаги прошли, то 
	5.1 Добавить товар в БД - есть

*/
if( isset($_POST["submit"]))
	
	{
	// Вставить в таблицу
		$sql = "INSERT INTO categories (title) VALUES('".$_POST["title"]."')";
	
		if(mysqli_query($connect, $sql))
		{
			
			header("Location: /admin");
		}
		else
		{
			echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
		}
	}

?>

<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Добавление категории</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input name = "title" type="text" class="form-control" placeholder="Title" >
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
                </div>





<?php 

include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/footer.php';
?>













