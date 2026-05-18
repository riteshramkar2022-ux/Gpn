<?php
$subject = $_GET['subject'] ?? '';
$section = $_GET['section'] ?? '';
$dir = "uploads/$subject/$section";

if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

$files = array_diff(scandir($dir), ['.', '..']);
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo "GPN – $subject - $section"; ?></title>
  <style>
    body { font-family: Arial, sans-serif; background: #f0f2f5; margin: 20px; }
    .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,.1); }
    h2 { margin-top: 0; }
    .file { margin: 8px 0; padding: 10px; background: #eef; border-radius: 6px; }
    a, button { margin-right: 10px; }
  </style>
</head>
<body>
  <div class="card">
    <h2><?php echo "$subject → $section"; ?></h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="subject" value="<?php echo $subject; ?>">
      <input type="hidden" name="section" value="<?php echo $section; ?>">
      <input type="file" name="file" required>
      <button type="submit">Upload</button>
    </form>
    <hr>
    <h3>Uploaded Files:</h3>
    <?php if (empty($files)): ?>
      <p>No files uploaded yet.</p>
    <?php else: ?>
      <?php foreach($files as $file): ?>
        <div class="file">
          <?php echo htmlspecialchars($file); ?>
          <a href="<?php echo $dir.'/'.$file; ?>" target="_blank">View
          <a href="<?php echo $dir.'/'.$file; ?>" download>Download
          <form action="delete.php" method="post" style="display:inline">
            <input type="hidden" name="subject" value="<?php echo $subject; ?>">
            <input type="hidden" name="section" value="<?php echo $section; ?>">
            <input type="hidden" name="file" value="<?php echo $file; ?>">
            <button type="submit" onclick="return confirm('Delete this file?')">Delete</button>
          </form>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <p><a href="index.php">⬅ Back</p>
</body>
</html>
