<?php

namespace App\Monster\Incarnam\Field;

use Jugid\Staurie\Game\Monster;

class Wild_Sunflower extends Monster {
    public function name() : string { return 'Wild_Sunflower'; }
    public function description(): string { return 'Tournesol sauvage qui pique sous le soleil.'; }
    public function level() : int { return 2; }
    public function health_points(): int { return 20; }
    public function defense(): int { return 2; }
    public function experience(): int { return 10; }
    public function skills(): array { return ['Graines piquantes' => 7]; }

    public function chance(): int {
        // Tournesol sauvage, esquive moyenne
        return 25;
    }
}