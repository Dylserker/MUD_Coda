<?php

namespace App\Monster\Tutorial;

use Jugid\Staurie\Game\Monster;

class Green_Piou extends Monster {

    public function name() : string {
        return 'Green Piou';
    }

    public function description(): string {
        return 'Un petit oiseau vert, peu dangereux mais vif.';
    }

    public function level() : int {
        return 1;
    }

    public function health_points(): int {
        return 18;
    }

    public function defense(): int {
        return 1;
    }

    public function experience(): int {
        return 8;
    }

    public function skills(): array {
        return [
            'Coup de bec' => 6,
        ];
    }
}