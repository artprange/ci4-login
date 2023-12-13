<!-- Main content -->
<div class="modal fade" id="modal-novo-produto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <form action="<?= site_url('products/add') ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Novo Produto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="Name">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="text" class="form-control" name="Quantity">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="Amount">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Add + </button>
                </div>
            </form>
        </div>
    </div>
</div>





<div class="content">
    <div class="container-fluid">

    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-novo-produto">
                    <i class="fas fa-plus-circle"></i> Add product 
                </button>
            </div>
        </div>
    </div>
</div>

        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>SKU</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['ProductId'] ?></td>
                <td><?= $product['Name'] ?></td>
                <td><?= $product['Quantity'] ?></td>
                <td><?= $product['Amount'] ?></td>
                <td>
                    <a href="<?= base_url('products/edit/' . $product['ProductId']) ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="<?= base_url('products/delete/' . $product['ProductId']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

                                        
                                        
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>

<script src="<?= base_url('theme/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('theme/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('theme/dist/js/adminlte.min.js') ?>"></script>