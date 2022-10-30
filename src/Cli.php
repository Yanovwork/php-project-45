<?php
namespace Hexlet\Code;

require 'vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function helloUser()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}