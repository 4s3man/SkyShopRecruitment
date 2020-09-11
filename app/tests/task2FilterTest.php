<?php

namespace Kuba\Tests;

use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__).'/tasks/task2Filter.php';

class Task2FilterTest extends TestCase
{
    public function testReplaceNotNumbers()
    {
        $input = '444ioj123oi123n12o3ino2ip12io3123';
        $expectedOutput = 'iojoinoinoipio';

        $this->assertEquals($expectedOutput, \removeNotNumbers($input));
    }

    public function testEmptyInput()
    {
        $this->assertEquals('', \removeNotNumbers(''));
    }
}
