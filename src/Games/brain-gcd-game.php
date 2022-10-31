<?php

namespace Src\Games\Brain\Gcd\Game;

#функция которая определяет правильно ли ответил пользователь
function userResponseGCD($accepsedUserResponce, int $firstAcceptedNumber, int $secondAcceptedNumber): bool
{
    $intAccepsedUserResponce = (int)$accepsedUserResponce;
    if ($intAccepsedUserResponce == gmp_gcd($firstAcceptedNumber, $secondAcceptedNumber)) {
        return true;
    } else {
        return false;
    }
}
