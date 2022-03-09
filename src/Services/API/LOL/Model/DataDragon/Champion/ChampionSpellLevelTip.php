<?php

namespace App\Services\API\LOL\Model\DataDragon\Champion;

class ChampionSpellLevelTip
{
    /**
     * @var array<string>
     */
    private array $label;
    /**
     * @var array<string>
     */
    private array $effect;


    /**
     * @return array<string>
     */
    public function getLabel(): array
    {
        return $this->label;
    }

    /**
     * @param array<string> $label
     */
    public function setLabel(array $label): ChampionSpellLevelTip
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getEffect(): array
    {
        return $this->effect;
    }

    /**
     * @param array<string> $effect
     */
    public function setEffect(array $effect): ChampionSpellLevelTip
    {
        $this->effect = $effect;
        return $this;
    }
}
