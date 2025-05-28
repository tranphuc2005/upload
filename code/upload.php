<?php  
// upload.php - Phiên bản có lỗi Unsafe File Upload  
$upload_dir = 'uploads/';  
if (!is_dir($upload_dir)) {  
    mkdir($upload_dir, 0777, true);  
}  
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $file_name = basename($_FILES['file']['name']);  
    $upload_file = $upload_dir . $file_name;  
  
    // Không kiểm tra phần mở rộng, cho phép upload mọi file  
    move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);  
    echo "File uploaded: <a href='$upload_file' target='_blank'>$file_name</a>";  
}  
  
// Hiển thị danh sách file đã tải lên  
$files = scandir($upload_dir);  
$files = array_diff($files, ['.', '..']);  
  
echo "<h2>Danh sách file đã tải lên:</h2><ul>";  
foreach ($files as $file) {  
    echo "<li><a href='$upload_dir$file' target='_blank'>$file</a></li>";  
}  
echo "</ul>";  
?>  
  
<form method='post' enctype='multipart/form-data'>  
    <input type='file' name='file'>  
    <button type='submit'>Upload</button>  
</form>