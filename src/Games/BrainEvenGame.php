<?php

namespace Src\Games\Brain\Even\Game;

use function src\Engine\runGame;

use const src\Engine\NUMBEROFROUNDS;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $acceptedNumber): bool
{
    if ($acceptedNumber % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

function runEven()
{
    $numberAndAnswer = [];
    for ($i = 0; $i < NUMBEROFROUNDS; $i++) {
        $number = rand(0, 99);
        if (isEven($number)) {
            $numberAndAnswer[$i]['question'] = $number;
            $numberAndAnswer[$i]['answer'] = 'yes';
        } else {
            $numberAndAnswer[$i]['question'] = $number;
            $numberAndAnswer[$i]['answer'] = 'no';
        }
    }
    runGame(TASK, $numberAndAnswer);
}
