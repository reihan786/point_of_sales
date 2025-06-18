<?php
if (isset($_GET['delete'])) {

    $id = $_GET['delete']; //id=1,2,3
    $id_instructor = $_GET['id_instructor']; //id=1,2,3
    //proses delete
    $queryDelete = mysqli_query($config, "DELETE FROM instructor_majors WHERE id='$id'");
    if ($queryDelete) {

        header("location:?page=tambah-instruktur-major&id=" . $id_instructor . "&hapus=berhasil");
    } else {
        //jika gagal
        header("location:?page=tambah-instruktur-major&id=" . $id_instructor . "&hapus=gagal");
    }
}
$id_instructor = isset($_GET['id']) ? $_GET['id'] : '';
$edit = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM instructor_majors WHERE id='$edit'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['name'])) {
    //ada tidak parameter bernama adit, kalo ada jalankan perintah edit/update, kalo tidak ada
    //tambah data baru / insert
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $education = $_POST['education'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $id_user = isset($_GET['edit']) ? $_GET['edit'] : '';


    if (!isset($_GET['edit'])) {
        $insert = mysqli_query($config, "INSERT INTO instructors (name, gender, education, phone, email, address  ) VALUES ('$name', '$gender', '$education', '$phone', '$email', '$address')");
        header("location:?page=instruktur-major&tambah=berhasil");
    } else {

        //update data
        $update = mysqli_query($config, "UPDATE instructors SET name ='$name', gender ='$gender', education ='$education' , phone = '$phone' , email = '$email', address ='$address' WHERE id= '$id_user' ");
        header("location:?page=instruktur-major&ubah=berhasil");
    }
}

$id_instructor = isset($_GET['id']) ? $_GET['id'] : '';
// id major
if (isset($_POST['id_major'])) {
    $id_major = $_POST['id_major'];

    // Insert the major for the instructor
    $insert = mysqli_query($config, "INSERT INTO instructor_majors (id_major,id_instructor) VALUES ('$id_major', '$id_instructor')");
    header("location:?page=tambah-instruktur-major&id=" . $id_instructor . "&add=berhasil");
}

// end id major 

$queryMajors = mysqli_query($config, "SELECT * FROM majors ORDER BY id DESC");
$rowMajors = mysqli_fetch_all($queryMajors, MYSQLI_ASSOC);


$queryInstructor = mysqli_query($config, "SELECT * FROM instructors WHERE id='$id_instructor'");
$rowInstructor = mysqli_fetch_assoc($queryInstructor);

$queryInstructorMajors = mysqli_query($config, "SELECT majors.name, instructor_majors.id, id_instructor FROM instructor_majors LEFT JOIN majors ON majors.id = instructor_majors.id_major WHERE id_instructor = '$id_instructor' ORDER BY instructor_majors.id DESC");
$rowInstructorMajors = mysqli_fetch_all($queryInstructorMajors, MYSQLI_ASSOC);

?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo isset($_GET['edit']) ? 'Edit' : 'Add' ?> Instructor Major : <?php echo $rowInstructor['name'] ?> </h5>

                <!-- form edit -->
                <?php if (isset($_GET['edit'])): ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="">Major Name</label>
                            <select name="id_major" id="" class="form-control">
                                <option value="">Select One</option>
                                <?php foreach ($rowMajors as $rowMajor): ?>
                                    <option <?php echo ($rowMajor['id'] == $rowEdit['id_major']) ? 'selected' : '' ?> value="<?php echo $rowMajor['id'] ?>"><?php echo $rowMajor['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>

                    <!-- end form edit -->
                <?php else : ?>
                    <div align="right" class="mb-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Instructor Major
                        </button>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Major Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- kode referensi otomatis -->
                            <?php $no = 1;
                            //ini cara pertama
                            foreach ($rowInstructorMajors as $index => $rowInstructorMajor): ?>
                                <tr>

                                    <!-- <td><?php echo $index += 1; ?></td>  ini cara ke2-->
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $rowInstructorMajor['name'] ?></td>
                                    <td>
                                        <a href="?page=tambah-instruktur-major&id=<?php echo $rowInstructorMajor['id_instructor'] ?>&edit=<?php echo $rowInstructorMajor['id'] ?>"
                                            class="btn btn-primary">Edit</a>

                                        <a onclick="return confirm('Are you sure wanna delete this data?')"
                                            class="btn btn-danger" name="delete"
                                            href="?page=tambah-instruktur-major&delete=<?php echo $rowInstructorMajor['id'] ?> &id_instructor=<?php echo $rowInstructorMajor['id_instructor'] ?>"> Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                <?php endif ?>
                <!-- listing table -->



            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" method="post">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Major Name</label>
                        <select name="id_major" id="" class="form-control">
                            <option value="">Select One</option>
                            <?php foreach ($rowMajors as $rowMajor): ?>
                                <option value="<?php echo $rowMajor['id'] ?>"><?php echo $rowMajor['name'] ?></option>
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