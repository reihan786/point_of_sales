<?php

if (isset($_GET['edit'])) {
    $id_user = $_GET['edit'];
    $queryEdit = mysqli_query($config, "SELECT * FROM users WHERE id = '$id_user'");
    $dataEdit = mysqli_fetch_assoc($queryEdit);
}

if (isset($_GET['delete'])) {
    $id_user = $_GET['delete'];
    $queryDelete = mysqli_query($config, "UPDATE users SET deleted_at = 1 WHERE id = '$id_user'");

    if ($queryDelete) {
        header("location:?page=user&hapus=berhasil");
    } else {
        header("location:?page=user&hapus=gagal");
    }
}
if (isset($_POST['name'])) {
    //ada tidak parameter bernama adit, kalo ada jalankan perintah edit/update, kalo tidak ada
    //tambah data baru / insert
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = isset($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password']; // jika password tidak diubah, gunakan password lama
    // jika password diubah, gunakan password baru yang sudah di-hash;
    $id_user = isset($_GET['edit']) ? $_GET['edit'] : '';


    if (!isset($_GET['edit'])) {
        $insert = mysqli_query($config, "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
        header("location:?page=user&tambah=berhasil");
    } else {

        //update data
        $update = mysqli_query($config, "UPDATE users SET name ='$name', email ='$email', password ='$password' WHERE id = '$id_user'");
        header("location:?page=user&ubah=berhasil");
    }
}

$id_user = isset($_GET['add-user-role']) ? $_GET['add-user-role'] : '';

$queryRoles = mysqli_query($config, "SELECT * FROM roles ORDER BY id DESC");
$rowRoles = mysqli_fetch_all($queryRoles, MYSQLI_ASSOC);

$queryUserRoles = mysqli_query($config, "SELECT user_roles.*, roles.name FROM user_roles LEFT JOIN roles ON user_roles.id_role = roles.id WHERE id_user = '$id_user' ORDER BY user_roles.id DESC");
$rowUserRoles = mysqli_fetch_all($queryUserRoles, MYSQLI_ASSOC);


if (isset($_POST['id_role'])) {
    $id_role = $_POST['id_role'];
    $insert = mysqli_query($config, "INSERT INTO user_roles (id_role, id_user) VALUES ('$id_role','$id_user')");
    header("location:?page=tambah-user&add-user-role=" . $id_user . "&add-role=berhasil");
}
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <?php if (isset($_GET['add-user-role'])) :
                    $title = "Add User Role : ";
                elseif (isset($_GET['edit'])):
                    $title = "Edit User";
                else:
                    $title = "Tambah User";
                endif
                ?>
                <h5 class="card-title"><?php echo $title ?></h5>

                <?php if (isset($_GET['add-user-role'])): ?>
                    <div align="right" class="mb-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Role</button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($rowUserRoles as $index => $rowUserRole): ?>

                                <tr>
                                    <td><?php echo $index + 1 ?></td>
                                    <td><?php echo $rowUserRole['name'] ?></td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                        <a onclick="return confirm('Are you sure?')" href="" class="btn btn-danger btn sm"> DELETE</a>
                                    </td>
                                </tr>

                            <?php endforeach ?>
                        </tbody>

                    </table>
                <?php else: ?>

                    <form action="" method="post">

                        <div class="mb-3">
                            <label for="">Fullname</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your name" required value="<?php echo isset($_GET['edit']) ? $dataEdit['name'] : '' ?>">

                            <!-- cara lain 
                        value="<?php echo isset($rowEdit['name']) ? $rowEdit['name'] : '' ?>" 
                        -->

                        </div>

                        <div class="mb-3">
                            <label for="">Email*</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your email" required value="<?php echo isset($_GET['edit']) ? $dataEdit['email'] : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label for="">Password*</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Your password" <?php echo empty($id_user) ? 'required' : '' ?>>

                            <small>
                                *jika ingin diubah silahkan diisi, jika tidak ingin diubah silahkan kosongkan
                                *If you want to change the password, please fill it in, if you do not want to change it, please leave it blank
                            </small>
                        </div>

                        <div class="mb-3">
                            <input type="submit" name="save" class="btn btn-primary" value="Save">
                        </div>
                    </form>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Role:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Role Name</label>
                        <select name="id_role" id="" class="form-control">
                            <option value="">Select One</option>
                            <?php foreach ($rowRoles as $rowRole): ?>
                                <option value="<?php echo $rowRole['id'] ?>"><?php echo $rowRole['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>