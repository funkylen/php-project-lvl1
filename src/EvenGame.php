<?php

namespace Brain\Games\EvenGame;

use function cli\line;
use function cli\prompt;

function start($playerName)
{
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $tries = 3;

    while ($tries > 0) {
        $tries -= 1;

        $number = rand(0, 100);
        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

        line('Question: ' . $number);

        $answer = prompt('Your answer');

        if ($answer !== $correctAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            return;
        }

        if ($tries === 0) {
            line("Congratulations, $playerName!");
            return;
        }

        line('Correct!');
    }
}
