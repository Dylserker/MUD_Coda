<?php

namespace App\Monster\Tutorial;

use Jugid\Staurie\Game\Monster;

class Red_Piou extends Monster {
    public function name() : string { return 'Red Piou'; }
    public function description(): string { return 'Piou rouge, un peu plus agressif.'; }
    public function level() : int { return 2; }
    public function health_points(): int { return 14; }
    public function defense(): int { return 1; }
    public function experience(): int { return 9; }
    public function skills(): array { return ['Coup de bec' => 7]; }
}