<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
$page = "products";
include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/header.php';




if(isset($_POST["submit"]))
{
	$sql = "UPDATE products SET title = '".$_POST["title"]."', category_id = '".$_POST["cat-id"]."', description = '".$_POST["description"]."', content = '".$_POST["content"]."'  WHERE id = '".$_GET["id"]."'" ; 
	var_dump($sql);
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
                                    <h4 class="card-title">Редактирование продукта</h4>
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
                                        
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name = "description" type="text" class="form-control" placeholder="Description"></textarea> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Content</label>
                                                    <textarea name = "content" type="text" class="form-control" placeholder="Content"></textarea> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="form-control" name = "cat-id">
                                                    	<option value="0">Не выбрано</option>
                                                    	<?php 
                                                    		$sql = "SELECT * FROM categories";
                                                    		$result = mysqli_query($connect, $sql);
                                                    		while ($row = mysqli_fetch_assoc($result)) {
                                                    			echo "<option value = '". $row['id'] ."'>". $row['title'] ."</option>";
                                                    		}

                                                    	?>

                                                    
                                                    </select>
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











<!-- <!DOCTYPE html>
<html>
 <head>
 <title>Редактирование продукта</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
 <link href='https://bootstraptema.ru/snippets/form/2017/recaptcha/custom.css' rel='stylesheet' type='text/css'>
 </head>
 <body>

 <div class="container">

 <div class="row">

 <div class="col-lg-8 col-lg-offset-2">

 <h1 class="text-center">Редактирование продукта</h1>

 

<div id="content">
	<form  method="POST">
		<p>
			 Имя продукции:<br/>
		<input type="text" name="title">
		</p>
		<p>
			 Категория:<br/>
		<input type="text" name="category_id">
		</p>

		<p>
			Описание товара:<br/>
		<input type="text" name="description">
		</p>

		<p>
			<button type="edit">Редактировать</button>
		</p>
		
	</form>
	<form action="http://shop-master.local/admin/products.php">
			<button>Продукция</button>
	</form>
 -->






 <!-- <form id="contact-form" method="post" action="contact.php" role="form">

 <div class="messages"></div>

 <div class="controls">

 <div class="row">
 <div class="col-md-6">
 <div class="form-group">
 <label for="form_name">Имя продукции</label>
 <input id="form_name" type="text" name="name" class="form-control" placeholder="" required="required" data-error="Введите наименование продукта.">
 <div class="help-block with-errors"></div>
 </div>
 </div>
 <div class="col-md-6">
 <div class="form-group">
 <label for="form_lastname">Категория:</label>
 <input id="form_lastname" type="text" name="categories" class="form-control" placeholder="" required="required" data-error="Введите категорию.">
 <div class="help-block with-errors"></div>
 </div>
 </div>
 </div>

 

 <div class="row">
 <div class="col-md-12">
 <div class="form-group">
 <label for="form_message">Описание товара:</label>
 <textarea id="form_message" name="description" class="form-control" placeholder="" rows="4" required="required" data-error="Пожалуйста введите описание продукта"></textarea>
 <div class="help-block with-errors"></div>
 </div>
 </div>

 

 <div class="col-md-12">
 <input type="submit" name ="edit" class="btn btn-success btn-send" value="Редактировать">
 </div>

 </div>

 </div>

 </form> -->

 <!-- </div>

 </div> 

 </div>  -->

 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src='https://www.google.com/recaptcha/api.js'></script>
 <script src="https://bootstraptema.ru/snippets/form/2017/recaptcha/validator.js"></script>
 <script src="https://bootstraptema.ru/snippets/form/2017/recaptcha/contact.js"></script>
 </body>
</html> -->
















