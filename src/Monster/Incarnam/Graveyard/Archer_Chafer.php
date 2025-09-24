<?php
namespace App\Monster\Incarnam\Graveyard;

use App\Staurie\Game\Monster;

class Archer_Chafer extends Monster {
    public function name() : string { return 'Archer_Chafer'; }
    public function description(): string { return 'Chafer archer, précis et silencieux.'; }
    public function level() : int { return 5; }
    public function health_points(): int { return 26; }
    public function defense(): int { return 3; }
    public function experience(): int { return 26; }
    public function skills(): array { return ['Tir d\'os' => 13]; }
    public function chance(): int {
        return 18;
    }
}