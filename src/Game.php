<?php

namespace Brain\Games\Game;


use function cli\line;
use function cli\prompt;

function start($playerName, $getDescription, $getQuestion)
{
    line($getDescription());

    $tries = 3;

    while ($tries > 0) {
        $tries -= 1;

        $question = $getQuestion();

        line('Question: ' . $question['content']);

        $answer = prompt('Your answer');

        if ($answer !== $question['answer']) {
            line("'$answer' is wrong answer ;(. Correct answer was '{$question['answer']}'.");
            line("Let's try again, $playerName!");
            return;
        }

        if ($tries === 0) {
            line("Congratulations, $playerName!");
            return;
        }

        line('Correct!');
    }
}
