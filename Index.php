<?php
    session_start();
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = [
                ['name' => 'Sản phẩm 1', 'price' => 1000],
                ['name' => 'Sản phẩm 2', 'price' => 2000],
                ['name' => 'Sản phẩm 3', 'price' => 3000],
            ];
        }
        $products = $_SESSION['products'];
?>
<?php include('Header.php'); ?> 

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Products</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <!-- Nút thêm sản phẩm -->
                        <a href="#addProductModal" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">&#xE147;</i> <span>Add New Product</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá thành</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Lặp qua danh sách sản phẩm -->
                    <?php foreach ($products as $index => $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td> <!-- Hiển thị tên sản phẩm -->
                            <td><?= htmlspecialchars($product['price']) ?> VND</td> <!-- Hiển thị giá sản phẩm -->
                            <td>
                                <!-- Nút sửa, kích hoạt modal chỉnh sửa -->
                                <a href="#editProductModal" class="edit" data-toggle="modal" 
                                    data-index="<?= $index ?>"  
                                    data-name="<?= htmlspecialchars($product['name']) ?>" 
                                    data-price="<?= htmlspecialchars($product['price']) ?>">
                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                </a>
                            </td>
                            <td>
                                <!-- Nút xóa, kích hoạt modal xóa -->
                                <a href="Products.php?action=delete&index=<?= $index ?>" class="delete">
                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?> 

<!-- Modal Thêm Sản Phẩm -->
<div id="addProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="Products.php" method="GET">
                <input type="hidden" name="action" value="add">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Sản Phẩm</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Giá Thành</label>
                        <input type="number" class="form-control" name="price" required>
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
            <form action="Products.php" method="GET">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="index" id="edit-index">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Sản Phẩm</label>
                        <input type="text" class="form-control" name="name" id="edit-name" required>
                    </div>
                    <div class="form-group">
                        <label>Giá Thành</label>
                        <input type="number" class="form-control" name="price" id="edit-price" required>
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

<!-- Modal Xóa Sản Phẩm -->
<div id="deleteProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="Products.php" method="GET">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="index" id="delete-index">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
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

<script>
    // Điền thông tin chỉnh sửa vào modal
    $(document).on('click', '.edit', function () {
        // Lấy dữ liệu từ nút "Sửa"
        const index = $(this).data('index');
        const name = $(this).data('name');
        const price = $(this).data('price');

        // Cập nhật dữ liệu vào modal
        $('#edit-index').val(index);
        $('#edit-name').val(name);
        $('#edit-price').val(price);
    });


    $(document).on('click', '.delete', function (e) {
        e.preventDefault(); 
        const index = $(this).attr('href').split('=')[2]; 
        $('#delete-index').val(index);
        $('#deleteProductModal').modal('show');
    });

</script>