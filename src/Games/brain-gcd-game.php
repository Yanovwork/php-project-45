<?php

namespace Src\Games\Brain\Gcd\Game;

#функция которая определяет наибольший общий делитель
function greatestCommonDivisorOfTwoNumbers(int $firstAcceptedNumber, int $secondAcceptedNumber): int
{
    $a = abs($firstAcceptedNumber);
    $b = abs($secondAcceptedNumber);
    while ($a != $b) {
        if ($a > $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $a;
}

#функция которая определяет правильно ли ответил пользователь
function userResponseGCD($accepsedUserResponce, int $firstAcceptedNumber, int $secondAcceptedNumber): bool
{
    $intAccepsedUserResponce = (int)$accepsedUserResponce;
    if ($intAccepsedUserResponce == greatestCommonDivisorOfTwoNumbers($firstAcceptedNumber, $secondAcceptedNumber)) {
        return true;
    } else {
        return false;
    }
}
