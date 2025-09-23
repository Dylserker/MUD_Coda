<?php

namespace App\Npc\Incarnam\Plain;

use Jugid\Staurie\Game\Npc;

class Charle_IA extends Npc {
    public function name() : string { return 'Charle IA'; }
    public function description() : string { return 'Chercheur fantasque de la plaine.'; }
    public function speak() : string|array {
        return [
            'L\'intelligence... artificielle ? Une curiosité de la plaine !',
        ];
    }
}