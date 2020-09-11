<?php

namespace Kuba\Tests;

use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__).'/tasks/task3Loop.php';

class task3LoopTest extends TestCase
{
    public function testGetTask3String()
    {
        $this->assertEquals('15goodexcellent', getTask3LoopString(15));
        $this->assertEquals('30goodexcellent', getTask3LoopString(30));

        $this->assertEquals('6good', getTask3LoopString(6));
        $this->assertEquals('3good', getTask3LoopString(3));

        $this->assertEquals('5excellent', getTask3LoopString(5));
        $this->assertEquals('50excellent', getTask3LoopString(50));

        $this->assertEquals('1ok', getTask3LoopString(1));
        $this->assertEquals('11ok', getTask3LoopString(11));
    }

    public function testEmptyInput()
    {
        $this->assertEquals('', \removeNotNumbers(''));
    }
}
