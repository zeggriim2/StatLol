<?php

namespace App\Services\API\LOL\Model\Matchs;

class MatchPerk
{
    private MatchPerkStat $statPerks;
    /**
     * @var MatchPerkStyle[]
     */
    private array $styles;

    public function getStatPerks(): MatchPerkStat
    {
        return $this->statPerks;
    }

    public function setStatPerks(MatchPerkStat $statPerks): MatchPerk
    {
        $this->statPerks = $statPerks;
        return $this;
    }

    /**
     * @return MatchPerkStyle[]
     */
    public function getStyles(): array
    {
        return $this->styles;
    }

    /**
     * @param MatchPerkStyle[] $styles
     * @return MatchPerk
     */
    public function setStyles(array $styles): MatchPerk
    {
        $this->styles = $styles;
        return $this;
    }
}
