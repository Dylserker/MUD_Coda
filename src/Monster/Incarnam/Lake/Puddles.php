<?php

namespace App\Monster\Incarnam\Lake;

use Jugid\Staurie\Game\Monster;

class Puddles extends Monster {
    public function name() : string { return 'Puddles'; }
    public function description(): string { return 'Flaque animée qui s\'étale sous tes pas.'; }
    public function level() : int { return 2; }
    public function health_points(): int { return 18; }
    public function defense(): int { return 1; }
    public function experience(): int { return 9; }
    public function skills(): array { return ['Éclaboussure' => 6]; }
}