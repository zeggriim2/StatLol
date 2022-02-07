<?php

namespace App\Services\API\LOL\Model\Config;

class Tier
{
    public const TIER_CHALLENGER    = "CHALLENGER";
    public const TIER_GRANDMASTER   = "GRANDMASTER";
    public const TIER_MASTER        = "MASTER";
    public const TIER_DIAMOND       = "DIAMOND";
    public const TIER_PLATINUM      = "PLATINUM";
    public const TIER_GOLD          = "GOLD";
    public const TIER_SILVER        = "SILVER";
    public const TIER_BRONZE        = "BRONZE";
    public const TIER_IRON          = "IRON";


    public const ALL_TIERS = [
        self::TIER_CHALLENGER,
        self::TIER_GRANDMASTER,
        self::TIER_MASTER,
        self::TIER_DIAMOND,
        self::TIER_PLATINUM,
        self::TIER_GOLD,
        self::TIER_SILVER,
        self::TIER_BRONZE,
        self::TIER_IRON,
    ];
}
