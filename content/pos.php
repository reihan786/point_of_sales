<?php
$query = mysqli_query($config, "SELECT users.name, transactions.* FROM transactions
LEFT JOIN users ON users.id = transactions.id_user 
ORDER BY id DESC");
// 12345, 54321
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
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
                                <th>Instructor</th>
                                <th>Sub Total (Rp)</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($rows as $key => $data): ?>
                                <tr>
                                    <td><?php echo $index += 1; ?></td>
                                    <td><?php $data['no_transaction'] ?></td>
                                    <td><?php $data['name'] ?></td>
                                    <td><?php "Rp" . $data['subtotal'] ?></td>
                                    <td>
                                        <a href="?page=tambah-pos&print=<?php echo $data['id'] ?>" class="btn btn-primary btn-sm">Print</a>
                                        <a onclick="return confirm('Are you sure wanna delete this data??')"
                                            href="?page=tambah-pos&delete=<?php echo $data['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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