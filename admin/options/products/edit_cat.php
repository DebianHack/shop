<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
$page = "products";
include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/header.php';




if(isset($_POST["submit"]))
{
	$sql = "UPDATE categories SET title = '".$_POST["title"]."'  WHERE id = '".$_GET["id"]."'" ; 
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
                                    <h4 class="card-title">Редактирование категории</h4>
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
