<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
$page = "products";
include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/header.php';
?>

<div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Orders</h4>
                        <a href="options/products/add.php?" type="button"class="btn btn-secondary">Добавить товар</a>
                        <a href="options/products/spisok_categories.php?" type="button"class="btn btn-secondary">Список категорий</a>

                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>User_id</th>
                                <th>Name</th>
                                <th>Created_at</th>
                                <th>Address</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php 
                                  $sql = "SELECT * FROM orders";
                                  $result = mysqli_query($connect, $sql) ;
                                  while ($row = mysqli_fetch_assoc($result)) 
                                  {

                                  	$name_product = $row['Name'];
                                  	$obj = json_decode($name_product);
                                    
                                      ?>
                                      <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['user_id'] ?></td>
										<td><?php echo print_r($obj->{'basket'}) ?></td>
                                        <td><?php echo $row['created_at'] ?></td>
                                        <td><?php echo $row['address'] ?></td>
                                        <td><?php echo $row['status'] ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                           	<!-- Отправка клиенту -->
                                              <a href = "send.php?id=<?php echo $row['id'] ?>" method = "POST" type="button" class="btn btn-secondary">Отправить клиенту</a>
                                           </div> 
                                        </td>
                                      </tr>

                                      <?php
                                  }
                                ?>
                            </tbody>
                        </table>
                    </div> <!-- table table-hover table-striped-->
                </div>
            </div>
        </div>
</div>


<?php 

include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/footer.php';

?>