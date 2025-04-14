<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $folder = basename($_POST['ordnername']);
  $uploadDir = "uploads/" . $folder;

  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
  }

  foreach ($_FILES['bilder']['tmp_name'] as $index => $tmpName) {
    $filename = basename($_FILES['bilder']['name'][$index]);
    $targetFile = "$uploadDir/$filename";
    move_uploaded_file($tmpName, $targetFile);
  }

  header("Location: index.html");
  exit;
}
?>
