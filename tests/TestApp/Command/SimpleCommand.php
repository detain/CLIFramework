<?php
namespace TestApp\Command;
use CLIFramework\Command;
use Exception;

class Simple extends Command
{

    public function help()
    {
        return <<<HELP
<info>Info Style</info>

<bold>Bold Text</bold>
<underline>Bold Text</underline>
HELP;
    }

    public function arguments($args)
    {
        $args->add('var');
    }

    public function execute($var)
    {
        return $var;
    }
}




