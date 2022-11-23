<?php

namespace Src\Games\Brain\Calc\Game;

use function src\Engine\runGame;

use const src\Engine\ROUND;

const TASK = 'What is the result of the expression?';

function makeResult(string $action, int $firstNumber, int $secondNumber): string
{
    $result = 0;
    if ($action == "+") {
        $result = $firstNumber + $secondNumber;
    } elseif ($action == "-") {
        $result = $firstNumber - $secondNumber;
    } elseif ($action == "*") {
        $result = $firstNumber * $secondNumber;
    }
    return $result;
}

function runCalc()
{
    $expressionAndResult = [];
    for ($i = 0; $i < ROUND; $i++) {
        $operators = ['+', '-', '*'];
        $firstOperand = rand(1, 100);
        $secondOperand = rand(1, 100);
        $operator = $operators[rand(0, 2)];
        if ($operator == '+') {
            $expressionAndResult["$firstOperand + $secondOperand"] = makeResult('+', $firstOperand, $secondOperand);
        } elseif ($operator == '-') {
            $expressionAndResult["$firstOperand - $secondOperand"] = makeResult('-', $firstOperand, $secondOperand);
        } else {
            $expressionAndResult["$firstOperand * $secondOperand"] = makeResult('*', $firstOperand, $secondOperand);
        }
    }
    runGame(TASK, $expressionAndResult);
}
