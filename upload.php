<?php
$baseDir = "uploads";  // Basisordner, in dem alle Beweise abgelegt sind

if (is_dir($baseDir)) {
    foreach (scandir($baseDir) as $folder) {
        // Skip '.' und '..' (die nicht benötigten Verzeichnisse)
        if ($folder === '.' || $folder === '..') continue;

        // Hier erstellen wir die Anzeige für jeden Ordner
        echo "<h2>$folder</h2><div class='gallery'>";

        // Scanne die Dateien im Ordner
        $folderPath = "$baseDir/$folder";
        foreach (scandir($folderPath) as $file) {
            // Überprüfen, ob die Datei eine Bilddatei ist (jpg, png, jpeg)
            if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'png', 'jpeg'])) {
                $path = "$folderPath/$file";  // Der vollständige Pfad zur Datei
                echo "<a href='$path' download><img src='$path' alt='Bild'></a>";  // Bild anzeigen und zum Download anbieten
            }
        }
        echo "</div>";  // Ende der Galerie für den Ordner
    }
}
?>
