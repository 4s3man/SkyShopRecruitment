<?php

namespace Kuba\Task4Sum;

class RecordCollection
{
    private $records = [];

    public function __construct(iterable $data)
    {
        foreach ($data as $datum) {
            $this->add($datum);
        }
    }

    public function add(array $data): void
    {
        $this->records[] = new Record(...$data);
    }

    public function printSummary(): void
    {
        array_walk($this->records, function (Record $record) {
            echo 'stawka vat | warto netto | kwota VAT | warto brutto'."\n";
            echo $record->toSummaryString()."\n";
        });
    }
}
