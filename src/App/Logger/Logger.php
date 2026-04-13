<?php
namespace App\Logger;

class Logger
{
    function write(string $message = "unexpected")
    {
        $logFile = $this->getLogFile();

        if ($logFile === false) {
            exit;
        }

        file_put_contents($logFile, $message, FILE_APPEND);
    }

    function getLogFile() : mixed
    {
        $fileName = "museum.log";
        $setting = json_decode(file_get_contents("setting.json"), true);

        if ($setting === null && json_last_error() !== JSON_ERROR_NONE) {
            echo "JSON decode error: " . json_last_error_msg();
            return false;
        }

        if (!empty($setting['logs'])) {
            $setting['logs'] = $fileName;
            return $fileName;
        }

        return $setting['logs'];
    }
}
