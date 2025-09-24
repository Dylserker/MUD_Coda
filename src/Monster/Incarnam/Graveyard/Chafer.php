<?php
namespace App\Monster\Incarnam\Graveyard;

use Jugid\Staurie\Game\Monster;

class Chafer extends Monster {
    public function name() : string { return 'Chafer'; }
    public function description(): string { return 'Squelette guerrier animé par une magie ancienne.'; }
    public function level() : int { return 4; }
    public function health_points(): int { return 30; }
    public function defense(): int { return 4; }
    public function experience(): int { return 22; }
    public function skills(): array { return ['Coup d\'os' => 11]; }
    public function chance(): int {
        return 12;
    }
}