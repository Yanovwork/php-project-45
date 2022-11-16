<?php

namespace Src\Games\Brain\Prime\Game;

use function src\Engine\runGame;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function definesPrimeNumber(int $acceptedNumber): bool
{
    for ($i = 2; $i < $acceptedNumber; $i++) {
        if ($acceptedNumber % $i == 0) {
            return false;
        }
    }
    return true;
}

function runIsItPrimeNumber()
{
    require_once __DIR__ . '/../Engine.php';
    $questions = [];
    $answers = [];
    $randArray = [];
    for ($i = 0; $i < 3; $i++) {
        $randArray[] = rand(1, 99);
    }
    foreach ($randArray as $number) {
        $questions[] = $number;
        if (definesPrimeNumber($number) == true) {
            $answers[] = 'yes';
        } else {
            $answers[] = 'no';
        }
    }
    $numbersAndAnswer = array_combine($questions, $answers);
    runGame(TASK, $numbersAndAnswer);
}
