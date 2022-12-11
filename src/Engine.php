<?php

namespace src\Engine;

use function cli\line;
use function cli\prompt;

const NUMBEROFROUNDS = 3;

function runGame(string $gameConditions, array $acceptedQuestionAndResponse)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameConditions);
    foreach ($acceptedQuestionAndResponse as $key => $value) {
        $userResponse = prompt("Question: " . $value['question'] . "\nYour answer");
        $ifUserResponseIncorrectPartOne = "'{$userResponse}' is wrong answer ;(. Correct answer was ";
        $ifUserResponseIncorrectPartTwo = "{$value['answer']}. \nLet's try again, {$name}!";
        if ($userResponse != $value['answer']) {
            line($ifUserResponseIncorrectPartOne . $ifUserResponseIncorrectPartTwo);
            exit;
        } else {
            line("Correct!");
        }
    }
    line("Congratulations, {$name}!");
}
