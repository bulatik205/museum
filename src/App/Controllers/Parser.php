<?php

namespace App\Controllers;

class Parser {
    public array $command;

    public function __construct(array $command)
    {
        $this->command = $command;
    }

    public function getCommand() {
        return $this->command[1] ?? 'main';
    }
}