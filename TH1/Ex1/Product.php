<?php
session_start();

if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = [];
}

$flowers = &$_SESSION['flowers']; 

// Xử lý thêm hoa
if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['name'], $_GET['description'], $_GET['image'])) {
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $image = $targetFile;
            } else {
                die("Có lỗi xảy ra khi tải lên ảnh.");
            }
        } else {
            die("Tệp không phải là ảnh.");
        }
    }

    $flowers[] = [
        'name' => htmlspecialchars($_GET['name']),
        'description' => htmlspecialchars($_GET['description']),
        'image' => $image
    ];
}

// Xử lý sửa hoa
if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['index'], $_GET['name'], $_GET['description'], $_GET['image'])) {
    $index = (int)$_GET['index'];
    if (isset($flowers[$index])) {
        $flowers[$index]['name'] = htmlspecialchars($_GET['name']);
        $flowers[$index]['description'] = htmlspecialchars($_GET['description']);

        // Xử lý tải ảnh mới nếu có
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    $flowers[$index]['image'] = $targetFile;
                } else {
                    die("Có lỗi xảy ra khi tải lên ảnh.");
                }
            } else {
                die("Tệp không phải là ảnh.");
            }
        }
    }
}

// Xử lý xóa hoa
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['index'])) {
    $index = (int)$_GET['index'];
    if (isset($flowers[$index])) {
        unset($flowers[$index]);
        $flowers = array_values($flowers);  // Cập nhật lại chỉ số sau khi xóa
    }
}


header('Location: Show.php');
exit;
?>
