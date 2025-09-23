<?php

namespace App\Monster\Incarnam\Lake;

use Jugid\Staurie\Game\Monster;

class Droplets extends Monster {
    public function name() : string { return 'Droplets'; }
    public function description(): string { return 'Petites gouttes d\'eau curieuses.'; }
    public function level() : int { return 1; }
    public function health_points(): int { return 12; }
    public function defense(): int { return 1; }
    public function experience(): int { return 6; }
    public function skills(): array { return ['Goutte à goutte' => 4]; }
}