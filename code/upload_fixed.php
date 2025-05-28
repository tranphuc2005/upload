<?php  
// upload_fixed.php - Đã sửa lỗi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $upload_dir = "uploads/";  
    $file_name = basename($_FILES['file']['name']);  
    $tmp_name = $_FILES['file']['tmp_name'];  
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));  
    $allowed_exts = ['jpg', 'png', 'gif', 'txt']; // Chỉ cho phép file an toàn  
  
    if (in_array($file_ext, $allowed_exts)) {  
        $target_file = $upload_dir . $file_name;  
        if (move_uploaded_file($tmp_name, $target_file)) {  
            echo "File uploaded: <a href='$target_file'>$file_name</a>";  
        } else {  
            echo "Upload failed!";  
        }  
    } else {  
        echo "Invalid file type!";  
    }  
}  
?>  
  
<form method="POST" enctype="multipart/form-data">  
    <input type="file" name="file">  
    <input type="submit" value="Upload">  
</form>