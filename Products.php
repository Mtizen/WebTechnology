<?php
    session_start();

    if (!isset($_SESSION['products'])) {
        $_SESSION['products'] = [];
    }

    $products = &$_SESSION['products']; 

    // Xử lý thêm sản phẩm
    if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['name'], $_GET['price'])) {
        $products[] = [
            'name' => htmlspecialchars($_GET['name']),
            'price' => (int)$_GET['price']
        ];
    }

    // Xử lý sửa sản phẩm
    if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['index'], $_GET['name'], $_GET['price'])) {
        $index = (int)$_GET['index'];
        if (isset($products[$index])) {
            $products[$index]['name'] = htmlspecialchars($_GET['name']);
            $products[$index]['price'] = (int)$_GET['price'];
        }
    }

    // Xử lý xóa sản phẩm
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['index'])) {
        $index = (int)$_GET['index'];
        if (isset($products[$index])) {
            unset($products[$index]);
            $products = array_values($products); 
        }
    }

    // Quay lại trang chính
    header('Location: index.php');
    exit;
?>
