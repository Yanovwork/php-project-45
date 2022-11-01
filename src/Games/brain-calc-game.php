<?php

namespace Src\Games\Brain\Calc\Game;

use function cli\line;
use function cli\prompt;
use function cli\out;

#если сложение
function ifPlusOperator(int $firstOperand, int $secondOperand): int
{
    $sumOfOperands = $firstOperand + $secondOperand;
    return $sumOfOperands;
}
#если вычитаени
function ifMinusOperator(int $firstOperand, int $secondOperand): int
{
    $differenceOfOperands = $firstOperand - $secondOperand;
    return $differenceOfOperands;
}
#если умножение
function ifMultiplicationOperator(int $firstOperand, int $secondOperand): int
{
    $multiplicationOfOperands = $firstOperand * $secondOperand;
    return $multiplicationOfOperands;
}
#функция возвращает правильный ответ
function correctResult(int $firstOperand, int $secondOperand, string $acceptedRandomOperator): int
{
    if ($acceptedRandomOperator == '+') {
        return ifPlusOperator($firstOperand, $secondOperand);
    } elseif ($acceptedRandomOperator == '-') {
        return ifMinusOperator($firstOperand, $secondOperand);
    } elseif ($acceptedRandomOperator == '*') {
        return ifMultiplicationOperator($firstOperand, $secondOperand);
    }
}
#функция, которая определяет правильно ли ответил пользователь
function userResponse(int $firstOperand, int $secondOperand, string $acceptedRandomOperator, $aUserResponse): bool
{
    $userResponseInt = (int)$aUserResponse;
    if (correctResult($firstOperand, $secondOperand, $acceptedRandomOperator) == $userResponseInt) {
        return true;
    } else {
        return false;
    }
}

function calculator()
{
    require __DIR__ . '/../../vendor/autoload.php';
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
        $secondPartNegativeResponse = correctResult($firstRandomOperand, $secondRandomOperand, $randomOperator);
        $thirdRartNegativeResponse = "'" . ".\nLet's try again, " . $userName . "!";
        $negativeResponse = $firstPartNegativeResponse . $secondPartNegativeResponse . $thirdRartNegativeResponse;
        if (userResponse($firstRandomOperand, $secondRandomOperand, $randomOperator, $userResponse) == true) {
            $rightAnswersSum++;
            line($positiveResponse);
        } else {
            line($negativeResponse);
            exit;
        }
    }
    return line($wellDone);
}
