<?php
// index.php - Chứa lỗi LFI

if (isset($_GET['page'])) {
    $page = $_GET['page']; // Không kiểm tra đầu vào -> LFI
    include("Page/$page");
} else {
    echo "<h2>Chào mừng đến với trang web!</h2>";
    echo "<a href='?page=about.php'>About</a> | ";
    echo "<a href='?page=upload.php'>Upload File</a>";
}
?>

