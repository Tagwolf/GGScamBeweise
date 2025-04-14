<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Den Ordnernamen und die hochgeladenen Bilder auslesen
    $folder = basename($_POST['ordnername']);  // Ordnername
    $uploadDir = "uploads/" . $folder;  // Zielverzeichnis für den Ordner

    // Überprüfen, ob der Ordner existiert, wenn nicht, dann erstellen
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Alle hochgeladenen Dateien verarbeiten
    foreach ($_FILES['bilder']['tmp_name'] as $index => $tmpName) {
        $filename = basename($_FILES['bilder']['name'][$index]);  // Dateiname
        $targetFile = "$uploadDir/$filename";  // Zielpfad für die Datei

        // Bild verschieben und im Zielverzeichnis speichern
        if (move_uploaded_file($tmpName, $targetFile)) {
            echo "Datei '$filename' wurde erfolgreich hochgeladen.<br>";
        } else {
            echo "Fehler beim Hochladen der Datei '$filename'.<br>";
        }
    }

    // Nach dem Hochladen zurück zur Hauptseite (index.php oder andere)
    header("Location: index.php");
    exit;
}
?>
