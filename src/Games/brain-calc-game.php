<?php

namespace Src\Games\Brain\Calc\Game;

use function cli\line;
use function cli\prompt;
use function cli\out;

#если сложение
function doAddition(int $firstOperand, int $secondOperand): int
{
    $sumOfOperands = $firstOperand + $secondOperand;
    return $sumOfOperands;
}
#если вычитаени
function doSubtraction(int $firstOperand, int $secondOperand): int
{
    $differenceOfOperands = $firstOperand - $secondOperand;
    return $differenceOfOperands;
}
#если умножение
function doMultiplication(int $firstOperand, int $secondOperand): int
{
    $multiplicationOfOperands = $firstOperand * $secondOperand;
    return $multiplicationOfOperands;
}
#функция возвращает правильный ответ
function makingResult(int $firstOperand, int $secondOperand, string $acceptedRandomOperator)
{
    if ($acceptedRandomOperator == '+') {
        return doAddition($firstOperand, $secondOperand);
    } elseif ($acceptedRandomOperator == '-') {
        return doSubtraction($firstOperand, $secondOperand);
    } elseif ($acceptedRandomOperator == '*') {
        return doMultiplication($firstOperand, $secondOperand);
    }
}
#функция, которая определяет правильно ли ответил пользователь
function checkingResponse(int $firstOperand, int $secondOperand, string $aRandomOperator, string $aUserResponse): bool
{
    $userResponseInt = (int)$aUserResponse;
    if (makingResult($firstOperand, $secondOperand, $aRandomOperator) == $userResponseInt) {
        return true;
    } else {
        return false;
    }
}

function runTheCalculator()
{
    $userGreeting = 'Welcome to the Brain Games!';
    line($userGreeting);
    $userName = prompt('May I have your name? ');
    $helloUser = 'Hello, ' . $userName . '!';
    line($helloUser);
    $gameConditions = 'What is the result of the expression?';
    line($gameConditions);
    $wellDone = 'Congratulations, ' . $userName . '!';
    $rightAnswersSum = 0;
    while ($rightAnswersSum < 3) {
        $questionBeforeOperation = 'Question: ';
        $lineBeforeUserResponse = 'Your answer';
        $positiveResponse = 'Correct!';
        $firstRandomOperand = rand(1, 99);
        $secondRandomOperand = rand(1, 99);
        $arrayOfOperators = ['+', '-', '*'];
        $randomOperatorNumber = array_rand($arrayOfOperators);
        $randomOperator = $arrayOfOperators[$randomOperatorNumber];
        $randomExpression = $firstRandomOperand . ' ' . $randomOperator . ' ' . $secondRandomOperand;
        out($questionBeforeOperation);
        line($randomExpression);
        $userResponse = prompt($lineBeforeUserResponse);
        $lowUserResponse = strtolower($userResponse);
        $firstPartNegativeResponse = "'" . $userResponse . "'" . ' is wrong answer ;(. Correct answer was ' . "'";
        $secondPartNegativeResponse = makingResult($firstRandomOperand, $secondRandomOperand, $randomOperator);
        $thirdRartNegativeResponse = "'" . ".\nLet's try again, " . $userName . "!";
        $negativeResponse = $firstPartNegativeResponse . $secondPartNegativeResponse . $thirdRartNegativeResponse;
        if (checkingResponse($firstRandomOperand, $secondRandomOperand, $randomOperator, $userResponse) == true) {
            $rightAnswersSum++;
            line($positiveResponse);
        } else {
            line($negativeResponse);
            exit;
        }
    }
    return line($wellDone);
}
