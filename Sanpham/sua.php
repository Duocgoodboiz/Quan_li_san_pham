<?php 
    $id =$_GET['id'];
     require_once('../config/db.php');
     $sql_brand = "SELECT * FROM brands ";
     $query_brand = mysqli_query($connect,$sql_brand);

     $sql_up = "SELECT * FROM products where prd_id = $id";
    $query_up =mysqli_query($connect,$sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

     if(isset($_POST['smb'])){
        $prd_name = $_POST['prd_name'];
        if($_FILES['image']['name']==''){
            $image = $row_up['prd_name'];
        }else{
            $image = $row_up['prd_name'];
        }
        $price = $_POST['price'];
        $quanlity = $_POST['quanlity'];
        $description = $_POST['description'];
        $brand_id = $_POST['brand_id'];

        $sql="UPDATE products SET prd_name='$prd_name' ,image='$image' ,price='$price' ,quanlity='$quanlity',description='$description',brand_id='$brand_id'";
        $query = mysqli_query($connect,$sql);
        header('location: index.php?page_layout=danhsach');
     }
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Sua san pham </h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" >
                <div class="form-group">
                  <label for="">Ten san pham </label>
                  <input type="text" name="prd_name" class="form-control" required value="<?php echo $row_up['prd_name'] ?>">
                </div>
                <div class="form-group">
                  <label for="">Anh san pham </label><br>
                  <input type="file" name="image" >
                </div>
                <div class="form-group">
                  <label for="">Gia san pham </label>
                  <input type="number" name="price" class="form-control" required value="<?php echo $row_up['price'] ?>">
                </div>
                <div class="form-group">
                  <label for="">So luong san pham </label>
                  <input type="number" name="quanlity" class="form-control" required value="<?php echo $row_up['quanlity'] ?>">
                </div>
                <div class="form-group">
                  <label for="">Mo ta san pham </label>
                  <input type="text" name="description" class="form-control" required value="<?php echo $row_up['description'] ?>">
                </div>
                <div class="form-group">
                  <label for="">Thuong hieu</label>
                  <select class="form-control" name="brand_id">
                    <?php 
                        while($row_brand = mysqli_fetch_assoc($query_brand)){?>
                        <option value="<?php echo $row_brand['brand_name']; ?>"></option>
                    <?php } ?>
                  </select>
                </div>
                <button name="smb" class="btn btn-success" type="submit">Sua</button>
            </form>
        </div>
    </div>

</div>