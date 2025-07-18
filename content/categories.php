<?php
$query = mysqli_query($config, "SELECT * FROM categories ORDER BY id DESC");
//12345, 54321
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data categories</h5>
                <div class="mb-3" align="right">
                    <a href="?page=tambah-categories" class="btn btn-primary">Add categories</a>
                </div>

                <div class="table-responsive">
                    <!-- nama, aksi -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama categories</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rows as $index => $row): ?>
                                <tr>
                                    <td><?php echo $index += 1; ?></td>
                                    <td><?php echo $row['name'] ?></td>

                                    <td>
                                        <a href="?page=tambah-major&edit=<?php echo $row['id'] ?>"
                                            class="btn btn-primary">Edit</a>
                                        <a onclick="return confirm ('Are you sure wanna delete this data?')"
                                            href="?page=major&delete=<?php echo $row['id'] ?>" class="btn btn-danger btn">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>