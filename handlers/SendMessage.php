<?php

define('RESET', "\033[0m");

define('BLACK', "\033[0;30m");
define('RED', "\033[1;31m");
define('GREEN', "\033[1;32m");
define('YELLOW', "\033[1;33m");
define('BLUE', "\033[1;34m");
define('MAGENTA', "\033[1;35m");
define('CYAN', "\033[1;36m");
define('WHITE', "\033[1;37m");

define('BOLD', "\033[1m");
define('UNDERLINE', "\033[4m");

define('BG_RED', "\033[41m");
define('BG_GREEN', "\033[42m");

define('NL', PHP_EOL);

define('ERROR', RED . BOLD . UNDERLINE);
define('SUCCESS', GREEN . BOLD);
define('WARNING', YELLOW . BOLD);


class SendMessage {
    function main() : void {
        echo WHITE . "Hello" . RESET . NL;
    }

    function EmptyInput($text) : void {
        echo ERROR . "Empty fileds: " . RESET . WHITE . $text . RESET . NL;
    }

    function InvalidCommand() : void {
        echo ERROR . "Invalid command. Check documentation or write " . RESET . WHITE . "php museum help" . RESET . NL;
    }
}