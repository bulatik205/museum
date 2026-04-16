<?php

namespace App\Logger;

class Logger
{
    function write(string $message = "unexpected")
    {
        $logFile = $this->getLogFile();

        if ($logFile === false) {
            return 0;
        }

        $logEntry = "[" . date('Y-m-d H:i:s') . "] - " . $message . PHP_EOL;

        file_put_contents($logFile, $logEntry, FILE_APPEND);
    }

    function getLogFile(): mixed
    {
        $fileName = "museum.log";
        $setting = json_decode(file_get_contents("setting.json"), true);

        if ($setting === null && json_last_error() !== JSON_ERROR_NONE) {
            echo "JSON decode error: " . json_last_error_msg();
            return false;
        }

        if (empty($setting['logs'])) {
            $setting['logs'] = $fileName;
            file_put_contents("setting.json", json_encode($setting));
            return $fileName;
        }

        return $setting['logs'];
    }
}
