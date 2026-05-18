<?php
$subject = $_POST['subject'];
$section = $_POST['section'];
$dir = "uploads/$subject/$section";

if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

if (!empty($_FILES['file']['name'])) {
    $filename = basename($_FILES['file']['name']);
    $target = $dir . '/' . $filename;

    if (file_exists($target)) {
        $filename = time() . "_" . $filename;
        $target = $dir . '/' . $filename;
    }

    move_uploaded_file($_FILES['file']['tmp_name'], $target);
}

header("Location: section.php?subject=" . urlencode($subject) . "&section=" . urlencode($section));
exit;
