<?php
include 'config.php';
$result = $conn->query("SELECT * FROM files ORDER BY upload_date DESC");
?>
<!DOCTYPE html>
<html>
<head><title>File Hosting</title></head>
<body>
<h2>Upload File (Max 10GB)</h2>
<form method="post" enctype="multipart/form-data" action="upload.php">
    <input type="file" name="file" required>
    <button type="submit">Upload</button>
</form>

<h2>Uploaded Files</h2>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Size (MB)</th><th>Date</th><th>Action</th></tr>
<?php while($row = $result->fetch_assoc()) { ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['filename'] ?></td>
<td><?= round($row['filesize']/1048576, 2) ?></td>
<td><?= $row['upload_date'] ?></td>
<td><a href="<?= $row['filepath'] ?>" download>Download</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>
