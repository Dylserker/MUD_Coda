<?php
namespace App\Component;

require_once __DIR__ . '/EntityInterfaces.php';

class Stats implements StatsInterface
{
    public int $chance;
    public int $force;
    public int $sagesse;
    public int $resistance;
    public int $soin;
    public int $sante;

    public function __construct(
        int $chance = 0,
        int $force = 0,
        int $sagesse = 0,
        int $resistance = 0,
        int $soin = 0,
        int $sante = 100
    ) {
        $this->chance = $chance;
        $this->force = $force;
        $this->sagesse = $sagesse;
        $this->resistance = $resistance;
        $this->soin = $soin;
        $this->sante = $sante;
    }

    public function getChance(): int { return $this->chance; }
    public function getForce(): int { return $this->force; }
    public function getSagesse(): int { return $this->sagesse; }
    public function getResistance(): int { return $this->resistance; }
    public function getSoin(): int { return $this->soin; }
    public function getSante(): int { return $this->sante; }
}
