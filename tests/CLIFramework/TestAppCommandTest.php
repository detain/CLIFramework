<?php
use CLIFramework\ArgInfo;
use TestApp\Application;
use PHPUnit\Framework\TestCase;

class TestAppCommandTest extends TestCase
{
    public function testSimple()
    {
        $command = new TestApp\Command\Simple(new Application);
        $command->init();

        $argInfos = $command->getArgInfoList();
        $this->assertNotEmpty($argInfos);
        $this->assertCount(1, $argInfos);
        $this->assertEquals('var', $argInfos[0]->name);
    }

    public function testArginfo() {
        $cmd = new TestApp\Command\Arginfo(new Application);
        $cmd->init();

        $argInfos = $cmd->getArgInfoList();
        $this->assertNotEmpty($argInfos);
        $this->assertCount(3, $argInfos);

        foreach( $argInfos as $arginfo ) {
            $this->assertInstanceOf('CLIFramework\ArgInfo',  $arginfo);
        }
    }
}

