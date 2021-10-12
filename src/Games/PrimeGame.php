<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\Engine\startGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function start(): void
{
    startGame(DESCRIPTION, fn () => getQuestionContentAndAnswer());
}

function getQuestionContentAndAnswer(): array
{
    $number = rand(0, 100);

    return [
        'content' => (string) $number,
        'answer' => isPrime($number) ? 'yes' : 'no',
    ];
}

function isPrime(int $number): bool
{
    $cornerCaseNumbers = [0, 1];

    if (in_array($number, $cornerCaseNumbers, true)) {
        return false;
    }

    $root = sqrt($number);
    for ($i = 2; $i <= $root; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
