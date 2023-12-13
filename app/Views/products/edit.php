

<div class="modal fade" id="modal-editar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('products/update/' . $product['ProductId']) ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Produto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <!-- Add value attribute to populate the field -->
                                <input type="text" class="form-control" name="Name" value="<?= $product['Name'] ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="Quantity">Quantity</label>
                                <!-- Add value attribute to populate the field -->
                                <input type="text" class="form-control" name="Quantity" value="<?= $product['Quantity'] ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="Amount">Amount</label>
                                <!-- Add value attribute to populate the field -->
                                <input type="text" class="form-control" name="Amount" value="<?= $product['Amount'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>