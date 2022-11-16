<?php

namespace Src\Games\Brain\Calc\Game;

use function src\Engine\runGame;

const TASK = 'What is the result of the expression?';

function runCalc()
{
    require_once __DIR__ . '/../Engine.php';
    $expressionAndResult = [];
    for ($i = 0; $i < 3; $i++) {
        $first = rand(1, 100);
        $second =  rand(1, 100);
        switch (mt_rand(1, 3)) {
            case 1:
                $expressionAndResult["$first - $second"] = $first - $second;
                break;
            case 2:
                $expressionAndResult["$first + $second"] = $first + $second;
                break;
            case 3:
                $expressionAndResult["$first * $second"] = $first * $second;
                break;
        }
    }
    runGame(TASK, $expressionAndResult);
}
