<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<?php
    // Đường dẫn tới file CSV
    $filename = "KTPM2.csv";

    // Mảng chứa dữ liệu sinh viên
    $sinhvien = [];

    // Mở file CSV
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Đọc dòng đầu tiên (tiêu đề)
        $headers = fgetcsv($handle, 1000, ",");

        // Loại bỏ BOM nếu có trong tiêu đề
        $headers = array_map(function($header) {
            return ltrim($header, "﻿"); // Loại bỏ ký tự BOM
        }, $headers);

        // Đọc từng dòng dữ liệu
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $sinhvien[] = array_combine($headers, $data);
        }

        fclose($handle);
    }
?>

<body class="bg-gray-100">
    <main class="mx-24 pt-8 pb-20">
        <p class="font-bold text-3xl text-center text-gray-700 pb-6">Danh sách sinh viên</p>
        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-700 bg-white">
                <thead class="bg-blue-600 text-white font-semibold">
                    <tr>
                        <th class="py-3 px-6">Username</th>
                        <th class="py-3 px-6">Password</th>
                        <th class="py-3 px-6">Lastname</th>
                        <th class="py-3 px-6">Firstname</th>
                        <th class="py-3 px-6">City</th>
                        <th class="py-3 px-6">Email</th>
                        <th class="py-3 px-6">Course</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sinhvien as $sv): ?>
                        <tr class="border-b hover:bg-blue-100 transition-colors duration-300">
                            <td class="py-4 px-6"><?= htmlspecialchars($sv['username']); ?></td>
                            <td class="py-4 px-6"><?= htmlspecialchars($sv['password']); ?></td>
                            <td class="py-4 px-6"><?= htmlspecialchars($sv['lastname']); ?></td>
                            <td class="py-4 px-6"><?= htmlspecialchars($sv['firstname']); ?></td>
                            <td class="py-4 px-6"><?= htmlspecialchars($sv['city']); ?></td>
                            <td class="py-4 px-6"><?= htmlspecialchars($sv['email']); ?></td>
                            <td class="py-4 px-6"><?= htmlspecialchars($sv['course1']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>