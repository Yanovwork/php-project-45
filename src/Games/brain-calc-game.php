<?php

namespace Src\Games\Brain\Calc\Game;

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
function correctResultOfOperation(int $firstOperand, int $secondOperand, string $acceptedRandomOperator): int
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
function userResponse(int $firstOperand, int $secondOperand, string $acceptedRandomOperator, $userResponse): bool
{
    $userResponseInt = (int)$userResponse;
    if (correctResultOfOperation($firstOperand, $secondOperand, $acceptedRandomOperator) == $userResponseInt) {
        return true;
    } else {
        return false;
    }
}
