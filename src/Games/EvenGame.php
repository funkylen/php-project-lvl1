<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Engine\startGame;

function start($playerName)
{
    startGame($playerName, getDescription(), fn () => getQuestion());
}

function getDescription()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function getQuestion()
{
    $number = rand(0, 100);

    return [
        'content' => $number,
        'answer' => (string) $number % 2 === 0 ? 'yes' : 'no',
    ];
}
