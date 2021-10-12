<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Engine\startGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function start(): void
{
    startGame(DESCRIPTION, fn () => getQuestionContentAndAnswer());
}

function getQuestionContentAndAnswer(): array
{
    $a = rand(0, 100);
    $b = rand(0, 100);

    return [
        'content' => "$a $b",
        'answer' => (string) gcd($a, $b),
    ];
}

function gcd(int $a, int $b): int
{
    return ($a % $b) > 0 ? gcd($b, $a % $b) : $b;
}
