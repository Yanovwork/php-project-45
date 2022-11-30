<?php

namespace Src\Games\Brain\Calc\Game;

use function src\Engine\runGame;

use const src\Engine\ROUND;

const TASK = 'What is the result of the expression?';

function makeResult(string $action, int $firstNumber, int $secondNumber): string
{
    $result = 0;
    switch ($action) {
        case "+":
            $result = $firstNumber + $secondNumber;
            break;
        case "-":
            $result = $firstNumber - $secondNumber;
            break;
        case "*":
            $result = $firstNumber * $secondNumber;
            break;
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
            $expressionAndResult["{$i}"]['question'] = "{$firstOperand} + {$secondOperand}";
            $expressionAndResult["{$i}"]['answer'] = makeResult('+', $firstOperand, $secondOperand);
        } elseif ($operator == '-') {
            $expressionAndResult["{$i}"]['question'] = "{$firstOperand} - {$secondOperand}";
            $expressionAndResult["{$i}"]['answer'] = makeResult('-', $firstOperand, $secondOperand);
        } elseif ($operator == '*') {
            $expressionAndResult["{$i}"]['question'] = "{$firstOperand} * {$secondOperand}";
            $expressionAndResult["{$i}"]['answer'] = makeResult('*', $firstOperand, $secondOperand);
        }
    }
    runGame(TASK, $expressionAndResult);
}
