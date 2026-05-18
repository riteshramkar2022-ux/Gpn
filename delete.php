<?php
$subject = $_POST['subject'];
$section = $_POST['section'];
$file = $_POST['file'];
$path = "uploads/$subject/$section/$file";

if (file_exists($path)) {
    unlink($path);
}

header("Location: section.php?subject=" . urlencode($subject) . "&section=" . urlencode($section));
exit;
