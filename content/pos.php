<?php
$query = mysqli_query($config, "SELECT users.name AS name, transactions.* FROM transactions
LEFT JOIN users ON users.id = transactions.id_user 
ORDER BY id DESC");
// 12345, 54321
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if(isset($_GET['delete'])) {
    $idDel = $_GET['delete'];

    $del = mysqli_query($config, "DELETE FROM transactions WHERE id ='$idDel'");
    if($del) {
        header("location:?page=pos");
        exit();
    }
}


?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Transaction</h5>
                <div align="right" class="mb-3">
                    <a href="?page=tambah-pos" class="btn btn-primary">Add Transaction</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaction</th>
                                <th>Cashier Name</th>
                                <th>Sub Total (Rp)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($rows as $key => $data): ?>
                                <?php   ?>
                                <tr>
                                    <td><?php echo $key += 1; ?></td>
                                    <td><?php echo $data['no_transaction'] ?></td>
                                    <td><?php echo $data['name'] ?></td>
                                    <td><?php echo "Rp" . $data['sub_total'] ?></td>
                                    <td>
                                        <a href="?page=print-pos&print=<?php echo $data['id'] ?>" class="btn btn-primary btn-sm">Print</a>
                                        <a onclick="return confirm('Are you sure wanna delete this data??')"
                                            href="?page=pos&delete=<?php echo $data['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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