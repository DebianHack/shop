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
                        <h4 class="card-title">Products</h4>
                        <a href="options/products/add.php?" type="button"class="btn btn-secondary">Добавить товар</a>
                        <a href="options/products/spisok_categories.php?" type="button"class="btn btn-secondary">Список категорий</a>

                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Categories</th>
                                <th>Options</th>
                            </thead>
                            <tbody>
                                <?php 
                                  $sql = "SELECT * FROM products";
                                  $result = mysqli_query($connect, $sql) ;
                                  while ($row = mysqli_fetch_assoc($result)) {
                                    $sql2 = "SELECT title FROM categories WHERE id = '".$row['category_id']."'";
  
                                    $result2 = mysqli_query($connect, $sql2);

                                    $comp2 = mysqli_fetch_assoc($result2);
                                      ?>
                                      <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td><?php echo $row['description'] ?></td>
                                        <td><?php echo $comp2['title'] ?></td>
                                        <td>
                                           <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href = "options/products/edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Редактировать</a>
                                              <a href = "options/products/delete.php?id=<?php echo $row['id'] ?>"type="button" class="btn btn-secondary">Удалить</a>
                                             
                                           </div> 
                                        </td>
                                      </tr>

                                      <?php
                                  }
                                   
                                ?>
                            </tbody>
                        </table>
                    </div> <!-- table table-hover table-striped-->
                </div> <!-- card strpied-tabled-with-hover-->
            </div> <!-- col-md-12-->    
        </div> <!-- row-->
    </div> <!-- container-fluid-->
</div>


<?php 

include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/footer.php';

?>





            