<?php
if (isset($_GET['delete'])) {
    $id_user = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM products WHERE id='$id_user'");
    header("location:?page=products&hapus=berhasil");
}
if (isset($_POST['save'])) {
    //ada tidak parameter bernama adit, kalo ada jalankan perintah edit/update, kalo tidak ada
    //tambah data baru / insert
    $id_category = $_POST['id_category'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $description = $_POST['description'];


    if (!isset($_GET['edit'])) {
        $insert = mysqli_query($config, "INSERT INTO products (name, id_category, price, qty, description ) VALUES ('$name', '$id_category', '$price', '$qty', '$description')");
        header("location:?page=product&tambah=berhasil");
    } else {

        //update data
        $update = mysqli_query($config, "UPDATE products SET id_category = '$id_category',name ='$name',price = '$price',qty = '$qty',description = 'description' ");
        header("location:?page=product&ubah=berhasil");
    }
}

$id_instructor = isset($_GET['id']) ? $_GET['id'] : '';
$edit = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM products WHERE id='$edit'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

$queryCategoryProduct = mysqli_query($config, "SELECT * FROM categories ORDER BY id DESC");
$rowCategoryProducts = mysqli_fetch_all($queryCategoryProduct, MYSQLI_ASSOC);

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    add products
                </h5>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Category Products*</label>
                        <select name="id_category" id="" class="form-control">
                            <option value="">Select One</option>
                            <?php foreach ($rowCategoryProducts as $rowCategoryProduct) : ?>
                                <option <?php echo isset($rowEdit) and $rowCategoryProduct['id'] == $rowEdit['id_category']  ? 'selected' : '' ?> value="<?php echo $rowCategoryProduct['id'] ?>">
                                    <?php echo $rowCategoryProduct['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="">Name *</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your education" required value="<?php echo isset($_GET['name']) ? $rowname['name'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="">Price*</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter Your price" required value="<?php echo isset($_GET['price']) ? $rowname['price'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="">Qty*</label>
                        <input type="number" name="qty" class="form-control" placeholder="Enter Your Quantity" required value="<?php echo isset($_GET['qty']) ? $rowname['qty'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control"><?php echo isset($_GET['description']) ? $rowname['description'] : '' ?></textarea>
                    </div>


                    <div class="mb-3">
                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>