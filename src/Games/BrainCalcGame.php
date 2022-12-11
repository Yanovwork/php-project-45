<?php

namespace Src\Games\Brain\Calc\Game;

use function src\Engine\runGame;

use const src\Engine\NUMBEROFROUNDS;

const TASK = 'What is the result of the expression?';

function makeResult(string $action, int $firstNumber, int $secondNumber): string
{
    switch ($action) {
        case "+":
            return $firstNumber + $secondNumber;
            break;
        case "-":
            return $firstNumber - $secondNumber;
            break;
        case "*":
            return $firstNumber * $secondNumber;
            break;
    }
}

function runCalc()
{
    $expressionAndResult = [];
    $operators = ['+', '-', '*'];
    for ($i = 0; $i < NUMBEROFROUNDS; $i++) {
        $firstOperand = rand(1, 100);
        $secondOperand = rand(1, 100);
        $operator = $operators[rand(0, 2)];
        $expressionAndResult[$i]['question'] = "{$firstOperand} {$operator} {$secondOperand}";
        $expressionAndResult[$i]['answer'] = makeResult($operator, $firstOperand, $secondOperand);
    }
    runGame(TASK, $expressionAndResult);
}
