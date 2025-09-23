<?php

namespace App\Monster\Incarnam\Plain;

use Jugid\Staurie\Game\Monster;

class Boufton extends Monster {
    public function name() : string { return 'Boufton'; }
    public function description(): string { return 'Mouton timide au pelage doux.'; }
    public function level() : int { return 1; }
    public function health_points(): int { return 16; }
    public function defense(): int { return 1; }
    public function experience(): int { return 7; }
    public function skills(): array { return ['Bêlement' => 3]; }
}