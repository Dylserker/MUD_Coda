<?php

namespace App\Monster\Incarnam\Field;

use Jugid\Staurie\Game\Monster;

class Tofu extends Monster {
    public function name() : string { return 'Tofu'; }
    public function description(): string { return 'Petit volatile jaune, rapide et facétieux.'; }
    public function level() : int { return 1; }
    public function health_points(): int { return 12; }
    public function defense(): int { return 1; }
    public function experience(): int { return 5; }
    public function skills(): array { return ['Ruée' => 4]; }

    public function chance(): int {
        // Tofu est rapide, on peut mettre une chance d'esquive plus élevée
        return 35;
    }
}