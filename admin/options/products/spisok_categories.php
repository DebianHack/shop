<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
$page = "products";
include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/header.php';
?>
<div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Categories</h4>
                        <a href="/admin/options/products/add_cat.php?" type="button"class="btn btn-secondary">Добавить категорию</a>
                        
                        
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                            </thead>
                            <tbody>
                                <?php 
                                  $sql = "SELECT * FROM categories";
                                  $result = mysqli_query($connect, $sql) ;
                                  while ($row = mysqli_fetch_assoc($result)) {
                                      ?>
                                      <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td>
                                           <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href = "/admin/options/products/edit_cat.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Редактировать</a>
                                              <a href = "/admin/options/products/delete_cat.php?id=<?php echo $row['id'] ?>"type="button" class="btn btn-secondary">Удалить</a>
                                             
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
