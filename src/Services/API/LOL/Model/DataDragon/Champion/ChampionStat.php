<?php

namespace App\Services\API\LOL\Model\DataDragon\Champion;

class ChampionStat
{
    /**
     * @var int|float
     */
    private $hp;
    private int $hpperlevel;
    /**
     * @var int|float
     */
    private $mp;
    /**
     * @var int|float
     */
    private $mpperlevel;
    private int $movespeed;
    private int $armor;
    /**
     * @var int|float
     */
    private $armorperlevel;
    /**
     * @var int|float
     */
    private $spellblock;
    private float $spellblockperlevel;
    private int $attackrange;
    /**
     * @var int|float
     */
    private $hpregen;
    /**
     * @var int|float
     */
    private $hpregenperlevel;
    /**
     * @var int|float
     */
    private $mpregen;
    /**
     * @var int|float
     */
    private $mpregenperlevel;
    private int $crit;
    private int $critperlevel;
    /**
     * @var int|float
     */
    private $attackdamage;
    /**
     * @var int|float
     */
    private $attackdamageperlevel;
    /**
     * @var int|float
     */
    private $attackspeedperlevel;
    private float $attackspeed;

    /**
     * @return int|float
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @param int|float $hp
     */
    public function setHp($hp): ChampionStat
    {
        $this->hp = $hp;
        return $this;
    }

    public function getHpperlevel(): int
    {
        return $this->hpperlevel;
    }

    public function setHpperlevel(int $hpperlevel): ChampionStat
    {
        $this->hpperlevel = $hpperlevel;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getMp()
    {
        return $this->mp;
    }

    /**
     * @param int|float $mp
     */
    public function setMp($mp): ChampionStat
    {
        $this->mp = $mp;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getMpperlevel()
    {
        return $this->mpperlevel;
    }

    /**
     * @param int|float $mpperlevel
     */
    public function setMpperlevel($mpperlevel): ChampionStat
    {
        $this->mpperlevel = $mpperlevel;
        return $this;
    }

    public function getMovespeed(): int
    {
        return $this->movespeed;
    }

    public function setMovespeed(int $movespeed): ChampionStat
    {
        $this->movespeed = $movespeed;
        return $this;
    }

    public function getArmor(): int
    {
        return $this->armor;
    }

    public function setArmor(int $armor): ChampionStat
    {
        $this->armor = $armor;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getArmorperlevel()
    {
        return $this->armorperlevel;
    }

    /**
     * @param int|float $armorperlevel
     */
    public function setArmorperlevel($armorperlevel): ChampionStat
    {
        $this->armorperlevel = $armorperlevel;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getSpellblock()
    {
        return $this->spellblock;
    }

    /**
     * @param int|float $spellblock
     */
    public function setSpellblock($spellblock): ChampionStat
    {
        $this->spellblock = $spellblock;
        return $this;
    }

    public function getSpellblockperlevel(): float
    {
        return $this->spellblockperlevel;
    }

    public function setSpellblockperlevel(float $spellblockperlevel): ChampionStat
    {
        $this->spellblockperlevel = $spellblockperlevel;
        return $this;
    }

    public function getAttackrange(): int
    {
        return $this->attackrange;
    }

    public function setAttackrange(int $attackrange): ChampionStat
    {
        $this->attackrange = $attackrange;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getHpregen()
    {
        return $this->hpregen;
    }

    /**
     * @param int|float $hpregen
     */
    public function setHpregen($hpregen): ChampionStat
    {
        $this->hpregen = $hpregen;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getHpregenperlevel()
    {
        return $this->hpregenperlevel;
    }

    /**
     * @param int|float $hpregenperlevel
     */
    public function setHpregenperlevel($hpregenperlevel): ChampionStat
    {
        $this->hpregenperlevel = $hpregenperlevel;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getMpregen()
    {
        return $this->mpregen;
    }

    /**
     * @param int|float $mpregen
     */
    public function setMpregen($mpregen): ChampionStat
    {
        $this->mpregen = $mpregen;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getMpregenperlevel()
    {
        return $this->mpregenperlevel;
    }

    /**
     * @param int|float $mpregenperlevel
     */
    public function setMpregenperlevel($mpregenperlevel): ChampionStat
    {
        $this->mpregenperlevel = $mpregenperlevel;
        return $this;
    }

    public function getCrit(): int
    {
        return $this->crit;
    }

    public function setCrit(int $crit): ChampionStat
    {
        $this->crit = $crit;
        return $this;
    }

    public function getCritperlevel(): int
    {
        return $this->critperlevel;
    }

    public function setCritperlevel(int $critperlevel): ChampionStat
    {
        $this->critperlevel = $critperlevel;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getAttackdamage()
    {
        return $this->attackdamage;
    }

    /**
     * @param int|float $attackdamage
     */
    public function setAttackdamage($attackdamage): ChampionStat
    {
        $this->attackdamage = $attackdamage;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getAttackdamageperlevel()
    {
        return $this->attackdamageperlevel;
    }

    /**
     * @param int|float $attackdamageperlevel
     */
    public function setAttackdamageperlevel($attackdamageperlevel): ChampionStat
    {
        $this->attackdamageperlevel = $attackdamageperlevel;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getAttackspeedperlevel()
    {
        return $this->attackspeedperlevel;
    }

    /**
     * @param int|float $attackspeedperlevel
     */
    public function setAttackspeedperlevel($attackspeedperlevel): ChampionStat
    {
        $this->attackspeedperlevel = $attackspeedperlevel;
        return $this;
    }

    public function getattackspeed(): float
    {
        return $this->attackspeed;
    }

    public function setattackspeed(float $attackspeed): ChampionStat
    {
        $this->attackspeed = $attackspeed;
        return $this;
    }
}
