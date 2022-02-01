<?php

namespace App\Services\API\LOL\Model;

class Status
{
    private string $name;
    private string $slug;
    /**
     * @var array<string>
     */
    private array $locales;
    private string $hostname;
    private string $region_tag;
    /**
     * @var array<array-key,array<string,int|string>>
     */
    private array $services;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Status
     */
    public function setName(string $name): Status
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Status
     */
    public function setSlug(string $slug): Status
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getLocales(): array
    {
        return $this->locales;
    }

    /**
     * @param array<string> $locales
     * @return Status
     */
    public function setLocales(array $locales): Status
    {
        $this->locales = $locales;
        return $this;
    }

    /**
     * @return string
     */
    public function getHostname(): string
    {
        return $this->hostname;
    }

    /**
     * @param string $hostname
     * @return Status
     */
    public function setHostname(string $hostname): Status
    {
        $this->hostname = $hostname;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegionTag(): string
    {
        return $this->region_tag;
    }

    /**
     * @param string $region_tag
     * @return Status
     */
    public function setRegionTag(string $region_tag): Status
    {
        $this->region_tag = $region_tag;
        return $this;
    }

    /**
     * @return array<array-key,array<string,int|string>>
     */
    public function getServices(): array
    {
        return $this->services;
    }

    /**
     * @param array<array-key,array<string,int|string>> $services
     * @return Status
     */
    public function setServices(array $services): Status
    {
        $this->services = $services;
        return $this;
    }
}
