<?php

namespace Kuba\Tests;

use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__).'/tasks/task1Get.php';

class Task1GetTest extends TestCase
{
    /**
     * @dataProvider getCases
     */
    public function testFindString(string $a, string $b)
    {
        $_GET['a'] = $a;
        $_GET['b'] = $b;

        $this->assertTrue(\globalGETHasSubstring());
    }

    public function testEmptyNeedle()
    {
        $_GET['a'] = '';
        $_GET['b'] = 'aaaa';

        $this->assertFalse(\globalGETHasSubstring());
    }

    public function testEmptyHeystack()
    {
        $_GET['a'] = 'aaaa';
        $_GET['b'] = '';

        $this->assertFalse(\globalGETHasSubstring());
    }

    public function testEmptyBoth()
    {
        $_GET['a'] = '';
        $_GET['b'] = '';

        $this->assertFalse(\globalGETHasSubstring());
    }

    public function getCases(): iterable
    {
        yield ['TEST', 'aaaTESTbbb'];

        yield ['TEST', 'TESTbbb'];

        yield ['TEST', 'bbbTEST'];
    }
}
