<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Engine\startGame;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function start(): void
{
    startGame(DESCRIPTION, fn () => getQuestionContentAndAnswer());
}

function getQuestionContentAndAnswer(): array
{
    $number = rand(0, 100);

    return [
        'content' => $number,
        'answer' => $number % 2 === 0 ? 'yes' : 'no',
    ];
}
