<?php

namespace App\Services\API\LOL\Model\DataDragon\Item;

class ItemGold
{
    private int $base;
    private bool $purchasable;
    private int $total;
    private int $sell;

    public function getBase(): int
    {
        return $this->base;
    }

    public function setBase(int $base): ItemGold
    {
        $this->base = $base;
        return $this;
    }

    public function getPurchasable(): bool
    {
        return $this->purchasable;
    }

    public function setPurchasable(bool $purchasable): ItemGold
    {
        $this->purchasable = $purchasable;
        return $this;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): ItemGold
    {
        $this->total = $total;
        return $this;
    }

    public function getSell(): int
    {
        return $this->sell;
    }

    public function setSell(int $sell): ItemGold
    {
        $this->sell = $sell;
        return $this;
    }
}
