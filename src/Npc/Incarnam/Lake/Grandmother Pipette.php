<?php

namespace App\Npc\Incarnam\Lake;

use Jugid\Staurie\Game\Npc;

class Grandmother_Pipette extends Npc {
    public function name() : string { return 'Grandmother Pipette'; }
    public function description() : string { return 'La doyenne qui veille sur le lac.'; }
    public function speak() : string|array {
        return [
            'Les gouttelettes sont espiègles, approche avec douceur.',
        ];
    }
}