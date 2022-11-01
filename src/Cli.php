<?php

namespace Hexlet\Code;

use function cli\line;
use function cli\prompt;

function helloUser()
{
    require __DIR__ . '/../vendor/autoload.php';
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
