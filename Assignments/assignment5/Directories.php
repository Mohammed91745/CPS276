<?php

class Directories {
    // Create directory and file
    public function createDirectoryAndFile($folderName, $fileContent) {
        $directoryPath = __DIR__ . "/directories/$folderName";

        // Check if directory already exists
        if (file_exists($directoryPath)) {
            return 'exists';
        }

        if (!mkdir($directoryPath, 0777, true)) {
            return 'error';
        }

        $filePath = "$directoryPath/readme.txt";
        if (!file_put_contents($filePath, $fileContent)) {
            return 'error';
        }

        return 'success';
    }
}
?>
