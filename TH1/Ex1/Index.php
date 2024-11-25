<?php include 'Header.php'; ?>
<?php include 'Flower.php'; ?>

<div class="container mt-4">
    <h1 class="text-center mb-4">Danh Sách Các Loài Hoa</h1>
    <div class="row">
        <?php foreach ($flowers as $flower): ?>
            <div class="col-md-6 mb-4">
                <div class="card h-100 d-flex flex-row">
                    <div class="image-container">
                        <img src="<?php echo $flower['image']; ?>" class="card-img-top" alt="<?php echo $flower['name']; ?>">
                        <h5 class="card-title text-center mt-2"><?php echo $flower['name']; ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $flower['description']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'Footer.php'; ?>