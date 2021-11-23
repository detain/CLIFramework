<?php
namespace DemoApp\Command;

class Foo extends \CLIFramework\Command {

    public function brief() { return 'brief of foo'; }

    public function init() {
        $this->command('subfoo','DemoApp\\Command\\Foo\\SubFoo');
    }

    public function execute() {
        $this->getLogger()->info('executing foo command.');
    }
}

