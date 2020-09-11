<?php

namespace Kuba\Tests;

use Kuba\Task4Sum\Record;
use Kuba\Task4Sum\RecordCollection;
use PHPUnit\Framework\TestCase;

class task4SumTest extends TestCase
{
    /**
     * @dataProvider getRecordData
     */
    public function testRecordCreation(string $name, string $priceGross, int $qty, string $vat, string $priceNet = null)
    {
        $record = new Record($name, $priceGross, $qty, $vat, $priceNet);
        $this->assertEquals(100.33, $record->getPriceGross());
        $this->assertEquals(0.23, $record->getVat());
        $this->assertEquals(81.57, $record->getPriceNet());
        $this->assertEquals(18.76, $record->getVatAmount());
    }

    /**
     * @dataProvider getRecordData
     */
    public function testRecordToSummary(string $name, string $priceGross, int $qty, string $vat, string $priceNet = null)
    {
        $record = new Record($name, $priceGross, $qty, $vat, $priceNet);
        $this->assertEquals('VAT 23% | 81.57 | 18.76 | 100.33', $record->toSummaryString());
    }

    public function testRecordCollectionCreation()
    {
        $this->expectNotToPerformAssertions();
        $records = new RecordCollection($this->getRecordCollectionData());
        $records->add(['Produkt 1', '100,33z', 5, '23%']);
    }

    public function getRecordData(): iterable
    {
        yield ['Produkt 1', '100,33z', 5, '23%'];
    }

    public function getRecordCollectionData(): iterable
    {
        return [
            ['Produkt 1', '100,33z', 5, '23%'],
            ['Produkt 1', '100,33z', 5, '23%'],
            ['Produkt 1', '100,33z', 5, '23%'],
        ];
    }
}
