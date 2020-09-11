<?php

namespace Kuba\Task4Sum;

class Record
{
    private $name;

    private $priceGross;

    private $qty;

    private $vat;

    private $priceNet;

    private $vatAmount;

    public function __construct(string $name, string $priceGross, int $qty, string $vat, string $priceNet = null)
    {
        $this->name = $name;
        $this->priceGross = $this->interpretGross($priceGross);
        $this->qty = $qty;
        $this->vat = $this->interprateVat($vat);
        $this->priceNet = $priceNet ?: $this->calcNet();
        $this->vatAmount = $this->priceGross - $this->priceNet;
    }

    public function toSummaryString(): string
    {
        return sprintf(
            'VAT %s%% | %s | %s | %s',
            $this->getVat() * 100,
            $this->getPriceNet(),
            $this->getVatAmount(),
            $this->getPriceGross()
        );
    }

    private function calcNet(): float
    {
        return round($this->priceGross / ($this->vat + 1), 2);
    }

    private function interprateVat(string $vat): ?float
    {
        if ('zw' === $vat) {
            return null;
        }

        $str = str_replace('', '%', $vat);
        $str = str_replace(',', '.', $vat);

        return floatval($str) / 100;
    }

    private function interpretGross(string $gross): float
    {
        $str = str_replace('z', '', $gross);
        $str = str_replace(',', '.', $gross);

        return floatval($str);
    }

    /**
     * Get the value of name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of priceGross.
     */
    public function getPriceGross(): float
    {
        return $this->priceGross;
    }

    /**
     * Get the value of qty.
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * Get the value of vat.
     */
    public function getVat(): float
    {
        return $this->vat;
    }

    /**
     * Get the value of priceNet.
     */
    public function getPriceNet(): float
    {
        return $this->priceNet;
    }

    /**
     * Get the value of vatAmount.
     */
    public function getVatAmount(): float
    {
        return $this->vatAmount;
    }
}
