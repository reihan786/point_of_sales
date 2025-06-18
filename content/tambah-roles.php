<?php


if (isset($_GET['edit'])) {
    $id_user = $_GET['edit'];
    $queryEdit = mysqli_query($config, "SELECT * FROM roles WHERE id = '$id_user'");
    $dataEdit = mysqli_fetch_assoc($queryEdit);
}

if (isset($_GET['delete'])) {
    $id_user = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM roles WHERE id='$id_user'");
    header("location:?page=roles&hapus=berhasil");
}
if (isset($_POST['name'])) {
    //ada tidak parameter bernama adit, kalo ada jalankan perintah edit/update, kalo tidak ada
    //tambah data baru / insert
    $name = $_POST['name'];

    $id_user = isset($_GET['edit']) ? $_GET['edit'] : '';

    if (!isset($_GET['edit'])) {
        $insert = mysqli_query($config, "INSERT INTO roles (name) VALUES ('$name')");
        header("location:?page=roles&tambah=berhasil");
    } else {

        //update data
        $update = mysqli_query($config, "UPDATE roles SET name ='$name' WHERE id = '$id_user'");
        header("location:?page=roles&ubah=berhasil");
    }
}

if (isset($_GET['add-role-menu'])) {
    $id_role = $_GET['add-role-menu'];

    // YANG BARU DITAMBAHKAN JAM11 SIANG
    $rowEditRoleMenu = [];
    $edit = [];
    $editRoleMenu = mysqli_query($config, "SELECT * FROM menu_roles WHERE id_roles='$id_role'");
    // $rowEditRoleMenu = mysqli_fetch_all($editRoleMenu, MYSQLI_ASSOC);
    //[0]1,[1]2,[2]3
    while ($editMenu = mysqli_fetch_assoc($editRoleMenu)) {
        $rowEditRoleMenu[] = $editMenu['id_menu'];
    }

    $menus = mysqli_query($config, "SELECT * FROM menus ORDER BY parent_id, urutan");
    $rowMenu = [];
    while ($m = mysqli_fetch_assoc($menus))
        $rowMenu[] = $m;
    //[]1,[]2,[]3
}

if (isset($_POST['save'])) {
    $id_role = $_GET['add-role-menu'];
    $id_menus = $_POST['id_menus'] ?? [];

    mysqli_query($config, "DELETE FROM menu_roles WHERE id_roles = '$id_role'");
    foreach ($id_menus as $m) {
        $id_menu = $m;
        mysqli_query($config, "INSERT INTO menu_roles(id_roles, id_menu) VALUE('$id_role','$id_menu')");
    }

    // print_r($id_role);
    // var_dump($id_menus);
    // die;

    foreach ($id_menus as $m) {
        $id_menu = $m;
        mysqli_query($config, "INSERT INTO menu_roles(id_roles, id_menu) VALUES ('$id_role','$id_menu')");
    }
    header("location:?page=tambah-roles&add-role-menu=" . $id_role . "&tambah=berhasil");
}





?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> <?php echo isset($rowEdit['id']) ? 'Edit' : 'Add' ?> Roles </h5>
                <?php if (isset($_GET['add-role-menu'])): ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <ul>
                                <?php foreach ($rowMenu as $mainMenu): ?>
                                    <?php if ($mainMenu['parent_id'] == 0 or $mainMenu['parent_id'] == ""): ?>
                                        <li>
                                            <label for="">
                                                <!-- 
                                                JIka id value id_menu dari table menu nilainya 1== jika nilai id_menu dari table menu_roles juga sama dengan 1  maka kita check
                                                -->
                                                <input <?php echo in_array($mainMenu['id'], $rowEditRoleMenu) ? 'checked' : '' ?> type="checkbox" name="id_menus[]" value="<?php echo $mainMenu['id'] ?>">
                                                <?php echo $mainMenu['name'] ?>

                                            </label>

                                            <ul>
                                                <?php foreach ($rowMenu as $subMenu): ?>
                                                    <?php if ($subMenu['parent_id'] == $mainMenu['id']): ?>
                                                        <li>
                                                            <label for="">
                                                                <input <?php echo in_array($subMenu['id'], $rowEditRoleMenu) ? 'checked' : '' ?> type="checkbox" name="id_menus[]" value="<?php echo $subMenu['id'] ?>">
                                                                <?php echo $subMenu['name'] ?>
                                                            </label>
                                                        </li>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </ul>
                                        </li>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit" name="save">Save Change</button>
                        </div>
                    </form>




                <?php else: ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="">Nama Roles</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your name Roles" required value="<?php echo isset($rowEdit['name']) ? $dataEdit['name'] : '' ?>">
                        </div>

                        <div class="mb-3">
                            <input type="submit" name="simpan" class="btn btn-primary" value="Save">
                        </div>
                    </form>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>