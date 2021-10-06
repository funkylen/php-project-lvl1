<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

class Cli
{
    public function getNameAndGreetUser() 
    {
        line('Welcome to the Brain Games!');
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);
    }
}

