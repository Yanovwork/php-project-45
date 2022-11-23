<?php

namespace src\Engine;

use function cli\line;
use function cli\prompt;

const ROUND = 3;

function runGame(string $gameConditions, array $acceptedQuestionAndResponse)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameConditions);
    foreach ($acceptedQuestionAndResponse as $key => $value) {
        $userResponse = prompt("Question: $key\nYour answer");
        if ($userResponse != $value) {
            line("'$userResponse' is wrong answer ;(. Correct answer was '$value'. \nLet's try again, $name!");
            exit;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, $name!");
}
