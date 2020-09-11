<?php

namespace Kuba\Tests;

use Kuba\Task6Tree;
use PHPUnit\Framework\TestCase;

class task6TreeTest extends TestCase
{
    public function testBuildTree()
    {
        $task6Tree = new Task6Tree($this->getTree());

        $this->assertEqualsCanonicalizing($this->getExpectedStateInitial(), $task6Tree->getTree());

        $task6Tree->add(2, 6, 'test');

        $this->assertEqualsCanonicalizing($this->getExpectedStateAfterAdd(), $task6Tree->getTree());

        $task6Tree->add(123, 33, 'parentNotInTree');

        $this->assertEqualsCanonicalizing($this->getExpectedStateAfterAdd(), $task6Tree->getTree());
    }

    public function getTree()
    {
        return [
            ['id' => 1, 'parent_id' => 0, 'name' => 'Elektronika'],
            ['id' => 3, 'parent_id' => 1, 'name' => 'Roboty'],
            ['id' => 4, 'parent_id' => 6, 'name' => 'Pika nona'],
            ['id' => 5, 'parent_id' => 0, 'name' => 'Turystyka'],
            ['id' => 6, 'parent_id' => 0, 'name' => 'Sport'],
            ['id' => 7, 'parent_id' => 1, 'name' => 'Telefony'],
            ['id' => 8, 'parent_id' => 1, 'name' => 'Laptopy'],
            ['id' => 9, 'parent_id' => 1, 'name' => 'Tablety'],
            ['id' => 10, 'parent_id' => 6, 'name' => 'Siownia i fitness'],
        ];
    }

    private function getExpectedStateInitial(): array
    {
        return
        [
        0 => [
          'id' => 1,
          'parent_id' => 0,
          'name' => 'Elektronika',
          'children' => [
            0 => [
              'id' => 3,
              'parent_id' => 1,
              'name' => 'Roboty',
            ],
            1 => [
              'id' => 7,
              'parent_id' => 1,
              'name' => 'Telefony',
            ],
            2 => [
              'id' => 8,
              'parent_id' => 1,
              'name' => 'Laptopy',
            ],
            3 => [
              'id' => 9,
              'parent_id' => 1,
              'name' => 'Tablety',
            ],
          ],
        ],
        1 => [
          'id' => 5,
          'parent_id' => 0,
          'name' => 'Turystyka',
        ],
        2 => [
          'id' => 6,
          'parent_id' => 0,
          'name' => 'Sport',
          'children' => [
            0 => [
              'id' => 4,
              'parent_id' => 6,
              'name' => 'Pika nona',
            ],
            1 => [
              'id' => 10,
              'parent_id' => 6,
              'name' => 'Siownia i fitness',
            ],
          ],
        ],
    ];
    }

    private function getExpectedStateAfterAdd(): array
    {
        return [
            0 => [
              'id' => 1,
              'parent_id' => 0,
              'name' => 'Elektronika',
              'children' => [
                0 => [
                  'id' => 3,
                  'parent_id' => 1,
                  'name' => 'Roboty',
                ],
                1 => [
                  'id' => 7,
                  'parent_id' => 1,
                  'name' => 'Telefony',
                ],
                2 => [
                  'id' => 8,
                  'parent_id' => 1,
                  'name' => 'Laptopy',
                ],
                3 => [
                  'id' => 9,
                  'parent_id' => 1,
                  'name' => 'Tablety',
                ],
              ],
            ],
            1 => [
              'id' => 5,
              'parent_id' => 0,
              'name' => 'Turystyka',
            ],
            2 => [
              'id' => 6,
              'parent_id' => 0,
              'name' => 'Sport',
              'children' => [
                0 => [
                  'id' => 4,
                  'parent_id' => 6,
                  'name' => 'Pika nona',
                ],
                1 => [
                  'id' => 10,
                  'parent_id' => 6,
                  'name' => 'Siownia i fitness',
                ],
                2 => [
                  'id' => 2,
                  'parent_id' => 6,
                  'name' => 'test',
                ],
              ],
            ],
        ];
    }
}
