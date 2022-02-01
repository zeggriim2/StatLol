<?php

namespace App\Services\API\LOL\Model\Matchs;

class MatchPerkStyle
{
    private string $description;
    /**
     * @var MatchPerkStyleSelection[]
     */
    private array $selections;
    private int $style;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): MatchPerkStyle
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return MatchPerkStyleSelection[]
     */
    public function getSelections(): array
    {
        return $this->selections;
    }

    /**
     * @param MatchPerkStyleSelection[] $selections
     * @return MatchPerkStyle
     */
    public function setSelections(array $selections): MatchPerkStyle
    {
        $this->selections = $selections;
        return $this;
    }

    public function getStyle(): int
    {
        return $this->style;
    }

    public function setStyle(int $style): MatchPerkStyle
    {
        $this->style = $style;
        return $this;
    }
}
