<?php
namespace App\Monster\Incarnam\Plain;

use Jugid\Staurie\Game\Monster;

class Bouftou extends Monster {
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
}