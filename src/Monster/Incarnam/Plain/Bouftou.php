<?php
namespace App\Monster\Incarnam\Plain;

use App\Staurie\Game\Monster;
use App\Component\Stats;
use App\Component\StatsInterface;
use App\Map\Helper\MonsterInterface;

class Bouftou extends Monster implements MonsterInterface {
    public function name() : string { return 'Bouftou'; }
    public function description(): string { return 'Le bouftou, original goat d\'Incarnam.'; }
    public function level() : int { return 2; }
    public function health_points(): int { return 24; }
    public function defense(): int { return 2; }
    public function experience(): int { return 12; }
    public function skills(): array { return ['Charge' => 8]; }
    public function chance(): int {
        return 10;
    }

    public function getXpReward(): int {
        return $this->experience();
    }

    public function getStats(): StatsInterface {
        return new Stats(
            $this->chance(),
            $this->skills()['Charge'] ?? 0,
            0, // sagesse
            $this->defense(),
            0, // soin
            $this->health_points()
        );
    }
}