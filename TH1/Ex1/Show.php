<?php include 'Flower.php'; ?>
<?php include 'Header.php'; ?>

<div class="container mt-4">
    <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Flowers</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addProductModal" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i> <span>Add New Flower</span>
                            </a>
                        </div>
                    </div>
                </div>
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Tên Hoa</th>
                    <th>Ảnh</th>                
                    <th>Mô Tả</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flowers as $index => $flower): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($flower['name']); ?></td>
                        <td>
                            <img src="<?php echo htmlspecialchars($flower['image']); ?>" 
                                alt="<?php echo htmlspecialchars($flower['name']); ?>" 
                                class="img-thumbnail" 
                                style="width: 100px;">
                        </td>
                        <td><?php echo htmlspecialchars($flower['description']); ?></td>                    
                        <td>
                        <a href="#editProductModal" class="edit" data-toggle="modal" 
                            data-index="<?= $index ?>"  
                            data-name="<?= htmlspecialchars($flower['name']) ?>" 
                            data-image="<?= htmlspecialchars($flower['image']) ?>"
                            data-description="<?= htmlspecialchars($flower['description']) ?>">
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                        </a>
                        </td>
                        <td>
                            <a href="Product.php?action=delete&index=<?= $index ?>" class="delete">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>    
</div>
<?php include 'Footer.php'; ?>

<!-- Modal Thêm Sản Phẩm -->
<div id="addProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="Product.php" method="GET">
                <input type="hidden" name="action" value="add">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Flower</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên Hoa</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <input type="text" class="form-control" name="description" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="addProduct" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Sửa Sản Phẩm -->
<div id="editProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="Product.php" method="GET">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="index" id="edit-index">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Flower</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Sản Phẩm</label>
                        <input type="text" class="form-control" name="name" id="edit-name" required>
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" class="form-control" name="image" id="edit-image" required>
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <input type="text" class="form-control" name="description" id="edit-description" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="deleteProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="Product.php" method="GET">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="index" id="delete-index">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Flower</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc muốn xóa sản phẩm này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="deleteProduct" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>