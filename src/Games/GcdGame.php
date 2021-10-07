<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Engine\startGame;

function start($playerName)
{
    startGame($playerName, getDescription(), fn () => getQuestion());
}

function getDescription()
{
    return 'Find the greatest common divisor of given numbers.';
}

function getQuestion()
{
    $a = rand(0, 100);
    $b = rand(0, 100);

    return [
        'content' => "$a $b",
        'answer' => (string) gcd($a, $b),
    ];
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
