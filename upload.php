<?php
include 'config.php';

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTmp  = $file['tmp_name'];
    $fileType = $file['type'];

    // 10 GB = 10737418240 bytes
    if ($fileSize > 10737418240) {
        die("File is too large! Max 10 GB allowed.");
    }

    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) mkdir($uploadDir);

    $filePath = $uploadDir . basename($fileName);

    if (move_uploaded_file($fileTmp, $filePath)) {
        $stmt = $conn->prepare("INSERT INTO files (filename, filepath, filesize, filetype, uploaded_by) VALUES (?, ?, ?, ?, ?)");
        $uploader = "guest"; // replace with login system user
        $stmt->bind_param("ssiss", $fileName, $filePath, $fileSize, $fileType, $uploader);
        $stmt->execute();
        echo "File uploaded successfully!";
    } else {
        echo "Upload failed!";
    }
}
?>
