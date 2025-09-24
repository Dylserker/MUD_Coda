<?php

namespace App\Monster\Incarnam\Forest;

use Jugid\Staurie\Game\Monster;

class Wild_Boar extends Monster {
    public function name() : string { return 'Wild_Boar'; }
    public function description(): string { return 'Sanglier féroce qui charge sans prévenir.'; }
    public function level() : int { return 4; }
    public function health_points(): int { return 28; }
    public function defense(): int { return 4; }
    public function experience(): int { return 20; }
    public function skills(): array { return ['Charge' => 12]; }
}