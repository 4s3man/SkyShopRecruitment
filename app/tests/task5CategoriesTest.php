<?php

namespace Kuba\Tests;

use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__).'/tasks/task5Categories.php';

class task5CategoriesTest extends TestCase
{
    public function testCategoryArrayToTree()
    {
        $expected = [
            'Komputery' => [
                'Laptopy' => [
                    'Akcesoria' => [
                        'Torby' => [],
                    ],
                'Myszki' => [],
                ],
                'Stacjonarne' => [
                    'Dell' => [],
                ],
            ],
            'Monitory' => [
                'LCD' => [
                    '15' => [],
                ],
            ],
            'Pozostale' => [],
        ];

        $this->assertEquals($expected, \categoryArrayTotree($this->getData(), '>'));
    }

    public function getData()
    {
        return [
            'Komputery > Laptopy > Akcesoria > Torby',
            'Komputery > Laptopy > Myszki',
            'Monitory > LCD > 15',
            'Komputery > Stacjonarne > Dell',
            'Pozostale',
        ];
    }
}
