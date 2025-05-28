<?php
// index_fixed.php - Đã sửa lỗi LFI

$allowed_pages = ['about.php', 'upload.php']; // Chỉ cho phép 2 file hợp lệ

if (isset($_GET['page'])) {
    $page = basename($_GET['page']); // Loại bỏ ký tự ../
    if (in_array($page, $allowed_pages)) {
        include("Page/$page");
    } else {
        echo "Trang không hợp lệ!";
    }
} else {
    echo "<h2>Chào mừng đến với trang web!</h2>";
    echo "<a href='?page=about.php'>About</a> | ";
    echo "<a href='?page=upload.php'>Upload File</a>";
}
?>
