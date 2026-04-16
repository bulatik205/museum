<?php

namespace App\Handlers;

use Exception;

class Web
{
    public string $webPath = "web/";

    function up($destination): string
    {
        try {
            $this->copyRecursive($this->webPath, $destination);
            return "Success";
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    private function copyRecursive(string $source, string $destination): void
    {
        if (!is_dir($source)) {
            throw new Exception("Folder {$source} does not exist");
        }

        $parentDir = dirname($destination);
        if (!is_writable($parentDir)) {
            throw new Exception("Parent directory '{$parentDir}' is not writable");
        }

        if (is_dir($destination)) {
            throw new Exception("Destination folder '{$destination}' already exists. Choose unique name.");
        }

        if (!is_dir($destination)) {
            if (!mkdir($destination, 0777, true)) {
                throw new Exception("Failed to create directory {$destination}");
            }
        }

        $items = scandir($source);

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $sourcePath = $source . DIRECTORY_SEPARATOR . $item;
            $destPath = $destination . DIRECTORY_SEPARATOR . $item;

            if (is_dir($sourcePath)) {
                $this->copyRecursive($sourcePath, $destPath);
            } else {
                if (!copy($sourcePath, $destPath)) {
                    throw new Exception("Failed to copy {$sourcePath}");
                }
            }
        }
    }
}