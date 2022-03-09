<?php

namespace App\Services\API\LOL\Model\DataDragon\Champion;

class ChampionStat
{
    /**
     * @var int|float
     */
    private $hp;
    /**
     * @var int|float
     */
    private $hpperlevel;
    /**
     * @var int|float
     */
    private $mp;
    /**
     * @var int|float
     */
    private $mpperlevel;
    /**
     * @var int|float
     */
    private $movespeed;
    /**
     * @var int|float
     */
    private $armor;
    /**
     * @var int|float
     */
    private $armorperlevel;
    /**
     * @var int|float
     */
    private $spellblock;
    /**
     * @var int|float
     */
    private $spellblockperlevel;
    /**
     * @var int|float
     */
    private $attackrange;
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
    /**
     * @var int|float
     */
    private $crit;
    /**
     * @var int|float
     */
    private $critperlevel;
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
    /**
     * @var int|float
     */
    private $attackspeed;

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

    /**
     * @return int|float
     */
    public function getHpperlevel()
    {
        return $this->hpperlevel;
    }

    /**
     * @param int|float $hpperlevel
     */
    public function setHpperlevel($hpperlevel): ChampionStat
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

    /**
     * @return int|float
     */
    public function getMovespeed()
    {
        return $this->movespeed;
    }

    /**
     * @param int|float $movespeed
     */
    public function setMovespeed($movespeed): ChampionStat
    {
        $this->movespeed = $movespeed;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * @param int|float $armor
     */
    public function setArmor($armor): ChampionStat
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

    /**
     * @return int|float
     */
    public function getSpellblockperlevel()
    {
        return $this->spellblockperlevel;
    }

    /**
     * @param int|float $spellblockperlevel
     */
    public function setSpellblockperlevel($spellblockperlevel): ChampionStat
    {
        $this->spellblockperlevel = $spellblockperlevel;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getAttackrange()
    {
        return $this->attackrange;
    }

    /**
     * @param int|float $attackrange
     */
    public function setAttackrange($attackrange): ChampionStat
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

    /**
     * @return int|float
     */
    public function getCrit()
    {
        return $this->crit;
    }

    /**
     * @param int|float $crit
     */
    public function setCrit($crit): ChampionStat
    {
        $this->crit = $crit;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getCritperlevel()
    {
        return $this->critperlevel;
    }

    /**
     * @param int|float $critperlevel
     */
    public function setCritperlevel($critperlevel): ChampionStat
    {
        $this->critperlevel = $critperlevel;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getAttackDamage()
    {
        return $this->attackdamage;
    }

    /**
     * @param int|float $attackdamage
     */
    public function setAttackDamage($attackdamage): ChampionStat
    {
        $this->attackdamage = $attackdamage;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getAttackDamagePerlevel()
    {
        return $this->attackdamageperlevel;
    }

    /**
     * @param int|float $attackdamageperlevel
     */
    public function setAttackDamagePerlevel($attackdamageperlevel): ChampionStat
    {
        $this->attackdamageperlevel = $attackdamageperlevel;
        return $this;
    }

    /**
     * @return int|float
     */
    public function getAttackSpeedPerlevel()
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

    /**
     * @return int|float
     */
    public function getattackspeed()
    {
        return $this->attackspeed;
    }

    /**
     * @param int|float $attackspeed
     */
    public function setattackspeed($attackspeed): ChampionStat
    {
        $this->attackspeed = $attackspeed;
        return $this;
    }
}
