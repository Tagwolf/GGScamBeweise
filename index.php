<?php
$baseDir = "uploads";  // Basisverzeichnis, in dem alle Ordner gespeichert sind

// Überprüfen, ob das Basisverzeichnis existiert
if (is_dir($baseDir)) {
    // Alle Ordner im Basisverzeichnis durchgehen
    foreach (scandir($baseDir) as $folder) {
        // Überspringen der "." und ".." Verzeichnisse
        if ($folder === '.' || $folder === '..') continue;

        // Ausgabe des Ordners als Überschrift
        echo "<h2>$folder</h2><div class='gallery'>";

        // Verzeichnispfad zum Ordner
        $folderPath = "$baseDir/$folder";

        // Wenn es ein Verzeichnis ist
        if (is_dir($folderPath)) {
            // Alle Dateien im Ordner durchsuchen
            foreach (scandir($folderPath) as $file) {
                // Überprüfen, ob die Datei eine der erlaubten Bilddateien ist
                if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'png', 'jpeg'])) {
                    $filePath = "$folderPath/$file";  // Vollständiger Pfad zur Datei
                    echo "<a href='$filePath' download><img src='$filePath' alt='Bild' style='width: 100px; height: 100px;'></a>";
                }
            }
        }

        // Ende der Galerie für den Ordner
        echo "</div>";
    }
}
?>

