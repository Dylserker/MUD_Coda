<?php
namespace App\Monster\Incarnam\Forest;

use App\Staurie\Game\Monster;

class Prespic extends Monster {
    public function name() : string { return 'Prespic'; }
    public function description(): string { return 'Créature sylvestre maline aux reflets sombres.'; }
    public function level() : int { return 3; }
    public function health_points(): int { return 22; }
    public function defense(): int { return 3; }
    public function experience(): int { return 14; }
    public function skills(): array { return ['Morsure d\'ombre' => 9]; }
    public function chance(): int {
        return 28;
    }
}