<?php
$baseDir = "uploads";  // Basisordner für die Beweise

// Überprüfen, ob das Verzeichnis existiert
if (is_dir($baseDir)) {
    // Alle Ordner im Basisverzeichnis durchgehen
    foreach (scandir($baseDir) as $folder) {
        // Überspringen der "." und ".." Verzeichnisse
        if ($folder === '.' || $folder === '..') continue;

        // Ausgabe des Ordners als Überschrift
        echo "<h2>$folder</h2><div class='gallery'>";

        // Verzeichnis durchgehen und Bilder anzeigen
        $folderPath = "$baseDir/$folder";  // Pfad zum Unterordner
        if (is_dir($folderPath)) {
            foreach (scandir($folderPath) as $file) {
                // Überprüfen, ob die Datei eine Bilddatei ist
                if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'png', 'jpeg'])) {
                    $filePath = "$folderPath/$file";  // Vollständiger Pfad zum Bild
                    echo "<a href='$filePath' download><img src='$filePath' alt='Bild'></a>";
                }
            }
        }

        // Ende der Galerie für den Ordner
        echo "</div>";
    }
}
?>
